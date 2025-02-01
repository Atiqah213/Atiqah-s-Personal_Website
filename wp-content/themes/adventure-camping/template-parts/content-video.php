<?php
/**
 * The template part for displaying post
 *
 * @package Adventure Camping 
 * @subpackage adventure-camping
 * @since adventure-camping 1.0
 */
?>

<?php 
  $adventure_camping_archive_year  = esc_html(get_the_time('Y')); 
  $adventure_camping_archive_month = esc_html(get_the_time('m')); 
  $adventure_camping_archive_day   = esc_html(get_the_time('d')); 
?>

<?php
  $adventure_camping_content = apply_filters( 'the_content', get_the_content() );
  $adventure_camping_video = false;

  // Only get video from the content if a playlist isn't present.
  if ( false === strpos( $adventure_camping_content, 'wp-playlist-script' ) ) {
    $adventure_camping_video = get_media_embedded_in_content( $adventure_camping_content, array( 'video', 'object', 'embed', 'iframe' ) );
  }
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box p-3 mb-3 wow zoomIn" data-wow-duration="2s">
    <?php
      if ( ! is_single() ) {
        // If not a single post, highlight the video file.
        if ( ! empty( $adventure_camping_video ) ) {
          foreach ( $adventure_camping_video as $adventure_camping_video_html ) {
            echo '<div class="entry-video">';
              echo $adventure_camping_video_html;
            echo '</div>';
          }
        };
      };
    ?> 
    <article class="new-text">
      <h2 class="section-title"><a href="<?php the_permalink(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
      <?php if( get_theme_mod( 'adventure_camping_toggle_postdate',true) == 1 || get_theme_mod( 'adventure_camping_toggle_author',true) == 1 || get_theme_mod( 'adventure_camping_toggle_comments',true) == 1 || get_theme_mod( 'adventure_camping_toggle_time',true) == 1) { ?>
          <div class="post-info p-2 mb-3">
            <?php if(get_theme_mod('adventure_camping_toggle_postdate',true)==1){ ?>
              <i class="fas fa-calendar-alt me-2"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $adventure_camping_archive_year, $adventure_camping_archive_month, $adventure_camping_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('adventure_camping_toggle_author',true)==1){ ?>
              <span><?php echo esc_html(get_theme_mod('adventure_camping_meta_field_separator', '|'));?></span> <i class="fas fa-user me-2"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('adventure_camping_toggle_comments',true)==1){ ?>
              <span><?php echo esc_html(get_theme_mod('adventure_camping_meta_field_separator', '|'));?></span> <i class="fa fa-comments me-2" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'adventure-camping'), __('0 Comments', 'adventure-camping'), __('% Comments', 'adventure-camping') ); ?></span>
            <?php } ?>

            <?php if(get_theme_mod('adventure_camping_toggle_time',true)==1){ ?>
              <span><?php echo esc_html(get_theme_mod('adventure_camping_meta_field_separator', '|'));?></span> <i class="fas fa-clock me-2"></i> <span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
            <?php } ?>
          </div>
        <?php } ?>
        <p class="mb-0">
          <?php $adventure_camping_theme_lay = get_theme_mod( 'adventure_camping_excerpt_settings','Excerpt');
          if($adventure_camping_theme_lay == 'Content'){ ?>
            <?php the_content(); ?>
          <?php }
          if($adventure_camping_theme_lay == 'Excerpt'){ ?>
            <?php if(get_the_excerpt()) { ?>
              <?php $adventure_camping_excerpt = get_the_excerpt(); echo esc_html( adventure_camping_string_limit_words( $adventure_camping_excerpt, esc_attr(get_theme_mod('adventure_camping_excerpt_number','30')))); ?><?php echo esc_html(get_theme_mod('adventure_camping_blog_excerpt_suffix',''));?>
            <?php }?>
          <?php }?>
        </p>
        <?php if( get_theme_mod('adventure_camping_button_text','Read More') != ''){ ?>
          <div class="more-btn mt-4 mb-4">
            <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('adventure_camping_button_text',__('Read More','adventure-camping')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('adventure_camping_button_text',__('Read More','adventure-camping')));?></span><span class="top-icon"></span></a>
          </div>
        <?php } ?>
    </article>
  </div>
</div>