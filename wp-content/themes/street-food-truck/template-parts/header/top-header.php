<?php
/**
 * The template part for Top Header
 *
 * @package Street Food Truck 
 * @subpackage street-food-truck
 * @since street-food-truck 1.0
 */
?>

<div class="main-header <?php if( get_theme_mod( 'street_food_truck_sticky_header', false) == 1) { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
  <?php if (get_theme_mod('street_food_truck_hide_show_topbar', true) == 1 || get_theme_mod( 'street_food_truck_resp_topbar_hide_show', false) == 1) {?>
    <div class="main-topbar py-2">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 align-self-center text-start">
            <div class="topbar-social-icon">
              <?php if (is_active_sidebar('topbar-social-icon')) : ?>
                <?php dynamic_sidebar('topbar-social-icon'); ?>
              <?php else : ?>
                <!-- Default Social Icons Widgets -->
                  <div class="widget">
                      <ul class="custom-social-icons" >
                        <li><a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a></li> 
                        <li><a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li> 
                        <li><a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li> 
                        <li><a href="https://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a></li> 
                                         
                      </ul>
                  </div>
              <?php endif; ?>   
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 align-self-center text-center">
            <?php if(get_theme_mod('street_food_truck_topbar_location_icon') != '' || get_theme_mod('street_food_truck_topbar_location_text') != ''){ ?>
              <a href="<?php echo esc_url(get_theme_mod('street_food_truck_track_locatin_url',false));?>" target="_blank">
                <p class="location-text mb-0"> <i class="<?php echo esc_attr(get_theme_mod('street_food_truck_topbar_location_icon','me-2 fa-solid fa-location-dot')); ?>"></i><?php echo esc_html(get_theme_mod('street_food_truck_topbar_location_text')) ?></p>
              </a>
            <?php }?>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 align-self-center text-end">
            <?php if(get_theme_mod('street_food_truck_phone_number') != '' || get_theme_mod('street_food_truck_phone_icon') != '' ){ ?>
              <span class="phone-number"><i class="<?php echo esc_attr(get_theme_mod('street_food_truck_phone_icon','fa-solid fa-phone')); ?> me-2"></i><a href="tel:<?php echo esc_attr( get_theme_mod('street_food_truck_phone_number','') ); ?>"><?php echo esc_html(get_theme_mod('street_food_truck_phone_number',''));?></a></span>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  <?php }?>
  <div class="container py-1">
    <div class="row">
      <div class="col-xxl-1 col-xl-1 col-lg-1 col-md-3 col-sm-6 col-6 align-self-center logo-img-sec">
        <div class="logo text-start pb-0 pb-md-0">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php endif; ?>
          <?php $street_food_truck_blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $street_food_truck_blog_info ) ) : ?>
              <?php if ( is_front_page() && is_home() ) : ?>
                <?php if( get_theme_mod('street_food_truck_logo_title_hide_show',true) == 1){ ?>
                  <p class="site-title mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php } ?>
              <?php else : ?>
                <?php if( get_theme_mod('street_food_truck_logo_title_hide_show',true) == 1){ ?>
                  <p class="site-title mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php } ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php
              $street_food_truck_description = get_bloginfo( 'description', 'display' );
              if ( $street_food_truck_description || is_customize_preview() ) :
            ?>
            <?php if( get_theme_mod('street_food_truck_tagline_hide_show',false) == 1){ ?>
              <p class="site-description mb-0">
                <?php echo esc_html($street_food_truck_description); ?>
              </p>
            <?php } ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-xxl-8 col-xl-7 col-lg-6 col-md-3 col-sm-6 col-6 align-self-center header-sec-top">
        <?php get_template_part('template-parts/header/navigation'); ?>
      </div>
      <div class="col-xxl-3 col-xl-4 col-lg-5 col-md-6 col-sm-12 col-12 align-self-center d-flex justify-content-end gap-2 top-btn">
        <!-- Search -->
        <div class="top-search">
          <?php if( get_theme_mod( 'street_food_truck_display_search', true) == true ) { ?>
            <?php if(class_exists('woocommerce')):?>
              <?php get_product_search_form(); ?>
            <?php else : ?>
              <?php get_search_form(); ?>
            <?php endif; ?>
          <?php } ?>
        </div>
        <!-- Tracking Order -->
        <?php if(class_exists('woocommerce')){ ?>
          <div class ="order-track">
            <a href="<?php echo esc_url(get_theme_mod('street_food_truck_track_button_url',false));?>"><?php echo esc_html(get_theme_mod('street_food_truck_topbar_track_text','Track Your Order'));?>
              <span class="screen-reader-text"><?php esc_html_e( 'Track Your Order','street-food-truck');?></span>
            </a>
          </div>
        <?php }?>
      </div>
    </div>
  </div>
</div>