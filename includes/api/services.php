<?php 

function get_services()
{
	$args = array(
		'post_type'      => 'services',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
	);
	$posts = get_posts($args);
	$modified_posts = array();
	if (! empty($posts)) {
		foreach ($posts as $post) {
			$modified_posts[] = array(
				'slug'    => $post->post_name, // Fetching post slug
				'title'   => sanitize_text_field($post->post_title), // Sanitized title
				'content' => wp_kses_post($post->post_content), // Sanitized content
				'image'   => get_the_post_thumbnail_url($post->ID, 'full') ?: '', // Fetching featured image URL
			);
		}
	} else {
		return rest_ensure_response(
			array(
				'message' => 'No Services found.',
				'status'  => 404,
			)
		);
	}
	return rest_ensure_response($modified_posts);
}