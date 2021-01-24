<?php

// Add option pages (ACF)
	if (function_exists('acf_add_options_page')) {

		// add parent
		$parent = acf_add_options_page(array(
			'page_title' => 'SecondMoove',
			'menu_title' => 'SecondMoove',
			'menu_slug' => 'secondmoove',
			'icon_url' => 'dashicons-admin-generic',
			'position' => 4,
			'redirect' => true
		));

		// add sub page
		acf_add_options_sub_page(array(
			'page_title' => 'Menu',
			'menu_title' => 'Menu',
			'menu_slug' => 'menu',
			'parent_slug' => $parent['menu_slug'],
		));

		// add sub page
		acf_add_options_sub_page(array(
			'page_title' => 'Footer',
			'menu_title' => 'Footer',
			'menu_slug' => 'footer',
			'parent_slug' => $parent['menu_slug'],
		));

		// add sub page
		acf_add_options_sub_page(array(
			'page_title' => 'Usps',
			'menu_title' => 'Usps',
			'menu_slug' => 'usps',
			'parent_slug' => $parent['menu_slug'],
		));

		// add sub page
		acf_add_options_sub_page(array(
			'page_title' => 'Sidebar',
			'menu_title' => 'Sidebar',
			'menu_slug' => 'sidebar',
			'parent_slug' => $parent['menu_slug'],
		));

		// add sub page
		acf_add_options_sub_page(array(
			'page_title' => '404',
			'menu_title' => '404',
			'menu_slug' => '404',
			'parent_slug' => $parent['menu_slug'],
		));
	}

// Hide ACF 'extra fields' in dashboard
	add_action('admin_menu', function () {
// List of users that don't have pages removed
		$admins = [
			'samuel',
		];
		$current_user = wp_get_current_user();
		if (!in_array($current_user->user_login, $admins)) {
			remove_menu_page('edit.php?post_type=acf-field-group');
		}
	}, PHP_INT_MAX);

	function visual_remove_default_template()
	{
		global $pagenow;
		if (in_array($pagenow, array('post-new.php', 'post.php')) && get_post_type() == 'page') { ?>
			<script>
                (function ($) {
                    $(document).ready(function () {
                        $('#page_template option[value="default"]').remove();
                    })
                })(jQuery)
			</script>
			<?php
		}
	}

	add_action('admin_footer', 'visual_remove_default_template', 10);