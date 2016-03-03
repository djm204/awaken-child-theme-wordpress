<?php

/**
 * Displays latest, category wised posts in a 3 block layout.
 *
 */

class Desiratech_Upcoming_Events_Widget extends WP_Widget {

	/* Register Widget with WordPress*/
	function __construct() {
		parent::__construct(
			'desiratech_upcoming_events_widget', // Base ID
			__( 'Desiratech: Upcoming Events', 'awaken' ), // Name
			array( 'description' => __( 'Upcoming Events Widget', 'awaken' ), ) // Args
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
		echo ' <!---- contact --->
        
                        <h3 class="program-button-red">Upcoming Events</h3>
                            <ul id="events" class="col-md-12">
                                    <li></span><a href="#">Event 1: 1/2/2016</a></li>
                                    <li></span><a href="#">Event 2: 4/22/2016</a></li>
                                    <li></span><a href="#">Event 3: 6/25/2016</a></li>
                                    <li></span><a href="#">Event 4: 7/23/2016</a></li>
                            </ul>
                        </div>
               <div id="folklorama">
                    <a href="/folklorama"><img src="' . get_stylesheet_directory_uri() . '/images/folklorama-logo.png" alt="Folklorama Logo" /></a>
               </div>
           
        
    <!---- contact --->';

	
	echo $after_widget;
	}


}

// register widget
function register_Desiratech_Upcoming_Events_Widget() {
    register_widget( 'Desiratech_Upcoming_Events_Widget' );
}
add_action( 'widgets_init', 'register_Desiratech_Upcoming_Events_Widget' );