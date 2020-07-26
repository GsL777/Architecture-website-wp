	<div class="card">
		<img class="card-img-top" src="" alt="">
		<div class="card-body">
			<?php the_title('<h5 class="card-title">','</h5>'); ?><!-- <h5 class="card-title">Basic Plan</h5> -->
			<?php the_content('<p class="card-text">','</p>'); ?>
		</div><!-- .card-body -->
		<div class="card-footer text-center">
			<?php the_excerpt(); ?>
		</div><!-- .card-footer -->
	</div><!-- .card -->