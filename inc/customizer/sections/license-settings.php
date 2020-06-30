<?php
/**
 * License Settings
 *
 * Register License Settings
 *
 * @package GT Drive
 */

/**
 * Adds all License settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gt_drive_customize_register_license_settings( $wp_customize ) {

	// Add Section for License.
	$wp_customize->add_section( 'gt_drive_section_license', array(
		'title'       => esc_html__( 'License', 'gt-drive' ),
		'description' => esc_html__( 'Please enter your license key. An active license key is necessary for automatic theme updates and support.', 'gt-drive' ),
		'priority'    => 60,
		'panel'       => 'gt_drive_options_panel',
	) );

	// Add Theme Links control.
	$wp_customize->add_control( new GT_Drive_Customize_Links_Control(
		$wp_customize, 'gt_drive_theme_links', array(
			'section'  => 'gt_drive_section_license',
			'settings' => array(),
			'priority' => 10,
		)
	) );

	// Add License Key setting.
	$wp_customize->add_setting( 'gt_drive_theme_options[license_key]', array(
		'default'           => '',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new GT_Drive_Customize_License_Control(
		$wp_customize, 'license_key', array(
			'label'    => esc_html__( 'License Key', 'gt-drive' ),
			'section'  => 'gt_drive_section_license',
			'settings' => 'gt_drive_theme_options[license_key]',
			'priority' => 20,
		)
	) );
}
add_action( 'customize_register', 'gt_drive_customize_register_license_settings' );
