<?php
/**
 * Custom Contact us Widget
 */

class Adventure_Camping_Contact_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'Adventure_Camping_Contact_Widget', 
			__('VW Contact us', 'adventure-camping'),
			array( 'description' => __( 'Widget for contact us section in sidebar', 'adventure-camping' ), ) 
		);
	}
	
	public function widget( $adventure_camping_args, $adventure_camping_instance ) {
		?>
		<aside class="widget">
			<?php
			$adventure_camping_title = isset( $adventure_camping_instance['title'] ) ? $adventure_camping_instance['title'] : '';
			$adventure_camping_phone = isset( $adventure_camping_instance['phone'] ) ? $adventure_camping_instance['phone'] : '';
			$adventure_camping_email = isset( $adventure_camping_instance['email'] ) ? $adventure_camping_instance['email'] : '';
			$adventure_camping_address = isset( $adventure_camping_instance['address'] ) ? $adventure_camping_instance['address'] : '';
			$adventure_camping_timing = isset( $adventure_camping_instance['timing'] ) ? $adventure_camping_instance['timing'] : '';
			$adventure_camping_longitude = isset( $adventure_camping_instance['longitude'] ) ? $adventure_camping_instance['longitude'] : '';
			$adventure_camping_latitude = isset( $adventure_camping_instance['latitude'] ) ? $adventure_camping_instance['latitude'] : '';
			$adventure_camping_contact_form = isset( $adventure_camping_instance['contact_form'] ) ? $adventure_camping_instance['contact_form'] : '';

	        echo '<div class="custom-contact-us">';
	        if(!empty($adventure_camping_title) ){ ?><h3 class="custom_title1"><?php echo esc_html($adventure_camping_title); ?></h3><?php } ?>
		        <?php if(!empty($adventure_camping_phone) ){ ?>
		        	<div class="row contact-detail">
		        		<div class="col-lg-2 col-md-2 align-self-center">
		        			<span class="custom_details"><i class="fa-solid fa-phone-volume me-2"></i></span>
		        		</div>
		        		<div class="col-lg-10 col-md-10 align-self-center">
		        			<span class="contact-title"><?php echo esc_html('Contact', 'adventure-camping'); ?></span><span class="custom_desc"><?php echo esc_html($adventure_camping_phone); ?></span>
		        		</div>		        		
		        	</div>
		        <?php } ?>
		        <?php if(!empty($adventure_camping_email) ){ ?>
		        	<div class="row contact-detail">
		        		<div class="col-lg-2 col-md-2 align-self-center">
		        			<span class="custom_details"><i class="fa-regular fa-envelope me-2"></i></span>
		        		</div>
		        		<div class="col-lg-10 col-md-10 align-self-center">
		        			<span class="contact-title"><?php echo esc_html('Mail Address', 'adventure-camping'); ?></span><span class="custom_desc"><?php echo esc_html($adventure_camping_email); ?></span>
		        		</div>
		        	</div>
		        <?php } ?>
		        <?php if(!empty($adventure_camping_address) ){ ?>
		        	<div class="row contact-detail">
		        		<div class="col-lg-2 col-md-2 align-self-center">
		        			<span class="custom_details"><i class="fa-solid fa-location-dot me-2"></i></span>
		        		</div>
			        	<div class="col-lg-10 col-md-10 align-self-center">
			        		<span class="contact-title"><?php echo esc_html('Location', 'adventure-camping'); ?></span><span class="custom_desc"><?php echo esc_html($adventure_camping_address); ?></span>
			        	</div>
			        </div>
			    <?php } ?> 
		        <?php if(!empty($adventure_camping_timing) ){ ?><p><span class="custom_details"><?php esc_html_e('Opening Time: ','adventure-camping'); ?></span><span class="custom_desc"><?php echo esc_html($adventure_camping_timing); ?></span></p><?php } ?>
		        <?php if(!empty($adventure_camping_longitude) ){ ?><embed width="100%" height="200px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo esc_html($adventure_camping_longitude); ?>,<?php echo esc_html($adventure_camping_latitude); ?>&hl=es;z=14&amp;output=embed"></embed><?php } ?>
		        <?php if(!empty($adventure_camping_contact_form) ){ ?><?php echo do_shortcode($adventure_camping_contact_form); ?><?php } ?>
	        <?php echo '</div>';
			?>
		</aside>
		<?php
	}
	
	// Widget Backend 
	public function form( $adventure_camping_instance ) {

		$adventure_camping_title= ''; $adventure_camping_phone= ''; $adventure_camping_email = ''; $adventure_camping_address = ''; $adventure_camping_timing = ''; $adventure_camping_longitude = ''; $adventure_camping_latitude = ''; $adventure_camping_contact_form = ''; 
		
		$adventure_camping_title = isset( $adventure_camping_instance['title'] ) ? $adventure_camping_instance['title'] : '';
		$adventure_camping_phone = isset( $adventure_camping_instance['phone'] ) ? $adventure_camping_instance['phone'] : '';
		$adventure_camping_email = isset( $adventure_camping_instance['email'] ) ? $adventure_camping_instance['email'] : '';
		$adventure_camping_address = isset( $adventure_camping_instance['address'] ) ? $adventure_camping_instance['address'] : '';
		$adventure_camping_timing = isset( $adventure_camping_instance['timing'] ) ? $adventure_camping_instance['timing'] : '';
		$adventure_camping_longitude = isset( $adventure_camping_instance['longitude'] ) ? $adventure_camping_instance['longitude'] : '';
		$adventure_camping_latitude = isset( $adventure_camping_instance['latitude'] ) ? $adventure_camping_instance['latitude'] : '';
		$adventure_camping_contact_form = isset( $adventure_camping_instance['contact_form'] ) ? $adventure_camping_instance['contact_form'] : '';
		
		?>

		<p>
        	<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','adventure-camping'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($adventure_camping_title); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone Number:','adventure-camping'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($adventure_camping_phone); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email id:','adventure-camping'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($adventure_camping_email); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:','adventure-camping'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" type="text" value="<?php echo esc_attr($adventure_camping_address); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('timing')); ?>"><?php esc_html_e('Opening Time:','adventure-camping'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('timing')); ?>" name="<?php echo esc_attr($this->get_field_name('timing')); ?>" type="text" value="<?php echo esc_attr($adventure_camping_timing); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('longitude')); ?>"><?php esc_html_e('Longitude:','adventure-camping'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('longitude')); ?>" name="<?php echo esc_attr($this->get_field_name('longitude')); ?>" type="text" value="<?php echo esc_attr($adventure_camping_longitude); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('latitude')); ?>"><?php esc_html_e('Latitude:','adventure-camping'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('latitude')); ?>" name="<?php echo esc_attr($this->get_field_name('latitude')); ?>" type="text" value="<?php echo esc_attr($adventure_camping_latitude); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('contact_form')); ?>"><?php esc_html_e('Contact Form Shortcode:','adventure-camping'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('contact_form')); ?>" name="<?php echo esc_attr($this->get_field_name('contact_form')); ?>" type="text" value="<?php echo esc_attr($adventure_camping_contact_form); ?>">
    	</p>
		
		<?php 
	}
	
	// Updating widget replacing old instances with new
	public function update( $adventure_camping_new_instance, $adventure_camping_old_instance ) {
		$adventure_camping_instance = array();	
		$adventure_camping_instance['title'] = (!empty($adventure_camping_new_instance['title']) ) ? strip_tags($adventure_camping_new_instance['title']) : '';
		$adventure_camping_instance['phone'] = (!empty($adventure_camping_new_instance['phone']) ) ? adventure_camping_sanitize_phone_number($adventure_camping_new_instance['phone']) : '';
		$adventure_camping_instance['email'] = (!empty($adventure_camping_new_instance['email']) ) ? sanitize_email($adventure_camping_new_instance['email']) : '';
		$adventure_camping_instance['address'] = (!empty($adventure_camping_new_instance['address']) ) ? strip_tags($adventure_camping_new_instance['address']) : '';
		$adventure_camping_instance['timing'] = (!empty($adventure_camping_new_instance['timing']) ) ? strip_tags($adventure_camping_new_instance['timing']) : '';
		$adventure_camping_instance['longitude'] = (!empty($adventure_camping_new_instance['longitude']) ) ? strip_tags($adventure_camping_new_instance['longitude']) : '';
		$adventure_camping_instance['latitude'] = (!empty($adventure_camping_new_instance['latitude']) ) ? strip_tags($adventure_camping_new_instance['latitude']) : '';
		$adventure_camping_instance['contact_form'] = (!empty($adventure_camping_new_instance['contact_form']) ) ? strip_tags($adventure_camping_new_instance['contact_form']) : '';
        
		return $adventure_camping_instance;
	}
}
// Register and load the widget
function adventure_camping_contact_custom_load_widget() {
	register_widget( 'Adventure_Camping_Contact_Widget' );
}
add_action( 'widgets_init', 'adventure_camping_contact_custom_load_widget' );