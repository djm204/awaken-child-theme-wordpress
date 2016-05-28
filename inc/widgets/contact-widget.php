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
			'email'		=>	'info@spanishclubofwinnipeg.ca',
			'facebook'	=>	'friendsSpanishClubWinnipeg',
            'address'		=>	'Address 677 Selkirk Ave. Winnipeg, Manitoba, R2W 2N4',
			'phone-number'	=>	'204-586-7615'
           
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

	?>
        <p>
			<label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e( 'Address:'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" value="<?php echo esc_attr($instance['address']); ?>"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'phone-number' ); ?>"><?php _e( 'Phone Number:'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'phone-number' ); ?>" name="<?php echo $this->get_field_name( 'phone-number' ); ?>" value="<?php echo esc_attr($instance['phone-number']); ?>"/>
		</p>
         <p>
			<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email:'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo esc_attr($instance['email']); ?>"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook:'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo esc_attr($instance['facebook']); ?>"/>
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
		$instance[ 'address' ] = strip_tags( $new_instance[ 'address' ] );	
		$instance[ 'phone-number' ]	= strip_tags( $new_instance[ 'phone-number' ] );
		$instance[ 'email' ]	= strip_tags( $new_instance[ 'email' ] );
		$instance[ 'facebook' ]	= strip_tags( $new_instance[ 'facebook' ] );
        
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

		$address = ( ! empty( $instance['address'] ) ) ? $instance['address'] : '';	
		$phone_number = ( ! empty( $instance['phone-number'] ) ) ? $instance['phone-number'] : '';
		$email = ( ! empty( $instance['email'] ) ) ? $instance['email'] : '';
		$facebook = ( ! empty( $instance['facebook'] ) ) ? $instance['facebook'] : '';

		echo $before_widget;
		?><div id="contact-info">

                        <h3>Contact Info</h3>
                            <ul >
                                    <li><span class="contact-icon glyphicon glyphicon-home "></span><?=$address?></li>
                                    <li><span class="contact-icon glyphicon glyphicon-earphone "> </span><a href="tel:<?=$phone_number?>"><?=$phone_number?></a></li>
                                    <li><span class="contact-icon glyphicon glyphicon-envelope "> </span><a href="mailto:'.$email.'"><?=$email?></a></li>
                                    <li><span class="contact-icon fa fa-facebook "> </span><a href="https://facebook.com/<?=$facebook?>">facebook.com/<?=$facebook?></a></li>
                            </ul>
                </div>
				<div class="bottom-menu">
					<ul>
						<li><a href="/about-us">About</a></li>
						<li><a href="/links">Links</a></li>						
						<li><a href="/login">Members Login</a></li>
					</ul>
				</div>
				
				<?php
	
	echo $after_widget;
	}


}

// register widget
function register_Desiratech_Contact_Widget() {
    register_widget( 'Desiratech_Contact_Widget' );
}
add_action( 'widgets_init', 'register_Desiratech_Contact_Widget' );