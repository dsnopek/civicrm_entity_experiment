<?php

namespace Drupal\civicrm_entity\Query;

use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\Query\QueryFactoryInterface;

class CivicrmQueryFactory implements QueryFactoryInterface {

  /**
   * {@inheritdoc}
   */
  public function get(EntityTypeInterface $entity_type, $conjunction) {
    throw new \Exception("Unimplemented");
  }

  /**
   * {@inheritdoc}
   */
  public function getAggregate(EntityTypeInterface $entity_type, $conjunction) {
    throw new \Exception("Unimplemented");
  }

}