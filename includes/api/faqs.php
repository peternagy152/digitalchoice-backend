<?php 

function get_faqs()
{
	$args = array(
		'post_type'      => 'faq',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
	);
	$faqs = get_posts($args);
	$modified_faqs = [];

	foreach ($faqs as $faq) {
		$modified_faqs[] = array(
			'question' => sanitize_text_field($faq->post_title),
			'answer'   => wp_kses_post($faq->post_content),
		);
	}

	$response = [
		'status' => 'success' , 
		'msg' => 'FAQs Fetched' , 
		'faqs' => $modified_faqs ,  
	] ; 

	return ( new WP_REST_Response( $response ) )->set_status( 200 );

}