<?php

namespace Drupal\civicrm_entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\Sql\SqlContentEntityStorage;

class CivicrmEntityStorage extends SqlContentEntityStorage {

  /**
   * {@inheritdoc}
   */
  protected function doSaveFieldItems(ContentEntityInterface $entity, array $names = []) {
    // Initialize CiviCRM.
    \Drupal::service('civicrm');
    require_once('api/v3/utils.php');

    $civicrm_entity_name = $entity->getEntityType()->get('civicrm_entity');
    $params = [];
    /*
    foreach ($entity->getFields() as $name => $values) {
      $params[$name] = $values->getValue();
    }
    */
    $params = $entity->toArray();

    if ($entity->isNew()) {
      unset($params['id']);
    }

    \Drupal::logger('civicrm_entity')->debug($civicrm_entity_name);
    \Drupal::logger('civicrm_entity')->debug(print_r($params,TRUE));

    // Do it!
    $result = civicrm_api($civicrm_entity_name, 'create', $params);

    if (!civicrm_error($result)) {
      // @todo: stash data on the Drupal entity
    }
  }


}