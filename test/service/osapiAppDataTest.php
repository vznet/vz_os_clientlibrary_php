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
 * osapiAppData test case.
 */
class osapiAppDataTest extends PHPUnit_Framework_TestCase {
  
  private $userId;
  private $time;
  private $osapi;
  
  /**
   * Prepares the environment before running a test.
   */
  protected function setUp() {
    parent::setUp();
    $this->userId = '03067092798963641994';
    $this->time = '1234567890';
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
   * Tests osapiAppData->get()
   */
  public function testGet() {
    $response = '[{"id":"appdataSelf","data":{"' . $this->userId . '":{"lastloaded":"' . $this->time . '"}}}]';
    $this->osapi->provider->httpProvider->addResponse($response);
    
    $batch = $this->osapi->newBatch();
    $batch->add($this->osapi->appdata->get(array('userId' => $this->userId, 'groupId' => '@self', 'appId' => '3', 'fields' => array('*'))), 'appdataSelf');
    
    $result = $batch->execute();

    $this->assertEquals(1, sizeof($result['appdataSelf']));
    
    $appdata = $result['appdataSelf'][$this->userId];
    $this->assertEquals($this->time, $appdata['lastloaded']);
  }
  
  /**
   * Tests osapiAppData->get()
   */
  public function testGetUserIdError() {    
    $batch = $this->osapi->newBatch();
    
    $this->setExpectedException('osapiException');
    $batch->add($this->osapi->appdata->get(array('groupId' => '@self', 'appId' => '3', 'fields' => array('*'))), 'appdataSelf');
  }
  
  /**
   * Tests osapiAppData->get()
   */
  public function testGetGroupIdError() {
    $batch = $this->osapi->newBatch();
    
    $this->setExpectedException('osapiException');
    $batch->add($this->osapi->appdata->get(array('userId' => $this->userId, 'appId' => '3', 'fields' => array('*'))), 'appdataSelf');
  }
  
  /**
   * Tests osapiAppData->get()
   */
  public function testGetAppIdError() {
    $batch = $this->osapi->newBatch();
    
    $this->setExpectedException('osapiException');
    $batch->add($this->osapi->appdata->get(array('userId' => $this->userId, 'groupId' => '@self', 'fields' => array('*'))), 'appdataSelf');
  }
  
  /**
   * Tests osapiAppData->get()
   */
  public function testGetNonStringFieldsError() {
    $batch = $this->osapi->newBatch();
    
    $this->setExpectedException('osapiException');
    $batch->add($this->osapi->appdata->get(array('userId' => $this->userId, 'groupId' => '@self', 'appId' => '3', 'fields' => "*")), 'appdataSelf');
  }
  
  /**
   * Tests osapiAppData->get()
   */
  public function testGetInvalidFieldsError() {
    $batch = $this->osapi->newBatch();
    
    $this->setExpectedException('osapiException');
    $batch->add($this->osapi->appdata->get(array('userId' => $this->userId, 'groupId' => '@self', 'appId' => '3', 'fields' => array('&'))), 'appdataSelf');
  }
  
  /**
   * Tests osapiAppData->create()
   */
  public function testCreate() {
    $response = '[{"id":"createAppData","data":{}}]';
    $this->osapi->provider->httpProvider->addResponse($response);
    
    $batch = $this->osapi->newBatch();
    $batch->add($this->osapi->appdata->create(array('userId' => $this->userId, 'groupId' => '@self', 'appId' => '3', 'data' => array('osapiFoo1' => 'newBar1'))), 'createAppData');
    $result = $batch->execute();

    $canonicalBody = '[{"method":"appdata.create","params":{"userId":["' . $this->userId . '"],"groupId":"@self","appId":"3","data":{"osapiFoo1":"newBar1"}},"id":"createAppData"}]';
    $lastRequest = $this->osapi->provider->httpProvider->getLastRequest();
    $this->assertEquals($canonicalBody, $lastRequest['body']);
  }
  
  /**
   * Tests osapiAppData->update()
   */
  public function testUpdate() {
    $response = '[{"id":"updateAppData","data":{}}]';
    $this->osapi->provider->httpProvider->addResponse($response);
    
    $storage = new osapiFileStorage('/tmp/osapi');
    
    $batch = $this->osapi->newBatch();
    $batch->add($this->osapi->appdata->update(array('userId' => $this->userId, 'groupId' => '@self', 'appId' => '3', 'data' => array('osapiFoo1' => 'newBar1'))), 'updateAppData');
    $result = $batch->execute();

    $canonicalBody = '[{"method":"appdata.update","params":{"userId":["' . $this->userId . '"],"groupId":"@self","appId":"3","data":{"osapiFoo1":"newBar1"}},"id":"updateAppData"}]';
    $lastRequest = $this->osapi->provider->httpProvider->getLastRequest();
    $this->assertEquals($canonicalBody, $lastRequest['body']);
  }
  
  /**
   * Tests osapiAppData->delete()
   */
  public function testDelete() {
    $response = '[{"id":"deleteAppData","data":{}}]';
    $this->osapi->provider->httpProvider->addResponse($response);
    
    $batch = $this->osapi->newBatch();
    $batch->add($this->osapi->appdata->delete(array('userId' => $this->userId, 'groupId' => '@self', 'appId' => '3', 'fields' => array('*'))), 'deleteAppData');
    $result = $batch->execute();

    $canonicalBody = '[{"method":"appdata.delete","params":{"userId":["' . $this->userId . '"],"groupId":"@self","appId":"3","fields":["*"]},"id":"deleteAppData"}]';
    $lastRequest = $this->osapi->provider->httpProvider->getLastRequest();
    $this->assertEquals($canonicalBody, $lastRequest['body']);
  }
}