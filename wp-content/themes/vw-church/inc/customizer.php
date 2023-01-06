<?php
/**
 * VW Church Theme Customizer
 *
 * @package VW Church
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function vw_church_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_church_custom_controls' );

function vw_church_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_church_Customize_partial_blogname',
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_church_Customize_partial_blogdescription',
	));

	//Homepage Settings
	$wp_customize->add_panel( 'vw_church_homepage_panel', array(
		'title' => esc_html__( 'Homepage Settings', 'vw-church' ),
		'panel' => 'vw_church_panel_id',
		'priority' => 20,
	));

	//Topbar
	$wp_customize->add_section( 'vw_church_header_section' , array(
  	'title' => __( 'Header Section', 'vw-church' ),
		'panel' => 'vw_church_homepage_panel'
	) );

	$wp_customize->add_setting('vw_church_phone_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_phone_text',array(
		'label'	=> esc_html__('Add Phone Text','vw-church'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Phone No', 'vw-church' ),
    ),
		'section'=> 'vw_church_header_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_church_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_church_sanitize_phone_number'
	));
	$wp_customize->add_control('vw_church_phone_number',array(
		'label'	=> esc_html__('Add Phone Number','vw-church'),
		'input_attrs' => array(
      'placeholder' => esc_html__( '1234567890', 'vw-church' ),
    ),
		'section'=> 'vw_church_header_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_church_donate_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_donate_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-church'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Donate Now', 'vw-church' ),
    ),
		'section'=> 'vw_church_header_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_church_donate_button_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('vw_church_donate_button_link',array(
		'label'	=> esc_html__('Add Button Link','vw-church'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'www.example-info.com', 'vw-church' ),
    ),
		'section'=> 'vw_church_header_section',
		'type'=> 'url'
	));

	$wp_customize->add_setting('vw_church_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_church_header_menus_color', array(
		'label'    => __('Menus Color', 'vw-church'),
		'section'  => 'vw_church_header_section',
	)));

	$wp_customize->add_setting('vw_church_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_church_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'vw-church'),
		'section'  => 'vw_church_header_section',
	)));

	$wp_customize->add_setting('vw_church_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_church_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'vw-church'),
		'section'  => 'vw_church_header_section',
	)));

	$wp_customize->add_setting('vw_church_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_church_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'vw-church'),
		'section'  => 'vw_church_header_section',
	)));

	//Slider
	$wp_customize->add_section( 'vw_church_slidersettings' , array(
  	'title'      => __( 'Slider Settings', 'vw-church' ),
  	'description' => __('Free theme has 3 slides options, For unlimited slides and more options </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/religion-wordpress-theme/">GO PRO</a>','vw-church'),
		'panel' => 'vw_church_homepage_panel'
	) );

	$wp_customize->add_setting( 'vw_church_slider_hide_show',array(
    'default' => 0,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_church_switch_sanitization'
  ));  
  $wp_customize->add_control( new VW_Church_Toggle_Switch_Custom_Control( $wp_customize, 'vw_church_slider_hide_show',array(
    'label' => esc_html__( 'Show / Hide Slider','vw-church' ),
    'section' => 'vw_church_slidersettings'
  )));

  $wp_customize->add_setting('vw_church_slider_type',array(
        'default' => 'Default slider',
        'sanitize_callback' => 'vw_church_sanitize_choices'
	) );
	$wp_customize->add_control('vw_church_slider_type', array(
        'type' => 'select',
        'label' => __('Slider Type','vw-church'),
        'section' => 'vw_church_slidersettings',
        'choices' => array(
            'Default slider' => __('Default slider','vw-church'),
            'Advance slider' => __('Advance slider','vw-church'),
        ),
	));

	$wp_customize->add_setting('vw_church_advance_slider_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_advance_slider_shortcode',array(
		'label'	=> __('Add Slider Shortcode','vw-church'),
		'section'=> 'vw_church_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_church_advance_slider'
	));

   //Selective Refresh
  $wp_customize->selective_refresh->add_partial('vw_church_slider_hide_show',array(
		'selector'        => '.slider-btn a',
		'render_callback' => 'vw_church_customize_partial_vw_church_slider_hide_show',
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'vw_church_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_church_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_church_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'vw-church' ),
			'description' => __('Slider image size (1400 x 550)','vw-church'),
			'section'  => 'vw_church_slidersettings',
			'type'     => 'dropdown-pages',
			'active_callback' => 'vw_church_default_slider'
		) );
	}

	$wp_customize->add_setting( 'vw_church_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'vw_church_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-church'),
		'section' => 'vw_church_slidersettings',
		'type'  => 'text',
		'active_callback' => 'vw_church_default_slider'
	) );

	//Slider height
	$wp_customize->add_setting('vw_church_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_slider_height',array(
		'label'	=> __('Slider Height','vw-church'),
		'description'	=> __('Specify the slider height (px).','vw-church'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-church' ),
        ),
		'section'=> 'vw_church_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_church_default_slider'
	));

	//About Section
	$wp_customize->add_section('vw_church_about', array(
		'title'       => __('About Us Section', 'vw-church'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-church'),
		'priority'    => null,
		'panel'       => 'vw_church_homepage_panel',
	));

	$wp_customize->add_setting('vw_church_about_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_about_text',array(
		'description' => __('<p>1. More options for about us section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for about us section.</p>','vw-church'),
		'section'=> 'vw_church_about',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_church_about_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_about_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_church_guide') ." '>More Info</a>",
		'section'=> 'vw_church_about',
		'type'=> 'hidden'
	));

	//Our Mission Section
	$wp_customize->add_section('vw_church_our_mission', array(
		'title'       => __('Our Mission Section', 'vw-church'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-church'),
		'priority'    => null,
		'panel'       => 'vw_church_homepage_panel',
	));

	$wp_customize->add_setting('vw_church_our_mission_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_our_mission_text',array(
		'description' => __('<p>1. More options for our mission section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our mission section.</p>','vw-church'),
		'section'=> 'vw_church_our_mission',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_church_our_mission_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_our_mission_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_church_guide') ." '>More Info</a>",
		'section'=> 'vw_church_our_mission',
		'type'=> 'hidden'
	));

	//Projects Section
	$wp_customize->add_section('vw_church_projects', array(
		'title'       => __('Projects Section', 'vw-church'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-church'),
		'priority'    => null,
		'panel'       => 'vw_church_homepage_panel',
	));

	$wp_customize->add_setting('vw_church_projects_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_projects_text',array(
		'description' => __('<p>1. More options for projects section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for projects section.</p>','vw-church'),
		'section'=> 'vw_church_projects',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_church_projects_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_projects_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_church_guide') ." '>More Info</a>",
		'section'=> 'vw_church_projects',
		'type'=> 'hidden'
	));

	//Records Section
	$wp_customize->add_section('vw_church_records', array(
		'title'       => __('Records Section', 'vw-church'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-church'),
		'priority'    => null,
		'panel'       => 'vw_church_homepage_panel',
	));

	$wp_customize->add_setting('vw_church_records_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_records_text',array(
		'description' => __('<p>1. More options for records section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for records section.</p>','vw-church'),
		'section'=> 'vw_church_records',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_church_records_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_records_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_church_guide') ." '>More Info</a>",
		'section'=> 'vw_church_records',
		'type'=> 'hidden'
	));

	// Events Section
	$wp_customize->add_section('vw_church_events_section',array(
		'title'	=> __('Events Section','vw-church'),
		'description' => __('For more options of events section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/religion-wordpress-theme/">GO PRO</a>','vw-church'),
		'panel' => 'vw_church_homepage_panel',
	));

	$wp_customize->add_setting( 'vw_church_events_small_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'vw_church_events_small_title', array(
		'label'    => __( 'Add Section Small Title', 'vw-church' ),
		'input_attrs' => array(
      'placeholder' => __( 'Our Events', 'vw-church' ),
    ),
		'section'  => 'vw_church_events_section',
		'type'     => 'text'
	) );

	$wp_customize->add_setting( 'vw_church_events_heading', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'vw_church_events_heading', array(
		'label'    => __( 'Add Section Heading', 'vw-church' ),
		'input_attrs' => array(
      'placeholder' => __( 'Upcoming Events', 'vw-church' ),
    ),
		'section'  => 'vw_church_events_section',
		'type'     => 'text'
	) );

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_church_events_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_church_sanitize_choices',
	));
	$wp_customize->add_control('vw_church_events_category',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display events','vw-church'),
		'section' => 'vw_church_events_section',
	));

	$wp_customize->add_setting('vw_church_events_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_events_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-church'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'More Upco. Events', 'vw-church' ),
    ),
		'section'=> 'vw_church_events_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_church_events_button_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('vw_church_events_button_link',array(
		'label'	=> esc_html__('Add Button Link','vw-church'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'www.example-info.com', 'vw-church' ),
    ),
		'section'=> 'vw_church_events_section',
		'type'=> 'url'
	));

	//Team Section
	$wp_customize->add_section('vw_church_team', array(
		'title'       => __('Team Section', 'vw-church'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-church'),
		'priority'    => null,
		'panel'       => 'vw_church_homepage_panel',
	));

	$wp_customize->add_setting('vw_church_team_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_team_text',array(
		'description' => __('<p>1. More options for team section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for team section.</p>','vw-church'),
		'section'=> 'vw_church_team',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_church_team_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_team_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_church_guide') ." '>More Info</a>",
		'section'=> 'vw_church_team',
		'type'=> 'hidden'
	));

	//Why Choose Us Section
	$wp_customize->add_section('vw_church_why_choose_us', array(
		'title'       => __('Why Choose Us Section', 'vw-church'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-church'),
		'priority'    => null,
		'panel'       => 'vw_church_homepage_panel',
	));

	$wp_customize->add_setting('vw_church_why_choose_us_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_why_choose_us_text',array(
		'description' => __('<p>1. More options for why choose us section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for why choose us section.</p>','vw-church'),
		'section'=> 'vw_church_why_choose_us',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_church_why_choose_us_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_why_choose_us_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_church_guide') ." '>More Info</a>",
		'section'=> 'vw_church_why_choose_us',
		'type'=> 'hidden'
	));

	//Testimonial Section
	$wp_customize->add_section('vw_church_testimonial', array(
		'title'       => __('Testimonial Section', 'vw-church'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-church'),
		'priority'    => null,
		'panel'       => 'vw_church_homepage_panel',
	));

	$wp_customize->add_setting('vw_church_testimonial_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_testimonial_text',array(
		'description' => __('<p>1. More options for testimonial section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for testimonial section.</p>','vw-church'),
		'section'=> 'vw_church_testimonial',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_church_testimonial_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_testimonial_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_church_guide') ." '>More Info</a>",
		'section'=> 'vw_church_testimonial',
		'type'=> 'hidden'
	));

	//Donation Section
	$wp_customize->add_section('vw_church_donation', array(
		'title'       => __('Donation Section', 'vw-church'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-church'),
		'priority'    => null,
		'panel'       => 'vw_church_homepage_panel',
	));

	$wp_customize->add_setting('vw_church_donation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_donation_text',array(
		'description' => __('<p>1. More options for donation section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for donation section.</p>','vw-church'),
		'section'=> 'vw_church_donation',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_church_donation_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_donation_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_church_guide') ." '>More Info</a>",
		'section'=> 'vw_church_donation',
		'type'=> 'hidden'
	));

	//Blog Section
	$wp_customize->add_section('vw_church_blog', array(
		'title'       => __('Blog Section', 'vw-church'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-church'),
		'priority'    => null,
		'panel'       => 'vw_church_homepage_panel',
	));

	$wp_customize->add_setting('vw_church_blog_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_blog_text',array(
		'description' => __('<p>1. More options for blog section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for blog section.</p>','vw-church'),
		'section'=> 'vw_church_blog',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_church_blog_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_blog_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_church_guide') ." '>More Info</a>",
		'section'=> 'vw_church_blog',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('vw_church_footer',array(
		'title'	=> esc_html__('Footer Settings','vw-church'),
		'description' => __('For more options of footer section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/religion-wordpress-theme/">GO PRO</a>','vw-church'),
		'panel' => 'vw_church_homepage_panel',
	));	

	$wp_customize->add_setting('vw_church_footer_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_church_footer_background_color', array(
		'label'    => __('Footer Background Color', 'vw-church'),
		'section'  => 'vw_church_footer',
	)));

	$wp_customize->add_setting('vw_church_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_church_footer_background_image',array(
        'label' => __('Footer Background Image','vw-church'),
        'section' => 'vw_church_footer'
	)));

	$wp_customize->add_setting('vw_church_footer_widgets_heading',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_church_sanitize_choices'
	));
	$wp_customize->add_control('vw_church_footer_widgets_heading',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading','vw-church'),
        'section' => 'vw_church_footer',
        'choices' => array(
        	'Left' => __('Left','vw-church'),
            'Center' => __('Center','vw-church'),
            'Right' => __('Right','vw-church')
        ),
	) );

	$wp_customize->add_setting('vw_church_footer_widgets_content',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_church_sanitize_choices'
	));
	$wp_customize->add_control('vw_church_footer_widgets_content',array(
        'type' => 'select',
        'label' => __('Footer Widget Content','vw-church'),
        'section' => 'vw_church_footer',
        'choices' => array(
        	'Left' => __('Left','vw-church'),
            'Center' => __('Center','vw-church'),
            'Right' => __('Right','vw-church')
        ),
	) );

	// footer padding
	$wp_customize->add_setting('vw_church_footer_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_footer_padding',array(
		'label'	=> __('Footer Top Bottom Padding','vw-church'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-church'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-church' ),
    ),
		'section'=> 'vw_church_footer',
		'type'=> 'text'
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_church_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'vw_church_Customize_partial_vw_church_footer_text', 
	));
	
	$wp_customize->add_setting('vw_church_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_church_footer_text',array(
		'label'	=> esc_html__('Copyright Text','vw-church'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2021, .....', 'vw-church' ),
        ),
		'section'=> 'vw_church_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_church_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_church_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Church_Image_Radio_Control($wp_customize, 'vw_church_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','vw-church'),
        'section' => 'vw_church_footer',
        'settings' => 'vw_church_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

	// footer social icon
	$wp_customize->add_setting( 'vw_church_footer_icon',array(
	'default' => false,
	'transport' => 'refresh',
	'sanitize_callback' => 'vw_church_switch_sanitization'
  ) );
	$wp_customize->add_control( new vw_church_Toggle_Switch_Custom_Control( $wp_customize, 'vw_church_footer_icon',array(
	'label' => esc_html__( 'Footer Social Icon','vw-church' ),
	'section' => 'vw_church_footer'
  )));

  $wp_customize->add_setting( 'vw_church_hide_show_scroll',array(
  	'default' => 1,
    	'transport' => 'refresh',
    	'sanitize_callback' => 'vw_church_switch_sanitization'
  ));  
  $wp_customize->add_control( new VW_Church_Toggle_Switch_Custom_Control( $wp_customize, 'vw_church_hide_show_scroll',array(
    	'label' => esc_html__( 'Show / Hide Scroll to Top','vw-church' ),
    	'section' => 'vw_church_footer'
  )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_church_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_church_Customize_partial_vw_church_scroll_to_top_icon', 
	));

  $wp_customize->add_setting('vw_church_scroll_top_alignment',array(
    'default' => 'Right',
    'sanitize_callback' => 'vw_church_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Church_Image_Radio_Control($wp_customize, 'vw_church_scroll_top_alignment', array(
    'type' => 'select',
    'label' => esc_html__('Scroll To Top','vw-church'),
    'section' => 'vw_church_footer',
    'settings' => 'vw_church_scroll_top_alignment',
    'choices' => array(
        'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
        'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
        'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

	//Blog Post
	$wp_customize->add_panel( 'vw_church_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'vw-church' ),
		'panel' => 'vw_church_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_church_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'vw-church' ),
		'panel' => 'vw_church_blog_post_parent_panel',
	));

	//Blog layout
    $wp_customize->add_setting('vw_church_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'vw_church_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Church_Image_Radio_Control($wp_customize, 'vw_church_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Post Layouts','vw-church'),
        'section' => 'vw_church_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_church_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_church_Customize_partial_vw_church_toggle_postdate', 
	));

	$wp_customize->add_setting( 'vw_church_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_church_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Church_Toggle_Switch_Custom_Control( $wp_customize, 'vw_church_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-church' ),
        'section' => 'vw_church_post_settings'
    )));

    $wp_customize->add_setting( 'vw_church_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_church_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Church_Toggle_Switch_Custom_Control( $wp_customize, 'vw_church_toggle_author',array(
		'label' => esc_html__( 'Author','vw-church' ),
		'section' => 'vw_church_post_settings'
    )));

    $wp_customize->add_setting( 'vw_church_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_church_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Church_Toggle_Switch_Custom_Control( $wp_customize, 'vw_church_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-church' ),
		'section' => 'vw_church_post_settings'
    )));

    $wp_customize->add_setting( 'vw_church_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_church_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Church_Toggle_Switch_Custom_Control( $wp_customize, 'vw_church_toggle_time',array(
		'label' => esc_html__( 'Time','vw-church' ),
		'section' => 'vw_church_post_settings'
    )));

    $wp_customize->add_setting( 'vw_church_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_church_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Church_Toggle_Switch_Custom_Control( $wp_customize, 'vw_church_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','vw-church' ),
		'section' => 'vw_church_post_settings'
    )));

    $wp_customize->add_setting( 'vw_church_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_church_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Church_Toggle_Switch_Custom_Control( $wp_customize, 'vw_church_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-church' ),
		'section' => 'vw_church_post_settings'
    )));

    $wp_customize->add_setting( 'vw_church_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_church_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_church_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-church' ),
		'section'     => 'vw_church_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_church_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_church_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-church'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-church'),
		'section'=> 'vw_church_post_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('vw_church_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_church_sanitize_choices'
	));
	$wp_customize->add_control('vw_church_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Post Content','vw-church'),
        'section' => 'vw_church_post_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','vw-church'),
            'Excerpt' => esc_html__('Excerpt','vw-church'),
            'No Content' => esc_html__('No Content','vw-church')
        ),
	) );

    // Button Settings
	$wp_customize->add_section( 'vw_church_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'vw-church' ),
		'panel' => 'vw_church_blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_church_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_button_padding_top_bottom',array(
		'label'	=> esc_html__('Padding Top Bottom','vw-church'),
		'description' => esc_html__('Enter a value in pixels. Example:20px','vw-church'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '10px', 'vw-church' ),
        ),
		'section' => 'vw_church_button_settings',
		'type' => 'text'
	));

	$wp_customize->add_setting('vw_church_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_button_padding_left_right',array(
		'label'	=> esc_html__('Padding Left Right','vw-church'),
		'description' => esc_html__('Enter a value in pixels. Example:20px','vw-church'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '10px', 'vw-church' ),
        ),
		'section' => 'vw_church_button_settings',
		'type' => 'text'
	));

	$wp_customize->add_setting( 'vw_church_button_border_radius', array(
		'default'              => 5,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_church_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_church_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-church' ),
		'section'     => 'vw_church_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

		// font size button
	$wp_customize->add_setting('vw_church_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_button_font_size',array(
		'label'	=> __('Button Font Size','vw-church'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-church'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-church' ),
    ),
    'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_church_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('vw_church_button_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'vw_church_sanitize_choices'
	));
	$wp_customize->add_control('vw_church_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','vw-church'),
		'choices' => array(
            'Uppercase' => __('Uppercase','vw-church'),
            'Capitalize' => __('Capitalize','vw-church'),
            'Lowercase' => __('Lowercase','vw-church'),
        ),
		'section'=> 'vw_church_button_settings',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_church_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'vw_church_Customize_partial_vw_church_button_text', 
	));

    $wp_customize->add_setting('vw_church_button_text',array(
		'default'=> esc_html__('Read More','vw-church'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-church'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'vw-church' ),
        ),
		'section'=> 'vw_church_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_church_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'vw-church' ),
		'panel' => 'vw_church_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_church_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_church_Customize_partial_vw_church_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_church_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_church_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Church_Toggle_Switch_Custom_Control( $wp_customize, 'vw_church_related_post',array(
		'label' => esc_html__( 'Related Post','vw-church' ),
		'section' => 'vw_church_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_church_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_church_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','vw-church'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'vw-church' ),
        ),
		'section'=> 'vw_church_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_church_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'vw_church_sanitize_number_absint'
	));
	$wp_customize->add_control('vw_church_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','vw-church'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'vw-church' ),
        ),
		'section'=> 'vw_church_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'vw_church_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-church' ),
		'panel' => 'vw_church_blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_church_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_church_switch_sanitization'
    ) );
  $wp_customize->add_control( new VW_Church_Toggle_Switch_Custom_Control( $wp_customize, 'vw_church_single_post_breadcrumb',array(
		'label' => esc_html__( 'Single Post Breadcrumb','vw-church' ),
		'section' => 'vw_church_single_blog_settings'
  )));

  // Single Posts Category
  $wp_customize->add_setting( 'vw_church_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_church_switch_sanitization'
    ) );
  $wp_customize->add_control( new VW_Church_Toggle_Switch_Custom_Control( $wp_customize, 'vw_church_single_post_category',array(
		'label' => esc_html__( 'Single Post Category','vw-church' ),
		'section' => 'vw_church_single_blog_settings'
   )));

  // Grid layout setting
	$wp_customize->add_section( 'vw_church_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'vw-church' ),
		'panel' => 'vw_church_blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_church_grid_postdate',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_church_switch_sanitization'
    ) );
  $wp_customize->add_control( new vw_church_Toggle_Switch_Custom_Control( $wp_customize, 'vw_church_grid_postdate',array(
      'label' => esc_html__( 'Post Date','vw-church' ),
      'section' => 'vw_church_grid_layout_settings'
   )));

  $wp_customize->add_setting( 'vw_church_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_church_switch_sanitization'
    ) );
  $wp_customize->add_control( new vw_church_Toggle_Switch_Custom_Control( $wp_customize, 'vw_church_grid_author',array(
		'label' => esc_html__( 'Author','vw-church' ),
		'section' => 'vw_church_grid_layout_settings'
  )));

  $wp_customize->add_setting( 'vw_church_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_church_switch_sanitization'
  ) );
  $wp_customize->add_control( new vw_church_Toggle_Switch_Custom_Control( $wp_customize, 'vw_church_grid_comments',array(
		'label' => esc_html__( 'Comments','vw-church' ),
		'section' => 'vw_church_grid_layout_settings'
  )));

	//Others Settings
	$wp_customize->add_panel( 'vw_church_others_panel', array(
		'title' => esc_html__( 'Others Settings', 'vw-church' ),
		'panel' => 'vw_church_panel_id',
		'priority' => 20,
	));

	// Layout
	$wp_customize->add_section( 'vw_church_left_right', array(
    	'title' => esc_html__('General Settings', 'vw-church'),
		'panel' => 'vw_church_others_panel'
	) );

	$wp_customize->add_setting('vw_church_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_church_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Church_Image_Radio_Control($wp_customize, 'vw_church_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','vw-church'),
        'description' => esc_html__('Here you can change the width layout of Website.','vw-church'),
        'section' => 'vw_church_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('vw_church_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_church_sanitize_choices'
	));
	$wp_customize->add_control('vw_church_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','vw-church'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','vw-church'),
        'section' => 'vw_church_left_right',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','vw-church'),
            'Right Sidebar' => esc_html__('Right Sidebar','vw-church'),
            'One Column' => esc_html__('One Column','vw-church'),
            'Grid Layout' => esc_html__('Grid Layout','vw-church')
        ),
	) );

	$wp_customize->add_setting('vw_church_page_layout',array(
        'default' => 'One_Column',
        'sanitize_callback' => 'vw_church_sanitize_choices'
	));
	$wp_customize->add_control('vw_church_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','vw-church'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','vw-church'),
        'section' => 'vw_church_left_right',
        'choices' => array(
            'Left_Sidebar' => esc_html__('Left Sidebar','vw-church'),
            'Right_Sidebar' => esc_html__('Right Sidebar','vw-church'),
            'One_Column' => esc_html__('One Column','vw-church')
        ),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_church_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','vw-church'),
		'panel' => 'vw_church_others_panel',
	));

	$wp_customize->add_setting('vw_church_resp_menu_toggle_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_church_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'vw-church'),
		'section'  => 'vw_church_responsive_media',
	)));

    $wp_customize->add_setting( 'vw_church_resp_slider_hide_show',array(
      	'default' => 0,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_church_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Church_Toggle_Switch_Custom_Control( $wp_customize, 'vw_church_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','vw-church' ),
      	'section' => 'vw_church_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_church_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_church_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Church_Toggle_Switch_Custom_Control( $wp_customize, 'vw_church_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','vw-church' ),
      	'section' => 'vw_church_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_church_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_church_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Church_Toggle_Switch_Custom_Control( $wp_customize, 'vw_church_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-church' ),
      	'section' => 'vw_church_responsive_media'
    )));

	// Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_church_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar', 
		'render_callback' => 'vw_church_customize_partial_vw_church_woocommerce_shop_page_sidebar', ) );

  // Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_church_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_church_switch_sanitization'
    ) );
  $wp_customize->add_control( new VW_Church_Toggle_Switch_Custom_Control( $wp_customize, 'vw_church_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-church' ),
		'section' => 'vw_church_left_right'
  )));

  $wp_customize->add_setting('vw_church_shop_page_layout',array(
      'default' => 'Right Sidebar',
      'sanitize_callback' => 'vw_church_sanitize_choices'
	));
	$wp_customize->add_control('vw_church_shop_page_layout',array(
      'type' => 'select',
      'label' => __('Shop Page Sidebar Layout','vw-church'),
      'section' => 'vw_church_left_right',
      'choices' => array(
          'Left Sidebar' => __('Left Sidebar','vw-church'),
          'Right Sidebar' => __('Right Sidebar','vw-church'),
        ),
	) );

  // Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_church_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar', 
		'render_callback' => 'vw_church_customize_partial_vw_church_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_church_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_church_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Church_Toggle_Switch_Custom_Control( $wp_customize, 'vw_church_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-church' ),
		'section' => 'vw_church_left_right'
    )));

    $wp_customize->add_setting( 'vw_church_single_page_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_church_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Church_Toggle_Switch_Custom_Control( $wp_customize, 'vw_church_single_page_breadcrumb',array(
		'label' => esc_html__( 'Single Page Breadcrumb','vw-church' ),
		'section' => 'vw_church_left_right'
    )));

    //Wow Animation
	$wp_customize->add_setting( 'vw_church_animation',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_church_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Church_Toggle_Switch_Custom_Control( $wp_customize, 'vw_church_animation',array(
        'label' => esc_html__( 'Animations','vw-church' ),
        'description' => __('Here you can disable overall site animation effect','vw-church'),
        'section' => 'vw_church_left_right'
    )));

    // Pre-Loader
	$wp_customize->add_setting( 'vw_church_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_church_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Church_Toggle_Switch_Custom_Control( $wp_customize, 'vw_church_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-church' ),
        'section' => 'vw_church_left_right'
    )));

	$wp_customize->add_setting('vw_church_preloader_bg_color', array(
		'default'           => '#f26837',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_church_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-church'),
		'section'  => 'vw_church_left_right',
	)));

	$wp_customize->add_setting('vw_church_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_church_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-church'),
		'section'  => 'vw_church_left_right',
	)));

}

add_action( 'customize_register', 'vw_church_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Church_Customize {

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
		$manager->register_section_type( 'VW_Church_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new VW_Church_Customize_Section_Pro( $manager,'vw_church_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW Church PRO', 'vw-church' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-church' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/religion-wordpress-theme/'),
		) )	);

		// Register sections.
		$manager->add_section(new VW_Church_Customize_Section_Pro($manager,'vw_church_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-church' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-church' ),
			'pro_url'  => esc_url('https://www.vwthemesdemo.com/docs/free-vw-church/'),
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

		wp_enqueue_script( 'vw-church-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-church-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Church_Customize::get_instance();