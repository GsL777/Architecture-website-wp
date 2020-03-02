<?php 

/*
@package architecture-website-theme

	=====================
		ADMIN PAGE
	=====================
*/


function architecture_add_admin_page(){

	//Generate Architecture Website Admin Page
	add_menu_page('Architecture Website Theme Options', 'Architecture', 'manage_options', 'architecture_website', 'architecture_theme_create_page', 'dashicons-editor-unlink', 110);//First parameter - Page title. Second parameter - menu title. Third parameter - Capability(capability to display options to specific users). Fourth parameter - menu slug(parameter that appears in the navigation bar to avoid errors). Fifth parameter - a function name. Sixth parameter - icon url(wordpress premade icons in https://developer.wordpress.org/resource/dashicons/#art) Need to choose the icon and paste the icon name to the Sixth parameter place. Seventh parameter - the position of a menu that specifies a location.

	//Generate Architecture Admin Sub Pages
	//architecture Theme Options
	add_submenu_page('architecture_website', 'Architecture Theme Options', 'Theme Options', 'manage_options', 'architecture_website', 'architecture_theme_create_page');

	//Architecture Contact Form Options
	add_submenu_page('architecture_website', 'Architecture Contact Form', 'Contact Form', 'manage_options', 'architecture_website_theme_contact', 'architecture_contact_form_page');

	//Architecture CSS Options
	add_submenu_page('architecture_website', 'Architecture CSS Options', 'Custom CSS', 'manage_options', 'architecture_website_css', 'architecture_theme_settings_page');

}

add_action('admin_menu', 'architecture_add_admin_page');//Activate this function. First value - when to trigger this function (in this case during the generation of admin_menu). Second value - the name of the function that must be triggered.

//Activate custom settings
add_action( 'admin_init', 'architecture_custom_settings' );//adding into architecture_add_admin_page, because of the safety precautions


//Activate custom settings
function architecture_custom_settings(){

	//Theme Support Options
	register_setting('architecture-theme-support', 'post_formats');

	add_settings_section( 'architecture-theme-options', 'Theme Options', 'architecture_theme_options', 'architecture_website_theme' );

	add_settings_field( 'post_formats', 'Post Formats', 'architecture_post_formats', 'architecture_website_theme', 'architecture-theme-options' );

/*
	//Custom Header in Theme Support Options
	register_setting('architecture-theme-support', 'custom_header');	

	add_settings_field('custom-header', 'Custom Header', 'architecture_custom_header', 'architecture_website_theme', 'architecture-theme-options');
*/

	//Custom Background in Theme Support Options
	register_setting('architecture-theme-support', 'custom_background');
	
	add_settings_field('custom-background', 'Custom Background', 'architecture_custom_background', 'architecture_website_theme', 'architecture-theme-options');


	//Contact Form Options
	register_setting( 'architecture-contact-options', 'activate_contact' );//architecture-contact-form.php and custom-post-type.php files.

	add_settings_section( 'architecture-contact-section', 'Contact Form', 'architecture_contact_section', 'architecture_website_theme_contact' );

	add_settings_field( 'activate-form', 'Activate Contact Form', 'architecture_activate_contact', 'architecture_website_theme_contact', 'architecture-contact-section' );

	//Custom CSS Options
	register_setting( 'architecture-custom-css-options', 'website_css', 'architecture_sanitize_custom_css');//architecture-custom-css.php
	//PUT IN header.php that it will be displayed and will work.

	add_settings_section( 'architecture-custom-css-section', 'Custom CSS', 'architecture_custom_css_section_callback', 'architecture_website_css' ); //architecture_website_css - from function architecture_add_admin_page(), //architecture CSS Options section.
	//architecture-custom-css.php

	add_settings_field( 'custom-css', 'Insert your Custom CSS', 'architecture_custom_css_callback', 'architecture_website_css', 'architecture-custom-css-section' );
}


//Post Formats
function architecture_post_formats(){
	$options =  get_option( 'post_formats' );
	$formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
	$output = '';
	foreach ($formats as $format){
		$checked = ( @$options[$format] == 1 ? 'checked' : '');//@ - means if this variable exists
		$output .= '<label><input type="checkbox" id="' . $format . '" name="post_formats['.$format.']" value="1" '. $checked .' />' . $format . '</label><br>';
	}
	echo $output;//in a callback function for specific settings field have to echo
}//dashboard -> architecture -> Theme Options to turn on or off in POSTS -> All posts -> Find post


/*
function architecture_custom_header(){
	$options = get_option( 'custom_header' );
	$output = '';

	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' /> Activate the Custom Header</label>';
}//Activate a theme support in inc -> theme-support.php file
*/


function architecture_custom_background(){
	$options = get_option( 'custom_background' );
	$output = '';

	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' /> Activate the Custom Background</label>';
}//Activate a theme support in inc -> theme-support.php file



//Architecture Theme Options
function architecture_theme_options(){
	echo 'Activate and Deactivate specific Theme Support Options';
}


//Contact Options Functions
function architecture_contact_section(){
	echo 'Activate and Deactivate the Built-in Contact Form';
}

//Custom Contact Form
function architecture_activate_contact(){//variables from function architecture_custom_settings Theme Support Options
	$options =  get_option( 'activate_contact' );
	$checked = ( @$options == 1 ? 'checked' : '');

	echo '<label><input type="checkbox" id="activate_contact" name="activate_contact" value="1" '. $checked .' /></label>';
}//Appears in WP dashboard -> architecture


//Architecture CSS Info
function architecture_custom_css_section_callback(){
	echo 'Customize Architecture Theme with your own CSS';
}

//Architecture CSS Options
function architecture_custom_css_callback(){
	$css = get_option( 'website_css' );
	$css = ( empty($css) ? '/* Architecture Theme Custom CSS */' : $css );
	//echo '<textarea placeholder="Sunset Custom Css" >'.$css.'</textarea>';
	echo '<div id="customCss">'.$css.'</div><textarea id="website_css" name="website_css" style="display:none;visibility:hidden;">'.$css.'</textarea>';
}//div id must be the same as in admin-js -> architecture.custom_css.js in ace.edit() section.
//Contact CSS Options

//Architecture CSS Sanitization
function architecture_sanitize_custom_css ($input){//Custom CSS Options,register_setting Third parameter.
	//$output = esc_textarea( $input );//sanitize an input. Function incodes all the information in database. //sanitize the input of textarea
	$output = sanitize_textarea_field( $input );//UPDATE FOR esc_textarea($input);
	return $output;
}


//Template submenu functions
function architecture_theme_create_page(){ //the same name as Fifth Value in function architecture_add_admin_page().
	//echo '<h1>architecture Theme Options</h1>';
	require_once( get_template_directory() . '/inc/templates/architecture-admin.php' );
}

//Architecture Contact Options
function architecture_contact_form_page(){
	require_once( get_template_directory() . '/inc/templates/architecture-contact-form.php' );
}

//Architecture CSS Options
function architecture_theme_settings_page() {
	require_once( get_template_directory() . '/inc/templates/architecture-custom-css.php' );
}