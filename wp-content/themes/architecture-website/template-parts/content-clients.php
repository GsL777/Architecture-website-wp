
<?php  
	if( has_post_thumbnail() ):
		$urlImg = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
	endif;
?>

<div class="slide">
	<div class="image-clients" style="background-image: url(<?php echo $urlImg; ?>);"></div>
</div><!-- .slide -->