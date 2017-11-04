<?php

?>
	<footer id="page-footer" class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-md-5 col-md-offset-1">
				<?php echo get_theme_mod( 'footer_message' ); ?>
			</div><!-- .col-xs-12 -->
			<div class="col-xs-12 col-md-5">
				<span class="footer-email"><a href="mailto:<?php echo get_theme_mod( 'footer_social_email' ); ?>"><?php echo get_theme_mod( 'footer_social_email' ); ?></a></span>
						<?php 
						if ( get_theme_mod( 'footer_social_facebook' ) ) {
							?>
							<div class="social-links">
								<a href="<?php echo get_theme_mod( 'footer_social_facebook' ); ?>" target="_blank" /><i class="fa fa-facebook-square"></i></a>
							</div>
					<?php 
					}
						if ( get_theme_mod( 'footer_social_instagram' ) ) {
							?>
							<div class="social-links">
								<a href="<?php echo get_theme_mod( 'footer_social_instagram' ); ?>" target="_blank" /><i class="fa fa-instagram"></i></a>
							</div>
					<?php 
				}
				if ( get_theme_mod( 'footer_social_email' ) ) {
							?>
							<div class="social-links">
								<a href="<?php echo get_theme_mod( 'footer_social_email' ); ?>" target="_blank" /><i class="fa fa-envelope"></i></a>
							</div>
					<?php 
				}
				?>
			</div><!-- .col-xs-12 -->
		</div><!-- .row -->
		<div class="row">
			<div class="col-xs-12 col-md-5 col-md-offset-1">
				<?php
							/* translators: 1: Theme name, 2: Theme author. */
							printf( esc_html__( '&copy; '.date( 'Y' ) .' %1$s', 'faithtree' ), get_theme_mod( 'footer_copyright' ) );
						?>
			</div><!-- .col-xs-12 -->
		</div><!-- .row -->
	</footer>
</div><!-- End page-wrap -->
<?php wp_footer(); ?>
</body>
</html>