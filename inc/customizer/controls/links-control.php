<?php
/**
 * Theme Links Control for the Customizer
 *
 * @package GT Drive
 */

/**
 * Make sure that custom controls are only defined in the Customizer
 */
if ( class_exists( 'WP_Customize_Control' ) ) :

	/**
	 * Displays the theme links in the Customizer.
	 */
	class GT_Drive_Customize_Links_Control extends WP_Customize_Control {
		/**
		 * Render Control
		 */
		public function render_content() {
			?>

			<div class="theme-links">

				<span class="customize-control-title"><?php esc_html_e( 'Theme Links', 'gt-drive' ); ?></span>

				<p>
					<a href="<?php echo esc_url( __( 'https://germanthemes.de/en/themes/gt-drive/', 'gt-drive' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=gt-drive&utm_content=theme-page" target="_blank">
						<?php esc_html_e( 'Theme Page', 'gt-drive' ); ?>
					</a>
				</p>

				<p>
					<a href="https://demo.germanthemes.de/?demo=gt-drive&utm_source=customizer&utm_campaign=gt-drive" target="_blank">
						<?php esc_html_e( 'Theme Demo', 'gt-drive' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://germanthemes.de/en/docs/gt-drive-documentation/', 'gt-drive' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=gt-drive&utm_content=documentation" target="_blank">
						<?php esc_html_e( 'Theme Documentation', 'gt-drive' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/gt-drive/reviews/', 'gt-drive' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Rate this theme', 'gt-drive' ); ?>
					</a>
				</p>

			</div>

			<?php
		}
	}

endif;
