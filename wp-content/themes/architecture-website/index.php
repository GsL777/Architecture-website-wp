<?php get_header(); ?>

	
<div class="container">
	<div class="row content">
		
		<?php 

		$currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$args = array('posts_per_page' => 1, 'paged' => $currentPage);
		query_posts($args);

		if(have_posts() ): 

			$i = 0;

			while( have_posts() ): the_post(); ?>
			
				<article id="post-<?php the_ID(); ?>" <?php post_class('content-article'); ?>>

					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">','</a> </h1>' ); ?>
					</header>

					<div class="row">
						<?php if(has_post_thumbnail() ): ?>

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="thumbnail">
									<?php if( has_post_thumbnail() ):
										$urlImg = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
									endif; ?>
									<div class="element" style="background-image: url(<?php echo $urlImg; ?>);">
								</div><!-- .thumbnail -->
							</div><!-- .col-lg-12 -->

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<?php the_content(); ?>
							</div><!-- .col-lg-12 -->

						<?php else: ?>

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<?php the_content(); ?>
							</div><!-- .col-lg-12 -->

						<?php endif; ?>
					</div><!-- .row -->
				</article>

			<?php 
			$i++; 

			endwhile; 

		endif;

		wp_reset_query();
		?>

		
	</div><!-- .row -->
</div><!-- .container -->


<?php get_footer(); ?>