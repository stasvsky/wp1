<?php function hw_register_widget() {
	register_widget( 'my_wp_widget' );
}
add_action( 'widgets_init', 'hw_register_widget' );

class my_wp_widget extends WP_Widget {
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
} ?>