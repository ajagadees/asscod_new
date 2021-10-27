<?php if( !function_exists('ethics_breadcrumbs') ): function ethics_breadcrumbs() { ?>
    <div class="header-bennar-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="header-bennar-left">
                        <?php if (is_home() || is_front_page()) { ?>            
                            <h2 class="sub-title"><?php wp_title(''); ?></h2>
                        <?php } else { ?>
                            <h2 class="sub-title"><?php the_title(''); ?></h2>
                        <?php } ?> 
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
<?php } endif;