<?php
    /**
     * Modified from Wordpress Core
     * https://github.com/WordPress/WordPress/blob/master/wp-includes/class-walker-nav-menu.php
     * 
     * Written for Bootstrap 4.0.0-alpha.6
     */
   
    class Main_Nav_Walker extends Walker_Nav_Menu {
    	public function start_lvl( &$output, $depth = 0, $args = array() ) {
    		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
    			$t = '';
    			$n = '';
    		} else {
    			$t = "\t";
    			$n = "\n";
    		}
    		$indent = str_repeat( $t, $depth );
    		$current_id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
    		$output .= "{$n}{$indent}<div class=\"dropdown-menu\">{$n}";
    	}
        
    	public function end_lvl( &$output, $depth = 0, $args = array() ) {
    		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
    			$t = '';
    			$n = '';
    		} else {
    			$t = "\t";
    			$n = "\n";
    		}
    		$indent = str_repeat( $t, $depth );
    		$output .= "$indent</div>{$n}";
    	}
        
    	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
    			$t = '';
    			$n = '';
    		} else {
    			$t = "\t";
    			$n = "\n";
    		}
    		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';
    		
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            
            // Filters the arguments for a single nav menu item.
    		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
            
            // Filters the CSS class(es) applied to a menu item's list item element.
    		$wp_classes = apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth );
    		
    		$atts = array();
            if( $depth == 0 ) { 
                // List item
                $list_item_classes[] = "nav-item";
        		if ( in_array("current-menu-item", $wp_classes) ) {
        		    $list_item_classes[] = "active";
        		}
        		if ( in_array("menu-item-has-children", $wp_classes) ) {
        		    $list_item_classes[] = "dropdown";
        		}
        		$class_names = join( ' ', $list_item_classes );
        		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
                
                $output .= $indent . '<li' . $class_names . '>';
                
                // List item - anchor
                $atts['class'] = "nav-link";
            }
            if( $depth==1 ) {
                // Sub-menu item anchor
                if ( in_array("current_page_item", $wp_classes) ) {
        		    $atts['class'] = "active dropdown-item";
        		    $atts['href'] = "#";
        		}
                else {
                    $atts['class'] = "dropdown-item";
                }
    		}
    		
            
            // Filters the HTML attributes applied to a menu item's anchor element.
    		$atts['href'] = !empty( $item->url ) && empty($atts['href']) ? $item->url : $atts['href'];
    		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
            if ( in_array("menu-item-has-children", $wp_classes) ) {
    		    $atts['class'] = "nav-link dropdown-toggle";
    		    $atts['data-toggle'] = "dropdown";
    		    $atts['aria-haspopup'] = "true";
    		    $atts['aria-expanded'] = "false";
    		}
    		
    		$attributes = '';
    		foreach ( $atts as $attr => $value ) {
    			if ( ! empty( $value ) ) {
    				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
    				$attributes .= ' ' . $attr . '="' . $value . '"';
    			}
    		}
    
    		/** This filter is documented in wp-includes/post-template.php */
    		$title = apply_filters( 'the_title', $item->title, $item->ID );
    
    		// Filters a menu item's title.
    		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
    
    		$item_output = $args->before;
    		$item_output .= '<a'. $attributes .'>';
    		$item_output .= $args->link_before . $title . $args->link_after;
    		$item_output .= '</a>';
    		$item_output .= $args->after;
    
    		// Filters a menu item's starting output.
    		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    	}
    
    	// Ends the element output, if needed.
    	public function end_el( &$output, $item, $depth = 0, $args = array() ) {
    		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
    			$t = '';
    			$n = '';
    		} else {
    			$t = "\t";
    			$n = "\n";
    		}
    		
    		if($depth==0) {
                $output .= "</li>{$n}";
            }
    		
    	}
    }
?>
