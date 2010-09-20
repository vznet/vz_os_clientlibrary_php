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
 * osapiOrganization test case.
 */
class osapiOrganizationTest extends PHPUnit_Framework_TestCase {
  
  /**
   * @var osapiOrganization
   */
  private $osapiOrganization;

  /**
   * Prepares the environment before running a test.
   */
  protected function setUp() {
    parent::setUp();
    
    $this->osapiOrganization = new osapiOrganization('NAME');
    $this->osapiOrganization->address = 'ADDRESS';
    $this->osapiOrganization->description = 'DESCRIPTION';
    $this->osapiOrganization->endDate = 'ENDDATE';
    $this->osapiOrganization->field = 'FIELD';
    $this->osapiOrganization->salary = 'SALARY';
    $this->osapiOrganization->startDate = 'STARTDATE';
    $this->osapiOrganization->subField = 'SUBFIELD';
    $this->osapiOrganization->title = 'TITLE';
    $this->osapiOrganization->webpage = 'WEBPAGE';
  }

  /**
   * Cleans up the environment after running a test.
   */
  protected function tearDown() {
    $this->osapiOrganization = null;
    parent::tearDown();
  }

  /**
   * Tests osapiOrganization->getAddress()
   */
  public function testGetAddress() {
    $this->assertEquals('ADDRESS', $this->osapiOrganization->getAddress());
  }

  /**
   * Tests osapiOrganization->getDescription()
   */
  public function testGetDescription() {
    $this->assertEquals('DESCRIPTION', $this->osapiOrganization->getDescription());
  }

  /**
   * Tests osapiOrganization->getEndDate()
   */
  public function testGetEndDate() {
    $this->assertEquals('ENDDATE', $this->osapiOrganization->getEndDate());
  }

  /**
   * Tests osapiOrganization->getField()
   */
  public function testGetField() {
    $this->assertEquals('FIELD', $this->osapiOrganization->getField());
  }

  /**
   * Tests osapiOrganization->getName()
   */
  public function testGetName() {
    $this->assertEquals('NAME', $this->osapiOrganization->getName());
  }

  /**
   * Tests osapiOrganization->getSalary()
   */
  public function testGetSalary() {
    $this->assertEquals('SALARY', $this->osapiOrganization->getSalary());
  }

  /**
   * Tests osapiOrganization->getStartDate()
   */
  public function testGetStartDate() {
    $this->assertEquals('STARTDATE', $this->osapiOrganization->getStartDate());
  }

  /**
   * Tests osapiOrganization->getSubField()
   */
  public function testGetSubField() {
    $this->assertEquals('SUBFIELD', $this->osapiOrganization->getSubField());
  }

  /**
   * Tests osapiOrganization->getTitle()
   */
  public function testGetTitle() {
    $this->assertEquals('TITLE', $this->osapiOrganization->getTitle());
  }

  /**
   * Tests osapiOrganization->getWebpage()
   */
  public function testGetWebpage() {
    $this->assertEquals('WEBPAGE', $this->osapiOrganization->getWebpage());
  }

  /**
   * Tests osapiOrganization->setAddress()
   */
  public function testSetAddress() {
    $this->osapiOrganization->setAddress('address');
    $this->assertEquals('address', $this->osapiOrganization->address);
  }

  /**
   * Tests osapiOrganization->setDescription()
   */
  public function testSetDescription() {
    $this->osapiOrganization->setDescription('description');
    $this->assertEquals('description', $this->osapiOrganization->description);
  }

  /**
   * Tests osapiOrganization->setEndDate()
   */
  public function testSetEndDate() {
    $this->osapiOrganization->setEndDate('enddate');
    $this->assertEquals('enddate', $this->osapiOrganization->endDate);
  }

  /**
   * Tests osapiOrganization->setField()
   */
  public function testSetField() {
    $this->osapiOrganization->setField('field');
    $this->assertEquals('field', $this->osapiOrganization->field);
  }

  /**
   * Tests osapiOrganization->setName()
   */
  public function testSetName() {
    $this->osapiOrganization->setName('name');
    $this->assertEquals('name', $this->osapiOrganization->name);
  }

  /**
   * Tests osapiOrganization->setSalary()
   */
  public function testSetSalary() {
    $this->osapiOrganization->setSalary('salary');
    $this->assertEquals('salary', $this->osapiOrganization->salary);
  }

  /**
   * Tests osapiOrganization->setStartDate()
   */
  public function testSetStartDate() {
    $this->osapiOrganization->setStartDate('startdate');
    $this->assertEquals('startdate', $this->osapiOrganization->startDate);
  }

  /**
   * Tests osapiOrganization->setSubField()
   */
  public function testSetSubField() {
    $this->osapiOrganization->setSubField('subfield');
    $this->assertEquals('subfield', $this->osapiOrganization->subField);
  }

  /**
   * Tests osapiOrganization->setTitle()
   */
  public function testSetTitle() {
    $this->osapiOrganization->setTitle('title');
    $this->assertEquals('title', $this->osapiOrganization->title);
  }

  /**
   * Tests osapiOrganization->setWebpage()
   */
  public function testSetWebpage() {
    $this->osapiOrganization->setWebpage('webpage');
    $this->assertEquals('webpage', $this->osapiOrganization->webpage);
  }
}
