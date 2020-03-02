<?php
/*
	This is the template for the footer

	@package architecture-website-theme
*/
?>

		<div id="cookie">
			<div id="cookie-close">x</div>
			This website is using cookies. <a href="#" target="_blank">More info</a>. <a class="cookie-agree">I agree</a>
		</div><!-- #cookie -->

		<footer class="footer" style="background-image: url(http://localhost/Architecture-website/wp-content/themes/architecture-website/assets/img/house-beside-body-water.jpg);">
			<div class="container-fluid">

			<?php 
				// $title = get_the_title();
				// $permalink = get_permalink();

				$facebook = 'https://www.facebook.com/login/';
				// $facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . $permalink;
				// $google = 'https://plus.google.com/share?url=' . $permalink;
				$twitter = 'https://twitter.com/login';
				$linkedin = 'https://www.linkedin.com/login';
			?>

			    <div class="col-md-12 col-sm-12 col-xs-12">
			        <ul class="text-center social-icons">
			          <li><a class="facebook" href="<?php echo $facebook; ?>" target="_blank" rel="nofollow"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			          <li><a class="twitter" href="<?php echo $twitter; ?>" target="_blank" rel="nofollow"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			          <li><a class="linkedin" href="<?php echo $linkedin; ?>" target="_blank" rel="nofollow"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
			        </ul>
			    </div><!-- .col-md-12 -->


		        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		        	<?php 
						wp_nav_menu(
							array(
								'theme_location'	=> 'secondary',//theme_location - has to be the same name as specified in functions.php (register_nav_menu (first value - string $location)).
								'menu_class'		=> 'footer-links'
							) 
						);
					?>
				</div><!-- .col-md-12 -->

				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php 
							date_default_timezone_set('Europe/Vilnius'); 
							$this_year = date('Y');
						?>
						<p class="text-center copyright-text">Copyright &copy; 2019 - <?php echo $this_year; ?>
						</p>
					</div><!-- .col-lg-12 -->
		        </div><!-- .row -->
			</div><!-- .container -->
		</footer>

	<?php wp_footer(); ?>

	</body>
</html>