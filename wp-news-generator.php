<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/adityathok
 * @since             1.0.0
 * @package           wp_news_generator
 *
 * @wordpress-plugin
 * Plugin Name:       WP News Generator
 * Plugin URI:        https://github.com/adityathok/wp-news-generator
 * Description:       Plugin for generate post news from newsapi.org
 * Version:           1.0.0
 * Author:            Aditya Thok
 * Author URI:        https://github.com/adityathok
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-news-generator
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WP_NEWS_GENERATOR_VERSION', '1.0.0' );

// plugin folder url
if(!defined('WP_NEWS_GENERATOR_URL')) {
	define( 'WP_NEWS_GENERATOR_URL',  plugin_dir_url( __FILE__ ) );
}

/**
 * call another file for the plugin
 */
require 'inc/wpnewsgen-admin-dashboard.php';


/**
 * Function add scripts ans syles for dashboard
 */
if ( ! function_exists( 'wpnewsgen_admin_enqueue_scripts' ) ) {
	function wpnewsgen_admin_enqueue_scripts($hook) {	
	
		$page = isset( $_GET['page'] ) ? sanitize_text_field( wp_unslash( $_GET['page'] ) ) : '';
		if ( 'wpnewsgen-admin-page' != $page ) {
			return;
		}

		wp_enqueue_script( 'wpnewsgen-admin-scripts', WP_NEWS_GENERATOR_URL.'js/admin-script.js', array( 'jquery'), WP_NEWS_GENERATOR_VERSION );
	}
}

add_action( 'admin_enqueue_scripts', 'wpnewsgen_admin_enqueue_scripts' );