<?php

new creative_works_front_page_header;

class creative_works_front_page_header {
	public function __construct() {
		if ( is_admin() ) {
			add_action( 'load-post.php',	 array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		}
	}

	public function init_metabox() {
		add_action( 'add_meta_boxes',		array( $this, 'add_metabox' )		 );
		add_action( 'save_post',			 array( $this, 'save_metabox' ), 10, 2 );
	}

	public function add_metabox() {
		add_meta_box(
			'hero_image',
			esc_html__( 'Hero Image', 'CreativeWorks' ),
			array( $this, 'creative_works_render_metabox' ),
			array( 'post', ' page' ),
			'advanced',
			'high'
		);
	}

	public function creative_works_render_metabox( $post ) {
		$subtitle = !empty( get_post_meta( $post->ID, 'subtitle', true ) ) ? get_post_meta( $post->ID, 'subtitle', true ) : '';
		$image = !empty( get_post_meta( $post->ID, 'image', true ) ) ? get_post_meta( $post->ID, 'image', true ) : '';
		$body = !empty( get_post_meta( $post->ID, 'body', true ) ) ? get_post_meta( $post->ID, 'body', true ) : '';
		?>
			<table class="form-table">
				<tr>
					<th><label for="image"><?php echo esc_html__( 'Hero Image', 'CreativeWorks' ); ?></label></th>

					<td>
						<input type="text" id="front_page_header_image" name="image" placeholder="<?php echo  esc_attr__( 'e.g. https://betty-lous-furniture.com/our-store.png', 'CreativeWorks' ); ?>" value="<?php echo  esc_attr( $image ); ?>" style="width:50%;"><br />
						<input type="button" onclick="CreativeWorksWidgetsUploader.imageUploader.openFileFrame( 'front_page_header_image' );" class="button button-primary" value="<?php echo esc_attr__( 'Select Image', 'CreativeWorks' ) ?>" />
					</td>
				</tr>
				<tr>
					<th><label for="subtitle"><?php echo esc_html__( 'Hero Subtitle', 'CreativeWorks' ); ?></label></th>
					<td style="width:75%;">
						<input type="text" id="front_page_header_subtitle" name="subtitle" class="subtitle_field" placeholder="<?php echo esc_attr__( 'e.g. We literally live to sell you furniture', 'CreativeWorks' ); ?>" value="<?php echo esc_attr( $subtitle ); ?>" style="width:50%;">
					</td>
				</tr>
				<tr>
					<th><label for="body" class="body_label"><?php echo esc_html__( 'Hero Body Text', 'CreativeWorks' ); ?></label></th>
					<td style="width:75%;">
						<?php wp_editor( $body, 'body', array( 'media_buttons' => true ) ); ?>
					</td>
				</tr>
			</table>
	   <?php
	}

	public function save_metabox( $post_id, $post ) {

		// Check if it's not an autosave.
		if ( wp_is_post_autosave( $post_id ) )
			return;

		// Check if it's not a revision.
		if ( wp_is_post_revision( $post_id ) )
			return;

		// Sanitize user input.
		$new_subtitle = isset( $_POST[ 'subtitle' ] ) ? sanitize_text_field( $_POST[ 'subtitle' ] ) : '';
		$new_image = isset( $_POST[ 'image' ] ) ? sanitize_text_field( $_POST[ 'image' ] ) : '';
		$new_body = isset( $_POST[ 'body' ] ) ? wp_kses_post( $_POST[ 'body' ] ) : '';

		// Update the meta field in the database.
		update_post_meta( $post_id, 'subtitle', $new_subtitle );
		update_post_meta( $post_id, 'image', $new_image );
		update_post_meta( $post_id, 'body', $new_body );
	}
}

