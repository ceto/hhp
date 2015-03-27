<?php global $building; ?>
<?php 

	$builds_args = array(
		'hide_empty' => true 
	);
	$the_buildings = get_terms('object', $builds_args );
?>
<div class="thechooser">
	<div id="visual-chooser" class="visual-chooser visual-chooser-starter">
	<a class="btn btn-light" data-toggle="collapse" data-target="#detailswrapper">Prisliste <i class="ion ion-plus"></i></a>
	</div>
	<a name="prisliste"></a>
	<div id="detailswrapper" class="wrapper wrapper--fullwidth detailswrapper collapse">
    <?php foreach ($the_buildings as $building) { ?>
      <?php get_template_part('templates/building-apdetails'); ?>
    <?php } ?>
  </div>

</div>
