<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/daday-andry
 * @since      1.0.0
 *
 * @package    Dokan_Order_Reminder
 * @subpackage Dokan_Order_Reminder/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Dokan_Order_Reminder
 * @subpackage Dokan_Order_Reminder/includes
 * @author     daday-andry <andrysahaedena@gmail.com>
 */
class Dokan_Order_Reminder_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'dokan-order-reminder',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
