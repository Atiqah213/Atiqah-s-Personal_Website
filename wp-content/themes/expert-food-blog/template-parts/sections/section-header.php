<header class="main-header">
	<?php 
	  $expert_food_blog_header = get_theme_mod('expert_food_blog_header_setting',true);
	  
	  if($expert_food_blog_header == '1') {
	?>
  	<div class="upper-header-area">
  		<div class="container">
    		<?php
				$expert_food_blog_social_media_facebook = get_theme_mod('expert_food_blog_social_media_facebook');
				$expert_food_blog_social_media_twitter = get_theme_mod('expert_food_blog_social_media_twitter');
				$expert_food_blog_social_media_instagram = get_theme_mod('expert_food_blog_social_media_instagram');
				$expert_food_blog_social_media_linkedin = get_theme_mod('expert_food_blog_social_media_linkedin');
				$expert_food_blog_social_media_youtube = get_theme_mod('expert_food_blog_social_media_youtube');

				$expert_food_blog_topheader_location = get_theme_mod( 'expert_food_blog_topheader_location' );

				$expert_food_blog_topheader_timing = get_theme_mod( 'expert_food_blog_topheader_timing' );

			?>
			<div class="row">
				<div class="col-lg-4 col-md-4 text-md-start text-center align-self-center">
					<?php if( $expert_food_blog_topheader_location != ''){?>
            		<p class="mb-0 offer-text"><i class="fas fa-map-marker-alt"></i> <?php echo esc_html( apply_filters('expert_food_blog_topheader', $expert_food_blog_topheader_location)); ?></p>
          			<?php } ?>
        		</div>
        		<div class="col-lg-4 col-md-4 text-md-start text-center align-self-center">
					<?php if( $expert_food_blog_topheader_timing != ''){?>
            		<p class="mb-0 offer-text"><i class="far fa-clock"></i> <?php echo esc_html( apply_filters('expert_food_blog_topheader', $expert_food_blog_topheader_timing)); ?></p>
          			<?php } ?>
        		</div>
				<div class="col-lg-4 col-md-4 text-md-end text-center align-self-center">
					<?php if( $expert_food_blog_social_media_facebook != '' || $expert_food_blog_social_media_youtube != '' || $expert_food_blog_social_media_twitter != '' || $expert_food_blog_social_media_instagram != '' || $expert_food_blog_social_media_linkedin != ''){?>
						<span><?php esc_html_e('FOLLOW US: ','expert-food-blog'); ?></span>
					<?php }?>
					<?php if( $expert_food_blog_social_media_facebook != ''){?>
						<a class="me-3" href="<?php echo esc_url( apply_filters('expert_food_blog_topheader', $expert_food_blog_social_media_facebook)); ?>"><i class="fab fa-facebook-f"></i></a>
					<?php }?>
					<?php if( $expert_food_blog_social_media_twitter != ''){?>
						<a class="me-3" href="<?php echo esc_url( apply_filters('expert_food_blog_topheader', $expert_food_blog_social_media_twitter)); ?>"><i class="fab fa-twitter"></i></a>
					<?php }?>
					<?php if( $expert_food_blog_social_media_instagram != ''){?>
						<a class="me-3" href="<?php echo esc_url( apply_filters('expert_food_blog_topheader', $expert_food_blog_social_media_instagram)); ?>"><i class="fab fa-instagram"></i></a>
					<?php }?>
					<?php if( $expert_food_blog_social_media_linkedin != ''){?>
						<a class="me-3" href="<?php echo esc_url( apply_filters('expert_food_blog_topheader', $expert_food_blog_social_media_linkedin)); ?>"><i class="fab fa-linkedin-in"></i></a>
					<?php }?>
					<?php if( $expert_food_blog_social_media_youtube != ''){?>
						<a href="<?php echo esc_url( apply_filters('expert_food_blog_topheader', $expert_food_blog_social_media_youtube)); ?>"><i class="fab fa-youtube"></i></a>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
	<?php }?>

	<div class="middle-header-aera">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 align-self-center text-md-start text-center">
				<?php
					$expert_food_blog_topheader_email_text = get_theme_mod( 'expert_food_blog_topheader_email_text' );
					$expert_food_blog_topheader_email = get_theme_mod( 'expert_food_blog_topheader_email' );

					$expert_food_blog_topheader_call_text = get_theme_mod( 'expert_food_blog_topheader_call_text' );
					$expert_food_blog_topheader_call = get_theme_mod( 'expert_food_blog_topheader_call' );
				?>
					<?php if( $expert_food_blog_topheader_email_text != '' || $expert_food_blog_topheader_email != ''){?>
						<div class="row">
							<div class="col-lg-3 col-md-3 col-4 align-self-center">
								<i class="fas fa-envelope-open-text"></i>
							</div>
							<div class="col-lg-9 col-md-9 col-8 align-self-center">
								<p class="mb-0 offer-text"><?php echo esc_html( apply_filters('expert_food_blog_topheader', $expert_food_blog_topheader_email_text)); ?></p>
            					<p class="mb-0"><?php echo esc_html( apply_filters('expert_food_blog_topheader', $expert_food_blog_topheader_email)); ?></p>
							</div>
						</div>
					<?php } ?>
				</div>
				<div class="col-lg-4 col-md-4 align-self-center">
					<div class="logo text-center">
						<?php 
						if (has_custom_logo()) {
							the_custom_logo();
						} else {
							// Check if both title and tagline settings are disabled
							$expert_food_blog_tagline_enabled = get_theme_mod('expert_food_blog_tagline_setting', false);
							$expert_food_blog_title_enabled = get_theme_mod('expert_food_blog_site_title_setting', false);

							if (!$expert_food_blog_tagline_enabled && !$expert_food_blog_title_enabled) {
								// Display the default logo
								$default_logo_url = get_template_directory_uri() . '/assets/images/logo.png'; // Replace with your default logo path
								echo '<a href="' . esc_url(home_url('/')) . '">';
								echo '<img src="' . esc_url($default_logo_url) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
								echo '</a>';
							}

							// Display tagline if the setting is enabled
							if ($expert_food_blog_tagline_enabled) :
								$expert_food_blog_site_desc = get_bloginfo('description'); ?>
								<p class="site-description"><?php echo esc_html($expert_food_blog_site_desc); ?></p>
							<?php endif; ?>

							<?php
							// Display site title if the setting is enabled
							if ($expert_food_blog_title_enabled) : ?>
								<p class="site-title">
									<a href="<?php echo esc_url(home_url('/')); ?>">
										<?php echo esc_html(get_bloginfo('name')); ?>
									</a>
								</p>
							<?php endif; ?>
						<?php } ?>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 align-self-center text-center text-md-end">
					<?php if( $expert_food_blog_topheader_call_text != '' || $expert_food_blog_topheader_call != ''){?>
						<div class="row">
							<div class="col-lg-9 col-md-9 col-8 align-self-center">
								<p class="mb-0 offer-text"><?php echo esc_html( apply_filters('expert_food_blog_topheader', $expert_food_blog_topheader_call_text)); ?></p>
            					<p class="mb-0"><?php echo esc_html( apply_filters('expert_food_blog_topheader', $expert_food_blog_topheader_call)); ?></p>
							</div>
							<div class="col-lg-3 col-md-3 col-4 align-self-center">
								<i class="fas fa-phone"></i>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<div class="<?php if( get_theme_mod( 'expert_food_blog_sticky_header') != '') { ?>sticky-header<?php } else { ?>close-sticky<?php } ?>">
		<div class="center-header-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 col-md-10 col-6">
						<nav class="navbar navbar-expand-lg navbaroffcanvase">
				  			<div class="navbar-menubar responsive-menu">
				  				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-menu"  aria-label="<?php esc_attr('Toggle navigation','expert-food-blog'); ?>"> 
				      				<i class="fa fa-bars"></i>
				      			</button>
					          	<div class="collapse navbar-collapse navbar-menu">
					          		<button class="navbar-toggler navbar-toggler-close" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-menu" aria-label="<?php esc_attr('Toggle navigation','expert-food-blog'); ?>"> 
					          			<i class="fa fa-times"></i>
					      			</button> 
									<?php
						                wp_nav_menu( array( 
						                  'theme_location' => 'primary',
						                  'container_class' => 'main-menu clearfix' ,
						                  'menu_class' => 'clearfix',
						                  'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
						                  'fallback_cb' => 'wp_page_menu',
						                ) );
					            	?>
					          	</div>
					        </div>
				    	</nav>
				    </div>
				    <div class="col-lg-2 col-md-2 col-6 text-lg-end text-center align-self-center">
						<span class="search-bar text-center me-3">
			              <button type="button" class="open-search"><i class="fas fa-search"></i></button>
			          	</span>
					</div>
					
					<div class="search-outer">
						<div class="inner_searchbox w-100 h-100">
							<?php get_search_form(); ?>
						</div>
						<button type="button" class="search-close"><?php esc_html_e('CLOSE', 'expert-food-blog'); ?></button>
			        </div> 
			    </div>
			</div>
		</div>
  	</div>
</header>