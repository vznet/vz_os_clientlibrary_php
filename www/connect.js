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
        var node = document.getElementById('vz_connect');
        node.parentNode.removeChild(node);
        node = document.getElementById('vz_popup');
        node.parentNode.removeChild(node);
        window.location.reload();
    },
    call: function() {
        var params = '';
        params += 'type=user_agent';
        params += '&client_id=' + this.clientId;
        params += '&redirect_uri=' + encodeURIComponent(this.callbackUrl);
        params += '&response_type=token';
        params += '&scope=openid';
//        var url = '/OAuth2/Authorize/?' + params;
//        var director = 'http://auth.static.svz-pcn-107:8063/director.html?path=' + encodeURIComponent(url);
//        director += '&avz_host=trunk.avz.svz-pcn-107:8181&svz_host=trunk.svz.svz-pcn-107:8181&pvz_host=trunk.pvz.svz-pcn-107:8181';
        var director = 'https://secure.studivz.net/OAuth2/Authorize/?' + params;
        var div = document.createElement('div');
        div.className = 'vz_connect';
        div.id = 'vz_connect';
        var iframe = document.createElement('iframe');
        iframe.className = 'vz_popup';
        iframe.id = 'vz_popup';
        document.body.appendChild(div);
        document.body.appendChild(iframe);
        iframe.contentWindow.location.replace(director);
    }
};