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
	echo '<p>設定を登録しました！</p>';
}
?>
<div class="wrap">
	<h2>WP WiLL Mail Put Settings</h2>
	<div class="settings_main">
		<form action="" method="post">
			<?php
			// おまじない.
			wp_nonce_field( 'wp-willmail-put-settings', 'wwp-nonce' );
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
