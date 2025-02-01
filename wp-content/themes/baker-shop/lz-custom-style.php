<?php 

	$luzuk_baker_shop_custom_style = '';

	// Logo Size
	$luzuk_baker_shop_logo_top_padding = get_theme_mod('luzuk_baker_shop_logo_top_padding');
	$luzuk_baker_shop_logo_bottom_padding = get_theme_mod('luzuk_baker_shop_logo_bottom_padding');
	$luzuk_baker_shop_logo_left_padding = get_theme_mod('luzuk_baker_shop_logo_left_padding');
	$luzuk_baker_shop_logo_right_padding = get_theme_mod('luzuk_baker_shop_logo_right_padding');

	if( $luzuk_baker_shop_logo_top_padding != '' || $luzuk_baker_shop_logo_bottom_padding != '' || $luzuk_baker_shop_logo_left_padding != '' || $luzuk_baker_shop_logo_right_padding != ''){
		$luzuk_baker_shop_custom_style .=' .logo {';
			$luzuk_baker_shop_custom_style .=' padding-top: '.esc_attr($luzuk_baker_shop_logo_top_padding).'px; padding-bottom: '.esc_attr($luzuk_baker_shop_logo_bottom_padding).'px; padding-left: '.esc_attr($luzuk_baker_shop_logo_left_padding).'px; padding-right: '.esc_attr($luzuk_baker_shop_logo_right_padding).'px;';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_logo_size = get_theme_mod('luzuk_baker_shop_logo_size');
	if( $luzuk_baker_shop_logo_size != '') {
		if($luzuk_baker_shop_logo_size == 100) {
			$luzuk_baker_shop_custom_style .=' .custom-logo-link img {';
				$luzuk_baker_shop_custom_style .=' width: 350px;';
			$luzuk_baker_shop_custom_style .=' }';
		} else if($luzuk_baker_shop_logo_size >= 10 && $luzuk_baker_shop_logo_size < 100) {
			$luzuk_baker_shop_custom_style .=' .custom-logo-link img {';
				$luzuk_baker_shop_custom_style .=' width: '.esc_attr($luzuk_baker_shop_logo_size).'%;';
			$luzuk_baker_shop_custom_style .=' }';
		}
	}

	// Header Image
	$header_image_url = luzuk_baker_shop_banner_image( $image_url = '' );
	if( $header_image_url != ''){
		$luzuk_baker_shop_custom_style .=' #inner-pages-header {';
			$luzuk_baker_shop_custom_style .=' background-image: url('. esc_url( $header_image_url ).') !important; background-size: cover; background-repeat: no-repeat; background-attachment: fixed;';
		$luzuk_baker_shop_custom_style .=' }';

		$luzuk_baker_shop_custom_style .='  #header .top-head {';
			$luzuk_baker_shop_custom_style .=' background: none ';
		$luzuk_baker_shop_custom_style .=' }';
	} else {
		$luzuk_baker_shop_custom_style .=' #inner-pages-header {';
			$luzuk_baker_shop_custom_style .=' background: radial-gradient(circle at center, rgba(0,0,0,0) 0%, #000000 100%); ';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_slider_hide_show = get_theme_mod('luzuk_baker_shop_slider_hide_show',false);
	if( $luzuk_baker_shop_slider_hide_show == true){
		$luzuk_baker_shop_custom_style .=' .page-template-custom-home-page #inner-pages-header {';
			$luzuk_baker_shop_custom_style .=' display:none;';
		$luzuk_baker_shop_custom_style .=' }';
	}


	$luzuk_baker_shop_headertopbg_col = get_theme_mod('luzuk_baker_shop_headertopbg_col');
	if ( $luzuk_baker_shop_headertopbg_col != '') {
		$luzuk_baker_shop_custom_style .=' .page-template-custom-home-page #header {';
			$luzuk_baker_shop_custom_style .=' background:'.esc_attr($luzuk_baker_shop_headertopbg_col).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_headertoptext_col = get_theme_mod('luzuk_baker_shop_headertoptext_col');
	if ( $luzuk_baker_shop_headertoptext_col != '') {
		$luzuk_baker_shop_custom_style .=' #header .mail-text a,.tph-inn p,#header .phn-text a {';
			$luzuk_baker_shop_custom_style .=' color:'.esc_attr($luzuk_baker_shop_headertoptext_col).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_headertopicon_col = get_theme_mod('luzuk_baker_shop_headertopicon_col');
	if ( $luzuk_baker_shop_headertopicon_col != '') {
		$luzuk_baker_shop_custom_style .=' #header .mail-text i,#header .phn-text i {';
			$luzuk_baker_shop_custom_style .=' color:'.esc_attr($luzuk_baker_shop_headertopicon_col).';';
		$luzuk_baker_shop_custom_style .=' }';
	}


	$luzuk_baker_shop_headertopmailphnhover_col = get_theme_mod('luzuk_baker_shop_headertopmailphnhover_col');
	if ( $luzuk_baker_shop_headertopmailphnhover_col != '') {
		$luzuk_baker_shop_custom_style .=' #header .mail-text a:hover,#header .phn-text a:hover {';
			$luzuk_baker_shop_custom_style .=' color:'.esc_attr($luzuk_baker_shop_headertopmailphnhover_col).';';
		$luzuk_baker_shop_custom_style .=' }';
	}


	$luzuk_baker_shop_headerbottombg_col = get_theme_mod('luzuk_baker_shop_headerbottombg_col');
	if ( $luzuk_baker_shop_headerbottombg_col != '') {
		$luzuk_baker_shop_custom_style .=' #header .m-head {';
			$luzuk_baker_shop_custom_style .=' background:'.esc_attr($luzuk_baker_shop_headerbottombg_col).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_menu_color = get_theme_mod('luzuk_baker_shop_menu_color');
	if ( $luzuk_baker_shop_menu_color != '') {
		$luzuk_baker_shop_custom_style .=' .primary-menu a, .primary-menu li .icon{';
			$luzuk_baker_shop_custom_style .=' color:'.esc_attr($luzuk_baker_shop_menu_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_menuhover_color = get_theme_mod('luzuk_baker_shop_menuhover_color');
	if ( $luzuk_baker_shop_menuhover_color != '') {
		$luzuk_baker_shop_custom_style .='.primary-menu li:hover .icon, .primary-menu li a:hover{';
			$luzuk_baker_shop_custom_style .=' color:'.esc_attr($luzuk_baker_shop_menuhover_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_submenu_color = get_theme_mod('luzuk_baker_shop_submenu_color');
	if ( $luzuk_baker_shop_submenu_color != '') {
		$luzuk_baker_shop_custom_style .='.primary-menu ul a{';
			$luzuk_baker_shop_custom_style .=' color:'.esc_attr($luzuk_baker_shop_submenu_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_submenubg_color = get_theme_mod('luzuk_baker_shop_submenubg_color');
	if ( $luzuk_baker_shop_submenubg_color != '') {
		$luzuk_baker_shop_custom_style .='.primary-menu ul{';
			$luzuk_baker_shop_custom_style .=' background:'.esc_attr($luzuk_baker_shop_submenubg_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_header_btntexticon_color = get_theme_mod('luzuk_baker_shop_header_btntexticon_color');
	if ( $luzuk_baker_shop_header_btntexticon_color != '') {
		$luzuk_baker_shop_custom_style .='.headerbtn a{';
			$luzuk_baker_shop_custom_style .=' color:'.esc_attr($luzuk_baker_shop_header_btntexticon_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_header_btntexticonbg_color = get_theme_mod('luzuk_baker_shop_header_btntexticonbg_color');
	if ( $luzuk_baker_shop_header_btntexticonbg_color != '') {
		$luzuk_baker_shop_custom_style .='.headerbtn a{';
			$luzuk_baker_shop_custom_style .=' background:'.esc_attr($luzuk_baker_shop_header_btntexticonbg_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}
	
	$luzuk_baker_shop_header_btntexticonhover_color = get_theme_mod('luzuk_baker_shop_header_btntexticonhover_color');
	if ( $luzuk_baker_shop_header_btntexticonhover_color != '') {
		$luzuk_baker_shop_custom_style .=' .headerbtn a:hover {';
			$luzuk_baker_shop_custom_style .=' color:'.esc_attr($luzuk_baker_shop_header_btntexticonhover_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}


	//layout width
	$luzuk_baker_shop_boxfull_width = get_theme_mod('luzuk_baker_shop_boxfull_width');
	if ($luzuk_baker_shop_boxfull_width !== '') {
		switch ($luzuk_baker_shop_boxfull_width) {
			case 'container':
				$luzuk_baker_shop_custom_style .= ' body, #header, .bottom-header {
					max-width: 1140px;
					width: 100%;
					padding-right: 15px;
					padding-left: 15px;
					margin-right: auto;
					margin-left: auto;
					}';
				break;
			case 'container-fluid':
				$luzuk_baker_shop_custom_style .= ' body, #header, .bottom-header { 
					width: 100%;
					padding-right: 15px;
					padding-left: 15px;
					margin-right: auto;
					margin-left: auto;
					}';
				break;
			case 'none':
				// No specific width specified, so no additional style needed.
				break;
			default:
				// Handle unexpected values.
				break;
		}
	}

	//Menu animation
	$luzuk_baker_shop_dropdown_anim = get_theme_mod('luzuk_baker_shop_dropdown_anim');

	if ( $luzuk_baker_shop_dropdown_anim != '') {
		$luzuk_baker_shop_custom_style .=' .primary-menu ul{';
			$luzuk_baker_shop_custom_style .=' animation:'.esc_attr($luzuk_baker_shop_dropdown_anim).' 1s ease;';
		$luzuk_baker_shop_custom_style .=' }';
	}

	//site title tagline
	$luzuk_baker_shop_site_title_color = get_theme_mod('luzuk_baker_shop_site_title_color');
	if ( $luzuk_baker_shop_site_title_color != '') {
		$luzuk_baker_shop_custom_style .=' h1.site-title a, p.site-title a{';
			$luzuk_baker_shop_custom_style .=' color:'.esc_attr($luzuk_baker_shop_site_title_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_site_tagline_color = get_theme_mod('luzuk_baker_shop_site_tagline_color');
	if ( $luzuk_baker_shop_site_tagline_color != '') {
		$luzuk_baker_shop_custom_style .=' p.site-description{';
			$luzuk_baker_shop_custom_style .=' color:'.esc_attr($luzuk_baker_shop_site_tagline_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	

	//slider colors

	$luzuk_baker_shop_slider_font_size = get_theme_mod('luzuk_baker_shop_slider_font_size');
	if ( $luzuk_baker_shop_slider_font_size != '') {
		$luzuk_baker_shop_custom_style .=' #slider h2{';
			$luzuk_baker_shop_custom_style .=' font-size:'.esc_attr($luzuk_baker_shop_slider_font_size).'px;';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_slider_text_font_size = get_theme_mod('luzuk_baker_shop_slider_text_font_size');
	if ( $luzuk_baker_shop_slider_text_font_size != '') {
		$luzuk_baker_shop_custom_style .=' #slider p{';
			$luzuk_baker_shop_custom_style .=' font-size:'.esc_attr($luzuk_baker_shop_slider_text_font_size).'px;';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_slider_bg_color = get_theme_mod('luzuk_baker_shop_slider_bg_color');
	if ( $luzuk_baker_shop_slider_bg_color != '') {
		$luzuk_baker_shop_custom_style .=' #slider{';
			$luzuk_baker_shop_custom_style .=' background:'.esc_attr($luzuk_baker_shop_slider_bg_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}


	$luzuk_baker_shop_slider_title_color = get_theme_mod('luzuk_baker_shop_slider_title_color');
	if ( $luzuk_baker_shop_slider_title_color != '') {
		$luzuk_baker_shop_custom_style .=' #slider h2 {';
			$luzuk_baker_shop_custom_style .=' color:'.esc_attr($luzuk_baker_shop_slider_title_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}


	$luzuk_baker_shop_slider_description_color = get_theme_mod('luzuk_baker_shop_slider_description_color');
	if ( $luzuk_baker_shop_slider_description_color != '') {
		$luzuk_baker_shop_custom_style .=' #slider p{';
			$luzuk_baker_shop_custom_style .=' color:'.esc_attr($luzuk_baker_shop_slider_description_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_slider_btntext_color = get_theme_mod('luzuk_baker_shop_slider_btntext_color');
	if ( $luzuk_baker_shop_slider_btntext_color != '') {
		$luzuk_baker_shop_custom_style .=' #slider .sbtn1 a{';
			$luzuk_baker_shop_custom_style .=' color:'.esc_attr($luzuk_baker_shop_slider_btntext_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_slider_btnbg_color = get_theme_mod('luzuk_baker_shop_slider_btnbg_color');
	if ( $luzuk_baker_shop_slider_btnbg_color != '') {
		$luzuk_baker_shop_custom_style .=' #slider .sbtn1 a{';
			$luzuk_baker_shop_custom_style .=' background:'.esc_attr($luzuk_baker_shop_slider_btnbg_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_slider_btntexthrv_color = get_theme_mod('luzuk_baker_shop_slider_btntexthrv_color');
	if ( $luzuk_baker_shop_slider_btntexthrv_color != '') {
		$luzuk_baker_shop_custom_style .=' #slider .sbtn1 a:hover{';
			$luzuk_baker_shop_custom_style .=' color:'.esc_attr($luzuk_baker_shop_slider_btntexthrv_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}


	//Product Category
	$luzuk_baker_shop_category_boxbgcolor = get_theme_mod('luzuk_baker_shop_category_boxbgcolor');
	if ( $luzuk_baker_shop_category_boxbgcolor != '') {
		$luzuk_baker_shop_custom_style .='#productcategory-section .p-sbox {';
			$luzuk_baker_shop_custom_style .=' background-color:'.esc_attr($luzuk_baker_shop_category_boxbgcolor).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_category_subheadingcolor = get_theme_mod('luzuk_baker_shop_category_subheadingcolor');
	if ( $luzuk_baker_shop_category_subheadingcolor != '') {
		$luzuk_baker_shop_custom_style .='#productcategory-section .productcategory-head h6 {';
			$luzuk_baker_shop_custom_style .=' color:'.esc_attr($luzuk_baker_shop_category_subheadingcolor).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_category_headingcolor = get_theme_mod('luzuk_baker_shop_category_headingcolor');
	if ( $luzuk_baker_shop_category_headingcolor != '') {
		$luzuk_baker_shop_custom_style .='#productcategory-section .productcategory-head h3 {';
			$luzuk_baker_shop_custom_style .=' color:'.esc_attr($luzuk_baker_shop_category_headingcolor).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_category_btntextcolor = get_theme_mod('luzuk_baker_shop_category_btntextcolor');
	if ( $luzuk_baker_shop_category_btntextcolor != '') {
		$luzuk_baker_shop_custom_style .='#productcategory-section .productcategory-btn a{';
			$luzuk_baker_shop_custom_style .=' color:'.esc_attr($luzuk_baker_shop_category_btntextcolor).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_category_btnbgcolor = get_theme_mod('luzuk_baker_shop_category_btnbgcolor');
	if ( $luzuk_baker_shop_category_btnbgcolor != '') {
		$luzuk_baker_shop_custom_style .='#productcategory-section .productcategory-btn a{';
			$luzuk_baker_shop_custom_style .=' background:'.esc_attr($luzuk_baker_shop_category_btnbgcolor).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_category_btntexthrvcolor = get_theme_mod('luzuk_baker_shop_category_btntexthrvcolor');
	if ( $luzuk_baker_shop_category_btntexthrvcolor != '') {
		$luzuk_baker_shop_custom_style .='#productcategory-section .productcategory-btn a:hover{';
			$luzuk_baker_shop_custom_style .=' color:'.esc_attr($luzuk_baker_shop_category_btntexthrvcolor).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_category_titlecolor = get_theme_mod('luzuk_baker_shop_category_titlecolor');
	if ( $luzuk_baker_shop_category_titlecolor != '') {
		$luzuk_baker_shop_custom_style .='#productcategory-section .cat-product .pro-cat-content h5 a{';
			$luzuk_baker_shop_custom_style .=' color:'.esc_attr($luzuk_baker_shop_category_titlecolor).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_category_titlehrvcolor = get_theme_mod('luzuk_baker_shop_category_titlehrvcolor');
	if ( $luzuk_baker_shop_category_titlehrvcolor != '') {
		$luzuk_baker_shop_custom_style .='#productcategory-section .cat-product:hover .pro-cat-content h5 a{';
			$luzuk_baker_shop_custom_style .=' color:'.esc_attr($luzuk_baker_shop_category_titlehrvcolor).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_category_iconcolor = get_theme_mod('luzuk_baker_shop_category_iconcolor');
	if ( $luzuk_baker_shop_category_iconcolor != '') {
		$luzuk_baker_shop_custom_style .='#productcategory-section .pro-cat-content i{';
			$luzuk_baker_shop_custom_style .=' color:'.esc_attr($luzuk_baker_shop_category_iconcolor).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_category_iconbgcolor = get_theme_mod('luzuk_baker_shop_category_iconbgcolor');
	if ( $luzuk_baker_shop_category_iconbgcolor != '') {
		$luzuk_baker_shop_custom_style .='#productcategory-section .pro-cat-content i{';
			$luzuk_baker_shop_custom_style .=' background:'.esc_attr($luzuk_baker_shop_category_iconbgcolor).';';
		$luzuk_baker_shop_custom_style .=' }';
	}





	//our product colors

	$luzuk_baker_shop_ourproductsubheading_color = get_theme_mod('luzuk_baker_shop_ourproductsubheading_color');
	if ( $luzuk_baker_shop_ourproductsubheading_color != '') {
		$luzuk_baker_shop_custom_style .=' #ourproduct-section .productcategory-head h6 {';
			$luzuk_baker_shop_custom_style .=' color: '.esc_attr($luzuk_baker_shop_ourproductsubheading_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_ourproductheading_color = get_theme_mod('luzuk_baker_shop_ourproductheading_color');
	if ( $luzuk_baker_shop_ourproductheading_color != '') {
		$luzuk_baker_shop_custom_style .='#ourproduct-section .productcategory-head h3 {';
			$luzuk_baker_shop_custom_style .=' color: '.esc_attr($luzuk_baker_shop_ourproductheading_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}


	$luzuk_baker_shop_ourproductviewmorebtntext_color = get_theme_mod('luzuk_baker_shop_ourproductviewmorebtntext_color');
	if ( $luzuk_baker_shop_ourproductviewmorebtntext_color != '') {
		$luzuk_baker_shop_custom_style .=' #ourproduct-section .product-btn a {';
			$luzuk_baker_shop_custom_style .=' color: '.esc_attr($luzuk_baker_shop_ourproductviewmorebtntext_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_ourproductviewmorebtnbg_color = get_theme_mod('luzuk_baker_shop_ourproductviewmorebtnbg_color');
	if ( $luzuk_baker_shop_ourproductviewmorebtnbg_color != '') {
		$luzuk_baker_shop_custom_style .='#ourproduct-section .product-btn a {';
			$luzuk_baker_shop_custom_style .=' background: '.esc_attr($luzuk_baker_shop_ourproductviewmorebtnbg_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_ourproductviewmorebtntexthrv_color = get_theme_mod('luzuk_baker_shop_ourproductviewmorebtntexthrv_color');
	if ( $luzuk_baker_shop_ourproductviewmorebtntexthrv_color != '') {
		$luzuk_baker_shop_custom_style .=' #ourproduct-section .product-btn a:hover {';
			$luzuk_baker_shop_custom_style .=' color: '.esc_attr($luzuk_baker_shop_ourproductviewmorebtntexthrv_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_ourproductproducttitle_color = get_theme_mod('luzuk_baker_shop_ourproductproducttitle_color');
	if ( $luzuk_baker_shop_ourproductproducttitle_color != '') {
		$luzuk_baker_shop_custom_style .=' #ourproduct-section .pcontent h3 {';
			$luzuk_baker_shop_custom_style .=' color: '.esc_attr($luzuk_baker_shop_ourproductproducttitle_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_ourproductproducttitlehrv_color = get_theme_mod('luzuk_baker_shop_ourproductproducttitlehrv_color');
	if ( $luzuk_baker_shop_ourproductproducttitlehrv_color != '') {
		$luzuk_baker_shop_custom_style .=' #ourproduct-section .ourproductus-single:hover .pcontent h3 {';
			$luzuk_baker_shop_custom_style .=' color: '.esc_attr($luzuk_baker_shop_ourproductproducttitlehrv_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_ourproductproductprice_color = get_theme_mod('luzuk_baker_shop_ourproductproductprice_color');
	if ( $luzuk_baker_shop_ourproductproductprice_color != '') {
		$luzuk_baker_shop_custom_style .=' #ourproduct-section .price ins, #ourproduct-section .Pr_bx{';
			$luzuk_baker_shop_custom_style .=' color: '.esc_attr($luzuk_baker_shop_ourproductproductprice_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_ourproductproductbtntext_color = get_theme_mod('luzuk_baker_shop_ourproductproductbtntext_color');
	if ( $luzuk_baker_shop_ourproductproductbtntext_color != '') {
		$luzuk_baker_shop_custom_style .=' #ourproduct-section .cart-contents {';
			$luzuk_baker_shop_custom_style .=' color: '.esc_attr($luzuk_baker_shop_ourproductproductbtntext_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_ourproductproductbtnbg_color = get_theme_mod('luzuk_baker_shop_ourproductproductbtnbg_color');
	if ( $luzuk_baker_shop_ourproductproductbtnbg_color != '') {
		$luzuk_baker_shop_custom_style .=' #ourproduct-section .cart-contents {';
			$luzuk_baker_shop_custom_style .=' background: '.esc_attr($luzuk_baker_shop_ourproductproductbtnbg_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_ourproductproductbtntexthrv_color = get_theme_mod('luzuk_baker_shop_ourproductproductbtntexthrv_color');
	if ( $luzuk_baker_shop_ourproductproductbtntexthrv_color != '') {
		$luzuk_baker_shop_custom_style .=' #ourproduct-section .cart-contents:hover {';
			$luzuk_baker_shop_custom_style .=' color: '.esc_attr($luzuk_baker_shop_ourproductproductbtntexthrv_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}



	//footer colors
	$luzuk_baker_shop_footertext_color = get_theme_mod('luzuk_baker_shop_footertext_color');
	if ( $luzuk_baker_shop_footertext_color != '') {
		$luzuk_baker_shop_custom_style .=' #colophon h1, #colophon h2, #colophon h3, #colophon h4, #colophon h5,
		 #colophon h6,#colophon,#colophon p,.site-footer a, .site-footer p, #colophon caption, .site-footer .widget_rss .rss-date,
		  .site-footer .widget_rss li cite {';
			$luzuk_baker_shop_custom_style .=' color: '.esc_attr($luzuk_baker_shop_footertext_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}	

	$luzuk_baker_shop_footerbg_color = get_theme_mod('luzuk_baker_shop_footerbg_color');
	if ( $luzuk_baker_shop_footerbg_color != '') {
		$luzuk_baker_shop_custom_style .=' .footer-overlay {';
			$luzuk_baker_shop_custom_style .=' background: '.esc_attr($luzuk_baker_shop_footerbg_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}


	$luzuk_baker_shop_footercopyright_color = get_theme_mod('luzuk_baker_shop_footercopyright_color');
	if ( $luzuk_baker_shop_footercopyright_color != '') {
		$luzuk_baker_shop_custom_style .=' #colophon .site-info p {';
			$luzuk_baker_shop_custom_style .=' color: '.esc_attr($luzuk_baker_shop_footercopyright_color).' !important;';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_footercopyrightbrd_color = get_theme_mod('luzuk_baker_shop_footercopyrightbrd_color');
	if ( $luzuk_baker_shop_footercopyrightbrd_color != '') {
		$luzuk_baker_shop_custom_style .=' .copyright {';
			$luzuk_baker_shop_custom_style .=' border-color: '.esc_attr($luzuk_baker_shop_footercopyrightbrd_color).' !important;';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_footerscrolltotoptext_color = get_theme_mod('luzuk_baker_shop_footerscrolltotoptext_color');
	if ( $luzuk_baker_shop_footerscrolltotoptext_color != '') {
		$luzuk_baker_shop_custom_style .=' .back-to-top {';
			$luzuk_baker_shop_custom_style .=' color: '.esc_attr($luzuk_baker_shop_footerscrolltotoptext_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_footerscrolltotopbg_color = get_theme_mod('luzuk_baker_shop_footerscrolltotopbg_color');
	if ( $luzuk_baker_shop_footerscrolltotopbg_color != '') {
		$luzuk_baker_shop_custom_style .=' .back-to-top {';
			$luzuk_baker_shop_custom_style .=' background: '.esc_attr($luzuk_baker_shop_footerscrolltotopbg_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_footerscrolltotoptexthover_color = get_theme_mod('luzuk_baker_shop_footerscrolltotoptexthover_color');
	if ( $luzuk_baker_shop_footerscrolltotoptexthover_color != '') {
		$luzuk_baker_shop_custom_style .=' .back-to-top:hover .back-to-top-text {';
			$luzuk_baker_shop_custom_style .=' color: '.esc_attr($luzuk_baker_shop_footerscrolltotoptexthover_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}

	$luzuk_baker_shop_footerscrolltotophover_color = get_theme_mod('luzuk_baker_shop_footerscrolltotophover_color');
	if ( $luzuk_baker_shop_footerscrolltotophover_color != '') {
		$luzuk_baker_shop_custom_style .=' .back-to-top:hover::after {';
			$luzuk_baker_shop_custom_style .=' background: '.esc_attr($luzuk_baker_shop_footerscrolltotophover_color).';';
		$luzuk_baker_shop_custom_style .=' }';
	}