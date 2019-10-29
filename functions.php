<?php

function oceanwp_child_enqueue_parent_style() {
	$theme   = wp_get_theme( 'OceanWP' );
	$version = $theme->get( 'Version' );
	// Load the stylesheet
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), $version );
	
}
add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );

add_filter('get_sample_permalink_html', 'my_hide_permalinks');
    function my_hide_permalinks($in){
        global $post;
        if($post->post_type == 'my_post_type')
            $out = preg_replace('~<div id="edit-slug-box".*</div>~Ui', '', $in);
        return $out;
    }
