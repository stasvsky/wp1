<?php get_header() ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<h1 class="post_title"><?php the_title(); ?></h1>
	<div class="post_content"><?php the_content(); ?></div>

<?php endwhile; endif; ?>

<?php get_footer() ?>