<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<main id="MainZone" class="archivepage">
	<section class="bread-crumbs v1 bg-box-none light-bg" id="BreadCrumbsV1">
		<div class="main">
			<nav class="relative bg-box border-radius-item">
				<?php custom_breadcrumbs(); ?>
			</nav>
		</div>
	</section>
	<section class="blog-system v1 light-bg bg-box-like text-left no-padding flow-reverse" id="BlogSystemV1">
		<div id="TopZone"></div>
		<div class="main vertical-padding-small flex-spaced-between-block-1024-margined flex-direction">
			<div class="content-zone two-thirds" id="ContentZone">
				<div class="blog-posts blog-home ui-repeater ui-ajax" id="BlogSystemV1BlogPostsHome" data-onvisible="show" data-loading="false" data-infinite="true" data-ajaxreplace="true">	
					<div class="bottom-margin-tiny">
						<header class="text-align no-pad center-1024">
							<h1><?php the_archive_title( );?></h1>
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
<?php get_footer(); ?>
