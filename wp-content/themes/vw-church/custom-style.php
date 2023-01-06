<?php

	$vw_church_custom_css= "";
	/*-------------------- Global Color -------------------*/

	$vw_church_first_color = get_theme_mod('vw_church_first_color');

	if($vw_church_first_color != false){
		$vw_church_custom_css .='.search-box i, #slider .carousel-control-next i:hover, #slider .carousel-control-prev i:hover, #slider .more-btn a, .more-btn a, #comments input[type="submit"],#comments a.comment-reply-link,input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,nav.woocommerce-MyAccount-navigation ul li,.pro-button a, .woocommerce a.added_to_cart.wc-forward, #preloader, #footer .tagcloud a:hover, #footer input[type="submit"], #footer-2, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, .scrollup i, #sidebar .custom-social-icons a,#footer .custom-social-icons a, #sidebar h3,  #sidebar .widget_block h3, #sidebar h2, #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, .woocommerce span.onsale, .toggle-nav i,.horizontal-text,.header-button a,.page-template-custom-home-page .home-page-header .top-bar .social-icon a,.home-page-header .top-bar .social-icon a,.bradcrumbs span,.bradcrumbs a:hover,.main-navigation ul li a::before, .main-navigation .current_page_item > a::before, .main-navigation .current-menu-item > a::before,.control-section-vw-church h3.accordion-section-title ,#preloader,.header-search, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled],#events-section h2:after{';
			$vw_church_custom_css .='background: '.esc_attr($vw_church_first_color).';';
		$vw_church_custom_css .='}';
	}

	if($vw_church_first_color != false){
		$vw_church_custom_css .='a,a:hover, .top-bar .topbar-links a:hover, p.site-title a:hover, .logo h1 a:hover, .main-navigation li a:hover, .main-navigation li a:focus, .main-navigation ul ul a:focus, .main-navigation ul ul a:hover, #slider .inner_carousel h1 a:hover, #slider .more-btn a i, .more-btn a i, .post-main-box:hover h2 a, .post-main-box:hover .post-info span a, .single-post .post-info:hover a, .middle-bar h6, .post-main-box:hover h3 a,#sidebar ul li a:hover, #footer li a:hover,.post-navigation a:hover .post-title,.post-navigation a:focus .post-title,.post-navigation a:hover,.post-navigation a:focus, .post-navigation span.meta-nav:hover,.natural-life span, .entry-content a, .widget_text a, .woocommerce-page .entry-summary a, .comment-content p a,.woocommerce .star-rating span, .woocommerce p.stars a{';
			$vw_church_custom_css .='color: '.esc_attr($vw_church_first_color).';';
		$vw_church_custom_css .='}';
	}
	/*---------------------------Width Layout -------------------*/

	$vw_church_theme_lay = get_theme_mod( 'vw_church_width_option','Full Width');
    if($vw_church_theme_lay == 'Boxed'){
		$vw_church_custom_css .='body{';
			$vw_church_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_church_custom_css .='}';
		$vw_church_custom_css .='.scrollup i{';
			$vw_church_custom_css .='right: 100px;';
		$vw_church_custom_css .='}';
		$vw_church_custom_css .='.page-template-custom-home-page .home-page-header{';
			$vw_church_custom_css .='padding: 0px 40px 0 10px;';
		$vw_church_custom_css .='}';
	}else if($vw_church_theme_lay == 'Wide Width'){
		$vw_church_custom_css .='body{';
			$vw_church_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_church_custom_css .='}';
		$vw_church_custom_css .='.scrollup i{';
			$vw_church_custom_css .='right: 30px;';
		$vw_church_custom_css .='}';
	}else if($vw_church_theme_lay == 'Full Width'){
		$vw_church_custom_css .='body{';
			$vw_church_custom_css .='max-width: 100%;';
		$vw_church_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$vw_church_resp_slider = get_theme_mod( 'vw_church_resp_slider_hide_show',false);
	if($vw_church_resp_slider == true && get_theme_mod( 'vw_church_slider_hide_show', false) == false){
    	$vw_church_custom_css .='#slider{';
			$vw_church_custom_css .='display:none;';
		$vw_church_custom_css .='} ';
	}
    if($vw_church_resp_slider == true){
    	$vw_church_custom_css .='@media screen and (max-width:575px) {';
		$vw_church_custom_css .='#slider{';
			$vw_church_custom_css .='display:block;';
		$vw_church_custom_css .='} }';
	}else if($vw_church_resp_slider == false){
		$vw_church_custom_css .='@media screen and (max-width:575px) {';
		$vw_church_custom_css .='#slider{';
			$vw_church_custom_css .='display:none;';
		$vw_church_custom_css .='} }';
		$vw_church_custom_css .='@media screen and (max-width:575px){';
		$vw_church_custom_css .='.page-template-custom-home-page.admin-bar .homepageheader{';
			$vw_church_custom_css .='margin-top: 45px;';
		$vw_church_custom_css .='} }';
		$vw_church_custom_css .='@media screen and (max-width:575px) {';
		$vw_church_custom_css .='#track-player-sec .audioigniter-root{';
			$vw_church_custom_css .='margin-top: 5%;';
		$vw_church_custom_css .='} }';
	}

	$vw_church_resp_sidebar = get_theme_mod( 'vw_church_sidebar_hide_show',true);
    if($vw_church_resp_sidebar == true){
    	$vw_church_custom_css .='@media screen and (max-width:575px) {';
		$vw_church_custom_css .='#sidebar{';
			$vw_church_custom_css .='display:block;';
		$vw_church_custom_css .='} }';
	}else if($vw_church_resp_sidebar == false){
		$vw_church_custom_css .='@media screen and (max-width:575px) {';
		$vw_church_custom_css .='#sidebar{';
			$vw_church_custom_css .='display:none;';
		$vw_church_custom_css .='} }';
	}

	$vw_church_resp_scroll_top = get_theme_mod( 'vw_church_resp_scroll_top_hide_show',true);
	if($vw_church_resp_scroll_top == true && get_theme_mod( 'vw_church_hide_show_scroll',true) == false){
    	$vw_church_custom_css .='.scrollup i{';
			$vw_church_custom_css .='visibility:hidden !important;';
		$vw_church_custom_css .='} ';
	}
    if($vw_church_resp_scroll_top == true){
    	$vw_church_custom_css .='@media screen and (max-width:575px) {';
		$vw_church_custom_css .='.scrollup i{';
			$vw_church_custom_css .='visibility:visible !important;';
		$vw_church_custom_css .='} }';
	}else if($vw_church_resp_scroll_top == false){
		$vw_church_custom_css .='@media screen and (max-width:575px){';
		$vw_church_custom_css .='.scrollup i{';
			$vw_church_custom_css .='visibility:hidden !important;';
		$vw_church_custom_css .='} }';
	}

	$vw_church_resp_menu_toggle_btn_bg_color = get_theme_mod('vw_church_resp_menu_toggle_btn_bg_color');
	if($vw_church_resp_menu_toggle_btn_bg_color != false){
		$vw_church_custom_css .='.toggle-nav i{';
			$vw_church_custom_css .='background: '.esc_attr($vw_church_resp_menu_toggle_btn_bg_color).';';
		$vw_church_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_church_slider_height = get_theme_mod('vw_church_slider_height');
	if($vw_church_slider_height != false){
		$vw_church_custom_css .='#slider img{';
			$vw_church_custom_css .='height: '.esc_attr($vw_church_slider_height).';';
		$vw_church_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_church_copyright_alingment = get_theme_mod('vw_church_copyright_alingment');
	if($vw_church_copyright_alingment != false){
		$vw_church_custom_css .='.copyright p{';
			$vw_church_custom_css .='text-align: '.esc_attr($vw_church_copyright_alingment).';';
		$vw_church_custom_css .='}';
	}

	$vw_church_footer_widgets_heading = get_theme_mod( 'vw_church_footer_widgets_heading','Left');
    if($vw_church_footer_widgets_heading == 'Left'){
		$vw_church_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
		$vw_church_custom_css .='text-align: left;';
		$vw_church_custom_css .='}';
	}else if($vw_church_footer_widgets_heading == 'Center'){
		$vw_church_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$vw_church_custom_css .='text-align: center;';
		$vw_church_custom_css .='}';
	}else if($vw_church_footer_widgets_heading == 'Right'){
		$vw_church_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$vw_church_custom_css .='text-align: right;';
		$vw_church_custom_css .='}';
	}

	$vw_church_footer_widgets_content = get_theme_mod( 'vw_church_footer_widgets_content','Left');
    if($vw_church_footer_widgets_content == 'Left'){
		$vw_church_custom_css .='#footer .widget{';
		$vw_church_custom_css .='text-align: left;';
		$vw_church_custom_css .='}';
	}else if($vw_church_footer_widgets_content == 'Center'){
		$vw_church_custom_css .='#footer .widget{';
			$vw_church_custom_css .='text-align: center;';
		$vw_church_custom_css .='}';
	}else if($vw_church_footer_widgets_content == 'Right'){
		$vw_church_custom_css .='#footer .widget{';
			$vw_church_custom_css .='text-align: right;';
		$vw_church_custom_css .='}';
	}

	$vw_church_footer_padding = get_theme_mod('vw_church_footer_padding');
	if($vw_church_footer_padding != false){
		$vw_church_custom_css .='#footer{';
			$vw_church_custom_css .='padding: '.esc_attr($vw_church_footer_padding).' 0;';
		$vw_church_custom_css .='}';
	}

	$vw_church_footer_icon = get_theme_mod('vw_church_footer_icon');
	if($vw_church_footer_icon == false){
		$vw_church_custom_css .='.copyright p{';
			$vw_church_custom_css .='width:100%; text-align:center; float:none;';
		$vw_church_custom_css .='}';
	}

	$vw_church_footer_background_image = get_theme_mod('vw_church_footer_background_image');
	if($vw_church_footer_background_image != false){
		$vw_church_custom_css .='#footer{';
			$vw_church_custom_css .='background: url('.esc_attr($vw_church_footer_background_image).')!important;';
		$vw_church_custom_css .='}';
	}

	$vw_church_footer_background_color = get_theme_mod('vw_church_footer_background_color');
	if($vw_church_footer_background_color != false){
		$vw_church_custom_css .='#footer{';
			$vw_church_custom_css .='background-color: '.esc_attr($vw_church_footer_background_color).'!important;';
		$vw_church_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$vw_church_site_title_font_size = get_theme_mod('vw_church_site_title_font_size');
	if($vw_church_site_title_font_size != false){
		$vw_church_custom_css .='.logo h1, .logo p.site-title{';
			$vw_church_custom_css .='font-size: '.esc_attr($vw_church_site_title_font_size).';';
		$vw_church_custom_css .='}';
	}

	$vw_church_site_tagline_font_size = get_theme_mod('vw_church_site_tagline_font_size');
	if($vw_church_site_tagline_font_size != false){
		$vw_church_custom_css .='.logo p.site-description{';
			$vw_church_custom_css .='font-size: '.esc_attr($vw_church_site_tagline_font_size).';';
		$vw_church_custom_css .='}';
	}

	$vw_church_logo_padding = get_theme_mod('vw_church_logo_padding');
	if($vw_church_logo_padding != false){
		$vw_church_custom_css .='.top-bar .logo{';
			$vw_church_custom_css .='padding: '.esc_attr($vw_church_logo_padding).';';
		$vw_church_custom_css .='}';
	}

	$vw_church_logo_margin = get_theme_mod('vw_church_logo_margin');
	if($vw_church_logo_margin != false){
		$vw_church_custom_css .='.top-bar .logo{';
			$vw_church_custom_css .='margin: '.esc_attr($vw_church_logo_margin).';';
		$vw_church_custom_css .='}';
	}

	/*------------------ Menus -------------------*/

	$vw_church_header_menus_color = get_theme_mod('vw_church_header_menus_color');
	if($vw_church_header_menus_color != false){
		$vw_church_custom_css .='.main-navigation a{';
			$vw_church_custom_css .='color: '.esc_attr($vw_church_header_menus_color).';';
		$vw_church_custom_css .='}';
	}

	$vw_church_header_menus_hover_color = get_theme_mod('vw_church_header_menus_hover_color');
	if($vw_church_header_menus_hover_color != false){
		$vw_church_custom_css .='.main-navigation a:hover{';
			$vw_church_custom_css .='color: '.esc_attr($vw_church_header_menus_hover_color).'!important;';
		$vw_church_custom_css .='}';
	}

	$vw_church_header_submenus_color = get_theme_mod('vw_church_header_submenus_color');
	if($vw_church_header_submenus_color != false){
		$vw_church_custom_css .='.main-navigation ul ul a{';
			$vw_church_custom_css .='color: '.esc_attr($vw_church_header_submenus_color).';';
		$vw_church_custom_css .='}';
	}

	$vw_church_header_submenus_hover_color = get_theme_mod('vw_church_header_submenus_hover_color');
	if($vw_church_header_submenus_hover_color != false){
		$vw_church_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$vw_church_custom_css .='color: '.esc_attr($vw_church_header_submenus_hover_color).'!important;';
		$vw_church_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_church_theme_lay = get_theme_mod( 'vw_church_blog_layout_option','Default');
    if($vw_church_theme_lay == 'Default'){
		$vw_church_custom_css .='.post-main-box{';
			$vw_church_custom_css .='';
		$vw_church_custom_css .='}';
	}else if($vw_church_theme_lay == 'Center'){
		$vw_church_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$vw_church_custom_css .='text-align:center;';
		$vw_church_custom_css .='}';
		$vw_church_custom_css .='.post-info{';
			$vw_church_custom_css .='margin-top:10px;';
		$vw_church_custom_css .='}';
		$vw_church_custom_css .='.post-info hr{';
			$vw_church_custom_css .='margin:15px auto;';
		$vw_church_custom_css .='}';
	}else if($vw_church_theme_lay == 'Left'){
		$vw_church_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_church_custom_css .='text-align:Left;';
		$vw_church_custom_css .='}';
		$vw_church_custom_css .='.post-info hr{';
			$vw_church_custom_css .='margin-bottom:10px;';
		$vw_church_custom_css .='}';
		$vw_church_custom_css .='.post-main-box h2{';
			$vw_church_custom_css .='margin-top:10px;';
		$vw_church_custom_css .='}';
	}

	/*------------- Preloader Background Color  -------------------*/

	$vw_church_preloader_bg_color = get_theme_mod('vw_church_preloader_bg_color');
	if($vw_church_preloader_bg_color != false){
		$vw_church_custom_css .='#preloader{';
			$vw_church_custom_css .='background-color: '.esc_attr($vw_church_preloader_bg_color).';';
		$vw_church_custom_css .='}';
	}

	$vw_church_preloader_border_color = get_theme_mod('vw_church_preloader_border_color');
	if($vw_church_preloader_border_color != false){
		$vw_church_custom_css .='.loader-line{';
			$vw_church_custom_css .='border-color: '.esc_attr($vw_church_preloader_border_color).'!important;';
		$vw_church_custom_css .='}';
	}

	/*----------------- Slider -----------------*/

	$vw_church_slider_hide_show = get_theme_mod('vw_church_slider_hide_show');
	if($vw_church_slider_hide_show == false){
		$vw_church_custom_css .='.page-template-custom-home-page .home-page-header{';
			$vw_church_custom_css .='position: static; background-color: #000; padding: 15px;';
		$vw_church_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_church_button_padding_top_bottom = get_theme_mod('vw_church_button_padding_top_bottom');
	$vw_church_button_padding_left_right = get_theme_mod('vw_church_button_padding_left_right');
	if($vw_church_button_padding_top_bottom != false || $vw_church_button_padding_left_right != false){
		$vw_church_custom_css .='.post-main-box .more-btn a{';
			$vw_church_custom_css .='padding-top: '.esc_attr($vw_church_button_padding_top_bottom).'!important; 
			padding-bottom: '.esc_attr($vw_church_button_padding_top_bottom).'!important;
			padding-left: '.esc_attr($vw_church_button_padding_left_right).'!important;
			padding-right: '.esc_attr($vw_church_button_padding_left_right).'!important;';
		$vw_church_custom_css .='}';
	}

	$vw_church_button_border_radius = get_theme_mod('vw_church_button_border_radius');
	if($vw_church_button_border_radius != false){
		$vw_church_custom_css .='.post-main-box .more-btn a{';
			$vw_church_custom_css .='border-radius: '.esc_attr($vw_church_button_border_radius).'px !important;';
		$vw_church_custom_css .='}';
	}

	$vw_church_button_font_size = get_theme_mod('vw_church_button_font_size',14);
	$vw_church_custom_css .='.post-main-box .more-btn a{';
		$vw_church_custom_css .='font-size: '.esc_attr($vw_church_button_font_size).'!important;';
	$vw_church_custom_css .='}';

	$vw_church_theme_lay = get_theme_mod( 'vw_church_button_text_transform','Uppercase');
	if($vw_church_theme_lay == 'Capitalize'){
		$vw_church_custom_css .='.post-main-box .more-btn a{';
			$vw_church_custom_css .='text-transform:Capitalize;';
		$vw_church_custom_css .='}';
	}
	if($vw_church_theme_lay == 'Lowercase'){
		$vw_church_custom_css .='.post-main-box .more-btn a{';
			$vw_church_custom_css .='text-transform:Lowercase;';
		$vw_church_custom_css .='}';
	}
	if($vw_church_theme_lay == 'Uppercase'){ 
		$vw_church_custom_css .='.post-main-box .more-btn a{';
			$vw_church_custom_css .='text-transform:Uppercase;';
		$vw_church_custom_css .='}';
	}
