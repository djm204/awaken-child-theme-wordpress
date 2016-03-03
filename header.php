<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Awaken
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'awaken' ); ?></a>
    <?php if ( has_nav_menu( 'top_navigation' ) || get_theme_mod( 'display_social_icons', false ) ) : ?>	
		<div class="top-nav" >
			<div class="fluid-container">
				<div class="row">
					<?php is_rtl() ? $rtl = 'awaken-rtl' : $rtl = ''; ?>
					<div class="col-xs-12 col-sm-12 col-md-12 <?php echo $rtl; ?>">
						<?php if ( has_nav_menu( 'top_navigation' ) ) : ?>
							<nav id="top-navigation " class="top-navigation" role="navigation">
								<?php wp_nav_menu( array( 'theme_location' => 'top_navigation' ) ); ?>
                                <?php awaken_socialmedia(); ?>			
                                
							</nav><!-- #site-navigation -->	
                            <div class="awaken-search-button-icon"></div>
                            <div class="awaken-search-box-container">
                                <div class="awaken-search-box">
                                    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" id="awaken-search-form" method="get">
                                        <input type="text" value="" name="s" id="s" />
                                        <input type="submit" value="<?php _e( 'Search', 'awaken' ); ?>" />
                                    </form>
                                </div><!-- th-search-box -->
                            </div><!-- .th-search-box-container -->
							<a href="#" class="navbutton" id="top-nav-button"><?php _e( 'Top Menu', 'awaken' ); ?></a>
							<div class="responsive-topnav"></div>
						<?php endif; ?>
					</div><!-- col-xs-12 col-sm-6 col-md-8 -->
					<div class="col-xs-12 col-sm-6 col-md-4">
						
					</div><!-- col-xs-12 col-sm-6 col-md-4 -->
				</div><!-- row -->
			</div><!-- .container -->
		</div>
	<?php endif; ?>
    
    <?php if(is_front_page()) :?>
	<header id="masthead" class="site-header " role="banner">
		
	

	<div class="site-branding wow fadeIn" data-wow-delay="0.7s">
		<div class="fluid-container">
			<div class="site-brand-container">
				<?php  
					
					$logo = get_theme_mod( 'site_logo', '' );
					$title_option = get_theme_mod( 'site_title_option', 'text-only' );

					if ( $title_option == 'logo-only' && ! empty($logo) ) { ?>
						<div class="site-logo wow bounceInDown" data-wow-delay="0.7s">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="img-responsive src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
						</div>
					<?php } 

					if ( $title_option == 'text-logo' && ! empty($logo) ) { ?>
						<div class="site-logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
						</div>
						<div class="site-title-text">
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						</div>
					<?php } 

					if ( $title_option == 'text-only' ) { ?>
						<div class="site-title-text">
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						</div>
				<?php } ?>
			</div><!-- .site-brand-container -->
		</div>
        
	</div>

	</header><!-- #masthead -->
    <?php endif ?>
	<div id="content" class="site-content">
		<div class="fluid-container">
<script>function init() {
    window.addEventListener('scroll', function(e){
        var distanceY = window.pageYOffset || document.documentElement.scrollTop,
            shrinkOn = 300,
            header = document.querySelector("header");
        if (distanceY > shrinkOn) {
            classie.add(header,"smaller");
        } else {
            if (classie.has(header,"smaller")) {
                classie.remove(header,"smaller");
            }
        }
    });
}
window.onload = init();</script>
	<?php 
		/*if ( is_front_page() ) {
			if ( get_theme_mod( 'display_slider', 1 ) == '1' ) {
				awaken_featured_posts();
			}
		}*/
	?>