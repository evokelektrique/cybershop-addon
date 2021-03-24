<?php
class CybershopNavWalker extends Walker_Nav_Menu {

	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "<div class='navbar-dropdown is-boxed'>";
	}

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		$liClasses = 'navbar-item '.$item->title;


		$hasChildren = $args->walker->has_children;
		$liClasses .= $hasChildren? " has-dropdown is-hoverable": "";
		

		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		if ( '_blank' === $item->target && empty( $item->xfn ) ) {
			$atts['rel'] = 'noopener noreferrer';
		} else {
			$atts['rel'] = $item->xfn;
		}
		$atts['href']         = ! empty( $item->url ) ? $item->url : '';
		$atts['aria-current'] = $item->current ? 'page' : '';

		$carbonshop_nav_menu_item_icon = carbon_get_nav_menu_item_meta($item->ID, 'cybershop_nav_icon');
		$cybershop_nav_color = carbon_get_nav_menu_item_meta($item->ID, 'cybershop_nav_color');
		$cybershop_nav_color = carbon_get_nav_menu_item_meta($item->ID, 'cybershop_nav_color');
		$atts['style'] = !empty($cybershop_nav_color) ? "color: $cybershop_nav_color;" : "";

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
				$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		if($hasChildren){
			$output .= "<div class='".$liClasses."'>";
			$output .= "\n<a class='navbar-link'".$attributes.">";
			if(!empty($carbonshop_nav_menu_item_icon)) {
				$output .= "<i class='ml-2 ".$carbonshop_nav_menu_item_icon['class']."'>";
				$output .= "</i>";
			}
			$output .= $item->title;
			$output .= "</a>";
		}
		else {
			$output .= "<a class='".$liClasses."' ".$attributes."'>";
			if(!empty($carbonshop_nav_menu_item_icon)) {
				$output .= "<i class='ml-2 ".$carbonshop_nav_menu_item_icon['class']."'>";
				$output .= "</i>";
			}
			$output .= $item->title;
		}

        // Adds has_children class to the item so end_el can determine if the current element has children
		if ( $hasChildren ) {
			$item->classes[] = 'has_children';
		}
	}

	public function end_el(&$output, $item, $depth = 0, $args = array(), $id = 0 ){

		if(in_array("has_children", $item->classes)) {

			$output .= "</div>";
		}
		$output .= "</a>";
	}

	public function end_lvl (&$output, $depth = 0, $args = array()) {

		$output .= "</div>";
	}
}
