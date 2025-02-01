<?php
/**
 * @package Adventure Camping 
 * Setup the WordPress core custom header feature.
 *
 * @uses adventure_camping_header_style()
*/
function adventure_camping_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'adventure_camping_custom_header_args', array(
		'header-text' 			 =>	false,
		'width'                  => 1200,
		'height'                 => 70,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'wp-head-callback'       => 'adventure_camping_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'adventure_camping_custom_header_setup' );

if ( ! function_exists( 'adventure_camping_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see adventure_camping_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'adventure_camping_header_style' );

function adventure_camping_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        .home-page-header .main-topbar, .page-template-custom-home-page .home-page-header .main-topbar:after{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		    background-size: cover;
		}";
	   	wp_add_inline_style( 'adventure-camping-basic-style', $custom_css );
	endif;
}
endif;