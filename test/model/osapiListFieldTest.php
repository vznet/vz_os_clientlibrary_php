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
 * osapiListField test case.
 */
class osapiListFieldTest extends PHPUnit_Framework_TestCase {
  
  /**
   * @var osapiListField
   */
  private $osapiListField;
  private $value;
  private $type;
  private $primary;

  /**
   * Prepares the environment before running a test.
   */
  protected function setUp() {
    parent::setUp();
    $this->value = true;
    $this->type = true;
    $this->primary = true;
    $this->osapiListField = new osapiListField($this->value, $this->type, $this->primary);
  }

  /**
   * Cleans up the environment after running a test.
   */
  protected function tearDown() {
    $this->osapiListField = null;
    parent::tearDown();
  }

  /**
   * Tests osapiListField->getValue()
   */
  public function testGetValue() {
    $this->assertEquals($this->value, $this->osapiListField->getValue());
  }

  /**
   * Tests osapiListField->getType()
   */
  public function testGetType() {
    $this->assertEquals($this->type, $this->osapiListField->getType());
  }
  
  /**
   * Tests osapiListField->getPrimary()
   */
  public function testGetPrimary() {
    $this->assertEquals($this->primary, $this->osapiListField->getPrimary());
  }
  
  /**
   * Tests osapiListField->getPrimarySubValue()
   */
  public function testGetPrimarySubValue() {
    $this->assertEquals($this->value, $this->osapiListField->getPrimarySubValue());
  }
  
  /**
   * Tests osapiListField->setValue()
   */
  public function testSetValue() {
    $this->osapiListField->setValue(true);
    $this->assertTrue($this->osapiListField->value);
  }
  
  /**
   * Tests osapiListField->setType()
   */
  public function testSetType() {
    $this->osapiListField->setType(true);
    $this->assertTrue($this->osapiListField->type);
  }
  
  /**
   * Tests osapiListField->setPrimary()
   */
  public function testSetPrimary() {
    $this->osapiListField->setPrimary(true);
    $this->assertTrue($this->osapiListField->primary);
  }
}
