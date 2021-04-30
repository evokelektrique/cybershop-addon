<?php

namespace CybershopElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if(!defined('ABSPATH')) exit; // No Direct Access

class CybershopSearch extends Widget_Base {

	// Slug
	public function get_name() {
		return 'cybershop-search';
	}

	// Title
	public function get_title() {
		return __('Search', 'cybershop');
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

		// =======================================================
		// Categories Divider

		$this->add_control(
			'categories_divider',
			[
				'label' => __( 'دسته بندی', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'show_categories',
			[
				'label' => __( 'دسته بندی ها', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'نمایش', 'cybershop' ),
				'label_off' => __( 'پنهان', 'cybershop' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		// Select color
		$this->add_control(
			'select_color',
			[
				'label' => __( 'متن ', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .select select' => 'color: {{VALUE}};',
					'{{WRAPPER}} .select:not(.is-multiple):not(.is-loading):after' => 'border-color: {{VALUE}};',
				],
			]
		);

		// Select background color
		$this->add_control(
			'select_background_color',
			[
				'label' => __( 'پس زمینه ', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .select select' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
				],
			]
		);

		// Select border radius
		$this->add_control(
			'select_border_radius',
			[
				'label' => __( 'حشایه ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .select select' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		// =======================================================
		// Search Divider

		$this->add_control(
			'search_divider',
			[
				'label' => __( 'جستجو', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Search color
		$this->add_control(
			'search_color',
			[
				'label' => __( 'متن ', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .input' => 'color: {{VALUE}};',
					'{{WRAPPER}} .input::placeholder' => 'color: {{VALUE}};',
				],
			]
		);

		// Search background color
		$this->add_control(
			'search_background_color',
			[
				'label' => __( 'پس زمینه ', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .input' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
				],
			]
		);

		// Select border radius
		$this->add_control(
			'search_border_radius',
			[
				'label' => __( 'حاشیه ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// =======================================================
		// Button Divider

		$this->add_control(
			'button_divider',
			[
				'label' => __( 'دکمه', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Button color
		$this->add_control(
			'button_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .button' => 'color: {{VALUE}};',
				],
			]
		);

		// Button background color
		$this->add_control(
			'button_background_color',
			[
				'label' => __( 'پس زمینه', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .button' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
				],
			]
		);

		// Button border radius
		$this->add_control(
			'button_border_radius',
			[
				'label' => __( 'حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		// End Controls
		$this->end_controls_section();	
	}

	// PHP-RENDER
	public function render() {

		// Get Settings
		$settings  = $this->get_settings_for_display();
		?>
		<form action="<?= home_url( '/' ) ?>" method="get">
          <div class="navbar-item field has-addons has-addons-centered">
          	<?php if($settings['show_categories'] === 'yes'): ?>
            <p class="control">
              <span class="select responsive_select">
                <?php if(\Cybershop::is_woocommerce_activated()): ?>
                	<?php wc_product_dropdown_categories() ?>
                <?php else: ?>
                	<?php wp_dropdown_categories() ?>
                <?php endif; ?>
              </span>
            </p>
	        <?php endif; ?>
            <p class="control is-expanded">
              <input class="input is-fullwidth" type="text" type="text" name="s" id="search" value="<?= the_search_query() ?>" placeholder=<?= __('جستجو...', 'sage') ?> >
            </p>
            <p class="control">
              <button class="button">
                <span class="icon is-small">
                  <i class="fa fa-search"></i>
                </span>
              </button>
            </p>
          </div>
        </form>
		<?php
	}
}
