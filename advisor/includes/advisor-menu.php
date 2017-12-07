<?php
class Advisor_walker_nav_menu extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) {

		$indent = str_repeat( "\t", $depth );
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output	   .= "\n$indent<ul class=\"dropdown-menu$submenu \">\n";

	}
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {

        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

				$caret_right = '';

        if ( $item->menu_item_parent && $item->menu_item_parent > 0 && $args->has_children ) {

					 $classes[] = 'dropdown-submenu';

					 $caret_right = ' <i class="fa fa-caret-right"></i>';

        }
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );

				if ( $args->has_children && $item->menu_item_parent == 0 ) {

					$class_names .= ' dropdown';

				}

				if( in_array( 'current-menu-item', $classes ) && in_array( 'current_page_item', $classes ) )
    		{

    		$class_names .= ' active';

  			}
				$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';


        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
				$caret_right2 = ( $args->has_children && 0 === $depth ) ? ' <i class="fa fa-caret-down"></i>' : '';
       //	$item_output  .= $caret_right ;
        $item_output .= '</a>'.$caret_right.$caret_right2;
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );

    }
	function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {

        if ( !$element ) {
            return;
        }

        $id_field = $this->db_fields['id'];

        //display this element
        if ( is_object( $args[0] ) ) {
           $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        }

        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}


//Walker Class for menu five
class Advisor_walker_nav_menu_five extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) {

		$indent 	= str_repeat( "\t", $depth );
		$submenu  = ($depth > 0) ? ' sub-menu' : '';
		$output	 .= "\n$indent<ul class=\"ad-dropdownmenu$submenu \">\n";

	}
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {

        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

				$caret_right = '';

        if ( $item->menu_item_parent && $item->menu_item_parent > 0 && $args->has_children ) {

					 $classes[] = 'ad-hasdropdown';

					  $caret_right = '<i class="fa fa-caret-right"></i>';

        }
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );

				if ( $args->has_children && $item->menu_item_parent == 0 ) {

					$class_names .= ' ad-hasdropdown';

				}
				if( in_array( 'current-menu-item', $classes ) && in_array( 'current_page_item', $classes ) )
				{

					$class_names .= ' ad-active ';

				}

				$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';


        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
				$caret_right2 = ( $args->has_children && 0 === $depth ) ? '<i class="fa fa-caret-down"></i>' : '';
       //	$item_output  .= $caret_right ;
        $item_output .= '</a>'.$caret_right.$caret_right2;
        $item_output .= $args->after;
				// $item_output .= ( $args->has_children && 0 === $depth ) ? '' : '';
       // 	$item_output  .= $caret_right ;
        // $item_output .= '</a>';
        // $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );

    }
	function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {

        if ( !$element ) {
            return;
        }

        $id_field = $this->db_fields['id'];

        //display this element
        if ( is_object( $args[0] ) ) {
           $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        }

        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}




//Walker Class for menu seven
class Advisor_walker_nav_menu_seven extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) {

		$indent = str_repeat( "\t", $depth );
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output	   .= "\n$indent<ul class=\"dropdown-menu$submenu animated fadeOutUp \">\n";

	}
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {

        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

				$caret_right = '';

        if ( $item->menu_item_parent && $item->menu_item_parent > 0 && $args->has_children ) {

					 $classes[] = 'dropdown-submenu';

					  $caret_right = ' <i class="fa fa-caret-right"></i>';

        }
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );

				if ( $depth == 0 ) {

					$class_names .= ' cool-link';

				}


				if ( $args->has_children && $item->menu_item_parent == 0 ) {

					$class_names .= ' dropdown on';

				}

				if(
					( in_array( 'current-menu-item', $classes )
					&& in_array( 'current_page_item', $classes )
					)
					 ||
					(
					 in_array( 'menu-item-has-children', $classes )
					&& in_array( 'current-menu-parent', $classes )
					)
					 )
	    		{

	    		$class_names .= ' active';

	  			}


				$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';


        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
				$caret_right2 = ( $args->has_children && 0 === $depth ) ? ' <i class="fa fa-caret-down"></i>' : '';
       //	$item_output  .= $caret_right ;
        $item_output .= '</a>'.$caret_right.$caret_right2;
        $item_output .= $args->after;
				// $item_output .= ( $args->has_children && 0 === $depth ) ? ' <i class="fa fa-angle-down"></i>' : '';
       // 	$item_output  .= $caret_right ;
        // $item_output .= '</a>';
        // $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );

    }
	function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {

        if ( !$element ) {
            return;
        }

        $id_field = $this->db_fields['id'];

        //display this element
        if ( is_object( $args[0] ) ) {
           $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        }

        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}



	// Walker Class for menu eight
	class Advisor_walker_nav_menu_eight extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) {

		$indent = str_repeat( "\t", $depth );
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output	   .= "\n$indent<ul class=\"dropdown-menu$submenu animated fadeOutUp \">\n";

	}
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {

        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

				$caret_right = '';

        if ( $item->menu_item_parent && $item->menu_item_parent > 0 && $args->has_children ) {

					 $classes[] = 'dropdown-submenu';

					$caret_right = ' <i class="fa fa-caret-right"></i>';

        }
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );

				if ( $depth == 0 ) {

					$class_names .= ' cool-link_3';

				}


				if ( $args->has_children && $item->menu_item_parent == 0 ) {

					$class_names .= ' dropdown on';

				}

				if(
					( in_array( 'current-menu-item', $classes )
					&& in_array( 'current_page_item', $classes )
					)
					 ||
					(
					 in_array( 'menu-item-has-children', $classes )
					&& in_array( 'current-menu-parent', $classes )
					)
					 )
	    		{

	    		$class_names .= ' active';

	  			}


				$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';


        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
				$caret_right2 = ( $args->has_children && 0 === $depth ) ? ' <i class="fa fa-caret-down"></i>' : '';
       //	$item_output  .= $caret_right ;
        $item_output .= '</a>'.$caret_right.$caret_right2;
        $item_output .= $args->after;
				// $item_output .= ( $args->has_children && 0 === $depth ) ? ' <i class="fa fa-angle-down"></i>' : '';
       // 	$item_output  .= $caret_right ;
        // $item_output .= '</a>';
        // $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );

    }
	function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {

        if ( !$element ) {
            return;
        }

        $id_field = $this->db_fields['id'];

        //display this element
        if ( is_object( $args[0] ) ) {
           $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        }

        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}

?>
