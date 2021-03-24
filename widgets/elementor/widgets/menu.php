<?php

namespace CybershopElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if(!defined('ABSPATH')) exit; // No Direct Access

class CybershopMenu extends Widget_Base {

	// Slug
	public function get_name() {
		return 'cybershop-menu';
	}

	// Title
	public function get_title() {
		return __('Menu', 'cybershop');
	}

	// Icon
	public function get_icon() {
		return 'fab fa-amilia fa-spin';
	}

	// Category
	public function get_categories() {
		return ['cybershop'];
	}

	// Controls/Options Registration
	public function _register_controls() {
		// Start Controls
		$this->start_controls_section(
			'section_content', [
				'label' => __('Content', 'elementor')
			]
		);

		// Controls
		$this->add_control(
			'menu', [
				'label'   => __( 'Menu', 'cybershop' ),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => false,
				'options' => \Helper::get_wordpress_menus(),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'navbar_link_typography',
				'label' => __( 'تایپوگرافی آیتم ها', 'cybershop' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .navbar-item.has-dropdown > .navbar-link',
				'selector' => '{{WRAPPER}} .navbar-menu .navbar-item',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'navbar_item_typography',
				'label' => __( 'تایپوگرافی آیتم های منو کشویی', 'cybershop' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .navbar-dropdown a.navbar-item',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'navbar_link_typography',
				'label' => __( 'سایه آیتم ها', 'cybershop' ),
				'selector' => '{{WRAPPER}} a.navbar-link',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'navbar_item_typography',
				'label' => __( 'سایه آیتم های منوی کشویی', 'cybershop' ),
				'selector' => '{{WRAPPER}} a.navbar-item',
			]
		);

		// End Controls
		$this->end_controls_section();	

		// ========================================================
		// Start Controls
		$this->start_controls_section(
			'section_options', [
				'label' => __('تنظیمات', 'cybershop')
			]
		);

		$this->add_control(
			'is_left',
			[
				'label' => __( 'سمت چپ', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'نمایش', 'cybershop' ),
				'label_off' => __( 'پنهان', 'cybershop' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);		
		$this->add_control(
			'is_boxed',
			[
				'label' => __( 'حالت جعبه ای', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'نمایش', 'cybershop' ),
				'label_off' => __( 'پنهان', 'cybershop' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);		
		$this->add_control(
			'is_fixed_top',
			[
				'label' => __( 'حالت چسبیده به بالا', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'فعال', 'cybershop' ),
				'label_off' => __( 'غیر فعال', 'cybershop' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'is_fixed_bottom',
			[
				'label' => __( 'حالت چسبیده به پایین', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'فعال', 'cybershop' ),
				'label_off' => __( 'غیر فعال', 'cybershop' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);		
		$this->add_control(
			'has_dropdown_up',
			[
				'label' => __( 'منوی کشویی به سمت بالا', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'نمایش', 'cybershop' ),
				'label_off' => __( 'پنهان', 'cybershop' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);			
		$this->add_control(
			'is_arrowless',
			[
				'label' => __( 'نمایش کمانک ها', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'نمایش', 'cybershop' ),
				'label_off' => __( 'پنهان', 'cybershop' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);		
		$this->add_control(
			'show_responsive',
			[
				'label' => __( 'نمایش آیتم ها در ریسپانسیو', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'نمایش', 'cybershop' ),
				'label_off' => __( 'پنهان', 'cybershop' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);		

		// End Controls
		$this->end_controls_section();	

		// ========================================================

		// Start Controls
		$this->start_controls_section(
			'section_brand', [
				'label' => __('برند', 'cybershop')
			]
		);
		$this->add_control(
			'show_brand',
			[
				'label' => __( 'نمایش برند', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'نمایش', 'cybershop' ),
				'label_off' => __( 'پنهان', 'cybershop' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'brand_image',
			[
				'label' => __( 'Choose Image', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
		$this->end_controls_section();	
		// ========================================================

		// Colors Section
		$this->start_controls_section(
			'section_colors', [
				'label' => __('رنگ', 'cybershop')
			]
		);

		// Navbar color
		$this->add_control(
			'navbar_background_color',
			[
				'label' => __( 'پس زمینه نوبار', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .navbar' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .navbar-menu' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .navbar-dropdown' => 'border-color: {{VALUE}};',
				],
			]
		);

		// Navbar dropdown color
		$this->add_control(
			'navbar_dropdown_background_color',
			[
				'label' => __( 'پس زمینه نوبار کشویی', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .navbar-dropdown' => 'background-color: {{VALUE}};',
				],
			]
		);


		// Navbar burger color
		$this->add_control(
			'navbar_burger_color',
			[
				'label' => __( 'برگر', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .navbar a.navbar-burger' => 'color: {{VALUE}};',
				],
			]
		);

		// Navbar burger hover color
		$this->add_control(
			'navbar_burger_hover_color',
			[
				'label' => __( 'برگر(هاور)', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .navbar a.navbar-burger:hover' => 'color: {{VALUE}};',
				],
			]
		);

		// Navbar burger background color
		$this->add_control(
			'navbar_burger_background_color',
			[
				'label' => __( 'پس زمینه برگر', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .navbar a.navbar-burger' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		// Navbar burger background hover color
		$this->add_control(
			'navbar_burger_background_hover_color',
			[
				'label' => __( 'پس زمینه برگر (هاور)', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .navbar a.navbar-burger:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		// Navbar Items color
		$this->add_control(
			'navbar_items_color',
			[
				'label' => __( 'متن آیتم ها', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .navbar a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .navbar-item.has-dropdown:hover .navbar-link'=> 'color: {{VALUE}};',
					'{{WRAPPER}} .navbar-link:not(.is-arrowless)::after'=> 'border-color: {{VALUE}};',
				],
			]
		);

		// Navbar Items hover color
		$this->add_control(
			'navbar_items_hover_color',
			[
				'label' => __( 'متن آیتم ها (هاور)', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .navbar a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		// Navbar Items hover background color
		$this->add_control(
			'navbar_items_hover_background_color',
			[
				'label' => __( 'پس زمینه آیتم ها (هاور)', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} a.navbar-item:focus' 		=> 'background-color: {{VALUE}};',
					'{{WRAPPER}} a.navbar-item:hover' 		=> 'background-color: {{VALUE}};',
					'{{WRAPPER}} a.navbar-item.is-active' 	=> 'background-color: {{VALUE}};',
					'{{WRAPPER}} .navbar-link:focus' 	=> 'background-color: {{VALUE}};',
					'{{WRAPPER}} .navbar-link:hover' 	=> 'background-color: {{VALUE}};',
					'{{WRAPPER}} .navbar-link.is-active'=> 'background-color: {{VALUE}};',
					'{{WRAPPER}} .navbar-item.has-dropdown:hover .navbar-link'=> 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();





	}

	// PHP-RENDER
	public function render() {

		// Get Settings
		$settings  = $this->get_settings_for_display();
		$menu = $settings['menu'];

		$menu_items = wp_get_nav_menu_items($menu);
		$count = 0;
		$submenu = false;
		?>
		<nav class="navbar <?= ($settings['is_fixed_top'] == 'yes' ? 'is-fixed-top' : '') ?> <?= ($settings['is_fixed_bottom'] == 'yes' ? 'is-fixed-bottom' : '') ?>">
			<div class="navbar-brand">
			<?php if($settings['show_brand'] === 'yes'): ?>
			  <a class="navbar-item" href="/">
			    <img src="<?= $settings['brand_image']['url'] ?>" width="112" height="28">
			  </a>
			<?php endif; ?>
			<?php if($settings['show_responsive'] !== 'yes'): ?>
			  <a role="button" data-target="element-<?=\Elementor\Controls_Stack::get_id()?>" class="navbar-burger burger" aria-label="menu" aria-expanded="false">
			    <span aria-hidden="true"></span>
			    <span aria-hidden="true"></span>
			    <span aria-hidden="true"></span>
			  </a>
			<?php endif; ?>
			</div>
			<div id="element-<?=\Elementor\Controls_Stack::get_id()?>" class="navbar-menu <?= ($settings['show_responsive'] == 'yes' ? 'is-active' : '') ?>">
				<div class="navbar-<?= $settings['is_left'] == 'yes' ? 'end' : 'start' ?>">
<?php
$menu_list = '';
foreach( $menu_items as $menu_item ) {

    if( $menu_item->menu_item_parent == 0 ) {
         
        $parent = $menu_item->ID;
		$menu_array = array();

        foreach( $menu_items as $submenu ) {
            if( $submenu->menu_item_parent == $parent ) {
                $bool = true;
                array_push($menu_array, '<a style="color:'.(!empty(carbon_get_nav_menu_item_meta($submenu->ID, 'cybershop_nav_color')) ? carbon_get_nav_menu_item_meta($submenu->ID, 'cybershop_nav_color') : "" ).';" class="navbar-item" href="' . $submenu->url . '">' 
			. (!empty(carbon_get_nav_menu_item_meta($submenu->ID, 'cybershop_nav_icon')) ? "<i class='ml-2 ".carbon_get_nav_menu_item_meta($submenu->ID, 'cybershop_nav_icon')['class']."'></i>" : "")  
			. $submenu->title
			 . '</a>'. "\n");
            }
        }
        if( isset($bool) && $bool == true && count( $menu_array ) > 0 ) {

            $menu_list .= '<div class="navbar-item has-dropdown is-hoverable ' . ($settings["has_dropdown_up"] == "yes" ? "has-dropdown-up" : "") . '">' ."\n";
            $menu_list .= '<a style="color:'.(!empty(carbon_get_nav_menu_item_meta($menu_item->ID, 'cybershop_nav_color')) ? carbon_get_nav_menu_item_meta($menu_item->ID, 'cybershop_nav_color') : "" ).';" class="navbar-link ' . ($settings["is_arrowless"] == "yes" ? "" : "is-arrowless") . '" href="'. $menu_item->url .'">' 
			. (!empty(carbon_get_nav_menu_item_meta($menu_item->ID, 'cybershop_nav_icon')) ? "<i class='ml-2 ".carbon_get_nav_menu_item_meta($menu_item->ID, 'cybershop_nav_icon')['class']."'></i>" : "")  
			. $menu_item->title
			.'</a>'."\n";
             
            $menu_list .= '<div class="navbar-dropdown ' . ($settings["is_boxed"] == "yes" ? "is-boxed" : "") . '">' ."\n";
            $menu_list .= implode( "\n", $menu_array );
            $menu_list .= '</div>' ."\n";
            $menu_list .= '</div>' ."\n";
             
        } else {

            $menu_list .= '<a class="navbar-item" href="'. $menu_item->url .'">' 
			. (!empty(carbon_get_nav_menu_item_meta($menu_item->ID, 'cybershop_nav_icon')) ? "<i class='ml-2 ".carbon_get_nav_menu_item_meta($menu_item->ID, 'cybershop_nav_icon')['class']."'></i>" : "")  
            . $menu_item->title .'</a>'."\n";
        }
         
    }
     
    // $menu_list .= '</div>' ."\n";
}

echo $menu_list;
?>									


				</div>
			</div>
		</nav>
		<?php
	}
}
