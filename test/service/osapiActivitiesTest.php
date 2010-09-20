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
 * osapiActivities test case.
 */
class osapiActivitiesTest extends PHPUnit_Framework_TestCase {
  
  private $userId;
  private $body;
  private $osapi;
  
  /**
   * Prepares the environment before running a test.
   */
  protected function setUp() {
    parent::setUp();
    $this->userId = '03067092798963641994';
    $this->body = 'This is an activity body';
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
   * Tests osapiActivities->get()
   */
  public function testGet() {
    $response = '[{"id":"activities","data":{"startIndex":0,"totalResults":"1","itemsPerPage":10,"list":[{"body":"' . $this->body . '","id":"6302","mediaItems":[],"postedTime":"1234396234","streamTitle":"activities","title":"This is a sample activity","userId":"' . $this->userId . '"}]}}]';
    $this->osapi->provider->httpProvider->addResponse($response);
    
    $batch = $this->osapi->newBatch();
    $batch->add($this->osapi->activities->get(array('userId' => $this->userId, 'groupId' => '@self', 'count' => 10)), 'activities');
    
    $result = $batch->execute();
    
    $this->assertEquals(1, $result['activities']->getTotalResults());
    
    $activities = $result['activities']->getList();
    $this->assertEquals($this->body, $activities[0]->getBody());
    $this->assertEquals($this->userId, $activities[0]->getUserId());
  }
  
  /**
   * Tests osapiActivities->create()
   */
  public function testCreate() {
    $response = '[{"data":null}]';
    $this->osapi->provider->httpProvider->addResponse($response);
    
    $batch = $this->osapi->newBatch();
    $activity = new osapiActivity(null, null);
    $activityBody = 'osapi test activity body';
    $activityTitle = 'osapi test activity at '.time();
    $activity->setTitle($activityTitle);
    $activity->setBody($activityBody);
    $batch->add($this->osapi->activities->create(array('userId' => $this->userId, 'groupId' => '@friends', 'activity' => $activity)));
    $result = $batch->execute();

    $canonicalBody = '[{"method":"activities.create","params":{"userId":["' . $this->userId . '"],"groupId":"@friends","activity":{"body":"' . $activityBody . '","mediaItems":[],"title":"' . $activityTitle . '"},"appId":"@app"},"id":null}]';
    $lastRequest = $this->osapi->provider->httpProvider->getLastRequest();
    $this->assertEquals($canonicalBody, $lastRequest['body']);
  }
  
  /**
   * Tests osapiActivities->update()
   */
  public function testUpdate() {
    $batch = $this->osapi->newBatch();
    
    $this->setExpectedException('osapiException');
    $batch->add($this->osapi->activities->update(array('userId' => $this->userId, 'groupId' => '@friends', 'activity' => 1)), 'update');
  }
  
  /**
   * Tests osapiActivities->delete()
   */
  public function testDelete() {
    $batch = $this->osapi->newBatch();
    
    $this->setExpectedException('osapiException');
    $batch->add($this->osapi->activities->delete(array('userId' => $this->userId, 'groupId' => '@friends', 'activity' => 1)), 'update');
  }
}
