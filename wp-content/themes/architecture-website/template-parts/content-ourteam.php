
<div class="col-md-4 team">
	<?php 
		the_title('<h5>','</h5>'); 
		the_excerpt('<p>','</p>'); 

		if( has_post_thumbnail() ):
			$urlImg = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
		endif;
	?>

	<div class="team-img" style="background-image: url(<?php echo $urlImg; ?>);"></div><!-- .image-st -->
	<?php the_content('<p>','</p>'); ?>
</div><!-- .team -->
