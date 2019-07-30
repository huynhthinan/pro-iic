<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Xeory-base
 */

?>

<?php do_action( 'xeory_before_entry' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php do_action( 'xeory_prepend_entry' ); ?>

	<header class="entry-header">

		<?php do_action( 'xeory_prepend_entry-header' ); ?>

		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>

		<?php do_action( 'xeory_append_entry-header' ); ?>

	</header><!-- .entry-header -->

	<?php do_action( 'xeory_after_entry-header' ); ?>

	<div class="entry-content">

		<?php do_action( 'xeory_prepend_entry-content' ); ?>

		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'xeory-base' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'xeory-base' ),
				'after'  => '</div>',
			) );
		?>

		<?php do_action( 'xeory_append_entry-content' ); ?>

	</div><!-- .entry-content -->

	<?php do_action( 'xeory_after_entry-content' ); ?>

	<?php do_action( 'xeory_append_entry' ); ?>

</article><!-- #post-## -->

<?php do_action( 'xeory_prepend_underpost-widget' ); ?>

<footer class="entry-footer">

	<?php do_action( 'xeory_prepend_entry-footer' ); ?>
	<?php xeory_base_entry_footer(); ?>
	<?php do_action( 'xeory_append_entry-footer' ); ?>
	
</footer><!-- .entry-footer -->

<?php if ( is_active_sidebar( 'under_post' ) ) { ?>
	<aside id="underpost-widget" class="widget-area-underpost">
		<?php dynamic_sidebar( 'under_post' ); ?>
	</aside><!-- #secondary -->
<?php } ?>

<?php do_action( 'xeory_after_entry' ); ?>