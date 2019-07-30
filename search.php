<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Xeory-base
 */

get_header();
get_template_part( 'template-' . BZB_TEMP . '/template', 'loop' );

get_sidebar();
get_footer();
