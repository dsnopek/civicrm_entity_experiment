<?php

/**
 * @file
 * Contains civicrm_event.page.inc.
 *
 * Page callback for CiviCRM Event entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for CiviCRM Event templates.
 *
 * Default template: civicrm_event.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_civicrm_event(array &$variables) {
  // Fetch CivicrmEvent Entity Object.
  $civicrm_event = $variables['elements']['#civicrm_event'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
