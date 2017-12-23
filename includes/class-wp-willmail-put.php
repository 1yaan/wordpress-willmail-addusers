<?php
/**
 * WordPress WiLL Mail Put.
 *
 * @since      0.1.0
 * @version    0.1
 * @package    wp-bitcoin-chart
 * @subpackage wp-bitcoin-chart
 * @author     1yaan, {@link https://github.com/1yaan https://github.com/1yaan}
 * @copyright  1yaan, {@link https://github.com/1yaan https://github.com/1yaan}
 * @license    GPLv2 or later, {@link https://www.gnu.org/licenses/gpl.html https://www.gnu.org/licenses/gpl.html}
 */

/**
 * Wp_Willmail_Put
 */
class Wp_Willmail_Put {

	/**
	 * Construct.
	 *
	 * @since  0.1.0
	 * @access public
	 */
	public function __construct() {
		$this->load_dependencies();
		$this->define_public_hooks();
	}

	/**
	 * Loads the required dependencies for this plugin.
	 *
	 * @since  0.1.0
	 * @access private
	 */
	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wwp-public.php';
	}

	/**
	 * Define public hooks.
	 *
	 * @since  0.1.0
	 * @access private
	 */
	private function define_public_hooks() {
		$plugin_public = new WWP_Public();
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since  0.1.0
	 * @access public
	 */
	public function run() {
	}
}
