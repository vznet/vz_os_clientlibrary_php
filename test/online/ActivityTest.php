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

class ActivityTest extends OnlineTestCase {
  public function testCreate() {
    $this->assertSupportedMethod('activities.create');
    
    $datenow = date('Y-m-d h:i:s');

    $batch = $this->suite->osapi->newBatch();

    $activity = new osapiActivity(null, null);
    $activity->setTitle('osapi test activity at ' . $datenow);
    $activity->setBody('osapi test activity body');

    $createParams = array(
      'userId' => '@me',
      'groupId' => '@self',
      'appId' => '@app',
      'activity' => $activity
    );

    $batch->add($this->suite->osapi->activities->create($createParams), 'createActivity');
    $result = $batch->execute();

    if ($result['createActivity'] instanceof osapiError) {
      $name = $this->suite->getName();
      $code = $result['createActivity']->getErrorCode();
      $message = $result['createActivity']->getErrorMessage();

      if ($code == 417) {
        //TODO: Have the provider throw an over quota exception, since not every provider uses this code.
        $this->markTestSkipped("Creating an activity reported 417.  Were you over quota? ($message)");
        return;
      }
      
      $this->fail(sprintf("%s failed to create an activity: %s (%s)", $name, $message, $code));
    }
  }
}
