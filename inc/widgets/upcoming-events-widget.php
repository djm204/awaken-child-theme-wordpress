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
    <div id="contact" class="contact">
        <div class="container-fluid">
           
                    <div class="contact-left wow fadeInRight " data-wow-delay="0.4s">
                        <h3>Upcoming Events</h3>
                            <div class="col-md-6">
                                    <p><span class="contact-icon glyphicon glyphicon-home"></span>  Address 677 Selkirk Ave.<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Winnipeg, Manitoba, R2W 2N4</p>
                                    <p><span class="contact-icon glyphicon glyphicon-earphone"> </span><a href="tel:2045867615">204-586-7615</a></p>
                                    <p><span class="contact-icon glyphicon glyphicon-envelope"> </span><a href="mailto:info@spanishclubofwinnipeg.ca">info@spanishclubofwinnipeg.ca</a></p>
                                    <p><span class="contact-icon c-face-contact"> </span><a href="https://facebook.com/friendsSpanishClubWinnipeg">facebook.com/friendsSpanishClubWinnipeg</a></p>
                            </div>
                        </div>
               
           
        </div>
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