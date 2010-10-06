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

class osapiVzOAuth2Provider extends osapiProvider {
    const STUDIVZ    = 'studivz';
    const MEINVZ     = 'meinvz';
    const SCHUELERVZ = 'schuelervz';
    const SANDBOX    = 'sandbox';

  public function __construct($network = osapiVzOAuth2Provider::STUDIVZ, osapiHttpProvider $httpProvider = null) {
    $platform = 'secure.' . $network . '.net';
    $shindig  = $network . '-opensocial.apivz.net';
    parent::__construct(null,
        "https://" . $platform . "/OAuth2/Authorize/",
        "https://" . $platform . "/OAuth2/AccessToken/",
        "https://" . $shindig . "/social/rest/",
        "https://" . $shindig . "/rpc/", "Vz", true, $httpProvider);
  }
}