<?php

/**
 * Initialize the custom Meta Boxes.
 */
add_action('admin_init', 'custom_meta_boxes');

global $post;

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in demo-theme-options.php.
 *
 * @return    void
 * @since     2.0
 */
function custom_meta_boxes() {

    /**
     * Create a custom meta boxes array that we pass to
     * the OptionTree Meta Box API Class.
     */
    $homepage_sections = array(
        'id' => 'home_sections',
        'title' => __('Page Sections', 'handcraft'),
        'desc' => '',
        'pages' => array('page'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            
            /* Services Section */
            array(
                'label' => __('Services', 'handcraft'),
                'id' => 'home_services_tab',
                'type' => 'tab'
            ),
            array(
                'label' => __('Show Section', 'handcraft'),
                'id' => 'home_services_switch',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'on'
            ),
            array(
                'label' => __('Title', 'handcraft'),
                'id' => 'services_section_title',
                'type' => 'text',
                'std' => '',
                'condition' => 'home_services_switch:is(on)'
            ),
            array(
                'label' => __('Description', 'handcraft'),
                'id' => 'services_section_description',
                'type' => 'textarea',
                'row' => '3',
                'std' => '',
                'condition' => 'home_services_switch:is(on)'
            ),
            array(
                'label' => __('Show Services', 'handcraft'),
                'id' => 'home_services_posts_switch',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'on',
                'condition' => 'home_services_switch:is(on)'
            ),
            array(
                'id' => 'home_services_ids',
                'label' => __('Select Services', 'handcraft'),
                'desc' => __('The selected services will be displayed.', 'handcraft'),
                'std' => '',
                'type' => 'custom-post-type-checkbox',
                'post_type' => 'service',
                'condition' => 'home_services_switch:is(on),home_services_posts_switch:is(on)',
                'operator' => 'and'
            ),
            array(
                'label' => __('Featured', 'handcraft'),
                'id' => 'home_featured_tab',
                'type' => 'tab'
            ),
            array(
                'label' => __('Show Section', 'handcraft'),
                'id' => 'home_featured_switch',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'on'
            ),
            array(
                'label' => __('Banner Image', 'handcraft'),
                'id' => 'featured_section_banner',
                'type' => 'upload',
                'class' => 'ot-upload-attachment-id',
                'condition' => 'home_featured_switch:is(on)',
            ),
            array(
                'label' => __('Title', 'handcraft'),
                'id' => 'featured_section_title',
                'type' => 'text',
                'std' => '',
                'condition' => 'home_featured_switch:is(on)'
            ),
            array(
                'label' => __('Title Icon', 'handcraft'),
                'id' => 'featured_title_icon',
                'type' => 'upload',
                'class' => 'ot-upload-attachment-id',
                'condition' => 'home_featured_switch:is(on)'
            ),
            array(
                'label' => __('Description', 'handcraft'),
                'id' => 'featured_section_banner_description',
                'type' => 'textarea',
                'row' => '5',
                'std' => '',
                'condition' => 'home_featured_switch:is(on)'
            ),
            array(
                'id' => 'featured_button_title',
                'label' => __('Button Label', 'handcraft'),
                'type' => 'text',
                'std' => '',
                'condition' => 'home_featured_switch:is(on)',
            ),
            array(
                'id' => 'featured_button_link',
                'label' => __('Button Link', 'handcraft'),
                'type' => 'text',
                'std' => '',
                'condition' => 'home_featured_switch:is(on)',
            ),
            
            // Gallery
            array(
                'label' => __('Gallery', 'handcraft'),
                'id' => 'gallery_tab',
                'type' => 'tab'
            ),
            array(
                'label' => __('Show Section', 'handcraft'),
                'id' => 'gallery_section_switch',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'on'
            ),
            array(
                'label' => __('Title', 'handcraft'),
                'id' => 'gallery_section_title',
                'type' => 'text',
                'std' => '',
                'rows' => '1',
                'condition' => 'gallery_section_switch:is(on)',
            ),
            array(
                'label' => __('Description', 'handcraft'),
                'id' => 'gallery_section_description',
                'type' => 'textarea',
                'std' => '',
                'rows' => '1',
                'condition' => 'gallery_section_switch:is(on)',
            ),
            array(
                'id' => 'gallery_images',
                'label' => __('Gallery', 'handcraft'),
                'std' => '',
                'type' => 'gallery',
                'class' => 'ot-gallery-shortcode',
                'condition' => 'gallery_section_switch:is(on)',
            ),
        )
    );
    
    $service_details = array(
        'id' => 'service_details',
        'title' => __('Service Details', 'handcraft'),
        'desc' => '',
        'pages' => array('service'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            /* Banner Section */
            array(
                'label' => __('Content', 'handcraft'),
                'id' => 'main_section_tab',
                'type' => 'tab'
            ),
            array(
                'label' => __('Show Section', 'handcraft'),
                'id' => 'section_banner_content_switch',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'on'
            ),
            array(
                'label' => __('Show Title Icon', 'handcraft'),
                'id' => 'title_icon_switch',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'off',
                'condition' => 'section_banner_content_switch:is(on)',
                'operator' => 'and'
            ),
            array(
                'label' => __('Title Icon', 'handcraft'),
                'id' => 'content_title_icon',
                'type' => 'upload',
                'class' => 'ot-upload-attachment-id',
                'condition' => 'section_banner_content_switch:is(on),title_icon_switch:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'banner_description',
                'label' => __('Description', 'handcraft'),
                'type' => 'textarea',
                'std' => '',
                'rows' => '3',
                'condition' => 'section_banner_content_switch:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'banner_button_label',
                'label' => __('Button Label', 'handcraft'),
                'type' => 'text',
                'std' => '',
                'condition' => 'section_banner_content_switch:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'banner_button_link',
                'label' => __('Button Link', 'handcraft'),
                'type' => 'text',
                'std' => '',
                'condition' => 'section_banner_content_switch:is(on)',
                'operator' => 'and'
            ),
            array(
                'label' => __('Information Blocks', 'handcraft'),
                'id' => 'info_blocks_tab',
                'type' => 'tab'
            ),
            array(
                'label' => __('Show Section', 'handcraft'),
                'id' => 'info_blocks_switch',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'on',
            ),
            array(
                'label' => __('Information Blocks', 'handcraft'),
                'id' => 'info_blocks_list',
                'type' => 'list-item',
                'operator' => 'and',
                'settings' => array(
                    array(
                        'id' => 'featured_section_banner',
                        'label' => __('Banner Image', 'handcraft'),
                        'type' => 'upload',
                        'class' => 'ot-upload-attachment-id',
                    ),
                    array(
                        'label' => __('Content', 'handcraft'),
                        'id' => 'block_content',
                        'type' => 'textarea',
                        'rows' => '3',
                    ),
                ),
                'std' => '',
                'condition' => 'info_blocks_switch:is(on)',
            ),
            
        )
    );


    $service_sections = array(
        'id' => 'services_page_box',
        'title' => __('Page Sections', 'handcraft'),
        'desc' => '',
        'pages' => array('page'),
        'context' => 'normal',
        'priority' => 'low',
        'fields' => array(
            array(
                'label' => __('Content', 'handcraft'),
                'id' => 'main_content_tab',
                'type' => 'tab'
            ),
            array(
                'label' => __('Show Title', 'handcraft'),
                'id' => 'content_page_title_switch',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'on',
                'condition' => ''
            ),
            array(
                'label' => __('Custom Title', 'handcraft'),
                'id' => 'custom_page_title',
                'type' => 'text',
                'std' => '',
                'rows' => '1',
                'condition' => 'content_page_title_switch:is(on)',
            ),
            array(
                'label' => __('Title Icon', 'handcraft'),
                'id' => 'content_title_icon',
                'type' => 'upload',
                'class' => 'ot-upload-attachment-id',
                'condition' => 'content_page_title_switch:is(on)',
            ),
            array(
                'label' => __('Button Title', 'handcraft'),
                'id' => 'posts_button_title',
                'type' => 'text',
                'std' => '',
            ),          
        )
    );

    $about_sections = array(
        'id' => 'about_sections',
        'title' => __('Page Sections', 'handcraft'),
        'desc' => '',
        'pages' => array('page'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'label' => __('Content', 'handcraft'),
                'id' => 'content_tab',
                'type' => 'tab'
            ),
            array(
                'label' => __('Show Title', 'handcraft'),
                'id' => 'custom_page_title_switch',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'on'
            ),
            array(
                'label' => __('Custom Title', 'handcraft'),
                'id' => 'custom_page_title',
                'type' => 'text',
                'std' => '',
                'rows' => '1',
                'condition' => 'custom_page_title_switch:is(on)',
            ),
            array(
                'label' => __('Title Icon', 'handcraft'),
                'id' => 'content_title_icon',
                'type' => 'upload',
                'class' => 'ot-upload-attachment-id',
            ),
            array(
                'label' => __('Button Title', 'handcraft'),
                'id' => 'button_title',
                'type' => 'text',
                'std' => '',
            ),
            array(
                'label' => __('Button Link', 'handcraft'),
                'id' => 'button_link',
                'type' => 'text',
                'std' => '#',
            ),
            
            /* Contact Form Section */
            array(
                'label' => __('Form Section', 'handcraft'),
                'id' => 'contact_form_tab',
                'type' => 'tab',
            ),
            array(
                'label' => __('Show Section', 'handcraft'),
                'id' => 'contact_form_switch',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'on',
            ),
            array(
                'label' => __('Banner Image', 'handcraft'),
                'id' => 'contact_featured_banner',
                'type' => 'upload',
                'class' => 'ot-upload-attachment-id',
                'condition' => 'contact_form_switch:is(on)',
            ),
            array(
                'id' => 'contact_form_title',
                'label' => __('Title', 'handcraft'),
                'type' => 'text',
                'std' => '',
                'rows' => '1',
                'condition' => 'contact_form_switch:is(on)',
            ),
            array(
                'label' => __('Icon', 'handcraft'),
                'id' => 'contact_form_icon',
                'type' => 'upload',
                'class' => 'ot-upload-attachment-id',
                'condition' => 'contact_form_switch:is(on)',
            ),
            array(
                'id' => 'contact_form_description',
                'label' => __('Description', 'handcraft'),
                'type' => 'textarea',
                'std' => '',
                'rows' => '3',
                'condition' => 'contact_form_switch:is(on)',
            ),
            array(
                'id' => 'form_labels',
                'label' => __('Form Fields Labels', 'handcraft'),
                'std' => '',
                'type' => 'textblock-titled',
                'section' => 'contact_options',
                'class' => 'inline_cols',
                'condition' => 'contact_form_switch:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'form_label_1',
                'std' => 'Name',
                'type' => 'text',
                'section' => 'contact_options',
                'class' => 'inline_cols',
                'condition' => 'contact_form_switch:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'form_label_2',
                'std' => 'Email',
                'type' => 'text',
                'section' => 'contact_options',
                'class' => 'inline_cols',
                'condition' => 'contact_form_switch:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'form_label_3',
                'std' => 'Message',
                'type' => 'text',
                'section' => 'contact_options',
                'class' => 'inline_cols',
                'condition' => 'contact_form_switch:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'form_label_4',
                'std' => 'SUBMIT',
                'type' => 'text',
                'section' => 'contact_options',
                'class' => 'inline_cols',
                'condition' => 'contact_form_switch:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'cmail_subject',
                'label' => __('Email Subject', 'handcraft'),
                'std' => 'Contact query from website ' . get_bloginfo('name'),
                'type' => 'text',
                'section' => 'contact_options',
                'condition' => 'contact_form_switch:is(on)',
            ),
            array(
                'id' => 'recipient_email',
                'label' => __('Recipients', 'handcraft'),
                'desc' => __('Provide email accounts where you want to receive emails from this form.', 'handcraft'),
                'std' => get_option('admin_email'),
                'type' => 'text',
                'section' => 'contact_options',
                'condition' => 'contact_form_switch:is(on)',
            ),
            array(
                'label' => __('Custom Form', 'handcraft'),
                'desc' => __('This will replace the default form.', 'handcraft'),
                'id' => 'custom_form_switch',
                'type' => 'on-off',
                'std' => 'off',
                'condition' => 'contact_form_switch:is(on)',
            ),
            array(
                'label' => __('Form Embed Code or Shortcode', 'handcraft'),
                'desc' => __('Please copy and paste the Embed Code or Shortcode of the custom form (if any). This will replace the default form.', 'handcraft'),
                'id' => 'custom_form_embed',
                'type' => 'textarea',
                'rows' => '3',
                'condition' => 'custom_form_switch:is(on), contact_form_switch:is(on)',
                'operator' => 'and'
            ),
            
            // Gallery
            array(
                'label' => __('Gallery', 'handcraft'),
                'id' => 'gallery_tab',
                'type' => 'tab'
            ),
            array(
                'label' => __('Show Section', 'handcraft'),
                'id' => 'gallery_section_switch',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'on'
            ),
            array(
                'label' => __('Title', 'handcraft'),
                'id' => 'gallery_section_title',
                'type' => 'text',
                'std' => '',
                'rows' => '1',
                'condition' => 'gallery_section_switch:is(on)',
            ),
            array(
                'label' => __('Description', 'handcraft'),
                'id' => 'gallery_section_description',
                'type' => 'textarea',
                'std' => '',
                'rows' => '1',
                'condition' => 'gallery_section_switch:is(on)',
            ),
            array(
                'id' => 'gallery_images',
                'label' => __('Gallery', 'handcraft'),
                'std' => '',
                'type' => 'gallery',
                'class' => 'ot-gallery-shortcode',
                'condition' => 'gallery_section_switch:is(on)',
            ),
        )
    );

    $page_sections = array(
        'id' => 'page_sections',
        'title' => __('Page Sections', 'handcraft'),
        'desc' => '',
        'pages' => array('page'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'label' => __('Content', 'handcraft'),
                'id' => 'content_tab',
                'type' => 'tab'
            ),
            array(
                'label' => __('Show Title', 'handcraft'),
                'id' => 'custom_page_title_switch',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'on'
            ),
            array(
                'id' => 'custom_page_title',
                'label' => __('Custom Title', 'handcraft'),
                'type' => 'text',
                'std' => '',
                'rows' => '1',
                'condition' => 'custom_page_title_switch:is(on)',
            ),
            array(
                'label' => __('Featured', 'handcraft'),
                'id' => 'generic_section_tab',
                'type' => 'tab'
            ),
            array(
                'label' => __('Show Section', 'handcraft'),
                'id' => 'generic_featured_section_switch',
                'type' => 'on-off',
                'class' => 'switch_div',
                'std' => 'off'
            ),
            array(
                'label' => __('Title', 'handcraft'),
                'id' => 'generic_section_title',
                'type' => 'text',
                'std' => '',
                'rows' => '1',
                'condition' => 'generic_featured_section_switch:is(on)',
            ),
            array(
                'label' => __('Description', 'handcraft'),
                'id' => 'generic_section_description',
                'type' => 'textarea',
                'std' => '',
                'rows' => '1',
                'condition' => 'generic_featured_section_switch:is(on)',
            ),
        )
    );
    
    /**
     * Sidebar option to pages
     * */
    $page_layouts = array(
        'id' => 'single_page_meta_box',
        'title' => __('Layout', 'handcraft'),
        //'desc'        => '',
        'pages' => array('page'),
        'context' => 'side',
        'priority' => 'low',
        'std' => 'full-sidebar',
        'fields' => array(
            array(
                'id' => 'page_sidebar',
                //'label'       => __( 'Sidebar', 'handcraft' ),
                'std' => ot_get_option('single_page_layout_radio'),
                'type' => 'radio-image',
                'choices' => array(
                    array(
                        'value' => 'right-sidebar',
                        'label' => __('Right Sidebar', 'handcraft'),
                        'src' => get_template_directory_uri().'/option-tree/assets/images/layout/right-sidebar.png',
                    ),
                    array(
                        'value' => 'full-width',
                        'label' => __('No Sidebar', 'handcraft'),
                        'src' => get_template_directory_uri().'/option-tree/assets/images/layout/full-width.png',
                    ),
                    array(
                        'value' => 'left-sidebar',
                        'label' => __('Left Sidebar', 'handcraft'),
                        'src' => get_template_directory_uri().'/option-tree/assets/images/layout/left-sidebar.png',
                    ),
                )
            ),
        )
    );

    /**
     * Register our meta boxes using the
     * ot_register_meta_box() function.
     */
    if (function_exists('ot_register_meta_box'))

    /* Exclude these templates from having common metaboxes. */
        $exclude_page_templates = array(
            'page-templates/about-page.php',
            'page-templates/services-page.php',
        );

    $page_id = get_permalink();
    $page_template_file = '';
    if (isset($_REQUEST['post'])) {
        $page_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
        $page_template_file = get_post_meta($page_id, '_wp_page_template', TRUE);
    }
    if (isset($_POST['post_ID'])) {
        $page_id = $_POST['post_ID'];
        $page_template_file = get_post_meta($page_id, '_wp_page_template', TRUE);
    }

    $front_page = get_option('page_on_front');
    $blog_page = get_option('page_for_posts');
    if (isset($page_id) && $front_page == $page_id) {
        ot_register_meta_box($homepage_sections);
    }

    /* About Us Page Metaboxes */
    if ($page_template_file == 'page-templates/about-page.php') {
        ot_register_meta_box($about_sections);
    }

    /* Services Listing Page Metaboxes */
    if ($page_template_file == 'page-templates/services-page.php') {
        ot_register_meta_box($service_sections);
    }

    /* General Pages Sections Settings */
    if (isset($page_id) && $front_page != $page_id && $blog_page != $page_id && !in_array($page_template_file, $exclude_page_templates)) {
        ot_register_meta_box($page_sections);
        ot_register_meta_box($page_layouts);
    }
    
    ot_register_meta_box($service_details);
}