<?php

function cybershop_mini_cart( $fragments ) {
 // Get cart
   ob_start();
   woocommerce_mini_cart();
   $mini_cart = ob_get_clean();

   $fragments['div.cybershop-mini-cart'] = $mini_cart;
   $fragments['div.cybershop-mini-cart-hash'] = WC()->cart->get_cart_hash();
   $fragments['span.cybershop-mini-cart-contents-count'] = '<span class="icons_counter cybershop-mini-cart-contents-count">'.WC()->cart->cart_contents_count.'</span>';
   $fragments['span.cybershop-mini-cart-total'] = '<span class="cybershop-mini-cart-total">'.WC()->cart->total.'</span>';
   return $fragments;
}

// Search Form
function cybershop_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform cybershop-search-form" action="' . home_url( '/' ) . '" >

    <input class="has-background-white-ter" type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search').'" />
    <button class="has-background-white-ter"><i class="fa fa-search has-text-grey"></i></button>

    </form>';

    return $form;
}

// Load Languages
function cybershop_addon_load_languages() {
    load_plugin_textdomain('cybershop-addon',false,dirname(plugin_basename(__FILE__)).'/languages/');

}

// Retrieves settings
function settings($key, $default_value='') {
    if(isset($GLOBALS['cybershop'][$key])) {
        return $GLOBALS['cybershop'][$key];
    } else {
        return $default_value;
    }
}

// Comment Field Ordering
function cybershop_comment_fields_order( $fields ) {
    $comment_field = $fields['comment'];
    $author_field = $fields['author'];
    $email_field = $fields['email'];
    $url_field = !empty($fields['url']) ? $fields['url'] : null;
    $cookies_field = $fields['cookies'];
    unset( $fields['comment'] );
    unset( $fields['author'] );
    unset( $fields['email'] );
    unset( $fields['url'] );
    unset( $fields['cookies'] );
    // the order of fields is the order below, change it as needed:
    $fields['comment'] = $comment_field;
    $fields['author'] = $author_field;
    $fields['email'] = $email_field;
    $fields['url'] = $url_field;
    $fields['cookies'] = $cookies_field;
    // done ordering, now return the fields:
    return $fields;
}

// Comments Date In Human Difference
function cybershop_comment_time_output($date, $d, $comment){
    return printf(
        esc_html__('%s پیش ', 'cybershop'),
        human_time_diff( strtotime( $comment->comment_date ), current_time( 'U') )
    ); 
}

// Remove comment time
function wpb_remove_comment_time($date, $d, $comment) { 
    if ( !is_admin() ) {
        return;
    } else { 
        return $date;
    }
}
add_filter( 'get_comment_time', 'wpb_remove_comment_time', 10, 3); // TODO: Fix comments date & time

// Change Ordering Text
function cybershop_custom_ordering_texts($sorting_options){
    $sorting_options = array(
        'menu_order' => __( 'Sorting', 'woocommerce' ),
        'popularity' => __( 'Sort by popularity', 'woocommerce' ),
        'rating'     => __( 'Sort by average rating', 'woocommerce' ),
        'date'       => __( 'Sort by newness', 'woocommerce' ),
        'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
        'price-desc' => __( 'Sort by price: high to low', 'woocommerce' ),
    );
    return $sorting_options;
}

function cybershop_default_catalog_orderby() {
     return 'date';
}

// Register Elementor theme locations
function cybershop_elementor_locations( $elementor_theme_manager ) {
    $elementor_theme_manager->register_all_core_location();
}

// Cart button
function shopping_cart_button_view_cart() {
    $original_link = wc_get_cart_url();
    echo '<a href="' . esc_url( $original_link ) . '" class="button view_cart wc-forward is-light">' . esc_html__( 'View cart', 'woocommerce' ) . '</a>';
}

// Checkout button
function shopping_cart_proceed_to_checkout() {
    $original_link = wc_get_checkout_url();
    echo '<a href="' . esc_url( $original_link ) . '" class="button checkout wc-forward is-primary">' . esc_html__( 'Checkout', 'woocommerce' ) . '</a>';
}


// Store widget(CybershopArchiveProducts) settings in session(For some reasons...)
add_action( 'elementor/frontend/before_render', function( $widget) {
    if(!empty($widget->get_settings()['cb_archive_product'])) {
        $_SESSION['product_settings'] = $widget->get_settings();
    }
}, 10, 2 );



function add_dashboard_widgets() {
    wp_add_dashboard_widget( 
        'cybershop_dashboard_widget', 
        esc_html( 'سایبرشاپ' ), 
        'cybershop_dashboard_widget_render',
        'dashboard', 
        'side', 'high'
    );


    // Force Widgets To The Top
    // Globalize the metaboxes array, this holds all the widgets for wp-admin.
    global $wp_meta_boxes;
     
    // Get the regular dashboard widgets array 
    // (which already has our new widget but appended at the end).
    $default_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
     
    // Backup and delete our new dashboard widget from the end of the array.
    $widget_backup = array( 'cybershop_dashboard_widget' => $default_dashboard['cybershop_dashboard_widget'] );
    unset( $default_dashboard['cybershop_dashboard_widget'] );
    
    // Merge the two arrays together so our widget is at the beginning.
    $sorted_dashboard = array_merge( $widget_backup, $default_dashboard );
    
    // Save the sorted array back into the original metaboxes. 
    $wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
}

function cybershop_dashboard_widget_render() {
    echo '<h1 class="cybershop_annoncement">بزودی</h1>' ;
}


