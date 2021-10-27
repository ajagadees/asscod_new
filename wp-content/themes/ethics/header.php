<?php 
/**
 * The header for our theme.
 * @package ethics
 */
?>
<!DOCTYPE html>
	<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<?php wp_head(); ?>
	</head> 
	<body <?php body_class(); ?>>
		<div class="wrapper-area">
			<!-- Header Area Start Here -->
			<header>
				<div class="header-style1-area">
					<?php 
						$ethics_header_section = get_theme_mod('ethics_header_section_hideshow' , 'show');
						if ($ethics_header_section =='show') {  
							$ethics_header_phone_value = get_theme_mod('ethics_header_phone_value');
							$ethics_header_address_value = get_theme_mod('ethics_header_address_value');  
							$ethics_header_email_value = get_theme_mod('ethics_header_email_value');
							$ethics_header_button_value = get_theme_mod('ethics_header_button_value');
							$ethics_header_btnurl = get_theme_mod('ethics_header_btnurl');
						?>
					<div class="header-top-area">
						<div class="container">						
							<div class="row">
								<div class="col-lg-8 col-md-9 col-sm-12 col-xs-6">
									<div class="header-top-left">
										<ul>
											<?php if (!empty($ethics_header_phone_value)) { ?>
												<li><i class="fa fa-phone" aria-hidden="true"></i><a><?php echo esc_html__( 'Call :', 'ethics' ); ?> <?php echo esc_html($ethics_header_phone_value);  ?></a></li>
											<?php } if (!empty($ethics_header_email_value)) { ?>
												<li><i class="fa fa-envelope" aria-hidden="true"></i><a><?php echo esc_html($ethics_header_email_value);  ?></a></li>
											<?php } if (!empty($ethics_header_address_value)) { ?>
												<li><i class="fa fa-map-marker" aria-hidden="true"></i><a><?php echo esc_html($ethics_header_address_value);  ?></a></li>
											<?php } ?>
										</ul>
									</div>
								</div>
								<?php if (!empty($ethics_header_button_value)) { ?>
								<div class="col-lg-4 col-md-3 hidden-sm hidden-xs">
									<div class="header-top-right">
										<ul>
											<li><a href="<?php echo esc_url($ethics_header_btnurl); ?>" class="qoute-btn"><?php echo esc_html($ethics_header_button_value); ?></a></li>

										</ul>
									</div>
								</div>
								<?php } ?>
							</div>						
						</div>
					</div>
					<?php } ?>
					<div class="main-header-area" id="sticker">
						<div class="container">
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<div class="logo-area">
										<?php if (has_custom_logo()) : ?> 
											<span><?php the_custom_logo(); ?></span>
								 		<?php endif; ?>
								 	</div>
							 		<?php
									if (display_header_text()==true){ ?>
										<div class="logo-area text-logo">
											<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'title' ); ?><span><?php bloginfo( 'description' ); ?> </span></a>
										</div>							
									<?php } ?>								
								</div>
								<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
									<div class="main-menu-area">
										<nav>
											<?php wp_nav_menu( array
												(
													'menu'              => 'primary',
													'container'        => 'ul', 
													'theme_location'    => 'primary', 
													'menu_class'        => 'menu', 
													'items_wrap'        => '<ul>%3$s</ul>',
													'fallback_cb'       => 'ethics_wp_bootstrap_navwalker::fallback',
													'walker'            => new ethics_wp_bootstrap_navwalker()
												)); 
											?>
										</nav>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Mobile Menu Area Start -->
					<div class="mobile-menu-area">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="mobile-menu">
										<nav id="dropdown">
											<?php wp_nav_menu( array
												(
													'menu'              => 'primary',
													'container'        => 'ul', 
													'theme_location'    => 'primary', 
													'menu_class'        => 'menu', 
													'items_wrap'        => '<ul>%3$s</ul>',
													'fallback_cb'       => 'ethics_wp_bootstrap_navwalker::fallback',
													'walker'            => new ethics_wp_bootstrap_navwalker()
												)); 
											?>
										</nav>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Mobile Menu Area End -->
				</div>
			</header>