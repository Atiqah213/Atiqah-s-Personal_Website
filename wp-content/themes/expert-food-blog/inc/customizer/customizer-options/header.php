<?php
function expert_food_blog_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

    // Site Title Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_site_title_setting' , 
			array(
			'default' => '0',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_site_title_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Site Title', 'expert-food-blog' ),
			'section'     => 'title_tagline',
			'settings'    => 'expert_food_blog_site_title_setting',
			'type'        => 'checkbox'
		) 
	);

	// Tagline Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_tagline_setting' , 
			array(
			'default' => '',
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_tagline_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Tagline', 'expert-food-blog' ),
			'section'     => 'title_tagline',
			'settings'    => 'expert_food_blog_tagline_setting',
			'type'        => 'checkbox'
		) 
	);

	// Add the setting for logo width
	$wp_customize->add_setting(
	    'expert_food_blog_logo_width',
	    array(
	        'sanitize_callback' => 'expert_food_blog_sanitize_logo_width',
	        'priority'          => 2,
	    )
	);

	// Add control for logo width
	$wp_customize->add_control( 
	    'expert_food_blog_logo_width',
	    array(
	        'label'     => __('Logo Width', 'expert-food-blog'),
	        'section'   => 'title_tagline',
	        'type'      => 'number',
	        'input_attrs' => array(
	            'min'   => 1,
	            'max'   => 250,
	            'step'  => 1,
	        ),
	        'transport' => $selective_refresh,
	    )  
	);

	$wp_customize->add_setting( 'expert_food_blog_upgrade_page_settings_10',
    array(
        'sanitize_callback' => 'sanitize_text_field'
    )
    );
    $wp_customize->add_control( new Expert_Food_Blog_Control_Upgrade(
        $wp_customize, 'expert_food_blog_upgrade_page_settings_10',
            array(
                'priority'      => 200,
                'section'       => 'title_tagline',
                'settings'      => 'expert_food_blog_upgrade_page_settings_10',
                'label'         => __( 'Food Blog Pro comes with additional features.', 'expert-food-blog' ),
                'choices'       => array( __( '12+ Sections', 'expert-food-blog' ), __( 'One Click Demo Importer', 'expert-food-blog' ), __( 'Section Reordering Facility', 'expert-food-blog' ),__( 'Advance Typography', 'expert-food-blog' ),__( 'Easy Customization', 'expert-food-blog' ),__( '24x7 Support', 'expert-food-blog' ), )
            )
        )
    ); 

	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'expert-food-blog'),
		) 
	);

	/*=========================================
	Expert Food Blog Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','expert-food-blog'),
			'panel'  		=> 'header_section',
		)
    );    

	/*=========================================
	Top header
	=========================================*/
	$wp_customize->add_section(
        'expert_food_blog_top_header',
        array(
        	'priority'      => 2,
            'title' 		=> __('Header','expert-food-blog'),
			'panel'  		=> 'header_section',
		)
    );

    // Header Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_food_blog_header_setting' , 
			array(
			'default' => true,
			'sanitize_callback' => 'expert_food_blog_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_food_blog_header_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'expert-food-blog' ),
			'section'     => 'expert_food_blog_top_header',
			'settings'    => 'expert_food_blog_header_setting',
			'type'        => 'checkbox'
		) 
	);

   	$wp_customize->add_setting(
    	'expert_food_blog_topheader_location',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'expert_food_blog_topheader_location',
		array(
		    'label'   		=> __('Add Location','expert-food-blog'),
		    'section'		=> 'expert_food_blog_top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)
	);

   	$wp_customize->add_setting(
    	'expert_food_blog_topheader_timing',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'expert_food_blog_topheader_timing',
		array(
		    'label'   		=> __('Add Timing','expert-food-blog'),
		    'section'		=> 'expert_food_blog_top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_setting(
    	'expert_food_blog_topheader_email_text',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'expert_food_blog_topheader_email_text',
		array(
		    'label'   		=> __('Add Email Text','expert-food-blog'),
		    'section'		=> 'expert_food_blog_top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_setting(
    	'expert_food_blog_topheader_email',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'expert_food_blog_topheader_email',
		array(
		    'label'   		=> __('Add Email','expert-food-blog'),
		    'section'		=> 'expert_food_blog_top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_setting(
    	'expert_food_blog_topheader_call_text',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'expert_food_blog_topheader_call_text',
		array(
		    'label'   		=> __('Add Call Text','expert-food-blog'),
		    'section'		=> 'expert_food_blog_top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_setting(
    	'expert_food_blog_topheader_call',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'expert_food_blog_topheader_call',
		array(
		    'label'   		=> __('Add Call','expert-food-blog'),
		    'section'		=> 'expert_food_blog_top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_setting( 'expert_food_blog_upgrade_page_settings_11',
    array(
        'sanitize_callback' => 'sanitize_text_field'
    )
    );
    $wp_customize->add_control( new Expert_Food_Blog_Control_Upgrade(
        $wp_customize, 'expert_food_blog_upgrade_page_settings_11',
            array(
                'priority'      => 200,
                'section'       => 'expert_food_blog_top_header',
                'settings'      => 'expert_food_blog_upgrade_page_settings_11',
                'label'         => __( 'Food Blog Pro comes with additional features.', 'expert-food-blog' ),
                'choices'       => array( __( '12+ Sections', 'expert-food-blog' ), __( 'One Click Demo Importer', 'expert-food-blog' ), __( 'Section Reordering Facility', 'expert-food-blog' ),__( 'Advance Typography', 'expert-food-blog' ),__( 'Easy Customization', 'expert-food-blog' ),__( '24x7 Support', 'expert-food-blog' ), )
            )
        )
    ); 

	$wp_customize->register_panel_type( 'Expert_Food_Blog_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'Expert_Food_Blog_WP_Customize_Section' );

}
add_action( 'customize_register', 'expert_food_blog_header_settings' );


if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class Expert_Food_Blog_WP_Customize_Panel extends WP_Customize_Panel {
	   public $panel;
	   public $type = 'expert_food_blog_panel';
	   public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class Expert_Food_Blog_WP_Customize_Section extends WP_Customize_Section {
	   public $section;
	   public $type = 'expert_food_blog_section';
	   public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}