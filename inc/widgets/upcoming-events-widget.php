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
		ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
		$fields = isset ( $instance['events'] ) ? $instance['events'] : array();
        $field_num = count( $fields );
        $fields[ $field_num ] = '';
        $fields_html = array();
        $fields_counter = 0;
        	
        	foreach ( $fields as $name => $value )
	        {
	        	$text_jump = '';
	        	if($fields_counter == 0)
	        	{
	        		$text_jump = '<a href="#newEventJump">Move to New Event Entry</a><br />';
	        	}
	        	$value_0 = '';
	        	$value_1 = '';
	        	$value_2 = '';
	        	$value_3 = '';
	        	if(($name+1) != count($fields))
	        	{
	        		$value_0 = $value[0];
	        		$value_1 = $value[1];
	        		$value_2 = $value[2];
	        		$value_3 = $value[3];
	        	}

	            $image_value = '';
	            if(($fields_counter+1) != count($fields))
	            {
	            	$event_jump = '';
	            	if($fields_counter+2 == count($fields))
	            	{
	            		$event_jump = '<a name="newEventJump"></a>';
	            	}
	            	$image_value = $event_jump . '<br />Remove This Event? <input type="checkbox" name="' . $this->get_field_name( 'events' ) . '[' . $fields_counter . '][4]"></input>';
	            }
	            else
	            {
	            	$image_value = '<br /><hr />Enter a new event<br />';
	            	
	            }

	            $fields_html[] = sprintf(
	                ''. $text_jump . $image_value . '<br />Event Name <br /><input type="text" name="%2$s[%1$s][0]" class="widefat" value="' . $value_0 .'"></input>' .
	                '<br />Date<br /><input type="text" name="%2$s[%1$s][1]" class="widefat" value="' . $value_1 .'"></input>' .
	                '<br />Description<br /><input type="text" name="%2$s[%1$s][2]" class="widefat" value="' . $value_2 .'"></input>' .
	                '<br />Location<br /><input type="text" name="%2$s[%1$s][3]" class="widefat" value="' . $value_3 .'"></input>',
	                $fields_counter,
	                $this->get_field_name( 'events' )
	            );
	            $fields_counter += 1;
	        }

        	print join( '<br />', $fields_html );
        
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

		$first = true;

		echo $before_widget;
		?>
			<div style="animation: none !important;">
                <a href="upcoming-events"><h3 class="program-button-red">Upcoming Events</h3></a>
                    	<?php foreach($instance['events'] as $key => $value) : ?>
                    		<?php if($first){$liClass = ' eventList';} else { $liClass = ' eventList';} ?>
                    		<?php if($key == 0) : ?>
                    		<ul id="events" class="col-md-12<?= $liClass ?>">
                    		<?php endif ?>
                    		<li data-toggle="modal" data-target="#myEventModal<?=$key?>">Event <?= $key+1 ?>: <?= $value[1] ?></li>
                    		<?php if(($key+1) % 4 == 0) : ?>
                    		</ul>
                    		<?php endif ?>
                    		<?php if(($key+1) % 4 == 0 && ($key+1) != count($instance['events'])) : ?>
                    		<ul id="events" class="col-md-12<?= $liClass ?>">
                    		<?php endif ?>
                             
                            <?php $first = false; ?>
                            <?php if(($key+1) == count($instance['events']) && !(($key+1) % 4 == 0)) : ?>
                    		</ul>
                    		<?php endif ?>
                        <?php endforeach ?>



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
            </div>

            <script>
            jQuery(function($) {

			    var counter = 0;
			    var listItems = $('.eventList');
			    var listItemsCount = listItems.size();


			    function showList () {
			    	if(listItemsCount != 1)
			    	{
			        	listItems.hide();
			    	}

			        var listItem = $('.eventList:eq('+counter+')');

			        listItem.show('fast');

			        counter++;
			        if(counter == listItemsCount)
			        {
			        	counter = 0;
			        }
			    };

			    showList();   

			    setInterval(function () {
			        showList();
			    }, 7 * 1000);   

			});
            </script>
	<?php
	
	echo $after_widget;
	}


}

// register widget
function register_Desiratech_Upcoming_Events_Widget() {
    register_widget( 'Desiratech_Upcoming_Events_Widget' );
}
add_action( 'widgets_init', 'register_Desiratech_Upcoming_Events_Widget' );