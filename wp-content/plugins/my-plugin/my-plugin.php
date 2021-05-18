<?php
/*
 * Plugin Name: My plugin
 * Description: Plugin turn on text widget
 */

register_activation_hook( __FILE__, 'hw_register_widget' );

function hw_register_widget() {
	register_widget( 'My_wp_widget' );
}

add_action( 'widgets_init', 'hw_register_widget' );