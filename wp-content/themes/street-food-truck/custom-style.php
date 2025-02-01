<?php

	$street_food_truck_custom_css= "";

	/*-------------------- First Highlight Color -------------------*/

	$street_food_truck_first_color = get_theme_mod('street_food_truck_first_color');
	$street_food_truck_second_color = get_theme_mod('street_food_truck_second_color');	

	if($street_food_truck_first_color != false){
		$street_food_truck_custom_css .='.serach_outer i, .order-track a, .woocommerce form.track_order .form-row .button, .woocommerce form.track_order .form-row .button:hover, #slider .banner-btn a, #slider:after, #slider .slick-dots .slick-active:before, #slider .slider-nav .slick-next, #about-us .about-content, .more-btn a , #comments input[type="submit"],#comments a.comment-reply-link,input[type="submit"],.woocommerce #respond input#submit, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.pro-button a, .woocommerce a.added_to_cart.wc-forward, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span, #footer .tagcloud a:hover, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, .woocommerce span.onsale, nav.woocommerce-MyAccount-navigation ul li, .woocommerce ul.products li.product .button, .woocommerce a.added_to_cart.wc-forward,a.added_to_cart.wc-forward, .wp-block-button__link{';
			$street_food_truck_custom_css .='background-color: '.esc_attr($street_food_truck_first_color).';';
		$street_food_truck_custom_css .='}';
	}

	if($street_food_truck_first_color != false){
		$street_food_truck_custom_css .='.wc-block-grid__product-onsale, .wp-block-woocommerce-cart .wc-block-cart__submit-button, .wc-block-components-checkout-place-order-button, .wc-block-components-totals-coupon__button, .toggle-nav i{';
			$street_food_truck_custom_css .='background-color: '.esc_attr($street_food_truck_first_color).'!important;';
		$street_food_truck_custom_css .='}';
	}

	if($street_food_truck_first_color != false){
		$street_food_truck_custom_css .='p.site-title a, .logo h1 a, .logo p.site-description, .sf-arrows .sf-with-ul:after, .main-navigation .current_page_item a, .main-navigation a:hover, .topbar-social-icon .custom-social-icons a:hover, .main-topbar .location-text i, .main-topbar .phone-number i, #slider .slider-para, #slider .banner-btn a:hover, #about-us .about-text h2, #about-us .about-content .review-box .review-num i, .page-template-custom-home-page .home-page-header .main-navigation .current_page_item a, .logo p.site-description, #footer .custom-social-icons a:hover{';
			$street_food_truck_custom_css .='color: '.esc_attr($street_food_truck_first_color).';';
		$street_food_truck_custom_css .='}';
	}

	if($street_food_truck_first_color != false){
		$street_food_truck_custom_css .='#footer .custom-social-icons a:hover{';
			$street_food_truck_custom_css .='outline: 6px double  '.esc_attr($street_food_truck_first_color).';';
		$street_food_truck_custom_css .='}';
	}

	if($street_food_truck_first_color != false){
		$street_food_truck_custom_css .='#footer .tagcloud a:hover{';
			$street_food_truck_custom_css .='border-color: '.esc_attr($street_food_truck_first_color).';';
		$street_food_truck_custom_css .='}';
	}

	

	/*-------------------- second Highlight Color -------------------*/

	

	if($street_food_truck_second_color != false){
		$street_food_truck_custom_css .='#sidebar .wp-block-tag-cloud a:hover, #footer, .custom-about-us a.custom_read_more, #footer .wp-block-tag-cloud a:hover, table.compare-list .add-to-cart td a:not(.unstyled_button), .top-header, .home-page-header, #sidebar .wp-block-search .wp-block-search__button:hover, .main-header .main-topbar, .top-search input.search-field, .woocommerce form.track_order, #slider .banner-btn a:hover, #slider .slick-dots, #slider .slider-nav .slick-prev, #about-us, #about-us .about-content .inner-main-box, .page-template-custom-home-page .topbar i.fas.fa-phone.me-2:hover, .topbar i.fas.fa-phone.me-2:hover,.post-nav-links span:hover, .post-nav-links a:hover, #comments input[type="submit"]:hover, #comments a.comment-reply-link:hover, .more-btn a:hover, #comments a.comment-reply-link:hover,.pagination a:hover,#footer .tagcloud a:hover, .pro-button a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, #preloader, #footer-2, .copyright .custom-social-icons i:hover, .bradcrumbs a, .post-categories li a, .bradcrumbs a:hover, .post-categories li a:hover, .bradcrumbs span, nav.navigation.posts-navigation .nav-previous a, nav.navigation.posts-navigation .nav-next a, #sidebar .custom-social-icons a, #sidebar .custom-social-icons a:hover, #footer .custom-social-icons a:hover, #sidebar h3:before,#sidebar .widget_block h3:before, #sidebar h2:before, #sidebar label.wp-block-search__label:before, #sidebar .tagcloud a:hover, .pagination span, .pagination a, .post-nav-links span, .post-nav-links a, .pagination a:hover, .pagination .current, nav.woocommerce-MyAccount-navigation ul li:hover, a.button.product_type_simple.add_to_cart_button.ajax_add_to_cart:hover, a.button.product_type_simple.add_to_cart_button.ajax_add_to_cart, header.woocommerce-Address-title.title a, #tag-cloud-sec .tag-cloud-link, .page-template-custom-home-page.admin-bar .home-page-header, .page-template-custom-home-page .home-page-header{';
			$street_food_truck_custom_css .='background-color: '.esc_attr($street_food_truck_second_color).';';
		$street_food_truck_custom_css .='}';
	}

	if($street_food_truck_second_color != false){
		$street_food_truck_custom_css .='a.added_to_cart.wc-forward:hover,header.woocommerce-Address-title.title a:hover,#tag-cloud-sec .tag-cloud-link:hover,.wc-block-grid__product-add-to-cart.wp-block-button .wp-block-button__link:hover, #sidebar ul li::before, .wp-block-woocommerce-cart .wc-block-cart__submit-button:hover, .wc-block-components-checkout-place-order-button:hover, .wc-block-components-totals-coupon__button:hover, .wp-block-woocommerce-cart .wc-block-components-product-badge, .wc-block-components-order-summary-item__quantity, header.woocommerce-Address-title.title a:hover,#tag-cloud-sec .tag-cloud-link:hover,.wc-block-grid__product-add-to-cart.wp-block-button .wp-block-button__link:hover{';
			$street_food_truck_custom_css .='background-color: '.esc_attr($street_food_truck_second_color).' !important;';
		$street_food_truck_custom_css .='}';
	}

	if($street_food_truck_second_color != false){
		$street_food_truck_custom_css .='a, a:hover, .sticky .post-main-box h2:before, .menu-bar-sec i, .page-template-custom-home-page .home-page-header .main-navigation a:hover, .topbar-social-icon .custom-social-icons a, .order-track a, #slider .inner_carousel h1, #slider .banner-btn a, #about-us .about-content .inner-box p, .post-main-box:hover h2 a, .post-main-box:hover .post-info span a, .single-post .post-info:hover a, .middle-bar h6, .grid-post-main-box:hover h2 a, .grid-post-main-box:hover .post-info span a, #sidebar ul li:hover, .woocommerce-error::before, .post-navigation span.meta-nav:hover, .woocommerce-message::before,.woocommerce-info::before{';
			$street_food_truck_custom_css .='color: '.esc_attr($street_food_truck_second_color).';';
		$street_food_truck_custom_css .='}';
	}

	if($street_food_truck_second_color != false){
		$street_food_truck_custom_css .='.woocommerce form.track_order .form-row .button, .woocommerce form.track_order .form-row .button:hover, #footer .tagcloud a:hover, .tags-bg a:hover{';
			$street_food_truck_custom_css .='color: '.esc_attr($street_food_truck_second_color).' !important;';
		$street_food_truck_custom_css .='}';
	}

	if($street_food_truck_second_color != false){
		$street_food_truck_custom_css .='.post-main-box, .grid-post-main-box, #sidebar .widget{';
			$street_food_truck_custom_css .='border-color: '.esc_attr($street_food_truck_second_color).';';
		$street_food_truck_custom_css .='}';
	}

	if($street_food_truck_second_color != false){
		$street_food_truck_custom_css .='.main-navigation ul ul, #sidebar .widget, .woocommerce-error, .woocommerce-message,.woocommerce-info{';
			$street_food_truck_custom_css .='border-top-color: '.esc_attr($street_food_truck_second_color).';';
		$street_food_truck_custom_css .='}';
	}

	if($street_food_truck_second_color != false){
		$street_food_truck_custom_css .='.header-fixed, .main-navigation ul ul, .header-fixed, #sidebar .widget{';
			$street_food_truck_custom_css .='border-bottom-color: '.esc_attr($street_food_truck_second_color).';';
		$street_food_truck_custom_css .='}';
	}

	if($street_food_truck_second_color != false){
		$street_food_truck_custom_css .='#sidebar .widget{';
			$street_food_truck_custom_css .='border-left-color: '.esc_attr($street_food_truck_second_color).';';
		$street_food_truck_custom_css .='}';
	}

	if($street_food_truck_second_color != false){
		$street_food_truck_custom_css .='#sidebar .widget{';
			$street_food_truck_custom_css .='border-right-color: '.esc_attr($street_food_truck_second_color).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$street_food_truck_theme_lay = get_theme_mod( 'street_food_truck_width_option','Full Width');
    if($street_food_truck_theme_lay == 'Boxed'){
		$street_food_truck_custom_css .='body{';
			$street_food_truck_custom_css .='max-width: 1140px; width: 100%; margin-right: auto; margin-left: auto;';
		$street_food_truck_custom_css .='}';
		$street_food_truck_custom_css .='.scrollup i{';
			$street_food_truck_custom_css .='right: 100px;';
		$street_food_truck_custom_css .='}';
		$street_food_truck_custom_css .='.row.outer-logo{';
			$street_food_truck_custom_css .='margin-left: 0px;';
		$street_food_truck_custom_css .='}';
	}else if($street_food_truck_theme_lay == 'Wide Width'){
		$street_food_truck_custom_css .='body{';
			$street_food_truck_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$street_food_truck_custom_css .='}';
		$street_food_truck_custom_css .='.scrollup i{';
			$street_food_truck_custom_css .='right: 30px;';
		$street_food_truck_custom_css .='}';
		$street_food_truck_custom_css .='.row.outer-logo{';
			$street_food_truck_custom_css .='margin-left: 0px;';
		$street_food_truck_custom_css .='}';
	}else if($street_food_truck_theme_lay == 'Full Width'){
		$street_food_truck_custom_css .='body{';
			$street_food_truck_custom_css .='max-width: 100%;';
		$street_food_truck_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$street_food_truck_sticky_header_padding = get_theme_mod('street_food_truck_sticky_header_padding');
	if($street_food_truck_sticky_header_padding != false){
		$street_food_truck_custom_css .='.header-fixed{';
			$street_food_truck_custom_css .='padding: '.esc_attr($street_food_truck_sticky_header_padding).';';
		$street_food_truck_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$street_food_truck_resp_topbar = get_theme_mod( 'street_food_truck_resp_topbar_hide_show',false);
	if($street_food_truck_resp_topbar == true && get_theme_mod( 'street_food_truck_topbar_hide_show', true) == false){
    	$street_food_truck_custom_css .='.main-topbar{';
			$street_food_truck_custom_css .='display:none;';
		$street_food_truck_custom_css .='} ';
	}
    if($street_food_truck_resp_topbar == true){
    	$street_food_truck_custom_css .='@media screen and (max-width:575px) {';
		$street_food_truck_custom_css .='.main-topbar{';
			$street_food_truck_custom_css .='display:block;';
		$street_food_truck_custom_css .='} }';
	}else if($street_food_truck_resp_topbar == false){
		$street_food_truck_custom_css .='@media screen and (max-width:575px) {';
		$street_food_truck_custom_css .='.main-topbar{';
			$street_food_truck_custom_css .='display:none;';
		$street_food_truck_custom_css .='} }';
	}

	$street_food_truck_responsive_preloader_hide = get_theme_mod('street_food_truck_responsive_preloader_hide',false);
	if($street_food_truck_responsive_preloader_hide == true && get_theme_mod('street_food_truck_loader_enable',false) == false){
		$street_food_truck_custom_css .='@media screen and (min-width:575px){
			#preloader{';
			$street_food_truck_custom_css .='display:none !important;';
		$street_food_truck_custom_css .='} }';
	}

	if($street_food_truck_responsive_preloader_hide == false){
		$street_food_truck_custom_css .='@media screen and (max-width:575px){
			#preloader{';
			$street_food_truck_custom_css .='display:none !important;';
		$street_food_truck_custom_css .='} }';
	}

	$street_food_truck_resp_sidebar = get_theme_mod( 'street_food_truck_sidebar_hide_show',true);
    if($street_food_truck_resp_sidebar == true){
    	$street_food_truck_custom_css .='@media screen and (max-width:575px) {';
		$street_food_truck_custom_css .='#sidebar{';
			$street_food_truck_custom_css .='display:block;margin-top:30px;';
		$street_food_truck_custom_css .='} }';
	}else if($street_food_truck_resp_sidebar == false){
		$street_food_truck_custom_css .='@media screen and (max-width:575px) {';
		$street_food_truck_custom_css .='#sidebar{';
			$street_food_truck_custom_css .='display:none;';
		$street_food_truck_custom_css .='} }';
	}

	$street_food_truck_resp_slider = get_theme_mod( 'street_food_truck_resp_slider_hide_show',true);
	if($street_food_truck_resp_slider == true && get_theme_mod( 'street_food_truck_show_hide_slider', true) == false){
    	$street_food_truck_custom_css .='#slider{';
			$street_food_truck_custom_css .='display:none;';
		$street_food_truck_custom_css .='} ';
	}
    if($street_food_truck_resp_slider == true){
    	$street_food_truck_custom_css .='@media screen and (max-width:575px) {';
		$street_food_truck_custom_css .='#slider{';
			$street_food_truck_custom_css .='display:block;';
		$street_food_truck_custom_css .='} }';
	}else if($street_food_truck_resp_slider == false){
		$street_food_truck_custom_css .='@media screen and (max-width:575px) {';
		$street_food_truck_custom_css .='#slider{';
			$street_food_truck_custom_css .='display:none;';
		$street_food_truck_custom_css .='} }';
		$street_food_truck_custom_css .='@media screen and (max-width:575px){';
		$street_food_truck_custom_css .='.page-template-custom-home-page .topbar-section{';
			$street_food_truck_custom_css .='margin-top: 45px;';
		$street_food_truck_custom_css .='} }';
	}

	$street_food_truck_resp_scroll_top = get_theme_mod( 'street_food_truck_resp_scroll_top_hide_show',true);
	if($street_food_truck_resp_scroll_top == true && get_theme_mod( 'street_food_truck_hide_show_scroll',true) == false){
    	$street_food_truck_custom_css .='.scrollup i{';
			$street_food_truck_custom_css .='visibility:hidden !important;';
		$street_food_truck_custom_css .='} ';
	}
    if($street_food_truck_resp_scroll_top == true){
    	$street_food_truck_custom_css .='@media screen and (max-width:575px) {';
		$street_food_truck_custom_css .='.scrollup i{';
			$street_food_truck_custom_css .='visibility:visible !important;';
		$street_food_truck_custom_css .='} }';
	}else if($street_food_truck_resp_scroll_top == false){
		$street_food_truck_custom_css .='@media screen and (max-width:575px){';
		$street_food_truck_custom_css .='.scrollup i{';
			$street_food_truck_custom_css .='visibility:hidden !important;';
		$street_food_truck_custom_css .='} }';
	}

	$street_food_truck_resp_stickyheader = get_theme_mod( 'street_food_truck_stickyheader_hide_show',false);
	if($street_food_truck_resp_stickyheader == true && get_theme_mod( 'street_food_truck_sticky_header',false) != true){
    	$street_food_truck_custom_css .='.header-fixed{';
			$street_food_truck_custom_css .='position:static;';
		$street_food_truck_custom_css .='} ';
	}
	
	/*------------- Slider Content Padding Settings ------------------*/

	$street_food_truck_slider_content_padding_top_bottom = get_theme_mod('street_food_truck_slider_content_padding_top_bottom');
	$street_food_truck_slider_content_padding_left_right = get_theme_mod('street_food_truck_slider_content_padding_left_right');
	if($street_food_truck_slider_content_padding_top_bottom != false || $street_food_truck_slider_content_padding_left_right != false){
		$street_food_truck_custom_css .='#slider .carousel-caption{';
			$street_food_truck_custom_css .='top: '.esc_attr($street_food_truck_slider_content_padding_top_bottom).'; bottom: '.esc_attr($street_food_truck_slider_content_padding_top_bottom).';left: '.esc_attr($street_food_truck_slider_content_padding_left_right).';right: '.esc_attr($street_food_truck_slider_content_padding_left_right).';';
		$street_food_truck_custom_css .='}';
	}

	// banner background img
	$street_food_truck_banner_background_color = get_theme_mod('street_food_truck_banner_background_color');
	if($street_food_truck_banner_background_color != false){
		$street_food_truck_custom_css .='#slider{';
			$street_food_truck_custom_css .='background-color: '.esc_attr($street_food_truck_banner_background_color).'; height:550px';
		$street_food_truck_custom_css .='}';
	}
	
	/*-------------- Copyright Alignment ----------------*/

	$street_food_truck_copyright_alingment = get_theme_mod('street_food_truck_copyright_alingment');
	if($street_food_truck_copyright_alingment != false){
		$street_food_truck_custom_css .='.copyright p{';
			$street_food_truck_custom_css .='text-align: '.esc_attr($street_food_truck_copyright_alingment).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_footer_background_color = get_theme_mod('street_food_truck_footer_background_color');
	if($street_food_truck_footer_background_color != false){
		$street_food_truck_custom_css .='#footer{';
			$street_food_truck_custom_css .='background-color: '.esc_attr($street_food_truck_footer_background_color).';';
		$street_food_truck_custom_css .='}';
	}

	/*------------- Preloader Background Color  -------------------*/

	$street_food_truck_preloader_bg_color = get_theme_mod('street_food_truck_preloader_bg_color');
	if($street_food_truck_preloader_bg_color != false){
		$street_food_truck_custom_css .='#preloader{';
			$street_food_truck_custom_css .='background-color: '.esc_attr($street_food_truck_preloader_bg_color).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_preloader_border_color = get_theme_mod('street_food_truck_preloader_border_color');
	if($street_food_truck_preloader_border_color != false){
		$street_food_truck_custom_css .='.loader-line{';
			$street_food_truck_custom_css .='border-color: '.esc_attr($street_food_truck_preloader_border_color).'!important;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_preloader_bg_img = get_theme_mod('street_food_truck_preloader_bg_img');
	if($street_food_truck_preloader_bg_img != false){
		$street_food_truck_custom_css .='#preloader{';
			$street_food_truck_custom_css .='background: url('.esc_attr($street_food_truck_preloader_bg_img).');-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
		$street_food_truck_custom_css .='}';
	}

	/*---------------------- Slider ------------------------*/

	$street_food_truck_slider_background_color = get_theme_mod('street_food_truck_slider_background_color');
	if($street_food_truck_slider_background_color != false){
		$street_food_truck_custom_css .='#slider{';
			$street_food_truck_custom_css .='background-color: '.esc_attr($street_food_truck_slider_background_color).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_product_background_color = get_theme_mod('street_food_truck_product_background_color');
	if($street_food_truck_product_background_color != false){
		$street_food_truck_custom_css .='#slider:after{';
			$street_food_truck_custom_css .='background-color: '.esc_attr($street_food_truck_product_background_color).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_about_sec_background_color = get_theme_mod('street_food_truck_about_sec_background_color');
	if($street_food_truck_about_sec_background_color != false){
		$street_food_truck_custom_css .='#about-us{';
			$street_food_truck_custom_css .='background-color: '.esc_attr($street_food_truck_about_sec_background_color).';';
		$street_food_truck_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$street_food_truck_copyright_alingment = get_theme_mod('street_food_truck_copyright_alingment');
	if($street_food_truck_copyright_alingment != false){
		$street_food_truck_custom_css .='.copyright p{';
			$street_food_truck_custom_css .='text-align: '.esc_attr($street_food_truck_copyright_alingment).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_copyright_background_color = get_theme_mod('street_food_truck_copyright_background_color');
	if($street_food_truck_copyright_background_color != false){
		$street_food_truck_custom_css .='#footer-2{';
			$street_food_truck_custom_css .='background-color: '.esc_attr($street_food_truck_copyright_background_color).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_footer_background_image = get_theme_mod('street_food_truck_footer_background_image');
	if($street_food_truck_footer_background_image != false){
		$street_food_truck_custom_css .='#footer{';
			$street_food_truck_custom_css .='background: url('.esc_attr($street_food_truck_footer_background_image).')no-repeat;background-size:cover';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_theme_lay = get_theme_mod( 'street_food_truck_img_footer','scroll');
	if($street_food_truck_theme_lay == 'fixed'){
		$street_food_truck_custom_css .='#footer{';
			$street_food_truck_custom_css .='background-attachment: fixed !important; background-position: center !important;';
		$street_food_truck_custom_css .='}';
	}elseif ($street_food_truck_theme_lay == 'scroll'){
		$street_food_truck_custom_css .='#footer{';
			$street_food_truck_custom_css .='background-attachment: scroll !important; background-position: center !important;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_footer_img_position = get_theme_mod('street_food_truck_footer_img_position','center center');
	if($street_food_truck_footer_img_position != false){
		$street_food_truck_custom_css .='#footer{';
			$street_food_truck_custom_css .='background-position: '.esc_attr($street_food_truck_footer_img_position).'!important;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_footer_widgets_heading = get_theme_mod( 'street_food_truck_footer_widgets_heading','Left');
    if($street_food_truck_footer_widgets_heading == 'Left'){
		$street_food_truck_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
		$street_food_truck_custom_css .='text-align: left;';
		$street_food_truck_custom_css .='}';
	}else if($street_food_truck_footer_widgets_heading == 'Center'){
		$street_food_truck_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$street_food_truck_custom_css .='text-align: center;';
		$street_food_truck_custom_css .='}';
	}else if($street_food_truck_footer_widgets_heading == 'Right'){
		$street_food_truck_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$street_food_truck_custom_css .='text-align: right;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_footer_widgets_content = get_theme_mod( 'street_food_truck_footer_widgets_content','Left');
    if($street_food_truck_footer_widgets_content == 'Left'){
		$street_food_truck_custom_css .='#footer .widget{';
		$street_food_truck_custom_css .='text-align: left;';
		$street_food_truck_custom_css .='}';
	}else if($street_food_truck_footer_widgets_content == 'Center'){
		$street_food_truck_custom_css .='#footer .widget{';
			$street_food_truck_custom_css .='text-align: center;';
		$street_food_truck_custom_css .='}';
	}else if($street_food_truck_footer_widgets_content == 'Right'){
		$street_food_truck_custom_css .='#footer .widget{';
			$street_food_truck_custom_css .='text-align: right;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_copyright_font_size = get_theme_mod('street_food_truck_copyright_font_size');
	if($street_food_truck_copyright_font_size != false){
		$street_food_truck_custom_css .='#footer-2 a, #footer-2 p{';
			$street_food_truck_custom_css .='font-size: '.esc_attr($street_food_truck_copyright_font_size).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_copyright_alingment = get_theme_mod('street_food_truck_copyright_alingment');
	if($street_food_truck_copyright_alingment != false){
		$street_food_truck_custom_css .='#footer-2 p{';
			$street_food_truck_custom_css .='text-align: '.esc_attr($street_food_truck_copyright_alingment).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_copyright_padding_top_bottom = get_theme_mod('street_food_truck_copyright_padding_top_bottom');
	if($street_food_truck_copyright_padding_top_bottom != false){
		$street_food_truck_custom_css .='#footer-2{';
			$street_food_truck_custom_css .='padding-top: '.esc_attr($street_food_truck_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($street_food_truck_copyright_padding_top_bottom).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_footer_padding = get_theme_mod('street_food_truck_footer_padding');
	if($street_food_truck_footer_padding != false){
		$street_food_truck_custom_css .='#footer{';
			$street_food_truck_custom_css .='padding: '.esc_attr($street_food_truck_footer_padding).' 0;';
		$street_food_truck_custom_css .='}';
	}
	/*-------------- Copyright Alignment ----------------*/

	$street_food_truck_copyright_alingment = get_theme_mod('street_food_truck_copyright_alingment');
	if($street_food_truck_copyright_alingment != false){
		$street_food_truck_custom_css .='.copyright p{';
			$street_food_truck_custom_css .='text-align: '.esc_attr($street_food_truck_copyright_alingment).';';
		$street_food_truck_custom_css .='}';
	}

	/*----------------Scroll to top Settings ------------------*/

	$street_food_truck_scroll_to_top_font_size = get_theme_mod('street_food_truck_scroll_to_top_font_size');
	if($street_food_truck_scroll_to_top_font_size != false){
		$street_food_truck_custom_css .='.scrollup i{';
			$street_food_truck_custom_css .='font-size: '.esc_attr($street_food_truck_scroll_to_top_font_size).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_scroll_to_top_padding = get_theme_mod('street_food_truck_scroll_to_top_padding');
	$street_food_truck_scroll_to_top_padding = get_theme_mod('street_food_truck_scroll_to_top_padding');
	if($street_food_truck_scroll_to_top_padding != false){
		$street_food_truck_custom_css .='.scrollup i{';
			$street_food_truck_custom_css .='padding-top: '.esc_attr($street_food_truck_scroll_to_top_padding).';padding-bottom: '.esc_attr($street_food_truck_scroll_to_top_padding).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_scroll_to_top_width = get_theme_mod('street_food_truck_scroll_to_top_width');
	if($street_food_truck_scroll_to_top_width != false){
		$street_food_truck_custom_css .='.scrollup i{';
			$street_food_truck_custom_css .='width: '.esc_attr($street_food_truck_scroll_to_top_width).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_scroll_to_top_height = get_theme_mod('street_food_truck_scroll_to_top_height');
	if($street_food_truck_scroll_to_top_height != false){
		$street_food_truck_custom_css .='.scrollup i{';
			$street_food_truck_custom_css .='height: '.esc_attr($street_food_truck_scroll_to_top_height).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_scroll_to_top_border_radius = get_theme_mod('street_food_truck_scroll_to_top_border_radius');
	if($street_food_truck_scroll_to_top_border_radius != false){
		$street_food_truck_custom_css .='.scrollup i{';
			$street_food_truck_custom_css .='border-radius: '.esc_attr($street_food_truck_scroll_to_top_border_radius).'px;';
		$street_food_truck_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$street_food_truck_logo_padding = get_theme_mod('street_food_truck_logo_padding');
	if($street_food_truck_logo_padding != false){
		$street_food_truck_custom_css .='.logo{';
			$street_food_truck_custom_css .='padding: '.esc_attr($street_food_truck_logo_padding).' !important;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_logo_margin = get_theme_mod('street_food_truck_logo_margin');
	if($street_food_truck_logo_margin != false){
		$street_food_truck_custom_css .='.logo{';
			$street_food_truck_custom_css .='margin: '.esc_attr($street_food_truck_logo_margin).';';
		$street_food_truck_custom_css .='}';
	}

	// Site title Font Size
	$street_food_truck_site_title_font_size = get_theme_mod('street_food_truck_site_title_font_size');
	if($street_food_truck_site_title_font_size != false){
		$street_food_truck_custom_css .='.logo p.site-title, .logo h1{';
			$street_food_truck_custom_css .='font-size: '.esc_attr($street_food_truck_site_title_font_size).';';
		$street_food_truck_custom_css .='}';
	}

	// Site tagline Font Size
	$street_food_truck_site_tagline_font_size = get_theme_mod('street_food_truck_site_tagline_font_size');
	if($street_food_truck_site_tagline_font_size != false){
		$street_food_truck_custom_css .='.logo p.site-description{';
			$street_food_truck_custom_css .='font-size: '.esc_attr($street_food_truck_site_tagline_font_size).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_site_title_color = get_theme_mod('street_food_truck_site_title_color');
	if($street_food_truck_site_title_color != false){
		$street_food_truck_custom_css .='p.site-title a, .logo h1 a{';
			$street_food_truck_custom_css .='color: '.esc_attr($street_food_truck_site_title_color).'!important;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_site_tagline_color = get_theme_mod('street_food_truck_site_tagline_color');
	if($street_food_truck_site_tagline_color != false){
		$street_food_truck_custom_css .='.logo p.site-description{';
			$street_food_truck_custom_css .='color: '.esc_attr($street_food_truck_site_tagline_color).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_logo_width = get_theme_mod('street_food_truck_logo_width');
	if($street_food_truck_logo_width != false){
		$street_food_truck_custom_css .='.logo img{';
			$street_food_truck_custom_css .='width: '.esc_attr($street_food_truck_logo_width).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_logo_height = get_theme_mod('street_food_truck_logo_height');
	if($street_food_truck_logo_height != false){
		$street_food_truck_custom_css .='.logo img{';
			$street_food_truck_custom_css .='height: '.esc_attr($street_food_truck_logo_height).';object-fit:cover;';
		$street_food_truck_custom_css .='}';
	}

	// Header Background Color
	$street_food_truck_header_background_color = get_theme_mod('street_food_truck_header_background_color');
	if($street_food_truck_header_background_color != false){
		$street_food_truck_custom_css .='.page-template-custom-home-page .home-page-header, .home-page-header{';
			$street_food_truck_custom_css .='background-color: '.esc_attr($street_food_truck_header_background_color).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_header_img_position = get_theme_mod('street_food_truck_header_img_position','center top');
	if($street_food_truck_header_img_position != false){
		$street_food_truck_custom_css .='.page-template-custom-home-page .home-page-header, .home-page-header{';
			$street_food_truck_custom_css .='background-position: '.esc_attr($street_food_truck_header_img_position).'!important;';
		$street_food_truck_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$street_food_truck_theme_lay = get_theme_mod( 'street_food_truck_blog_layout_option','Default');
    if($street_food_truck_theme_lay == 'Default'){
		$street_food_truck_custom_css .='.post-main-box{';
			$street_food_truck_custom_css .='';
		$street_food_truck_custom_css .='}';
	}else if($street_food_truck_theme_lay == 'Center'){
		$street_food_truck_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$street_food_truck_custom_css .='text-align:center;';
		$street_food_truck_custom_css .='}';
		$street_food_truck_custom_css .='.post-info{';
			$street_food_truck_custom_css .='margin-top:10px;';
		$street_food_truck_custom_css .='}';
		$street_food_truck_custom_css .='.post-info hr{';
			$street_food_truck_custom_css .='margin:15px auto;';
		$street_food_truck_custom_css .='}';
	}else if($street_food_truck_theme_lay == 'Left'){
		$street_food_truck_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$street_food_truck_custom_css .='text-align:Left;';
		$street_food_truck_custom_css .='}';
		$street_food_truck_custom_css .='.post-info hr{';
			$street_food_truck_custom_css .='margin-bottom:10px;';
		$street_food_truck_custom_css .='}';
		$street_food_truck_custom_css .='.post-main-box h2{';
			$street_food_truck_custom_css .='margin-top:10px;';
		$street_food_truck_custom_css .='}';
		$street_food_truck_custom_css .='.service-text .more-btn{';
			$street_food_truck_custom_css .='display:inline-block;';
		$street_food_truck_custom_css .='}';
	}

	/*--------------------- Blog Page Posts -------------------*/

	$street_food_truck_blog_page_posts_settings = get_theme_mod( 'street_food_truck_blog_page_posts_settings','Into Blocks');
    if($street_food_truck_blog_page_posts_settings == 'Without Blocks'){
		$street_food_truck_custom_css .='.post-main-box{';
			$street_food_truck_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$street_food_truck_custom_css .='}';
	}

	// featured image dimention
	$street_food_truck_blog_post_featured_image_dimension = get_theme_mod('street_food_truck_blog_post_featured_image_dimension', 'default');
	$street_food_truck_blog_post_featured_image_custom_width = get_theme_mod('street_food_truck_blog_post_featured_image_custom_width',250);
	$street_food_truck_blog_post_featured_image_custom_height = get_theme_mod('street_food_truck_blog_post_featured_image_custom_height',250);
	if($street_food_truck_blog_post_featured_image_dimension == 'custom'){
		$street_food_truck_custom_css .='.post-main-box img{';
			$street_food_truck_custom_css .='width: '.esc_attr($street_food_truck_blog_post_featured_image_custom_width).'!important; height: '.esc_attr($street_food_truck_blog_post_featured_image_custom_height).';';
		$street_food_truck_custom_css .='}';
	}

	/*---------------- Posts Settings ------------------*/

	$street_food_truck_featured_image_border_radius = get_theme_mod('street_food_truck_featured_image_border_radius', 0);
	if($street_food_truck_featured_image_border_radius != false){
		$street_food_truck_custom_css .='.box-image img, .feature-box img{';
			$street_food_truck_custom_css .='border-radius: '.esc_attr($street_food_truck_featured_image_border_radius).'px;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_featured_image_box_shadow = get_theme_mod('street_food_truck_featured_image_box_shadow',0);
	if($street_food_truck_featured_image_box_shadow != false){
		$street_food_truck_custom_css .='.box-image img, #content-vw img{';
			$street_food_truck_custom_css .='box-shadow: '.esc_attr($street_food_truck_featured_image_box_shadow).'px '.esc_attr($street_food_truck_featured_image_box_shadow).'px '.esc_attr($street_food_truck_featured_image_box_shadow).'px #cccccc;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_related_image_box_shadow = get_theme_mod('street_food_truck_related_image_box_shadow',0);
	if($street_food_truck_related_image_box_shadow != false){
		$street_food_truck_custom_css .='.related-post .box-image img{';
			$street_food_truck_custom_css .='box-shadow: '.esc_attr($street_food_truck_related_image_box_shadow).'px '.esc_attr($street_food_truck_related_image_box_shadow).'px '.esc_attr($street_food_truck_related_image_box_shadow).'px #cccccc;';
		$street_food_truck_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$street_food_truck_button_letter_spacing = get_theme_mod('street_food_truck_button_letter_spacing',14);
	$street_food_truck_custom_css .='.post-main-box .more-btn{';
		$street_food_truck_custom_css .='letter-spacing: '.esc_attr($street_food_truck_button_letter_spacing).';';
	$street_food_truck_custom_css .='}';

	$street_food_truck_button_border_radius = get_theme_mod('street_food_truck_button_border_radius');
	if($street_food_truck_button_border_radius != false){
		$street_food_truck_custom_css .='.post-main-box .more-btn a{';
			$street_food_truck_custom_css .='border-radius: '.esc_attr($street_food_truck_button_border_radius).'px !important;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_button_top_bottom_padding = get_theme_mod('street_food_truck_button_top_bottom_padding');
	$street_food_truck_button_left_right_padding = get_theme_mod('street_food_truck_button_left_right_padding');
	if($street_food_truck_button_top_bottom_padding != false || $street_food_truck_button_left_right_padding != false){
		$street_food_truck_custom_css .='.post-main-box .more-btn{';
			$street_food_truck_custom_css .='padding-top: '.esc_attr($street_food_truck_button_top_bottom_padding).'!important; padding-bottom: '.esc_attr($street_food_truck_button_top_bottom_padding).'!important;padding-left: '.esc_attr($street_food_truck_button_left_right_padding).'!important;padding-right: '.esc_attr($street_food_truck_button_left_right_padding).'!important;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_button_font_size = get_theme_mod('street_food_truck_button_font_size',14);
	$street_food_truck_custom_css .='.post-main-box .more-btn a{';
		$street_food_truck_custom_css .='font-size: '.esc_attr($street_food_truck_button_font_size).';';
	$street_food_truck_custom_css .='}';

	$street_food_truck_theme_lay = get_theme_mod( 'street_food_truck_button_text_transform','Capitalize');
	if($street_food_truck_theme_lay == 'Capitalize'){
		$street_food_truck_custom_css .='.post-main-box .more-btn a{';
			$street_food_truck_custom_css .='text-transform:Capitalize;';
		$street_food_truck_custom_css .='}';
	}
	if($street_food_truck_theme_lay == 'Lowercase'){
		$street_food_truck_custom_css .='.post-main-box .more-btn a{';
			$street_food_truck_custom_css .='text-transform:Lowercase;';
		$street_food_truck_custom_css .='}';
	}
	if($street_food_truck_theme_lay == 'Uppercase'){
		$street_food_truck_custom_css .='.post-main-box .more-btn a{';
			$street_food_truck_custom_css .='text-transform:Uppercase;';
		$street_food_truck_custom_css .='}';
	}

	/*---------------- Single Blog Page Settings ------------------*/

	$street_food_truck_single_blog_comment_button_text = get_theme_mod('street_food_truck_single_blog_comment_button_text', 'Post Comment');
	if($street_food_truck_single_blog_comment_button_text == ''){
		$street_food_truck_custom_css .='#comments p.form-submit {';
			$street_food_truck_custom_css .='display: none;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_comment_width = get_theme_mod('street_food_truck_single_blog_comment_width');
	if($street_food_truck_comment_width != false){
		$street_food_truck_custom_css .='#comments textarea{';
			$street_food_truck_custom_css .='width: '.esc_attr($street_food_truck_comment_width).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_single_blog_post_navigation_show_hide = get_theme_mod('street_food_truck_single_blog_post_navigation_show_hide',true);
	if($street_food_truck_single_blog_post_navigation_show_hide != true){
		$street_food_truck_custom_css .='.post-navigation{';
			$street_food_truck_custom_css .='display: none;';
		$street_food_truck_custom_css .='}';
	}

	/*--------------------- Grid Posts Posts -------------------*/

	$street_food_truck_display_grid_posts_settings = get_theme_mod( 'street_food_truck_display_grid_posts_settings','Into Blocks');
    if($street_food_truck_display_grid_posts_settings == 'Without Blocks'){
		$street_food_truck_custom_css .='.grid-post-main-box{';
			$street_food_truck_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_grid_featured_image_box_shadow = get_theme_mod('street_food_truck_grid_featured_image_box_shadow',0);
	if($street_food_truck_grid_featured_image_box_shadow != false){
		$street_food_truck_custom_css .='.grid-post-main-box .box-image img, .grid-post-main-box .feature-box img, #content-vw img{';
			$street_food_truck_custom_css .='box-shadow: '.esc_attr($street_food_truck_grid_featured_image_box_shadow).'px '.esc_attr($street_food_truck_grid_featured_image_box_shadow).'px '.esc_attr($street_food_truck_grid_featured_image_box_shadow).'px #cccccc;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_grid_featured_image_border_radius = get_theme_mod('street_food_truck_grid_featured_image_border_radius', 0);
	if($street_food_truck_grid_featured_image_border_radius != false){
		$street_food_truck_custom_css .='.grid-post-main-box .box-image img, .grid-post-main-box .feature-box img, #content-vw img{';
			$street_food_truck_custom_css .='border-radius: '.esc_attr($street_food_truck_grid_featured_image_border_radius).'px;';
		$street_food_truck_custom_css .='}';
	}
	/*----------------Woocommerce Products Settings ------------------*/

	$street_food_truck_related_product_show_hide = get_theme_mod('street_food_truck_related_product_show_hide',true);
	if($street_food_truck_related_product_show_hide != true){
		$street_food_truck_custom_css .='.related.products{';
			$street_food_truck_custom_css .='display: none;';
		$street_food_truck_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$street_food_truck_products_padding_top_bottom = get_theme_mod('street_food_truck_products_padding_top_bottom');
	if($street_food_truck_products_padding_top_bottom != false){
		$street_food_truck_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$street_food_truck_custom_css .='padding-top: '.esc_attr($street_food_truck_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($street_food_truck_products_padding_top_bottom).'!important;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_products_padding_left_right = get_theme_mod('street_food_truck_products_padding_left_right');
	if($street_food_truck_products_padding_left_right != false){
		$street_food_truck_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$street_food_truck_custom_css .='padding-left: '.esc_attr($street_food_truck_products_padding_left_right).'!important; padding-right: '.esc_attr($street_food_truck_products_padding_left_right).'!important;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_products_box_shadow = get_theme_mod('street_food_truck_products_box_shadow');
	if($street_food_truck_products_box_shadow != false){
		$street_food_truck_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$street_food_truck_custom_css .='box-shadow: '.esc_attr($street_food_truck_products_box_shadow).'px '.esc_attr($street_food_truck_products_box_shadow).'px '.esc_attr($street_food_truck_products_box_shadow).'px #ddd;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_products_border_radius = get_theme_mod('street_food_truck_products_border_radius');
	if($street_food_truck_products_border_radius != false){
		$street_food_truck_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$street_food_truck_custom_css .='border-radius: '.esc_attr($street_food_truck_products_border_radius).'px;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_products_btn_padding_top_bottom = get_theme_mod('street_food_truck_products_btn_padding_top_bottom');
	if($street_food_truck_products_btn_padding_top_bottom != false){
		$street_food_truck_custom_css .='.woocommerce a.button{';
			$street_food_truck_custom_css .='padding-top: '.esc_attr($street_food_truck_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($street_food_truck_products_btn_padding_top_bottom).' !important;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_products_btn_padding_left_right = get_theme_mod('street_food_truck_products_btn_padding_left_right');
	if($street_food_truck_products_btn_padding_left_right != false){
		$street_food_truck_custom_css .='.woocommerce a.button{';
			$street_food_truck_custom_css .='padding-left: '.esc_attr($street_food_truck_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($street_food_truck_products_btn_padding_left_right).' !important;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_products_button_border_radius = get_theme_mod('street_food_truck_products_button_border_radius', 0);
	if($street_food_truck_products_button_border_radius != false){
		$street_food_truck_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce a.button{';
			$street_food_truck_custom_css .='border-radius: '.esc_attr($street_food_truck_products_button_border_radius).'px !important;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_woocommerce_sale_position = get_theme_mod( 'street_food_truck_woocommerce_sale_position','right');
    if($street_food_truck_woocommerce_sale_position == 'left'){
		$street_food_truck_custom_css .='.woocommerce ul.products li.product .onsale{';
			$street_food_truck_custom_css .='left: 14px !important; right: auto !important;';
		$street_food_truck_custom_css .='}';
	}else if($street_food_truck_woocommerce_sale_position == 'right'){
		$street_food_truck_custom_css .='.woocommerce ul.products li.product .onsale{';
			$street_food_truck_custom_css .='left: auto!important; right: 14px !important;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_woocommerce_sale_font_size = get_theme_mod('street_food_truck_woocommerce_sale_font_size');
	if($street_food_truck_woocommerce_sale_font_size != false){
		$street_food_truck_custom_css .='.woocommerce span.onsale{';
			$street_food_truck_custom_css .='font-size: '.esc_attr($street_food_truck_woocommerce_sale_font_size).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_woocommerce_sale_padding_top_bottom = get_theme_mod('street_food_truck_woocommerce_sale_padding_top_bottom');
	if($street_food_truck_woocommerce_sale_padding_top_bottom != false){
		$street_food_truck_custom_css .='.woocommerce span.onsale{';
			$street_food_truck_custom_css .='padding-top: '.esc_attr($street_food_truck_woocommerce_sale_padding_top_bottom).'; padding-bottom: '.esc_attr($street_food_truck_woocommerce_sale_padding_top_bottom).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_woocommerce_sale_padding_left_right = get_theme_mod('street_food_truck_woocommerce_sale_padding_left_right');
	if($street_food_truck_woocommerce_sale_padding_left_right != false){
		$street_food_truck_custom_css .='.woocommerce span.onsale{';
			$street_food_truck_custom_css .='padding-left: '.esc_attr($street_food_truck_woocommerce_sale_padding_left_right).'; padding-right: '.esc_attr($street_food_truck_woocommerce_sale_padding_left_right).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_woocommerce_sale_border_radius = get_theme_mod('street_food_truck_woocommerce_sale_border_radius', 0);
	if($street_food_truck_woocommerce_sale_border_radius != false){
		$street_food_truck_custom_css .='.woocommerce span.onsale{';
			$street_food_truck_custom_css .='border-radius: '.esc_attr($street_food_truck_woocommerce_sale_border_radius).'px;';
		$street_food_truck_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$street_food_truck_sticky_header_padding = get_theme_mod('street_food_truck_sticky_header_padding');
	if($street_food_truck_sticky_header_padding != false){
		$street_food_truck_custom_css .='.header-fixed{';
			$street_food_truck_custom_css .='padding: '.esc_attr($street_food_truck_sticky_header_padding).';';
		$street_food_truck_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$street_food_truck_social_icon_font_size = get_theme_mod('street_food_truck_social_icon_font_size');
	if($street_food_truck_social_icon_font_size != false){
		$street_food_truck_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$street_food_truck_custom_css .='font-size: '.esc_attr($street_food_truck_social_icon_font_size).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_social_icon_padding = get_theme_mod('street_food_truck_social_icon_padding');
	if($street_food_truck_social_icon_padding != false){
		$street_food_truck_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$street_food_truck_custom_css .='padding: '.esc_attr($street_food_truck_social_icon_padding).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_social_icon_width = get_theme_mod('street_food_truck_social_icon_width');
	if($street_food_truck_social_icon_width != false){
		$street_food_truck_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$street_food_truck_custom_css .='width: '.esc_attr($street_food_truck_social_icon_width).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_social_icon_height = get_theme_mod('street_food_truck_social_icon_height');
	if($street_food_truck_social_icon_height != false){
		$street_food_truck_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$street_food_truck_custom_css .='height: '.esc_attr($street_food_truck_social_icon_height).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_social_icon_border_radius = get_theme_mod('street_food_truck_social_icon_border_radius');
	if($street_food_truck_social_icon_border_radius != false){
		$street_food_truck_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$street_food_truck_custom_css .='border-radius: '.esc_attr($street_food_truck_social_icon_border_radius).'px;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_resp_menu_toggle_btn_bg_color = get_theme_mod('street_food_truck_resp_menu_toggle_btn_bg_color');
	if($street_food_truck_resp_menu_toggle_btn_bg_color != false){
		$street_food_truck_custom_css .='.toggle-nav i,#mySidenav .closebtn{';
			$street_food_truck_custom_css .='background: '.esc_attr($street_food_truck_resp_menu_toggle_btn_bg_color).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_singlepost_image_box_shadow = get_theme_mod('street_food_truck_singlepost_image_box_shadow',0);
	if($street_food_truck_singlepost_image_box_shadow != false){
		$street_food_truck_custom_css .='.feature-box img{';
			$street_food_truck_custom_css .='box-shadow: '.esc_attr($street_food_truck_singlepost_image_box_shadow).'px '.esc_attr($street_food_truck_singlepost_image_box_shadow).'px '.esc_attr($street_food_truck_singlepost_image_box_shadow).'px #cccccc;';
		$street_food_truck_custom_css .='}';
	}

	/*-------------- Menus Setings ----------------*/

	$street_food_truck_navigation_menu_font_size = get_theme_mod('street_food_truck_navigation_menu_font_size');
	if($street_food_truck_navigation_menu_font_size != false){
		$street_food_truck_custom_css .='.main-navigation ul a{';
			$street_food_truck_custom_css .='font-size: '.esc_attr($street_food_truck_navigation_menu_font_size).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_navigation_menu_font_weight = get_theme_mod('street_food_truck_navigation_menu_font_weight','600');
	if($street_food_truck_navigation_menu_font_weight != false){
		$street_food_truck_custom_css .='.main-navigation ul a{';
			$street_food_truck_custom_css .='font-weight: '.esc_attr($street_food_truck_navigation_menu_font_weight).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_theme_lay = get_theme_mod( 'street_food_truck_menu_text_transform','Capitalize');
	if($street_food_truck_theme_lay == 'Capitalize'){
		$street_food_truck_custom_css .='.main-navigation ul a{';
			$street_food_truck_custom_css .='text-transform:Capitalize;';
		$street_food_truck_custom_css .='}';
	}
	if($street_food_truck_theme_lay == 'Lowercase'){
		$street_food_truck_custom_css .='.main-navigation ul a{';
			$street_food_truck_custom_css .='text-transform:Lowercase;';
		$street_food_truck_custom_css .='}';
	}
	if($street_food_truck_theme_lay == 'Uppercase'){
		$street_food_truck_custom_css .='.main-navigation ul a{';
			$street_food_truck_custom_css .='text-transform:Uppercase;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_header_menus_color = get_theme_mod('street_food_truck_header_menus_color');
	if($street_food_truck_header_menus_color != false){
		$street_food_truck_custom_css .='.main-navigation ul a{';
			$street_food_truck_custom_css .='color: '.esc_attr($street_food_truck_header_menus_color).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_header_menus_hover_color = get_theme_mod('street_food_truck_header_menus_hover_color');
	if($street_food_truck_header_menus_hover_color != false){
		$street_food_truck_custom_css .='.main-navigation ul a:hover{';
			$street_food_truck_custom_css .='color: '.esc_attr($street_food_truck_header_menus_hover_color).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_header_submenus_color = get_theme_mod('street_food_truck_header_submenus_color');
	if($street_food_truck_header_submenus_color != false){
		$street_food_truck_custom_css .='.main-navigation ul ul a{';
			$street_food_truck_custom_css .='color: '.esc_attr($street_food_truck_header_submenus_color).';';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_header_submenus_hover_color = get_theme_mod('street_food_truck_header_submenus_hover_color');
	if($street_food_truck_header_submenus_hover_color != false){
		$street_food_truck_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$street_food_truck_custom_css .='color: '.esc_attr($street_food_truck_header_submenus_hover_color).'!important;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_menus_item = get_theme_mod( 'street_food_truck_menus_item_style','None');
    if($street_food_truck_menus_item == 'None'){
		$street_food_truck_custom_css .='.main-navigation ul a{';
			$street_food_truck_custom_css .='';
		$street_food_truck_custom_css .='}';
	}else if($street_food_truck_menus_item == 'Zoom In'){
		$street_food_truck_custom_css .='.main-navigation ul a:hover{';
			$street_food_truck_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important;';
		$street_food_truck_custom_css .='}';
	}

	/*---------------------------Footer Style -------------------*/

	$street_food_truck_theme_lay = get_theme_mod( 'street_food_truck_footer_template','street_food_truck-footer-one');
    if($street_food_truck_theme_lay == 'street_food_truck-footer-one'){
		$street_food_truck_custom_css .='#footer{';
			$street_food_truck_custom_css .='';
		$street_food_truck_custom_css .='}';

	}else if($street_food_truck_theme_lay == 'street_food_truck-footer-two'){
		$street_food_truck_custom_css .='#footer{';
			$street_food_truck_custom_css .='background: linear-gradient(to right, #f9f8ff, #dedafa);';
		$street_food_truck_custom_css .='}';
		$street_food_truck_custom_css .='#footer p, #footer li a, #footer, #footer h3, #footer a.rsswidget, #footer #wp-calendar a, .copyright a, #footer .custom_details, #footer ins span, #footer .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, #footer table, #footer th, #footer td, #footer caption, #sidebar caption,#footer nav.wp-calendar-nav a,#footer .search-form .search-field{';
			$street_food_truck_custom_css .='color:#000;';
		$street_food_truck_custom_css .='}';
		$street_food_truck_custom_css .='#footer ul li::before{';
			$street_food_truck_custom_css .='background:#000;';
		$street_food_truck_custom_css .='}';
		$street_food_truck_custom_css .='#footer table, #footer th, #footer td,#footer .search-form .search-field,#footer .tagcloud a{';
			$street_food_truck_custom_css .='border: 1px solid #000;';
		$street_food_truck_custom_css .='}';

	}else if($street_food_truck_theme_lay == 'street_food_truck-footer-three'){
		$street_food_truck_custom_css .='#footer{';
			$street_food_truck_custom_css .='background: #232524;';
		$street_food_truck_custom_css .='}';
	}
	else if($street_food_truck_theme_lay == 'street_food_truck-footer-four'){
		$street_food_truck_custom_css .='#footer{';
			$street_food_truck_custom_css .='background: #222E39;';
		$street_food_truck_custom_css .='}';
		$street_food_truck_custom_css .='#footer p, #footer li a, #footer, #footer h3, #footer a.rsswidget, #footer #wp-calendar a, .copyright a, #footer .custom_details, #footer ins span, #footer .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, #footer table, #footer th, #footer td, #footer caption, #sidebar caption,#footer nav.wp-calendar-nav a,#footer .search-form .search-field{';
			$street_food_truck_custom_css .='color:#fff;';
		$street_food_truck_custom_css .='}';
		$street_food_truck_custom_css .='#footer ul li::before{';
			$street_food_truck_custom_css .='background:#fff;';
		$street_food_truck_custom_css .='}';
		$street_food_truck_custom_css .='#footer table, #footer th, #footer td,#footer .search-form .search-field,#footer .tagcloud a{';
			$street_food_truck_custom_css .='border: 1px solid #fff;';
		$street_food_truck_custom_css .='}';
	}
	else if($street_food_truck_theme_lay == 'street_food_truck-footer-five'){
		$street_food_truck_custom_css .='#footer{';
			$street_food_truck_custom_css .='background: linear-gradient(to right, #01093a, #2d0b00);';
		$street_food_truck_custom_css .='}';
	}

	/*---------------- Footer Settings ------------------*/

	$street_food_truck_button_footer_heading_letter_spacing = get_theme_mod('street_food_truck_button_footer_heading_letter_spacing',1);
	$street_food_truck_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
		$street_food_truck_custom_css .='letter-spacing: '.esc_attr($street_food_truck_button_footer_heading_letter_spacing).'px;';
	$street_food_truck_custom_css .='}';

	$street_food_truck_button_footer_font_size = get_theme_mod('street_food_truck_button_footer_font_size','30');
	$street_food_truck_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
		$street_food_truck_custom_css .='font-size: '.esc_attr($street_food_truck_button_footer_font_size).'px;';
	$street_food_truck_custom_css .='}';

	$street_food_truck_theme_lay = get_theme_mod( 'street_food_truck_button_footer_text_transform','Capitalize');
	if($street_food_truck_theme_lay == 'Capitalize'){
		$street_food_truck_custom_css .='#footer h3{';
			$street_food_truck_custom_css .='text-transform:Capitalize;';
		$street_food_truck_custom_css .='}';
	}
	if($street_food_truck_theme_lay == 'Lowercase'){
		$street_food_truck_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
			$street_food_truck_custom_css .='text-transform:Lowercase;';
		$street_food_truck_custom_css .='}';
	}
	if($street_food_truck_theme_lay == 'Uppercase'){
		$street_food_truck_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
			$street_food_truck_custom_css .='text-transform:Uppercase;';
		$street_food_truck_custom_css .='}';
	}

	$street_food_truck_footer_heading_weight = get_theme_mod('street_food_truck_footer_heading_weight','600');
	if($street_food_truck_footer_heading_weight != false){
		$street_food_truck_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
			$street_food_truck_custom_css .='font-weight: '.esc_attr($street_food_truck_footer_heading_weight).';';
		$street_food_truck_custom_css .='}';
	}
	
	$street_food_truck_slider_first_color = get_theme_mod('street_food_truck_slider_first_color');

	$street_food_truck_slider_second_color = get_theme_mod('street_food_truck_slider_second_color');

	if($street_food_truck_slider_first_color != false || $street_food_truck_slider_second_color != false){
		$street_food_truck_custom_css .='.box{
		background: linear-gradient(to top, '.esc_attr($street_food_truck_slider_first_color).', '.esc_attr($street_food_truck_slider_second_color).');
		}';
	}

	$street_food_truck_services_icon_color = get_theme_mod('street_food_truck_services_icon_color');
	if($street_food_truck_services_icon_color != false){
		$street_food_truck_custom_css .='#about-sec i{';
			$street_food_truck_custom_css .='color: '.esc_attr($street_food_truck_services_icon_color).';';
		$street_food_truck_custom_css .='}';
	}