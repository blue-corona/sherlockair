<?php

/**

 * Template Name: Review Template

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


<!-- <section class="reviews-system leave-review v1 light-bg bg-box-like tiny-padding" id="LeaveReviewV2">
    <div class="main">
        <div class="review-btn add-review text-center vertical-padding-tiny side-padding-small" tabindex="0" data-role="btn">
            <svg viewBox="0 0 36 36" data-use="/cms/svg/site/5d1zpk6tjes.36.svg#quotes">
                <path d="M8.013 15.466a8.045 8.045 0 0 1 6.48 1.483a7.661 7.661 0 0 1 0.231 12.059a8.034 8.034 0 0 1-5.245 1.86a9.036 9.036 0 0 1-7.602-4.26a14.634 14.634 0 0 1-1.877-6.96c0.309-6.651 3.214-11.288 8.768-13.765a11.187 11.187 0 0 1 2.006-0.557l0.977-0.137a1.55 1.55 0 0 1 1.954 1.62v1.628a1.607 1.607 0 0 1-1.483 1.62c-2.983 0.549-4.217 1.997-4.551 5.451m4.354-8.957c-6.583 0.969-10.071 7.225-10.302 13.174a10.971 10.971 0 0 0 1.568 6.034a7.495 7.495 0 0 0 6.265 3.48a6.613 6.613 0 0 0 4.148-1.466a6.055 6.055 0 0 0-0.231-9.514a6.322 6.322 0 0 0-5.245-1.166a1.573 1.573 0 0 1-0.549 0.077a1.614 1.614 0 0 1-1.646-1.543a2.571 2.571 0 0 1 0-0.771c0.394-3.326 1.568-5.648 5.794-6.42 0.163 0 0.163-0.077 0.163-0.077m14.476 7.105a8.038 8.038 0 0 1 6.48 1.483a7.661 7.661 0 0 1 0.231 12.059a8.002 8.002 0 0 1-5.245 1.86a9.021 9.021 0 0 1-7.594-4.26a14.731 14.731 0 0 1-1.886-6.96c0.317-6.651 3.214-11.288 8.777-13.765a11.097 11.097 0 0 1 1.997-0.557l0.977-0.137a1.55 1.55 0 0 1 1.954 1.62v1.628a1.607 1.607 0 0 1-1.483 1.62c-2.974 0.549-4.217 1.997-4.551 5.451m4.363-8.957c-6.591 0.969-10.071 7.225-10.311 13.174a10.971 10.971 0 0 0 1.568 6.034a7.495 7.495 0 0 0 6.265 3.48a6.613 6.613 0 0 0 4.148-1.466a6.055 6.055 0 0 0-0.231-9.514a6.322 6.322 0 0 0-5.245-1.166a1.573 1.573 0 0 1-0.549 0.077a1.614 1.614 0 0 1-1.646-1.543a2.571 2.571 0 0 1 0-0.771c0.394-3.326 1.568-5.648 5.794-6.42 0.154 0 0.154-0.077 0.154-0.077"></path>
            </svg>
            <strong class="title-style-3">
                Leave a Review
            </strong>
        </div>

    </div>
</section> -->



<section class="reviews-system v1 light-bg bg-box-like ui-repeater" id="ReviewSystemV1" data-onvisible="show">
    <picture class="img-bg bg-position" role="presentation" data-role="picture">
        <source media="(max-width: 500px)" src="/assets/reviews/reviews-system-v1-bg-mobile.jpg"/>
        <img src="/assets/reviews/reviews-system-v1-bg.jpg">
    </picture>  
    <div class="main">
        <ul class="flex-grid-large-wrap-block-800 close-gap-800 results-25">

            <?php $args = array('post_type' => 'review', 'posts_per_page' => -1, 'order' => 'ASC');
            $loop = new WP_Query($args );
            while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <?php $text = get_the_content() ; ?>    

                <li class="half flex- bg-box border-radius-item" data-item="i" data-key="137501">
                    <blockquote class="flex-column-between full relative">
                        <div class="info auto side-padding-large vertical-padding-small">
                            <strong class="title-style-2 title-color-2"><?php the_title();?></strong> 
                            <svg viewBox="0 0 36 36" class="quote-icon top-margin-tiny" role="presentation" title="Quote Icon" data-use="/cms/svg/site/5d1zpk6tjes.36.svg#quotes">
                                <path d="M8.013 15.466a8.045 8.045 0 0 1 6.48 1.483a7.661 7.661 0 0 1 0.231 12.059a8.034 8.034 0 0 1-5.245 1.86a9.036 9.036 0 0 1-7.602-4.26a14.634 14.634 0 0 1-1.877-6.96c0.309-6.651 3.214-11.288 8.768-13.765a11.187 11.187 0 0 1 2.006-0.557l0.977-0.137a1.55 1.55 0 0 1 1.954 1.62v1.628a1.607 1.607 0 0 1-1.483 1.62c-2.983 0.549-4.217 1.997-4.551 5.451m4.354-8.957c-6.583 0.969-10.071 7.225-10.302 13.174a10.971 10.971 0 0 0 1.568 6.034a7.495 7.495 0 0 0 6.265 3.48a6.613 6.613 0 0 0 4.148-1.466a6.055 6.055 0 0 0-0.231-9.514a6.322 6.322 0 0 0-5.245-1.166a1.573 1.573 0 0 1-0.549 0.077a1.614 1.614 0 0 1-1.646-1.543a2.571 2.571 0 0 1 0-0.771c0.394-3.326 1.568-5.648 5.794-6.42 0.163 0 0.163-0.077 0.163-0.077m14.476 7.105a8.038 8.038 0 0 1 6.48 1.483a7.661 7.661 0 0 1 0.231 12.059a8.002 8.002 0 0 1-5.245 1.86a9.021 9.021 0 0 1-7.594-4.26a14.731 14.731 0 0 1-1.886-6.96c0.317-6.651 3.214-11.288 8.777-13.765a11.097 11.097 0 0 1 1.997-0.557l0.977-0.137a1.55 1.55 0 0 1 1.954 1.62v1.628a1.607 1.607 0 0 1-1.483 1.62c-2.974 0.549-4.217 1.997-4.551 5.451m4.363-8.957c-6.591 0.969-10.071 7.225-10.311 13.174a10.971 10.971 0 0 0 1.568 6.034a7.495 7.495 0 0 0 6.265 3.48a6.613 6.613 0 0 0 4.148-1.466a6.055 6.055 0 0 0-0.231-9.514a6.322 6.322 0 0 0-5.245-1.166a1.573 1.573 0 0 1-0.549 0.077a1.614 1.614 0 0 1-1.646-1.543a2.571 2.571 0 0 1 0-0.771c0.394-3.326 1.568-5.648 5.794-6.42 0.154 0 0.154-0.077 0.154-0.077"></path>
                            </svg>
                            <div class="content-style"><?php echo $text; ?></div>
                            <p class="title-style-5 title-color-5 no-bottom-margin">- <?php the_field('author_name');?></p>           
                        </div>
                        <div class="rating-icons full side-padding-large vertical-padding-tiny">
                            <ul class="stars rating5 flex-grid-small-center full" title="5 Star Rating">
                                <li class="fit flex-middle-center">
                                    <svg viewBox="0 0 24 24" class="rate1" role="presentation" data-use="/cms/svg/admin/c7mo_bz1802.24.svg#rating_star">
                                        <path d="M5.295 23.025C5.079 23.025 4.865 22.959 4.682 22.825C4.342 22.578 4.183 22.151 4.278 21.742L5.928 14.608L0.425 9.811C0.108 9.534-0.013 9.096 0.118 8.696C0.247 8.296 0.603 8.013 1.019 7.977L8.271 7.351L11.105 0.629C11.267 0.241 11.646-0.01 12.065-0.01C12.485-0.01 12.864 0.241 13.027 0.628L15.86 7.351L23.112 7.977C23.53 8.013 23.885 8.296 24.015 8.696C24.144 9.096 24.023 9.534 23.707 9.811L18.204 14.608L19.853 21.742C19.948 22.151 19.788 22.578 19.449 22.825C19.107 23.072 18.652 23.09 18.296 22.874L12.065 19.093L5.835 22.874C5.669 22.974 5.481 23.025 5.295 23.025Z"></path>
                                    </svg>
                                </li>
                                <li class="fit flex-middle-center">
                                    <svg viewBox="0 0 24 24" class="rate1" role="presentation" data-use="/cms/svg/admin/c7mo_bz1802.24.svg#rating_star">
                                        <path d="M5.295 23.025C5.079 23.025 4.865 22.959 4.682 22.825C4.342 22.578 4.183 22.151 4.278 21.742L5.928 14.608L0.425 9.811C0.108 9.534-0.013 9.096 0.118 8.696C0.247 8.296 0.603 8.013 1.019 7.977L8.271 7.351L11.105 0.629C11.267 0.241 11.646-0.01 12.065-0.01C12.485-0.01 12.864 0.241 13.027 0.628L15.86 7.351L23.112 7.977C23.53 8.013 23.885 8.296 24.015 8.696C24.144 9.096 24.023 9.534 23.707 9.811L18.204 14.608L19.853 21.742C19.948 22.151 19.788 22.578 19.449 22.825C19.107 23.072 18.652 23.09 18.296 22.874L12.065 19.093L5.835 22.874C5.669 22.974 5.481 23.025 5.295 23.025Z"></path>
                                    </svg>
                                </li>
                                <li class="fit flex-middle-center">
                                    <svg viewBox="0 0 24 24" class="rate1" role="presentation" data-use="/cms/svg/admin/c7mo_bz1802.24.svg#rating_star">
                                        <path d="M5.295 23.025C5.079 23.025 4.865 22.959 4.682 22.825C4.342 22.578 4.183 22.151 4.278 21.742L5.928 14.608L0.425 9.811C0.108 9.534-0.013 9.096 0.118 8.696C0.247 8.296 0.603 8.013 1.019 7.977L8.271 7.351L11.105 0.629C11.267 0.241 11.646-0.01 12.065-0.01C12.485-0.01 12.864 0.241 13.027 0.628L15.86 7.351L23.112 7.977C23.53 8.013 23.885 8.296 24.015 8.696C24.144 9.096 24.023 9.534 23.707 9.811L18.204 14.608L19.853 21.742C19.948 22.151 19.788 22.578 19.449 22.825C19.107 23.072 18.652 23.09 18.296 22.874L12.065 19.093L5.835 22.874C5.669 22.974 5.481 23.025 5.295 23.025Z"></path>
                                    </svg>
                                </li>
                                <li class="fit flex-middle-center">
                                    <svg viewBox="0 0 24 24" class="rate1" role="presentation" data-use="/cms/svg/admin/c7mo_bz1802.24.svg#rating_star">
                                        <path d="M5.295 23.025C5.079 23.025 4.865 22.959 4.682 22.825C4.342 22.578 4.183 22.151 4.278 21.742L5.928 14.608L0.425 9.811C0.108 9.534-0.013 9.096 0.118 8.696C0.247 8.296 0.603 8.013 1.019 7.977L8.271 7.351L11.105 0.629C11.267 0.241 11.646-0.01 12.065-0.01C12.485-0.01 12.864 0.241 13.027 0.628L15.86 7.351L23.112 7.977C23.53 8.013 23.885 8.296 24.015 8.696C24.144 9.096 24.023 9.534 23.707 9.811L18.204 14.608L19.853 21.742C19.948 22.151 19.788 22.578 19.449 22.825C19.107 23.072 18.652 23.09 18.296 22.874L12.065 19.093L5.835 22.874C5.669 22.974 5.481 23.025 5.295 23.025Z"></path>
                                    </svg>
                                </li>
                                <li class="fit flex-middle-center">
                                    <svg viewBox="0 0 24 24" class="rate1" role="presentation" data-use="/cms/svg/admin/c7mo_bz1802.24.svg#rating_star">
                                        <path d="M5.295 23.025C5.079 23.025 4.865 22.959 4.682 22.825C4.342 22.578 4.183 22.151 4.278 21.742L5.928 14.608L0.425 9.811C0.108 9.534-0.013 9.096 0.118 8.696C0.247 8.296 0.603 8.013 1.019 7.977L8.271 7.351L11.105 0.629C11.267 0.241 11.646-0.01 12.065-0.01C12.485-0.01 12.864 0.241 13.027 0.628L15.86 7.351L23.112 7.977C23.53 8.013 23.885 8.296 24.015 8.696C24.144 9.096 24.023 9.534 23.707 9.811L18.204 14.608L19.853 21.742C19.948 22.151 19.788 22.578 19.449 22.825C19.107 23.072 18.652 23.09 18.296 22.874L12.065 19.093L5.835 22.874C5.669 22.974 5.481 23.025 5.295 23.025Z"></path>
                                    </svg>
                                </li>
                            </ul>
                        </div>
                    </blockquote>
                </li>
            <?php endwhile;
            wp_reset_postdata();
            ?>
            


        </ul>
    </div>
</section>



<!-- Testimonial Section starts -->

<?php echo do_shortcode('[bc-testimonial-review]');?>

<!-- Testimonial Section ends -->



<!-- unmatched customer service starts -->

<?php get_template_part( 'page-templates/common/bc-unmatched-customer-service' ); ?>

<!-- unmatched customer service ends -->



</main>

<?php get_footer();?>