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
		//print_r($instance);
		$defaults = array(
			'title'		=>	__( 'Featured Video', 'awaken' ),
			'vid_url'	=>	'SQEQr7c0-dw'
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'awaken' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr($instance['title']); ?>"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'vid_url' ); ?>"><?php _e( 'Youtube Video ID', 'awaken' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'vid_url' ); ?>" name="<?php echo $this->get_field_name( 'vid_url' ); ?>" value="<?php echo esc_attr($instance['vid_url']); ?>"/>
		</p>

	<?php

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
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );	
		$instance[ 'vid_url' ]	= strip_tags( $new_instance[ 'vid_url' ] );
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

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';	
		$vid_url = ( ! empty( $instance['vid_url'] ) ) ? $instance['vid_url'] : '';

		echo $before_widget;
		echo '
        
        <div class="col-xs-12">
         <h3>Photo Gallery</h3>
                        <div class="thumb-wrapper">
                            <img class="photo-gal-thumb" src="'.get_stylesheet_directory_uri().'/images/spainlandscape.jpg" />
                            <img class="photo-gal-thumb" src="'.get_stylesheet_directory_uri().'/images/spainlandscape.jpg" />
                            <img class="photo-gal-thumb" src="'.get_stylesheet_directory_uri().'/images/spainlandscape.jpg" />
                            <img class="photo-gal-thumb" src="'.get_stylesheet_directory_uri().'/images/spainlandscape.jpg" />
                            <img class="photo-gal-thumb" src="'.get_stylesheet_directory_uri().'/images/spainlandscape.jpg" />
                            <img class="photo-gal-thumb" src="'.get_stylesheet_directory_uri().'/images/spainlandscape.jpg" />
                            <img class="photo-gal-thumb" src="'.get_stylesheet_directory_uri().'/images/spainlandscape.jpg" />
                            <img class="photo-gal-thumb" src="'.get_stylesheet_directory_uri().'/images/spainlandscape.jpg" />
                            <img class="photo-gal-thumb" src="'.get_stylesheet_directory_uri().'/images/spainlandscape.jpg" />
                            <img class="photo-gal-thumb" src="'.get_stylesheet_directory_uri().'/images/spainlandscape.jpg" />
                            <img class="photo-gal-thumb" src="'.get_stylesheet_directory_uri().'/images/spainlandscape.jpg" />
                            <img class="photo-gal-thumb" src="'.get_stylesheet_directory_uri().'/images/spainlandscape.jpg" />
                            
                        </div>
                        <div class="text-right" ><a href="#">More</a>...</div>
                        
                        </div>';


	echo $after_widget;
	}


}

// register widget
function register_Desiratech_Featured_Photos_Widget() {
    register_widget( 'Desiratech_Featured_Photos_Widget' );
}
add_action( 'widgets_init', 'register_Desiratech_Featured_Photos_Widget' );