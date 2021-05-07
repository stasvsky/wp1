<?php get_header(); ?>

<h1><?php single_post_title(); ?></h1>

<?php if (get_post_type() == 'book') {?>

	<ul class="books_fields">
		<li>Author: <?= get_field('bk_book_author') ?></li>
		<li>Genre: <?= get_field('bk_genre') ?></li>
		<li>The year of publishing: <?= get_field('bk_the_year_of_publishing') ?></li>
		<li>Number of pages: <?= get_field('bk_number_of_pages') ?></li>
	</ul>

<?php }?>

<?php get_footer(); ?>