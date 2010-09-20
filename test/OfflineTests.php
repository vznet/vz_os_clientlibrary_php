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
 
/*
 * This file is meant to be run through a php command line, not called
 * directly through the web browser. To run these tests from the command line:
 * # cd /path/to/client
 * # phpunit test/OfflineTests.php
 */

require_once '__init__.php';

class OfflineTests {
  public static function suite() {
    $types = array('common', 'auth', 'io', 'model', 'providers', 'service',
                   'storage', 'logger');
    $suite = new PHPUnit_Framework_TestSuite();
    $suite->setName('OfflineTests');
    $path = realpath(dirname(__FILE__));
    foreach ($types as $type) {
      $suite->addTestFiles(glob("$path/{$type}/*Test.php"));
    }
    return $suite;
  }
}