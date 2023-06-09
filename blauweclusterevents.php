<?php

require_once 'blauweclusterevents.civix.php';
// phpcs:disable
use CRM_Blauweclusterevents_ExtensionUtil as E;
// phpcs:enable

function blauweclusterevents_civicrm_searchTasks(string $objectName, array &$tasks) {
  if ($objectName === 'event'){
    $tasks[] = [
      'title' => 'Werkgevers inschrijven',
      'class' => 'CRM_Blauweclusterevents_Form_AddEmployers',
    ];
  }
}

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function blauweclusterevents_civicrm_config(&$config): void {
  _blauweclusterevents_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function blauweclusterevents_civicrm_install(): void {
  _blauweclusterevents_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function blauweclusterevents_civicrm_postInstall(): void {
  _blauweclusterevents_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function blauweclusterevents_civicrm_uninstall(): void {
  _blauweclusterevents_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function blauweclusterevents_civicrm_enable(): void {
  _blauweclusterevents_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function blauweclusterevents_civicrm_disable(): void {
  _blauweclusterevents_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function blauweclusterevents_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _blauweclusterevents_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function blauweclusterevents_civicrm_entityTypes(&$entityTypes): void {
  _blauweclusterevents_civix_civicrm_entityTypes($entityTypes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function blauweclusterevents_civicrm_preProcess($formName, &$form): void {
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
//function blauweclusterevents_civicrm_navigationMenu(&$menu): void {
//  _blauweclusterevents_civix_insert_navigation_menu($menu, 'Mailings', [
//    'label' => E::ts('New subliminal message'),
//    'name' => 'mailing_subliminal_message',
//    'url' => 'civicrm/mailing/subliminal',
//    'permission' => 'access CiviMail',
//    'operator' => 'OR',
//    'separator' => 0,
//  ]);
//  _blauweclusterevents_civix_navigationMenu($menu);
//}
