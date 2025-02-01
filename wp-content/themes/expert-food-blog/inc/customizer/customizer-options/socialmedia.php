<?php
function expert_food_blog_social_media_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

	/*=========================================
	Social Media
	=========================================*/
	$wp_customize->add_section(
        'expert_food_blog_social_media_header',
        array(
        	'priority'      => 3,
            'title' 		=> __('Social Media','expert-food-blog'),
			'panel'  		=> 'header_section',
		)
    );

   	$wp_customize->add_setting(
    	'expert_food_blog_social_media_facebook',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);	
	$wp_customize->add_control( 
		'expert_food_blog_social_media_facebook',
		array(
		    'label'   		=> __('Facebook URL','expert-food-blog'),
		    'section'		=> 'expert_food_blog_social_media_header',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
    	'expert_food_blog_social_media_twitter',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);	
	$wp_customize->add_control( 
		'expert_food_blog_social_media_twitter',
		array(
		    'label'   		=> __('Twitter URL','expert-food-blog'),
		    'section'		=> 'expert_food_blog_social_media_header',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)  
	);	

	$wp_customize->add_setting(
    	'expert_food_blog_social_media_instagram',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);	
	$wp_customize->add_control( 
		'expert_food_blog_social_media_instagram',
		array(
		    'label'   		=> __('Instagram URL','expert-food-blog'),
		    'section'		=> 'expert_food_blog_social_media_header',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
    	'expert_food_blog_social_media_linkedin',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);	
	$wp_customize->add_control( 
		'expert_food_blog_social_media_linkedin',
		array(
		    'label'   		=> __('Linkedin URL','expert-food-blog'),
		    'section'		=> 'expert_food_blog_social_media_header',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
    	'expert_food_blog_social_media_youtube',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);	
	$wp_customize->add_control( 
		'expert_food_blog_social_media_youtube',
		array(
		    'label'   		=> __('Youtube URL','expert-food-blog'),
		    'section'		=> 'expert_food_blog_social_media_header',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting( 'expert_food_blog_upgrade_page_settings_15',
    array(
        'sanitize_callback' => 'sanitize_text_field'
    )
    );
    $wp_customize->add_control( new Expert_Food_Blog_Control_Upgrade(
        $wp_customize, 'expert_food_blog_upgrade_page_settings_15',
            array(
                'priority'      => 200,
                'section'       => 'expert_food_blog_social_media_header',
                'settings'      => 'expert_food_blog_upgrade_page_settings_15',
                'label'         => __( 'Food Blog Pro comes with additional features.', 'expert-food-blog' ),
                'choices'       => array( __( '12+ Sections', 'expert-food-blog' ), __( 'One Click Demo Importer', 'expert-food-blog' ), __( 'Section Reordering Facility', 'expert-food-blog' ),__( 'Advance Typography', 'expert-food-blog' ),__( 'Easy Customization', 'expert-food-blog' ),__( '24x7 Support', 'expert-food-blog' ), )
            )
        )
    ); 
}
add_action( 'customize_register', 'expert_food_blog_social_media_header_settings' );