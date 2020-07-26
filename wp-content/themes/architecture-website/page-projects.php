	<?php get_header(); ?>


	<div id="projects" class="main center">

		<section id="gallery" class="pic-gallery">
			<div id="image-gallery">
				<div class="row">

				<?php 
					$currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1;

					$args = array(
						'paged' => $currentPage,
						'order' => 'ASC',
						'category_name'=> 'projects',
						'posts_per_page' => 12
					);

					query_posts($args);

					if(have_posts() ): 

						$i = 0;

						while( have_posts() ): the_post();

							get_template_part( 'template-parts/content', 'projects' ); 

						$i++;

						endwhile; 

					endif;

					wp_reset_query();
				?>

				</div><!-- row -->
			</div><!-- image gallery -->
		</section>
	</div><!-- #projects -->


	<?php get_footer(); ?>