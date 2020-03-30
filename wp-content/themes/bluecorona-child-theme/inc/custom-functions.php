<?php
/*Define Excerpt Lenght*/
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function custom_excerpt_length( $length ) {
    global $post;
    return 25;
}
/*Hard crop Image for blog post page*/
add_theme_support( 'post-thumbnails' );
add_image_size( 'blogpost-thumbnail', 250, 170, true ); // Hard Crop Mode

/*Create custom field (title) for pages, post, custom posts */
add_action( 'add_meta_boxes', 'bc_create_title_overlay_metabox' );
function bc_create_title_overlay_metabox() {
global $post;
    if(!in_array($post->post_type, array('bc_affiliations','bc_testimonials','bc_schemas') )){
        add_meta_box(
            'bc_title_overlay',
            'Hero Overlay text',
            'bc_title_overlay',
            '',
            'normal'
        );
    }
}
function bc_title_overlay() {
global $post;
$title = get_post_meta( $post->ID, 'title_overlay', true );?>
<textarea class="form-control" rows="6" cols="85" name="bc_title_overlay_heading" id="title"><?= $title ?></textarea>
<?php
wp_nonce_field( 'bc_title_overlay_metabox_nonce', 'bc_title_overlay_metabox_process' );
}
/** Save the metabox */
add_action( 'save_post', 'bc_save_title_overlay', 1, 2 );
function bc_save_title_overlay( $post_id, $post ) {
    if ( !isset( $_POST['bc_title_overlay_metabox_process'] ) ) return;
    if ( !wp_verify_nonce( $_POST['bc_title_overlay_metabox_process'], 'bc_title_overlay_metabox_nonce' ) ) {
        return $post->ID;
    }
    if ( !current_user_can( 'edit_post', $post->ID )) {
        return $post->ID;
    }
    if ( !isset( $_POST['bc_title_overlay_heading'] ) ) {
        return $post->ID;
    }
    $sanitizedtitle = wp_filter_post_kses( $_POST['bc_title_overlay_heading'] );
    update_post_meta( $post->ID, 'title_overlay', $sanitizedtitle );
}

add_filter( 'gform_submit_button', 'add_custom_css_class', 10, 2 );
function add_custom_css_class( $button, $form ) {
    if ($form['id'] != 3) return $button;
    $dom = new DOMDocument();
    $dom->loadHTML( '<?xml encoding="utf-8" ?>' . $button );
    $input = $dom->getElementsByTagName( 'input' )->item(0);
    $classes = $input->getAttribute( 'class' );
    $classes .= " mt-3";
    $input->setAttribute( 'class', $classes );
    
    return $dom->saveHtml( $input );
}

// Button Style 
add_action( 'wp_head', 'button_style');
function button_style($wp_customize){?>
<style type="text/css">
input[type=button], input[type=submit], input[type=reset],button {
background-color: <?php echo bc_get_theme_mod('bc_theme_options', 'bc_button_color',false, '#00395e');?> ;color: <?php echo bc_get_theme_mod('bc_theme_options', 'bc_button_text_color',false, '#00395e');?>;
}input:hover[type=button], input:hover[type=submit], input:hover[type=reset],button:hover{
background-color: <?php echo bc_get_theme_mod('bc_theme_options', 'bc_button_hover_color',false, '#00395e');?> ;color: <?php echo bc_get_theme_mod('bc_theme_options', 'bc_button_text_hover_color',false, '#00395e');?>;}
</style>
<?php 
}

// Function to set the theme customizer mod values
function bc_get_theme_mod($setting, $key1 = false, $key2 = false, $default = false){
    $theme_mod = get_theme_mod($setting);
    if($key1 && !$key2) {
        if (isset($theme_mod[$key1]) && !empty($theme_mod[$key1])){
            return $theme_mod[$key1];
        } else {
            return $default;
        }
    } else if ($key2) {
        if (isset($theme_mod[$key1][$key2]) && !empty($theme_mod[$key1][$key2])){
            return $theme_mod[$key1][$key2];
        }else{
            return $default;
        }
    }
    return get_theme_mod($setting, $default);
}

/*Shortcode for social media icons*/
add_shortcode( 'social-icons', 'bc_social_shortcode' );
function bc_social_shortcode () {?>
        <li class="fit">
            <a class="btn-colors social-link" href="https://www.facebook.com/sherlockair/" title="Facebook" aria-label="Facebook" target="_blank" rel="noopener">

            <svg viewBox="0 0 36 36" data-use="<?php echo get_stylesheet_directory_uri()?>/cms/svg/admin/pxsy0eemvwl.36.svg#facebook">
            <path d="M20.762 0C14.563 0 13.152 4.601 13.152 7.544L13.152 11.658L9.562 11.658L9.562 18.016L13.144 18.016C13.144 26.175 13.144 36 13.144 36L20.684 36C20.684 36 20.684 26.076 20.684 18.016L25.77 18.016L26.438 11.658L20.692 11.658L20.692 7.924C20.692 6.517 21.628 6.191 22.287 6.191L26.345 6.191L26.345 0.024L20.762 0Z"></path>
            </svg>
            </a>
        </li>
        <li class="fit">
            <a class="btn-colors social-link" href="https://www.bbb.org/us/ca/vista/profile/air-conditioning-repair/sherlock-plumbing-heating-air-1126-15026872" title="BBB.org" aria-label="BBB.org" target="_blank" rel="noopener">
                                
            <svg viewBox="0 0 36 36" data-use="<?php echo get_stylesheet_directory_uri()?>/cms/svg/admin/pxsy0eemvwl.36.svg#bbb">
            <path d="M13.451 14.864L10.737 18.225a4.261 4.261 0 0 0 0.914 5.882l4.982 3.27c0.854 0.555 0.932 1.111 0.51 1.709l0.721 0.496l2.521-3.182A4.05 4.05-0.049 0 0 19.452 20.236L14.484 16.907a1.079 1.079 0 0 1-0.33-1.575L13.451 14.864ZM17.74 0L13.556 5.249a6.107 6.107 0 0 0 1.501 8.459l6.884 4.591a3.284 3.284 0 0 1 0.555 4.5l0.584 0.404l4.757-6.001a6.001 6.001 0 0 0-1.336-9L19.062 3.343a1.934 1.934 0 0 1-0.689-2.999L17.74 0ZM6.701 33.001H12.326L14.2 36h7.499l1.874-2.999H29.201l-1.874-1.501H8.575L6.701 33.001Z"></path>
            </svg>
            </a>

        </li>
        <li class="fit">
            <a class="btn-colors social-link" href="https://www.instagram.com/sherlockhvac/" title="Instagram" aria-label="Instagram" target="_blank" rel="noopener">

            <svg viewBox="0 0 36 36" data-use="<?php echo get_stylesheet_directory_uri()?>/cms/svg/admin/pxsy0eemvwl.36.svg#instagram">
            <path d="M25.283 35.997L10.737 35.997C4.816 35.989 0.018 31.191 0.01 25.271L0.01 10.723C0.018 4.802 4.816 0.006 10.737-0.002L25.283-0.002C31.204 0.006 36.001 4.802 36.01 10.723L36.01 25.271C36.001 31.191 31.204 35.989 25.283 35.997ZM32.385 10.723C32.388 6.802 29.213 3.62 25.291 3.615C25.289 3.615 25.287 3.615 25.283 3.615L10.737 3.615C6.815 3.615 3.636 6.794 3.636 10.715L3.636 25.271C3.636 29.192 6.815 32.371 10.737 32.371L25.283 32.371C29.205 32.371 32.385 29.192 32.385 25.271L32.385 10.723ZM27.342 10.987C26.093 10.987 25.08 9.975 25.08 8.726C25.08 7.477 26.093 6.464 27.342 6.464C28.59 6.464 29.603 7.477 29.603 8.726C29.603 9.975 28.59 10.987 27.342 10.987ZM18.01 27.305C12.869 27.305 8.701 23.138 8.701 17.997C8.701 12.856 12.869 8.688 18.01 8.688C23.151 8.688 27.319 12.856 27.319 17.997C27.311 23.135 23.148 27.298 18.01 27.305ZM18.01 12.306C14.867 12.306 12.319 14.854 12.319 17.997C12.319 21.14 14.867 23.688 18.01 23.688C21.153 23.688 23.701 21.14 23.701 17.997C23.701 14.854 21.153 12.306 18.01 12.306Z"></path>
            </svg>
            </a>
        </li>
        <li class="fit">
            <a class="btn-colors social-link" href="https://www.homeadvisor.com/rated.SherlockHeatingandAir.23896709.html" title="HomeAdvisor" aria-label="HomeAdvisor" target="_blank" rel="noopener">

            <svg viewBox="0 0 36 36" data-use="<?php echo get_stylesheet_directory_uri()?>/cms/svg/admin/pxsy0eemvwl.36.svg#home_advisor">
            <path d="M25.2 16.239l-10.8-10.501l-10.8 10.501H0L12.6 3.997h10.8L36 16.239ZM23.4 17.993h7.2v3.495A4.38 4.38 0 0 1 27 24.996H23.4v7.007l-7.2-7.007H9a4.38 4.38 0 0 1-3.6-3.495V17.993l9-8.743Z"></path>
            </svg>
            </a>
            
        </li>
        <li class="fit">
            <a class="btn-colors social-link" href="https://www.yelp.com/biz/sherlock-plumbing-heating-and-air-vista" title="Yelp" aria-label="Yelp" target="_blank" rel="noopener">
            <svg viewBox="0 0 36 36" data-use="<?php echo get_stylesheet_directory_uri()?>/cms/svg/admin/pxsy0eemvwl.36.svg#yelp">
            <path d="M4.353 24.667a1.628 1.628 0 0 0 1.371 0.889H5.815A45.635 45.635-0.063 0 0 11.736 23.791l2.412-0.752a1.779 1.779 0 0 0 1.311-1.688A1.853 1.853-0.063 0 0 14.299 19.421l-1.702-0.679h0C6.448 16.408 6.416 16.408 6.068 16.331a1.628 1.628 0 0 0-1.508 0.784a12.495 12.495 0 0 0-0.679 5.938A4.701 4.701-0.063 0 0 4.353 24.667Zm12.885-0.074a1.944 1.944 0 0 0-2.201 0.496l-1.086 1.266l-0.105 0.12C9.552 31.357 9.535 31.48 9.415 31.737a1.403 1.403 0 0 0-0.091 0.664a1.659 1.659 0 0 0 0.408 0.904A13.789 13.789-0.063 0 0 16.651 36.002l0.376 0a1.614 1.614 0 0 0 1.297-1.009c0.12-0.316 0.12-0.348 0.137-6.117 0 0 0-2.398 0-2.472A1.765 1.765-0.063 0 0 17.238 24.575ZM17.628 1.202v0a1.628 1.628 0 0 0-1.252-1.132C14.689-0.362 8.526 1.34 7.334 2.514a1.596 1.596 0 0 0-0.454 1.596c0.179 0.362 6.887 10.656 7.657 11.817s1.403 1.614 2.169 1.614a1.747 1.747 0 0 0 0.513-0.074c0.963-0.285 1.403-1.206 1.325-2.728C18.458 12.354 17.719 1.73 17.628 1.202Zm4.205 19.277a2.05 2.05 0 0 1-1.206-0.858a1.719 1.719 0 0 1 0-2.109l1.508-1.99c3.435-4.521 3.512-4.687 3.815-4.869a1.642 1.642 0 0 1 1.642 0a12.66 12.66 0 0 1 4.324 6.209v0.091a1.508 1.508 0 0 1-0.679 1.508c-0.302 0.179-0.362 0.225-6.768 1.733A9.225 9.225-0.063 0 1 21.833 20.462ZM31.586 25.721c-0.271-0.197-0.302-0.211-5.938-2.018l-2.398-0.784a1.853 1.853 0 0 0-2.064 0.619A1.825 1.825-0.063 0 0 21.035 25.735l0.963 1.508c3.361 5.305 3.498 5.516 3.783 5.727a1.508 1.508 0 0 0 0.935 0.316a1.899 1.899 0 0 0 0.693-0.137a12.646 12.646 0 0 0 4.792-5.938A1.508 1.508-0.063 0 0 31.586 25.721Z"></path>
            </svg>
            </a>
        </li>
<style type="text/css">
.bc_social_media a {color:<?php echo bc_get_theme_mod('bc_theme_social_media','bc_social_icon_color', false, false);?>;}
.bc_social_media a:hover {color:<?php echo bc_get_theme_mod('bc_theme_social_media','bc_social_icon_hover_color', false, false);?>; background-color: transparent !important;}
</style>
<?php 
}


/*
Create custom field (title) for pages, post, custom posts
Landing Page Settings for Home Landing Page Template
 */
add_action( 'add_meta_boxes', 'bc_create_landing_page' );
function bc_create_landing_page($post) {
    global $post;
    if(!empty($post)) {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if($pageTemplate == 'page-templates/bc-landingpage.php' ){
            add_meta_box(
                'bc_landing_layout',
                'Landing Page Settings',
                'bc_landing_layout',
                'page',
                'side',
                'low');
        }
    }
}

function bc_landing_layout() {
global $post;
$nav_setting = get_post_meta( $post->ID, 'bc_navigation_setting_landing_page_'.$post->ID, true );
$announcement_setting = get_post_meta( $post->ID, 'bc_announcement_setting_landing_page_'.$post->ID, true );
$colorpicker_setting = get_post_meta( $post->ID, 'bc_colorpicker_landing_page_'.$post->ID, true );
$colorpicker_value_setting = get_post_meta( $post->ID, 'bc_colorpicker_value_landing_page_'.$post->ID, true );
?>
<table style="width:100%">
    <tr> 
        <th><label for="bc_navigation_setting_landing_page">Navigation Menu</label></th>
        <td align="left" valign="middle">
            <input name="bc_navigation_setting_landing_page" type="radio" id="bc_navigation_setting_landing_page" value="On" <?php echo (esc_attr($nav_setting)== 'On') ?  "checked" : "" ;  ?>/> On
            <input name="bc_navigation_setting_landing_page" type="radio" id="bc_navigation_setting_landing_page" value="Off" <?php echo (esc_attr($nav_setting)== 'Off') ?  "checked" : "" ;  ?>/> Off
        </td>
    </tr>
    <tr> 
        <th><label for="bc_announcement_setting_landing_page">Announcement Bar</label></th>
        <td align="left" valign="middle">
            <input name="bc_announcement_setting_landing_page" type="radio" id="bc_announcement_setting_landing_page" value="Yes" <?php echo (esc_attr($announcement_setting)== 'Yes') ?  "checked" : "" ;  ?>/> On
            <input name="bc_announcement_setting_landing_page" type="radio" id="bc_announcement_setting_landing_page" value="No" <?php echo (esc_attr($announcement_setting)== 'No') ?  "checked" : "" ;  ?>/> Off
        </td>
    </tr>
    <tr>
        <th><label for="bc_announcement_setting_landing_page">Overlay Color</label></th>
        <script>
        jQuery(document).ready(function($){
            $('.color_field').each(function(){
                $(this).wpColorPicker();
            });
        });
        </script>
        <td align="left" valign="middle">
            <div class="pagebox">
                <input class="color_field" type="text" name="bc_colorpicker_landing_page" value="<?php esc_attr_e( $colorpicker_setting ); ?>" data-default-color="#000063"/>
            </div>
        </td>
    </tr>
    <tr> 
        <th><label for="bc_announcement_setting_landing_page">Overlay Color Opacity(0-99)</label></th>
        <td align="left" valign="middle">
            <div class="pagebox">
               <input type="number" name="bc_colorpicker_value_landing_page" id="bc_colorpicker_value_landing_page" value="<?php echo esc_attr( $colorpicker_value_setting ); ?>" class="form-control" min='0' max='99'>
            </div>
        </td>
    </tr>
</table>

<?php
wp_nonce_field( 'bc_landing_page_overlay_metabox_nonce', 'bc_landing_page_overlay_metabox_process' );
}
/** Save the metabox*/
add_action( 'save_post', 'bc_save_landing_overlay', 1, 2 );
function bc_save_landing_overlay( $post_id, $post ) {
    if ( !isset( $_POST['bc_landing_page_overlay_metabox_process'] ) ) return;
    if ( !wp_verify_nonce( $_POST['bc_landing_page_overlay_metabox_process'], 'bc_landing_page_overlay_metabox_nonce' ) ) {
        return $post->ID;
    }
    if ( !current_user_can( 'edit_post', $post->ID )) { return $post->ID;}
    if ( !isset( $_POST['bc_navigation_setting_landing_page'] ) ) { return $post->ID;}
    if ( !isset( $_POST['bc_announcement_setting_landing_page'] ) ) {return $post->ID;}
    if ( !isset( $_POST['bc_colorpicker_landing_page'] ) ) {return $post->ID;}
    if ( !isset( $_POST['bc_colorpicker_value_landing_page'] ) ) { return $post->ID;}
    $sanitizednavigation = wp_filter_post_kses( $_POST['bc_navigation_setting_landing_page'] );
    $sanitizedannouncementbar = wp_filter_post_kses( $_POST['bc_announcement_setting_landing_page'] );
    $sanitizedcolorpicker = wp_filter_post_kses( $_POST['bc_colorpicker_landing_page'] );
    $sanitizedcolorpickervalue = wp_filter_post_kses( $_POST['bc_colorpicker_value_landing_page'] );

    update_post_meta( $post->ID, 'bc_navigation_setting_landing_page_'.$post->ID, $sanitizednavigation );
    update_post_meta( $post->ID, 'bc_announcement_setting_landing_page_'.$post->ID, $sanitizedannouncementbar );
    update_post_meta( $post->ID, 'bc_colorpicker_landing_page_'.$post->ID, $sanitizedcolorpicker );
    update_post_meta( $post->ID, 'bc_colorpicker_value_landing_page_'.$post->ID, $sanitizedcolorpickervalue );
}
/*End HomeLanding Page Overlay Settings */


/*Blog Single Page slider Shortcode : [bc-blog-slider] [bc-blog-slider id='1,2,3']*/
add_shortcode( 'bc-blog-slider', 'bc_blog_slider_shortcode' );
function bc_blog_slider_shortcode( $atts , $content = null ) {
    static $count = 0;
    $count++;
    add_action( 'wp_footer' , function() use($count){
    ?>
        <script>
        var swiper<?php echo $count ?> = new Swiper('#bc_blog_swiper_<?php echo $count ?>', {slidesPerView: 3,spaceBetween: 32,loop: false,loopFillGroupWithBlank: true,
            breakpoints: {
                320: {slidesPerView: 1},
                480: {slidesPerView: 2},
                640: {slidesPerView: 2},
                768: {slidesPerView: 3},
                1000: {slidesPerView: 3}
            },
            pagination: {el: '.swiper-pagination',clickable: false,},
            navigation: {nextEl: '.af-swiper-button-next',prevEl: '.af-swiper-button-prev',},
        });
        </script>
    <?php });
    $Ids = null;
    $args  = array( 'post_type' => 'post', 'posts_per_page' => -1, 'order'=> 'DESC','post_status'  => 'publish');
    if(isset($atts['id'])) {
        $Ids = explode(',', $atts['id']);
        $postIds = $Ids;
        $args['post__in'] = $postIds;
    }?>
<div class="container-fluid bc_affiliations_container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12  text-center">
                <h2 class="bc_font_alt_1 text-capitalize text-center py-5">Our Blog</h2>
                <div id="bc_blog_swiper_<?php echo $count ?>" class="swiper-container bc_affiliation_swiper bc_blog_swiper container  swiper-container-initialized swiper-container-horizontal">
                    <div class="swiper-wrapper">
                    <?php 
                    $query = new WP_Query( $args );
                        if ( $query->have_posts() ) :
                            while($query->have_posts()) : $query->the_post();?>
                            <div class="swiper-slide swiper-slide-duplicate">
                                <div class="text-center">
                                    <a href="<?php the_permalink();?>">
                                        <?php if (has_post_thumbnail() ): 
                                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'blogpost-thumbnail' );?>
                                            <img src="<?php echo $image[0]; ?>" class="img-fluid">
                                        <?php endif; ?>
                                        <h3 class="text-center py-2 text-uppercase bc_text_medium bc_text_18"><?php echo wp_trim_words( get_the_title(), 5 ); ?></h3>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; 
                        wp_reset_query();
                        endif;?>
                    </div>
                </div>
                <div class="af-swiper-button-next swiper-button-next d-none d-lg-block" tabindex="0" role="button" aria-label="Next slide"><em class="fa fa-angle-right"></em> </div>
                <div class="af-swiper-button-prev swiper-button-prev d-none d-lg-block" tabindex="0" role="button" aria-label="Previous slide"> <em class="fa fa-angle-left"></em></div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
    </div>
    <div class="text-center">
        <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn bc_color_primary_bg text-white px-4 mb-5" type="button">Visit Our Blog</a>
    </div>
</div>
<?php }

add_shortcode('bc-contact-us', 'bc_contact_us_shortcode');
function bc_contact_us_shortcode(){ 
    ob_start();
?>

    <div class="container-fluid p-0 bc_contact_us_container" style="background-image: url('<?php echo get_template_directory_uri();?>/img/contact.svg'); background-color: #01385e;">
        <div class="container p-4">
            <div class="row">
                <div class="col-md-2 m-auto text-center text-lg-left text-md-left">
                    <h1 class="bc_color_secondary bc_font_alt_2 bc_text_normal">24/7</h1>
                    <h1 class="bc_color_secondary bc_font_alt_2 bc_text_normal">SERVICE</h1>
                </div>
                <div class="col-md-8 text-center pt-5">
                    <h2 class=" bc_color_secondary text-capitalize bc_font_alt_1">Contact Us</h2>
                    <div class="entry-content mt-5"><?php echo do_shortcode('[gravityform id=1 ajax=true]'); ?></div>
                </div>
            </div>
        </div>
    </div>

<?php 

    $output = ob_get_clean();
    return $output;
}

?>
