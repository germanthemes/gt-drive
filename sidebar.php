<?php
/**
 * The sidebar containing the widget area on blog pages.
 *
 * @package GT Drive
 */

// Check if Sidebar should be displayed.
if ( gt_drive_has_sidebar() ) : ?>

	<section id="secondary" class="sidebar widget-area" role="complementary">

		<?php dynamic_sidebar( 'sidebar-1' ); ?>

	</section><!-- #secondary -->

	<?php
endif;
