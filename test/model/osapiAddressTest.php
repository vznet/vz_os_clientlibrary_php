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
 * osapiAddress test case.
 */
class osapiAddressTest extends PHPUnit_Framework_TestCase {
  
  /**
   * @var osapiAddress
   */
  private $osapiAddress;

  /**
   * Prepares the environment before running a test.
   */
  protected function setUp() {
    parent::setUp();
    $this->osapiAddress = new osapiAddress('UNSTRUCTUREDADDRESS');
    $this->osapiAddress->country = 'COUNTRY';
    $this->osapiAddress->extendedAddress = 'EXTENDEDADDRESS';
    $this->osapiAddress->latitude = 'LATITUDE';
    $this->osapiAddress->longitude = 'LONGITUDE';
    $this->osapiAddress->locality = 'LOCALITY';
    $this->osapiAddress->poBox = 'POBOX';
    $this->osapiAddress->postalCode = 'POSTALCODE';
    $this->osapiAddress->region = 'REGION';
    $this->osapiAddress->streetAddress = 'STREETADDRESS';
    $this->osapiAddress->type = 'TYPE';
  }

  /**
   * Cleans up the environment after running a test.
   */
  protected function tearDown() {
    $this->osapiAddress = null;
    parent::tearDown();
  }

  /**
   * Tests osapiAddress->getCountry()
   */
  public function testGetCountry() {
    $this->assertEquals('COUNTRY', $this->osapiAddress->getCountry());
  }

  /**
   * Tests osapiAddress->getLatitude()
   */
  public function testGetLatitude() {
    $this->assertEquals('LATITUDE', $this->osapiAddress->getLatitude());
  }

  /**
   * Tests osapiAddress->getLocality()
   */
  public function testGetLocality() {
    $this->assertEquals('LOCALITY', $this->osapiAddress->getLocality());
  }

  /**
   * Tests osapiAddress->getLongitude()
   */
  public function testGetLongitude() {
    $this->assertEquals('LONGITUDE', $this->osapiAddress->getLongitude());
  }

  /**
   * Tests osapiAddress->getPostalCode()
   */
  public function testGetPostalCode() {
    $this->assertEquals('POSTALCODE', $this->osapiAddress->getPostalCode());
  }

  /**
   * Tests osapiAddress->getRegion()
   */
  public function testGetRegion() {
    $this->assertEquals('REGION', $this->osapiAddress->getRegion());
  }

  /**
   * Tests osapiAddress->getStreetAddress()
   */
  public function testGetStreetAddress() {
    $this->assertEquals('STREETADDRESS', $this->osapiAddress->getStreetAddress());
  }

  /**
   * Tests osapiAddress->getType()
   */
  public function testGetType() {
    $this->assertEquals('TYPE', $this->osapiAddress->getType());
  }

  /**
   * Tests osapiAddress->getFormatted()
   */
  public function testGetFormatted() {
    $this->assertEquals('UNSTRUCTUREDADDRESS', $this->osapiAddress->getFormatted());
  }

  /**
   * Tests osapiAddress->setCountry()
   */
  public function testSetCountry() {
    $this->osapiAddress->setCountry('country');
    $this->assertEquals('country', $this->osapiAddress->getCountry());
  }

  /**
   * Tests osapiAddress->setLatitude()
   */
  public function testSetLatitude() {
    $this->osapiAddress->setLatitude('latitude');
    $this->assertEquals('latitude', $this->osapiAddress->getLatitude());
  }

  /**
   * Tests osapiAddress->setLocality()
   */
  public function testSetLocality() {
    $this->osapiAddress->setLocality('locality');
    $this->assertEquals('locality', $this->osapiAddress->getLocality());
  }

  /**
   * Tests osapiAddress->setLongitude()
   */
  public function testSetLongitude() {
    $this->osapiAddress->setLongitude('longitude');
    $this->assertEquals('longitude', $this->osapiAddress->getLongitude());
  }

  /**
   * Tests osapiAddress->setPostalCode()
   */
  public function testSetPostalCode() {
    $this->osapiAddress->setPostalCode('postalcode');
    $this->assertEquals('postalcode', $this->osapiAddress->getPostalCode());
  }

  /**
   * Tests osapiAddress->setRegion()
   */
  public function testSetRegion() {
    $this->osapiAddress->setRegion('religion');
    $this->assertEquals('religion', $this->osapiAddress->getRegion());
  }

  /**
   * Tests osapiAddress->setStreetAddress()
   */
  public function testSetStreetAddress() {
    $this->osapiAddress->setStreetAddress('streetaddress');
    $this->assertEquals('streetaddress', $this->osapiAddress->getStreetAddress());
  }

  /**
   * Tests osapiAddress->setType()
   */
  public function testSetType() {
    $this->osapiAddress->setType('type');
    $this->assertEquals('type', $this->osapiAddress->getType());
  }

  /**
   * Tests osapiAddress->setFormatted()
   */
  public function testSetFormatted() {
    $this->osapiAddress->setFormatted('unstructuredaddress');
    $this->assertEquals('unstructuredaddress', $this->osapiAddress->getFormatted());
  }
}
