<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Xeory-base
 */

?>

			<?php do_action( 'xeory_append_container' ); ?>

		</div><!-- .container -->

		<?php do_action( 'xeory_append_site-content' ); ?>

	</div><!-- #content -->

	<?php do_action( 'xeory_after_site-content' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">

		<?php do_action( 'xeory_prepend_site-footer' ); ?>

		<?php if ( is_active_sidebar( 'footer-widget' ) ) { ?>

			<aside id="footer-widget" class="footer-widget-area" role="complementary">
				<?php dynamic_sidebar( 'footer-widget' ); ?>
			</aside><!-- #secondary -->
		<?php } ?>

		<?php do_action( 'xeory_after_footer-wedget' ); ?>

		<?php get_template_part( 'template-parts/template', 'copyright' ); ?>

	</footer><!-- #colophon -->

	<?php do_action( 'xeory_after_site-footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

<?php do_action( 'xeory_append_body' ); ?>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/sp-nav.js"></script>

</body>
</html>
