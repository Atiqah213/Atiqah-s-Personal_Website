<?php
/**
 * Custom About us Widget
 */

class Street_Food_Truck_About_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'Street_Food_Truck_About_Widget',
			__('VW About us', 'street-food-truck'),
			array( 'description' => __( 'Widget for about us section in sidebar', 'street-food-truck' ), ) 
		);
	}
	
	public function widget( $street_food_truck_args, $street_food_truck_instance ) {
		?>
		<aside class="widget">
			<?php
			$street_food_truck_title = isset( $street_food_truck_instance['title'] ) ? $street_food_truck_instance['title'] : '';
			$street_food_truck_author = isset( $street_food_truck_instance['author'] ) ? $street_food_truck_instance['author'] : '';
			$street_food_truck_designation = isset( $street_food_truck_instance['designation'] ) ? $street_food_truck_instance['designation'] : '';
			$street_food_truck_description = isset( $street_food_truck_instance['description'] ) ? $street_food_truck_instance['description'] : '';
			$street_food_truck_read_more_url = isset( $street_food_truck_instance['read_more_url'] ) ? $street_food_truck_instance['read_more_url'] : '';
			$street_food_truck_read_more_text = isset( $street_food_truck_instance['read_more_text'] ) ? $street_food_truck_instance['read_more_text'] : '';
			$street_food_truck_upload_image = isset( $street_food_truck_instance['upload_image'] ) ? $street_food_truck_instance['upload_image'] : '';

	        echo '<div class="custom-about-us">';
	        if(!empty($street_food_truck_title) ){ ?><h3 class="custom_title"><?php echo esc_html($street_food_truck_title); ?></h3><?php } ?>
		        <?php if($street_food_truck_upload_image): ?>
	      			<img src="<?php echo esc_url($street_food_truck_upload_image); ?>" alt="">
				<?php endif; ?>
				<?php if(!empty($street_food_truck_author) ){ ?><p class="custom_author"><?php echo esc_html($street_food_truck_author); ?></p><?php } ?>
				<?php if(!empty($street_food_truck_designation) ){ ?><p class="custom_designation"><?php echo esc_html($street_food_truck_designation); ?></p><?php } ?>
		        <?php if(!empty($street_food_truck_description) ){ ?><p class="custom_desc"><?php echo esc_html($street_food_truck_description); ?></p><?php } ?>
		        <?php if(!empty($street_food_truck_read_more_url) ){ ?><div class="more-button"><a class="custom_read_more" href="<?php echo esc_url($street_food_truck_read_more_url); ?>"><?php if(!empty($street_food_truck_read_more_text) ){ ?><?php echo esc_html($street_food_truck_read_more_text); ?><?php } ?></a></div><?php } ?>
	        <?php echo '</div>';
			?>
		</aside>
		<?php
	}
	
	// Widget Backend 
	public function form( $street_food_truck_instance ) {	

		$street_food_truck_title= ''; $street_food_truck_author = ''; $street_food_truck_designation = ''; $street_food_truck_description= ''; $street_food_truck_read_more_text = ''; $street_food_truck_read_more_url = ''; $street_food_truck_upload_image = '';

		$street_food_truck_title = isset( $street_food_truck_instance['title'] ) ? $street_food_truck_instance['title'] : '';
		$street_food_truck_author = isset( $street_food_truck_instance['author'] ) ? $street_food_truck_instance['author'] : '';
		$street_food_truck_designation = isset( $street_food_truck_instance['designation'] ) ? $street_food_truck_instance['designation'] : '';
		$street_food_truck_description = isset( $street_food_truck_instance['description'] ) ? $street_food_truck_instance['description'] : '';
		$street_food_truck_read_more_url = isset( $street_food_truck_instance['read_more_url'] ) ? $street_food_truck_instance['read_more_url'] : '';
		$street_food_truck_read_more_text = isset( $street_food_truck_instance['read_more_text'] ) ? $street_food_truck_instance['read_more_text'] : '';
		$street_food_truck_upload_image = isset( $street_food_truck_instance['upload_image'] ) ? $street_food_truck_instance['upload_image'] : '';
	?>
		<p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','street-food-truck'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($street_food_truck_title); ?>">
    	</p>
    	<p>
        <label for="<?php echo esc_attr($this->get_field_id('author')); ?>"><?php esc_html_e('Author Name:','street-food-truck'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('author')); ?>" name="<?php echo esc_attr($this->get_field_name('author')); ?>" type="text" value="<?php echo esc_attr($street_food_truck_author); ?>">
    	</p>
    	<p>
        <label for="<?php echo esc_attr($this->get_field_id('designation')); ?>"><?php esc_html_e('Designation:','street-food-truck'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('designation')); ?>" name="<?php echo esc_attr($this->get_field_name('designation')); ?>" type="text" value="<?php echo esc_attr($street_food_truck_designation); ?>">
    	</p>
    	<p>
        <label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php esc_html_e('Description:','street-food-truck'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>" type="text" value="<?php echo esc_attr($street_food_truck_description); ?>">
    	</p>
    	<p>
		<label for="<?php echo esc_attr($this->get_field_id('read_more_text')); ?>"><?php esc_html_e('Button Text:','street-food-truck'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('read_more_text')); ?>" name="<?php echo esc_attr($this->get_field_name('read_more_text')); ?>" type="text" value="<?php echo esc_attr($street_food_truck_read_more_text); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('read_more_url')); ?>"><?php esc_html_e('Button Url:','street-food-truck'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('read_more_url')); ?>" name="<?php echo esc_attr($this->get_field_name('read_more_url')); ?>" type="text" value="<?php echo esc_attr($street_food_truck_read_more_url); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'upload_image' )); ?>"><?php esc_html_e( 'Image Url:','street-food-truck'); ?></label>
		<?php
			if ( $street_food_truck_upload_image != '' ) :
			echo '<img class="custom_media_image" src="' . esc_url($street_food_truck_upload_image) . '" style="margin:10px 0;padding:0;max-width:100%;float:left;display:inline-block" /><br />';
			endif;
		?>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'upload_image' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'upload_image' )); ?>" type="text" value="<?php echo esc_url( $street_food_truck_upload_image ); ?>" />
	   	</p>
		<?php 
	}
	
	// Updating widget replacing old instances with new
	public function update( $street_food_truck_new_instance, $street_food_truck_old_instance ) {
		$street_food_truck_instance = array();	
		$street_food_truck_instance['title'] = (!empty($street_food_truck_new_instance['title']) ) ? strip_tags($street_food_truck_new_instance['title']) : '';
		$street_food_truck_instance['author'] = ( ! empty( $street_food_truck_new_instance['author'] ) ) ? strip_tags($street_food_truck_new_instance['author']) : '';
		$street_food_truck_instance['designation'] = ( ! empty( $street_food_truck_new_instance['designation'] ) ) ? strip_tags($street_food_truck_new_instance['designation']) : '';
		$street_food_truck_instance['description'] = (!empty($street_food_truck_new_instance['description']) ) ? strip_tags($street_food_truck_new_instance['description']) : '';
        $street_food_truck_instance['read_more_text'] = (!empty($street_food_truck_new_instance['read_more_text']) ) ? strip_tags($street_food_truck_new_instance['read_more_text']) : '';
        $street_food_truck_instance['read_more_url'] = (!empty($street_food_truck_new_instance['read_more_url']) ) ? esc_url_raw($street_food_truck_new_instance['read_more_url']) : '';
        $street_food_truck_instance['upload_image'] = ( ! empty( $street_food_truck_new_instance['upload_image'] ) ) ? strip_tags($street_food_truck_new_instance['upload_image']) : '';

		return $street_food_truck_instance;
	}
}
// Register and load the widget
function street_food_truck_about_custom_load_widget() {
	register_widget( 'Street_Food_Truck_About_Widget' );
}
add_action( 'widgets_init', 'street_food_truck_about_custom_load_widget' );