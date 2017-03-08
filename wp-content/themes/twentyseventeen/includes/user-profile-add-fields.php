<?php

/*
 * Add fields to User Profile
 */
function add_profile_fields( $user ) {
    ?>
        <table class="form-table">
            <tr>
                <th><label for="skype"><?php _e( 'Skype' );?></label></th>
                <td>
                    <input type="text" name="skype" id="skype" value="<?php echo esc_attr( get_the_author_meta( 'skype', $user->ID ) ); ?>" class="regular-text" /><br />
                    <span class="description"><?php _e( 'Please enter your Skype ID.' );?></span>
                </td>
            </tr>
        </table>
    <?php
}

add_action( 'show_user_profile', 'add_profile_fields' );
add_action( 'edit_user_profile', 'add_profile_fields' );

/*
 * Save fields to User Profile
 */
function save_profile_fields( $user_id ) {

	if( ! current_user_can( 'edit_user', $user_id ) )
		return false;

	update_usermeta( $user_id, 'skype', $_POST['skype'] );
}

add_action( 'personal_options_update', 'save_profile_fields' );
add_action( 'edit_user_profile_update', 'save_profile_fields' );
