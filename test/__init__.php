<?php
/**
 * Copyright 2009 Google Inc.
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

// Report everything
ini_set('error_reporting', E_ALL | E_STRICT);

// Use a default timezone or else strtotime will raise errors
date_default_timezone_set('America/Los_Angeles');

 // Include paths to the library and test folder
set_include_path(get_include_path()
    . PATH_SEPARATOR . realpath(dirname(__FILE__))
    . PATH_SEPARATOR . realpath(dirname(__FILE__) . '/../src'));

require_once 'osapi.php';

// Enable logger.
osapiLogger::setLevel(osapiLogger::INFO);
osapiLogger::setAppender(new osapiFileAppender("/tmp/logs/osapi.log"));
