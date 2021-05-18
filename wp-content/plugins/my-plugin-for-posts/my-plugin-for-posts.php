<?php
/*
* Plugin Name: My plugin for posts
* Description: Plugin for displaying posts
*/

register_activation_hook( __FILE__, 'displaying_posts' );

function displaying_posts() {
	$args = array(
		'posts_per_page' => 5,
		'orderby' => 'rand',
	);

	$rand_posts = get_posts( $args );  ?>

	<?php foreach( $rand_posts as $posts ) { ?>
		<li><a href="<?php echo $posts->guid; ?>"><?php echo $posts->post_title; ?></a></li>
	<?php } ?>

	<?php wp_reset_postdata() ?>
<?php } ?>