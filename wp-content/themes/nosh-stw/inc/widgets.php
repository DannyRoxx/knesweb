<?php

function stw_nosh_widgets(){
    register_sidebar(array(
        'name' => esc_html__('Primary Sidebar','nosh-stw'),
        'id'   => 'stw_nosh_sidebar',
        'description' => esc_html__('Primary Sidebar will be shown on the right side of the site if widgets are added here.', 'nosh-stw'),
        'class'  => '',
        'before_widget' => '<div class="widget %2$s" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="title">',
        'after_title' => '</h3>',
    ));
}