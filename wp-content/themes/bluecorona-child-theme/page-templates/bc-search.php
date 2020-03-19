<?php
/**
 * Template Name: Search Template
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
global $post;
?>

<main id="MainZone">

<section class="sub-banner v1 bg-image dark-bg bg-box-none text-left" id="SubBannerV1" data-onvisible="show">
    <div class="main">
        <div class="bg-box side-padding-medium vertical-padding info text-align center-800 box-flair" id="SubBannerV1Info">
            <div class="flair-border">
                <span class="flair-1"></span>
                <span class="flair-2"></span>
                <span class="title-font title-color-1">
                    <strong>
                       <?php the_title();?>
                    </strong>
                </span>
                <svg role="presentation" class="header-flair"><use href="<?php echo get_stylesheet_directory_uri();?>/includes/flair.svg#header"></use></svg>
            </div>  
        </div>  
    </div>
</section>

<section class="two-column-layout light-bg col-66-33 vertical-padding items-spaced flow-reverse" id="TwoColumnLayout">
    
    <div class="main flex-spaced-between-block-1024-margined item-spacing item-widths flex-direction">
    <div class="content-zone" id="ContentZone">
        <div class="column-layout-content transparent-bg bg-box-none light-bg" id="ColumnLayoutContent" data-onvisible="show">
            <div class="bg-box side-padding-medium vertical-padding-small box-flair border-radius">
                <div class="flair-border">
                    <span class="flair-1"></span>
                    <span class="flair-2"></span>
                    <div class="content-style" id="MainContent" data-content="true">
                        <!-- search Form -->
                        <form method="get" id="bc_searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
                                <span id="searchsubmit" name="submit">
                                    <i aria-hidden="true" class="fa fa-search <?php echo $args['icon_color_class']; ?>"></i> &nbsp; 
                                </span>
                                <input class="transparent-input" id="s" name="s" type="text"
                                    placeholder="" value="<?php the_search_query(); ?>" style="">
                        </form>
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
<?php get_footer();?>