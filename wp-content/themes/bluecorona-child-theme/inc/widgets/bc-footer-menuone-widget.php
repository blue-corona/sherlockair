<?php
/*Custom widget*/
// BC Footer Menuone Widget
class BC_Footer_Menuone_widget extends WP_Widget {

   
    public function __construct() {

        $id = 'BC_Footer_Menuone_widget';
        $title = esc_html__('BC Navigation Menu (Footer)', 'bc-footer-menuone-custom-widget');
        $options = array(
            'classname' => 'bc-footer-menuone-markup-widget',
            'description' => esc_html__('Add Custom HTML in inputbox', 'bc-footer-menuone-custom-widget')
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
        $shortcodebelow = ! empty( $instance['shortcodebelow'] ) ? $instance['shortcodebelow'] : '';

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

        echo '<nav class="footer-nav auto" id="FooterV8Links">';
        ?>
        <ul class="flex-grid-wrap-middle center-1024">
        <?php foreach ($menu_items as $key => $value) { ?>
            <li class="fit">
                <a class="" target="<?php echo $value->target ?>" href="<?php echo $value->url;?>">
                    <?php echo $value->title; ?>
                </a>

            </li>
        <?php }?>
            <li class="fit">
            <a class="no_hover_underline bc_text_16 bc_sm_text_15" href="#" data-toggle="modal" data-target="#disclaimer">Disclaimer</a>
            </li>
        </ul>
        <?php 
        echo '</nav>';
        echo '<div class="social-info fit left-margin-large ui-repeater" maxresults="8" id="FooterV8Social"><ul class="flex-grid-small-wrap-end center-1024">';
        if(!empty($shortcodebelow)) {do_shortcode($shortcodebelow); }
        echo '</nav></div>';
        endif;
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
        if ( ! empty( $new_instance['nav_menu'] ) ) {
            $instance['nav_menu'] = (int) $new_instance['nav_menu'];
        }

        if ( ! empty( $new_instance['shortcodebelow'] ) ) {
            $instance['shortcodebelow'] = sanitize_text_field( $new_instance['shortcodebelow']);
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
        $nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';
        $shortcodebelow = isset( $instance['shortcodebelow'] ) ? $instance['shortcodebelow'] : '';

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
            <p>
                <label for="<?php echo $this->get_field_id( 'shortcodebelow' ); ?>"><?php _e( 'Shortcode below widget:' ); ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'shortcodebelow' ); ?>" name="<?php echo $this->get_field_name( 'shortcodebelow' ); ?>" value="<?php echo esc_attr( $shortcodebelow ); ?>"/>
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

function bc_footer_menuone_register_widgets() {
    register_widget( 'BC_Footer_Menuone_widget' );
}
add_action( 'widgets_init', 'bc_footer_menuone_register_widgets' );