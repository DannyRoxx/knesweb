<?php
define('NATALIELITE_LIBS_URI', get_template_directory_uri() . '/libs/');
define('NATALIELITE_CORE_PATH', get_template_directory() . '/core/');
define('NATALIELITE_CORE_CLASSES', NATALIELITE_CORE_PATH . 'classes/');
define('NATALIELITE_CORE_FUNCTIONS', NATALIELITE_CORE_PATH . 'functions/');
define('NATALIELITE_CORE_WIDGETS', NATALIELITE_CORE_PATH . 'widgets/');

// Set Content Width
if ( ! isset( $content_width ) ) { $content_width = 1170; }

// Theme setup
add_action('after_setup_theme', 'natalielite_setup');
function natalielite_setup()
{
    load_theme_textdomain( 'natalielite', get_template_directory() . '/languages' );
    add_theme_support( 'custom-logo', array(
    	'height'      => 100,
    	'width'       => 400,
    	'flex-height' => true,
    	'flex-width'  => true
    ) );
	add_theme_support('title-tag');
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider'); 
	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
    $args = array('default-color' => 'fff');    
    add_theme_support( 'custom-background', $args );   
	register_nav_menus(
        array(
            'primary' => esc_html__('Primary Menu', 'natalielite')
        )
    );
}

// Load Google fonts
function natalielite_google_fonts_url()
{
    $fonts_url = '';
    $Lora = _x( 'on', 'Lora font: on or off', 'natalielite' );
    $Montserrat = _x( 'on', 'Montserrat: on or off', 'natalielite' );
    $Dancing = _x( 'on', 'Dancing Script font: on or off', 'natalielite' );    

    if ( 'off' !== $Montserrat || 'off' !== $Lora )
    {
        $font_families = array();

        if ( 'off' !== $Lora ) $font_families[] = 'Lora:400,400italic';
        
        if ('off' !== $Montserrat) {
            $font_families[] = 'Montserrat:300,400,500';
        }

        $query_args = array(
            'family' => urlencode(implode('|', $font_families )),
            'subset' => urlencode('latin,latin-ext')
        );

        $fonts_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
    }

    return esc_url_raw($fonts_url);
}

// Google fonts
function natalielite_enqueue_googlefonts() {
    wp_enqueue_style( 'natalielite-googlefonts', natalielite_google_fonts_url(), array(), null );
}
add_action('wp_enqueue_scripts', 'natalielite_enqueue_googlefonts');

// Register & Enqueue Styles / Scripts
add_action('wp_enqueue_scripts', 'natalielite_load_scripts');
function natalielite_load_scripts()
{
    // CSS
    wp_enqueue_style('bootstrap', NATALIELITE_LIBS_URI . 'bootstrap/bootstrap.min.css');
    wp_enqueue_style('fontawesome', NATALIELITE_LIBS_URI . 'fontawesome/css/all.css');
    wp_enqueue_style('chosen-min', NATALIELITE_LIBS_URI . 'chosen/chosen.min.css');
    wp_enqueue_style('natalielite-style', get_stylesheet_directory_uri() . '/style.css');

    // JS
    wp_enqueue_script( 'chosen', NATALIELITE_LIBS_URI . 'chosen/chosen.jquery.min.js', array('jquery'), false, true );
    wp_enqueue_script( 'az-frontend', get_template_directory_uri() . '/assets/js/az-frontend.js', array(), false, true );
    wp_localize_script( 'az-frontend', 'AZLikePost', array(
    	'ajaxurl' => esc_url( admin_url('admin-ajax.php') )
    ));
    
    if ( is_singular() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script('comment-reply');
    }
}

add_action( 'widgets_init', 'natalielite_widgets_init' );
function natalielite_widgets_init()
{
    // Register Sidebar
    if ( function_exists('register_sidebar') )
    {
    	register_sidebar(array(
    		'name'          => esc_html__( 'Sidebar', 'natalielite' ),
    		'id'            => 'sidebar',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h4 class="widget-title">',
    		'after_title'   => '</h4>',
            'description'   => esc_html__('Display widgets for blog, archive and single post.', 'natalielite')
    	));
        register_sidebar(array(
    		'name'          => esc_html__( 'Before Footer', 'natalielite' ),
    		'id'            => 'footer-sidebar',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h4 class="widget-title"><span>',
    		'after_title'   => '</span></h4>',
            'description'   => esc_html__( 'Should use the "Instagram" widget here. IMPORTANT: For best result set number of photos to 8.', 'natalielite' )
    	));
    }
}

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function natalielite_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'natalielite_skip_link_focus_fix' );

function natalielite_require_file( $path ) {
    if ( file_exists($path) ) {
        require $path;
    }
}

// Require core files
natalielite_require_file( get_template_directory() . '/core/init.php' );

// Comment Layout
function natalielite_custom_comment($comment, $args, $depth)
{
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	} ?>
	<<?php echo esc_attr($tag); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
		<div class="comment-author">
		<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		</div>
		<div class="comment-content">
			<?php printf( '<h4 class="author-name">%s</h4>', get_comment_author_link() ); ?>
			<span class="date-comment">
				<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php printf( esc_html__('%1$s at %2$s', 'natalielite'), get_comment_date(),  get_comment_time() ); ?></a>
			</span>
			<div class="reply">
				<?php edit_comment_link( esc_html__( '(Edit)', 'natalielite' ), '  ', '' );?>
				<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div>
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'natalielite' ); ?></em>
				<br />
			<?php endif; ?>
			<div class="comment-text"><?php comment_text(); ?></div>
		</div>	
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}

/** Pagination */
function natalielite_pagination()
{
    global $wp_query;
    if ( (int)$wp_query->found_posts > (int)get_option('posts_per_page') ) : ?>
    <div class="natalielite-pagination"><?php
        $args = array(
            'prev_text' => '<span class="fas fa-angle-left"></span>',
            'next_text' => '<span class="fas fa-angle-right"></span>'
        );
        the_posts_pagination($args);
    ?>
    </div>
    <?php
    endif;
}

/**
 * Custom Excerpt Length
 */
function natalielite_custom_excerpt_length($length) { return 30; }
add_filter( 'excerpt_length', 'natalielite_custom_excerpt_length', 999 );

/**
 * Custom Excerpt More
 */
function natalielite_custom_excerpt_more( $more ) {
    return '';
}
add_filter( 'excerpt_more', 'natalielite_custom_excerpt_more' );

function natalie_the_excerpt_more_link( $excerpt ){
    $post = get_post();
    $excerpt .= '... <a href="'. get_permalink($post->ID) . '">' . esc_html__('Continue Reading', 'natalielite') . '</a>';
    return $excerpt;
}
add_filter( 'excerpt_more', 'natalie_the_excerpt_more_link' );

// Url Encode
function natalielite_url_encode($title)
{
    $title = html_entity_decode($title);
    $title = urlencode($title);
    return $title;
}

// Include the TGM_Plugin_Activation class
add_action('tgmpa_register', 'natalielite_register_required_plugins');
function natalielite_register_required_plugins()
{
	$plugins = array(
		array(
			'name' => esc_html__( 'Contact Form 7', 'natalielite' ),
			'slug' => 'contact-form-7'
		),
        array(
			'name' => esc_html__( 'MailChimp for WordPress', 'natalielite' ),
			'slug' => 'mailchimp-for-wp'
		),
	);

	$config = array(
		'id'           => 'tgmpa',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => ''
	);
	tgmpa($plugins, $config);
}
