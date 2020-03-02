	<?php get_header(); ?>


		<div id="main" class="main center">
			<section class="mission-testimonials">
				<div class="container-fluid">

				<?php 
					$args = array(
							'type' => 'post',
							'order' => 'ASC',
							'category_name'=> 'home-testimonials',
							'posts_per_page' => 1
						);

					$blogLoop = new WP_Query($args);

					if( $blogLoop->have_posts() ):

						while( $blogLoop->have_posts() ): $blogLoop->the_post();

							get_template_part( 'template-parts/content', 'testimonials' );//template-part - folder where are all the content files. get-template-part function will search a folder template-parts and files with start content- .
							//get_post_format() - retrieve the_post_format of the current post that is in the post loop.

						endwhile;

					endif;

					wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).

					//wp_reset_query() - ensure that the main query has been reset to the original main query. (USE wp_reset_query() - immediately after every loop using query_posts()).
				?>

				</div><!-- .container-fluid -->
			</section>


			<?php 
				if( is_front_page() ):
					$architecture_classes = array( 'solutions' );
				else:
					$architecture_classes = array( 'no-solutions' );
				endif;
			?>

			<section <?php body_class( $architecture_classes ); ?>>
				<h1 class="text-center"><b>Solutions</b></h1>

				<div class="container-fluid">
					<div class="row">
					<?php 
						$args = array(
							'post_type'			=> 'solutions',
							'order' => 'ASC',
							'posts_per_page'	=> 4,
							'tax_query' => array(
								array(
									'taxonomy'	=> 'field',//custom taxonomy name written in category http field (as example: http://localhost/architecture/wp-admin/term.php?taxonomy=field&). In this case Wp dashboard->Projects->Field->Press on the category....
									'field'		=> 'slug',
									'terms'		=> array('solution'), //solutions - category name
								),
							),//on custom taxonomies if you could not print one or several categories use tax_query 
						);

						$blogLoop = new WP_Query( $args ); 

						if( $blogLoop->have_posts() ): 

							$i = 0;

							while( $blogLoop->have_posts() ): $blogLoop->the_post(); 

								if($i == 0): $class = 'solutions-row aside-1';
									elseif($i > 0 && $i < 2): $class = 'solutions-row aside-2';
									elseif($i > 1 && $i < 3): $class = 'solutions-row aside-3';
									elseif($i > 2): $class = 'solutions-row aside-4';
								endif;

								if( has_post_thumbnail() ):
									$urlImg = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
								endif;

								if($i % 2 != 0): ?>

									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 <?php echo $class; ?> p-0">

										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 p-0">
											<div class="image-solutions" style="background-image: url(<?php echo $urlImg; ?>);"></div><!-- .image-solutions -->
										</div><!-- .col-lg-3 -->

										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 services-block">
											<?php the_title('<h5>','</h5>'); ?>
											<?php the_excerpt('<p>','</p>'); ?>
											<div class="inner">
												<a href="<?php the_permalink(); ?>"><span><?php _e( 'Read More' ); ?></span></a>
											</div><!-- .inner -->
										</div><!-- .col-lg-3 -->

									</div><!-- .col-lg-6 -->

								<?php elseif($i % 2 == 0): ?>

									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 <?php echo $class; ?> p-0">

										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 services-block">
											<?php the_title('<h5>','</h5>'); ?>
											<?php the_excerpt('<p>','</p>'); ?>
											<div class="inner">
												<a href="<?php the_permalink(); ?>"><span><?php _e( 'Read More' ); ?></span></a>
											</div><!-- .inner -->
										</div><!-- .col-lg-3 -->

										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 p-0">
											<div class="image-solutions" style="background-image: url(<?php echo $urlImg; ?>);"></div><!-- .image-solutions -->
										</div><!-- .col-lg-3 -->

									</div><!-- .col-lg-6 -->

								<?php endif;

								$i++;

							endwhile;

						endif;

						wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).

						//wp_reset_query() - ensure that the main query has been reset to the original main query. (USE wp_reset_query() - immediately after every loop using query_posts()).
					?>
					</div><!-- .row -->
				</div><!-- .container -->
			</section>


			<section class="design">
				<div class="container-fluid">
				<?php 
					$args = array(
							'type' => 'post',
							'order' => 'ASC',
							'category_name'=> 'design',
							'posts_per_page' => 1
						);

					$blogLoop = new WP_Query($args);

					if( $blogLoop->have_posts() ):

						while( $blogLoop->have_posts() ): $blogLoop->the_post();

							get_template_part( 'template-parts/content', 'design' );

						endwhile;

					endif;

					wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).
				?>

				</div><!-- .container -->
			</section>


			<section class="clients">
				<h1 class="text-center"><b>Our Clients</b></h1>

				<div class="infinite-slides">
					<div class="clients-slides">
						<?php 
							$args = array(
								'type' => 'post',
								'order' => 'ASC',
								'category_name'=> 'clients',
								'posts_per_page' => 6
							);

							$blogLoop = new WP_Query($args);

							if( $blogLoop->have_posts() ):

								while( $blogLoop->have_posts() ): $blogLoop->the_post();

									get_template_part( 'template-parts/content', 'clients' );

								endwhile;

							endif;

							wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).
						?>
					</div><!-- .clients-slides -->
				</div><!-- .infinite-slides -->
			</section>


			<section class="pricing">
				<div class="container-fluid p-0">
					<h1 class="text-center"><b>Pricing</b></h1>

					<p class="text-center"><em>P</em>lease choose your plan. Every services could be changed depending on your needs.</p>

					<div class="card-deck pricing-deck">
						<?php 
							$args = array(
								'type' => 'post',
								'order' => 'ASC',
								'category_name'=> 'pricing',
								'posts_per_page' => 3
							);

							$blogLoop = new WP_Query($args);

							if( $blogLoop->have_posts() ):

								while( $blogLoop->have_posts() ): $blogLoop->the_post();

									get_template_part( 'template-parts/content', 'pricing' );

								endwhile;

							endif;

							wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).
						?>

					</div><!-- .card-deck -->
				</div><!-- .container-fluid -->
			</section>

		</div><!-- #main -->


	<?php get_footer(); ?>