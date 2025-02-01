<?php
/**
 * Template Name: Custom Home Page
 */
get_header();

?>
<!-- slider section -->
<main id="maincontent" role="main">
  <?php if( get_theme_mod( 'street_food_truck_show_hide_slider',true) == 1 || get_theme_mod( 'street_food_truck_resp_slider_hide_show', true)) { ?>
    <section id="slider" class="position-relative wow bounceInDown delay-1000" data-wow-duration="3s">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-12 slider-main-text align-self-center">
            <div class="inner_carousel">
              <?php if(get_theme_mod('street_food_truck_designation_text') != '') {?>
                <p class="slider-para"><?php echo esc_html(get_theme_mod('street_food_truck_designation_text')) ?></p>
              <?php }?>
              <?php if(get_theme_mod('street_food_truck_tagline_title') != '') {?>
                <h1 class="mb-3"><?php echo esc_html(get_theme_mod('street_food_truck_tagline_title')) ?></h1>
              <?php }?>
              <?php if ( get_theme_mod('street_food_truck_slider_button_label','BUY NOW') != '' ) {?>
                <div class ="banner-btn mt-4 mb-5">
                  <a href="<?php echo esc_url(get_theme_mod('street_food_truck_top_button_url',false));?>"><?php echo esc_html(get_theme_mod('street_food_truck_slider_button_label','BUY NOW'));?>
                    <span class="screen-reader-text"><?php esc_html_e( 'BUY NOW','street-food-truck');?></span>
                  </a>
                </div>
              <?php }?>
            </div>
            <!-- product cat -->
            <?php if( get_theme_mod( 'street_food_truck_show_hide_product',true) == 1) { ?>
              <div class="slider-nav">
                <?php if ( class_exists( 'WooCommerce' ) ) {
                  $args = array( 
                    'post_type' => 'product',
                    'product_cat' => get_theme_mod('street_food_truck_product_category'),
                    'order' => 'ASC'
                  );
                  $loop = new WP_Query( $args );
                  while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                    <div class="product-box">
                      <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                    </div>
                  <?php endwhile; wp_reset_postdata(); ?>
                <?php } ?>
              </div> 
            <?php }?>
              <!-- end -->
          </div>
          <div class="col-lg-6 col-md-6 col-12 text-center align-self-lg-center">
            <!-- product cat -->
            <?php if( get_theme_mod( 'street_food_truck_show_hide_product',true) == 1) { ?>
              <div class="slider-next position-relative">
                <div class="slider-for">
                  <?php if ( class_exists( 'WooCommerce' ) ) {
                  $args = array( 
                    'post_type' => 'product',
                    'product_cat' => get_theme_mod('street_food_truck_product_category'),
                    'order' => 'ASC'
                  );
                  $loop = new WP_Query( $args );
                  while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                    <div class="product-box-next">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="leafe1"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/images/leafe1.png" alt=""></div>
                        </div>
                        <div class="col-lg-6">
                          <div class="king"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/images/King.png" alt=""></div>
                        </div>
                      </div>
                      <div class="slider-nav-box-inner-sec">
                        <div class="slider-nav-image-sec text-center">
                          <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                        </div>
                      </div>
                      <div class="leafe2"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/images/leafe2.png" alt=""></div>
                    </div>
                  <?php endwhile; wp_reset_postdata(); ?>
                <?php } ?>
                </div> 
              </div>
            <?php }?>
            <!-- end -->
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>
  <?php do_action( 'street_food_truck_after_slider' ); ?>


<!-- About Us Section -->
  <?php if( get_theme_mod('street_food_truck_special_text') != '' || get_theme_mod('street_food_truck_special_heading') != '' ){ ?>
    <section id="about-us" class="py-5">
      <div class="container">
        <div class="about-text text-center">
          <?php if(get_theme_mod('street_food_truck_special_heading') != ''){ ?>
            <h2><?php echo esc_html(get_theme_mod('street_food_truck_special_heading')); ?></h2>
          <?php } ?>
          <?php if(get_theme_mod('street_food_truck_special_text') != ''){ ?>
            <p class="mb-1"><?php echo esc_html(get_theme_mod('street_food_truck_special_text')); ?></p>
          <?php } ?>
        </div>
        <div id="about-section" class="pt-3 wow bounceInLeft delay-1000">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-12 p-0">
              <?php if(get_theme_mod('street_food_truck_about_image1') != '') {?>
                <div class="short-img">
                  <img src="<?php echo esc_url(get_theme_mod('street_food_truck_about_image1')); ?>" alt="" />
                </div>
              <?php }?>
            </div>
            <div class="col-lg-4 col-md-4 col-12 about-content">
              <div class="inner-box">
                <?php if (get_theme_mod('street_food_truck_client_tagline_title') != '') { ?>
                  <h3 class="mb-2 mt-3"><?php echo esc_html(get_theme_mod('street_food_truck_client_tagline_title')); ?></h3>
                <?php } ?>
                <?php if (get_theme_mod('street_food_truck_client_text') != '') { ?>
                    <p class="para1"><?php echo esc_html(get_theme_mod('street_food_truck_client_text')); ?></p>
                <?php } ?>
                <?php if (get_theme_mod('street_food_truck_client_next_text') != '') { ?>
                    <p class="para2"><?php echo esc_html(get_theme_mod('street_food_truck_client_next_text')); ?></p>
                <?php } ?>
              </div>
              <div class="inner-main-box p-3">
                <div class="row">
                  <?php for ($street_food_truck_i = 1; $street_food_truck_i <= 3; $street_food_truck_i++) { ?>
                    <div class="col-lg-4 col-md-4 col-12 text-center">
                      <div class="review-box">
                        <?php if (get_theme_mod('street_food_truck_review_num'.$street_food_truck_i) != '') { ?>
                          <p class="review-num mb-2"><?php echo esc_html(get_theme_mod('street_food_truck_review_num'.$street_food_truck_i)); ?><i class="<?php echo esc_attr(get_theme_mod('street_food_truck_topbar_review_icon'.$street_food_truck_i,'fa-solid fa-plus')); ?>"></i></p>
                        <?php } ?>
                        <?php if (get_theme_mod('street_food_truck_review_text'.$street_food_truck_i) != '') { ?>
                            <p class="review-text mb-0"><?php echo esc_html(get_theme_mod('street_food_truck_review_text'.$street_food_truck_i)); ?></p>
                        <?php } ?>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 p-0">
              <?php if(get_theme_mod('street_food_truck_about_image2') != '') {?>
                <div class="short-img">
                  <img src="<?php echo esc_url(get_theme_mod('street_food_truck_about_image2')); ?>" alt="" />
                </div>
              <?php }?> 
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php }?>

  <div id="content-vw" class="entry-content">
    <div class="container">
      <?php while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. 
      ?>
    </div>
  </div>
  
</main>

<?php get_footer(); ?> 