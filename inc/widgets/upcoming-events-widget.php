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
        	
        	foreach ( $fields as $name => $value )
	        {

	            $image_value = '';
	            if(($fields_counter+1) != count($fields))
	            {
	            	$image_value = '<br />Remove This Event? <input type="checkbox" name="' . $this->get_field_name( 'events' ) . '[' . $fields_counter . '][4]"></input>';
	            }
	            else
	            {
	            	$image_value = '<br /><hr />Enter a new event<br />';
	            }

	            $fields_html[] = sprintf(
	                ''. $image_value .'<br />Event Name <br /><input type="text" name="%2$s[%1$s][0]" class="widefat" value="' . $value[0] .'"></input>' .
	                '<br />Date<br /><input type="text" name="%2$s[%1$s][1]" class="widefat" value="' . $value[1] .'"></input>' .
	                '<br />Description<br /><input type="text" name="%2$s[%1$s][2]" class="widefat" value="' . $value[2] .'"></input>' .
	                '<br />Location<br /><input type="text" name="%2$s[%1$s][3]" class="widefat" value="' . $value[3] .'"></input>',
	                $fields_counter,
	                $this->get_field_name( 'events' )
	            );
	            $fields_counter += 1;
	        }

        	print 'To remove images once added, select "Remove Image" from the top of the dropdown and click the save button.<br /><br />' . join( '<br />', $fields_html );
        
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
	            	if($event[4])
	            	{
	            		array_splice($instance['events'], $index, 1);
	            	}
	            	else
	            	{
	            		$new_array = array($event[0], $event[1], $event[2], $event[3]);
	                	$instance['events'][ $index ] = $new_array;
	                	$index++;
	            	}
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
		?>
			
                <a href="upcoming-events"><h3 class="program-button-red">Upcoming Events</h3></a>
                    <ul id="events" class="col-md-12">
                    	<?php foreach($instance['events'] as $key => $value) : ?>
                            <li data-toggle="modal" data-target="#myEventModal<?=$key?>">Event <?= $key+1 ?>: <?= $value[1] ?></li>  
                        <?php endforeach ?>
                    </ul>


               <div id="folklorama">
                    <a href="/folklorama"><img src="' . get_stylesheet_directory_uri() . '/images/folklorama-logo.png" alt="Folklorama Logo" /></a>
               </div>

               <?php foreach($instance['events'] as $key => $value) : ?>
                	<div id="myEventModal<?=$key?>" class="modal fade" role="dialog">
		                <div class="modal-dialog">

		                    
		                    <div class="modal-content">
		                    <div class="modal-header">
		                        <button type="button" class="close" data-dismiss="modal">&times;</button>
		                        <h4 class="modal-title">Event: <?= $value[0] ?></h4>
		                    </div>
		                    <div class="modal-body text-center">
		                    	<h3>Time:</h3>
		                        <p><?= $value[1] ?></p>
		                       	<h3>Description:</h3>
		                        <p><?= $value[2] ?></p>
		                        <h3>Location:</h3>
		                        <p><?= $value[3] ?></p>
		                    </div>
		                    <div class="modal-footer">
		                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		                    </div>
		                    </div>

		                </div>
		            </div>
               <?php endforeach ?>
	<?php
	
	echo $after_widget;
	}


}

// register widget
function register_Desiratech_Upcoming_Events_Widget() {
    register_widget( 'Desiratech_Upcoming_Events_Widget' );
}
add_action( 'widgets_init', 'register_Desiratech_Upcoming_Events_Widget' );