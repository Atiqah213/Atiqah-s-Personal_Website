<?php

	$adventure_camping_custom_css= "";

	/*-------------------- Highlight Color -------------------*/

	$adventure_camping_first_color = get_theme_mod('adventure_camping_first_color');
	$adventure_camping_second_color = get_theme_mod('adventure_camping_second_color');

	if($adventure_camping_first_color != false){
		$adventure_camping_custom_css .='#sidebar .wp-block-tag-cloud a:hover, #footer, .custom-about-us a.custom_read_more, #footer .wp-block-tag-cloud a:hover, table.compare-list .add-to-cart td a:not(.unstyled_button), .top-header, .home-page-header .main-topbar, #comments input[type="submit"]:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.widget_product_search button:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button:disabled[disabled]:hover, #sidebar .wp-block-search .wp-block-search__button:hover, #banner .topbar-social-icon i, #banner .inner_carousel .banner-btn a, #camp-section .section-title:after, .more-btn a , #comments input[type="submit"],#comments a.comment-reply-link,input[type="submit"],.woocommerce #respond input#submit, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.pro-button a, .woocommerce a.added_to_cart.wc-forward, .page-template-custom-home-page .topbar i.fas.fa-phone.me-2:hover, .topbar i.fas.fa-phone.me-2:hover,.post-nav-links span:hover, .post-nav-links a:hover, #comments input[type="submit"]:hover, #comments a.comment-reply-link:hover, .more-btn a:hover, #comments a.comment-reply-link:hover,.pagination a:hover,#footer .tagcloud a:hover, .pro-button a:hover, #preloader, #footer-2, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, .copyright .custom-social-icons i:hover, .scrollup i, .bradcrumbs a, .post-categories li a, .bradcrumbs a:hover, .post-categories li a:hover, .bradcrumbs span, nav.navigation.posts-navigation .nav-previous a, nav.navigation.posts-navigation .nav-next a, #sidebar .custom-social-icons a, #sidebar .custom-social-icons a:hover, #footer .custom-social-icons a:hover, #sidebar h3:before,#sidebar .widget_block h3:before, #sidebar h2:before, #sidebar label.wp-block-search__label:before, #sidebar .tagcloud a:hover, .pagination span, .pagination a, .post-nav-links span, .post-nav-links a, .pagination a:hover, .pagination .current, .woocommerce span.onsale, nav.woocommerce-MyAccount-navigation ul li, nav.woocommerce-MyAccount-navigation ul li:hover, .woocommerce ul.products li.product .button, .woocommerce a.added_to_cart.wc-forward,a.added_to_cart.wc-forward, .wishlist-items-wrapper .product-add-to-cart a, .wishlist_table.mobile .product-add-to-cart a, a.button.product_type_simple.add_to_cart_button.ajax_add_to_cart:hover, a.button.product_type_simple.add_to_cart_button.ajax_add_to_cart, header.woocommerce-Address-title.title a, #tag-cloud-sec .tag-cloud-link{';
			$adventure_camping_custom_css .='background: '.esc_attr($adventure_camping_first_color).';';
		$adventure_camping_custom_css .='}';
	}

	if($adventure_camping_first_color != false){
		$adventure_camping_custom_css .='.woocommerce-pagination .page-numbers.current, .woocommerce-pagination a.page-numbers:hover, a.added_to_cart.wc-forward:hover,header.woocommerce-Address-title.title a:hover,#tag-cloud-sec .tag-cloud-link:hover,.wc-block-grid__product-add-to-cart.wp-block-button .wp-block-button__link:hover, #sidebar ul li::before, .wc-block-grid__product-onsale, .wp-block-woocommerce-cart .wc-block-cart__submit-button, .wc-block-components-checkout-place-order-button, .wc-block-components-totals-coupon__button, .wp-block-woocommerce-cart .wc-block-cart__submit-button:hover, .wc-block-components-checkout-place-order-button:hover, .wc-block-components-totals-coupon__button:hover, .wp-block-woocommerce-cart .wc-block-components-product-badge, .wc-block-components-order-summary-item__quantity, header.woocommerce-Address-title.title a:hover,#tag-cloud-sec .tag-cloud-link:hover,.wc-block-grid__product-add-to-cart.wp-block-button .wp-block-button__link:hover{';
			$adventure_camping_custom_css .='background: '.esc_attr($adventure_camping_first_color).'!important;';
		$adventure_camping_custom_css .='}';
	}

	if($adventure_camping_first_color != false){
		$adventure_camping_custom_css .='a, a:hover, .sticky .post-main-box h2:before, .menu-bar-sec i, .home-page-header .main-topbar .top-icons a, .home-page-header .main-topbar .top-icons a i, #banner .topbar-social-icon i:hover, #banner .inner_carousel .banner-title, #banner .inner_carousel .banner-btn a:hover, #camp-section .camp-box .post-btn i, #camp-section .camp-box:hover .camp-heading a, #camp-section .owl-nav button i, .post-main-box:hover h2 a, .post-main-box:hover .post-info span a, .single-post .post-info:hover a, .middle-bar h6, .grid-post-main-box:hover h2 a, .grid-post-main-box:hover .post-info span a, #sidebar ul li:hover, .woocommerce-error::before, .post-navigation span.meta-nav, .post-navigation span.meta-nav:hover, .yith-wcwl-wishlistaddedbrowse span.feedback, .yith-wcwl-wishlistexistsbrowse span.feedback, .wishlist_table .product-name a, .wishlist_table.mobile .product-name a, .woocommerce-message::before,.woocommerce-info::before{';
			$adventure_camping_custom_css .='color: '.esc_attr($adventure_camping_first_color).';';
		$adventure_camping_custom_css .='}';
	}

	if($adventure_camping_first_color != false){
		$adventure_camping_custom_css .='.tags-bg a:hover, #footer .custom-social-icons a:hover{';
			$adventure_camping_custom_css .='color: '.esc_attr($adventure_camping_first_color).'!important;';
		$adventure_camping_custom_css .='}';
	}

	if($adventure_camping_first_color != false){
		$adventure_camping_custom_css .='#banner .inner_carousel .title-bg svg, #camp-section .title-bg svg{';
			$adventure_camping_custom_css .='fill: '.esc_attr($adventure_camping_first_color).';';
		$adventure_camping_custom_css .='}';
	}

	if($adventure_camping_first_color != false){
		$adventure_camping_custom_css .='#camp-section .owl-nav button i, .post-main-box, .grid-post-main-box, #sidebar .widget{';
			$adventure_camping_custom_css .='border-color: '.esc_attr($adventure_camping_first_color).';';
		$adventure_camping_custom_css .='}';
	}

	if($adventure_camping_first_color != false){
		$adventure_camping_custom_css .='.header-fixed, .main-navigation ul ul, .header-fixed, #sidebar .widget{';
			$adventure_camping_custom_css .='border-bottom-color: '.esc_attr($adventure_camping_first_color).';';
		$adventure_camping_custom_css .='}';
	}

	if($adventure_camping_first_color != false){
		$adventure_camping_custom_css .='.main-navigation ul ul, #sidebar .widget, .woocommerce-error, .woocommerce-message,.woocommerce-info{';
			$adventure_camping_custom_css .='border-top-color: '.esc_attr($adventure_camping_first_color).';';
		$adventure_camping_custom_css .='}';
	}

	if($adventure_camping_first_color != false){
		$adventure_camping_custom_css .='#sidebar .widget{';
			$adventure_camping_custom_css .='border-right-color: '.esc_attr($adventure_camping_first_color).';';
		$adventure_camping_custom_css .='}';
	}

	if($adventure_camping_first_color != false){
		$adventure_camping_custom_css .='#sidebar .widget{';
			$adventure_camping_custom_css .='border-left-color: '.esc_attr($adventure_camping_first_color).';';
		$adventure_camping_custom_css .='}';
	}

	if($adventure_camping_first_color != false){
		$adventure_camping_custom_css .='#footer .custom-social-icons a:hover{';
			$adventure_camping_custom_css .='outline: 6px double '.esc_attr($adventure_camping_first_color).';';
		$adventure_camping_custom_css .='}';
	}

	if($adventure_camping_first_color != false || $adventure_camping_first_color != false){
		$adventure_camping_custom_css .='@media screen and (max-width:1000px) {';
			$adventure_camping_custom_css .='#mySidenav .closebtn{';
				$adventure_camping_custom_css .='background: '.esc_attr($adventure_camping_first_color).';';
			$adventure_camping_custom_css .='}';
			$adventure_camping_custom_css .='.toggle-nav i{';
				$adventure_camping_custom_css .='color: '.esc_attr($adventure_camping_first_color).';';
			$adventure_camping_custom_css .='}';
			$adventure_camping_custom_css .='.main-navigation a:hover{';
				$adventure_camping_custom_css .='color: '.esc_attr($adventure_camping_first_color).' !important;';
			$adventure_camping_custom_css .='}';
		$adventure_camping_custom_css .='}';
	}

	// Second Color
	if($adventure_camping_second_color != false){
		$adventure_camping_custom_css .='#banner, #camp-section .camp-box .post-btn i{';
			$adventure_camping_custom_css .='background: '.esc_attr($adventure_camping_second_color).';';
		$adventure_camping_custom_css .='}';
	}

	if($adventure_camping_second_color != false){
		$adventure_camping_custom_css .='#camp-section .camp-box:hover .classes-inner-box img{';
			$adventure_camping_custom_css .='border-bottom-color: '.esc_attr($adventure_camping_second_color).';';
		$adventure_camping_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$adventure_camping_theme_lay = get_theme_mod( 'adventure_camping_width_option','Full Width');
    if($adventure_camping_theme_lay == 'Boxed'){
		$adventure_camping_custom_css .='body{';
			$adventure_camping_custom_css .='max-width: 1140px; width: 100%; margin-right: auto; margin-left: auto;';
		$adventure_camping_custom_css .='}';
		$adventure_camping_custom_css .='.scrollup i{';
			$adventure_camping_custom_css .='right: 100px;';
		$adventure_camping_custom_css .='}';
		$adventure_camping_custom_css .='.row.outer-logo{';
			$adventure_camping_custom_css .='margin-left: 0px;';
		$adventure_camping_custom_css .='}';
	}else if($adventure_camping_theme_lay == 'Wide Width'){
		$adventure_camping_custom_css .='body{';
			$adventure_camping_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$adventure_camping_custom_css .='}';
		$adventure_camping_custom_css .='.scrollup i{';
			$adventure_camping_custom_css .='right: 30px;';
		$adventure_camping_custom_css .='}';
		$adventure_camping_custom_css .='.row.outer-logo{';
			$adventure_camping_custom_css .='margin-left: 0px;';
		$adventure_camping_custom_css .='}';
	}else if($adventure_camping_theme_lay == 'Full Width'){
		$adventure_camping_custom_css .='body{';
			$adventure_camping_custom_css .='max-width: 100%;';
		$adventure_camping_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$adventure_camping_sticky_header_padding = get_theme_mod('adventure_camping_sticky_header_padding');
	if($adventure_camping_sticky_header_padding != false){
		$adventure_camping_custom_css .='.header-fixed{';
			$adventure_camping_custom_css .='padding: '.esc_attr($adventure_camping_sticky_header_padding).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_responsive_preloader_hide = get_theme_mod('adventure_camping_responsive_preloader_hide',false);
	if($adventure_camping_responsive_preloader_hide == true && get_theme_mod('adventure_camping_loader_enable',false) == false){
		$adventure_camping_custom_css .='@media screen and (min-width:575px){
			#preloader{';
			$adventure_camping_custom_css .='display:none !important;';
		$adventure_camping_custom_css .='} }';
	}

	if($adventure_camping_responsive_preloader_hide == false){
		$adventure_camping_custom_css .='@media screen and (max-width:575px){
			#preloader{';
			$adventure_camping_custom_css .='display:none !important;';
		$adventure_camping_custom_css .='} }';
	}

	$adventure_camping_resp_sidebar = get_theme_mod( 'adventure_camping_sidebar_hide_show',true);
    if($adventure_camping_resp_sidebar == true){
    	$adventure_camping_custom_css .='@media screen and (max-width:575px) {';
		$adventure_camping_custom_css .='#sidebar{';
			$adventure_camping_custom_css .='display:block;';
		$adventure_camping_custom_css .='} }';
	}else if($adventure_camping_resp_sidebar == false){
		$adventure_camping_custom_css .='@media screen and (max-width:575px) {';
		$adventure_camping_custom_css .='#sidebar{';
			$adventure_camping_custom_css .='display:none;';
		$adventure_camping_custom_css .='} }';
	}
	$adventure_camping_resp_scroll_top = get_theme_mod( 'adventure_camping_resp_scroll_top_hide_show',true);
	if($adventure_camping_resp_scroll_top == true && get_theme_mod( 'adventure_camping_hide_show_scroll',true) == false){
    	$adventure_camping_custom_css .='.scrollup i{';
			$adventure_camping_custom_css .='visibility:hidden !important;';
		$adventure_camping_custom_css .='} ';
	}
    if($adventure_camping_resp_scroll_top == true){
    	$adventure_camping_custom_css .='@media screen and (max-width:575px) {';
		$adventure_camping_custom_css .='.scrollup i{';
			$adventure_camping_custom_css .='visibility:visible !important;';
		$adventure_camping_custom_css .='} }';
	}else if($adventure_camping_resp_scroll_top == false){
		$adventure_camping_custom_css .='@media screen and (max-width:575px){';
		$adventure_camping_custom_css .='.scrollup i{';
			$adventure_camping_custom_css .='visibility:hidden !important;';
		$adventure_camping_custom_css .='} }';
	}

	$adventure_camping_resp_stickyheader = get_theme_mod( 'adventure_camping_stickyheader_hide_show',false);
	if($adventure_camping_resp_stickyheader == true && get_theme_mod( 'adventure_camping_sticky_header',false) != true){
    	$adventure_camping_custom_css .='.header-fixed{';
			$adventure_camping_custom_css .='position:static;';
		$adventure_camping_custom_css .='} ';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$adventure_camping_slider_content_padding_top_bottom = get_theme_mod('adventure_camping_slider_content_padding_top_bottom');
	$adventure_camping_slider_content_padding_left_right = get_theme_mod('adventure_camping_slider_content_padding_left_right');
	if($adventure_camping_slider_content_padding_top_bottom != false || $adventure_camping_slider_content_padding_left_right != false){
		$adventure_camping_custom_css .='#slider .carousel-caption{';
			$adventure_camping_custom_css .='top: '.esc_attr($adventure_camping_slider_content_padding_top_bottom).'; bottom: '.esc_attr($adventure_camping_slider_content_padding_top_bottom).';left: '.esc_attr($adventure_camping_slider_content_padding_left_right).';right: '.esc_attr($adventure_camping_slider_content_padding_left_right).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_slider = get_theme_mod('adventure_camping_show_hide_banner', true);
	if($adventure_camping_slider == false){
		$adventure_camping_custom_css .='.page-template-custom-home-page .home-page-header{';
			$adventure_camping_custom_css .='position: static;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_banner_background_color = get_theme_mod('adventure_camping_banner_background_color');
	if($adventure_camping_banner_background_color != false){
		$adventure_camping_custom_css .='#banner{';
			$adventure_camping_custom_css .='background-color: '.esc_attr($adventure_camping_banner_background_color).';';
		$adventure_camping_custom_css .='}';
		$adventure_camping_custom_css .='#banner .review-main, #banner .side-main-img{';
			$adventure_camping_custom_css .='border-color: '.esc_attr($adventure_camping_banner_background_color).';';
		$adventure_camping_custom_css .='}';
	}
	
	/*-------------- Copyright Alignment ----------------*/

	$adventure_camping_copyright_alingment = get_theme_mod('adventure_camping_copyright_alingment');
	if($adventure_camping_copyright_alingment != false){
		$adventure_camping_custom_css .='.copyright p{';
			$adventure_camping_custom_css .='text-align: '.esc_attr($adventure_camping_copyright_alingment).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_footer_background_color = get_theme_mod('adventure_camping_footer_background_color');
	if($adventure_camping_footer_background_color != false){
		$adventure_camping_custom_css .='#footer{';
			$adventure_camping_custom_css .='background-color: '.esc_attr($adventure_camping_footer_background_color).';';
		$adventure_camping_custom_css .='}';
	}

	/*------------- Preloader Background Color  -------------------*/

	$adventure_camping_preloader_bg_color = get_theme_mod('adventure_camping_preloader_bg_color');
	if($adventure_camping_preloader_bg_color != false){
		$adventure_camping_custom_css .='#preloader{';
			$adventure_camping_custom_css .='background-color: '.esc_attr($adventure_camping_preloader_bg_color).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_preloader_border_color = get_theme_mod('adventure_camping_preloader_border_color');
	if($adventure_camping_preloader_border_color != false){
		$adventure_camping_custom_css .='.loader-line{';
			$adventure_camping_custom_css .='border-color: '.esc_attr($adventure_camping_preloader_border_color).'!important;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_preloader_bg_img = get_theme_mod('adventure_camping_preloader_bg_img');
	if($adventure_camping_preloader_bg_img != false){
		$adventure_camping_custom_css .='#preloader{';
			$adventure_camping_custom_css .='background: url('.esc_attr($adventure_camping_preloader_bg_img).');-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
		$adventure_camping_custom_css .='}';
	}

	/*---------------------- Slider Image Overlay ------------------------*/

	$adventure_camping_slider_image_overlay = get_theme_mod('adventure_camping_slider_image_overlay', true);
	if($adventure_camping_slider_image_overlay == false){
		$adventure_camping_custom_css .='#slider img{';
			$adventure_camping_custom_css .='opacity:1;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_slider_image_overlay_color = get_theme_mod('adventure_camping_slider_image_overlay_color', true);
	if($adventure_camping_slider_image_overlay_color != false){
		$adventure_camping_custom_css .='#slider{';
			$adventure_camping_custom_css .='background-color: '.esc_attr($adventure_camping_slider_image_overlay_color).';';
		$adventure_camping_custom_css .='}';
	}


	/*-------------- Copyright Alignment ----------------*/

	$adventure_camping_copyright_alingment = get_theme_mod('adventure_camping_copyright_alingment');
	if($adventure_camping_copyright_alingment != false){
		$adventure_camping_custom_css .='.copyright p{';
			$adventure_camping_custom_css .='text-align: '.esc_attr($adventure_camping_copyright_alingment).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_copyright_background_color = get_theme_mod('adventure_camping_copyright_background_color');
	if($adventure_camping_copyright_background_color != false){
		$adventure_camping_custom_css .='#footer-2{';
			$adventure_camping_custom_css .='background-color: '.esc_attr($adventure_camping_copyright_background_color).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_footer_background_image = get_theme_mod('adventure_camping_footer_background_image');
	if($adventure_camping_footer_background_image != false){
		$adventure_camping_custom_css .='#footer{';
			$adventure_camping_custom_css .='background: url('.esc_attr($adventure_camping_footer_background_image).')no-repeat;background-size:cover';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_theme_lay = get_theme_mod( 'adventure_camping_img_footer','scroll');
	if($adventure_camping_theme_lay == 'fixed'){
		$adventure_camping_custom_css .='#footer{';
			$adventure_camping_custom_css .='background-attachment: fixed !important; background-position: center !important;';
		$adventure_camping_custom_css .='}';
	}elseif ($adventure_camping_theme_lay == 'scroll'){
		$adventure_camping_custom_css .='#footer{';
			$adventure_camping_custom_css .='background-attachment: scroll !important; background-position: center !important;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_footer_img_position = get_theme_mod('adventure_camping_footer_img_position','center center');
	if($adventure_camping_footer_img_position != false){
		$adventure_camping_custom_css .='#footer{';
			$adventure_camping_custom_css .='background-position: '.esc_attr($adventure_camping_footer_img_position).'!important;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_footer_widgets_heading = get_theme_mod( 'adventure_camping_footer_widgets_heading','Left');
    if($adventure_camping_footer_widgets_heading == 'Left'){
		$adventure_camping_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
		$adventure_camping_custom_css .='text-align: left;';
		$adventure_camping_custom_css .='}';
	}else if($adventure_camping_footer_widgets_heading == 'Center'){
		$adventure_camping_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$adventure_camping_custom_css .='text-align: center;';
		$adventure_camping_custom_css .='}';
	}else if($adventure_camping_footer_widgets_heading == 'Right'){
		$adventure_camping_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$adventure_camping_custom_css .='text-align: right;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_footer_widgets_content = get_theme_mod( 'adventure_camping_footer_widgets_content','Left');
    if($adventure_camping_footer_widgets_content == 'Left'){
		$adventure_camping_custom_css .='#footer .widget{';
		$adventure_camping_custom_css .='text-align: left;';
		$adventure_camping_custom_css .='}';
	}else if($adventure_camping_footer_widgets_content == 'Center'){
		$adventure_camping_custom_css .='#footer .widget{';
			$adventure_camping_custom_css .='text-align: center;';
		$adventure_camping_custom_css .='}';
	}else if($adventure_camping_footer_widgets_content == 'Right'){
		$adventure_camping_custom_css .='#footer .widget{';
			$adventure_camping_custom_css .='text-align: right;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_copyright_font_size = get_theme_mod('adventure_camping_copyright_font_size');
	if($adventure_camping_copyright_font_size != false){
		$adventure_camping_custom_css .='#footer-2 a, #footer-2 p{';
			$adventure_camping_custom_css .='font-size: '.esc_attr($adventure_camping_copyright_font_size).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_copyright_alingment = get_theme_mod('adventure_camping_copyright_alingment');
	if($adventure_camping_copyright_alingment != false){
		$adventure_camping_custom_css .='#footer-2 p{';
			$adventure_camping_custom_css .='text-align: '.esc_attr($adventure_camping_copyright_alingment).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_copyright_padding_top_bottom = get_theme_mod('adventure_camping_copyright_padding_top_bottom');
	if($adventure_camping_copyright_padding_top_bottom != false){
		$adventure_camping_custom_css .='#footer-2{';
			$adventure_camping_custom_css .='padding-top: '.esc_attr($adventure_camping_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($adventure_camping_copyright_padding_top_bottom).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_footer_padding = get_theme_mod('adventure_camping_footer_padding');
	if($adventure_camping_footer_padding != false){
		$adventure_camping_custom_css .='#footer{';
			$adventure_camping_custom_css .='padding: '.esc_attr($adventure_camping_footer_padding).' 0;';
		$adventure_camping_custom_css .='}';
	}
	/*-------------- Copyright Alignment ----------------*/

	$adventure_camping_copyright_alingment = get_theme_mod('adventure_camping_copyright_alingment');
	if($adventure_camping_copyright_alingment != false){
		$adventure_camping_custom_css .='.copyright p{';
			$adventure_camping_custom_css .='text-align: '.esc_attr($adventure_camping_copyright_alingment).';';
		$adventure_camping_custom_css .='}';
	}

	/*----------------Scroll to top Settings ------------------*/

	$adventure_camping_scroll_to_top_font_size = get_theme_mod('adventure_camping_scroll_to_top_font_size');
	if($adventure_camping_scroll_to_top_font_size != false){
		$adventure_camping_custom_css .='.scrollup i{';
			$adventure_camping_custom_css .='font-size: '.esc_attr($adventure_camping_scroll_to_top_font_size).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_scroll_to_top_padding = get_theme_mod('adventure_camping_scroll_to_top_padding');
	$adventure_camping_scroll_to_top_padding = get_theme_mod('adventure_camping_scroll_to_top_padding');
	if($adventure_camping_scroll_to_top_padding != false){
		$adventure_camping_custom_css .='.scrollup i{';
			$adventure_camping_custom_css .='padding-top: '.esc_attr($adventure_camping_scroll_to_top_padding).';padding-bottom: '.esc_attr($adventure_camping_scroll_to_top_padding).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_scroll_to_top_width = get_theme_mod('adventure_camping_scroll_to_top_width');
	if($adventure_camping_scroll_to_top_width != false){
		$adventure_camping_custom_css .='.scrollup i{';
			$adventure_camping_custom_css .='width: '.esc_attr($adventure_camping_scroll_to_top_width).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_scroll_to_top_height = get_theme_mod('adventure_camping_scroll_to_top_height');
	if($adventure_camping_scroll_to_top_height != false){
		$adventure_camping_custom_css .='.scrollup i{';
			$adventure_camping_custom_css .='height: '.esc_attr($adventure_camping_scroll_to_top_height).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_scroll_to_top_border_radius = get_theme_mod('adventure_camping_scroll_to_top_border_radius');
	if($adventure_camping_scroll_to_top_border_radius != false){
		$adventure_camping_custom_css .='.scrollup i{';
			$adventure_camping_custom_css .='border-radius: '.esc_attr($adventure_camping_scroll_to_top_border_radius).'px;';
		$adventure_camping_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$adventure_camping_logo_padding = get_theme_mod('adventure_camping_logo_padding');
	if($adventure_camping_logo_padding != false){
		$adventure_camping_custom_css .='.logo{';
			$adventure_camping_custom_css .='padding: '.esc_attr($adventure_camping_logo_padding).' !important;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_logo_margin = get_theme_mod('adventure_camping_logo_margin');
	if($adventure_camping_logo_margin != false){
		$adventure_camping_custom_css .='.logo{';
			$adventure_camping_custom_css .='margin: '.esc_attr($adventure_camping_logo_margin).';';
		$adventure_camping_custom_css .='}';
	}

	// Site title Font Size
	$adventure_camping_site_title_font_size = get_theme_mod('adventure_camping_site_title_font_size');
	if($adventure_camping_site_title_font_size != false){
		$adventure_camping_custom_css .='.logo p.site-title, .logo h1{';
			$adventure_camping_custom_css .='font-size: '.esc_attr($adventure_camping_site_title_font_size).';';
		$adventure_camping_custom_css .='}';
	}

	// Site tagline Font Size
	$adventure_camping_site_tagline_font_size = get_theme_mod('adventure_camping_site_tagline_font_size');
	if($adventure_camping_site_tagline_font_size != false){
		$adventure_camping_custom_css .='.logo p.site-description{';
			$adventure_camping_custom_css .='font-size: '.esc_attr($adventure_camping_site_tagline_font_size).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_site_title_color = get_theme_mod('adventure_camping_site_title_color');
	if($adventure_camping_site_title_color != false){
		$adventure_camping_custom_css .='p.site-title a, .logo h1 a{';
			$adventure_camping_custom_css .='color: '.esc_attr($adventure_camping_site_title_color).'!important;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_site_tagline_color = get_theme_mod('adventure_camping_site_tagline_color');
	if($adventure_camping_site_tagline_color != false){
		$adventure_camping_custom_css .='.logo p.site-description{';
			$adventure_camping_custom_css .='color: '.esc_attr($adventure_camping_site_tagline_color).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_logo_width = get_theme_mod('adventure_camping_logo_width');
	if($adventure_camping_logo_width != false){
		$adventure_camping_custom_css .='.logo img{';
			$adventure_camping_custom_css .='width: '.esc_attr($adventure_camping_logo_width).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_logo_height = get_theme_mod('adventure_camping_logo_height');
	if($adventure_camping_logo_height != false){
		$adventure_camping_custom_css .='.logo img{';
			$adventure_camping_custom_css .='height: '.esc_attr($adventure_camping_logo_height).';object-fit:cover;';
		$adventure_camping_custom_css .='}';
	}

	// Header Background Color
	$adventure_camping_header_background_color = get_theme_mod('adventure_camping_header_background_color');
	if($adventure_camping_header_background_color != false){
		$adventure_camping_custom_css .='.page-template-custom-home-page .home-page-header, .home-page-header{';
			$adventure_camping_custom_css .='background-color: '.esc_attr($adventure_camping_header_background_color).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_header_img_position = get_theme_mod('adventure_camping_header_img_position','center top');
	if($adventure_camping_header_img_position != false){
		$adventure_camping_custom_css .='.page-template-custom-home-page .home-page-header, .home-page-header{';
			$adventure_camping_custom_css .='background-position: '.esc_attr($adventure_camping_header_img_position).'!important;';
		$adventure_camping_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$adventure_camping_theme_lay = get_theme_mod( 'adventure_camping_blog_layout_option','Left');
    if($adventure_camping_theme_lay == 'Default'){
		$adventure_camping_custom_css .='.post-main-box{';
			$adventure_camping_custom_css .='';
		$adventure_camping_custom_css .='}';
	}else if($adventure_camping_theme_lay == 'Center'){
		$adventure_camping_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$adventure_camping_custom_css .='text-align:center;';
		$adventure_camping_custom_css .='}';
		$adventure_camping_custom_css .='.post-info{';
			$adventure_camping_custom_css .='margin-top:10px;';
		$adventure_camping_custom_css .='}';
		$adventure_camping_custom_css .='.post-info hr{';
			$adventure_camping_custom_css .='margin:15px auto;';
		$adventure_camping_custom_css .='}';
	}else if($adventure_camping_theme_lay == 'Left'){
		$adventure_camping_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$adventure_camping_custom_css .='text-align:Left;';
		$adventure_camping_custom_css .='}';
		$adventure_camping_custom_css .='.post-info hr{';
			$adventure_camping_custom_css .='margin-bottom:10px;';
		$adventure_camping_custom_css .='}';
		$adventure_camping_custom_css .='.post-main-box h2{';
			$adventure_camping_custom_css .='margin-top:10px;';
		$adventure_camping_custom_css .='}';
		$adventure_camping_custom_css .='.service-text .more-btn{';
			$adventure_camping_custom_css .='display:inline-block;';
		$adventure_camping_custom_css .='}';
	}

	/*--------------------- Blog Page Posts -------------------*/

	$adventure_camping_blog_page_posts_settings = get_theme_mod( 'adventure_camping_blog_page_posts_settings','Into Blocks');
    if($adventure_camping_blog_page_posts_settings == 'Without Blocks'){
		$adventure_camping_custom_css .='.post-main-box{';
			$adventure_camping_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$adventure_camping_custom_css .='}';
	}

	// featured image dimention
	$adventure_camping_blog_post_featured_image_dimension = get_theme_mod('adventure_camping_blog_post_featured_image_dimension', 'default');
	$adventure_camping_blog_post_featured_image_custom_width = get_theme_mod('adventure_camping_blog_post_featured_image_custom_width',250);
	$adventure_camping_blog_post_featured_image_custom_height = get_theme_mod('adventure_camping_blog_post_featured_image_custom_height',250);
	if($adventure_camping_blog_post_featured_image_dimension == 'custom'){
		$adventure_camping_custom_css .='.post-main-box img{';
			$adventure_camping_custom_css .='width: '.esc_attr($adventure_camping_blog_post_featured_image_custom_width).'!important; height: '.esc_attr($adventure_camping_blog_post_featured_image_custom_height).';';
		$adventure_camping_custom_css .='}';
	}

	/*---------------- Posts Settings ------------------*/

	$adventure_camping_featured_image_border_radius = get_theme_mod('adventure_camping_featured_image_border_radius', 0);
	if($adventure_camping_featured_image_border_radius != false){
		$adventure_camping_custom_css .='.box-image img, .feature-box img{';
			$adventure_camping_custom_css .='border-radius: '.esc_attr($adventure_camping_featured_image_border_radius).'px;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_featured_image_box_shadow = get_theme_mod('adventure_camping_featured_image_box_shadow',0);
	if($adventure_camping_featured_image_box_shadow != false){
		$adventure_camping_custom_css .='.box-image img, #content-vw img{';
			$adventure_camping_custom_css .='box-shadow: '.esc_attr($adventure_camping_featured_image_box_shadow).'px '.esc_attr($adventure_camping_featured_image_box_shadow).'px '.esc_attr($adventure_camping_featured_image_box_shadow).'px #cccccc;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_singlepost_image_box_shadow = get_theme_mod('adventure_camping_singlepost_image_box_shadow',0);
	if($adventure_camping_singlepost_image_box_shadow != false){
		$adventure_camping_custom_css .='.feature-box img{';
			$adventure_camping_custom_css .='box-shadow: '.esc_attr($adventure_camping_singlepost_image_box_shadow).'px '.esc_attr($adventure_camping_singlepost_image_box_shadow).'px '.esc_attr($adventure_camping_singlepost_image_box_shadow).'px #cccccc;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_related_image_box_shadow = get_theme_mod('adventure_camping_related_image_box_shadow',0);
	if($adventure_camping_related_image_box_shadow != false){
		$adventure_camping_custom_css .='.related-post .box-image img{';
			$adventure_camping_custom_css .='box-shadow: '.esc_attr($adventure_camping_related_image_box_shadow).'px '.esc_attr($adventure_camping_related_image_box_shadow).'px '.esc_attr($adventure_camping_related_image_box_shadow).'px #cccccc;';
		$adventure_camping_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$adventure_camping_button_letter_spacing = get_theme_mod('adventure_camping_button_letter_spacing',14);
	$adventure_camping_custom_css .='.post-main-box .more-btn{';
		$adventure_camping_custom_css .='letter-spacing: '.esc_attr($adventure_camping_button_letter_spacing).';';
	$adventure_camping_custom_css .='}';

	$adventure_camping_button_border_radius = get_theme_mod('adventure_camping_button_border_radius');
	if($adventure_camping_button_border_radius != false){
		$adventure_camping_custom_css .='.post-main-box .more-btn a{';
			$adventure_camping_custom_css .='border-radius: '.esc_attr($adventure_camping_button_border_radius).'px !important;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_button_top_bottom_padding = get_theme_mod('adventure_camping_button_top_bottom_padding');
	$adventure_camping_button_left_right_padding = get_theme_mod('adventure_camping_button_left_right_padding');
	if($adventure_camping_button_top_bottom_padding != false || $adventure_camping_button_left_right_padding != false){
		$adventure_camping_custom_css .='.post-main-box .more-btn{';
			$adventure_camping_custom_css .='padding-top: '.esc_attr($adventure_camping_button_top_bottom_padding).'!important; padding-bottom: '.esc_attr($adventure_camping_button_top_bottom_padding).'!important;padding-left: '.esc_attr($adventure_camping_button_left_right_padding).'!important;padding-right: '.esc_attr($adventure_camping_button_left_right_padding).'!important;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_button_font_size = get_theme_mod('adventure_camping_button_font_size',14);
	$adventure_camping_custom_css .='.post-main-box .more-btn a{';
		$adventure_camping_custom_css .='font-size: '.esc_attr($adventure_camping_button_font_size).';';
	$adventure_camping_custom_css .='}';

	$adventure_camping_theme_lay = get_theme_mod( 'adventure_camping_button_text_transform','Capitalize');
	if($adventure_camping_theme_lay == 'Capitalize'){
		$adventure_camping_custom_css .='.post-main-box .more-btn a{';
			$adventure_camping_custom_css .='text-transform:Capitalize;';
		$adventure_camping_custom_css .='}';
	}
	if($adventure_camping_theme_lay == 'Lowercase'){
		$adventure_camping_custom_css .='.post-main-box .more-btn a{';
			$adventure_camping_custom_css .='text-transform:Lowercase;';
		$adventure_camping_custom_css .='}';
	}
	if($adventure_camping_theme_lay == 'Uppercase'){
		$adventure_camping_custom_css .='.post-main-box .more-btn a{';
			$adventure_camping_custom_css .='text-transform:Uppercase;';
		$adventure_camping_custom_css .='}';
	}

	/*---------------- Single Blog Page Settings ------------------*/

	$adventure_camping_single_blog_comment_button_text = get_theme_mod('adventure_camping_single_blog_comment_button_text', 'Post Comment');
	if($adventure_camping_single_blog_comment_button_text == ''){
		$adventure_camping_custom_css .='#comments p.form-submit {';
			$adventure_camping_custom_css .='display: none;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_comment_width = get_theme_mod('adventure_camping_single_blog_comment_width');
	if($adventure_camping_comment_width != false){
		$adventure_camping_custom_css .='#comments textarea{';
			$adventure_camping_custom_css .='width: '.esc_attr($adventure_camping_comment_width).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_single_blog_post_navigation_show_hide = get_theme_mod('adventure_camping_single_blog_post_navigation_show_hide',true);
	if($adventure_camping_single_blog_post_navigation_show_hide != true){
		$adventure_camping_custom_css .='.post-navigation{';
			$adventure_camping_custom_css .='display: none;';
		$adventure_camping_custom_css .='}';
	}

	/*--------------------- Grid Posts Posts -------------------*/

	$adventure_camping_display_grid_posts_settings = get_theme_mod( 'adventure_camping_display_grid_posts_settings','Into Blocks');
    if($adventure_camping_display_grid_posts_settings == 'Without Blocks'){
		$adventure_camping_custom_css .='.grid-post-main-box{';
			$adventure_camping_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_grid_featured_image_border_radius = get_theme_mod('adventure_camping_grid_featured_image_border_radius', 0);
	if($adventure_camping_grid_featured_image_border_radius != false){
		$adventure_camping_custom_css .='.grid-post-main-box .box-image img, .grid-post-main-box .feature-box img{';
			$adventure_camping_custom_css .='border-radius: '.esc_attr($adventure_camping_grid_featured_image_border_radius).'px;';
		$adventure_camping_custom_css .='}';
	}
	/*----------------Woocommerce Products Settings ------------------*/

	$adventure_camping_related_product_show_hide = get_theme_mod('adventure_camping_related_product_show_hide',true);
	if($adventure_camping_related_product_show_hide != true){
		$adventure_camping_custom_css .='.related.products{';
			$adventure_camping_custom_css .='display: none;';
		$adventure_camping_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$adventure_camping_products_padding_top_bottom = get_theme_mod('adventure_camping_products_padding_top_bottom');
	if($adventure_camping_products_padding_top_bottom != false){
		$adventure_camping_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$adventure_camping_custom_css .='padding-top: '.esc_attr($adventure_camping_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($adventure_camping_products_padding_top_bottom).'!important;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_products_padding_left_right = get_theme_mod('adventure_camping_products_padding_left_right');
	if($adventure_camping_products_padding_left_right != false){
		$adventure_camping_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$adventure_camping_custom_css .='padding-left: '.esc_attr($adventure_camping_products_padding_left_right).'!important; padding-right: '.esc_attr($adventure_camping_products_padding_left_right).'!important;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_products_box_shadow = get_theme_mod('adventure_camping_products_box_shadow');
	if($adventure_camping_products_box_shadow != false){
		$adventure_camping_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$adventure_camping_custom_css .='box-shadow: '.esc_attr($adventure_camping_products_box_shadow).'px '.esc_attr($adventure_camping_products_box_shadow).'px '.esc_attr($adventure_camping_products_box_shadow).'px #ddd;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_products_border_radius = get_theme_mod('adventure_camping_products_border_radius');
	if($adventure_camping_products_border_radius != false){
		$adventure_camping_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$adventure_camping_custom_css .='border-radius: '.esc_attr($adventure_camping_products_border_radius).'px;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_products_btn_padding_top_bottom = get_theme_mod('adventure_camping_products_btn_padding_top_bottom');
	if($adventure_camping_products_btn_padding_top_bottom != false){
		$adventure_camping_custom_css .='.woocommerce a.button{';
			$adventure_camping_custom_css .='padding-top: '.esc_attr($adventure_camping_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($adventure_camping_products_btn_padding_top_bottom).' !important;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_products_btn_padding_left_right = get_theme_mod('adventure_camping_products_btn_padding_left_right');
	if($adventure_camping_products_btn_padding_left_right != false){
		$adventure_camping_custom_css .='.woocommerce a.button{';
			$adventure_camping_custom_css .='padding-left: '.esc_attr($adventure_camping_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($adventure_camping_products_btn_padding_left_right).' !important;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_products_button_border_radius = get_theme_mod('adventure_camping_products_button_border_radius', 0);
	if($adventure_camping_products_button_border_radius != false){
		$adventure_camping_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce a.button{';
			$adventure_camping_custom_css .='border-radius: '.esc_attr($adventure_camping_products_button_border_radius).'px !important;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_woocommerce_sale_position = get_theme_mod( 'adventure_camping_woocommerce_sale_position','right');
    if($adventure_camping_woocommerce_sale_position == 'left'){
		$adventure_camping_custom_css .='.woocommerce ul.products li.product .onsale{';
			$adventure_camping_custom_css .='left: 14px !important; right: auto !important;';
		$adventure_camping_custom_css .='}';
	}else if($adventure_camping_woocommerce_sale_position == 'right'){
		$adventure_camping_custom_css .='.woocommerce ul.products li.product .onsale{';
			$adventure_camping_custom_css .='left: auto!important; right: 14px !important;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_woocommerce_sale_font_size = get_theme_mod('adventure_camping_woocommerce_sale_font_size');
	if($adventure_camping_woocommerce_sale_font_size != false){
		$adventure_camping_custom_css .='.woocommerce span.onsale{';
			$adventure_camping_custom_css .='font-size: '.esc_attr($adventure_camping_woocommerce_sale_font_size).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_woocommerce_sale_padding_top_bottom = get_theme_mod('adventure_camping_woocommerce_sale_padding_top_bottom');
	if($adventure_camping_woocommerce_sale_padding_top_bottom != false){
		$adventure_camping_custom_css .='.woocommerce span.onsale{';
			$adventure_camping_custom_css .='padding-top: '.esc_attr($adventure_camping_woocommerce_sale_padding_top_bottom).'; padding-bottom: '.esc_attr($adventure_camping_woocommerce_sale_padding_top_bottom).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_woocommerce_sale_padding_left_right = get_theme_mod('adventure_camping_woocommerce_sale_padding_left_right');
	if($adventure_camping_woocommerce_sale_padding_left_right != false){
		$adventure_camping_custom_css .='.woocommerce span.onsale{';
			$adventure_camping_custom_css .='padding-left: '.esc_attr($adventure_camping_woocommerce_sale_padding_left_right).'; padding-right: '.esc_attr($adventure_camping_woocommerce_sale_padding_left_right).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_woocommerce_sale_border_radius = get_theme_mod('adventure_camping_woocommerce_sale_border_radius', 0);
	if($adventure_camping_woocommerce_sale_border_radius != false){
		$adventure_camping_custom_css .='.woocommerce span.onsale{';
			$adventure_camping_custom_css .='border-radius: '.esc_attr($adventure_camping_woocommerce_sale_border_radius).'px;';
		$adventure_camping_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$adventure_camping_sticky_header_padding = get_theme_mod('adventure_camping_sticky_header_padding');
	if($adventure_camping_sticky_header_padding != false){
		$adventure_camping_custom_css .='.header-fixed{';
			$adventure_camping_custom_css .='padding: '.esc_attr($adventure_camping_sticky_header_padding).';';
		$adventure_camping_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$adventure_camping_social_icon_font_size = get_theme_mod('adventure_camping_social_icon_font_size');
	if($adventure_camping_social_icon_font_size != false){
		$adventure_camping_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$adventure_camping_custom_css .='font-size: '.esc_attr($adventure_camping_social_icon_font_size).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_social_icon_padding = get_theme_mod('adventure_camping_social_icon_padding');
	if($adventure_camping_social_icon_padding != false){
		$adventure_camping_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$adventure_camping_custom_css .='padding: '.esc_attr($adventure_camping_social_icon_padding).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_social_icon_width = get_theme_mod('adventure_camping_social_icon_width');
	if($adventure_camping_social_icon_width != false){
		$adventure_camping_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$adventure_camping_custom_css .='width: '.esc_attr($adventure_camping_social_icon_width).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_social_icon_height = get_theme_mod('adventure_camping_social_icon_height');
	if($adventure_camping_social_icon_height != false){
		$adventure_camping_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$adventure_camping_custom_css .='height: '.esc_attr($adventure_camping_social_icon_height).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_social_icon_border_radius = get_theme_mod('adventure_camping_social_icon_border_radius');
	if($adventure_camping_social_icon_border_radius != false){
		$adventure_camping_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$adventure_camping_custom_css .='border-radius: '.esc_attr($adventure_camping_social_icon_border_radius).'px;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_resp_menu_toggle_btn_bg_color = get_theme_mod('adventure_camping_resp_menu_toggle_btn_bg_color');
	if($adventure_camping_resp_menu_toggle_btn_bg_color != false){
		$adventure_camping_custom_css .='.toggle-nav i,#mySidenav .closebtn{';
			$adventure_camping_custom_css .='background: '.esc_attr($adventure_camping_resp_menu_toggle_btn_bg_color).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_grid_featured_image_box_shadow = get_theme_mod('adventure_camping_grid_featured_image_box_shadow',0);
	if($adventure_camping_grid_featured_image_box_shadow != false){
		$adventure_camping_custom_css .='.grid-post-main-box .box-image img, .grid-post-main-box .feature-box img, #content-vw img{';
			$adventure_camping_custom_css .='box-shadow: '.esc_attr($adventure_camping_grid_featured_image_box_shadow).'px '.esc_attr($adventure_camping_grid_featured_image_box_shadow).'px '.esc_attr($adventure_camping_grid_featured_image_box_shadow).'px #cccccc;';
		$adventure_camping_custom_css .='}';
	}


	/*-------------- Menus Setings ----------------*/

	$adventure_camping_navigation_menu_font_size = get_theme_mod('adventure_camping_navigation_menu_font_size');
	if($adventure_camping_navigation_menu_font_size != false){
		$adventure_camping_custom_css .='.main-navigation ul a{';
			$adventure_camping_custom_css .='font-size: '.esc_attr($adventure_camping_navigation_menu_font_size).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_navigation_menu_font_weight = get_theme_mod('adventure_camping_navigation_menu_font_weight','600');
	if($adventure_camping_navigation_menu_font_weight != false){
		$adventure_camping_custom_css .='.main-navigation ul a{';
			$adventure_camping_custom_css .='font-weight: '.esc_attr($adventure_camping_navigation_menu_font_weight).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_header_menus_hover_color = get_theme_mod('adventure_camping_header_menus_hover_color');
	if($adventure_camping_header_menus_hover_color != false){
		$adventure_camping_custom_css .='.main-navigation ul a:hover{';
			$adventure_camping_custom_css .='color: '.esc_attr($adventure_camping_header_menus_hover_color).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_header_submenus_color = get_theme_mod('adventure_camping_header_submenus_color');
	if($adventure_camping_header_submenus_color != false){
		$adventure_camping_custom_css .='.main-navigation ul ul a{';
			$adventure_camping_custom_css .='color: '.esc_attr($adventure_camping_header_submenus_color).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_header_submenus_hover_color = get_theme_mod('adventure_camping_header_submenus_hover_color');
	if($adventure_camping_header_submenus_hover_color != false){
		$adventure_camping_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$adventure_camping_custom_css .='color: '.esc_attr($adventure_camping_header_submenus_hover_color).'!important;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_menus_item = get_theme_mod( 'adventure_camping_menus_item_style','None');
    if($adventure_camping_menus_item == 'None'){
		$adventure_camping_custom_css .='.main-navigation ul a{';
			$adventure_camping_custom_css .='';
		$adventure_camping_custom_css .='}';
	}else if($adventure_camping_menus_item == 'Zoom In'){
		$adventure_camping_custom_css .='.main-navigation ul a:hover{';
			$adventure_camping_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important;';
		$adventure_camping_custom_css .='}';
	}

	/*---------------------------Footer Style -------------------*/

	$adventure_camping_theme_lay = get_theme_mod( 'adventure_camping_footer_template','adventure_camping-footer-one');
    if($adventure_camping_theme_lay == 'adventure_camping-footer-one'){
		$adventure_camping_custom_css .='#footer{';
			$adventure_camping_custom_css .='';
		$adventure_camping_custom_css .='}';

	}else if($adventure_camping_theme_lay == 'adventure_camping-footer-two'){
		$adventure_camping_custom_css .='#footer{';
			$adventure_camping_custom_css .='background: linear-gradient(to right, #f9f8ff, #dedafa);';
		$adventure_camping_custom_css .='}';
		$adventure_camping_custom_css .='#footer p, #footer li a, #footer, #footer h3, #footer a.rsswidget, #footer #wp-calendar a, .copyright a, #footer .custom_details, #footer ins span, #footer .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, #footer table, #footer th, #footer td, #footer caption, #sidebar caption,#footer nav.wp-calendar-nav a,#footer .search-form .search-field{';
			$adventure_camping_custom_css .='color:#000;';
		$adventure_camping_custom_css .='}';
		$adventure_camping_custom_css .='#footer ul li::before{';
			$adventure_camping_custom_css .='background:#000;';
		$adventure_camping_custom_css .='}';
		$adventure_camping_custom_css .='#footer table, #footer th, #footer td,#footer .search-form .search-field,#footer .tagcloud a{';
			$adventure_camping_custom_css .='border: 1px solid #000;';
		$adventure_camping_custom_css .='}';

	}else if($adventure_camping_theme_lay == 'adventure_camping-footer-three'){
		$adventure_camping_custom_css .='#footer{';
			$adventure_camping_custom_css .='background: #232524;';
		$adventure_camping_custom_css .='}';
	}
	else if($adventure_camping_theme_lay == 'adventure_camping-footer-four'){
		$adventure_camping_custom_css .='#footer{';
			$adventure_camping_custom_css .='background: #798640;';
		$adventure_camping_custom_css .='}';
		$adventure_camping_custom_css .='#footer p, #footer li a, #footer, #footer h3, #footer a.rsswidget, #footer #wp-calendar a, .copyright a, #footer .custom_details, #footer ins span, #footer .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, #footer table, #footer th, #footer td, #footer caption, #sidebar caption,#footer nav.wp-calendar-nav a,#footer .search-form .search-field{';
			$adventure_camping_custom_css .='color:#fff;';
		$adventure_camping_custom_css .='}';
		$adventure_camping_custom_css .='#footer ul li::before{';
			$adventure_camping_custom_css .='background:#fff;';
		$adventure_camping_custom_css .='}';
		$adventure_camping_custom_css .='#footer table, #footer th, #footer td,#footer .search-form .search-field,#footer .tagcloud a{';
			$adventure_camping_custom_css .='border: 1px solid #fff;';
		$adventure_camping_custom_css .='}';
	}
	else if($adventure_camping_theme_lay == 'adventure_camping-footer-five'){
		$adventure_camping_custom_css .='#footer{';
			$adventure_camping_custom_css .='background: linear-gradient(to right, #01093a, #2d0b00);';
		$adventure_camping_custom_css .='}';
	}

	/*---------------- Footer Settings ------------------*/

	$adventure_camping_button_footer_heading_letter_spacing = get_theme_mod('adventure_camping_button_footer_heading_letter_spacing',1);
	$adventure_camping_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
		$adventure_camping_custom_css .='letter-spacing: '.esc_attr($adventure_camping_button_footer_heading_letter_spacing).'px;';
	$adventure_camping_custom_css .='}';

	$adventure_camping_button_footer_font_size = get_theme_mod('adventure_camping_button_footer_font_size','30');
	$adventure_camping_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
		$adventure_camping_custom_css .='font-size: '.esc_attr($adventure_camping_button_footer_font_size).'px;';
	$adventure_camping_custom_css .='}';

	$adventure_camping_theme_lay = get_theme_mod( 'adventure_camping_button_footer_text_transform','Capitalize');
	if($adventure_camping_theme_lay == 'Capitalize'){
		$adventure_camping_custom_css .='#footer h3{';
			$adventure_camping_custom_css .='text-transform:Capitalize;';
		$adventure_camping_custom_css .='}';
	}
	if($adventure_camping_theme_lay == 'Lowercase'){
		$adventure_camping_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
			$adventure_camping_custom_css .='text-transform:Lowercase;';
		$adventure_camping_custom_css .='}';
	}
	if($adventure_camping_theme_lay == 'Uppercase'){
		$adventure_camping_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
			$adventure_camping_custom_css .='text-transform:Uppercase;';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_footer_heading_weight = get_theme_mod('adventure_camping_footer_heading_weight','500');
	if($adventure_camping_footer_heading_weight != false){
		$adventure_camping_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
			$adventure_camping_custom_css .='font-weight: '.esc_attr($adventure_camping_footer_heading_weight).';';
		$adventure_camping_custom_css .='}';
	}
	
	$adventure_camping_slider_first_color = get_theme_mod('adventure_camping_slider_first_color');

	$adventure_camping_slider_second_color = get_theme_mod('adventure_camping_slider_second_color');

	if($adventure_camping_slider_first_color != false || $adventure_camping_slider_second_color != false){
		$adventure_camping_custom_css .='.box{
		background: linear-gradient(to top, '.esc_attr($adventure_camping_slider_first_color).', '.esc_attr($adventure_camping_slider_second_color).');
		}';
	}

	$adventure_camping_services_icon_color = get_theme_mod('adventure_camping_services_icon_color');
	if($adventure_camping_services_icon_color != false){
		$adventure_camping_custom_css .='#about-sec i{';
			$adventure_camping_custom_css .='color: '.esc_attr($adventure_camping_services_icon_color).';';
		$adventure_camping_custom_css .='}';
	}

	$adventure_camping_bradcrumbs_alignment = get_theme_mod( 'adventure_camping_bradcrumbs_alignment','Left');
    if($adventure_camping_bradcrumbs_alignment == 'Left'){
    	$adventure_camping_custom_css .='@media screen and (min-width:768px) {';
		$adventure_camping_custom_css .='.bradcrumbs{';
			$adventure_camping_custom_css .='text-align:start;';
		$adventure_camping_custom_css .='}}';
	}else if($adventure_camping_bradcrumbs_alignment == 'Center'){
		$adventure_camping_custom_css .='@media screen and (min-width:768px) {';
		$adventure_camping_custom_css .='.bradcrumbs{';
			$adventure_camping_custom_css .='text-align:center;';
		$adventure_camping_custom_css .='}}';
	}else if($adventure_camping_bradcrumbs_alignment == 'Right'){
		$adventure_camping_custom_css .='@media screen and (min-width:768px) {';
		$adventure_camping_custom_css .='.bradcrumbs{';
			$adventure_camping_custom_css .='text-align:end;';
		$adventure_camping_custom_css .='}}';
	}