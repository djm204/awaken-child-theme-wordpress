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

class description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '<strong>';
           $append = '</strong>';
           $description  = ! empty( $item->description ) ? '<span>'.$args.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
            }
}




?>