<?php
/**
 * function prefix: bzbsk_temp_ (bzbshiki_template)
 */

define( 'BZB_TEMP', 1 );

/*外部ファイルの読み込み（必ず子テーマにcss or jsフォルダを作る）*/
function bzbsk_temp_wp_enqueue_scripts()
{
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );//cssファイルの場合
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/template-' . BZB_TEMP . '/sass/child-style.css' );
	wp_enqueue_script( 'pagetop', get_stylesheet_directory_uri() . '/js/pagetop.js' );
	wp_enqueue_script( 'app', get_stylesheet_directory_uri() . '/js/app.js' );
	//wp_enqueue_style('float-cta', get_stylesheet_directory_uri() . '/float-cta/float-cta.css' );//下固定バナーcss
	//wp_enqueue_script('float-cta', get_stylesheet_directory_uri() . '/float-cta/float-cta.js' );//下固定バナーjs
}
add_action( 'wp_enqueue_scripts', 'bzbsk_temp_wp_enqueue_scripts' );


//管理画面スタイルの反映
add_editor_style("template-" . BZB_TEMP . "/admin/editor-style.css");


//タイトルタグ内に不要なディスクリ等が入らないようにする
if(!function_exists('bzbsk_temp_custom_title')) {
	function bzbsk_temp_custom_title( $title )
	{
		if(!is_feed()) {
			$title['tagline'] = '';
			$title['site'] = '';
		}

		return $title;
	}
}
add_filter( 'document_title_parts', 'bzbsk_temp_custom_title', 10, 2 ); //フィルターフックで処理を上書き


remove_filter('pre_user_description', 'wp_filter_kses');//セーブのタイミングでプロフィール情報のHTMLタグを削除する
add_filter('pre_user_description', 'wp_filter_post_kses');//プロフィール情報のHTMLタグを削除しないようにする


/*------ Delete version for css and js ------*/
function bzbsk_temp_remove_wp_ver_css_js( $src )
{
	if( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}
add_filter( 'style_loader_src', 'bzbsk_temp_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'bzbsk_temp_remove_wp_ver_css_js', 9999 );


/*------ contactform7 ------*/
add_action( 'wp_footer', 'bzbsk_temp_cf7_form_submit' );
function bzbsk_temp_cf7_form_submit()
{
	global $post;

	if( isset($post) ) {
		$slug = $post->post_name;
		?>
		<script type="text/javascript">
			document.addEventListener( 'wpcf7mailsent', function( event ) {
				window.location.href = '<?php echo get_home_url(); ?>/thanks?from=<?php echo $slug;?>';
			}, false );
		</script>
		<?php
	}
}


/*------ 下固定バナー ------*/
function bzbsk_float_cta()
{
	get_template_part( 'float-cta/float', 'cta' );
}


require_once('template-' . BZB_TEMP . '/functions.php');
