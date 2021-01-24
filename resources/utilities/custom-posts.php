<?php

// Our custom post type function
	function create_posttype()
	{
		register_post_type('service',
			// CPT Options
			array(
				'labels' => array(
					'name' => __('Services'),
					'singular_name' => __('Service')
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'services'),
				'show_in_rest' => true,

			)
		);
	}

// Hooking up our function to theme setup
	add_action('init', 'create_posttype');