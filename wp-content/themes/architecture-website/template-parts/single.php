<article id="post-<?php the_ID(); ?>" <?php post_class('image-format'); ?>>
	<?php if( has_post_thumbnail() ):
			$urlImg = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
		endif; 
	?>

	<?php if( has_post_thumbnail() ): ?>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="single-image" style="background-image: url(<?php echo $urlImg; ?>);"></div>
		</div><!-- .col-lg-12 -->

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<?php the_title('<h3>', '</h3>'); ?>
			
			<?php the_content('<h3 class="image-text">', '</h3>'); ?>
			<hr>
		</div><!-- .col-lg-12 -->

	<?php else: ?>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<?php the_title('<h3>', '</h3>'); ?>
			<hr>
			<?php the_content('<h3 class="image-text">', '</h3>'); ?>
			<hr>
		</div><!-- .col-lg-12 -->

	<?php endif; ?>
</article>