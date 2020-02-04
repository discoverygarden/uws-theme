<?php

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function themec_form_system_theme_settings_alter(&$form, $form_state, $form_id = NULL) {
  // Work-around for a core bug affecting admin themes. See issue #943212.
  if (isset($form_id)) {
    return;
  }

  // Create the form using Forms API.
  $form['themec'] = array(
    '#type' => 'fieldset',
    '#title' => t('UWS Theme settings'),
  );

  $form['themec']['research_data_text'] = array(
    '#title' => t("'Search for research datasets' pop text"),
    '#type' => 'textarea',
    '#description' => t('This is the text presented to the user upon clicking the "Search for research datasets" button.'),
    '#default_value' => theme_get_setting('research_data_text'),
  );

  $form['themec']['research_data_redirect'] = array(
    '#title' => t("Research Dataset confirmation redirect"),
    '#type' => 'textfield',
    '#description' => t('This is the url the user will be redirected to upon clicking "yes" to the research data test pop-up.'),
    '#default_value' => theme_get_setting('research_data_redirect'),
  );
}
