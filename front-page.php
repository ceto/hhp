<main class="main" role="main">	
	
	<header class="home__top is_opaque">
		<div class="wrapper wrapper--wide">
			<div class="home__top__brandi">
				<span class="home__top__logo">vesbo<span>
				<span class="home__top__discl">Velkommen hjem</span>
			</div>
			<div class="home__top__text">
				<h2 class="home__top__title">Fyllingsdalen</h2>
				<h3 class="home__top__subtitle">Prosjektet Borettslaget Hesjaholtet Park</h3>
			</div>
		</div>
	</header>

	<header id="home--header" class="home--header is_light">
		<div class="wrapper wrapper--wide">
			<div class="home--header__text">
				<?php //the_content(); ?>
				<h1>Velkommen til Sameiet Hesjaholtet park!</h1>
			</div>		
			<div class="home__headcircle">
				Vestbo er å vente for deg og din familie
			</div>
		</div>
	</header>
	
	<section id="home__prosjektet" class="home__contentblock is_light">
		<div class="wrapper wrapper--narrow">
			<h2>Om prosjektet</h2>
			<p>Sameiet Lindehaugen skal bygges i et populært boligområde på Nordås. Prosjektet består av fem leiligheter hvorav en av leilighetene dekker hele toppetasjen.</p>
			<p>Leilighetene er romslige og de får alle en god planløsning. Standarden er høy og leilighetene blir blant annet levert med enstavs eikeparkett. Kjøkken leveres i kvalitet som HTH modell KW-Straight hvitlakkert. Hvitevarer til innbygging fra Siemens. Som kjøper har du gode muligheter til å påvirke innvendige kvaliteter og løsninger.</p>
			<p>Alle fem leilighetene har to garasjeplasser hver. Dette er inkludert gjesteparkering. Bygningen vil få en lys og romslig underetasje med garasjeplasser og boder. Herfra vil det være heis til boligetasjene.</p>
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
			<h2>Nedlastbare dokumenter</h2>
			<p>Sameiet Lindehaugen skal bygges i et populært boligområde på Nordås. Prosjektet består av fem leiligheter hvorav en av leilighetene dekker hele toppetasjen.</p>
			<p>Leilighetene er romslige og de får alle en god planløsning. Standarden er høy og leilighetene blir blant annet levert med enstavs eikeparkett. Kjøkken leveres i kvalitet som HTH modell KW-Straight hvitlakkert. Hvitevarer til innbygging fra Siemens. Som kjøper har du gode muligheter til å påvirke innvendige kvaliteter og løsninger.</p>
			<p>Alle fem leilighetene har to garasjeplasser hver. Dette er inkludert gjesteparkering. Bygningen vil få en lys og romslig underetasje med garasjeplasser og boder. Herfra vil det være heis til boligetasjene.</p>
			<p>
				<a href="#" class="btn">Prospekt lav opplosning</a>
				<a href="#" class="btn">Prospekt hoy opplosning</a>
				<a href="#" class="btn">Kjopsdokument</a>
			</p>
		</div>
	</section>

	<section id="home__omradet" class="home__contentblock is_light">
		<div class="wrapper wrapper--narrow">
			<h2>Området</h2>
			<p>Eiendommen ligger sentralt til i et populært boligområde på Nordås. Gangavstand til Kilden senter og bussholdeplass. I nærområdet er det flere turstier og flotte bademuligheter i Nordåsvannet i blant annet Breiviken. I nærheten er det også marina med båtplasser og Bergens roklubb.</p>
			<p>Det er kort vei til Lagunen Storsenter med et bredt servicetilbud og bybanestopp. Ellers er det en kort kjøretur til næringsområdene på Kokstad, Sandsli og Flesland. Det tar ca 15 minutter å kjøre til Bergen sentrum.</p>
			<p>Kort avstand til Søråshøgda barneskole, Rå ungdomsskole og Nordahl Grieg vidergående. Det er også flere barnehager i nærområdet.</p>
		</div>
	</section>

	<section id="home__mapblock" class="home__mapblock is_light">
		<div class="wrapper wrapper--fullwidth map-wrapper">
			<div id="map-canvas"></div>
		</div>
	</section>

	





</main><!-- /.main -->