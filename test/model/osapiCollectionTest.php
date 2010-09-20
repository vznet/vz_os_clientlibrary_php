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
 * osapiCollection test case.
 */
class osapiCollectionTest extends PHPUnit_Framework_TestCase {
  
  /**
   * @var osapiCollection
   */
  private $osapiCollection;
  private $list;
  private $startIndex;
  private $totalResults;

  /**
   * Prepares the environment before running a test.
   */
  protected function setUp() {
    parent::setUp();
    $this->list = array('A', 'B', 'C');
    $this->startIndex = true;
    $this->totalResults = true;
    $this->osapiCollection = new osapiCollection($this->list, $this->startIndex, $this->totalResults);
    $this->osapiCollection->itemsPerPage = true;
  }

  /**
   * Cleans up the environment after running a test.
   */
  protected function tearDown() {
    $this->osapiCollection = null;
    $this->list = null;
    parent::tearDown();
  }

  /**
   * Tests osapiCollection->getList()
   */
  public function testGetList() {
    $this->assertEquals($this->list, $this->osapiCollection->getList());
  }

  /**
   * Tests osapiCollection->getStartIndex()
   */
  public function testGetStartIndex() {
    $this->assertTrue($this->osapiCollection->getStartIndex());
  }

  /**
   * Tests osapiCollection->getItemsPerPage()
   */
  public function testGetItemsPerPage() {
    $this->assertTrue($this->osapiCollection->getItemsPerPage());
  }

  /**
   * Tests osapiCollection->getTotalResults()
   */
  public function testGetTotalResults() {
    $this->assertTrue($this->osapiCollection->getTotalResults());
  }

  /**
   * Tests osapiCollection->setList()
   */
  public function testSetList() {
    $listToTestSetList = array('a', 'b', 'c');
    $this->osapiCollection->setList($listToTestSetList);
    $this->assertEquals($listToTestSetList, $this->osapiCollection->list);
  }

  /**
   * Tests osapiCollection->setStartIndex()
   */
  public function testSetStartIndex() {
    $startIndex = ! $this->osapiCollection->startIndex;
    $this->osapiCollection->setStartIndex($startIndex);
    $this->assertEquals($startIndex, $this->osapiCollection->startIndex);
  }
  
  /**
   * Tests osapiCollection->setStartItemsPerPage()
   */
  public function testSetItemsPerPage() {
    $itemsPerPage = ! $this->osapiCollection->itemsPerPage;
    $this->osapiCollection->setItemsPerPage($itemsPerPage);
    $this->assertEquals($itemsPerPage, $this->osapiCollection->itemsPerPage);
  }

  /**
   * Tests osapiCollection->setTotalResults()
   */
  public function testSetTotalResults() {
    $totalResults = ! $this->osapiCollection->totalResults;
    $this->osapiCollection->setTotalResults($totalResults);
    $this->assertEquals($totalResults, $this->osapiCollection->totalResults);
  }
}
