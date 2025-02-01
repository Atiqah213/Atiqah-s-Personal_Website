<?php

function expert_food_blog_footer( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'expert_food_blog_footer_section', 
		array(
			'priority'      => 34,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer', 'expert-food-blog'),
		) 
	);

	// Footer Widgets // 
	$wp_customize->add_section(
        'expert_food_blog_footer_top',
        array(
            'title' 		=> __('Footer Widgets','expert-food-blog'),
			'panel'  		=> 'expert_food_blog_footer_section',
			'priority'      => 3,
		)
    );

    // Footer Widgets Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_footer_widgets_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_footer_widgets_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Footer Widgets', 'expert-food-blog' ),
			'section'     => 'expert_food_blog_footer_top',
			'settings'    => 'expert_food_blog_footer_widgets_setting',
			'type'        => 'checkbox'
		) 
	);

	// Footer Background Image Setting
	$wp_customize->add_setting('expert_food_blog_footer_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'expert_food_blog_footer_bg_image',array(
	'label' => __('Footer Background Image','expert-food-blog'),
	'section' => 'expert_food_blog_footer_top'
	)));

	// Footer Background Color Setting
    $wp_customize->add_setting('expert_food_blog_footer_bg_color',array(
		'default' => '#222222',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'expert_food_blog_footer_bg_color',array(
		'label' => esc_html__('Footer Background Color', 'expert-food-blog'),
		'section' => 'expert_food_blog_footer_top', // Adjust section if needed
		'settings' => 'expert_food_blog_footer_bg_color',
	)));

	$wp_customize->add_setting( 'expert_food_blog_upgrade_page_settings_1',
    array(
        'sanitize_callback' => 'sanitize_text_field'
    )
    );
    $wp_customize->add_control( new Expert_Food_Blog_Control_Upgrade(
        $wp_customize, 'expert_food_blog_upgrade_page_settings_1',
            array(
                'priority'      => 200,
                'section'       => 'expert_food_blog_footer_top',
                'settings'      => 'expert_food_blog_upgrade_page_settings_1',
                'label'         => __( 'Food Blog Pro comes with additional features.', 'expert-food-blog' ),
                'choices'       => array( __( '12+ Sections', 'expert-food-blog' ), __( 'One Click Demo Importer', 'expert-food-blog' ), __( 'Section Reordering Facility', 'expert-food-blog' ),__( 'Advance Typography', 'expert-food-blog' ),__( 'Easy Customization', 'expert-food-blog' ),__( '24x7 Support', 'expert-food-blog' ), )
            )
        )
    ); 

	// Footer Bottom // 
	$wp_customize->add_section(
        'expert_food_blog_footer_bottom',
        array(
            'title' 		=> __('Footer Bottom','expert-food-blog'),
			'panel'  		=> 'expert_food_blog_footer_section',
			'priority'      => 3,
		)
    );
	
	// Footer Copyright Head
	$wp_customize->add_setting(
		'expert_food_blog_footer_btm_copy_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'expert_food_blog_sanitize_text',
			'priority'  => 3,
		)
	);

	// Site Title Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_footer_copyright_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_footer_copyright_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Footer Copyright', 'expert-food-blog' ),
			'section'     => 'expert_food_blog_footer_bottom',
			'settings'    => 'expert_food_blog_footer_copyright_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// Footer Copyright 
	$wp_customize->add_setting(
    	'expert_food_blog_footer_copyright',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);

	$wp_customize->add_control( 
		'expert_food_blog_footer_copyright',
		array(
		    'label'   		=> __('Copyright','expert-food-blog'),
		    'section'		=> 'expert_food_blog_footer_bottom',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting( 'expert_food_blog_copyright_alignment', array(
        'default'   => 'center',
        'sanitize_callback' => 'expert_food_blog_sanitize_copyright_position',
    ));

    $wp_customize->add_control( 'expert_food_blog_copyright_alignment', array(
        'label'    => __( 'Copyright Position', 'expert-food-blog' ),
        'section'  => 'expert_food_blog_footer_bottom',
        'settings' => 'expert_food_blog_copyright_alignment',
        'type'     => 'radio',
        'choices'  => array(
            'right' => __( 'Right Align', 'expert-food-blog' ),
            'left'  => __( 'Left Align', 'expert-food-blog' ),
            'center'  => __( 'Center Align', 'expert-food-blog' ),
        ),
    ));

	$wp_customize->add_setting( 'expert_food_blog_upgrade_page_settings_2',
    array(
        'sanitize_callback' => 'sanitize_text_field'
    )
    );
    $wp_customize->add_control( new Expert_Food_Blog_Control_Upgrade(
        $wp_customize, 'expert_food_blog_upgrade_page_settings_2',
            array(
                'priority'      => 200,
                'section'       => 'expert_food_blog_footer_bottom',
                'settings'      => 'expert_food_blog_upgrade_page_settings_2',
                'label'         => __( 'Food Blog Pro comes with additional features.', 'expert-food-blog' ),
                'choices'       => array( __( '12+ Sections', 'expert-food-blog' ), __( 'One Click Demo Importer', 'expert-food-blog' ), __( 'Section Reordering Facility', 'expert-food-blog' ),__( 'Advance Typography', 'expert-food-blog' ),__( 'Easy Customization', 'expert-food-blog' ),__( '24x7 Support', 'expert-food-blog' ), )
            )
        )
    ); 
}
add_action( 'customize_register', 'expert_food_blog_footer' );

// Footer selective refresh
function expert_food_blog_footer_partials( $wp_customize ){
	// footer_copyright
	$wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
		'selector'            => '.copy-right .copyright-text',
		'settings'            => 'footer_copyright',
		'render_callback'  => 'expert_food_blog_footer_copyright_render_callback',
	) );
}
add_action( 'customize_register', 'expert_food_blog_footer_partials' );

// copyright_content
function expert_food_blog_footer_copyright_render_callback() {
	return get_theme_mod( 'footer_copyright' );
}