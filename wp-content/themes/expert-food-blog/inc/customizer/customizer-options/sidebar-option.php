<?php
function expert_food_blog_sidebar_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'expert_food_blog_sidebar', array(
			'priority' => 31,
			'title' => esc_html__( 'Sidebar Option', 'expert-food-blog' ),
		)
	);

	/*=========================================
	Archive Post  Section
	=========================================*/
	$wp_customize->add_section(
		'expert_food_blog_sidebar_settings', array(
			'title' => esc_html__( 'Sidebar Option', 'expert-food-blog' ),
			'priority' => 1,
			'panel' => 'expert_food_blog_sidebar',
		)
	);
	
	// Archive Post Settings 
	$wp_customize->add_setting(
		'archive_post_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'expert_food_blog_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'archive_post_settings',
		array(
			'type' => 'hidden',
			'label' => __('All Sidebar Setting','expert-food-blog'),
			'section' => 'expert_food_blog_sidebar_settings',
		)
	);
	

	// Archive Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_archive_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_archive_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Archive Sidebar', 'expert-food-blog' ),
			'section'     => 'expert_food_blog_sidebar_settings',
			'settings'    => 'expert_food_blog_archive_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Index Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_index_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_index_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Index Sidebar', 'expert-food-blog' ),
			'section'     => 'expert_food_blog_sidebar_settings',
			'settings'    => 'expert_food_blog_index_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Pages Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_paged_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_paged_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Pages Sidebar', 'expert-food-blog' ),
			'section'     => 'expert_food_blog_sidebar_settings',
			'settings'    => 'expert_food_blog_paged_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Search Result Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_search_result_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_search_result_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Search Result Sidebar', 'expert-food-blog' ),
			'section'     => 'expert_food_blog_sidebar_settings',
			'settings'    => 'expert_food_blog_search_result_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Single Post Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_single_post_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_single_post_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Single Post Sidebar', 'expert-food-blog' ),
			'section'     => 'expert_food_blog_sidebar_settings',
			'settings'    => 'expert_food_blog_single_post_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Sidebar Page Sidebar Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_single_page_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_single_page_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Page Width Sidebar', 'expert-food-blog' ),
			'section'     => 'expert_food_blog_sidebar_settings',
			'settings'    => 'expert_food_blog_single_page_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

		$wp_customize->add_setting( 'expert_food_blog_sidebar_position', array(
        'default'   => 'right',
        'sanitize_callback' => 'expert_food_blog_sanitize_sidebar_position',
    ));

    $wp_customize->add_control( 'expert_food_blog_sidebar_position', array(
        'label'    => __( 'Sidebar Position', 'expert-food-blog' ),
        'section'  => 'expert_food_blog_sidebar_settings',
        'settings' => 'expert_food_blog_sidebar_position',
        'type'     => 'radio',
        'choices'  => array(
            'right' => __( 'Right Sidebar', 'expert-food-blog' ),
            'left'  => __( 'Left Sidebar', 'expert-food-blog' ),
        ),
    ));

	$wp_customize->add_setting( 'expert_food_blog_upgrade_page_settings_14',
    array(
        'sanitize_callback' => 'sanitize_text_field'
    )
    );
    $wp_customize->add_control( new Expert_Food_Blog_Control_Upgrade(
        $wp_customize, 'expert_food_blog_upgrade_page_settings_14',
            array(
                'priority'      => 200,
                'section'       => 'expert_food_blog_sidebar_settings',
                'settings'      => 'expert_food_blog_upgrade_page_settings_14',
                'label'         => __( 'Food Blog Pro comes with additional features.', 'expert-food-blog' ),
                'choices'       => array( __( '12+ Sections', 'expert-food-blog' ), __( 'One Click Demo Importer', 'expert-food-blog' ), __( 'Section Reordering Facility', 'expert-food-blog' ),__( 'Advance Typography', 'expert-food-blog' ),__( 'Easy Customization', 'expert-food-blog' ),__( '24x7 Support', 'expert-food-blog' ), )
            )
        )
    ); 
}

add_action( 'customize_register', 'expert_food_blog_sidebar_setting' );