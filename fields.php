<?php

// Load Namespaces
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;
define( 'Carbon_Fields\URL', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'vendor/htmlburger/carbon-fields/' );

// Boot Carbon Fields
// Load Carbon-Fields
function carbon_load() {
	require_once( 'vendor/autoload.php' );
	\Carbon_Fields\Carbon_Fields::boot();
}

// Carbon-Fields Options
function carbon_theme_options() {
	// Navbar fields
	Container::make( 'nav_menu_item', __( 'Menu Settings', 'cybershop-addon' ) )
    ->add_fields( array(
        Field::make( 'color', 'cybershop_nav_color', __( 'رنگ' ) ),
        Field::make( 'icon', 'cybershop_nav_icon', __( 'آیکون' ) ),
        Field::make( 'image', 'cybershop_nav_image', __( 'عکس' ) )->set_value_type( 'url' ),
    ));
}