<?php

namespace CybershopElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if(!defined('ABSPATH')) exit; // No Direct Access

class CybershopArchiveProducts extends Products {

	// Slug
	public function get_name() {
		return 'cybershop-archive-products';
	}

	// Title
	public function get_title() {
		return __('آرشیو محصولات', 'cybershop');
	}

	// Icon
	public function get_icon() {
		return 'fab fa-amilia fa-spin';
	}

	// Category
	public function get_categories() {
		return ['cybershop-archive'];
	}

	public function register_query_controls() {
		parent::register_query_controls();
	}

	public function get_custom_settings() {
		return $this->get_settings_for_display();
	}

	// PHP-RENDER
	public function render() {
		global $product_settings;
		$product_settings = $this->get_settings_for_display();
		
		parent::render();
	}
}
