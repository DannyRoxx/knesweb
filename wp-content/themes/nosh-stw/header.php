<?php

$nosh_facebook = get_theme_mod( 'facebook_url');
$nosh_twitter = get_theme_mod('twitter_url');
$nosh_instagram = get_theme_mod('instagram_url');
$nosh_youtube = get_theme_mod('youtube_url');
$nosh_pinterest = get_theme_mod('pinterest_url');
$nosh_tagline = get_theme_mod('nosh_tagline_display');

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   <meta charset="<?php bloginfo('charset'); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
   <?php 
   if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
   wp_head( ); ?>
</head>
<body <?php body_class(); ?>>
<?php if ( ! function_exists( 'wp_body_open' ) ) {
        function wp_body_open() {
                do_action( 'wp_body_open' );
        }
} ?>
<a class="skip-link screen-reader-text" href="#content">
<?php esc_html_e( 'Skip to content', 'nosh-stw' ); ?></a>
<header role="banner">
<nav class="navbar navbar-expand-lg pt-4 navbar-light">
<?php
$nosh_header_widget_center = false;
if ( has_nav_menu( 'headerMenu' ) ) { 
	$nosh_header_widget_center = true;
	?>

<button aria-controls="aria-controls" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'nosh-stw' ); ?>" class="navbar-toggler" data-target=".collapse-this" data-toggle="collapse" type="button">
<span class="navbar-toggler-icon"></span>
</button>
<?php
} ?> 

<div class="section container" id="header" name="Header">
<?php 


wp_nav_menu( array(
	'theme_location'  => 'headerMenu',
	'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
	'container'       => 'div',
	'container_class' => 'collapse navbar-collapse collapse-this',
	'container_id'    => 'header-menu',
	'menu_class'      => 'navbar-nav mr-auto',
	'fallback_cb'     => false, //'WP_Bootstrap_Navwalker::fallback',
	'walker'          => new WP_Bootstrap_Navwalker(),
) );

?>
<div class="widget Header" id="Header1">
<div class="header-widget <?php echo $nosh_header_widget_center?'header-widget-center':''; ?>">
<a class="home-link blog-name" href="<?php echo  esc_url(home_url('/')); ?>">
<?php echo get_bloginfo(); ?>
</a>
<?php 
if(!$nosh_tagline)
echo '<p>'.get_bloginfo('description').'</p>';
?>
</div>
</div><div class="widget LinkList d-flex align-items-center" id="LinkList2">
<div class="widget-content">
<ul class="socialbtns nav navbar-nav mx-auto">
<?php

if(!empty($nosh_facebook)){
	?>
	<li>
<a class="fab fa-lg fa-facebook-f" href="<?php echo esc_url($nosh_facebook); ?>" target="_blank"></a>
</li>
<?php
}
if(!empty($nosh_twitter)){
	?>
<li>
<a class="fab fa-lg fa-twitter" href="<?php echo esc_url($nosh_twitter); ?>" target="_blank"></a>
</li>
<?php
}
if(!empty($nosh_instagram)){
	?>

<li>
<a class="fab fa-lg fa-instagram" href="<?php echo esc_url($nosh_twitter); ?>" target="_blank"></a>
</li>
<?php
}
if(!empty($nosh_youtube)){
	?>
<li>
<a class="fab fa-lg fa-youtube" href="<?php echo esc_url($nosh_youtube); ?>" target="_blank"></a>
</li>
<?php
}
if(!empty($nosh_pinterest)){
	?>
<li>
<a class="fab fa-lg fa-pinterest" href="<?php echo esc_url($nosh_pinterest); ?>" target="_blank"></a>
</li>
<?php
}
	?>
</ul>
</div>
</div></div>
</nav>
<div class="clear"></div>
</header>