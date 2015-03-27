<p class="datarow">

	<a id="ap-<?php echo $post->ID; ?>" 
    class="datarow--link state-<?php echo get_post_meta( $post->ID, '_meta_state', true ); ?>"
    href="<?php the_permalink(); ?>"
    data-svg="<?php echo get_post_meta( $post->ID, '_meta_svgdata', true ); ?>"
    data-url="<?php the_permalink(); ?>"
    data-omr="<?php echo get_post_meta( $post->ID, '_meta_omr', true ); ?> m<sup>2</sup>"
    data-pris="<?php echo number_format(get_post_meta( $post->ID, '_meta_pris', true ), 0, ',', ' '); ?> NOK"
    data-state="<?php echo get_post_meta( $post->ID, '_meta_state', true ); ?>"
    data-name="<?php the_title(); ?>"
    tiltle="<?php the_title(); ?>"
  >

		<span class="datarow--cell <?php echo get_post_meta( $post->ID, '_meta_3dpano', true )?'has3d de':'no3d de'; ?>">
				<?php /* if ( get_post_meta( $post->ID, '_meta_3dpano', true )) : ?>
					<img class="tiny3d popup-3d" href="<?php echo get_post_meta( $post->ID, '_meta_3dpano', true ); ?>" src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/360small.png" alt="View 3D">
				<?php endif; */?>
				<small>nr. <?php echo $post->menu_order; ?>|</small> <?php echo get_the_title($post->ID); ?>
		</span>
		
		<span class="datarow--cell">
			<?php echo str_replace('OG', 'ETG', get_post_meta( $post->ID, '_meta_floor', true ) ); ?>
		</span>
		
		<span class="datarow--cell">
			<?php echo get_post_meta( $post->ID, '_meta_omr', true ); ?> m<sup>2</sup>
		</span>
		
		
		<span class="datarow--cell statepris">
			<?php if (get_post_meta( $post->ID, '_meta_state', true )!=='fri'): ?>
				<span class="ministate"><?php echo st_conv(get_post_meta( $post->ID, '_meta_state', true )); ?></span>
			<?php endif; ?>
			<?php if (get_post_meta( $post->ID, '_meta_state', true )!=='utsolgt'): ?>
				<?php echo number_format(get_post_meta( $post->ID, '_meta_pris', true ), 0, ',', ' '); ?> NOK
			<?php endif; ?>
		</span>

		<span class="datarow--cell stateold">
				 <?php echo st_conv(get_post_meta( $post->ID, '_meta_state', true )); ?>
		</span>
	</a>
</p>