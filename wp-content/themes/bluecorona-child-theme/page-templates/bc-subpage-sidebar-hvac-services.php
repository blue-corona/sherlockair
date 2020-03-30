<?php
/**
 * Template Name: SubPage-Sidebar-HVAC-Services Template
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
global $post;
?>

<main id="MainZone">

<!-- Banner starts -->
<?php get_template_part( 'page-templates/common/bc-banner-section' ); ?>
<!-- Banner ends -->

<section class="two-column-layout light-bg col-66-33 vertical-padding items-spaced flow-reverse" id="TwoColumnLayout">
    
    <div class="main flex-spaced-between-block-1024-margined item-spacing item-widths flex-direction">
    <div class="content-zone" id="ContentZone">
        <div class="column-layout-content transparent-bg bg-box-none light-bg" id="ColumnLayoutContent" data-onvisible="show">
            <div class="bg-box side-padding-medium vertical-padding-small box-flair border-radius">
                <div class="flair-border">
                    <span class="flair-1"></span>
                    <span class="flair-2"></span>
                    <div class="content-style" id="MainContent" data-content="true">
                        <!-- The Content Starts -->
                        <?php 
                        if ( have_posts() ) : 
                            while ( have_posts() ) : the_post();
                                the_content();
                            endwhile;
                        endif;
                        ?>
                        <!-- The Content ends --> 
                    </div>
                </div>
            </div>
        </div>
        <script id="Process_ColumnLayoutContent" type="text/javascript" style="display:none;">window.Process&&Process.Page(['Process_ColumnLayoutContent','ColumnLayoutContent_1']);</script>
    </div>
       <!-- left sidebar starts -->
        <?php get_template_part( 'sidebar-templates/sidebar', 'subpageleftsidebar-hvac-services' ); ?>
        <!-- left sidebar ends -->
    </div>
</section>

    <!-- Testimonial Section starts -->
    <?php //echo do_shortcode('[bc-testimonial-review]');?>
    <!-- Testimonial Section ends -->
    <?php
    $args  = array( 'post_type' => 'bc_testimonials', 'posts_per_page' => -1, 'order'=> 'DESC','post_status'  => 'publish');
    ob_start();
    $query = new WP_Query( $args );
        if ( $query->have_posts() ) :?>
    <section class="reviews v2 light-bg vertical-middle bg-image flow-reverse text-right col-40-60 items-overlapped bg-box-like start active show" id="ReviewsV2" data-onvisible="show" data-role="scroller">
    
    <picture class="img-bg" role="presentation" data-role="picture">
        <source media="(max-width: 500px)" srcset="https://www.sherlockair.com/assets/reviews/reviews-v2-bg-mobile.jpg">
        <img src="https://www.sherlockair.com/assets/reviews/reviews-v2-bg.jpg" alt="">
    </picture>
    <div class="main">
        <header class="text-align center-800" id="ReviewsV2Header">
            
                <h4>
                    Top Rated Customer Reviews
                </h4>
            
            
                <strong>
                    We are proud of the stellar feedback!
                </strong>
            
            
                <svg role="presentation" class="header-flair" data-use="https://www.sherlockair.com/includes/flair.svg#header" viewBox="0 0 130 7">
    <g class="center">
        <line class="line" x1="0" y1="3.6" x2="62.1" y2="3.6" style="stroke-dashoffset: 63; stroke-dasharray: 63;"></line>
        <line class="line" x1="130" y1="3.5" x2="67.9" y2="3.5" style="stroke-dashoffset: 63; stroke-dasharray: 63;"></line>
        <circle class="circle" cx="65" cy="3.5" r="2.9" style="stroke-dashoffset: 19; stroke-dasharray: 19;"></circle>
    </g>
    <g class="left">
        <line class="line" x1="3.5" y1="3.4" x2="130" y2="3.4" style="stroke-dashoffset:127; stroke-dasharray: 127;"></line>
        <circle class="circle" cx="3.5" cy="3.5" r="2.9" style="stroke-dashoffset:19; stroke-dasharray: 19;"></circle>
    </g>
    <g class="right">
        <line class="line" x1="127.1" y1="3.6" x2="0.6" y2="3.6" style="stroke-dashoffset:127; stroke-dasharray: 127;"></line>
        <circle class="circle" cx="127.1" cy="3.5" r="2.9" style="stroke-dashoffset:19; stroke-dasharray: 19;"></circle>
    </g>
</svg>
            
        </header>
        <div class="flex-between-auto-responsive-margined flex-direction item-widths item-spacing align-items">
            <picture class="img pad-height-75 over-item box-flair-offset bg-position box-shadow border-radius" role="presentation">
                <source media="(max-width: 500px)" srcset="https://www.sherlockair.com/assets/reviews/reviews-v2-img-mobile.jpg">
                <img src="https://www.sherlockair.com/assets/reviews/reviews-v2-img.jpg" alt="">
            </picture>
            <div class="bg-box side-padding vertical-padding-small under-item box-flair border-radius">
                <div class="flair-border">
                    <span class="flair-1"></span>
                    <span class="flair-2"></span>
                    <div id="ReviewsV2Feed" class="ui-repeater" data-role="container">
                        <ul class="flex-middle" data-role="list" style="">
                            <?php
                            while($query->have_posts()) : $query->the_post();
                                $title = get_post_meta( get_the_ID(), 'testimonial_title', true );
                                $name = get_post_meta( get_the_ID(), 'testimonial_name', true );
                                $message = get_post_meta( get_the_ID(), 'testimonial_message', true );
                                $image = get_post_meta( get_the_ID(), 'testimonial_custom_image', true );
                            ?>
                            <li class="full active" data-role="item" data-item="i" data-key="137500" tabindex="0">
                                <blockquote class="overlap-padding">
                                <svg viewBox="0 0 36 36" class="quote-icon bottom-margin-tiny" role="presentation" title="Quote Icon" data-use="<?php echo get_stylesheet_directory_uri();?>/cms/svg/site/5d1zpk6tjes.36.svg#quotes"></svg>
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
                            <i class="fal fa-long-arrow-left" style="font-weight:18px;" aria-hidden="true"></i>
                            </button>
                            <span class="paging" data-role="paging">
                            <span data-role="page-active"></span> / <span data-role="page-total"></span>

                            <button title="View next item" aria-label="View next item" data-action="Next">
                            <i class="fal fa-long-arrow-right" style="font-weight:18px;" aria-hidden="true"></i>
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
?>

    <!-- unmatched customer service starts -->
        <?php get_template_part( 'page-templates/common/bc-unmatched-customer-service' ); ?>
    <!-- unmatched customer service ends -->

</main>
<?php get_footer();?>