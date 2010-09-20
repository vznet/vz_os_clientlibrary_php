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

/**
 * osapiEmail test case.
 */
class osapiEmailTest extends PHPUnit_Framework_TestCase {
  
  /**
   * @var osapiEmail
   */
  private $osapiEmail;

  /**
   * Prepares the environment before running a test.
   */
  protected function setUp() {
    parent::setUp();
    $this->osapiEmail = new osapiEmail('ADDRESS', 'TYPE');
  }

  /**
   * Cleans up the environment after running a test.
   */
  protected function tearDown() {
    $this->osapiEmail = null;
    parent::tearDown();
  }

  /**
   * Tests osapiEmail->getType()
   */
  public function testGetType() {
    $this->assertEquals('TYPE', $this->osapiEmail->getType());
  }

  /**
   * Tests osapiEmail->setAddress()
   */
  public function testSetAddress() {
    $this->osapiEmail->setValue('address');
    $this->assertEquals('address', $this->osapiEmail->getValue());
  }

  /**
   * Tests osapiEmail->setType()
   */
  public function testSetType() {
    $this->osapiEmail->setType('type');
    $this->assertEquals('type', $this->osapiEmail->getType());
  }
}
