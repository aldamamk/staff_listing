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

        <div class="home-banner section"> <?php the_post_thumbnail(); ?> </div>
        <div class="home-text-content">
            <h1 id="h1"> <?php the_title(); ?> </h1>
            <?php the_content(); ?> 
        </div>
        
        
    </section>
    
<?php
endif; //Endif.

get_footer();
