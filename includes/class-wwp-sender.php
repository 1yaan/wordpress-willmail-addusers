<?php
/**
 * This class sends information to WiLLMail.
 *
 * @since      1.0.0
 * @version    1.0.0
 * @package    wp-willmail-put
 * @subpackage wp-willmail-put/includes
 * @author     1yaan, {@link https://github.com/1yaan https://github.com/1yaan}
 * @copyright  1yaan, {@link https://github.com/1yaan https://github.com/1yaan}
 * @license    GPLv2 or later, {@link https://www.gnu.org/licenses/gpl.html https://www.gnu.org/licenses/gpl.html}
 */

/**
 * WWP_Sender
 */
class WWP_Sender {

	/**
	 * put
	 *
	 * @access public
	 * @since  1.0.0
	 * @param  array   $body Input fields.
	 * @return array
	 */
	public static function put( $body ) {

		$wp_willmail_put_target_db_id = get_option( 'wp_willmail_put_target_db_id' );
		$wp_willmail_put_account_key  = get_option( 'wp_willmail_put_account_key' );
		$wp_willmail_put_api_key      = get_option( 'wp_willmail_put_api_key' );

		$url          = WWP__WILLMAIL_URL . $wp_willmail_put_account_key . '/' . $wp_willmail_put_target_db_id . '/put';

		// Connect with REST API using curl.
		/*
		$curl = curl_init();
		curl_setopt( $curl, CURLOPT_URL, $url );
		curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, 'POST' ); // post.
		curl_setopt( $curl, CURLOPT_USERPWD, $wp_willmail_put_account_key . ':' . $wp_willmail_put_api_key );
		curl_setopt( $curl, CURLOPT_POSTFIELDS, $wwp_test_put ); // jsonデータを送信.
		curl_setopt( $curl, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json' ) ); // リクエストにヘッダーを含める.
		curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $curl, CURLOPT_HEADER, true );

		$response = curl_exec( $curl );
		$result   = json_decode( $response, true );
		*/

		$auth = base64_encode( $wp_willmail_put_account_key . ':' . $wp_willmail_put_api_key );

		$args = array(
			'method'      => 'POST',
	    'body'        => json_encode( $body ),
	    'blocking'    => true,
			'sslverify'   => false,
			'httpversion' => '1.0',
	    'headers' => array(
				'Content-Type'  => 'application/json',
				'Authorization' => 'Basic ' . $auth
			),
	    'cookies' => array()
		);

		$response = wp_remote_post( $url, $args );

		if ( is_wp_error( $response ) ) {
		   $error_message = $response->get_error_message();
		   echo "Something went wrong: $error_message";
		} else {
		   echo 'Response:<pre>';
		   print_r( $response );
		   echo '</pre>';
		}
	} // end put
}
