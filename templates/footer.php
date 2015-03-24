<section class="staff is_dark">
	<div class="wrapper wrapper--wide">
		<div class="garanti">
			<a href="http://www.garanti.no/" target="_blank" class="garanti__logo">
				<img src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/logo_garanti.png" alt="GARANTI">
			</a>
			<p class="garanti__addr">
				Garanti Eiendomsmegling<br>
				Strandgaten 196, 5004 Bergen<br>
				Telefon <a href="tel:55309696">55 30 96 96</a>
			</p>
		</div>
		<div class="staff__members">
			<div class="member">
				<img class="member__portre" src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/staff/Elin_Stormo.jpg" alt="Elin Stormo">
				<div class="member__name">Elin Stormo</div>
				<div class="member__phone">Tlf: <a href="tel:95003934">950 03 934</a></div>
			</div>
			<div class="member">
				<img class="member__portre" src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/staff/Annette_Kleven.jpg" alt="Annette Kleven">
				<div class="member__name">Annette Kleven</div>
				<div class="member__phone">Tlf: <a href="tel:98678560">986 78 560</a></div>
			</div>
			<div class="member">
				<img class="member__portre" src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/staff/Eli_Lutcherath.jpg" alt="Eli Lütcherath">
				<div class="member__name">Eli Lütcherath</div>
				<div class="member__phone">Tlf: <a href="tel:90048910">900 48 910</a></div>
			</div>
		</div>
	</div>
</section>
<footer class="content-info is_dark" role="contentinfo">
  <div class="wrapper wrapper--wide">
  	<a class="footer--logo" href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
  		<img src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/logo_white.png" alt="<?php bloginfo('name'); ?>">
  	</a>
    <br>
    <a href="#top" class="footer--tothetop"><i class="ion ion-chevron-up"></i></a>
    <p class="footer--copy"><strong>&copy; 2015 Hesjaholtet Park</strong> rettigheter forbeholdt &middot; Nettside og visuelle elementer er produsert av <a href="http://brickvisual.no/" target="_blank">Brick Visual AS.</a></p>
    <?php // dynamic_sidebar('sidebar-footer'); ?>
  </div>
</footer>