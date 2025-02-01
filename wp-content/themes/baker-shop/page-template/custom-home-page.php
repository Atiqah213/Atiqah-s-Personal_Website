<?php
/**
 * Template Name: Custom Home
 */
get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'luzuk_baker_shop_above_slider' ); ?>

	<?php if( get_theme_mod('luzuk_baker_shop_slider_hide_show') != ''){ ?>
	<section id="slider">
		  
		<!-- <div class="container"> -->
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			    <?php $luzuk_baker_shop_slider_pages = array();
			    for ( $count = 1; $count <= 4; $count++ ) {
			        $mod = intval( get_theme_mod( 'luzuk_baker_shop_slider'. $count ));
			        if ( 'page-none-selected' != $mod ) {
			          $luzuk_baker_shop_slider_pages[] = $mod;
			        }
			    }
		      	if( !empty($luzuk_baker_shop_slider_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $luzuk_baker_shop_slider_pages,
			          	'orderby' => 'post__in'
			        );
		        	$query = new WP_Query( $args );
		        if ( $query->have_posts() ) :
		          	$i = 1;
		    	?>     
				    <div class="carousel-inner" role="listbox">
				      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
					        <div <?php if($i == 1){echo 'class="carousel-item fade-in-image active"';} else{ echo 'class="carousel-item fade-in-image"';}?>>
								<div class="row">
									<div class="contentbx">
									<?php
										$luzuk_baker_shop_slider_effect = get_theme_mod('luzuk_baker_shop_slider_effect', '') 
									?>
										<div class="content <?php echo ($luzuk_baker_shop_slider_effect); ?>">
											<div class="sl_cont_image">
											<?php 
												$luzuk_baker_shop_aboutus_rightimage = get_theme_mod('luzuk_baker_shop_aboutus_rightimage');

												if(!empty($luzuk_baker_shop_aboutus_rightimage)){
													echo '<img alt="'. esc_html(get_the_title()) .'" src="'.esc_url($luzuk_baker_shop_aboutus_rightimage).'" class="img-responsive secondry-bg-img" />';
												}else{
													echo '<img alt="luzuk_baker_shop_aboutus_rightimage" src="'.get_template_directory_uri().'/assets/images/slid_title.png" class="img-responsive" />';
												}
											?>
										</div>
											
											<h2><?php the_title(); ?></h2>
											<?php 
												$luzuk_baker_shop_slider_excerpt_length = get_theme_mod('luzuk_baker_shop_slider_excerpt_length','15');
											
												if( $luzuk_baker_shop_slider_excerpt_length != ''){?>
												<p class="mb-0"><?php $luzuk_baker_shop_excerpt = get_the_excerpt(); echo esc_html( luzuk_baker_shop_string_limit_words( $luzuk_baker_shop_excerpt, esc_attr(get_theme_mod('luzuk_baker_shop_slider_excerpt_length','15') ) )); ?></p>
											<?php } ?>
											<?php $slider_btntext = esc_html(get_theme_mod('luzuk_baker_shop_sliderbtntext', 'SHOP NOW!')); ?>
											<div class="read-btn sbtn1">
												<a href="<?php echo esc_url(get_theme_mod('luzuk_baker_shop_sliderbtnlink')) ?>" >
													<?php echo $slider_btntext; ?> <i class="far fa-arrow-alt-circle-right"></i>
												</a>
											</div>
										</div>
									</div>
									<div class="slideimgbx">
										<div class="slideimg">
											<?php
												// Check if the post has a thumbnail
												if (has_post_thumbnail()) {
													// If post has thumbnail, display it
													?>
													<img src="<?php echo esc_url(the_post_thumbnail_url('full')); ?>" alt="<?php the_title_attribute(); ?> "/>
													<?php
												} else {
													// If post does not have thumbnail, display default image
													?>
													<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/abt1.jpg'); ?>" alt="Default Image" />
													<?php
												}
											?>
											
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
			    <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			      	<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
			      	<span class="screen-reader-text"><//?php esc_html_e( 'Prev','baker-shop' );?></span>
			    </a>
			    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			      	<span class="carousel-control-next-icon" aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
			      	<span class="screen-reader-text"><//?php esc_html_e( 'Next','baker-shop' );?></span>
			    </a> -->
				<!-- <ol class="carousel-indicators">
                    <//?php for ($j = 0; $j < $i; $j++) : ?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $j; ?>" class="<?php if ($j === 0) echo 'active'; ?>"></li>
                    <//?php endfor; ?>
                </ol> -->
			</div>
		  	<div class="clearfix"></div>
		<!-- </div> -->
	</section>
	<?php }?>
	
	<?php do_action('luzuk_baker_shop_below_slider'); ?>

	<section id="productcategory-section">
		<div class="container"> 
			<div class="p-sbox">
				<div class="S_headingbx">
					<div class="row mr-0">
						<div class="col-md-8">
							<div class="productcategory-head ">
								<?php if(get_theme_mod('luzuk_baker_shop_productcategory_subheading') != ''){?>
									<h6><?php echo esc_html(get_theme_mod('luzuk_baker_shop_productcategory_subheading')); ?>
									</h6>
								<?php }?>

								<?php if(get_theme_mod('luzuk_baker_shop_productcategory_heading') != ''){?>
									<h3><?php echo esc_html(get_theme_mod('luzuk_baker_shop_productcategory_heading')); ?>
									</h3>
								<?php }?>
								
							</div>
						</div>
						<div class="col-md-4">
							<div class="productcategory-btn">
								<a href="<?php echo esc_html(get_theme_mod('luzuk_baker_shop_productcategory_viewallbtnlink')); ?>">
									<?php _e( 'View All', 'baker-shop' ); ?>
									<i class="far fa-arrow-alt-circle-right"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<?php if(class_exists('woocommerce')){ ?>
					<div class="category">
						<div class="pcbox">
							<div class="row mr-0">  
							<?php
							$args = array(
								'number'     => 0,
								'orderby'    => 'title',
								'order'      => 'ASC',
								'hide_empty' => false
							);
							$product_categories = get_terms( 'product_cat', $args );

							$count = count($product_categories);
							if ( $count > 0 ){
								foreach ( $product_categories as $product_category ) {

								if(function_exists('get_term_meta')){
									if( isset( $product_category->term_id ) ){
										//show parent categories
											$thumbnail_id = get_term_meta($product_category->term_id, 'thumbnail_id', true);
											}
										// get the image URL for parent category
											$image = wp_get_attachment_url($thumbnail_id);
										}else{
											$image = esc_html(get_template_directory_uri()).'/assets/images/default.jpg';
										}
									if( isset( $product_category->name ) ){
									echo '<div class="col-lg-3 col-md-6 col-sm-12 item cat-product hvr-float-shadow"> ';

									echo' <div class="pro-cat-img">   
											<a href="' . get_term_link( $product_category ) . '" data-hover="' . $product_category->name . '" ><img src="'.$image.'" alt="" width="270" height="377" />
												<div class="p-olay"></div></a>
											</div>  ';

											echo ' <div class="pro-cat-content"> ';
											// echo '<div class="pro-cat-oly"></div>';
											echo '<a href="' . get_term_link( $product_category ) . '" data-hover="' . $product_category->name . '" >
												<i class="fa fa-eye" aria-hidden="true"></i>
											</a>';
											echo '<h5><a href="' . get_term_link( $product_category ) . '" data-hover="' . $product_category->name . '" >
													' . $product_category->name . '
													</a>
												</h5>';
											
											echo'</div>
										</div>';		
								}
								}
							}?>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				<?php }?>
			</div>
		</div>
	</section>

	<?php do_action('luzuk_baker_shop_below_productcategory'); ?>

	<section id="ourproduct-section">
		<div class="container"> 
			<div class="S_headingbx">
				<div class="row mr-0">
					<div class="col-md-8 pd-0">
						<div class="productcategory-head ">
							<?php if(get_theme_mod('luzuk_baker_shop_ourproduct_subheading') != ''){?>
								<h6><?php echo esc_html(get_theme_mod('luzuk_baker_shop_ourproduct_subheading')); ?>
								</h6>
							<?php }?>

							<?php if(get_theme_mod('luzuk_baker_shop_ourproduct_heading') != ''){?>
								<h3><?php echo esc_html(get_theme_mod('luzuk_baker_shop_ourproduct_heading')); ?>
								</h3>
							<?php }?>
							
						</div>
					</div>
					<div class="col-md-4">
						<div class="product-btn">
							<a href="<?php echo esc_html(get_theme_mod('luzuk_baker_shop_ourproduct_viewmorebtnlink')); ?>">
								<?php _e( 'View All', 'baker-shop' ); ?>
								<i class="far fa-arrow-alt-circle-right"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="ourproductus-post-wrap">
				<div class="ourproductus-post-boxes row">
					<div class="row owl-carousel owl-theme mr-0">
						<?php
						if (function_exists('woocommerce_template_loop_add_to_cart') && function_exists('WC')) {
							// Query to fetch new arrival products
							$args = array(
								'post_type' => 'product',
								'posts_per_page' => 4,
								'orderby' =>'date',
								'order' => 'DESC',
								'meta_query' => array(
									array(
										'key' => '_stock_status',
										'value' => 'instock'
									)
								)
							);
							$loop = new WP_Query($args);
							if ($loop->have_posts()) {
								while ($loop->have_posts()) : $loop->the_post(); global $product;
									?>
									<div class="col-lg-3 col-md-6 col-sm-12 item ourproductbx wow zoomIn" data-wow-duration="1s">
										<div class="ourproductus-single">
											<div class="ourproduct-box"> 
												<div class="hi-icon">
													<a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
														<?php if (has_post_thumbnail($loop->post->ID)) {
															echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
														} else {
															echo '<img src="' . get_template_directory_uri() . '/images/default.png" alt="featured products" />';
														} ?>
													</a>
												</div>
											</div> 
											<div class="pcontent">
												<a class="add-to-cart" id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">    
													<h3><?php the_title(); ?></h3>
												</a>
												<div class="Pr_bx">
													<span class="price"><?php echo $product->get_price_html(); ?></span>
												</div>
												<div class="btn-rentadress">
													<a class="cart-contents" href="<?php the_permalink(); ?>"><?php echo esc_html('Order Now','baker-shop'); ?> <i class="far fa-arrow-alt-circle-right"></i></a>
												</div>
												<div class="clear"></div>
											</div>             
										</div>
										<div class="clear"></div>
									</div>
								<?php endwhile;
							} else {
								// No new arrival products found
								echo '<div class="item">';
								echo '<p>No new arrival products found.</p>';
								echo '</div>';
							}
						}
						?>
					</div> 
					
				</div> 
			</div>
		</div>
	</section>

	<?php do_action('luzuk_baker_shop_below_ourproduct_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	  		<div class="lz-content">
	        	<?php the_content(); ?>
	        </div>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>