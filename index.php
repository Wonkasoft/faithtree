<?php
/**
 * The main template file
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
		<section id="under-header">
					<div class="page-title">

		<?php
		if ( have_posts() ) :

			if (  is_home() && ! is_front_page() ) : ?>
			
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					<h1 class="page-title"><?php single_post_title(); ?></h1>
				</header>
			<?php
			endif;
		?>
		</div> <!-- /page-title -->
	</section> <!-- #under-header -->
	<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 text-center">
		<?php 
					wp_dropdown_categories(array(
						'taxonomy'					=> 'post_tag',
						'show_option_none'	=>	'Browse by topic',
						'selected'   				=> 0,
						'hide_empty' 				=> 0, 
						'name' 							=> 'topic',
					)	); 
		?>
			</div> <!-- /col -->
		</div> <!-- /row -->
	</div> <!-- /container-fluid -->

	<script type="text/javascript">
		var dropdown = document.getElementById("topic");
		function onCatChange() {
			if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
				location.href = "<?php echo esc_url( home_url( '/' ) ); ?>/tag/"+dropdown.options[dropdown.selectedIndex].text;
			}
		}
		dropdown.onchange = onCatChange;
	</script>


		<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/page/content', get_post_format() );

			endwhile;
	?>
	<div class="new-post">
	<?php
		next_posts_link( '< Newer' );
	?>
	</div> <!-- /new-post -->
	<div class="old-post">
	<?php
		previous_posts_link( 'Older >' );
		?>
	</div> <!-- /old-post -->
<?php
		else :

			get_template_part( 'template-parts/page/content', 'none' );

		endif; ?>
	
</main> <!-- #main -->
<?php
get_footer();