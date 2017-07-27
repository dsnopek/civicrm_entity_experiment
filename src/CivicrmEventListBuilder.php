<?php

namespace Drupal\civicrm_entity;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of CiviCRM Event entities.
 *
 * @ingroup civicrm_entity
 */
class CivicrmEventListBuilder extends EntityListBuilder {


  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('CiviCRM Event ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\civicrm_entity\Entity\CivicrmEvent */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.civicrm_event.edit_form',
      ['civicrm_event' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
