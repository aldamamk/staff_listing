<?php
/**
 * The template for displaying  home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

/* Start the Loop */
if ( have_posts() ) : ?>

    <section class="home-container"> 

        <div class="home-banner"> <?php the_post_thumbnail(); ?> </div>
        <h1> <?php the_title(); ?> </h1>
        <p> <?php the_content(); ?> </p>
        
    </section>
    
<?php
endif; //Endif.

get_footer();
