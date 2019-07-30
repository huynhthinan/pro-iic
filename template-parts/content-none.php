<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Xeory-base
 */

?>

<section class="no-results not-found hentry">

	<div class="page-content entry-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'xeory-base' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'xeory-base' ); ?></p>

			<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'xeory-base' ); ?></p>
			<?php endif; ?>

		<?php if ( !( is_home() && current_user_can( 'publish_posts' ) ) ) : ?>

		<h2>１．検索して見つける</h2>
		<?php // ToDO: 翻訳 ?>
		<p>検索ボックスにお探しのコンテンツに該当するキーワードを入力して下さい。それに近しいページのリストが表示されます。</p>
		<?php do_action('content_none_search'); ?>

		<h2>２．カテゴリーから見つける</h2>
		<p>それぞれのカテゴリーのトップページからもう一度目的のページをお探しになってみて下さい。</p>

		<ul>
			<?php
			wp_list_categories(
				array(
					'title_li'  => '',
					'depth'     => 1
				)
			);
			?>
		</ul>

		<h2>３．無効なリンクを報告する</h2>
		<p>もし当サイト内で無効なリンクを発見された場合、どのページのどのリンクが無効だったかをご報告頂けると幸いです。今後とも、使いやすいサイトになるよう精進させていただきますのでよろしくお願いいたします。</p>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
