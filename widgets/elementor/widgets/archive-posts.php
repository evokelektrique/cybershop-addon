<?php

namespace CybershopElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if(!defined('ABSPATH')) exit; // No Direct Access

class CybershopArchivePosts extends Widget_Base {

	// Slug
	public function get_name() {
		return 'cybershop-archive-posts';
	}

	// Title
	public function get_title() {
		return __('آرشیو پست  ها', 'cybershop');
	}

	// Icon
	public function get_icon() {
		return 'fab fa-amilia fa-spin';
	}

	// Category
	public function get_categories() {
		return ['cybershop-archive'];
	}

	// Controls/Options Registration
	public function _register_controls() {

		// Start Controls
		$this->start_controls_section(
			'section_content', [
				'label' => __('Content', 'elementor')
			]
		);

		// Post Title Divider
		$this->add_control(
			'post_title_divider',
			[
				'label' => __( 'عنوان', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Post Title Typhography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'post_title_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .post-title a',
			]
		);

		// Post Title Color
		$this->add_control(
			'post_title_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .post-title a' => 'color: {{VALUE}};',
				],
			]
		);

		// Post Title Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'post_title_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .post-title a',
			]
		);


		// ========================================================
		// Post Excerpt Divider
		$this->add_control(
			'post_excerpt_divider',
			[
				'label' => __( 'خلاصه', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Post Excerpt Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'post_excerpt_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .post-excerpt',
			]
		);

		// Post Excerpt Color
		$this->add_control(
			'post_excerpt_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .post-excerpt' => 'color: {{VALUE}};',
				],
			]
		);

		// Post Excerpt Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'post_excerpt_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .post-excerpt',
			]
		);
		// End Controls
		$this->end_controls_section();	

		// ========================================================

		// Start Controls
		$this->start_controls_section(
			'section_columns', [
				'label' => __('سطون', 'cybershop')
			]
		);

		// $this->add_control(
		// 	'taxonomy',
		// 	[
		// 		'label' => __( 'تاکسونومی', 'cybershop' ),
		// 		'type' => Controls_Manager::SELECT,
		// 		'label_block' => true,
		// 		'default' => 'category',
		// 		'options' => $this->get_taxonomies(),
		// 	]
		// );

		// Navigation Active
		$this->add_control(
			'columns_colors_heaidng',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Columns Background Color
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'columns_background_color',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .post-content',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'columns_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .post-content',
			]
		);

		$this->add_control(
			'align',
			[
				'label' => __( 'جهت سطون', 'cybershop' ),
				'type' => Controls_Manager::SELECT,
				'label_block' => true,
				'default' => 'centered',
				'options' => [
					'right' => 'راست',
					'centered' => 'وسط',
					'left' => 'چپ'
				],
			]
		);	

		$this->add_control(
			'image_size',
			[
				'label' => __( 'اندازه عکس', 'cybershop' ),
				'type' => Controls_Manager::SELECT,
				'label_block' => true,
				'default' => 'medium',
				'options' => [
					'thumbnail' => 'بند انگشت',
					'medium' => 'متوسط',
					'large' => 'بزرگ',
					'full' => 'کامل',
				],
			]
		);

		// End Controls
		$this->end_controls_section();	

		// ========================================================
		// Navigation Divider
		// Start Controls
		$this->start_controls_section(
			'section_navigation', [
				'label' => __('نویگیشن', 'cybershop')
			]
		);


		// ========================================================
		// Navigation Active
		$this->add_control(
			'navigation_active',
			[
				'label' => __( 'لینک فعال', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'navigation_active_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .cybershop-pagination ul li .active',
			]
		);

		$this->add_control(
			'navigation_active_background_color',
			[
				'label' => __( 'پس زمینه', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .cybershop-pagination ul li .active' => 'background-color: {{VALUE}};',
				],
			]
		);	

		$this->add_control(
			'navigation_active_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .cybershop-pagination ul li .active' => 'color: {{VALUE}} !important;',
				],
			]
		);


		// Navigation links active text shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'navigation_active_text_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-pagination ul li .active',
			]
		);

		// ========================================================
		// Navigation Active
		$this->add_control(
			'navigation_links',
			[
				'label' => __( 'لینک ', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'navigation_active_hover_background_color',
			[
				'label' => __( 'پس زمینه (هاور)', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .cybershop-pagination ul li .page-number:not(.active):hover, .cybershop-pagination ul li .page-number:not(.active):active' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'navigation_hover_color',
			[
				'label' => __( 'رنگ (هاور)', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .cybershop-pagination ul li .page-number:not(.active):hover, .cybershop-pagination ul li .page-number:not(.active):active, {{WRAPPER}} .cybershop-pagination ul li.next a:hover, {{WRAPPER}} .cybershop-pagination ul li.prev a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'navigation_links_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .cybershop-pagination ul li .page-number:not(.active)',
			]
		);

		$this->add_control(
			'navigation_background_color',
			[
				'label' => __( 'پس زمینه', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .cybershop-pagination ul li .page-number:not(.active)' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'navigation_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .cybershop-pagination ul li .page-number, {{WRAPPER}} .cybershop-pagination ul li.next a, {{WRAPPER}} .cybershop-pagination ul li.prev a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'navigation_links_text_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-pagination ul li .page-number, {{WRAPPER}} .cybershop-pagination ul li.next a, {{WRAPPER}} .cybershop-pagination ul li.prev a',
			]
		);
		


		// End Controls
		$this->end_controls_section();	


		// ========================================================
		// Post Details Divider
		// Start Controls
		$this->start_controls_section(
			'section_post_details', [
				'label' => __('توضیحات', 'cybershop')
			]
		);

		// Post Details Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'post_details_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .post-details',
			]
		);

		// Post Details Color
		$this->add_control(
			'post_details_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .post-details' => 'color: {{VALUE}};',
				],
			]
		);

		// Post Details Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'post_details_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .post-details',
			]
		);
		// End Controls
		$this->end_controls_section();	

	}

	// PHP-RENDER
	public function render() {

		// Get Settings
		$settings  = $this->get_settings_for_display();

		// Columns Align
		$align = !empty($settings['align']) ? $settings['align'] : 'centered';
		?>
	    <div id="home_posts">
			<div class="columns is-multiline is-<?= $align ?>">

				<?php while(have_posts()) : the_post() ?>
					<article <?php post_class(['column', 'is-4']) ?>>
						<div class="post-content">
							<div class="post-thumbnail">
								<a href="<?= get_permalink() ?>">
									<?= get_the_post_thumbnail(get_the_ID(), 'medium') ?>
								</a>
							</div>
							<div class="post-summary px-3 py-3">
								<header>
									<h2 class="post-title pb-1">
										<a href="<?= get_permalink() ?>">
											<?= get_the_title() ?>
										</a>
									</h2>
								</header>
								<div class="post-excerpt pb-5">
									<?php the_excerpt() ?>
								</div>
								<p class="post-details">
									<span class="post-date ml-3">
										<i class="fa fa-calendar-alt ml-1"></i>
										<time class="updated" datetime="<?= get_post_time('c', true) ?>"><?= get_the_date() ?></time>
									</span>
									<span class="post-comments">
										<i class="fa fa-comments ml-1"></i>
										<?= get_comments_number( get_the_ID() ) ?> <?= __('نظر', 'cybershop') ?>
									</span>
								</p>
							</div>
						</div>
					</article>
				<?php endwhile; ?>
			</div>

			<?php \Cybershop::navigation() ?>

			<?php if (!have_posts()): ?>
				<div class="alert alert-warning">
					<?php __('Sorry, no results were found.', 'cybershop') ?>
				</div>
			<?php endif; ?>
		</div>

		<?php



	}




	//
	// Private Functions
	//

	// // Return all wordpress categories list
	// protected function get_wordpress_categories() {
	// 	$categories = [];
	// 	$wp_categories = get_categories( [
	// 	    'orderby' => 'name',
	// 	    'order'   => 'ASC'
	// 	]);
	// 	foreach($wp_categories as &$category) {
	// 		$categories[$category->term_id] = $category->name;
	// 	}
	// 	return $categories;
	// }


	protected function get_taxonomies() {
		$taxonomies = get_taxonomies( [ 'show_in_nav_menus' => true ], 'objects' );

		$options = [ '' => '' ];

		foreach ( $taxonomies as $taxonomy ) {
			$options[ $taxonomy->name ] = $taxonomy->label;
		}

		return $options;
	}

}
