<?php
/**
 * Blog Settings
 *
 * @package GT Drive
 */

/**
 * Add Blog settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gt_drive_customize_register_blog_settings( $wp_customize ) {

	// Add Section for Blog Settings.
	$wp_customize->add_section( 'gt_drive_section_blog', array(
		'title'    => esc_html__( 'Blog Settings', 'gt-drive' ),
		'priority' => 20,
		'panel'    => 'gt_drive_options_panel',
	) );

	// Get Default Settings.
	$default = gt_drive_default_options();

	// Add Setting and Control for Number of posts.
	$wp_customize->add_setting( 'posts_per_page', array(
		'default'           => absint( get_option( 'posts_per_page' ) ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'gt_drive_posts_per_page_setting', array(
		'label'    => esc_html__( 'Number of Posts', 'gt-drive' ),
		'section'  => 'gt_drive_section_blog',
		'settings' => 'posts_per_page',
		'type'     => 'number',
		'priority' => 10,
	) );

	// Add Partial for Number of Posts setting.
	$wp_customize->selective_refresh->add_partial( 'gt_drive_blog_partial', array(
		'selector'         => '.site-content .site-main',
		'settings'         => array( 'posts_per_page' ),
		'render_callback'  => 'gt_drive_customize_blog_partial',
		'fallback_refresh' => false,
	) );

	// Add Post Details Headline.
	$wp_customize->add_control( new GT_Drive_Customize_Header_Control(
		$wp_customize, 'gt_drive_theme_options[post_details]', array(
			'label'    => esc_html__( 'Post Details', 'gt-drive' ),
			'section'  => 'gt_drive_section_blog',
			'settings' => array(),
			'priority' => 20,
		)
	) );

	// Add Setting and Control for showing post date.
	$wp_customize->add_setting( 'gt_drive_theme_options[meta_date]', array(
		'default'           => $default['meta_date'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'gt_drive_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'gt_drive_theme_options[meta_date]', array(
		'label'    => esc_html__( 'Display date', 'gt-drive' ),
		'section'  => 'gt_drive_section_blog',
		'settings' => 'gt_drive_theme_options[meta_date]',
		'type'     => 'checkbox',
		'priority' => 30,
	) );

	// Add Setting and Control for showing post author.
	$wp_customize->add_setting( 'gt_drive_theme_options[meta_author]', array(
		'default'           => $default['meta_author'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'gt_drive_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'gt_drive_theme_options[meta_author]', array(
		'label'    => esc_html__( 'Display author', 'gt-drive' ),
		'section'  => 'gt_drive_section_blog',
		'settings' => 'gt_drive_theme_options[meta_author]',
		'type'     => 'checkbox',
		'priority' => 40,
	) );

	// Add Setting and Control for showing post categories.
	$wp_customize->add_setting( 'gt_drive_theme_options[meta_categories]', array(
		'default'           => $default['meta_categories'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'gt_drive_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'gt_drive_theme_options[meta_categories]', array(
		'label'    => esc_html__( 'Display categories', 'gt-drive' ),
		'section'  => 'gt_drive_section_blog',
		'settings' => 'gt_drive_theme_options[meta_categories]',
		'type'     => 'checkbox',
		'priority' => 50,
	) );

	// Add Single Post Headline.
	$wp_customize->add_control( new GT_Drive_Customize_Header_Control(
		$wp_customize, 'gt_drive_theme_options[single_post]', array(
			'label'    => esc_html__( 'Single Post', 'gt-drive' ),
			'section'  => 'gt_drive_section_blog',
			'settings' => array(),
			'priority' => 60,
		)
	) );

	// Add Setting and Control for showing post tags.
	$wp_customize->add_setting( 'gt_drive_theme_options[meta_tags]', array(
		'default'           => $default['meta_tags'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'gt_drive_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'gt_drive_theme_options[meta_tags]', array(
		'label'    => esc_html__( 'Display tags', 'gt-drive' ),
		'section'  => 'gt_drive_section_blog',
		'settings' => 'gt_drive_theme_options[meta_tags]',
		'type'     => 'checkbox',
		'priority' => 70,
	) );
}
add_action( 'customize_register', 'gt_drive_customize_register_blog_settings' );


/**
 * Render the blog layout for the selective refresh partial.
 */
function gt_drive_customize_blog_partial() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/post/content' );
	}

	gt_drive_pagination();
}
