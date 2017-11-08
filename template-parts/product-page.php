<?php
/**
 * Template Name: Product Page
 * Template Post Type: page
 *
 * @package faithtree
 */
get_header(); ?>
<main id="main">
	<section id="under-header" class="" style="background-image: url( <?php $check = ( !get_theme_mod( 'products_header_image' ) ) ? '': get_theme_mod( 'products_header_image' ); echo $check; ?> );">
		<div class="page-title">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</div>
	</section> <!-- #under-header -->
	<section id="content-section">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
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