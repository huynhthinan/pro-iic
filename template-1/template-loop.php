<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Xeory-base
 */

?>

<div id="primary" class="content-area">

		<?php do_action( 'xeory_prepend_content-area' ); ?>

		<main id="main" class="site-main" role="main">

			<?php do_action( 'xeory_prepend_site-main' ); ?>

		<?php
	if ( have_posts() ) :

		if ( is_archive()) : ?>
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

		<?php elseif (is_search()) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'xeory-base' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php
			endif;

			$num = 0;

			while ( have_posts() ) : the_post(); $num++;

			do_action( 'xeory_before_entry' ); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php do_action( 'xeory_prepend_entry' ); ?>

				<header class="entry-header">

					<?php do_action( 'xeory_prepend_entry-header' ); ?>

					<?php do_action( 'xeory_append_entry-header' ); ?>

				</header><!-- .entry-header -->

				<?php do_action( 'xeory_after_entry-header' ); ?>

				<div class="entry-content">

					<?php do_action( 'xeory_prepend_entry-content' ); ?>

					<?php
						if ( is_single() ) {
							the_title( '<h1 class="entry-title">', '</h1>' );
						} else {
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						}
					?>

					<?php do_action( 'xeory_append_entry-content' ); ?>

				</div><!-- .entry-content -->

				<?php do_action( 'xeory_after_entry-content' ); ?>

				<?php
					if ( is_single() ) {
						?>
				<footer class="entry-footer">

					<?php do_action( 'xeory_prepend_entry-footer' ); ?>
					<?php xeory_base_entry_footer(); ?>
					<?php do_action( 'xeory_append_entry-footer' ); ?>

				</footer><!-- .entry-footer -->

						<?php
					}
				?>

				<?php do_action( 'xeory_append_entry' ); ?>

			</article><!-- #post-## -->

		<?php do_action( 'xeory_after_entry' );

		endwhile;

			pagination($wp_query->max_num_pages);

		else :

		?>

		<?php if(is_search()) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'xeory-base' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php endif;

			get_template_part( 'template-parts/content', 'none' );

			endif;

			do_action( 'xeory_append_site-main' ); ?>

			</main><!-- #main -->

			<?php do_action( 'xeory_append_content-area' ); ?>

		</div><!-- #primary -->