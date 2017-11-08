<?php
/**
 * The single-post template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package faithtree
 */

get_header(); ?>
<main id="main">
	<section id="under-header" style="background-image: url( <?php echo the_post_thumbnail_url( 'full' );?> )">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<div class="blog-info-wrap">
		<div class="blog-title">
			<h1><?php single_post_title( "", true ); ?></h1>
		</div> <!-- /page-title -->
		<?php
			/* translators: used between list items, there is a space after the comma */
			$tags_list_to_print = get_the_tag_list( '', esc_html_x( ' / ', 'list item separator', 'faithtree' ) );
			if ( $tags_list_to_print ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( '%1$s', 'faithtree' ) . '</span>', $tags_list_to_print ); // WPCS: XSS OK.
			}
		?>
		<div class="entry-meta">
			<?php faithtree_posted_on(); ?>
		</div><!-- .entry-meta -->
	</div> <!-- /.blog-info-wrap -->
	</div> <!-- /col-xs-12 -->
</div> <!-- /.row -->
</div> <!-- /.container-fluid -->
	</section> <!-- #under-header -->
	
	<section class="blog-content">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
				<?php 
				if ( have_posts() ) :
				  /* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/post/blog', 'post' );
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
				  endwhile;
				endif;
				?>					
				</div> <!-- /col-xs-12 -->
			</div> <!-- /row -->
		</div> <!-- /container-fluid -->
	</section> <!-- /section blog-content -->
</main> <!-- #main -->
<?php
get_footer();