<?php

/*
 * Add Woocommerce User Profile fields
 */
function woo_add_account_fields() {

    $user_id = get_current_user_id();

    if ( !$user_id ) {
        return;
    }

    $skype = get_user_meta( $user_id, 'skype', true );
    ?>
        <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
            <label for="skype"><?php _e( 'Skype' );?></label>
            <input class="woocommerce-Input input-text" name="skype" id="skype" value="<?php echo esc_attr( $skype ); ?>" type="text">
        </p>
    <?php
}

add_action( 'woocommerce_edit_account_form_start', 'woo_add_account_fields' );

/*
 * Save Woocommerce User Profile fields
 */
function woo_save_account_fields( $user_id ) {

    if( isset( $_POST['skype'] ) ) {

        update_user_meta( $user_id, 'skype', sanitize_text_field( $_POST['skype'] ) );
    }
}

add_action( 'woocommerce_save_account_details', 'woo_save_account_fields' );
