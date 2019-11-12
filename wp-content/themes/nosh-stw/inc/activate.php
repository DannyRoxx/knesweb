<?php

function stw_nosh_activate(){

    if(version_compare(get_bloginfo('version'),'4.7', '<')){
        wp_die(esc_html__('You must have WordPress 4.7 or later to use this theme', 'nosh-stw'));
    }

}