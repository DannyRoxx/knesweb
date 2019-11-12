<?php
function natalielite_custom_css()
{
    $custom_css = "";
    if ( get_theme_mod('natalielite_site_branding_padding_top') ) {
        $custom_css .= '#site-branding { padding-top: '. esc_attr( get_theme_mod('natalielite_site_branding_padding_top') ) .'px; }';
    }
    
    if ( get_theme_mod('natalielite_site_branding_padding_bottom') ) {
        $custom_css .= '#site-branding { padding-bottom: '. esc_attr( get_theme_mod('natalielite_site_branding_padding_bottom') ) .'px; }';
    }
    
    if ( get_theme_mod('natalielite_accent_color') )
    {
        $accent_color = get_theme_mod('natalielite_accent_color');
        $custom_css .= "
            a, a:hover, a:focus, .post a:hover, .latest-posts .post .post-meta a:hover, .post .post-meta .socials li a:hover,
            .widget a:hover, .natalielite-categories-image .category-item a:hover, .topbar-menu li a:hover, .topbar .social a:hover,
            .az-main-menu li a:hover, .social-footer a:hover {
                color: ". esc_attr($accent_color) .";
            }
            input[type='submit']:hover, slider .owl-controls .owl-dot.active, .slider .owl-nav > div:hover, .post-cats a::after,
            .post .link-more:after, .single-post-footer .social-share a:hover, .social-widget > a:hover, .az-promo-box .az-probox-item .az-item-link:hover,
            .natalielite-pagination .page-numbers:hover, .natalielite-pagination .page-numbers.current,
            .natalielite-categories-image .category-item a:hover{
                background-color: ". esc_attr($accent_color) .";
            }
            .widget-title { border: 1px solid ". esc_attr($accent_color) ."; }
        ";
    }
    
    wp_add_inline_style( 'natalielite-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'natalielite_custom_css', 99 );
