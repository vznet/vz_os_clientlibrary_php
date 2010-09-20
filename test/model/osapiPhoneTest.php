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
 * osapiPhone test case.
 */
class osapiPhoneTest extends PHPUnit_Framework_TestCase {
  
  /**
   * @var osapiPhone
   */
  private $osapiPhone;

  /**
   * Prepares the environment before running a test.
   */
  protected function setUp() {
    parent::setUp();
    $this->osapiPhone = new osapiPhone('number', 'type');
  }

  /**
   * Cleans up the environment after running a test.
   */
  protected function tearDown() {
    $this->osapiPhone = null;
    parent::tearDown();
  }

  /**
   * Tests osapiPhone->getNumber()
   */
  public function testGetNumber() {
    $this->assertEquals('number', $this->osapiPhone->getValue());
  }

  /**
   * Tests osapiPhone->getType()
   */
  public function testGetType() {
    $this->assertEquals('type', $this->osapiPhone->getType());
  }

  /**
   * Tests osapiPhone->setNumber()
   */
  public function testSetNumber() {
    $this->osapiPhone->setValue('NUMBER');
    $this->assertEquals('NUMBER', $this->osapiPhone->getValue());
  }

  /**
   * Tests osapiPhone->setType()
   */
  public function testSetType() {
    $this->osapiPhone->setType('TYPE');
    $this->assertEquals('TYPE', $this->osapiPhone->type);
  }
}
