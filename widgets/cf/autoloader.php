<?php

// 
// Include Widgets
// 

// Icons Widget
require_once(__DIR__.'/widgets/icons.php');
// Images Widget
require_once(__DIR__.'/widgets/images.php');
// Recent Posts With Extra Options Widget
require_once(__DIR__.'/widgets/recent_posts.php');
// Hirearchical Categories
require_once(__DIR__.'/widgets/categories.php');

// Widget Loader
function load_widgets() {
    register_widget( 'Icons' );
    register_widget( 'Images' );
    register_widget( 'RecentPosts' );
    register_widget( 'Categories' );
}
