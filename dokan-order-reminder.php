<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/daday-andry
 * @since             1.0.0
 * @package           Dokan_Order_Reminder
 *
 * @wordpress-plugin
 * Plugin Name:       Dokan order reminder
 * Plugin URI:        https://github.com/daday-andry/dokan-order-reminder
 * Description:       The Dokan Reminder Email Plugin automates email reminders for vendors on your Dokan-powered e-commerce site. Streamline vendor communication, reduce order processing times, and enhance customer satisfaction effortlessly.
 * Version:           1.0.0
 * Author:            daday-andry
 * Author URI:        https://github.com/daday-andry/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       dokan-order-reminder
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
define( 'DOKAN_ORDER_REMINDER_VERSION', '1.0.0' );

require plugin_dir_path( __FILE__ ) . '../vendor/autoload.php';


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-dokan-order-reminder-activator.php
 */
function activate_dokan_order_reminder() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dokan-order-reminder-activator.php';
	Dokan_Order_Reminder_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-dokan-order-reminder-deactivator.php
 */
function deactivate_dokan_order_reminder() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dokan-order-reminder-deactivator.php';
	Dokan_Order_Reminder_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_dokan_order_reminder' );
register_deactivation_hook( __FILE__, 'deactivate_dokan_order_reminder' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-dokan-order-reminder.php';
require plugin_dir_path( __FILE__ ) . 'commands/class-dor-command.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_dokan_order_reminder() {

	$plugin = new Dokan_Order_Reminder();
	$plugin->run();

}
run_dokan_order_reminder();
