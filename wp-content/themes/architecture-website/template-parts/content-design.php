<article id="post-<?php the_ID(); ?>" class="<?php post_class(); ?>">
	<?php the_title('<h1 class="text-center"><b>','</b></h1>'); ?>
	<div class="row">
		<div class="col-md-6">
			<?php the_content('<p class="text-left">','</p>'); ?>
		</div><!-- .col-md-6 -->
		<div class="col-md-6 design-image">
			<?php 
				if( has_post_thumbnail() ):
					$urlImg = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
				endif;
			?>

			<div class="image-st" style="background-image: url(<?php echo $urlImg; ?>);"></div><!-- .image-st -->

		</div><!-- .design-image -->
	</div><!-- .row -->
</article>