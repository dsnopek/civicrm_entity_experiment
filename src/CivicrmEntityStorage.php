<?php

namespace Drupal\civicrm_entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\ContentEntityStorageBase;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Field\FieldDefinitionInterface;

class CivicrmEntityStorage extends ContentEntityStorageBase {

  /**
   * {@inheritdoc)
   */
  protected function readFieldItemsToPurge(FieldDefinitionInterface $field_definition, $batch_size) {
    // Not fieldable - return nothing.
    return [];
  }

  /**
   * {@inheritdoc)
   */
  protected function purgeFieldItems(ContentEntityInterface $entity, FieldDefinitionInterface $field_definition) {
    // Not fieldable - do nothing.
  }

  /**
   * {@inheritdoc)
   */
  protected function doLoadRevisionFieldItems($revision_id) {
    // Not fieldable - do nothing.
  }

  /**
   * {@inheritdoc)
   */
  protected function doSaveFieldItems(ContentEntityInterface $entity, array $names = []) {
    // Not fieldable - do nothing.
  }

  /**
   * {@inheritdoc)
   */
  protected function doDeleteFieldItems($entities) {
    // Not fieldable - do nothing.
  }

  /**
   * {@inheritdoc)
   */
  protected function doDeleteRevisionFieldItems(ContentEntityInterface $revision) {
    // Not fieldable - do nothing.
  }

  /**
   * {@inheritdoc)
   */
  protected function doLoadMultiple(array $ids = NULL) {
    // @todo Implement doLoadMultiple() method.
    return [];
  }

  /**
   * {@inheritdoc)
   */
  protected function has($id, EntityInterface $entity) {
    // @todo Check if entity with $id already exists
    return !$entity->isNew();
  }

  /**
   * {@inheritdoc)
   */
  protected function getQueryServiceName() {
    //return 'entity.query.civicrm';
    return 'entity.query.null';
  }

  /**
   * {@inheritdoc)
   */
  public function countFieldData($storage_definition, $as_bool = FALSE) {
    return $as_bool ? FALSE : 0;
  }

}