
	<?php
		if( has_post_thumbnail() ):
			$urlImg = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
		endif;
	?>

	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
		<div class="img-cover">

			<a href="<?php echo $urlImg; ?>">
				<img src="<?php echo $urlImg; ?>" class="img-responsive">
			</a>

	    	<div class="img-overlay">
	    		<i class="fa fa-plus-circle" aria-hidden="true"></i>
			</div><!-- .img-overlay -->
		</div><!-- .img-cover -->
	</div><!-- .col-lg-3 -->
