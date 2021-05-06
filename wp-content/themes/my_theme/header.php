<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8" />
	<?php wp_head(); ?>
	<title><?php wp_title(' - ', true, 'right'); ?> <?php bloginfo('name'); ?></title>
</head>
<body>

<?php
	$args = array(
		'theme_location' => 'Header',
		'menu' => 'Main',
		'container' => 'nav',
		'container_class' => 'nav',
		'items_wrap' => '<ul>%3$s</ul>'
	);

	wp_nav_menu($args);
?>

<main class="main">