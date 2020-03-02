	<?php get_header(); ?>


	<div id="about" class="main center">

		<section class="choose-us">
			<h1 class="text-center"><b>Why Choose Us?</b></h1>
			
			<div class="container-fluid">
				<div class="card-deck">
					<?php 
						$args = array(
							'type' => 'post',
							'order' => 'ASC',
							'category_name'=> 'choose-us',
							'posts_per_page' => 3
						);

						$blogLoop = new WP_Query($args);

						if( $blogLoop->have_posts() ):

							while( $blogLoop->have_posts() ): $blogLoop->the_post();

								get_template_part( 'template-parts/content', 'choose' );

							endwhile;

						endif;

						wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).
					?>
				</div><!-- .card-deck -->
			</div><!-- .container-fluid -->
		</section>


		<section class="about-company">
			<h1 class="text-center"><b>Our story</b></h1>

			<div class="row">
				<?php 
					$args = array(
						'type' => 'post',
						'order' => 'ASC',
						'category_name'=> 'story',
						'posts_per_page' => 1
					);

					$blogLoop = new WP_Query($args);

					if( $blogLoop->have_posts() ):

						while( $blogLoop->have_posts() ): $blogLoop->the_post();

							get_template_part( 'template-parts/content', 'story' );

						endwhile;

					endif;

					wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).
				?>
			</div><!-- .row -->
		</section>


		<section class="additional-services">
			<h1><b>We also do</b></h1>

			<div class="container-fluid">
				<div class="row">
				<?php 
					$args = array(
						'type' => 'post',
						'order' => 'ASC',
						'category_name'=> 'additional-services',
						'posts_per_page' => 2
					);

					$blogLoop = new WP_Query($args);

					if( $blogLoop->have_posts() ):

						while( $blogLoop->have_posts() ): $blogLoop->the_post();

							get_template_part( 'template-parts/content', 'additionalservices' );

						endwhile;

					endif;

					wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).
				?>

				</div><!-- .row -->
			</div><!-- .container-fluid -->
		</section>


		<section class="our-team">
			<h1 class="text-center"><b>Our team</b></h1>

			<div class="container-fluid">
				<div class="row">
				<?php 
					$args = array(
						'type' => 'post',
						'order' => 'ASC',
						'category_name'=> 'our-team',
						'posts_per_page' => 3
					);

					$blogLoop = new WP_Query($args);

					if( $blogLoop->have_posts() ):

						while( $blogLoop->have_posts() ): $blogLoop->the_post();

							get_template_part( 'template-parts/content', 'ourteam' );

						endwhile;

					endif;

					wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).
				?>
				</div><!-- .row -->
			</div><!-- .container-fluid -->
		</section>

	</div><!-- #about -->


	<?php get_footer(); ?>