<?php
/**
 * myTheme Theme Customizer
 *
 * @package myTheme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mytheme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'mytheme_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'mytheme_customize_partial_blogdescription',
		) );
	}

	//main-image
	$wp_customize->add_section( 'main_image', array(
		'title' => __( 'Main Image' ),
		'priority' => 70
	) );
	$wp_customize->add_setting( 'main_image_set',array(
		'default' => get_bloginfo('template_directory') . '/img/hand.png',
	));
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'main_image_set',
			array(
				'label'      => __( 'Upload a picture', 'mytheme' ),
				'section'    => 'main_image',
				'settings'   => 'main_image_set',
			)
		)
	);

	//border
	$wp_customize->add_section( 'border', array(
		'title' => __( 'Border' ),
		'priority' => 75
	) );
	$wp_customize->add_setting( 'border_color_set',array(
		'default'	 => '#2ecc71',
		'transport'  => 'refresh'
	) );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'border_color_set',
			array(
				'label'      => __( 'Border Color', 'mytheme' ),
				'section'    => 'border',
				'settings'   => 'border_color_set',
				'default'	 => '#2ecc71',
			) )
	);
	

	//footer
    $wp_customize->add_section( 'footer', array(
        'title' => __( 'Footer' ),
        'priority' => 160
    ) );
    $wp_customize->add_setting( 'footer_bg_color',array(
        'default'	 => '#e3e3e3',
        'transport'  => 'refresh'
    ) );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_bg_color',
            array(
                'label'      => __( 'Background', 'mytheme' ),
                'section'    => 'footer',
                'settings'   => 'footer_bg_color',
                'default'	 => '#e3e3e3',
            ) )
    );
	//get-notified
	$wp_customize->add_section( 'get_notified', array(
		'title' => __( 'Get notified' ),
		'priority' => 150
	) );
	$wp_customize->add_setting( 'get_notified_bg_color',array(
		'default'	 => '#e3e3e3',
		'transport'  => 'refresh'
	) );
	$wp_customize->add_setting( 'get_notified_title');
	$wp_customize->add_setting( 'get_notified_text');
	$wp_customize->add_setting( 'get_notified_media');

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'get_notified_bg_color',
			array(
				'label'      => __( 'Background', 'mytheme' ),
				'section'    => 'get_notified',
				'settings'   => 'get_notified_bg_color',
				'default'	 => '#e3e3e3',
			) )
	);
	$wp_customize->add_control( 'get_notified_title', array(
		'label' => __( 'Title' ),
		'type' => 'text',
		'section' => 'get_notified',
	) );
	$wp_customize->add_control( 'get_notified_text', array(
		'label' => __( 'Text' ),
		'type' => 'text',
		'section' => 'get_notified',
	) );
	$wp_customize->add_control( 'get_notified_media', array(
		'label' => __( 'Enter the link of your media' ),
		'type' => 'text',
		'section' => 'get_notified',
	) );
}
add_action( 'customize_register', 'mytheme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function mytheme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function mytheme_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mytheme_customize_preview_js() {
	wp_enqueue_script( 'mytheme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'mytheme_customize_preview_js' );
