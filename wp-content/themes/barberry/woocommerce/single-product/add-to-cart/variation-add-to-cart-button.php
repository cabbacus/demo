<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>
<div class="woocommerce-variation-add-to-cart variations_button">
	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

	<div class="addtocart-button-group">

		<?php
		do_action( 'woocommerce_before_add_to_cart_quantity' );

		woocommerce_quantity_input( array(
			'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
			'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
			'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
		) );
		?>

		<div class="button-group-inner">
		<?php do_action( 'woocommerce_after_add_to_cart_quantity' ); ?>

			<div class="addtocart-button-group-inner <?php echo ( TDL_Opt::getOption('product_buy_now') ) ? 'has_buy_now' : '' ; ?>">

					<button type="submit" class="single_add_to_cart_button button alt <?php echo ( TDL_Opt::getOption('product_add_to_cart_ajax') ) ? 'progress-btn' : '' ; ?>">
					<div class="btn-text"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></div>
					<?php if ( TDL_Opt::getOption('product_add_to_cart_ajax') ) : ?>
						<div class="progress"></div>
						<div class="checked"></div>
					<?php endif; ?>
				</button>

				<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

				<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
				<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
				<input type="hidden" name="variation_id" class="variation_id" value="0" />

			</div>

		</div>




	</div>
</div>
