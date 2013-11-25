<?php

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 */
?><!DOCTYPE html>
<html lang="<?php print $language->language; ?>"<?php if ($rdf_namespaces) { print 'version="XHTML+RDFa 1.0" dir="' . $language->dir . '" ' . $rdf_namespaces; } ?>>

	<head <?php if ($rdf_namespaces) { print 'profile="' . $grddl_profile . '"';} ?>>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- Force IE out of compatibility mode -->

		<meta name="msapplication-TileImage" content="/uws_library/sites/all/themes/uws_library_AR/images/ms_pinned_site/ms-pinned-site-144x144.png">
		<meta name="msapplication-TileColor" content="#3871EB">
		<meta name="application-name" content="UWS Library Website">
		<?php print $head; ?>
		<title><?php print $head_title; ?></title>

		<?php print $styles; ?>
		<?php print $scripts; ?>

		<link rel="apple-touch-icon" sizes="144x144" href="<?php global $base_path; print $base_path . path_to_theme(); ?>/images/apple_touch_icons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php global $base_path; print $base_path . path_to_theme(); ?>/images/apple_touch_icons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php global $base_path; print $base_path . path_to_theme(); ?>/images/apple_touch_icons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" href="<?php global $base_path; print $base_path . path_to_theme(); ?>/images/apple_touch_icons/apple-touch-icon.png">
	</head>
	<body class="<?php print $classes; ?>" <?php print $attributes;?>>
		<div id="skip-link">
			<a href="#main-content" class="element-invisible element-focusable" tabindex="1"><?php print t('Skip to main content'); ?></a>
		</div>
		<?php print $page_top; ?>
 		<?php print $page; ?>
		<?php print $page_bottom; ?>
	</body>
</html>