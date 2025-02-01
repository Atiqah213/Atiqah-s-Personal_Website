<?php
/**
 * Theme Page
 *
 * @package Expert Food Blog
 */

if ( ! defined( 'EXPERT_FOOD_BLOG_FREE_THEME_URL' ) ) {
	define( 'EXPERT_FOOD_BLOG_FREE_THEME_URL', 'https://www.seothemesexpert.com/products/free-food-blog-wordpress-theme' );
}
if ( ! defined( 'EXPERT_FOOD_BLOG_PRO_THEME_URL' ) ) {
	define( 'EXPERT_FOOD_BLOG_PRO_THEME_URL', 'https://www.seothemesexpert.com/products/food-blog-website-template
' );
}
if ( ! defined( 'EXPERT_FOOD_BLOG_DEMO_THEME_URL' ) ) {
	define( 'EXPERT_FOOD_BLOG_DEMO_THEME_URL', 'https://demo.seothemesexpert.com/expert-food-blog/' );
}
if ( ! defined( 'EXPERT_FOOD_BLOG_FREE_DOCS_THEME_URL' ) ) {
    define( 'EXPERT_FOOD_BLOG_FREE_DOCS_THEME_URL', 'https://demo.seothemesexpert.com/documentation/expert-food-blog/' );
}
if ( ! defined( 'EXPERT_FOOD_BLOG_RATE_THEME_URL' ) ) {
    define( 'EXPERT_FOOD_BLOG_RATE_THEME_URL', 'https://wordpress.org/support/theme/expert-food-blog/reviews/#new-post' );
}
if ( ! defined( 'EXPERT_FOOD_BLOG_SUPPORT_THEME_URL' ) ) {
    define( 'EXPERT_FOOD_BLOG_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/expert-food-blog/' );
}
if ( ! defined( 'EXPERT_FOOD_BLOG_THEME_BUNDLE_URL' ) ) {
    define( 'EXPERT_FOOD_BLOG_THEME_BUNDLE_URL', 'https://www.seothemesexpert.com/products/wordpress-theme-bundle' );
}

/**
 * Add theme page
 */
function expert_food_blog_menu() {
	add_theme_page( esc_html__( 'About Theme', 'expert-food-blog' ), esc_html__( 'About Theme', 'expert-food-blog' ), 'edit_theme_options', 'expert-food-blog-about', 'expert_food_blog_about_display' );
}
add_action( 'admin_menu', 'expert_food_blog_menu' );

/**
 * Display About page
 */
function expert_food_blog_about_display() { ?>
	<div class="wrap about-wrap full-width-layout">		
		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'expert-food-blog' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'expert-food-blog-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'expert-food-blog-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'expert-food-blog' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'expert-food-blog-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'expert-food-blog' ); ?></a>
		</nav>

		<?php
			expert_food_blog_main_screen();

			expert_food_blog_free_vs_pro();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>" target="_blank">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'expert-food-blog' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'expert-food-blog' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>" target="_blank"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'expert-food-blog' ) : esc_html_e( 'Go to Dashboard', 'expert-food-blog' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function expert_food_blog_main_screen() {
	if ( isset( $_GET['page'] ) && 'expert-food-blog-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="main-col-box">
			<div class="feature-section two-col">
				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Upgrade To Pro', 'expert-food-blog' ); ?></h2>
					<p><?php esc_html_e( 'Take a step towards excellence, try our premium theme. Use Code', 'expert-food-blog' ) ?><span class="usecode">" STEPRO10 "</span></p>
					<p><a href="<?php echo esc_url( EXPERT_FOOD_BLOG_PRO_THEME_URL ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Upgrade Pro', 'expert-food-blog' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Lite Documentation', 'expert-food-blog' ); ?></h2>
					<p><?php esc_html_e( 'The free theme documentation can help you set up the theme.', 'expert-food-blog' ) ?></p>
					<p><a href="<?php echo esc_url( EXPERT_FOOD_BLOG_FREE_DOCS_THEME_URL ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Lite Documentation', 'expert-food-blog' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Theme Info', 'expert-food-blog' ); ?></h2>
					<p><?php esc_html_e( 'Know more about Expert Food Blog.', 'expert-food-blog' ) ?></p>
					<p><a href="<?php echo esc_url( EXPERT_FOOD_BLOG_FREE_THEME_URL ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Theme Info', 'expert-food-blog' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'expert-food-blog' ); ?></h2>
					<p><?php esc_html_e( 'You can get all theme options in customizer.', 'expert-food-blog' ) ?></p>
					<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Customize', 'expert-food-blog' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Need Support?', 'expert-food-blog' ); ?></h2>
					<p><?php esc_html_e( 'If you are having some issues with the theme or you want to tweak some thing, you can contact us our expert team will help you.', 'expert-food-blog' ) ?></p>
					<p><a href="<?php echo esc_url( EXPERT_FOOD_BLOG_SUPPORT_THEME_URL ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Support Forum', 'expert-food-blog' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Review', 'expert-food-blog' ); ?></h2>
					<p><?php esc_html_e( 'If you have loved our theme please show your support with the review.', 'expert-food-blog' ) ?></p>
					<p><a href="<?php echo esc_url( EXPERT_FOOD_BLOG_RATE_THEME_URL ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Rate Us', 'expert-food-blog' ); ?></a></p>
				</div>		
			</div>
			<div class="about-theme">
				<?php $expert_food_blog_theme = wp_get_theme(); ?>

				<h1><?php echo esc_html( $expert_food_blog_theme ); ?></h1>
				<p class="version"><?php esc_html_e( 'Version', 'expert-food-blog' ); ?>: <?php echo esc_html($expert_food_blog_theme['Version']);?></p>
				<div class="theme-description">
					<p class="actions">
						<a href="<?php echo esc_url( EXPERT_FOOD_BLOG_PRO_THEME_URL ); ?>" class="protheme button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'expert-food-blog' ); ?></a>

						<a href="<?php echo esc_url( EXPERT_FOOD_BLOG_DEMO_THEME_URL ); ?>" class="demo button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'expert-food-blog' ); ?></a>

						<a href="<?php echo esc_url( EXPERT_FOOD_BLOG_THEME_BUNDLE_URL ); ?>" class="bundle button button-secondary" target="_blank"><?php esc_html_e( 'Buy Bundle', 'expert-food-blog' ); ?></a>

						<a href="<?php echo esc_url( EXPERT_FOOD_BLOG_FREE_DOCS_THEME_URL ); ?>" class="docs button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'expert-food-blog' ); ?></a>
					</p>
				</div>
				<div class="theme-screenshot">
					<img src="<?php echo esc_url( $expert_food_blog_theme->get_screenshot() ); ?>" />
				</div>
			</div>
		</div>
	<?php
	}
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function expert_food_blog_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<div class="theme-description">
				<p class="actions">
					<a href="<?php echo esc_url( EXPERT_FOOD_BLOG_PRO_THEME_URL ); ?>" class="protheme button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'expert-food-blog' ); ?></a>

					<a href="<?php echo esc_url( EXPERT_FOOD_BLOG_DEMO_THEME_URL ); ?>" class="demo button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'expert-food-blog' ); ?></a>

					<a href="<?php echo esc_url( EXPERT_FOOD_BLOG_FREE_DOCS_THEME_URL ); ?>" class="docs button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'expert-food-blog' ); ?></a>
				</p>
			</div>
			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'expert-food-blog' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'expert-food-blog' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'expert-food-blog' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'One click demo import', 'expert-food-blog' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Color pallete and font options', 'expert-food-blog' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Demo Content has 8 to 10 sections', 'expert-food-blog' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Rearrange sections as per your need', 'expert-food-blog' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Internal Pages', 'expert-food-blog' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Plugin Integration', 'expert-food-blog' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Ultimate technical support', 'expert-food-blog' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access our Support Forums', 'expert-food-blog' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Get regular updates', 'expert-food-blog' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Install theme on unlimited domains', 'expert-food-blog' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Mobile Responsive', 'expert-food-blog' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Easy Customization', 'expert-food-blog' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a class="sidebar-button single-btn protheme button button-secondary" href="<?php echo esc_url(EXPERT_FOOD_BLOG_PRO_THEME_URL);?>" target="_blank"><?php esc_html_e( 'Go for Premium', 'expert-food-blog' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}
