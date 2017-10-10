<?php

?>
	<footer id="e-state-footer" class="container-fluid">
		<div class="row">

		</div><!-- .row -->
		<div class="row">
			<div class="col-xs-12 text-center">
				<?php
							/* translators: 1: Theme name, 2: Theme author. */
							printf( esc_html__( 'Site Created for %1$s by %2$s', 'faithtree' ), 'FaithTree', '<a href="https://wonkasoft.com/" target="_blank">Wonkasoft</a>  |  ' );
						?>
				<span class="powered">Powered by</span><a href="https://wordpress.org" target="_blank"><img class="img-responsive wordpress-logo" src="https://s.w.org/about/images/logos/wordpress-logo-32.png" alt="WP Logo" /></a>
			</div><!-- .col-xs-12 -->
		</div><!-- .row -->
	</footer>
</div><!-- End page-wrap -->
<?php wp_footer(); ?>
</body>
</html>