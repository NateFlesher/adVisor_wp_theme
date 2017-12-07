<?php
function advisor_add_admin_scripts(){

    wp_enqueue_media();
    wp_enqueue_script('advisor-uploader', get_template_directory_uri().'/js/avatar-uploader.js', array('jquery'), false, true );
}
add_action('admin_enqueue_scripts', 'advisor_add_admin_scripts');

function advisor_extra_profile_fields( $user ) {

	 $profile_pic = ($user!=='add-new-user') ? get_user_meta($user->ID, 'advisor_user_avatar', true): false;

	 if( !empty($profile_pic) ){

			 $image = wp_get_attachment_image_src( $profile_pic, 'thumbnail' );

	 } ?>

	 <table class="form-table fh-profile-upload-options">
			 <tr>
					 <th>
							 <label for="image"><?php _e('Main Profile Image ( Dimensions: 136x136 )', 'advisor') ?></label>
					 </th>

					 <td>
							 <input type="button" data-id="advisor_image_id" data-src="advisor-img" class="button advisor-image" name="advisor_image" id="advisor-image" value="Upload" />
							 <input type="hidden" class="button" name="advisor_image_id" id="advisor_image_id" value="<?php echo !empty($profile_pic) ? $profile_pic : ''; ?>" />
							 <img id="advisor-img" src="<?php echo !empty($profile_pic) ? esc_attr( $image[0] ) : ''; ?>" style="<?php echo  empty($profile_pic) ? 'display:none;' :'' ?> max-width: 100px; max-height: 100px;" />
					 </td>
			 </tr>
	 </table><?php

}
add_action( 'show_user_profile', 'advisor_extra_profile_fields' );
add_action( 'edit_user_profile', 'advisor_extra_profile_fields' );
add_action( 'user_new_form', 'advisor_extra_profile_fields' );

function advisor_profile_update($user_id){

    if( current_user_can('edit_users') ){
        $profile_pic = empty($_POST['advisor_image_id']) ? '' : $_POST['advisor_image_id'];
        update_user_meta($user_id, 'advisor_user_avatar', $profile_pic);
    }

}
add_action('profile_update', 'advisor_profile_update');
add_action('user_register', 'advisor_profile_update');
