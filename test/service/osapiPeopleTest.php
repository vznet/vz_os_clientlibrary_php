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
 * osapiPeople test case.
 */
class osapiPeopleTest extends PHPUnit_Framework_TestCase {
  
  private $userId;
  private $userName;
  private $isOwner;
  private $isViewer;
  private $url;
  private $osapi;
  
  /**
   * Prepares the environment before running a test.
   */
  protected function setUp() {
    parent::setUp();
    $this->userId = '03067092798963641994';
    $this->userName = 'API DWH';
    $this->isOwner = 'true';
    $this->isViewer = 'true';
    $this->url = 'http://localhost/profile/' . $this->userId;
    $httpProvider = new osapiLocalHttpProvider();
    $provider = new osapiGoogleProvider($httpProvider);
    $this->osapi = new osapi($provider, new osapiOAuth2Legged("orkut.com:623061448914", "uynAeXiWTisflWX99KU1D2q5", $this->userId));
  }
  
  /**
   * Cleans up the environment after running a test.
   */
  protected function tearDown() {
    $this->osapi = null;
    parent::tearDown();
  }
  
  /**
   * Tests osapiPeople->get()
   */
  public function testGet() {
    $response = '[{"id":"self","data":{"isOwner":' . $this->isOwner . ',"isViewer":' . $this->isViewer . ',"displayName":"' . $this->userName . '","id":"' . $this->userId . '","profileUrl":"' . $this->url . '"}}]';
    $this->osapi->provider->httpProvider->addResponse($response);
    
    $batch = $this->osapi->newBatch();
    $batch->add($this->osapi->people->get(array('userId' => $this->userId, 'groupId' => '@self')), 'self');
    
    $result = $batch->execute();
    
    $person = $result['self'];
    $this->assertEquals($this->userId, $person->getId());
    $this->assertEquals($this->userName, $person->getDisplayName());
    $this->assertEquals($this->userName, $person->getName());
    $this->assertEquals($this->isOwner, $person->getIsOwner());
    $this->assertEquals($this->isViewer, $person->getIsViewer());
    $this->assertEquals($this->url, $person->getProfileUrl());
  }
  
  /**
   * Tests osapiPeople->update()
   */
  public function testUpdate() {    
    $batch = $this->osapi->newBatch();
    
    $this->setExpectedException('osapiException');
    $batch->add($this->osapi->people->update(array('userId' => $this->userId, 'groupId' => '@self')), 'self');
  }
  
  /**
   * Tests osapiPeople->delete()
   */
  public function testDelete() {    
    $batch = $this->osapi->newBatch();
    
    $this->setExpectedException('osapiException');
    $batch->add($this->osapi->people->delete(array('userId' => $this->userId, 'groupId' => '@self')), 'self');
  }
  
  /**
   * Tests osapiPeople->create()
   */
  public function testCreate() {    
    $batch = $this->osapi->newBatch();
    
    $this->setExpectedException('osapiException');
    $batch->add($this->osapi->people->create(array('userId' => $this->userId, 'groupId' => '@self')), 'self');
  }
}
