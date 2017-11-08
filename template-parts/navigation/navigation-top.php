<?php
/**
 * This file is for setting up the top navigation on the page.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage faithtree
 * @since 1.0.0
 * @version 1.0.0
 */
?>
<div class="row">
	<div class="col-xs-2 col-md-4">
		<?php 
	          $custom_Logo = ( !has_custom_logo() ) ? get_template_directory_uri() . '/assets/images/faithtree-logo.png': wp_get_attachment_url( get_theme_mod( 'custom_logo' ) );
	          $logo_class = ( !has_custom_logo() ) ? 'default-logo': 'custom-logo';
	            ?>
	            <a class="logo-link" href="<?php echo esc_url(home_url('/')); ?>">
           <img class="img-responsive <?php echo $logo_class; ?>" src="<?php echo $custom_Logo; ?>" /></a>   
	</div><!-- col-xs-2 -->
	<div class="col-xs-10 col-md-8">
		<!-- Trigger the modal with a button -->
		<a class="pull-right top-menu" name="menu-pop" data-toggle="modal" data-target="#menuModal">
			<div class="burger-menu"><img src="<?php echo str_replace( array( 'http:', 'https:' ), '', get_template_directory_uri() . '/assets/images/burger-menu.png'); ?>" /> <span>MENU</span></div></a>
		<a class="pull-right top-menu" name="shop-menu" href="/cart">
			<div class="shopping-bag"><img src="<?php echo str_replace( array( 'http:', 'https:' ), '', get_template_directory_uri() . '/assets/images/shopping-bag.png'); ?>" /> <span>SHOPPING BAG</span></div></a>
		<a class="pull-right top-menu" name="search-menu" data-toggle="modal" data-target="#menuModal">
			<div class="search-img"><img src="<?php echo str_replace( array( 'http:', 'https:' ), '', get_template_directory_uri() . '/assets/images/search-img.png'); ?>" /> <span>SEARCH</span></div></a>
		<a class="pull-right top-menu" name="news-menu" data-toggle="modal" data-target="#menuModal">
			<div class="email-img"><img src="<?php echo str_replace( array( 'http:', 'https:' ), '', get_template_directory_uri() . '/assets/images/email-img.png'); ?>" /> <span>NEWSLETTER</span></div></a>
	</div><!-- col-xs-8 -->
</div><!-- .row -->