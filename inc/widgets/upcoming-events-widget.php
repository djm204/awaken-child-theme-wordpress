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
		$fields = isset ( $instance['events'] ) ? $instance['events'] : array();
        $field_num = count( $fields );
        $fields[ $field_num + 1 ] = '';
        $fields_html = array();
        $fields_counter = 0;

        	$i = 0;
        	$checkboxes = array();
        	
        	foreach ( $fields as $name => $value )
	        {
	        	$checkboxes[$i] = '<input type="checkbox" name="checkbox' . $i . '" id="checkbox' . $i . '"';

	            $image_value = '';
	            if(($fields_counter+1) != count($fields))
	            {
	            	$image_value = '<br />Remove Event? <input type="checkbox" name="checkbox' . $i . '" id="checkbox' . $i . '"' ;
	            }
	            else
	            {
	            	$image_value = '<br /><hr />Enter a new event<br /><br />';
	            }

	            $fields_html[] = sprintf(
	                ''. $image_value .'Event Name: <br /><input type="text" name="eventName%1$s[%1$s][0]" class="widefat">'.$value[0].'</input>' .
	                '<br />Date:<br /><input type="text" name="eventDate%1$s[%1$s][1]" class="widefat">'.$value[1].'</input>' .
	                '<br />Description:<br /><input type="text" name="eventDescription%1$s[%1$s][1]" class="widefat">'.$value[2].'</input>' .
	                '<br />Location:<br /><input type="text" name="eventLocation%1$s[%1$s][1]" class="widefat">'.$value[3].'</input>',
	                $fields_counter
	            );
	            $fields_counter += 1;
	        }

        	print 'To remove images once added, select "Remove Image" from the top of the dropdown and click the save button.<br /><br />' . join( '<br />', $fields_html );
        }// End if
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
		if ( isset ( $new_instance['events'] ) ) {
	        $index = 0;
	        foreach ( $new_instance['events'] as $event ) {
	            if ( '' !== trim( $event[0] ) ) {
	                $new_array = array($picture_value[0], $picture_value[1]);
	                $instance['events'][ $index ] = $new_array;
	                $index++;
	            }
	        }
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

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';	
		$vid_url = ( ! empty( $instance['vid_url'] ) ) ? $instance['vid_url'] : '';

		echo $before_widget;
		echo '<!---- contact --->        
                        <a href="upcoming-events"><h3 class="program-button-red">Upcoming Events</h3></a>
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