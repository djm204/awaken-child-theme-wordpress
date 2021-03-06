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
          
      $links = [
          $instance['link1'], 
          $instance['link2'], 
          $instance['link3'], 
          $instance['link4'], 
      
          ];
      
      $images = new WP_Query( array( 'post_type' => 'attachment', 'post_status' => 'inherit', 'post_mime_type' => 'image' , 'posts_per_page' => -1 ) );
      if( $images->have_posts() ){ 
          $options = array();
            for( $i = 0; $i < 4; $i++ ) {
              $options[$i] = '';
              while( $images->have_posts() ) {
                  $images->the_post();
                  $img_src = wp_get_attachment_image_src(get_the_ID(), 'original');

                  $selected = '';
                  if($links[$i] == $img_src[0])
                  {
                    $selected = 'selected="selected"';
                  }

                  $the_link = $links[$i];
                  $options[$i] .= '<option value="' . $img_src[0] . '" ' . $selected . '>' . get_the_title() . '</option>';
                } 
             ?>
                <select id="<?php echo $this->get_field_id( 'link'.($i+1) ); ?>" name="<?php echo $this->get_field_name( 'link'.($i+1) ); ?>"><?php echo $options[$i]; ?></select><img src="<?= $links[$i] ?>" width="50px"/>
             
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
            echo $key;
            echo $val;
            
            $instance[ $key ] = strip_tags( $new_instance[ $key ] );
            
        }

        $instance[ 'link1' ] = strip_tags( $new_instance[ 'link1' ] );
        $instance[ 'link2' ] = strip_tags( $new_instance[ 'link2' ] );
        $instance[ 'link3' ] = strip_tags( $new_instance[ 'link3' ] );
        $instance[ 'link4' ] = strip_tags( $new_instance[ 'link4' ] );
    
        
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
        
        
        for($i = 0; $i < sizeof($args); $i++){
            $link[] =  ( empty($instance['link'.$i]) ) ? 0 : $instance['link'.$i];
        }
     
      
       
      
    echo $before_widget;
      ?>
          <h3> Featured Photos</h3>
        
       <!-- Display images --><?php 
      if( !( $link) ) {
          echo "Please configure this widget.";
      } else { 
          
          for($i = 0; $i < sizeof($link); $i++){
          if($link[$i]) { ?>
          
            <div class="photo-gal-thumb" data-toggle="modal" data-target="#myModal<?=$i?>">
              <img src="<?php echo $link[$i]; ?>" alt="">
            </div>
            
            
          <!-- Modal -->
            <div id="myModal<?=$i?>" class="modal fade " role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        
                        <div class="modal-body text-center">
                            <img src="<?php echo $link[$i]; ?>" alt="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
          

          <?php }
          }
      } 
  ?>
  <a class="more-link" href="/photo-gallery" >...more</a>
  <?php
     
  echo $after_widget;
  }


}

// register widget
function register_Desiratech_Featured_Photos_Widget() {
    register_widget( 'Desiratech_Featured_Photos_Widget' );
}
add_action( 'widgets_init', create_function("", 'return register_widget( "Desiratech_Featured_Photos_Widget" );') );