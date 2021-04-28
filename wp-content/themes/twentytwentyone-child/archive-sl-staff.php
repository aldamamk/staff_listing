<?php
/**
 * The template for displaying archive staff pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_TWD_theme
 */

get_header();
?>
    <section class="banner-section">
        <div class="banner-image staff-banner"></div>
        <h1> Meet Our Team </h1>
    </section>
    
    <div class="flex">

        <?php
            $taxonomy = 'sl-staff-categories';
            $terms = get_terms(
                array(
                    'taxonomy' => $taxonomy
                )
            );
            if ( $terms && !is_wp_error($terms) ) : 
                foreach ( $terms as $term ) :
                    $term_args = array(
                        'post_type'      => 'sl-staff',
                        'posts_per_page' => -1,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => $taxonomy,
                                'field'    => 'slug',
                                'terms'    => $term->slug,
                            )
                        ),
                    );
                    $term_query = new WP_Query( $term_args );
                    if ( $term_query->have_posts() ) : ?>

                        <section class="staff-section">
                            <a href="<?php echo get_term_link($term) ?>">
                                <h2><?php echo $term->name; ?></h2>
                            </a>
                        </section>
                
                        <?php wp_reset_postdata();
                    endif;
                endforeach;
            endif; ?>
     </div>
<?php
get_footer();
