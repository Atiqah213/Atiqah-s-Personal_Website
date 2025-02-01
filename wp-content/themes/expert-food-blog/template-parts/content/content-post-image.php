<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Expert Food Blog
 */

// For archive post setting
$expert_food_blog_post_heading = get_theme_mod('expert_food_blog_post_heading_settings', '1');
$expert_food_blog_post_content = get_theme_mod('expert_food_blog_post_content_settings', '1');
$expert_food_blog_post_date = get_theme_mod('expert_food_blog_post_date_settings', '1');
$expert_food_blog_post_comments = get_theme_mod('expert_food_blog_post_comments_settings', '1');
$expert_food_blog_post_author = get_theme_mod('expert_food_blog_post_author_settings', '1');
$expert_food_blog_post_tags = get_theme_mod('expert_food_blog_post_tags_settings', '1');

// For single post setting
$expert_food_blog_single_post_heading = get_theme_mod('expert_food_blog_single_post_heading_settings', '1');
$expert_food_blog_single_post_content = get_theme_mod('expert_food_blog_single_post_content_settings', '1');
$expert_food_blog_single_post_date = get_theme_mod('expert_food_blog_single_post_date_settings', '1');
$expert_food_blog_single_post_comments = get_theme_mod('expert_food_blog_single_post_comments_settings', '1');
$expert_food_blog_single_post_author = get_theme_mod('expert_food_blog_single_post_author_settings', '1');
$expert_food_blog_single_post_tags = get_theme_mod('expert_food_blog_single_post_tags_settings', '1');

$expert_food_blog_is_archive_visible = (
    $expert_food_blog_post_heading == '1' ||
    $expert_food_blog_post_content == '1' ||
    $expert_food_blog_post_date == '1' ||
    $expert_food_blog_post_comments == '1' ||
    $expert_food_blog_post_author == '1' ||
    $expert_food_blog_post_tags == '1'
);

$expert_food_blog_is_single_visible = (
    $expert_food_blog_single_post_heading == '1' ||
    $expert_food_blog_single_post_content == '1' ||
    $expert_food_blog_single_post_date == '1' ||
    $expert_food_blog_single_post_comments == '1' ||
    $expert_food_blog_single_post_author == '1' ||
    $expert_food_blog_single_post_tags == '1'
);

if (!is_single() && !$expert_food_blog_is_archive_visible) {
    return;
}

if (is_single() && !$expert_food_blog_is_single_visible) {
    return;
}

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('blog-item'); ?>>
	<?php
		$post_content = apply_filters('the_content', get_the_content());
		preg_match('/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/i', $post_content, $matches);

		// Check if a matching image URL is found
		if (!empty($matches[1])) {
		    // Get the matched image URL
		    $image_url = $matches[1];

		    // Output the custom HTML structure
		    ?>
		    <div class="custom-image-container">
		        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
		    </div>
		    <?php
		} else {
		    // Output a message if no image is found
		    echo 'No image found in the post content.';
		}
	?>

<?php
	if (is_single()) :
        if ($expert_food_blog_single_post_date == '1') : ?>
            <h6 class="theme-button"><?php echo esc_html(get_the_date('j')); ?>, <?php echo esc_html(get_the_date('M')); ?> <?php echo esc_html(get_the_date('Y')); ?></h6>
        <?php endif;
    else :
        if ($expert_food_blog_post_date == '1') : ?>
            <h6 class="theme-button"><?php echo esc_html(get_the_date('j')); ?>, <?php echo esc_html(get_the_date('M')); ?> <?php echo esc_html(get_the_date('Y')); ?></h6>
        <?php endif;
    endif;
    ?>

    <div class="blog-content">
        <?php
        if (is_single()) :
            if ($expert_food_blog_single_post_heading == '1') :
                the_title('<h5 class="post-title">', '</h5>');
            endif;
        else :
            if ($expert_food_blog_post_heading == '1') :
                the_title(sprintf('<h5 class="post-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h5>');
            endif;
        endif;

        if (is_singular()) :
            if ($expert_food_blog_single_post_content == '1') :
                the_content();
            endif;
        else :
            if ($expert_food_blog_post_content == '1') :
                echo "<p>" . wp_trim_words(get_the_excerpt(), 50) . "</p>";
            endif;
        endif;
        ?>
    </div>

    <?php if (is_singular()) : ?>
        <ul class="comment-timing">
            <?php if ($expert_food_blog_single_post_comments == '1') : ?>
                <li><a href="javascript:void(0);"><i class="fa fa-comment"></i> <?php echo esc_html(get_comments_number($post->ID)); ?></a></li>
            <?php endif; ?>

            <?php if ($expert_food_blog_single_post_author == '1') : ?>
                <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i class="fa fa-user"></i><?php esc_html_e('By', 'expert-food-blog'); ?> <?php the_author(); ?></a></li>
            <?php endif; ?>
        </ul>
        <?php else : ?>
        <ul class="comment-timing">
            <?php if ($expert_food_blog_post_comments == '1') : ?>
                <li><a href="javascript:void(0);"><i class="fa fa-comment"></i> <?php echo esc_html(get_comments_number($post->ID)); ?></a></li>
            <?php endif; ?>

            <?php if ($expert_food_blog_post_author == '1') : ?>
                <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i class="fa fa-user"></i><?php esc_html_e('By', 'expert-food-blog'); ?> <?php the_author(); ?></a></li>
            <?php endif; ?>
        </ul>
    <?php endif; ?>

    <?php
    if (is_singular()) :
        if ($expert_food_blog_single_post_tags == '1') : ?>
            <div class="blog-tags mt-3">
                <?php the_tags(); ?>
            </div>
        <?php endif;
        else :
        if ($expert_food_blog_post_tags == '1') : ?>
            <div class="blog-tags mt-3">
                <?php the_tags(); ?>
            </div>
        <?php endif;
    endif;
    ?>
</div>