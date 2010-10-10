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

var vz = {};

vz.connect = {
    cookieKey: '',
    clientId: '',
    callbackUrl: '',

    setCookie: function(parameters) {
        parameters = parameters.split('+').join('%2b');
        document.cookie = this.cookieKey + '=' + encodeURIComponent(parameters) + ';path=/';
        window.location.reload();
    },
    call: function(fields, message, state) {
        var params = '';
        params += 'type=user_agent';
        params += '&client_id=' + this.clientId;
        params += '&redirect_uri=' + encodeURIComponent(this.callbackUrl);
        params += '&response_type=token';
        params += '&scope=openid';
        if (fields && typeof(fields) === 'object') {
            params += '&fields=' + encodeURIComponent(fields.join(','));
        }
        if (message) {
            params += '&message=' + encodeURIComponent(message);
        }
        if (state) {
            params += '&state=' + encodeURIComponent(state);
        }
        var director = 'https://secure.studivz.net/OAuth2/Authorize/?' + params;
        window.open(director, '_blank', 'width=570,height=700');
    }
};