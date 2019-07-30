<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Xeory-base
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php do_action( 'xeory_prepend_content-area' ); ?>

		<main id="main" class="site-main" role="main">

			<?php do_action( 'xeory_before_entry' ); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php do_action( 'xeory_prepend_entry' ); ?>

				<header class="entry-header">

					<?php do_action( 'xeory_prepend_entry-header' ); ?>

					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

					<?php do_action( 'xeory_append_entry-header' ); ?>

				</header><!-- .entry-header -->

				<?php do_action( 'xeory_after_entry-header' ); ?>

				<div class="entry-content">

					<?php do_action( 'xeory_prepend_entry-content' ); ?>

					<p>この度は当サイトにお問い合わせいただきまして、誠にありがとうございます。</p>
					<p>折り返しご連絡させていただきますが、数日お時間をいただく場合がございます。</p>
					<p>何卒ご了承くださいませ。</p>
					<p><a href="<?php echo home_url()."/";?>">トップページに戻る</a></p>

					<?php do_action( 'xeory_append_entry-content' ); ?>

				</div><!-- .entry-content -->

				<?php do_action( 'xeory_after_entry-content' ); ?>

				<footer class="entry-footer">

					<?php do_action( 'xeory_prepend_entry-footer' ); ?>

					<?php
						edit_post_link(
							sprintf(
								/* translators: %s: Name of current post */
								esc_html__( 'Edit %s', 'xeory-base' ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							),
							'<span class="edit-link">',
							'</span>'
						);
					?>

					<?php do_action( 'xeory_append_entry-footer' ); ?>

				</footer><!-- .entry-footer -->

				<?php do_action( 'xeory_append_entry' ); ?>

			</article><!-- #post-## -->

			<?php do_action( 'xeory_after_entry' ); ?>

			<?php do_action( 'xeory_append_site-main' ); ?>

		</main><!-- #main -->

		<?php do_action( 'xeory_append_content-area' ); ?>

	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
