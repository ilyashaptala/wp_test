<?php

/*
 * Add fields to Woo Registration Form
 */
function wooc_add_register_fields() {
    ?>
        <p class="form-row form-row-wide">
            <label for="skype"><?php _e( 'Skype', 'woocommerce' ); ?></label>
            <input type="text" class="input-text" name="skype" id="skype" value="<?php esc_attr_e( $_POST['skype'] ); ?>" />
        </p>
    <?php
 }

 add_action( 'woocommerce_register_form_start', 'wooc_add_register_fields' );

/*
 * Save fields in Woo Registration Form
 */
 function wooc_save_register_fields( $customer_id ) {

    if( isset( $_POST['skype'] ) ) {

        update_user_meta( $customer_id, 'skype', sanitize_text_field( $_POST['skype'] ) );
    }
}

add_action( 'woocommerce_created_customer', 'wooc_save_register_fields' );

/*
 * Redirect User to Shop after registration
 */
add_filter( 'woocommerce_registration_redirect', 'woo_register_redirect' );

function woo_register_redirect( $redirect ) {

     return home_url('shop');
}

/*
 * Redirect User to Checkout after click "add to cart" button
 */
add_filter( 'add_to_cart_redirect', 'redirect_to_checkout' );

function redirect_to_checkout() {

    return WC()->cart->get_checkout_url();
}
