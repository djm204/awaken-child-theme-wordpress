<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}


function awaken_child_widgets_init() {
	register_sidebar( array(
		'name'          =>  'Widgetized Area',
		'id'            => 'This is a widgetized area',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title-container"><h1 class="widget-title">',
		'after_title'   => '</h1></div>',
	) );
}
add_action( 'widgets_init', 'awaken_child_widgets_init' );

require get_stylesheet_directory() . '/inc/widgets/test-widget.php';

?>