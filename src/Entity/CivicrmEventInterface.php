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
interface CivicrmEventInterface extends  ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

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
   * Gets the CiviCRM Event creation timestamp.
   *
   * @return int
   *   Creation timestamp of the CiviCRM Event.
   */
  public function getCreatedTime();

  /**
   * Sets the CiviCRM Event creation timestamp.
   *
   * @param int $timestamp
   *   The CiviCRM Event creation timestamp.
   *
   * @return \Drupal\civicrm_entity\Entity\CivicrmEventInterface
   *   The called CiviCRM Event entity.
   */
  public function setCreatedTime($timestamp);

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
