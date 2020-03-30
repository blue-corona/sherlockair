<?php 
/*Custom widget*/
// BC Footer Address Widget
class BC_Footer_Address_Widget extends WP_Widget {
    public function __construct() {

        $id = 'BC_Footer_Address_widget';
        $title = esc_html__('BC Footer Identity', 'bc-footer-address-custom-widget');
        $options = array(
            'classname' => 'bc-footer-address-markup-widget',
            'description' => esc_html__('Add Custom HTML in inputbox', 'bc-footer-address-custom-widget')
        );
        parent::__construct( $id, $title, $options );
    }
    
    public function widget( $args, $instance ) {
        extract($args);
        $before_widget = str_replace('d-none', '', $before_widget);
        echo $before_widget;
        ?>
        <div class="three-fifths flex-spaced-between-margined-auto-responsive">
            <div class="schema-info text-center two-fifths">
              <div class="business-info bottom-margin-tiny">
                <img class="dark-logo bottom-logo" style="margin-left: auto; margin-right: auto;" src="<?php echo get_stylesheet_directory_uri();?>/images/logos/Logo.png">
                <img class="light-logo bottom-logo" style="margin-left: auto; margin-right: auto;" alt="Sherlock Plumbing, Heating and Air" title="Sherlock Plumbing, Heating and Air" src="<?php echo get_stylesheet_directory_uri();?>/images/logos/Logo2.png">
              </div>
              <a class="phone-link phone-number-style" href="tel:<?php echo bc_get_theme_mod('bc_theme_options', 'bc_phone',false, '760-206-4167');?>" id="FooterV3_1"><span itemprop="telephone"><span id="FooterV3_2"><?php echo bc_get_theme_mod('bc_theme_options', 'bc_phone',false, '760-206-4167');?></span></span></a>
              <div id="FooterV3OptionalBadge"></div>
            </div>
           <div class="location-info two-fifths center-800">
              <div id="FooterV3LocationHeader">
                 <strong class="title-style-5 title-color-5 bottom-margin-tiny">Local Office</strong>
              </div>
              <p class="no-top-margin no-bottom-margin" itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
                 <span itemprop="streetAddress">
                 2880 Scott Street
                 <br>Suite #104
                 </span>
                 <br>
                 <span itemprop="addressLocality">Vista</span>,
                 <span itemprop="addressRegion">CA </span>
                 <span itemprop="postalCode">92081</span><br>
                 <a rel="nofollow noopener" target="_blank" href="https://maps.google.com/maps?f=q&amp;hl=en&amp;z=15&amp;q=2880%20Scott%20Street,Vista,CA,92081">Map &amp; Directions [+]</a>
              </p>
           </div>
        </div>
    <?php echo $args['after_widget'];
    }
}
// register widget
function bc_footer_address_register_widgets() {
    register_widget( 'BC_Footer_Address_Widget' );
}
add_action( 'widgets_init', 'bc_footer_address_register_widgets' );
?>
