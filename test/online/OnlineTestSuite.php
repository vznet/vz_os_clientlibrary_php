<?php
/**
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * 'License'); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * 'AS IS' BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

abstract class OnlineTestSuite extends PHPUnit_Framework_TestSuite {
  public function __construct() {
    parent::__construct();
    $this->setName(get_class($this));
    $this->addTests();
  }

  public function __get($name) {
    if ($name == 'osapi') {
      return $this->getOsapi();
    }
  }

  abstract protected function getOsapi();

  protected function setUp() {
    $this->sharedFixture = array('suite' => $this);
  }

  protected function tearDown() {
    $this->sharedFixture = NULL;
  }

  protected function addTests() {
    $path = realpath(dirname(__FILE__));
    require_once 'OnlineTestCase.php';
    $onlineTestCaseClass = new ReflectionClass('OnlineTestCase');
    foreach (glob("$path/*Test.php") as $file) {
      if (is_readable($file)) {
        require_once $file;
        $className = str_replace('.php', '', basename($file));
        $class = new ReflectionClass($className);
        if ($class->isSubclassOf($onlineTestCaseClass)) {
          $this->addTestSuite($class);
        }
      }
    }
  }

  public $CONSUMER_KEY = '';
  public $CONSUMER_SECRET = '';
  public $USER_A_ID = '';
  public $USER_A_DISPLAY_NAME = '';
  public $USER_A_EXTENDED_PROFILE_FIELDS = null;
  public $UNSUPPORTED_METHODS = null;
}