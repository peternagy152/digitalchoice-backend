<?php
function get_projects()
{
	$args = array(
		'post_type'      => 'projects',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
	);
	$posts = get_posts($args);

	$modified_posts = [];
	foreach ($posts as $post) {
		$categories = wp_get_post_terms($post->ID, 'project_category');
		$category_data = array_map(function ($cat) {
			return [
				'name' => $cat->name,
				'slug' => $cat->slug
			];
		}, $categories);

		$modified_posts[] = array(
			'slug'          => $post->post_name,
			'title'         => sanitize_text_field($post->post_title),
			'content'       => wp_kses_post($post->post_content),
			'image'         => get_the_post_thumbnail_url($post->ID, 'full') ?: '',
			'custom_fields' => get_field('page_data', $post->ID, true),
			'categories'    => $category_data,
		);
	}

	$response = [
		'status' => 'success',
		'msg'    => 'Projects fetched',
		'projects' => $modified_posts
	];

	return rest_ensure_response($response);
}
