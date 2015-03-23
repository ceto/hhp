<main class="main main-apartment" role="main">
	<?php while (have_posts()) : the_post(); ?>
  	<?php get_template_part('templates/apartment', 'single'); ?>
  <?php endwhile; ?>
</main><!-- /.main -->