<article id="post-<?php the_ID(); ?>" class="<?php post_class(); ?>">
	<?php the_title('<h1 class="text-center"><b>','</b></h1>'); ?>
	<?php the_content('<p class="text-center">','</p>'); ?>
	<em><h6 class="text-center"><?php the_excerpt(); ?></h6></em>
</article>