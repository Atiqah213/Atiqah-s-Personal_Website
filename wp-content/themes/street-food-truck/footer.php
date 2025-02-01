<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Street Food Truck 
 */
?>

    <footer role="contentinfo">
        <div class="footer-section">
            <?php if (get_theme_mod('street_food_truck_footer_hide_show', true)){ ?>
                <aside id="footer" class="copyright-wrapper" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'street-food-truck' ); ?>">
                    <div class="container">
                        <?php
                            $street_food_truck_count = 0;
                            
                            if ( is_active_sidebar( 'footer-1' ) ) {
                                $street_food_truck_count++;
                            }
                            if ( is_active_sidebar( 'footer-2' ) ) {
                                $street_food_truck_count++;
                            }
                            if ( is_active_sidebar( 'footer-3' ) ) {
                                $street_food_truck_count++;
                            }
                            if ( is_active_sidebar( 'footer-4' ) ) {
                                $street_food_truck_count++;
                            }
                            // $street_food_truck_count == 0 none
                            if ( $street_food_truck_count == 1 ) {
                                $street_food_truck_colmd = 'col-md-12 col-sm-12';
                            } elseif ( $street_food_truck_count == 2 ) {
                                $street_food_truck_colmd = 'col-md-6 col-sm-6';
                            } elseif ( $street_food_truck_count == 3 ) {
                                $street_food_truck_colmd = 'col-md-4 col-sm-4';
                            } else {
                                $street_food_truck_colmd = 'col-lg-3 col-md-6 col-sm-6';
                            }
                        ?>
                        <div class="row position-relative">
                            <div class="<?php echo !is_active_sidebar('footer-1') ? 'footer_hide' : esc_attr($street_food_truck_colmd); ?> col-lg-3 col-xs-12 col-md-6 footer-block pe-2">
                                <?php if (is_active_sidebar('footer-1')) : ?>
                                    <?php dynamic_sidebar('footer-1'); ?>
                                <?php else : ?>
                                    <aside id="search" class="widget py-3" role="complementary" aria-label="firstsidebar">
                                        <h3 class="widget-title"><?php esc_html_e( 'Search', 'street-food-truck' ); ?></h3>
                                        <?php get_search_form(); ?>
                                    </aside>
                                <?php endif; ?>
                            </div>

                            <div class="<?php echo !is_active_sidebar('footer-2') ? 'footer_hide' : esc_attr($street_food_truck_colmd); ?> col-lg-3 col-xs-12 col-md-6 footer-block pe-2">
                                <?php if (is_active_sidebar('footer-2')) : ?>
                                    <?php dynamic_sidebar('footer-2'); ?>
                                <?php else : ?>
                                    <aside id="archives" class="widget py-3" role="complementary" >
                                        <h3 class="widget-title"><?php esc_html_e( 'Archives', 'street-food-truck' ); ?></h3>
                                        <ul>
                                            <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                                        </ul>
                                    </aside>
                                <?php endif; ?>
                            </div>                     

                            <div class="<?php echo !is_active_sidebar('footer-3') ? 'footer_hide' : esc_attr($street_food_truck_colmd); ?> col-lg-3 col-xs-12 col-md-6 footer-block  pe-2">
                                <?php if (is_active_sidebar('footer-3')) : ?>
                                    <?php dynamic_sidebar('footer-3'); ?>
                                <?php else : ?>
                                    <aside id="meta" class="widget py-3" role="complementary" >
                                        <h3 class="widget-title"><?php esc_html_e( 'Meta', 'street-food-truck' ); ?></h3>
                                        <ul>
                                            <?php wp_register(); ?>
                                            <li><?php wp_loginout(); ?></li>
                                            <?php wp_meta(); ?>
                                        </ul>
                                    </aside>
                                <?php endif; ?>
                            </div>

                            <div class="<?php echo !is_active_sidebar('footer-4') ? 'footer_hide' : esc_attr($street_food_truck_colmd); ?> col-lg-3 col-xs-12 col-md-6 footer-block  p-0">
                                <?php if (is_active_sidebar('footer-4')) : ?>
                                    <?php dynamic_sidebar('footer-4'); ?>
                                <?php else : ?>
                                    <aside id="categories" class="widget py-3" role="complementary"> 
                                        <h3 class="widget-title"><?php esc_html_e( 'Categories', 'street-food-truck' ); ?></h3>          
                                        <ul>
                                            <?php wp_list_categories('title_li=');  ?>
                                        </ul>
                                    </aside>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </aside>
            <?php }?>
        </div>
        <?php if (get_theme_mod('street_food_truck_copyright_hide_show', true)) {?>
            <div id="footer-2" class="text-center">
              	<div class="copyright container">
                    <p class="mb-0 py-3"> <?php street_food_truck_credit(); ?> <?php echo esc_html(get_theme_mod('street_food_truck_footer_text',__(' By VWThemes','street-food-truck'))); ?></p>
                    <?php if( get_theme_mod( 'street_food_truck_hide_show_scroll',true) == 1 || get_theme_mod( 'street_food_truck_resp_scroll_top_hide_show',true) == 1) { ?>
                        <?php $street_food_truck_theme_lay = get_theme_mod( 'street_food_truck_scroll_top_alignment','Right');
                        if($street_food_truck_theme_lay == 'Left'){ ?>
                            <a href="#" class="scrollup left"><i class="<?php echo esc_attr(get_theme_mod('street_food_truck_scroll_top_icon','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Scroll Up', 'street-food-truck' ); ?></span></a>
                        <?php }else if($street_food_truck_theme_lay == 'Center'){ ?>
                            <a href="#" class="scrollup center"><i class="<?php echo esc_attr(get_theme_mod('street_food_truck_scroll_top_icon','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Scroll Up', 'street-food-truck' ); ?></span></a>
                        <?php }else{ ?>
                            <a href="#" class="scrollup"><i class="<?php echo esc_attr(get_theme_mod('street_food_truck_scroll_top_icon','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Scroll Up', 'street-food-truck' ); ?></span></a>
                        <?php }?>
                    <?php }?>
              	</div>
              	<div class="clear"></div>
            </div>
        <?php }?>
    </footer>
        <?php wp_footer(); ?>
    </body>
</html>