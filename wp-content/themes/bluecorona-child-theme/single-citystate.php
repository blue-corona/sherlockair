<?php
/**
 * The template for displaying all single posts locations
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
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
        <?php get_template_part( 'sidebar-templates/sidebar', 'subpageleftsidebar' ); ?>
        <!-- left sidebar ends -->
    </div>
</section>

    <!-- Testimonial Section starts -->
    <?php echo do_shortcode('[bc-testimonial-review]');?>
    <!-- Testimonial Section ends -->

    <!-- unmatched customer service starts -->
        <?php get_template_part( 'page-templates/common/bc-unmatched-customer-service' ); ?>
    <!-- unmatched customer service ends -->

</main>
<?php get_footer();
