<?php

function with_default( $default, $key, $array ) {
  return array_key_exists( $key, $array ) && ! empty( $array[$key] ) ? $array[$key] : $default;
}

function get_main_category( $id, $tax ) {
  $categories = get_the_terms( $id, $tax );
  $result = '';
  if ( !empty( $categories ) ) {
    foreach ( $categories as $category ) {
      if ( 'parent-parties' !== $category->slug ) {
        $result = $category->name;
        break;
      }
    }
  }
  return $result;
}

function no_items( $name = 'items' ) {
  return sprintf( 'There were no %s found', $name );
}

function replace_space( $str ) {
  return str_replace( '-', ' ', $str );
}

function get_page_color() {
  if ( is_front_page() || is_home() || is_page() || is_category( 'community' ) ) :
    return '#16a9a9';
  elseif ( is_category( 'education' ) || has_category( 'parent-parties' ) ) :
    return '#f9a02d';
  elseif ( is_category( 'family' ) ) :
    return '#ed3e37';
  else :
    return '#ffffff';
  endif;
}