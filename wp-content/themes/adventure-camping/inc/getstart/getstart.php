<?php
//about theme info
add_action( 'admin_menu', 'adventure_camping_gettingstarted' );
function adventure_camping_gettingstarted() {
	add_theme_page( esc_html__('About Adventure Camping ', 'adventure-camping'), esc_html__('Theme Demo Import', 'adventure-camping'), 'edit_theme_options', 'adventure_camping_guide', 'adventure_camping_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function adventure_camping_admin_theme_style() {
	wp_enqueue_style('adventure-camping-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('adventure-camping-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'adventure_camping_admin_theme_style');

//guidline for about theme
function adventure_camping_mostrar_guide() { 
	//custom function about theme customizer
	$adventure_camping_return = add_query_arg( array()) ;
	$adventure_camping_theme = wp_get_theme( 'adventure-camping' );
?>

<div class="wrapper-info">
    <div class="col-left sshot-section">
    	<h2><?php esc_html_e( 'Welcome to Adventure Camping ', 'adventure-camping' ); ?> <span class="version"><?php esc_html_e( 'Version', 'adventure-camping' ); ?>: <?php echo esc_html($adventure_camping_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','adventure-camping'); ?></p>
    </div>

    <div class="col-right coupen-section">
    	<div class="logo-section">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
		</div>
		<div class="logo-right">			
			<div class="update-now">
				<h4><?php esc_html_e('Try Premium ','adventure-camping'); ?></h4>
				<h4><?php esc_html_e('Adventure Camping Theme','adventure-camping'); ?></h4>
				<h4 class="disc-text"><?php esc_html_e('at 20% Discount','adventure-camping'); ?></h4>
				<h4><?php esc_html_e('Use Coupon','adventure-camping'); ?> ( <span><?php esc_html_e('vwpro20','adventure-camping'); ?></span> ) </h4> 
				<div class="info-link">
					<a href="<?php echo esc_url( ADVENTURE_CAMPING_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'adventure-camping' ); ?></a>
				</div>
			</div>
		</div>   
		<div class="logo-img">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
    </div>

    <div class="tab-sec">
    	<div class="tab">
    		<button class="tablinks" onclick="adventure_camping_open_tab(event, 'theme_offer')"><?php esc_html_e( 'Demo Importer', 'adventure-camping' ); ?></button>
			<button class="tablinks" onclick="adventure_camping_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'adventure-camping' ); ?></button>
			<button class="tablinks" onclick="adventure_camping_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'adventure-camping' ); ?></button>
  			<button class="tablinks" onclick="adventure_camping_open_tab(event, 'free_pro')"><?php esc_html_e( 'Free VS Premium', 'adventure-camping' ); ?></button>
  			<button class="tablinks" onclick="adventure_camping_open_tab(event, 'get_bundle')"><?php esc_html_e( 'Get 250+ Themes Bundle at $99', 'adventure-camping' ); ?></button>
		</div>

		<?php 
			$adventure_camping_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$adventure_camping_plugin_custom_css ='display: block';
			}
		?>

		<div id="theme_offer" class="tabcontent open">
			<div class="demo-content">
				<h3><?php esc_html_e( 'Click the below run importer button to import demo content', 'adventure-camping' ); ?></h3>
				<?php 
				/* Get Started. */ 
				require get_parent_theme_file_path( '/inc/getstart/demo-content.php' );
			 	?>
			</div> 	
		</div>

		<div id="lite_theme" class="tabcontent">
			<?php  if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Adventure_Camping_Plugin_Activation_Settings::get_instance();
				$adventure_camping_actions = $plugin_ins->recommended_actions;
				?>
				<div class="adventure-camping-recommended-plugins">
				    <div class="adventure-camping-action-list">
				        <?php if ($adventure_camping_actions): foreach ($adventure_camping_actions as $key => $adventure_camping_actionValue): ?>
				                <div class="adventure-camping-action" id="<?php echo esc_attr($adventure_camping_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($adventure_camping_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($adventure_camping_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($adventure_camping_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','adventure-camping'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($adventure_camping_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'adventure-camping' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('The Adventure Camping WordPress Theme is a specialized website solution designed for outdoor enthusiasts, adventure camps, and gear retailers. It’s made for businesses and bloggers focusing on adventure holidays, camping experiences, outdoor activities, and adventure travel. Whether youre offering adventure gear reviews, promoting camping spots, or showcasing outdoor gear shops, this theme is the perfect tool to build a captivating online presence. The theme’s visual elements are designed to highlight the beauty of nature, featuring high-resolution images and a clean, intuitive layout that makes it easy for users to navigate. Perfect for adventure trek gear shops, camping events, and camping tips, the theme’s bold, scenic design will capture your audiences attention. It also integrates smoothly with social media, so you can easily share updates about adventure hikes with camping, family camping trips, or backcountry adventures. Customization options allow you to adjust colors, fonts, and layouts to suit your brand’s style, and the theme is fully responsive to ensure it looks great on all devices. With SEO-friendly features, your adventure tours near me or adventure base camps can easily rank on search engines, driving more traffic to your site. Whether you offer adventure eco-lodges, remote camping experiences, or camping adventure reviews, this theme provides all the tools you need to share your outdoor expertise. ','adventure-camping'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'adventure-camping' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'adventure-camping' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( ADVENTURE_CAMPING_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'adventure-camping' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'adventure-camping'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'adventure-camping'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'adventure-camping'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'adventure-camping'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'adventure-camping'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( ADVENTURE_CAMPING_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'adventure-camping'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'adventure-camping'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'adventure-camping'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( ADVENTURE_CAMPING_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'adventure-camping'); ?></a>
					</div>

					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'adventure-camping' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','adventure-camping'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=adventure_camping_top_bar') ); ?>" target="_blank"><?php esc_html_e('Topbar','adventure-camping'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=adventure_camping_banner_section') ); ?>" target="_blank"><?php esc_html_e('Banner Settings','adventure-camping'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=adventure_camping_camp_section') ); ?>" target="_blank"><?php esc_html_e('Camp Section','adventure-camping'); ?></a>
								</div>
							</div>
						
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=adventure_camping_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','adventure-camping'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','adventure-camping'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=adventure_camping_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','adventure-camping'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=adventure_camping_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','adventure-camping'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','adventure-camping'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','adventure-camping'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','adventure-camping'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','adventure-camping'); ?></span><?php esc_html_e(' Go to ','adventure-camping'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','adventure-camping'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','adventure-camping'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','adventure-camping'); ?></span><?php esc_html_e(' Go to ','adventure-camping'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','adventure-camping'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','adventure-camping'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','adventure-camping'); ?> <a class="doc-links" href="<?php echo esc_url( ADVENTURE_CAMPING_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','adventure-camping'); ?></a></p>
			  	</div>
			</div>
		</div>

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'adventure-camping' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('The Camping WordPress Theme is a versatile and premium solution specifically crafted for camping, adventure, and outdoor-focused websites. Ideal for travel agencies, campground operators, outdoor gear shops, or adventure tour providers, this theme offers a user-friendly platform to showcase your services and offerings. It supports a wide range of camping types, including mountain camping, forest camping, beach camping, and even off-grid camping, helping you reach diverse camping enthusiasts. The theme boasts clean and modern design elements, with visually stunning layouts that feature high-quality images of camping adventures, scenic outdoor destinations, and action-packed activities. It also includes customized sections for camping tips, gear reviews, and adventure guides to engage users and boost traffic. Being responsive and optimized, the theme ensures a seamless experience across devices, providing ease of navigation for campers looking for the perfect outdoor getaway. Additionally, the theme is highly customizable, allowing for personalized branding, a unique layout, and different content arrangements to suit your needs.','adventure-camping'); ?></p>
		    </div>
		    <div class="col-right-pro">
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( ADVENTURE_CAMPING_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'adventure-camping'); ?></a>
					<a href="<?php echo esc_url( ADVENTURE_CAMPING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'adventure-camping'); ?></a>
					<a href="<?php echo esc_url( ADVENTURE_CAMPING_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'adventure-camping'); ?></a>
					<a href="<?php echo esc_url( ADVENTURE_CAMPING_THEME_BUNDLE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get 250+ Themes Bundle at $99', 'adventure-camping'); ?></a>
				</div>
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'adventure-camping' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'adventure-camping'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'adventure-camping'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Banner Settings', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'adventure-camping'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'adventure-camping'); ?></td>
								<td class="table-img"><?php esc_html_e('10', 'adventure-camping'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'adventure-camping'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'adventure-camping'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'adventure-camping'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'adventure-camping'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'adventure-camping'); ?></td>
								<td class="table-img"><?php esc_html_e('13', 'adventure-camping'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template / Support Templates', 'adventure-camping'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'adventure-camping'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'adventure-camping'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'adventure-camping'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'adventure-camping'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Left/Right Sidebar)', 'adventure-camping'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Video Gallery', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Adventure Camping ', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Detail Services', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('About Business Page', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Team Member Page', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Project Description Page', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support Page', 'adventure-camping'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( ADVENTURE_CAMPING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'adventure-camping'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="get_bundle" class="tabcontent">		  	
		   	<div class="col-left-pro">
		   		<h3><?php esc_html_e( 'WP Theme Bundle', 'adventure-camping' ); ?></h3>
		    	<p><?php esc_html_e('Enhance your website effortlessly with our WP Theme Bundle. Get access to 250+ premium WordPress themes and 5+ powerful plugins, all designed to meet diverse business needs. Enjoy seamless integration with any plugins, ultimate customization flexibility, and regular updates to keep your site current and secure. Plus, benefit from our dedicated customer support, ensuring a smooth and professional web experience.','adventure-camping'); ?></p>
		    	<div class="feature">
		    		<h4><?php esc_html_e( 'Features:', 'adventure-camping' ); ?></h4>
		    		<p><?php esc_html_e('250+ Premium Themes & 5+ Plugins.', 'adventure-camping'); ?></p>
		    		<p><?php esc_html_e('Seamless Integration.', 'adventure-camping'); ?></p>
		    		<p><?php esc_html_e('Customization Flexibility.', 'adventure-camping'); ?></p>
		    		<p><?php esc_html_e('Regular Updates.', 'adventure-camping'); ?></p>
		    		<p><?php esc_html_e('Dedicated Support.', 'adventure-camping'); ?></p>
		    	</div>
		    	<p><?php esc_html_e('Upgrade now and give your website the professional edge it deserves, all at an unbeatable price of $99!', 'adventure-camping'); ?></p>
		    	<div class="pro-links">
					<a href="<?php echo esc_url( ADVENTURE_CAMPING_THEME_BUNDLE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'adventure-camping'); ?></a>
					<a href="<?php echo esc_url( ADVENTURE_CAMPING_THEME_BUNDLE_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'adventure-camping'); ?></a>
				</div>
		   	</div>
		   	<div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/bundle.png" alt="" />
		   	</div>		    
		</div>
	</div>
</div>

<?php } ?>