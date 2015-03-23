<header class="page-hero is_opaque">
	<div class="wrapper wrapper--fullwidth">
		<?php the_post_thumbnail('full169'); ?>
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo_kicsike.png" alt="JORDBÆRVEGEN" class="watermark">
	</div>
</header>
<div class="wrapper <?php echo is_page_template('template-twocolumnpage.php')?'wrapper--extranarrow':'wrapper--wide' ?> wrapper-page is_light">
	<div class="page-header">
  	<h1><?php echo roots_title(); ?></h1>
	</div>
	<div class="<?php echo is_page_template('template-twocolumnpage.php')?'twocolumn':'multicolumn' ?>">
		<?php the_content(); ?>
	</div>
	<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
</div>