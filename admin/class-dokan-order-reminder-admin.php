<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/daday-andry
 * @since      1.0.0
 *
 * @package    Dokan_Order_Reminder
 * @subpackage Dokan_Order_Reminder/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Dokan_Order_Reminder
 * @subpackage Dokan_Order_Reminder/admin
 * @author     daday-andry <andrysahaedena@gmail.com>
 */
class Dokan_Order_Reminder_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	public function settings_sections($sections){
		$sections[] = [
			"id" => "dokan_order_reminder",
			"title" => "Order reminder",
			"icon_url" =>  plugins_url( 'images/reminder-alert.svg', __FILE__ ),
			"description" => "Order reminder configuration",
			"settings_title" => "Order reminder Settings",
			"settings_description" => "You can configure your site's order reminder emails."
		];
		
    	return $sections;
	}

	public function settings_fields($fields) {
		$fields['dokan_order_reminder'] = [
			"vendor_reminder_after_period" => [
				"name"  => "vendor_reminder_after_period",
				"label" => __("After Period", 'dor'),
				'type'  => 'number',
				"desc"  => __("Number of <strong>hours</strong> when the order is still pending.", 'dor'),
				"default" => "24"
			],
			"vendor_reminder_email_subject" => [
				"name"  => "vendor_reminder_email_subject",
				"label" => __("Email subject", 'dor'),
				"type"  => "text",
				"default" => __("Notification: Order pending for over 12 hours", 'dor')
			],
			"vendor_reminder_message" => [
				"name"  => "vendor_reminder_message",
				"label" => "Vendor reminder message",
				"type"  => "wpeditor",
				"desc"  => __("Customize the reminder message sent to the seller for orders that have been pending for some time. <br> [order_count] is a variable that will be automatically replaced by the number of pending orders", 'dor'),
				"default" => __("
						Dear [vendor-name], <br>
						You have [order_count] order(s) pending for more than 12 hours. Please process it as soon as possible.<br>
						Thank you.
					"
				, 'dor')
			],
		];


		return $fields;
	}

}
