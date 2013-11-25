<?php

/**
 * @file
 * Implementation to display a single Drupal page while offline.
 *
 * All the available variables are mirrored in page.tpl.php.
 *
 * @see template_preprocess()
 * @see template_preprocess_maintenance_page()
 * @see uws_library_process_maintenance_page()
 */
?>
<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- Force IE out of compatibility mode -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="robots" content="noindex, nofollow">

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
			<a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
		</div>

		<div id="page-wrapper">
			<div id="page">

				<header role="banner">
					<div id="header">
						<div class="section clearfix">
							<img src="<?php global $base_path; print $base_path.path_to_theme(); ?>/images/uws-library-logo.png" alt="<?php print t('Home'); ?>">

							<?php if ($site_name || $site_slogan): ?>
							<div id="name-and-slogan"<?php if ($hide_site_name && $hide_site_slogan) { print ' class="element-invisible"'; } ?>>
								<?php if ($site_name): ?>
								<div id="site-name"<?php if ($hide_site_name) { print ' class="element-invisible"'; } ?>>
									<strong>
										<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
									</strong>
								</div>
 								<?php endif; ?>
 								<?php if ($site_slogan): ?>
 								<div id="site-slogan"<?php if ($hide_site_slogan) { print ' class="element-invisible"'; } ?>>
									<?php print $site_slogan; ?>
								</div>
								<?php endif; ?>
							</div><!-- /#name-and-slogan -->
							<?php endif; ?>
						</div>
					</div><!-- /.section, /#header -->
				</header>

				<div id="main-wrapper">
					<div id="main" class="clearfix">
						<div id="content" class="column">
							<div class="section" id="main-content" role="main">
								<?php if ($title): ?>
								<h1 class="title" id="page-title" style="text-align: center; margin-bottom: 10px;"><?php print $title; ?></h1>
								<?php endif; ?>
								<?php print $content; ?>
								<?php if ($messages): ?>
 								<div id="messages">
 									<div class="section clearfix" style="margin-top: 10px;">
										<?php print $messages; ?>
									</div>
								</div><!-- /.section, /#messages -->
								<?php endif; ?>
							</div>
						</div><!-- /.section, /#content -->
					</div>
				</div><!-- /#main, /#main-wrapper -->

			</div>
		</div><!-- /#page, /#page-wrapper -->

	</body>
</html>