<div class="theme-offer">
	<?php 
        // Check if the demo import has been completed
        $adventure_camping_demo_import_completed = get_option('adventure_camping_demo_import_completed', false);

        // If the demo import is completed, display the "View Site" button
        if ($adventure_camping_demo_import_completed) {
        echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'adventure-camping') . '</p>';
        echo '<span><a href="' . esc_url(home_url()) . '" class="button button-primary site-btn" target="_blank">' . esc_html__('VIEW SITE', 'adventure-camping') . '</a></span>';
        }

		// POST and update the customizer and other related data of THE COURIER SERVICESPRO
        if (isset($_POST['submit'])) {

        // ------- Create Nav Menu --------
        $adventure_camping_menuname = 'Main Menus';
        $adventure_camping_bpmenulocation = 'primary';
        $adventure_camping_menu_exists = wp_get_nav_menu_object($adventure_camping_menuname);

        if (!$adventure_camping_menu_exists) {
            $adventure_camping_menu_id = wp_create_nav_menu($adventure_camping_menuname);

            // Create Home Page
            $adventure_camping_home_title = 'Home';
            $adventure_camping_home = array(
                'post_type' => 'page',
                'post_title' => $adventure_camping_home_title,
                'post_content' => '',
                'post_status' => 'publish',
                'post_author' => 1,
                'post_slug' => 'home'
            );
            $adventure_camping_home_id = wp_insert_post($adventure_camping_home);
            // Assign Home Page Template
            add_post_meta($adventure_camping_home_id, '_wp_page_template', 'page-template/custom-home-page.php');
            // Update options to set Home Page as the front page
            update_option('page_on_front', $adventure_camping_home_id);
            update_option('show_on_front', 'page');
            // Add Home Page to Menu
            wp_update_nav_menu_item($adventure_camping_menu_id, 0, array(
                'menu-item-title' => __('Home', 'adventure-camping'),
                'menu-item-classes' => 'home',
                'menu-item-url' => home_url('/'),
                'menu-item-status' => 'publish',
                'menu-item-object-id' => $adventure_camping_home_id,
                'menu-item-object' => 'page',
                'menu-item-type' => 'post_type'
            ));

            // Create Pages Page with Dummy Content
            $adventure_camping_pages_title = 'Pages';
            $adventure_camping_pages_content = '
            Explore all the pages we have on our website. Find information about our services, company, and more.
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>
            All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
            $adventure_camping_pages = array(
                'post_type' => 'page',
                'post_title' => $adventure_camping_pages_title,
                'post_content' => $adventure_camping_pages_content,
                'post_status' => 'publish',
                'post_author' => 1,
                'post_slug' => 'pages'
            );
            $adventure_camping_pages_id = wp_insert_post($adventure_camping_pages);
            // Add Pages Page to Menu
            wp_update_nav_menu_item($adventure_camping_menu_id, 0, array(
                'menu-item-title' => __('Pages', 'adventure-camping'),
                'menu-item-classes' => 'pages',
                'menu-item-url' => home_url('/pages/'),
                'menu-item-status' => 'publish',
                'menu-item-object-id' => $adventure_camping_pages_id,
                'menu-item-object' => 'page',
                'menu-item-type' => 'post_type'
            ));

            // Create About Us Page with Dummy Content
            $adventure_camping_about_title = 'About Us';
            $adventure_camping_about_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>
            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br>
            All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
            $adventure_camping_about = array(
                'post_type' => 'page',
                'post_title' => $adventure_camping_about_title,
                'post_content' => $adventure_camping_about_content,
                'post_status' => 'publish',
                'post_author' => 1,
                'post_slug' => 'about-us'
            );
            $adventure_camping_about_id = wp_insert_post($adventure_camping_about);
            // Add About Us Page to Menu
            wp_update_nav_menu_item($adventure_camping_menu_id, 0, array(
                'menu-item-title' => __('About Us', 'adventure-camping'),
                'menu-item-classes' => 'about-us',
                'menu-item-url' => home_url('/about-us/'),
                'menu-item-status' => 'publish',
                'menu-item-object-id' => $adventure_camping_about_id,
                'menu-item-object' => 'page',
                'menu-item-type' => 'post_type'
            ));

            // Set the menu location if it's not already set
            if (!has_nav_menu($adventure_camping_bpmenulocation)) {
                $locations = get_theme_mod('nav_menu_locations'); // Use 'nav_menu_locations' to get locations array
                if (empty($locations)) {
                    $locations = array();
                }
                $locations[$adventure_camping_bpmenulocation] = $adventure_camping_menu_id;
                set_theme_mod('nav_menu_locations', $locations);
            }
        }

        // Set the demo import completion flag
		update_option('adventure_camping_demo_import_completed', true);
		// Display success message and "View Site" button
		echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'adventure-camping') . '</p>';
		echo '<span><a href="' . esc_url(home_url()) . '" class="button button-primary site-btn" target="_blank">' . esc_html__('VIEW SITE', 'adventure-camping') . '</a></span>';
        //end 

        // Slider Settings
        set_theme_mod( 'adventure_camping_banner_bottom_image', get_template_directory_uri().'/assets/images/banner.png' );
        set_theme_mod( 'adventure_camping_subheading', 'Camp Crafter' );
        set_theme_mod( 'adventure_camping_tagline_title', 'Explore the Outdoors – Adventure Awaits, Start Camping Today!' );
        set_theme_mod( 'adventure_camping_designation_text', 'Discover the beauty of nature with unforgettable camping experiences. From serene trails to starry nights, embark on adventures that bring you closer to the great outdoors.' );
        set_theme_mod( 'adventure_camping_banner_button_label', 'Explore more' );
        set_theme_mod( 'adventure_camping_top_button_url', '#' );

        // Camp Section
        set_theme_mod( 'adventure_camping_camp_section_text', 'Our Camping' );
        set_theme_mod( 'adventure_camping_camp_section_title', 'HELLO CAMPING CAMP' );

        set_theme_mod( 'adventure_camping_claases_number', '4' );

        // select Post Box
        $adventure_camping_title_array = array("Backcountry Camping", "Glamping (Luxury Camping)", "Family Camping", "Glamping (Luxury Camping)");
        for ($adventure_camping_i = 1; $adventure_camping_i <= 4; $adventure_camping_i++) {
            set_theme_mod( 'adventure_camping_add_age'.$adventure_camping_i, '6 Years' );
            set_theme_mod( 'adventure_camping_add_size'.$adventure_camping_i, '20 Seats' );
            set_theme_mod( 'adventure_camping_add_price'.$adventure_camping_i, '$20' );
            // Create post
            $adventure_camping_title = $adventure_camping_title_array[$adventure_camping_i - 1];
            $adventure_camping_content = 'Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod.';            
            $adventure_camping_my_post = array(
                'post_title'   => wp_strip_all_tags($adventure_camping_title),
                'post_content' => $adventure_camping_content,
                'post_status'  => 'publish',
                'post_type'    => 'post',
            );
            $adventure_camping_post_id = wp_insert_post($adventure_camping_my_post);
            set_theme_mod('adventure_camping_services_category' . $adventure_camping_i, $adventure_camping_post_id);
            // Get image URL
            $adventure_camping_image_url = get_template_directory_uri() . '/assets/images/post' . $adventure_camping_i . '.png';
            $adventure_camping_image_data = wp_remote_get($adventure_camping_image_url);
            if (!is_wp_error($adventure_camping_image_data)) {
                 $adventure_camping_image_body = wp_remote_retrieve_body($adventure_camping_image_data);
                 $adventure_camping_upload_dir = wp_upload_dir();
                 $adventure_camping_image_name = 'post' . $adventure_camping_i . '.png';
                 $uploaded_file = wp_upload_bits($adventure_camping_image_name, null, $adventure_camping_image_body);
                 if (!$uploaded_file['error']) {
                     // Set attachment data
                     $attachment = array(
                        'post_mime_type' => $uploaded_file['type'],
                        'post_title'     => sanitize_file_name($adventure_camping_image_name),
                        'post_content'   => '',
                        'post_status'    => 'inherit',
                    );
                    $adventure_camping_attach_id = wp_insert_attachment($attachment, $uploaded_file['file'], $adventure_camping_post_id);
                    require_once(ABSPATH . 'wp-admin/includes/image.php');
                    $adventure_camping_attach_data = wp_generate_attachment_metadata($adventure_camping_attach_id, $uploaded_file['file']);
                    wp_update_attachment_metadata($adventure_camping_attach_id, $adventure_camping_attach_data);
                    set_post_thumbnail($adventure_camping_post_id, $adventure_camping_attach_id);
                }
            }
        }      

        //Copyright Text
        set_theme_mod( 'adventure_camping_footer_text', 'By VWThemes' );  
     
        }
    ?>
  
	<p><?php esc_html_e('Please back up your website if it’s already live with data. This importer will overwrite your existing settings with the new customizer values for Adventure Camping', 'adventure-camping'); ?></p>
    <form action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php?page=adventure_camping_guide" method="POST" onsubmit="return validate(this);">
        <?php if (!get_option('adventure_camping_demo_import_completed')) : ?>
            <input class="run-import" type="submit" name="submit" value="<?php esc_attr_e('Run Importer', 'adventure-camping'); ?>" class="button button-primary button-large">
        <?php endif; ?>
        <div id="spinner" style="display:none;">         
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/spinner.png" alt="" />
        </div>
    </form>
    <script type="text/javascript">
        function validate(form) {
            if (confirm("Do you really want to import the theme demo content?")) {
                // Show the spinner
                document.getElementById('spinner').style.display = 'block';
                // Allow the form to be submitted
                return true;
            } 
            else {
                return false;
            }
        }
    </script>
</div>
