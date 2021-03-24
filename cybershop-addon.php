<?php
/**
 * Plugin Name: سایبر شاپ
 * Plugin URI: example.com
 * Text Domain: cybershop
 * Domain Path: /languages/
 * Description: افزونه قالب 'سایبر شاپ'
 * Author: EVOKE
 * Version: 1.0.0
 * Author URI: example.com
*/

// No Direct Access Allowed
if(!defined('ABSPATH')) {
	exit;
}

// Define Plugin Path
define('cybershop', plugin_dir_path(__FILE__));

// Autoload
require_once('vendor/autoload.php');

// Load Walkers
require_once(cybershop.'walkers/navbar.php');

// Load Functions
require_once(cybershop.'functions.php');

// Load Elementor Widgets
require_once(cybershop.'elementor.php');

// Load CF Widgets
require_once(cybershop.'widgets/cf/autoloader.php');

// Load Fields
require_once(cybershop.'fields.php');

// Load Hooks
require_once(cybershop.'hooks.php');

