<?php

namespace Drupal\civicrm_entity\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining CiviCRM Event entities.
 *
 * @ingroup civicrm_entity
 */
interface CivicrmEventInterface extends ContentEntityInterface/*, EntityOwnerInterface*/ {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the CiviCRM Event name.
   *
   * @return string
   *   Name of the CiviCRM Event.
   */
  public function getName();

  /**
   * Sets the CiviCRM Event name.
   *
   * @param string $name
   *   The CiviCRM Event name.
   *
   * @return \Drupal\civicrm_entity\Entity\CivicrmEventInterface
   *   The called CiviCRM Event entity.
   */
  public function setName($name);

  /**
   * Returns the CiviCRM Event published status indicator.
   *
   * Unpublished CiviCRM Event are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the CiviCRM Event is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a CiviCRM Event.
   *
   * @param bool $published
   *   TRUE to set this CiviCRM Event to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\civicrm_entity\Entity\CivicrmEventInterface
   *   The called CiviCRM Event entity.
   */
  public function setPublished($published);

}
