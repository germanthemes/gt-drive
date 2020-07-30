<?php
/**
 * Add theme support for the Gutenberg Editor
 *
 * @package GT Drive
 */


/**
 * Registers support for various Gutenberg features.
 *
 * @return void
 */
function gt_drive_gutenberg_support() {

	// Get theme options from database.
	$theme_options = gt_drive_theme_options();

	// Add theme support for wide and full images.
	add_theme_support( 'align-wide' );

	// Add theme support for block color palette.
	add_theme_support( 'editor-color-palette', apply_filters( 'gt_drive_editor_color_palette_args', array(
		array(
			'name'  => esc_html_x( 'Primary', 'block color', 'gt-drive' ),
			'slug'  => 'primary',
			'color' => esc_html( $theme_options['primary_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Secondary', 'block color', 'gt-drive' ),
			'slug'  => 'secondary',
			'color' => esc_html( $theme_options['secondary_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Accent', 'block color', 'gt-drive' ),
			'slug'  => 'accent',
			'color' => esc_html( $theme_options['accent_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Highlight', 'block color', 'gt-drive' ),
			'slug'  => 'highlight',
			'color' => esc_html( $theme_options['highlight_color'] ),
		),
		array(
			'name'  => esc_html_x( 'White', 'block color', 'gt-drive' ),
			'slug'  => 'white',
			'color' => '#ffffff',
		),
		array(
			'name'  => esc_html_x( 'Light Gray', 'block color', 'gt-drive' ),
			'slug'  => 'light-gray',
			'color' => esc_html( $theme_options['light_gray_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Gray', 'block color', 'gt-drive' ),
			'slug'  => 'gray',
			'color' => esc_html( $theme_options['gray_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Dark Gray', 'block color', 'gt-drive' ),
			'slug'  => 'dark-gray',
			'color' => esc_html( $theme_options['dark_gray_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Black', 'block color', 'gt-drive' ),
			'slug'  => 'black',
			'color' => '#000000',
		),
	) ) );

	// Add theme support for font sizes.
	add_theme_support( 'editor-font-sizes', apply_filters( 'gt_drive_editor_font_sizes_args', array(
		array(
			'name' => esc_html_x( 'Small', 'block font size', 'gt-drive' ),
			'size' => 16,
			'slug' => 'small',
		),
		array(
			'name' => esc_html_x( 'Medium', 'block font size', 'gt-drive' ),
			'size' => 24,
			'slug' => 'medium',
		),
		array(
			'name' => esc_html_x( 'Large', 'block font size', 'gt-drive' ),
			'size' => 36,
			'slug' => 'large',
		),
		array(
			'name' => esc_html_x( 'Extra Large', 'block font size', 'gt-drive' ),
			'size' => 48,
			'slug' => 'extra-large',
		),
		array(
			'name' => esc_html_x( 'Huge', 'block font size', 'gt-drive' ),
			'size' => 64,
			'slug' => 'huge',
		),
	) ) );

	// Register Heading Block style.
	register_block_style( 'core/heading', array(
		'name'         => 'gt-heading',
		'label'        => esc_html__( 'GT Drive', 'gt-drive' ),
		'style_handle' => 'gt-drive-stylesheet',
	) );

	// Register Small Buttons Block style.
	register_block_style( 'core/buttons', array(
		'name'         => 'gt-small',
		'label'        => esc_html__( 'GT Small', 'gt-drive' ),
		'style_handle' => 'gt-drive-stylesheet',
	) );

	// Register Large Buttons Block style.
	register_block_style( 'core/buttons', array(
		'name'         => 'gt-large',
		'label'        => esc_html__( 'GT Large', 'gt-drive' ),
		'style_handle' => 'gt-drive-stylesheet',
	) );

	// Register GT Drive block pattern category.
	register_block_pattern_category( 'gt-drive', array( 'label' => esc_html__( 'GT Drive', 'gt-drive' ) ) );

	// Register Front Page block pattern.
	register_block_pattern( 'gt-drive/front-page', array(
		'title'       => esc_html__( 'Front Page', 'gt-drive' ),
		'description' => esc_html_x( 'The home page layout of the GT Drive theme demo.', 'Block pattern description', 'gt-drive' ),
		'content'     => "<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"white\",\"gtRemoveMarginTop\":true,\"gtRemoveMarginBottom\":true} -->\n<div class=\"wp-block-group alignfull has-white-background-color has-background gt-remove-margin-top gt-remove-margin-bottom\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"align\":\"wide\"} -->\n<div class=\"wp-block-columns alignwide\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"level\":1,\"className\":\"is-style-gt-heading\",\"gtRemoveMarginTop\":true} -->\n<h1 class=\"is-style-gt-heading gt-remove-margin-top\">Next generation WordPress Theme</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo  ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis  diss parturient montes, nascetur mus.  </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"className\":\"gt-remove-margin-bottom is-style-gt-large\"} -->\n<div class=\"wp-block-buttons gt-remove-margin-bottom is-style-gt-large\"><!-- wp:button {\"className\":\"is-style-fill gt-remove-margin-bottom\"} -->\n<div class=\"wp-block-button is-style-fill gt-remove-margin-bottom\"><a class=\"wp-block-button__link\" href=\"https://germanthemes.de/en/themes/gt-drive/\" target=\"_blank\" rel=\"noreferrer noopener\"><strong>Purchase Theme</strong></a></div>\n<!-- /wp:button -->\n\n<!-- wp:button {\"className\":\"gt-remove-margin-bottom is-style-outline\"} -->\n<div class=\"wp-block-button gt-remove-margin-bottom is-style-outline\"><a class=\"wp-block-button__link\"><strong>Learn more</strong></a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":380,\"sizeSlug\":\"large\",\"className\":\"is-style-default gt-remove-margin-bottom\"} -->\n<figure class=\"wp-block-image size-large is-style-default gt-remove-margin-bottom\"><img src=\"http://localhost/drive/wp-content/uploads/sites/10/2020/04/rebecca-li-nJ5hINhz6Fs-unsplash-1024x712.jpg\" alt=\"\" class=\"wp-image-380\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->\n\n<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"light-gray\",\"gtRemoveMarginBottom\":true} -->\n<div class=\"wp-block-group alignfull has-light-gray-background-color has-background gt-remove-margin-bottom\"><div class=\"wp-block-group__inner-container\"><!-- wp:spacer {\"height\":50} -->\n<div style=\"height:50px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:columns {\"verticalAlignment\":\"center\",\"align\":\"wide\",\"gtRemoveMarginBottom\":true} -->\n<div class=\"wp-block-columns alignwide are-vertically-aligned-center gt-remove-margin-bottom\"><!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph {\"fontSize\":\"huge\"} -->\n<p class=\"has-huge-font-size\"><strong>01</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading -->\n<h2>Feature</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean ligula eget dolor.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph {\"fontSize\":\"huge\"} -->\n<p class=\"has-huge-font-size\"><strong>02</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading -->\n<h2>Feature</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean ligula eget dolor.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph {\"fontSize\":\"huge\"} -->\n<p class=\"has-huge-font-size\"><strong>03</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading -->\n<h2>Feature</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean ligula eget dolor.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph {\"fontSize\":\"huge\"} -->\n<p class=\"has-huge-font-size\"><strong>04</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading -->\n<h2>Feature</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean ligula eget dolor.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:spacer {\"height\":50} -->\n<div style=\"height:50px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer --></div></div>\n<!-- /wp:group -->\n\n<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"white\"} -->\n<div class=\"wp-block-group alignfull has-white-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:media-text {\"mediaId\":379,\"mediaLink\":\"https://demo.germanthemes.de/gt-drive/mika-ypvm8pnyguo-unsplash/\",\"mediaType\":\"image\",\"className\":\"gt-remove-margin-bottom\"} -->\n<div class=\"wp-block-media-text alignwide is-stacked-on-mobile gt-remove-margin-bottom\"><figure class=\"wp-block-media-text__media\"><img src=\"http://localhost/drive/wp-content/uploads/sites/10/2020/04/mika-ypVM8PnygUo-unsplash-1024x683.jpg\" alt=\"\" class=\"wp-image-379\"/></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading -->\n<h2>Project 01</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"placeholder\":\"Inhalt…\"} -->\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis diss parturient montes, nascetur ridiculus mus.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:media-text --></div></div>\n<!-- /wp:group -->\n\n<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"dark-gray\",\"textColor\":\"white\"} -->\n<div class=\"wp-block-group alignfull has-white-color has-dark-gray-background-color has-text-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:paragraph {\"align\":\"center\",\"className\":\"gt-remove-margin-bottom\",\"textColor\":\"white\",\"fontSize\":\"large\"} -->\n<p class=\"has-text-align-center gt-remove-margin-bottom has-white-color has-text-color has-large-font-size\">Add call to action text here.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->\n\n<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"white\"} -->\n<div class=\"wp-block-group alignfull has-white-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:media-text {\"mediaPosition\":\"right\",\"mediaId\":382,\"mediaLink\":\"https://demo.germanthemes.de/gt-drive/dave-redfern-6ymnwhfehxq-unsplash/\",\"mediaType\":\"image\"} -->\n<div class=\"wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile\"><figure class=\"wp-block-media-text__media\"><img src=\"http://localhost/drive/wp-content/uploads/sites/10/2020/04/dave-redfern-6yMnWHFehxQ-unsplash-1024x678.jpg\" alt=\"\" class=\"wp-image-382\"/></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading -->\n<h2>Project 02</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"placeholder\":\"Inhalt…\"} -->\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis diss parturient montes, nascetur ridiculus mus.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:media-text --></div></div>\n<!-- /wp:group -->",
		'categories'  => array( 'gt-drive' ),
	) );
}
add_action( 'after_setup_theme', 'gt_drive_gutenberg_support' );


/**
 * Enqueue block styles and scripts for Gutenberg Editor.
 */
function gt_drive_block_editor_assets() {

	// Get Theme Version.
	$theme_version = wp_get_theme()->get( 'Version' );

	// Enqueue Editor Styling.
	wp_enqueue_style( 'gt-drive-editor-styles', get_theme_file_uri( '/assets/css/editor-styles.css' ), array(), $theme_version, 'all' );

	// Enqueue Theme Settings Editor plugin.
	wp_enqueue_script( 'gt-drive-editor-theme-settings', get_theme_file_uri( '/assets/js/editor-theme-settings.js' ), array( 'wp-blocks', 'wp-element', 'wp-edit-post' ), $theme_version );
}
add_action( 'enqueue_block_editor_assets', 'gt_drive_block_editor_assets' );


/**
 * Add body classes in Gutenberg Editor.
 */
function gt_drive_gutenberg_add_admin_body_class( $classes ) {
	global $post;
	$current_screen = get_current_screen();

	// Return early if we are not in the Gutenberg Editor.
	if ( ! ( method_exists( $current_screen, 'is_block_editor' ) && $current_screen->is_block_editor() ) ) {
		return $classes;
	}

	// Fullwidth Page Template?
	if ( 'templates/template-fullwidth.php' === get_page_template_slug( $post->ID ) ) {
		$classes .= ' gt-fullwidth-page-layout ';
	}

	// No Title Page Template?
	if ( 'templates/template-no-title.php' === get_page_template_slug( $post->ID ) ) {
		$classes .= ' gt-page-title-hidden ';
	}

	// Full-width / No Title Page Template?
	if ( 'templates/template-fullwidth-no-title.php' === get_page_template_slug( $post->ID ) ) {
		$classes .= ' gt-fullwidth-page-layout gt-page-title-hidden ';
	}

	return $classes;
}
add_filter( 'admin_body_class', 'gt_drive_gutenberg_add_admin_body_class' );
