	<div class="col-md-8">
		<?php 
			if( has_post_thumbnail() ):
				$urlImg = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
			endif;
		?>
		<div class="company-img" style="background-image: url(<?php echo $urlImg; ?>);"></div><!-- .image-st -->
	</div><!-- .col-md-8 -->

	<div class="col-md-4 company-text">
		<?php the_content(); ?>
	</div><!-- .col-md-4 -->