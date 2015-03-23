<?php global $building; ?>
<?php 
		$ap_args = array(
			'post_type'   => array('apartment'),
			'ignore_sticky_posts' => true,
			'posts_per_page'         => -1,
			'meta_key' => '_meta_state',
			'meta_value' => 'fri',
			'tax_query' => array(
				array(
					'taxonomy' => 'object',
					'field'    => 'id',
					'terms'    => array( $building->term_id ),
				),
			),
		);
		$the_aps = new WP_Query( $ap_args );
?>
<p class="datarow">
	<a class="datarow--link " href="<?php echo get_term_link( $building ); ?>" tiltle="<?php echo $building->name; ?>">
		<span class="datarow--cell">
			<?php echo $building->name; ?>
		</span>
		
		<span class="datarow--cell">
			<?php echo get_tax_meta($building->term_id,'_meta_floors'); ?> floor
		</span>
		
		<span class="datarow--cell">
		<?php echo $the_aps->found_posts; ?> ledig / <?php echo $building->count; ?>
		</span>
		

	</a>
</p>