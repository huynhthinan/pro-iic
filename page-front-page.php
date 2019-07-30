<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Xeory-base
 */

get_header();

?>

<div id="sec01">
<?php echo do_shortcode('[metaslider id="164"]'); ?>
</div>
<div id="sec02">
	<h2>カービューティーアイアイシーとは？</h2>
	<h3>WHAT IS CAR BEAUTY ICY?</h3>
	<p class="txt01">ガラスコーティング、車のフィルム、デッドニング、スピーカー交換、<br>
本革張替えのトータルカービューティー</p>
	<p>ガラスコーティング、車のフィルム、デッドニング、スピーカー交換で人生と愛車を輝かす専門店。</p>
	<p>千葉県、東京都、神奈川県、埼玉県、茨城県、横浜、世田谷近郊からもご来店が多く、<br>
専門店としての知識、技術はもちろんのこと専門の設備を有している専門店です。</p>
	<p>工場見学、ご相談、比較などのご相談をお待ちしております。お客様サービスの向上を全社経営に努めております。</p>
	<p class="btn01 btn-df"><a href="#">初めてご利用される方はこちら</a></p>
</div>

<div id="sec03">
	<h2>商品メニュー</h2>
	<h3>PRODUCT MENU</h3>
	<?php 
		// get the current taxonomy term
		$terms = get_terms( 'tax_style' );
		echo '<div class="list-dl clearfix">';
		
		foreach( $terms as $cat ) {
			if($cat->parent == 0){
				echo '<dl><a href="'.get_term_link($cat->slug, 'tax_style').'"><dt>';
				echo "<img src='" . get_field('jirei_eyecatch', 'tax_style_'. $cat->term_id) . "' width='154px' height='96px' >";
				echo '</dt><dd>';//カテゴリ名取得
				echo $cat->name;//カテゴリ名取得
				//$t = get_field('jirei_eyecatch', 'tax_style_'. $cat->term_id);
				//echo $t;
				//echo $b = add_image_size($t,120, 180, true );
				echo '</dd></a></dl>';
			}
		}
		echo "</div>";
	?>
	
</div>
<div id="sec04">
	<h2>車のメンテンスに関する知識・お役立ちコラム</h2>
	<h3>COLUMN</h3>
	<p>車のメンテナンスに役立つ知識に関するコラム一覧。<br>
お役立ち情報にまつわる様々な豆知識をご紹介しております。</p>
<?php
// 記事一覧
$args = array(
	'post_type' => 'post', //投稿を表示
	'posts_per_page' => 8, //表示する件数
	'meta_query' => array(
		array(
			'key' => 'bzb_show_toppage_flag',
			'compare' => 'NOT EXISTS'
		),
		array(
			'key' => 'bzb_show_toppage_flag',
			'value' => 'none',
			'compare' => '!='
		),
		'relation' => 'OR'
	)
);

$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) :

	while ( $the_query->have_posts() ) : $the_query->the_post();

		do_action( 'xeory_before_entry' ); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php do_action( 'xeory_prepend_entry' ); ?>


			<?php do_action( 'xeory_after_entry-header' ); ?>

			<div class="entry-content">
				<?php do_action( 'xeory_append_entry-sec04' ); ?>
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); 
				the_title( sprintf( '<h2 class="entry-title">', esc_url( get_permalink() ), the_title_attribute('echo=0') ), '</h2>' );
				
				?>
				

			</div><!-- .entry-content -->

			<?php do_action( 'xeory_after_entry-content' ); ?>

			<?php do_action( 'xeory_append_entry' ); ?>

		</article><!-- #post-## -->

	<?php //do_action( 'xeory_after_entry' );

	endwhile;

endif;
wp_reset_query();
?>
	<p class="btn01 btn-df"><a href="#">記事一覧を見る</a></p>
</div>
<div id="sec05">
<h2>施工実績</h2>
	<h3>CASE</h3>
	<p>今まで弊社で施工させていただいたカーフィルムやカーコーティング、バイクの施工実績を掲載しております。<br>
ここではその一部を施工実績写真を使用し１つ１つご紹介いたします。</p>
	<div class="box01">
		<p class="btn01 btn-df"><a href="#">施工実績を見る</a></p>
	</div>
</div>
<div id="sec06">
<h2>車種・メーカー別で施工実績をみる</h2>
	<h3>MODEL / MANUFACTURER  CASE</h3>
	<p class="txt01">国産車、輸入車メーカー別の施工実績をご紹介いたします。</p>
	<p class="btn01">国産車メーカー別カーコーティング施工実績</p>
	<div class="box01 box-df"></div>
	<p class="btn02">輸入車メーカー別カーコーティング施工実績</p>
	<div class="box02 box-df"></div>
	<p class="btn03">メーカー別バイクコーティング施工実績</p>
	<div class="box03 box-df"></div>
</div>
<div id="sec07">
<h2>キャンペーン情報</h2>
	<h3>fasfasf</h3>
</div>
<div id="sec08">
<h2>初めてご利用される方へ</h2>
	<h3>fasfasf</h3>
</div>
<div id="sec09">
<h2>アイアイシーからのお知らせ・ニュース</h2>
	<h3>fasfasf</h3>
</div>





<?php

// get_template_part( 'template-' . BZB_TEMP . '/template', 'loop' );

//get_sidebar();
get_footer();