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

	// Register Block patterns.
	register_block_pattern( 'gt-drive/hero-section', array(
		'title'      => esc_html__( 'Hero Section', 'gt-drive' ),
		'content'    => "<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"white\"} --><div class=\"wp-block-group alignfull has-white-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"verticalAlignment\":\"center\",\"align\":\"wide\"} --><div class=\"wp-block-columns alignwide are-vertically-aligned-center\"><!-- wp:column {\"verticalAlignment\":\"center\"} --><div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:heading {\"level\":1,\"className\":\"is-style-gt-heading\"} --><h1 class=\"is-style-gt-heading\">Hero Section</h1><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --><!-- wp:buttons --><div class=\"wp-block-buttons\"><!-- wp:button {\"className\":\"is-style-fill\"} --><div class=\"wp-block-button is-style-fill\"><a class=\"wp-block-button__link\">Button 1</a></div><!-- /wp:button --><!-- wp:button {\"className\":\"is-style-fill\"} --><div class=\"wp-block-button is-style-fill\"><a class=\"wp-block-button__link\">Button 2</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div><!-- /wp:column --><!-- wp:column {\"verticalAlignment\":\"center\"} --><div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:image --><figure class=\"wp-block-image\"><img alt=\"\"/></figure><!-- /wp:image --></div><!-- /wp:column --></div><!-- /wp:columns --></div></div><!-- /wp:group -->",
		'categories' => array( 'gt-drive' ),
	) );

	register_block_pattern( 'gt-drive/features', array(
		'title'      => esc_html__( 'Features', 'gt-drive' ),
		'content'    => "<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"light-gray\"} --><div class=\"wp-block-group alignfull has-light-gray-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:spacer {\"height\":50} --><div style=\"height:50px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div><!-- /wp:spacer --><!-- wp:columns {\"verticalAlignment\":\"center\",\"align\":\"wide\"} --><div class=\"wp-block-columns alignwide are-vertically-aligned-center\"><!-- wp:column {\"verticalAlignment\":\"center\"} --><div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph {\"fontSize\":\"huge\"} --><p class=\"has-huge-font-size\"><strong>01</strong></p><!-- /wp:paragraph --><!-- wp:heading --><h2>Feature</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean ligula eget dolor.</p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column {\"verticalAlignment\":\"center\"} --><div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph {\"fontSize\":\"huge\"} --><p class=\"has-huge-font-size\"><strong>02</strong></p><!-- /wp:paragraph --><!-- wp:heading --><h2>Feature</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean ligula eget dolor.</p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column {\"verticalAlignment\":\"center\"} --><div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph {\"fontSize\":\"huge\"} --><p class=\"has-huge-font-size\"><strong>03</strong></p><!-- /wp:paragraph --><!-- wp:heading --><h2>Feature</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean ligula eget dolor.</p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column {\"verticalAlignment\":\"center\"} --><div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph {\"fontSize\":\"huge\"} --><p class=\"has-huge-font-size\"><strong>04</strong></p><!-- /wp:paragraph --><!-- wp:heading --><h2>Feature</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean ligula eget dolor.</p><!-- /wp:paragraph --></div><!-- /wp:column --></div><!-- /wp:columns --><!-- wp:spacer {\"height\":50} --><div style=\"height:50px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div><!-- /wp:spacer --></div></div><!-- /wp:group -->",
		'categories' => array( 'gt-drive' ),
	) );

	register_block_pattern( 'gt-drive/projects', array(
		'title'      => esc_html__( 'Projects', 'gt-drive' ),
		'content'    => "<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"white\"} --><div class=\"wp-block-group alignfull has-white-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:media-text --><div class=\"wp-block-media-text alignwide is-stacked-on-mobile\"><figure class=\"wp-block-media-text__media\"></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading --><h2>Project 01</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --></div></div><!-- /wp:media-text --></div></div><!-- /wp:group --><!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"dark-gray\",\"textColor\":\"white\"} --><div class=\"wp-block-group alignfull has-white-color has-dark-gray-background-color has-text-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:paragraph {\"align\":\"center\",\"textColor\":\"white\",\"fontSize\":\"large\",\"gtRemoveMarginBottom\":true} --><p class=\"has-text-align-center has-white-color has-text-color has-large-font-size gt-remove-margin-bottom\">Call to action text.</p><!-- /wp:paragraph --></div></div><!-- /wp:group --><!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"white\"} --><div class=\"wp-block-group alignfull has-white-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:media-text {\"mediaPosition\":\"right\"} --><div class=\"wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile\"><figure class=\"wp-block-media-text__media\"></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading --><h2>Project 02</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --></div></div><!-- /wp:media-text --></div></div><!-- /wp:group -->",
		'categories' => array( 'gt-drive' ),
	) );

	register_block_pattern( 'gt-drive/portfolio', array(
		'title'      => esc_html__( 'Portfolio', 'gt-drive' ),
		'content'    => "<!-- wp:columns {\"align\":\"wide\"} --><div class=\"wp-block-columns alignwide\"><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:image --><figure class=\"wp-block-image\"><img alt=\"\"/></figure><!-- /wp:image --><!-- wp:heading --><h2>Project 1</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:image --><figure class=\"wp-block-image\"><img alt=\"\"/></figure><!-- /wp:image --><!-- wp:heading --><h2>Project 2</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:image --><figure class=\"wp-block-image\"><img alt=\"\"/></figure><!-- /wp:image --><!-- wp:heading --><h2>Project 3</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --></div><!-- /wp:column --></div><!-- /wp:columns -->",
		'categories' => array( 'gt-drive' ),
	) );

	register_block_pattern( 'gt-drive/services', array(
		'title'      => esc_html__( 'Services', 'gt-drive' ),
		'content'    => "<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"white\"} --><div class=\"wp-block-group alignfull has-white-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:media-text --><div class=\"wp-block-media-text alignwide is-stacked-on-mobile\"><figure class=\"wp-block-media-text__media\"></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading --><h2>Service 01</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --></div></div><!-- /wp:media-text --></div></div><!-- /wp:group --><!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"light-gray\"} --><div class=\"wp-block-group alignfull has-light-gray-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:media-text {\"mediaPosition\":\"right\"} --><div class=\"wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile\"><figure class=\"wp-block-media-text__media\"></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading --><h2>Service 02</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --></div></div><!-- /wp:media-text --></div></div><!-- /wp:group --><!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"white\"} --><div class=\"wp-block-group alignfull has-white-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:media-text --><div class=\"wp-block-media-text alignwide is-stacked-on-mobile\"><figure class=\"wp-block-media-text__media\"></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading --><h2>Service 03</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --></div></div><!-- /wp:media-text --></div></div><!-- /wp:group -->",
		'categories' => array( 'gt-drive' ),
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
