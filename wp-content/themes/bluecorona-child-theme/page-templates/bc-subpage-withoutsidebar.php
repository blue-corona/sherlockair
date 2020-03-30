<?php
/**
 * Template Name: SubPage Template
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();?>

<main id="MainZone">
<!-- Banner starts -->
<?php get_template_part( 'page-templates/common/bc-banner-section' ); ?>
<!-- Banner ends -->


<section class="two-column-layout light-bg col-66-33 vertical-padding items-spaced flow-reverse" id="TwoColumnLayout">
    <div class="main thin text-align">
        <header class="no-pad bottom-margin-tiny center-800" id="ContactSystemV2Header">
            <h1><?php the_title();?></h1>
            <svg class="header-flair" role="presentation" data-use="<?php echo get_stylesheet_directory_uri();?>/includes/flair.svg#header">
            </svg>
        </header>
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
</section>

<script id="Process_ContactSystemV2" type="text/javascript" style="display:none;">window.Process&&Process.Page(['Process_ContactSystemV2','ContactSystemV2_1','ContactSystemV2_2']);</script>
</main>
<?php get_footer();?>
