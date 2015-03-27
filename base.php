<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?> data-spy="scroll" data-target=".navbar-collapse">

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
        preload:2,
        overPause:false,
        loop:true,
        autoplay:true,
        fullwidth:true,
        autoHeight:true,
        view:"fade",
        //grabCursor:true,
        //mouse:true,
        //swipe:false
        
        // more slider options goes here...
        
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
          center: new google.maps.LatLng(60.344615, 5.259905)
        };
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        var image = '<?php echo get_stylesheet_directory_uri(); ?>/assets/img/marker.png';
        var myLatLng = new google.maps.LatLng(60.344615, 5.259905);
        var beachMarker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          icon: image,
          animation: google.maps.Animation.DROP
        });
      }

      google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  <?php endif; ?>

  
</body>
</html>
