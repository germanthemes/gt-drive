<?php
/**
 * The template used for displaying page content in page.php
 *
 * @version 1.0
 * @package GT Drive
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="page-header entry-header">

		<?php the_title( '<h1 class="page-title entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_content(); ?>
		<?php wp_link_pages(); ?>

	</div><!-- .entry-content -->

	<?php gt_drive_widget_area( 'after-pages' ); ?>
	<?php do_action( 'gt_drive_after_pages' ); ?>

</article>
