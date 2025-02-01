<?php
/**
 * Custom About us Widget
 */

class Adventure_Camping_About_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'Adventure_Camping_About_Widget',
			__('VW About us', 'adventure-camping'),
			array( 'description' => __( 'Widget for about us section in sidebar', 'adventure-camping' ), ) 
		);
	}
	
	public function widget( $adventure_camping_args, $adventure_camping_instance ) {
		?>
		<aside class="widget">
			<?php
			$adventure_camping_title = isset( $adventure_camping_instance['title'] ) ? $adventure_camping_instance['title'] : '';
			$adventure_camping_author = isset( $adventure_camping_instance['author'] ) ? $adventure_camping_instance['author'] : '';
			$adventure_camping_designation = isset( $adventure_camping_instance['designation'] ) ? $adventure_camping_instance['designation'] : '';
			$adventure_camping_description = isset( $adventure_camping_instance['description'] ) ? $adventure_camping_instance['description'] : '';
			$adventure_camping_read_more_url = isset( $adventure_camping_instance['read_more_url'] ) ? $adventure_camping_instance['read_more_url'] : '';
			$adventure_camping_read_more_text = isset( $adventure_camping_instance['read_more_text'] ) ? $adventure_camping_instance['read_more_text'] : '';
			$adventure_camping_upload_image = isset( $adventure_camping_instance['upload_image'] ) ? $adventure_camping_instance['upload_image'] : '';

	        echo '<div class="custom-about-us">';
	        if(!empty($adventure_camping_title) ){ ?><h3 class="custom_title"><?php echo esc_html($adventure_camping_title); ?></h3><?php } ?>
		        <?php if($adventure_camping_upload_image): ?>
	      			<img src="<?php echo esc_url($adventure_camping_upload_image); ?>" alt="">
				<?php endif; ?>
				<?php if(!empty($adventure_camping_author) ){ ?><p class="custom_author"><?php echo esc_html($adventure_camping_author); ?></p><?php } ?>
				<?php if(!empty($adventure_camping_designation) ){ ?><p class="custom_designation"><?php echo esc_html($adventure_camping_designation); ?></p><?php } ?>
		        <?php if(!empty($adventure_camping_description) ){ ?><p class="custom_desc"><?php echo esc_html($adventure_camping_description); ?></p><?php } ?>
		        <?php if(!empty($adventure_camping_read_more_url) ){ ?><div class="more-button"><a class="custom_read_more" href="<?php echo esc_url($adventure_camping_read_more_url); ?>"><?php if(!empty($adventure_camping_read_more_text) ){ ?><?php echo esc_html($adventure_camping_read_more_text); ?><?php } ?></a></div><?php } ?>
	        <?php echo '</div>';
			?>
		</aside>
		<?php
	}
	
	// Widget Backend 
	public function form( $adventure_camping_instance ) {	

		$adventure_camping_title= ''; $adventure_camping_author = ''; $adventure_camping_designation = ''; $adventure_camping_description= ''; $adventure_camping_read_more_text = ''; $adventure_camping_read_more_url = ''; $adventure_camping_upload_image = '';

		$adventure_camping_title = isset( $adventure_camping_instance['title'] ) ? $adventure_camping_instance['title'] : '';
		$adventure_camping_author = isset( $adventure_camping_instance['author'] ) ? $adventure_camping_instance['author'] : '';
		$adventure_camping_designation = isset( $adventure_camping_instance['designation'] ) ? $adventure_camping_instance['designation'] : '';
		$adventure_camping_description = isset( $adventure_camping_instance['description'] ) ? $adventure_camping_instance['description'] : '';
		$adventure_camping_read_more_url = isset( $adventure_camping_instance['read_more_url'] ) ? $adventure_camping_instance['read_more_url'] : '';
		$adventure_camping_read_more_text = isset( $adventure_camping_instance['read_more_text'] ) ? $adventure_camping_instance['read_more_text'] : '';
		$adventure_camping_upload_image = isset( $adventure_camping_instance['upload_image'] ) ? $adventure_camping_instance['upload_image'] : '';
	?>
		<p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','adventure-camping'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($adventure_camping_title); ?>">
    	</p>
    	<p>
        <label for="<?php echo esc_attr($this->get_field_id('author')); ?>"><?php esc_html_e('Author Name:','adventure-camping'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('author')); ?>" name="<?php echo esc_attr($this->get_field_name('author')); ?>" type="text" value="<?php echo esc_attr($adventure_camping_author); ?>">
    	</p>
    	<p>
        <label for="<?php echo esc_attr($this->get_field_id('designation')); ?>"><?php esc_html_e('Designation:','adventure-camping'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('designation')); ?>" name="<?php echo esc_attr($this->get_field_name('designation')); ?>" type="text" value="<?php echo esc_attr($adventure_camping_designation); ?>">
    	</p>
    	<p>
        <label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php esc_html_e('Description:','adventure-camping'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>" type="text" value="<?php echo esc_attr($adventure_camping_description); ?>">
    	</p>
    	<p>
		<label for="<?php echo esc_attr($this->get_field_id('read_more_text')); ?>"><?php esc_html_e('Button Text:','adventure-camping'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('read_more_text')); ?>" name="<?php echo esc_attr($this->get_field_name('read_more_text')); ?>" type="text" value="<?php echo esc_attr($adventure_camping_read_more_text); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('read_more_url')); ?>"><?php esc_html_e('Button Url:','adventure-camping'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('read_more_url')); ?>" name="<?php echo esc_attr($this->get_field_name('read_more_url')); ?>" type="text" value="<?php echo esc_attr($adventure_camping_read_more_url); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'upload_image' )); ?>"><?php esc_html_e( 'Image Url:','adventure-camping'); ?></label>
		<?php
			if ( $adventure_camping_upload_image != '' ) :
			echo '<img class="custom_media_image" src="' . esc_url($adventure_camping_upload_image) . '" style="margin:10px 0;padding:0;max-width:100%;float:left;display:inline-block" /><br />';
			endif;
		?>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'upload_image' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'upload_image' )); ?>" type="text" value="<?php echo esc_url( $adventure_camping_upload_image ); ?>" />
	   	</p>
		<?php 
	}
	
	// Updating widget replacing old instances with new
	public function update( $adventure_camping_new_instance, $adventure_camping_old_instance ) {
		$adventure_camping_instance = array();	
		$adventure_camping_instance['title'] = (!empty($adventure_camping_new_instance['title']) ) ? strip_tags($adventure_camping_new_instance['title']) : '';
		$adventure_camping_instance['author'] = ( ! empty( $adventure_camping_new_instance['author'] ) ) ? strip_tags($adventure_camping_new_instance['author']) : '';
		$adventure_camping_instance['designation'] = ( ! empty( $adventure_camping_new_instance['designation'] ) ) ? strip_tags($adventure_camping_new_instance['designation']) : '';
		$adventure_camping_instance['description'] = (!empty($adventure_camping_new_instance['description']) ) ? strip_tags($adventure_camping_new_instance['description']) : '';
        $adventure_camping_instance['read_more_text'] = (!empty($adventure_camping_new_instance['read_more_text']) ) ? strip_tags($adventure_camping_new_instance['read_more_text']) : '';
        $adventure_camping_instance['read_more_url'] = (!empty($adventure_camping_new_instance['read_more_url']) ) ? esc_url_raw($adventure_camping_new_instance['read_more_url']) : '';
        $adventure_camping_instance['upload_image'] = ( ! empty( $adventure_camping_new_instance['upload_image'] ) ) ? strip_tags($adventure_camping_new_instance['upload_image']) : '';

		return $adventure_camping_instance;
	}
}
// Register and load the widget
function adventure_camping_about_custom_load_widget() {
	register_widget( 'Adventure_Camping_About_Widget' );
}
add_action( 'widgets_init', 'adventure_camping_about_custom_load_widget' );