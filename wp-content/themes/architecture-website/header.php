<?php
	/*
		This is the template for the header

		@package architecture-website-theme
	*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> >
	<head>
		<title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title><!-- To set a page title go to dashboard Settings -> General -> write in a Site Title a title. It can be seen with an inspect -->
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta charset="<?php bloginfo( 'charset' ); //print the bloginfo charset?>">
		<meta name="viewport" content="width=device-width, initial-scale=1"><!-- for responsive devices to print full screen -->
		<link rel="profile" href="http://gmpg.org/xfn/11"> <!-- necessary for html5 validation  -->
		<?php if( is_singular() && pings_open( get_queried_object() ) ): //check if this page is not an archive, search result or generic blog loop ?>
			<link rel="pingback" href="<?php bloginfo('pingback_url'); //pingback_url - for page to scale up on search engine result page (SERP)?>">
		<?php endif; ?>
		<?php wp_head(); ?>
	</head>

	<?php 
		//ON WORDPRESS DASHBOARD -> Architecture-website -> CUSTOM CSS a custom css code could be written
		$custom_css = esc_attr(get_option( 'website_css' ));//website_css - unique handler from function-admin.php //Custom CSS Options
		if(!empty($custom_css) ):
			echo '<style>' . $custom_css . '</style>';
		endif;
	?>

	<body <?php body_class(
		//body_class($architecture_classes);
		//array( 'architecture-class', 'my-class' )  //through an array we can insert class'es
	); //if we change page the class of the body will change and it's going to print a custom class based on the page. With this class there is an ability to style a page in a different way based on the content the user sees?>
	>

		<div class="nav"></div>
		<input type="checkbox" class="sidebar-menu-open" id="sidebar-menu-open">

		<label for="sidebar-menu-open" class="sidebar-toggle">
			<div class="spinner diagonal part-1"></div>
			<div class="spinner horizontal"></div>
			<div class="spinner diagonal part-2"></div>
		</label>

		<div id="sidebar-nav">
			<?php //theme-support.php function barber_register_nav_menu
				wp_nav_menu(
					array(
						'theme_location'	=> 'primary',
						'container'			=> false,
						'menu_class'		=> 'sidebar-nav-menu',
						'walker'			=> new Architecture_Walker_Nav_primary()
					)
				);
			?>

			<?php get_search_form(); ?>
		</div><!-- #sidebar-nav -->


		<header class="header-image">
			<div id="header-carousel" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner carousel-img" role="listbox">

					<div class="header-content">
						<h4><?php bloginfo( 'description' ); //prints info from WP Dashboard -> Settings -> General -> Tagline ?></h4>
						<h2><?php bloginfo( 'name' ); //prints info from WP Dashboard -> Settings -> General -> Site Title ?></h2> 
					</div><!-- .header-content -->

					<?php 
						$args_cat = array(
							'include' => '4'
						);

						$categories = get_categories($args_cat);
						$count = 0;
						$bullets = '';
						foreach($categories as $category):

							$args = array( 
								'type' => 'post',
								'posts_per_page' => 3,
								'order' => 'ASC',
								'category__in' => $category->term_id
							);

							$lastBlog = new WP_Query( $args ); 

							if( $lastBlog->have_posts() ):

								while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>

									<div class="carousel-item <?php if($count == 0): echo 'active'; endif; ?>">
								    	<?php 
								    	if( has_post_thumbnail() ):
											$urlImg = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
										endif; 
										?>
										<div class="header-images" style="background-image: url(<?php echo $urlImg; ?>);"></div><!-- .header-images -->
								    </div><!-- .carousel-item -->

								    <?php 
								    	$bullets .= '<li data-target="#header-carousel" data-slide-to="'.$count.'" class="circles'; 
								    	if($count == 0): $bullets .=' active'; endif; 
								    	$bullets .= '"></li>'; 

								$count++; 

								endwhile;
							endif;

							wp_reset_postdata();
						endforeach;
					?>
					
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<?php echo $bullets; ?>
					</ol>
				    
				</div><!-- .carousel-inner -->
			</div><!-- #header-carousel -->
		</header>