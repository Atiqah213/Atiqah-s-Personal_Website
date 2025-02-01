<?php
//about theme info
add_action( 'admin_menu', 'street_food_truck_gettingstarted' );
function street_food_truck_gettingstarted() {
	add_theme_page( esc_html__('About Street Food Truck ', 'street-food-truck'), esc_html__('Theme Demo Import', 'street-food-truck'), 'edit_theme_options', 'street_food_truck_guide', 'street_food_truck_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function street_food_truck_admin_theme_style() {
	wp_enqueue_style('street-food-truck-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('street-food-truck-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'street_food_truck_admin_theme_style');

//guidline for about theme
function street_food_truck_mostrar_guide() { 
	//custom function about theme customizer
	$street_food_truck_return = add_query_arg( array()) ;
	$street_food_truck_theme = wp_get_theme( 'street-food-truck' );
?>

<div class="wrapper-info">
    <div class="col-left sshot-section">
    	<h2><?php esc_html_e( 'Welcome to Street Food Truck ', 'street-food-truck' ); ?> <span class="version"><?php esc_html_e( 'Version', 'street-food-truck' ); ?>: <?php echo esc_html($street_food_truck_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','street-food-truck'); ?></p>
    </div>

    <div class="col-right coupen-section">
    	<div class="logo-section">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
		</div>
		<div class="logo-right">			
			<div class="update-now">
				<h4><?php esc_html_e('Try Premium ','street-food-truck'); ?></h4>
				<h4><?php esc_html_e('Street Food Truck Theme','street-food-truck'); ?></h4>
				<h4 class="disc-text"><?php esc_html_e('at 20% Discount','street-food-truck'); ?></h4>
				<h4><?php esc_html_e('Use Coupon','street-food-truck'); ?> ( <span><?php esc_html_e('vwpro20','street-food-truck'); ?></span> ) </h4> 
				<div class="info-link">
					<a href="<?php echo esc_url( STREET_FOOD_TRUCK_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'street-food-truck' ); ?></a>
				</div>
			</div>
		</div>   
		<div class="logo-img">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
    </div>

    <div class="tab-sec">
    	<div class="tab">
    		<button class="tablinks" onclick="street_food_truck_open_tab(event, 'theme_offer')"><?php esc_html_e( 'Demo Importer', 'street-food-truck' ); ?></button>
			<button class="tablinks" onclick="street_food_truck_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'street-food-truck' ); ?></button>
			
			<button class="tablinks" onclick="street_food_truck_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'street-food-truck' ); ?></button>
  			<button class="tablinks" onclick="street_food_truck_open_tab(event, 'free_pro')"><?php esc_html_e( 'Free Vs Pro', 'street-food-truck' ); ?></button>
  			<button class="tablinks" onclick="street_food_truck_open_tab(event, 'get_bundle')"><?php esc_html_e( 'Get 250+ Themes Bundle at $99', 'street-food-truck' ); ?></button>
		</div>

		<?php 
			$street_food_truck_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$street_food_truck_plugin_custom_css ='display: block';
			}
		?>

		<div id="theme_offer" class="tabcontent open">
			<div class="demo-content">
				<h3><?php esc_html_e( 'Click the below run importer button to import demo content', 'street-food-truck' ); ?></h3>
				<?php 
				/* Get Started. */ 
				require get_parent_theme_file_path( '/inc/getstart/demo-content.php' );
			 	?>
			</div> 	
		</div>

		<div id="lite_theme" class="tabcontent">
			<?php  if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Street_Food_Truck_Plugin_Activation_Settings::get_instance();
				$street_food_truck_actions = $plugin_ins->recommended_actions;
				?>
				<div class="street-food-truck-recommended-plugins">
				    <div class="street-food-truck-action-list">
				        <?php if ($street_food_truck_actions): foreach ($street_food_truck_actions as $key => $street_food_truck_actionValue): ?>
				                <div class="street-food-truck-action" id="<?php echo esc_attr($street_food_truck_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($street_food_truck_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($street_food_truck_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($street_food_truck_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','street-food-truck'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($street_food_truck_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'street-food-truck' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('Street Food Truck is a dynamic WordPress theme designed specifically for mobile kitchens, food carts, and street food vendors. Whether youre a gourmet street food operator, Food truck, Street food, Mobile kitchen, Food catering, Outdoor dining, Event catering, Fast food, Gourmet truck, Food festival, Food vendors, Street Food Truck, Food Truck Near Me, Best Food Trucks, Mobile Food Truck, Gourmet Food Truck, Street Food, Food Truck Menu, Food Truck Catering, Tasty Street Food, Food Truck Festival, Street Food Cuisine, Food Truck Business, Food Truck Events, Street Food Truck Near Me, Street Food Catering, Local Food Trucks, Food Truck Vendors, Unique Food Trucks, Healthy Street Food, Food Truck Experience, Street Food Specialties, Snack bar, Mobile café, Food delivery, Pop-up restaurant, Food cart, Street vendors, Culinary business, Local cuisine, Outdoor events, Street dining, catering at festivals, or running a food trailer business, this theme offers a visually appealing and functional platform to showcase your offerings. It’s tailored to meet the unique needs of the street food industry, providing a modern design that captures the vibrant, lively spirit of street food culture. Built with street food businesses in mind, this theme is perfect for showcasing your street food menu, promoting events, and connecting with your community. It includes bold visuals, vibrant colours, and customizable layouts that highlight your unique culinary offerings. The responsive design ensures your website looks great on all devices, allowing customers to easily find you, whether on their phones or desktops. This theme comes with features like image and video galleries, allowing you to display mouth-watering photos of your food, and promotional videos that can draw in more customers. It also supports social media integration, helping you engage with your audience and promote your street food business across different platforms. This theme provides the perfect blend of style and functionality, helping you elevate your street food business and connect with food lovers everywhere.','street-food-truck'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'street-food-truck' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'street-food-truck' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( STREET_FOOD_TRUCK_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'street-food-truck' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'street-food-truck'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'street-food-truck'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'street-food-truck'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'street-food-truck'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'street-food-truck'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( STREET_FOOD_TRUCK_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'street-food-truck'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'street-food-truck'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'street-food-truck'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( STREET_FOOD_TRUCK_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'street-food-truck'); ?></a>
					</div>

					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'street-food-truck' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','street-food-truck'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=street_food_truck_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','street-food-truck'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=street_food_truck_top_bar') ); ?>" target="_blank"><?php esc_html_e('Top Bar','street-food-truck'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=street_food_truck_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','street-food-truck'); ?></a>
								</div>
							</div>
						
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=street_food_truck_about_us_section') ); ?>" target="_blank"><?php esc_html_e('About Us Section','street-food-truck'); ?></a>
								</div>

								<div class="row-box2">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','street-food-truck'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','street-food-truck'); ?></a>
								</div>

								<div class="row-box2">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=street_food_truck_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','street-food-truck'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=street_food_truck_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','street-food-truck'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','street-food-truck'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','street-food-truck'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','street-food-truck'); ?></span><?php esc_html_e(' Go to ','street-food-truck'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','street-food-truck'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','street-food-truck'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','street-food-truck'); ?></span><?php esc_html_e(' Go to ','street-food-truck'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','street-food-truck'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','street-food-truck'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','street-food-truck'); ?> <a class="doc-links" href="<?php echo esc_url( STREET_FOOD_TRUCK_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','street-food-truck'); ?></a></p>
			  	</div>
			</div>
		</div>


		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'street-food-truck' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('The Street Food WordPress Theme is designed to elevate your street food business with its advanced features and polished aesthetics. Ideal for food trucks, pop-up events, and gourmet street food vendors, this premium theme offers a comprehensive set of tools to showcase your unique offerings. It’s crafted to enhance your brand’s online presence and attract more customers. Visually, the theme boasts a modern and sleek design, perfect for highlighting street food specials, meal deals, and seasonal menus. Its customizable elements allow for tailored presentation of your culinary creations, from vibrant food photography to enticing menu layouts. The theme’s premium status ensures high-quality performance and exclusive features. It includes responsive design, ensuring your site looks great on all devices, and cross-browser compatibility, providing a seamless experience across different web browsers. The theme also supports advanced marketing strategies with features like social media integration, SEO optimization, and custom promotional banners. Additionally, it facilitates efficient event coordination with features for managing food festivals, catering opportunities, and neighbourhood events.','street-food-truck'); ?></p>
		    </div>
		    <div class="col-right-pro">
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( STREET_FOOD_TRUCK_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'street-food-truck'); ?></a>
					<a href="<?php echo esc_url( STREET_FOOD_TRUCK_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'street-food-truck'); ?></a>
					<a href="<?php echo esc_url( STREET_FOOD_TRUCK_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'street-food-truck'); ?></a>
					<a href="<?php echo esc_url( STREET_FOOD_TRUCK_THEME_BUNDLE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get 250+ Themes Bundle at $99', 'street-food-truck'); ?></a>
				</div>
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'street-food-truck' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'street-food-truck'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'street-food-truck'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Banner Settings', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'street-food-truck'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'street-food-truck'); ?></td>
								<td class="table-img"><?php esc_html_e('10', 'street-food-truck'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'street-food-truck'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'street-food-truck'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'street-food-truck'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'street-food-truck'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'street-food-truck'); ?></td>
								<td class="table-img"><?php esc_html_e('13', 'street-food-truck'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template / Support Templates', 'street-food-truck'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'street-food-truck'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'street-food-truck'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'street-food-truck'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'street-food-truck'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Left/Right Sidebar)', 'street-food-truck'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Video Gallery', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Street Food Truck ', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Detail Services', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('About Business Page', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Team Member Page', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Project Description Page', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support Page', 'street-food-truck'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( STREET_FOOD_TRUCK_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'street-food-truck'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="get_bundle" class="tabcontent">		  	
		   <div class="col-left-pro">
		   	<h3><?php esc_html_e( 'WP Theme Bundle', 'street-food-truck' ); ?></h3>
		    	<p><?php esc_html_e('Enhance your website effortlessly with our WP Theme Bundle. Get access to 250+ premium WordPress themes and 5+ powerful plugins, all designed to meet diverse business needs. Enjoy seamless integration with any plugins, ultimate customization flexibility, and regular updates to keep your site current and secure. Plus, benefit from our dedicated customer support, ensuring a smooth and professional web experience.','street-food-truck'); ?></p>
		    	<div class="feature">
		    		<h4><?php esc_html_e( 'Features:', 'street-food-truck' ); ?></h4>
		    		<p><?php esc_html_e('250+ Premium Themes & 5+ Plugins.', 'street-food-truck'); ?></p>
		    		<p><?php esc_html_e('Seamless Integration.', 'street-food-truck'); ?></p>
		    		<p><?php esc_html_e('Customization Flexibility.', 'street-food-truck'); ?></p>
		    		<p><?php esc_html_e('Regular Updates.', 'street-food-truck'); ?></p>
		    		<p><?php esc_html_e('Dedicated Support.', 'street-food-truck'); ?></p>
		    	</div>
		    	<p><?php esc_html_e('Upgrade now and give your website the professional edge it deserves, all at an unbeatable price of $99!', 'street-food-truck'); ?></p>
		    	<div class="pro-links">
					<a href="<?php echo esc_url( STREET_FOOD_TRUCK_THEME_BUNDLE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'street-food-truck'); ?></a>
					<a href="<?php echo esc_url( STREET_FOOD_TRUCK_THEME_BUNDLE_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'street-food-truck'); ?></a>
				</div>
		   </div>
		   <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/bundle.png" alt="" />
		   </div>		    
		</div>
	</div>
</div>

<?php } ?>