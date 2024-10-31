<?php
/*
Plugin Name: Quinbook
Description: With one click, the QB TicketShop Helper integrates the TicketShop into Wordpress websites of QuinBook users.
Version: 1.0.0
Author: Quinbook
Author URI: https://quinbook.com/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: quinbook
Domain Path: /languages
*/

/**
 * Basic plugin definitions 
 * 
 * @package QUBO
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( !defined( 'QUBO_DIR' ) ) {
  define( 'QUBO_DIR', dirname( __FILE__ ) );      // Plugin dir
}
if( !defined( 'QUBO_URL' ) ) {
  define( 'QUBO_URL', plugin_dir_url( __FILE__ ) );   // Plugin url
}
if( !defined( 'QUBO_INC_DIR' ) ) {
  define( 'QUBO_INC_DIR', QUBO_DIR.'/includes' );   // Plugin include dir
}
if( !defined( 'QUBO_INC_URL' ) ) {
  define( 'QUBO_INC_URL', QUBO_URL.'includes' );    // Plugin include url
}
if( !defined( 'QUBO_ADMIN_DIR' ) ) {
  define( 'QUBO_ADMIN_DIR', QUBO_INC_DIR.'/admin' );  // Plugin admin dir
}
if(!defined('QUBO_TD')) {
  define('QUBO_TD', 'quinbook'); // Plugin Text Domain
}

/**
 * Load Text Domain
 *
 * This gets the plugin ready for translation.
 *
 * @package QUBO
 * @since 1.0.0
 */
load_plugin_textdomain( QUBO_TD, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/**
 * Activation Hook
 *
 * Register plugin activation hook.
 *
 * @package QUBO
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'qubo_install' );

function qubo_install(){
	
}

/**
 * Deactivation Hook
 *
 * Register plugin deactivation hook.
 *
 * @package QUBO
 * @since 1.0.0
 */
register_deactivation_hook( __FILE__, 'qubo_uninstall');

function qubo_uninstall(){
  
}

// Global variables
global $qubo_scripts, $qubo_admin, $qubo_options;

$qubo_options  = get_option('qubo_options');

// Script class handles most of script functionalities of plugin
include_once( QUBO_INC_DIR.'/class-qubo-scripts.php' );
$qubo_scripts = new Qubo_Scripts();
$qubo_scripts->add_hooks();

// Admin class handles most of admin panel functionalities of plugin
include_once( QUBO_ADMIN_DIR.'/class-qubo-admin.php' );
$qubo_admin = new Qubo_Admin();
$qubo_admin->add_hooks();

include( QUBO_INC_DIR.'/qubo_shortcodes.php' );
?>