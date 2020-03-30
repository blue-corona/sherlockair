<?php 
/*Custom widget*/
// BC Promotions Widget
class BC_Promotions_Widget extends WP_Widget {
	public function __construct() {

		$id = 'BC_Promotions_widget';
		$title = esc_html__('BC Promotions Widget', 'bc-promotion-custom-widget');
		$options = array(
			'classname' => 'bc-promotion-markup-widget',
			'description' => esc_html__('Add Custom HTML in inputbox', 'bc-promotion-custom-widget')
		);
		parent::__construct( $id, $title, $options );
	}
	

public function widget( $args, $instance ) {
	//Add JS for widget to footer
	$widgetInstance = $this->id;
	add_action('wp_footer', function() use ( $widgetInstance ) { });

?>
<aside class="vertical-padding-tiny side-coupon v1 light-bg bg-box-like no-shadow" id="<?php echo $this->id ?> SideCouponV1" data-onvisible="show" data-role="scroller">
   <div id="SideCouponV1List" class="ui-repeater" data-role="container">
      <ul class="flex-" data-role="list">
		<?php 
		$promotions_args  = array( 'post_type' => 'bc_promotions', 'posts_per_page' => -1, 'order'=> 'DESC','post_status'  => 'publish');
        $query = new WP_Query( $promotions_args );
        if ( $query->have_posts() ) :
            while($query->have_posts()) : $query->the_post();

	        $promotion_type = get_post_meta(get_the_ID(), 'promotion_type', TRUE);
	        if($promotion_type == 'Builder'){
				$date = get_post_meta( get_the_ID(), 'promotion_expiry_date1', true );
		        if(strtotime($date) >= strtotime(current_time('m/d/Y'))){
		        	$title = get_post_meta( get_the_ID(), 'promotion_title1', true );
					$color = get_post_meta( get_the_ID(), 'promotion_color', true );
					$subheading = get_post_meta( get_the_ID(), 'promotion_subheading', true );
					$footer_heading = get_post_meta( get_the_ID(), 'promotion_footer_heading', true ); ?>
					<li class="flex- coupon-style full border-radius" data-role="item" data-item="i" data-key="4093">
			            <div class="bg-box info flex-column-middle-center side-padding-large vertical-padding relative coupon-border pseudo-after text-center full">
			               <picture class="img-bg" role="presentation">
			                  <source media="(max-width: 500px)" srcset="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src=""/>
			                  <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="" data-src="">
			               </picture>
			               <div class="full side-padding-small">
			                  <strong class="title">
			                  <strong class="title-font"><?php echo $title ?></strong>
			                  <span class="title-style-2 title-color-2"><?php echo $subheading;?></span>
			                  </strong>
			                  <p class="title-style-5 title-color-5 top-margin-tiny no-bottom-margin description"><?php echo $footer_heading;?></p>
			                  <div class="top-margin-tiny valid note-style">
			                     <small>Valid until <?php echo $date;?></small>
			                  </div>
			                  <div class="top-margin-small">
			                     <a class="btn v1" href="<?php the_permalink(get_the_ID());?>" target="_blank">Print</a>
			                  </div>
			               </div>
			            </div>
			         </li>
		        <?php }
	        }?>
        <?php
        	endwhile; 
        wp_reset_query();
    	endif;
    	?>
		</ul>
      <div class="scrolling-list-nav top-margin horizontal flex-middle-center relative text-center" data-role="arrows">
         <button title="View previous item" aria-label="View previous item" data-action="Prev">
            <svg class="site-arrow" data-use="<?php echo get_stylesheet_directory_uri();?>/includes/flair.svg#arrow-left">
            </svg>
         </button>
         <span class="paging" data-role="paging">
         <span data-role="page-active"></span> / <span data-role="page-total"></span>
         </span>
         <button title="View next item" aria-label="View next item" data-action="Next">
            <svg class="site-arrow" data-use="<?php echo get_stylesheet_directory_uri();?>/includes/flair.svg#arrow-right">
            </svg>
         </button>
      </div>
      <div id="SideCouponV1BtnCon">
      </div>
   </div>
</aside>
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
		$label = __( 'Title', 'bc-promotion-custom-widget' );
		$title = '';
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
function bc_promotions_register_widgets() {
	register_widget( 'BC_Promotions_Widget' );
}
add_action( 'widgets_init', 'bc_promotions_register_widgets' );
