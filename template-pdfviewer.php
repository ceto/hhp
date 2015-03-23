<?php
/*
Template Name: PDF viewer
*/
?>
<main class="main" role="main">	
	<?php while (have_posts()) : the_post(); ?>
		<header class="apartment-hero is_dark">
			<div class="wrapper wrapper-fullwidth">
			</div>
		</header>	
		<div class="wrapper wrapper-fullwidth is_light">
			<div class="page-header">
		  	<h1><?php echo roots_title(); ?><span><a target="_blank" href="<?php echo get_post_meta( $post->ID, 'pdf_url', true );?>">Last ned <i class="ion ion-ios7-download-outline"></i></a></span></h1>
			</div>
			
			<?php if ( get_post_meta( $post->ID, 'pdf_url', true ) ) : ?>
				<div class="singlecolumn">
					<div id="pdf-viewer" class="pdf-viewer">
						<p>It appears you don't have Adobe Reader or PDF support in this web browser. <a href="<?php echo get_post_meta( $post->ID, 'pdf_url', true );?>">Click here to download the PDF</a></p>
					</div>
				</div>
			<?php endif; ?>
			


		</div>
	<?php endwhile; ?>
</main><!-- /.main -->
<script type="text/javascript">
window.onload = function (){
	var success = new PDFObject({
		url: "<?php echo get_post_meta( $post->ID, 'pdf_url', true ) ;?>"
	}).embed("pdf-viewer");
};
</script>