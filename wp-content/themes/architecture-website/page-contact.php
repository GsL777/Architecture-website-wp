	<?php get_header(); ?>


		<div id="contact" class="main center">

			<section class="contacts">
				<h1 class="text-center"><b>Contacts</b></h1>

				<div class="row icon-design">

				<?php 
					$args = array(
							'type' => 'post',
							'order' => 'ASC',
							'category_name'=> 'contact',
							'posts_per_page' => 3
						);

					$blogLoop = new WP_Query($args);

					if( $blogLoop->have_posts() ):

						$i = 0;

						while( $blogLoop->have_posts() ): $blogLoop->the_post();

							if($i == 0): $icon = 'fa fa-home';
								elseif($i > 0 && $i < 2): $icon = 'fa fa-envelope';
								elseif($i > 1 && $i < 3): $icon = 'fa fa-phone';
							endif;
				?>
							<div class="text-center col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<i class="text-center <?php echo $icon; ?>"></i>
								<?php the_title('<p><b>','</b></p>'); ?>
								<?php the_content('<p>','</p>'); ?>
							</div><!-- .col-md-4 -->
				<?php
						$i++;

						endwhile;

					endif;

					wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).

					//wp_reset_query() - ensure that the main query has been reset to the original main query. (USE wp_reset_query() - immediately after every loop using query_posts()).
				?>
				</div><!-- .row -->
			</section>


			<section class="contact-form">
				<h1 class="text-center"><b>Interested in our services?</b></h1>
				<h3 class="text-center">Write us</h3>

				<div class="col-md-12 row">
					<div class="col-lg-6 col-md-6 col-sm-12 form-section">
					<?php 
						$args = array(
							'page_id'	=> '11'
						);

						$lastBlog = new WP_Query($args);

						if( $lastBlog->have_posts() ):
							while( $lastBlog->have_posts() ): $lastBlog->the_post();
					?>
								<div class="entry-content">
									<?php the_content(); ?>
								</div><!-- .entry-content -->
					<?php
							endwhile;

						endif;

						wp_reset_postdata();
					?> 

					</div><!-- .form-section -->

					<div class="col-lg-6 col-md-6 col-sm-12">
						<section class="map-section">
							<?php 
								$args = array(
									'type'				=> 'post',
									'order'				=> 'ASC',
									'category_name'		=> 'map',
									'posts_per_page'	=> 1
								);

								$lastBlog = new WP_Query($args);

								if( $lastBlog->have_posts() ):
									while( $lastBlog->have_posts() ): $lastBlog->the_post();

										the_content();

									endwhile;

								endif;

								wp_reset_postdata();
							?>
						</section>
					</div><!-- .col-lg-6 -->
				</div><!-- .col-md-12 -->
			</section>
		</div><!-- #contact -->


	<?php get_footer(); ?>