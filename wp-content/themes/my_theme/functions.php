<?php

function wp1_after_setup_theme() {
	add_theme_support('menus');

	register_nav_menu('Header', 'Header location');
	register_nav_menu('Footer', 'Footer location');
}

add_action('after_setup_theme', 'wp1_after_setup_theme');