<?php

/*-----------------------------------------------------------------------------
  Get featured image as url
-----------------------------------------------------------------------------*/
function featuredURL($size = 'full'){
  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $size );
  $url = $thumb['0'];
  echo $url;
}

/*-----------------------------------------------------------------------------
  Get featured image as url and output style property
-----------------------------------------------------------------------------*/
function featuredBG($size = 'full', $pos_x = 'center', $pos_y = 'center', $repeat = 'no-repeat'){
  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $size );
  $url = $thumb['0'];
  echo 'style="background: url('. $url .')'. $pos_x .' '. $pos_y .' ' . $repeat .'"';
}

/*-----------------------------------------------------------------------------
  Adds thumbnail support and additional thumbnail sizes
-----------------------------------------------------------------------------*/

if( function_exists('prelude_features') ){
  // Use add_image_size below to add additional thumbnail sizes
  add_image_size('testimonial-thumb', 240, 240, array('center', 'center'));
  add_image_size('standard-hero', 1440, 600, array('center', 'center'));
  add_image_size('profile-image', 680, 680, array('center', 'center'));
  add_image_size('case-study-slider', 1060, 605, array('center', 'center'));
  add_image_size('latest-case-study', 640, 440, array('center', 'center'));
  add_image_size('gallery-thumb', 235, 205, array('center', 'center'));
  add_image_size('latest-work', 1000, 480, array('center', 'center'));
}
