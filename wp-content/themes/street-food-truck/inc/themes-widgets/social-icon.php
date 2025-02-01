<?php
/**
 * Custom Social Widget
 */

class Street_Food_Truck_Social_Widget extends WP_Widget {
	
	function __construct() {
		parent::__construct(
			'Street_Food_Truck_Social_Widget',
			__('VW Social Icon', 'street-food-truck'),
			array( 'description' => __( 'Widget for Social icons section', 'street-food-truck' ), ) 
		);
	}

	public function widget( $street_food_truck_args, $street_food_truck_instance ) { ?>
		<div class="widget">
			<?php
			$street_food_truck_title = isset( $street_food_truck_instance['title'] ) ? $street_food_truck_instance['title'] : '';
			$street_food_truck_facebook = isset( $street_food_truck_instance['facebook'] ) ? $street_food_truck_instance['facebook'] : '';
			$street_food_truck_twitter = isset( $street_food_truck_instance['twitter'] ) ? $street_food_truck_instance['twitter'] : '';
			$street_food_truck_instagram = isset( $street_food_truck_instance['instagram'] ) ? $street_food_truck_instance['instagram'] : '';
			$street_food_truck_youtube = isset( $street_food_truck_instance['youtube'] ) ? $street_food_truck_instance['youtube'] : '';
			$street_food_truck_dribbal = isset( $street_food_truck_instance['dribbal'] ) ? $street_food_truck_instance['dribbal'] : '';
			$street_food_truck_linkedin = isset( $street_food_truck_instance['linkedin'] ) ? $street_food_truck_instance['linkedin'] : '';
			$street_food_truck_pinterest = isset( $street_food_truck_instance['pinterest'] ) ? $street_food_truck_instance['pinterest'] : '';
			$street_food_truck_tumblr = isset( $street_food_truck_instance['tumblr'] ) ? $street_food_truck_instance['tumblr'] : '';
			

	        echo '<div class="custom-social-icons">';

	        if(!empty($street_food_truck_title) ){ ?><h3 class="custom_title"><?php echo esc_html($street_food_truck_title); ?></h3><?php } ?>
	        <?php if(!empty($street_food_truck_facebook) ){ ?><p class="mb-0"><a class="custom_facebook fff" target= "_blank" href="<?php echo esc_url($street_food_truck_facebook); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','street-food-truck' );?></span></a></p><?php } ?>

	        <?php if(!empty($street_food_truck_twitter) ){ ?><p class="mb-0"><a class="custom_twitter" target= "_blank" href="<?php echo esc_url($street_food_truck_twitter); ?>"><i class="fa-brands fa-x-twitter"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','street-food-truck' );?></span></a></p><?php } ?>
	        
	        <?php if(!empty($street_food_truck_instagram) ){ ?><p class="mb-0"><a class="custom_instagram" target= "_blank" href="<?php echo esc_url($street_food_truck_instagram); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram','street-food-truck' );?></span></a></p><?php } ?>

	        <?php if(!empty($street_food_truck_youtube) ){ ?><p class="mb-0"><a class="custom_youtube" target= "_blank" href="<?php echo esc_url($street_food_truck_youtube); ?>"><i class="fab fa-youtube"></i><span class="screen-reader-text"><?php esc_html_e( 'Youtube','street-food-truck' );?></span></a></p><?php } ?>

	        <?php if(!empty($street_food_truck_dribbal) ){ ?><p class="mb-0"><a class="custom_dribbal" target= "_blank" href="<?php echo esc_url($street_food_truck_dribbal); ?>"><i class="fa-solid fa-basketball"></i><span class="screen-reader-text"><?php esc_html_e( 'Dribbal','street-food-truck' );?></span></a></p><?php } ?>

	        <?php if(!empty($street_food_truck_linkedin) ){ ?><p class="mb-0"><a class="custom_linkedin" target= "_blank" href="<?php echo esc_url($street_food_truck_linkedin); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin','street-food-truck' );?></span></a></p><?php } ?>
	        

	        <?php if(!empty($street_food_truck_pinterest) ){ ?><p class="mb-0"><a class="custom_pinterest" target= "_blank" href="<?php echo esc_url($street_food_truck_pinterest); ?>"><i class="fab fa-pinterest-p"></i><span class="screen-reader-text"><?php esc_html_e( 'Pinterest','street-food-truck' );?></span></a></p><?php } ?>
	        

	        <?php if(!empty($street_food_truck_tumblr) ){ ?><p class="mb-0"><a class="custom_tumblr" target= "_blank" href="<?php echo esc_url($street_food_truck_tumblr); ?>"><i class="fab fa-tumblr"></i><span class="screen-reader-text"><?php esc_html_e( 'Tumblr','street-food-truck' );?></span></a></p><?php } ?>

	        <?php echo '</div>';
			?>
		</div>
		<?php
	}
	
	// Widget Backend 
	public function form( $street_food_truck_instance ) {

		$street_food_truck_title= ''; $street_food_truck_facebook = ''; $street_food_truck_twitter = ''; $street_food_truck_linkedin = '';  $street_food_truck_pinterest = '';$street_food_truck_tumblr = ''; $street_food_truck_instagram = ''; $street_food_truck_youtube = ''; 

		$street_food_truck_title = isset( $street_food_truck_instance['title'] ) ? $street_food_truck_instance['title'] : '';
		$street_food_truck_facebook = isset( $street_food_truck_instance['facebook'] ) ? $street_food_truck_instance['facebook'] : '';
		$street_food_truck_instagram = isset( $street_food_truck_instance['instagram'] ) ? $street_food_truck_instance['instagram'] : '';
		$street_food_truck_twitter = isset( $street_food_truck_instance['twitter'] ) ? $street_food_truck_instance['twitter'] : '';
		$street_food_truck_youtube = isset( $street_food_truck_instance['youtube'] ) ? $street_food_truck_instance['youtube'] : '';
		$street_food_truck_dribbal = isset( $street_food_truck_instance['dribbal'] ) ? $street_food_truck_instance['dribbal'] : '';
		$street_food_truck_linkedin = isset( $street_food_truck_instance['linkedin'] ) ? $street_food_truck_instance['linkedin'] : '';
		$street_food_truck_pinterest = isset( $street_food_truck_instance['pinterest'] ) ? $street_food_truck_instance['pinterest'] : '';
		$street_food_truck_tumblr = isset( $street_food_truck_instance['tumblr'] ) ? $street_food_truck_instance['tumblr'] : '';
		
		?>
		<p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','street-food-truck'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($street_food_truck_title); ?>">
    	</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"><?php esc_html_e('Facebook:','street-food-truck'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" type="text" value="<?php echo esc_attr($street_food_truck_facebook); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php esc_html_e('Twitter:','street-food-truck'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" type="text" value="<?php echo esc_attr($street_food_truck_twitter); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('instagram')); ?>"><?php esc_html_e('Instagram:','street-food-truck'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" type="text" value="<?php echo esc_attr($street_food_truck_instagram); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>"><?php esc_html_e('Youtube:','street-food-truck'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" type="text" value="<?php echo esc_attr($street_food_truck_youtube); ?>">
		</p>
		<label for="<?php echo esc_attr($this->get_field_id('dribbal')); ?>"><?php esc_html_e('Dribbal:','street-food-truck'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('dribbal')); ?>" name="<?php echo esc_attr($this->get_field_name('dribbal')); ?>" type="text" value="<?php echo esc_attr($street_food_truck_dribbal); ?>">
		</p>

		<label for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>"><?php esc_html_e('Linkedin:','street-food-truck'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" type="text" value="<?php echo esc_attr($street_food_truck_linkedin); ?>">
		</p>
		<p>
		
		<label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>"><?php esc_html_e('Pinterest:','street-food-truck'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" type="text" value="<?php echo esc_attr($street_food_truck_pinterest); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('tumblr')); ?>"><?php esc_html_e('Tumblr:','street-food-truck'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('tumblr')); ?>" name="<?php echo esc_attr($this->get_field_name('tumblr')); ?>" type="text" value="<?php echo esc_attr($street_food_truck_tumblr); ?>">
		</p>
		<p>
		
		<?php 
	}
	
	public function update( $street_food_truck_new_instance, $street_food_truck_old_instance ) {
		$street_food_truck_instance = array();
		$street_food_truck_instance['title'] = (!empty($street_food_truck_new_instance['title']) ) ? strip_tags($street_food_truck_new_instance['title']) : '';	
        $street_food_truck_instance['facebook'] = (!empty($street_food_truck_new_instance['facebook']) ) ? esc_url_raw($street_food_truck_new_instance['facebook']) : '';
        $street_food_truck_instance['twitter'] = (!empty($street_food_truck_new_instance['twitter']) ) ? esc_url_raw($street_food_truck_new_instance['twitter']) : '';
        $street_food_truck_instance['instagram'] = (!empty($street_food_truck_new_instance['instagram']) ) ? esc_url_raw($street_food_truck_new_instance['instagram']) : '';
        $street_food_truck_instance['youtube'] = (!empty($street_food_truck_new_instance['youtube']) ) ? esc_url_raw($street_food_truck_new_instance['youtube']) : '';
        $street_food_truck_instance['dribbal'] = (!empty($street_food_truck_new_instance['dribbal']) ) ? esc_url_raw($street_food_truck_new_instance['dribbal']) : '';
        $street_food_truck_instance['linkedin'] = (!empty($street_food_truck_new_instance['linkedin']) ) ? esc_url_raw($street_food_truck_new_instance['linkedin']) : '';
        $street_food_truck_instance['pinterest'] = (!empty($street_food_truck_new_instance['pinterest']) ) ? esc_url_raw($street_food_truck_new_instance['pinterest']) : '';
        $street_food_truck_instance['tumblr'] = (!empty($street_food_truck_new_instance['tumblr']) ) ? esc_url_raw($street_food_truck_new_instance['tumblr']) : '';
     	
     	
		return $street_food_truck_instance;
	}
}

function street_food_truck_custom_load_widget() {
	register_widget( 'Street_Food_Truck_Social_Widget' );
}
add_action( 'widgets_init', 'street_food_truck_custom_load_widget' );