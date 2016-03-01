<?php

/**
 * Displays latest, category wised posts in a 3 block layout.
 *
 */

class Desiratech_Contact_Widget extends WP_Widget {

	/* Register Widget with WordPress*/
	function __construct() {
		parent::__construct(
			'desiratech_contact_widget', // Base ID
			__( 'Desiratech: Contact Info', 'awaken' ), // Name
			array( 'description' => __( 'Contact Info Widget', 'awaken' ), ) // Args
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
            <div class="contact-grids">
                <div >
                    <div class="contact-left wow fadeInRight" data-wow-delay="0.4s">
                        <h3>Contact Us</h3>
                        <label>Don\'t be shy, drop us an email and say hello! We would love to hear from you :)</label>
                        <div class="contact-left-grids">
                            <div class="col-md-6">
                                <div class="contact-left-grid">
                                    <p><span class="c-mobi"> </span>(204) 298-9476</p>
                                    <p><span class="c-twitter"> </span><a href="#">@desiratech</a></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-right-grid">
                                    <p><span class="c-msg"> </span><a href="mailto:info@desiratech.com">info@desiratech.com</a></p>
                                    <p><span class="c-face"> </span><a href="https://facebook.com/desiratechdev">facebook.com/DesiratechDev</a></p>
                                    <p><span class="c-pin"> </span><a href="https://linkedin.com/in/djm204">linkedin.com/in/djm204</a></p>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
               
           
        </div>
    </div>
    <!---- contact --->';

	
	echo $after_widget;
	}


}

// register widget
function register_Desiratech_Contact_Widget() {
    register_widget( 'Desiratech_Contact_Widget' );
}
add_action( 'widgets_init', 'register_Desiratech_Contact_Widget' );