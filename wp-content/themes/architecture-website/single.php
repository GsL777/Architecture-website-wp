<?php get_header(); ?>


	<div class="container">
		<div class="single-content">
			<?php 
				if(have_posts()):

					while(have_posts()): the_post(); 

						get_template_part( 'template-parts/single', get_post_format() ); 

						echo architecture_post_navigation();//post navigation. //the_post_navigation(); changed to architecture_post_navigation(); function from theme-support.php

					endwhile;

				endif;
			?>
		</div><!-- .single -->
	</div><!-- .container -->


<?php get_footer(); ?>