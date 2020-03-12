<?php
/**
 * Footer Widgets
 *
 * @version 1.0
 * @package GT Drive
 */


// Check if there are footer widgets.
if ( is_active_sidebar( 'footer-column-1' )
	or is_active_sidebar( 'footer-column-2' )
	or is_active_sidebar( 'footer-column-3' )
	or is_active_sidebar( 'footer-column-4' ) ) :
	?>

	<div class="footer-widgets-background">

		<div id="footer-widgets" class="footer-widgets footer-main widget-area">

			<div class="footer-widgets-columns">

				<?php gt_drive_widget_area( 'footer-column-1', 'footer-widget-column' ); ?>

				<?php gt_drive_widget_area( 'footer-column-2', 'footer-widget-column' ); ?>

				<?php gt_drive_widget_area( 'footer-column-3', 'footer-widget-column' ); ?>

				<?php gt_drive_widget_area( 'footer-column-4', 'footer-widget-column' ); ?>

			</div>

		</div><!-- .footer-widgets -->

	</div>

	<?php
endif;
