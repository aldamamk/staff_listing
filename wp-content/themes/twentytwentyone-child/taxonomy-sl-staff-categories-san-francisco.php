<?php
/**
 * The template for displaying student designers pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_TWD_theme
 */

get_header();
?>
    <div class="wrapper-staff-cat">
    
        <?php   if ( have_posts() ) : ?>

            <section class="banner-section">
                <div class="banner-image"></div>
                <h1>Our <?php single_term_title();?> Team</h1>
            </section>

            <section class="staff-list">   
                <?php while(have_posts() ) :
                    the_post() ?>

                    <article class="staff-single-card">

                    <?php  the_post_thumbnail(); ?>

                        <h2> <?php the_title(); ?> </h2>
                            <p> <?php    
                                $position = get_field('position');
                                if($position) : 
                                echo $position; 
                                endif; ?> 
                            </p>
                    </article>

                    <?php
                        endwhile; 
                        
                        wp_reset_postdata();
                
                endif;?>
            </section>
    </div>
<?php
get_footer();
