<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://straycat.nu
 * @since             1.0.0
 * @package           Scc_Affiliate_Manager
 *
 * @wordpress-plugin
 * Plugin Name:       Affiliate Manager
 * Plugin URI:        https://straycat.nu/affiliate-manager
 * Description:       This plugin makes it easy to add, manage and display your affiliate links in a neat and organized way.
 * Version:           1.0.0
 * Author:            Stray Cat Communication
 * Author URI:        https://straycat.nu
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       scc-affiliate-manager
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
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-scc-affiliate-manager-activator.php
 */
function activate_scc_affiliate_manager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-scc-affiliate-manager-activator.php';
	Scc_Affiliate_Manager_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-scc-affiliate-manager-deactivator.php
 */
function deactivate_scc_affiliate_manager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-scc-affiliate-manager-deactivator.php';
	Scc_Affiliate_Manager_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_scc_affiliate_manager' );
register_deactivation_hook( __FILE__, 'deactivate_scc_affiliate_manager' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-scc-affiliate-manager.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_scc_affiliate_manager() {

	$plugin = new Scc_Affiliate_Manager();
	$plugin->run();

}
run_scc_affiliate_manager();
