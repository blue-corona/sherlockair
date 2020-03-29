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

<section class="site-search-system v1 light-bg text-center bg-box-unlike show" id="SiteSearchSystemV1" data-onvisible="show">
    
    
    
    <picture class="img-bg bg-position" role="presentation" data-role="picture">
        <source media="(max-width: 500px)" srcset="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="/assets/site-search/site-search-system-v1-bg-mobile.jpg">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="" data-src="/assets/site-search/site-search-system-v1-bg.jpg">
    </picture>  
    <div class="main thin relative">
        <header class="no-pad bottom-margin-tiny center-800 text-align" id="SiteSearchSystemV1Header">
            <h1>
                How Can We Help You?
            </h1>
            <svg class="header-flair" role="presentation" data-use="<?php echo get_stylesheet_directory_uri();?>/includes/flair.svg#header" viewBox="0 0 130 7">
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
                
    <div class="top-margin ui-repeater ui-ajax" id="SiteSearchSystemV1Search" data-search-delay="1500">
        <div class="search-bar bg-box side-padding vertical-padding flex-middle-block-500 border-radius">
            <div class="input-text auto " id="SiteSearchSystemV1_1">
                <form method="get" id="bc_searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
                        <!-- <span id="searchsubmit" name="submit">
                            <i aria-hidden="true" class="fa fa-search <?php echo $args['icon_color_class']; ?>"></i> &nbsp; 
                        </span> -->
                        <input class="transparent-input" id="s" name="s" type="text"
                            autocomplete="off" value="<?php the_search_query(); ?>" style="">
                

                <label for="SiteSearchSystemV1Search_HDR0_Keyword">Search by keyword</label>
                <label id="searchsubmit" name="submit" class="icon" for="SiteSearchSystemV1Search_HDR0_Keyword"><svg viewBox="0 0 24 24" title="Search Icon" data-use="<?php echo get_stylesheet_directory_uri();?>/cms/svg/site/5d1zpk6tjes.24.svg#search">
                <path d="M23.234 21.861L17.522 15.92c1.468-1.746 2.274-3.942 2.274-6.23c0-5.343-4.347-9.69-9.69-9.69s-9.69 4.347-9.69 9.69s4.347 9.69 9.69 9.69c2.006 0 3.918-0.604 5.552-1.754l5.756 5.986c0.24 0.25 0.564 0.387 0.91 0.387c0.328 0 0.639-0.126 0.876-0.352C23.7 23.164 23.716 22.364 23.234 21.861zM10.104 2.529c3.95 0 7.163 3.213 7.163 7.163s-3.213 7.163-7.163 7.163s-7.163-3.213-7.163-7.163S6.156 2.529 10.104 2.529z"></path></svg></label>
                </form>
            </div>
            <a href="javascript:void(0)" title="Search Our Site" class="btn v1">Search</a>
        </div>
    </div>
</div>
</section>


</main>
<?php get_footer();?>