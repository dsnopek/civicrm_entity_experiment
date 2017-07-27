<?php

namespace Drupal\civicrm_entity;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the CiviCRM Event entity.
 *
 * @see \Drupal\civicrm_entity\Entity\CivicrmEvent.
 */
class CivicrmEventAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\civicrm_entity\Entity\CivicrmEventInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished civicrm event entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published civicrm event entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit civicrm event entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete civicrm event entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add civicrm event entities');
  }

}
