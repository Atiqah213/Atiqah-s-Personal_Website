<?php 
  $expert_food_blog_slider = get_theme_mod('expert_food_blog_slider_setting','1');
  
  if($expert_food_blog_slider == '1') {
?>
<section id="slider-section" class="slider-area">
  <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <?php 

      $expert_food_blog_pages = array();
      for ($expert_food_blog_count = 1; $expert_food_blog_count <= 3; $expert_food_blog_count++) {
          $expert_food_blog_mod = intval(get_theme_mod('expert_food_blog_slider' . $expert_food_blog_count));

          // Check that the value is valid and not the placeholder value 'page-none-selected'
          if ('page-none-selected' !== $expert_food_blog_mod && $expert_food_blog_mod > 0) {
              $expert_food_blog_pages[] = $expert_food_blog_mod;
          }
      }

      if( !empty($expert_food_blog_pages) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $expert_food_blog_pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $i = 1;
    ?>
    <div class="carousel-inner" role="listbox">
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <?php if(has_post_thumbnail()){ ?>
            <img src="<?php the_post_thumbnail_url('full'); ?>"/>
          <?php }else { ?><div class="slider-color-box"></div> <?php } ?>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <?php
                $expert_food_blog_slider_text = get_theme_mod( 'expert_food_blog_slider_text' );
                if( $expert_food_blog_slider_text != ''){?>
                <p class="slider-text"><?php echo esc_html( apply_filters('expert_food_blog_topheader', $expert_food_blog_slider_text)); ?></p>
              <?php } ?>
              <h2><?php the_title(); ?></h2>
              <p><?php echo esc_html(wp_trim_words(get_the_content(),'25') );?></p>
              <div class="read-btn">
                <a href="<?php the_permalink(); ?>"><?php echo esc_html('VIEW FOOD','expert-food-blog'); ?></a>
                <?php
                  $expert_food_blog_slider_second_link = get_theme_mod( 'expert_food_blog_slider_second_link' );
                    if( $expert_food_blog_slider_second_link != '' ){?>
                    <a class="read-btn-2" href="<?php echo esc_html( apply_filters('expert_food_blog_topheader', $expert_food_blog_slider_second_link)); ?>"><?php echo esc_html('DISCOVER MORE','expert-food-blog'); ?></a>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      <?php $i++; endwhile; 
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
      <div class="no-postfound"></div>
    <?php endif;
    endif;?>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" id="prev" data-bs-slide="prev">
    <i class="fas fa-angle-left" aria-hidden="true"></i>
    <span class="screen-reader-text"><?php echo esc_html('Previous','expert-food-blog'); ?></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next" id="next">
    <i class="fas fa-angle-right" aria-hidden="true"></i>
    <span class="screen-reader-text"><?php echo esc_html('Next','expert-food-blog'); ?></span>
    </button>
  </div>
</section>
<?php } ?>