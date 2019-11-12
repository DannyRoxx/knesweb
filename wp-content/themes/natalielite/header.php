<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php do_action( 'wp_body_open' ); ?>
    <div id="wrapper">
        <a class="skip-link screen-reader-text" href="#content"><?php echo esc_html__( 'Skip to content', 'natalielite' ); ?></a>
        <div id="site-branding" class="container">
            <?php
                $custom_logo_id   = get_theme_mod( 'custom_logo' );
                $header_paragraph = is_front_page() ? 'h1' : 'h2';
                $logo             = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                $logo_url         = ( isset( $logo[0] ) && !empty( $logo[0] ) ) ? $logo[0] : false;
                $logo_class       = $logo_url ? 'site-logo' : 'site-title';
                $description      = get_bloginfo( 'description', 'display' );
            ?>
            <<?php echo esc_attr( $header_paragraph ); ?> class="<?php echo esc_attr( $logo_class ); ?>">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php if ( $logo_url ) { ?>
                        <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
                    <?php } else { ?>
                        <?php bloginfo( 'name' ); ?> 
                    <?php }?>
                </a>
            </<?php echo esc_attr( $header_paragraph ); ?>>
            <?php if ( $description && ! $logo_url ) { ?>
				<p class="site-description"><?php bloginfo( 'description' ); ?> </p>
			<?php } ?>
        </div>
        <div id="nav-wrapper">
            <div class="container">                
                <div class="az-mobile-menu">
                    <a href="javascript:void(0)" class="az-mobile-menu-buton"><?php echo esc_html__( 'Menu', 'natalielite' ); ?></a>
                    <?php get_template_part('template-parts/header', 'social'); ?>                   
                </div>
                <div class="az-menu-wrapper">
                <?php
        			wp_nav_menu( array(
        				'menu_class' => 'az-main-menu',
                        'theme_location' => 'primary',
                        'container' => false
       				));
			     ?>
                </div>
            </div>
        </div>
        <div id="content" class="site-content">
            <div class="container">
