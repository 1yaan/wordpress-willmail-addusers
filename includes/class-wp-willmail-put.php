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

		// Contact formへのフック
		add_action( 'wpcf7_submit', array( $this, 'wwp_cf7_submit' ), 10, 2 );
		add_action( 'wpcf7_mail_sent', array( $this, 'wwp_cf7_mail_sent' ), 10, 1 );
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
	 * $_REQUESTのデータをすべてWiLL Mailへ送信する.
	 *
	 * @return void
	 */
	private function wwp_put() {
		if ( ! empty( $_REQUEST ) ) {
			$wp_willmail_put_target_db_id = get_option( 'wp_willmail_put_target_db_id' );
			$wp_willmail_put_account_key  = get_option( 'wp_willmail_put_account_key' );
			$wp_willmail_put_api_key      = get_option( 'wp_willmail_put_api_key' );
			$url                          = WWP__WILLMAIL_URL . $wp_willmail_put_account_key . '/' . $wp_willmail_put_target_db_id . '/put';

			// Connect with REST API using curl.
			$curl = curl_init();
			curl_setopt( $curl, CURLOPT_URL, $url );
			curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, 'POST' ); // post.
			curl_setopt( $curl, CURLOPT_USERPWD, $wp_willmail_put_account_key . ':' . $wp_willmail_put_api_key );
			curl_setopt( $curl, CURLOPT_POSTFIELDS, json_encode( $_REQUEST ) ); // jsonデータを送信.
			curl_setopt( $curl, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json' ) ); // リクエストにヘッダーを含める.
			curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $curl, CURLOPT_HEADER, true );
			$response = curl_exec( $curl );
		}
	}

	/**
	 * Contact Form 7 のメール送信時に、$_REQUESTのデータをすべてWiLL Mailへ送信する.
	 *
	 * @param  Object $cf Contact Form クラス
	 * @return void
	 */
	public function wwp_cf7_mail_sent( $cf ) {
		if( array_key_exists( 'wwp_mail', $_REQUEST ) ) {
			$this->wwp_put();
		}
	}

	/**
	 * Contact Form 7 のsubmit時に、$_REQUESTのデータをすべてWiLL Mailへ送信する.
	 *
	 * @param  Object $cf Contact Form クラス
	 * @param  array $result Contact Formのレスポンス.
	 * @return void
	 */
	public function wwp_cf7_submit( $cf, $result ) {
		if( array_key_exists( 'wwp_submit', $_REQUEST ) and ! in_array( 'validation_failed', $result ) ) {
			$this->wwp_put();
		}
	}
}
