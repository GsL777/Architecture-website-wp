<div class="col-md-4 team">
	
	<?php 
		the_title('<h5>','</h5>'); 
		the_excerpt('<p>','</p>'); 

		if( has_post_thumbnail() ):
			$urlImg = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
		endif;
	?>

	<?php if(has_post_thumbnail() ): ?>
		<div class="team-img" style="background-image: url(<?php echo $urlImg; ?>);"></div><!-- .team-img -->

		<?php the_content(); ?>
	<?php else: 
		the_content();
	endif; ?>

</div><!-- .team -->