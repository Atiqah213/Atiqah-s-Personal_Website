<?php
/**
 * The template part for header
 *
 * @package Street Food Truck 
 * @subpackage street-food-truck
 * @since street-food-truck 1.0
 */
?>

<div id="header" class="text-center">
  <div class="toggle-nav mobile-menu text-lg-end text-md-start text-start ">
    <button role="tab" onclick="street_food_truck_menu_open_nav()" class="responsivetoggle"><i class="<?php echo esc_attr(get_theme_mod('street_food_truck_res_open_menu_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','street-food-truck'); ?></span></button>
  </div>
  <div id="mySidenav" class="nav sidenav">
    <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'street-food-truck' ); ?>">
      <?php 
        wp_nav_menu( array( 
          'theme_location' => 'primary',
          'container_class' => 'main-menu clearfix' ,
          'menu_class' => 'main-menu clearfix',
          'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
          'fallback_cb' => 'wp_page_menu',
        ) );
      ?>
      <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="street_food_truck_menu_close_nav()"><i class="<?php echo esc_attr(get_theme_mod('street_food_truck_res_close_menu_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','street-food-truck'); ?></span></a>
    </nav>
  </div>
</div>