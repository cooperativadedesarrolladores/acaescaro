<?php

function invert_lite_customize_register( $wp_customize ) {

	// define image directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	// Do stuff with $wp_customize, the WP_Customize_Manager object.
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	$wp_customize->remove_control('header_textcolor');
	
	// ====================================
	// = Advertica Lite Theme Pannel
	// ====================================
	$wp_customize->add_panel( 'home_page_settings', array(
		'title' => esc_html__( 'Home Page Settings', 'invert-lite'),
		'priority' => 10
	) );

	// ====================================
	// = Advertica Lite Theme Sections
	// ====================================
	
	// Home Page
	$wp_customize->add_section( 'home_featured_section' , array(
		'title' => esc_html__('Home Featured Box','invert-lite'),
		'panel' => 'home_page_settings',
	) );
	$wp_customize->add_section( 'home_cta_section' , array(
		'title' => esc_html__('Home Call to Action','invert-lite'),
		'panel' => 'home_page_settings',
	) );
	$wp_customize->add_section( 'home_parallax_section' , array(
		'title' => esc_html__('Home Parallax','invert-lite'),
		'panel' => 'home_page_settings',
	) );
	$wp_customize->add_section( 'home_blogs_section' , array(
		'title' => esc_html__('Home Blogs','invert-lite'),
		'panel' => 'home_page_settings',
	) );
	$wp_customize->add_section( 'home_clients_section' , array(
		'title' => esc_html__('Home Clients Logo','invert-lite'),
		'panel' => 'home_page_settings',
	) );

	// Breadcrumb
	$wp_customize->add_section( 'breadcrumb_settings' , array(
		'title' => esc_html__('Breadcrumb Settings','invert-lite'),
	) );
	
	// Footer
	$wp_customize->add_section( 'footer_settings' , array(
		'title' => esc_html__('Footer Settings','invert-lite'),
	) );

	// ====================================
	// = General Settings Sections
	// ====================================
	
	// Theme Color
	$wp_customize->add_setting( 'invert_lite_pri_color', array(
		'default'           => '#1ac8d2' ,
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'invert_lite_pri_color', array(
		'priority'	=> 1,
		'label'       => esc_html__( 'Choose Theme Color', 'invert-lite' ),
		'section'     => 'colors',
	) ) );
	$wp_customize->add_setting( 'invert_lite_headerbg_color', array(
		'default'           => '#ffffff' ,
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'invert_lite_headerbg_color', array(
		'priority'	=> 2,
		'label'       => esc_html__( 'Sticky Header Background Color', 'invert-lite' ),
		'section'     => 'colors',
	) ) );
	$wp_customize->add_setting( 'invert_lite_navfont_color', array(
		'default'           => '#333333' ,
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'invert_lite_navfont_color', array(
		'priority'	=> 3,
		'label'       => esc_html__( 'Navigation Font Color', 'invert-lite' ),
		'section'     => 'colors',
	) ) );

	// Logo Image
	$wp_customize->add_setting( 'invert_lite_logo_img', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control(  new WP_Customize_Image_Control( $wp_customize, 'invert_lite_logo_img', array(
		'priority' => 1,
		'label' => esc_html__( 'Logo Image', 'invert-lite' ),
		'section' => 'title_tagline',
		'mime_type' => 'image',
	) ) );

	// ====================================
	// =  Home Featured Section
	// ====================================
	$wp_customize->add_setting( 'home_feature_sec', array(
		'default'           => 'on',
		'sanitize_callback' => 'invert_lite_sanitize_on_off',
	) );
	$wp_customize->add_control( 'home_feature_sec', array(
		'type' => 'radio',
		'section' => 'home_featured_section',
		'label' => esc_html__( 'Feature Section ON/OFF', 'invert-lite' ),
		'choices' => array(
			'on' => __('ON', 'invert-lite' ),
			'off'=> __('OFF', 'invert-lite' )
		),
	) );

	// First Featured Box
	$wp_customize->add_setting( 'first_feature_heading', array(
		'default'        => esc_html__('Business Strategy', 'invert-lite'),
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
	));
	$wp_customize->add_control('first_feature_heading', array(
		'label' => esc_html__('First Featured Box Heading','invert-lite'),
		'section' => 'home_featured_section',
		'active_callback' => 'invert_lite_active_feature_section'
	));
	$wp_customize->add_setting( 'first_feature_image', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'first_feature_image', array(
		'label' => esc_html__( 'First Featured Box Image', 'invert-lite' ),
		'description' => esc_html__('Recomended size 150x150 px.', 'invert-lite'),
		'section' => 'home_featured_section',
		'active_callback' => 'invert_lite_active_feature_section'
	) ) );
	$wp_customize->add_setting( 'first_feature_content', array(
		'default'        => esc_html__('Get focused from your target consumers and increase your business with Web portal Design and Development.', 'invert-lite'),
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
	));
	$wp_customize->add_control('first_feature_content', array(
		'type' => 'textarea',
		'label' => esc_html__('First Featured Box Content','invert-lite'),
		'section' => 'home_featured_section',
		'active_callback' => 'invert_lite_active_feature_section'
	));
	$wp_customize->add_setting( 'first_feature_link', array(
		'default'        => '#',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control('first_feature_link', array(
		'type' => 'url',
		'label' => esc_html__('First Featured Box Link','invert-lite'),
		'section' => 'home_featured_section',
		'active_callback' => 'invert_lite_active_feature_section'
	));

	// Second Featured Box
	$wp_customize->add_setting( 'second_feature_heading', array(
		'default'        => esc_html__('Quality Products', 'invert-lite'),
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
	));
	$wp_customize->add_control('second_feature_heading', array(
		'label' => esc_html__('Second Featured Box Heading','invert-lite'),
		'section' => 'home_featured_section',
		'active_callback' => 'invert_lite_active_feature_section'
	));
	$wp_customize->add_setting( 'second_feature_image', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'second_feature_image', array(
		'label' => esc_html__( 'Second Featured Box Image', 'invert-lite' ),
		'description' => __('Recomended size 150x150 px.', 'invert-lite'),
		'section' => 'home_featured_section',
		'active_callback' => 'invert_lite_active_feature_section'
	) ) );
	$wp_customize->add_setting( 'second_feature_content', array(
		'default'        => esc_html__('Products with the ultimate features and functionality that provide the complete satisfaction to the clients.', 'invert-lite'),
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
	));
	$wp_customize->add_control('second_feature_content', array(
		'type' => 'textarea',
		'label' => esc_html__('Second Featured Box Content','invert-lite'),
		'section' => 'home_featured_section',
		'active_callback' => 'invert_lite_active_feature_section'
	));
	$wp_customize->add_setting( 'second_feature_link', array(
		'default'        => '#',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control('second_feature_link', array(
		'type' => 'url',
		'label' => esc_html__('Second Featured Box Link','invert-lite'),
		'section' => 'home_featured_section',
		'active_callback' => 'invert_lite_active_feature_section'
	));

	// Third Featured Box
	$wp_customize->add_setting( 'third_feature_heading', array(
		'default'        => esc_html__('Best Business Plans', 'invert-lite'),
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
	));
	$wp_customize->add_control('third_feature_heading', array(
		'label' => esc_html__('Third Featured Box Heading','invert-lite'),
		'section' => 'home_featured_section',
		'active_callback' => 'invert_lite_active_feature_section'
	));
	$wp_customize->add_setting( 'third_feature_image', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'third_feature_image', array(
		'label' => esc_html__( 'Third Featured Box Image', 'invert-lite' ),
		'description' => esc_html__('Recomended size 150x150 px.', 'invert-lite'),
		'section' => 'home_featured_section',
		'active_callback' => 'invert_lite_active_feature_section'
	) ) );
	$wp_customize->add_setting( 'third_feature_content', array(
		'default'        => esc_html__('Based on the client requirement, different business plans suits and fulfill your business and cost requirement.', 'invert-lite'),
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
	));
	$wp_customize->add_control('third_feature_content', array(
		'type' => 'textarea',
		'label' => esc_html__('Third Featured Box Content','invert-lite'),
		'section' => 'home_featured_section',
		'active_callback' => 'invert_lite_active_feature_section'
	));
	$wp_customize->add_setting( 'third_feature_link', array(
		'default'        => '#',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control('third_feature_link', array(
		'type' => 'url',
		'label' => esc_html__('Third Featured Box Link','invert-lite'),
		'section' => 'home_featured_section',
		'active_callback' => 'invert_lite_active_feature_section'
	));

	// ====================================
	// =  Home Call to Action Section
	// ====================================
	$wp_customize->add_setting( 'home_cta_sec', array(
		'default'           => 'on',
		'sanitize_callback' => 'invert_lite_sanitize_on_off',
	) );
	$wp_customize->add_control( 'home_cta_sec', array(
		'label' => esc_html__( 'Home Call to Action ON/OFF', 'invert-lite' ),
		'section' => 'home_cta_section',
		'type' => 'radio',
		'choices' => array(
			'on' => esc_html__('ON', 'invert-lite' ),
			'off'=> esc_html__('OFF', 'invert-lite' )
		),
	) );
	$wp_customize->add_setting( 'home_cta_heading', array(
		'default'        => esc_html__('JOIN THE ULTIMATE AND IRREPLACEABLE EXPERIENCE NOW.','invert-lite'),
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
	));
	$wp_customize->add_control('home_cta_heading', array(
		'label' => esc_html__('Call to Action Box Heading','invert-lite'),
		'section' => 'home_cta_section',
	));
	$wp_customize->add_setting( 'home_cta_content', array(
		'default'        => '<p>'.esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec consequat malesuada urna, non fringilla purus malesuada eget.','invert-lite').'</p>',
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
	));
	$wp_customize->add_control('home_cta_content', array(
		'type' => 'textarea',
		'label' => esc_html__('Call to Action Box Content','invert-lite'),
		'section' => 'home_cta_section',
	));
	$wp_customize->add_setting( 'home_cta_btn_txt', array(
		'default'        => esc_html__('Sign-Up Now', 'invert-lite'),
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
	));
	$wp_customize->add_control('home_cta_btn_txt', array(
		'label' => esc_html__('Call to Action Button Text','invert-lite'),
		'section' => 'home_cta_section',
	));
	$wp_customize->add_setting( 'home_cta_btn_link', array(
		'default'        => '#',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control('home_cta_btn_link', array(
		'label' => esc_html__('Call to Action Button Link','invert-lite'),
		'section' => 'home_cta_section',
	));

	// ====================================
	// =  Home Parallax Section
	// ====================================
	$wp_customize->add_setting( 'home_parallax_sec', array(
		'default'           => 'on',
		'sanitize_callback' => 'invert_lite_sanitize_on_off',
	) );
	$wp_customize->add_control( 'home_parallax_sec', array(
		'type' => 'radio',
		'section' => 'home_parallax_section',
		'label' => esc_html__( 'Parallax Section ON/OFF', 'invert-lite' ),
		'choices' => array(
			'on' => esc_html__('ON', 'invert-lite' ),
			'off'=> esc_html__('OFF', 'invert-lite' )
		),
	) );
	$wp_customize->add_setting( 'parallax_image', array(
		'default'           => $imagepath.'PArallax_Vimeo_bg.jpg',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'parallax_image', array(
		'label' => esc_html__( 'Home Parallax Image', 'invert-lite' ),
		'section' => 'home_parallax_section',
	) ) );
	$wp_customize->add_setting( 'parallax_content', array(
		'default'        => '<div style="color:#fff"><div class="skt-ctabox"><div class="skt-ctabox-content"><h2>'.esc_html__('Awesome Parallax Section','invert-lite','invert-lite').'</h2><p>'.esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. onec consequat malesuada urna, non fringilla purus malesuada eget.Lorem ipsum dolor sit amet, consectetur adipiscing elit. onec consequat malesuada urna, non fringilla purus malesuada eget.Lorem ipsum dolor sit amet, consectetur adipiscing elit. onec consequat malesuada urna, non fringilla purus malesuada eget.','invert-lite').'</p></div><div class="skt-ctabox-button"><a class="skt-ctabox-button" href="javascript:void(0)">'.esc_html__('Demo','invert-lite').'</a></div></div></div>',
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
	));
	$wp_customize->add_control('parallax_content', array(
		'type' => 'textarea',
		'label' => esc_html__('Home Parallax Content','invert-lite'),
		'section' => 'home_parallax_section',
	));

	// ====================================
	// =  Home Blog Section
	// ====================================
	$wp_customize->add_setting( 'home_blog_sec', array(
		'default'           => 'on',
		'sanitize_callback' => 'invert_lite_sanitize_on_off',
	) );
	$wp_customize->add_control( 'home_blog_sec', array(
		'label' => esc_html__( 'Home Blogs ON/OFF', 'invert-lite' ),
		'section' => 'home_blogs_section',
		'type' => 'radio',
		'choices' => array(
			'on' => esc_html__('ON', 'invert-lite' ),
			'off'=> esc_html__('OFF', 'invert-lite' )
		),
	) );
	$wp_customize->add_setting( 'home_blog_title', array(
		'default'        => esc_html__('Latest News', 'invert-lite'),
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
	));
	$wp_customize->add_control('home_blog_title', array(
		'label' => esc_html__('Home Blogs Title','invert-lite'),
		'section' => 'home_blogs_section',
	));

	$wp_customize->add_setting( 'home_blog_num', array(
		'default'        => esc_html__('6', 'invert-lite'),
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
	));
	$wp_customize->add_control('home_blog_num', array(
		'label' => esc_html__('Number Of Blogs','invert-lite'),
		'section' => 'home_blogs_section',
	));
	// ====================================
	// =  Home Clients Section
	// ====================================
	$wp_customize->add_setting( 'home_brand_sec', array(
		'default'           => 'on',
		'sanitize_callback' => 'invert_lite_sanitize_on_off',
	) );
	$wp_customize->add_control( 'home_brand_sec', array(
		'label' => esc_html__( 'Our Clients Section ON/OFF', 'invert-lite' ),
		'section' => 'home_clients_section',
		'type' => 'radio',
		'choices' => array(
			'on' => esc_html__('ON', 'invert-lite' ),
			'off'=> esc_html__('OFF', 'invert-lite' )
		),
	) );
	$wp_customize->add_setting( 'home_brand_sec_title', array(
		'default'        => esc_html__('Our Partners', 'invert-lite'),
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
	));
	$wp_customize->add_control('home_brand_sec_title', array(
		'label' => esc_html__('Client Section Title','invert-lite'),
		'section' => 'home_clients_section',
		'active_callback' => 'invert_lite_active_brand_section',
	));
	// First Client Settings
	$wp_customize->add_setting( 'brand1_alt', array(
		'default'        => esc_html__('First Client Name', 'invert-lite'),
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
	));
	$wp_customize->add_control('brand1_alt', array(
		'label' => esc_html__('First Client Title','invert-lite'),
		'section' => 'home_clients_section',
		'active_callback' => 'invert_lite_active_brand_section',
	));
	$wp_customize->add_setting( 'brand1_url', array(
		'default'        => '#',
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
	));
	$wp_customize->add_control('brand1_url', array(
		'label' => esc_html__('First Client Link','invert-lite'),
		'section' => 'home_clients_section',
		'active_callback' => 'invert_lite_active_brand_section',
	));
	$wp_customize->add_setting( 'brand1_img', array(
		'default'           => $imagepath.'03.png',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'brand1_img', array(
		'label' => esc_html__( 'First Client Logo Image', 'invert-lite' ),
		'section' => 'home_clients_section',
		'active_callback' => 'invert_lite_active_brand_section',
	) ) );
	// Second Client Settings
	$wp_customize->add_setting( 'brand2_alt', array(
		'default'        => esc_html__('Second Client Name', 'invert-lite'),
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
	));
	$wp_customize->add_control('brand2_alt', array(
		'label' => esc_html__('Second Client Title','invert-lite'),
		'section' => 'home_clients_section',
		'active_callback' => 'invert_lite_active_brand_section',
	));
	$wp_customize->add_setting( 'brand2_url', array(
		'default'        => '#',
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
	));
	$wp_customize->add_control('brand2_url', array(
		'label' => esc_html__('Second Client Link','invert-lite'),
		'section' => 'home_clients_section',
		'active_callback' => 'invert_lite_active_brand_section',
	));
	$wp_customize->add_setting( 'brand2_img', array(
		'default'           => $imagepath.'04.png',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'brand2_img', array(
		'label' => esc_html__( 'Second Client Logo Image', 'invert-lite' ),
		'section' => 'home_clients_section',
		'active_callback' => 'invert_lite_active_brand_section',
	) ) );
	// Third Client Settings
	$wp_customize->add_setting( 'brand3_alt', array(
		'default'        => esc_html__('Third Client Name', 'invert-lite'),
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
	));
	$wp_customize->add_control('brand3_alt', array(
		'label' => esc_html__('Third Client Title','invert-lite'),
		'section' => 'home_clients_section',
		'active_callback' => 'invert_lite_active_brand_section',
	));
	$wp_customize->add_setting( 'brand3_url', array(
		'default'        => '#',
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
	));
	$wp_customize->add_control('brand3_url', array(
		'label' => esc_html__('Third Client Link','invert-lite'),
		'section' => 'home_clients_section',
		'active_callback' => 'invert_lite_active_brand_section',
	));
	$wp_customize->add_setting( 'brand3_img', array(
		'default'           => $imagepath.'05.png',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'brand3_img', array(
		'label' => esc_html__( 'Third Client Logo Image', 'invert-lite' ),
		'section' => 'home_clients_section',
		'active_callback' => 'invert_lite_active_brand_section',
	) ) );
	// Fourth Client Settings
	$wp_customize->add_setting( 'brand4_alt', array(
		'default'        => esc_html__('Fourth Client Name', 'invert-lite'),
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
	));
	$wp_customize->add_control('brand4_alt', array(
		'label' => esc_html__('Fourth Client Title','invert-lite'),
		'section' => 'home_clients_section',
		'active_callback' => 'invert_lite_active_brand_section',
	));
	$wp_customize->add_setting( 'brand4_url', array(
		'default'        => '#',
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
	));
	$wp_customize->add_control('brand4_url', array(
		'label' => esc_html__('Fourth Client Link','invert-lite'),
		'section' => 'home_clients_section',
		'active_callback' => 'invert_lite_active_brand_section',
	));
	$wp_customize->add_setting( 'brand4_img', array(
		'default'           => $imagepath.'06.png',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'brand4_img', array(
		'label' => esc_html__( 'Fourth Client Logo Image', 'invert-lite' ),
		'section' => 'home_clients_section',
		'active_callback' => 'invert_lite_active_brand_section',
	) ) );
	// Fifth Client Settings
	$wp_customize->add_setting( 'brand5_alt', array(
		'default'        => esc_html__('Fifth Client Name', 'invert-lite'),
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
	));
	$wp_customize->add_control('brand5_alt', array(
		'label' => esc_html__('Fifth Client Title','invert-lite'),
		'section' => 'home_clients_section',
		'active_callback' => 'invert_lite_active_brand_section',
	));
	$wp_customize->add_setting( 'brand5_url', array(
		'default'        => '#',
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
	));
	$wp_customize->add_control('brand5_url', array(
		'label' => esc_html__('Fifth Client Link','invert-lite'),
		'section' => 'home_clients_section',
		'active_callback' => 'invert_lite_active_brand_section',
	));
	$wp_customize->add_setting( 'brand5_img', array(
		'default'           => $imagepath.'03.png',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'brand5_img', array(
		'label' => esc_html__( 'Fifth Client Logo Image', 'invert-lite' ),
		'section' => 'home_clients_section',
		'active_callback' => 'invert_lite_active_brand_section',
	) ) );

	// ====================================
	// = Blog Page Settings
	// ====================================
	$wp_customize->add_setting( 'blogpage_heading', array(
		'default'        => esc_html__('Blog', 'invert-lite'),
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
	));
	$wp_customize->add_control('blogpage_heading', array(
		'label' => esc_html__('Posts page Title','invert-lite'),
		'section' => 'static_front_page',
		// 'active_callback' => 'invert_lite_active_post_page'
	));
	$wp_customize->add_setting( 'blogpage_custom_pagination', array(
		'default'           => 'on',
		'sanitize_callback' => 'invert_lite_sanitize_on_off',
	) );
	$wp_customize->add_control( 'blogpage_custom_pagination', array(
		'label' => esc_html__( 'Custom Pagination ON/OFF', 'invert-lite' ),
		'section' => 'static_front_page',
		'type' => 'radio',
		'choices' => array(
			'on' => esc_html__('ON', 'invert-lite' ),
			'off'=> esc_html__('OFF', 'invert-lite' )
		),
		// 'active_callback' => 'invert_lite_active_post_page'
	) );

	// ====================================
	// = Breadcrumb Settings Sections
	// ====================================
	$wp_customize->add_setting( 'breadcrumb_sec', array(
		'default'           => 'on',
		'sanitize_callback' => 'invert_lite_sanitize_on_off',
	) );
	$wp_customize->add_control( 'breadcrumb_sec', array(
		'label' => esc_html__( 'Breadcrumb Section ON/OFF', 'invert-lite' ),
		'section' => 'breadcrumb_settings',
		'type' => 'radio',
		'choices' => array(
			'on' =>'ON',
			'off'=> 'OFF'
		),
	) );
	$wp_customize->add_setting( 'breadcrumbtxt_color', array(
		'default'           => '#222222',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'breadcrumbtxt_color', array(
		'label'       => esc_html__( 'Breadcrumb Text Color', 'invert-lite' ),
		'section'     => 'breadcrumb_settings',
		'active_callback' => 'invert_lite_active_breadcrumb_section'
	) ) );
	$wp_customize->add_setting( 'breadcrumbbg_color', array(
		'default'           => '#F2F2F2',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'breadcrumbbg_color', array(
		'label'       => esc_html__( 'Breadcrumb Background Color', 'invert-lite' ),
		'section'     => 'breadcrumb_settings',
		'active_callback' => 'invert_lite_active_breadcrumb_section'
	) ) );
	$wp_customize->add_setting( 'breadcrumbbg_image', array(
		'default'        => $imagepath.'danbo_green.jpg',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'breadcrumbbg_image', array(
		'label' => esc_html__( 'Breadcrumb Background Image', 'invert-lite' ),
		'description' => esc_html__( 'size: 1600px by 180px', 'invert-lite' ),
		'section' => 'breadcrumb_settings',
		'active_callback' => 'invert_lite_active_breadcrumb_section'
	) ) );

	// ====================================
	// = Footer Settings Sections
	// ====================================
	$wp_customize->add_setting( 'copyright', array(
		'default'        => esc_html__('Proudly Powered by WordPress', 'invert-lite'),
		'sanitize_callback' => 'invert_lite_sanitize_textarea',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('copyright', array(
		'label' => esc_html__('Copyright Text','invert-lite'),
		'description' => esc_html__('You can use HTML for links etc..', 'invert-lite'),
		'section' => 'footer_settings',
	));

}
add_action( 'customize_register', 'invert_lite_customize_register' );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Twenty Fifteen 1.0
 */
function invert_lite_customize_preview_js() {
	wp_enqueue_script( 'invert-lite-customizer-js', get_template_directory_uri() . '/js/invert-lite-customizer.js', array( 'customize-preview' ), '091015', true );
}
add_action( 'customize_preview_init', 'invert_lite_customize_preview_js' );


// sanitize textarea
function invert_lite_sanitize_textarea( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

// sanitize on-off
function invert_lite_sanitize_on_off( $input ) {
	$valid = array(
		'on' => esc_html__('ON', 'invert-lite' ),
		'off'=> esc_html__('OFF', 'invert-lite' )
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

// active callback feature section
function invert_lite_active_feature_section( $control ) {
	if ( $control->manager->get_setting('home_feature_sec')->value() == 'on' ) {
		return true;
	} else {
		return false;
	}
}

// active callback brand section
function invert_lite_active_brand_section( $control ) {
	if ( $control->manager->get_setting('home_brand_sec')->value() == 'on' ) {
		return true;
	} else {
		return false;
	}
}

// active callback brand section
function invert_lite_active_breadcrumb_section( $control ) {
	if ( $control->manager->get_setting('breadcrumb_sec')->value() == 'on' ) {
		return true;
	} else {
		return false;
	}
}

// active callback post page
function invert_lite_active_post_page() {
	if ( 'page' == get_option( 'show_on_front' ) ) {
		return true;
	} else {
		return false;
	}
}
?>