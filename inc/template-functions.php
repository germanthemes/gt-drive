<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package GT Drive
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function gt_drive_body_classes( $classes ) {

	// Get theme options from database.
	$theme_options = gt_drive_theme_options();

	// Hide Site Title?
	if ( false === $theme_options['site_title'] ) {
		$classes[] = 'site-title-hidden';
	}

	// Hide Site Description?
	if ( false === $theme_options['site_description'] ) {
		$classes[] = 'site-description-hidden';
	}

	// Add class if header search is enabled.
	if ( true === $theme_options['header_search'] ) {
		$classes[] = 'header-search-enabled';
	}

	// Add class if main navigation menu or header social icons are present.
	if ( has_nav_menu( 'primary' ) or has_nav_menu( 'social-header' ) ) {
		$classes[] = 'primary-navigation-active';
	}

	// Hide header search in Customizer for instant live preview.
	if ( is_customize_preview() && false === $theme_options['header_search'] ) {
		$classes[] = 'header-search-hidden';
	}

	// Hide Date?
	if ( false === $theme_options['meta_date'] ) {
		$classes[] = 'date-hidden';
	}

	// Hide Author?
	if ( false === $theme_options['meta_author'] ) {
		$classes[] = 'author-hidden';
	}

	// Hide Categories?
	if ( false === $theme_options['meta_categories'] ) {
		$classes[] = 'categories-hidden';
	}

	// Hide Tags?
	if ( false === $theme_options['meta_tags'] ) {
		$classes[] = 'tags-hidden';
	}

	// Add Blog Sidebar class.
	if ( is_active_sidebar( 'sidebar-1' ) && gt_drive_is_blog_page() ) {
		$classes[] = 'has-blog-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'gt_drive_body_classes' );


/**
 * Check if we are on a blog page or single post.
 *
 * @return bool
 */
function gt_drive_is_blog_page() {
	return ( 'post' === get_post_type() ) && ( is_home() || is_archive() || is_single() );
}


/**
 * Add custom CSS to scale down logo image for retina displays.
 *
 * @return void
 */
function gt_drive_retina_logo() {
	// Return early if there is no logo image or option for retina logo is disabled.
	if ( ! has_custom_logo() or false === gt_drive_get_option( 'retina_logo' ) ) {
		return;
	}

	// Get Logo Image.
	$logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );

	// Create CSS.
	$css = '.site-logo .custom-logo { width: ' . absint( floor( $logo[1] / 2 ) ) . 'px; }';

	// Add Custom CSS.
	wp_add_inline_style( 'gt-drive-stylesheet', $css );
}
add_filter( 'wp_enqueue_scripts', 'gt_drive_retina_logo', 11 );


/**
 * Add dropdown icon if menu item has children.
 *
 * @param  string $title The menu item's title.
 * @param  object $item  The current menu item.
 * @param  array  $args  An array of wp_nav_menu() arguments.
 * @param  int    $depth Depth of menu item. Used for padding.
 * @return string $title The menu item's title with dropdown icon.
 */
function gt_drive_dropdown_icon_to_menu_link( $title, $item, $args, $depth ) {
	if ( 'primary' === $args->theme_location ) {
		foreach ( $item->classes as $value ) {
			if ( 'menu-item-has-children' === $value || 'page_item_has_children' === $value ) {
				$title = $title . gt_drive_get_svg( 'expand' );
			}
		}
	}

	return $title;
}
add_filter( 'nav_menu_item_title', 'gt_drive_dropdown_icon_to_menu_link', 10, 4 );


/**
 * Return SVG markup.
 *
 * @param string $icon SVG icon id.
 * @return string $svg SVG markup.
 */
function gt_drive_get_svg( $icon = null ) {
	// Return early if no icon was defined.
	if ( empty( $icon ) ) {
		return;
	}

	// Create SVG markup.
	$svg  = '<svg class="icon icon-' . esc_attr( $icon ) . '" aria-hidden="true" role="img">';
	$svg .= ' <use xlink:href="' . get_parent_theme_file_uri( '/assets/icons/genericons-neue.svg#' ) . esc_html( $icon ) . '"></use> ';
	$svg .= '</svg>';

	return $svg;
}


/**
 * Return SVG markup for social icons.
 *
 * @param string $icon SVG icon id.
 * @return string $svg SVG markup.
 */
function gt_drive_get_social_svg( $icon = null ) {
	// Return early if no icon was defined.
	if ( empty( $icon ) ) {
		return;
	}

	// Create SVG markup.
	$svg  = '<svg class="icon icon-' . esc_attr( $icon ) . '" aria-hidden="true" role="img">';
	$svg .= ' <use xlink:href="' . get_parent_theme_file_uri( '/assets/icons/social-icons.svg#icon-' ) . esc_html( $icon ) . '"></use> ';
	$svg .= '</svg>';

	return $svg;
}


/**
 * Display SVG icons in social links menu.
 *
 * @param  string  $item_output The menu item output.
 * @param  WP_Post $item        Menu item object.
 * @param  int     $depth       Depth of the menu.
 * @param  array   $args        wp_nav_menu() arguments.
 * @return string  $item_output The menu item output with social icon.
 */
function gt_drive_social_icons_menu_walker( $item_output, $item, $depth, $args ) {

	// Get supported social icons.
	$social_icons = gt_drive_supported_social_icons();

	// Change SVG icon inside social links menu if there is supported URL.
	if ( 'social-header' === $args->theme_location || 'social-footer' === $args->theme_location ) {
		$icon = 'star';
		foreach ( $social_icons as $attr => $value ) {
			if ( false !== strpos( $item_output, $attr ) ) {
				$icon = esc_attr( $value );
			}
		}
		$item_output = str_replace( $args->link_after, '</span>' . gt_drive_get_social_svg( $icon ), $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'gt_drive_social_icons_menu_walker', 10, 4 );


/**
 * Returns an array of supported social links (URL and icon name).
 *
 * @return array $social_links_icons
 */
function gt_drive_supported_social_icons() {
	// Supported social links icons.
	$supported_social_icons = array(
		'500px'           => '500px',
		'amazon'          => 'amazon',
		'apple'           => 'apple',
		'bandcamp'        => 'bandcamp',
		'behance.net'     => 'behance',
		'bitbucket'       => 'bitbucket',
		'codepen'         => 'codepen',
		'deviantart'      => 'deviantart',
		'digg.com'        => 'digg',
		'dribbble'        => 'dribbble',
		'dropbox.com'     => 'dropbox',
		'etsy.com'        => 'etsy',
		'facebook.com'    => 'facebook',
		'feed'            => 'rss',
		'rss'             => 'rss',
		'flickr.com'      => 'flickr',
		'foursquare.com'  => 'foursquare',
		'github.com'      => 'github',
		'instagram.com'   => 'instagram',
		'linkedin.com'    => 'linkedin',
		'mailto:'         => 'envelope',
		'medium.com'      => 'medium-m',
		'meetup.com'      => 'meetup',
		'pinterest'       => 'pinterest-p',
		'getpocket.com'   => 'get-pocket',
		'reddit.com'      => 'reddit-alien',
		'skype.com'       => 'skype',
		'skype:'          => 'skype',
		'slideshare'      => 'slideshare',
		'snapchat.com'    => 'snapchat',
		'soundcloud.com'  => 'soundcloud',
		'spotify.com'     => 'spotify',
		'stumbleupon.com' => 'stumbleupon',
		'telegram'        => 'telegram',
		't.me'            => 'telegram',
		'tumblr.com'      => 'tumblr',
		'twitch.tv'       => 'twitch',
		'twitter.com'     => 'twitter',
		'vimeo.com'       => 'vimeo',
		'vine.co'         => 'vine',
		'vk.com'          => 'vk',
		'whatsapp'        => 'whatsapp',
		'wa.me'           => 'whatsapp',
		'wordpress.org'   => 'wordpress',
		'wordpress.com'   => 'wordpress',
		'xing.com'        => 'xing',
		'yelp.com'        => 'yelp',
		'youtube.com'     => 'youtube',
	);

	return $supported_social_icons;
}
