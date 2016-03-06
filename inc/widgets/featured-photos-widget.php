<?php

/**
 * Displays latest, category wised posts in a 3 block layout.
 *
 */

class Desiratech_Featured_Photos_Widget extends WP_Widget {

	/* Register Widget with WordPress*/
	function __construct() {
		parent::__construct(
			'desiratech_featured_photos_widget', // Base ID
			__( 'Desiratech: Featured Photos Widget', 'awaken' ), // Name
			array( 'description' => __( 'Featured Photos Widget', 'awaken' ), ) // Args
		);
	}


	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */

	public function form( $instance ) {
		 //WIDGET BACK-END SETTINGS
      $instance = wp_parse_args((array) $instance, array());
          
      $links = [$instance['link1'], $instance['link2'], $instance['link3'], $instance['link4'], $instance['link5'], $instance['link6'], $instance['link7'],$instance['link8'], $instance['link9']  ];

      
      $images = new WP_Query( array( 'post_type' => 'attachment', 'post_status' => 'inherit', 'post_mime_type' => 'image' , 'posts_per_page' => -1 ) );
      if( $images->have_posts() ){ 
          $options = array();
            for( $i = 0; $i < 9; $i++ ) {
              $options[$i] = '';
              while( $images->have_posts() ) {
                  $images->the_post();
                  $img_src = wp_get_attachment_image_src(get_the_ID());
                  $the_link = $links[$i];
                  $options[$i] .= '<option value="' . $img_src[0] . '" ' . selected( $the_link, $img_src[0], false ) . '>' . get_the_title() . '</option>';
            } 
             ?>
                <select name="<?php echo $this->get_field_name( 'link'.$i ); ?>"><?php echo $options[$i]; ?></select><img src="<?= $links[$i] ?>" />
             
             <?php 
         } 
        
      } else {
            echo 'There are no images in the media library. Click <a href="' . admin_url('/media-new.php') . '" title="Add Images">here</a> to add some images';
      }

	}


	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
        
        foreach($instance as $key => $val){
            
            $instance[ $key ] = strip_tags( $new_instance[ $key ] );	
            
        }
		
        
		return $instance;
	}


	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	
    
    
	public function widget( $args, $instance ) {
		extract($args);

		 $link1 = ( empty($instance['link1']) ) ? 0 : $instance['link1'];
      $link2 = ( empty($instance['link2']) ) ? 0 : $instance['link2']; 
      $link3 = ( empty($instance['link3']) ) ? 0 : $instance['link3']; 
      $link4 = ( empty($instance['link4']) ) ? 0 : $instance['link4']; 
      $link5 = ( empty($instance['link5']) ) ? 0 : $instance['link5']; 
      $link6 = ( empty($instance['link6']) ) ? 0 : $instance['link6']; 
      $link7 = ( empty($instance['link7']) ) ? 0 : $instance['link7']; 
      $link8 = ( empty($instance['link8']) ) ? 0 : $instance['link8']; 
      $link9 = ( empty($instance['link9']) ) ? 0 : $instance['link9']; 
      
		echo $before_widget;
      ?>
      <div class="col-xs-12">
          <h3> Featured Photos</h3>
          <div class="thumb-wrapper">
        
       <!-- Display images --><?php 
      if( !( $link1 || $link2 ) ) {
          echo "Please configure this widget.";
      } else { 
          if($link1) { ?><div class="photo-gal-thumb"><img src="<?php echo $link1; ?>" alt=""></div><?php }
          if($link2) { ?><div class="photo-gal-thumb"><img src="<?php echo $link2; ?>" alt=""></div><?php }
          if($link3) { ?><div class="photo-gal-thumb"><img src="<?php echo $link3; ?>" alt=""></div><?php }
          if($link4) { ?><div class="photo-gal-thumb"><img src="<?php echo $link4; ?>" alt=""></div><?php }
          if($link5) { ?><div class="photo-gal-thumb"><img src="<?php echo $link5; ?>" alt=""></div><?php }
          if($link6) { ?><div class="photo-gal-thumb"><img src="<?php echo $link6; ?>" alt=""></div><?php }
          if($link7) { ?><div class="photo-gal-thumb"><img src="<?php echo $link7; ?>" alt=""></div><?php }
          if($link8) { ?><div class="photo-gal-thumb"><img src="<?php echo $link8; ?>" alt=""></div><?php }
          if($link9) { ?><div class="photo-gal-thumb"><img src="<?php echo $link9; ?>" alt=""></div><?php }
      } 
  
      echo '</div>
      </div>';
	echo $after_widget;
	}


}

// register widget
function register_Desiratech_Featured_Photos_Widget() {
    register_widget( 'Desiratech_Featured_Photos_Widget' );
}
add_action( 'widgets_init', create_function("", 'return register_widget( "Desiratech_Featured_Photos_Widget" );') );