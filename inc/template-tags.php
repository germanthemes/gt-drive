<?php
/**
 * Template Tags
 *
 * This file contains several template functions which are used to print out specific HTML markup
 * in the theme. You can override these template functions within your child theme.
 *
 * @package GT Drive
 */

if ( ! function_exists( 'gt_drive_site_title' ) ) :
	/**
	 * Displays the site title in the header area
	 */
	function gt_drive_site_title() {

		if ( is_home() ) : ?>

			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

		<?php else : ?>

			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>

		<?php
		endif;
	}
endif;


if ( ! function_exists( 'gt_drive_site_description' ) ) :
	/**
	 * Displays the site description in the header area
	 */
	function gt_drive_site_description() {

		$description = get_bloginfo( 'description', 'display' ); /* WPCS: xss ok. */

		if ( $description || is_customize_preview() ) :
			?>

			<p class="site-description"><?php echo $description; ?></p>

			<?php
		endif;
	}
endif;


if ( ! function_exists( 'gt_drive_header_image' ) ) :
	/**
	 * Displays the custom header image below the navigation menu
	 */
	function gt_drive_header_image() {

		// Display featured image as header image on single pages.
		if ( is_page() && has_post_thumbnail() ) :
			?>

			<div id="headimg" class="header-image featured-header-image">

				<?php the_post_thumbnail( 'gt-drive-header-image' ); ?>

			</div>

			<?php
		elseif ( has_header_image() ) : // Display header image.
			?>

			<div id="headimg" class="header-image default-header-image">

				<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id, 'full' ) ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">

			</div>

			<?php
		endif;
	}
endif;


if ( ! function_exists( 'gt_drive_header_search_icon' ) ) :
	/**
	 * Add search icon to navigation menu
	 *
	 * @return void
	 */
	function gt_drive_header_search_icon() {

		// Show header search icon if activated.
		if ( true === gt_drive_get_option( 'header_search' ) || is_customize_preview() ) :
			?>

			<div class="header-search-button">

				<button class="header-search-icon" aria-controls="header-search" aria-expanded="false">
					<?php echo gt_drive_get_svg( 'search' ); ?>
					<span class="screen-reader-text"><?php esc_html_e( 'Search', 'gt-drive' ); ?></span>
				</button>

			</div>

			<?php
		endif;
	}
endif;


if ( ! function_exists( 'gt_drive_header_search_form' ) ) :
	/**
	 * Displays search form in header area
	 *
	 * @return void
	 */
	function gt_drive_header_search_form() {

		// Show header search form if activated.
		if ( true === gt_drive_get_option( 'header_search' ) || is_customize_preview() ) :
			?>

			<div class="header-search-dropdown">
				<div class="header-search-form">
					<?php get_search_form(); ?>

					<button class="header-search-close">
						<?php echo gt_drive_get_svg( 'close' ); ?>
						<span class="screen-reader-text"><?php esc_html_e( 'Close', 'gt-drive' ); ?></span>
					</button>
				</div>
			</div>

			<?php
		endif;
	}
endif;


if ( ! function_exists( 'gt_drive_social_icons_menu' ) ) :
	/**
	 * Displays social icons menu
	 *
	 * @return void
	 */
	function gt_drive_social_icons_menu( $menu ) {
		wp_nav_menu( array(
			'theme_location' => $menu,
			'container'      => false,
			'menu_class'     => $menu . '-menu social-icons-menu',
			'echo'           => true,
			'fallback_cb'    => '',
			'link_before'    => '<span class = "screen-reader-text">',
			'link_after'     => '</span>',
			'depth'          => 1,
		) );
	}
endif;


if ( ! function_exists( 'gt_drive_archive_header' ) ) :
	/**
	 * Displays the header title on archive pages.
	 */
	function gt_drive_archive_header() {
		?>

		<header class="archive-header entry-header">

			<?php the_archive_title( '<h1 class="archive-title entry-title">', '</h1>' ); ?>
			<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>

		</header><!-- .archive-header -->

		<?php
	}
endif;


if ( ! function_exists( 'gt_drive_search_header' ) ) :
	/**
	 * Displays the header title on search results.
	 */
	function gt_drive_search_header() {
		?>

		<header class="search-header entry-header">

			<h1 class="search-title entry-title">
				<?php
				// translators: Search Results title.
				printf( esc_html__( 'Search Results for: %s', 'gt-drive' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
			<?php get_search_form(); ?>

		</header><!-- .search-header -->

		<?php
	}
endif;


if ( ! function_exists( 'gt_drive_post_image' ) ) :
	/**
	 * Displays the featured image.
	 */
	function gt_drive_post_image() {
		if ( ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<figure class="post-image post-image-single">
				<?php the_post_thumbnail(); ?>
			</figure>

			<?php
		else :
			?>

			<figure class="post-image post-image-archives">
				<a class="wp-post-image-link" href="<?php the_permalink(); ?>" rel="bookmark" aria-hidden="true">
					<?php the_post_thumbnail(); ?>
				</a>
			</figure>

			<?php
		endif;
	}
endif;


if ( ! function_exists( 'gt_drive_entry_meta' ) ) :
	/**
	 * Displays the date and author of a post
	 */
	function gt_drive_entry_meta() {

		$postmeta  = gt_drive_entry_date();
		$postmeta .= gt_drive_entry_author();
		$postmeta .= gt_drive_entry_categories();

		echo '<div class="entry-meta">' . $postmeta . '</div>';
	}
endif;


if ( ! function_exists( 'gt_drive_entry_date' ) ) :
	/**
	 * Returns the post date
	 */
	function gt_drive_entry_date() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'gt-drive' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		return '<span class="posted-on">' . $posted_on . '</span>';
	}
endif;


if ( ! function_exists( 'gt_drive_entry_author' ) ) :
	/**
	 * Returns the post author
	 */
	function gt_drive_entry_author() {

		$author_string = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			// translators: post author link.
			esc_attr( sprintf( esc_html__( 'View all posts by %s', 'gt-drive' ), get_the_author() ) ),
			esc_html( get_the_author() )
		);

		$posted_by = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'gt-drive' ),
			$author_string
		);

		return '<span class="posted-by"> ' . $posted_by . '</span>';
	}
endif;


if ( ! function_exists( 'gt_drive_entry_categories' ) ) :
	/**
	 * Displays the post categories
	 */
	function gt_drive_entry_categories() {

		// Return early if post has no category.
		if ( ! has_category() ) {
			return;
		}

		$posted_in = sprintf(
			/* translators: %s: post category. */
			esc_html_x( 'in %s', 'post category', 'gt-drive' ),
			get_the_category_list( ', ' )
		);

		return '<span class="posted-in"> ' . $posted_in . '</span>';
	}
endif;


if ( ! function_exists( 'gt_drive_entry_tags' ) ) :
	/**
	 * Displays the post tags on single post view
	 */
	function gt_drive_entry_tags() {
		// Get tags.
		$tag_list = get_the_tag_list( esc_html__( 'Tags: ', 'gt-drive' ), ', ' );

		// Display tags.
		if ( $tag_list ) :
			echo '<p class="entry-tags">' . $tag_list . '</p>';
		endif;
	}
endif;


if ( ! function_exists( 'gt_drive_pagination' ) ) :
	/**
	 * Displays pagination on archive pages
	 */
	function gt_drive_pagination() {

		the_posts_pagination( array(
			'mid_size'  => 2,
			'prev_text' => '&laquo<span class="screen-reader-text">' . esc_html_x( 'Previous Posts', 'pagination', 'gt-drive' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . esc_html_x( 'Next Posts', 'pagination', 'gt-drive' ) . '</span>&raquo;',
		) );
	}
endif;


if ( ! function_exists( 'gt_drive_widget_area' ) ) :
	/**
	 * Display Widget Area
	 */
	function gt_drive_widget_area( $area, $class = '' ) {
		if ( is_active_sidebar( $area ) ) :
			?>

			<div class="<?php echo esc_attr( $area . '-widgets ' . $class . ' widget-area' ); ?>">
				<?php dynamic_sidebar( $area ); ?>
			</div>

			<?php
		endif;
	}
endif;
