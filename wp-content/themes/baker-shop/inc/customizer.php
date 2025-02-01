<?php
/**
 * Baker Shop: Customizer
 *
 * @subpackage Baker Shop
 * @since 1.0
 */

use WPTRT\Customize\Section\Luzuk_Baker_Shop_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Luzuk_Baker_Shop_Button::class );

	$manager->add_section(
		new Luzuk_Baker_Shop_Button( $manager, 'luzuk_baker_shop_pro', [
			'title' => __( 'Baker Shop Pro', 'baker-shop' ),
			'priority' => 0,
			'button_text' => __( 'Go Pro', 'baker-shop' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/baker-shop-wordpress-theme/', 'baker-shop')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'baker-shop-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'baker-shop-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function luzuk_baker_shop_customize_register( $wp_customize ) {

	$wp_customize->add_setting('luzuk_baker_shop_logo_size',array(
		'sanitize_callback'	=> 'luzuk_baker_shop_sanitize_float'
	));
	$wp_customize->add_control('luzuk_baker_shop_logo_size',array(
		'type' => 'range',
		'label' => __('Logo Size','baker-shop'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('luzuk_baker_shop_logo_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('luzuk_baker_shop_logo_padding',array(
		'label' => __('Logo Margin','baker-shop'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('luzuk_baker_shop_logo_top_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'luzuk_baker_shop_sanitize_float'
	));
	$wp_customize->add_control('luzuk_baker_shop_logo_top_padding',array(
		'type' => 'number',
		'description' => __('Top','baker-shop'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('luzuk_baker_shop_logo_bottom_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'luzuk_baker_shop_sanitize_float'
	));
	$wp_customize->add_control('luzuk_baker_shop_logo_bottom_padding',array(
		'type' => 'number',
		'description' => __('Bottom','baker-shop'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('luzuk_baker_shop_logo_left_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'luzuk_baker_shop_sanitize_float'
	));
	$wp_customize->add_control('luzuk_baker_shop_logo_left_padding',array(
		'type' => 'number',
		'description' => __('Left','baker-shop'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('luzuk_baker_shop_logo_right_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'luzuk_baker_shop_sanitize_float'
 	));
 	$wp_customize->add_control('luzuk_baker_shop_logo_right_padding',array(
		'type' => 'number',
		'description' => __('Right','baker-shop'),
		'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('luzuk_baker_shop_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'luzuk_baker_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('luzuk_baker_shop_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','baker-shop'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting( 'luzuk_baker_shop_site_title_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_site_title_color', array(
		'label' => 'Title Color',
		'section' => 'title_tagline',
	)));

	$wp_customize->add_setting('luzuk_baker_shop_show_tagline',array(
		'default' => true,
		'sanitize_callback'	=> 'luzuk_baker_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('luzuk_baker_shop_show_tagline',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Tagline','baker-shop'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting( 'luzuk_baker_shop_site_tagline_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_site_tagline_color', array(
		'label' => 'Tagline Color',
		'section' => 'title_tagline',
	)));

	$wp_customize->add_panel( 'luzuk_baker_shop_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'baker-shop' ),
		'description' => __( 'Description of what this panel does.', 'baker-shop' ),
	) );

	$wp_customize->add_section( 'luzuk_baker_shop_theme_options_section', array(
    	'title'      => __( 'General Settings', 'baker-shop' ),
		'priority'   => 30,
		'panel' => 'luzuk_baker_shop_panel_id'
	) );

	$wp_customize->add_setting('luzuk_baker_shop_theme_options',array(
		'default' => 'One Column',
		'sanitize_callback' => 'luzuk_baker_shop_sanitize_choices'
	));
	$wp_customize->add_control('luzuk_baker_shop_theme_options',array(
		'type' => 'select',
		'label' => __('Blog Page Sidebar Layout','baker-shop'),
		'section' => 'luzuk_baker_shop_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','baker-shop'),
		   'Right Sidebar' => __('Right Sidebar','baker-shop'),
		   'One Column' => __('One Column','baker-shop'),
		   'Grid Layout' => __('Grid Layout','baker-shop')
		),
	));

	$wp_customize->add_setting('luzuk_baker_shop_single_post_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'luzuk_baker_shop_sanitize_choices'
	));
	$wp_customize->add_control('luzuk_baker_shop_single_post_sidebar',array(
        'type' => 'select',
        'label' => __('Single Post Sidebar Layout','baker-shop'),
        'section' => 'luzuk_baker_shop_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','baker-shop'),
            'Right Sidebar' => __('Right Sidebar','baker-shop'),
            'One Column' => __('One Column','baker-shop')
        ),
	));

	$wp_customize->add_setting('luzuk_baker_shop_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'luzuk_baker_shop_sanitize_choices'
	));
	$wp_customize->add_control('luzuk_baker_shop_page_sidebar',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','baker-shop'),
        'section' => 'luzuk_baker_shop_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','baker-shop'),
            'Right Sidebar' => __('Right Sidebar','baker-shop'),
            'One Column' => __('One Column','baker-shop')
        ),
	));

	$wp_customize->add_setting('luzuk_baker_shop_archive_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'luzuk_baker_shop_sanitize_choices'
	));
	$wp_customize->add_control('luzuk_baker_shop_archive_page_sidebar',array(
        'type' => 'select',
        'label' => __('Archive & Search Page Sidebar Layout','baker-shop'),
        'section' => 'luzuk_baker_shop_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','baker-shop'),
            'Right Sidebar' => __('Right Sidebar','baker-shop'),
            'One Column' => __('One Column','baker-shop'),
            'Grid Layout' => __('Grid Layout','baker-shop')
        ),
	));

	$wp_customize->add_setting( 'luzuk_baker_shop_boxfull_width', array(
		'default'           => '',
		'sanitize_callback' => 'luzuk_baker_shop_sanitize_choices'
	));
	
	$wp_customize->add_control( 'luzuk_baker_shop_boxfull_width', array(
		'label'    => __( 'Section Width', 'baker-shop' ),
		'section'  => 'luzuk_baker_shop_theme_options_section',
		'type'     => 'select',
		'choices'  => array(
			'container'  => __('Box Width', 'baker-shop'),
			'container-fluid' => __('Full Width', 'baker-shop'),
			'none' => __('None', 'baker-shop')
		),
	));

	$wp_customize->add_setting( 'luzuk_baker_shop_dropdown_anim', array(
		'default'           => 'None',
		'sanitize_callback' => 'luzuk_baker_shop_sanitize_choices'
	));
	$wp_customize->add_control( 'luzuk_baker_shop_dropdown_anim', array(
		'label'    => __( 'Menu Dropdown Animations', 'baker-shop' ),
		'section'  => 'luzuk_baker_shop_theme_options_section',
		'type'     => 'select',
		'choices'  => array(
			'bounceInUp'  => __('bounceInUp', 'baker-shop'),
			'fadeInUp' => __('fadeInUp', 'baker-shop'),
			'zoomIn'    => __('zoomIn', 'baker-shop'),
			'None'    => __('None', 'baker-shop')
		),
	));
 
	//Header
	$wp_customize->add_section( 'luzuk_baker_shop_header' , array(
    	'title'    => __( 'Header Settings', 'baker-shop' ),
		'priority' => null,
		'panel' => 'luzuk_baker_shop_panel_id'
	) );

	$wp_customize->add_setting('luzuk_baker_shop_header_toptext',array(
		'default' => 'Elevating Taste, Every Pastry, Every Day!',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_baker_shop_header_toptext',array(
	   	'type' => 'text',
	   	'label' => __('Top Text','baker-shop'),
	   	'section' => 'luzuk_baker_shop_header',
	));

	$wp_customize->add_setting('luzuk_baker_shop_header_mail',array(
		'default' => 'info@yourmail.com',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_baker_shop_header_mail',array(
	   	'type' => 'text',
	   	'label' => __('Mail','baker-shop'),
	   	'section' => 'luzuk_baker_shop_header',
	));

	$wp_customize->add_setting('luzuk_baker_shop_header_phoneno',array(
		'default' => '+111 222 3333',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_baker_shop_header_phoneno',array(
	   	'type' => 'text',
	   	'label' => __('Phone Number','baker-shop'),
	   	'section' => 'luzuk_baker_shop_header',
	));

	$wp_customize->add_setting('luzuk_baker_shop_header_contactusbtnlink',array(
		'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_baker_shop_header_contactusbtnlink',array(
	   	'type' => 'text',
	   	'label' => __('Contact Us Button Link','baker-shop'),
	   	'section' => 'luzuk_baker_shop_header',
	));
	
	$wp_customize->add_setting( 'luzuk_baker_shop_headertopbg_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_headertopbg_col', array(
		'label' => 'Top BG Color',
		'section' => 'luzuk_baker_shop_header',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_headertoptext_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_headertoptext_col', array(
		'label' => 'Top Text Color',
		'section' => 'luzuk_baker_shop_header',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_headertopicon_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_headertopicon_col', array(
		'label' => 'Top Icon Color',
		'section' => 'luzuk_baker_shop_header',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_headertopmailphnhover_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_headertopmailphnhover_col', array(
		'label' => 'Mail & Phone Hover Color',
		'section' => 'luzuk_baker_shop_header',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_headerbottombg_col', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_headerbottombg_col', array(
		'label' => 'BG Color',
		'section' => 'luzuk_baker_shop_header',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_menu_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_menu_color', array(
		'label' => 'Menu Color',
		'section' => 'luzuk_baker_shop_header',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_menuhover_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_menuhover_color', array(
		'label' => 'Menu Hover Color',
		'section' => 'luzuk_baker_shop_header',
	)));


	$wp_customize->add_setting( 'luzuk_baker_shop_submenu_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_submenu_color', array(
		'label' => 'Submenu Text Color',
		'section' => 'luzuk_baker_shop_header',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_submenubg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_submenubg_color', array(
		'label' => 'Submenu BG Color',
		'section' => 'luzuk_baker_shop_header',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_header_btntexticon_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_header_btntexticon_color', array(
		'label' => 'Button Text & Icon Color',
		'section' => 'luzuk_baker_shop_header',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_header_btntexticonbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_header_btntexticonbg_color', array(
		'label' => 'Button BG Color',
		'section' => 'luzuk_baker_shop_header',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_header_btntexticonhover_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_header_btntexticonhover_color', array(
		'label' => 'Button Text & Icon Hover Color',
		'section' => 'luzuk_baker_shop_header',
	)));

	//home page slider
	$wp_customize->add_section( 'luzuk_baker_shop_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'baker-shop' ),
		'description'=> __('<b>Note :</b> Please Add Image in 750*700 Ratio.','baker-shop'),
		'priority' => null,
		'panel' => 'luzuk_baker_shop_panel_id'
	) );

	$wp_customize->add_setting('luzuk_baker_shop_slider_hide_show',array(
    	'default' => false,
    	'sanitize_callback'	=> 'luzuk_baker_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('luzuk_baker_shop_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','baker-shop'),
	   	'section' => 'luzuk_baker_shop_slider_section',
	));

	$wp_customize->add_setting( 'luzuk_baker_shop_slider_effect', array(
		'default'           => '',
		'sanitize_callback' => 'luzuk_baker_shop_sanitize_choices'
	));
	$wp_customize->add_control( 'luzuk_baker_shop_slider_effect', array(
		'label'    => __( 'Onload Transactions Effects', 'baker-shop' ),
		'section'  => 'luzuk_baker_shop_slider_section',
		'type'     => 'select',
		'choices'  => array(
			'bounceInLeft'  => __('bounceInLeft', 'baker-shop'),
			'bounceInRight' => __('bounceInRight', 'baker-shop'),
			'bounceInUp'    => __('bounceInUp', 'baker-shop'),
			'bounceInDown'    => __('bounceInDown', 'baker-shop'),
			'zoomIn'  => __('zoomIn', 'baker-shop'),
			'zoomOut' => __('zoomOut', 'baker-shop'),
			'fadeInDown'    => __('fadeInDown', 'baker-shop'),
			'fadeInUp'    => __('fadeInUp', 'baker-shop'),
			'fadeInLeft'  => __('fadeInLeft', 'baker-shop'),
			'fadeInRight' => __('fadeInRight', 'baker-shop'),
			'flip-up'    => __('flip-up', 'baker-shop'),
			'none'    => __('none', 'baker-shop')
		),
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'luzuk_baker_shop_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'luzuk_baker_shop_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'luzuk_baker_shop_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'baker-shop' ),
			'section' => 'luzuk_baker_shop_slider_section',
			'type' => 'dropdown-pages'
		));
	}

	$wp_customize->add_setting('luzuk_baker_shop_slider_excerpt_length',array(
		'default' => '15',
		'sanitize_callback'	=> 'luzuk_baker_shop_sanitize_float'
	));
	$wp_customize->add_control('luzuk_baker_shop_slider_excerpt_length',array(
		'type' => 'number',
		'label' => __('Description Excerpt Length','baker-shop'),
		'section' => 'luzuk_baker_shop_slider_section',
	));

	$wp_customize->add_setting('luzuk_baker_shop_slider_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'luzuk_baker_shop_sanitize_float'
	));
	$wp_customize->add_control('luzuk_baker_shop_slider_font_size',array(
		'type' => 'number',
		'label' => __('Title Font Size','baker-shop'),
		'section' => 'luzuk_baker_shop_slider_section',
	));

	$wp_customize->add_setting('luzuk_baker_shop_slider_text_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'luzuk_baker_shop_sanitize_float'
	));
	$wp_customize->add_control('luzuk_baker_shop_slider_text_font_size',array(
		'type' => 'number',
		'label' => __('Text Font Size','baker-shop'),
		'section' => 'luzuk_baker_shop_slider_section',
	));

	$wp_customize->add_setting('luzuk_baker_shop_sliderbtntext',array(
    	'default' => 'SHOP NOW!',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_baker_shop_sliderbtntext',array(
	   	'type' => 'text',
	   	'label' => __('Button Text','baker-shop'),
	   	'section' => 'luzuk_baker_shop_slider_section',
	));

	$wp_customize->add_setting('luzuk_baker_shop_sliderbtnlink',array(
    	'default' => '#',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('luzuk_baker_shop_sliderbtnlink',array(
	   	'type' => 'url',
	   	'label' => __('Button Link','baker-shop'),
	   	'section' => 'luzuk_baker_shop_slider_section',
	));


	$wp_customize->add_setting( 'luzuk_baker_shop_slider_bg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_slider_bg_color', array(
		'label' => 'BG Color',
		'section' => 'luzuk_baker_shop_slider_section',
	)));
	

	$wp_customize->add_setting( 'luzuk_baker_shop_slider_title_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_slider_title_color', array(
		'label' => 'Title Color',
		'section' => 'luzuk_baker_shop_slider_section',
	)));
	

	$wp_customize->add_setting( 'luzuk_baker_shop_slider_description_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_slider_description_color', array(
		'label' => 'Description Color',
		'section' => 'luzuk_baker_shop_slider_section',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_slider_btntext_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_slider_btntext_color', array(
		'label' => 'Button Text Color',
		'section' => 'luzuk_baker_shop_slider_section',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_slider_btnbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_slider_btnbg_color', array(
		'label' => 'Button BG Color',
		'section' => 'luzuk_baker_shop_slider_section',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_slider_btntexthrv_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_slider_btntexthrv_color', array(
		'label' => 'Button Hover Color',
		'section' => 'luzuk_baker_shop_slider_section',
	)));



	//product category Section
	$wp_customize->add_section('luzuk_baker_shop_productcategory_section',array(
		'title'	=> __('Product Category Settings','baker-shop'),
		'description'=> __('<b>Note :</b> This section will appear below the slider.','baker-shop'),
		'panel' => 'luzuk_baker_shop_panel_id',
	));

	$wp_customize->add_setting('luzuk_baker_shop_productcategory_subheading',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_baker_shop_productcategory_subheading',array(
	   	'type' => 'text',
	   	'label' => __('Sub Heading','baker-shop'),
	   	'section' => 'luzuk_baker_shop_productcategory_section',
	));

	$wp_customize->add_setting('luzuk_baker_shop_productcategory_heading',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_baker_shop_productcategory_heading',array(
	   	'type' => 'text',
	   	'label' => __('Heading','baker-shop'),
	   	'section' => 'luzuk_baker_shop_productcategory_section',
	));

	$wp_customize->add_setting('luzuk_baker_shop_productcategory_viewallbtnlink',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_baker_shop_productcategory_viewallbtnlink',array(
	   	'type' => 'text',
	   	'label' => __('View All Button Link','baker-shop'),
	   	'section' => 'luzuk_baker_shop_productcategory_section',
	));

	$wp_customize->add_setting( 'luzuk_baker_shop_category_boxbgcolor', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_category_boxbgcolor', array(
		'label' => 'BG Color',
		'section' => 'luzuk_baker_shop_productcategory_section',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_category_subheadingcolor', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_category_subheadingcolor', array(
		'label' => 'Sub Heading Color',
		'section' => 'luzuk_baker_shop_productcategory_section',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_category_headingcolor', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_category_headingcolor', array(
		'label' => 'Heading Color',
		'section' => 'luzuk_baker_shop_productcategory_section',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_category_btntextcolor', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_category_btntextcolor', array(
		'label' => 'Button Text Color',
		'section' => 'luzuk_baker_shop_productcategory_section',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_category_btnbgcolor', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_category_btnbgcolor', array(
		'label' => 'Button BG Color',
		'section' => 'luzuk_baker_shop_productcategory_section',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_category_btntexthrvcolor', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_category_btntexthrvcolor', array(
		'label' => 'Button Text Hover Color',
		'section' => 'luzuk_baker_shop_productcategory_section',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_category_titlecolor', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_category_titlecolor', array(
		'label' => 'Category Title Color',
		'section' => 'luzuk_baker_shop_productcategory_section',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_category_titlehrvcolor', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_category_titlehrvcolor', array(
		'label' => 'Category Title Hover Color',
		'section' => 'luzuk_baker_shop_productcategory_section',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_category_iconcolor', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_category_iconcolor', array(
		'label' => 'Category Icon Color',
		'section' => 'luzuk_baker_shop_productcategory_section',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_category_iconbgcolor', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_category_iconbgcolor', array(
		'label' => 'Category Icon BG Color',
		'section' => 'luzuk_baker_shop_productcategory_section',
	)));



	//ourproduct Section
	$wp_customize->add_section('luzuk_baker_shop_ourproduct_section',array(
		'title'	=> __('Our Product Settings','baker-shop'),
		'description'=> __('<b>Note :</b> This section will appear below the Product Category.','baker-shop'),
		'panel' => 'luzuk_baker_shop_panel_id',
	));

	
	$wp_customize->add_setting('luzuk_baker_shop_ourproduct_subheading',array(
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_baker_shop_ourproduct_subheading',array(
	   	'type' => 'text',
	   	'label' => __('Sub Heading','baker-shop'),
	   	'section' => 'luzuk_baker_shop_ourproduct_section',
	));

	$wp_customize->add_setting('luzuk_baker_shop_ourproduct_heading',array(
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_baker_shop_ourproduct_heading',array(
	   	'type' => 'text',
	   	'label' => __('Heading','baker-shop'),
	   	'section' => 'luzuk_baker_shop_ourproduct_section',
	));

	$wp_customize->add_setting('luzuk_baker_shop_ourproduct_viewmorebtnlink',array(
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luzuk_baker_shop_ourproduct_viewmorebtnlink',array(
	   	'type' => 'text',
	   	'label' => __('View More Button Link','baker-shop'),
	   	'section' => 'luzuk_baker_shop_ourproduct_section',
	));

	$wp_customize->add_setting( 'luzuk_baker_shop_ourproductsubheading_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_ourproductsubheading_color', array(
		'label' => 'Sub Heading Color',
		'section' => 'luzuk_baker_shop_ourproduct_section',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_ourproductheading_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_ourproductheading_color', array(
		'label' => 'Heading Color',
		'section' => 'luzuk_baker_shop_ourproduct_section',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_ourproductviewmorebtntext_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_ourproductviewmorebtntext_color', array(
		'label' => 'View More Button Text Color',
		'section' => 'luzuk_baker_shop_ourproduct_section',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_ourproductviewmorebtnbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_ourproductviewmorebtnbg_color', array(
		'label' => 'View More Button BG Color',
		'section' => 'luzuk_baker_shop_ourproduct_section',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_ourproductviewmorebtntexthrv_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_ourproductviewmorebtntexthrv_color', array(
		'label' => 'View More Button Text Hover Color',
		'section' => 'luzuk_baker_shop_ourproduct_section',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_ourproductproducttitle_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_ourproductproducttitle_color', array(
		'label' => 'Product Title Color',
		'section' => 'luzuk_baker_shop_ourproduct_section',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_ourproductproducttitlehrv_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_ourproductproducttitlehrv_color', array(
		'label' => 'Product Title Hover Color',
		'section' => 'luzuk_baker_shop_ourproduct_section',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_ourproductproductprice_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_ourproductproductprice_color', array(
		'label' => 'Product Price Color',
		'section' => 'luzuk_baker_shop_ourproduct_section',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_ourproductproductbtntext_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_ourproductproductbtntext_color', array(
		'label' => 'Product Button Text Color',
		'section' => 'luzuk_baker_shop_ourproduct_section',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_ourproductproductbtnbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_ourproductproductbtnbg_color', array(
		'label' => 'Product Button BG Color',
		'section' => 'luzuk_baker_shop_ourproduct_section',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_ourproductproductbtntexthrv_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_ourproductproductbtntexthrv_color', array(
		'label' => 'Product Button Text Hover Color',
		'section' => 'luzuk_baker_shop_ourproduct_section',
	)));

	

	//Footer
    $wp_customize->add_section( 'luzuk_baker_shop_footer', array(
    	'title'  => __( 'Footer Settings', 'baker-shop' ),
		'priority' => null,
		'panel' => 'luzuk_baker_shop_panel_id'
	) );

	$wp_customize->add_setting('luzuk_baker_shop_show_back_totop',array(
       'default' => true,
       'sanitize_callback'	=> 'luzuk_baker_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('luzuk_baker_shop_show_back_totop',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Back to Top','baker-shop'),
       'section' => 'luzuk_baker_shop_footer'
    ));

    $wp_customize->add_setting('luzuk_baker_shop_footer_copy',array(
		'default' => 'Baker Shop WordPress Theme By Luzuk',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('luzuk_baker_shop_footer_copy',array(
		'label'	=> __('Copyright Text','baker-shop'),
		'section' => 'luzuk_baker_shop_footer',
		'setting' => 'luzuk_baker_shop_footer_copy',
		'type' => 'text'
	));

	$wp_customize->add_setting( 'luzuk_baker_shop_footertext_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_footertext_color', array(
		'label' => 'Text Color',
		'section' => 'luzuk_baker_shop_footer',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_footerbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_footerbg_color', array(
		'label' => 'BG Color',
		'section' => 'luzuk_baker_shop_footer',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_footercopyright_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_footercopyright_color', array(
		'label' => 'Copyright Color',
		'section' => 'luzuk_baker_shop_footer',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_footercopyrightbrd_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_footercopyrightbrd_color', array(
		'label' => 'Border Color',
		'section' => 'luzuk_baker_shop_footer',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_footerscrolltotoptext_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_footerscrolltotoptext_color', array(
		'label' => 'Scroll To Top Text Color',
		'section' => 'luzuk_baker_shop_footer',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_footerscrolltotopbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_footerscrolltotopbg_color', array(
		'label' => 'Scroll To Top BG Color',
		'section' => 'luzuk_baker_shop_footer',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_footerscrolltotoptexthover_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_footerscrolltotoptexthover_color', array(
		'label' => 'Scroll To Top Text Hover Color',
		'section' => 'luzuk_baker_shop_footer',
	)));

	$wp_customize->add_setting( 'luzuk_baker_shop_footerscrolltotophover_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luzuk_baker_shop_footerscrolltotophover_color', array(
		'label' => 'Scroll To Top Hover Color',
		'section' => 'luzuk_baker_shop_footer',
	)));




	

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'luzuk_baker_shop_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'luzuk_baker_shop_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'luzuk_baker_shop_customize_register' );

function luzuk_baker_shop_customize_partial_blogname() {
	bloginfo( 'name' );
}

function luzuk_baker_shop_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if (class_exists('WP_Customize_Control')) {

   	class Luzuk_Baker_Shop_Fontawesome_Icon_Chooser extends WP_Customize_Control {

      	public $type = 'icon';

      	public function render_content() { ?>
	     	<label>
	            <span class="customize-control-title">
	               <?php echo esc_html($this->label); ?>
	            </span>

	            <?php if ($this->description) { ?>
	                <span class="description customize-control-description">
	                   <?php echo wp_kses_post($this->description); ?>
	                </span>
	            <?php } ?>

	            <div class="baker-shop-selected-icon">
	                <i class="fa <?php echo esc_attr($this->value()); ?>"></i>
	                <span><i class="fa fa-angle-down"></i></span>
	            </div>

	            <ul class="baker-shop-icon-list clearfix">
	                <?php
	                $luzuk_baker_shop_font_awesome_icon_array = luzuk_baker_shop_font_awesome_icon_array();
	                foreach ($luzuk_baker_shop_font_awesome_icon_array as $luzuk_baker_shop_font_awesome_icon) {
	                   $icon_class = $this->value() == $luzuk_baker_shop_font_awesome_icon ? 'icon-active' : '';
	                   echo '<li class=' . esc_attr($icon_class) . '><i class="' . esc_attr($luzuk_baker_shop_font_awesome_icon) . '"></i></li>';
	                }
	                ?>
	            </ul>
	            <input type="hidden" value="<?php $this->value(); ?>" <?php $this->link(); ?> />
	        </label>
	        <?php
      	}
  	}
}
function luzuk_baker_shop_customizer_script() {
   wp_enqueue_style( 'font-awesome-1', esc_url(get_template_directory_uri()).'/assets/css/fontawesome-all.css');
}
add_action( 'customize_controls_enqueue_scripts', 'luzuk_baker_shop_customizer_script' );