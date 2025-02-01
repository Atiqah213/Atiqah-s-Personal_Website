<?php
/**
 * Template Name: Custom Home Page
 */
get_header();

?>
<!-- banner section -->
<main id="maincontent" role="main">

  <?php do_action( 'adventure_camping_above_banner' ); ?>
  
  <?php 
    $adventure_camping_small_title_image = file_get_contents(get_template_directory_uri() . '/assets/images/title-bg.svg');
    $adventure_camping_banner_bottom_image = file_get_contents(get_template_directory_uri() . '/assets/images/banner-bottom.svg');
  ?>
  <?php if (get_theme_mod('adventure_camping_show_hide_banner', true)== 1){ ?>
    <section id="banner" class="position-relative wow bounceInDown delay-1000" data-wow-duration="3s">
      <div class="container">
        <div class="inner_carousel text-center pt-5">
          <?php if(get_theme_mod('adventure_camping_subheading') != '') {?>
            <div class="title-bg mb-2"><?php echo $adventure_camping_small_title_image; ?>
            <p class="banner-sub-head text-capitalize"><?php echo esc_html(get_theme_mod('adventure_camping_subheading')) ?></p>
            </div>
          <?php }?>
          <?php if(get_theme_mod('adventure_camping_tagline_title') != '') {?>
            <h1 class="mb-3 text-capitalize banner-title"><?php echo esc_html(get_theme_mod('adventure_camping_tagline_title')) ?></h1>
          <?php }?>
          <?php if(get_theme_mod('adventure_camping_designation_text') != '') {?>
            <p class="banner-para"><?php echo esc_html(get_theme_mod('adventure_camping_designation_text')) ?></p>
          <?php }?>
          <?php if ( get_theme_mod('adventure_camping_banner_button_label') != '' ) {?>
            <div class ="banner-btn mt-4 mb-5">
              <a href="<?php echo esc_url(get_theme_mod('adventure_camping_top_button_url',false));?>" class="text-capitalize"><?php echo esc_html(get_theme_mod('adventure_camping_banner_button_label'));?>
              </a>
            </div>
          <?php }?>
        </div>
      </div>
      
      <div class="topbar-social-icon position-absolute d-flex align-items-center">
          <?php if ( is_active_sidebar( 'social-widget-sidemenu' ) ) : ?>
            <?php dynamic_sidebar('social-widget-sidemenu'); ?>
          <?php else : ?>
            <!-- Default Social Icons Widgets -->
            <div class="widget">
                <ul class="custom-social-icons" >
                  <li><a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a></li> 
                  <li><a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                  <li><a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
                               
                </ul>
            </div>
          <?php endif; ?>   
      </div>
      
      <?php if ( get_theme_mod('adventure_camping_banner_bottom_image') != "" ) { ?>
        <div class="banner-shadow">
          <img class="banner-bg-img" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/bg-shadow.png') ?>" alt="" title="#slidecaption">
        </div>
        <div class="banner-main-img">
          <img class="banner-img" src="<?php echo esc_url(get_theme_mod('adventure_camping_banner_bottom_image')); ?>" alt="" title="#slidecaption">
        </div>
      <?php } ?>
      <div class="banner-bottom"><?php echo $adventure_camping_banner_bottom_image; ?></div>
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <?php do_action( 'adventure_camping_below_banner' ); ?>

  <!-- Camp Section -->
  <?php if (get_theme_mod('adventure_camping_camp_section_hide_show', true)){ ?>
    <section id="camp-section" class="wow fadeInLeftBig" data-wow-delay=".25s">
      <div class="container">
        <div class="section-content text-center mb-1">
          <?php if(get_theme_mod('adventure_camping_camp_section_text') != '') {?>
            <div class="title-bg mb-2"><?php echo $adventure_camping_small_title_image; ?>
              <p class="section-text mb-2 text-capitalize"><?php echo esc_html(get_theme_mod('adventure_camping_camp_section_text')) ?></p>
            </div>
          <?php }?>
          <?php if(get_theme_mod('adventure_camping_camp_section_title') != '') {?>
            <h2 class="section-title text-uppercase pb-2"><?php echo esc_html(get_theme_mod('adventure_camping_camp_section_title')) ?></h2>
          <?php }?>
        </div>
        <div class="owl-carousel">
          <?php
            $adventure_camping_featured_post = get_theme_mod('adventure_camping_claases_number');
            for ($adventure_camping_i=1; $adventure_camping_i <= $adventure_camping_featured_post; $adventure_camping_i++) {
            $adventure_camping_postData=  get_theme_mod('adventure_camping_services_category'.$adventure_camping_i);
            if($adventure_camping_postData){ ?>
              <?php
                $adventure_camping_args = array(
                  'p' => esc_html($adventure_camping_postData ,'adventure-camping'),
                  'posts_per_page' => 1,
                  'post_type' => 'post'
                );
                $adventure_camping_query = new WP_Query( $adventure_camping_args );
                if ( $adventure_camping_query->have_posts() ) :
                  while ( $adventure_camping_query->have_posts() ) : $adventure_camping_query->the_post(); ?>
                  <div class="camp-box">
                    <div class="classes-inner-box position-relative">
                      <?php if(has_post_thumbnail()){ ?>
                        <?php the_post_thumbnail(); ?>
                      <?php } else {?>
                        <img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/images/post-image.png" alt="<?php echo esc_attr('Post Image', 'adventure-camping'); ?>">
                      <?php }?>
                      <a href="<?php the_permalink(); ?>" class="post-btn"><i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    <div class="popular-content pb-3 px-3 text-center">
                      <h3 class="text-capitalize camp-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                      <p class="camp-text pb-3 mb-0"><?php echo wp_trim_words(get_the_content(), 10); ?>...</p>
                      <?php if( get_theme_mod('adventure_camping_add_age'.$adventure_camping_i) != '' || get_theme_mod('adventure_camping_add_size'.$adventure_camping_i) != '' || get_theme_mod('adventure_camping_add_price'.$adventure_camping_i) != ''){ ?>
                        <div class="detail-box pt-3">
                          <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-4 align-self-center text-center">
                              <?php if( get_theme_mod('adventure_camping_add_age'.$adventure_camping_i) != ''){ ?>
                                <p class="deatail-text mb-0"><?php echo esc_html__('Age', 'adventure-camping'); ?></p>
                                <span class="post-detail"><?php echo esc_html(get_theme_mod('adventure_camping_add_age'.$adventure_camping_i));?></span>
                              <?php }?>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-4 align-self-center text-center">
                              <?php if( get_theme_mod('adventure_camping_add_size'.$adventure_camping_i) != ''){ ?>
                                <p class="deatail-text mb-0"><?php echo esc_html__('Size', 'adventure-camping'); ?></p>
                                <span class="post-detail"><?php echo esc_html(get_theme_mod('adventure_camping_add_size'.$adventure_camping_i));?></span>
                              <?php }?>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-4 align-self-center text-center">
                              <?php if( get_theme_mod('adventure_camping_add_price'.$adventure_camping_i) != ''){ ?>
                                <p class="deatail-text mb-0"><?php echo esc_html__('Price', 'adventure-camping'); ?></p>
                                <span class="post-detail"><?php echo esc_html(get_theme_mod('adventure_camping_add_price'.$adventure_camping_i));?></span>
                              <?php }?>
                            </div>
                          </div>
                        </div>
                      <?php }?>
                    </div>
                  </div>
                <?php endwhile;
                  wp_reset_postdata();
                endif; ?>
            <?php }
          } ?>
        </div>
      </div>
    </section>
  <?php }?>
  <?php do_action( 'adventure_camping_after_service' ); ?>

  <div id="content-vw" class="entry-content pt-5">
    <div class="container">
      <?php while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. 
      ?>
    </div>
  </div>
</main>

<?php get_footer(); ?> 