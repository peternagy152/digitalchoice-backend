<?php 

function get_page_data_by_slug($request)
{
	$slug = $request['slug'];
	$page = get_page_by_path($slug, OBJECT, 'page');

	if (! $page) {
		return new WP_Error('no_page', 'Page not found', array('status' => 404));
	}

	$custom_fields = get_field('page_data', $page->ID, true);
	$response = array(
		'ID'           => $page->ID,
		'title'        => get_the_title($page->ID),
		'content'      => apply_filters('the_content', $page->post_content),
		'excerpt'      => get_the_excerpt($page->ID),
		'custom_fields' => $custom_fields,
	);

	return rest_ensure_response($response);
}




function get_theme_setting_by_slug($request)
{
	$slug = $request['slug'];
	$page = get_page_by_path($slug, OBJECT, 'theme-settings');

	if (! $page) {
		return new WP_Error('not_found', 'Theme Settings not found', array('status' => 404));
	}

	$custom_fields = get_field('page_data', $page->ID, true);
	$response = array(
		'status' => 'success' , 
		'msg' => 'Settings Fetched' , 
		'custom_fields' => $custom_fields
	);

	return rest_ensure_response($response);
}
