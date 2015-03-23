<?php global $building; ?>
<?php 

	$builds_args = array(
		'hide_empty' => true 
	);
	$the_buildings = get_terms('object', $builds_args );
?>
<div class="thechooser">
	<div id="visual-chooser" class="visual-chooser visual-chooser-starter">
		<a class="popup-3d chooser-3dlink" href="<?php echo esc_url(home_url('/')); ?>wp-content/uploads/3dpanoramas/ext/index.html">
			<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/360.png" alt="View 3D"><br>
			Klikk for å se 3D 
		</a>
	<a class="btn btn-light" data-toggle="collapse" data-target="#detailswrapper">Leilighetsoversikt <i class="ion ion-plus"></i></a>
	</div>
	<div id="detailswrapper" class="wrapper wrapper--fullwidth detailswrapper collapse">
    <?php foreach ($the_buildings as $building) { ?>
      <?php get_template_part('templates/building-apdetails'); ?>
    <?php } ?>
  </div>

</div>
