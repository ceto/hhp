<?php
/*
Template Name: Home Page
*/
?>
<script>
	//$('.navbar-nav li').removeClass('active');
	$('.navbar-nav a').each(function() {
		$(this).attr('href', $(this).attr('href').substring($(this).attr('href').indexOf("#")) );
  });
 //  $('.navbar-nav a[href=#detailswrapper]').attr('data-toggle','collapse');
 //  $('.navbar-nav a[href=#detailswrapper]').attr('data-target','#detailswrapper');

	// $('.navbar-nav .opener a').attr('data-toggle','collapse');
 //  $('.navbar-nav .opener a').attr('data-target','#detailswrapper');

  // jQuery(document).ready(function() {
  // 	$('body').scrollspy({ target: '.navbar-collapse' });
  // });
</script>
<main class="main" role="main">	
	<?php while (have_posts()) : the_post(); ?>
	<?php $actpost =	get_the_id(); ?>
	<header class="home__top is_opaque">
		<div class="wrapper wrapper--wide">
			<div class="home__top__brandi">
				<span class="home__top__logo">vesbo<span>
				<span class="home__top__discl">Velkommen hjem</span>
			</div>
			<div class="home__top__text">
				<h2 class="home__top__title"><?php the_title(); ?></h2>
				<h3 class="home__top__subtitle"><?php echo get_post_meta( $actpost, '_homedata_subtitle', true ); ?></h3>
			</div>
		</div>
	</header>

	<header id="home--header" class="home--header is_light">
		<div class="wrapper wrapper--wide">
			<div class="home--header__text">
				<?php the_content(); ?>
			</div>		
			<div class="home__headcircle">
				<?php echo get_post_meta( $actpost, '_homedata_blue', true ); ?>
			</div>
		</div>
	</header>
	
	<section id="home__prosjektet" class="home__contentblock is_light">
		<div class="wrapper wrapper--narrow">
			<?php echo wpautop(get_post_meta( $actpost, '_homedata_prosjcont', true )); ?>
		</div>
	</section>


	<section id="home__chooserblock" class="home__chooserblock is_dark">
		<div class="wrapper wrapper--fullwidth">
			<div class="page-header inverse">
			  <h2>Finn din bolig<span>Dra musepekeren over bygget for å velge leilighet</span></h2>
			</div>			

			<?php get_template_part('templates/chooser','start'); ?>

		</div>
	</section>

	<?php 
		$sl_args = array(
			'post_type'   => array('slide'),
			'ignore_sticky_posts' => true,
			'posts_per_page'         => -1,
			'orderby' => 'menu_order',
			'order' => 'ASC'
		);
		$the_slides = new WP_Query( $sl_args );
	?>
	<section id="home__bilderblock" class="home__bilderblock is_light">
		<div class="wrapper wrapper--fullwidth">
			<div class="page-header"><h2>Bilder</h2></div>
				<div class="master-slider ms-skin-default" id="masterslider">
					<?php while ( $the_slides->have_posts() ) : $the_slides->the_post(); ?>
						<?php 
							if (has_post_thumbnail() ) {
								$image_id = get_post_thumbnail_id();
								$thumb_url_array = wp_get_attachment_image_src($image_id, 'tiny169', true);
								$image_url_array = wp_get_attachment_image_src($image_id, 'full169', true);
								$thumb_url = $thumb_url_array[0];
								$image_url = $image_url_array[0];
						?>
						<div class="ms-slide">
		            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/vendor/masterslider/blank.gif" data-src="<?php echo $image_url; ?>" alt="<?php the_title(); ?>"/>
		            <img src="<?php echo $thumb_url; ?>" width="160" height="90" alt="<?php the_title(); ?>" class="ms-thumb"/>
		            <div class="ms-info"><?php the_title(); ?></div>
		        </div>
					<?php  } endwhile; ?>	
				</div>
		</div>
	</section>

	<section id="home__dokumenter" class="home__contentblock is_light">
		<div class="wrapper wrapper--narrow">
			<?php echo wpautop(get_post_meta( $actpost, '_homedata_dokucontent', true )); ?>
		</div>
	</section>

	<section id="home__omradet" class="home__contentblock is_light">
		<div class="wrapper wrapper--narrow">
			<?php echo wpautop(get_post_meta( $actpost, '_homedata_omradetcontent', true )); ?>
		</div>
	</section>

	<section id="home__mapblock" class="home__mapblock is_light">
		<div class="wrapper wrapper--fullwidth map-wrapper">
			<div id="map-canvas"></div>
		</div>
	</section>

	




	<?php endwhile; ?>
</main><!-- /.main -->