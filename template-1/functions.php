<?php
/**
 * function prefix: bzbsk_temp1_ (bzbshiki_template)
 */

function bzbsk_temp2_setup_image_size()
{
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

	// 画像サイズの指定
	//add_image_size('recommend_thumb', 113, 70, true);
	//add_image_size('main_thumb', 718, 380, true);
	add_image_size('loop_thumb', 1200, 700, true);
	add_image_size('top_case_thumb', 400, 266, true); //トップの施工事例画像
}
add_action( 'after_setup_theme', 'bzbsk_temp2_setup_image_size' );


/*--------------------------------------------------------------------------
	自作関数エリア
--------------------------------------------------------------------------*/

/*------ パンくず表記変更 ------*/
function bzbsk_temp1_breadcrumbs()
{
	ob_start();//バッファリング
	xeory_breadcrumbs();
	$bc = ob_get_clean();

	echo preg_replace('/HOME/', 'ホーム', $bc, 1);
}


/*------ 検索フォーム（add_filter用） ------*/
add_filter( 'get_search_form', 'bzbsk_temp1_custom_searchform' );
function bzbsk_temp1_custom_searchform( $form )
{
	$form = "<form role=\"search\" method=\"get\" class=\"search-form\" action=\"" . home_url() . "\">
				<label>
					<span class=\"screen-reader-text\">検索:</span>
					<input type=\"search\" class=\"search-field\" placeholder=\"フリーワード検索\" value=\"\" name=\"s\" />
				</label>
				<input type=\"submit\" class=\"search-submit\" value=\"&#xf002;\" />
			</form>\n";
	return $form;
}


/*------ 検索フォーム（add_action用） ------*/
function bzbsk_temp1_searchform()
{
	echo '<div class="search-wrap">';
	get_search_form( true );
	echo '</div>';
}


/*------ loopで表示するサムネイル ------*/
function bzbsk_temp1_loop_thumb_w_cat()
{
	global $post;//関数外にある変数$postを関数内で使えるようにする

	$thumbnail = get_the_post_thumbnail( $post->ID, $size = 'loop_thumb');
	$category = get_the_category();//カテゴリの配列
	$name = "";

	//その投稿が属しているカテゴリーの数だけループさせる
	foreach( $category as $cat ) {
		$name .= $cat->cat_name . ', ';//カテゴリ名取得
	}

	$cat_name = rtrim($name, ', ');//最後のカテゴリ名後のカンマを削除

	echo "<figure class=\"entry-thumbnail\">";
	echo "<a href=\"" . get_the_permalink( $post->ID ) . "\">" . $thumbnail . "</a>";
	echo "<p class=\"cat\">" . $cat_name . "</p>";
	echo "</figure>";
}

/*------ loopで表示するサムネイル ------*/
function bzbsk_temp1_loop_sec03()
{
	global $post;//関数外にある変数$postを関数内で使えるようにする

		
	$thumbnail = get_the_post_thumbnail( $post->ID, $size = 'loop_thumb');
	$category = get_the_category();//カテゴリの配列
	$name = "";
	var_dump($category);
	//その投稿が属しているカテゴリーの数だけループさせる
	foreach( $category as $cat ) {
		
		$name .= $cat->cat_name . ', ';//カテゴリ名取得
	}

	$cat_name = rtrim($name, ', ');//最後のカテゴリ名後のカンマを削除
	
	echo $cat_name;
}

function bzbsk_temp1_loop_sec04()
{
	global $post;//関数外にある変数$postを関数内で使えるようにする

		
	$thumbnail = get_the_post_thumbnail( $post->ID, $size = 'loop_thumb');
	$category = get_the_category();//カテゴリの配列
	$name = "";
	//その投稿が属しているカテゴリーの数だけループさせる
	foreach( $category as $cat ) {
		
		$name .= $cat->description . ', ';//カテゴリ名取得
	}

	$cat_name = rtrim($name, ', ');//最後のカテゴリ名後のカンマを削除
	
	echo $thumbnail;
}


/*------ singleとpageで使用するアイキャッチ ------*/
function bzbsk_eye_catch_is_singular()
{
	global $post;//関数外にある変数$postを関数内で使えるようにする

	echo "<figure class=\"entry-thumbnail\">";
	echo "<a href=\"" . get_the_permalink( $post->ID ) . "\">" . the_post_thumbnail('full') . "</a>";
	echo "</figure>";
}


/*------ loopで表示するコンテンツを抜粋表示 ------*/
function bzbsk_temp1_loop_content()
{
	global $post;//関数外にある変数$postを関数内で使えるようにする

	$moji = 50;//表示したい文字数（変更可）
	$p_substr = mb_substr(strip_tags($post->post_content), 0, $moji);
	$more = "<a href=\"" . get_permalink($post->ID) . "\">続きを読む</a>";
	$date = get_the_time("Y/n/j");//日付表示はY年n月j日のように変更可

	//出力するHTMLソースは書き換え可
	echo "<p class=\"cont-str\">" . $p_substr . "…</p>
	<ul class=\"entry-meta\">
	<li class=\"date\"><span><i class=\"fa fa-clock-o\"></i></span>&nbsp;" . $date . "</li>
	<li class=\"more\">" . $more . "</li>\n</ul>";
}


/*------ loopで表示するカテゴリー、日付 ------*/
function bzbsk_cat_w_date_is_single()
{
	$category = get_the_category();//カテゴリの配列
	$date = get_the_time("Y.n.j");//日付表示はY年n月j日のように変更可
	$modified = get_the_modified_date("Y.n.j");//更新日
	$length = count($category);
	$num = 0;

	echo "<ul class=\"entry-meta\">
			<li class=\"cat\">";

	//その投稿が属しているカテゴリーの数だけループさせる
	foreach( $category as $cat ) {
		echo '<a href="' . get_category_link( $cat->cat_ID ) . '">' . $cat->name . '</a>';
		$num++;

		if( $num !== $length ) {
			echo ', ';
		}
	}

	echo "</li>
		<li class=\"date\"><time itemprop=\"datePublished\" datetime=\"" . get_the_time('c') . "\">" . $date . "</time></li>\n";

		if( $modified > $date ) {
			echo "<li class=\"modified\">更新日：<time itemprop=\"dateModified\" datetime=\"" . get_the_modified_time('c') . "\">" . $modified . "</time></li>\n";
		}

	echo "</ul>";
}


/*------ コピーライトの出力 ------*/
function bzbsk_temp1_copyright()
{
	$blog_name = get_bloginfo('name');
	$current_year = date_i18n('Y');
	echo '<p>All Rights Reserved,Copyright（C）' . $current_year . '<span>' . $blog_name . '</span>Co.,Ltd.</p>';
}


/*--------------------------------------------------------------------------
	remove・addエリア

	デフォルトで入っている関数リスト
	remove_action( 'xeory_prepend_entry-content', 'xeory_add_post_thumbnail' );//アイキャッチ
	remove_action( 'xeory_prepend_container', 'xeory_breadcrumbs' );//パンくず表記変更前
	remove_action( 'xeory_prepend_entry-header', 'xeory_base_posted_on' );//日付
	remove_action( 'xeory_after_entry', array( Xeory_Core::$xeory_users, 'bzb_show_avatar' ), 10 );//著者情報
	remove_action('xeory_append_entry', array(Xeory_Core::$xeory_core_cta->User_Post_Controller, 'show_cta_under_post'), 11);//CTA
--------------------------------------------------------------------------*/

/*------ after_all関数を最後に読み込む指示 ------*/
add_action( 'template_redirect', 'after_all' );

/*------ 一番最後に読み込む関数 ------*/
function after_all()
{
	//ここにadd・removeを記述
	//add_action( 'xeory_after_site-footer', 'bzbsk_float_cta' );//下固定バナー

	remove_action('xeory_prepend_entry-content', 'xeory_add_post_thumbnail');//アイキャッチ
	remove_action( 'xeory_prepend_entry-header', 'xeory_base_posted_on' );//日付

	//検索結果・カテゴリーなし
	add_action('content_none_search', 'bzbsk_temp1_searchform');//検索窓

	//コピーライト
	add_action('xeory_append_site-info', 'bzbsk_temp1_copyright');

	/*------ トップページ、カテゴリ、検索結果の時 ------*/
	if(is_home() || is_front_page() || is_archive() || is_search()) {

		//ここにadd・removeを記述
		add_action('xeory_prepend_entry-header', 'bzbsk_temp1_loop_thumb_w_cat');//アイキャッチ
		add_action('xeory_append_entry-content', 'bzbsk_temp1_loop_content');//本文抜粋 
		add_action('xeory_append_entry-sec03', 'bzbsk_temp1_loop_sec03');//本文抜粋 
		add_action('xeory_append_entry-sec04', 'bzbsk_temp1_loop_sec04');//本文抜粋 
	}

	/*------ 投稿ページの時 ------*/
	if(is_single()) {
		//ここにadd・removeを記述
		add_action('xeory_prepend_entry-header', 'bzbsk_cat_w_date_is_single');//カテゴリーと日付
		add_action('xeory_prepend_entry-content', 'bzbsk_eye_catch_is_singular');//アイキャッチ

		//SNSボタンをアイキャッチ下に移動
		remove_action('xeory_after_entry-header', array( Xeory_Core::$xeory_social->model_sb, 'model_social_buttons'));
		add_action('xeory_prepend_entry-content', array( Xeory_Core::$xeory_social->model_sb, 'model_social_buttons'));

		//著者情報
		remove_action( 'xeory_after_entry', array( Xeory_Core::$xeory_users, 'bzb_show_avatar' ), 10 );
		add_action( 'xeory_prepend_underpost-widget', array( Xeory_Core::$xeory_users, 'bzb_show_avatar' ), 10 );
	}

	/*------ 固定ページの時 ------*/
	if(is_page()) {
		//記事上のSNSボタン削除
		remove_action('xeory_after_entry-header', array( Xeory_Core::$xeory_social->model_sb, 'model_social_buttons'));
		//記事下のSNSボタン削除
		remove_action('xeory_prepend_entry-footer', array( Xeory_Core::$xeory_social->model_sb, 'model_social_buttons'));

		add_action('xeory_prepend_entry-content', 'bzbsk_eye_catch_is_singular');//アイキャッチ
	}
}