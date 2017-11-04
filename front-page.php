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
<main id="main" class="container-fluid">
	<?php
	if (!is_page_template()) { ?>
	<div class="sub-menu-cols">
		<?php
				wp_nav_menu( array ( 
					'theme_location' => 'sub-menu',
					'menu_id' => 'sub-menu-1',
					'container' => 'div',
					'container_class' => 'sub-menu-container',
					'echo'	=> true,
					'fallback_cb' => false,
				) );
			?>
	</div><!-- col-xs-12 -->
	<?php
	} ?>
	<?php
		if ( get_theme_mod( 'header_video_platform' ) || get_theme_mod( 'modal_video_link' ) ) {
	?>
	<!-- Modal -->
	<div id="videoModal" class="modal fade" role="dialog">
	  <div class="modal-dialog video-dialog">
	    <!-- Modal content-->
	    <div class="modal-header header-video">
	    	<a class="close-exit" data-dismiss="modal"><img src="<?php echo str_replace( array( 'http:', 'https:' ), '', get_template_directory_uri() . '/assets/images/exit-btn.png'); ?>" class="img-responsive" /> </a>
	    </div>
	      <div class="modal-body video-body">
	      	<?php
	      		if ( get_theme_mod( 'header_video_platform' ) == 'vimeo') {
	      			$video_link_clean = get_theme_mod( 'modal_video_link' );
	      			$video_link_clean = str_replace( 'https://vimeo.com/', '', $video_link_clean);
	      			?>
							<iframe width="100%" height="100%" src="<?php echo 'https://player.vimeo.com/video/'.$video_link_clean; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
							<?php
	      		} else {
	      			$video_link_clean = get_theme_mod( 'modal_video_link' );
	      			$video_link_clean = str_replace( 'https://www.youtube.com/watch?v=', '', $video_link_clean );
	      			?>
	      				<iframe width="100%" height="100%" src="<?php echo 'https://www.youtube.com/embed/'.$video_link_clean; ?>?rel=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	      		<?php
	      		}
	      		?>
	      </div>
	  </div>
	</div> <!-- /#videoModal -->
	<?php
	}
	?>
	<section id="above-fold" class="row">
		<div class="col-xs-12 video-wrap">
		<video loop muted autoplay poster="<?php echo get_theme_mod( 'background_image_section_1' );?>" class="fullscreen-bg__video">
        <source src="<?php echo wp_get_attachment_url( get_theme_mod( 'featured_header_media' ) ); ?>" type="video/mp4">
    </video>
  </div> <!-- /col-xs-12 video-wrap -->
  <div class="info-wrap">
		<div class="title">
			<?php echo get_theme_mod( 'header_title' ); ?>
		</div> <!-- /col-xs-12 -->
		<div class="tag-line">
			<?php echo get_theme_mod( 'header_tag_line' ); ?>
		</div> <!-- /col-xs-12 -->
		<div class="cta-above">
			<a href="<?php echo get_permalink( get_theme_mod( 'header_cta_link' ) ); ?>">
				<div class="text-slide text-top"><?php echo get_theme_mod( 'header_cta_text' ); ?></div>
				<div class="text-slide text-bottom"><?php echo get_theme_mod( 'header_cta_text' ); ?></div>
			</a>
		</div> <!-- /col-xs-12 -->
	</div> <!-- /.info-wrap -->
	<div class="modal-video-wrap">
		<?php
			if ( get_theme_mod( 'header_video_platform' ) || get_theme_mod( 'modal_video_link' ) ) {
					?>
						<!-- Modal link -->
					<div class="video-modal-link text-center">
						<a data-toggle="modal" data-target="#videoModal"><i class="fa fa-play-circle"></i></a>
					</div>
			<?php
			}
			?>
		</div> <!-- /modal-video-wrap -->
	</section><!-- .row -->
		<?php 
	// Get Section count from Theme options
	$section_count_frontend = get_theme_mod( 'section_count' );
	for ( $i=1; $i < $section_count_frontend + 1 ; $i++ ) { 
		if ( !get_theme_mod( 'background_image_section_'.$i ) ) {

		} else {
		?>

	<section id="section-<?php echo $i; ?>" class="row" style="background: url(<?php echo get_theme_mod( 'background_image_section_'.$i );?>);">
			<div class="col-xs-12 col-md-10 col-md-offset-1 title title-<?php echo $i;?>">
				<?php echo get_theme_mod( 'section_title_'.$i ); ?>
			</div> <!-- /col-xs-12 -->
			<div class="col-xs-12 col-md-10 col-md-offset-1 title-image title-image-<?php echo $i;?>">
				<img src="<?php echo get_theme_mod( 'section_title_image_'.$i ); ?>" class="img-responsive" />
			</div> <!-- /col-xs-12 -->
			<div class="col-xs-12 col-md-10 col-md-offset-1 cta cta-<?php echo $i;?> <?php echo get_theme_mod( 'section_cta_position_'.$i ); ?>">
				<a href="<?php echo get_permalink( get_theme_mod( 'section_cta_link_'.$i ) ); ?>"><?php echo get_theme_mod( 'section_cta_text_'.$i ); ?></a>
			</div> <!-- /col-xs-12 -->
			<div class="info-wrap">
			<div class="col-xs-12 col-md-10 col-md-offset-1 message message-<?php echo $i;?> <?php echo get_theme_mod( 'section_message_position_'.$i ); ?>">
				<h2><?php echo get_theme_mod( 'section_message_'.$i ); ?></h2>
			</div> <!-- /col-xs-12 -->
		</div> <!-- /.info-wrap -->
	</section><!-- .row -->
	<?php
	}
}
?>
</main><!-- #main -->
<?php
get_footer();