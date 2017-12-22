<?php
/**
 * Wordpress WiLL Mail AddUsers.
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
 * WpWillmailAddusers
 */
class WpWillmailAddusers {

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string $plugin_name
	 */
	protected $plugin_name;

	/**
	 * The current version of this plugin.
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string $version
	 */
	protected $version;

	/**
	 * Construct.
	 *
	 * @since  0.1.0
   * @access public
	 */
	public function __construct(){
			$this->plugin_name = WWA__PLUGIN_NAME;
			$this->version = WWA__VERSION;
			$this->load_dependencies();
			$this->define_public_hooks();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since  0.1.0
	 * @access private
	 * @return string The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since  0.1.0
	 * @access private
	 * @return string The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Loads the required dependencies for this plugin.
	 *
	 * @since  0.1.0
	 * @access private
	 */
	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wp-willmail-addusers-public.php';
	}

	/**
	 * Define public hooks.
	 *
	 * @since  0.1.0
	 * @access private
	 * @return string The version number of the plugin.
	 */
	public function define_public_hooks() {
		$plugin_public = new WWA_Public( $this->get_plugin_name(), $this->get_version() );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since  0.1.0
	 * @access private
	 */
	public function run() {
	}
}
