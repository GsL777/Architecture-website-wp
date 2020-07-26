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

			<?php echo social_btn();//function in theme-support.php ?><!-- .socials -->

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
						<p class="text-center copyright-text">Copyright &copy; 2019 - <?php echo year();//function in theme-support.php ?><!-- .socials -->
						</p>
					</div><!-- .col-lg-12 -->
				</div><!-- .row -->
			</div><!-- .container -->
		</footer>

	<?php wp_footer(); ?>

	</body>
</html>