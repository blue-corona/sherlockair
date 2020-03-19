<?php 

// BC Testimonials Widget
class BC_Testimonials_Widget extends WP_Widget {
	public function __construct() {
		$id = 'BC_Testimonials_widget';
		$title = esc_html__('BC Testimonials', 'bc-testimonial-custom-widget');
		$options = array(
			'classname' => 'bc-testimonial-markup-widget',
			'description' => esc_html__('Add Custom HTML in inputbox', 'bc-testimonial-custom-widget')
		);
		parent::__construct( $id, $title, $options );
	}

	function addSwiperInitTestimonialJsToFooter($instance){
		echo "
		<script>
		var sidebarTestimonialSwiper = new Swiper('#".$instance."', {
		pagination: false,
		loop:true,
		navigation: {
			nextEl: '.bc_testimonial_swiper_next',
			prevEl: '.bc_testimonial_swiper_prev',
		},
		autoHeight: true,
		});
		</script>
		";
	}

	public function widget( $args, $instance ) {
		//Add JS for widget to footer
		$widgetInstance = $this->id;
		add_action('wp_footer', function() use ( $widgetInstance ) { 
        $this->addSwiperInitTestimonialJsToFooter( $widgetInstance ); });
	?>
	<div class="mt-5">
		<?php 
		if ( isset( $instance['title'] ) && !empty($instance['title']) ) {
			echo $args['before_title'] . $instance['title'] . $args['after_title']; 
		}else{
			echo "<h2 class='text-center bc_font_default m-0 bc_color_quinary text-uppercase bc_text_30 bc_text_bold'>Here's What Over 2,000 Customers Are Saying!</h2>";
		}
		?>
		<!-- review stars -->
		<p class="text-center mt-3 text-warning">
			<i aria-hidden="true" class="fa fa-star"></i>
			<i aria-hidden="true" class="fa fa-star"></i>
			<i aria-hidden="true" class="fa fa-star"></i>
			<i aria-hidden="true" class="fa fa-star"></i>
			<i aria-hidden="true" class="fa fa-star"></i>	
		</p>
		
		<!-- before pase -->
		<div id="<?php echo $this->id ?>" class="bc_testimonial_photos_swiper swiper-container text-center my-4">
			<div class="swiper-wrapper text-center">
			<?php 
			$testimonial_args  = array( 'post_type' => 'bc_testimonials', 'posts_per_page' => -1, 'order'=> 'DESC','post_status'  => 'publish');

	        $query = new WP_Query( $testimonial_args );
	        if ( $query->have_posts() ) :
	            while($query->have_posts()) : $query->the_post();
	        $title = get_post_meta( get_the_ID(), 'testimonial_title', true );
	        $message = get_post_meta( get_the_ID(), 'testimonial_message', true );
	        $image = get_post_meta( get_the_ID(), 'testimonial_custom_image', true );
        	?>
			<div class="swiper-slide">
				<div class="row">
					<div class="col-sm-12">
		                <p class="bc_color_primary mb-0 bc_text_18 bc_line_height_28"><?php echo $message;?></p>
		                <p class="bc_alternate_font_blue my-3">~ <?php the_title();?></p>
	                </div>
				</div>
			</div>
			<?php
	            endwhile; 
	            wp_reset_query();
        	endif;?>
			</div>
			<ul class=" list-unstyled mt-2">
	            <li class="list-inline-item bc_testimonial_swiper_prev bc_swiper-button-prev"> <em class="fa fa-chevron-circle-left"></em> </li>
	            <li class="list-inline-item bc_testimonial_swiper_next bc_swiper-button-next"> <em class="fa fa-chevron-circle-right"></em> </li>
	        </ul>
		</div>
		<div class="text-center"><button onclick="window.location.href='/reviews';" class="btn bc_color_secondary_bg bc_color_testimonial_btn_hover_bg bc_color_white px-4 bc_font_alt_1 bc_text_16" type="button">View More Reviews</button></div>
	</div>
<?php echo $args['after_widget'];
}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		if ( isset( $new_instance['title'] ) && ! empty( $new_instance['title'] ) ) {
			$instance['title'] = $new_instance['title'];
		}
		return $instance;
	}
	public function form( $instance ) {
		$id = $this->get_field_id( 'title' );
		$for = $this->get_field_id( 'title' );
		$name = $this->get_field_name( 'title' );
		$label = __( 'Title', 'bc-testimonial-custom-widget' );
		$title = '<h2 class="text-center m-0 bc_alternate_font_blue">'.__( 'Testimonials', 'bc-testimonial-custom-widget' ).'</h2>';
		if ( isset( $instance['title'] ) && ! empty( $instance['title'] ) ) {
			$title = $instance['title'];
		}
		?>
		<p>
			<label for="<?php echo esc_attr( $for ); ?>"><?php echo esc_html( $label ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>"><?php echo esc_textarea( $title ); ?></textarea>
		</p>
<?php }
}
// register widget
function bc_testimonials_register_widgets() {
	register_widget( 'BC_Testimonials_Widget' );
}
add_action( 'widgets_init', 'bc_testimonials_register_widgets' );
