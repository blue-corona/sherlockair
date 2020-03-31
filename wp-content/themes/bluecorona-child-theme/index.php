<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="MainZone">
	<section class="bread-crumbs v1 bg-box-none light-bg" id="BreadCrumbsV1">
		<div class="main">
			<nav class="relative bg-box border-radius-item">
				<ol class="flex-middle">
					<li class="flex-middle relative"><a title="Go Home" aria-label="Go Home" href="/">
						<i class="fal fa-home-lg-alt"></i></a></li>
					<li class="flex-middle relative">Blog</li>
				</ol>
			</nav>
		</div>
	</section>
	<!-- <form method="get" id="bc_searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<span id="searchsubmit" name="submit">
        	<i aria-hidden="true" class="fa fa-search <?php echo $args['icon_color_class']; ?>"></i> &nbsp; 
        </span>
		<input class="transparent-input" id="s" name="s" type="text"
			placeholder="" value="<?php the_search_query(); ?>" style="">
	</form> -->

	<section class="blog-system v1 light-bg bg-box-like text-left no-padding flow-reverse" id="BlogSystemV1">
		<div id="TopZone"></div>
		<div class="main vertical-padding-small flex-spaced-between-block-1024-margined flex-direction">
			<div class="content-zone two-thirds" id="ContentZone">
				<div class="blog-posts blog-home ui-repeater ui-ajax" id="BlogSystemV1BlogPostsHome" data-onvisible="show" data-loading="false" data-infinite="true" data-ajaxreplace="true">	
					<div class="bottom-margin-tiny">
						<header class="text-align no-pad center-1024">
							<h1>Recent News</h1>
							<svg class="header-flair" role="presentation"><use href="<?php echo get_stylesheet_directory_uri();?>/includes/flair.svg#header"></use></svg>
						</header>
					</div>

					<ul class="flex-grid-wrap-block-800" data-role="tbody">
						<li class='cms-repeater-placeholder' style='display:none !important'></li>
							<?php 
					     	if ( have_posts() ) :
					     		while ( have_posts() ) : the_post();
					     			get_template_part( 'loop-templates/content', get_post_format() );
								endwhile; else :
								get_template_part( 'loop-templates/content', 'none' );
							endif;
							?>
					      	<!-- Pagination -->
					      	<?php understrap_pagination(); ?>
						<li class='cms-repeater-placeholder' style='display:none !important'></li>
					</ul>
				</div>
			</div>
			<!-- left sidebar starts -->
		        <?php get_template_part( 'sidebar-templates/sidebar', 'blogpageleftsidebar' ); ?>
		    <!-- left sidebar ends -->
		</div>
		<div id="BottomZone"></div>
	</section>
</main>
<?php get_footer()?>

