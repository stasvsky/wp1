<?php function register_wp_sidebar2() {

	register_sidebar(
		array(
			'id' => 'wp_sidebar2',
			'name' => 'WP sidebar2',
			'description' => 'Drag and drop widgets here to add them to the sidebar.',
			'before_widget' => '<div id="%1$s" class="side widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
}

add_action( 'widgets_init', 'register_wp_sidebar2' );