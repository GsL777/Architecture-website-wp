<!-- Custom Architecture Theme Support on WordPress dashboard-->
<h1>Architecture Theme Support</h1>

<?php settings_errors();//function that will print an error ?>

<form method="post" action="options.php" class="architecture-general-form">
	<?php settings_fields( 'architecture-theme-support' ); ?>
	<?php do_settings_sections('architecture_website_theme');?>
	<?php submit_button(); ?>
</form>