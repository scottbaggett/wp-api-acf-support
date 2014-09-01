<?php
/*
Plugin Name: ACF + WP-JSON
Description: Embeds ACF fields in post-meta. That's it.
Version: 1.0
Author: scott baggett
*/


add_action( 'plugins_loaded', 'add_json_filter' );

# Load at a safe point
function add_json_filter()
{
    add_filter( 'json_prepare_post', 'apply_json_filter', 10, 3 );
}

function apply_json_filter( $_post, $post, $context )
{
     # add in all ACF meta properties
    $_post['meta'] = array_merge($_post['meta'],get_fields($post['ID']));
    return $_post;

}
