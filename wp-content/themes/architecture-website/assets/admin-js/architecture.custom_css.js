jQuery(document).ready(function($){
//IMPLEMENTING ACE
	var updateCSS = function(){
		$("#website_css").val( editor.getSession().getValue() );
	}//#website_css taken from function-admin.php function architecture_custom_css_callback()

	$("#save-custom-css-form").submit( updateCSS );//from architecture-custom-css.php id="". And call the var updateCSS.
});

var editor = ace.edit("customCss");
editor.setTheme("ace/theme/monokai");//WP DASHBOARD ARCHITECTURE CUSTOM CSS themes from assets/admin-js -> ace
editor.getSession().setMode("ace/mode/css");
//architecture.custom_css.js, enqueue.php, architecture-custom-css.php