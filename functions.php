<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images, 
sidebars, comments, ect.
*/

add_action("init","build_taxonomies");
add_action('widgets_init','portefolio_sidebars');
add_action('after_setup_theme', 'portefolio_setup');
add_action('init', 'create_post_type');

if(!function_exists('build_taxonomies')){
	function build_taxonomies(){

		register_taxonomy("techniques", "post", array("label"=>"Techniques utilisées", "hierarchical"=>true, "query_var"=>true, "rewrite"=>true));

	}
}

if(!function_exists('portefolio_sidebars')){
	function portefolio_sidebars(){	
		register_sidebar(
			array(
					'id'=>'primary',
					'name' => __('Primary'),
					'description' => __('A short description of the sidebar'),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => "</div>",
					'before_title' => '<h3 class="widget-title">',
					'after_title' => '</h3>'
			)
		);
		
		register_sidebar(
			array(
					'id'=>'secondary',
					'name' => __('Secondary'),
					'description' => __('A short description of the sidebar'),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => "</div>",
					'before_title' => '<h3 class="widget-title">',
					'after_title' => '</h3>'
			)
		);
	}
}

if(!function_exists('portefolio_setup')){
	function portefolio_setup(){
		add_theme_support('post-thumbnails');
		add_theme_support('posts-formats', array('aside', 'link', 'gallery', 'status', 'quote', 'image'));
		if(!function_exists('add_image_size')){
			add_image_size('folio-work', 640,480,false);
		}
		register_nav_menu('header-menu', __('Header Menu', 'portefolio'));
	}
}

if(!function_exists('create_post_type')){
	function create_post_type(){
		
		register_post_type('works',
			array(	'labels' => array('name'=> __('Travaux'), 'singular_name' => __('Travail')),
					'supports' => array('title', 'editor', 'thumbnail', 'post-formats'),
					'public'=> true,
					'has_archive' => true)
		);
		
		register_post_type('skills',
			array(	'labels' => array('name'=> __('Compétences'), 'singular_name' => __('Compétence')),
					'supports' => array('title', 'custom-fields', 'thumbnail', 'post-formats'),
					'public'=> true,
					'has_archive' => true)
		);
		
	}
}	