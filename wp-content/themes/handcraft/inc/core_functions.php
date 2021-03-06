<?php
/* * * Required: set 'ot_theme_mode' filter to true. */
add_filter('ot_theme_mode', '__return_true');

/* * * Meta Boxes */
add_filter('ot_meta_boxes', '__return_true');

/* Theme Options screen customizations */
add_filter('ot_show_pages', '__return_false');

add_filter('ot_show_new_layout', '__return_false');

add_filter('ot_header_logo_link', function() {
    return sprintf('<a href="https://one.com/" target="_blank"><img src="%s" /></a>', THM_DIR_URI . '/assets/images/one-com.svg');
});

add_filter('ot_header_version_text', function() {
    return THM_NAME . '  v' . THM_VER;
});

/* Modified Field for Colors */
function onecom_social_icons_colors($array, $field_id){

    unset($array['focus']);

    $link_fields = array(
        'social_icons_color',
        'logo_color',
    );

    $menu_fields = array(
        'menu_link_color',
        'submenu_link_color',
        'submenu_typo_bg',
        'menu_typo_bg',
    );

    $banner_fields = array(
        'hbanner_text_color',
        'intbanner_text_color',
    );

    $button_fields = array(
        'content_button_text_color',
        'cont_buttonsh_bg',
        'form_button_text_color',
        'form_buttonsh_bg',
    );

    if( in_array($field_id, $button_fields ) ){
        $array['link'] = __('Text Color', 'handcraft');
        $array['hover'] = __('Hover Text Color', 'handcraft');
        $array['active'] = __('Background Color', 'handcraft');
        $array['visited'] = __('Hover Background Color', 'handcraft');
    }

    if( in_array($field_id, $banner_fields ) ){
        $array['link'] = __('Big Text Color', 'handcraft');
        $array['hover'] = __('Small Text Color', 'handcraft');
        $array['active'] = __('Background Color', 'handcraft');
        unset($array['visited']);
        return $array;
    }

    if( in_array($field_id, $link_fields ) ){
        unset($array['visited']);
        unset($array['active']);

        return $array;
    }

    if( in_array($field_id, $menu_fields ) ){
        unset($array['visited']);
        return $array;
    }

    if('headings_colors' === $field_id){
        $array['h1'] = 'H1';
        $array['h2'] = 'H2';
        $array['h3'] = 'H3';
        $array['h4'] = 'H4';
        $array['h5'] = 'H5';
        $array['h6'] = 'H6';
        unset($array['link']);
        unset($array['hover']);
        unset($array['active']);
        unset($array['visited']);


    }

    return $array;
}
add_filter('ot_recognized_link_color_fields', 'onecom_social_icons_colors', 10, 2);

function onecom_buttons_colors($array, $field_id) {
    return $array;
}

add_filter('ot_recognized_link_color_fields', 'onecom_buttons_colors', 10, 2);

/* Typography Fields */

function ot_filter_typography_fields($array, $field_id) {
    $array = array('font-family', 'font-size', 'font-weight', 'line-height', 'font-style', 'text-decoration');
    if ('secondf_typo' === $field_id) {
        $array = array('font-family');
        return $array;
    }
    return $array;
}

add_filter('ot_recognized_typography_fields', 'ot_filter_typography_fields', 10, 2);
/* Single Unit Field */

function filter_measurement_unit_types($array, $field_id) {
    $array['px'] = 'px';
    $array['em'] = 'em';
    $array['pt'] = 'pt';
    unset($array['%']);
    return $array;
}

add_filter('ot_measurement_unit_types', 'filter_measurement_unit_types', 10, 2);

/* Header Menu Callback - If no menu set */

function onecom_add_nav_menu() {
    return printf('<a href="%s"><small><u>Add Menu</u></small></a>', admin_url('customize.php?autofocus[panel]=nav_menus'));
}

/* Custom Page Title Function */
if (!function_exists('the_custom_title')) {

    function the_custom_title($id = '') {
        if (!$id) {
            global $post;
            $id = $post->ID;
        }

        // Do not display title if switch off
        $title_switch = get_post_meta($id, 'custom_page_title_switch', true);
        if ($title_switch == 'off') {
            return;
        }

        // Show custom title if have else default title
        $custom_title = get_post_meta($id, 'custom_page_title', true);
        if (strlen($custom_title)) {
            echo $custom_title;
            return;
        } else {
            echo get_the_title($id);
        }

        return;
    }

}

/* Get Section Image  */

function get_section_banner($key) {

    global $post;
    $post_id = $post->ID;
    if (!isset($post_id) && !isset($key))
        return;

    $image_id = get_post_meta($post_id, $key, true);
    if (strlen($image_id)) {

        $image_url = wp_get_attachment_image_src($image_id, 'home_big');
        if (!empty($image_url)) {
            $banner_img_url = $image_url[0];
            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
            ?>
            <img src="<?php echo $banner_img_url; ?>" alt="<?php echo $image_alt; ?>"  />
            <?php
            return;
        }
        return;
    }
    return;
}

/* Get Section Image  */

function get_image_from_block_list($key) {

    if (strlen($key)) {

        $image_url = wp_get_attachment_image_src($key, 'home_big');
        if (!empty($image_url)) {
            $banner_img_url = $image_url[0];
            $image_alt = get_post_meta($key, '_wp_attachment_image_alt', true);
            ?>
            <img src="<?php echo $banner_img_url; ?>" alt="<?php echo $image_alt; ?>"  />
            <?php
            return;
        }
        return;
    }
    return;
}

/* Handle contact form request */
add_action('wp_ajax_send_contact_form', 'send_contact_form');
add_action('wp_ajax_nopriv_send_contact_form', 'send_contact_form');

function send_contact_form() {

    /* Check Nonce */
    if (!wp_verify_nonce($_POST['validate_nonce'], 'booking_form')) {
        $output = json_encode(array('type' => 'error', 'text' => 'Invalid security token, please reload the page and try again.'));
        die($output);
    }
    oc_secure_form();
    /* Check Length of the parameters being received from POST request */
    if (!strlen(trim($_POST['name']))) {
        $output = json_encode(array('type' => 'error', 'text' => __('Name is empty or too short.', 'handcraft')));
        die($output);
    }
    if (80 < mb_strlen($_POST['name'], '8bit')) {
        $output = json_encode(array('type' => 'error', 'text' => __('Name is too large.', 'handcraft')));
        die($output);
    }
    if (!(strlen(trim($_POST['email'])) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
        $output = json_encode(array('type' => 'error', 'text' => __('Email entered is not valid.', 'handcraft')));
        die($output);
    }
    if (180 < mb_strlen($_POST['email'], '8bit')) {
        $output = json_encode(array('type' => 'error', 'text' => __('Email is too large.', 'handcraft')));
        die($output);
    }
    if (!strlen(trim($_POST['message']))) {
        $output = json_encode(array('type' => 'error', 'text' => __('Message text is empty or too short.', 'handcraft')));
        die($output);
    }
    if (1024 < mb_strlen($_POST['message'], '8bit')) {
        $output = json_encode(array('type' => 'error', 'text' => __('Message is too large, please shorten it.', 'handcraft')));
        die($output);
    }

    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $email = filter_var(mb_strtolower($_POST["email"], 'UTF-8'), FILTER_SANITIZE_EMAIL);
    $msg = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

    $label_1 = filter_var($_POST["label_1"], FILTER_SANITIZE_STRING);
    if (!isset($label_1) && !strlen($label_1)) {
        $label_1 = __("Email", "handcraft");
    }
    $label_2 = filter_var($_POST["label_2"], FILTER_SANITIZE_STRING);
    if (!isset($label_2) && !strlen($label_2)) {
        $label_2 = __("Name", "handcraft");
    }

    $label_3 = filter_var($_POST["label_3"], FILTER_SANITIZE_STRING);
    if (!isset($label_3) && !strlen($label_3)) {
        $label_3 = __("Message", "handcraft");
    }

    //$to = get_option( 'admin_email' );
    $subject = filter_var($_POST["subject"], FILTER_SANITIZE_STRING);

    if (!strlen($subject)) {
        /* set default subject if missing */
        $subject = __("Contact query from website", "handcraft") . get_bloginfo('name');
    }

	/*
	  * Leaving the "from" field blank in mail-headers so that wordpress@domain.tld can act as sender
	  * More details: https://app.asana.com/0/307895785186248/529519894576281/f
	  */

	$body = __("You received a new message from", "handcraft") . ' ' . $email . ' ' .
            __("via the contact form on", "handcraft") . ' ' . get_site_url() . "\n\n\n" .
            __("Contact Details", "handcraft") . "\n\n" .
            $label_1 . ': ' . $name . " \n" .
            $label_2 . ': ' . $email . " \n" .
            $label_3 . ': ' . $msg . " \n" .
            /*$headers = "From: $email \r\n";*/
            $headers = "Reply-To: $email \r\n";




    //$sendto = filter_var(mb_strtolower($_POST["recipient"],'UTF-8'), FILTER_SANITIZE_EMAIL);
    $sendto = $_POST["recipient"];
    if (!strlen($sendto)) {
        $sendto = get_option('admin_email');
        $send_mail = wp_mail($sendto, $subject, $body, $headers);
    } else if (!strpos($sendto, ',') && strlen($sendto)) {
        $sendto = filter_var(mb_strtolower($sendto, 'UTF-8'), FILTER_SANITIZE_EMAIL);
        $send_mail = wp_mail($sendto, $subject, $body, $headers);
    } else {
        $send_mail = wp_mail($sendto, $subject, $body, $headers);
    }


    if ($send_mail) {
        $token_new = oc_get_captcha_string();
        $output = json_encode(array(
            'type' => 'success',
            'token' => $token_new,
            'image' => get_stylesheet_directory_uri() . '/inc/image.php?i=' . $token_new,
            'text' => __('Your message has been successfully sent.', 'handcraft'),
        ));

        die($output);
    } else {
        $output = json_encode(array('type' => 'error', 'text' => __('Some error occurred, please reload the page and try again.', 'handcraft'), 'body' => $body));
        die($output);
    }
}

/* Customize Theme Options link in admin menu. */
add_filter('ot_show_pages', '__return_false');
add_filter('ot_theme_options_parent_slug', '__return_false');
add_filter('ot_theme_options_menu_title', function( $title ) {
    return $title = 'Handcraft';
});
add_filter('ot_theme_options_menu_slug', function( $slug ) {
    return $slug = 'octheme_settings';
});
add_filter('ot_theme_options_icon_url', function( $url ) {
    return $url = ' dashicons-admin-customizer';
});

// Register Custom Post Type - Tutorial
function register_cpt_services() {

    $labels = array(
        'name' => _x('Tutorials', 'Post Type General Name', 'handcraft'),
        'singular_name' => _x('Tutorial', 'Post Type Singular Name', 'handcraft'),
        'new_item' => __('New Tutorial', 'handcraft'),
        'edit_item' => __('Edit Tutorial', 'handcraft'),
        'update_item' => __('Update Tutorial', 'handcraft'),
        'view_item' => __('View Tutorial', 'handcraft'),
        'view_items' => __('View Tutorials', 'handcraft'),
    );
    $args = array(
        'label' => __('Tutorial', 'handcraft'),
        'description' => __('Tutorial Description', 'handcraft'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-book',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );
    register_post_type('service', $args);
}

add_action('init', 'register_cpt_services', 0);

// hook into the init action and call create_book_taxonomies when it fires
add_action('init', 'service_taxonomies', 0);

/* ====Create taxonomies for service post type ======= " */

function service_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => _x('Tutorials Types', 'handcraft'),
        'singular_name' => _x('Tutorials Type', 'handcraft'),
        'search_items' => __('Search Tutorials Types','handcraft'),
        'all_items' => __('All Tutorials Types','handcraft'),
        'parent_item' => __('Parent Tutorials Type','handcraft'),
        'parent_item_colon' => __('Parent Tutorials Type:','handcraft'),
        'edit_item' => __('Edit Tutorials Type','handcraft'),
        'update_item' => __('Update Tutorials Type','handcraft'),
        'add_new_item' => __('Add New Tutorials Type','handcraft'),
        'new_item_name' => __('New Tutorials Type','handcraft'),
        'menu_name' => __('Tutorials Type','handcraft'),
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true
            // 'rewrite'           => array( 'slug' => 'Tutorials' ),
    );
    register_taxonomy('service_type', array('service'), $args);
}
/**
 * Function oc_sucure_forms
 * Secure form submission, try to block spams by using captcha and honeypot
 * @param void
 * @return void
 */
function oc_secure_form()
{
    /* Check Captcha */
    if (!isset($_POST['oc_cpt']) || !isset($_POST['oc_captcha_val']) || !$_POST['oc_captcha_val'] 
        || !$_POST['oc_cpt'] || !oc_validate_captcha($_POST['oc_captcha_val'], $_POST['oc_cpt'])
        ){
        $output = json_encode(array(
            'type' => 'error',
            'text' => __('Invalid answer, please try again.', 'handcraft'),
        ));
        die($output);
    }

    /** Check Honey Pot field */
    if (!isset($_POST['oc_csrf_token']) || $_POST['oc_csrf_token'] !== '') {
        $output = json_encode(array(
            'type' => 'error',
            'text' => __('Some error occurred, please reload the page and try again.', 'handcraft'),
        ));
        die($output);
    }
}

// Generate booking_form nonce via ajax and return to caller
add_action('wp_ajax_oc_booking_nonce', 'oc_nonce_cb');
add_action('wp_ajax_nopriv_oc_booking_nonce', 'oc_nonce_cb');

/**
 * Function oc_nonce_cb
 * Ajax handler to generate nonce and return it as response
 * @param void
 * @return void
 */
function oc_nonce_cb()
{
    wp_send_json([
        'nonce' => wp_create_nonce('booking_form'),
        'status' => '0',
    ]);
}

/**
 * Function oc_secure_fields
 * Return HTML string contaning the fields that will be used in forms to track 
 * token etc.
 * @param void
 * @return string
 */
function oc_secure_fields()
{
    $oc_token = oc_get_captcha_string();
    $fields = '<label class="d-block">'.__('Type in the answer to the sum below:', 'handcraft').'</label><span class="d-inline-block oc-cap-container"><img id="oc_cap_img" alt="Please reload" src="' . get_stylesheet_directory_uri() . '/inc/image.php?i=' . $oc_token . '">'
        . '<input type="text" name="oc_captcha_val" class="oc-captcha-val" id="oc-captcha-val" placeholder="?" required/></span>'
        . '<input type="hidden" name="oc_cpt" id="oc_cpt" value="' . $oc_token . '">'
		. '<input type="text" name="oc_csrf_token" value="" class="oc_csrf_token" id="oc_csrf_token">'.
		'<input type="hidden" value="" name="validate_nonce" id="validate_nonce">';
    return $fields;
}

add_action('wp_ajax_oc_refresh_captcha', 'oc_get_captcha_string');
if (!defined('OC_CAPTCHA_KEY')){
    define('OC_CAPTCHA_KEY', '1ASD2A4D2AA4DA15A');
}

/**
 * Function oc_get_captcha_string
 * Generate a token to be used to add value in captcha
 * @param void
 * @return string
 */
function oc_get_captcha_string($echo = false){
    $num1 = rand(0, 10);
    $num2 = rand(1, 10);
    $token = OC_CAPTCHA_KEY . base64_encode($num1 . '#'. $num2);
    if (defined('DOING_AJAX') && DOING_AJAX && $echo){
        wp_send_json([
            'token' => $token,
            'image' => get_stylesheet_directory_uri() . '/inc/image.php?i='.$token
        ]);
        wp_die();
    }
    return $token;
}

/** 
 * Function oc_validate_captcha
 * Check if incoming value of captcha is valid
 * @param $value, string that user entered as captcha solution
 * @param $encrypted_val, string the token that was used to generate captcha
 * @return string
 */
function oc_validate_captcha($value, $encrypted_val){
    $decrypted_value = base64_decode(str_replace(OC_CAPTCHA_KEY, '', $encrypted_val));
    if (! $decrypted_value ){   
        return false;
    }
    $exploded = explode('#', $decrypted_value);
    
    if (count($exploded) < 2){
        return false;
    }

    return (intval($exploded[0]) + intval($exploded[1])) === intval($value);
}