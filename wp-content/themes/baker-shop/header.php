<?php
/**
 * The header for our theme
 *
 * @subpackage Baker Shop
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<a class="screen-reader-text skip-link" href="#skip-content"><?php esc_html_e( 'Skip to content', 'baker-shop' ); ?></a>

<div id="header">
	<div class="main-header">
		<div class="top-head">
			<div class="container">
				<div class="tph-inn">
					<div class="row m-0">
						<div class="col-lg-7 col-md-12 col-sm-12">
							<?php
								$topheader_text = esc_html(get_theme_mod('luzuk_baker_shop_header_toptext', 'Elevating Taste, Every Pastry, Every Day!'));

								if (!empty($topheader_text)) {
									
									echo '<p>' . $topheader_text . '</p>';
								}
							?>
						</div>
						<div class="col-lg-5 col-md-12 col-sm-12">
							<div class="row m-0">
								<div class="mail">
									<div class="mail-text">
										<?php
										$mail_number = esc_html(get_theme_mod('luzuk_baker_shop_header_mail', 'info@yourmail.com'));

										if (!empty($mail_number)) {
											
											echo '<i class="far fa-envelope"></i>
												<a href="mailto:' . $mail_number . '">' . $mail_number . '</a>';
										}
										?>
									</div>
								</div>
								<div class="phonno">
									<div class="phn-text">
										<?php
										$phone_number = esc_html(get_theme_mod('luzuk_baker_shop_header_phoneno', '+111 222 3333'));

										if (!empty($phone_number)) {
											
											echo '<i class="fa fa-phone"></i>
												<a href="tel:' . $phone_number . '">' . $phone_number . '</a>';
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="m-head">
		<div class="container">
			<div class="row mr-0">
				<div class="col-lg-4 col-md-5 col-sm-5">
					<div class="logo text-lg-left text-center">
						<?php if ( has_custom_logo() ) : ?>
							<?php the_custom_logo(); ?>
						<?php endif; ?>
						<?php if (get_theme_mod('luzuk_baker_shop_show_site_title',true)) {?>
							<?php $blog_info = get_bloginfo( 'name' ); ?>
							<?php if ( ! empty( $blog_info ) ) : ?>
								<?php if ( is_front_page() && is_home() ) : ?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php else : ?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php endif; ?>
							<?php endif; ?>
						<?php }?>
						<?php if (get_theme_mod('luzuk_baker_shop_show_tagline',true)) {?>
							<?php $description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo esc_html($description); ?></p>
							<?php endif; ?>
						<?php }?>
					</div>
				</div>
				<div class="col-lg-6 col-md-4 col-sm-4">
					<div class="header-inner section-inner">
						<div class="header-titles-wrapper">
							<button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
								<span class="toggle-inner">
									<span class="toggle-icon">
										<i class="fas fa-bars"></i>
									</span>
									<!-- <span class="toggle-text"><//?php _e( 'Menu', 'baker-shop' ); ?></span> -->
								</span>
							</button><!-- .nav-toggle -->
						</div><!-- .header-titles-wrapper -->

						<div class="header-navigation-wrapper">
							<?php
							if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) {
								?>
								<nav class="primary-menu-wrapper" aria-label="<?php echo esc_attr_x( 'Horizontal', 'menu', 'baker-shop' ); ?>">
									<ul class="primary-menu reset-list-style">
										<?php
										if ( has_nav_menu( 'primary' ) ) {

											wp_nav_menu(
												array(
													'container'  => '',
													'items_wrap' => '%3$s',
													'theme_location' => 'primary',
												)
											);

										} elseif ( ! has_nav_menu( 'expanded' ) ) {

											wp_list_pages(
												array(
													'match_menu_classes' => true,
													'show_sub_menu_icons' => true,
													'title_li' => false,
													'walker'   => new Baker_Shop_Walker_Page(),
												)
											);

										}
										?>
									</ul>
								</nav><!-- .primary-menu-wrapper -->
							<?php } ?>
						</div><!-- .header-navigation-wrapper -->
					</div><!-- .header-inner -->
					<?php
						// Output the menu modal.
						get_template_part( '/inc/modal-menu' );
					?>
				</div>
				<div class="col-lg-2 col-md-3 col-sm-3 pr-0">
					<div class="headerbtn">
						<a href="<?php echo esc_html(get_theme_mod('luzuk_baker_shop_header_contactusbtnlink')); ?>">
							<?php _e( 'Contact Us', 'baker-shop' ); ?>
							<i class="far fa-arrow-alt-circle-right"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if(is_singular()) {?>
	<div id="inner-pages-header">
		<div class="header-overlay"></div>
	    <div class="header-content">
		    <div class="container"> 
		      	<h1><?php single_post_title(); ?></h1>
		      	<div class="innheader-border"></div>
		      	<div class="theme-breadcrumb mt-2">
					<?php luzuk_baker_shop_breadcrumb();?>
				</div>
		    </div>
		</div>
	</div>
<?php } ?>