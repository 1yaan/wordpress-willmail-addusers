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
	update_option( 'wp_willmail_put_target_db_id', $_POST['wp_willmail_put_target_db_id'] );
	update_option( 'wp_willmail_put_account_key', $_POST['wp_willmail_put_account_key'] );
	update_option( 'wp_willmail_put_api_key', $_POST['wp_willmail_put_api_key'] );
?>
	<div class="updated fade"><p><strong><?php _e( 'Options saved.' ); ?></strong></p></div>
<?php
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

			// 初期値.
			$wp_willmail_put_target_db_id = get_option( 'wp_willmail_put_target_db_id' );
			$wp_willmail_put_account_key  = get_option( 'wp_willmail_put_account_key' );
			$wp_willmail_put_api_key      = get_option( 'wp_willmail_put_api_key' );

			echo <<<EOD
<table class="form-table">
	<tr valign="top">
		<th><label for="wp_willmail_put_target_db_id">ターゲットDB ID</label></th>
		<td><input name="wp_willmail_put_target_db_id" id="wp_willmail_put_target_db_id" type="text" value="{$wp_willmail_put_target_db_id}" class="regular-text" /></td>
	</tr>
	<tr valign="top">
		<th><label for="wp_willmail_put_account_key">アカウントキー</label></th>
		<td><input name="wp_willmail_put_account_key" id="wp_willmail_put_account_key" type="text" value="{$wp_willmail_put_account_key}" class="regular-text" /></td>
	</tr>
	<tr valign="top">
		<th><label for="wp_willmail_put_api_key">API キー</label></th>
		<td><input name="wp_willmail_put_api_key" id="wp_willmail_put_api_key" type="text" value="{$wp_willmail_put_api_key}" class="regular-text" /></td>
	</tr>

</table>
EOD;
?>
			<p class="submit">
				<input type="submit" name="Submit" class="button-primary" value="設定">
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
