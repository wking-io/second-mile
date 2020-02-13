<?php

function update_contact_menu_item( $items, $args ) {

  if ( 'primary-menu' === $args->menu_id ) :
    // loop
    foreach( $items as &$item ) :

      // append icon
      if ( 'Contact' === $item->title ) :

        $title = $item->title;
        
        ob_start(); ?>
        
        <div>
          <span class="lg:hidden"><?php echo $title; ?></span>
          <svg class="contact-icon w-6 h-6 hidden lg:block lg:ml-auto" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="contact-icon__fill" d="M24 2.5C24 1.125 22.92 0 21.6 0H2.4C1.08 0 0 1.125 0 2.5V17.5C0 18.875 1.08 20 2.4 20H21.6C22.92 20 24 18.875 24 17.5V2.5ZM21.6 2.5L12 8.75L2.4 2.5H21.6ZM21.6 17.5H2.4V5L12 11.25L21.6 5V17.5Z"/>
          </svg>
        </div>

        <?php $item->title = ob_get_clean();
      endif;
    endforeach;
  endif;
	
	// return
	return $items;
	
}

add_filter('wp_nav_menu_objects', 'update_contact_menu_item', 10, 2);

class Primary_Menu extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0 , $args=array(), $id = 0 ) {

    $id = $item->ID;
		$title = $item->title;
    $permalink = $item->url;
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        
    $output .= '<li id="menu-item-' . esc_attr( $id ) . '" class="' . implode(" ", $classes) . '">';

		if ( $permalink && '#' != $permalink ) :
			$output .= '<a id="menu-item-' . esc_attr( $id ) . '-link" href="' . esc_attr( $permalink ) . '">';
		else :
      $output .= '<span>';
    endif;
		
		$output .= $title;

		if( $permalink && '#' != $permalink ) :
			$output .= '</a>';
		else :
			$output .= '</span>';
    endif;

		if ( 0 == $depth && in_array( 'menu-item-has-children', $classes ) ) :
			$output .= '<svg class="dropdown-icon" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path class="dropdown-icon__fill" fill-rule="evenodd" clip-rule="evenodd" d="M1.41421 4.24264L0 5.65685L5.65685 11.3137L11.3137 5.65685L9.89949 4.24264L5.65685 8.48528L1.41421 4.24264Z" /></svg>';
    endif;

	}

	function end_el(&$output, $item, $depth = 0 , $args=array(), $id = 0 ) {
			$output .= '</li>';
	}
}