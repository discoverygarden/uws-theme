<?php

function uws_library_ARB_preprocess_html(&$variables) {

	# Add body classes if certain regions have content.

	if (!empty($variables['page']['featured'])) {

		$variables['classes_array'][] = 'featured';
	}

	if (!empty($variables['page']['footer_firstcolumn'])
		|| !empty($variables['page']['footer_secondcolumn'])
		|| !empty($variables['page']['footer_thirdcolumn'])) {

		$variables['classes_array'][] = 'footer-columns';
	}

	# Add conditional stylesheets for IE
	drupal_add_css(path_to_theme() . '/css/ie7.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
	drupal_add_css(path_to_theme() . '/css/ie8.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 8', '!IE' => FALSE), 'preprocess' => FALSE));
	drupal_add_css(path_to_theme() . '/css/ie9.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 9', '!IE' => FALSE), 'preprocess' => FALSE));

	return;
}

function uws_library_ARB_process_html(&$variables) {

	# Override or insert variables into the page template for HTML output.
	return;
}

function uws_library_ARB_process_page(&$variables) {

	# Override or insert variables into the page template.

	# Always print the site name and slogan, but if they are toggled off, we'll
	# just hide them visually.

	$variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
	$variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;

	if ($variables['hide_site_name']) {

		# If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
		$variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
	}

	if ($variables['hide_site_slogan']) {

		# If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
		$variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
	}

	# Since the title and the shortcut link are both block level elements,
	# positioning them next to each other is much simpler with a wrapper div.

	if (!empty($variables['title_suffix']['add_or_remove_shortcut']) && $variables['title']) {
		# Add a wrapper div using the title_prefix and title_suffix render elements.
		$variables['title_prefix']['shortcut_wrapper'] = array(
			'#markup' => '<div class="shortcut-wrapper clearfix">',
			'#weight' => 100,
		);

		$variables['title_suffix']['shortcut_wrapper'] = array(
 			'#markup' => '</div>',
			'#weight' => -99,
		);

		# Make sure the shortcut link is the first item in title_suffix.
		$variables['title_suffix']['add_or_remove_shortcut']['#weight'] = -100;
	}

	return;
}

function uws_library_ARB_preprocess_maintenance_page(&$variables) {

	# Implements hook_preprocess_maintenance_page().

	if (!$variables['db_is_active']) {

		# By default, site_name is set to Drupal if no db connection is available
		# or during site installation. Setting site_name to an empty string makes
		# the site and update pages look cleaner.
		# @see template_preprocess_maintenance_page

		$variables['site_name'] = '';
	}

	drupal_add_css(drupal_get_path('theme', 'uws_library_ARB') . '/css/maintenance-page.css');

	return;
}

function uws_library_ARB_process_maintenance_page(&$variables) {

	# Override or insert variables into the maintenance page template.

	# Always print the site name and slogan, but if they are toggled off, we'll
	# just hide them visually.

	$variables['hide_site_name'] = theme_get_setting('toggle_name') ? FALSE : TRUE;
	$variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;

	if ($variables['hide_site_name']) {

		# If toggle_name is FALSE, the site_name will be empty, so we rebuild it.

		$variables['site_name'] = filter_xss_admin(variable_get('site_name', 'UWS Library'));
	}

	if ($variables['hide_site_slogan']) {

		# If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.

		$variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
	}

	return;
}

function uws_library_ARB_preprocess_node(&$variables) {

	# Override or insert variables into the node template.

	if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {

		$variables['classes_array'][] = 'node-full';
	}

	return;
}

function uws_library_ARB_preprocess_block(&$variables) {

	# Override or insert variables into the block template.

	if ($variables['block']->region == 'header') {

		# In the header region visually hide block titles.

		$variables['title_attributes_array']['class'][] = 'element-invisible';
	}

	return;
}

function uws_library_ARB_menu_tree($variables) {

	# Implements theme_menu_tree().

	return('<ul class="menu clearfix">' . $variables['tree'] . '</ul>');
}

function uws_library_ARB_menu_link(array $variables) {

	# Implements <nolink>

	$element = $variables['element'];
	$sub_menu = '';

	if ($element['#below']) {

		$sub_menu = drupal_render($element['#below']);
	}

	if (strpos($element['#href'], 'nolink')) {

		$output = '<a href="#" class="nolink">' . check_plain($element['#title']) . '</a>';

	} else {

		$output = l($element['#title'], $element['#href'], $element['#localized_options']);
	}

	# Fix Validation warnings
	# "W001 There should not be any white space at the start or end of an attribute's value:"
	$attributes = preg_replace('/("\s)|(\s")/', '"', drupal_attributes($element['#attributes']));

	return('<li' . $attributes . '>' . $output . $sub_menu . "</li>\n");
}

function uws_library_ARB_field__taxonomy_term_reference($variables) {

	# Implements theme_field__field_type().

	$output = '';

	# Render the label, if it's not hidden.
	if (!$variables['label_hidden']) {
		$output .= '<h3 class="field-label">' . $variables['label'] . ': </h3>';
	}

	# Render the items.
	$output .= ($variables['element']['#label_display'] == 'inline')
				? '<ul class="links inline">' : '<ul class="links">';

	foreach ($variables['items'] as $delta => $item) {
		$output .= '<li class="taxonomy-term-reference-' . $delta . '"' .
					$variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
	}

	$output .= '</ul>';

	# Render the top-level DIV.
	$output = '<div class="' . $variables['classes'] .
				(!in_array('clearfix', $variables['classes_array'])
					? ' clearfix' : '') . '"' . $variables['attributes'] .'>' . $output . '</div>';

	return($output);
}

/**
 * Hook preprocess Solr metadata display variables to add object view and pdf download counts.
 *
 * @param array $variables
 *   Theme variables.
 */
function themec_preprocess_islandora_solr_metadata_display(array &$variables) {
  if (module_exists('islandora_usage_stats')) {
    module_load_include('inc', 'islandora_usage_stats', 'includes/db');
    $variables['object_views_count'] = islandora_usage_stats_get_individual_object_view_count($variables['islandora_object']->id);
    if (in_array('islandora:sp_pdf', $variables['islandora_object']->models)) {
      $dsid = 'OBJ';
    }
    else {
      $dsid = 'PDF';
    }
    $ds_counts = islandora_usage_stats_get_datastream_downloads_count($variables['islandora_object']->id, $dsid);
    if (isset($ds_counts[$dsid])) {
	$variables['pdf_datastream_download_count'] = $ds_counts[$dsid];
    }
    else {
	$variables['pdf_datastream_download_count'] = 0;
    }	
  }
}

/**
 * Implements hook_form_FORM_ID_alter().
 */
function themec_form_islandora_solr_simple_search_form_alter(&$form, &$form_state, $form_id) {
  $form['simple']['islandora_simple_search_query']['#title'] = 'Search Publications';
  $form['simple']['islandora_simple_search_query']['#attributes']['class'] = array('uws-search-query');
}
