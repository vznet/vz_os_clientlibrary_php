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
 * osapiActivity test case.
 */
class osapiActivityTest extends PHPUnit_Framework_TestCase {
  
  /**
   * @var osapiActivity
   */
  private $osapiActivity;

  /**
   * Prepares the environment before running a test.
   */
  protected function setUp() {
    parent::setUp();
    $this->osapiActivity = new osapiActivity(1, 1);
  }

  /**
   * Cleans up the environment after running a test.
   */
  protected function tearDown() {
    $this->osapiActivity = null;
    parent::tearDown();
  }

  /**
   * Constructs the test case.
   */
  public function __construct() {}

  /**
   * Tests osapiActivity->__construct()
   */
  public function test__construct() {
    $this->osapiActivity->__construct(1, 1);
  }

  /**
   * Tests osapiActivity->getAppId()
   */
  public function testGetAppId() {
    $this->osapiActivity->setAppId(1);
    $this->assertEquals(1, $this->osapiActivity->getAppId());
  }

  /**
   * Tests osapiActivity->getBody()
   */
  public function testGetBody() {
    $testStr = '<b>test <i>me</i></b>';
    $this->osapiActivity->setBody($testStr);
    $this->assertEquals($testStr, $this->osapiActivity->getBody());
  }

  /**
   * Tests osapiActivity->getBodyId()
   */
  public function testGetBodyId() {
    $bodyId = '123';
    $this->osapiActivity->setBodyId($bodyId);
    $this->assertEquals($bodyId, $this->osapiActivity->getBodyId());
  }

  /**
   * Tests osapiActivity->getExternalId()
   */
  public function testGetExternalId() {
    $extId = '456';
    $this->osapiActivity->setExternalId($extId);
    $this->assertEquals($extId, $this->osapiActivity->getExternalId());
  }

  /**
   * Tests osapiActivity->getId()
   */
  public function testGetId() {
    $this->assertEquals(1, $this->osapiActivity->getId());
  }

  /**
   * Tests osapiActivity->getMediaItems()
   */
  public function testGetMediaItems() {
    $mediaItems = array('foo' => 'bar');
    $this->osapiActivity->setMediaItems($mediaItems);
    $this->assertEquals($mediaItems, $this->osapiActivity->getMediaItems());
  }

  /**
   * Tests osapiActivity->getPostedTime()
   */
  public function testGetPostedTime() {
    $time = time();
    $this->osapiActivity->setPostedTime($time);
    $this->assertEquals($time, $this->osapiActivity->getPostedTime());
  }

  /**
   * Tests osapiActivity->getPriority()
   */
  public function testGetPriority() {
    $priority = 1;
    $this->osapiActivity->setPriority($priority);
    $this->assertEquals($priority, $this->osapiActivity->getPriority());
  }

  /**
   * Tests osapiActivity->getStreamFaviconUrl()
   */
  public function testGetStreamFaviconUrl() {
    $url = 'http://www.google.com/ig/modules/horoscope_content/virgo.gif';
    $this->osapiActivity->setStreamFaviconUrl($url);
    $this->assertEquals($url, $this->osapiActivity->getStreamFaviconUrl());
  }

  /**
   * Tests osapiActivity->getStreamSourceUrl()
   */
  public function testGetStreamSourceUrl() {
    $url = 'http://api.example.org/activity/foo/1';
    $this->osapiActivity->setStreamSourceUrl($url);
    $this->assertEquals($url, $this->osapiActivity->getStreamSourceUrl());
  }

  /**
   * Tests osapiActivity->getStreamTitle()
   */
  public function testGetStreamTitle() {
    $title = 'Foo osapiActivity';
    $this->osapiActivity->setStreamTitle($title);
    $this->assertEquals($title, $this->osapiActivity->getStreamTitle());
  }

  /**
   * Tests osapiActivity->getStreamUrl()
   */
  public function testGetStreamUrl() {
    $streamUrl = 'http://api.example.org/activityStream/foo/1';
    $this->osapiActivity->setStreamUrl($streamUrl);
    $this->assertEquals($streamUrl, $this->osapiActivity->getStreamUrl());
  }

  /**
   * Tests osapiActivity->getTemplateParams()
   */
  public function testGetTemplateParams() {
    $params = array('fooParam' => 'barParam');
    $this->osapiActivity->setTemplateParams($params);
    $this->assertEquals($params, $this->osapiActivity->getTemplateParams());
  }

  /**
   * Tests osapiActivity->getTitle()
   */
  public function testGetTitle() {
    $title = 'Foo osapiActivity Title';
    $this->osapiActivity->setTitle($title);
    $this->assertEquals($title, $this->osapiActivity->getTitle());
  }

  /**
   * Tests osapiActivity->getTitleId()
   */
  public function testGetTitleId() {
    $titleId = '976';
    $this->osapiActivity->setTitleId($titleId);
    $this->assertEquals($titleId, $this->osapiActivity->getTitleId());
  }

  /**
   * Tests osapiActivity->getUrl()
   */
  public function testGetUrl() {
    $url = 'http://api.example.org/url';
    $this->osapiActivity->setUrl($url);
    $this->assertEquals($url, $this->osapiActivity->getUrl());
  }

  /**
   * Tests osapiActivity->getUserId()
   */
  public function testGetUserId() {
    $this->assertEquals(1, $this->osapiActivity->getUserId());
  }
}
