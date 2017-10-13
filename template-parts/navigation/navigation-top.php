<?php
/**
 * This file is for setting up the top navigation on the page.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Real_E_State
 * @since 1.0.0
 * @version 1.0.0
 */
?>
<div class="col-xs-12">
	<div class="col-xs-2">
		<?php 
	          if (!has_custom_logo()) {
	            ?>
	            <a class="logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
	            <img class="img-responsive center-block default-logo" src="<?php echo get_template_directory_uri() . '/assets/images/real-e-state-logo.png'; ?>" /></a>
	            <?php 
	          } else { 
	              $custom_logo_id = get_theme_mod( 'custom-logo' );
	            ?>
	              <a class="logo-link text-center" href="<?php echo esc_url(home_url('/')); ?>">
	            		<img class="img-responsive center-block custom-logo" src="<?php echo wp_get_attachment_url( $custom_logo_id ); ?>" /></a>
	            <?php
	          }
       		?>
	</div><!-- col-xs-2 -->
	<div class="col-xs-8">
		<?php
			wp_nav_menu( array ( 
				'theme_location' => 'subMenu',
				'menu_id' => 'submenu-1',
				'container' => 'div',
				'container_class' => 'sub-menu-container',
				'echo'	=> true,
			) );
		?>
	</div><!-- col-xs-8 -->
</div><!-- col-xs-12 -->
<div class="col-xs-12 text-center primary-cols">
	<?php
			wp_nav_menu( array ( 
				'theme_location' => 'primary',
				'menu_id' => 'primary-1',
				'container' => 'div',
				'container_class' => 'primary-menu-container',
				'echo'	=> true,
			) );
		?>
</div><!-- col-xs-12 -->