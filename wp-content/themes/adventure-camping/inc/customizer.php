<?php
/**
 * Adventure Camping   Theme Customizer
 *
 * @package Adventure Camping  
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function adventure_camping_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'adventure_camping_custom_controls' );

function adventure_camping_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo .site-title a',
	 	'render_callback' => 'adventure_camping_Customize_partial_blogname',
	));

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => 'p.site-description',
		'render_callback' => 'adventure_camping_Customize_partial_blogdescription',
	));

	// add home page setting pannel
	$wp_customize->add_panel( 'adventure_camping_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Homepage Settings', 'adventure-camping' ),
		'priority' => 10,
	));

	//Menus Settings
	$wp_customize->add_section( 'adventure_camping_menu_section' , array(
    	'title' => __( 'Menus Settings', 'adventure-camping' ),
		'panel' => 'adventure_camping_panel_id'
	) );

	$wp_customize->add_setting('adventure_camping_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','adventure-camping'),
		'description'	=> __('Enter a value in pixels. Example:20px','adventure-camping'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_menu_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_camping_navigation_menu_font_weight',array(
        'default' => 600,
        'transport' => 'refresh',
        'sanitize_callback' => 'adventure_camping_sanitize_choices'
	));
	$wp_customize->add_control('adventure_camping_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','adventure-camping'),
        'section' => 'adventure_camping_menu_section',
        'choices' => array(
        	'100' => __('100','adventure-camping'),
            '200' => __('200','adventure-camping'),
            '300' => __('300','adventure-camping'),
            '400' => __('400','adventure-camping'),
            '500' => __('500','adventure-camping'),
            '600' => __('600','adventure-camping'),
            '700' => __('700','adventure-camping'),
            '800' => __('800','adventure-camping'),
            '900' => __('900','adventure-camping'),
        ),
	) );

	$wp_customize->add_setting('adventure_camping_menus_item_style',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'adventure_camping_sanitize_choices'
	));
	$wp_customize->add_control('adventure_camping_menus_item_style',array(
        'type' => 'select',
        'section' => 'adventure_camping_menu_section',
		'label' => __('Menu Item Hover Style','adventure-camping'),
		'choices' => array(
            'None' => __('None','adventure-camping'),
            'Zoom In' => __('Zoom In','adventure-camping'),
        ),
	) );

	$wp_customize->add_setting('adventure_camping_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'adventure_camping_header_menus_color', array(
		'label'    => __('Menus Color', 'adventure-camping'),
		'section'  => 'adventure_camping_menu_section',
	)));

	$wp_customize->add_setting('adventure_camping_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'adventure_camping_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'adventure-camping'),
		'section'  => 'adventure_camping_menu_section',
	)));

	$wp_customize->add_setting('adventure_camping_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'adventure_camping_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'adventure-camping'),
		'section'  => 'adventure_camping_menu_section',
	)));

	$wp_customize->add_setting('adventure_camping_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'adventure_camping_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'adventure-camping'),
		'section'  => 'adventure_camping_menu_section',
	)));

	// Topbar
	$wp_customize->add_section( 'adventure_camping_top_bar' , array(
    	'title' => esc_html__( 'Topbar', 'adventure-camping' ),
		'panel' => 'adventure_camping_panel_id'
	) );

	$wp_customize->add_setting('adventure_camping_cart_icon',array(
		'default'	=> 'fa-solid fa-bag-shopping',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Camping_Fontawesome_Icon_Chooser(
        $wp_customize,'adventure_camping_cart_icon',array(
		'label'	=> __('Add Cart Icon','adventure-camping'),
		'transport' => 'refresh',
		'section'	=> 'adventure_camping_top_bar',
		'setting'	=> 'adventure_camping_cart_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('adventure_camping_cart_button_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('adventure_camping_cart_button_link',array(
		'label'	=> __('Add Cart Link','adventure-camping'),
		'input_attrs' => array(
        'placeholder' => __( 'www.example-info.com', 'adventure-camping' ),
      ),
		'section'	=> 'adventure_camping_top_bar',
		'setting'	=> 'adventure_camping_cart_button_link',
		'type'	=> 'url'
	));

	$wp_customize->add_setting( 'adventure_camping_search_hide_show',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'adventure_camping_switch_sanitization'
  ));
  $wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_search_hide_show',array(
    'label' => esc_html__( 'Show / Hide Search','adventure-camping' ),
    'section' => 'adventure_camping_top_bar'
  )));

	$wp_customize->add_setting('adventure_camping_search_open_icon',array(
		'default'	=> 'fas fa-search',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Camping_Fontawesome_Icon_Chooser($wp_customize,'adventure_camping_search_open_icon',array(
		'label'	=> __('Search Open Icon','adventure-camping'),
		'transport' => 'refresh',
		'section'	=> 'adventure_camping_top_bar',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('adventure_camping_search_close_icon',array(
		'default'	=> 'fa fa-window-close',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Camping_Fontawesome_Icon_Chooser($wp_customize,'adventure_camping_search_close_icon',array(
		'label'	=> __('Search Close Icon','adventure-camping'),
		'transport' => 'refresh',
		'section'	=> 'adventure_camping_top_bar',
		'type'		=> 'icon'
	)));

	//Banner
	$wp_customize->add_section( 'adventure_camping_banner_section' , array(
	  	'title'      => __( 'Banner Settings', 'adventure-camping' ),
		'panel' => 'adventure_camping_panel_id',
		'description' => __('For more options of Banner section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/camping-wordpress-theme">GET PRO</a>','adventure-camping'),
	) );

	$wp_customize->add_setting( 'adventure_camping_show_hide_banner',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'adventure_camping_switch_sanitization'
  ));
  $wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_show_hide_banner',array(
      	'label' => esc_html__( 'Show / Hide Banner','adventure-camping' ),
      	'section' => 'adventure_camping_banner_section',
  )));

	$wp_customize->add_setting('adventure_camping_banner_background_color', array(
		'default'           => '#FAE0BF',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'adventure_camping_banner_background_color', array(
		'label'    => __('Banner Background Color', 'adventure-camping'),
		'section'  => 'adventure_camping_banner_section',
	)));

	$wp_customize->add_setting('adventure_camping_subheading',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('adventure_camping_subheading',array(
		'label'	=>esc_html__( 'Banner Sub-Heading', 'adventure-camping' ),
		'section'	=> 'adventure_camping_banner_section',
		'type'		=> 'text',
		'input_attrs' => array(
	      'placeholder' => __( 'Camp Crafter', 'adventure-camping' ),
	    ),
	));

    $wp_customize->add_setting('adventure_camping_tagline_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('adventure_camping_tagline_title',array(
		'label'	=> esc_html__( 'Banner Title', 'adventure-camping' ), 
		'section'	=> 'adventure_camping_banner_section',
		'type'		=> 'text',
		'input_attrs' => array(
	      'placeholder' => __( 'Explore the Outdoors – Adventure Awaits, Start Camping Today!', 'adventure-camping' ),
	    ),
	));

	$wp_customize->add_setting('adventure_camping_designation_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('adventure_camping_designation_text',array(
		'label'	=>esc_html__( 'Banner Content', 'adventure-camping' ),
		'section'	=> 'adventure_camping_banner_section',
		'type'		=> 'text',
	));

	$wp_customize->add_setting('adventure_camping_banner_button_label',array(
		'default' => esc_html__( '', 'adventure-camping' ),
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_banner_button_label',array(
		'label' => esc_html__( 'Button', 'adventure-camping' ),
		'section' => 'adventure_camping_banner_section',
		'setting' => 'adventure_camping_banner_button_label',
		'type' => 'text',
		'input_attrs' => array(
	      'placeholder' => __( 'Explore more', 'adventure-camping' ),
	    ),
	));

	$wp_customize->add_setting('adventure_camping_top_button_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control('adventure_camping_top_button_url',array(
		'label'	=> esc_html__( 'Add Button URL', 'adventure-camping' ), 
		'section'	=> 'adventure_camping_banner_section',
		'setting'	=> 'adventure_camping_top_button_url',
		'type'	=> 'url',
	));

	$wp_customize->add_setting('adventure_camping_social_icons',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_social_icons',array(
		'label' =>  __('Steps to setup social icons','adventure-camping'),
		'description' => __('<p>1. Go to Dashboard >> Appearance >> Widgets</p>
			<p>2. Add Vw Social Icon Widget in Social Widget area.</p>
			<p>3. Add social icons url and save.</p>','adventure-camping'),
		'section'=> 'adventure_camping_banner_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('adventure_camping_social_icon_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_social_icon_btn',array(
		'description' => "<a target='_blank' href='". admin_url('widgets.php') ." '>Setup Topbar Social Icons</a>",
		'section'=> 'adventure_camping_banner_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('adventure_camping_banner_bottom_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
  ));
  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'adventure_camping_banner_bottom_image',array(
    'label' => __('Banner Image','adventure-camping'),
    'section' => 'adventure_camping_banner_section',
    'description' => __('Use a image with dimensions of (150px x 200px) for optimal display.','adventure-camping'),
  )));

  //Aboutus Section  
	$wp_customize->add_section('adventure_camping_aboutus', array(
		'title'       => __('Aboutus Section', 'adventure-camping'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','adventure-camping'),
		'priority'    => null,
		'panel'       => 'adventure_camping_panel_id',
	));

	$wp_customize->add_setting('adventure_camping_aboutus_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_aboutus_text',array(
		'description' => __('<p>1. More options for aboutus section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for aboutus section.</p>','adventure-camping'),
		'section'=> 'adventure_camping_aboutus',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('adventure_camping_aboutus_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_aboutus_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(ADVENTURE_CAMPING_BUY_NOW).">More Info</a>",
		'section'=> 'adventure_camping_aboutus',
		'type'=> 'hidden'
	));

	// Camp Section
	$wp_customize->add_section('adventure_camping_camp_section', array(
    'title' => __('Camp Section', 'adventure-camping'),
    'panel' => 'adventure_camping_panel_id',
    'description' => __('For more options of Camp section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/camping-wordpress-theme">GET PRO</a>','adventure-camping'),
	));

	$wp_customize->add_setting( 'adventure_camping_camp_section_hide_show',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'adventure_camping_switch_sanitization'
	));
	$wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_camp_section_hide_show',array(
    'label' => esc_html__( 'Show / Hide Camp Section','adventure-camping' ),
    'section' => 'adventure_camping_camp_section'
	)));

	$wp_customize->add_setting('adventure_camping_camp_section_text',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_camp_section_text',array(
		'type' => 'text',
		'label' => __('Camp text','adventure-camping'),
		'input_attrs' => array(
	      'placeholder' => __( 'Our Camping', 'adventure-camping' ),
	    ),
		'section' => 'adventure_camping_camp_section'
	));

	$wp_customize->add_setting('adventure_camping_camp_section_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_camp_section_title',array(
		'type' => 'text',
		'label' => __('Camp Title','adventure-camping'),
		'input_attrs' => array(
	      'placeholder' => __( 'HELLO CAMPING CAMP', 'adventure-camping' ),
	    ),
		'section' => 'adventure_camping_camp_section'
	));

	$wp_customize->add_setting('adventure_camping_claases_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('adventure_camping_claases_number',array(
		'label'	=> __('Number of post to show','adventure-camping'),
		'description' => __('Add number and refresh tab','adventure-camping'),
		'section'	=> 'adventure_camping_camp_section',
		'type'		=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 6,
		)
	));
	$adventure_camping_featured_post = get_theme_mod('adventure_camping_claases_number');

	$adventure_camping_args = array('numberposts' => -1);
	$adventure_camping_post_list = get_posts($adventure_camping_args);
	$adventure_camping_i = 0;
	$adventure_camping_pst[]='Select';
	foreach($adventure_camping_post_list as $adventure_camping_post){
		$adventure_camping_pst[$adventure_camping_post->ID] = $adventure_camping_post->post_title;
	}

	for ( $adventure_camping_i = 1; $adventure_camping_i <= $adventure_camping_featured_post; $adventure_camping_i++ ) {
		$wp_customize->add_setting('adventure_camping_services_category'.$adventure_camping_i,array(
			'sanitize_callback' => 'adventure_camping_sanitize_choices',
		));
		$wp_customize->add_control('adventure_camping_services_category'.$adventure_camping_i,array(
			'type'    => 'select',
			'choices' => $adventure_camping_pst,
			'label' => __('Select Post','adventure-camping'),
			'section' => 'adventure_camping_camp_section',
		));

		$wp_customize->add_setting('adventure_camping_add_age'.$adventure_camping_i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('adventure_camping_add_age'.$adventure_camping_i,array(
			'label'	=> esc_html__( 'Add Age', 'adventure-camping' ),
			'section'	=> 'adventure_camping_camp_section',
			'type'		=> 'text',
			'input_attrs' => array(
		      'placeholder' => __( '6 Years', 'adventure-camping' ),
		    ),
		));

		$wp_customize->add_setting('adventure_camping_add_size'.$adventure_camping_i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('adventure_camping_add_size'.$adventure_camping_i,array(
			'label'	=> esc_html__( 'Add Size', 'adventure-camping' ),
			'section'	=> 'adventure_camping_camp_section',
			'type'		=> 'text',
			'input_attrs' => array(
		      'placeholder' => __( '20 Seats', 'adventure-camping' ),
		    ),
		));

		$wp_customize->add_setting('adventure_camping_add_price'.$adventure_camping_i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('adventure_camping_add_price'.$adventure_camping_i,array(
			'label'	=> esc_html__( 'Add Price', 'adventure-camping' ),
			'section'	=> 'adventure_camping_camp_section',
			'type'		=> 'text',
			'input_attrs' => array(
		      'placeholder' => __( '$20', 'adventure-camping' ),
		    ),
		));
	}

	//Online Class Section  
	$wp_customize->add_section('adventure_camping_online_class', array(
		'title'       => __('Online Class Section', 'adventure-camping'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','adventure-camping'),
		'priority'    => null,
		'panel'       => 'adventure_camping_panel_id',
	));

	$wp_customize->add_setting('adventure_camping_online_class_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_online_class_text',array(
		'description' => __('<p>1. More options for online class section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for online class section.</p>','adventure-camping'),
		'section'=> 'adventure_camping_online_class',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('adventure_camping_online_class_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_online_class_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(ADVENTURE_CAMPING_BUY_NOW).">More Info</a>",
		'section'=> 'adventure_camping_online_class',
		'type'=> 'hidden'
	));

	//School Activities Section  
	$wp_customize->add_section('adventure_camping_school_activities', array(
		'title'       => __('School Activities Section', 'adventure-camping'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','adventure-camping'),
		'priority'    => null,
		'panel'       => 'adventure_camping_panel_id',
	));

	$wp_customize->add_setting('adventure_camping_school_activities_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_school_activities_text',array(
		'description' => __('<p>1. More options for school activities section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for school activities section.</p>','adventure-camping'),
		'section'=> 'adventure_camping_school_activities',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('adventure_camping_school_activities_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_school_activities_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(ADVENTURE_CAMPING_BUY_NOW).">More Info</a>",
		'section'=> 'adventure_camping_school_activities',
		'type'=> 'hidden'
	));

	//Our Gallery Section  
	$wp_customize->add_section('adventure_camping_our_gallery', array(
		'title'       => __('Our Gallery Section', 'adventure-camping'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','adventure-camping'),
		'priority'    => null,
		'panel'       => 'adventure_camping_panel_id',
	));

	$wp_customize->add_setting('adventure_camping_our_gallery_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_our_gallery_text',array(
		'description' => __('<p>1. More options for our gallery section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our gallery section.</p>','adventure-camping'),
		'section'=> 'adventure_camping_our_gallery',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('adventure_camping_our_gallery_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_our_gallery_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(ADVENTURE_CAMPING_BUY_NOW).">More Info</a>",
		'section'=> 'adventure_camping_our_gallery',
		'type'=> 'hidden'
	));

	//Our Feature Section  
	$wp_customize->add_section('adventure_camping_our_feature', array(
		'title'       => __('Our Feature Section', 'adventure-camping'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','adventure-camping'),
		'priority'    => null,
		'panel'       => 'adventure_camping_panel_id',
	));

	$wp_customize->add_setting('adventure_camping_our_feature_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_our_feature_text',array(
		'description' => __('<p>1. More options for our feature section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our feature section.</p>','adventure-camping'),
		'section'=> 'adventure_camping_our_feature',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('adventure_camping_our_feature_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_our_feature_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(ADVENTURE_CAMPING_BUY_NOW).">More Info</a>",
		'section'=> 'adventure_camping_our_feature',
		'type'=> 'hidden'
	));

	//Our Staff Section  
	$wp_customize->add_section('adventure_camping_our_staff', array(
		'title'       => __('Our Staff Section', 'adventure-camping'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','adventure-camping'),
		'priority'    => null,
		'panel'       => 'adventure_camping_panel_id',
	));

	$wp_customize->add_setting('adventure_camping_our_staff_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_our_staff_text',array(
		'description' => __('<p>1. More options for our staff section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our staff section.</p>','adventure-camping'),
		'section'=> 'adventure_camping_our_staff',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('adventure_camping_our_staff_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_our_staff_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(ADVENTURE_CAMPING_BUY_NOW).">More Info</a>",
		'section'=> 'adventure_camping_our_staff',
		'type'=> 'hidden'
	));

	//Testimonial Section  
	$wp_customize->add_section('adventure_camping_testimonial', array(
		'title'       => __('Testimonial Section', 'adventure-camping'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','adventure-camping'),
		'priority'    => null,
		'panel'       => 'adventure_camping_panel_id',
	));

	$wp_customize->add_setting('adventure_camping_testimonial_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_testimonial_text',array(
		'description' => __('<p>1. More options for testimonial section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for testimonial section.</p>','adventure-camping'),
		'section'=> 'adventure_camping_testimonial',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('adventure_camping_testimonial_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_testimonial_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(ADVENTURE_CAMPING_BUY_NOW).">More Info</a>",
		'section'=> 'adventure_camping_testimonial',
		'type'=> 'hidden'
	));

	//Our Events Section  
	$wp_customize->add_section('adventure_camping_our_events', array(
		'title'       => __('Our Events Section', 'adventure-camping'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','adventure-camping'),
		'priority'    => null,
		'panel'       => 'adventure_camping_panel_id',
	));

	$wp_customize->add_setting('adventure_camping_our_events_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_our_events_text',array(
		'description' => __('<p>1. More options for our events section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our events section.</p>','adventure-camping'),
		'section'=> 'adventure_camping_our_events',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('adventure_camping_our_events_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_our_events_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(ADVENTURE_CAMPING_BUY_NOW).">More Info</a>",
		'section'=> 'adventure_camping_our_events',
		'type'=> 'hidden'
	));

	//Newsletters Section  
	$wp_customize->add_section('adventure_camping_newsletters', array(
		'title'       => __('Newsletters Section', 'adventure-camping'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','adventure-camping'),
		'priority'    => null,
		'panel'       => 'adventure_camping_panel_id',
	));

	$wp_customize->add_setting('adventure_camping_newsletters_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_newsletters_text',array(
		'description' => __('<p>1. More options for newsletters section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for newsletters section.</p>','adventure-camping'),
		'section'=> 'adventure_camping_newsletters',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('adventure_camping_newsletters_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_newsletters_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(ADVENTURE_CAMPING_BUY_NOW).">More Info</a>",
		'section'=> 'adventure_camping_newsletters',
		'type'=> 'hidden'
	));

	//Our Blog Section  
	$wp_customize->add_section('adventure_camping_our_blog', array(
		'title'       => __('Our Blog Section', 'adventure-camping'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','adventure-camping'),
		'priority'    => null,
		'panel'       => 'adventure_camping_panel_id',
	));

	$wp_customize->add_setting('adventure_camping_our_blog_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_our_blog_text',array(
		'description' => __('<p>1. More options for our blog section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our blog section.</p>','adventure-camping'),
		'section'=> 'adventure_camping_our_blog',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('adventure_camping_our_blog_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_our_blog_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(ADVENTURE_CAMPING_BUY_NOW).">More Info</a>",
		'section'=> 'adventure_camping_our_blog',
		'type'=> 'hidden'
	));

	//Sponsor Section  
	$wp_customize->add_section('adventure_camping_sponsor', array(
		'title'       => __('Sponsor Section', 'adventure-camping'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','adventure-camping'),
		'priority'    => null,
		'panel'       => 'adventure_camping_panel_id',
	));

	$wp_customize->add_setting('adventure_camping_sponsor_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_sponsor_text',array(
		'description' => __('<p>1. More options for sponsor section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for sponsor section.</p>','adventure-camping'),
		'section'=> 'adventure_camping_sponsor',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('adventure_camping_sponsor_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_sponsor_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(ADVENTURE_CAMPING_BUY_NOW).">More Info</a>",
		'section'=> 'adventure_camping_sponsor',
		'type'=> 'hidden'
	));


	//Footer Text
	$wp_customize->add_section('adventure_camping_footer',array(
		'title'	=> esc_html__('Footer Settings','adventure-camping'),
		'panel' => 'adventure_camping_panel_id',
		'description' => __('For more options of Footer section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/camping-wordpress-theme">GET PRO</a>','adventure-camping'),
	));

	$wp_customize->add_setting( 'adventure_camping_footer_hide_show',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'adventure_camping_switch_sanitization'
	));
	$wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_footer_hide_show',array(
	    'label' => esc_html__( 'Show / Hide Footer','adventure-camping' ),
	    'section' => 'adventure_camping_footer'
	)));

 	// font size
	$wp_customize->add_setting('adventure_camping_button_footer_font_size',array(
		'default'=> 25,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_button_footer_font_size',array(
		'label'	=> __('Footer Heading Font Size','adventure-camping'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'adventure_camping_footer',
	));

	$wp_customize->add_setting('adventure_camping_button_footer_heading_letter_spacing',array(
		'default'=> 1,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_button_footer_heading_letter_spacing',array(
		'label'	=> __('Heading Letter Spacing','adventure-camping'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
		'section'=> 'adventure_camping_footer',
	));

	// text trasform
	$wp_customize->add_setting('adventure_camping_button_footer_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'adventure_camping_sanitize_choices'
	));
	$wp_customize->add_control('adventure_camping_button_footer_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Heading Text Transform','adventure-camping'),
		'choices' => array(
			'Uppercase' => __('Uppercase','adventure-camping'),
			'Capitalize' => __('Capitalize','adventure-camping'),
			'Lowercase' => __('Lowercase','adventure-camping'),
		),
		'section'=> 'adventure_camping_footer',
	));

	$wp_customize->add_setting('adventure_camping_footer_heading_weight',array(
        'default' => '500',
        'transport' => 'refresh',
        'sanitize_callback' => 'adventure_camping_sanitize_choices'
	));
	$wp_customize->add_control('adventure_camping_footer_heading_weight',array(
        'type' => 'select',
        'label' => __('Heading Font Weight','adventure-camping'),
        'section' => 'adventure_camping_footer',
        'choices' => array(
        	'100' => __('100','adventure-camping'),
            '200' => __('200','adventure-camping'),
            '300' => __('300','adventure-camping'),
            '400' => __('400','adventure-camping'),
            '500' => __('500','adventure-camping'),
            '600' => __('600','adventure-camping'),
            '700' => __('700','adventure-camping'),
            '800' => __('800','adventure-camping'),
            '900' => __('900','adventure-camping'),
        ),
	) );

	$wp_customize->add_setting('adventure_camping_footer_template',array(
		'default'	=> esc_html('adventure_camping-footer-one'),
		'sanitize_callback'	=> 'adventure_camping_sanitize_choices'
	));
	$wp_customize->add_control('adventure_camping_footer_template',array(
		'label'	=> esc_html__('Footer style','adventure-camping'),
		'section'	=> 'adventure_camping_footer',
		'setting'	=> 'adventure_camping_footer_template',
		'type' => 'select',
		'choices' => array(
			'adventure_camping-footer-one' => esc_html__('Style 1', 'adventure-camping'),
			'adventure_camping-footer-two' => esc_html__('Style 2', 'adventure-camping'),
			'adventure_camping-footer-three' => esc_html__('Style 3', 'adventure-camping'),
			'adventure_camping-footer-four' => esc_html__('Style 4', 'adventure-camping'),
			'adventure_camping-footer-five' => esc_html__('Style 5', 'adventure-camping'),
		)
	));

	$wp_customize->add_setting('adventure_camping_footer_background_color', array(
		'default'           => '#798640',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'adventure_camping_footer_background_color', array(
		'label'    => __('Footer Background Color', 'adventure-camping'),
		'section'  => 'adventure_camping_footer',
	)));

	$wp_customize->add_setting('adventure_camping_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'adventure_camping_footer_background_image',array(
        'label' => __('Footer Background Image','adventure-camping'),
        'section' => 'adventure_camping_footer'
	)));

	$wp_customize->add_setting('adventure_camping_footer_img_position',array(
	  'default' => 'center center',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'adventure_camping_sanitize_choices'
	));
	$wp_customize->add_control('adventure_camping_footer_img_position',array(
		'type' => 'select',
		'label' => __('Footer Image Position','adventure-camping'),
		'section' => 'adventure_camping_footer',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'adventure-camping' ),
			'center top'   => esc_html__( 'Top', 'adventure-camping' ),
			'right top'   => esc_html__( 'Top Right', 'adventure-camping' ),
			'left center'   => esc_html__( 'Left', 'adventure-camping' ),
			'center center'   => esc_html__( 'Center', 'adventure-camping' ),
			'right center'   => esc_html__( 'Right', 'adventure-camping' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'adventure-camping' ),
			'center bottom'   => esc_html__( 'Bottom', 'adventure-camping' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'adventure-camping' ),
		),
	));

  // Footer
  $wp_customize->add_setting('adventure_camping_img_footer',array(
    'default'=> 'scroll',
    'sanitize_callback' => 'adventure_camping_sanitize_choices'
  ));
  $wp_customize->add_control('adventure_camping_img_footer',array(
    'type' => 'select',
    'label' => __('Footer Background Attatchment','adventure-camping'),
    'choices' => array(
      'fixed' => __('fixed','adventure-camping'),
      'scroll' => __('scroll','adventure-camping'),
    ),
    'section'=> 'adventure_camping_footer',
  ));

  // footer padding
  $wp_customize->add_setting('adventure_camping_footer_padding',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('adventure_camping_footer_padding',array(
    'label' => __('Footer Top Bottom Padding','adventure-camping'),
    'description' => __('Enter a value in pixels. Example:20px','adventure-camping'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'adventure-camping' ),
    ),
    'section'=> 'adventure_camping_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('adventure_camping_footer_widgets_heading',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'adventure_camping_sanitize_choices'
  ));
  $wp_customize->add_control('adventure_camping_footer_widgets_heading',array(
    'type' => 'select',
    'label' => __('Footer Widget Heading','adventure-camping'),
    'section' => 'adventure_camping_footer',
    'choices' => array(
      'Left' => __('Left','adventure-camping'),
      'Center' => __('Center','adventure-camping'),
      'Right' => __('Right','adventure-camping')
    ),
  ) );

  $wp_customize->add_setting('adventure_camping_footer_widgets_content',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'adventure_camping_sanitize_choices'
  ));
  $wp_customize->add_control('adventure_camping_footer_widgets_content',array(
    'type' => 'select',
    'label' => __('Footer Widget Content','adventure-camping'),
    'section' => 'adventure_camping_footer',
    'choices' => array(
      'Left' => __('Left','adventure-camping'),
      'Center' => __('Center','adventure-camping'),
      'Right' => __('Right','adventure-camping')
  	),
	) );
	
	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('adventure_camping_footer_text', array(
		'selector' => '.copyright p',
		'render_callback' => 'adventure_camping_Customize_partial_adventure_camping_footer_text',
	));

	$wp_customize->add_setting('adventure_camping_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_footer_text',array(
		'label'	=> esc_html__('Copyright Text','adventure-camping'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Copyright 2024, .....', 'adventure-camping' ),
      ),
		'section'=> 'adventure_camping_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'adventure_camping_copyright_hide_show',array(
	  'default' => 1,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'adventure_camping_switch_sanitization'
	));
	$wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_copyright_hide_show',array(
		'label' => esc_html__( 'Show / Hide Copyright','adventure-camping' ),
		'section' => 'adventure_camping_footer'
	)));

	$wp_customize->add_setting('adventure_camping_copyright_alingment',array(
	    'default' => 'center',
	    'sanitize_callback' => 'adventure_camping_sanitize_choices'
		));
		$wp_customize->add_control(new Adventure_Camping_Image_Radio_Control($wp_customize, 'adventure_camping_copyright_alingment', array(
	    'type' => 'select',
	    'label' => esc_html__('Copyright Alignment','adventure-camping'),
	    'section' => 'adventure_camping_footer',
	    'settings' => 'adventure_camping_copyright_alingment',
	    'choices' => array(
	        'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
	        'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
	        'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
	))));

	$wp_customize->add_setting('adventure_camping_copyright_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'adventure_camping_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'adventure-camping'),
		'section'  => 'adventure_camping_footer',
	)));

	$wp_customize->add_setting('adventure_camping_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_copyright_font_size',array(
		'label' => __('Copyright Font Size','adventure-camping'),
		'description' => __('Enter a value in pixels. Example:20px','adventure-camping'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'adventure-camping' ),
	    ),
		'section'=> 'adventure_camping_footer',
		'type'=> 'text'
	));

  $wp_customize->add_setting( 'adventure_camping_hide_show_scroll',array(
  	'default' => 1,
  	'transport' => 'refresh',
  	'sanitize_callback' => 'adventure_camping_switch_sanitization'
  ));
  $wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_hide_show_scroll',array(
  	'label' => esc_html__( 'Show / Hide Scroll to Top','adventure-camping' ),
  	'section' => 'adventure_camping_footer'
  )));

  //Selective Refresh
	$wp_customize->selective_refresh->add_partial('adventure_camping_scroll_to_top_icon', array(
		'selector' => '.scrollup i',
		'render_callback' => 'adventure_camping_Customize_partial_adventure_camping_scroll_to_top_icon',
	));

  $wp_customize->add_setting('adventure_camping_scroll_top_alignment',array(
    'default' => 'Right',
    'sanitize_callback' => 'adventure_camping_sanitize_choices'
	));
	$wp_customize->add_control(new Adventure_Camping_Image_Radio_Control($wp_customize, 'adventure_camping_scroll_top_alignment', array(
    'type' => 'select',
    'label' => esc_html__('Scroll To Top','adventure-camping'),
    'section' => 'adventure_camping_footer',
    'settings' => 'adventure_camping_scroll_top_alignment',
    'choices' => array(
        'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
        'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
        'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
  ))));

	$wp_customize->add_setting('adventure_camping_scroll_top_icon',array(
		'default' => 'fas fa-long-arrow-alt-up',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Camping_Fontawesome_Icon_Chooser($wp_customize,'adventure_camping_scroll_top_icon',array(
		'label' => __('Add Scroll to Top Icon','adventure-camping'),
		'transport' => 'refresh',
		'section' => 'adventure_camping_footer',
		'setting' => 'adventure_camping_scroll_top_icon',
		'type'    => 'icon'
	)));

  $wp_customize->add_setting('adventure_camping_scroll_to_top_font_size',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('adventure_camping_scroll_to_top_font_size',array(
    'label' => __('Icon Font Size','adventure-camping'),
    'description' => __('Enter a value in pixels. Example:20px','adventure-camping'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'adventure-camping' ),
    ),
    'section'=> 'adventure_camping_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('adventure_camping_scroll_to_top_padding',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('adventure_camping_scroll_to_top_padding',array(
    'label' => __('Icon Top Bottom Padding','adventure-camping'),
    'description' => __('Enter a value in pixels. Example:20px','adventure-camping'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'adventure-camping' ),
    ),
    'section'=> 'adventure_camping_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('adventure_camping_scroll_to_top_width',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('adventure_camping_scroll_to_top_width',array(
    'label' => __('Icon Width','adventure-camping'),
    'description' => __('Enter a value in pixels Example:20px','adventure-camping'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'adventure-camping' ),
  ),
	  'section'=> 'adventure_camping_footer',
	  'type'=> 'text'
  ));

  $wp_customize->add_setting('adventure_camping_scroll_to_top_height',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('adventure_camping_scroll_to_top_height',array(
    'label' => __('Icon Height','adventure-camping'),
    'description' => __('Enter a value in pixels. Example:20px','adventure-camping'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'adventure-camping' ),
    ),
    'section'=> 'adventure_camping_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting( 'adventure_camping_scroll_to_top_border_radius', array(
    'default'              => '',
    'transport'        => 'refresh',
    'sanitize_callback'    => 'adventure_camping_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'adventure_camping_scroll_to_top_border_radius', array(
    'label'       => esc_html__( 'Icon Border Radius','adventure-camping' ),
    'section'     => 'adventure_camping_footer',
    'type'        => 'range',
    'input_attrs' => array(
      'step'             => 1,
      'min'              => 1,
      'max'              => 50,
    ),
  ) );

 	//Blog Post
	$wp_customize->add_panel( 'adventure_camping_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'adventure-camping' ),
		'panel' => 'adventure_camping_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'adventure_camping_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'adventure-camping' ),
		'panel' => 'adventure_camping_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('adventure_camping_toggle_postdate', array(
		'selector' => '.post-main-box h2 a',
		'render_callback' => 'adventure_camping_Customize_partial_adventure_camping_toggle_postdate',
	));

	//Blog layout
  $wp_customize->add_setting('adventure_camping_blog_layout_option',array(
    'default' => 'Left',
    'sanitize_callback' => 'adventure_camping_sanitize_choices'
  ));
  $wp_customize->add_control(new Adventure_Camping_Image_Radio_Control($wp_customize, 'adventure_camping_blog_layout_option', array(
    'type' => 'select',
    'label' => __('Blog Post Layouts','adventure-camping'),
    'section' => 'adventure_camping_post_settings',
    'choices' => array(
      'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
      'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
      'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
  ))));

	$wp_customize->add_setting('adventure_camping_theme_options',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'adventure_camping_sanitize_choices'
	));
	$wp_customize->add_control('adventure_camping_theme_options',array(
    'type' => 'select',
    'label' => esc_html__('Post Sidebar Layout','adventure-camping'),
    'description' => esc_html__('Here you can change the sidebar layout for posts. ','adventure-camping'),
    'section' => 'adventure_camping_post_settings',
    'choices' => array(
        'Left Sidebar' => esc_html__('Left Sidebar','adventure-camping'),
        'Right Sidebar' => esc_html__('Right Sidebar','adventure-camping'),
        'One Column' => esc_html__('One Column','adventure-camping'),
        'Three Columns' => esc_html__('Three Columns','adventure-camping'),
        'Four Columns' => esc_html__('Four Columns','adventure-camping'),
        'Grid Layout' => esc_html__('Grid Layout','adventure-camping')
    ),
	) );


	$wp_customize->add_setting('adventure_camping_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Camping_Fontawesome_Icon_Chooser(
  $wp_customize,'adventure_camping_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','adventure-camping'),
		'transport' => 'refresh',
		'section'	=> 'adventure_camping_post_settings',
		'setting'	=> 'adventure_camping_toggle_postdate_icon',
		'type'		=> 'icon'
	)));

 	$wp_customize->add_setting( 'adventure_camping_blog_toggle_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'adventure_camping_switch_sanitization'
  ));
  $wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_blog_toggle_postdate',array(
    'label' => esc_html__( 'Show / Hide Post Date','adventure-camping' ),
    'section' => 'adventure_camping_post_settings'
  )));

	$wp_customize->add_setting('adventure_camping_toggle_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Camping_Fontawesome_Icon_Chooser(
  $wp_customize,'adventure_camping_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','adventure-camping'),
		'transport' => 'refresh',
		'section'	=> 'adventure_camping_post_settings',
		'setting'	=> 'adventure_camping_toggle_author_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'adventure_camping_blog_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'adventure_camping_switch_sanitization'
  ));
  $wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_blog_toggle_author',array(
		'label' => esc_html__( 'Show / Hide Author','adventure-camping' ),
		'section' => 'adventure_camping_post_settings'
  )));

  $wp_customize->add_setting('adventure_camping_toggle_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Camping_Fontawesome_Icon_Chooser(
  $wp_customize,'adventure_camping_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','adventure-camping'),
		'transport' => 'refresh',
		'section'	=> 'adventure_camping_post_settings',
		'setting'	=> 'adventure_camping_toggle_comments_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'adventure_camping_blog_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'adventure_camping_switch_sanitization'
  ) );
  $wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_blog_toggle_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','adventure-camping' ),
		'section' => 'adventure_camping_post_settings'
  )));

  $wp_customize->add_setting('adventure_camping_toggle_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Camping_Fontawesome_Icon_Chooser(
  $wp_customize,'adventure_camping_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','adventure-camping'),
		'transport' => 'refresh',
		'section'	=> 'adventure_camping_post_settings',
		'setting'	=> 'adventure_camping_toggle_time_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'adventure_camping_blog_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'adventure_camping_switch_sanitization'
  ) );
  $wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_blog_toggle_time',array(
		'label' => esc_html__( 'Show / Hide Time','adventure-camping' ),
		'section' => 'adventure_camping_post_settings'
  )));

  $wp_customize->add_setting( 'adventure_camping_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'adventure_camping_switch_sanitization'
	));
  $wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_featured_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','adventure-camping' ),
		'section' => 'adventure_camping_post_settings'
  )));

  $wp_customize->add_setting( 'adventure_camping_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'adventure_camping_sanitize_number_range'
	) );
	$wp_customize->add_control( 'adventure_camping_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','adventure-camping' ),
		'section'     => 'adventure_camping_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'adventure_camping_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'adventure_camping_sanitize_number_range'
	) );
	$wp_customize->add_control( 'adventure_camping_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','adventure-camping' ),
		'section'     => 'adventure_camping_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Featured Image
	$wp_customize->add_setting('adventure_camping_blog_post_featured_image_dimension',array(
   'default' => 'default',
   'sanitize_callback'	=> 'adventure_camping_sanitize_choices'
	));
	$wp_customize->add_control('adventure_camping_blog_post_featured_image_dimension',array(
		'type' => 'select',
		'label'	=> __('Blog Post Featured Image Dimension','adventure-camping'),
		'section'	=> 'adventure_camping_post_settings',
		'choices' => array(
		'default' => __('Default','adventure-camping'),
		'custom' => __('Custom Image Size','adventure-camping'),
      ),
	));

	$wp_customize->add_setting('adventure_camping_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
	$wp_customize->add_control('adventure_camping_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','adventure-camping'),
		'description'	=> __('Enter a value in pixels. Example:20px','adventure-camping'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'adventure-camping' ),),
		'section'=> 'adventure_camping_post_settings',
		'type'=> 'text',
		'active_callback' => 'adventure_camping_blog_post_featured_image_dimension'
		));

	$wp_customize->add_setting('adventure_camping_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','adventure-camping'),
		'description'	=> __('Enter a value in pixels. Example:20px','adventure-camping'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'adventure-camping' ),),
		'section'=> 'adventure_camping_post_settings',
		'type'=> 'text',
		'active_callback' => 'adventure_camping_blog_post_featured_image_dimension'
	));

  $wp_customize->add_setting( 'adventure_camping_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'adventure_camping_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'adventure_camping_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','adventure-camping' ),
		'section'     => 'adventure_camping_post_settings',
		'type'        => 'range',
		'settings'    => 'adventure_camping_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('adventure_camping_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','adventure-camping'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','adventure-camping'),
		'section'=> 'adventure_camping_post_settings',
		'type'=> 'text'
	));

  $wp_customize->add_setting('adventure_camping_excerpt_settings',array(
    'default' => 'Excerpt',
    'transport' => 'refresh',
    'sanitize_callback' => 'adventure_camping_sanitize_choices'
	));
	$wp_customize->add_control('adventure_camping_excerpt_settings',array(
    'type' => 'select',
    'label' => esc_html__('Post Content','adventure-camping'),
    'section' => 'adventure_camping_post_settings',
    'choices' => array(
    	'Content' => esc_html__('Content','adventure-camping'),
        'Excerpt' => esc_html__('Excerpt','adventure-camping'),
        'No Content' => esc_html__('No Content','adventure-camping')
        ),
	) );

  $wp_customize->add_setting('adventure_camping_blog_page_posts_settings',array(
    'default' => 'Into Blocks',
    'transport' => 'refresh',
    'sanitize_callback' => 'adventure_camping_sanitize_choices'
	));
	$wp_customize->add_control('adventure_camping_blog_page_posts_settings',array(
    'type' => 'select',
    'label' => __('Display Blog Posts','adventure-camping'),
    'section' => 'adventure_camping_post_settings',
    'choices' => array(
    	'Into Blocks' => __('Into Blocks','adventure-camping'),
        'Without Blocks' => __('Without Blocks','adventure-camping')
        ),
	) );

	$wp_customize->add_setting( 'adventure_camping_blog_pagination_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'adventure_camping_switch_sanitization'
  ));
  $wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_blog_pagination_hide_show',array(
		'label' => esc_html__( 'Show / Hide Blog Pagination','adventure-camping' ),
		'section' => 'adventure_camping_post_settings'
  )));

	$wp_customize->add_setting('adventure_camping_blog_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_blog_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','adventure-camping'),
		'input_attrs' => array(
      'placeholder' => __( '[...]', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'adventure_camping_blog_pagination_type', array(
    'default'			=> 'blog-page-numbers',
    'sanitize_callback'	=> 'adventure_camping_sanitize_choices'
  ));
  $wp_customize->add_control( 'adventure_camping_blog_pagination_type', array(
    'section' => 'adventure_camping_post_settings',
    'type' => 'select',
    'label' => __( 'Blog Pagination', 'adventure-camping' ),
    'choices'		=> array(
      'blog-page-numbers'  => __( 'Numeric', 'adventure-camping' ),
      'next-prev' => __( 'Older Posts/Newer Posts', 'adventure-camping' ),
  )));

  // Button Settings
	$wp_customize->add_section( 'adventure_camping_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'adventure-camping' ),
		'panel' => 'adventure_camping_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('adventure_camping_button_text', array(
		'selector' => '.post-main-box .more-btn a',
		'render_callback' => 'adventure_camping_Customize_partial_adventure_camping_button_text',
	));

  $wp_customize->add_setting('adventure_camping_button_text',array(
		'default'=> esc_html__('Read More','adventure-camping'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_button_text',array(
		'label'	=> esc_html__('Add Button Text','adventure-camping'),
		'input_attrs' => array(
    'placeholder' => esc_html__( 'Read More', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_button_settings',
		'type'=> 'text'
	));

	// font size button
	$wp_customize->add_setting('adventure_camping_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_button_font_size',array(
		'label'	=> __('Button Font Size','adventure-camping'),
		'description'	=> __('Enter a value in pixels. Example:20px','adventure-camping'),
		'input_attrs' => array(
  		'placeholder' => __( '10px', 'adventure-camping' ),
    ),
  	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'adventure_camping_button_settings',
	));


	$wp_customize->add_setting( 'adventure_camping_button_border_radius', array(
		'default'              => 5,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'adventure_camping_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'adventure_camping_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','adventure-camping' ),
		'section'     => 'adventure_camping_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	// button padding
	$wp_customize->add_setting('adventure_camping_button_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_button_top_bottom_padding',array(
		'label'	=> __('Button Top Bottom Padding','adventure-camping'),
		'description'	=> __('Enter a value in pixels. Example:20px','adventure-camping'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'adventure-camping' ),
    ),
		'section'=> 'adventure_camping_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_camping_button_left_right_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_button_left_right_padding',array(
		'label'	=> __('Button Left Right Padding','adventure-camping'),
		'description'	=> __('Enter a value in pixels. Example:20px','adventure-camping'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'adventure-camping' ),
    ),
		'section'=> 'adventure_camping_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_camping_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','adventure-camping'),
		'description'	=> __('Enter a value in pixels. Example:20px','adventure-camping'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'adventure-camping' ),
  ),
  	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
		'section'=> 'adventure_camping_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('adventure_camping_button_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'adventure_camping_sanitize_choices'
	));
	$wp_customize->add_control('adventure_camping_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','adventure-camping'),
		'choices' => array(
      'Uppercase' => __('Uppercase','adventure-camping'),
      'Capitalize' => __('Capitalize','adventure-camping'),
      'Lowercase' => __('Lowercase','adventure-camping'),
    ),
		'section'=> 'adventure_camping_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'adventure_camping_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'adventure-camping' ),
		'panel' => 'adventure_camping_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('adventure_camping_related_post_title', array(
		'selector' => '.related-post h3',
		'render_callback' => 'adventure_camping_Customize_partial_adventure_camping_related_post_title',
	));

  $wp_customize->add_setting( 'adventure_camping_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'adventure_camping_switch_sanitization'
  ) );
  $wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_related_post',array(
		'label' => esc_html__( 'Related Post','adventure-camping' ),
		'section' => 'adventure_camping_related_posts_settings'
  )));

  $wp_customize->add_setting('adventure_camping_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','adventure-camping'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Related Post', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_related_posts_settings',
		'type'=> 'text'
	));

 	$wp_customize->add_setting('adventure_camping_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'adventure_camping_sanitize_number_absint'
	));
	$wp_customize->add_control('adventure_camping_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','adventure-camping'),
		'input_attrs' => array(
      'placeholder' => esc_html__( '3', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'adventure_camping_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'adventure_camping_sanitize_number_range'
	) );
	$wp_customize->add_control( 'adventure_camping_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','adventure-camping' ),
		'section'     => 'adventure_camping_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'adventure_camping_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'adventure_camping_related_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'adventure_camping_switch_sanitization'
	));
  $wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_related_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','adventure-camping' ),
		'section' => 'adventure_camping_related_posts_settings'
  )));

  $wp_customize->add_setting( 'adventure_camping_related_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'adventure_camping_sanitize_number_range'
	) );
	$wp_customize->add_control( 'adventure_camping_related_image_box_shadow', array(
		'label'       => esc_html__( 'Related post Image Box Shadow','adventure-camping' ),
		'section'     => 'adventure_camping_related_posts_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

  $wp_customize->add_setting('adventure_camping_related_button_text',array(
		'default'=> esc_html__('Read More','adventure-camping'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_related_button_text',array(
		'label'	=> esc_html__('Add Button Text','adventure-camping'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Read More', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_related_posts_settings',
		'type'=> 'text'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'adventure_camping_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'adventure-camping' ),
		'panel' => 'adventure_camping_blog_post_parent_panel',
	));

	$wp_customize->add_setting('adventure_camping_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Camping_Fontawesome_Icon_Chooser(
  $wp_customize,'adventure_camping_single_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','adventure-camping'),
		'transport' => 'refresh',
		'section'	=> 'adventure_camping_single_blog_settings',
		'setting'	=> 'adventure_camping_single_postdate_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'adventure_camping_single_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'adventure_camping_switch_sanitization'
	) );
	$wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_single_postdate',array(
		'label' => esc_html__( 'Show / Hide Date','adventure-camping' ),
		'section' => 'adventure_camping_single_blog_settings'
	)));

	$wp_customize->add_setting('adventure_camping_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Camping_Fontawesome_Icon_Chooser(
  $wp_customize,'adventure_camping_single_author_icon',array(
		'label'	=> __('Add Author Icon','adventure-camping'),
		'transport' => 'refresh',
		'section'	=> 'adventure_camping_single_blog_settings',
		'setting'	=> 'adventure_camping_single_author_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'adventure_camping_single_author',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'adventure_camping_switch_sanitization'
	) );
	$wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_single_author',array(
    'label' => esc_html__( 'Show / Hide Author','adventure-camping' ),
    'section' => 'adventure_camping_single_blog_settings'
	)));

 	$wp_customize->add_setting('adventure_camping_single_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Camping_Fontawesome_Icon_Chooser(
  $wp_customize,'adventure_camping_single_comments_icon',array(
		'label'	=> __('Add Comments Icon','adventure-camping'),
		'transport' => 'refresh',
		'section'	=> 'adventure_camping_single_blog_settings',
		'setting'	=> 'adventure_camping_single_comments_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'adventure_camping_single_comments',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'adventure_camping_switch_sanitization'
	) );
	$wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_single_comments',array(
    'label' => esc_html__( 'Show / Hide Comments','adventure-camping' ),
    'section' => 'adventure_camping_single_blog_settings'
	)));

	$wp_customize->add_setting('adventure_camping_single_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Camping_Fontawesome_Icon_Chooser(
  $wp_customize,'adventure_camping_single_time_icon',array(
		'label'	=> __('Add Time Icon','adventure-camping'),
		'transport' => 'refresh',
		'section'	=> 'adventure_camping_single_blog_settings',
		'setting'	=> 'adventure_camping_single_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'adventure_camping_single_time',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'adventure_camping_switch_sanitization'
	) );
	$wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_single_time',array(
    'label' => esc_html__( 'Show / Hide Time','adventure-camping' ),
    'section' => 'adventure_camping_single_blog_settings'
	)));

	$wp_customize->add_setting( 'adventure_camping_toggle_tags',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'adventure_camping_switch_sanitization'
	));
  $wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_toggle_tags', array(
		'label' => esc_html__( 'Show / Hide Tags','adventure-camping' ),
		'section' => 'adventure_camping_single_blog_settings'
  )));

	$wp_customize->add_setting( 'adventure_camping_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'adventure_camping_switch_sanitization'
  ) );
 	$wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','adventure-camping' ),
		'section' => 'adventure_camping_single_blog_settings'
  )));

	// Single Posts Category
 	 $wp_customize->add_setting( 'adventure_camping_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'adventure_camping_switch_sanitization'
  	) );
	$wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_single_post_category',array(
		'label' => esc_html__( 'Show / Hide Category','adventure-camping' ),
		'section' => 'adventure_camping_single_blog_settings'
  	)));

  	$wp_customize->add_setting( 'adventure_camping_singlepost_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'adventure_camping_sanitize_number_range'
	) );
	$wp_customize->add_control( 'adventure_camping_singlepost_image_box_shadow', array(
		'label'       => esc_html__( 'Single post Image Box Shadow','adventure-camping' ),
		'section'     => 'adventure_camping_single_blog_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('adventure_camping_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','adventure-camping'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','adventure-camping'),
		'section'=> 'adventure_camping_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'adventure_camping_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'adventure_camping_switch_sanitization'
	));
	$wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_single_blog_post_navigation_show_hide', array(
	  'label' => esc_html__( 'Show / Hide Post Navigation','adventure-camping' ),
	  'section' => 'adventure_camping_single_blog_settings'
	)));

	$wp_customize->add_setting( 'adventure_camping_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'adventure_camping_switch_sanitization'
    ) );
 	$wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','adventure-camping' ),
		'section' => 'adventure_camping_single_blog_settings'
  )));

	//navigation text
	$wp_customize->add_setting('adventure_camping_single_blog_prev_navigation_text',array(
		'default'=> 'PREVIOUS',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','adventure-camping'),
		'input_attrs' => array(
      'placeholder' => __( 'PREVIOUS', 'adventure-camping' ),
      ),
		'section'=> 'adventure_camping_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_camping_single_blog_next_navigation_text',array(
		'default'=> 'NEXT',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','adventure-camping'),
		'input_attrs' => array(
      'placeholder' => __( 'NEXT', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_camping_single_blog_comment_title',array(
		'default'=> 'Leave a Reply',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('adventure_camping_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','adventure-camping'),
		'input_attrs' => array(
      'placeholder' => __( 'Leave a Reply', 'adventure-camping' ),
    	),
		'section'=> 'adventure_camping_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_camping_single_blog_comment_button_text',array(
		'default'=> 'Post Comment',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('adventure_camping_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','adventure-camping'),
		'input_attrs' => array(
    'placeholder' => __( 'Post Comment', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_camping_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','adventure-camping'),
		'description'	=> __('Enter a value in %. Example:50%','adventure-camping'),
		'input_attrs' => array(
      'placeholder' => __( '100%', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_single_blog_settings',
		'type'=> 'text'
	));

	 // Grid layout setting
	$wp_customize->add_section( 'adventure_camping_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'adventure-camping' ),
		'panel' => 'adventure_camping_blog_post_parent_panel',
	));

	$wp_customize->add_setting('adventure_camping_grid_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Camping_Fontawesome_Icon_Chooser(
        $wp_customize,'adventure_camping_grid_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','adventure-camping'),
		'transport' => 'refresh',
		'section'	=> 'adventure_camping_grid_layout_settings',
		'setting'	=> 'adventure_camping_grid_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'adventure_camping_grid_postdate',array(
	  'default' => 1,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'adventure_camping_switch_sanitization'
  ) );
  $wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_grid_postdate',array(
    'label' => esc_html__( 'Show / Hide Post Date','adventure-camping' ),
    'section' => 'adventure_camping_grid_layout_settings'
  )));

	$wp_customize->add_setting('adventure_camping_grid_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Camping_Fontawesome_Icon_Chooser(
        $wp_customize,'adventure_camping_grid_author_icon',array(
		'label'	=> __('Add Author Icon','adventure-camping'),
		'transport' => 'refresh',
		'section'	=> 'adventure_camping_grid_layout_settings',
		'setting'	=> 'adventure_camping_grid_author_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'adventure_camping_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'adventure_camping_switch_sanitization'
  ) );
  $wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_grid_author',array(
		'label' => esc_html__( 'Show / Hide Author','adventure-camping' ),
		'section' => 'adventure_camping_grid_layout_settings'
  )));

  $wp_customize->add_setting('adventure_camping_grid_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Camping_Fontawesome_Icon_Chooser(
        $wp_customize,'adventure_camping_grid_comments_icon',array(
		'label'	=> __('Add Comments Icon','adventure-camping'),
		'transport' => 'refresh',
		'section'	=> 'adventure_camping_grid_layout_settings',
		'setting'	=> 'adventure_camping_grid_comments_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'adventure_camping_grid_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'adventure_camping_switch_sanitization'
  ) );
  $wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_grid_time',array(
		'label' => esc_html__( 'Show / Hide Time','adventure-camping' ),
		'section' => 'adventure_camping_grid_layout_settings'
  )));

  $wp_customize->add_setting('adventure_camping_grid_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Camping_Fontawesome_Icon_Chooser(
        $wp_customize,'adventure_camping_grid_time_icon',array(
		'label'	=> __('Add Time Icon','adventure-camping'),
		'transport' => 'refresh',
		'section'	=> 'adventure_camping_grid_layout_settings',
		'setting'	=> 'adventure_camping_grid_time_icon',
		'type'		=> 'icon'
	)));

  	$wp_customize->add_setting( 'adventure_camping_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'adventure_camping_switch_sanitization'
  	) );
  	$wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_grid_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','adventure-camping' ),
		'section' => 'adventure_camping_grid_layout_settings'
  	)));

  	$wp_customize->add_setting( 'adventure_camping_grid_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'adventure_camping_switch_sanitization'
	));
  	$wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_grid_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','adventure-camping' ),
		'section' => 'adventure_camping_grid_layout_settings'
  	)));

 	$wp_customize->add_setting('adventure_camping_grid_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_grid_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','adventure-camping'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','adventure-camping'),
		'section'=> 'adventure_camping_grid_layout_settings',
		'type'=> 'text'
	));

  $wp_customize->add_setting('adventure_camping_display_grid_posts_settings',array(
    'default' => 'Into Blocks',
    'transport' => 'refresh',
    'sanitize_callback' => 'adventure_camping_sanitize_choices'
	));
	$wp_customize->add_control('adventure_camping_display_grid_posts_settings',array(
    'type' => 'select',
    'label' => __('Display Grid Posts','adventure-camping'),
    'section' => 'adventure_camping_grid_layout_settings',
    'choices' => array(
    	'Into Blocks' => __('Into Blocks','adventure-camping'),
      'Without Blocks' => __('Without Blocks','adventure-camping')
      ),
	) );

	$wp_customize->add_setting('adventure_camping_grid_button_text',array(
		'default'=> esc_html__('Read More','adventure-camping'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_grid_button_text',array(
		'label'	=> esc_html__('Add Button Text','adventure-camping'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Read More', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_grid_layout_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_camping_grid_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_grid_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','adventure-camping'),
		'input_attrs' => array(
        'placeholder' => __( '[...]', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_grid_layout_settings',
		'type'=> 'text'
	));

  $wp_customize->add_setting('adventure_camping_grid_excerpt_settings',array(
    'default' => 'Excerpt',
    'transport' => 'refresh',
    'sanitize_callback' => 'adventure_camping_sanitize_choices'
	));
	$wp_customize->add_control('adventure_camping_grid_excerpt_settings',array(
    'type' => 'select',
    'label' => esc_html__('Grid Post Content','adventure-camping'),
    'section' => 'adventure_camping_grid_layout_settings',
    'choices' => array(
    	'Content' => esc_html__('Content','adventure-camping'),
      'Excerpt' => esc_html__('Excerpt','adventure-camping'),
      'No Content' => esc_html__('No Content','adventure-camping')
    ),
	) );

  $wp_customize->add_setting( 'adventure_camping_grid_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'adventure_camping_sanitize_number_range'
	) );
	$wp_customize->add_control( 'adventure_camping_grid_featured_image_border_radius', array(
		'label'       => esc_html__( 'Grid Featured Image Border Radius','adventure-camping' ),
		'section'     => 'adventure_camping_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'adventure_camping_grid_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'adventure_camping_sanitize_number_range'
	) );
	$wp_customize->add_control( 'adventure_camping_grid_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Grid Featured Image Box Shadow','adventure-camping' ),
		'section'     => 'adventure_camping_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Other
	$wp_customize->add_panel( 'adventure_camping_other_parent_panel', array(
		'title' => esc_html__( 'Other Settings', 'adventure-camping' ),
		'panel' => 'adventure_camping_panel_id',
		'priority' => 20,
	));

	// Layout
	$wp_customize->add_section( 'adventure_camping_left_right', array(
  	'title' => esc_html__('General Settings', 'adventure-camping'),
		'panel' => 'adventure_camping_other_parent_panel'
	) );

	$wp_customize->add_setting('adventure_camping_width_option',array(
    'default' => 'Full Width',
    'sanitize_callback' => 'adventure_camping_sanitize_choices'
	));
	$wp_customize->add_control(new Adventure_Camping_Image_Radio_Control($wp_customize, 'adventure_camping_width_option', array(
    'type' => 'select',
    'label' => esc_html__('Width Layouts','adventure-camping'),
    'description' => esc_html__('Here you can change the width layout of Website.','adventure-camping'),
    'section' => 'adventure_camping_left_right',
    'choices' => array(
        'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
        'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
        'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
  ))));

	$wp_customize->add_setting('adventure_camping_page_layout',array(
    'default' => 'One_Column',
    'sanitize_callback' => 'adventure_camping_sanitize_choices'
	));
	$wp_customize->add_control('adventure_camping_page_layout',array(
    'type' => 'select',
    'label' => esc_html__('Page Sidebar Layout','adventure-camping'),
    'description' => esc_html__('Here you can change the sidebar layout for pages. ','adventure-camping'),
    'section' => 'adventure_camping_left_right',
    'choices' => array(
        'Left_Sidebar' => esc_html__('Left Sidebar','adventure-camping'),
        'Right_Sidebar' => esc_html__('Right Sidebar','adventure-camping'),
        'One_Column' => esc_html__('One Column','adventure-camping')
    ),
	) );
	
    // Pre-Loader
	$wp_customize->add_setting( 'adventure_camping_loader_enable',array(
    'default' => 0,
    'transport' => 'refresh',
    'sanitize_callback' => 'adventure_camping_switch_sanitization'
  ) );
  $wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_loader_enable',array(
    'label' => esc_html__( 'Pre-Loader','adventure-camping' ),
    'section' => 'adventure_camping_left_right'
  )));

	$wp_customize->add_setting('adventure_camping_preloader_bg_color', array(
		'default'           => '#798640',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'adventure_camping_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'adventure-camping'),
		'section'  => 'adventure_camping_left_right',
	)));

	$wp_customize->add_setting('adventure_camping_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'adventure_camping_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'adventure-camping'),
		'section'  => 'adventure_camping_left_right',
	)));

	$wp_customize->add_setting('adventure_camping_preloader_bg_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'adventure_camping_preloader_bg_img',array(
    'label' => __('Preloader Background Image','adventure-camping'),
    'section' => 'adventure_camping_left_right'
	)));

	$wp_customize->add_setting( 'adventure_camping_single_page_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'adventure_camping_switch_sanitization'
    ) );
    $wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_single_page_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Page Breadcrumb','adventure-camping' ),
		'section' => 'adventure_camping_left_right'
    )));

   $wp_customize->add_setting('adventure_camping_bradcrumbs_alignment',array(
        'default' => 'Left',
        'sanitize_callback' => 'adventure_camping_sanitize_choices'
	));
	$wp_customize->add_control('adventure_camping_bradcrumbs_alignment',array(
        'type' => 'select',
        'label' => __('Bradcrumbs Alignment','adventure-camping'),
        'section' => 'adventure_camping_left_right',
        'choices' => array(
            'Left' => __('Left','adventure-camping'),
            'Right' => __('Right','adventure-camping'),
            'Center' => __('Center','adventure-camping'),
        ),
	) );

    //404 Page Setting
	$wp_customize->add_section('adventure_camping_404_page',array(
		'title'	=> __('404 Page Settings','adventure-camping'),
		'panel' => 'adventure_camping_other_parent_panel',
	));

	$wp_customize->add_setting('adventure_camping_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('adventure_camping_404_page_title',array(
		'label'	=> __('Add Title','adventure-camping'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_camping_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('adventure_camping_404_page_content',array(
		'label'	=> __('Add Text','adventure-camping'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_camping_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_404_page_button_text',array(
		'label'	=> __('Add Button Text','adventure-camping'),
		'input_attrs' => array(
            'placeholder' => __( 'Go Back', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_404_page',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('adventure_camping_no_results_page',array(
		'title'	=> __('No Results Page Settings','adventure-camping'),
		'panel' => 'adventure_camping_other_parent_panel',
	));

	$wp_customize->add_setting('adventure_camping_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('adventure_camping_no_results_page_title',array(
		'label'	=> __('Add Title','adventure-camping'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_camping_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('adventure_camping_no_results_page_content',array(
		'label'	=> __('Add Text','adventure-camping'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('adventure_camping_social_icon_settings',array(
		'title'	=> __('Sidebar Social Icons Settings','adventure-camping'),
		'panel' => 'adventure_camping_other_parent_panel',
	));

	$wp_customize->add_setting('adventure_camping_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','adventure-camping'),
		'description'	=> __('Enter a value in pixels. Example:20px','adventure-camping'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_camping_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_social_icon_padding',array(
		'label'	=> __('Icon Padding','adventure-camping'),
		'description'	=> __('Enter a value in pixels. Example:20px','adventure-camping'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_camping_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_social_icon_width',array(
		'label'	=> __('Icon Width','adventure-camping'),
		'description'	=> __('Enter a value in pixels. Example:20px','adventure-camping'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_camping_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_social_icon_height',array(
		'label'	=> __('Icon Height','adventure-camping'),
		'description'	=> __('Enter a value in pixels. Example:20px','adventure-camping'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_social_icon_settings',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('adventure_camping_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','adventure-camping'),
		'panel' => 'adventure_camping_other_parent_panel',
	));

  $wp_customize->add_setting( 'adventure_camping_responsive_preloader_hide',array(
      'default' => false,
      'transport' => 'refresh',
      'sanitize_callback' => 'adventure_camping_switch_sanitization'
  ) );
  $wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_responsive_preloader_hide',array(
      'label' => esc_html__( 'Show / Hide Preloader','adventure-camping' ),
      'section' => 'adventure_camping_responsive_media'
  )));


  $wp_customize->add_setting( 'adventure_camping_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'adventure_camping_switch_sanitization'
  ));
  $wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_sidebar_hide_show',array(
    	'label' => esc_html__( 'Show / Hide Sidebar','adventure-camping' ),
    	'section' => 'adventure_camping_responsive_media'
  )));

  $wp_customize->add_setting( 'adventure_camping_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'adventure_camping_switch_sanitization'
	));
	$wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_resp_scroll_top_hide_show',array(
    	'label' => esc_html__( 'Show / Hide Scroll To Top','adventure-camping' ),
    	'section' => 'adventure_camping_responsive_media'
	)));

  $wp_customize->add_setting('adventure_camping_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Camping_Fontawesome_Icon_Chooser(
        $wp_customize,'adventure_camping_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','adventure-camping'),
		'transport' => 'refresh',
		'section'	=> 'adventure_camping_responsive_media',
		'setting'	=> 'adventure_camping_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('adventure_camping_res_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Camping_Fontawesome_Icon_Chooser(
        $wp_customize,'adventure_camping_res_close_menu_icon',array(
		'label'	=> __('Add Close Menu Icon','adventure-camping'),
		'transport' => 'refresh',
		'section'	=> 'adventure_camping_responsive_media',
		'setting'	=> 'adventure_camping_res_close_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('adventure_camping_resp_menu_toggle_btn_bg_color', array(
		'default'           => '#798640',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'adventure_camping_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'adventure-camping'),
		'section'  => 'adventure_camping_responsive_media',
	)));

  //Woocommerce settings
	$wp_customize->add_section('adventure_camping_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'adventure-camping'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'adventure_camping_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar',
		'render_callback' => 'adventure_camping_customize_partial_adventure_camping_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'adventure_camping_woocommerce_shop_page_sidebar',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'adventure_camping_switch_sanitization'
  ) );
  $wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Shop Page Sidebar','adventure-camping' ),
		'section' => 'adventure_camping_woocommerce_section'
  )));

   $wp_customize->add_setting('adventure_camping_shop_page_layout',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'adventure_camping_sanitize_choices'
	));
	$wp_customize->add_control('adventure_camping_shop_page_layout',array(
    'type' => 'select',
    'label' => __('Shop Page Sidebar Layout','adventure-camping'),
    'section' => 'adventure_camping_woocommerce_section',
    'choices' => array(
        'Left Sidebar' => __('Left Sidebar','adventure-camping'),
        'Right Sidebar' => __('Right Sidebar','adventure-camping'),
    ),
	) );

   //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'adventure_camping_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar',
		'render_callback' => 'adventure_camping_customize_partial_adventure_camping_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'adventure_camping_woocommerce_single_product_page_sidebar',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'adventure_camping_switch_sanitization'
   ) );
 	$wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Single Product Sidebar','adventure-camping' ),
		'section' => 'adventure_camping_woocommerce_section'
  )));

   $wp_customize->add_setting('adventure_camping_single_product_layout',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'adventure_camping_sanitize_choices'
	));
	$wp_customize->add_control('adventure_camping_single_product_layout',array(
    'type' => 'select',
    'label' => __('Single Product Sidebar Layout','adventure-camping'),
    'section' => 'adventure_camping_woocommerce_section',
    'choices' => array(
        'Left Sidebar' => __('Left Sidebar','adventure-camping'),
        'Right Sidebar' => __('Right Sidebar','adventure-camping'),
    ),
	) );

	//Products per page
    $wp_customize->add_setting('adventure_camping_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'adventure_camping_sanitize_float'
	));
	$wp_customize->add_control('adventure_camping_products_per_page',array(
		'label'	=> __('Products Per Page','adventure-camping'),
		'description' => __('Display on shop page','adventure-camping'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'adventure_camping_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('adventure_camping_products_per_row',array(
		'default'=> '4',
		'sanitize_callback'	=> 'adventure_camping_sanitize_choices'
	));
	$wp_customize->add_control('adventure_camping_products_per_row',array(
		'label'	=> __('Products Per Row','adventure-camping'),
		'description' => __('Display on shop page','adventure-camping'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'adventure_camping_woocommerce_section',
		'type'=> 'select',
		));

	//Products padding
	$wp_customize->add_setting('adventure_camping_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','adventure-camping'),
		'description'	=> __('Enter a value in pixels. Example:20px','adventure-camping'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_camping_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','adventure-camping'),
		'description'	=> __('Enter a value in pixels. Example:20px','adventure-camping'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'adventure_camping_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'adventure_camping_sanitize_number_range'
	) );
	$wp_customize->add_control( 'adventure_camping_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','adventure-camping' ),
		'section'     => 'adventure_camping_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'adventure_camping_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'adventure_camping_sanitize_number_range'
	) );
	$wp_customize->add_control( 'adventure_camping_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','adventure-camping' ),
		'section'     => 'adventure_camping_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'adventure_camping_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'adventure_camping_sanitize_number_range'
	) );
	$wp_customize->add_control( 'adventure_camping_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','adventure-camping' ),
		'section'     => 'adventure_camping_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('adventure_camping_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','adventure-camping'),
		'description'	=> __('Enter a value in pixels. Example:20px','adventure-camping'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_camping_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','adventure-camping'),
		'description'	=> __('Enter a value in pixels. Example:20px','adventure-camping'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_camping_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','adventure-camping'),
		'description'	=> __('Enter a value in pixels. Example:20px','adventure-camping'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_woocommerce_section',
		'type'=> 'text'
	));

	//Products Sale Badge
	$wp_customize->add_setting('adventure_camping_woocommerce_sale_position',array(
    'default' => 'right',
    'sanitize_callback' => 'adventure_camping_sanitize_choices'
	));
	$wp_customize->add_control('adventure_camping_woocommerce_sale_position',array(
    'type' => 'select',
    'label' => __('Sale Badge Position','adventure-camping'),
    'section' => 'adventure_camping_woocommerce_section',
    'choices' => array(
        'left' => __('Left','adventure-camping'),
        'right' => __('Right','adventure-camping'),
    ),
	) );

	$wp_customize->add_setting('adventure_camping_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','adventure-camping'),
		'description'	=> __('Enter a value in pixels. Example:20px','adventure-camping'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_camping_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_camping_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','adventure-camping'),
		'description'	=> __('Enter a value in pixels. Example:20px','adventure-camping'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'adventure-camping' ),
        ),
		'section'=> 'adventure_camping_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'adventure_camping_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'adventure_camping_sanitize_number_range'
	) );
	$wp_customize->add_control( 'adventure_camping_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','adventure-camping' ),
		'section'     => 'adventure_camping_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	// Related Product
  $wp_customize->add_setting( 'adventure_camping_related_product_show_hide',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'adventure_camping_switch_sanitization'
  ) );
  $wp_customize->add_control( new Adventure_Camping_Toggle_Switch_Custom_Control( $wp_customize, 'adventure_camping_related_product_show_hide',array(
    'label' => esc_html__( 'Show / Hide Related product','adventure-camping' ),
    'section' => 'adventure_camping_woocommerce_section'
  )));

}

add_action( 'customize_register', 'adventure_camping_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Adventure_Camping_Customize {

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
		$manager->register_section_type( 'Adventure_Camping_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Adventure_Camping_Customize_Section_Pro( $manager,'adventure_camping_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'ADVENTURE CAMPING PRO', 'adventure-camping' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'adventure-camping' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/products/camping-wordpress-theme'),
		) )	);

		$manager->add_section(new Adventure_Camping_Customize_Section_Pro($manager,'adventure_camping_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'adventure-camping' ),
			'pro_text' => esc_html__( 'DOCS', 'adventure-camping' ),
			'pro_url'  => esc_url('https://preview.vwthemesdemo.com/docs/free-adventure-camping/'),
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

		wp_enqueue_script( 'adventure-camping-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'adventure-camping-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Adventure_Camping_Customize::get_instance();