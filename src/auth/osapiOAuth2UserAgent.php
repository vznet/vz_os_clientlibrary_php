<?php
/*
 * Copyright 2010 VZnet Netzwerke Ltd.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
require_once "osapiAuth.php";

class osapiOAuth2UserAgent extends osapiOAuth2
{

    /**
     *
     * @param string $consumerKey
     * @param string $consumerSecret
     * @param osapiStorage $storage
     * @param string $cookieKey
     * @param osapiProvider $provider
     * @param string $localUserId optional
     */
    public function __construct($consumerKey,
            $consumerSecret,
            osapiStorage $storage,
            $cookieKey,
            osapiProvider $provider,
            $localUserId = null) {
        $this->storage = $storage;
        $this->storageKey = 'OAuth2u:' . $consumerKey . ':' . $localUserId;

        if (! $this->accessToken = $storage->get($this->storageKey)) {
            if (! isset($_COOKIE[$cookieKey])) {
                return;
            }

            $cookie = array();
            parse_str($_COOKIE[$cookieKey], $cookie);
            setcookie($cookieKey, '', 0, '/');

            if (isset($cookie['error'])) {
                throw new osapiException($cookie['error']);
            }

            if (! isset($cookie['access_token'])) {
                throw new osapiException('missing access token in cookie');
            }

            if (isset($cookie['signature']) && isset($cookie['issued_at'])) {
                $this->verifySignature(
                        $cookie['signature'],
                        $consumerSecret,
                        $cookie['access_token'],
                        $cookie['issued_at'],
                        isset($cookie['user_id']) ? $cookie['user_id'] : '',
                        ''
                );
                if (isset($cookie['userId'])) {
                    $this->userId = $cookie['userId'];
                }
            }

            $this->accessToken = new OAuth2_Token($cookie['access_token'], null, null);
            unset($cookie['access_token']);
            unset($cookie['signature']);
            unset($cookie['issued_at']);
            foreach ($cookie as $key => $value) {
                $this->accessToken->{'set' . $key}($value);
            }
            $storage->set($this->storageKey, $this->accessToken);
        }
    }

    /**
     * @return bool
     */
    public function hasAccessToken()
    {
        return (bool) $this->accessToken;
    }
}