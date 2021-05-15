<?php class My_wp_widget extends WP_Widget {	
	public function __construct() {
		$widget_options = array(
			 'classname' => 'hw_widget',
			 'description' => 'My wp widget',
		);
		parent::__construct( 'hw_widget', 'Hello world Widget', $widget_options );
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
		$color = get_option( 'widget_text_color' );

		echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; ?>
		<p><font color="<?php echo $color; ?>">Hello world!</font></p>
		<?php echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$widget_text_color = isset( $_POST['widget_text_color'] ) ? $_POST['widget_text_color'] : '';

		if ( empty( get_option('widget_text_color') ) ) {
			add_option( 'widget_text_color', $widget_text_color );
		} else {
			update_option( 'widget_text_color', $widget_text_color );
		} ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<select required name="widget_text_color">
			<option value="blue" <?php if( $_POST['widget_text_color'] == 'blue' ) { echo "selected"; } ?> >Blue</option>
			<option value="red" <?php if( $_POST['widget_text_color'] == 'red' ) { echo "selected"; } ?> >Red</option>
			<option value="yellow" <?php if( $_POST['widget_text_color'] == 'yellow' ) { echo "selected"; } ?> >Yellow</option>
			<option value="black" <?php if( $_POST['widget_text_color'] == 'black' ) { echo "selected"; } ?> >Black</option>
		</select>
	<?php }

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		return $instance;
	}
} ?>