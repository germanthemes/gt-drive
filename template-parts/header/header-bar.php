<?php
/**
 * Top Header Bar
 *
 * @version 1.0
 * @package GT Drive
 */
?>

<?php if ( has_nav_menu( 'social-header' ) or is_customize_preview() ) : ?>

	<div id="header-bar" class="header-bar">

		<div class="header-bar-main">

			<div class="header-bar-content">

				<?php if ( '' !== gt_drive_get_option( 'header_phone' ) || is_customize_preview() ) : ?>

					<div class="header-phone">
						<?php echo gt_drive_get_svg( 'phone' ); ?>
						<span class="header-phone-text"><?php echo wp_kses_post( gt_drive_get_option( 'header_phone' ) ); ?>
					</div>

				<?php endif; ?>

				<?php if ( '' !== gt_drive_get_option( 'header_email' ) || is_customize_preview() ) : ?>

					<div class="header-email">
						<?php echo gt_drive_get_svg( 'mail' ); ?>
						<span class="header-email-text"><?php echo wp_kses_post( gt_drive_get_option( 'header_email' ) ); ?>
					</div>

				<?php endif; ?>

				<?php if ( '' !== gt_drive_get_option( 'header_address' ) || is_customize_preview() ) : ?>

					<div class="header-address">
						<?php echo gt_drive_get_svg( 'location' ); ?>
						<span class="header-address-text"><?php echo wp_kses_post( gt_drive_get_option( 'header_address' ) ); ?>
					</div>

				<?php endif; ?>

			</div>

			<?php if ( has_nav_menu( 'social-header' ) ) : ?>

				<div class="header-bar-social-icons social-icons-nav">

					<?php gt_drive_social_icons_menu( 'social-header' ); ?>

				</div>

			<?php endif; ?>

		</div>

	</div><!-- .header-bar -->

<?php endif; ?>
