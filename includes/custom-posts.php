<?php
//Custom Posts 

function services()
{

	$supports = array(
		'title', // post title
		'thumbnail', // featured images
		'span', // post span
		"editor",
	);

	$labels = array(
		'name' => _x('Services', 'plural'),
		'singular_name' => _x('Service', 'singular'),
		'menu_name' => _x('Services', 'admin menu'),
		'name_admin_bar' => _x('Services', 'admin bar'),
		'add_new' => _x('Add New Service', 'add new'),
		'add_new_item' => __('Add New Service'),
		'new_item' => __('New Service'),
		'edit_item' => __('Edit Service'),
		'view_item' => __('View Service'),
		'all_items' => __('All Services'),
		'search_items' => __('Search Services'),
		'not_found' => __('No Service found.'),
	);

	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'services'),
		'menu_icon'          => 'dashicons-yes',
		'has_archive' => true,
		'hierarchical' => false,
	);
	register_post_type('services', $args);
}
add_action('init', 'services');

function projects()
{

	$supports = array(
		'title',
		'thumbnail',
		'span',
		"editor",

	);

	$labels = array(
		'name' => _x('Projects', 'plural'),
		'singular_name' => _x('Project', 'singular'),
		'menu_name' => _x('Projects', 'admin menu'),
		'name_admin_bar' => _x('Projects', 'admin bar'),
		'add_new' => _x('Add New Project', 'add new'),
		'add_new_item' => __('Add New Project'),
		'new_item' => __('New Project'),
		'edit_item' => __('Edit Project'),
		'view_item' => __('View Project'),
		'all_items' => __('All Projects'),
		'search_items' => __('Search Projects'),
		'not_found' => __('No Project found.'),
	);

	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'project'),
		'menu_icon'          => 'dashicons-editor-paste-word',
		'has_archive' => true,
		'hierarchical' => false,
	);
	register_post_type('projects', $args);
}
add_action('init', 'projects');


function Faqs()
{

	$supports = array(
		'title', // post title
		'thumbnail', // featured images
		'span', // post span
		"editor",

	);

	$labels = array(
		'name' => _x('Faqs', 'plural'),
		'singular_name' => _x('Faq', 'singular'),
		'menu_name' => _x('Faqs', 'admin menu'),
		'name_admin_bar' => _x('Faqs', 'admin bar'),
		'add_new' => _x('Add New ', 'add new'),
		'add_new_item' => __('Add New Faq'),
		'new_item' => __('New Faq'),
		'edit_item' => __('Edit Faq'),
		'view_item' => __('View Faq'),
		'all_items' => __('All Faqs'),
		'search_items' => __('Search Faq'),
		'not_found' => __('No Faq found.'),
	);

	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'faq'),
		'menu_icon'          => 'dashicons-editor-help',
		'has_archive' => true,
		'hierarchical' => false,
	);
	register_post_type('faq', $args);
}
add_action('init', 'Faqs');

function theme_settings()
{

	$supports = array(
		'title',
		"editor",

	);

	$labels = array(
		'name' => _x('Theme Settings', 'plural'),
		'singular_name' => _x('Theme Settings', 'singular'),
		'menu_name' => _x('Theme Settings', 'admin menu'),
		'name_admin_bar' => _x('Theme Settings', 'admin bar'),
		'add_new' => _x('Add New Theme Settings', 'add new'),
		'add_new_item' => __('Add New Theme Settings'),
		'new_item' => __('New Theme Settings'),
		'edit_item' => __('Edit Theme Settings'),
		'view_item' => __('View Theme Settings'),
		'all_items' => __('All Theme Settings'),
		'search_items' => __('Search Theme Settings'),
		'not_found' => __('No Theme Settings found.'),
	);

	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'theme-settings'),
		'menu_icon'          => 'dashicons-admin-generic',
		'has_archive' => true,
		'hierarchical' => false,
	);
	register_post_type('theme-settings', $args);
}
add_action('init', 'theme_settings');