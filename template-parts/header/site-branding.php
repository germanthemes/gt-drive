<?php
/**
 * Header Main
 *
 * @version 1.0
 * @package GT Drive
 */
?>

<div id="logo" class="site-branding">

	<?php if ( has_custom_logo() ) : ?>

		<div class="site-logo">
			<?php the_custom_logo(); ?>
		</div>

	<?php endif; ?>

	<div class="site-info">
		<?php gt_drive_site_title(); ?>
		<?php gt_drive_site_description(); ?>
	</div>

</div><!-- .site-branding -->
