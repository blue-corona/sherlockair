<?php 
/*Custom widget*/
// BC Youtube Widget
class BC_Youtube_Widget extends WP_Widget {
    public function __construct() {

        $id = 'BC_Youtube_widget';
        $title = esc_html__('BC Youtube', 'bc-youtube-custom-widget');
        $options = array(
            'classname' => 'bc-youtube-markup-widget',
            'description' => esc_html__('Add Youtube Embed Url', 'bc-youtube-custom-widget')
        );
        parent::__construct( $id, $title, $options );
    }
    
    public function widget( $args, $instance ) {
    	echo $args['before_widget'];
        ?>
   	<div class="mt-5">
	    <div class="bc_promotions text-center mt-4">
		<?php 
		if ( isset( $instance['title'] ) && !empty($instance['title']) ) {
			echo $args['before_title'] . $instance['title'] . $args['after_title']; 
		}else{
			echo "<h2 class='text-center bc_font_default mb-3 bc_color_quinary text-uppercase bc_text_30 bc_text_bold'>Learn More about  the plan benefits!</h2>";
		}

		// echo $instance['youtube_url'];die('ss');
		?>
	        <iframe class=" preferred_widget_shadow" width="auto" height="270" src="<?php echo $instance['youtube_url'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	    </div>
	</div>
    <?php echo $args['after_widget'];
    }
    public function update( $new_instance, $old_instance ) {
		$instance = array();
		if ( isset( $new_instance['title'] ) && ! empty( $new_instance['title'] ) ) {
			$instance['title'] = $new_instance['title'];
		}

		if ( isset( $new_instance['youtube_url'] ) && ! empty( $new_instance['youtube_url'] ) ) {
			$instance['youtube_url'] = $new_instance['youtube_url'];
		}
		return $instance;
	}
	public function form( $instance ) {
		$id = $this->get_field_id( 'title' );
		$for = $this->get_field_id( 'title' );
		$name = $this->get_field_name( 'title' );
		$label = __( 'Title', 'bc-youtube-custom-widget-widget' );
		$title = '<h2 class="text-center bc_font_default mb-3 bc_color_quinary text-uppercase bc_text_30 bc_text_bold">'.__( 'Learn More about  the plan benefits!', 'bc-youtube-custom-widget-widget' ).'</h2>';
		if ( isset( $instance['title'] ) && ! empty( $instance['title'] ) ) {
			$title = $instance['title'];
		}
		?>
		<p>
			<label for="<?php echo esc_attr( $for ); ?>"><?php echo esc_html( $label ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>"><?php echo esc_textarea( $title ); ?></textarea>
		</p>

		<?php 
		$y_id = $this->get_field_id( 'youtube_url' );
		$y_for = $this->get_field_id( 'youtube_url' );
		$y_name = $this->get_field_name( 'youtube_url' );
		$y_label = __( 'Youtube Embed Url', 'bc-youtube-custom-widget-widget' );
		$y_title = 'https://www.youtube.com/embed/TLzkou9-lKY';
		if ( isset( $instance['youtube_url'] ) && ! empty( $instance['youtube_url'] ) ) {
			$y_title = $instance['youtube_url'];
		}?>
		<p>
			<label for="<?php echo esc_attr( $y_for ); ?>"><?php echo esc_html( $y_label ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $y_id ); ?>" name="<?php echo esc_attr( $y_name ); ?>"><?php echo esc_textarea( $y_title ); ?></textarea>
		</p>
<?php }
}
// register widget
function bc_youtube_register_widgets() {
    register_widget( 'BC_Youtube_Widget' );
}
add_action( 'widgets_init', 'bc_youtube_register_widgets' );
?>
