<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package Street Food Truck 
 */
?>

<h2 class="entry-title"><?php echo esc_html(get_theme_mod('street_food_truck_no_results_page_title',__('Nothing Found','street-food-truck')));?></h2>

<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	<p><?php printf( esc_html__( 'Ready to publish your first post? Get started here.', 'street-food-truck' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
	<?php elseif ( is_search() ) : ?>
	<p><?php echo esc_html(get_theme_mod('street_food_truck_no_results_page_content',__('Sorry, but nothing matched your search terms. Please try again with some different keywords.','street-food-truck')));?></p><br />
		<?php get_search_form(); ?>
	<?php else : ?>
	<p><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'street-food-truck' ); ?></p><br />
	<div class="more-btn">
		<a href="<?php echo esc_url(home_url() ); ?>"><?php esc_html_e( 'Back to Home Page', 'street-food-truck' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Back to Home Page','street-food-truck' );?></span></a>
	</div>
<?php endif; ?>