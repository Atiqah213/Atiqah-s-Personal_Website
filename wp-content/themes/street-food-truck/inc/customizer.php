<?php
/**
 * Street Food Truck   Theme Customizer
 *
 * @package Street Food Truck  
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function street_food_truck_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'street_food_truck_custom_controls' );

function street_food_truck_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo .site-title a',
	 	'render_callback' => 'street_food_truck_Customize_partial_blogname',
	));

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => 'p.site-description',
		'render_callback' => 'street_food_truck_Customize_partial_blogdescription',
	));

	// add home page setting pannel
	$wp_customize->add_panel( 'street_food_truck_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Homepage Settings', 'street-food-truck' ),
		'priority' => 10,
	));

	//Menus Settings
	$wp_customize->add_section( 'street_food_truck_menu_section' , array(
    	'title' => __( 'Menus Settings', 'street-food-truck' ),
		'panel' => 'street_food_truck_panel_id'
	) );

	$wp_customize->add_setting('street_food_truck_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','street-food-truck'),
		'description'	=> __('Enter a value in pixels. Example:20px','street-food-truck'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_menu_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('street_food_truck_navigation_menu_font_weight',array(
        'default' => 600,
        'transport' => 'refresh',
        'sanitize_callback' => 'street_food_truck_sanitize_choices'
	));
	$wp_customize->add_control('street_food_truck_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','street-food-truck'),
        'section' => 'street_food_truck_menu_section',
        'choices' => array(
        	'100' => __('100','street-food-truck'),
            '200' => __('200','street-food-truck'),
            '300' => __('300','street-food-truck'),
            '400' => __('400','street-food-truck'),
            '500' => __('500','street-food-truck'),
            '600' => __('600','street-food-truck'),
            '700' => __('700','street-food-truck'),
            '800' => __('800','street-food-truck'),
            '900' => __('900','street-food-truck'),
        ),
	) );

	// text trasform
	$wp_customize->add_setting('street_food_truck_menu_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'street_food_truck_sanitize_choices'
	));
	$wp_customize->add_control('street_food_truck_menu_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Menus Text Transform','street-food-truck'),
		'choices' => array(
            'Uppercase' => __('Uppercase','street-food-truck'),
            'Capitalize' => __('Capitalize','street-food-truck'),
            'Lowercase' => __('Lowercase','street-food-truck'),
        ),
		'section'=> 'street_food_truck_menu_section',
	));

	$wp_customize->add_setting('street_food_truck_menus_item_style',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'street_food_truck_sanitize_choices'
	));
	$wp_customize->add_control('street_food_truck_menus_item_style',array(
        'type' => 'select',
        'section' => 'street_food_truck_menu_section',
		'label' => __('Menu Item Hover Style','street-food-truck'),
		'choices' => array(
            'None' => __('None','street-food-truck'),
            'Zoom In' => __('Zoom In','street-food-truck'),
        ),
	) );

	$wp_customize->add_setting('street_food_truck_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'street_food_truck_header_menus_color', array(
		'label'    => __('Menus Color', 'street-food-truck'),
		'section'  => 'street_food_truck_menu_section',
	)));

	$wp_customize->add_setting('street_food_truck_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'street_food_truck_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'street-food-truck'),
		'section'  => 'street_food_truck_menu_section',
	)));

	$wp_customize->add_setting('street_food_truck_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'street_food_truck_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'street-food-truck'),
		'section'  => 'street_food_truck_menu_section',
	)));

	$wp_customize->add_setting('street_food_truck_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'street_food_truck_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'street-food-truck'),
		'section'  => 'street_food_truck_menu_section',
	)));

	// Top Bar
	$wp_customize->add_section( 'street_food_truck_top_bar' , array(
    	'title' => esc_html__( 'Top Bar', 'street-food-truck' ),
		'panel' => 'street_food_truck_panel_id'
	) );

	$wp_customize->add_setting( 'street_food_truck_hide_show_topbar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'street_food_truck_switch_sanitization'
	));
	$wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_hide_show_topbar',array(
		'label' => esc_html__( 'Show / Hide Topbar','street-food-truck' ),
		'section' => 'street_food_truck_top_bar'
	)));

	$wp_customize->add_setting('street_food_truck_topbar_location_icon',array(
		'default'	=> 'fa-solid fa-location-dot',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Street_Food_Truck_Fontawesome_Icon_Chooser(
        $wp_customize,'street_food_truck_topbar_location_icon',array(
		'label'	=> __('Add Location Icon','street-food-truck'),
		'transport' => 'refresh',
		'section'	=> 'street_food_truck_top_bar',
		'setting'	=> 'street_food_truck_topbar_location_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('street_food_truck_topbar_location_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_topbar_location_text',array(
		'label'	=> esc_html__('Add Location Text','street-food-truck'),
		'input_attrs' => array(
        'placeholder' => esc_html__( '317 Sports road, Buffalo, NY 92648', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_top_bar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('street_food_truck_track_locatin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control('street_food_truck_track_locatin_url',array(
		'label'	=> esc_html__( 'Add Location URL', 'street-food-truck' ), 
		'section'	=> 'street_food_truck_top_bar',
		'setting'	=> 'street_food_truck_track_locatin_url',
		'type'	=> 'url',
	));

	$wp_customize->add_setting('street_food_truck_phone_icon',array(
		'default'	=> 'fa-solid fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Street_Food_Truck_Fontawesome_Icon_Chooser(
        $wp_customize,'street_food_truck_phone_icon',array(
		'label'	=> __('Add Phone Icon','street-food-truck'),
		'transport' => 'refresh',
		'section'	=> 'street_food_truck_top_bar',
		'setting'	=> 'street_food_truck_phone_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting('street_food_truck_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'street_food_truck_sanitize_phone_number'
	));
	$wp_customize->add_control('street_food_truck_phone_number',array(
		'label'	=> __('Add Phone number','street-food-truck'),
		'input_attrs' => array(
      'placeholder' => __( '(123) 456-7890', 'street-food-truck' ),
    ),
		'section'=> 'street_food_truck_top_bar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('street_food_truck_topbar_track_text',array(
		'default'=> 'Track Your Order',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_topbar_track_text',array(
		'label'	=> esc_html__('Add Topbar Text','street-food-truck'),
		'section'=> 'street_food_truck_top_bar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('street_food_truck_track_button_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control('street_food_truck_track_button_url',array(
		'label'	=> esc_html__( 'Add Button URL', 'street-food-truck' ), 
		'section'	=> 'street_food_truck_top_bar',
		'setting'	=> 'street_food_truck_track_button_url',
		'type'	=> 'url',
	));

	//Slider
	$wp_customize->add_section( 'street_food_truck_slidersettings' , array(
  	'title'      => __( 'Slider Settings', 'street-food-truck' ),
	'panel' => 'street_food_truck_panel_id',
	'description' => __('For more options of Banner section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/street-food-wordpress-theme">GET PRO</a>','street-food-truck'),
	
	) );

	$wp_customize->add_setting( 'street_food_truck_show_hide_slider',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'street_food_truck_switch_sanitization'
    ));
    $wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_show_hide_slider',array(
      	'label' => esc_html__( 'Show / Hide Banner','street-food-truck' ),
      	'section' => 'street_food_truck_slidersettings',
    )));

	$wp_customize->add_setting('street_food_truck_slider_background_color', array(
		'default'           => '#f7f6f6',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'street_food_truck_slider_background_color', array(
		'label'    => esc_html__( 'Banner Background Color', 'street-food-truck' ),
		'section'  => 'street_food_truck_slidersettings',
	)));

	$wp_customize->add_setting('street_food_truck_designation_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('street_food_truck_designation_text',array(
		'label'	=>esc_html__( 'Banner Content', 'street-food-truck' ),
		'section'	=> 'street_food_truck_slidersettings',
		'type'		=> 'text',
		'input_attrs' => array(
	      'placeholder' => __( 'Welcome to Street Savories', 'street-food-truck' ),
	    ),
	));

    $wp_customize->add_setting('street_food_truck_tagline_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('street_food_truck_tagline_title',array(
		'label'	=> esc_html__( 'Banner Title', 'street-food-truck' ), 
		'section'	=> 'street_food_truck_slidersettings',
		'type'		=> 'text',
		'input_attrs' => array(
	      'placeholder' => __( 'Delicious Delights on the Move', 'street-food-truck' ),
	    ),
	));

	$wp_customize->add_setting('street_food_truck_slider_button_label',array(
		'default' => esc_html__( '', 'street-food-truck' ),
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_slider_button_label',array(
		'label' => esc_html__( 'Button', 'street-food-truck' ),
		'section' => 'street_food_truck_slidersettings',
		'setting' => 'street_food_truck_slider_button_label',
		'type' => 'text',
		'input_attrs' => array(
	      'placeholder' => __( 'Online Order', 'street-food-truck' ),
	    ),
	));

	$wp_customize->add_setting('street_food_truck_top_button_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control('street_food_truck_top_button_url',array(
		'label'	=> esc_html__( 'Add Button URL', 'street-food-truck' ), 
		'section'	=> 'street_food_truck_slidersettings',
		'setting'	=> 'street_food_truck_top_button_url',
		'type'	=> 'url',
	));

	$wp_customize->add_setting( 'street_food_truck_show_hide_product',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'street_food_truck_switch_sanitization'
    ));
    $wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_show_hide_product',array(
      	'label' => esc_html__( 'Show / Hide Product','street-food-truck' ),
      	'section' => 'street_food_truck_slidersettings'
    )));
	
	$args = array(
       'type'      => 'product',
        'taxonomy' => 'product_cat'
    );
	$categories = get_categories($args);
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('street_food_truck_product_category',array(
		'default'	=> esc_html__( 'Select', 'street-food-truck' ),
		'sanitize_callback' => 'street_food_truck_sanitize_choices',
	));
	$wp_customize->add_control('street_food_truck_product_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => esc_html__( 'Select Popular Product Category', 'street-food-truck' ), 
		'section' => 'street_food_truck_slidersettings',
	));

	$wp_customize->add_setting('street_food_truck_product_background_color', array(
		'default'           => '#FFB936',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'street_food_truck_product_background_color', array(
		'label'    => esc_html__( 'Product Background Color', 'street-food-truck' ),
		'section'  => 'street_food_truck_slidersettings',
	)));

	// About Us Section
	$wp_customize->add_section('street_food_truck_about_us_section',array(
		'title'	=> __('About Us Section','street-food-truck'),
		'panel' => 'street_food_truck_panel_id',
		'description' => __('For more options of About Us Section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/street-food-wordpress-theme">GET PRO</a>','street-food-truck'),
	));

	$wp_customize->add_setting('street_food_truck_special_heading',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_special_heading',array(
		'label'	=> __('About Us Title','street-food-truck'),
		'section'	=> 'street_food_truck_about_us_section',
		'type'		=> 'text',
		'input_attrs' => array(
      'placeholder' => __( 'About US', 'street-food-truck' ),
      ),
	));

	$wp_customize->add_setting('street_food_truck_special_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_special_text',array(
		'label'	=> __('About Us Text','street-food-truck'),
		'section'	=> 'street_food_truck_about_us_section',
		'type'		=> 'text',
		'input_attrs' => array(
      'placeholder' => __( 'Discover our diverse culinary offerings on wheels today.', 'street-food-truck' ),
      ),
	));

	$wp_customize->add_setting('street_food_truck_about_image1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'street_food_truck_about_image1',array(
		'label' => __('Add Image','street-food-truck'),
		'description' => __('Image size (190px x 120px)','street-food-truck'),
		'section' => 'street_food_truck_about_us_section',
	)));
		
	$wp_customize->add_setting('street_food_truck_client_tagline_title',array(
	'default'	=> '',
	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_client_tagline_title',array(
		'label'	=> esc_html__( 'Add Title', 'street-food-truck' ),
		'section'	=> 'street_food_truck_about_us_section',
		'type'		=> 'text',
		'input_attrs' => array(
	      'placeholder' => __( 'Our Story', 'street-food-truck' ),
	    ),
	));

	$wp_customize->add_setting('street_food_truck_client_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_client_text',array(
		'label'	=> esc_html__( 'Add Text', 'street-food-truck' ),
		'section'	=> 'street_food_truck_about_us_section',
		'type'		=> 'text',
		'input_attrs' => array(
	      'placeholder' => __( 'Welcome to Street Savories, where we bring culinary adventures to your fingertips!...', 'street-food-truck' ),
	    ),
	));

	$wp_customize->add_setting('street_food_truck_client_next_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_client_next_text',array(
		'label'	=> esc_html__( 'Add Text', 'street-food-truck' ),
		'section'	=> 'street_food_truck_about_us_section',
		'type'		=> 'text',
		'input_attrs' => array(
	      'placeholder' => __( 'Welcome to Street Savories, where we bring culinary adventures to your fingertips!...', 'street-food-truck' ),
	    ),
	));

	for($street_food_truck_i=1; $street_food_truck_i<=3; $street_food_truck_i++) {
		
		$wp_customize->add_setting('street_food_truck_review_num'.$street_food_truck_i,array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('street_food_truck_review_num'.$street_food_truck_i,array(
			'label'	=> esc_html__( 'Add Review Count', 'street-food-truck' ),
			'section'	=> 'street_food_truck_about_us_section',
			'type'		=> 'text',
			'input_attrs' => array(
		      'placeholder' => __( '60', 'street-food-truck' ),
		    ),
		));

		$wp_customize->add_setting('street_food_truck_topbar_review_icon'.$street_food_truck_i,array(
			'default'	=> 'fa-solid fa-plus',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control(new Street_Food_Truck_Fontawesome_Icon_Chooser(
	        $wp_customize,'street_food_truck_topbar_review_icon'.$street_food_truck_i,array(
			'label'	=> __('Add Review Icon','street-food-truck'),
			'transport' => 'refresh',
			'section'	=> 'street_food_truck_about_us_section',
			'setting'	=> 'street_food_truck_topbar_review_icon'.$street_food_truck_i,
			'type'		=> 'icon'
		)));

		$wp_customize->add_setting('street_food_truck_review_text'.$street_food_truck_i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('street_food_truck_review_text'.$street_food_truck_i,array(
			'label'	=> esc_html__( 'Add Review Text', 'street-food-truck' ),
			'section'	=> 'street_food_truck_about_us_section',
			'type'		=> 'text',
			'input_attrs' => array(
		      'placeholder' => __( 'Happy Customers', 'street-food-truck' ),
		    ),
		));
	}

	$wp_customize->add_setting('street_food_truck_about_image2',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'street_food_truck_about_image2',array(
		'label' => __('Add Image','street-food-truck'),
		'description' => __('Image size (190px x 120px)','street-food-truck'),
		'section' => 'street_food_truck_about_us_section',
	)));

	$wp_customize->add_setting('street_food_truck_about_sec_background_color', array(
		'default'           => '#222E39',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'street_food_truck_about_sec_background_color', array(
		'label'    => esc_html__( 'Background Color', 'street-food-truck' ),
		'section'  => 'street_food_truck_about_us_section',
	)));


	//category Section
	$wp_customize->add_section('street_food_truck_category_offer', array(
		'title'       => __('Category Section', 'street-food-truck'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','street-food-truck'),
		'priority'    => null,
		'panel'       => 'street_food_truck_panel_id',
	));

	$wp_customize->add_setting('street_food_truck_category_offer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_category_offer_text',array(
		'description' => __('<p>1. More options for category section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for category section.</p>','street-food-truck'),
		'section'=> 'street_food_truck_category_offer',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('street_food_truck_category_offer_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_category_offer_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='https://www.vwthemes.com/products/street-food-wordpress-theme'>More Info</a>",
		'section'=> 'street_food_truck_category_offer',
		'type'=> 'hidden'
	));

	//Our Service
	$wp_customize->add_section('street_food_truck_our_service_sec', array(
		'title'       => __('Our Service', 'street-food-truck'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','street-food-truck'),
		'priority'    => null,
		'panel'       => 'street_food_truck_panel_id',
	));

	$wp_customize->add_setting('street_food_truck_our_service_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_our_service_text',array(
		'description' => __('<p>1. More options for Our Service.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for 	$wp_customize.</p>','street-food-truck'),
		'section'=> 'street_food_truck_our_service_sec',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('street_food_truck_our_service_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_our_service_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='https://www.vwthemes.com/products/street-food-wordpress-theme'>More Info</a>",
		'section'=> 'street_food_truck_our_service_sec',
		'type'=> 'hidden'
	));

	//Offer Section
	$wp_customize->add_section('street_food_truck_offer_sec', array(
		'title'       => __('Offer Section', 'street-food-truck'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','street-food-truck'),
		'priority'    => null,
		'panel'       => 'street_food_truck_panel_id',
	));

	$wp_customize->add_setting('street_food_truck_offer_sec_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_offer_sec_text',array(
		'description' => __('<p>1. More options for Offer section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Offer section.</p>','street-food-truck'),
		'section'=> 'street_food_truck_offer_sec',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('street_food_truck_offer_sec_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_offer_sec_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='https://www.vwthemes.com/products/street-food-wordpress-theme'>More Info</a>",
		'section'=> 'street_food_truck_offer_sec',
		'type'=> 'hidden'
	));

	//Special Menu Section
	$wp_customize->add_section('street_food_truck_special_menu', array(
		'title'       => __('Special Menu Section', 'street-food-truck'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','street-food-truck'),
		'priority'    => null,
		'panel'       => 'street_food_truck_panel_id',
	));

	$wp_customize->add_setting('street_food_truck_special_menu_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_special_menu_text',array(
		'description' => __('<p>1. More options for Special Menu section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Special Menu section.</p>','street-food-truck'),
		'section'=> 'street_food_truck_special_menu',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('street_food_truck_special_menu_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_special_menu_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='https://www.vwthemes.com/products/street-food-wordpress-theme'>More Info</a>",
		'section'=> 'street_food_truck_special_menu',
		'type'=> 'hidden'
	));

	//Locate Section
	$wp_customize->add_section('street_food_truck_locate_sec', array(
		'title'       => __('Locate Section', 'street-food-truck'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','street-food-truck'),
		'priority'    => null,
		'panel'       => 'street_food_truck_panel_id',
	));

	$wp_customize->add_setting('street_food_truck_locate_sec_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_locate_sec_text',array(
		'description' => __('<p>1. More options for Locate section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Locate section.</p>','street-food-truck'),
		'section'=> 'street_food_truck_locate_sec',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('street_food_truck_locate_sec_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_locate_sec_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='https://www.vwthemes.com/products/street-food-wordpress-theme'>More Info</a>",
		'section'=> 'street_food_truck_locate_sec',
		'type'=> 'hidden'
	));

	//Banner
	$wp_customize->add_section('street_food_truck_banner', array(
		'title'       => __('Banner Section', 'street-food-truck'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','street-food-truck'),
		'priority'    => null,
		'panel'       => 'street_food_truck_panel_id',
	));

	$wp_customize->add_setting('street_food_truck_banner_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_banner_text',array(
		'description' => __('<p>1. More options for banner section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for banner section.</p>','street-food-truck'),
		'section'=> 'street_food_truck_banner',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('street_food_truck_banner_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_banner_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='https://www.vwthemes.com/products/street-food-wordpress-theme'>More Info</a>",
		'section'=> 'street_food_truck_banner',
		'type'=> 'hidden'
	));

	//Our Team
	$wp_customize->add_section('street_food_truck_our_team', array(
		'title'       => __('Our Team', 'street-food-truck'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','street-food-truck'),
		'priority'    => null,
		'panel'       => 'street_food_truck_panel_id',
	));

	$wp_customize->add_setting('street_food_truck_our_team_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_our_team_text',array(
		'description' => __('<p>1. More options for our team section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our team section.</p>','street-food-truck'),
		'section'=> 'street_food_truck_our_team',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('street_food_truck_our_team_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_our_team_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='https://www.vwthemes.com/products/street-food-wordpress-theme'>More Info</a>",
		'section'=> 'street_food_truck_our_team',
		'type'=> 'hidden'
	));

	//book_services
	$wp_customize->add_section('street_food_truck_book_services', array(
		'title'       => __('Book Services Section', 'street-food-truck'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','street-food-truck'),
		'priority'    => null,
		'panel'       => 'street_food_truck_panel_id',
	));

	$wp_customize->add_setting('street_food_truck_book_services_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_book_services_text',array(
		'description' => __('<p>1. More options for our book section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our book section.</p>','street-food-truck'),
		'section'=> 'street_food_truck_book_services',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('street_food_truck_book_services_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_book_services_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='https://www.vwthemes.com/products/street-food-wordpress-theme'>More Info</a>",
		'section'=> 'street_food_truck_book_services',
		'type'=> 'hidden'
	));

	//our_testimonial
	$wp_customize->add_section('street_food_truck_our_testimonial', array(
		'title'       => __('Our Testimonial Section', 'street-food-truck'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','street-food-truck'),
		'priority'    => null,
		'panel'       => 'street_food_truck_panel_id',
	));

	$wp_customize->add_setting('street_food_truck_our_testimonial_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_our_testimonial_text',array(
		'description' => __('<p>1. More options for our testimonial section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our testimonial section.</p>','street-food-truck'),
		'section'=> 'street_food_truck_our_testimonial',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('street_food_truck_our_testimonial_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_our_testimonial_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='https://www.vwthemes.com/products/street-food-wordpress-theme'>More Info</a>",
		'section'=> 'street_food_truck_our_testimonial',
		'type'=> 'hidden'
	));

	//Contact-Us
	$wp_customize->add_section('street_food_truck_contact-us', array(
		'title'       => __('Contact Us Section', 'street-food-truck'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','street-food-truck'),
		'priority'    => null,
		'panel'       => 'street_food_truck_panel_id',
	));

	$wp_customize->add_setting('street_food_truck_contact-us_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_contact-us_text',array(
		'description' => __('<p>1. More options for contact us section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for contact us section.</p>','street-food-truck'),
		'section'=> 'street_food_truck_contact-us',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('street_food_truck_contact-us_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_contact-us_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='https://www.vwthemes.com/products/street-food-wordpress-theme'>More Info</a>",
		'section'=> 'street_food_truck_contact-us',
		'type'=> 'hidden'
	));

	//our_blog
	$wp_customize->add_section('street_food_truck_our_blog', array(
		'title'       => __('Our Blog Section', 'street-food-truck'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','street-food-truck'),
		'priority'    => null,
		'panel'       => 'street_food_truck_panel_id',
	));

	$wp_customize->add_setting('street_food_truck_our_blog_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_our_blog_text',array(
		'description' => __('<p>1. More options for our blog section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our blog section.</p>','street-food-truck'),
		'section'=> 'street_food_truck_our_blog',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('street_food_truck_our_blog_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_our_blog_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='https://www.vwthemes.com/products/street-food-wordpress-theme'>More Info</a>",
		'section'=> 'street_food_truck_our_blog',
		'type'=> 'hidden'
	));

	//our-Gallery
	$wp_customize->add_section('street_food_truck_our_gallery', array(
		'title'       => __('Our Gallery Section', 'street-food-truck'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','street-food-truck'),
		'priority'    => null,
		'panel'       => 'street_food_truck_panel_id',
	));

	$wp_customize->add_setting('street_food_truck_our_gallery_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_our_gallery_text',array(
		'description' => __('<p>1. More options for our gallery section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our gallery section.</p>','street-food-truck'),
		'section'=> 'street_food_truck_our_gallery',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('street_food_truck_our_gallery_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_our_gallery_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='https://www.vwthemes.com/products/street-food-wordpress-theme'>More Info</a>",
		'section'=> 'street_food_truck_our_gallery',
		'type'=> 'hidden'
	));

	//faq-Section
	$wp_customize->add_section('street_food_truck_faq_section', array(
		'title'       => __('Faq Section', 'street-food-truck'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','street-food-truck'),
		'priority'    => null,
		'panel'       => 'street_food_truck_panel_id',
	));

	$wp_customize->add_setting('street_food_truck_faq_section_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_faq_section_text',array(
		'description' => __('<p>1. More options for faq section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for faq section.</p>','street-food-truck'),
		'section'=> 'street_food_truck_faq_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('street_food_truck_faq_section_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_faq_section_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='https://www.vwthemes.com/products/street-food-wordpress-theme'>More Info</a>",
		'section'=> 'street_food_truck_faq_section',
		'type'=> 'hidden'
	));
	

	//Footer Text
	$wp_customize->add_section('street_food_truck_footer',array(
		'title'	=> esc_html__('Footer Settings','street-food-truck'),
		'panel' => 'street_food_truck_panel_id',
		'description' => __('For more options of Footer Section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/street-food-wordpress-theme">GET PRO</a>','street-food-truck'),
	));

	$wp_customize->add_setting( 'street_food_truck_footer_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'street_food_truck_switch_sanitization'
    ));
    $wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_footer_hide_show',array(
      'label' => esc_html__( 'Show / Hide Footer','street-food-truck' ),
      'section' => 'street_food_truck_footer'
    )));

 	// font size
	$wp_customize->add_setting('street_food_truck_button_footer_font_size',array(
		'default'=> 25,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_button_footer_font_size',array(
		'label'	=> __('Footer Heading Font Size','street-food-truck'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'street_food_truck_footer',
	));

	$wp_customize->add_setting('street_food_truck_button_footer_heading_letter_spacing',array(
		'default'=> 1,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_button_footer_heading_letter_spacing',array(
		'label'	=> __('Heading Letter Spacing','street-food-truck'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
		'section'=> 'street_food_truck_footer',
	));

	// text trasform
	$wp_customize->add_setting('street_food_truck_button_footer_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'street_food_truck_sanitize_choices'
	));
	$wp_customize->add_control('street_food_truck_button_footer_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Heading Text Transform','street-food-truck'),
		'choices' => array(
			'Uppercase' => __('Uppercase','street-food-truck'),
			'Capitalize' => __('Capitalize','street-food-truck'),
			'Lowercase' => __('Lowercase','street-food-truck'),
		),
		'section'=> 'street_food_truck_footer',
	));

	$wp_customize->add_setting('street_food_truck_footer_heading_weight',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'street_food_truck_sanitize_choices'
	));
	$wp_customize->add_control('street_food_truck_footer_heading_weight',array(
        'type' => 'select',
        'label' => __('Heading Font Weight','street-food-truck'),
        'section' => 'street_food_truck_footer',
        'choices' => array(
        	'100' => __('100','street-food-truck'),
            '200' => __('200','street-food-truck'),
            '300' => __('300','street-food-truck'),
            '400' => __('400','street-food-truck'),
            '500' => __('500','street-food-truck'),
            '600' => __('600','street-food-truck'),
            '700' => __('700','street-food-truck'),
            '800' => __('800','street-food-truck'),
            '900' => __('900','street-food-truck'),
        ),
	) );

	$wp_customize->add_setting('street_food_truck_footer_template',array(
		'default'	=> esc_html('street_food_truck-footer-one'),
		'sanitize_callback'	=> 'street_food_truck_sanitize_choices'
	));
	$wp_customize->add_control('street_food_truck_footer_template',array(
		'label'	=> esc_html__('Footer style','street-food-truck'),
		'section'	=> 'street_food_truck_footer',
		'setting'	=> 'street_food_truck_footer_template',
		'type' => 'select',
		'choices' => array(
			'street_food_truck-footer-one' => esc_html__('Style 1', 'street-food-truck'),
			'street_food_truck-footer-two' => esc_html__('Style 2', 'street-food-truck'),
			'street_food_truck-footer-three' => esc_html__('Style 3', 'street-food-truck'),
			'street_food_truck-footer-four' => esc_html__('Style 4', 'street-food-truck'),
			'street_food_truck-footer-five' => esc_html__('Style 5', 'street-food-truck'),
		)
	));

	$wp_customize->add_setting('street_food_truck_footer_background_color', array(
		'default'           => '#222E39',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'street_food_truck_footer_background_color', array(
		'label'    => __('Footer Background Color', 'street-food-truck'),
		'section'  => 'street_food_truck_footer',
	)));

	$wp_customize->add_setting('street_food_truck_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'street_food_truck_footer_background_image',array(
        'label' => __('Footer Background Image','street-food-truck'),
        'section' => 'street_food_truck_footer'
	)));

	$wp_customize->add_setting('street_food_truck_footer_img_position',array(
	  'default' => 'center center',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'street_food_truck_sanitize_choices'
	));
	$wp_customize->add_control('street_food_truck_footer_img_position',array(
		'type' => 'select',
		'label' => __('Footer Image Position','street-food-truck'),
		'section' => 'street_food_truck_footer',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'street-food-truck' ),
			'center top'   => esc_html__( 'Top', 'street-food-truck' ),
			'right top'   => esc_html__( 'Top Right', 'street-food-truck' ),
			'left center'   => esc_html__( 'Left', 'street-food-truck' ),
			'center center'   => esc_html__( 'Center', 'street-food-truck' ),
			'right center'   => esc_html__( 'Right', 'street-food-truck' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'street-food-truck' ),
			'center bottom'   => esc_html__( 'Bottom', 'street-food-truck' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'street-food-truck' ),
		),
	));

  // Footer
  $wp_customize->add_setting('street_food_truck_img_footer',array(
    'default'=> 'scroll',
    'sanitize_callback' => 'street_food_truck_sanitize_choices'
  ));
  $wp_customize->add_control('street_food_truck_img_footer',array(
    'type' => 'select',
    'label' => __('Footer Background Attatchment','street-food-truck'),
    'choices' => array(
      'fixed' => __('fixed','street-food-truck'),
      'scroll' => __('scroll','street-food-truck'),
    ),
    'section'=> 'street_food_truck_footer',
  ));

  // footer padding
  $wp_customize->add_setting('street_food_truck_footer_padding',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('street_food_truck_footer_padding',array(
    'label' => __('Footer Top Bottom Padding','street-food-truck'),
    'description' => __('Enter a value in pixels. Example:20px','street-food-truck'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'street-food-truck' ),
    ),
    'section'=> 'street_food_truck_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('street_food_truck_footer_widgets_heading',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'street_food_truck_sanitize_choices'
  ));
  $wp_customize->add_control('street_food_truck_footer_widgets_heading',array(
    'type' => 'select',
    'label' => __('Footer Widget Heading','street-food-truck'),
    'section' => 'street_food_truck_footer',
    'choices' => array(
      'Left' => __('Left','street-food-truck'),
      'Center' => __('Center','street-food-truck'),
      'Right' => __('Right','street-food-truck')
    ),
  ) );

  $wp_customize->add_setting('street_food_truck_footer_widgets_content',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'street_food_truck_sanitize_choices'
  ));
  $wp_customize->add_control('street_food_truck_footer_widgets_content',array(
    'type' => 'select',
    'label' => __('Footer Widget Content','street-food-truck'),
    'section' => 'street_food_truck_footer',
    'choices' => array(
      'Left' => __('Left','street-food-truck'),
      'Center' => __('Center','street-food-truck'),
      'Right' => __('Right','street-food-truck')
  	),
	) );
	
	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('street_food_truck_footer_text', array(
		'selector' => '.copyright p',
		'render_callback' => 'street_food_truck_Customize_partial_street_food_truck_footer_text',
	));

	$wp_customize->add_setting('street_food_truck_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_footer_text',array(
		'label'	=> esc_html__('Copyright Text','street-food-truck'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Copyright 2024, .....', 'street-food-truck' ),
      ),
		'section'=> 'street_food_truck_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'street_food_truck_copyright_hide_show',array(
	  'default' => 1,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'street_food_truck_switch_sanitization'
	));
	$wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_copyright_hide_show',array(
		'label' => esc_html__( 'Show / Hide Copyright','street-food-truck' ),
		'section' => 'street_food_truck_footer'
	)));

	$wp_customize->add_setting('street_food_truck_copyright_alingment',array(
	    'default' => 'center',
	    'sanitize_callback' => 'street_food_truck_sanitize_choices'
		));
		$wp_customize->add_control(new Street_Food_Truck_Image_Radio_Control($wp_customize, 'street_food_truck_copyright_alingment', array(
	    'type' => 'select',
	    'label' => esc_html__('Copyright Alignment','street-food-truck'),
	    'section' => 'street_food_truck_footer',
	    'settings' => 'street_food_truck_copyright_alingment',
	    'choices' => array(
	        'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
	        'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
	        'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
	))));

	$wp_customize->add_setting('street_food_truck_copyright_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'street_food_truck_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'street-food-truck'),
		'section'  => 'street_food_truck_footer',
	)));

	$wp_customize->add_setting('street_food_truck_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_copyright_font_size',array(
		'label' => __('Copyright Font Size','street-food-truck'),
		'description' => __('Enter a value in pixels. Example:20px','street-food-truck'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'street-food-truck' ),
	    ),
		'section'=> 'street_food_truck_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'street_food_truck_hide_show_scroll',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'street_food_truck_switch_sanitization'
	));
	$wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_hide_show_scroll',array(
		'label' => esc_html__( 'Show / Hide Scroll to Top','street-food-truck' ),
		'section' => 'street_food_truck_footer'
	)));

  //Selective Refresh
	$wp_customize->selective_refresh->add_partial('street_food_truck_scroll_to_top_icon', array(
		'selector' => '.scrollup i',
		'render_callback' => 'street_food_truck_Customize_partial_street_food_truck_scroll_to_top_icon',
	));

  $wp_customize->add_setting('street_food_truck_scroll_top_alignment',array(
    'default' => 'Right',
    'sanitize_callback' => 'street_food_truck_sanitize_choices'
	));
	$wp_customize->add_control(new Street_Food_Truck_Image_Radio_Control($wp_customize, 'street_food_truck_scroll_top_alignment', array(
    'type' => 'select',
    'label' => esc_html__('Scroll To Top','street-food-truck'),
    'section' => 'street_food_truck_footer',
    'settings' => 'street_food_truck_scroll_top_alignment',
    'choices' => array(
        'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
        'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
        'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
  ))));

 	$wp_customize->add_setting('street_food_truck_scroll_top_icon',array(
    'default' => 'fas fa-long-arrow-alt-up',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(new Street_Food_Truck_Fontawesome_Icon_Chooser($wp_customize,'street_food_truck_scroll_top_icon',array(
    'label' => __('Add Scroll to Top Icon','street-food-truck'),
    'transport' => 'refresh',
    'section' => 'street_food_truck_footer',
    'setting' => 'street_food_truck_scroll_top_icon',
    'type'    => 'icon'
  )));

  $wp_customize->add_setting('street_food_truck_scroll_to_top_font_size',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('street_food_truck_scroll_to_top_font_size',array(
    'label' => __('Icon Font Size','street-food-truck'),
    'description' => __('Enter a value in pixels. Example:20px','street-food-truck'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'street-food-truck' ),
    ),
    'section'=> 'street_food_truck_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('street_food_truck_scroll_to_top_padding',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('street_food_truck_scroll_to_top_padding',array(
    'label' => __('Icon Top Bottom Padding','street-food-truck'),
    'description' => __('Enter a value in pixels. Example:20px','street-food-truck'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'street-food-truck' ),
    ),
    'section'=> 'street_food_truck_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('street_food_truck_scroll_to_top_width',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('street_food_truck_scroll_to_top_width',array(
    'label' => __('Icon Width','street-food-truck'),
    'description' => __('Enter a value in pixels Example:20px','street-food-truck'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'street-food-truck' ),
  ),
	  'section'=> 'street_food_truck_footer',
	  'type'=> 'text'
  ));

  $wp_customize->add_setting('street_food_truck_scroll_to_top_height',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('street_food_truck_scroll_to_top_height',array(
    'label' => __('Icon Height','street-food-truck'),
    'description' => __('Enter a value in pixels. Example:20px','street-food-truck'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'street-food-truck' ),
    ),
    'section'=> 'street_food_truck_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting( 'street_food_truck_scroll_to_top_border_radius', array(
    'default'              => '',
    'transport'        => 'refresh',
    'sanitize_callback'    => 'street_food_truck_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'street_food_truck_scroll_to_top_border_radius', array(
    'label'       => esc_html__( 'Icon Border Radius','street-food-truck' ),
    'section'     => 'street_food_truck_footer',
    'type'        => 'range',
    'input_attrs' => array(
      'step'             => 1,
      'min'              => 1,
      'max'              => 50,
    ),
  ) );

 	//Blog Post
	$wp_customize->add_panel( 'street_food_truck_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'street-food-truck' ),
		'panel' => 'street_food_truck_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'street_food_truck_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'street-food-truck' ),
		'panel' => 'street_food_truck_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('street_food_truck_toggle_postdate', array(
		'selector' => '.post-main-box h2 a',
		'render_callback' => 'street_food_truck_Customize_partial_street_food_truck_toggle_postdate',
	));

	//Blog layout
  $wp_customize->add_setting('street_food_truck_blog_layout_option',array(
    'default' => 'Default',
    'sanitize_callback' => 'street_food_truck_sanitize_choices'
  ));
  $wp_customize->add_control(new Street_Food_Truck_Image_Radio_Control($wp_customize, 'street_food_truck_blog_layout_option', array(
    'type' => 'select',
    'label' => __('Blog Post Layouts','street-food-truck'),
    'section' => 'street_food_truck_post_settings',
    'choices' => array(
      'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
      'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
      'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
  ))));

	$wp_customize->add_setting('street_food_truck_theme_options',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'street_food_truck_sanitize_choices'
	));
	$wp_customize->add_control('street_food_truck_theme_options',array(
    'type' => 'select',
    'label' => esc_html__('Post Sidebar Layout','street-food-truck'),
    'description' => esc_html__('Here you can change the sidebar layout for posts. ','street-food-truck'),
    'section' => 'street_food_truck_post_settings',
    'choices' => array(
        'Left Sidebar' => esc_html__('Left Sidebar','street-food-truck'),
        'Right Sidebar' => esc_html__('Right Sidebar','street-food-truck'),
        'One Column' => esc_html__('One Column','street-food-truck'),
        'Three Columns' => esc_html__('Three Columns','street-food-truck'),
        'Four Columns' => esc_html__('Four Columns','street-food-truck'),
        'Grid Layout' => esc_html__('Grid Layout','street-food-truck')
    ),
	) );


	$wp_customize->add_setting('street_food_truck_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Street_Food_Truck_Fontawesome_Icon_Chooser(
  $wp_customize,'street_food_truck_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','street-food-truck'),
		'transport' => 'refresh',
		'section'	=> 'street_food_truck_post_settings',
		'setting'	=> 'street_food_truck_toggle_postdate_icon',
		'type'		=> 'icon'
	)));

 	$wp_customize->add_setting( 'street_food_truck_blog_toggle_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'street_food_truck_switch_sanitization'
  ));
  $wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_blog_toggle_postdate',array(
    'label' => esc_html__( 'Show / Hide Post Date','street-food-truck' ),
    'section' => 'street_food_truck_post_settings'
  )));

	$wp_customize->add_setting('street_food_truck_toggle_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Street_Food_Truck_Fontawesome_Icon_Chooser(
  $wp_customize,'street_food_truck_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','street-food-truck'),
		'transport' => 'refresh',
		'section'	=> 'street_food_truck_post_settings',
		'setting'	=> 'street_food_truck_toggle_author_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'street_food_truck_blog_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'street_food_truck_switch_sanitization'
  ));
  $wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_blog_toggle_author',array(
		'label' => esc_html__( 'Show / Hide Author','street-food-truck' ),
		'section' => 'street_food_truck_post_settings'
  )));

  $wp_customize->add_setting('street_food_truck_toggle_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Street_Food_Truck_Fontawesome_Icon_Chooser(
  $wp_customize,'street_food_truck_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','street-food-truck'),
		'transport' => 'refresh',
		'section'	=> 'street_food_truck_post_settings',
		'setting'	=> 'street_food_truck_toggle_comments_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'street_food_truck_blog_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'street_food_truck_switch_sanitization'
  ) );
  $wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_blog_toggle_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','street-food-truck' ),
		'section' => 'street_food_truck_post_settings'
  )));

  $wp_customize->add_setting('street_food_truck_toggle_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Street_Food_Truck_Fontawesome_Icon_Chooser(
  $wp_customize,'street_food_truck_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','street-food-truck'),
		'transport' => 'refresh',
		'section'	=> 'street_food_truck_post_settings',
		'setting'	=> 'street_food_truck_toggle_time_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'street_food_truck_blog_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'street_food_truck_switch_sanitization'
  ) );
  $wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_blog_toggle_time',array(
		'label' => esc_html__( 'Show / Hide Time','street-food-truck' ),
		'section' => 'street_food_truck_post_settings'
  )));

  $wp_customize->add_setting( 'street_food_truck_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'street_food_truck_switch_sanitization'
	));
  $wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_featured_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','street-food-truck' ),
		'section' => 'street_food_truck_post_settings'
  )));

  $wp_customize->add_setting( 'street_food_truck_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'street_food_truck_sanitize_number_range'
	) );
	$wp_customize->add_control( 'street_food_truck_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','street-food-truck' ),
		'section'     => 'street_food_truck_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'street_food_truck_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'street_food_truck_sanitize_number_range'
	) );
	$wp_customize->add_control( 'street_food_truck_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','street-food-truck' ),
		'section'     => 'street_food_truck_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Featured Image
	$wp_customize->add_setting('street_food_truck_blog_post_featured_image_dimension',array(
   'default' => 'default',
   'sanitize_callback'	=> 'street_food_truck_sanitize_choices'
	));
	$wp_customize->add_control('street_food_truck_blog_post_featured_image_dimension',array(
		'type' => 'select',
		'label'	=> __('Blog Post Featured Image Dimension','street-food-truck'),
		'section'	=> 'street_food_truck_post_settings',
		'choices' => array(
		'default' => __('Default','street-food-truck'),
		'custom' => __('Custom Image Size','street-food-truck'),
      ),
	));

	$wp_customize->add_setting('street_food_truck_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
	$wp_customize->add_control('street_food_truck_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','street-food-truck'),
		'description'	=> __('Enter a value in pixels. Example:20px','street-food-truck'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'street-food-truck' ),),
		'section'=> 'street_food_truck_post_settings',
		'type'=> 'text',
		'active_callback' => 'street_food_truck_blog_post_featured_image_dimension'
		));

	$wp_customize->add_setting('street_food_truck_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','street-food-truck'),
		'description'	=> __('Enter a value in pixels. Example:20px','street-food-truck'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'street-food-truck' ),),
		'section'=> 'street_food_truck_post_settings',
		'type'=> 'text',
		'active_callback' => 'street_food_truck_blog_post_featured_image_dimension'
	));

  $wp_customize->add_setting( 'street_food_truck_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'street_food_truck_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'street_food_truck_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','street-food-truck' ),
		'section'     => 'street_food_truck_post_settings',
		'type'        => 'range',
		'settings'    => 'street_food_truck_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('street_food_truck_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','street-food-truck'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','street-food-truck'),
		'section'=> 'street_food_truck_post_settings',
		'type'=> 'text'
	));

  $wp_customize->add_setting('street_food_truck_excerpt_settings',array(
    'default' => 'Excerpt',
    'transport' => 'refresh',
    'sanitize_callback' => 'street_food_truck_sanitize_choices'
	));
	$wp_customize->add_control('street_food_truck_excerpt_settings',array(
    'type' => 'select',
    'label' => esc_html__('Post Content','street-food-truck'),
    'section' => 'street_food_truck_post_settings',
    'choices' => array(
    	'Content' => esc_html__('Content','street-food-truck'),
        'Excerpt' => esc_html__('Excerpt','street-food-truck'),
        'No Content' => esc_html__('No Content','street-food-truck')
        ),
	) );

  $wp_customize->add_setting('street_food_truck_blog_page_posts_settings',array(
    'default' => 'Into Blocks',
    'transport' => 'refresh',
    'sanitize_callback' => 'street_food_truck_sanitize_choices'
	));
	$wp_customize->add_control('street_food_truck_blog_page_posts_settings',array(
    'type' => 'select',
    'label' => __('Display Blog Posts','street-food-truck'),
    'section' => 'street_food_truck_post_settings',
    'choices' => array(
    	'Into Blocks' => __('Into Blocks','street-food-truck'),
        'Without Blocks' => __('Without Blocks','street-food-truck')
        ),
	) );

	$wp_customize->add_setting( 'street_food_truck_blog_pagination_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'street_food_truck_switch_sanitization'
  ));
  $wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_blog_pagination_hide_show',array(
		'label' => esc_html__( 'Show / Hide Blog Pagination','street-food-truck' ),
		'section' => 'street_food_truck_post_settings'
  )));

	$wp_customize->add_setting('street_food_truck_blog_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_blog_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','street-food-truck'),
		'input_attrs' => array(
      'placeholder' => __( '[...]', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'street_food_truck_blog_pagination_type', array(
    'default'			=> 'blog-page-numbers',
    'sanitize_callback'	=> 'street_food_truck_sanitize_choices'
  ));
  $wp_customize->add_control( 'street_food_truck_blog_pagination_type', array(
    'section' => 'street_food_truck_post_settings',
    'type' => 'select',
    'label' => __( 'Blog Pagination', 'street-food-truck' ),
    'choices'		=> array(
      'blog-page-numbers'  => __( 'Numeric', 'street-food-truck' ),
      'next-prev' => __( 'Older Posts/Newer Posts', 'street-food-truck' ),
  )));

  // Button Settings
	$wp_customize->add_section( 'street_food_truck_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'street-food-truck' ),
		'panel' => 'street_food_truck_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('street_food_truck_button_text', array(
		'selector' => '.post-main-box .more-btn a',
		'render_callback' => 'street_food_truck_Customize_partial_street_food_truck_button_text',
	));

  $wp_customize->add_setting('street_food_truck_button_text',array(
		'default'=> esc_html__('Read More','street-food-truck'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_button_text',array(
		'label'	=> esc_html__('Add Button Text','street-food-truck'),
		'input_attrs' => array(
    'placeholder' => esc_html__( 'Read More', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_button_settings',
		'type'=> 'text'
	));

	// font size button
	$wp_customize->add_setting('street_food_truck_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_button_font_size',array(
		'label'	=> __('Button Font Size','street-food-truck'),
		'description'	=> __('Enter a value in pixels. Example:20px','street-food-truck'),
		'input_attrs' => array(
  		'placeholder' => __( '10px', 'street-food-truck' ),
    ),
  	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'street_food_truck_button_settings',
	));


	$wp_customize->add_setting( 'street_food_truck_button_border_radius', array(
		'default'              => 5,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'street_food_truck_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'street_food_truck_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','street-food-truck' ),
		'section'     => 'street_food_truck_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	// button padding
	$wp_customize->add_setting('street_food_truck_button_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_button_top_bottom_padding',array(
		'label'	=> __('Button Top Bottom Padding','street-food-truck'),
		'description'	=> __('Enter a value in pixels. Example:20px','street-food-truck'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'street-food-truck' ),
    ),
		'section'=> 'street_food_truck_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('street_food_truck_button_left_right_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_button_left_right_padding',array(
		'label'	=> __('Button Left Right Padding','street-food-truck'),
		'description'	=> __('Enter a value in pixels. Example:20px','street-food-truck'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'street-food-truck' ),
    ),
		'section'=> 'street_food_truck_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('street_food_truck_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','street-food-truck'),
		'description'	=> __('Enter a value in pixels. Example:20px','street-food-truck'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'street-food-truck' ),
  ),
  	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
		'section'=> 'street_food_truck_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('street_food_truck_button_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'street_food_truck_sanitize_choices'
	));
	$wp_customize->add_control('street_food_truck_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','street-food-truck'),
		'choices' => array(
      'Uppercase' => __('Uppercase','street-food-truck'),
      'Capitalize' => __('Capitalize','street-food-truck'),
      'Lowercase' => __('Lowercase','street-food-truck'),
    ),
		'section'=> 'street_food_truck_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'street_food_truck_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'street-food-truck' ),
		'panel' => 'street_food_truck_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('street_food_truck_related_post_title', array(
		'selector' => '.related-post h3',
		'render_callback' => 'street_food_truck_Customize_partial_street_food_truck_related_post_title',
	));

  $wp_customize->add_setting( 'street_food_truck_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'street_food_truck_switch_sanitization'
  ) );
  $wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_related_post',array(
		'label' => esc_html__( 'Related Post','street-food-truck' ),
		'section' => 'street_food_truck_related_posts_settings'
  )));

  $wp_customize->add_setting('street_food_truck_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','street-food-truck'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Related Post', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_related_posts_settings',
		'type'=> 'text'
	));

 	$wp_customize->add_setting('street_food_truck_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'street_food_truck_sanitize_number_absint'
	));
	$wp_customize->add_control('street_food_truck_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','street-food-truck'),
		'input_attrs' => array(
      'placeholder' => esc_html__( '3', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'street_food_truck_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'street_food_truck_sanitize_number_range'
	) );
	$wp_customize->add_control( 'street_food_truck_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','street-food-truck' ),
		'section'     => 'street_food_truck_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'street_food_truck_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'street_food_truck_related_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'street_food_truck_switch_sanitization'
	));
  	$wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_related_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','street-food-truck' ),
		'section' => 'street_food_truck_related_posts_settings'
  	)));

  	$wp_customize->add_setting( 'street_food_truck_related_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'street_food_truck_sanitize_number_range'
	) );
	$wp_customize->add_control( 'street_food_truck_related_image_box_shadow', array(
		'label'       => esc_html__( 'Related post Image Box Shadow','street-food-truck' ),
		'section'     => 'street_food_truck_related_posts_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

  	$wp_customize->add_setting('street_food_truck_related_button_text',array(
		'default'=> esc_html__('Read More','street-food-truck'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_related_button_text',array(
		'label'	=> esc_html__('Add Button Text','street-food-truck'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Read More', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_related_posts_settings',
		'type'=> 'text'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'street_food_truck_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'street-food-truck' ),
		'panel' => 'street_food_truck_blog_post_parent_panel',
	));

	$wp_customize->add_setting('street_food_truck_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Street_Food_Truck_Fontawesome_Icon_Chooser(
  $wp_customize,'street_food_truck_single_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','street-food-truck'),
		'transport' => 'refresh',
		'section'	=> 'street_food_truck_single_blog_settings',
		'setting'	=> 'street_food_truck_single_postdate_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'street_food_truck_single_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'street_food_truck_switch_sanitization'
	) );
	$wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_single_postdate',array(
		'label' => esc_html__( 'Show / Hide Date','street-food-truck' ),
		'section' => 'street_food_truck_single_blog_settings'
	)));

	$wp_customize->add_setting('street_food_truck_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Street_Food_Truck_Fontawesome_Icon_Chooser(
  $wp_customize,'street_food_truck_single_author_icon',array(
		'label'	=> __('Add Author Icon','street-food-truck'),
		'transport' => 'refresh',
		'section'	=> 'street_food_truck_single_blog_settings',
		'setting'	=> 'street_food_truck_single_author_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'street_food_truck_single_author',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'street_food_truck_switch_sanitization'
	) );
	$wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_single_author',array(
    'label' => esc_html__( 'Show / Hide Author','street-food-truck' ),
    'section' => 'street_food_truck_single_blog_settings'
	)));

 	$wp_customize->add_setting('street_food_truck_single_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Street_Food_Truck_Fontawesome_Icon_Chooser(
  $wp_customize,'street_food_truck_single_comments_icon',array(
		'label'	=> __('Add Comments Icon','street-food-truck'),
		'transport' => 'refresh',
		'section'	=> 'street_food_truck_single_blog_settings',
		'setting'	=> 'street_food_truck_single_comments_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'street_food_truck_single_comments',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'street_food_truck_switch_sanitization'
	) );
	$wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_single_comments',array(
    'label' => esc_html__( 'Show / Hide Comments','street-food-truck' ),
    'section' => 'street_food_truck_single_blog_settings'
	)));

	$wp_customize->add_setting('street_food_truck_single_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Street_Food_Truck_Fontawesome_Icon_Chooser(
  $wp_customize,'street_food_truck_single_time_icon',array(
		'label'	=> __('Add Time Icon','street-food-truck'),
		'transport' => 'refresh',
		'section'	=> 'street_food_truck_single_blog_settings',
		'setting'	=> 'street_food_truck_single_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'street_food_truck_single_time',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'street_food_truck_switch_sanitization'
	) );
	$wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_single_time',array(
    'label' => esc_html__( 'Show / Hide Time','street-food-truck' ),
    'section' => 'street_food_truck_single_blog_settings'
	)));

	$wp_customize->add_setting( 'street_food_truck_toggle_tags',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'street_food_truck_switch_sanitization'
	));
  $wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_toggle_tags', array(
		'label' => esc_html__( 'Show / Hide Tags','street-food-truck' ),
		'section' => 'street_food_truck_single_blog_settings'
  )));

	$wp_customize->add_setting( 'street_food_truck_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'street_food_truck_switch_sanitization'
  ) );
 	$wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','street-food-truck' ),
		'section' => 'street_food_truck_single_blog_settings'
  )));

	// Single Posts Category
 	 $wp_customize->add_setting( 'street_food_truck_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'street_food_truck_switch_sanitization'
  	) );
	$wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_single_post_category',array(
		'label' => esc_html__( 'Show / Hide Category','street-food-truck' ),
		'section' => 'street_food_truck_single_blog_settings'
  	)));

  	$wp_customize->add_setting( 'street_food_truck_singlepost_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'street_food_truck_sanitize_number_range'
	) );
	$wp_customize->add_control( 'street_food_truck_singlepost_image_box_shadow', array(
		'label'       => esc_html__( 'Single post Image Box Shadow','street-food-truck' ),
		'section'     => 'street_food_truck_single_blog_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('street_food_truck_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','street-food-truck'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','street-food-truck'),
		'section'=> 'street_food_truck_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'street_food_truck_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'street_food_truck_switch_sanitization'
	));
	$wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_single_blog_post_navigation_show_hide', array(
	  'label' => esc_html__( 'Show / Hide Post Navigation','street-food-truck' ),
	  'section' => 'street_food_truck_single_blog_settings'
	)));

	$wp_customize->add_setting( 'street_food_truck_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'street_food_truck_switch_sanitization'
    ) );
 	$wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','street-food-truck' ),
		'section' => 'street_food_truck_single_blog_settings'
  )));

	//navigation text
	$wp_customize->add_setting('street_food_truck_single_blog_prev_navigation_text',array(
		'default'=> 'PREVIOUS',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','street-food-truck'),
		'input_attrs' => array(
      'placeholder' => __( 'PREVIOUS', 'street-food-truck' ),
      ),
		'section'=> 'street_food_truck_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('street_food_truck_single_blog_next_navigation_text',array(
		'default'=> 'NEXT',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','street-food-truck'),
		'input_attrs' => array(
      'placeholder' => __( 'NEXT', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('street_food_truck_single_blog_comment_title',array(
		'default'=> 'Leave a Reply',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('street_food_truck_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','street-food-truck'),
		'input_attrs' => array(
      'placeholder' => __( 'Leave a Reply', 'street-food-truck' ),
    	),
		'section'=> 'street_food_truck_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('street_food_truck_single_blog_comment_button_text',array(
		'default'=> 'Post Comment',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('street_food_truck_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','street-food-truck'),
		'input_attrs' => array(
    'placeholder' => __( 'Post Comment', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('street_food_truck_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','street-food-truck'),
		'description'	=> __('Enter a value in %. Example:50%','street-food-truck'),
		'input_attrs' => array(
      'placeholder' => __( '100%', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_single_blog_settings',
		'type'=> 'text'
	));

	 // Grid layout setting
	$wp_customize->add_section( 'street_food_truck_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'street-food-truck' ),
		'panel' => 'street_food_truck_blog_post_parent_panel',
	));

	$wp_customize->add_setting('street_food_truck_grid_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Street_Food_Truck_Fontawesome_Icon_Chooser(
        $wp_customize,'street_food_truck_grid_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','street-food-truck'),
		'transport' => 'refresh',
		'section'	=> 'street_food_truck_grid_layout_settings',
		'setting'	=> 'street_food_truck_grid_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'street_food_truck_grid_postdate',array(
	  'default' => 1,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'street_food_truck_switch_sanitization'
  ) );
  $wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_grid_postdate',array(
    'label' => esc_html__( 'Show / Hide Post Date','street-food-truck' ),
    'section' => 'street_food_truck_grid_layout_settings'
  )));

	$wp_customize->add_setting('street_food_truck_grid_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Street_Food_Truck_Fontawesome_Icon_Chooser(
        $wp_customize,'street_food_truck_grid_author_icon',array(
		'label'	=> __('Add Author Icon','street-food-truck'),
		'transport' => 'refresh',
		'section'	=> 'street_food_truck_grid_layout_settings',
		'setting'	=> 'street_food_truck_grid_author_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'street_food_truck_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'street_food_truck_switch_sanitization'
  ) );
  $wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_grid_author',array(
		'label' => esc_html__( 'Show / Hide Author','street-food-truck' ),
		'section' => 'street_food_truck_grid_layout_settings'
  )));

  $wp_customize->add_setting('street_food_truck_grid_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Street_Food_Truck_Fontawesome_Icon_Chooser(
        $wp_customize,'street_food_truck_grid_comments_icon',array(
		'label'	=> __('Add Comments Icon','street-food-truck'),
		'transport' => 'refresh',
		'section'	=> 'street_food_truck_grid_layout_settings',
		'setting'	=> 'street_food_truck_grid_comments_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'street_food_truck_grid_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'street_food_truck_switch_sanitization'
  ) );
  $wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_grid_time',array(
		'label' => esc_html__( 'Show / Hide Time','street-food-truck' ),
		'section' => 'street_food_truck_grid_layout_settings'
  )));

  $wp_customize->add_setting('street_food_truck_grid_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Street_Food_Truck_Fontawesome_Icon_Chooser(
        $wp_customize,'street_food_truck_grid_time_icon',array(
		'label'	=> __('Add Time Icon','street-food-truck'),
		'transport' => 'refresh',
		'section'	=> 'street_food_truck_grid_layout_settings',
		'setting'	=> 'street_food_truck_grid_time_icon',
		'type'		=> 'icon'
	)));

  	$wp_customize->add_setting( 'street_food_truck_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'street_food_truck_switch_sanitization'
  	) );
  	$wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_grid_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','street-food-truck' ),
		'section' => 'street_food_truck_grid_layout_settings'
  	)));

  $wp_customize->add_setting( 'street_food_truck_grid_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'street_food_truck_switch_sanitization'
	));
  	$wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_grid_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','street-food-truck' ),
		'section' => 'street_food_truck_grid_layout_settings'
  	)));

 	$wp_customize->add_setting('street_food_truck_grid_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_grid_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','street-food-truck'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','street-food-truck'),
		'section'=> 'street_food_truck_grid_layout_settings',
		'type'=> 'text'
	));

  $wp_customize->add_setting('street_food_truck_display_grid_posts_settings',array(
    'default' => 'Into Blocks',
    'transport' => 'refresh',
    'sanitize_callback' => 'street_food_truck_sanitize_choices'
	));
	$wp_customize->add_control('street_food_truck_display_grid_posts_settings',array(
    'type' => 'select',
    'label' => __('Display Grid Posts','street-food-truck'),
    'section' => 'street_food_truck_grid_layout_settings',
    'choices' => array(
    	'Into Blocks' => __('Into Blocks','street-food-truck'),
      'Without Blocks' => __('Without Blocks','street-food-truck')
      ),
	) );

	$wp_customize->add_setting('street_food_truck_grid_button_text',array(
		'default'=> esc_html__('Read More','street-food-truck'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_grid_button_text',array(
		'label'	=> esc_html__('Add Button Text','street-food-truck'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Read More', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_grid_layout_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('street_food_truck_grid_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_grid_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','street-food-truck'),
		'input_attrs' => array(
        'placeholder' => __( '[...]', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_grid_layout_settings',
		'type'=> 'text'
	));

  $wp_customize->add_setting('street_food_truck_grid_excerpt_settings',array(
    'default' => 'Excerpt',
    'transport' => 'refresh',
    'sanitize_callback' => 'street_food_truck_sanitize_choices'
	));
	$wp_customize->add_control('street_food_truck_grid_excerpt_settings',array(
    'type' => 'select',
    'label' => esc_html__('Grid Post Content','street-food-truck'),
    'section' => 'street_food_truck_grid_layout_settings',
    'choices' => array(
    	'Content' => esc_html__('Content','street-food-truck'),
      'Excerpt' => esc_html__('Excerpt','street-food-truck'),
      'No Content' => esc_html__('No Content','street-food-truck')
    ),
	) );

  $wp_customize->add_setting( 'street_food_truck_grid_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'street_food_truck_sanitize_number_range'
	) );
	$wp_customize->add_control( 'street_food_truck_grid_featured_image_border_radius', array(
		'label'       => esc_html__( 'Grid Featured Image Border Radius','street-food-truck' ),
		'section'     => 'street_food_truck_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'street_food_truck_grid_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'street_food_truck_sanitize_number_range'
	) );
	$wp_customize->add_control( 'street_food_truck_grid_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Grid Featured Image Box Shadow','street-food-truck' ),
		'section'     => 'street_food_truck_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Other
	$wp_customize->add_panel( 'street_food_truck_other_parent_panel', array(
		'title' => esc_html__( 'Other Settings', 'street-food-truck' ),
		'panel' => 'street_food_truck_panel_id',
		'priority' => 20,
	));

	// Layout
	$wp_customize->add_section( 'street_food_truck_left_right', array(
  	'title' => esc_html__('General Settings', 'street-food-truck'),
		'panel' => 'street_food_truck_other_parent_panel'
	) );

	$wp_customize->add_setting('street_food_truck_width_option',array(
    'default' => 'Full Width',
    'sanitize_callback' => 'street_food_truck_sanitize_choices'
	));
	$wp_customize->add_control(new Street_Food_Truck_Image_Radio_Control($wp_customize, 'street_food_truck_width_option', array(
    'type' => 'select',
    'label' => esc_html__('Width Layouts','street-food-truck'),
    'description' => esc_html__('Here you can change the width layout of Website.','street-food-truck'),
    'section' => 'street_food_truck_left_right',
    'choices' => array(
        'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
        'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
        'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
  ))));

	$wp_customize->add_setting('street_food_truck_page_layout',array(
    'default' => 'One_Column',
    'sanitize_callback' => 'street_food_truck_sanitize_choices'
	));
	$wp_customize->add_control('street_food_truck_page_layout',array(
    'type' => 'select',
    'label' => esc_html__('Page Sidebar Layout','street-food-truck'),
    'description' => esc_html__('Here you can change the sidebar layout for pages. ','street-food-truck'),
    'section' => 'street_food_truck_left_right',
    'choices' => array(
        'Left_Sidebar' => esc_html__('Left Sidebar','street-food-truck'),
        'Right_Sidebar' => esc_html__('Right Sidebar','street-food-truck'),
        'One_Column' => esc_html__('One Column','street-food-truck')
    ),
	) );
	
    // Pre-Loader
	$wp_customize->add_setting( 'street_food_truck_loader_enable',array(
    'default' => 0,
    'transport' => 'refresh',
    'sanitize_callback' => 'street_food_truck_switch_sanitization'
  ) );
  $wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_loader_enable',array(
    'label' => esc_html__( 'Pre-Loader','street-food-truck' ),
    'section' => 'street_food_truck_left_right'
  )));

	$wp_customize->add_setting('street_food_truck_preloader_bg_color', array(
		'default'           => '#222E39',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'street_food_truck_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'street-food-truck'),
		'section'  => 'street_food_truck_left_right',
	)));

	$wp_customize->add_setting('street_food_truck_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'street_food_truck_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'street-food-truck'),
		'section'  => 'street_food_truck_left_right',
	)));

	$wp_customize->add_setting('street_food_truck_preloader_bg_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'street_food_truck_preloader_bg_img',array(
    'label' => __('Preloader Background Image','street-food-truck'),
    'section' => 'street_food_truck_left_right'
	)));

    //404 Page Setting
	$wp_customize->add_section('street_food_truck_404_page',array(
		'title'	=> __('404 Page Settings','street-food-truck'),
		'panel' => 'street_food_truck_other_parent_panel',
	));

	$wp_customize->add_setting('street_food_truck_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('street_food_truck_404_page_title',array(
		'label'	=> __('Add Title','street-food-truck'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('street_food_truck_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_404_page_content',array(
		'label'	=> __('Add Text','street-food-truck'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('street_food_truck_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_404_page_button_text',array(
		'label'	=> __('Add Button Text','street-food-truck'),
		'input_attrs' => array(
            'placeholder' => __( 'Go Back', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_404_page',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('street_food_truck_no_results_page',array(
		'title'	=> __('No Results Page Settings','street-food-truck'),
		'panel' => 'street_food_truck_other_parent_panel',
	));

	$wp_customize->add_setting('street_food_truck_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('street_food_truck_no_results_page_title',array(
		'label'	=> __('Add Title','street-food-truck'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('street_food_truck_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_no_results_page_content',array(
		'label'	=> __('Add Text','street-food-truck'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('street_food_truck_social_icon_settings',array(
		'title'	=> __('Sidebar Social Icons Settings','street-food-truck'),
		'panel' => 'street_food_truck_other_parent_panel',
	));

	$wp_customize->add_setting('street_food_truck_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','street-food-truck'),
		'description'	=> __('Enter a value in pixels. Example:20px','street-food-truck'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('street_food_truck_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_social_icon_padding',array(
		'label'	=> __('Icon Padding','street-food-truck'),
		'description'	=> __('Enter a value in pixels. Example:20px','street-food-truck'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('street_food_truck_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_social_icon_width',array(
		'label'	=> __('Icon Width','street-food-truck'),
		'description'	=> __('Enter a value in pixels. Example:20px','street-food-truck'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('street_food_truck_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_social_icon_height',array(
		'label'	=> __('Icon Height','street-food-truck'),
		'description'	=> __('Enter a value in pixels. Example:20px','street-food-truck'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_social_icon_settings',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('street_food_truck_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','street-food-truck'),
		'panel' => 'street_food_truck_other_parent_panel',
	));

	$wp_customize->add_setting( 'street_food_truck_resp_topbar_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'street_food_truck_switch_sanitization'
    ));
    $wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_resp_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','street-food-truck' ),
      'section' => 'street_food_truck_responsive_media'
    )));

	$wp_customize->add_setting( 'street_food_truck_resp_slider_hide_show',array(
      	'default' => 1,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'street_food_truck_switch_sanitization'
    ));
    $wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Banner','street-food-truck' ),
      	'section' => 'street_food_truck_responsive_media'
    )));

	$wp_customize->add_setting( 'street_food_truck_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'street_food_truck_switch_sanitization'
    ));
    $wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','street-food-truck' ),
      	'section' => 'street_food_truck_responsive_media'
    )));

	$wp_customize->add_setting( 'street_food_truck_responsive_preloader_hide',array(
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'street_food_truck_switch_sanitization'
    ) );
    $wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_responsive_preloader_hide',array(
        'label' => esc_html__( 'Show / Hide Preloader','street-food-truck' ),
        'section' => 'street_food_truck_responsive_media'
    )));

    $wp_customize->add_setting( 'street_food_truck_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'street_food_truck_switch_sanitization'
	));
	$wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_resp_scroll_top_hide_show',array(
    	'label' => esc_html__( 'Show / Hide Scroll To Top','street-food-truck' ),
    	'section' => 'street_food_truck_responsive_media'
	)));

  	$wp_customize->add_setting('street_food_truck_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Street_Food_Truck_Fontawesome_Icon_Chooser(
        $wp_customize,'street_food_truck_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','street-food-truck'),
		'transport' => 'refresh',
		'section'	=> 'street_food_truck_responsive_media',
		'setting'	=> 'street_food_truck_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('street_food_truck_res_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Street_Food_Truck_Fontawesome_Icon_Chooser(
        $wp_customize,'street_food_truck_res_close_menu_icon',array(
		'label'	=> __('Add Close Menu Icon','street-food-truck'),
		'transport' => 'refresh',
		'section'	=> 'street_food_truck_responsive_media',
		'setting'	=> 'street_food_truck_res_close_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('street_food_truck_resp_menu_toggle_btn_bg_color', array(
		'default'           => '#FFB936',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'street_food_truck_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'street-food-truck'),
		'section'  => 'street_food_truck_responsive_media',
	)));

  //Woocommerce settings
	$wp_customize->add_section('street_food_truck_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'street-food-truck'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'street_food_truck_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar',
		'render_callback' => 'street_food_truck_customize_partial_street_food_truck_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'street_food_truck_woocommerce_shop_page_sidebar',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'street_food_truck_switch_sanitization'
  ) );
  $wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Shop Page Sidebar','street-food-truck' ),
		'section' => 'street_food_truck_woocommerce_section'
  )));

   $wp_customize->add_setting('street_food_truck_shop_page_layout',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'street_food_truck_sanitize_choices'
	));
	$wp_customize->add_control('street_food_truck_shop_page_layout',array(
    'type' => 'select',
    'label' => __('Shop Page Sidebar Layout','street-food-truck'),
    'section' => 'street_food_truck_woocommerce_section',
    'choices' => array(
        'Left Sidebar' => __('Left Sidebar','street-food-truck'),
        'Right Sidebar' => __('Right Sidebar','street-food-truck'),
    ),
	) );

   //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'street_food_truck_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar',
		'render_callback' => 'street_food_truck_customize_partial_street_food_truck_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'street_food_truck_woocommerce_single_product_page_sidebar',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'street_food_truck_switch_sanitization'
   ) );
 	$wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Single Product Sidebar','street-food-truck' ),
		'section' => 'street_food_truck_woocommerce_section'
  )));

   $wp_customize->add_setting('street_food_truck_single_product_layout',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'street_food_truck_sanitize_choices'
	));
	$wp_customize->add_control('street_food_truck_single_product_layout',array(
    'type' => 'select',
    'label' => __('Single Product Sidebar Layout','street-food-truck'),
    'section' => 'street_food_truck_woocommerce_section',
    'choices' => array(
        'Left Sidebar' => __('Left Sidebar','street-food-truck'),
        'Right Sidebar' => __('Right Sidebar','street-food-truck'),
    ),
	) );

	//Products per page
    $wp_customize->add_setting('street_food_truck_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'street_food_truck_sanitize_float'
	));
	$wp_customize->add_control('street_food_truck_products_per_page',array(
		'label'	=> __('Products Per Page','street-food-truck'),
		'description' => __('Display on shop page','street-food-truck'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'street_food_truck_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('street_food_truck_products_per_row',array(
		'default'=> '4',
		'sanitize_callback'	=> 'street_food_truck_sanitize_choices'
	));
	$wp_customize->add_control('street_food_truck_products_per_row',array(
		'label'	=> __('Products Per Row','street-food-truck'),
		'description' => __('Display on shop page','street-food-truck'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'street_food_truck_woocommerce_section',
		'type'=> 'select',
		));

	//Products padding
	$wp_customize->add_setting('street_food_truck_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','street-food-truck'),
		'description'	=> __('Enter a value in pixels. Example:20px','street-food-truck'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('street_food_truck_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','street-food-truck'),
		'description'	=> __('Enter a value in pixels. Example:20px','street-food-truck'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'street_food_truck_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'street_food_truck_sanitize_number_range'
	) );
	$wp_customize->add_control( 'street_food_truck_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','street-food-truck' ),
		'section'     => 'street_food_truck_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'street_food_truck_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'street_food_truck_sanitize_number_range'
	) );
	$wp_customize->add_control( 'street_food_truck_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','street-food-truck' ),
		'section'     => 'street_food_truck_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'street_food_truck_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'street_food_truck_sanitize_number_range'
	) );
	$wp_customize->add_control( 'street_food_truck_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','street-food-truck' ),
		'section'     => 'street_food_truck_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('street_food_truck_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','street-food-truck'),
		'description'	=> __('Enter a value in pixels. Example:20px','street-food-truck'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('street_food_truck_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','street-food-truck'),
		'description'	=> __('Enter a value in pixels. Example:20px','street-food-truck'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('street_food_truck_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','street-food-truck'),
		'description'	=> __('Enter a value in pixels. Example:20px','street-food-truck'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_woocommerce_section',
		'type'=> 'text'
	));

	//Products Sale Badge
	$wp_customize->add_setting('street_food_truck_woocommerce_sale_position',array(
    'default' => 'right',
    'sanitize_callback' => 'street_food_truck_sanitize_choices'
	));
	$wp_customize->add_control('street_food_truck_woocommerce_sale_position',array(
    'type' => 'select',
    'label' => __('Sale Badge Position','street-food-truck'),
    'section' => 'street_food_truck_woocommerce_section',
    'choices' => array(
        'left' => __('Left','street-food-truck'),
        'right' => __('Right','street-food-truck'),
    ),
	) );

	$wp_customize->add_setting('street_food_truck_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','street-food-truck'),
		'description'	=> __('Enter a value in pixels. Example:20px','street-food-truck'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('street_food_truck_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('street_food_truck_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','street-food-truck'),
		'description'	=> __('Enter a value in pixels. Example:20px','street-food-truck'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'street-food-truck' ),
        ),
		'section'=> 'street_food_truck_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'street_food_truck_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'street_food_truck_sanitize_number_range'
	) );
	$wp_customize->add_control( 'street_food_truck_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','street-food-truck' ),
		'section'     => 'street_food_truck_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	// Related Product
  $wp_customize->add_setting( 'street_food_truck_related_product_show_hide',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'street_food_truck_switch_sanitization'
  ) );
  $wp_customize->add_control( new Street_Food_Truck_Toggle_Switch_Custom_Control( $wp_customize, 'street_food_truck_related_product_show_hide',array(
    'label' => esc_html__( 'Show / Hide Related product','street-food-truck' ),
    'section' => 'street_food_truck_woocommerce_section'
  )));

}

add_action( 'customize_register', 'street_food_truck_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Street_Food_Truck_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Street_Food_Truck_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Street_Food_Truck_Customize_Section_Pro( $manager,'street_food_truck_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'FOOD TRUCK PRO', 'street-food-truck' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'street-food-truck' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/products/street-food-wordpress-theme'),
		) )	);

		// Register sections.
		$manager->add_section(new Street_Food_Truck_Customize_Section_Pro($manager,'street_food_truck_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'street-food-truck' ),
			'pro_text' => esc_html__( 'DOCS', 'street-food-truck' ),
			'pro_url'  => esc_url('https://preview.vwthemesdemo.com/docs/free-street-food-truck/'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'street-food-truck-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'street-food-truck-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Street_Food_Truck_Customize::get_instance();