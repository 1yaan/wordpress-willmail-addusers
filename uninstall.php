<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @since      0.1.0
 * @version    0.1
 * @package    wp-bitcoin-chart
 * @subpackage wp-bitcoin-chart/includes
 * @author     1yaan, {@link https://github.com/1yaan https://github.com/1yaan}
 * @copyright  1yaan, {@link https://github.com/1yaan https://github.com/1yaan}
 * @license    GPLv2 or later, {@link https://www.gnu.org/licenses/gpl.html https://www.gnu.org/licenses/gpl.html}
 */

// If uninstall, not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
