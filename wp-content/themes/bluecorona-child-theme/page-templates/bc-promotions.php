<?php
/**
 * Template Name: Promotions Template
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
global $post;
?>
<main>
    <!-- Banner starts -->
    <?php get_template_part( 'page-templates/common/bc-banner-section' ); ?>
    <!-- Banner ends -->

    <section class="light-bg vertical-padding items-spaced flow-reverse">    
        <div class="container">
            <div class="content-zone" id="ContentZone">
                <div class="column-layout-content transparent-bg bg-box-none light-bg">
                    <div class="bg-box side-padding-medium vertical-padding-small box-flair border-radius">
                        <div class="flair-border">
                            <span class="flair-1"></span>
                            <span class="flair-2"></span>
                            <div class="content-style">                
                                <!-- The Content Starts -->
                                <div class="col-lg-12 col-md-12 col-xs-12 mt-2 px-5">
                                    <div class="row text-center">
                                    <?php
                                    $args  = array( 'post_type' => 'bc_promotions', 'posts_per_page' => -1, 'order'=> 'DESC','post_status'  => 'publish');
                                    $query = new WP_Query( $args );
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
                                            <div class="col-md-6 col-sm-12 p-2 text-center">
                                                <a href="<?php the_permalink(get_the_ID()); ?>" target="_blank" style="color: white; text-decoration: none; cursor: pointer;">
                                                    <div class="bg-box coupon-style bc_color_secondary bc_color_primary_bg p-1 mb-3" style="background-color: <?php echo $color;?>; border-top-left-radius: 62px; border-top-right-radius: 0px; border-bottom-left-radius: 0px; border-bottom-right-radius: 62px;">
                                                        <div class="p-4 border-white bc_coupon_container coupon-border pseudo-after text-center">
                                                                <div class="p-2">
                                                                <strong class="title">
                                                                <strong class="title-font"><?php echo $title ?></strong>
                                                                <span class="title-style-2 title-color-2" style="color:#D9D9D9;"><?php echo $subheading;?></span>
                                                                </strong>
                                                                <div>
                                                                    <small>Valid until <?php echo $date;?></small>
                                                                </div>
                                                                <div class="top-margin-small auto full">
                                                                    <a class="btn v1" href="<?php the_permalink(get_the_ID());?>" target="_blank">Print</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <?php }
                                        }else if($promotion_type == 'Image'){
                                            $date2 = get_post_meta( get_the_ID(), 'promotion_expiry_date2', true );
                                            if(strtotime($date2) >= strtotime(current_time('m/d/Y'))){
                                                $title2 = get_post_meta( get_the_ID(), 'promotion_title2', true );
                                                $promotion_custom_image = get_post_meta( get_the_ID(), 'promotion_custom_image', true ); ?>
                                                <div class="col-md-4 col-lg-4 p-2 text-center">
                                                    <a href="<?php the_permalink(get_the_ID()); ?>" target="_blank">
                                                        <img class="img-fluid" class="img-fluid" src="<?php echo $promotion_custom_image;?>" />
                                                    </a>
                                                </div>
                                        <?php }
                                        }
                                    endwhile; 
                                    wp_reset_query();
                                    endif;
                                    ?>
                                    </div>
                                </div>
                                <!-- The Content ends --> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </section>
</main>
<?php get_footer();?>