<?php get_header() ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<h1 class="post_title"><?php the_title(); ?></h1>
	<div class="post_date">Date: <?php the_date(); ?></div>

	<div class="post_content"><?php the_content(); ?></div>

	<div class="post_author">Author: <?php the_author(); ?></div>

<?php endwhile; endif; ?>

<?php get_footer() ?>