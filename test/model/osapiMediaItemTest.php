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
 * osapiMediaItem test case.
 */
class osapiMediaItemTest extends PHPUnit_Framework_TestCase {
  
  /**
   * @var osapiMediaItem
   */
  private $osapiMediaItem;

  /**
   * Prepares the environment before running a test.
   */
  protected function setUp() {
    parent::setUp();
    $this->osapiMediaItem = new osapiMediaItem();
    $this->osapiMediaItem->setField("mimetype", "AUDIO");
    $this->osapiMediaItem->setField("type", "AUDIO");
    $this->osapiMediaItem->setField("url", "URL");
  }

  /**
   * Cleans up the environment after running a test.
   */
  protected function tearDown() {
    $this->osapiMediaItem = null;
    parent::tearDown();
  }

  /**
   * Tests osapiMediaItem->getMimeType()
   */
  public function testGetMimeType() {
    $this->assertEquals('audio', $this->osapiMediaItem->getField('mimetype'));
  }

  /**
   * Tests osapiMediaItem->getType()
   */
  public function testGetType() {
    $this->assertEquals('AUDIO', $this->osapiMediaItem->getField('type'));
  }

  /**
   * Tests osapiMediaItem->getUrl()
   */
  public function testGetUrl() {
    $this->assertEquals('URL', $this->osapiMediaItem->getField('url'));
  }

  /**
   * Tests osapiMediaItem->setMimeType()
   */
  public function testSetMimeType() {
    $this->osapiMediaItem->setField('mimetype', 'VIDEO');
    $this->assertEquals('video', $this->osapiMediaItem->getField('mimetype'));
  }

  /**
   * Tests osapiMediaItem->setType()
   */
  public function testSetType() {
    $this->osapiMediaItem->setField('type', 'VIDEO');
    $this->assertEquals('VIDEO', $this->osapiMediaItem->getField('type'));
  }

  /**
   * Tests osapiMediaItem->setUrl()
   */
  public function testSetUrl() {
    $this->osapiMediaItem->setField('url', 'http://example.com');
    $this->assertEquals('http://example.com', $this->osapiMediaItem->getField('url'));
  }
}
