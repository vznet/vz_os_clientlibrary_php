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
 * osapiBodyType test case.
 */
class osapiBodyTypeTest extends PHPUnit_Framework_TestCase {
  
  /**
   * @var osapiBodyType
   */
  private $osapiBodyType;

  /**
   * Prepares the environment before running a test.
   */
  protected function setUp() {
    parent::setUp();
    $this->osapiBodyType = new osapiBodyType();
    $this->osapiBodyType->build = 'BUILD';
    $this->osapiBodyType->eyeColor = 'EYECOLOR';
    $this->osapiBodyType->hairColor = 'HAIRCOLOR';
    $this->osapiBodyType->height = 'HEIGHT';
    $this->osapiBodyType->weight = 'WEIGHT';
  }

  /**
   * Cleans up the environment after running a test.
   */
  protected function tearDown() {
    $this->osapiBodyType = null;
    parent::tearDown();
  }

  /**
   * Tests osapiBodyType->getBuild()
   */
  public function testGetBuild() {
    $this->assertEquals('BUILD', $this->osapiBodyType->getBuild());
  }

  /**
   * Tests osapiBodyType->getEyeColor()
   */
  public function testGetEyeColor() {
    $this->assertEquals('EYECOLOR', $this->osapiBodyType->getEyeColor());
  }

  /**
   * Tests osapiBodyType->getHairColor()
   */
  public function testGetHairColor() {
    $this->assertEquals('HAIRCOLOR', $this->osapiBodyType->getHairColor());
  }

  /**
   * Tests osapiBodyType->getHeight()
   */
  public function testGetHeight() {
    $this->assertEquals('HEIGHT', $this->osapiBodyType->getHeight());
  }

  /**
   * Tests osapiBodyType->getWeight()
   */
  public function testGetWeight() {
    $this->assertEquals('WEIGHT', $this->osapiBodyType->getWeight());
  }

  /**
   * Tests osapiBodyType->setBuild()
   */
  public function testSetBuild() {
    $this->osapiBodyType->setBuild('build');
    $this->assertEquals('build', $this->osapiBodyType->getBuild());
  }

  /**
   * Tests osapiBodyType->setEyeColor()
   */
  public function testSetEyeColor() {
    $this->osapiBodyType->setEyeColor('eyecolor');
    $this->assertEquals('eyecolor', $this->osapiBodyType->getEyeColor());
  }

  /**
   * Tests osapiBodyType->setHairColor()
   */
  public function testSetHairColor() {
    $this->osapiBodyType->setHairColor('haircolor');
    $this->assertEquals('haircolor', $this->osapiBodyType->getHairColor());
  }

  /**
   * Tests osapiBodyType->setHeight()
   */
  public function testSetHeight() {
    $this->osapiBodyType->setHeight('height');
    $this->assertEquals('height', $this->osapiBodyType->getHeight());
  }

  /**
   * Tests osapiBodyType->setWeight()
   */
  public function testSetWeight() {
    $this->osapiBodyType->setWeight('weight');
    $this->assertEquals('weight', $this->osapiBodyType->getWeight());
  }
}
