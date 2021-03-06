<?php

function get_page_routes() {
	# Change 'menu' to your own navigation slug.
	$pages = get_pages();
	$names = [];

	foreach ($pages as $page) {
		if ($page->post_status === 'publish') {

			// Add template name to object
			$template = get_page_template_slug( $page->ID );

			// Clean up template filename
			$template = str_replace('.php', '', $template);
			$template = str_replace('page-', '', $template);

			$name = array(
				'path' => get_page_uri($page->ID),
				'slug' => $page->post_name,
				'template' => $template,
				'type' => 'pages'
			);

			array_push($names, $name);
		}
	}

	return $names;
}

add_action( 'rest_api_init', function () {
	register_rest_route( 'pages', '/list', array(
		'methods' => 'GET',
		'callback' => 'get_page_routes',
	) );
} );

function get_post_routes() {
	# Change 'menu' to your own navigation slug.
	$posts = get_posts();
	$names = [];

	foreach ($posts as $post) {
		if ($post->post_status === 'publish') {

			$name = array(
				'path' => 'posts/' . $post->post_name,
				'slug' => $post->post_name,
				'template' => 'post',
				'type' => 'post'
			);

			array_push($names, $name);
		}
	}

	return $names;
}

add_action( 'rest_api_init', function () {
	register_rest_route( 'posts', '/list', array(
		'methods' => 'GET',
		'callback' => 'get_post_routes',
	) );
} );

?>