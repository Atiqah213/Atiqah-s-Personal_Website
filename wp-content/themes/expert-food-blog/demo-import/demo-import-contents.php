<?php

/**
 * Wizard
 *
 * @package Whizzie
 * @author Catapult Themes
 * @since 1.0.0
 */

class Whizzie {
	
	protected $version = '1.1.0';
	
	/** @var string Current theme name, used as namespace in actions. */
	protected $expert_food_blog_theme_name = '';
	protected $expert_food_blog_theme_title = '';
	
	/** @var string Wizard page slug and title. */
	protected $expert_food_blog_page_slug = '';
	protected $expert_food_blog_page_title = '';
	
	/** @var array Wizard steps set by user. */
	protected $config_steps = array();
	
	public $parent_slug;
	
	/**
	 * Constructor
	 *
	 * @param $config	Our config parameters
	 */
	public function __construct( $config ) {
		$this->set_vars( $config );
		$this->init();
	}
	
	/**
	 * Set some settings
	 * @since 1.0.0
	 * @param $config	Our config parameters
	 */
	public function set_vars( $config ) {

		if( isset( $config['expert_food_blog_page_slug'] ) ) {
			$this->expert_food_blog_page_slug = esc_attr( $config['expert_food_blog_page_slug'] );
		}
		if( isset( $config['expert_food_blog_page_title'] ) ) {
			$this->expert_food_blog_page_title = esc_attr( $config['expert_food_blog_page_title'] );
		}
		if( isset( $config['steps'] ) ) {
			$this->config_steps = $config['steps'];
		}
		
		$expert_food_blog_current_theme = wp_get_theme();
		$this->expert_food_blog_theme_title = $expert_food_blog_current_theme->get( 'Name' );
		$this->expert_food_blog_theme_name = strtolower( preg_replace( '#[^a-zA-Z]#', '', $expert_food_blog_current_theme->get( 'Name' ) ) );
		$this->expert_food_blog_page_slug = apply_filters( $this->expert_food_blog_theme_name . '_theme_setup_wizard_expert_food_blog_page_slug', $this->expert_food_blog_theme_name . '-wizard' );
		$this->parent_slug = apply_filters( $this->expert_food_blog_theme_name . '_theme_setup_wizard_parent_slug', '' );

	}
	
	/**
	 * Hooks and filters
	 * @since 1.0.0
	 */	
	public function init() {
		
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_menu', array( $this, 'menu_page' ) );
		add_action( 'wp_ajax_setup_widgets', array( $this, 'setup_widgets' ) );
		
	}
	
	public function enqueue_scripts() {
		wp_enqueue_style( 'expert-food-blog-demo-import-style', get_template_directory_uri() . '/demo-import/assets/css/demo-import-style.css');
		wp_register_script( 'expert-food-blog-demo-import-script', get_template_directory_uri() . '/demo-import/assets/js/demo-import-script.js', array( 'jquery' ), time() );
		wp_localize_script( 
			'expert-food-blog-demo-import-script',
			'whizzie_params',
			array(
				'ajaxurl' 		=> admin_url( 'admin-ajax.php' ),
				'wpnonce' 		=> wp_create_nonce( 'whizzie_nonce' ),
				'verify_text'	=> esc_html( 'verifying', 'expert-food-blog' )
			)
		);
		wp_enqueue_script( 'expert-food-blog-demo-import-script' );
	}
	
	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	/**
	 * Make a modal screen for the wizard
	 */
	public function menu_page() {
		add_theme_page( esc_html( $this->expert_food_blog_page_title ), esc_html( $this->expert_food_blog_page_title ), 'manage_options', $this->expert_food_blog_page_slug, array( $this, 'wizard_page' ) );
	}
	
	/**
	 * Make an interface for the wizard
	 */
	public function wizard_page() { 

		$url = wp_nonce_url( add_query_arg( array( 'plugins' => 'go' ) ), 'whizzie-setup' );
		$method = '';
		$fields = array_keys( $_POST );

		if ( false === ( $creds = request_filesystem_credentials( esc_url_raw( $url ), $method, false, false, $fields ) ) ) {
			return true;
		}

		if ( ! WP_Filesystem( $creds ) ) {
			request_filesystem_credentials( esc_url_raw( $url ), $method, true, false, $fields );
			return true;
		}

		$expert_food_blog_theme = wp_get_theme();
		$expert_food_blog_theme_title = $expert_food_blog_theme->get( 'Name' );
		$expert_food_blog_theme_version = $expert_food_blog_theme->get( 'Version' );

		?>
		<div class="wrap">
			<?php 
			// Theme Title and Version
			printf( '<h1>%s %s</h1>', esc_html( $expert_food_blog_theme_title ), esc_html( '(Version :- ' . $expert_food_blog_theme_version . ')' ) );
			?>
			
			<div class="card whizzie-wrap">
				<div class="demo_content_image">
					<div class="demo_content">
						<?php

						$expert_food_blog_steps = $this->get_steps();
						echo '<ul class="whizzie-menu">';
						foreach ( $expert_food_blog_steps as $expert_food_blog_step ) {
							$class = 'step step-' . esc_attr( $expert_food_blog_step['id'] );
							echo '<li data-step="' . esc_attr( $expert_food_blog_step['id'] ) . '" class="' . esc_attr( $class ) . '">';
							printf( '<h2>%s</h2>', esc_html( $expert_food_blog_step['title'] ) );

							$content = call_user_func( array( $this, $expert_food_blog_step['view'] ) );
							if ( isset( $content['summary'] ) ) {
								printf(
									'<div class="summary">%s</div>',
									wp_kses_post( $content['summary'] )
								);
							}
							if ( isset( $content['detail'] ) ) {
								printf( '<p><a href="#" class="more-info">%s</a></p>', esc_html__( 'More Info', 'expert-food-blog' ) );
								printf(
									'<div class="detail">%s</div>',
									wp_kses_post( $content['detail'] )
								);
							}
							if ( isset( $expert_food_blog_step['button_text'] ) && $expert_food_blog_step['button_text'] ) {
								printf( 
									'<div class="button-wrap"><a href="#" class="button button-primary do-it" data-callback="%s" data-step="%s">%s</a></div>',
									esc_attr( $expert_food_blog_step['callback'] ),
									esc_attr( $expert_food_blog_step['id'] ),
									esc_html( $expert_food_blog_step['button_text'] )
								);
							}
							if ( isset( $expert_food_blog_step['can_skip'] ) && $expert_food_blog_step['can_skip'] ) {
								printf( 
									'<div class="button-wrap" style="margin-left: 0.5em;"><a href="#" class="button button-secondary do-it" data-callback="%s" data-step="%s">%s</a></div>',
									esc_attr( 'do_next_step' ),
									esc_attr( $expert_food_blog_step['id'] ),
									esc_html__( 'Skip', 'expert-food-blog' )
								);
							}
							echo '</li>';
						}
						echo '</ul>';
						?>
						
						<ul class="whizzie-nav">
							<?php
							foreach ( $expert_food_blog_steps as $expert_food_blog_step ) {
								if ( isset( $expert_food_blog_step['icon'] ) && $expert_food_blog_step['icon'] ) {
									echo '<li class="nav-step-' . esc_attr( $expert_food_blog_step['id'] ) . '"><span class="dashicons dashicons-' . esc_attr( $expert_food_blog_step['icon'] ) . '"></span></li>';
								}
							}
							?>
						</ul>

						<div class="step-loading"><span class="spinner"></span></div>
					</div> <!-- .demo_content -->

					<div class="demo_image">
						<div class="demo_image buttons">
							<a href="<?php echo esc_url( EXPERT_FOOD_BLOG_PRO_THEME_URL ); ?>" class="button button-primary bundle" target="_blank"><?php echo esc_html__( 'Buy Now', 'expert-food-blog' ); ?></a>
							<a href="<?php echo esc_url( EXPERT_FOOD_BLOG_THEME_BUNDLE_URL ); ?>" class="button button-primary bundle pro" target="_blank"><?php echo esc_html__( 'Buy All Themes', 'expert-food-blog' ); ?></a>
							<a href="<?php echo esc_url( EXPERT_FOOD_BLOG_FREE_DOCS_THEME_URL ); ?>" target="_blank" class="button button-primary"><?php echo esc_html__( 'Free Documentation', 'expert-food-blog' ); ?></a>
							<a href="<?php echo esc_url( EXPERT_FOOD_BLOG_SUPPORT_THEME_URL ); ?>" target="_blank" class="button button-primary"><?php echo esc_html__( 'Support', 'expert-food-blog' ); ?></a>
						</div>
						<img src="<?php echo esc_url( get_template_directory_uri() . '/screenshot.png' ); ?>" alt="<?php echo esc_attr( $expert_food_blog_theme_title ); ?>" />
					</div> <!-- .demo_image -->

				</div> <!-- .demo_content_image -->
			</div> <!-- .whizzie-wrap -->
		</div> <!-- .wrap -->
		<?php
	}


		
	/**
	 * Set options for the steps
	 * Incorporate any options set by the theme dev
	 * Return the array for the steps
	 * @return Array
	 */
	public function get_steps() {
		$expert_food_blog_dev_steps = $this->config_steps;
		$expert_food_blog_steps = array( 
			'intro' => array(
				'id'			=> 'intro',
				'title'			=> __( 'Welcome to ', 'expert-food-blog' ) . $this->expert_food_blog_theme_title,
				'icon'			=> 'dashboard',
				'view'			=> 'get_step_intro',
				'callback'		=> 'do_next_step',
				'button_text'	=> __( 'Start Now', 'expert-food-blog' ),
				'can_skip'		=> false
			),
			'widgets' => array(
				'id'			=> 'widgets',
				'title'			=> __( 'Demo Importer', 'expert-food-blog' ),
				'icon'			=> 'welcome-widgets-menus',
				'view'			=> 'get_step_widgets',
				'callback'		=> 'install_widgets',
				'button_text'	=> __( 'Import Demo Content', 'expert-food-blog' ),
				'can_skip'		=> true
			),
			'done' => array(
				'id'			=> 'done',
				'title'			=> __( 'All Done', 'expert-food-blog' ),
				'icon'			=> 'yes',
				'view'			=> 'get_step_done',
				'callback'		=> ''
			)
		);
		
		// Iterate through each step and replace with dev config values
		if( $expert_food_blog_dev_steps ) {
			// Configurable elements - these are the only ones the dev can update from demo-import-settings.php
			$can_config = array( 'title', 'icon', 'button_text', 'can_skip' );
			foreach( $expert_food_blog_dev_steps as $expert_food_blog_dev_step ) {
				// We can only proceed if an ID exists and matches one of our IDs
				if( isset( $expert_food_blog_dev_step['id'] ) ) {
					$id = $expert_food_blog_dev_step['id'];
					if( isset( $expert_food_blog_steps[$id] ) ) {
						foreach( $can_config as $element ) {
							if( isset( $expert_food_blog_dev_step[$element] ) ) {
								$expert_food_blog_steps[$id][$element] = $expert_food_blog_dev_step[$element];
							}
						}
					}
				}
			}
		}
		return $expert_food_blog_steps;
	}
	
	/**
	 * Print the content for the intro step
	 */
	public function get_step_intro() { ?>
		<div class="summary">
			<div class="steps_content">
				<p>
					<?php printf(
						/* translators: %s: Theme name. */
						esc_html__('Thank you for choosing the %s theme. You will only need a few minutes to configure and launch your new website with the help of this quick setup tutorial. To begin using your website, simply follow the wizard\'s instructions.', 'expert-food-blog'),
						esc_html($this->expert_food_blog_theme_title)
					); ?>
				</p>
			</div>
		</div>
	<?php }

	/**
	 * Print the content for the widgets step
	 * @since 1.1.0
	 */
	public function get_step_widgets() { ?>
	<div class="summary">
		<p>
			<?php esc_html_e('This theme supports importing the demo content and adding widgets. Get them installed with the below button. Using the Customizer, it is possible to update or even deactivate them.','expert-food-blog'); ?>
		</p>
	</div>
	<?php }
	
	/**
	 * Print the content for the final step
	 */
	public function get_step_done() { ?>
		<div id="expert-food-blog-demo-setup-guid">
			<div class="customize_div"><?php echo esc_html( 'Now Customize your website' ); ?>
				<a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="customize_link">
					<?php echo esc_html( 'Customize ' ); ?> 
					<span class="dashicons dashicons-share-alt2"></span>
				</a>
			</div>
			<div class="expert-food-blog-setup-finish">
				<a target="_blank" href="<?php echo esc_url( admin_url() ); ?>" class="button button-primary">
					<?php esc_html_e( 'Go To Dashboard', 'expert-food-blog' ); ?>
				</a>
				<a target="_blank" href="<?php echo esc_url( get_home_url() ); ?>" class="button button-primary">
					<?php esc_html_e( 'Preview Site', 'expert-food-blog' ); ?>
				</a>
			</div>
		</div>
	<?php }

	/**
	 * Get the widgets.wie file from the /content folder
	 * @return Mixed	Either the file or false
	 * @since 1.1.0
	 */
	public function has_widget_file() {
		if( file_exists( $this->widget_file_url ) ) {
			return true;
		}
		return false;
	}

	public function expert_food_blog_customizer_nav_menu() {

		// ---------------- Create Primary Menu ---------------- //

		$expert_food_blog_themename = 'Expert Food Blog';
		$expert_food_blog_menuname = $expert_food_blog_themename . ' Primary Menu';
		$expert_food_blog_menulocation = 'primary';
		$expert_food_blog_menu_exists = wp_get_nav_menu_object($expert_food_blog_menuname);

		if (!$expert_food_blog_menu_exists) {
			$expert_food_blog_menu_id = wp_create_nav_menu($expert_food_blog_menuname);

			// Home
			wp_update_nav_menu_item($expert_food_blog_menu_id, 0, array(
				'menu-item-title' => __('Home', 'expert-food-blog'),
				'menu-item-classes' => 'home',
				'menu-item-url' => home_url('/'),
				'menu-item-status' => 'publish'
			));

			// About
			$expert_food_blog_page_about = get_page_by_path('about');
			if($expert_food_blog_page_about){
				wp_update_nav_menu_item($expert_food_blog_menu_id, 0, array(
					'menu-item-title' => __('About', 'expert-food-blog'),
					'menu-item-classes' => 'about',
					'menu-item-url' => get_permalink($expert_food_blog_page_about),
					'menu-item-status' => 'publish'
				));
			}

			// Services
			$expert_food_blog_page_services = get_page_by_path('services');
			if($expert_food_blog_page_services){
				wp_update_nav_menu_item($expert_food_blog_menu_id, 0, array(
					'menu-item-title' => __('Services', 'expert-food-blog'),
					'menu-item-classes' => 'services',
					'menu-item-url' => get_permalink($expert_food_blog_page_services),
					'menu-item-status' => 'publish'
				));
			}

			// Blog
			$expert_food_blog_page_blog = get_page_by_path('blog');
			if($expert_food_blog_page_blog){
				wp_update_nav_menu_item($expert_food_blog_menu_id, 0, array(
					'menu-item-title' => __('Blog', 'expert-food-blog'),
					'menu-item-classes' => 'blog',
					'menu-item-url' => get_permalink($expert_food_blog_page_blog),
					'menu-item-status' => 'publish'
				));
			}

			// 404 Page
			$expert_food_blog_notfound = get_page_by_path('404 Page');
			if($expert_food_blog_notfound){
				wp_update_nav_menu_item($expert_food_blog_menu_id, 0, array(
					'menu-item-title' => __('404 Page', 'expert-food-blog'),
					'menu-item-classes' => '404',
					'menu-item-url' => get_permalink($expert_food_blog_notfound),
					'menu-item-status' => 'publish'
				));
			}

			// Contact Us
			$expert_food_blog_page_contact = get_page_by_path('contact');
			if($expert_food_blog_page_contact){
				wp_update_nav_menu_item($expert_food_blog_menu_id, 0, array(
					'menu-item-title' => __('Contact Us', 'expert-food-blog'),
					'menu-item-classes' => 'contact',
					'menu-item-url' => get_permalink($expert_food_blog_page_contact),
					'menu-item-status' => 'publish'
				));
			}

			if (!has_nav_menu($expert_food_blog_menulocation)) {
				$expert_food_blog_locations = get_theme_mod('nav_menu_locations');
				$expert_food_blog_locations[$expert_food_blog_menulocation] = $expert_food_blog_menu_id;
				set_theme_mod('nav_menu_locations', $expert_food_blog_locations);
			}
		}
	}


	/**
	 * Imports the Demo Content
	 * @since 1.1.0
	 */
	public function setup_widgets(){

		//................................................. MENUS .................................................//
		
			// Creation of home page //
			$expert_food_blog_home_content = '';
			$expert_food_blog_home_title = 'Home';
			$expert_food_blog_home = array(
					'post_type' => 'page',
					'post_title' => $expert_food_blog_home_title,
					'post_content'  => $expert_food_blog_home_content,
					'post_status' => 'publish',
					'post_author' => 1,
					'post_slug' => 'home'
			);
			$expert_food_blog_home_id = wp_insert_post($expert_food_blog_home);

			add_post_meta( $expert_food_blog_home_id, '_wp_page_template', 'templates/template-frontpage.php' );

			$expert_food_blog_home = get_page_by_title( 'Home' );
			update_option( 'page_on_front', $expert_food_blog_home->ID );
			update_option( 'show_on_front', 'page' );

			// Creation of blog page //
			$expert_food_blog_blog_title = 'Blog';
			$expert_food_blog_blog_check = get_page_by_path('blog');
			if (!$expert_food_blog_blog_check) {
				$expert_food_blog_blog = array(
					'post_type'    => 'page',
					'post_title'   => $expert_food_blog_blog_title,
					'post_status'  => 'publish',
					'post_author'  => 1,
					'post_name'    => 'blog'
				);
				$expert_food_blog_blog_id = wp_insert_post($expert_food_blog_blog);

				if (!is_wp_error($expert_food_blog_blog_id)) {
					update_option('page_for_posts', $expert_food_blog_blog_id);
				}
			}

			// Creation of contact us page //
			$expert_food_blog_contact_title = 'Contact Us';
			$expert_food_blog_contact_content = 'What is Lorem Ipsum?
														Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
														&nbsp;
														Why do we use it?
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
														&nbsp;
														Where does it come from?
														There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
														&nbsp;
														Why do we use it?
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
														&nbsp;
														Where does it come from?
														There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
			$expert_food_blog_contact_check = get_page_by_path('contact');
			if (!$expert_food_blog_contact_check) {
				$expert_food_blog_contact = array(
					'post_type'    => 'page',
					'post_title'   => $expert_food_blog_contact_title,
					'post_content'   => $expert_food_blog_contact_content,
					'post_status'  => 'publish',
					'post_author'  => 1,
					'post_name'    => 'contact' // Unique slug for the Contact Us page
				);
				wp_insert_post($expert_food_blog_contact);
			}

			// Creation of about page //
			$expert_food_blog_about_title = 'About';
			$expert_food_blog_about_content = 'What is Lorem Ipsum?
														Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
														&nbsp;
														Why do we use it?
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
														&nbsp;
														Where does it come from?
														There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
														&nbsp;
														Why do we use it?
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
														&nbsp;
														Where does it come from?
														There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
			$expert_food_blog_about_check = get_page_by_path('about');
			if (!$expert_food_blog_about_check) {
				$expert_food_blog_about = array(
					'post_type'    => 'page',
					'post_title'   => $expert_food_blog_about_title,
					'post_content'   => $expert_food_blog_about_content,
					'post_status'  => 'publish',
					'post_author'  => 1,
					'post_name'    => 'about' // Unique slug for the About page
				);
				wp_insert_post($expert_food_blog_about);
			}

			// Creation of services page //
			$expert_food_blog_services_title = 'Services';
			$expert_food_blog_services_content = 'What is Lorem Ipsum?
														Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
														&nbsp;
														Why do we use it?
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
														&nbsp;
														Where does it come from?
														There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
														&nbsp;
														Why do we use it?
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
														&nbsp;
														Where does it come from?
														There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
			$expert_food_blog_services_check = get_page_by_path('services');
			if (!$expert_food_blog_services_check) {
				$expert_food_blog_services = array(
					'post_type'    => 'page',
					'post_title'   => $expert_food_blog_services_title,
					'post_content'   => $expert_food_blog_services_content,
					'post_status'  => 'publish',
					'post_author'  => 1,
					'post_name'    => 'services' // Unique slug for the Services page
				);
				wp_insert_post($expert_food_blog_services);
			}

			// Creation of 404 page //
			$expert_food_blog_notfound_title = '404 Page';
			$expert_food_blog_notfound = array(
				'post_type'   => 'page',
				'post_title'  => $expert_food_blog_notfound_title,
				'post_status' => 'publish',
				'post_author' => 1,
				'post_slug'   => '404'
			);
			$expert_food_blog_notfound_id = wp_insert_post($expert_food_blog_notfound);
			add_post_meta($expert_food_blog_notfound_id, '_wp_page_template', '404.php');


			$expert_food_blog_slider_title = 'FIND YOUR SPECIAL FOOD TODAY WITH 01';
			$expert_food_blog_slider_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.';
			$expert_food_blog_slider_check = get_page_by_path('slider-page');

			// Check if the page already exists, if not, create the page
			if (!$expert_food_blog_slider_check) {
				// Insert the page
				$expert_food_blog_slider = array(
					'post_type'   => 'page',
					'post_title'  => $expert_food_blog_slider_title,
					'post_content'  => $expert_food_blog_slider_content,
					'post_status' => 'publish',
					'post_author' => 1,
					'post_name'   => 'slider-page'
				);
				
				// Insert the post (page)
				$page_id = wp_insert_post($expert_food_blog_slider);
				
				// Get the image URL (replace 'slider.png' with the actual path to the image)
				$image_path = get_template_directory() . '/assets/images/slider.png';  // Path to your image in theme folder
				
				// If the image exists, upload it to the media library and set it as the featured image
				if (file_exists($image_path)) {
					// Upload the image
					$upload = wp_upload_bits('slider.png', null, file_get_contents($image_path));
					
					// Check if the upload was successful
					if (!$upload['error']) {
						// Create an attachment post
						$attachment = array(
							'guid' => $upload['url'], 
							'post_mime_type' => 'image/png',
							'post_title' => basename($image_path),
							'post_content' => '',
							'post_status' => 'inherit'
						);
						
						// Insert the attachment into the media library
						$attachment_id = wp_insert_attachment($attachment, $upload['file'], $page_id);
						
						// Generate the metadata for the attachment
						$attachment_data = wp_generate_attachment_metadata($attachment_id, $upload['file']);
						wp_update_attachment_metadata($attachment_id, $attachment_data);
						
						// Set the image as the featured image for the page
						set_post_thumbnail($page_id, $attachment_id);
					}
				}
			}

			$expert_food_blog_slider_title = 'FIND YOUR SPECIAL FOOD TODAY WITH 02';
			$expert_food_blog_slider_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.';
			$expert_food_blog_slider_check = get_page_by_path('slider-pages');

			// Check if the page already exists, if not, create the page
			if (!$expert_food_blog_slider_check) {
				// Insert the page
				$expert_food_blog_slider = array(
					'post_type'   => 'page',
					'post_title'  => $expert_food_blog_slider_title,
					'post_content'  => $expert_food_blog_slider_content,
					'post_status' => 'publish',
					'post_author' => 1,
					'post_name'   => 'slider-pages'
				);
				
				// Insert the post (page)
				$page_id = wp_insert_post($expert_food_blog_slider);
				
				// Get the image URL (replace 'slider2.png' with the actual path to the image)
				$image_path = get_template_directory() . '/assets/images/slider2.png';  // Path to your image in theme folder
				
				// If the image exists, upload it to the media library and set it as the featured image
				if (file_exists($image_path)) {
					// Upload the image
					$upload = wp_upload_bits('slider2.png', null, file_get_contents($image_path));
					
					// Check if the upload was successful
					if (!$upload['error']) {
						// Create an attachment post
						$attachment = array(
							'guid' => $upload['url'], 
							'post_mime_type' => 'image/png',
							'post_title' => basename($image_path),
							'post_content' => '',
							'post_status' => 'inherit'
						);
						
						// Insert the attachment into the media library
						$attachment_id = wp_insert_attachment($attachment, $upload['file'], $page_id);
						
						// Generate the metadata for the attachment
						$attachment_data = wp_generate_attachment_metadata($attachment_id, $upload['file']);
						wp_update_attachment_metadata($attachment_id, $attachment_data);
						
						// Set the image as the featured image for the page
						set_post_thumbnail($page_id, $attachment_id);
					}
				}
			}

			$expert_food_blog_slider_title = 'FIND YOUR SPECIAL FOOD TODAY WITH -3';
			$expert_food_blog_slider_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.';
			$expert_food_blog_slider_check = get_page_by_path('slider-pagess');

			// Check if the page already exists, if not, create the page
			if (!$expert_food_blog_slider_check) {
				// Insert the page
				$expert_food_blog_slider = array(
					'post_type'   => 'page',
					'post_title'  => $expert_food_blog_slider_title,
					'post_content'  => $expert_food_blog_slider_content,
					'post_status' => 'publish',
					'post_author' => 1,
					'post_name'   => 'slider-pagess'
				);
				
				// Insert the post (page)
				$page_id = wp_insert_post($expert_food_blog_slider);
				
				// Get the image URL (replace 'slider3.png' with the actual path to the image)
				$image_path = get_template_directory() . '/assets/images/slider3.png';  // Path to your image in theme folder
				
				// If the image exists, upload it to the media library and set it as the featured image
				if (file_exists($image_path)) {
					// Upload the image
					$upload = wp_upload_bits('slider3.png', null, file_get_contents($image_path));
					
					// Check if the upload was successful
					if (!$upload['error']) {
						// Create an attachment post
						$attachment = array(
							'guid' => $upload['url'], 
							'post_mime_type' => 'image/png',
							'post_title' => basename($image_path),
							'post_content' => '',
							'post_status' => 'inherit'
						);
						
						// Insert the attachment into the media library
						$attachment_id = wp_insert_attachment($attachment, $upload['file'], $page_id);
						
						// Generate the metadata for the attachment
						$attachment_data = wp_generate_attachment_metadata($attachment_id, $upload['file']);
						wp_update_attachment_metadata($attachment_id, $attachment_data);
						
						// Set the image as the featured image for the page
						set_post_thumbnail($page_id, $attachment_id);
					}
				}
			}


		/* -------------- Header ------------------*/
	
			set_theme_mod('expert_food_blog_topheader_location', '777 FRANKLIN ST, SAN FRANCISCO');
			set_theme_mod('expert_food_blog_topheader_timing', '10.00AM - 06.00PM MONDAY TO FRIDAY');
			set_theme_mod('expert_food_blog_topheader_email_text', 'DROP US A EMAIL:');
			set_theme_mod('expert_food_blog_topheader_email', 'compayname@mail.com');
			set_theme_mod('expert_food_blog_topheader_call_text', 'ANY QUESTIONS? CALL US:');
			set_theme_mod('expert_food_blog_topheader_call', '+91 123-456-780/+00 987-654-321');


		/* -------------- Slider ------------------*/
	
			set_theme_mod('expert_food_blog_slider_text', 'Food Blog Theme');

			$expert_food_blog_sliders = array('slider-page', 'slider-pages', 'slider-pagess');

			for ($i = 0; $i < count($expert_food_blog_sliders); $i++) {
				$page = get_page_by_path($expert_food_blog_sliders[$i]);

				if ($page) {
					set_theme_mod('expert_food_blog_slider' . ($i + 1), $page->ID);
				} else {
					set_theme_mod('expert_food_blog_slider' . ($i + 1), 0);
				}
			}


        $this->expert_food_blog_customizer_nav_menu();

	    exit;
	}
}