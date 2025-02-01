<?php
function expert_food_blog_blog_setting( $wp_customize ) {

$wp_customize->register_control_type( 'Expert_Food_Blog_Control_Upgrade' );

$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'expert_food_blog_frontpage_sections', array(
			'priority' => 32,
			'title' => esc_html__( 'Frontpage Sections', 'expert-food-blog' ),
		)
	);
	
	/*=========================================
	Slider Section
	=========================================*/
	$wp_customize->add_section(
		'expert_food_blog_slider_section', array(
			'title' => esc_html__( 'Slider Section', 'expert-food-blog' ),
			'priority' => 13,
			'panel' => 'expert_food_blog_frontpage_sections',
		)
	);

	// Slider Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_slider_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_slider_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'expert-food-blog' ),
			'section'     => 'expert_food_blog_slider_section',
			'settings'    => 'expert_food_blog_slider_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// Slider 1
	$wp_customize->add_setting( 
    	'expert_food_blog_slider1',
    	array(
			'default'           => get_page_id_by_slug('slider-page'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 1,
		)
	);	

	$wp_customize->add_control( 
		'expert_food_blog_slider1',
		array(
		    'label'   		=> __('Slider 1','expert-food-blog'),
		    'section'		=> 'expert_food_blog_slider_section',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);		

	// Slider 2
	$wp_customize->add_setting(
    	'expert_food_blog_slider2',
    	array(
			'default'           => get_page_id_by_slug('slider-page'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 2,
		)
	);	

	$wp_customize->add_control( 
		'expert_food_blog_slider2',
		array(
		    'label'   		=> __('Slider 2','expert-food-blog'),
		    'section'		=> 'expert_food_blog_slider_section',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);	


	// Slider 3
	$wp_customize->add_setting(
    	'expert_food_blog_slider3',
    	array(
			'default'           => get_page_id_by_slug('slider-page'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'expert_food_blog_slider3',
		array(
		    'label'   		=> __('Slider 3','expert-food-blog'),
		    'section'		=> 'expert_food_blog_slider_section',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);	

	// Slider Text
	$wp_customize->add_setting( 
    	'expert_food_blog_slider_text',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'priority'      => 1,
		)
	);	

	$wp_customize->add_control( 
		'expert_food_blog_slider_text',
		array(
		    'label'   		=> __('Slider Text','expert-food-blog'),
		    'section'		=> 'expert_food_blog_slider_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)
	);


	// Slider Link
	$wp_customize->add_setting( 
    	'expert_food_blog_slider_second_link',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'priority'      => 1,
		)
	);	

	$wp_customize->add_control( 
		'expert_food_blog_slider_second_link',
		array(
		    'label'   		=> __('Slider Button Link','expert-food-blog'),
		    'section'		=> 'expert_food_blog_slider_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_setting( 'expert_food_blog_upgrade_page_settings_3',
    array(
        'sanitize_callback' => 'sanitize_text_field'
    )
    );
    $wp_customize->add_control( new Expert_Food_Blog_Control_Upgrade(
        $wp_customize, 'expert_food_blog_upgrade_page_settings_3',
            array(
                'priority'      => 200,
                'section'       => 'expert_food_blog_slider_section',
                'settings'      => 'expert_food_blog_upgrade_page_settings_3',
                'label'         => __( 'Food Blog Pro comes with additional features.', 'expert-food-blog' ),
                'choices'       => array( __( '12+ Sections', 'expert-food-blog' ), __( 'One Click Demo Importer', 'expert-food-blog' ), __( 'Section Reordering Facility', 'expert-food-blog' ),__( 'Advance Typography', 'expert-food-blog' ),__( 'Easy Customization', 'expert-food-blog' ),__( '24x7 Support', 'expert-food-blog' ), )
            )
        )
    ); 
	
}

add_action( 'customize_register', 'expert_food_blog_blog_setting' );

// service selective refresh
function expert_food_blog_blog_section_partials( $wp_customize ){	
	// blog_title
	$wp_customize->selective_refresh->add_partial( 'blog_title', array(
		'selector'            => '.home-blog .title h6',
		'settings'            => 'blog_title',
		'render_callback'  => 'expert_food_blog_blog_title_render_callback',
	
	) );
	
	// blog_subtitle
	$wp_customize->selective_refresh->add_partial( 'blog_subtitle', array(
		'selector'            => '.home-blog .title h2',
		'settings'            => 'blog_subtitle',
		'render_callback'  => 'expert_food_blog_blog_subtitle_render_callback',
	
	) );
	
	// blog_description
	$wp_customize->selective_refresh->add_partial( 'blog_description', array(
		'selector'            => '.home-blog .title p',
		'settings'            => 'blog_description',
		'render_callback'  => 'expert_food_blog_blog_description_render_callback',
	
	) );	
	}

add_action( 'customize_register', 'expert_food_blog_blog_section_partials' );

// blog_title
function expert_food_blog_blog_title_render_callback() {
	return get_theme_mod( 'blog_title' );
}

// blog_subtitle
function expert_food_blog_blog_subtitle_render_callback() {
	return get_theme_mod( 'blog_subtitle' );
}

// service description
function expert_food_blog_blog_description_render_callback() {
	return get_theme_mod( 'blog_description' );
}