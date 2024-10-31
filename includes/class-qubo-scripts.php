<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Scripts Class
 *
 * Handles adding scripts functionality to the admin pages
 * as well as the front pages.
 *
 * @package QUBO
 * @since 1.0.0
 */
class Qubo_Scripts {

	//class constructor
	function __construct()
	{
		
	}
	
	/**
	 * Enqueue Scripts on Public Side
	 * 
	 * @package QUBO
	 * @since 1.0.0
	 */
	public function qubo_public_scripts(){
		
		wp_register_style( 'qubo-public-style', QUBO_INC_URL.'/css/qubo-public.css', array(), 1 );
		wp_enqueue_style( 'qubo-public-style' );
		
		wp_enqueue_script('jquery');
		
		wp_register_script( 'qubo-public-script', QUBO_INC_URL.'/js/qubo-public.js', array(), 1, true );
		wp_enqueue_script( 'qubo-public-script' );
	}
	
	public function qubo_admin_scripts(){

		wp_register_style( 'qubo-admin-style', QUBO_INC_URL.'/css/qubo-admin.css', array(), 4 );
		wp_enqueue_style( 'qubo-admin-style' );
	}
	
	/**
	 * Adding Hooks
	 *
	 * Adding hooks for the styles and scripts.
	 *
	 * @package QUBO
	 * @since 1.0.0
	 */
	function add_hooks(){
		
		//add_action( 'wp_enqueue_scripts', array( $this, 'qubo_public_scripts' ) );

		add_action( 'admin_enqueue_scripts', array( $this, 'qubo_admin_scripts' ) );

	}
}
?>