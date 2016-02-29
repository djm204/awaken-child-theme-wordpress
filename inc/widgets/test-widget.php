<?php

/**
 * Displays latest, category wised posts in a 3 block layout.
 *
 */

class Awaken_Test_Widget extends WP_Widget {

	/* Register Widget with WordPress*/
	function __construct() {
		parent::__construct(
			'awaken_test_widget', // Base ID
			__( 'Photo Carousel', 'awaken' ), // Name
			array( 'description' => __( 'Photo Carousel Widget', 'awaken' ), ) // Args
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
		echo '<div id="my-carousel" class="carousel slide col-sm-12" data-ride="carousel" data-interval="1000">
    
        <!-- Indicators -->
        <ol class="hidden carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            
            <div class="item active">
            <img class="img-responsive" src="images/pic1.jpg" alt="Accalia">
            </div>

            <div class="item">
            <img class="img-responsive" src="images/pic2.jpg" alt="Chania">
            </div>

            <div class="item">
            <img class="img-responsive" src="images/pic3.jpg" alt="Flower">
            </div>

            <div class="item">
            <img class="img-responsive" src="images/pic4.jpg" alt="Flower">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="hidden left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="hidden right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>';

		echo '</div>';

	echo $after_widget;
	}


}

// register widget
function register_Awaken_Test_Widget() {
    register_widget( 'Awaken_Test_Widget' );
}
add_action( 'widgets_init', 'register_Awaken_Test_Widget' );