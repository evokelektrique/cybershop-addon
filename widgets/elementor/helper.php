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

	public static function count_childrens($item, &$count) {
		if(property_exists($item, 'child')) {
			$count++;
			$children = $item->child;
			foreach($children as $child) {
				self::count_childrens($child, $count);
			}
		}
		return $count;
	}

	// Mega Menu 1 - (Desktop)
	public static function create_mega_menu_1($item, $options = []) {
		$link 	= $item->url;
		$title 	= $item->title;
		$id 	= $item->ID;

		// Get CarbonFields Options
		$link_color = carbon_get_nav_menu_item_meta($item->ID, 'cybershop_nav_color');
		$link_icon 	= carbon_get_nav_menu_item_meta($item->ID, 'cybershop_nav_icon');
		$link_image = carbon_get_nav_menu_item_meta($item->ID, 'cybershop_nav_image');
		$icon_direction = !empty($options['icon_direction']) ? $options['icon_direction'] : null;

		if(property_exists($item, 'child')) {
			$children = $item->child;
			?>
			<li class="menu-has-children">
				<a 
				style="color: <?= $link_color ?>;"
				id="cybershop-mega-menu-item-<?= $id ?>" 
				class="<?= $icon_direction ?>" 
				href="<?= $link ?>"
				>
					<?php if(!empty($link_icon['class'])): ?>
					<span class="icon">
						<i class="<?= $link_icon['class'] ?> "></i>
					</span>
					<?php endif; ?>
					<?= $title ?>
				</a>

				<ul 
				class="" 
				style="background-image: url(<?= $link_image ?>);"
				>
					<?php 
					foreach($children as $child) {
						self::create_mega_menu_1($child);
					}
					?>
				</ul>
			</li>
			<?php
		} else {
			?>
			<li>
				<a 
				style="color: <?= $link_color ?>;"
				id="cybershop-mega-menu-item-<?= $id ?>" 
				class="<?= $icon_direction ?>" 
				href="<?= $link ?>"
				>
					<?php if(!empty($link_icon['class'])): ?>
					<span class="icon">
						<i class="<?= $link_icon['class'] ?> "></i>
					</span>
					<?php endif; ?>
					<?= $title ?>
				</a>
			</li>
			<?php
		}
	}

	// Mobile Menu 1 - (Tablet/Mobile)
	public static function create_mobile_menu_1($item, $options = []) {
		$link 	= $item->url;
		$title 	= $item->title;
		$id 	= $item->ID;

		// Get CarbonFields Options
		$link_color = carbon_get_nav_menu_item_meta($item->ID, 'cybershop_nav_color');
		$link_icon 	= carbon_get_nav_menu_item_meta($item->ID, 'cybershop_nav_icon');
		$link_image = carbon_get_nav_menu_item_meta($item->ID, 'cybershop_nav_image');
		$icon_direction = !empty($options['icon_direction']) ? $options['icon_direction'] : null;

		if(property_exists($item, 'child')) {
			$children = $item->child;
			?>
			<li class="nav-item nav-expand">
				<a 
				style="color: <?= $link_color ?>;"
				onclick="event.preventDefault()" 
				class="nav-link nav-expand-link"
				href="<?= $link ?>"
				>
					<?php if(!empty($link_icon['class'])): ?>
					<span class="icon">
						<i class="<?= $link_icon['class'] ?> "></i>
					</span>
					<?php endif; ?>
					<?= $title ?>
				</a>

				<ul 
				class="nav-expand-content" 
				style="background-image: url(<?= $link_image ?>);"
				>
					<?php 
					foreach($children as $child) {
						self::create_mobile_menu_1($child);
					}
					?>
				</ul>
			</li>
			<?php
		} else {
			?>
			<li class="nav-item">
				<a 
				style="color: <?= $link_color ?>;"
				class="nav-link"
				href="<?= $link ?>"
				>
					<?php if(!empty($link_icon['class'])): ?>
					<span class="icon">
						<i class="<?= $link_icon['class'] ?> "></i>
					</span>
					<?php endif; ?>
					<?= $title ?>
				</a>
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
