<?php

namespace Drupal\civicrm_entity\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for CiviCRM Event edit forms.
 *
 * @ingroup civicrm_entity
 */
class CivicrmEventForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\civicrm_entity\Entity\CivicrmEvent */
    $form = parent::buildForm($form, $form_state);

    $entity = $this->entity;

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = &$this->entity;

    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label CiviCRM Event.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label CiviCRM Event.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.civicrm_event.canonical', ['civicrm_event' => $entity->id()]);
  }

}
