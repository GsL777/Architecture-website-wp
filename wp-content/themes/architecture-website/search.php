<?php get_header(); ?>

<?php 
/*
1. Remove the old query in the search.php file.
2. get all the category, tag and custom taxonomy in array format. And loop every array and find matching name in these arrays. Then store the ids of the matched name in a separate array. 
3. Using wp_query, query all the posts (by tax query )with these matched ids. Then store the resulting post_ids in an array.
4. Now perform a default search_query and store all the ids in an array. 
5. Now we have got two arrays of  ids which is the result. 
6. Combine these two and remove duplicates. 
7. Now we will perform a last query and show all the posts (by post__in parameter of wp_query).
*/
 ?>

<?php
    $search = get_search_query();
    $all_categories = get_terms( 
        array('taxonomy' => 'category',
            'hide_empty' => true
        ) 
    ); 
    $all_tags = get_terms( 
        array('taxonomy' => 'post_tag',
            'hide_empty' => true
        ) 
    );

    //if you have any custom taxonomy
    $all_custom_taxonomy = get_terms( 
        array(
            'taxonomy' => 'your-taxonomy-slug',
            'hide_empty' => true
        ) 
    );

    $mcat = array();
    $mtag = array();
    $mcustom_taxonomy = array();

    foreach($all_categories as $all):
        $par=$all->name;
        if (strpos($par, $search) !== false):
            array_push($mcat,$all->term_id);
        endif;
    endforeach;

    foreach($all_tags as $all):
        $par=$all->name;
        if (strpos($par, $search) !== false):
            array_push($mtag,$all->term_id);
        endif;
    endforeach;

    foreach($all_custom_taxonomy as $all):
        $par=$all->name;
        if (strpos($par, $search) !== false) :
            array_push($mcustom_taxonomy,$all->term_id);
        endif;
    endforeach;

    $matched_posts = array();
    $args1= array( 
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'tax_query' =>array(
            'relation' => 'OR',
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' =>$mcat
            ),
            array('taxonomy' => 'post_tag',
                'field' => 'term_id',
                'terms' => $mtag
            ),
            array('taxonomy' => 'custom_taxonomy',
                'field' => 'term_id',
                'terms' =>$mcustom_taxonomy
            )
        )
    );

    $the_query = new WP_Query( $args1 );
    if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) :
            $the_query->the_post();
            array_push($matched_posts,get_the_id());
        //echo '<li>' . get_the_id() . '</li>';
        endwhile;
        wp_reset_postdata();
    else:

    endif;
?>

<?php
    //The normal wordpress search
    $query2 = new WP_Query( 
        array( 
            's' => $search,
            'posts_per_page' => -1 
        )
    );
    if ( $query2->have_posts() ) :
        while ( $query2->have_posts() ) :
            $query2->the_post();
            array_push($matched_posts,get_the_id());
        endwhile;
        wp_reset_postdata();
    else:

    endif;
    $matched_posts = array_unique($matched_posts);
    $matched_posts = array_values(array_filter($matched_posts));
    //print_r($matched_posts);
?>

<?php
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $query3 = new WP_Query( 
        array( 
            'post_type'=>'any',
            'post__in' => $matched_posts,
            'paged' => $paged
        ) 
    );

    if ( $query3->have_posts() ) :
        while ( $query3->have_posts() ) :
        $query3->the_post();
        // get_template_part( 'template-parts/content/content', 'excerpt' );
?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('search-class'); ?>>
                <div class="container">

                <?php if( has_post_thumbnail() ): ?>
                    <?php if( has_post_thumbnail() ):
                            $urlImg = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
                        endif; 
                    ?>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <header class="entry-header">
                            <?php
                            if ( is_sticky() && is_home() && ! is_paged() ) {
                                printf( '<span class="search-post">%s</span>', _x( 'Featured', 'post', 'architecture-website' ) );
                            }
                            the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
                            ?>
                        </header><!-- .entry-header -->

                        <div class="search-image" style="background-image: url(<?php echo $urlImg; ?>);"></div>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div><!-- .entry-content -->
                    </div><!-- .col-lg-12 -->

                <?php else: ?>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <header class="entry-header">
                            <?php
                                if ( is_sticky() && is_home() && ! is_paged() ) {
                                    printf( '<span class="search-post">%s</span>', _x( 'Featured', 'post', 'architecture-website' ) );
                                }
                                the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
                            ?>
                        </header><!-- .entry-header -->

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div><!-- .entry-content -->
                    </div><!-- .col-lg-12 -->

                <?php endif; ?>

                </div><!-- .container -->
            </article>

<?php
        endwhile;
            architecture_post_navigation();

            wp_reset_postdata();
        else:
?>

        <section class="no-results not-found">

            <div class="container">
                <header class="page-header">
                    <h1 class="page-title"><?php _e( 'Nothing Found', 'architecture-website' ); ?></h1>
                </header><!-- .page-header -->

                <div class="page-content">
                    <?php
                        if ( is_home() && current_user_can( 'publish_posts' ) ) :

                            printf(
                                '<p>' . wp_kses(
                                    /* translators: 1: Link to WP admin new post page. */
                                    __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'architecture-website' ),
                                    array(
                                        'a' => array(
                                            'href' => array(),
                                        ),
                                    )
                                ) . '</p>',
                                esc_url( admin_url( 'post-new.php' ) )
                            );

                        elseif ( is_search() ) :
                    ?>

                        <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'architecture-website' ); ?></p>

                    <?php
                        else :
                    ?>

                            <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'architecture-website' ); ?></p>
                            <?php

                        endif;
                    ?>

                </div><!-- .container -->
            </div><!-- .page-content -->
        </section><!-- .no-results -->

<?php
    endif;
?>

<?php
/*
    global $query_string;
    $query_args = explode("&", $query_string);
    $search_query = array();

    foreach($query_args as $key => $string) {
        $query_split = explode("=", $string);
        $search_query[$query_split[0]] = urldecode($query_split[1]);
    }

    $the_query = new WP_Query($search_query);
        if ( $the_query->have_posts() ) : 
    ?>


    <ul>    
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </li>   
    <?php endwhile; ?>
    </ul>
    

    <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php 
        endif; 
*/
?>

<?php get_footer(); ?>