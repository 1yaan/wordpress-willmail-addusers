<?php
/**
 * WP WiLL Mail Put Settings.
 *
 * @since      0.1.0
 * @version    0.1
 * @package    wp-bitcoin-chart
 * @subpackage wp-bitcoin-chart/includes
 * @author     1yaan, {@link https://github.com/1yaan https://github.com/1yaan}
 * @copyright  1yaan, {@link https://github.com/1yaan https://github.com/1yaan}
 * @license    GPLv2 or later, {@link https://www.gnu.org/licenses/gpl.html https://www.gnu.org/licenses/gpl.html}
 */

if ( ! empty( $_POST ) and check_admin_referer( 'wp-willmail-put-settings', 'wwp-nonce' ) ) {
	$wp_willmail_put_target_db_id = $_POST['wp_willmail_put_target_db_id'];
	$wp_willmail_put_account_key  = $_POST['wp_willmail_put_account_key'];
	$wp_willmail_put_api_key      = $_POST['wp_willmail_put_api_key'];

	update_option( 'wp_willmail_put_target_db_id', $wp_willmail_put_target_db_id );
	update_option( 'wp_willmail_put_account_key', $wp_willmail_put_account_key );
	update_option( 'wp_willmail_put_api_key', $wp_willmail_put_api_key );

	$wwp_test = $_POST['wp_willmail_put_test'];

	if ( ! empty( $wwp_test ) ) {
		$wwp_test_put = array_values( array_filter( array_map( 'trim', explode( "\n", $wwp_test ) ), 'strlen' ) );
		if ( 2 == count( $wwp_test_put ) ) {
			$wwp_test_put = json_encode( array_combine( explode( ',', $wwp_test_put[0] ), explode( ',', $wwp_test_put[1] ) ) );
			$url          = WWP__WILLMAIL_URL . $wp_willmail_put_account_key . '/' . $wp_willmail_put_target_db_id . '/put';

			// Connect with REST API using curl.
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
			?>
			<div class="updated fade">
				<p><strong>テストに成功しました。WiLL Mailにログインして、データが登録されていることをご確認ください。
						重複したデータを入力した場合は、通信に成功してもデータは登録されません。</strong></p>
			</div>
			<?php
		} else {
			?>
				<div class="error"><p><strong>データの入力に誤りがあります。ご確認ください。</strong></p></div>
			<?php
		}
	}
?>
	<div class="updated fade"><p><strong>設定が保存されました。</strong></p></div>
<?php
} else {
	$wp_willmail_put_target_db_id = get_option( 'wp_willmail_put_target_db_id' );
	$wp_willmail_put_account_key  = get_option( 'wp_willmail_put_account_key' );
	$wp_willmail_put_api_key      = get_option( 'wp_willmail_put_api_key' );
	$wwp_test                     = '';
}
?>
<div class="wrap">
	<h2>WP WiLL Mail Put Settings</h2>
	<div class="settings_main">
		<h3>How to settings.</h3>
		<ol>
			<li><a href="https://willap.jp/login?wordpres-plugin=wp-willmail-put" target="_blank">WiLL Cloud ログイン</a>より、ログインしてください。</li>
			<li>まずはメニューの「データベース」から、「データベース設計」を選択してください。</li>
			<li>"ターゲットDB"を作成ください。ご不明点はWiLL Mailのサポートセンターへどうぞ！ターゲットDBのIDを以下のフォームへ設定してください。</li>
			<li>次にメニューの「アカウント」から、「API情報」を選択してください。</li>
			<li>API情報画面にて表示される"アカウントキー"と"APIキー"を以下のフォームへ設定してください。</li>
			<li>これで準備完了です。あとは、Contact form 7にて、同じフィールド名を持つフォームを作成してください。</li>
		</ol>
		<form action="" method="post">
			<?php
			// おまじない.
			wp_nonce_field( 'wp-willmail-put-settings', 'wwp-nonce' );

			echo <<<EOD
<table class="form-table">
	<tr valign="top">
		<th><label for="wp_willmail_put_target_db_id">ターゲットDB ID</label></th>
		<td><input type="text" name="wp_willmail_put_target_db_id" value="{$wp_willmail_put_target_db_id}" class="regular-text"></td>
	</tr>
	<tr valign="top">
		<th><label for="wp_willmail_put_account_key">アカウントキー</label></th>
		<td><input type="text" name="wp_willmail_put_account_key" value="{$wp_willmail_put_account_key}" class="regular-text"></td>
	</tr>
	<tr valign="top">
		<th><label for="wp_willmail_put_api_key">API キー</label></th>
		<td><input type="text" name="wp_willmail_put_api_key" value="{$wp_willmail_put_api_key}" class="regular-text"></td>
	</tr>
</table>
EOD;
?>
			<p class="submit">
				<input type="submit" name="Submit" class="button-primary" value="設定">
			</p>

			<hr>
			<br>

			<h3>【上級者向け】お試し送信</h3>
			<p>
				WiLL Mailへきちんと接続できているのか、お試し用のフォームを用意しました。下のフィールドへCSV形式でターゲットDBへ送信する内容を入力し、送信ボタンを押してください。<br>
				1列目がキー（フィールド名）、2列目が値（これから入力してもらうデータ）を入力してください。<br>
				例）<br>
				email,prefecture,tel,name<br>
				test@example.jp,東京都,00-0000-0000,田中太郎<br>
			</p>
<?php
echo <<<EOD
<textarea name="wp_willmail_put_test" style="width:100%;height:100px;" placeholder="{ 'email': 'test@example.jp', 'name': 'テスト' }">{$wwp_test}</textarea>
EOD;
?>
			<h4>注意</h4>
			<ul>
				<li>データの構造（JSONオブジェクト構造）については、API情報の"データベースAPI情報"を参照ください。送信できるデータは1つのみです。</li>
				<li>送信データに空白を含めることはできません。空白はプログラム内で除去されます。</li>
			</ul>
			<p class="submit">
				<input type="submit" name="Submit" class="button-primary" value="送信">
			</p>
		</form>
	</div>
	<div class="settings_right">
		<dl>
			<dt>Github<dt>
			<dd><a href="https://github.com/1yaan/wp-willmail-put" target="_blank">1yaan/wp-willmail-put</a></dd>
			<dt>Travis CI</dt>
			<dd><a href="https://travis-ci.org/1yaan/wp-willmail-put" target="_blank">1yaan/wp-willmail-put</a></dd>
		</dl>
	</div>
</div>

<style>
.settings_main {
	background: none repeat scroll 0 0 #F3F1EB;
	border: 1px solid #DEDBD1;
	padding: 10px;
	width: 750px;
	height: auto;
	float: left;
}

.settings_right {
	float: right;
	width: 222px;
}
</style>
