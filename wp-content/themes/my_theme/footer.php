<?php
	$args = array(
		'theme_location' => 'Footer',
		'menu' => 'Foote',
		'container' => 'div',
		'container_class' => 'footer_nav',
		'items_wrap' => '<ul>%3$s</ul>'
	);

	wp_nav_menu($args);
?>

<?php wp_footer(); ?>
</body>
</html>