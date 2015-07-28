<?php get_header(); ?>

<!-- Wrapper start -->
	<div class="main">

		<!-- Header section start -->
		<?php
			$shop_isle_header_image = get_header_image();
			if( !empty($shop_isle_header_image) ):
				echo '<section class="module bg-dark" data-background="'.$shop_isle_header_image.'">';
			else:
				echo '<section class="module bg-dark">';
			endif;
		?>
		
			<div class="container">

				<div class="row">

					<div class="col-sm-6 col-sm-offset-3">

						<h1 class="module-title font-alt"><?php _e('Blog','shop-isle'); ?></h1>

					</div>

				</div><!-- .row -->

			</div>
		</section>
		<!-- Header section end -->

		<!-- Blog standar start -->
		<section class="module">
			<div class="container">

				<div class="row">

					<!-- Content column start -->
					<div class="col-sm-8">
					
						<?php while ( have_posts() ) : the_post(); ?>

							<div id="post-<?php the_ID(); ?>" <?php post_class("post"); ?> itemscope="" itemtype="http://schema.org/BlogPosting">

								<?php
									if ( has_post_thumbnail() ) {
										echo '<div class="post-thumbnail">';
											echo '<a href="'.get_permalink().'">';
												echo get_the_post_thumbnail($post->ID, 'blog-thumb');
											echo '</a>';	
										echo '</div>';
									}
								?>

								<div class="post-header font-alt">
									<h2 class="post-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
									<div class="post-meta">
										<?php 
										shop_isle_posted_on();
										storefront_post_meta();
										?>

									</div>
								</div>

								<div class="post-entry">
									<?php 
										$shop_isleismore = @strpos( $post->post_content, '<!--more-->');
										if($shop_isleismore) : 
											the_content();
										else : 
											the_excerpt();
										endif;
									?>	
								</div>

								<div class="post-more">
									<a href="<?php echo get_permalink(); ?>" class="more-link"><?php _e('Read more','shop-isle'); ?></a>
								</div>

							</div>

						<?php endwhile; // end of the loop. ?>

						
						<!-- Pagination start-->
						<div class="pagination font-alt">
							<?php do_action('storefront_loop_after'); ?>
						</div>
						<!-- Pagination end -->

					</div>
					<!-- Content column end -->

					<!-- Sidebar column start -->
					<div class="col-sm-4 col-md-3 col-md-offset-1 sidebar">

						<?php do_action( 'storefront_sidebar' ); ?>

					</div>
					<!-- Sidebar column end -->

				</div><!-- .row -->

			</div>
		</section>
		<!-- Blog standar end -->

<?php get_footer(); ?>