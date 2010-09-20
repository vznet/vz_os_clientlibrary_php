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
 * osapiUrl test case.
 */
class osapiUrlTest extends PHPUnit_Framework_TestCase {
  
  /**
   * @var osapiUrl
   */
  private $osapiUrl;

  /**
   * Prepares the environment before running a test.
   */
  protected function setUp() {
    parent::setUp();
    $this->osapiUrl = new osapiUrl('A', 'T', 'L');
  }

  /**
   * Cleans up the environment after running a test.
   */
  protected function tearDown() {
    $this->osapiUrl = null;
    parent::tearDown();
  }

  /**
   * Tests osapiUrl->getAddress()
   */
  public function testGetAddress() {
    $this->assertEquals('A', $this->osapiUrl->getValue());
  }

  /**
   * Tests osapiUrl->getLinkText()
   */
  public function testGetLinkText() {
    $this->assertEquals('L', $this->osapiUrl->getLinkText());
  }

  /**
   * Tests osapiUrl->getType()
   */
  public function testGetType() {
    $this->assertEquals('T', $this->osapiUrl->getType());
  }

  /**
   * Tests osapiUrl->setAddress()
   */
  public function testSetAddress() {
    $this->osapiUrl->setValue('a');
    $this->assertEquals('a', $this->osapiUrl->getValue());
  }

  /**
   * Tests osapiUrl->setLinkText()
   */
  public function testSetLinkText() {
    $this->osapiUrl->setLinkText('l');
    $this->assertEquals('l', $this->osapiUrl->getLinkText());
  }

  /**
   * Tests osapiUrl->setType()
   */
  public function testSetType() {
    $this->osapiUrl->setType('t');
    $this->assertEquals('t', $this->osapiUrl->type);
  }
}