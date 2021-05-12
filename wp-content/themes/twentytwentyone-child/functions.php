<?php require_once('classes/class-my-wp-widget.php'); ?>

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

<?php function hw_register_widget() {
	register_widget( 'my_wp_widget' );
}
add_action( 'widgets_init', 'hw_register_widget' ); ?>

<?php add_action('init', 'my_custom_init');
function my_custom_init(){
	register_post_type('news', array(
		'labels'             => array(
			'name'               => 'News',
			'singular_name'      => 'News',
			'add_new'            => 'Add new',
			'add_new_item'       => 'Add new news',
			'edit_item'          => 'Edit news',
			'new_item'           => 'New news',
			'view_item'          => 'View news',
			'search_items'       => 'Search news',
			'not_found'          => 'News not found',
			'not_found_in_trash' => 'News not found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'News'
		),

		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
	) );
}

add_filter('post_updated_messages', 'news_updated_messages');
function news_updated_messages( $messages ) {
	global $post;

	$messages['news'] = array(
		0 => '',
		1 => sprintf( 'News updated. <a href="%s">Check news</a>', esc_url( get_permalink($post->ID) ) ),
		2 => 'Custom field updated.',
		3 => 'Custom field removed.',
		4 => 'News updated.',
		5 => isset($_GET['revision']) ? sprintf( 'News restored from revision %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( 'News was published. <a href="%s">Go to news</a>', esc_url( get_permalink($post->ID) ) ),
		7 => 'News saved.',
		8 => sprintf( 'News saved. <a target="_blank" href="%s">News preview</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post->ID) ) ) ),
		9 => sprintf( 'News is scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">News preview</a>', date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post->ID) ) ),
		10 => sprintf( 'News draft updated. <a target="_blank" href="%s">News preview</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post->ID) ) ) ),
	);

	return $messages;
}

add_action( 'contextual_help', 'add_help_text', 10, 3 );
function add_help_text( $contextual_help, $screen_id, $screen ){
	if('News' == $screen->id ) {
		$contextual_help = '<p>Help with adding new news:</p>';
	}
	elseif( 'edit-news' == $screen->id ) {
		$contextual_help = '<p>This is the help topic shown for the News.</p>';
	}

	return $contextual_help;
} ?>

<?php function true_custom_fields() {
	add_post_type_support( 'news', 'custom-fields');
}

add_action('init', 'true_custom_fields'); ?>