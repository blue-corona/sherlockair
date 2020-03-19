<?php 

// BC Categories Widget
class BC_Categories_Widget extends WP_Widget {
    public function __construct() {
        $id = 'BC_Categories_widget';
        $title = esc_html__('BC Categories', 'bc-categories-widget');
        $options = array(
            'classname' => 'bc-categories-widget',
            'description' => esc_html__('Add Custom HTML in inputbox', 'bc-categories-widget')
        );
        parent::__construct( $id, $title, $options );
    }

    public function widget( $args, $instance ) {
        $widgetInstance = $this->id;
    ?>

    <aside class="side-nav v1 bg-box like-bg border-radius-item ui-repeater" id="BlogSystemV1SideNavCategories">
        <nav>
            <header class="text-left">
            <?php 
            if ( isset( $instance['title'] ) && !empty($instance['title']) ) {
                echo $args['before_title'] . $instance['title'] . $args['after_title']; 
            }else{
                echo "<h5>Categories</h5>";
            }
            ?>
            </header>
            <ul role="menu">
            <?php
            // Get the current queried object
            $term    = get_queried_object();
            $term_id = ( isset( $term->term_id ) ) ? (int) $term->term_id : 0;

            $categories = get_categories( array(
                'taxonomy'   => 'category', // Taxonomy to retrieve terms for. We want 'category'. Note that this parameter is default to 'category', so you can omit it
                'orderby'    => 'name',
                'parent'     => 0,
                'hide_empty' => 0, // change to 1 to hide categores not having a single post
            ) );
            
            foreach ( $categories as $category ) 
            {
                $cat_ID        = (int) $category->term_id;
                $category_name = $category->name;
                $cat_class = ( $cat_ID == $term_id ) ? 'active' : 'not-active';
                if ( strtolower( $category_name ) != 'uncategorized' )
                {
            ?>
                <li class="level-1 <?php echo $cat_class;?>" data-item="i">
                    <a href="<?php echo get_category_link( $category->term_id );?>" target="" role="menuitem"><?php echo $category->name;?></a>
                </li>
                <?php 
                }
            }
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
        $label = __( 'Title', 'bc-categories-widget' );
        $title = '<h2 class="text-center m-0 bc_alternate_font_blue">'.__( 'Testimonials', 'bc-categories-widget' ).'</h2>';
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
function bc_categories_register_widgets() {
    register_widget( 'BC_Categories_Widget' );
}
add_action( 'widgets_init', 'bc_categories_register_widgets' );
