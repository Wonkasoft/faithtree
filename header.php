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
				</div> <!-- /.modal-header -->
				<div class="modal-body menu-body">
					<div class="menu-tabs menu-tab-menu-pop">
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
					</div> <!-- /.menu-tab-1 -->
					<div class="menu-tabs menu-tab-search-menu">
						<?php echo get_search_form( $echo ); ?>
					</div> <!-- /.menu-tab-2 -->
					<div class="menu-tabs menu-tab-news-menu">
						<div class="newsletter-container">
							<h1 class="news-header">Join our email list</h1>
							<p>
								<?php
									if ( !get_theme_mod( 'join_email' ) ) {
										?>
										This is how you can keep up with our current events.
										<?php
									} else {
										echo get_theme_mod( 'join_email' );
									}
									?>
							</p>
							<div role="form" class="wpcf7" id="wpcf7-f207-o1" lang="en-US" dir="ltr">
								<div class="screen-reader-response"></div>
								<form action="/#wpcf7-f207-o1" method="post" class="wpcf7-form" novalidate="novalidate">
									<div style="display: none;">
										<input type="hidden" name="_wpcf7" value="207">
										<input type="hidden" name="_wpcf7_version" value="4.9.1">
										<input type="hidden" name="_wpcf7_locale" value="en_US">
										<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f207-o1">
										<input type="hidden" name="_wpcf7_container_post" value="0">
									</div>
									<div class="input-group">
										<input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" id="newsletter-email" aria-required="true" aria-invalid="false" placeholder="enter your email address">
										<span class="input-group-addon">
									<button type="submit" value="Send" class="wpcf7-form-control wpcf7-submit" id="newsletter-submit">
										<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
									</button>
								</span> <!-- /.input-group-addon -->
								</div> <!-- /.input-group -->
									<span class="ajax-loader"></span>
									<div class="wpcf7-response-output wpcf7-display-none"></div></form></div>
								</div> <!-- /.newsletter-container -->
							</div> <!-- /.menu-tab-3 -->
						</div> <!-- /.modal-body -->
					</div> <!-- /.modal-dialog -->
		</div> <!-- /#menuModal -->