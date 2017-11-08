<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package faithtree
 */

?>
<section class="blog-wrap" style="background-image: url( <?php echo the_post_thumbnail_url( 'full' );?> )">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-md-6 text-center blog-overlay">
				<div class="info-wrap">	
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<?php
							if ( 'post' === get_post_type() ) : ?>
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
							<?php
							endif; 
							if ( is_singular() ) :
								the_title( '<h1 class="entry-title">', '</h1>' );
							else :
								?>
								<h1><?php the_title( ); ?></h1>
								<?php
							endif;
							?>
						</header><!-- .entry-header -->

						<div class="entry-content">
							<?php
								the_content( sprintf(
									wp_kses(
										/* translators: %s: Name of current post. Only visible to screen readers */
										__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'faithtree' ),
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									get_the_title()
								) );

								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'faithtree' ),
									'after'  => '</div>',
								) );
							?>
						</div><!-- .entry-content -->

						<footer class="entry-footer">
							<div class="blog-cta">
								<a class="faithtree-btn" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">Continue Reading</a> 
							</div>
						<?php // faithtree_entry_footer(); ?>
					</footer><!-- .entry-footer -->
				</article><!-- #post-<?php the_ID(); ?> -->
			</div> <!-- /info-wrap -->
		</div> <!-- /col-md-6 -->
	</div> <!-- /row -->
</div> <!-- /container-fluid -->
</section> <!-- /blog-wrap -->
