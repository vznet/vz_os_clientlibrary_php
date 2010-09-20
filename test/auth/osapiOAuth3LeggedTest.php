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
 * osapiOAuth3Legged test case.
 */
class osapiOAuth3LeggedTest extends PHPUnit_Framework_TestCase {
  
  /**
   * @var osapiOAuth3Legged
   */
  private $osapiOAuth3Legged;
  private $consumerKey;
  private $consumerSecret;
  private $storage;
  private $provider;
  private $localUserId;
  private $userId;
  
  /**
   * Prepares the environment before running a test.
   */
  protected function setUp() {
    parent::setUp();
    $this->consumerKey = 'KEY';
    $this->consumerSecret = 'SECRET';
    $this->storage = new osapiFileStorage('/tmp/osapi');
    $this->provider = new osapiLocalPartuzaProvider();
    //$this->consumerKey = 'ddf4f9f7-f8e7-c7d9-afe4-c6e6c8e6eec4';
    //$this->consumerSecret = '6f0e1a11ac45caed32d699f9e92ae959';
    //$this->provider = new osapiPartuzaProvider();
    $this->localUserId = null;//'LOCAL_USER';
    $this->userId = null;//'USER';
    $this->osapiOAuth3Legged = new osapiOAuth3Legged($this->consumerKey, $this->consumerSecret, $this->storage, $this->provider, $this->localUserId, $this->userId);
  }

  /**
   * Cleans up the environment after running a test.
   */
  protected function tearDown() {
    parent::tearDown();
  }
  
  /**
   * Tests osapiOAuth3Legged->__construct()
   */
  public function test__construct() {
    
  }
  
  public function testObtainRequestTokenSuccess() {
    $key = 'f3edfbd4-d8c2-c8cb-acc6-eadbf3d8e9f0';
    $secret = '733762fe20e98af4ad0597a61588b0b0';
    $response = array('http_code' => 200, 'data' => 'oauth_token=' . $key . '&oauth_token_secret=' . $secret);
    
    $stub = $this->getMock('osapiOAuth3Legged', array('requestRequestToken'), array($this->consumerKey, $this->consumerSecret, $this->storage,
        $this->provider, $this->localUserId, $this->userId));
    $stub->expects($this->any())
         ->method('requestRequestToken')
         ->will($this->returnValue($response));
    
    $token = $stub->obtainRequestToken($this->storage, $this->provider, "http://localhost");
    $this->assertEquals($key, $token->key);
    $this->assertEquals($secret, $token->secret);
  }
  
  public function testObtainRequestTokenFail() {
    $response = array('http_code' => 500, 'data' => 'fail');
    
    $stub = $this->getMock('osapiOAuth3Legged', array('requestRequestToken'), array($this->consumerKey, $this->consumerSecret, $this->storage,
        $this->provider, $this->localUserId, $this->userId));
    $stub->expects($this->any())
         ->method('requestRequestToken')
         ->will($this->returnValue($response));
         
    $this->setExpectedException('osapiException');
    $token = $stub->obtainRequestToken($this->storage, $this->provider, "http://localhost");
  }
  
  public function testUpgradeRequestTokenSuccess() {
    $key = 'f3edfbd4-d8c2-c8cb-acc6-eadbf3d8e9f0';
    $secret = '733762fe20e98af4ad0597a61588b0b0';
    $response = array('http_code' => 200, 'data' => 'oauth_token=' . $key . '&oauth_token_secret=' . $secret);
    
    $stub = $this->getMock('osapiOAuth3Legged', array('requestAccessToken'), array($this->consumerKey, $this->consumerSecret, $this->storage,
        $this->provider, $this->localUserId, $this->userId));
    $stub->expects($this->any())
         ->method('requestAccessToken')
         ->will($this->returnValue($response));
    
    $token = $stub->upgradeRequestToken($this->storage, $this->provider, 'TOKEN', 'SECRET');
    $this->assertEquals($key, $token->key);
    $this->assertEquals($secret, $token->secret);
    
    $storageKey = 'OAuth:' . $this->consumerKey . ':' . $this->userId . ':' . $this->localUserId;
    $storedToken = $this->storage->get($storageKey);
    $this->assertEquals($key, $storedToken->key);
    $this->assertEquals($secret, $storedToken->secret);
  }
  
  public function testUpgradeRequestTokenFail() {
    $response = array('http_code' => 500, 'data' => 'fail');
    
    $stub = $this->getMock('osapiOAuth3Legged', array('requestAccessToken'), array($this->consumerKey, $this->consumerSecret, $this->storage,
        $this->provider, $this->localUserId, $this->userId));
    $stub->expects($this->any())
         ->method('requestAccessToken')
         ->will($this->returnValue($response));
         
    $this->setExpectedException('osapiException');
    $token = $stub->upgradeRequestToken($this->storage, $this->provider, "http://localhost");
  }
}
