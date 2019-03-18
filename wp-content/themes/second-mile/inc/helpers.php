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

function secondmile_page_attributes() {
  $theme = '';
  $style = '';

  if ( has_term( 'dark', 'background' ) ) :
    $theme = 'white';
  elseif ( is_front_page() || is_home() || is_page() || is_category( 'community' ) || has_category( 'community' ) ) :
    $theme = 'green';
  elseif ( is_category( 'education' ) || has_category( 'education' ) ) :
    $theme = 'yellow';
  elseif ( is_category( 'family' ) || has_category( 'family' ) ) :
    $theme = 'red';
  endif;

  if ( has_term( 'dark', 'background' ) || is_singular( 'post' ) ) :
    $style = 'background';
  elseif ( is_front_page() || is_home() || is_page() || is_category( 'parent-parties' ) ) :
    $style = 'basic';
  elseif ( is_category() ) :
    $style = 'border';
  endif;

  return 'data-theme="' . $theme . '" data-style="' . $style . '"';
}

function secondmile_get_content_by_id ( $id = 0 ) {
  $the_post = get_post($id);
  $content = $the_post->post_content;
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}