<?php

Class Street_Food_Truck_My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {
  function widget($street_food_truck_args, $street_food_truck_instance) {
      if ( ! isset( $street_food_truck_args['widget_id'] ) ) {
      $street_food_truck_args['widget_id'] = $this->id;
    }
    $street_food_truck_title = ( ! empty( $street_food_truck_instance['title'] ) ) ? $street_food_truck_instance['title'] : __( 'Recent Posts', 'street-food-truck' );
    /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
    $street_food_truck_title = apply_filters( 'widget_title', $street_food_truck_title, $street_food_truck_instance, $this->id_base );
    $street_food_truck_number = ( ! empty( $street_food_truck_instance['number'] ) ) ? absint( $street_food_truck_instance['number'] ) : 5;
    if ( ! $street_food_truck_number )
        $street_food_truck_number = 5;
    $street_food_truck_show_date = isset( $street_food_truck_instance['show_date'] ) ? $street_food_truck_instance['show_date'] : false;
    /**
     * Filter the arguments for the Recent Posts widget.
     *
     * @since 3.4.0
     *
     * @see WP_Query::get_posts()
     *
     * @param array $street_food_truck_args An array of arguments used to retrieve the recent posts.
     */
    $street_food_truck_r = new WP_Query( apply_filters( 'widget_posts_args', array(
        'posts_per_page'      => $street_food_truck_number,
        'no_found_rows'       => true,
        'post_status'         => 'publish',
        'ignore_sticky_posts' => true
    ) ) );
    if ($street_food_truck_r->have_posts()) :
    ?>
    <?php echo $street_food_truck_args['before_widget']; ?>
    <?php if ( $street_food_truck_title ) {
        echo $street_food_truck_args['before_title'] . esc_html($street_food_truck_title) . $street_food_truck_args['after_title'];
    } ?>
    <ul>
      <?php while ( $street_food_truck_r->have_posts() ) : $street_food_truck_r->the_post(); ?>
      <li>
        <div class="recent-post-box">
          <div class="media post-thumb">
            <?php if(has_post_thumbnail()) { the_post_thumbnail(); } ?>
            <div class="media-body post-content">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              <div class="d-flex date-comment">
               <?php if ( $street_food_truck_show_date ) : ?>
                <p class="post-date"><?php the_date(); ?></p>
               <?php endif; ?>
               <div class="date-comment1"><?php comments_number( __('0 Comment', 'street-food-truck'), __('0 Comments', 'street-food-truck'), __('% Comments', 'street-food-truck') ); ?></div>
              </div>
            </div>
          </div>
        </div>
      </li>
      <?php endwhile;
      wp_reset_postdata(); ?>
    </ul>

    <?php echo $street_food_truck_args['after_widget'];

    endif;
  }
}
function street_food_truck_my_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('Street_Food_Truck_My_Recent_Posts_Widget');
}
add_action('widgets_init', 'street_food_truck_my_recent_widget_registration');
