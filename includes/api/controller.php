<?php 



function register_custom_page_api()
{
	register_rest_route('api/v1', '/page/(?P<slug>[a-zA-Z0-9-]+)', array(
		'methods'  => 'GET',
		'callback' => 'get_page_data_by_slug',
		'permission_callback' => '__return_true', // Adjust permissions if needed
	));
}

add_action('rest_api_init', 'register_custom_page_api');




function register_project_list()
{
	register_rest_route(
		'api/v1',
		'/projects',
		array(
			'methods'             => 'GET',
			'callback'            => 'get_projects',
			'permission_callback' => '__return_true',
		)
	);
}
add_action('rest_api_init', 'register_project_list');



function register_service_list()
{
	register_rest_route(
		'api/v1',
		'/services',
		array(
			'methods'             => 'GET',
			'callback'            => 'get_services',
			'permission_callback' => '__return_true',
		)
	);
}
add_action('rest_api_init', 'register_service_list');


function register_faqs_list()
{
	register_rest_route(
		'api/v1',
		'/faqs',
		array(
			'methods'             => 'GET',
			'callback'            => 'get_faqs',
			'permission_callback' => '__return_true',
		)
	);
}
add_action('rest_api_init', 'register_faqs_list');
