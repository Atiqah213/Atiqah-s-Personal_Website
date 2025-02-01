<?php
/**
 * The template part for Top Header
 *
 * @package Adventure Camping 
 * @subpackage adventure-camping
 * @since adventure-camping 1.0
 */
?>

<div class="main-header <?php if( get_theme_mod( 'adventure_camping_sticky_header', false) == 1) { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
  <div class="main-topbar ps-2">
    <div class="container px-0">
      <div class="menu-sec">
      <div class="row">
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 align-self-center">
          <div class="logo pb-0 pb-md-0">
            <?php if ( has_custom_logo() ) : ?>
              <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
            <?php $adventure_camping_blog_info = get_bloginfo( 'name' ); ?>
              <?php if ( ! empty( $adventure_camping_blog_info ) ) : ?>
                <?php if ( is_front_page() && is_home() ) : ?>
                  <?php if( get_theme_mod('adventure_camping_logo_title_hide_show',true) == 1){ ?>
                    <p class="site-title mb-0 text-start"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  <?php } ?>
                <?php else : ?>
                  <?php if( get_theme_mod('adventure_camping_logo_title_hide_show',true) == 1){ ?>
                    <p class="site-title mb-0 text-start"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  <?php } ?>
                <?php endif; ?>
              <?php endif; ?>
              <?php
                $adventure_camping_description = get_bloginfo( 'description', 'display' );
                if ( $adventure_camping_description || is_customize_preview() ) :
              ?>
              <?php if( get_theme_mod('adventure_camping_tagline_hide_show',false) == 1){ ?>
                <p class="site-description mb-0 text-start">
                  <?php echo esc_html($adventure_camping_description); ?>
                </p>
              <?php } ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-xxl-8 col-xl-8 col-lg-7 col-md-6 col-sm-4 col-4 align-self-center header-sec-top">
          <?php get_template_part('template-parts/header/navigation'); ?>
        </div>
        <div class="col-xxl-1 col-xl-1 col-lg-2 col-md-3 col-sm-8 col-8 align-self-center top-icons d-flex justify-content-end gap-2">
          <a href="<?php echo esc_html(get_theme_mod('adventure_camping_cart_button_link')); ?>"><i class="<?php echo esc_attr(get_theme_mod('adventure_camping_cart_icon','fa-solid fa-bag-shopping')); ?>"></i></a>
          <?php if (get_theme_mod('adventure_camping_search_hide_show', true)){ ?>
            <div class="search-box">
              <span><a href="#"><i class='<?php echo esc_attr(get_theme_mod('adventure_camping_search_open_icon','fas fa-search')); ?>'></i></a></span>
            </div>
            <div class="serach_outer">
              <div class="closepop"><a href="#maincontent"><i class="<?php echo esc_attr(get_theme_mod('adventure_camping_search_close_icon','fa fa-window-close')); ?>"></i></a></div>
              <div class="serach_inner">
                <?php get_search_form(); ?>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>