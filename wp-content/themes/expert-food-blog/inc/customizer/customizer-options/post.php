<?php
function expert_food_blog_post_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'expert_food_blog_post', array(
			'priority' => 31,
			'title' => esc_html__( 'Post Option', 'expert-food-blog' ),
		)
	);

	/*=========================================
	Archive Post  Section
	=========================================*/
	$wp_customize->add_section(
		'expert_food_blog_archive_post_setting', array(
			'title' => esc_html__( 'Archive Post', 'expert-food-blog' ),
			'priority' => 1,
			'panel' => 'expert_food_blog_post',
		)
	);

	// Layouts Post
	$wp_customize->add_setting('expert_food_blog_blog_layout_option_setting',array(
	  'default' => 'Default',
	  'sanitize_callback' => 'expert_food_blog_sanitize_choices'
	));
	$wp_customize->add_control(new Expert_Food_Blog_Image_Radio_Control($wp_customize, 'expert_food_blog_blog_layout_option_setting', array(
	  'type' => 'select',
	  'label' => __('Blog Post Layouts','expert-food-blog'),
	  'section' => 'expert_food_blog_archive_post_setting',
	  'choices' => array(
	      'Default' => esc_url(get_template_directory_uri()).'/assets/images/layout-1.png',
	      'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout-2.png',
	      'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout-3.png',
	))));
		
	// Post Heading Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_post_heading_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
		
	// Post Heading Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_post_heading_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
		'expert_food_blog_post_heading_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Heading', 'expert-food-blog' ),
			'section'     => 'expert_food_blog_archive_post_setting',
			'settings'    => 'expert_food_blog_post_heading_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Content Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_post_content_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_post_content_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Content', 'expert-food-blog' ),
			'section'     => 'expert_food_blog_archive_post_setting',
			'settings'    => 'expert_food_blog_post_content_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Featured Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_post_featured_image_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_post_featured_image_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Feature Image', 'expert-food-blog' ),
			'section'     => 'expert_food_blog_archive_post_setting',
			'settings'    => 'expert_food_blog_post_featured_image_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_post_date_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_post_date_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Date', 'expert-food-blog' ),
			'section'     => 'expert_food_blog_archive_post_setting',
			'settings'    => 'expert_food_blog_post_date_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_post_comments_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_post_comments_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Comment', 'expert-food-blog' ),
			'section'     => 'expert_food_blog_archive_post_setting',
			'settings'    => 'expert_food_blog_post_comments_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_post_author_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_post_author_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Author', 'expert-food-blog' ),
			'section'     => 'expert_food_blog_archive_post_setting',
			'settings'    => 'expert_food_blog_post_author_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Tags Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_post_tags_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_post_tags_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Tags', 'expert-food-blog' ),
			'section'     => 'expert_food_blog_archive_post_setting',
			'settings'    => 'expert_food_blog_post_tags_settings',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting( 'expert_food_blog_upgrade_page_settings_12',
    array(
        'sanitize_callback' => 'sanitize_text_field'
    )
    );
    $wp_customize->add_control( new Expert_Food_Blog_Control_Upgrade(
        $wp_customize, 'expert_food_blog_upgrade_page_settings_12',
            array(
                'priority'      => 200,
                'section'       => 'expert_food_blog_archive_post_setting',
                'settings'      => 'expert_food_blog_upgrade_page_settings_12',
                'label'         => __( 'Food Blog Pro comes with additional features.', 'expert-food-blog' ),
                'choices'       => array( __( '12+ Sections', 'expert-food-blog' ), __( 'One Click Demo Importer', 'expert-food-blog' ), __( 'Section Reordering Facility', 'expert-food-blog' ),__( 'Advance Typography', 'expert-food-blog' ),__( 'Easy Customization', 'expert-food-blog' ),__( '24x7 Support', 'expert-food-blog' ), )
            )
        )
    ); 

	/*=========================================
	Single Post  Section
	=========================================*/
	$wp_customize->add_section(
		'expert_food_blog_single_post', array(
			'title' => esc_html__( 'Single Post', 'expert-food-blog' ),
			'priority' => 3,
			'panel' => 'expert_food_blog_post',
		)
	);
	
	// Post Heading Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_single_post_heading_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_single_post_heading_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Heading', 'expert-food-blog' ),
			'section'     => 'expert_food_blog_single_post',
			'settings'    => 'expert_food_blog_single_post_heading_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Content Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_single_post_content_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_single_post_content_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Content', 'expert-food-blog' ),
			'section'     => 'expert_food_blog_single_post',
			'settings'    => 'expert_food_blog_single_post_content_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Featured Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_single_post_featured_image_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_single_post_featured_image_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Feature Image', 'expert-food-blog' ),
			'section'     => 'expert_food_blog_single_post',
			'settings'    => 'expert_food_blog_single_post_featured_image_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_single_post_date_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_single_post_date_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Date', 'expert-food-blog' ),
			'section'     => 'expert_food_blog_single_post',
			'settings'    => 'expert_food_blog_single_post_date_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_single_post_comments_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_single_post_comments_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Comment', 'expert-food-blog' ),
			'section'     => 'expert_food_blog_single_post',
			'settings'    => 'expert_food_blog_single_post_comments_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_single_post_author_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_single_post_author_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Author', 'expert-food-blog' ),
			'section'     => 'expert_food_blog_single_post',
			'settings'    => 'expert_food_blog_single_post_author_settings',
			'type'        => 'checkbox'
		) 
	);
	// Post Tags Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_single_post_tags_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_single_post_tags_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Tags', 'expert-food-blog' ),
			'section'     => 'expert_food_blog_single_post',
			'settings'    => 'expert_food_blog_single_post_tags_settings',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting( 'expert_food_blog_upgrade_page_settings_13',
    array(
        'sanitize_callback' => 'sanitize_text_field'
    )
    );
    $wp_customize->add_control( new Expert_Food_Blog_Control_Upgrade(
        $wp_customize, 'expert_food_blog_upgrade_page_settings_13',
            array(
                'priority'      => 200,
                'section'       => 'expert_food_blog_single_post',
                'settings'      => 'expert_food_blog_upgrade_page_settings_13',
                'label'         => __( 'Food Blog Pro comes with additional features.', 'expert-food-blog' ),
                'choices'       => array( __( '12+ Sections', 'expert-food-blog' ), __( 'One Click Demo Importer', 'expert-food-blog' ), __( 'Section Reordering Facility', 'expert-food-blog' ),__( 'Advance Typography', 'expert-food-blog' ),__( 'Easy Customization', 'expert-food-blog' ),__( '24x7 Support', 'expert-food-blog' ), )
            )
        )
    ); 
}

add_action( 'customize_register', 'expert_food_blog_post_setting' );