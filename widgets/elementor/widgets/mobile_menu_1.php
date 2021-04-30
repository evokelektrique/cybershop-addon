<?php
namespace CybershopElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

if(!defined('ABSPATH')) exit; // No Direct Access

class CybershopMobileMenu1 extends Widget_Base {

	// Slug
	public function get_name() {
		return 'cybershop-mobile-menu-1';
	}

	// Title
	public function get_title() {
		return __('موبایل منو 1', 'cybershop');
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



		// 
		// SETTINGS
		// 
		// Start Controls
		$this->start_controls_section(
			'mobile_menu_settings', [
				'label' => __('تنظیمات', 'cybershop')
			]
		);

		// Selected Menu
		$this->add_control(
			'mobile_menu_selected_menu',
			[
				'label' => __( 'منو', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'options' => \Helper::get_wordpress_menus()
			]
		);

		// Customize Menu With
		$this->add_responsive_control(
			'mobile_menu_width',
			[
				'label' => __( 'عرض', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'default' => [
					'size' => 300,
				],
				'range' => [
					'px' => [
						'max' => 1000,
						'step' => 1
					],
					'em' => [
						'max' => 1000,
						'step' => 1
					],
					'%' => [
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .nav-drill' => 'width: {{SIZE}}{{UNIT}}',
				],
			]
		);

		// First Slide Background
		$this->add_control(
			'mobile_menu_first_nav_background_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'پس زمینه', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'mobile_menu_first_nav_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .nav-drill, {{WRAPPER}} .nav-expand-content',
			]
		);

		// First Slide Border
		$this->add_control(
			'mobile_menu_first_nav_border_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'حاشیه', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'mobile_menu_first_nav_border',
				'selector' => '{{WRAPPER}} .nav-drill, {{WRAPPER}} .nav-expand-content',
			]
		);

		// First Slide Box Shadow
		$this->add_control(
			'mobile_menu_first_nav_box_shadow_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'سایه', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'mobile_menu_first_nav_box_shadow',
				'selector' => '{{WRAPPER}} .nav-drill, {{WRAPPER}} .nav-expand-content',
			]
		);

		// Header Editor
		$this->add_control(
			'mobile_menu_header_content_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'هدر', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_control(
			'mobile_menu_header_content',
			[
				'label' => __( 'محتوای هدر', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none' => __( 'هیچکدام', 'cybershop' ),
					'wysiwyg' => __( 'تکست ادیتور', 'cybershop' ),
				],
			]
		);
		$this->add_control(
			'mobile_menu_wysiwyg',
			[
				'label' => __( 'ادیتور حرفه ای', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'متن هدر', 'cybershop' ),
				'placeholder' => __( 'متن مورد نظر خود را وارد کنید', 'cybershop' ),
				'condition' => [
					'mobile_menu_header_content' => 'wysiwyg',
				],
			]
		);

		// Heading
		$this->add_control(
			'mobile_menu_wrapper_background_settings',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'تنشیمات نمایش پس زمینه پوسته', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_control(
			'mobile_menu_wrapper_background_image_position',
			[
				'label' => __( 'جهت عکس پوسته', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'center',
				'options' => [
					'top' 		=> __( 'بالا', 'cybershop' ),
					'top right' => __( 'بالا راست', 'cybershop' ),
					'top left' 	=> __( 'بالا چپ', 'cybershop' ),
					'right' 	=> __( 'راست', 'cybershop' ),
					'bottom' 	=> __( 'پایین', 'cybershop' ),
					'bottom right' 	=> __( 'پایین راست', 'cybershop' ),
					'bottom left' 	=> __( 'پایین چپ', 'cybershop' ),
					'left' 		=> __( 'چپ', 'cybershop' ),
					'center' 	=> __( 'وسط', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} .nav-expand-content' => 'background-position: {{VALUE}} !important',
				],
			]
		);
		$this->add_control(
			'mobile_menu_wrapper_background_image_size',
			[
				'label' => __( 'اندازه عکس پوسته', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'cover',
				'options' => [
					'cover' => __( 'کاور', 'cybershop' ),
					'contain' => __( 'شامل', 'cybershop' ),
					'auto' => __( 'خودکار', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} .nav-expand-content' => 'background-size: {{VALUE}} !important',
				],
			]
		);
		$this->end_controls_section(); // END SETTINGS	


		// 
		// NAV_LINKS
		// 
		// Start Controls
		$this->start_controls_section(
			'mobile_menu_nav_links_settings', [
				'label' => __('لینک ها', 'cybershop')
			]
		);

		$this->add_control(
			'mobile_menu_nav_link_flex_display',
			[
				'label' => __( 'حالت چیدمان', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'flex-end',
				'options' => [
					'space-between' => __( 'space-between', 'cybershop' ),
					'space-around' 	=> __( 'space-around', 'cybershop' ),
					'space-evenly' 	=> __( 'space-evenly', 'cybershop' ),
					'center' 		=> __( 'center', 'cybershop' ),
					'end' 			=> __( 'end', 'cybershop' ),
					'flex-end' 		=> __( 'flex-end', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} .nav-link' => 'justify-content: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'mobile_menu_nav_link_flex_direction',
			[
				'label' => __( 'حالت چیدمان', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'row',
				'options' => [
					'column' => __( 'column', 'cybershop' ),
					'column-reverse' 	=> __( 'column-reverse', 'cybershop' ),
					'row' 	=> __( 'row', 'cybershop' ),
					'row-reverse' 		=> __( 'row-reverse', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} .nav-link' => 'flex-direction: {{VALUE}}',
				],
			]
		);

		// Nav_Link Typography
		$this->add_control(
			'mobile_menu_nav_link_typography_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'تایپو گرافی', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mobile_menu_nav_link_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'selector' => '{{WRAPPER}} .nav-link',
			]
		);

		// Nav_Link Color
		$this->add_control(
			'mobile_menu_nav_link_color_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'رنگ متن', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_control(
			'mobile_menu_nav_link_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .nav-link' => 'color: {{VALUE}}',
				],
			]
		);

		// Nav_Link Background
		$this->add_control(
			'mobile_menu_nav_link_background_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'پس زمینه', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'mobile_menu_nav_link_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .nav-link',
			]
		);

		// Nav_Link Border
		$this->add_control(
			'mobile_menu_nav_link_border_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'حاشیه', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'mobile_menu_nav_link_border',
				'selector' => '{{WRAPPER}} .nav-link',
			]
		);

		// Nav_Link Box Shadow
		$this->add_control(
			'mobile_menu_nav_link_box_shadow_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'سایه', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'mobile_menu_nav_link_box_shadow',
				'selector' => '{{WRAPPER}} .nav-link',
			]
		);

		$this->end_controls_section(); // END NAV_LINKS	


		// 
		// NAV_BACK_LINKS
		// 
		// Start Controls
		$this->start_controls_section(
			'mobile_menu_nav_back_links_settings', [
				'label' => __('لینک بازگشت', 'cybershop')
			]
		);

		$this->add_control(
			'mobile_menu_nav_back_link_icon_status',
			[
				'label' => __( 'نمایش آیکون دکمه برگشت', 'cybershop' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'پنهان', 'cybershop' ),
				'label_on' => __( 'نمایش', 'cybershop' ),
				'default' => 'yes',
				'return_value' => 'yes',
			]
		);

		$this->add_control(
			'mobile_menu_nav_back_link_icon',
			[
				'label' => __( 'آیکون', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
				'condition' => [
					'mobile_menu_nav_back_link_icon_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'mobile_menu_nav_back_link_text',
			[
				'label' => __( 'متن دکمه برگشت', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'برگشت', 'cybershop' ),
				'placeholder' => __( 'متن مورد نظر جهت اضافه کردن به دکمه برگشت', 'cybershop' ),
			]
		);

		$this->add_control(
			'mobile_menu_nav_back_link_flex_display',
			[
				'label' => __( 'حالت چیدمان', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'space-between',
				'options' => [
					'space-between' => __( 'space-between', 'cybershop' ),
					'space-around' 	=> __( 'space-around', 'cybershop' ),
					'space-evenly' 	=> __( 'space-evenly', 'cybershop' ),
					'center' 		=> __( 'center', 'cybershop' ),
					'end' 			=> __( 'end', 'cybershop' ),
					'flex-end' 		=> __( 'flex-end', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} .nav-back-link' => 'justify-content: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'mobile_menu_nav_back_link_flex_direction',
			[
				'label' => __( 'حالت چیدمان', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'row-reverse',
				'options' => [
					'column' => __( 'column', 'cybershop' ),
					'column-reverse' 	=> __( 'column-reverse', 'cybershop' ),
					'row' 	=> __( 'row', 'cybershop' ),
					'row-reverse' 		=> __( 'row-reverse', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} .nav-back-link' => 'flex-direction: {{VALUE}}',
				],
			]
		);

		// Nav_Back_Link Typography
		$this->add_control(
			'mobile_menu_nav_back_link_typography_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'تایپو گرافی', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mobile_menu_nav_back_link_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'selector' => '{{WRAPPER}} .nav-back-link',
			]
		);

		// Nav_Back_Link Color
		$this->add_control(
			'mobile_menu_nav_back_link_color_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'رنگ متن', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_control(
			'mobile_menu_nav_back_link_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .nav-back-link' => 'color: {{VALUE}}',
				],
			]
		);

		// Nav_Back_Link Background
		$this->add_control(
			'mobile_menu_nav_back_link_background_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'پس زمینه', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'mobile_menu_nav_back_link_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .nav-back-link',
			]
		);

		// Nav_Back_Link Border
		$this->add_control(
			'mobile_menu_nav_back_link_border_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'حاشیه', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'mobile_menu_nav_back_link_border',
				'selector' => '{{WRAPPER}} .nav-back-link',
			]
		);

		// Nav_Back_Link Box Shadow
		$this->add_control(
			'mobile_menu_nav_back_link_box_shadow_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'سایه', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'mobile_menu_nav_back_link_box_shadow',
				'selector' => '{{WRAPPER}} .nav-back-link',
			]
		);

		$this->end_controls_section(); // END NAV_BACK_LINKS	

	}


	// PHP-RENDER
	public function render() {

		// Get Settings
		$settings  = $this->get_settings();
		// $mega_menu_button_icon = $settings['mm_button_icon']['value'];

		// Current Selected Menu
		$selected_menu = $settings['mobile_menu_selected_menu'];
		if(!empty($selected_menu)) {
			// Get menu list
			$menu = wp_get_nav_menu_items($selected_menu);

			// Build hierarchical tree of $menu
			$menuitems = \Helper::buildTree( $menu );
		}
		?>

		<!-- Overlay -->
		<span class="mobile_menu_overlay" id="cybershop_mobile_menu_overlay_<?= $this->get_id() ?>"></span>

		<!-- Burger -->
		<span class="cybershop_mobile_menu_hamburger" data-target="cybershop_mobile_menu_<?= $this->get_id() ?>">menu</span>

		<!-- Menu -->
		<nav class="nav-drill" id="cybershop_mobile_menu_<?= $this->get_id() ?>">			
			<!-- First Slide -->
			<ul class="nav-items nav-level-1" id="">
				<!-- Cybershop Mobile Menu Header HTML -->
				<div class="cybershop_mobile_menu_header_content content" id="cybershop_mobile_menu_header_content_<?= $this->get_id() ?>">
					<?php if($settings['mobile_menu_header_content'] === 'wysiwyg'):?>
						<?= $settings['mobile_menu_wysiwyg'] ?>
					<?php endif; ?>
				</div>

				<?php
				if(!empty($selected_menu)) {
					foreach( $menuitems as $item ) {
						\Helper::create_mobile_menu_1($item);
					}
				}
				?>
			</ul>
		</nav>

		<!-- Init -->
		<script type="text/javascript" defer="">
			var options = {
				// ID
				id: "<?= $this->get_id() ?>",
				nav_id: "cybershop_mobile_menu_<?= $this->get_id() ?>", 

				// Back button
				back_button_text: "<?= $settings['mobile_menu_nav_back_link_text'] ?>",
				back_button_icon_status: "<?= $settings['mobile_menu_nav_back_link_icon_status'] ?>",
				back_button_icon: "<?= $settings['mobile_menu_nav_back_link_icon']['value'] ?>"
			}
			configure_mobile_menu_1(options);
		</script>

		<?php
	}

	// Elementor bug doesn't let me to make it much more beautiful .. sadge
	// $this->slides_count = $this->get_slides_count($this->get_settings_for_display('mobile_menu_selected_menu'));
	public function get_slides_count($selected_menu) {
		// var_dump($selected_menu['mobile_menu_selected_menu']);
		// exit;
		if(empty($selected_menu)) {
			$selected_menu = 0;
		}
		$menu = wp_get_nav_menu_items($selected_menu);
		$menuitems = \Helper::buildTree( $menu );
		$slides_count = 0;
		foreach($menuitems as $item) {
			$slides_count = \Helper::count_childrens($item, $slides_count);
		}
		return $slides_count;
	}

}
