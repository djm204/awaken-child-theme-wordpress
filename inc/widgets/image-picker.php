<?php
class Image_Picker extends WP_Widget
{
  function __construct() {
		parent::__construct(
			'desiratech_image_picker_widget', // Base ID
			__( 'Desiratech: Image Picker', 'awaken' ), // Name
			array( 'description' => __( 'Image Picker Widget', 'awaken' ), ) // Args
		);
	}

  public function form($instance) {
      //WIDGET BACK-END SETTINGS
      $instance = wp_parse_args((array) $instance, array('link1' => '', 'link2' => ''));
      $link1 = $instance['link1'];
      $link2 = $instance['link2'];
      $images = new WP_Query( array( 'post_type' => 'attachment', 'post_status' => 'inherit', 'post_mime_type' => 'image' , 'posts_per_page' => -1 ) );
      if( $images->have_posts() ){ 
          $options = array();
          for( $i = 0; $i < 2; $i++ ) {
              $options[$i] = '';
              while( $images->have_posts() ) {
                  $images->the_post();
                  $img_src = wp_get_attachment_image_src(get_the_ID());
                  $the_link = ( $i == 0 ) ? $link1 : $link2;
                  $options[$i] .= '<option value="' . $img_src[0] . '" ' . selected( $the_link, $img_src[0], false ) . '>' . get_the_title() . '</option>';
              } 
         } ?>
      <select name="<?php echo $this->get_field_name( 'link1' ); ?>"><?php echo $options[0]; ?></select>
      <select name="<?php echo $this->get_field_name( 'link2' ); ?>"><?php echo $options[1]; ?></select><?php
      } else {
            echo 'There are no images in the media library. Click <a href="' . admin_url('/media-new.php') . '" title="Add Images">here</a> to add some images';
      }

  }

  public function update($new_instance, $old_instance) {
      $instance = $old_instance;
      $instance['link1'] = strip_tags($new_instance['link1']);
      $instance['link2'] = strip_tags($new_instance['link2']);
      return $instance;
  }



  public function widget($args, $instance) {
      $link1 = ( empty($instance['link1']) ) ? 0 : $instance['link1'];
      $link2 = ( empty($instance['link2']) ) ? 0 : $instance['link2']; ?>

      <!-- Display images --><?php 
      if( !( $link1 || $link2 ) ) {
          echo "Please configure this widget.";
      } else { 
          if($link1) { ?><div class="sidebar-image"><img src="<?php echo $link1; ?>" alt="" width="203" height="271" border="0"></div><?php }
          if($link1) { ?><div class="sidebar-image"><img src="<?php echo $link2; ?>" alt="" width="177" height="207" border="0"></div><?php }
      } 
  }
}

// Add class for Random Posts Widget
add_action( 'widgets_init', create_function('', 'return register_widget("Image_Picker");') );