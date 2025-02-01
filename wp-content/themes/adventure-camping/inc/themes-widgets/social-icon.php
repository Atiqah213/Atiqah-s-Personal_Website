<?php
/**
 * Custom Social Widget
 */

class Adventure_Camping_Social_Widget extends WP_Widget {
	
	function __construct() {
		parent::__construct(
			'Adventure_Camping_Social_Widget',
			__('VW Social Icon', 'adventure-camping'),
			array( 'description' => __( 'Widget for Social icons section', 'adventure-camping' ), ) 
		);
	}

	public function widget( $adventure_camping_args, $adventure_camping_instance ) { ?>
		<div class="widget">
			<?php
			$adventure_camping_title = isset( $adventure_camping_instance['title'] ) ? $adventure_camping_instance['title'] : '';
			$adventure_camping_facebook = isset( $adventure_camping_instance['facebook'] ) ? $adventure_camping_instance['facebook'] : '';
			$adventure_camping_twitter = isset( $adventure_camping_instance['twitter'] ) ? $adventure_camping_instance['twitter'] : '';
			$adventure_camping_instagram = isset( $adventure_camping_instance['instagram'] ) ? $adventure_camping_instance['instagram'] : '';
			$adventure_camping_youtube = isset( $adventure_camping_instance['youtube'] ) ? $adventure_camping_instance['youtube'] : '';
			$adventure_camping_dribbal = isset( $adventure_camping_instance['dribbal'] ) ? $adventure_camping_instance['dribbal'] : '';
			$adventure_camping_linkedin = isset( $adventure_camping_instance['linkedin'] ) ? $adventure_camping_instance['linkedin'] : '';
			$adventure_camping_pinterest = isset( $adventure_camping_instance['pinterest'] ) ? $adventure_camping_instance['pinterest'] : '';
			$adventure_camping_tumblr = isset( $adventure_camping_instance['tumblr'] ) ? $adventure_camping_instance['tumblr'] : '';
			

	        echo '<div class="custom-social-icons">';

	        if(!empty($adventure_camping_title) ){ ?><h3 class="custom_title"><?php echo esc_html($adventure_camping_title); ?></h3><?php } ?>
	        <?php if(!empty($adventure_camping_facebook) ){ ?><p class="mb-0"><a class="custom_facebook fff" target= "_blank" href="<?php echo esc_url($adventure_camping_facebook); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','adventure-camping' );?></span></a></p><?php } ?>

	        <?php if(!empty($adventure_camping_twitter) ){ ?><p class="mb-0"><a class="custom_twitter" target= "_blank" href="<?php echo esc_url($adventure_camping_twitter); ?>"><i class="fa-brands fa-x-twitter"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','adventure-camping' );?></span></a></p><?php } ?>
	        
	        <?php if(!empty($adventure_camping_instagram) ){ ?><p class="mb-0"><a class="custom_instagram" target= "_blank" href="<?php echo esc_url($adventure_camping_instagram); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram','adventure-camping' );?></span></a></p><?php } ?>

	        <?php if(!empty($adventure_camping_youtube) ){ ?><p class="mb-0"><a class="custom_youtube" target= "_blank" href="<?php echo esc_url($adventure_camping_youtube); ?>"><i class="fab fa-youtube"></i><span class="screen-reader-text"><?php esc_html_e( 'Youtube','adventure-camping' );?></span></a></p><?php } ?>

	        <?php if(!empty($adventure_camping_dribbal) ){ ?><p class="mb-0"><a class="custom_dribbal" target= "_blank" href="<?php echo esc_url($adventure_camping_dribbal); ?>"><i class="fa-solid fa-basketball"></i><span class="screen-reader-text"><?php esc_html_e( 'Dribbal','adventure-camping' );?></span></a></p><?php } ?>

	        <?php if(!empty($adventure_camping_linkedin) ){ ?><p class="mb-0"><a class="custom_linkedin" target= "_blank" href="<?php echo esc_url($adventure_camping_linkedin); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin','adventure-camping' );?></span></a></p><?php } ?>
	        

	        <?php if(!empty($adventure_camping_pinterest) ){ ?><p class="mb-0"><a class="custom_pinterest" target= "_blank" href="<?php echo esc_url($adventure_camping_pinterest); ?>"><i class="fab fa-pinterest-p"></i><span class="screen-reader-text"><?php esc_html_e( 'Pinterest','adventure-camping' );?></span></a></p><?php } ?>
	        

	        <?php if(!empty($adventure_camping_tumblr) ){ ?><p class="mb-0"><a class="custom_tumblr" target= "_blank" href="<?php echo esc_url($adventure_camping_tumblr); ?>"><i class="fab fa-tumblr"></i><span class="screen-reader-text"><?php esc_html_e( 'Tumblr','adventure-camping' );?></span></a></p><?php } ?>

	        <?php echo '</div>';
			?>
		</div>
		<?php
	}
	
	// Widget Backend 
	public function form( $adventure_camping_instance ) {

		$adventure_camping_title= ''; $adventure_camping_facebook = ''; $adventure_camping_twitter = ''; $adventure_camping_linkedin = '';  $adventure_camping_pinterest = '';$adventure_camping_tumblr = ''; $adventure_camping_instagram = ''; $adventure_camping_youtube = ''; 

		$adventure_camping_title = isset( $adventure_camping_instance['title'] ) ? $adventure_camping_instance['title'] : '';
		$adventure_camping_facebook = isset( $adventure_camping_instance['facebook'] ) ? $adventure_camping_instance['facebook'] : '';
		$adventure_camping_instagram = isset( $adventure_camping_instance['instagram'] ) ? $adventure_camping_instance['instagram'] : '';
		$adventure_camping_twitter = isset( $adventure_camping_instance['twitter'] ) ? $adventure_camping_instance['twitter'] : '';
		$adventure_camping_youtube = isset( $adventure_camping_instance['youtube'] ) ? $adventure_camping_instance['youtube'] : '';
		$adventure_camping_dribbal = isset( $adventure_camping_instance['dribbal'] ) ? $adventure_camping_instance['dribbal'] : '';
		$adventure_camping_linkedin = isset( $adventure_camping_instance['linkedin'] ) ? $adventure_camping_instance['linkedin'] : '';
		$adventure_camping_pinterest = isset( $adventure_camping_instance['pinterest'] ) ? $adventure_camping_instance['pinterest'] : '';
		$adventure_camping_tumblr = isset( $adventure_camping_instance['tumblr'] ) ? $adventure_camping_instance['tumblr'] : '';
		
		?>
		<p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','adventure-camping'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($adventure_camping_title); ?>">
    	</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"><?php esc_html_e('Facebook:','adventure-camping'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" type="text" value="<?php echo esc_attr($adventure_camping_facebook); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php esc_html_e('Twitter:','adventure-camping'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" type="text" value="<?php echo esc_attr($adventure_camping_twitter); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('instagram')); ?>"><?php esc_html_e('Instagram:','adventure-camping'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" type="text" value="<?php echo esc_attr($adventure_camping_instagram); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>"><?php esc_html_e('Youtube:','adventure-camping'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" type="text" value="<?php echo esc_attr($adventure_camping_youtube); ?>">
		</p>
		<label for="<?php echo esc_attr($this->get_field_id('dribbal')); ?>"><?php esc_html_e('Dribbal:','adventure-camping'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('dribbal')); ?>" name="<?php echo esc_attr($this->get_field_name('dribbal')); ?>" type="text" value="<?php echo esc_attr($adventure_camping_dribbal); ?>">
		</p>

		<label for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>"><?php esc_html_e('Linkedin:','adventure-camping'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" type="text" value="<?php echo esc_attr($adventure_camping_linkedin); ?>">
		</p>
		<p>
		
		<label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>"><?php esc_html_e('Pinterest:','adventure-camping'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" type="text" value="<?php echo esc_attr($adventure_camping_pinterest); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('tumblr')); ?>"><?php esc_html_e('Tumblr:','adventure-camping'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('tumblr')); ?>" name="<?php echo esc_attr($this->get_field_name('tumblr')); ?>" type="text" value="<?php echo esc_attr($adventure_camping_tumblr); ?>">
		</p>
		<p>
		
		<?php 
	}
	
	public function update( $adventure_camping_new_instance, $adventure_camping_old_instance ) {
		$adventure_camping_instance = array();
		$adventure_camping_instance['title'] = (!empty($adventure_camping_new_instance['title']) ) ? strip_tags($adventure_camping_new_instance['title']) : '';	
        $adventure_camping_instance['facebook'] = (!empty($adventure_camping_new_instance['facebook']) ) ? esc_url_raw($adventure_camping_new_instance['facebook']) : '';
        $adventure_camping_instance['twitter'] = (!empty($adventure_camping_new_instance['twitter']) ) ? esc_url_raw($adventure_camping_new_instance['twitter']) : '';
        $adventure_camping_instance['instagram'] = (!empty($adventure_camping_new_instance['instagram']) ) ? esc_url_raw($adventure_camping_new_instance['instagram']) : '';
        $adventure_camping_instance['youtube'] = (!empty($adventure_camping_new_instance['youtube']) ) ? esc_url_raw($adventure_camping_new_instance['youtube']) : '';
        $adventure_camping_instance['dribbal'] = (!empty($adventure_camping_new_instance['dribbal']) ) ? esc_url_raw($adventure_camping_new_instance['dribbal']) : '';
        $adventure_camping_instance['linkedin'] = (!empty($adventure_camping_new_instance['linkedin']) ) ? esc_url_raw($adventure_camping_new_instance['linkedin']) : '';
        $adventure_camping_instance['pinterest'] = (!empty($adventure_camping_new_instance['pinterest']) ) ? esc_url_raw($adventure_camping_new_instance['pinterest']) : '';
        $adventure_camping_instance['tumblr'] = (!empty($adventure_camping_new_instance['tumblr']) ) ? esc_url_raw($adventure_camping_new_instance['tumblr']) : '';
     	
     	
		return $adventure_camping_instance;
	}
}

function adventure_camping_custom_load_widget() {
	register_widget( 'Adventure_Camping_Social_Widget' );
}
add_action( 'widgets_init', 'adventure_camping_custom_load_widget' );