<div class="theme-offer">
	<?php 
        // Check if the demo import has been completed
        $street_food_truck_demo_import_completed = get_option('street_food_truck_demo_import_completed', false);

        // If the demo import is completed, display the "View Site" button
        if ($street_food_truck_demo_import_completed) {
        echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'street-food-truck') . '</p>';
        echo '<span><a href="' . esc_url(home_url()) . '" class="button button-primary site-btn" target="_blank">' . esc_html__('VIEW SITE', 'street-food-truck') . '</a></span>';
        }

		// POST and update the customizer and other related data of THE COURIER SERVICESPRO
        if (isset($_POST['submit'])) {

        // Check if woocommerce is installed and activated
        if (!is_plugin_active('woocommerce/woocommerce.php')) {
          // Install the plugin if it doesn't exist
          $street_food_truck_plugin_slug = 'woocommerce';
          $street_food_truck_plugin_file = 'woocommerce/woocommerce.php';

          // Check if plugin is installed
          $street_food_truck_installed_plugins = get_plugins();
          if (!isset($street_food_truck_installed_plugins[$street_food_truck_plugin_file])) {
              include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
              include_once(ABSPATH . 'wp-admin/includes/file.php');
              include_once(ABSPATH . 'wp-admin/includes/misc.php');
              include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

              // Install the plugin
              $street_food_truck_upgrader = new Plugin_Upgrader();
              $street_food_truck_upgrader->install('https://downloads.wordpress.org/plugin/woocommerce.latest-stable.zip');
          }
          // Activate the plugin
          activate_plugin($street_food_truck_plugin_file);
        }

            // Create a front page and assign the template
            $street_food_truck_home_page = null;
            // Using WP_Query instead of get_page_by_title()
            $street_food_truck_home_query = new WP_Query(array(
               'post_type' => 'page',
               'title' => 'Home',
               'post_status' => 'publish',
               'posts_per_page' => 1
            ));
            if (!$street_food_truck_home_query->have_posts()) {
               $street_food_truck_home_title = 'Home';           
               // Create the page
               $street_food_truck_home = array(
                   'post_type' => 'page',
                   'post_title' => $street_food_truck_home_title,
                   'post_status' => 'publish',
                   'post_author' => 1,
                   'post_slug' => 'home'
               );
               $street_food_truck_home_id = wp_insert_post($street_food_truck_home);
            } else {
               $street_food_truck_home_page = $street_food_truck_home_query->posts[0];
               $street_food_truck_home_id = $street_food_truck_home_page->ID;
            }

            // Set the home page template
            add_post_meta($street_food_truck_home_id, '_wp_page_template', 'page-template/custom-home-page.php');

            // Set the static front page
            update_option('page_on_front', $street_food_truck_home_id);
            update_option('show_on_front', 'page');

            // Create track order
            $street_food_truck_page_query = new WP_Query(array(
               'post_type' => 'page',
               'title' => 'Track Order',
               'post_status' => 'publish',
               'posts_per_page' => 1
            ));
 
            if (!$street_food_truck_page_query->have_posts()) {
                $street_food_truck_page_title = 'Track Order';
                $trackorder = '[woocommerce_order_tracking]';

                // Append the WooCommerce tracking shortcode to the content
                $street_food_truck_content = 'Track your order using the form below:<br>';
                $street_food_truck_content .= do_shortcode($trackorder);

                // Create the new page
                $street_food_truck_page = array(
                    'post_type'    => 'page',
                    'post_title'   => $street_food_truck_page_title,
                    'post_content' => $street_food_truck_content,
                    'post_status'  => 'publish',
                    'post_author'  => 1,
                    'post_slug'    => 'track-order'
                );

                // Insert the page and get its ID
                $street_food_truck_page_id = wp_insert_post($street_food_truck_page);

                // Store the page URL in theme mod
                if (!is_wp_error($street_food_truck_page_id)) {
                    $street_food_truck_page_url = get_permalink($street_food_truck_page_id); // Get the page URL
                    set_theme_mod('street_food_truck_track_button_url', esc_url($street_food_truck_page_url)); // Save the page URL in theme mod
                }
            }

            // Set the demo import completion flag
    		update_option('street_food_truck_demo_import_completed', true);
    		// Display success message and "View Site" button
    		echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'street-food-truck') . '</p>';
    		echo '<span><a href="' . esc_url(home_url()) . '" class="button button-primary site-btn" target="_blank">' . esc_html__('VIEW SITE', 'street-food-truck') . '</a></span>';
            //end 


            // Top Bar //
            set_theme_mod( 'street_food_truck_topbar_location_text', '317 Sports road, Buffalo, NY 92648' );  
            set_theme_mod( 'street_food_truck_phone_number', '(123) 456-7890' );


            // slider section start //        
            set_theme_mod( 'street_food_truck_designation_text', 'Welcome to Street Savories' );
            set_theme_mod( 'street_food_truck_tagline_title', 'Delicious Delights on the Move' );
            set_theme_mod( 'street_food_truck_slider_button_label', 'Online Order' );

            // Product Section //
            set_theme_mod('street_food_truck_product_category', 'productcategory1');

            // Define product category names and product titles
            $street_food_truck_category_names = array('productcategory1', 'productcategory2', 'productcategory3', 'productcategory4');
            $street_food_truck_title_array = array(
                array("Product Name Here", "Product Name Here", "Product Name Here", "Product Name Here"),
                array("Product Name Here", "Product Name Here", "Product Name Here", "Product Name Here"),
                array("Product Name Here", "Product Name Here", "Product Name Here", "Product Name Here"),
                array("Product Name Here", "Product Name Here", "Product Name Here", "Product Name Here")
            );

            foreach ($street_food_truck_category_names as $street_food_truck_index => $street_food_truck_category_name) {
                // Create or retrieve the product category term ID
                $street_food_truck_term = term_exists($street_food_truck_category_name, 'product_cat');
                if ($street_food_truck_term === 0 || $street_food_truck_term === null) {
                    // If the term does not exist, create it
                    $street_food_truck_term = wp_insert_term($street_food_truck_category_name, 'product_cat');
                }

                if (is_wp_error($street_food_truck_term)) {
                    error_log('Error creating category: ' . $street_food_truck_term->get_error_message());
                    continue; // Skip to the next iteration if category creation fails
                }

                // Loop to create 4 products for each category
                for ($street_food_truck_i = 0; $street_food_truck_i < 4; $street_food_truck_i++) {
                    // Create product content
                    $street_food_truck_title = $street_food_truck_title_array[$street_food_truck_index][$street_food_truck_i];
                    $street_food_truck_content = 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.';

                    // Create product post object
                    $street_food_truck_my_post = array(
                        'post_title'    => wp_strip_all_tags($street_food_truck_title),
                        'post_content'  => $street_food_truck_content,
                        'post_status'   => 'publish',
                        'post_type'     => 'product', // Post type set to 'product'
                    );

                    // Insert the product into the database
                    $street_food_truck_post_id = wp_insert_post($street_food_truck_my_post);

                    if (is_wp_error($street_food_truck_post_id)) {
                        error_log('Error creating product: ' . $street_food_truck_post_id->get_error_message());
                        continue; // Skip to the next product if creation fails
                    }

                    // Assign the category to the product
                    wp_set_object_terms($street_food_truck_post_id, (int)$street_food_truck_term['term_id'], 'product_cat');

                    // Set product as simple product and assign a price
                    update_post_meta($street_food_truck_post_id, '_price', '10.00'); // Set a price for the product
                    update_post_meta($street_food_truck_post_id, '_regular_price', '10.00'); // Set regular price
                    update_post_meta($street_food_truck_post_id, '_stock_status', 'instock'); // Set stock status to 'in stock'
                    update_post_meta($street_food_truck_post_id, '_manage_stock', 'no'); // Not managing stock for this example
                    update_post_meta($street_food_truck_post_id, '_product_type', 'simple'); // Set product type to 'simple'

                    // Handle the featured image using media_sideload_image
                    $street_food_truck_image_url = get_template_directory_uri() . '/assets/images/product' . ($street_food_truck_i + 1) . '.png';
                    $street_food_truck_image_id = media_sideload_image($street_food_truck_image_url, $street_food_truck_post_id, null, 'id');

                    if (is_wp_error($street_food_truck_image_id)) {
                        error_log('Error downloading image: ' . $street_food_truck_image_id->get_error_message());
                        continue; // Skip to the next product if image download fails
                    }

                    // Assign featured image to product
                    set_post_thumbnail($street_food_truck_post_id, $street_food_truck_image_id);
                }
            }

            // About Us Section//
            set_theme_mod( 'street_food_truck_special_heading', 'About US' ); 
            set_theme_mod( 'street_food_truck_special_text', 'Discover our diverse culinary offerings on wheels today.' ); 
            set_theme_mod( 'street_food_truck_about_image1', get_template_directory_uri().'/assets/images/about-us1.png' ); 
            set_theme_mod( 'street_food_truck_client_tagline_title', 'Our Story' );
            set_theme_mod( 'street_food_truck_client_text', 'Welcome to Street Savories, where we bring culinary adventures to your fingertips! We are a passionate team of food enthusiasts dedicated to redefining street food experiences. Our journey began with a vision to create a mobile culinary haven, offering a fusion of flavors that tantalize your taste buds and ignite your senses. Welcome to Street Savories, where we bring culinary adventures to your fingertips! We are a passionate team of food enthusiasts dedicated to redefining street food experiences. Our journey began with a vision to create a mobile culinary haven, offering a fusion of flavors that tantalize your taste buds and ignite your senses.' );
            set_theme_mod( 'street_food_truck_client_next_text', 'At Street Savories, we believe that great food transcends boundaries. Our diverse menu showcases a symphony of global cuisines. At Street Savories, we believe that great food transcends boundaries. Our diverse menu showcases a symphony of global cuisines,' );


            for($street_food_truck_i=1; $street_food_truck_i<=3; $street_food_truck_i++) {
                set_theme_mod( 'street_food_truck_review_num'.$street_food_truck_i, '60' );
                set_theme_mod( 'street_food_truck_topbar_review_icon'.$street_food_truck_i, 'fa-solid fa-plus' );
                set_theme_mod( 'street_food_truck_review_text'.$street_food_truck_i, 'Happy Customers' );
            }

            set_theme_mod( 'street_food_truck_about_image2', get_template_directory_uri().'/assets/images/about-us2.png' ); 

            //Copyright Text
            set_theme_mod( 'street_food_truck_footer_text', 'By VWThemes' );  
     
        }
    ?>
  
	<p><?php esc_html_e('Please back up your website if it’s already live with data. This importer will overwrite your existing settings with the new customizer values for Street Food Truck', 'street-food-truck'); ?></p>
    <form action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php?page=street_food_truck_guide" method="POST" onsubmit="return validate(this);">
        <?php if (!get_option('street_food_truck_demo_import_completed')) : ?>
            <input class="run-import" type="submit" name="submit" value="<?php esc_attr_e('Run Importer', 'street-food-truck'); ?>" class="button button-primary button-large">
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
