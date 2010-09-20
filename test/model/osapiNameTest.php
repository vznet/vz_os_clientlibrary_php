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
 * osapiName test case.
 */
class osapiNameTest extends PHPUnit_Framework_TestCase {
  
  /**
   * @var osapiName
   */
  private $osapiName;
  
  /**
   * @var additionalName
   */
  public $additionalName;
  
  /**
   * @var familyName
   */
  public $familyName;
  
  /**
   * @var givenName
   */
  public $givenName;
  
  /**
   * @var honorificPrefix
   */
  public $honorificPrefix;
  
  /**
   * @var honorificSuffix
   */
  public $honorificSuffix;
  
  /**
   * @var unstructured
   */
  public $unstructured = '';

  /**
   * Prepares the environment before running a test.
   */
  protected function setUp() {
    parent::setUp();
    $this->osapiName = new osapiName($this->unstructured);
  
  }

  /**
   * Cleans up the environment after running a test.
   */
  protected function tearDown() {
    $this->osapiName = null;
    
    parent::tearDown();
  }

  /**
   * Tests osapiName->getAdditionalName()
   */
  public function testGetAdditionalName() {
    $this->osapiName->additionalName = $this->additionalName;
    $this->assertEquals($this->osapiName->getAdditionalName(), $this->additionalName);
  }

  /**
   * Tests osapiName->getFamilyName()
   */
  public function testGetFamilyName() {
    $this->osapiName->familyName = $this->familyName;
    $this->assertEquals($this->osapiName->getFamilyName(), $this->familyName);
  }

  /**
   * Tests osapiName->getGivenName()
   */
  public function testGetGivenName() {
    $this->osapiName->givenName = $this->givenName;
    $this->assertEquals($this->osapiName->getGivenName(), $this->givenName);
  }

  /**
   * Tests osapiName->getHonorificPrefix()
   */
  public function testGetHonorificPrefix() {
    $this->osapiName->honorificPrefix = $this->honorificPrefix;
    $this->assertEquals($this->osapiName->getHonorificPrefix(), $this->honorificPrefix);
  }

  /**
   * Tests osapiName->getHonorificSuffix()
   */
  public function testGetHonorificSuffix() {
    $this->osapiName->honorificSuffix = $this->honorificSuffix;
    $this->assertEquals($this->osapiName->getHonorificSuffix(), $this->honorificSuffix);
  }

  /**
   * Tests osapiName->getUnstructured()
   */
  public function testGetUnstructured() {
    $this->osapiName->unstructured = $this->unstructured;
    $this->assertEquals($this->osapiName->getFormatted(), $this->unstructured);
  }

  /**
   * Tests osapiName->setAdditionalName()
   */
  public function testSetAdditionalName() {
    $this->osapiName->setAdditionalName($this->additionalName);
    $this->assertEquals($this->osapiName->getAdditionalName(), $this->additionalName);
  }

  /**
   * Tests osapiName->setFamilyName()
   */
  public function testSetFamilyName() {
    $this->osapiName->setFamilyName($this->familyName);
    $this->assertEquals($this->osapiName->getFamilyName(), $this->familyName);
  }

  /**
   * Tests osapiName->setGivenName()
   */
  public function testSetGivenName() {
    $this->osapiName->setGivenName($this->givenName);
    $this->assertEquals($this->osapiName->getGivenName(), $this->givenName);
  }

  /**
   * Tests osapiName->setHonorificPrefix()
   */
  public function testSetHonorificPrefix() {
    $this->osapiName->setHonorificPrefix($this->honorificPrefix);
    $this->assertEquals($this->osapiName->getHonorificPrefix(), $this->honorificPrefix);
  
  }

  /**
   * Tests osapiName->setHonorificSuffix()
   */
  public function testSetHonorificSuffix() {
    $this->osapiName->setHonorificSuffix($this->honorificSuffix);
    $this->assertEquals($this->osapiName->getHonorificSuffix(), $this->honorificSuffix);
  }

  /**
   * Tests osapiName->setUnstructured()
   */
  public function testSetUnstructured() {
    $this->osapiName->setFormatted($this->unstructured);
    $this->assertEquals($this->osapiName->getFormatted(), $this->unstructured);
  }
}
