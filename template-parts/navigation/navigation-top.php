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
	<div class="col-xs-4">
		<?php 
	          $custom_Logo = ( !has_custom_logo() ) ? get_template_directory_uri() . '/assets/images/faithtree-logo.png': wp_get_attachment_url( get_theme_mod( 'custom_logo' ) );
	          $logo_class = ( !has_custom_logo() ) ? 'default-logo': 'custom-logo';
	            ?>
	            <a class="logo-link" href="<?php echo esc_url(home_url('/')); ?>">
           <img class="img-responsive <?php echo $logo_class; ?>" src="<?php echo $custom_Logo; ?>" /></a>   
	</div><!-- col-xs-2 -->
	<div class="col-xs-8">
		<!-- Trigger the modal with a button -->
		<a class="pull-right" data-toggle="modal" data-target="#menuModal"><img src="//faithtree.yourlive.site/wp-content/uploads/2017/11/Group.png" /></a>
		<!-- Modal -->
		<div id="menuModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="col-xs-12">
		      <div class="modal-body">
		        <?php
		        	wp_nav_menu( array ( 
		        		'theme_location' => 'primary',
		        		'menu_id' => 'primary-1',
		        		'container' => 'div',
		        		'container_class' => 'primary-menu-container',
		        		'echo'	=> true,
		        	) );
		        ?>
		      </div>
		    </div>

		  </div>
		</div>
	</div><!-- col-xs-8 -->
</div><!-- .row -->
<?php
if (!is_page_template()) { ?>
<div class="row">
<div class="col-xs-12 text-center sub-menu-cols">
	<?php
			wp_nav_menu( array ( 
				'theme_location' => 'sub-menu',
				'menu_id' => 'sub-menu-1',
				'container' => 'div',
				'container_class' => 'sub-menu-container',
				'echo'	=> true,
			) );
		?>
</div><!-- col-xs-12 -->
</div><!-- .row -->
<?php
}