<?php 
class Kankoz_Social_Links_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'kankoz_social_links_widget',
			'description' => 'Add Kankoz social links widget to your website\'s sidebar',
		);
		parent::__construct( 'kankoz_social_links_widget', 'Social Links Widget', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget

		$links = array(
			'facebook' => esc_attr( $instance['fb_link'] ), 
			'twitter' => esc_attr( $instance['tw_link'] ),
			'linkedin' => esc_attr( $instance['lk_link'] ),
			'google' => esc_attr( $instance['gl_link'] ),
			);	

		$icons = array(
			'facebook' => esc_attr( $instance['fb_icon'] ), 
			'twitter' => esc_attr( $instance['tw_icon'] ),
			'linkedin' => esc_attr( $instance['lk_icon'] ),
			'google' => esc_attr( $instance['gl_icon'] ),
			);	

		$icon_width = $instance['icon_width'];

		echo $args['before_widget'];
		//if ( ! empty( $instance['fb_link'] ) ) {
			//echo $args['before_title'] . apply_filters( 'widget_title', //$instance['fb_link'] ) . $args['after_title'];

		// get all the social links to the front end
		$this->getSocialLinks($links, $icons, $icon_width);

		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		
		// call form function 
		$this->getForm($instance); 
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		//$this-> getUpdate($instance);

		$instance = array();
		$instance['fb_link'] = ( ! empty( $new_instance['fb_link'] ) ) ? sanitize_text_field( $new_instance['fb_link'] ) : '';
		$instance['tw_link'] = ( ! empty( $new_instance['tw_link'] ) ) ? sanitize_text_field( $new_instance['tw_link'] ) : '';
		$instance['lk_link'] = ( ! empty( $new_instance['lk_link'] ) ) ? sanitize_text_field( $new_instance['lk_link'] ) : '';
		$instance['gl_link'] = ( ! empty( $new_instance['gl_link'] ) ) ? sanitize_text_field( $new_instance['gl_link'] ) : '';

		$instance['fb_icon'] = ( ! empty( $new_instance['fb_icon'] ) ) ? sanitize_text_field( $new_instance['fb_icon'] ) : '';
		$instance['tw_icon'] = ( ! empty( $new_instance['tw_icon'] ) ) ? sanitize_text_field( $new_instance['tw_icon'] ) : '';
		$instance['lk_icon'] = ( ! empty( $new_instance['lk_icon'] ) ) ? sanitize_text_field( $new_instance['lk_icon'] ) : '';
		$instance['gl_icon'] = ( ! empty( $new_instance['gl_icon'] ) ) ? sanitize_text_field( $new_instance['gl_icon'] ) : '';

		$instance['icon_width'] = ( ! empty( $new_instance['icon_width'] ) ) ? sanitize_text_field( $new_instance['icon_width'] ) : '';

		return $instance;
	}

	/**
	 * Gets and display the form
	 *
	 * @param array $instance The widget options
	 */
	public function getForm( $instance ) {
		// get facebook link
		if (isset($instance['fb_link'])) {
			$fb_link = esc_attr( $instance['fb_link'] );
		}
		else{
			//return 'https://facebook.com/name';
			$fb_link = 'https://facebook.com/name';
		}

		// get twitter link
		if (isset($instance['tw_link'])) {
			$tw_link = esc_attr( $instance['tw_link'] );
		}
		else{
			$tw_link = 'https://twitter.com/name';
		}

		// get linkedin link
		if (isset($instance['lk_link'])) {
			$lk_link = esc_attr( $instance['lk_link'] );
		}
		else{
			$lk_link = 'https://linkedin.com/name';
		}
		
		// get google + link
		if (isset($instance['gl_link'])) {
			$gl_link = esc_attr( $instance['gl_link'] );
		}
		else{
			$gl_link = 'https://plug.google.com/name';
		}

		// get facebook icon
		if (isset($instance['fb_icon'])) {
			$fb_icon = esc_attr( $instance['fb_icon'] );
		}
		else{
			$fb_icon = plugins_url( 'img/facebook.png', dirname(__FILE__) ); 
		}

		// get twitter icon
		if (isset($instance['tw_icon'])) {
			$tw_icon = esc_attr( $instance['tw_icon'] );
		}
		else{
			$tw_icon = plugins_url( 'img/twitter.png', dirname(__FILE__) ); 
		}

		// get linkedin icon
		if (isset($instance['lk_icon'])) {
			$lk_icon = esc_attr( $instance['lk_icon'] );
		}
		else{
			$lk_icon = plugins_url( 'img/linkedin.png', dirname(__FILE__) ); 
		}
		
		// get google + icon
		if (isset($instance['gl_icon'])) {
			$gl_icon = esc_attr( $instance['gl_icon'] );
		}
		else{
			$gl_icon = plugins_url( 'img/google.png', dirname(__FILE__) ); 
		}

		// get icon width 

		if (isset($instance['icon_width'])) {
			$icon_width = esc_attr( $instance['icon_width'] );
		}
		else{
			$icon_width = 32;
		}
		
		?>
			<h4>Facebook</h4>
			<p>
				<label for="<?php echo $this->get_field_id( 'fb_link' ) ?>"><?php _e('Link'); ?></label>
				<input class="widefat" id="<?php $this->get_field_id( 'fb_link' ) ;?>" type="text" name="<?php echo $this->get_field_name( 'fb_link' ); ?>" value="<?php echo esc_attr( $fb_link ); ?>">
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'fb_icon' ) ?>"><?php _e('Icon'); ?></label>
				<input class="widefat" id="<?php $this->get_field_id( 'fb_icon' ) ;?>" type="text" name="<?php echo $this->get_field_name( 'fb_icon' ); ?>" value="<?php echo esc_attr( $fb_icon ); ?>">
			</p>

			<h4>Twitter</h4>
			<p>
				<label for="<?php echo $this->get_field_id( 'tw_link' ) ?>"><?php _e('Link'); ?></label>
				<input class="widefat" id="<?php $this->get_field_id( 'tw_link' ) ;?>" type="text" name="<?php echo $this->get_field_name( 'tw_link' ); ?>" value="<?php echo esc_attr( $tw_link ); ?>">

			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'tw_icon' ) ?>"><?php _e('Icon'); ?></label>
				<input class="widefat" id="<?php $this->get_field_id( 'tw_icon' ) ;?>" type="text" name="<?php echo $this->get_field_name( 'tw_icon' ); ?>" value="<?php echo esc_attr( $tw_icon ); ?>">

			</p>


			<h4>LinkedIn</h4>
			<p>
				<label for="<?php echo $this->get_field_id( 'lk_link' ) ?>"><?php _e('Link'); ?></label>
				<input class="widefat" id="<?php $this->get_field_id( 'lk_link' ) ;?>" type="text" name="<?php echo $this->get_field_name( 'lk_link' ); ?>" value="<?php echo esc_attr( $lk_link ); ?>">

			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'lk_icon' ) ?>"><?php _e('Icon'); ?></label>
				<input class="widefat" id="<?php $this->get_field_id( 'lk_icon' ) ;?>" type="text" name="<?php echo $this->get_field_name( 'lk_icon' ); ?>" value="<?php echo esc_attr( $lk_icon ); ?>">

			</p>

			<h4>Google+</h4>
			<p>
				<label for="<?php echo $this->get_field_id( 'gl_link' ) ?>"><?php _e('Link'); ?></label>
				<input class="widefat" id="<?php $this->get_field_id( 'gl_link' ) ;?>" type="text" name="<?php echo $this->get_field_name( 'gl_link' ); ?>" value="<?php echo esc_attr( $gl_link ); ?>">

			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'gl_icon' ) ?>"><?php _e('Icon'); ?></label>
				<input class="widefat" id="<?php $this->get_field_id( 'gl_icon' ) ;?>" type="text" name="<?php echo $this->get_field_name( 'gl_icon' ); ?>" value="<?php echo esc_attr( $gl_icon ); ?>">

			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'icon_width' ) ?>"><?php _e('Icon Width'); ?></label>
				<input class="widefat" id="<?php $this->get_field_id( 'icon_width' ) ;?>" type="text" name="<?php echo $this->get_field_name( 'icon_width' ); ?>" value="<?php echo esc_attr( $icon_width ); ?>">

			</p>
		<?php
	}
	function getSocialLinks($links, $icons, $icon_width){
		?>
			<div class="kankoz-social-links">
				<a target="_blank" href="<?php echo esc_attr( $links['facebook'] );?>">
					<img width="<?php echo esc_attr( $icon_width ); ?>" src="<?php echo esc_attr( $icons['facebook'] ); ?>"/>
				</a>
				<a target="_blank" href="<?php echo esc_attr( $links['twitter'] );?>">
					<img width="<?php echo esc_attr( $icon_width ); ?>" src="<?php echo esc_attr( $icons['twitter'] ); ?>"/>
				</a>
				<a target="_blank" href="<?php echo esc_attr( $links['linkedin'] );?>">
					<img width="<?php echo esc_attr( $icon_width ); ?>" src="<?php echo esc_attr( $icons['linkedin'] ); ?>"/>
				</a>
				<a target="_blank" href="<?php echo esc_attr( $links['google'] );?>">
					<img width="<?php echo esc_attr( $icon_width ); ?>" src="<?php echo esc_attr( $icons['google'] ); ?>"/>
				</a>
			</div>
		<?php
}

}
// register KanKoz_Widget widget
function register_Kankoz_Social_Links_widget() {
    register_widget( 'kankoz_social_links_widget' );
}
add_action( 'widgets_init', 'register_Kankoz_Social_Links_widget' );


