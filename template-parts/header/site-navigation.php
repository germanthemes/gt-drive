<?php
/**
 * Main Navigation
 *
 * @version 1.0
 * @package GT Drive
 */
?>

<?php if ( has_nav_menu( 'primary' ) or has_nav_menu( 'social-header' ) ) : ?>

	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
		<?php
		echo gt_drive_get_svg( 'menu' );
		echo gt_drive_get_svg( 'close' );
		?>
		<span class="menu-toggle-text"><?php esc_html_e( 'Menu', 'gt-drive' ); ?></span>
	</button>

	<div class="primary-navigation">

		<?php if ( has_nav_menu( 'primary' ) ) : ?>

			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'gt-drive' ); ?>">

				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
					)
				);
				?>
			</nav><!-- #site-navigation -->

		<?php endif; ?>

		<?php if ( has_nav_menu( 'social-header' ) ) : ?>

			<div class="header-social-icons social-icons-nav">

				<?php gt_drive_social_icons_menu( 'social-header' ); ?>

			</div>

		<?php endif; ?>

	</div><!-- .primary-navigation -->

<?php endif; ?>

<?php gt_drive_header_search_icon(); ?>
