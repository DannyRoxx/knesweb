<?php

if ( ! isset( $content_width ) ) {
	$content_width = 730;
}


function stw_nosh_static_files(){
    wp_enqueue_style('nosh-stw-google-fonts','https://fonts.googleapis.com/css?family=Titillium+Web|Open+Sans:300,400,700');
    wp_enqueue_style('font-awesome',  get_template_directory_uri().'/assets/css/fontawesome-all.min.css', false); 
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri().'/assets/css/bootstrap.min.css', false); 
    

    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), false, true); 
    
}

add_action( 'wp_enqueue_scripts', 'stw_nosh_static_files' );


function stw_nosh_features(){

    add_theme_support('post-thumbnails');
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support('title-tag');

    register_nav_menu('headerMenu', __('Header Menu', 'nosh-stw' ));
    register_nav_menu('footerMenu1', __('Footer Menu 1', 'nosh-stw' ));
    register_nav_menu('footerMenu2', __('Footer Menu 2', 'nosh-stw' ));
    register_nav_menu('footerMenu3', __('Footer Menu 3', 'nosh-stw' ));
    
}

 
add_action( 'after_setup_theme', 'stw_nosh_features' );

// Register Custom Navigation Walker
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

require_once get_template_directory() . '/inc/widgets.php';

include(get_template_directory().'/inc/custom-walker-comments.php');
include(get_template_directory().'/inc/activate.php');
include(get_template_directory().'/inc/theme-info.php');


add_action('widgets_init', 'stw_nosh_widgets');

add_action('after_switch_theme', 'stw_nosh_activate');

add_action('admin_menu', 'stw_nosh_admin_menus');


function nosh_theme_customizer( $wp_customize ) {
    nosh_theme_title_tagline($wp_customize);
    nosh_theme_socialmedia($wp_customize);
    nosh_theme_colors($wp_customize);
}

function nosh_theme_title_tagline($wp_customize){
    $wp_customize->add_setting( 'nosh_tagline_display',
    array('sanitize_callback' => 'nosh_sanitize_checkbox',));

     $wp_customize->add_control( 'nosh_tagline_display', array(
        'type' => 'checkbox',
        'section'    => 'title_tagline',
        'label' => __( 'Hide tagline?', 'nosh-stw' ),
        'description' => __( 'Check to hide tagline in Header', 'nosh-stw' ),
      ) 
     );
}

function nosh_sanitize_checkbox($checked){
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function nosh_theme_socialmedia($wp_customize){
    $wp_customize->add_section(
        'nosh_stw_settings_section_one',
        array(
            'title' => __('Social Media', 'nosh-stw' ),
            'description' => __('Enter social media links here.', 'nosh-stw' ),
            'priority' => 35,
        )
    );

    $wp_customize->add_setting(
        'facebook_url',
        array(
            'default' => '',
            'sanitize_callback' => 'nosh_theme_customizer_sanitize_text',
        )
    );

    $wp_customize->add_setting(
        'twitter_url',
        array(
            'default' => '',
            'sanitize_callback' => 'nosh_theme_customizer_sanitize_text',
        )
    );

    $wp_customize->add_setting(
        'instagram_url',
        array(
            'default' => '',
            'sanitize_callback' => 'nosh_theme_customizer_sanitize_text',
        )
    );

    $wp_customize->add_setting(
        'youtube_url',
        array(
            'default' => '',
            'sanitize_callback' => 'nosh_theme_customizer_sanitize_text',
        )
    );

    $wp_customize->add_setting(
        'pinterest_url',
        array(
            'default' => '',
            'sanitize_callback' => 'nosh_theme_customizer_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'facebook_url',
        array(
            'label' => __('Facebook URL', 'nosh-stw' ),
            'section' => 'nosh_stw_settings_section_one',
            'type' => 'url',
        )
    );

    $wp_customize->add_control(
        'twitter_url',
        array(
            'label' => __('Twitter URL', 'nosh-stw' ),
            'section' => 'nosh_stw_settings_section_one',
            'type' => 'url',
        )
    );

    $wp_customize->add_control(
        'instagram_url',
        array(
            'label' => __('Instagram URL', 'nosh-stw' ),
            'section' => 'nosh_stw_settings_section_one',
            'type' => 'url',
        )
    );

    $wp_customize->add_control(
        'youtube_url',
        array(
            'label' => __('YouTube URL', 'nosh-stw' ),
            'section' => 'nosh_stw_settings_section_one',
            'type' => 'url',
        )
    );

    $wp_customize->add_control(
        'pinterest_url',
        array(
            'label' => __('Pinterest URL', 'nosh-stw' ),
            'section' => 'nosh_stw_settings_section_one',
            'type' => 'url',
        )
    );
}
function nosh_theme_colors($wp_customize){

    $wp_customize->add_setting(
        'nosh_bg_color',
        array(
            'default'   => '#cfe2f3',
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'nosh_body_link_color',
        array(
            'default'   => '#007bff',
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_setting(
        'nosh_footer_link_color',
        array(
            'default'   => '#000000',
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nosh_bg_color', array(
        'section' => 'colors',
        'label' => __('Background Color', 'nosh-stw' ),
      ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nosh_body_link_color', array(
        'section' => 'colors',
        'label' => __('Body Link Color', 'nosh-stw' ),
    ) ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nosh_footer_link_color', array(
        'section' => 'colors',
        'label' => __('Footer Link Color', 'nosh-stw' ),
    ) ) );

}

add_action( 'customize_register', 'nosh_theme_customizer' );

function nosh_theme_get_customizer_css() {
    ob_start();

    $nosh_bg_color = get_theme_mod( 'nosh_bg_color', '' );
    if ( ! empty( $nosh_bg_color ) ) {
      ?>
      body {
        background: <?php echo $nosh_bg_color; ?>;
      }
      <?php
    }

    $nosh_body_link_color = get_theme_mod( 'nosh_body_link_color', '' );
    if ( ! empty( $nosh_body_link_color ) ) {
      ?>
      .post-title a:hover, a {
        color: <?php echo $nosh_body_link_color; ?>;
      }
      <?php
    }

    $nosh_footer_link_color = get_theme_mod( 'nosh_footer_link_color', '' );
    if ( ! empty( $nosh_footer_link_color ) ) {
      ?>
      footer a {
        color: <?php echo $nosh_footer_link_color; ?>;
      }
      <?php
    }

    $css = ob_get_clean();
    return $css;
}

function nosh_theme_enqueue_styles() {
    wp_enqueue_style( 'nosh_style', get_stylesheet_uri() ); // This is where you enqueue your theme's main stylesheet
    $custom_css = nosh_theme_get_customizer_css();
    wp_add_inline_style( 'nosh_style', $custom_css );
  }
  
  add_action( 'wp_enqueue_scripts', 'nosh_theme_enqueue_styles' );

function nosh_theme_customizer_sanitize_text( $input ) {
    return esc_url_raw( $input );
}


function stw_nosh_randomColor() {
    $str = '#';
    for($i = 0 ; $i < 3 ; $i++) {
        $str .= dechex( rand(170 , 255) );
    }
    return $str;
}