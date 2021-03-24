<?php

// Load Languages Hook
add_action('plugins_loaded', 'cybershop_addon_load_languages');

// Carbon Hooks
add_action( 'carbon_fields_register_fields', 'carbon_theme_options' );
add_action( 'after_setup_theme', 'carbon_load' );
add_action( 'widgets_init', 'load_widgets' );

// Modify Wordpress Default Search Widget
add_filter( 'get_search_form', 'cybershop_search_form', 100 );

// Comment Field Ordering
add_filter( 'comment_form_fields', 'cybershop_comment_fields_order' );
// Comments Date In Human Difference
add_filter('get_comment_date', 'cybershop_comment_time_output', 10, 3);

// Woocommerce Hooks
// Ajax Mini Cart
add_filter( 'woocommerce_add_to_cart_fragments', 'cybershop_mini_cart', 10, 1 );
// Shop Page Products Limitation
// add_filter( 'loop_shop_per_page', function() {
// 	return settings('woocommerce_shop_page_limit');
// });
add_action( 'init', function() {
	// Remove Breadcrumbs
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	// Remove Shop Page Loop Wrapper
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10, 0 );
    // Remove All Notices From Shop Pgae
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10, 0 );

    // Remove OrderBy
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
	
	// Change Order By Texts
	// add_filter('woocommerce_catalog_orderby', 'cybershop_custom_ordering_texts');
});

add_action( 'after_setup_theme', function() {
    remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
    remove_action( 'woocommerce_after_shop_loop' , 'woocommerce_result_count', 20 );
} );

// add_filter('woocommerce_default_catalog_orderby', 'cybershop_default_catalog_orderby');
add_action( 'elementor/theme/register_locations', 'cybershop_elementor_locations' );

add_action( 'woocommerce_widget_shopping_cart_buttons', function(){
    // Removing Buttons
    remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10 );
    remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20 );

    // Adding customized Buttons
    add_action( 'woocommerce_widget_shopping_cart_buttons', 'shopping_cart_button_view_cart', 10 );
    add_action( 'woocommerce_widget_shopping_cart_buttons', 'shopping_cart_proceed_to_checkout', 20 );
}, 1 );

// Add Dashboard Widgets
add_action( 'wp_dashboard_setup', 'add_dashboard_widgets' );


add_action( 'admin_enqueue_scripts', function() {
    wp_register_style( 'admin_css', get_template_directory_uri() . '/public/css/admin.css', false, '1.0.0' );
    wp_enqueue_style('admin_css');
});
