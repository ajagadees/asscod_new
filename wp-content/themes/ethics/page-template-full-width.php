<?php
/**
 * Template Name: Full-width Page Template, No Sidebar
 *
 * Description: Use this page template to remove the sidebar from any page.
 * @package ethics
 */
get_header(); ethics_breadcrumbs(); ?>    
    <!-- Page News Area Start Here -->
        <div class="page-news-details-area page-content section-space-b-less-30 bg-gray">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                            if(has_post_thumbnail()) : 
                            the_post_thumbnail(); 
                            endif; 
                        ?>
                            <div class="content">
                                <?php the_content();
                                    wp_link_pages( array(
                                        'before' => '<div class="page-links">' . esc_html__( 'Pages: ', 'ethics' ),
                                        'after'  => '</div>',
                                    ) );
                                ?>
                            </div>
                            <?php                                
                                endwhile; else :
                                   get_template_part( 'content-parts/content', 'none' );
                                endif; 
                                if ( comments_open() || get_comments_number() ) :
                                        comments_template();
                                endif; 
                            ?> 
                    </div>
                </div>
            </div>
        </div>
    <?php get_footer(); ?>