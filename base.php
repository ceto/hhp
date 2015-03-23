<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?> data-spy="scroll" data-target=".subnav">

  <!--[if lt IE 9]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>
  
  <?php include roots_template_path(); ?>

  <?php /* if (roots_display_sidebar()) : ?>
    <aside class="sidebar" role="complementary">
      <?php include roots_sidebar_path(); ?>
    </aside><!-- /.sidebar -->
  <?php endif; */ ?>

  <?php get_template_part('templates/contact','form'); ?>

  <?php get_template_part('templates/footer'); ?>

  <?php wp_footer(); ?>
  
  <?php if ( is_front_page() ) : ?>
    <!-- Master Slider -->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/vendor/masterslider/masterslider.min.js"></script>
    <script>

      var slider = new MasterSlider();
      slider.setup('masterslider' , {
        width:1920,    // slider standard width
        height:1024,   // slider standard height
        space:0,
        preload:3,
        autoplay:true,
        fullwidth:true,
        autoHeight:true,
        view:"fade"
        
        // more slider options goes here...
      });
      // adds Arrows navigation control to the slider.
      slider.control('arrows');
      slider.control('thumblist', { 
        autohide:false,
        inset:false,
        width:160,
        height:90,
        space:20

      });

    </script>

    <!-- Subnav with Tooltip -->

    <script>
      jQuery(document).ready(function() {
        $('.navbar-subnav a').tooltip({
          template:'<div class="tooltip tooltip--subnav" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>'
          //delay: { "show": 200, "hide": 100 },
        });
        // $('body').scrollspy({ target: '.subnav' })      
      });
    </script>
    <!-- Google MAps -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script>

      function initialize() {
        var mapOptions = {
          styles: [
            {
              "stylers": [
                { "saturation": -100 },
                { "gamma": 1.94 }
              ]
            }
          ],
          zoom: 12,
          mapTypeControl: true,
          mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
          },
          scrollwheel: false,
          // zoomControl: true,
          // zoomControlOptions: {
          //   style: google.maps.ZoomControlStyle.SMALL
          // },
          center: new google.maps.LatLng(62.756715, 7.274334)
        };
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        var image = '<?php echo get_stylesheet_directory_uri(); ?>/assets/img/flag.png';
        var myLatLng = new google.maps.LatLng(62.756715, 7.274334);
        var beachMarker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          icon: image
        });
      }

      google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  <?php endif; ?>


</body>
</html>
