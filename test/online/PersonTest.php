<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'OnlineTestCase.php';

class PersonTest extends OnlineTestCase {
  public function testGetSelf() {
    $this->assertSupportedMethod('people.get');

    $batch = $this->suite->osapi->newBatch();
    $batch->add($this->suite->osapi->people->get(array('userId' => '@me', 'groupId' => '@self')), 'self');
    $result = $batch->execute();
    $person = $result['self'];

    if ($person instanceof osapiError) {
      $this->fail($person->getErrorMessage());
      return;
    }
    
    $this->assertEquals($this->suite->USER_A_ID, $person->getId());
    $this->assertEquals($this->suite->USER_A_DISPLAY_NAME, $person->getDisplayName());
  }

  public function testGetSelfById() {
    $this->assertSupportedMethod('people.get');
    $this->assertSupportedMethod('people.get_by_id');

    $batch = $this->suite->osapi->newBatch();
    $batch->add($this->suite->osapi->people->get(array('userId' => $this->suite->USER_A_ID, 'groupId' => '@self')), 'self');
    $result = $batch->execute();
    $person = $result['self'];

    if ($person instanceof osapiError) {
      $this->fail($person->getErrorMessage());
    }
    
    $this->assertEquals($this->suite->USER_A_ID, $person->getId());
    $this->assertEquals($this->suite->USER_A_DISPLAY_NAME, $person->getDisplayName());
  }
  
  public function testGetAllProfileFields() {
    $this->assertSupportedMethod('people.get');
    if ($this->suite->USER_A_EXTENDED_PROFILE_FIELDS == null) {
      $this->markTestSkipped('Container has no specified extended profile fields.');
    }
    
    $batch = $this->suite->osapi->newBatch();
    $batch->add($this->suite->osapi->people->get(array('userId' => '@me', 'groupId' => '@self', 'fields' => '@all')), 'self');
    $result = $batch->execute();
    $person = $result['self'];

    if ($person instanceof osapiError) {
      $this->fail($person->getErrorMessage());
    }
    
    $this->assertEquals($this->suite->USER_A_ID, $person->getId());
    foreach ($this->suite->USER_A_EXTENDED_PROFILE_FIELDS as $field) {
      $this->assertNotNull($person->getFieldByName($field), "Requested field '$field' should not be null.");
    }
  }
  
  public function testGetExtendedProfileFields() {
    $this->assertSupportedMethod('people.get');
    if ($this->suite->USER_A_EXTENDED_PROFILE_FIELDS == null) {
      $this->markTestSkipped('Container has no specified extended profile fields.');
    }

    $batch = $this->suite->osapi->newBatch();
    $batch->add($this->suite->osapi->people->get(array('userId' => '@me', 'groupId' => '@self', 'fields' => $this->suite->USER_A_EXTENDED_PROFILE_FIELDS)), 'self');
    $result = $batch->execute();
    $person = $result['self'];

    if ($person instanceof osapiError) {
      $this->fail($person->getErrorMessage());
    }
    
    $this->assertEquals($this->suite->USER_A_ID, $person->getId());
    foreach ($this->suite->USER_A_EXTENDED_PROFILE_FIELDS as $field) {
      $this->assertNotNull($person->getFieldByName($field), "Requested field '$field' should not be null.");
    }
  }
}