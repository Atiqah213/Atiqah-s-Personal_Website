<?php

Class Adventure_Camping_My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {
  function widget($adventure_camping_args, $adventure_camping_instance) {
      if ( ! isset( $adventure_camping_args['widget_id'] ) ) {
      $adventure_camping_args['widget_id'] = $this->id;
    }
    $adventure_camping_title = ( ! empty( $adventure_camping_instance['title'] ) ) ? $adventure_camping_instance['title'] : __( 'Recent Posts', 'adventure-camping' );
    /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
    $adventure_camping_title = apply_filters( 'widget_title', $adventure_camping_title, $adventure_camping_instance, $this->id_base );
    $adventure_camping_number = ( ! empty( $adventure_camping_instance['number'] ) ) ? absint( $adventure_camping_instance['number'] ) : 5;
    if ( ! $adventure_camping_number )
        $adventure_camping_number = 5;
    $adventure_camping_show_date = isset( $adventure_camping_instance['show_date'] ) ? $adventure_camping_instance['show_date'] : false;
    /**
     * Filter the arguments for the Recent Posts widget.
     *
     * @since 3.4.0
     *
     * @see WP_Query::get_posts()
     *
     * @param array $adventure_camping_args An array of arguments used to retrieve the recent posts.
     */
    $adventure_camping_r = new WP_Query( apply_filters( 'widget_posts_args', array(
        'posts_per_page'      => $adventure_camping_number,
        'no_found_rows'       => true,
        'post_status'         => 'publish',
        'ignore_sticky_posts' => true
    ) ) );
    if ($adventure_camping_r->have_posts()) :
    ?>
    <?php echo $adventure_camping_args['before_widget']; ?>
    <?php if ( $adventure_camping_title ) {
        echo $adventure_camping_args['before_title'] . esc_html($adventure_camping_title) . $adventure_camping_args['after_title'];
    } ?>
    <ul>
      <?php while ( $adventure_camping_r->have_posts() ) : $adventure_camping_r->the_post(); ?>
      <li>
        <div class="recent-post-box">
          <div class="media post-thumb">
            <?php if(has_post_thumbnail()) { the_post_thumbnail(); } ?>
            <div class="media-body post-content">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              <div class="d-flex date-comment">
               <?php if ( $adventure_camping_show_date ) : ?>
                <p class="post-date"><?php the_date(); ?></p>
               <?php endif; ?>
               <div class="date-comment1"><?php comments_number( __('0 Comment', 'adventure-camping'), __('0 Comments', 'adventure-camping'), __('% Comments', 'adventure-camping') ); ?></div>
              </div>
            </div>
          </div>
        </div>
      </li>
      <?php endwhile;
      wp_reset_postdata(); ?>
    </ul>

    <?php echo $adventure_camping_args['after_widget'];

    endif;
  }
}
function adventure_camping_my_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('Adventure_Camping_My_Recent_Posts_Widget');
}
add_action('widgets_init', 'adventure_camping_my_recent_widget_registration');
