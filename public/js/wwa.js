jQuery(document).ready(function() {
  console.log( 'WP WiLLMail AddUsers javascript file ready.' );
  wwa_get_data();
});

function wwa_get_data( target_this ) {
  console.log( 'wp_bitcoin_chart_data' );

  // canvasをローダー表示する
  console.log( 'now loading....' );

  jqxhr = jQuery.ajax({
    url : wp_bitcoin_chart_ajax.ajax_url,
    type : 'post',
    dataType: 'json',
    cache : false,
    data : { 'action': 'update_views' },
  })
  .then(
    // Success callback
    function( response ) {
      // ローダーを消す
      console.log( 'out loader!' );
      // グラフを入れ替える
      console.log( 'ajax success' );
      console.log( response );
    },
    // Failed callback
    function( jqXHR, textStatus, errorThrown ) {
      // エラーメッセージを表示する
      console.log( 'out loader' );
      console.log( 'ajax failed' );
    }
  );
}
