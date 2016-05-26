<?php

/**
 * Displays latest, category wised posts in a 3 block layout.
 *
 */

class Desiratech_Photocarousel_Widget extends WP_Widget {

	/* Register Widget with WordPress*/
	function __construct() {
		parent::__construct(
			'desiratech_photocarousel_widget', // Base ID
			__( 'Desiratech: Photo Carousel Widget', 'awaken' ), // Name
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
		$fields = isset ( $instance['pictures'] ) ? $instance['pictures'] : array();
        $field_num = count( $fields );
        $fields[ $field_num ] = '';
        $fields_html = array();
        $fields_counter = 0;

        $images = new WP_Query( array( 'post_type' => 'attachment', 'post_status' => 'inherit', 'post_mime_type' => 'image' , 'posts_per_page' => -1 ) );
        if( $images->have_posts() ){ 
        	$i = 0;
        	$options = array();
        	$selected = '';
        	
        	foreach ( $fields as $name => $value )
	        {
	        	$options[$i] = '';

	        	if($value == '')
	        	{
	        		$options[$i] .= '<option value="" ' . $selected . '>Select an image to add</option>';
	        	}
	        	else
	        	{
	        		$options[$i] .= '<option value="" ' . $selected . '>Remove Image</option>';
	        	}

	        	while( $images->have_posts() ) {
	                $images->the_post();
	                $img_src = wp_get_attachment_image_src(get_the_ID(), 'original');

	                $selected = '';

	                if(($fields_counter+1) != count($fields))
	                {
	                	if($value[0] == $img_src[0])
		                {
		                    $selected = 'selected="selected"';
		                }
	                }

	                //$the_link = $links[$i];
	                $options[$i] .= '<option value="' . $img_src[0] . '" ' . $selected . '>' . get_the_title() . '</option>';
	            } 
	        	
	            $image_value = '';
	            $description_value = '';
	            if(($fields_counter+1) != count($fields))
	            {
	            	$image_value = '<br /><img src="'.$value[0].'" width="140" margin-top="10px" />';
	            	$description_value = $value[1];
	            }
	            else
	            {
	            	$image_value = '<br /><hr />Select an image here to add to the carousel<br /><br />';
	            	$description_value = '';
	            }

	            $fields_html[] = sprintf(
	                ''. $image_value .'<select type="text" name="%1$s[%2$s][0]" class="widefat">'.$options[$i].'</select><br />Description:<br /><input type="text" name="%1$s[%2$s][1]" value="'.$description_value.'"/>',
	                $this->get_field_name( 'pictures' ),
	                $fields_counter
	            );
	            $fields_counter ++;
	        }

        	print 'To remove images once added, select "Remove Image" from the top of the dropdown and click the save button.<br /><br />' . join( '<br />', $fields_html );
        }// End if
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
		if ( isset ( $new_instance['pictures'] ) ) {
	        $index = 0;
	        foreach ( $new_instance['pictures'] as $picture_value ) {
	            if ( '' !== trim( $picture_value[0] ) ) {
	                $new_array = array($picture_value[0], $picture_value[1]);
	                $instance['pictures'][ $index ] = $new_array;
	                $index++;
	            }
	            else
	            {
	            	array_splice($instance['pictures'], $index, 1);
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

		echo $before_widget;
		?>

        <div id="my-carousel" class="carousel carousel-fade slide col-sm-12" data-ride="carousel" data-interval="7000">
    
        <!-- Indicators -->
        <ol class="hidden carousel-indicators">
        	<?php foreach($instance['pictures'] as $key => $value) : ?>
            	<li data-target="#myCarousel" data-slide-to="<?= $key ?>" class="<?php if($key==0){ echo 'active';} ?>"></li>
            <?php endforeach ?>
        </ol>
            
        
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        	<?php foreach($instance['pictures'] as $key => $value) : ?>
        		<div class="item<?php if($key==0){ echo ' active';} ?>">
            
	            <img class="img-responsive" src="<?= $value[0] ?>" alt="<?= $value[1] ?>">
	            <h2><?= $value[1] ?></h2>            
	            </div>
        	<?php endforeach ?>
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
        </div>;
<?php
		echo '</div>';

	echo $after_widget;
	}


}

// register widget
function register_Desiratech_Photocarousel_Widget() {
    register_widget( 'Desiratech_Photocarousel_Widget' );
}
add_action( 'widgets_init', 'register_Desiratech_Photocarousel_Widget' );