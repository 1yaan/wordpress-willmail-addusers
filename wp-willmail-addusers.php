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
 * Plugin URI:  https://github.com/1yaan/wp-willmail-addusers
 * Description: This is WordPress plugin. This plugin will add users to Willmail.
 * Version:     0.1.0
 * Author:      1yaan
 * Author URI:  https://github.com/1yaan
 * License:     GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl.html
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
define( 'WP_WILLMAIL_ADDUSERS__VERSION', '0.1' );
// The absolute path of the directory that contains the file, with trailing slash ("/").
define( 'WP_WILLMAIL_ADDUSERS__PLUGIN_NAME', 'wp-bitcoin-chart' );
define( 'WP_WILLMAIL_ADDUSERS__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'WP_WILLMAIL_ADDUSERS__PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'WP_WILLMAIL_ADDUSERS__PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
