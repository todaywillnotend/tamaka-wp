<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>
<style>
.qty {    margin: 0px 10px;width:2.631em!important;}
.woocommerce-notices-wrapper {display:block;}
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
.input-text {float:left}
/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
		<main class="main">
			<section class="cart">
	<div class="container">
		<h1>КОРЗИНА</h1>
	<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>

		<div class="cart__content">
					<div class="cart__list">
						<div class="cart__container">

			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
                    <div class="cart__checkbox">
                    	<?php
								echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'woocommerce_cart_item_remove_link',
									sprintf(
										'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										esc_html__( 'Remove this item', 'woocommerce' ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku() )
									),
									$cart_item_key
								);
							?>
					</div>
					<div class="cart__item">

						<div class="cart__image">
							<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

							if ( ! $product_permalink ) {
								echo $thumbnail; // PHPCS: XSS ok.
							} else {
								printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
							}
							?>
						</div>

						<div class="cart__main">
							<div class="cart__text">
								<span class="cart__title">
									<?php
									if ( ! $product_permalink ) {
										echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
									} else {
										echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
									}

									do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

									// Meta data.
									echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

									// Backorder notification.
									if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
										echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
									}
									?>
								</span><br>
								<span class="cart__subtitle">
									<?php
										echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
									?>
								</span>
							</div>
							<div class="cart__amount">
								<div class="cart__amount--title">Количество</div>
                                <span pid="<? echo $product_id;?>" class="button-minus" style="cursor:pointer;float:left">-</span>
								<?php
								if ( $_product->is_sold_individually() ) {
									$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
								} else {
									$product_quantity = woocommerce_quantity_input(
										array(
                                        'input_id'	   => 'qty-'.$product_id,
											'input_name'   => "cart[{$cart_item_key}][qty]",
											'input_value'  => $cart_item['quantity'],
											'max_value'    => $_product->get_max_purchase_quantity(),
											'min_value'    => '0',
											'product_name' => $_product->get_name(),
										),
										$_product,
										false
									);
								}

								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
								?>
								
								
								<span pid="<? echo $product_id;?>" class="button-plus" style="float:left;cursor:pointer;">+</span>
							</div>
							<div class="cart__total">
								<div class="cart__total--title">Итого</div>
								<?php
									echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
								?>
							</div>
						</div>
					<?php
				}
			}
			?>

			<?php do_action( 'woocommerce_cart_contents' ); ?>

			

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
					</div>
				</div>

	<?php do_action( 'woocommerce_after_cart_table' ); ?>
			</div>

<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

	<div class="cart__button">
				<div class="cart__info">
					<span>Итого</span>
					<span><span id="gqty"><? global $woocommerce;
    echo $woocommerce->cart->cart_contents_total+$woocommerce->cart->tax_total; ?></span> рублей</span>
				</div>
				<button onclick="location.href='http://<?=$_SERVER['HTTP_HOST'];?>/checkout';return false;">Перейти к оформлению</button>
			</div>
		</div>
	</div>
</section>

<?php do_action( 'woocommerce_after_cart' ); ?>
<section class="info">
  <div class="container">
    <div class="info__text">
      <span>Интернет магазин одежды</span>
      <p>
       <? the_field('desc','option');?> 
      </p>
    </div>
  </div>
</section>

		</main>
        
<script>
(function($){
$('.button-plus').click(function(){
    var pid = $(this).attr('pid');
    var qty = parseInt($('#qty-'+pid).val());
	qty++;
    $('#qty-'+pid).val(qty);
    $.get('https://tamaka.ru/?id='+pid+'&qty='+qty);
    $('#gqty').load('https://tamaka.ru/?gqty=1');
});
$('.button-minus').click(function(){
	var pid = $(this).attr('pid');
	var qty = parseInt($('#qty-'+pid).val());
	if (qty>1) {qty--;}
	$('#qty-'+pid).val(qty);
    $.get('https://tamaka.ru/?id='+pid+'&qty='+qty);
    $('#gqty').load('https://tamaka.ru/?gqty=1');
});
})(jQuery);
</script>