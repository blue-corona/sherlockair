<?php 

// BC Popular Posts Widget
class BC_Popular_Post_Widget extends WP_Widget {
    public function __construct() {
        $id = 'BC_Popular_Post_widget';
        $title = esc_html__('BC Popular Posts', 'bc-popular-post-widget');
        $options = array(
            'classname' => 'bc-popular-post-widget',
            'description' => esc_html__('Add Custom HTML in inputbox', 'bc-popular-post-widget')
        );
        parent::__construct( $id, $title, $options );
    }

    public function widget( $args, $instance ) {
        $widgetInstance = $this->id;
    ?>
    <aside class="side-nav v1 bg-box like-bg border-radius-item ui-repeater" id="BlogSystemV1SideNavPopularPosts">
        <nav>
            <header class="text-left">
            <?php 
            if ( isset( $instance['title'] ) && !empty($instance['title']) ) {
                echo $args['before_title'] . $instance['title'] . $args['after_title']; 
            }else{
                echo "<h5>Most Popular</h5>";
            }
            ?>
            </header>
            <ul role="menu">
                <?php
                    $popular_posts_args = array(
                       'posts_per_page' => 3,
                       'meta_key' => 'my_post_viewed',
                       'orderby' => 'meta_value_num',
                       'order'=> 'DESC'
                    );
                    $popular_posts_loop = new WP_Query( $popular_posts_args );
                    while( $popular_posts_loop->have_posts() ):
                       $popular_posts_loop->the_post();
                ?>
                    <li class="level-1" data-item="i" data-key="729333">
                        <a href="<?php the_permalink();?>" target="" role="menuitem"><?php the_title(); ?></a>
                    </li>
                <?php 
                    endwhile;
                    wp_reset_query();
                ?>
            </ul>
        </nav>
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
        $label = __( 'Title', 'bc-popular-post-widget' );
        $title = '<h2 class="text-center m-0 bc_alternate_font_blue">'.__( 'Testimonials', 'bc-popular-post-widget' ).'</h2>';
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
function bc_popular_post_register_widgets() {
    register_widget( 'BC_Popular_Post_Widget' );
}
add_action( 'widgets_init', 'bc_popular_post_register_widgets' );
