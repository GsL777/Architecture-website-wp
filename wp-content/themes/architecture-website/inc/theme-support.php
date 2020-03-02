<?php 

/*
	@package architecture-website-theme

	=============================
		THEME SUPPORT OPTIONS
	=============================
*/
//Architecture Theme Options START
//Activates all the post format in dasboard posts -> Format bar on the right. TO ACTIVATE POST FORMATS GO TO newly created ARCHITECTURE -> THEME OPTIONS -> select -> save changes and go to the posts.

/*
$options =  get_option( 'post_formats' );
$formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
$output = array();
foreach ($formats as $format){
	$output[] = ( @$options[$format] == 1 ? $format : '');
}

if( !empty($options) ){
	add_theme_support('post-formats', $output );
}
*/

//Simplified version of the code above. TO ACTIVATE POST FORMATS GO TO newly created ARCHITECTURE -> THEME OPTIONS -> select -> save changes and go to the posts.
$options = get_option('post_formats'); 
if (!empty($options)) { 
	add_theme_support('post-formats', array_keys($options));
}

/*
//Activating theme Options ARCHITECTURE->THEME OPTIONS
//Theme support Custom Header. Check the boxes in ARCHITECTURE -> Theme Options and it will appear in dashboard Appearance
$header =  get_option( 'custom_header' );//function architecture_custom_header function-admin.php 
if(@$header == 1) {
	add_theme_support('custom-header');
}
*/

//Theme support Custom Background. Check the boxes in ARCHITECTURE -> Theme Options and it will appear in dashboard Appearance
$background =  get_option( 'custom_background' );//function architecture_custom_background function-admin.php
if(@$background == 1) {
	add_theme_support('custom-background');
}
//Architecture Theme Options END


/*Activate the post thumbnails START*/
add_theme_support( 'post-thumbnails' );//post-thumbnails - Lets to set Featured Image in Wordpress dashboard -> Posts. Developing content.php
/*Activate the post thumbnails END*/


/*Activate Nav Menu Option in WP dashboard START*/
function architecture_register_nav_menu(){
	register_nav_menu( 'primary', 'Header Navigation Menu' );//First parameter - location unique name. For two word use _, but do not use -   . Second parameter - description. 
}//add a walker.php file and require in functions.php

add_action('after_setup_theme', 'architecture_register_nav_menu');//call an action to activate a function.
/*Activate Nav Menu Option END*/


/*Activate Footer navigation menu START*/
function architecture_theme_setup() {
	add_theme_support('menus'); //activatíng menu's writing a string 

	//register_nav_menu('primary', 'Primary Header Navigation'); //first value - string $location, second option - string $description
	register_nav_menu('secondary', 'Footer Navigation');
}
add_action('init', 'architecture_theme_setup'); //function to create the menus. Function is executed after the setup theme is triggered. Function will work 'after_setup_theme' or after the initialization 'init'
/*Activate Footer navigation menu END*/


/*
	==========================================
		 CUSTOM POST TYPE
	==========================================
*/

//CREATES NEW SECTION IN WORDPRESS DASHBOARD

function architecture_custom_post_type(){

	$labels = array(
		'name'					=> 'Solutions',
		'singular_name'			=> 'Solution',//singular name will be used in administration panel (dashboard)
		'add_new'				=> 'Add Item',//buttons name 
		'all_items'				=> 'All Items',//administration labels
		'add_new_item'			=> 'Add Item',
		'edit_item'				=> 'Edit Item',
		'new_item'				=> 'New Item',
		'view_item'				=> 'View Item',
		'search_item'			=> 'Search solutions',
		'not_found'				=> 'No items found',
		'not_found_in_trash'	=> 'No items found in trash',
		'parent_item_colon'		=> 'Parent Item'
	);

	$args = array(
		'labels'				=> $labels,
		'public'				=> true,
		'has_archive'			=> true,
		'publicly_queryable'	=> true,
		'query_var'				=> true,
		'rewrite'				=> true,
		'capability_type'		=> 'post',
		'hierarchical'			=> false,
		'supports'				=> array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revision' //revision - automatically save previous version in database so we could rehover different versions of that specific post type.
		), //type of support - are all the standart information that is found inside a post of a page (the title, the excerpt, thumbnail, custom fields...).
		/*'taxonomies'			=> array( //it will be shown on the WP dashboard new created custom post type
			'category',
			'post_tag'
		),*/
		'menu_position'			=> 5,
		'exclude_from_search'	=> false
	);

	register_post_type('solutions', $args);//First value - the slug(name of solutions). Second value - contains all the arguments of the created post type.

}

add_action('init', 'architecture_custom_post_type');

/*
	==========================================
		 CUSTOM TAXONOMY
	==========================================
*/

function architecture_custom_taxonomies(){//After adding taxonomies link, do not forget to "refresh" the permalinks in WP dashboard (switch back to 'simple or regular' permalinks' go to page, refresh and clean the cache) otherwise your archive page for the custom Taxonomies will end up in a 404.!!!!!!!

	//First type of taxonomy.
	//add new taxonomy hierarchical
	$labels = array(
		'name'				=> 'Fields',//like a category in a WP dashboard -> post
		'singular_name'		=> 'Field',
		'search_items'		=> 'Search Fields',
		'all_items'			=> 'All Fields',
		'parent_item'		=> 'Parent Field',
		'parent_item_colon'	=> 'Parent Field:',
		'edit_item'			=> 'Edit Field',
		'update_item'		=> 'Update Field',
		'add_new_item'		=> 'Add New Field',
		'new_item_name'		=> 'New Field Name',
		'menu_name'			=> 'Field'
	);

	$args = array(
		'hierarchical'		=> true, 
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_admin_column'	=> true,
		'query_var'			=> true,
		'rewrite'			=> array( 'slug' => 'field' )//mysite.com/development. If the slug is rewtritten mysite.com/field/development

	);

	register_taxonomy('field', array('solutions'), $args);//First value - name of the taxonomy and it is better that it will match the slug (in this case type).//Second parameter - object type that gives the ability to specify which post type we whant to attach this custom taxonomy(in this case insert the same as in the register_post_type('solutions', $args); custom post type name).//Third value - the arguments that contains all the labels and all the parameters

	//Second type of taxonomy.
	//add new taxonomy NOT hierarchical

	register_taxonomy( 'design', 'solutions', array(
		'label'			=> 'Design',
		'rewrite'		=> array( 'slug' => 'design' ),
		'hierarchical'	=> false

	) );

}

add_action('init', 'architecture_custom_taxonomies');// when the new custom post type is created need a new single-solutions.php file in this case and in it need to change the_category(' '); and the_tags(); code to function, because it will not work.


/*
	==========================================
		SINGLE POST CUSTOM FUNCTIONS
	==========================================
*/

function architecture_post_navigation(){ //function putted to single.php to change the_post_navigation(); function.

	$nav = '<div class="row post-navigation">';

	$prev = get_previous_post_link( '<div class="post-link-nav"><i class="fa fa-angle-left"></i>%link<span class="architecture-icon architecture-prev-icon" aria-hidden="true"></div>', '%title' );//%link - WP shortcode to recognise that link is a placeholder to print the link in this location.
	$nav .= '<div class="col-xs-12 col-sm-6 text-left">' . $prev . '</div>';

	$next = get_next_post_link( '<div class="post-link-nav">%link<span class="architecture-icon architecture-next-icon" aria-hidden="true"><i class="fa fa-angle-right"></i></span></div>', '%title' );
	$nav .= '<div class="col-xs-12 col-sm-6 text-right">' . $next . '</div>';

	$nav .= '</div>';

	return $nav;
}


//function for testing CONTACT FORM email START
//FILES INCLUDE main-jquery.js, function.php(to add ajax.php), contact-form.php, ajax.php, shortcodes.php, custom-post-type.php, contact.scss 

//TURN OFF IF IT IS NOT IN USE
/*
function mailtrap($phpmailer) {//code in ajax.php function architecture_save_contact();
  $phpmailer->isSMTP();
  $phpmailer->Host = 'smtp.mailtrap.io';
  $phpmailer->SMTPAuth = true;
  $phpmailer->Port = 2525;
  $phpmailer->Username = '5ef4715c46507e';
  $phpmailer->Password = '4fa836c30aacff';
}

add_action('phpmailer_init', 'mailtrap');
//function for testing CONTACT FORM email END
*/

/* Initialize global Mobile Detect START 
function mobileDetectGlobal(){//CALL THE FUNCTION IN ALL THE CONTENT as example in content-image.php	global $detect;

	global $detect;
	$detect = new Mobile_Detect;
}

add_action('after_setup_theme', 'mobileDetectGlobal');//after_setup_theme - WordPress built in action 
/* Initialize global Mobile Detect END */

?>