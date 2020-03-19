<?php
/**
 * Theme Color Settings
 *
 * @package GT Drive
 */

/**
 * Adds all Theme Color settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gt_drive_customize_register_theme_color_settings( $wp_customize ) {

	// Add Section for Theme Colors.
	$wp_customize->add_section( 'gt_drive_section_theme_colors', array(
		'title'    => esc_html__( 'Theme Colors', 'gt-drive' ),
		'priority' => 40,
		'panel'    => 'gt_drive_options_panel',
	) );

	// Get Default Colors from settings.
	$default = gt_drive_default_options();

	// Add Header Bar Color setting.
	$wp_customize->add_setting( 'gt_drive_theme_options[header_bar_color]', array(
		'default'           => $default['header_bar_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_drive_theme_options[header_bar_color]', array(
			'label'    => esc_html_x( 'Header Bar', 'Color Option', 'gt-drive' ),
			'section'  => 'gt_drive_section_theme_colors',
			'settings' => 'gt_drive_theme_options[header_bar_color]',
			'priority' => 10,
		)
	) );

	// Add Header Bar Icons setting.
	$wp_customize->add_setting( 'gt_drive_theme_options[header_bar_icons_color]', array(
		'default'           => $default['header_bar_icons_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_drive_theme_options[header_bar_icons_color]', array(
			'label'    => esc_html_x( 'Header Bar Icons', 'Color Option', 'gt-drive' ),
			'section'  => 'gt_drive_section_theme_colors',
			'settings' => 'gt_drive_theme_options[header_bar_icons_color]',
			'priority' => 20,
		)
	) );

	// Add Header Color setting.
	$wp_customize->add_setting( 'gt_drive_theme_options[header_color]', array(
		'default'           => $default['header_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_drive_theme_options[header_color]', array(
			'label'    => esc_html_x( 'Header', 'Color Option', 'gt-drive' ),
			'section'  => 'gt_drive_section_theme_colors',
			'settings' => 'gt_drive_theme_options[header_color]',
			'priority' => 30,
		)
	) );

	// Add Titles Color setting.
	$wp_customize->add_setting( 'gt_drive_theme_options[title_color]', array(
		'default'           => $default['title_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_drive_theme_options[title_color]', array(
			'label'    => esc_html_x( 'Titles', 'Color Option', 'gt-drive' ),
			'section'  => 'gt_drive_section_theme_colors',
			'settings' => 'gt_drive_theme_options[title_color]',
			'priority' => 40,
		)
	) );

	// Add Title Hover Color setting.
	$wp_customize->add_setting( 'gt_drive_theme_options[title_hover_color]', array(
		'default'           => $default['title_hover_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_drive_theme_options[title_hover_color]', array(
			'label'    => esc_html_x( 'Title Hover', 'Color Option', 'gt-drive' ),
			'section'  => 'gt_drive_section_theme_colors',
			'settings' => 'gt_drive_theme_options[title_hover_color]',
			'priority' => 50,
		)
	) );

	// Add Title Border Color setting.
	$wp_customize->add_setting( 'gt_drive_theme_options[title_border_color]', array(
		'default'           => $default['title_border_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_drive_theme_options[title_border_color]', array(
			'label'    => esc_html_x( 'Title Border', 'Color Option', 'gt-drive' ),
			'section'  => 'gt_drive_section_theme_colors',
			'settings' => 'gt_drive_theme_options[title_border_color]',
			'priority' => 60,
		)
	) );

	// Add Link Color setting.
	$wp_customize->add_setting( 'gt_drive_theme_options[link_color]', array(
		'default'           => $default['link_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_drive_theme_options[link_color]', array(
			'label'    => esc_html_x( 'Links', 'Color Option', 'gt-drive' ),
			'section'  => 'gt_drive_section_theme_colors',
			'settings' => 'gt_drive_theme_options[link_color]',
			'priority' => 70,
		)
	) );

	// Add Link Hover Color setting.
	$wp_customize->add_setting( 'gt_drive_theme_options[link_hover_color]', array(
		'default'           => $default['link_hover_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_drive_theme_options[link_hover_color]', array(
			'label'    => esc_html_x( 'Link Hover', 'Color Option', 'gt-drive' ),
			'section'  => 'gt_drive_section_theme_colors',
			'settings' => 'gt_drive_theme_options[link_hover_color]',
			'priority' => 80,
		)
	) );

	// Add Button Color setting.
	$wp_customize->add_setting( 'gt_drive_theme_options[button_color]', array(
		'default'           => $default['button_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_drive_theme_options[button_color]', array(
			'label'    => esc_html_x( 'Buttons', 'Color Option', 'gt-drive' ),
			'section'  => 'gt_drive_section_theme_colors',
			'settings' => 'gt_drive_theme_options[button_color]',
			'priority' => 90,
		)
	) );

	// Add Button Hover Color setting.
	$wp_customize->add_setting( 'gt_drive_theme_options[button_hover_color]', array(
		'default'           => $default['button_hover_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_drive_theme_options[button_hover_color]', array(
			'label'    => esc_html_x( 'Button Hover', 'Color Option', 'gt-drive' ),
			'section'  => 'gt_drive_section_theme_colors',
			'settings' => 'gt_drive_theme_options[button_hover_color]',
			'priority' => 100,
		)
	) );

	// Add Footer Color setting.
	$wp_customize->add_setting( 'gt_drive_theme_options[footer_color]', array(
		'default'           => $default['footer_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_drive_theme_options[footer_color]', array(
			'label'    => esc_html_x( 'Footer', 'Color Option', 'gt-drive' ),
			'section'  => 'gt_drive_section_theme_colors',
			'settings' => 'gt_drive_theme_options[footer_color]',
			'priority' => 110,
		)
	) );
}
add_action( 'customize_register', 'gt_drive_customize_register_theme_color_settings' );
