<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Xeory-base
 */

get_header();
get_template_part( 'template-' . BZB_TEMP . '/template', 'loop' );

get_sidebar();
get_footer();
