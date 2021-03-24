<?php
class Helper {

	// Get Woocommerce Categories
	public static function get_woocommerce_categories() {
	    $terms = get_terms( array(
	        'taxonomy' => 'product_cat',
	        'hide_empty' => true,
	    ));
	    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
	        foreach ( $terms as $term ) {
	            $options[ $term->slug ] = $term->name;
	        }
	        return $options;
	    }
	}

	// Get Woocommerce Categories Terms Only
	public static function get_woocommerce_categories_terms() {
	    $terms = get_terms( array(
	        'taxonomy' => 'product_cat',
	        'hide_empty' => true,
	    ));
	    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
			return $terms;
	    }
	    return null;
	}


	public static function get_wordpress_menus() {
		$menus = [];
		foreach(wp_get_nav_menus() as $menu) {
			$menus[$menu->term_id] = $menu->name;
		}
		return $menus;
		// return array_keys(get_nav_menu_locations());
	}

	public static function buildTree( array &$elements, $parentId = 0 ) {
		$branch = array();
		foreach ( $elements as &$element ) {
			if ( $element->menu_item_parent == $parentId ) {
				$children = self::buildTree( $elements, $element->ID );
				if ( $children ) 
					$element->child = $children;
				$element->has_children = 1;

				$branch[$element->ID] = $element;
				unset( $element );
			}
		}
		return $branch;
	}

	public static function create_menu($item) {
		$link = $item->url;
		$title = $item->title;
		$id = $item->ID;
		//var_dump(carbon_get_nav_menu_item_meta($item->ID, 'cybershop_nav_icon'));
		//exit;

		if(property_exists($item, 'child')) {
			$children = $item->child;
			?>
			<li class="menu-has-children">
				<a id="cybershop-mega-menu-item-<?= $id ?>" href="<?= $link ?>"><?= $title ?></a>
				<ul class="">
					<?php 
					foreach($children as $child) {
						self::create_menu($child);
					}
					?>
				</ul>
			</li>
			<?php
		} else {
			?>
			<li>
				<a id="cybershop-mega-menu-item-<?= $id ?>" href="<?= $link ?>"><?= $title ?></a>
			</li>
			<?php
		}
	}

	// Retrieves all desired local templates (default 'popup')
	public static function get_elementor_templates(string $type = 'popup') {
	    return array_filter(
		    \Elementor\Plugin::instance()->templates_manager->get_library_data([])['templates'], function($array) use($type) {
		        return $array['source'] === "local" && $array['type']  === $type;
		    }
		);
	}

}
