<?php
/**
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

class OnlineTestCase extends PHPUnit_Framework_TestCase {
  public function __get($name) {
    if (array_key_exists($name, $this->sharedFixture)) {
      return $this->sharedFixture[$name];
    }
  }

  protected function assertSupportedMethod($method) {
    if (is_array($this->suite->UNSUPPORTED_METHODS) && in_array($method, $this->suite->UNSUPPORTED_METHODS)) {
      $this->markTestSkipped('The ' . $method . ' method is not supported by ' . $this->suite->getName());
    }
  }

  public function getName($withDataSet = TRUE) {
    return $this->suite->getName() . ' - ' . parent::getName($withDataSet);
  } 
}