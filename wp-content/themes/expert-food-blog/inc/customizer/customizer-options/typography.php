<?php
function expert_food_blog_typography_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'expert_food_blog_typography', array(
			'priority' => 31,
			'title' => esc_html__( 'Typography', 'expert-food-blog' ),
		)
	);

	/*=========================================
	Archive Post  Section
	=========================================*/
	$wp_customize->add_section(
		'expert_food_blog_typography_settings', array(
			'title' => esc_html__( 'Typography Option', 'expert-food-blog' ),
			'priority' => 1,
			'panel' => 'expert_food_blog_typography',
		)
	);
	$expert_food_blog_font_choices = array(
		'' => 'Select',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);

	$wp_customize->add_setting( 'expert_food_blog_headings_text', array(
		'sanitize_callback' => 'expert_food_blog_sanitize_fonts',
	));

	$wp_customize->add_control( 'expert_food_blog_headings_text', array(
		'type' => 'select',
		'description' => __('Select your appropriate font for the headings.', 'expert-food-blog'),
		'section' => 'expert_food_blog_typography_settings',
		'choices' => $expert_food_blog_font_choices

	));

	$wp_customize->add_setting( 'expert_food_blog_body_text', array(
		'sanitize_callback' => 'expert_food_blog_sanitize_fonts'
	));

	$wp_customize->add_control( 'expert_food_blog_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your appropriate font for the body.', 'expert-food-blog' ),
		'section' => 'expert_food_blog_typography_settings',
		'choices' => $expert_food_blog_font_choices
	) );
	
	$wp_customize->add_section(
	'expert_food_blog_dynamic_color_settings', array(
		'title' => esc_html__( 'Dynamic Color Options', 'expert-food-blog' ),
		'priority' => 1,
		'panel' => 'expert_food_blog_typography',
		)
	);

	$wp_customize->add_setting('expert_food_blog_dynamic_color_one', array(
        'default'           => '#9f1b31',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'expert_food_blog_dynamic_color_one', array(
        'label'    => __('First Dynamic Color', 'expert-food-blog'),
        'section'  => 'expert_food_blog_dynamic_color_settings',
    )));

	$wp_customize->add_setting('expert_food_blog_dynamic_color_two', array(
        'default'           => '#ffd5d3',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'expert_food_blog_dynamic_color_two', array(
        'label'    => __('Second Dynamic Color', 'expert-food-blog'),
        'section'  => 'expert_food_blog_dynamic_color_settings',
    )));

	$wp_customize->add_setting( 'expert_food_blog_upgrade_page_settings_20_color',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Expert_Food_Blog_Control_Upgrade(
        $wp_customize, 'expert_food_blog_upgrade_page_settings_20_color',
            array(
                'priority'      => 200,
                'section'       => 'expert_food_blog_dynamic_color_settings',
                'settings'      => 'expert_food_blog_upgrade_page_settings_20_color',
                'label'         => __( 'Expert Food Blog Pro comes with additional features.', 'expert-food-blog' ),
                'choices'       => array( __( '12+ Sections', 'expert-food-blog' ), __( 'One Click Demo Importer', 'expert-food-blog' ), __( 'Section Reordering Facility', 'expert-food-blog' ),__( 'Advance Typography', 'expert-food-blog' ),__( 'Easy Customization', 'expert-food-blog' ),__( '24x7 Support', 'expert-food-blog' ), )
            )
        )
    ); 

	$wp_customize->add_setting( 'expert_food_blog_upgrade_page_settings_20',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Expert_Food_Blog_Control_Upgrade(
        $wp_customize, 'expert_food_blog_upgrade_page_settings_20',
            array(
                'priority'      => 200,
                'section'       => 'expert_food_blog_typography_settings',
                'settings'      => 'expert_food_blog_upgrade_page_settings_20',
                'label'         => __( 'Expert Food Blog Pro comes with additional features.', 'expert-food-blog' ),
                'choices'       => array( __( '12+ Sections', 'expert-food-blog' ), __( 'One Click Demo Importer', 'expert-food-blog' ), __( 'Section Reordering Facility', 'expert-food-blog' ),__( 'Advance Typography', 'expert-food-blog' ),__( 'Easy Customization', 'expert-food-blog' ),__( '24x7 Support', 'expert-food-blog' ), )
            )
        )
    ); 
}

add_action( 'customize_register', 'expert_food_blog_typography_setting' );