<?php

use CRM_Blauweclusterevents_ExtensionUtil as E;

class CRM_Blauweclusterevents_Form_AddEmployers extends CRM_Event_Form_Task {
  public function buildQuickForm() {
    $this->addButtons([
      ['type' => 'submit', 'name' => 'Ja, werkgevers toevoegen', 'isDefault' => TRUE],
      ['type' => 'cancel', 'name' => E::ts('Cancel')]
    ]);

    // export form elements
    $this->assign('elementNames', $this->getRenderableElementNames());
    parent::buildQuickForm();
  }

  public function postProcess() {
    $participant = new CRM_Blauweclusterevents_Participant();
    $numAdded = $participant->addEmployers($this->_participantIds);

    CRM_Core_Session::setStatus("$numAdded werkgever(s) toegevoegd als deelnemer");

    parent::postProcess();
  }


  public function getRenderableElementNames() {
    $elementNames = [];
    foreach ($this->_elements as $element) {
      /** @var HTML_QuickForm_Element $element */
      $label = $element->getLabel();
      if (!empty($label)) {
        $elementNames[] = $element->getName();
      }
    }
    return $elementNames;
  }

}
