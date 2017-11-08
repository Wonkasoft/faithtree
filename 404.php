<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Faithtree
 * @since  1.0.0 init
 */

get_header(); ?>
<main id="main" class="container-fluid">
	<section id="above-fold" class="row">
		<div class="col-xs-12 col-md-10 col-md-offset-1 text-center title">
			<h1>PAGE NOT FOUND</h1>
			<h2>404 Error</h2>
		</div> <!-- /col-xs-12 -->
		<div class="col-xs-12 col-md-10 col-md-offset-1 text-center">
			<h2>We've looked everywhere but can't find that page, sorry.</h2>
			<h3>Let's start over click the home button</h3>
		</div> <!-- /col-xs-12 -->
		<div class="col-xs-12 col-md-10 col-md-offset-1 text-center">
			<a href="/" class="faithtree-btn">Home Page</a>
		</div> <!-- /col-xs-12 -->
	</section><!-- .row -->
</main><!-- #main -->

<?php
get_footer();
