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

class osapiOAuth2 extends osapiAuth
{
    /**
     * @var string
     */
    protected $consumerToken;

    /**
     * @var OAuth2_Token
     */
    protected $accessToken;

    /**
     * @var osapiStorage
     */
    protected $storage;

    /**
     * @var string
     */
    protected $storageKey;

    /**
     * @var OAuth2_Service
     */
    protected $service;

    /**
     * url to portable contacts url for current user
     * 
     * @var string
     */
    protected $userId;

    /**
     *
     * @param string $consumerKey
     * @param string $consumerSecret
     * @param osapiStorage $storage
     * @param osapiProvider $provider
     * @param string $callbackUrl
     * @param string $scope optional
     * @param string $state optional
     * @param string $localUserid optional
     */
    public function __construct($consumerKey,
            $consumerSecret,
            osapiStorage $storage,
            osapiProvider $provider,
            $callbackUrl,
            $scope = null,
            $state = null,
            $localUserId = null) {
        $this->storage = $storage;
        $this->storageKey = 'OAuth2:' . $consumerKey . ':' . $localUserId;
        // configuration of client credentials
        $client = new OAuth2_Client(
                $consumerKey,
                $consumerSecret,
                $callbackUrl);

        // configuration of service
        $configuration = new OAuth2_Service_Configuration(
                $provider->authorizeUrl,
                $provider->accessTokenUrl);

        $this->service = new OAuth2_Service($client, $configuration, $storage, $this->storageKey, $scope, $state);

        $this->consumerToken = new OAuthConsumer($consumerKey, $consumerSecret, null);
        $this->accessToken = null;
    }

    /*
     * @param string $method the method (get/put/delete/post)
     * @param string $url the url to sign (http://site/social/rest/people/1/@me)
     * @param array $params the params that should be appended to the url (count=20 fields=foo, etc)
     * @param string $postBody for POST/PUT requests, the postBody is included in the signature
     * @param array $headers
     * @return string the signed url
     */
    public function sign($method, $url, $params = array(), $postBody = false, &$headers = array()) {
        $params['oauth_token'] = $this->accessToken->getAccessToken();
        return $url . '?' . http_build_query($params);
    }

    /**
     * @return OAuth2_Token
     */
    public function getAccessToken() {
        return $this->accessToken;
    }
    
    /**
     *
     * @param string $consumerKey
     * @param string $consumerSecret
     * @param osapiStorage $storage
     * @param osapiProvider $provider
     * @param string $callbackUrl
     * @param string $scope optional
     * @param array $fields optional
     * @param string $message optional
     * @param string $state optional
     * @param string $localUserId optional
     * @return osapiOAuth2
     */
    public static function performOAuthLogin($consumerKey,
            $consumerSecret,
            osapiStorage $storage,
            osapiProvider $provider,
            $callbackUrl,
            $scope = null,
            array $fields = array(),
            $message = '',
            $state = null,
            $localUserId = null) {
        $auth = new osapiOAuth2($consumerKey,
                $consumerSecret,
                $storage,
                $provider,
                $callbackUrl,
                $scope,
                $state,
                $localUserId);
        if (($token = $storage->get($auth->storageKey)) !== false) {
          $auth->accessToken = $token;
          if ($token->getSignature() && $token->getIssued_at()) {
                $this->verifySignature(
                        $token->getSignature(),
                        $consumerSecret,
                        $token->getAccess_token(),
                        $token->getIssued_at(),
                        $token->getUser_id() ? $token->getUser_id() : '',
                        ''
                );
                $auth->userId = $token->getUser_id();
            }
        } else {
          if (isset($_GET['code'])) {
            $auth->service->getAccessToken();
            $auth->redirectToOriginal();
          } else if (isset($_GET['error'])) {
            throw new osapiException($_GET['error'] . (isset($_GET['error_description']) ? (' ' . $_GET['error_description']) : ''), null, null);
          } else {
            $auth->storeCallbackUrl();
            $auth->service->authorize($fields, $message);
          }
        }

        return $auth;
    }

    /**
     *
     */
    public function storeCallbackUrl() {
        $this->storage->set($this->storageKey.":originalUrl", 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }

    /**
     * Redirects the page to the original url, prior to OAuth initialization. This removes the extraneous
     * parameters from the URL, adding latency, but increasing user-friendliness.
     */
    public function redirectToOriginal() {
       $originalUrl = $this->storage->get($this->storageKey.":originalUrl");
        if ($originalUrl && !empty($originalUrl)) {
          // The url was retrieve successfully, remove the temporary original url from storage, and redirect
          $this->storage->delete($this->storageKey.":originalUrl");
          header("Location: $originalUrl");
        }
    }

    /**
     *
     * @param string $retrievedSignature
     * @param string $consumerSecret
     * @param string $accessToken
     * @param int $issuedAt
     * @param string $userId
     * @param int $expiresIn
     */
    protected function verifySignature($retrievedSignature,
            $consumerSecret, $accessToken, $issuedAt, $userId, $expiresIn) {
        $baseString = $accessToken . $issuedAt . $userId . $expiresIn;

        $signature = base64_encode(hash_hmac('sha1', $baseString, $consumerSecret, true));
        if ($signature !== $retrievedSignature) {
            throw new osapiException('invalid signature ' . $signature . ' ' . $retrievedSignature);
        }
    }
}