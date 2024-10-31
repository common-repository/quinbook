<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Admin Class
 *
 * Manage Admin Panel Class
 *
 * @package QUBO
 * @since 1.0.0
 */
class Qubo_Admin {

	public $scripts;

	//class constructor
	function __construct() {

		global $qubo_scripts;

		$this->scripts = $qubo_scripts;
	}

	function register_my_custom_menu_page() {

		add_menu_page( 'Quinbook', 'Quinbook', 'manage_options', 'qubo-settings', array( $this, 'qubo_settings_page' ), 'dashicons-welcome-widgets-menus', 90 );
	}

	function qubo_settings_page()  {

		include( QUBO_ADMIN_DIR."/forms/qubo-setting-page.php" );
	}

	function register_my_setting_page() {

		register_setting( 'qubo_settings', 'qubo_options' );
	}

	function register_quinbook_block_type() {

		register_block_type( 'custom/quinbook-block', array(
			'editor_script' => 'quinbook-editor-script',
			'render_callback' => array( $this, 'quinbook_editor_render' ),
		));
	}

	function quinbook_editor_script() {

		wp_enqueue_script( 'quinbook-editor-script', QUBO_INC_URL. '/js/quinbook-editor.js', array( 'wp-blocks', 'wp-element', 'wp-editor' ), 23, true );
	}

	function quinbook_editor_render( $attributes ) {

		return wp_get_script_tag(
			array(
				'src'      => 'https://cdn.quinbook.com/shop.js',
				'data-shopid' => esc_attr( $attributes['shopID'] ),
			)
		);
	}
	
	/**
	 * Adding Hooks
	 *
	 * @package QUBO
	 * @since 1.0.0
	 */
	function add_hooks(){
		
		add_action( 'admin_menu', array( $this, 'register_my_custom_menu_page' ) );

		add_action( 'admin_init', array( $this, 'register_my_setting_page' ) );

		add_action( 'init', array( $this, 'register_quinbook_block_type' ) );

		add_action( 'enqueue_block_editor_assets', array( $this, 'quinbook_editor_script' ) );

	}
}
?>