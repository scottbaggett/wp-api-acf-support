<?php
/*
Plugin Name: ACF + WP-JSON
Description: Embeds ACF fields in post-meta. That's it.
Version: 1.01
Author: scott baggett
AuthorURI: http://www.github.com/scottbaggett
*/

add_action( 'plugins_loaded', 'add_json_filter' );

# Load at a safe point
function add_json_filter()
{
    add_filter( 'json_prepare_post', 'apply_json_filter', 10, 3 );
}

# add in all ACF meta properties
function apply_json_filter( $_post, $post, $context )
{
    $_post['meta'] = array_merge($_post['meta'],get_fields($post['ID']));
    return $_post;
}