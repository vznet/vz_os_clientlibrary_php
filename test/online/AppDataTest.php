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

require_once 'OnlineTestCase.php';

class AppDataTest extends OnlineTestCase {
  public function testCreate() {
    $this->assertSupportedMethod('appdata.create');

    $datenow = date('Y-m-d h:i:s');
    
    $batch = $this->suite->osapi->newBatch();
    $createParams = array(
      'userId' => '@me',
      'groupId' => '@self',
      'appId' => '@app',
      'data' => array('lastRun' => $datenow)
    );
    $getParams = array(
      'userId' => '@me',
      'groupId' => '@self',
      'appId' => '@app',
      'fields' => array('lastRun')
    );
    $batch->add($this->suite->osapi->appdata->create($createParams), 'createAppData');
    $batch->add($this->suite->osapi->appdata->get($getParams), 'getAppData');
    $result = $batch->execute();

    if ($result['createAppData'] instanceof osapiError) {
      $name = $this->suite->getName();
      $code = $result['createAppData']->getErrorCode();
      $message = $result['createAppData']->getErrorMessage();
      $this->fail(sprintf("%s failed to create app data: %s (%s)", $name, $message, $code));
    }

    $appData = current($result['getAppData']);
    $this->assertEquals($datenow, $appData['lastRun']);
  }
}