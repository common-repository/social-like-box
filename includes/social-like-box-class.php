<?php
/**
 * Adds FB Page Like widget.
 */
class SLBOX_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'slbox_Widget', // Base ID
			esc_html__( 'Social Like Box', 'social_like_box' ), // Name
			array( 'description' => esc_html__( 'Widget to display Facebook Page Like Box', 'social_like_box' ), ) // Args
		);
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
		$data = array();
		$data['title'] = apply_filters( 'widget_title', $instance['title'] );
		$data['page_url'] = esc_attr($instance['page_url']);
		$data['width'] = esc_attr($instance['width']);
		$data['height'] = esc_attr($instance['height']);
		$data['small_header'] = esc_attr($instance['small_header']);
		$data['tabs'] = esc_attr($instance['tabs']);
		
		
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		echo $this->slbox_getFblike($data);
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form($instance) {
		$this->slbox_getForm($instance);
		
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
		$instance = array();	
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['page_url'] = ( ! empty( $new_instance['page_url'] ) ) ? sanitize_text_field( $new_instance['page_url'] ) : '';
		$instance['width'] = ( ! empty( $new_instance['width'] ) ) ? sanitize_text_field( $new_instance['width'] ) : '';
		$instance['height'] = ( ! empty( $new_instance['height'] ) ) ? sanitize_text_field( $new_instance['height'] ) : '';
		$instance['small_header'] = ( ! empty( $new_instance['small_header'] ) ) ? sanitize_text_field( $new_instance['small_header'] ) : '';
		$instance['tabs'] = ( ! empty( $new_instance['tabs'] ) ) ? sanitize_text_field( $new_instance['tabs'] ) : '';

		return $instance;
	}
	
	public function slbox_getFblike($data){
		$output = '<div id="fb-root"></div>';
		
		$output .= '<div class="fb-page" 
		data-href= "'.$data["page_url"].'"
		data-width= "'.$data["width"].'"
		data-height= "'.$data["height"].'"
		data-small-header= "'.$data["small_header"].'"
		data-tabs= "'.$data["tabs"].'"></div>';
		
		return $output;
	 }
	
	public function slbox_getForm($instance){
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'FB Page Like', 'social_like_box' );
		$page_url = ! empty( $instance['page_url'] ) ? $instance['page_url'] : esc_html__( '', 'social_like_box' );
		$width = ! empty( $instance['width'] ) ? $instance['width'] : esc_html__( '300', 'social_like_box' );
		$height = ! empty( $instance['height'] ) ? $instance['height'] : esc_html__( '300', 'social_like_box' );
		$small_header = ! empty( $instance['small_header'] ) ? $instance['small_header'] : esc_html__( 'false', 'social_like_box' );
		$tabs = ! empty( $instance['tabs'] ) ? $instance['tabs'] : esc_html__( 'timeline', 'social_like_box' );
		
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
			<?php esc_attr_e( 'Title:', 'social_like_box' ); ?>
		</label> 
		<input 
			   class="SLBOX_widefat" 
			   id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
			   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
			   type="text" 
			   value="<?php echo esc_attr( $title ); ?>"
			   >
		</p>
       
       <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'page_url' ) ); ?>">
			<?php esc_attr_e( 'Facebook Page Url:', 'social_like_box' ); ?>
		</label> 
		<input 
			   class="SLBOX_widefat" 
			   id="<?php echo esc_attr( $this->get_field_id( 'page_url' ) ); ?>" 
			   name="<?php echo esc_attr( $this->get_field_name( 'page_url' ) ); ?>" 
			   type="text" 
			   value="<?php echo esc_attr( $page_url ); ?>"
			   >
		</p>
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'width' ) ); ?>">
			<?php esc_attr_e( 'Width:', 'social_like_box' ); ?>
		</label> 
		<input 
			   class="SLBOX_widefat" 
			   id="<?php echo esc_attr( $this->get_field_id( 'width' ) ); ?>" 
			   name="<?php echo esc_attr( $this->get_field_name( 'width' ) ); ?>" 
			   type="text" 
			   value="<?php echo esc_attr( $width ); ?>"
		       >
		</p>
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>">
			<?php esc_attr_e( 'Height:', 'social_like_box' ); ?>
		</label> 
		<input 
			   class="SLBOX_widefat" 
			   id="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>" 
			   name="<?php echo esc_attr( $this->get_field_name( 'height' ) ); ?>" 
			   type="text" 
			   value="<?php echo esc_attr( $height ); ?>"
			   >
		</p>
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'small_header' ) ); ?>">
			<?php esc_attr_e( 'Small Header:', 'social_like_box' ); ?>
		</label>
		<select class="SLBOX_widefat" 
				id="<?php echo esc_attr( $this->get_field_id( 'small_header' ) ); ?>" 
				name="<?php echo esc_attr( $this->get_field_name( 'small_header' ) ); ?>" 
				type="text">
			<option value="true" <?php echo ($small_header == 'true')?'selected':''; ?>>True</option>
			<option value="false" <?php echo ($small_header == 'false')?'selected':''; ?>>False</option>
		</select>
		</p>

        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'tabs' ) ); ?>">
			<?php esc_attr_e( 'Tabs:', 'social_like_box' ); ?>
		</label> 
		<input 
			   class="SLBOX_widefat" 
			   id="<?php echo esc_attr( $this->get_field_id( 'tabs' ) ); ?>" 
			   name="<?php echo esc_attr( $this->get_field_name( 'tabs' ) ); ?>" 
			   type="text" 
			   value="<?php echo esc_attr( $tabs ); ?>"
			   >
		</p>

		<?php
	}

	

} // class social_like_box_Widget

