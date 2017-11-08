<?php
/**
 * Template Name: Landing Page 1
 * Template Post Type: post, page, event
 *
 * @package faithtree
 */
get_header(); ?>
<main id="main">
		<section id="content-section">
			<div class="container-fluid">
				<div class="row">
		<div class="col-xs-12 landing-content">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</div> <!-- /col -->
	</div> <!-- /row -->
</div> <!-- /container -->
		</section> <!-- /content-section -->
</main> <!-- /#main -->
<?php
get_footer();