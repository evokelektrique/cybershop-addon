<?php 
namespace CybershopElementor;

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class Plugin {

	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include_widgets_files() {

		// Global
		require_once( __DIR__ . '/widgets/menu.php' );
		require_once( __DIR__ . '/widgets/mega_menu.php' );
		require_once( __DIR__ . '/widgets/search.php' );
		require_once( __DIR__ . '/widgets/cart.php' );

		// Archive
		require_once( __DIR__ . '/widgets/archive-posts.php' );
		require_once( __DIR__ . '/widgets/recent-posts.php' );
		require_once( __DIR__ . '/widgets/base-widget.php' );
		require_once( __DIR__ . '/widgets/products-base.php' );
		require_once( __DIR__ . '/widgets/products.php' );
		require_once( __DIR__ . '/widgets/archive-products.php' );

		// Single
		require_once( __DIR__ . '/widgets/single-post-title.php' );
		require_once( __DIR__ . '/widgets/single-post-content.php' );
		require_once( __DIR__ . '/widgets/single-post-comments.php' );

		// Single Product
		require_once( __DIR__ . '/widgets/product-images.php' );
		require_once( __DIR__ . '/widgets/product-title.php' );
		require_once( __DIR__ . '/widgets/product-quantity.php' );
		require_once( __DIR__ . '/widgets/product-additional-information.php' );
		require_once( __DIR__ . '/widgets/product-add-to-cart.php' );
		require_once( __DIR__ . '/widgets/product-data-tabs.php' );

		
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();

		// 
		// Register Widgets
		// 

		// Menu Widget
		\Elementor\Plugin::instance()
			->widgets_manager
			->register_widget_type(new Widgets\CybershopMenu());

		// Mega Menu Widget
		\Elementor\Plugin::instance()
			->widgets_manager
			->register_widget_type(new Widgets\CybershopMegaMenu());
			
		// Search Widget
		\Elementor\Plugin::instance()
			->widgets_manager
			->register_widget_type(new Widgets\CybershopSearch());

		// Cart Widget
		\Elementor\Plugin::instance()
			->widgets_manager
			->register_widget_type(new Widgets\CybershopCart());
			
		// Archive Posts Widget
		\Elementor\Plugin::instance()
			->widgets_manager
			->register_widget_type(new Widgets\CybershopArchivePosts());

		// Recent Posts Widget
		\Elementor\Plugin::instance()
			->widgets_manager
			->register_widget_type(new Widgets\CybershopRecentPosts());
				
		// Price Filter Widget
		\Elementor\Plugin::instance()
			->widgets_manager
			->register_widget_type(new Widgets\CybershopArchiveProducts());
						
		// Single Post Title Widget
		\Elementor\Plugin::instance()
			->widgets_manager
			->register_widget_type(new Widgets\CybershopSinglePostTitle());
			
		// Single Post Content Widget
		\Elementor\Plugin::instance()
			->widgets_manager
			->register_widget_type(new Widgets\CybershopSinglePostContent());
			
		// Single Post Comments Widget
		\Elementor\Plugin::instance()
			->widgets_manager
			->register_widget_type(new Widgets\CybershopSinglePostComments());




		// Single Product
		\Elementor\Plugin::instance()
			->widgets_manager
			->register_widget_type(new Widgets\CybershopProductImages());

		\Elementor\Plugin::instance()
			->widgets_manager
			->register_widget_type(new Widgets\CybershopProductTitle());

		\Elementor\Plugin::instance()
			->widgets_manager
			->register_widget_type(new Widgets\CybershopProductQuantity());

		\Elementor\Plugin::instance()
			->widgets_manager
			->register_widget_type(new Widgets\CybershopProductAdditionalInformation());

		\Elementor\Plugin::instance()
			->widgets_manager
			->register_widget_type(new Widgets\CybershopProductAddToCart());

		\Elementor\Plugin::instance()
			->widgets_manager
			->register_widget_type(new Widgets\CybershopProductDataTabs());

	}

	// Register Widgets Categories
	public function register_categories($manager) {
		$manager->add_category('cybershop', [
			'title' => __('سایبر شاپ', 'cybershop'),
			'icon' => 'fa fa-plug'
		]);
		$manager->add_category('cybershop-archive', [
			'title' => __('سایبر شاپ - آرشیو', 'cybershop'),
			'icon' => 'fa fa-plug'
		]);
		$manager->add_category('cybershop-single', [
			'title' => __('سایبر شاپ - سینگل', 'cybershop'),
			'icon' => 'fa fa-plug'
		]);
		$manager->add_category('cybershop-single-product', [
			'title' => __('سایبر شاپ - سینگل محصول', 'cybershop'),
			'icon' => 'fa fa-plug'
		]);
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {

		// Register Categories
		add_action( 'elementor/elements/categories_registered', [$this, 'register_categories']);

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}
}

// Instantiate Plugin Class
Plugin::instance();
