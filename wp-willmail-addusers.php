<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * Plugin Name: WP Willmail Addusers
 * Plugin URI:  https://1yaan.github.io/wp-willmail-addusers/
 * Description: This is WordPress plugin. This plugin will add users to Willmail.
 * Version:     0.1.0
 * Author:      1yaan
 * Author URI:  https://github.com/1yaan
 * License:     GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl.html
 * Domain Path: /languages/
 * Text Domain: wp_willmail_addusers
 *
 * @link        https://github.com/1yaan/wp-willmail-addusers
 * @since       0.1.0
 * @package     wp-willmail-addusers
 */

/*
Copyright 2017 1yaan

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Make sure we don't expose any info if called directly.
if ( ! function_exists( 'add_action' ) ) {
	echo "Hi there! I'm just a plugin, not much I can do when called directly.";
	exit;
}

// This plugin version.
define( 'WWA__VERSION', '0.1' );
// The absolute path of the directory that contains the file, with trailing slash ("/").
define( 'WWA__PLUGIN_NAME', 'wp-willmail-addusers' );
define( 'WWA__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'WWA__PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'WWA__PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

define( 'WWA__WILLMAIL_URL', 'https://willap.jp/api/rest/1.0.0/customers/' );

/*
 * The code that runs during plugin activation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-wwa-activator.php';
register_activation_hook( __FILE__, array( 'WWA_Activator', 'activate' ) );

/*
 * The code that runs during plugin activation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-wwa-deactivator.php';
register_deactivation_hook( __FILE__, array( 'WWA_Deactivator', 'deactivate' ) );

require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-willmail-addusers.php';

/*
 * Begin execution of the plugin.
 */
if ( defined( 'WPCF7_VERSION' ) ) {
	// すべての動作は、contact form 7 があるときにしか動かない.
	$wp_willmail_addusers = new Wp_Willmail_Addusers();
	$wp_willmail_addusers->run();
}

if ( is_admin() ) {
	require_once WPCF7_PLUGIN_DIR . '/admin/admin.php';
}
