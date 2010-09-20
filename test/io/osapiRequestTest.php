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
 * osapiRequest test case.
 */
class osapiRequestTest extends PHPUnit_Framework_TestCase {

  /**
   * Tests osapiRequest->createRequest()
   */
  public function testCreateRequest() {
    $request = osapiRequest::createRequest('people.get', array('userId' => true));
  }
  
  /**
   * Tests osapiRequest->createRequest()
   */
  public function testCreateRequestWithFakeService() {
    $this->setExpectedException('osapiException');
    $request = osapiRequest::createRequest('fake_service.get', array());
  }
  
  /**
   * Tests osapiRequest->createRequest()
   */
  public function testCreateRequestWithFakeMethod() {
    $this->setExpectedException('osapiException');
    $request = osapiRequest::createRequest('people.pull', array());
  }
  
  /**
   * Tests osapiRequest->createRequest()
   */
  public function testCreateRequestWithoutUserId() {
    $this->setExpectedException('osapiException');
    $request = osapiRequest::createRequest('people.get', array());
  }
  
  /**
   * Tests osapiRequest->createRequest()
   */
  public function testCreateRequestWithBadGroup() {
    $this->setExpectedException('osapiException');
    $request = osapiRequest::createRequest('people.get', array('userId' => true, 'groupId' => '@family'));
  }
}