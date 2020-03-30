<?php
/*Custom widget*/
class BC_LeftSidebar_Menu_widget extends WP_Widget {

   
    public function __construct() {

        $id = 'BC_LeftSidebar_Menu_widget';
        $title = esc_html__('BC Left Sidebar Navigation', 'bc-leftsidebar-menu-custom-widget');
        $options = array(
            'classname' => 'bc-leftsidebar-menu-markup-widget',
            'description' => esc_html__('Add Custom HTML in inputbox', 'bc-leftsidebar-menu-custom-widget')
        );
        parent::__construct( $id, $title, $options );
    }

    /**
     * Outputs the content for the current Navigation Menu widget instance.
     *
     * @since 3.0.0
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Navigation Menu widget instance.
     */
    public function widget( $args, $instance ) {
        // Get menu
        $nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

        if ( ! $nav_menu ) {
            return;
        }

        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
        // $page = ! empty( $instance['page'] ) ? $instance['page'] : '';
        
        // if(isset($page) && !empty($page) && $page == get_the_ID()):
        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        echo $args['before_widget'];

        $nav_menu_args = array(
            'fallback_cb' => '',
            'menu'        => $nav_menu,
        );
        
        $name = $nav_menu_args['menu']->name;
        $menu = get_term_by( 'name', $name , 'nav_menu' );
        $menu_items = wp_get_nav_menu_items($menu);
        if(isset($menu_items) && !empty($menu_items)):

        echo '<aside class="side-nav v1 light-bg border-radius-item box-shadow" id="SideNavV1" data-onvisible="show"><nav>';
        
        echo '<header class="text-left"><a href="javascript:void(0)"><h5>';
            if ( $title ) {
                echo $title;
            }else{
                echo 'About';   
            }
        echo '</h5></a></header>'
        ?> 

        <ul class="el-tab-box" role="menu" data-role="panel">
        <?php foreach ($menu_items as $key => $value) { ?>
            <li class="level-1">
                <a class="auto" role="menuitem" target="<?php echo $value->target ?>" href="<?php echo $value->url;?>">
                    <?php echo $value->title; ?>
                </a>
            </li>
        <?php }?>
        </ul>
        <?php 
        echo '</nav></aside>';
        endif;
        // endif;
        echo $args['after_widget'];
    }

    /**
     * Handles updating settings for the current Navigation Menu widget instance.
     *
     * @since 3.0.0
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings to save.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        if ( ! empty( $new_instance['title'] ) ) {
            $instance['title'] = sanitize_text_field( $new_instance['title'] );
        }
        // if ( ! empty( $new_instance['page'] ) ) {
        //     $instance['page'] = sanitize_text_field( $new_instance['page'] );
        // }
        if ( ! empty( $new_instance['nav_menu'] ) ) {
            $instance['nav_menu'] = (int) $new_instance['nav_menu'];
        }
        return $instance;
    }

    /**
     * Outputs the settings form for the Navigation Menu widget.
     *
     * @since 3.0.0
     *
     * @param array $instance Current settings.
     * @global WP_Customize_Manager $wp_customize
     */
    public function form( $instance ) {
        global $wp_customize;
        $title    = isset( $instance['title'] ) ? $instance['title'] : '';
        // $page    = isset( $instance['page'] ) ? $instance['page'] : '';
        $nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';

        // Get menus
        $menus = wp_get_nav_menus();

        $empty_menus_style     = '';
        $not_empty_menus_style = '';
        if ( empty( $menus ) ) {
            $empty_menus_style = ' style="display:none" ';
        } else {
            $not_empty_menus_style = ' style="display:none" ';
        }

        $nav_menu_style = '';
        if ( ! $nav_menu ) {
            $nav_menu_style = 'display: none;';
        }

        // If no menus exists, direct the user to go and create some.
        ?>
        <p class="nav-menu-widget-no-menus-message" <?php echo $not_empty_menus_style; ?>>
            <?php
            if ( $wp_customize instanceof WP_Customize_Manager ) {
                $url = 'javascript: wp.customize.panel( "nav_menus" ).focus();';
            } else {
                $url = admin_url( 'nav-menus.php' );
            }

            /* translators: %s: URL to create a new menu. */
            printf( __( 'No menus have been created yet. <a href="%s">Create some</a>.' ), esc_attr( $url ) );
            ?>
        </p>
        <div class="nav-menu-widget-form-controls" <?php echo $empty_menus_style; ?>>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>"/>
            </p>
            <p>
                <!-- <label for="<?php echo $this->get_field_id( 'page' ); ?>"><?php _e( 'Page Id:' ); ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'page' ); ?>" name="<?php echo $this->get_field_name( 'page' ); ?>" value="<?php echo esc_attr( $page ); ?>"/>
            </p>
            <p> -->
                <label for="<?php echo $this->get_field_id( 'nav_menu' ); ?>"><?php _e( 'Select Menu:' ); ?></label>
                <select id="<?php echo $this->get_field_id( 'nav_menu' ); ?>" name="<?php echo $this->get_field_name( 'nav_menu' ); ?>">
                    <option value="0"><?php _e( '&mdash; Select &mdash;' ); ?></option>
                    <?php foreach ( $menus as $menu ) : ?>
                        <option value="<?php echo esc_attr( $menu->term_id ); ?>" <?php selected( $nav_menu, $menu->term_id ); ?>>
                            <?php echo esc_html( $menu->name ); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </p>
            <?php if ( $wp_customize instanceof WP_Customize_Manager ) : ?>
                <p class="edit-selected-nav-menu" style="<?php echo $nav_menu_style; ?>">
                    <button type="button" class="button"><?php _e( 'Edit Menu' ); ?></button>
                </p>
            <?php endif; ?>
        </div>
        <?php
    }
}

function bc_leftsidebar_menu_register_widgets() {
    register_widget( 'BC_LeftSidebar_Menu_widget' );
}
add_action( 'widgets_init', 'bc_leftsidebar_menu_register_widgets' );