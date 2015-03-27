<header class="apartment-hero is_opaque">
  <div class="wrapper wrapper--fullwidth">
  </div>
</header>
<div class="wrapper wrapper--fullwidth wrapper-apartment ">
  <div class="page-header inverse">
    <?php previous_post_link('%link','<i class="ion ion-ios7-arrow-left"></i>'); ?>
    <h2><span>Finn Din Bolig</span> <?php the_title(); ?></h2>
    <?php next_post_link('%link','<i class="ion ion-ios7-arrow-right"></i>'); ?>
  </div>
  <div class="apartment-details is_light">
    <div class="apartment-details--left">
      <div class="apartment-details--left--inner">

          <figure class="apartment-schema">
            <?php $schemaimgsrc = wp_get_attachment_image_src( get_post_meta($post->ID, '_meta_schema_id', true), '480free');  ?>
            <a class="popup-zoom" href="<?php echo get_post_meta($post->ID, '_meta_schema', true); ?>">
              <img src="<?php echo $schemaimgsrc[0]; ?>" />
            </a>
          </figure>

          <figure class="apartment-2dfloormap">
            <?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'orig');  ?>
            <a class="popup-zoom" href="<?php echo $imgsrc[0]; ?>">
              <?php the_post_thumbnail('480free'); ?>
            </a>
          </figure>




      </div>
    </div>



    <div class="apartment-details--right">
      
      <div class="apartment-details--right--inner-white">
        <div class="holdit nohorizpadding">
        
        <figure class="apartment-3dfloormap">
          <?php $leftimgsrc = wp_get_attachment_image_src( get_post_meta($post->ID, '_meta_floormap_id', true), '640free');  ?>
          <a class="popup-zoom" href="<?php echo get_post_meta($post->ID, '_meta_floormap', true); ?>">
            <img src="<?php echo $leftimgsrc[0] ?>" />
          </a>
        </figure>




        </div>
      </div>


      <?php wp_reset_query(); ?>
      <div class="apartment-details--right--inner-red">
        <div class="holdit">

          <div class="apartment-facts">
          <?php if ( get_post_meta( $post->ID, '_meta_3dpano', true )) : ?>
<!--             <a class="popup-3d apartment-3dlink" href="<?php echo get_post_meta( $post->ID, '_meta_3dpano', true ); ?>">
              <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/360.png" alt="View 3D"><br>
             Klikk for å se 3D 
            </a> -->
          <?php endif; ?>
            <p class="data-item"><span>Leilighet Nr</span> <?php the_title(); ?></p>
            <p class="data-item"><span>Etasje</span> <?php echo get_post_meta( $post->ID, '_meta_floor', true ); ?></p>
            <p class="data-item"><span>BRA</span> <?php echo get_post_meta( $post->ID, '_meta_omr', true ); ?> m<sup>2</sup></p>
            <!-- <p class="data-item"><span>P-rom</span> <?php echo get_post_meta( $post->ID, '_meta_prom', true ); ?> m<sup>2</sup></p> -->
            <p class="data-item"><span>Rom</span> <?php echo get_post_meta( $post->ID, '_meta_rom', true ); ?></p>
            <!-- <p class="data-item"><span>Balkong</span> <?php echo get_post_meta( $post->ID, '_meta_balkong', true ); ?> m<sup>2</sup></p> -->
            <?php if (get_post_meta( $post->ID, '_meta_state', true )!=='utsolgt'): ?>
            <p class="price data-item"><span>Pris</span> <?php echo number_format(get_post_meta( $post->ID, '_meta_pris', true ), 0, ',', ' '); ?> NOK</p>
            <?php endif; ?>
            <p class="data-item"><span>Status</span> <?php echo st_conv(get_post_meta( $post->ID, '_meta_state', true )); ?></p>
          </div>

          <div class="apartment-discl">
            <?php the_content(); ?>
            <a class="btn btn-light" data-toggle="collapse" data-target="#contactblock">Meld din interesse</a>           <a class="btn" href="<?php echo get_post_meta( $post->ID, '_meta_pdf', true ); ?>">Last ned PDF <i class="ion ion-clipboard"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>