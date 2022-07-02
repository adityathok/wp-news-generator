<?php
/**
 * A file that defines a class wpnewsgen-admin-dashboard
 * 
 * @link       https://github.com/adityathok
 * @since      1.0.0
 *
 * @package    wp_news_generator
 * @subpackage wp_news_generator/inc
 */

 
class wpnewsgen_admin_dashboard {

	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/

	/**
	 * Initializes the plugin
	 */
	function __construct() {
        
        add_action('admin_menu', array( &$this,'wpnewsgen_admin_menu') );
        add_action('admin_menu', array( &$this,'wpnewsgen_admin_menuoption') );

	} // end constructor

	function wpnewsgen_admin_menu() {
		add_menu_page( 'WP News Generator', 'WP News Generator', 'manage_options', 'wpnewsgen-admin-page', array( &$this,'wpnewsgen_admin_page'), 'dashicons-clipboard', 12  );
	}
	
	function wpnewsgen_admin_page() {
		include_once( 'admin-page.php'  );
	}

	function wpnewsgen_admin_menuoption() {
		add_submenu_page( 'wpnewsgen-admin-page', 'Option', 'Option', 'administrator', 'custom-submenu', 'custom_submenu' );
	}

}

// instantiate plugin's class
$GLOBALS['wpnewsgen_admin_dashboard'] = new wpnewsgen_admin_dashboard();

