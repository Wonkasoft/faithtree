<?php
/**
 * FaithTree Theme Customizer
 *
 * @package woocommerce
 * @version  1.0.0
 * @since  1.0.0
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

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

	$output = '';
	$atts = shortcode_atts( array(
		'id' => '99',
		'class' => 'review-class',
		'title' => 'Review',
	), $atts);

	$product_reviews =  get_comments();

	ob_start();

	for ($i=0; $i < sizeof($product_reviews); $i++) {

		if ($product_reviews[$i]->comment_post_ID  === $atts['id'] ) {

			$com_con = wpautop( wptexturize( $product_reviews[$i]->comment_content ) );

			?>

			<div id="comment-<?php comment_ID(); ?>" class="custom_comment_container woocommerce">
				<h2><?php echo $atts['title']; ?></h2>
				<div class="rating-text">

					<?php
					$rating = intval( get_comment_meta( $product_reviews[$i]->comment_ID, 'rating', true ) );
					echo wc_get_rating_html( $rating ); ?>

					<div class="comment-text <?php echo $atts['class']; ?>"><?php echo $com_con; ?></div>

				</div>
			</div>
			<?php
		}
	}
	$output .= ob_get_clean();

	return $output;

}
add_shortcode( 'get_woo_review', 'get_woo_reviews', 30, 1);

function custom_add_to_cart( $atts ) {

	$output = '';
	$atts = shortcode_atts( array(
		'id' => '99',
		'class' => 'custom-cart-btn',
		'value' => 'Add to Cart',
		'cost' => false,
	), $atts);

	$current_product = wc_get_product( $atts['id'] );
	ob_start();
	
	?>
	<div class="custom-cart-btn-wrap btn-for-<?php echo $atts['id']; ?>">
	<?php	echo sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s%s</a>',
			  esc_url( $current_product->add_to_cart_url() ),
			  esc_attr( isset( $quantity ) ? $quantity : 1 ),
			  esc_attr( $current_product->get_id() ),
			  esc_attr( $current_product->get_sku() ),
			  esc_attr( isset( $atts['class'] ) ? $atts['class']: 'custom-cart-btn' ),
			  ( $atts['cost'] ) ? $current_product->get_price_html() . ' - ': '',
			  esc_html( isset( $atts['value'] ) ? $atts['value']: $current_product->add_to_cart_text() )
		  ); ?>
	</div>

	<?php
	$output .= ob_get_clean();

	return $output;

}
add_shortcode( 'custom_cart_btn', 'custom_add_to_cart', 30, 1);