<?php

namespace Drupal\civicrm_entity\Entity;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\UserInterface;

/**
 * Defines the CiviCRM Event entity.
 *
 * @ingroup civicrm_entity
 *
 * @ContentEntityType(
 *   id = "civicrm_event",
 *   label = @Translation("CiviCRM Event"),
 *   handlers = {
 *     "storage" = "Drupal\civicrm_entity\CivicrmEntityStorage",
 *     "storage_schema" = "Drupal\civicrm_entity\CivicrmEntityStorageSchema",
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\civicrm_entity\CivicrmEventListBuilder",
 *
 *     "form" = {
 *       "default" = "Drupal\civicrm_entity\Form\CivicrmEventForm",
 *       "add" = "Drupal\civicrm_entity\Form\CivicrmEventForm",
 *       "edit" = "Drupal\civicrm_entity\Form\CivicrmEventForm",
 *       "delete" = "Drupal\civicrm_entity\Form\CivicrmEventDeleteForm",
 *     },
 *     "access" = "Drupal\civicrm_entity\CivicrmEventAccessControlHandler",
 *     "route_provider" = {
 *       "html" = "Drupal\civicrm_entity\CivicrmEventHtmlRouteProvider",
 *     },
 *   },
 *   admin_permission = "administer civicrm event entities",
 *   base_table = "civicrm_event",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "title",
 *     "status" = "is_active",
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/civicrm_event/{civicrm_event}",
 *     "add-form" = "/admin/structure/civicrm_event/add",
 *     "edit-form" = "/admin/structure/civicrm_event/{civicrm_event}/edit",
 *     "delete-form" = "/admin/structure/civicrm_event/{civicrm_event}/delete",
 *     "collection" = "/admin/structure/civicrm_event",
 *   },
 *   field_ui_base_route = "civicrm_event.settings"
 * )
 */
class CivicrmEvent extends ContentEntityBase implements CivicrmEventInterface {

  /**
   * {@inheritdoc}
   */
  public static function preCreate(EntityStorageInterface $storage_controller, array &$values) {
    parent::preCreate($storage_controller, $values);
    /*
    $values += [
      'user_id' => \Drupal::currentUser()->id(),
    ];
    */
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->set('name', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getOwner() {
    return $this->get('user_id')->entity;
  }

  /**
   * {@inheritdoc}
   */
  public function getOwnerId() {
    return $this->get('user_id')->target_id;
  }

  /**
   * {@inheritdoc}
   */
  public function setOwnerId($uid) {
    $this->set('user_id', $uid);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setOwner(UserInterface $account) {
    $this->set('user_id', $account->id());
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function isPublished() {
    return (bool) $this->getEntityKey('is_active');
  }

  /**
   * {@inheritdoc}
   */
  public function setPublished($published) {
    $this->set('is_active', $published ? TRUE : FALSE);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['title'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Title'))
      ->setDescription(t('The title of the CiviCRM Event entity.'))
      ->setSettings([
        'max_length' => 50,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['is_active'] = BaseFieldDefinition::create('boolean')
      ->setLabel(t('Publishing status'))
      ->setDescription(t('A boolean indicating whether the CiviCRM Event is published.'))
      ->setDefaultValue(TRUE);

    $fields['created_date'] = BaseFieldDefinition::create('datetime')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    return $fields;
  }

}
