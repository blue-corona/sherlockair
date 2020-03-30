<?php
/*- overriding plugins shortcode -*/

add_action('wp_head', 'bc_promotion_shortcode_custom');
function bc_promotion_shortcode_custom() {
	remove_shortcode('bc-testimonial');
	add_shortcode('bc-testimonial', 'custom_testimonial_shortcode');
    add_shortcode('bc-testimonial-review', 'custom_testimonial_review_shortcode');

    remove_shortcode('bc-affiliation');
    add_shortcode('bc-affiliation', 'custom_affiliation_shortcode');

    remove_shortcode('bc-promotion');
    add_shortcode('bc-promotion', 'custom_promotion_shortcode');
    
}

function custom_promotion_shortcode( $atts , $content = null ){
    $Ids = null;
    $args  = array( 'post_type' => 'bc_promotions', 'posts_per_page' => 3, 'order'=> 'DESC','post_status'  => 'publish');

    if(isset($atts['coupon_id'])) {
        $Ids = explode(',', $atts['coupon_id']);
        $postIds = $Ids;
        $args['post__in'] = $postIds;
    }
    ob_start();
    $query = new WP_Query( $args );
        if ( $query->have_posts() ) : ?>
        <section class="coupon v2 light-bg items-touching text-center bg-image bg-box-unlike" id="CouponV2" data-onvisible="show" data-role="scroller">
           <picture class="img-bg bg-position" role="presentation" data-role="picture">
              <source media="(max-width: 500px)" srcset="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/coupons/coupons-v2-bg-mobile.jpg"/>
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/coupons/coupons-v2-bg.jpg">
           </picture>
   <div class="main">
      <header class="text-align center-800" id="CouponV2Header">
         <h4>Seasonal Savings</h4>
         <strong>These specials offers wont last long!</strong>
         <svg role="presentation" class="header-flair">
            <use href="<?php echo get_stylesheet_directory_uri();?>/includes/flair.svg#header"></use>
         </svg>
      </header>
      <div id="CouponV2List" class="ui-repeater" data-role="container">
         <ul class="flex-grid-large auto-responsive" data-role="list">
        <?php
        while($query->have_posts()) : $query->the_post();

        $promotion_type = get_post_meta(get_the_ID(), 'promotion_type', TRUE);
        if($promotion_type == 'Builder'){
        $date = get_post_meta( get_the_ID(), 'promotion_expiry_date1', true );
        if(strtotime($date) >= strtotime(current_time('m/d/Y'))){
            $title = get_post_meta( get_the_ID(), 'promotion_title1', true );
            $color = get_post_meta( get_the_ID(), 'promotion_color', true );
            $subheading = get_post_meta( get_the_ID(), 'promotion_subheading', true );
            $footer_heading = get_post_meta( get_the_ID(), 'promotion_footer_heading', true ); ?>

            <!-- <li class="flex- coupon-style third border-radius featured" > -->
            <li class="flex- coupon-style third border-radius featured" data-role="item" data-item="i" data-key="<?php echo get_the_ID(); ?>">
               <div class="bg-box info flex-column-middle-center side-padding-large vertical-padding relative coupon-border pseudo-after text-center full">
                  <picture class="img-bg" role="presentation">
                     <source media="(max-width: 500px)" srcset="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src=""/>
                     <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="" data-src="">
                  </picture>
                  <div class="full side-padding-small relative">
                     <strong class="title">
                     <strong class="title-font"><?php echo $title; ?></strong>
                     <span class="title-style-2 title-color-2"><?php echo $subheading;?></span>
                     </strong>
                     <p class="title-style-5 title-color-5 top-margin-tiny no-bottom-margin description"><?php echo $footer_heading;?></p>
                     <div class="top-margin-tiny valid note-style">
                        <small>Valid till <?php echo $date;?></small>
                     </div>
                     <div class="top-margin-small">
                        <a class="btn v1" href="<?php the_permalink(get_the_ID());?>" target="_blank">Print</a>
                     </div>
                  </div>
               </div>
            </li>
        <?php }
        }else if($promotion_type == 'Image'){
            $date2 = get_post_meta( get_the_ID(), 'promotion_expiry_date2', true );
            if(strtotime($date2) >= strtotime(current_time('m/d/Y'))){
                $title2 = get_post_meta( get_the_ID(), 'promotion_title2', true );
                $promotion_custom_image = get_post_meta( get_the_ID(), 'promotion_custom_image', true ); ?>
                <div class="col-lg-6 equal_height">
                    <div class="bc_color_secondary p-4 mb-5 text-center" style="background-color: <?php echo $color;?>">
                        <div class="py-4 px-3 pt-0 border-white bc_coupon_container">
                             <a href="<?php the_permalink(get_the_ID()); ?>" target="_blank">
                        <img class="img-fluid" src="<?php echo $promotion_custom_image;?>">
                    </a>
                        </div>
                    </div>
                </div>
        <?php }
            }
        ?>
        <?php
        endwhile; 
        wp_reset_query();
        
        ?>
        </ul>
         <div class="scrolling-list-nav top-margin horizontal flex-middle-center relative text-center" data-role="arrows">
            <button title="View previous item" aria-label="View previous item" data-action="Prev">
               <svg class="site-arrow">
                  <use href="<?php echo get_stylesheet_directory_uri();?>/includes/flair.svg#arrow-left"></use>
               </svg>
            </button>
            <span class="paging" data-role="paging">
            <span data-role="page-active"></span> / <span data-role="page-total"></span>
            </span>
            <button title="View next item" aria-label="View next item" data-action="Next">
               <svg class="site-arrow">
                  <use href="<?php echo get_stylesheet_directory_uri();?>/includes/flair.svg#arrow-right"></use>
               </svg>
            </button>
         </div>
      </div>
      <div id="CouponV2BtnCon">
         <div class="top-margin text-center">
            <a href="<?php echo get_home_url();?>/coupons/" class="btn v1" aria-labelledby="CouponV1Header">
            More Coupons
            </a>
         </div>
      </div>
   </div>
</section>
<?php endif; }

function custom_testimonial_review_shortcode($atts , $content = null){
    $Ids = null;
    $args  = array( 'post_type' => 'bc_testimonials', 'posts_per_page' => -1, 'order'=> 'DESC','post_status'  => 'publish');
    ob_start();
    $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
    ?>
    <section class="reviews v2 vertical-middle dark-bg flow-reverse text-right col-40-60 items-overlapped bg-box-unlike" id="ReviewsV2" data-onvisible="show" data-role="scroller">
       <div class="main">
            <header class="text-align center-800" id="ReviewsV2Header">
             <h4>Top Rated Customer Reviews</h4>
             <strong>We are proud of the stellar feedback!</strong>
             <svg role="presentation" class="header-flair" data-use="<?php echo get_stylesheet_directory_uri();?>/includes/flair.svg#header">
             </svg>
            </header>
            <div class="flex-between-auto-responsive-margined flex-direction item-widths item-spacing align-items">
            <picture class="img pad-height-75 over-item box-flair-offset bg-position box-shadow border-radius" role="presentation">
            <source media="(max-width: 500px)" srcset="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/reviews/reviews-v2-alt-img-mobile.jpg"/>
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/reviews/reviews-v2-alt-img.jpg">
            </picture>
             <div class="bg-box side-padding vertical-padding-small under-item box-flair border-radius">
                <div class="flair-border">
                   <span class="flair-1"></span>
                   <span class="flair-2"></span>
                    <div id="ReviewsV2Feed" class="ui-repeater" data-role="container">
                        <ul class="flex-middle" data-role="list">
                            <?php
                            while($query->have_posts()) : $query->the_post();
                                $title = get_post_meta( get_the_ID(), 'testimonial_title', true );
                                $name = get_post_meta( get_the_ID(), 'testimonial_name', true );
                                $message = get_post_meta( get_the_ID(), 'testimonial_message', true );
                                $image = get_post_meta( get_the_ID(), 'testimonial_custom_image', true );
                            ?>
                            <li class="full" data-role="item" data-item="i" data-key="137500">
                                <blockquote class="overlap-padding">
                                   <svg viewBox="0 0 36 36" class="quote-icon bottom-margin-tiny" role="presentation" title="Quote Icon">
                                      <use data-href="<?php echo get_stylesheet_directory_uri();?>/cms/svg/site/5d1zpk6tjes.36.svg#quotes"></use>
                                   </svg>
                                   <strong class="title-style-2 title-color-2"><?php echo $title;?></strong> 
                                   <p class="caption">&ldquo;<?php echo $message; ?>&rdquo;</p>
                                   <strong class="author">- <?php echo $name;?>.</strong>
                                </blockquote>
                            </li>
                            <?php
                            endwhile; 
                            wp_reset_query();
                            ?>
                        </ul>
                        <div class="scrolling-list-nav overlap-padding top-margin-small horizontal flex-middle relative" data-role="arrows">
                        <button title="View previous item" aria-label="View previous item" data-action="Prev">
                        <svg class="site-arrow">
                        <use href="<?php echo get_stylesheet_directory_uri();?>/includes/flair.svg#arrow-left"></use>
                        </svg>
                        </button>
                        <span class="paging" data-role="paging">
                        <span data-role="page-active"></span> / <span data-role="page-total"></span>
                        </span>
                        <button title="View next item" aria-label="View next item" data-action="Next">
                        <svg class="site-arrow">
                        <use href="<?php echo get_stylesheet_directory_uri();?>/includes/flair.svg#arrow-right"></use>
                        </svg>
                        </button>
                        </div>
                    </div>
                </div>
             </div>
            </div>
            <div id="ReviewsV2BtnCon">
             <div class="top-margin text-center">
                <a href="<?php echo get_home_url();?>/reviews/" aria-labelledby="ReviewsV2Header" class="btn v1">More Reviews</a>
             </div>
            </div>
        </div>
    </section>
<?php 
endif;
}

function custom_testimonial_shortcode($atts , $content = null){
    static $count = 0;
    $count++;
    add_action( 'wp_footer' , function() use($count){
    ?>
    <script>
    var testimonialSwiper<?php echo $count ?> = new Swiper('#bc_testimonial_swiper_<?php echo $count ?>', {
        pagination: {
            el: '.testimonial-pagination',
            clickable: true
        },
        autoHeight: true,
        loop:true,
    });
    </script>
    <?php });
    $Ids = null;
    $args  = array( 'post_type' => 'bc_testimonials', 'posts_per_page' => -1, 'order'=> 'DESC','post_status'  => 'publish');
    if(isset($atts['id'])) {
        $Ids = explode(',', $atts['id']);
        $postIds = $Ids;
        $args['post__in'] = $postIds;
    }
    ob_start();
    ?>
<div class="container-fluid py-5" style="background: -webkit-linear-gradient(top, #ffffff 50%,#cccccc 144%);   /* Chrome10-25,Safari5.1-6 */">
    <div class="container" style="padding-bottom: 33px !important;">
        <div class="row pt-4" style=" min-height: 600px;">
            <div class="col-12 text-center align-self-center">
                 <span class="bc_text_36 bc_line_height_36 bc_color_secondary bc_font_alt_2 bc_text_medium mx-auto text-center mobile_bc_text_26 mobile_bc_line_height_30 mobile_reviews">See What Your Neighbors Have to Say!</span>
            <div class="w-50 mobile_swipper_contant  mx-auto">
                <div id="bc_testimonial_swiper_<?php echo $count;?>" class="bc_testimonial_swiper swiper-container">
                    <div class="swiper-wrapper my-3">
                    <?php
                        $query = new WP_Query( $args );
                        if ( $query->have_posts() ) :
                            while($query->have_posts()) : $query->the_post();
                        $title = get_post_meta( get_the_ID(), 'testimonial_title', true );
                        $message = get_post_meta( get_the_ID(), 'testimonial_message', true );
                        $image = get_post_meta( get_the_ID(), 'testimonial_custom_image', true );
                    ?>
                        <div class="swiper-slide text-center bc_text_24 mobile_bc_text_16 bc_line_height_30">“<?php echo $message; ?>”
                            <div class="my-3">
                                <span class="bc_alternate_font_blue m-0 bc_text_18 bc_text_bold">
                                    <?php echo "- ".$title;?>
                                </span>
                            </div>
                        </div>
                    <?php
                    endwhile; 
                    wp_reset_query();
                    endif;?>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination testimonial-pagination"></div>
                </div>
            </div>

        <button onclick="window.location.href ='<?php echo get_home_url();?>/reviews/'" class="btn  bc_primary_bg  bc_color_tertiary_hover_bg bc_color_quaternary_hover  px-4 py-0 mt-2 mt-lg-5 bc_line_height_50  bc_color_quaternary shadow mb-2 mb-lg-5 bc_text_24 bc_font_alt_3 border-lg mx-auto d-table mobile_bc_text_24 mobile_button_styling">read our reviews</button>

        </div>
        </div>
    </div>
</div>
<?php 
$output = ob_get_clean();
return $output;
}

function custom_affiliation_shortcode($atts , $content = null){
    static $count = 0;
    $count++;
    add_action( 'wp_footer' , function() use($count){
    ?>
        <script>
        var swiper_affiliation<?php echo $count ?> = new Swiper('#bc_affiliation_swiper_<?php echo $count ?>', {
            slidesPerView: 4,
            spaceBetween: 32,
            loop: true,
            loopFillGroupWithBlank: true,
            breakpoints: {
                // when window width is <= 320px
                320: {slidesPerView: 1},
                // when window width is <= 480px
                480: {slidesPerView: 1},
                // when window width is <= 640px
                640: {slidesPerView: 2},
                // when window width is <= 768px
                768: {slidesPerView: 3},
                1000: {slidesPerView: 4}
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: false,
            },
            navigation: {
                nextEl: '.af-swiper-button-next',
                prevEl: '.af-swiper-button-prev',
            },
        });
        </script>
    <?php });?>
    
    <?php
        $args  = array( 'post_type' => 'bc_affiliations', 'posts_per_page' => -1, 'order'=> 'DESC','post_status'  => 'publish');
        $colorclass = 'bc_affliations_img';
        if(isset($atts['withoutgrayscale']) && $atts['withoutgrayscale'] == '1' ) {
            $colorclass = 'bc_affliations_img_without_grayscale';
        }        $shortCodeWrapperClasses = "col-md-9";
        if(isset($atts['shortcode_wrapper_classes']) && !in_array($atts['shortcode_wrapper_classes'], [null, '', false])){
            $shortCodeWrapperClasses = $atts['shortcode_wrapper_classes'];
        }        $containerWrapperClasses = "";
        if(isset($atts['container_wrapper_classes']) && !in_array($atts['container_wrapper_classes'], [null, '', false])){
            $containerWrapperClasses = $atts['container_wrapper_classes'];
        }        $slideWrapperClasses = "";
        if(isset($atts['slide_wrapper_classes']) && !in_array($atts['slide_wrapper_classes'], [null, '', false])){
            $slideWrapperClasses = $atts['slide_wrapper_classes'];
        }
        ob_start();
    ?>    
    <div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto text-center bc_affiliation_padding">
                <div id="bc_affiliation_swiper_<?php echo $count;?>" class="swiper-container bc_affiliation_swiper container mb-5">
                    <div class="swiper-wrapper">
                    <?php
                        $query = new WP_Query( $args );
                        if ( $query->have_posts() ) :
                        while($query->have_posts()) : $query->the_post();
                        $name = get_post_meta( get_the_ID(), 'affiliation_name', true );
                        $link = get_post_meta( get_the_ID(), 'affiliation_link', true );
                        $image = get_post_meta( get_the_ID(), 'affiliation_custom_image', true );
                    ?>
                        <div class="swiper-slide">
                            <div class='text-center'>
                                <a href="<?php echo $link;?>" target="_blank">
                                <img class="img-fluid bc_affliations_img" alt="bbblogo" src="<?php echo $image;?>">
                                </a>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_query();
                    endif;
                    ?>
                    </div>
                    <div class="af-swiper-button-next swiper-button-next d-none d-lg-block"><em class="fa fa-angle-right"></em></div>
                    <div class="af-swiper-button-prev swiper-button-prev d-none d-lg-block"><em class="fa fa-angle-left"></em></div>
                </div>
            </div>
        </div>
    </div>
</div>
                    
<?php 
$output = ob_get_clean();
return $output;

}

/*Penguin Difference Shortcode Section starts*/
add_shortcode('module-a-penguin-difference','bc_difference');
function bc_difference($atts){

    static $count = 0;
    $count++;
    add_action( 'wp_footer' , function() use($count){
    ?>
        <script>
        var swiper_difference<?php echo $count ?> = new Swiper('#module-a-penguin-difference_<?php echo $count ?>', {
            pagination: {
                el: '.module-a-penguin-difference-pagination',
                clickable: true
            },
            loop:true,
            autoHeight: true,
        });
        </script>
    <?php });

    ob_start();

    $endTag = $startTag = '';
    $endTagM = $startTagM = '';
    if(isset($atts['withrowwrapper']) == 1) { $startTag =  "<div class='container-fluid d-none d-lg-block'><div class='container pt-3'><div class='row text-center py-5'>";
    $endTag = "</div></div></div>";
    }
    if(isset($atts['withrowwrapper']) == 1) { $startTagM =  "<div class='container-fluid d-lg-none d-block'><div class='container'><div class='row text-center'>";
    $endTagM = "</div></div></div>";
    }

    $buttonUrl = "window.location.href='".get_home_url()."/about-us/'";
    return $startTag.'<div class="col-lg-10 offset-lg-1 col-xs-12 col-sm-12">
    <span class="bc_text_45 bc_color_primary bc_text_medium bc_line_height_50 bc_font_alt_1">Discover the Penguin Difference</span>
    <div class="row mt-5">
        <div class="col-md-6 col-xs-6 col-sm-6">
            <div class="row">
                <div class="col-lg-2">
                <i class="fal fa-alarm-clock bc_text_48 bc_color_success"></i>
                </div>
                <div class="col-lg-10 pt-3 text-left">
                    <span class="bc_text_36 bc_line_height_36 bc_color_secondary bc_font_alt_2 bc_text_medium">24/7 Emergency Service</span>
                    <p class="bc_text_20 bc_color_quinary bc_line_height_30 bc_text_normal  mt-3">Our support hot line is available 24 hours a day, 7 days a week</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-6 col-sm-6">
            <div class="row">
                <div class="col-lg-2">
                <i class="fal fa-smile bc_text_48 bc_color_success"></i>
                </div>
                <div class="col-lg-10 pt-3 text-left">
                    <span class="bc_text_36 bc_line_height_36 bc_color_secondary bc_font_alt_2 bc_text_medium">100% Satisfaction Guarantee</span>
                    <p class="bc_text_20 bc_color_quinary bc_line_height_30 bc_text_normal  mt-3">You can be confident that you’ll be getting award winning customer service.</p>
                </div>
            </div>
        </div> 
    </div>

    <div class="row mt-5">
        <div class="col-md-6 col-xs-6 col-sm-6">
            <div class="row">
                <div class="col-lg-2">
                <i class="fal fa-sack-dollar bc_text_48 bc_color_success"></i>
                </div>
                <div class="col-lg-10 pt-3 text-left">
                    <span class="bc_text_36 bc_line_height_36 bc_color_secondary bc_font_alt_2 bc_text_medium">Flat Rate Pricing</span>
                    <p class="bc_text_20 bc_color_quinary bc_line_height_30 bc_text_normal  mt-3">We offer flat rate pricing. We never charge by the hour, only by the job. </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-6 col-sm-6">
            <div class="row">
                <div class="col-lg-2">
                <i class="fal fa-scroll bc_text_48 bc_color_success"></i>
                </div>
                <div class="col-lg-10 pt-3 text-left">
                    <span class="bc_text_36 bc_line_height_36 bc_color_secondary bc_font_alt_2 bc_text_medium">Lifetime Warranties</span>
                    <p class="bc_text_20 bc_color_quinary bc_line_height_30 bc_text_normal  mt-3">We offer lifetime labor warranties on all of our installs.</p>
                </div>
            </div>
        </div> 
    </div>
    <div class="row mt-5">
    <div class="col-md-6 col-xs-6 col-sm-6">
        <div class="row">
         <div class="col-lg-2">
            <i class="fal fa-map-marker-alt bc_text_48 bc_color_success"></i>
          </div>
        <div class="col-lg-10 pt-3 text-left">
                <span class="bc_text_36 bc_line_height_36 bc_color_secondary bc_font_alt_2 bc_text_medium">Locally Owned & Operated</span>
                <p class="bc_text_20 bc_color_quinary bc_line_height_30 bc_text_normal  mt-3">We take great pride in being locally owned & operated. We provide the most experienced service in the Arizona area, guaranteed.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xs-6 col-sm-6">
        <div class="row">
         <div class="col-lg-2">
            <i class="fal fa-home-lg-alt bc_text_48 bc_color_success"></i>
          </div>
        <div class="col-lg-10 pt-3 text-left">
                <span class="bc_text_36 bc_line_height_36 bc_color_secondary bc_font_alt_2 bc_text_medium">One Stop Shop</span>
                <p class="bc_text_20 bc_color_quinary bc_line_height_30 bc_text_normal  mt-3">We offer heating, cooling, plumbing & electrical services. Let Penguin be your one stop shop for home services.</p>
            </div>
        </div>
    </div> 
    </div>
</div>
<button onclick ="'.$buttonUrl.'" class="btn  bc_color_success_bg shadow-lg  mt-4 mx-auto  bc_color_quaternary bc_color_quaternary_hoverc px-5  mb-5 bc_text_24 bc_font_alt_3 border-lg bc_line_height_50">get to know us
</button>'.$endTag.$startTagM.'<div class="col-lg-10 offset-lg-1">
            <h1 class="bc_text_32 bc_color_primary bc_text_medium bc_line_height_35 bc_font_alt_1">Discover the Penguin Difference</h1>
            <div class="swiper-container" style="padding-bottom:20px;" id="module-a-penguin-difference_'.$count.'">
               <div class="swiper-wrapper">
                  <div class="swiper-slide">
                     <i class="fal fa-alarm-clock bc_text_72 bc_line_height_50 my-4 bc_color_success"></i><span class="bc_text_26 bc_line_height_30 bc_color_secondary bc_font_alt_2 d-block bc_text_medium">24/7 Emergency Service</span> 
                     <p class="bc_text_16 bc_color_quinary bc_line_height_24 bc_text_normal  mt-3">Our support hot line is available 24 hours a day, 7 days a week.</p>
                  </div>
                  <div class="swiper-slide">
                     <i class="fal fa-smile bc_text_72 bc_line_height_50 my-4 bc_color_success"></i><span class="bc_text_26 bc_line_height_30 bc_color_secondary bc_font_alt_2 d-block bc_text_medium">100% Satisfaction Guarantee</span> 
                     <p class="bc_text_16 bc_color_quinary bc_line_height_24 bc_text_normal  mt-3">You can be confident that you’ll be getting award winning customer service.</p>
                  </div>
                  <div class="swiper-slide">
                     <i class="fal fa-sack-dollar bc_text_72 bc_line_height_50 my-4 bc_color_success"></i><span class="bc_text_26 bc_line_height_30 bc_color_secondary bc_font_alt_2 d-block bc_text_medium">Flat Rate Pricing</span> 
                     <p class="bc_text_16 bc_color_quinary bc_line_height_24 bc_text_normal  mt-3">We offer flat rate pricing. We never charge by the hour, only by the job.</p>
                  </div>
                  <div class="swiper-slide">
                     <i class="fal fa-scroll bc_text_72 bc_line_height_50 my-4 bc_color_success"></i><span class="bc_text_26 bc_line_height_30 bc_color_secondary bc_font_alt_2 d-block bc_text_medium">Lifetime Warranties</span> 
                     <p class="bc_text_16 bc_color_quinary bc_line_height_24 bc_text_normal  mt-3">We offer lifetime labor warranties on all of our installs.</p>
                  </div>
                  <div class="swiper-slide">
                     <i class="fal fa-map-marker-alt bc_text_72 bc_line_height_50 my-4 bc_color_success"></i><span class="bc_text_26 bc_line_height_30 bc_color_secondary bc_font_alt_2 d-block bc_text_medium">Locally Owned & Operated</span> 
                     <p class="bc_text_16 bc_color_quinary bc_line_height_24 bc_text_normal  mt-3">We take great pride in being locally owned & operated. We provide the most experienced service in the Arizona area, guaranteed.</p>
                  </div>
                  <div class="swiper-slide">
                     <i class="fal fa-home-lg-alt bc_text_72 bc_line_height_50 my-4 bc_color_success"></i><span class="bc_text_26 bc_line_height_30 bc_color_secondary bc_font_alt_2 d-block bc_text_medium">One Stop Shop</span> 
                     <p class="bc_text_16 bc_color_quinary bc_line_height_24 bc_text_normal  mt-3">We offer heating, cooling, plumbing & electrical services. Let Penguin be your one stop shop for home services.</p>
                  </div>
               </div>
               <!-- Add Pagination -->
               <div class="swiper-pagination module-a-penguin-difference-pagination"></div>
            </div>
         </div><button onclick ="'.$buttonUrl.'" class="btn bc_color_success_bg shadow-lg  m-2 mx-auto   bc_color_quaternary bc_color_quaternary_hoverc px-5 bc_text_20 bc_font_alt_3 border-lg bc_line_height_50  mt-4">get to know us
</button>'.$endTagM;
$output = ob_get_clean();
return $output;
}
/*Penguin Difference Shortcode Section ends*/


/*Penguin Module B Four Video Section Shortcode Section starts*/
add_shortcode('module-b-video1','bc_video1');
function bc_video1($atts){
    static $count = 0;
    $count++;
    add_action( 'wp_footer' , function() use($count){
    ?>
    <script>
        var swiper_module_video<?php echo $count ?> = new Swiper('#module-b-video1_<?php echo $count ?>', {
            pagination: {
                el: '.module-b-video1-pagination',
                clickable: true
            },
            loop:true,
        });
    </script>
    <?php });

    ob_start();
    
    $endTag = $startTag = '';
    $endTagM = $startTagM = '';
    if(isset($atts['withrowwrapper']) == 1) { $startTag =  "<div class='container-fluid py-5 d-lg-block d-none'><div class='container'>";
    $endTag = "</div></div>";
    }
    if(isset($atts['withrowwrapper']) == 1) { $startTagM =  "<div class='container-fluid d-lg-none d-block mt-4'><div class='container p-0'>";
    $endTagM = "</div></div>";
    }



    return $startTag.' <div class="row"><span class="bc_text_48  bc_color_primary bc_text_medium bc_line_height_50 bc_font_alt_1 text-center mx-auto mb-2 pb-5">Why Choose Penguin Air, Plumbing & Electrical</span>
      <div class="col-lg-3 text-center">
        <p class="bc_text_36 bc_line_height_36  bc_text_light bc_color_secondary bc_font_alt_2  py-2">5-Star Service</p>
        <!-- Button trigger modal -->
          <a data-toggle="modal" data-target="#basicExampleModal">
           <img class="rounded-circle bc_cursor_pointer" src="'.get_template_directory_uri().'/img/video01.png">
          </a>
        <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content coustom_width">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/jmLxO6iHD5w" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 text-center">
        <p class="bc_text_36 bc_line_height_36  bc_text_light bc_color_secondary bc_font_alt_2  py-2 ">Expert Technicians</p>
        <!-- Button trigger modal -->
        <a data-toggle="modal" data-target="#basicExampleModalone">
         <img class="rounded-circle bc_cursor_pointer" src="'.get_template_directory_uri().'/img/video02.png">
        </a>
        <div class="modal fade" id="basicExampleModalone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content coustom_width">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/HicDS68I2Uc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 text-center">
        <p class="bc_text_36 bc_line_height_36  bc_text_light bc_color_secondary bc_font_alt_2  py-2 ">Customers First</p>
        <!-- Button trigger modal -->
        <a data-toggle="modal" data-target="#basicExampleModalthree">
         <img class="rounded-circle bc_cursor_pointer" src="'.get_template_directory_uri().'/img/video03.png">
        </a>
        <div class="modal fade" id="basicExampleModalthree" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content coustom_width">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/SVgSQiTUQ3k" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 text-center">
        <p class="bc_text_36 bc_line_height_36  bc_text_light bc_color_secondary bc_font_alt_2  py-2 ">24/7 Service</p>
        <!-- Button trigger modal -->
        <a data-toggle="modal" data-target="#basicExampleModalfour">
         <img class="rounded-circle bc_cursor_pointer" src="'.get_template_directory_uri().'/img/video04.png">
        </a>
        <div class="modal fade" id="basicExampleModalfour" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content coustom_width">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/nakhrC4FXxc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div></div>'.$endTag.$startTagM. '<div class="row text-center">
         <div class="col-lg-12">
            <h2 class="mobile_bc_text_32  bc_color_primary bc_text_medium bc_line_height_35 bc_font_alt_1 text-center mb-2 ">Why Choose Penguin Air, Plumbing &amp; Electrical</h2>
            <div class="swiper-container module-b-video1" id="module-b-video1_'.$count.'">
               <div class="swiper-wrapper">
                  <div class="swiper-slide">
                     <span class="bc_text_26 bc_line_height_36  bc_text_light bc_color_secondary bc_font_alt_2  py-2 d-block">5-Star Service</span>
                     <!-- Button trigger modal -->
                     <a data-toggle="modal" data-target="#one">
                     <img class="rounded-circle bc_cursor_pointer" src="'.get_template_directory_uri().'/img/video01.png">
                     </a>
                     <div class="modal fade" id="one" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                  <iframe width="100%" height="100%" src="https://www.youtube.com/embed/1M3W9u29_1k" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <span class="bc_text_26 bc_line_height_36  bc_text_light bc_color_secondary bc_font_alt_2  py-2 d-block">Expert Technicians</span>
                     <!-- Button trigger modal -->
                     <a data-toggle="modal" data-target="#two">
                     <img class="rounded-circle bc_cursor_pointer" src="'.get_template_directory_uri().'/img/video02.png">
                     </a>
                     <div class="modal fade" id="two" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                  <iframe width="100%" height="100%" src="https://www.youtube.com/embed/1M3W9u29_1k" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <span class="bc_text_26 bc_line_height_36  bc_text_light bc_color_secondary bc_font_alt_2  py-2 d-block">Customers First</span>
                     <!-- Button trigger modal -->
                     <a data-toggle="modal" data-target="#three">
                     <img class="rounded-circle bc_cursor_pointer" src="'.get_template_directory_uri().'/img/video03.png">
                     </a>
                     <div class="modal fade" id="three" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                  <iframe width="100%" height="100%" src="https://www.youtube.com/embed/1M3W9u29_1k" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <span class="mobile_bc_text_26 bc_line_height_36  bc_text_light bc_color_secondary bc_font_alt_2  py-2 d-block">24/7 Service</span >
                     <!-- Button trigger modal -->
                     <a data-toggle="modal" data-target="#four">
                     <img class="rounded-circle bc_cursor_pointer" src="'.get_template_directory_uri().'/img/video04.png">
                     </a>
                     <div class="modal fade" id="four" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                  <iframe width="100%" height="100%" src="https://www.youtube.com/embed/1M3W9u29_1k" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Add Pagination -->
               <div class="swiper-pagination module-b-video1-pagination mt-4" style="position: initial;"></div>
            </div>
         </div>
      </div>'.$endTagM;



$output = ob_get_clean();
return $output;
}
/*Penguin Module B four Video Section Shortcode Section ends*/

/*Penguin Module C three Video Section Shortcode Section starts*/
add_shortcode('module-c-video2','bc_video2');
function bc_video2(){
    ob_start();
    return '<div class="col-lg-10 offset-lg-1 mobile_section_employed"><h2 class="bc_text_48  bc_color_primary bc_text_medium bc_line_height_50 bc_font_alt_1 text-center mb-2">Join the Best Team in the Country! </h2>
         <div class="row my-4">
            <div class="col-lg-4 text-center px-4">
               <p class="bc_text_36 bc_line_height_36  bc_text_light bc_color_secondary bc_font_alt_2  py-2 ">Why Work at 
                  Penguin?
               </p>
               <!-- Button trigger modal -->
               <a   data-toggle="modal" data-target="#basicExampleModal">
               <img class="rounded-circle bc_cursor_pointer" src="'.get_template_directory_uri().'/img/video_5.jpg">
               </a>
               <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog modal-xl" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <iframe width="100%" height="315" src="https://www.youtube.com/embed/lmSntdyQQRQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 text-center">
               <p class="bc_text_36 bc_line_height_36  bc_text_light bc_color_secondary bc_font_alt_2  py-2 ">We Care About
                  Our People
               </p>
               <!-- Button trigger modal -->
               <a   data-toggle="modal" data-target="#basicExampleModalone">
               <img class="rounded-circle bc_cursor_pointer" src="'.get_template_directory_uri().'/img/video_6.jpg">
               </a>
               <div class="modal fade" id="basicExampleModalone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog modal-xl" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <iframe width="468" height="315" src="https://www.youtube.com/embed/SVgSQiTUQ3k" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 text-center">
               <p class="bc_text_36 bc_line_height_36  bc_text_light bc_color_secondary bc_font_alt_2  py-2 ">Discover the 
                  Difference
               </p>
               <!-- Button trigger modal -->
               <a   data-toggle="modal" data-target="#basicExampleModalthree">
               <img class="rounded-circle bc_cursor_pointer" src="'.get_template_directory_uri().'/img/video_7.jpg">
               </a>
               <div class="modal fade" id="basicExampleModalthree" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog modal-xl" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <iframe width="468" height="315" src="https://www.youtube.com/embed/SVgSQiTUQ3k" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div></div>';
    $output = ob_get_clean();
    return $output;
}
/*Penguin Module C three Video Section Shortcode Section ends*/