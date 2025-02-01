<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Adventure Camping 
 */
?>

<div id="sidebar" <?php if( is_page_template('blog-post-left-sidebar.php')){?> style="float:left;"<?php } ?>>    
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
        <aside id="search" class="widget" role="complementary" aria-label="<?php esc_attr_e( 'firstsidebar', 'adventure-camping' ); ?>">
            <h3 class="widget-title"><?php esc_html_e( 'Search', 'adventure-camping' ); ?></h3>
            <?php get_search_form(); ?>
        </aside>
        <aside id="archives" class="widget" role="complementary" aria-label="<?php esc_attr_e( 'secondsidebar', 'adventure-camping' ); ?>">
            <h3 class="widget-title"><?php esc_html_e( 'Archives', 'adventure-camping' ); ?></h3>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>
        <aside id="meta" class="widget" role="complementary" aria-label="<?php esc_attr_e( 'thirdsidebar', 'adventure-camping' ); ?>">
            <h3 class="widget-title"><?php esc_html_e( 'Meta', 'adventure-camping' ); ?></h3>
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </aside>
        <aside id="categories" class="widget" role="complementary" aria-label="<?php esc_attr_e( 'forthsidebar', 'adventure-camping' ); ?>"> 
            <h3 class="widget-title"><?php esc_html_e( 'Categories', 'adventure-camping' ); ?></h3>          
            <ul>
                <?php wp_list_categories('title_li=');  ?>
            </ul>
        </aside>
        <aside id="categories-dropdown" class="widget" role="complementary" aria-label="<?php esc_attr_e( 'fifthsidebar', 'adventure-camping' ); ?>">
            <h3 class="widget-title"><?php esc_html_e( 'Dropdown Categories', 'adventure-camping' ); ?></h3>
            <ul>
                <?php wp_dropdown_categories('title_li=');  ?>
            </ul>
        </aside>
        <aside id="tag-cloud-sec" class="widget" role="complementary" aria-label="<?php esc_attr_e( 'sixthsidebar', 'adventure-camping' ); ?>">
            <h3 class="widget-title"><?php esc_html_e( 'Tag Cloud', 'adventure-camping' ); ?></h3>
            <ul>
                <?php wp_tag_cloud('title_li=');  ?>
            </ul>
        </aside>
    <?php endif; ?>
</div> 