<?php

function blogband_layout_customizer_settings( $wp_customize ){


	//ADD PANEL
	$wp_customize->add_panel('blogband_site_layout_option_panel',
		array(
			'title'      => esc_html__('Blogband - Customize Layout', 'blogband'),
			'priority'   => 2,
			'capability' => 'edit_theme_options',
		)
	);

	//BEGIN ADVERT BOX SECTION
	$wp_customize->add_section('blogband_header_box_section', array(
		'title' => __('Blogband Theme - Logo and Advert Section', 'blogband'),
		'priority' => 10,
		'panel' => 'blogband_site_layout_option_panel',
	));

	$wp_customize->add_setting('blogband_header_box_display_settings', array(
	    'default' => __('none', 'blogband'),
	    'sanitize_callback'  => 'sanitize_text_field',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'blogband_header_box_display_control', array(
	    'label'    => __('Display Logo and Ad Section', 'blogband'),
	    'section'  => 'blogband_header_box_section',
	    'settings' => 'blogband_header_box_display_settings',
	    'type'     	=> 'select',
	    'choices'	=> array(
	    				'block' => __('Yes', 'blogband'),
	    				'none' 	=> __('No', 'blogband'),
	    			   )
	)));

	
	//LOGO LINK COLOR
	$wp_customize->add_setting('blogband_header_box_logo_link_color_settings', array(
	    'default' => __('#353535', 'blogband'),
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogband_header_box_logo_link_color_control', array(
	    'label'    => __('Logo Text Color', 'blogband'),
	    'section'  => 'blogband_header_box_section',
	    'settings' => 'blogband_header_box_logo_link_color_settings',
	)));


	//AD DISPLAY
	$wp_customize->add_setting('blogband_ad_img_display_settings', array(
	    'default' => __('none', 'blogband'),
	    'sanitize_callback'  => 'sanitize_text_field',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'blogband_ad_img_display_control', array(
	    'label'    => __('Display Ad', 'blogband'),
	    'section'  => 'blogband_header_box_section',
	    'settings' => 'blogband_ad_img_display_settings',
	    'type'     	=> 'select',
	    'choices'	=> array(
	    				'block' => 'Yes',
	    				'none' 	=> 'No',
	    			   )
	)));


	//UPLOAD AD
    $wp_customize->add_setting('blogband_ad_img_settings', array(
        'default' => __('#', 'blogband'),
        'sanitize_callback'  => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'blogband_ad_img_control', array(
        'label'    => __('Upload Advert Image', 'blogband'),
        'section'  => 'blogband_header_box_section',
        'settings' => 'blogband_ad_img_settings',
        'width'    => 1000,
        'height'   => 1000,
    )));

    //AD LINK
	$wp_customize->add_setting('blogband_ad_img_link_settings', array(
	    'default' => __('#', 'blogband'),
	    'sanitize_callback'  => 'esc_url_raw',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'blogband_ad_img_link_control', array(
	    'label'    => __('Enter Ad Link', 'blogband'),
	    'section'  => 'blogband_header_box_section',
	    'settings' => 'blogband_ad_img_link_settings',
	    'type'     => 'url',
	)));



	//BEGIN NAVIGATION BACKGROUND COLOR SECTION
	$wp_customize->add_section('blogband_navbar_section', array(
		'title' => __('Blogband Theme - Navbar BG Color', 'blogband'),
		'priority' => 10,
		'panel' => 'blogband_site_layout_option_panel',
	));

	
	//NAVBAR SECTION BACKGROUND COLOR
	$wp_customize->add_setting('blogband_navbar_section_bg_color_settings', array(
	    'default' => __('#353535', 'blogband'),
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogband_navbar_section_bg_color_control', array(
	    'label'    => __('Navbar Background Color', 'blogband'),
	    'section'  => 'blogband_navbar_section',
	    'settings' => 'blogband_navbar_section_bg_color_settings',
	)));

	//NAVBAR SECTION BACKGROUND COLOR
	$wp_customize->add_setting('blogband_navbar_section_text_color_settings', array(
	    'default' => __('#ffffff', 'blogband'),
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogband_navbar_section_text_color_control', array(
	    'label'    => __('Navbar Text Color', 'blogband'),
	    'section'  => 'blogband_navbar_section',
	    'settings' => 'blogband_navbar_section_text_color_settings',
	)));

	//BLOGBAND INDEX SECTION CLASS NAME
	$wp_customize->add_section('blogband_index_class_name_section', array(
		'title' => __('Blogband - Change Index Posts Style', 'blogband'),
		'priority' => 9,
		'panel'	=> 'blogband_site_layout_option_panel',
	));

	
	$wp_customize->add_setting('blogband_index_class_name_settings', array(
	    'default' => __('blogband-index', 'blogband'),
	    'sanitize_callback'  => 'sanitize_text_field',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'blogband_index_class_name_display_control', array(
	    'label'    => __('Change Style', 'blogband'),
	    'section'  => 'blogband_index_class_name_section',
	    'settings' => 'blogband_index_class_name_settings',
	    'type'     	=> 'select',
	    'choices'	=> array(
	    				'blogband-index' 		=> __('List Layout - Right Sidebar', 'blogband'),
	    				'blogband-index-three' 	=> __('List Layout (Full Width) - No Sidebar', 'blogband'),
	    				'blogband-index-two' 	=> __('Grid Layout - Right Sidebar', 'blogband'),
	    				'blogband-index-four' 	=> __('Grid Layout (Two Columns) - No Sidebar', 'blogband'),
	    				'blogband-index-five' 	=> __('Grid Layout (Three Columns) - No Sidebar', 'blogband'),
	    				'blogband-index-six' 	=> __('Split Layout - Right Sidebar', 'blogband'),
	    			   )
	)));

	//BEGIN BLOGBAND READ MORE BACKGROUND COLOR SECTION
	$wp_customize->add_section('blogband_readmore_section', array(
		'title' => __('Blogband Theme - Read More BG Color', 'blogband'),
		'priority' => 11,
		'panel' => 'blogband_site_layout_option_panel',
	));

	
	//BLOGBAND READ MORE SECTION BACKGROUND COLOR
	$wp_customize->add_setting('blogband_readmore_bg_color_settings', array(
	    'default' => __('#353535', 'blogband'),
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogband_readmore_bg_color_control', array(
	    'label'    => __('Read More Background Color', 'blogband'),
	    'section'  => 'blogband_readmore_section',
	    'settings' => 'blogband_readmore_bg_color_settings',
	)));
	
	//BLOGBAND READ MORE SECTION BACKGROUND COLOR
	$wp_customize->add_setting('blogband_readmore_text_color_settings', array(
	    'default' => __('#ffffff', 'blogband'),
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogband_readmore_text_color_control', array(
	    'label'    => __('Read More Text Color', 'blogband'),
	    'section'  => 'blogband_readmore_section',
	    'settings' => 'blogband_readmore_text_color_settings',
	)));

	//BEGIN SIDEBAR BACKGROUND COLOR SECTION
	$wp_customize->add_section('blogband_sidebar_section', array(
		'title' => __('Blogband Theme - Sidebar Header BG Color', 'blogband'),
		'priority' => 11,
		'panel' => 'blogband_site_layout_option_panel',
	));

	
	//SIDEBAR SECTION BACKGROUND COLOR
	$wp_customize->add_setting('blogband_sidebar_header_bg_color_settings', array(
	    'default' => __('#ffffff', 'blogband'),
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogband_sidebar_header_bg_color_control', array(
	    'label'    => __('Sidebar Header Background Color', 'blogband'),
	    'section'  => 'blogband_sidebar_section',
	    'settings' => 'blogband_sidebar_header_bg_color_settings',
	)));

		//SIDEBAR SECTION HEADER TEXT COLOR
	$wp_customize->add_setting('blogband_sidebar_header_title_color_settings', array(
	    'default' => __('#353535', 'blogband'),
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogband_sidebar_header_text_color_control', array(
	    'label'    => __('Sidebar Header Text Color', 'blogband'),
	    'section'  => 'blogband_sidebar_section',
	    'settings' => 'blogband_sidebar_header_title_color_settings',
	)));

	//BEGIN BLOGBAND PAGINATION BACKGROUND COLOR SECTION
	$wp_customize->add_section('blogband_pagination_section', array(
		'title' => __('Blogband Theme - Pagination BG Color', 'blogband'),
		'priority' => 11,
		'panel' => 'blogband_site_layout_option_panel',
	));

	
	//BLOGBAND PAGINATION SECTION BACKGROUND COLOR
	$wp_customize->add_setting('blogband_pagination_bg_color_settings', array(
	    'default' => __('#353535', 'blogband'),
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogband_pagination_bg_color_control', array(
	    'label'    => __('Page Numbers Background Color', 'blogband'),
	    'section'  => 'blogband_pagination_section',
	    'settings' => 'blogband_pagination_bg_color_settings',
	)));


	//BEGIN BLOGBAND SEARCH BUTTON SIDEBAR BACKGROUND COLOR SECTION
	$wp_customize->add_section('blogband_search_btn_sidebar_section', array(
		'title' => __('Blogband Theme - Search Button BG Color', 'blogband'),
		'priority' => 11,
		'panel' => 'blogband_site_layout_option_panel',
	));

	
	//BLOGBAND SEARCH BUTTON SIDEBAR SECTION BACKGROUND COLOR
	$wp_customize->add_setting('blogband_search_btn_sidebar_bg_color_settings', array(
	    'default' => __('#353535', 'blogband'),
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogband_search_btn_sidebar_bg_color_control', array(
	    'label'    => __('Search Button Sidebar Background Color', 'blogband'),
	    'section'  => 'blogband_search_btn_sidebar_section',
	    'settings' => 'blogband_search_btn_sidebar_bg_color_settings',
	)));



	//BEGIN FOOTER BACKGROUND COLOR SECTION
	$wp_customize->add_section('blogband_footer_section', array(
		'title' => __('Blogband Theme - Footer BG Color', 'blogband'),
		'priority' => 11,
		'panel' => 'blogband_site_layout_option_panel',
	));

	
	//FOOTER SECTION BACKGROUND COLOR
	$wp_customize->add_setting('blogband_footer_bg_color_settings', array(
	    'default' => __('#353535', 'blogband'),
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogband_footer_bg_color_control', array(
	    'label'    => __('footer Header Background Color', 'blogband'),
	    'section'  => 'blogband_footer_section',
	    'settings' => 'blogband_footer_bg_color_settings',
	)));


	//FOOTER SECTION LINK TEXT COLOR
	$wp_customize->add_setting('blogband_footer_text_link_color_settings', array(
	    'default' => __('#fff', 'blogband'),
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogband_footer_text_link_color_control', array(
	    'label'    => __('Footer Link Text Color', 'blogband'),
	    'section'  => 'blogband_footer_section',
	    'settings' => 'blogband_footer_text_link_color_settings',
	)));

	//FOOTER SECTION HEADER TITLE COLOR
	$wp_customize->add_setting('blogband_footer_header_text_color_settings', array(
	    'default' => __('#fff', 'blogband'),
	    'sanitize_callback'  => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blogband_footer_header_text_color_control', array(
	    'label'    => __('Footer Header Title Text Color', 'blogband'),
	    'section'  => 'blogband_footer_section',
	    'settings' => 'blogband_footer_header_text_color_settings',
	)));

	//FOOTER SECTION DISPLAY HEADER TITLE
	$wp_customize->add_setting('blogband_footer_display_header_text_settings', array(
	    'default' => __('block', 'blogband'),
	    'sanitize_callback'  => 'sanitize_text_field',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'blogband_footer_display_header_text_control', array(
	    'label'    => __('Footer Display Header Title', 'blogband'),
	    'section'  => 'blogband_footer_section',
	    'settings' => 'blogband_footer_display_header_text_settings',
	    'type'     	=> 'select',
	    'choices'	=> array(
	    				'block' => __('Yes', 'blogband'),
	    				'none' 	=> __('No', 'blogband'),
	    			   )
	)));

	$wp_customize->get_setting('blogband_header_box_display_settings')->transport 				= 	'postMessage';
	$wp_customize->get_setting('blogband_header_box_logo_link_color_settings')->transport 		= 	'postMessage';
	$wp_customize->get_setting('blogband_navbar_section_bg_color_settings')->transport 			= 	'postMessage';
	$wp_customize->get_setting('blogband_navbar_section_text_color_settings')->transport 		= 	'postMessage';
    $wp_customize->get_setting('blogband_readmore_bg_color_settings')->transport 				= 	'postMessage';
    $wp_customize->get_setting('blogband_readmore_text_color_settings')->transport 				= 	'postMessage';
    $wp_customize->get_setting('blogband_sidebar_header_bg_color_settings')->transport 			= 	'postMessage';
    $wp_customize->get_setting('blogband_sidebar_header_title_color_settings')->transport 		=	'postMessage';
    $wp_customize->get_setting('blogband_search_btn_sidebar_bg_color_settings')->transport 		= 	'postMessage';
    $wp_customize->get_setting('blogband_pagination_bg_color_settings')->transport 				= 	'postMessage';
    $wp_customize->get_setting('blogband_footer_bg_color_settings')->transport 					= 	'postMessage';
    $wp_customize->get_setting('blogband_footer_text_link_color_settings')->transport 			= 	'postMessage';
    $wp_customize->get_setting('blogband_footer_header_text_color_settings')->transport 		= 	'postMessage';
    $wp_customize->get_setting('blogband_footer_display_header_text_settings')->transport 		= 	'postMessage';


}


//CSS
function blogband_layout_custom_css(){
	?>

<style type="text/css">

.header-box .ad-box-img {
	display: <?php echo esc_html(get_theme_mod('blogband_ad_img_display_settings')); ?>
}

.header-box {
	display: <?php echo esc_html(get_theme_mod('blogband_header_box_display_settings')); ?>;
}

.header-box .logo .logo-text-link {
	color: <?php echo esc_html(get_theme_mod('blogband_header_box_logo_link_color_settings')); ?>;
}

.nav-outer {
	background: <?php echo esc_html(get_theme_mod('blogband_navbar_section_bg_color_settings')); ?>;
}

.theme-nav ul li a {
	color: <?php echo esc_html(get_theme_mod('blogband_navbar_section_text_color_settings')); ?>;
}

.blogband-index .blog-2-col-inner .items .items-inner .img-box .details-box .details-box-inner .btn-case a {
	background: <?php echo esc_html(get_theme_mod('blogband_readmore_bg_color_settings')); ?>;
	color: <?php echo esc_html( get_theme_mod('blogband_readmore_text_color_settings')); ?>;
}

.sidebar .sidebar-inner .sidebar-items h2 {
	background: <?php echo esc_html(get_theme_mod('blogband_sidebar_header_bg_color_settings')); ?>;
	color: <?php echo esc_html(get_theme_mod('blogband_sidebar_header_title_color_settings')); ?>;
}

.sidebar .sidebar-inner .sidebar-items .searchform div #searchsubmit {
	background: <?php echo esc_html(get_theme_mod('blogband_search_btn_sidebar_bg_color_settings')); ?>;
}

.page-numbers {
	background: <?php echo esc_html(get_theme_mod('blogband_pagination_bg_color_settings')); ?>;	
}

.footer-4-col {
	background: <?php echo esc_html(get_theme_mod('blogband_footer_bg_color_settings')); ?>; 
}

.footer-4-col .inner .footer .footer-inner .footer-items a {
	color: <?php echo esc_html(get_theme_mod('blogband_footer_text_link_color_settings')); ?>;
}

.footer-4-col .inner .footer .footer-inner .footer-items li h2 {
	display: <?php echo esc_html(get_theme_mod('blogband_footer_display_header_text_settings')); ?>;
	color: <?php echo esc_html(get_theme_mod('blogband_footer_header_text_color_settings')); ?>;
}

</style>


	<?php

}


function blogband_layout_customizer_live_preview()
{
	wp_enqueue_script( 
		  'blogband-site-layout-customizer',			
		  get_template_directory_uri().'/js/blogband-layout-customizer.js',
		  array( 'jquery','customize-preview' ),	
		  '',						
		  true						
	);
}




add_action('wp_head', 'blogband_layout_custom_css');
add_action('customize_register', 'blogband_layout_customizer_settings');
add_action( 'customize_preview_init', 'blogband_layout_customizer_live_preview' );


?>