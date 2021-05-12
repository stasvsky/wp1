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

<?php class my_wp_widget extends WP_Widget {
	public function __construct() {
		$widget_options = array(
			 'classname' => 'hw_widget',
			 'description' => 'My wp widget',
		);
		parent::__construct( 'hw_widget', 'Hello world Widget', $widget_options );
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance[ 'title' ] );

		echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; ?>
		<p><strong>Hello world!</strong></p>
		<?php echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
		<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		</p><?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		return $instance;
	}
} 

function hw_register_widget() {
	register_widget( 'my_wp_widget' );
}
add_action( 'widgets_init', 'hw_register_widget' ); ?>