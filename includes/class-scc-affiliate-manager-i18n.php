<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://straycat.nu
 * @since      1.0.0
 *
 * @package    Scc_Affiliate_Manager
 * @subpackage Scc_Affiliate_Manager/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Scc_Affiliate_Manager
 * @subpackage Scc_Affiliate_Manager/includes
 * @author     Stray Cat Communication <developer@straycat.nu>
 */
class Scc_Affiliate_Manager_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'scc-affiliate-manager',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
