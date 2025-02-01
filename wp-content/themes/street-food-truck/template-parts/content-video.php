<?php
/**
 * The template part for displaying post
 *
 * @package Street Food Truck 
 * @subpackage street-food-truck
 * @since street-food-truck 1.0
 */
?>

<?php 
  $street_food_truck_archive_year  = esc_html(get_the_time('Y')); 
  $street_food_truck_archive_month = esc_html(get_the_time('m')); 
  $street_food_truck_archive_day   = esc_html(get_the_time('d')); 
?>

<?php
  $street_food_truck_content = apply_filters( 'the_content', get_the_content() );
  $street_food_truck_video = false;

  // Only get video from the content if a playlist isn't present.
  if ( false === strpos( $street_food_truck_content, 'wp-playlist-script' ) ) {
    $street_food_truck_video = get_media_embedded_in_content( $street_food_truck_content, array( 'video', 'object', 'embed', 'iframe' ) );
  }
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box p-3 mb-3 wow zoomIn" data-wow-duration="2s">
    <?php
      if ( ! is_single() ) {
        // If not a single post, highlight the video file.
        if ( ! empty( $street_food_truck_video ) ) {
          foreach ( $street_food_truck_video as $street_food_truck_video_html ) {
            echo '<div class="entry-video">';
              echo $street_food_truck_video_html;
            echo '</div>';
          }
        };
      };
    ?> 
    <article class="new-text">
      <h2 class="section-title"><a href="<?php the_permalink(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
      <?php if( get_theme_mod( 'street_food_truck_toggle_postdate',true) == 1 || get_theme_mod( 'street_food_truck_toggle_author',true) == 1 || get_theme_mod( 'street_food_truck_toggle_comments',true) == 1 || get_theme_mod( 'street_food_truck_toggle_time',true) == 1) { ?>
          <div class="post-info p-2 mb-3">
            <?php if(get_theme_mod('street_food_truck_toggle_postdate',true)==1){ ?>
              <i class="fas fa-calendar-alt me-2"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $street_food_truck_archive_year, $street_food_truck_archive_month, $street_food_truck_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('street_food_truck_toggle_author',true)==1){ ?>
              <span><?php echo esc_html(get_theme_mod('street_food_truck_meta_field_separator', '|'));?></span> <i class="fas fa-user me-2"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('street_food_truck_toggle_comments',true)==1){ ?>
              <span><?php echo esc_html(get_theme_mod('street_food_truck_meta_field_separator', '|'));?></span> <i class="fa fa-comments me-2" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'street-food-truck'), __('0 Comments', 'street-food-truck'), __('% Comments', 'street-food-truck') ); ?></span>
            <?php } ?>

            <?php if(get_theme_mod('street_food_truck_toggle_time',true)==1){ ?>
              <span><?php echo esc_html(get_theme_mod('street_food_truck_meta_field_separator', '|'));?></span> <i class="fas fa-clock me-2"></i> <span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
            <?php } ?>
          </div>
        <?php } ?>
        <p class="mb-0">
          <?php $street_food_truck_theme_lay = get_theme_mod( 'street_food_truck_excerpt_settings','Excerpt');
          if($street_food_truck_theme_lay == 'Content'){ ?>
            <?php the_content(); ?>
          <?php }
          if($street_food_truck_theme_lay == 'Excerpt'){ ?>
            <?php if(get_the_excerpt()) { ?>
              <?php $street_food_truck_excerpt = get_the_excerpt(); echo esc_html( street_food_truck_string_limit_words( $street_food_truck_excerpt, esc_attr(get_theme_mod('street_food_truck_excerpt_number','30')))); ?><?php echo esc_html(get_theme_mod('street_food_truck_blog_excerpt_suffix',''));?>
            <?php }?>
          <?php }?>
        </p>
        <?php if( get_theme_mod('street_food_truck_button_text','Read More') != ''){ ?>
          <div class="more-btn mt-4 mb-4">
            <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('street_food_truck_button_text',__('Read More','street-food-truck')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('street_food_truck_button_text',__('Read More','street-food-truck')));?></span><span class="top-icon"></span></a>
          </div>
        <?php } ?>
    </article>
  </div>
</div>