<?php

function secondmile_body_classes( $classes ) {

  if ( is_page( 'who-we-are' ) ) :
    $classes[] = 'page--who-we-are';
  endif;
  
  return $classes;
  
}

add_filter( 'body_class','secondmile_body_classes' );
