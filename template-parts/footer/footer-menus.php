<?php
/**
 * Footer Menus
 *
 * @version 1.0
 * @package GT Drive
 */


// Check if there are footer menus to display.
if ( has_nav_menu( 'footer' ) or has_nav_menu( 'social-footer' ) ) : ?>

	<div class="footer-menus">

		<div class="footer-menus-inner footer-main">

			<?php if ( has_nav_menu( 'footer' ) ) : ?>

				<nav class="footer-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'gt-drive' ); ?>">

					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer',
						'container'      => false,
						'menu_class'     => 'footer-navigation-menu',
						'echo'           => true,
						'fallback_cb'    => '',
						'depth'          => 1,
					) );
					?>

				</nav><!-- .footer-navigation -->

			<?php endif; ?>

			<?php if ( has_nav_menu( 'social-footer' ) ) : ?>

				<div class="footer-social-icons social-icons-nav">

					<?php gt_drive_social_icons_menu( 'social-footer' ); ?>

				</div>

			<?php endif; ?>

		</div>

	</div><!-- .footer-menus -->

	<?php
endif;
