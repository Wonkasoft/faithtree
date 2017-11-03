<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and that sets the start of the <div id="page-wrap" class="site"> until the end of the </header>
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage faithtree
 * @since 1.0.0
 * @version 1.0.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page-wrap" class="site">
	<header id="masthead" class="container-fluid" role="banner">
		<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
	</header><!-- #masthead -->
	<!-- Modal -->
		<div id="menuModal" class="modal fade" role="dialog">
		  <div class="modal-dialog menu-dialog">
		    <!-- Modal content-->
		    <div class="modal-header menu-header">
		    	<a class="close-exit" data-dismiss="modal"><img src="<?php echo str_replace( array( 'http:', 'https:' ), '', get_template_directory_uri() . '/assets/images/exit-btn.png'); ?>" class="img-responsive" /> </a>
		    </div>
		      <div class="modal-body menu-body">
		        <?php
		        	wp_nav_menu( array ( 
		        		'theme_location' => 'primary',
		        		'menu_id' => 'primary-1',
		        		'container' => 'div',
		        		'container_class' => 'primary-menu-container',
		        		'echo'	=> true,
		        		'fallback_cb' => false,
		        	) );
		        ?>
		      </div>
		  </div>
		</div>