<?php
/*
Plugin Name: hidefeed shortcode
Version: 0.7.1.0
Plugin URI:
Description: `[hidefeed][/hidefeed]` で囲まれたコンテンツはフィードで出力されません
Author: Digitalcube
Author URI: https://www.digitalcube.jp
*/

function hidefeed_func( $atts, $content = '' ) {

	if ( is_feed() ) {
		$content = '';
	}

	return $content;
}
add_shortcode( 'hidefeed', 'hidefeed_func' );

// Add Quicktags
function hidefeed_quicktags() {

	if ( wp_script_is( 'quicktags' ) ) {
	?>
	<script type="text/javascript">
	QTags.addButton( 'hidefeed_code', 'hidefeed', '[hidefeed]', '[/hidefeed]', '', 'hidefeed shortcode', 1 );
	</script>
	<?php
	}

}
add_action( 'admin_print_footer_scripts', 'hidefeed_quicktags' );

/**
 * TinyMCE用のプラグインを登録する
 */
add_filter( 'mce_buttons', 'hidefeed_register_buttons' );
function hidefeed_register_buttons( $buttons ) {
	array_push( $buttons, 'hidefeed_shortcode' );
	return $buttons;
}

// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
add_filter( 'mce_external_plugins', 'hidefeed_register_tinymce_javascript' );

function hidefeed_register_tinymce_javascript( $plugin_array ) {
	$plugin_array['hidefeed_shortcode_script'] = plugins_url( '/tinymce-plugin.js', __FILE__ );
	return $plugin_array;
}
