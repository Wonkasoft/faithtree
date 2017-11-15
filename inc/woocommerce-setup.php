<?php
/**
 * FaithTree Theme Customizer
 *
 * @package faithtree
 * @version  1.0.0
 * @since  1.0.0
 * 
 */


remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

function faithtree_theme_woocommerce_products_per_page() {
	return 12;
}
add_filter( 'loop_shop_per_page', 'faithtree_theme_woocommerce_products_per_page' );

function get_woo_reviews( $atts ) {
	$atts = shortcode_atts( array(
		'id' => '99',
		'class' => 'review-class',
	), $atts);
	$args = array(
		'post_type' => 'product',
		'id' => $atts['id'],
	);
	$loop = new WP_Query( $args );
	if ( $loop->have_posts() ) {
		$loop->the_post();
		wc_get_template_part( '../woocommerce/single-product/', 'review');
	} else {
		echo __( 'No products found' );
	}
	wp_reset_postdata();

	return $content;
}
add_shortcode( 'get_woo_review', 'get_woo_reviews', 30, 2);