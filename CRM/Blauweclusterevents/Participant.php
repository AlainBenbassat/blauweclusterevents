<?php

class CRM_Blauweclusterevents_Participant {

  public function addEmployers($participantIds) {
    if (count($participantIds) == 0) {
      return 0;
    }

    $numEmployersAdded = 0;

    $eventId = $this->getEventIdFromParticipantId($participantIds[0]);

    foreach ($participantIds as $participantId) {
      $contactId = $this->getContactIdFromParticipantId($participantId);
      $isEmployerAdded = $this->addEmployer($contactId, $eventId);

      if ($isEmployerAdded) {
        $numEmployersAdded++;
      }
    }

    return $numEmployersAdded;
  }

  private function addEmployer($contactId, $eventId) {
    $employerAdded = FALSE;

    $employerId = $this->getEmployerIdFromContactId($contactId);
    if ($employerId && !$this->isContactRegistered($employerId, $eventId)) {
      $this->registerContact($employerId, $eventId);
      $employerAdded = TRUE;
    }

    return $employerAdded;
  }

  private function getContactIdFromParticipantId($participantId) {
    $result = \Civi\Api4\Participant::get(FALSE)
      ->addSelect('contact_id')
      ->addWhere('id', '=', $participantId)
      ->execute()
      ->single();

    return $result['contact_id'];
  }

  private function getEventIdFromParticipantId($participantId) {
    $result = \Civi\Api4\Participant::get(FALSE)
      ->addSelect('event_id')
      ->addWhere('id', '=', $participantId)
      ->execute()
      ->single();

    return $result['event_id'];
  }

  private function getEmployerIdFromContactId($contactId) {
    $result = \Civi\Api4\Contact::get(FALSE)
      ->addSelect('employer_id')
      ->addWhere('id', '=', $contactId)
      ->execute()
      ->single();

    return $result['employer_id'];
  }

  private function isContactRegistered($contactId, $eventId) {
    $result = \Civi\Api4\Participant::get(FALSE)
      ->addSelect('id')
      ->addWhere('contact_id', '=', $contactId)
      ->addWhere('event_id', '=', $eventId)
      ->execute()
      ->first();

    if (empty($result)) {
      return FALSE;
    }
    else {
      return TRUE;
    }
  }

  private function registerContact($contactId, $eventId) {
    $results = \Civi\Api4\Participant::create(FALSE)
      ->addValue('contact_id', $contactId)
      ->addValue('event_id', $eventId)
      ->addValue('status_id', 2)
      ->addValue('role_id', 1)
      ->addValue('register_date', date('Y-m-d h:i'))
      ->execute();
  }
}
