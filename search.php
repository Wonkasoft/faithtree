<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package faithtree
 */

get_header(); ?>
<main id="main">
		<section id="under-header" class="">
					<div class="page-title">
						<h1>Search Results</h1>
					</div>
		</section> <!-- #under-header -->
		<section id="content-section">
			<div class="container">
			<div class="row">
				<div class="col-xs-12">
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'faithtree' ), '<span>' . get_search_query() . '</span>' );
				?></h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/page/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/page/content', 'none' );

		endif; ?>
	</div> <!-- /col-xs-12 -->
			</div> <!-- /row -->
			</div> <!-- /container-fluid -->
		</section> <!-- /#content-section -->
</main><!-- /#main -->
<?php
get_footer();
