<?php

/**
 * Displays latest, category wised posts in a 3 block layout.
 *
 */

class Desiratech_Become_A_Member_Widget extends WP_Widget {

	/* Register Widget with WordPress*/
	function __construct() {
		parent::__construct(
			'desiratech_become_a_member_widget', // Base ID
			__( 'Desiratech: Become a Member', 'awaken' ), // Name
			array( 'description' => __( 'Become a Member Widget', 'awaken' ), ) // Args
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
   
                        <h3 class="program-button-red">Become A Member</h3>
                        <p>
                            Membership to our non-profit organization helps support and preserve the Spanish community and heritage in Winnipeg, continuing to bring us together whether it’s enjoying social gatherings, learning the Spanish language or being part of Sol de Espana Folklore dancers. We have numerous free member events thru-out the year. If you wish to register as a member fill out <a href="#">this form</a>.
                        </p>
                        
               

    <!---- contact --->';

	
	echo $after_widget;
	}


}

// register widget
function register_Desiratech_Become_A_Member_Widget() {
    register_widget( 'Desiratech_Become_A_Member_Widget' );
}
add_action( 'widgets_init', 'register_Desiratech_Become_A_Member_Widget' );