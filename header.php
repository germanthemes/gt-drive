<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <main>
 *
 * @version 1.0
 * @package GT Drive
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gt-drive' ); ?></a>

		<?php do_action( 'gt_drive_before_header' ); ?>
		<?php gt_drive_widget_area( 'before-header' ); ?>

		<header id="masthead" class="site-header" role="banner">

			<div class="header-main">

				<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>

				<?php get_template_part( 'template-parts/header/site', 'navigation' ); ?>

			</div><!-- .header-main -->

			<?php gt_drive_header_search_form(); ?>

		</header><!-- #masthead -->

		<?php gt_drive_widget_area( 'after-header' ); ?>
		<?php do_action( 'gt_drive_after_header' ); ?>

		<?php gt_drive_header_image(); ?>

		<div id="content" class="site-content">

			<main id="main" class="site-main" role="main">

				<?php do_action( 'gt_drive_before_content' ); ?>
				<?php gt_drive_widget_area( 'before-content' ); ?>
