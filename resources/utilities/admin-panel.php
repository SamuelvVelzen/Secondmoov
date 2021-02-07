<?php
	add_action('admin_menu', 'manage_menu', PHP_INT_MAX);

	function manage_menu()
	{
		$list = [
			'samuel', 'admin'
		];

//		add seperator
		add_seperator(7);

//		add menu's
		add_menu_page('Content', 'Content', 'read', 'content', '', 'dashicons-screenoptions', 5);
		add_submenu_page(
			'content',
			'Berichten',
			'Berichten',
			'manage_options',
			'edit.php'
		);
//		add_acf();

//		remove menu's
		remove_menu_page('edit.php');
		remove_menu_page('edit-comments.php');

		$current_user = wp_get_current_user();
		if (!in_array($current_user->user_login, $list)) {
			remove_menu_page('edit.php?post_type=acf-field-group');
		}
	}

	add_action('admin_footer', 'visual_remove_default_template', 10);

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

	function add_seperator($position)
	{
		global $menu;
		$separator = [
			0 => '',
			1 => 'read',
			2 => 'separator' . $position,
			3 => '',
			4 => 'wp-menu-separator'
		];
		if (isset($menu[$position])) {
			$menu = array_splice($menu, $position, 0, $separator);
		} else {
			$menu[$position] = $separator;
		}
	}

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
			'page_title' => '404',
			'menu_title' => '404',
			'menu_slug' => '404',
			'parent_slug' => $parent['menu_slug'],
		));
	}
