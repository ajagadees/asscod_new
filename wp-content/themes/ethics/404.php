<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package ethics
 */
get_header();  ?>

 <div class="header-bennar-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="header-bennar-left">
                        
                            <h2 class="sub-title"><?php wp_title(''); ?></h2>
                      
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="header-bennar-right">
                        <ul>
                           <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Home', 'ethics' ); ?></a> <?php echo esc_html__( '/', 'ethics' ); ?></li>
                           <li><?php wp_title(''); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>        
    <!-- Page Error Area Start Here -->
    <div class="page-error-area section-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="error-page">
                        <h1><?php echo esc_html__( '404', 'ethics' ); ?></h1>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-error-bottom">
                        <p><?php echo esc_html__( 'The page you are looking for was moved, removed, renamed or might never existed.', 'ethics' ); ?></p>
                        <p><?php echo esc_html__( 'Try going to Home Page by using the button below.', 'ethics' ); ?></p>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-error"><?php echo esc_html__( 'Go To Home Page', 'ethics' ); ?></a>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Error Area End Here -->
    <?php get_footer(); ?>  