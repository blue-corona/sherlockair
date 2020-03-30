<?php
/**
 * The template for displaying search results pages.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<main id="MainZone">

<section class="site-search-system v1 light-bg text-center bg-box-unlike show" id="SiteSearchSystemV1" data-onvisible="show">
    
    
    
    <picture class="img-bg bg-position" role="presentation" data-role="picture">
        <source media="(max-width: 500px)" src="/assets/site-search/site-search-system-v1-bg-mobile.jpg">
        <img src="/assets/site-search/site-search-system-v1-bg.jpg">
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

    <ul class="top-margin-small">
		<li class="results-1.0000 divider">
		<header class="no-pad bottom-margin-large">
		<h4 class="flex-middle">
		<svg viewBox="0 0 36 36" data-use="/cms/svg/admin/icon_pages.36.svg">
		<path d="M35.425 11.698C35.425 11.698 27.228 15.631 23.321 17.506C22.099 18.093 19.297 18.477 19.297 18.477L13.001 18.514C13.001 18.514 10.123 18.092 8.876 17.494C5.827 16.031 0.575 13.511 0.575 13.511C0.224 13.343 0 12.983 0 12.587C0 12.191 0.224 11.831 0.575 11.663L19.463 2.599C19.733 2.47 20.046 2.47 20.316 2.599L35.425 9.85C35.776 10.019 36 10.379 36 10.774C36 11.17 35.776 11.53 35.425 11.698ZM19.889 4.652L3.354 12.587L10.512 16.021L14.908 11.853C15.408 11.395 16.219 11.395 16.719 11.853L21.544 16.101L32.646 10.774L19.889 4.652ZM0.735 17.344L16.057 24.407L35.265 15.553C35.52 15.435 35.828 15.542 35.95 15.794C36.072 16.046 35.961 16.347 35.703 16.465L16.276 25.421C16.207 25.454 16.132 25.469 16.057 25.469C15.982 25.469 15.907 25.454 15.838 25.421L0.297 18.257C0.039 18.138-0.071 17.838 0.05 17.585C0.17 17.334 0.477 17.226 0.735 17.344ZM0.735 21.347L16.057 28.431L35.265 19.549C35.52 19.43 35.828 19.539 35.95 19.791C36.072 20.044 35.961 20.346 35.703 20.464L16.276 29.448C16.207 29.481 16.132 29.497 16.057 29.497C15.982 29.497 15.907 29.481 15.838 29.448L0.297 22.263C0.039 22.144-0.071 21.842 0.05 21.589C0.17 21.337 0.477 21.228 0.735 21.347ZM0.735 25.347L16.057 32.431L35.265 23.55C35.52 23.431 35.828 23.54 35.95 23.792C36.072 24.045 35.961 24.347 35.703 24.466L16.276 33.45C16.207 33.482 16.132 33.498 16.057 33.498C15.982 33.498 15.907 33.482 15.838 33.45L0.297 26.263C0.039 26.144-0.071 25.842 0.05 25.589C0.17 25.337 0.477 25.228 0.735 25.347Z"></path></svg> General Content</h4>
		</header>
		<ul class="results-list flex-grid-block-800-wrap-break-1024">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
                /**
                 * Run the loop for the search to output the results.
                 * If you want to overload this in a child theme then include a file
                 * called content-search.php and that will be used instead.
                 */
                get_template_part( 'loop-templates/content', 'search' );
                ?>
			
			<?php endwhile; ?>
            <?php else : ?>
            <?php get_template_part( 'loop-templates/content', 'none' ); ?>
            <?php endif; ?>
		</ul>
		</li>
	</ul>


</div>
</section>


</main>
<?php get_footer(); ?>
