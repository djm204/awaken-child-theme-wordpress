<?php

/**
 * Displays latest, category wised posts in a 3 block layout.
 *
 */

class Desiratech_Programs_Registration extends WP_Widget {

	/* Register Widget with WordPress*/
	function __construct() {
		parent::__construct(
			'desiratech_programs_registration', // Base ID
			__( 'Desiratech: Programs Registration', 'awaken' ), // Name
			array( 'description' => __( 'Programs Registration Widget', 'awaken' ), ) // Args
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
		echo '<h3 class="program-button">Programs & Registration</h3>
                        <p>
                            
Cibo audire honestatis ea sit, quo delectus cotidieque an. Usu ei mediocrem contentiones, dico sententiae efficiantur no eos. Ex per quis sale. Elit latine ad nec, sit in vivendum imperdiet tincidunt. Has dolore possim albucius ne, facilis persequeris sea ad.
                            <a href="#">Click here</a> for more information.
                        </p>
                    </div>';


	echo $after_widget;
	}


}

// register widget
function register_Desiratech_Programs_Registration() {
    register_widget( 'Desiratech_Programs_Registration' );
}
add_action( 'widgets_init', 'register_Desiratech_Programs_Registration' );