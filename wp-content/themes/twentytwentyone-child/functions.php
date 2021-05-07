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

add_action( 'widgets_init', 'register_wp_sidebar2' ); ?>

<?php function get_widgets() {
	if (is_registered_sidebar('wp_sidebar2')) : ?>
		<div id="wp_sidebar2" class="sidebar">
			<?php
				if (is_active_sidebar( 'wp_sidebar2' )) {
					dynamic_sidebar( 'wp_sidebar2' );
				} else {
					the_widget('WP_Widget_Search');
					the_widget('WP_Widget_Categories');
				}
			?>
		</div>
	<?php endif;
} ?>