<?php

/**
 * Register a slide post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function jbv_slider_init() {
	$labels = array(
		'name'               => _x( 'Slides', 'roots' ),
		'singular_name'      => _x( 'Slide', 'roots' ),
		'menu_name'          => _x( 'Slider', 'roots' ),
		'name_admin_bar'     => _x( 'Slide', 'roots' ),
    'add_new' => 'Add New Slide',
    'add_new_item' => 'Add New Slide',
    'edit_item' => 'Edit Slide',
    'new_item' => 'New Slide',
    'all_items' => 'All Slides',
    'view_item' => 'View Slide',
    'search_items' => 'Search Slides',
    'not_found' =>  'No Slides found',
    'not_found_in_trash' => 'No Slides found in Trash', 
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'slide' ),
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'thumbnail', 'page-attributes'  )
	);

	register_post_type( 'slide', $args );
}

add_action( 'init', 'jbv_slider_init' );



/********* Custom Post Types for Apartment Management ****************/


/**
 * Apartment Definition
*/
function jbv_create_apartment() {
  $labels = array(
    'name' => 'Apartments',
    'singular_name' => 'Apartment',
    'add_new' => 'Add New Apartment',
    'add_new_item' => 'Add New Apartment',
    'edit_item' => 'Edit Apartment',
    'new_item' => 'New Apartment',
    'all_items' => 'All Apartments',
    'view_item' => 'View Apartment',
    'search_items' => 'Search Apartments',
    'not_found' =>  'No Apartments found',
    'not_found_in_trash' => 'No Apartments found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Apartments'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'apartments' ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes')
  ); 

  register_post_type( 'apartment', $args );
}
add_action( 'init', 'jbv_create_apartment' ); 

/********* END OF Custom Post Types for Apartment Management ****************/


/********* Custom MetaBoxes for Apartment Management ****************/

/**
 * Apartment Metaboxes
*/
add_filter( 'cmb_meta_boxes', 'jbv_apartment_meta' );
function jbv_apartment_meta( array $meta_boxes ) {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_meta_';

  $meta_boxes[] = array(
    'id'         => 'ameta',
    'title'      => 'Apartment details',
    'pages'      => array( 'apartment'), // Post type
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(

    array(
      'name' => __('State'),
      'id'   => $prefix . 'state',
      'type' => 'radio_inline',
      'options' => array(
          array('name' => 'Ledig', 'value' => 'fri',),
          array('name' => 'Solgt', 'value' => 'utsolgt',),
          array('name' => 'Reservert', 'value' => 'reserved',)
      )
    ),

    array(
      'name' => __('Floor'),
      'id'   => $prefix . 'floor',
      'type' => 'radio_inline',
      'options' => array(
          array('name' => 'EG', 'value' => 'EG',),
          array('name' => '1. OG', 'value' => '1. OG',),
          array('name' => '2. OG', 'value' => '2. OG',),
          array('name' => '3. OG', 'value' => '3. OG',),
          array('name' => '4. OG', 'value' => '4. OG',),
          array('name' => '5. OG', 'value' => '5. OG',),
          array('name' => '6. OG', 'value' => '6. OG',)
      )
    ),

    array(
        'name' => 'Område / BRA',
        'id'   => $prefix . 'omr',
        'type' => 'text_small',
    ),
    
    array(
        'name' => 'P-rom',
        'id'   => $prefix . 'prom',
        'type' => 'text_small',
    ),

    array(
        'name' => 'Soverom',
        'id'   => $prefix . 'soverom',
        'type' => 'text_small',
    ),

    array(
        'name' => 'Rom',
        'id'   => $prefix . 'rom',
        'type' => 'text_small',
    ),

    array(
        'name' => 'Balkong / Terasse',
        'id'   => $prefix . 'balkong',
        'type' => 'text_small',
    ),

    array(
        'name' => 'Pris',
        'id'   => $prefix . 'pris',
        'type' => 'text_small',
    ),

    array(
      'name' => 'Floor map',
      'desc' => 'Upload an image or enter an URL.',
      'id' => $prefix . 'floormap',
      'type' => 'file',
      'save_id' => true, // save ID using true
      'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
    ),

    array(
      'name' => 'Building schema',
      'desc' => 'Upload an image or enter an URL.',
      'id' => $prefix . 'schema',
      'type' => 'file',
      'save_id' => true, // save ID using true
      'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
    ),

    array(
      'name' => 'PDF to download',
      'desc' => 'Upload a PDF Document.',
      'id' => $prefix . 'pdf',
      'type' => 'file',
      'save_id' => true, 
      'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
    ),

    array(
        'name' => '3D view url',
        'desc' => 'Add 3D panorama url if exists',
        'id'   => $prefix . '3dpano',
        'type' => 'text',
    ),
    array(
        'name' => 'SVG Definition',
        'desc' => 'Experimental! Do not change it!',
        'id'   => $prefix . 'svgdata',
        'type' => 'textarea_small',
    ),
   
    ),
  );


  return $meta_boxes;
}

/********* End of Custom MetaBoxes for Apartment Management ****************/


/************* Custom Apartment Type Taxonomies for Apartment Management *********/

add_action( 'init', 'jbv_create_type_taxonomies', 0 );

function jbv_create_type_taxonomies() {
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x( 'Apartment Types', 'taxonomy general name' ),
    'singular_name'     => _x( 'Apartment Type', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Apartment Types' ),
    'all_items'         => __( 'All Apartment Types' ),
    'parent_item'       => __( 'Parent Apartment Type' ),
    'parent_item_colon' => __( 'Parent Apartment Type:' ),
    'edit_item'         => __( 'Edit Apartment Type' ),
    'update_item'       => __( 'Update Apartment Type' ),
    'add_new_item'      => __( 'Add New Apartment Type' ),
    'new_item_name'     => __( 'New Apartment Type Name' ),
    'menu_name'         => __( 'Apartment Types' ),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'apartment-type' ),
  );

  register_taxonomy( 'apartment-type', array( 'apartment' ), $args );
}

/********* END OF Custom Apartment Type Taxonomies for Apartment Management ****************/


/************* Custom Object Taxonomies for Apartment Management *********/

add_action( 'init', 'jbv_create_object_taxonomies', 0 );

function jbv_create_object_taxonomies() {
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x( 'Buildings', 'taxonomy general name' ),
    'singular_name'     => _x( 'Building', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Buildings' ),
    'all_items'         => __( 'All Buildings' ),
    'parent_item'       => __( 'Parent Building' ),
    'parent_item_colon' => __( 'Parent Building:' ),
    'edit_item'         => __( 'Edit Building' ),
    'update_item'       => __( 'Update Building' ),
    'add_new_item'      => __( 'Add New Building' ),
    'new_item_name'     => __( 'New Building Name' ),
    'menu_name'         => __( 'Buildings' ),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'building' ),
  );

  register_taxonomy( 'object', array( 'apartment' ), $args );
}

/********* END OF Custom Object Taxonomies for Apartment Management ****************/



/********* Custom Tax Meta for Object Taxonomy ****************/
require_once("TMC/Tax-meta-class.php");
if (is_admin()){
  $prefix = '_meta_';
  $config = array(
    'id' => 'ometa',          // meta box id, unique per meta box
    'title' => 'Additional details for building and floor',          // meta box title
    'pages' => array('object'),        // taxonomy name, accept categories, post_tag and custom taxonomies
    'context' => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'fields' => array(),            // list of meta fields (can be added by field arrays)
    'local_images' => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => '/wp-content/themes/hhp/lib/TMC'          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );
  $my_meta =  new Tax_Meta_Class($config);
  $my_meta->addText($prefix.'floors',array('name'=> __('Floors','roots')));
  $my_meta->addTextarea($prefix.'svgdata',array('name'=> __('SVG Data','roots')));
  $my_meta->addImage($prefix.'image',array('name'=> __('Image of this item ','roots')));
  //$my_meta->addWysiwyg($prefix.'content',array('name'=> __('Content editor ','tax-meta')));
  $my_meta->Finish();
}

/********* END OF Custom Tax Meta for Object Taxonomy ****************/


add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
function cmb_initialize_cmb_meta_boxes() {
  if ( ! class_exists( 'cmb_Meta_Box' ) )
    require_once 'CMB/init.php';

}



function jbv_tweak_object_query($wp_query) {
  if ( $wp_query->get('object')  &&  $wp_query->is_main_query() ){
    $wp_query->set('orderby', 'title');
    $wp_query->set('order', 'ASC');
    $wp_query->set('posts_per_page', -1);
  } 
}
add_action('pre_get_posts', 'jbv_tweak_object_query');




function wpse73190_gist_adjacent_post_sort( $sql ) {
  
  $pattern = 'post_date';
  $replacement = 'menu_order';
  return str_replace( $pattern, $replacement, $sql );

}

add_filter( 'get_next_post_sort', 'wpse73190_gist_adjacent_post_sort' );
add_filter( 'get_previous_post_sort', 'wpse73190_gist_adjacent_post_sort' );



function st_conv($state) {
  switch ($state) {
    case 'fri':
      return 'ledig';
      break;

    case 'utsolgt':
      return 'solgt';
      break;
    
    case 'reserved':
      return 'reservert';
      break;
    

    default:
      return $state;
      break;
  }
}
