<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}


function awaken_child_widgets_init() {
	register_sidebar( array(
		'name'          =>  'Top-left-frontpage',
		'id'            => 'top-left-frontpage',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title-container"><h1 class="widget-title">',
		'after_title'   => '</h1></div>',
	) );
    
    register_sidebar( array(
		'name'          =>  'Program-Info-1',
		'id'            => 'program-info-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title-container"><h1 class="widget-title">',
		'after_title'   => '</h1></div>',
	) );
    
    
    register_sidebar( array(
		'name'          =>  'Program-Info-2',
		'id'            => 'program-info-2',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title-container"><h1 class="widget-title">',
		'after_title'   => '</h1></div>',
	) );
    
    
    register_sidebar( array(
		'name'          =>  'Program-Info-3',
		'id'            => 'program-info-3',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title-container"><h1 class="widget-title">',
		'after_title'   => '</h1></div>',
	) );
    
    
    
}
add_action( 'widgets_init', 'awaken_child_widgets_init' );


function awaken_child_scripts() {
    
    wp_enqueue_style( 'animate.css', get_stylesheet_directory_uri() . '/css/animate.css', array(), 'all' );

    
    wp_register_script( 'add-classie-js', get_stylesheet_directory_uri() . '/js/classie.js', array(), '', true );
	wp_enqueue_script( 'add-classie-js' );    
    
    wp_register_script( 'add-wow-js', get_stylesheet_directory_uri() . '/js/wow.min.js', array(), '', true );
	wp_enqueue_script( 'add-wow-js' );   
    

}
add_action( 'wp_enqueue_scripts', 'awaken_child_scripts' );

require get_stylesheet_directory() . '/inc/widgets/photo-widget.php';
require get_stylesheet_directory() . '/inc/widgets/contact-widget.php';
require get_stylesheet_directory() . '/inc/widgets/upcoming-events-widget.php';
require get_stylesheet_directory() . '/inc/widgets/featured-photos-widget.php';
require get_stylesheet_directory() . '/inc/widgets/programs-and-registration-widget.php';
require get_stylesheet_directory() . '/inc/widgets/become-a-member-widget.php';
require get_stylesheet_directory() . '/inc/widgets/image-picker.php';






?>