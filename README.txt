Contributors: (this should be a list of wordpress.org userid's)
Donate link: https://github.com/daday-andry/
Tags: comments, spam
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The Dokan Reminder Email Plugin automates email reminders for vendors on your Dokan-powered e-commerce site. Streamline vendor communication, reduce order processing times, and enhance customer satisfaction effortlessly.

## Description
The Dokan Reminder Email Plugin is a powerful tool designed to enhance the functionality of your e-commerce website built on WordPress using the Dokan plugin. This plugin enables automatic email reminders to be sent to vendors, helping them stay organized and responsive to customer orders.

With the Dokan Reminder Email Plugin, you can streamline communication between vendors and customers by ensuring timely responses to orders and inquiries. By sending gentle reminders to vendors, you can significantly reduce order processing times and improve customer satisfaction.

## Key Features:

Automated Email Reminders: Set up automated email reminders to be sent to vendors when orders are placed or require action.

Customizable Templates: Customize email templates to match your brand identity and messaging style.

Flexible Scheduling: Configure reminder emails to be sent at specific intervals or trigger points, such as pending orders or order fulfillment deadlines.

Vendor Notifications: Keep vendors informed about new orders, pending tasks, and other important updates directly through email.

Integration with Dokan: Seamlessly integrate with the Dokan plugin, leveraging its powerful features while enhancing vendor communication.

Easy Setup: Simple and intuitive setup process allows you to start sending reminder emails to vendors in no time.

The Dokan Reminder Email Plugin is an indispensable tool for any e-commerce website using the Dokan plugin. Enhance vendor management, improve order processing efficiency, and elevate the overall customer experience with automated email reminders.

## Installation
1. Upload `dokan-order-reminder` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

## Configuration

### Email configuration

The plugin configuration is located in `Dokan > Settings > Order reminder.`
Within, you can customize the triggering condition, the email subject, and the email body that will be sent to the Vendor.

### Cronjob configuration
This plugin includes a WP-CLI command that you can execute with crontab.
Here is an example of configuration that you can add to your server:

    0 * * * * php /wordpress/wp-cli.phar dor vendor_order_reminder
