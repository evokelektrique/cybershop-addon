<?php
namespace CybershopElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

if(!defined('ABSPATH')) exit; // No Direct Access

class CybershopProductRelated extends Products_Base {

	// Slug
	public function get_name() {
		return 'cybershop-product-related';
	}

	// Title
	public function get_title() {
		return __( 'محصولات مرتبط', 'cybershop' );
	}

	// Icon
	public function get_icon() {
		return 'fab fa-amilia fa-spin';
	}

	// Category
	public function get_categories() {
		return ['cybershop-single-product'];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_related_products_content',
			[
				'label' => __( 'Related Products', 'elementor-pro' ),
			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label' => __( 'Products Per Page', 'elementor-pro' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 4,
				'range' => [
					'px' => [
						'max' => 20,
					],
				],
			]
		);

		$this->add_responsive_control(
			'columns',
			[
				'label' => __( 'Columns', 'elementor-pro' ),
				'type' => Controls_Manager::NUMBER,
				'prefix_class' => 'elementor-products-columns%s-',
				'default' => 4,
				'min' => 1,
				'max' => 12,
			]
		);

		$this->add_control(
			'orderby',
			[
				'label' => __( 'Order By', 'elementor-pro' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'date' => __( 'Date', 'elementor-pro' ),
					'title' => __( 'Title', 'elementor-pro' ),
					'price' => __( 'Price', 'elementor-pro' ),
					'popularity' => __( 'Popularity', 'elementor-pro' ),
					'rating' => __( 'Rating', 'elementor-pro' ),
					'rand' => __( 'Random', 'elementor-pro' ),
					'menu_order' => __( 'Menu Order', 'elementor-pro' ),
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label' => __( 'Order', 'elementor-pro' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'desc',
				'options' => [
					'asc' => __( 'ASC', 'elementor-pro' ),
					'desc' => __( 'DESC', 'elementor-pro' ),
				],
			]
		);

		$this->end_controls_section();

		// Magic !
		parent::_register_controls();
	}

	protected function render() {
		global $product;

		$product = wc_get_product();

		if ( ! $product ) {
			return;
		}

		$settings = $this->get_settings_for_display();

		$args = [
			'posts_per_page' => 4,
			'columns' => 4,
			'orderby' => $settings['orderby'],
			'order' => $settings['order'],
		];

		if ( ! empty( $settings['posts_per_page'] ) ) {
			$args['posts_per_page'] = $settings['posts_per_page'];
		}

		if ( ! empty( $settings['columns'] ) ) {
			$args['columns'] = $settings['columns'];
		}

		// Get visible related products then sort them at random.
		$args['related_products'] = array_filter( array_map( 'wc_get_product', wc_get_related_products( $product->get_id(), $args['posts_per_page'], $product->get_upsell_ids() ) ), 'wc_products_array_filter_visible' );

		// Handle orderby.
		$args['related_products'] = wc_products_array_orderby( $args['related_products'], $args['orderby'], $args['order'] );

		wc_get_template( 'single-product/related.php', $args );
	}

}
