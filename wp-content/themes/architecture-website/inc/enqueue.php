<?php 

/*
	@package architecture-website-theme

	==============================
		ADMIN ENQUEUE FUNCTIONS
	==============================
*/


//CSS for a custom theme in Wordpress dashboard
function architecture_load_admin_scripts( $hook ) {
	//echo $hook;

	//Admin font
	wp_register_style( 'raleway-admin', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500' );

	//ADMIN-CSS register css admin section
	wp_register_style( 'architecture_admin', get_template_directory_uri() . '/assets/admin-css/architecture.admin.css', array(), '1.0.0', 'all' );
		wp_enqueue_style( 'architecture_admin' );
	
	//ADMIN-JS register js admin section
	//wp_register_script( 'architecture-admin-script', get_template_directory_uri() . '/assets/admin-js/architecture.admin.js', array('jquery'), '1.0.0', true );

	$pages_array  = array(
		'toplevel_page_architecture_website',
		'architecture_page_website_theme',
		'architecture_page_website_theme_contact',
		'architecture_page_architecture_website_css'
	);

	//Limit usage to apply one style on the specific wordpress dasboard panel page need to apply variable $hook in function.
	//if('toplevel_page_architecture_website' == $hook) {//toplevel_page_architecture_website - copied from admin panel architecture -> General

	if (in_array($hook, $pages_array) ) {
		wp_enqueue_style( 'raleway-admin' );
		wp_enqueue_style( 'architecture_admin');
	}

	if('toplevel_page_architecture_website' == $hook){
		wp_enqueue_media();//built in function that automatically handle calling and activation process of all the scripts and all the source code that needs for use of media uploader
		wp_enqueue_script( 'architecture-admin-script' );
	}

	//ACE
	if('architecture_page_architecture_website_css' == $hook){
 
		wp_enqueue_style( 'raleway-admin' );
		wp_enqueue_style( 'architecture_admin');

		wp_enqueue_style( 'ace', get_template_directory_uri() . '/assets/admin-css/architecture.ace.css', array(), '1.0.0', 'all' );//downloaded from https://ace.c9.io/#nav=embedding site to insert code editor to a website.

		wp_enqueue_script( 'ace', get_template_directory_uri() . '/assets/admin-js/ace/ace.js', array('jquery'), '', true );//1.2.1 using just wp_enqueue_script function instead of using wp_register_style and then wp_enqueue_style.
		wp_enqueue_script( 'architecture-custom-css-script', get_template_directory_uri() . '/assets/admin-js/architecture.custom_css.js', array('jquery'), '1.0.0', true );
	}

}

//Just for printing in admin panel instead of everywhere. enqueue - 
add_action( 'admin_enqueue_scripts', 'architecture_load_admin_scripts' );


/*
	==============================
		FRONT-END ENQUEUE FUNCTIONS
	==============================
*/

function architecture_load_scripts(){
		//css
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.1.1', 'all' ); //bootstrap.min.css version 
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css.map', array(), '4.1.1', 'all' ); //bootstrap.min.css.map 
	wp_enqueue_style('architecture-website', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0', 'all');
	wp_enqueue_style ('fontawesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.css', array(), '5.1.0', 'all'); 

	//fonts (Part 15 - WordPress Theme Development)
/*	
	wp_enqueue_style( 'playfair', 'https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' );//activate in sass -> main.css -> font-family: 'Playfair', Arial, Verdana, sans-serif; 
*/   

// font-family: 'oswald', sans-serif;
// font-family: Roboto;
// font: 400 1em/50px "FontAwesome";

		//js
	//wp_deregister_script( 'jquery' );//takes of the script from the head
	wp_enqueue_script('jqueryjs', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '', true); // 1.11.3
	wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '', true); //popper.min.js 4.1.1
	wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js.map', array('jquery'), '', true); //popper.min.js.map 4.1.1
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '', true);//4.1.1
	wp_enqueue_script('customjs', get_template_directory_uri() . '/assets/js/main-jquery.js', array('jquery'), '1.0.0', true);
}

add_action( 'wp_enqueue_scripts', 'architecture_load_scripts' );