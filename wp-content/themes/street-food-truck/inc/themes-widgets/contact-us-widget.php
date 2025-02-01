<?php
/**
 * Custom Contact us Widget
 */

class Street_Food_Truck_Contact_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'Street_Food_Truck_Contact_Widget', 
			__('VW Contact us', 'street-food-truck'),
			array( 'description' => __( 'Widget for contact us section in sidebar', 'street-food-truck' ), ) 
		);
	}
	
	public function widget( $street_food_truck_args, $street_food_truck_instance ) {
		?>
		<aside class="widget">
			<?php
			$street_food_truck_title = isset( $street_food_truck_instance['title'] ) ? $street_food_truck_instance['title'] : '';
			$street_food_truck_phone = isset( $street_food_truck_instance['phone'] ) ? $street_food_truck_instance['phone'] : '';
			$street_food_truck_email = isset( $street_food_truck_instance['email'] ) ? $street_food_truck_instance['email'] : '';
			$street_food_truck_address = isset( $street_food_truck_instance['address'] ) ? $street_food_truck_instance['address'] : '';
			$street_food_truck_timing = isset( $street_food_truck_instance['timing'] ) ? $street_food_truck_instance['timing'] : '';
			$street_food_truck_longitude = isset( $street_food_truck_instance['longitude'] ) ? $street_food_truck_instance['longitude'] : '';
			$street_food_truck_latitude = isset( $street_food_truck_instance['latitude'] ) ? $street_food_truck_instance['latitude'] : '';
			$street_food_truck_contact_form = isset( $street_food_truck_instance['contact_form'] ) ? $street_food_truck_instance['contact_form'] : '';

	        echo '<div class="custom-contact-us">';
	        if(!empty($street_food_truck_title) ){ ?><h3 class="custom_title1"><?php echo esc_html($street_food_truck_title); ?></h3><?php } ?>
		        <?php if(!empty($street_food_truck_phone) ){ ?>
		        	<div class="row contact-detail">
		        		<div class="col-lg-2 col-md-2 align-self-center">
		        			<span class="custom_details"><i class="fa-solid fa-phone-volume me-2"></i></span>
		        		</div>
		        		<div class="col-lg-10 col-md-10 align-self-center">
		        			<span class="contact-title"><?php echo esc_html('Contact', 'street-food-truck'); ?></span><span class="custom_desc"><?php echo esc_html($street_food_truck_phone); ?></span>
		        		</div>		        		
		        	</div>
		        <?php } ?>
		        <?php if(!empty($street_food_truck_email) ){ ?>
		        	<div class="row contact-detail">
		        		<div class="col-lg-2 col-md-2 align-self-center">
		        			<span class="custom_details"><i class="fa-regular fa-envelope me-2"></i></span>
		        		</div>
		        		<div class="col-lg-10 col-md-10 align-self-center">
		        			<span class="contact-title"><?php echo esc_html('Mail Address', 'street-food-truck'); ?></span><span class="custom_desc"><?php echo esc_html($street_food_truck_email); ?></span>
		        		</div>
		        	</div>
		        <?php } ?>
		        <?php if(!empty($street_food_truck_address) ){ ?>
		        	<div class="row contact-detail">
		        		<div class="col-lg-2 col-md-2 align-self-center">
		        			<span class="custom_details"><i class="fa-solid fa-location-dot me-2"></i></span>
		        		</div>
			        	<div class="col-lg-10 col-md-10 align-self-center">
			        		<span class="contact-title"><?php echo esc_html('Location', 'street-food-truck'); ?></span><span class="custom_desc"><?php echo esc_html($street_food_truck_address); ?></span>
			        	</div>
			        </div>
			    <?php } ?> 
		        <?php if(!empty($street_food_truck_timing) ){ ?><p><span class="custom_details"><?php esc_html_e('Opening Time: ','street-food-truck'); ?></span><span class="custom_desc"><?php echo esc_html($street_food_truck_timing); ?></span></p><?php } ?>
		        <?php if(!empty($street_food_truck_longitude) ){ ?><embed width="100%" height="200px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo esc_html($street_food_truck_longitude); ?>,<?php echo esc_html($street_food_truck_latitude); ?>&hl=es;z=14&amp;output=embed"></embed><?php } ?>
		        <?php if(!empty($street_food_truck_contact_form) ){ ?><?php echo do_shortcode($street_food_truck_contact_form); ?><?php } ?>
	        <?php echo '</div>';
			?>
		</aside>
		<?php
	}
	
	// Widget Backend 
	public function form( $street_food_truck_instance ) {

		$street_food_truck_title= ''; $street_food_truck_phone= ''; $street_food_truck_email = ''; $street_food_truck_address = ''; $street_food_truck_timing = ''; $street_food_truck_longitude = ''; $street_food_truck_latitude = ''; $street_food_truck_contact_form = ''; 
		
		$street_food_truck_title = isset( $street_food_truck_instance['title'] ) ? $street_food_truck_instance['title'] : '';
		$street_food_truck_phone = isset( $street_food_truck_instance['phone'] ) ? $street_food_truck_instance['phone'] : '';
		$street_food_truck_email = isset( $street_food_truck_instance['email'] ) ? $street_food_truck_instance['email'] : '';
		$street_food_truck_address = isset( $street_food_truck_instance['address'] ) ? $street_food_truck_instance['address'] : '';
		$street_food_truck_timing = isset( $street_food_truck_instance['timing'] ) ? $street_food_truck_instance['timing'] : '';
		$street_food_truck_longitude = isset( $street_food_truck_instance['longitude'] ) ? $street_food_truck_instance['longitude'] : '';
		$street_food_truck_latitude = isset( $street_food_truck_instance['latitude'] ) ? $street_food_truck_instance['latitude'] : '';
		$street_food_truck_contact_form = isset( $street_food_truck_instance['contact_form'] ) ? $street_food_truck_instance['contact_form'] : '';
		
		?>

		<p>
        	<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','street-food-truck'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($street_food_truck_title); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone Number:','street-food-truck'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($street_food_truck_phone); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email id:','street-food-truck'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($street_food_truck_email); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:','street-food-truck'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" type="text" value="<?php echo esc_attr($street_food_truck_address); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('timing')); ?>"><?php esc_html_e('Opening Time:','street-food-truck'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('timing')); ?>" name="<?php echo esc_attr($this->get_field_name('timing')); ?>" type="text" value="<?php echo esc_attr($street_food_truck_timing); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('longitude')); ?>"><?php esc_html_e('Longitude:','street-food-truck'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('longitude')); ?>" name="<?php echo esc_attr($this->get_field_name('longitude')); ?>" type="text" value="<?php echo esc_attr($street_food_truck_longitude); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('latitude')); ?>"><?php esc_html_e('Latitude:','street-food-truck'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('latitude')); ?>" name="<?php echo esc_attr($this->get_field_name('latitude')); ?>" type="text" value="<?php echo esc_attr($street_food_truck_latitude); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('contact_form')); ?>"><?php esc_html_e('Contact Form Shortcode:','street-food-truck'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('contact_form')); ?>" name="<?php echo esc_attr($this->get_field_name('contact_form')); ?>" type="text" value="<?php echo esc_attr($street_food_truck_contact_form); ?>">
    	</p>
		
		<?php 
	}
	
	// Updating widget replacing old instances with new
	public function update( $street_food_truck_new_instance, $street_food_truck_old_instance ) {
		$street_food_truck_instance = array();	
		$street_food_truck_instance['title'] = (!empty($street_food_truck_new_instance['title']) ) ? strip_tags($street_food_truck_new_instance['title']) : '';
		$street_food_truck_instance['phone'] = (!empty($street_food_truck_new_instance['phone']) ) ? street_food_truck_sanitize_phone_number($street_food_truck_new_instance['phone']) : '';
		$street_food_truck_instance['email'] = (!empty($street_food_truck_new_instance['email']) ) ? sanitize_email($street_food_truck_new_instance['email']) : '';
		$street_food_truck_instance['address'] = (!empty($street_food_truck_new_instance['address']) ) ? strip_tags($street_food_truck_new_instance['address']) : '';
		$street_food_truck_instance['timing'] = (!empty($street_food_truck_new_instance['timing']) ) ? strip_tags($street_food_truck_new_instance['timing']) : '';
		$street_food_truck_instance['longitude'] = (!empty($street_food_truck_new_instance['longitude']) ) ? strip_tags($street_food_truck_new_instance['longitude']) : '';
		$street_food_truck_instance['latitude'] = (!empty($street_food_truck_new_instance['latitude']) ) ? strip_tags($street_food_truck_new_instance['latitude']) : '';
		$street_food_truck_instance['contact_form'] = (!empty($street_food_truck_new_instance['contact_form']) ) ? strip_tags($street_food_truck_new_instance['contact_form']) : '';
        
		return $street_food_truck_instance;
	}
}
// Register and load the widget
function street_food_truck_contact_custom_load_widget() {
	register_widget( 'Street_Food_Truck_Contact_Widget' );
}
add_action( 'widgets_init', 'street_food_truck_contact_custom_load_widget' );