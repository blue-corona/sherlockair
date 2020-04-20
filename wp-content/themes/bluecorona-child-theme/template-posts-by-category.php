<?php
/**
 * Template Name: Posts By Category
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="MainZone">
<section class="bread-crumbs v1 thin bg-box-none light-bg" id="BreadCrumbsV1Thin">
	
	<div class="main thin">

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
						<h1><?php the_title(); ?></h1>
						<svg class="header-flair" role="presentation"><use href="<?php echo get_stylesheet_directory_uri();?>/includes/flair.svg#header"></use></svg>
					</header>
				</div>



<?php
$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC'
) );
foreach( $categories as $category ) {
	
	?>
	<div class="divider top-margin-tiny bottom-margin-tiny flex-middle-center-spaced-between divide">
	<a href="/blog/categories/air-conditioning/" title="Air Conditioning">
		<strong class="title-style-3"><?php echo $category->name; ?></strong>
	</a>
	<span class="line auto"></span>
	<?php $cat_link = site_url()."/blog/category/".$category->slug; ?>
	<a href="<?php echo $cat_link; ?>" class="btn-colors btn-style fit" title="Air Conditioning">
		(<?php echo $category->count; ?>) Posts
	</a>
</div>
<ul class="flex-grid-wrap-block-800" data-role="tbody">
						<li class='cms-repeater-placeholder' style='display:none !important'></li>
							<?php 

							$the_query = new WP_Query( array( 'category_name' => $category->slug ) ); ?>

							<?php if ( $the_query->have_posts() ) : ?>

							<!-- pagination here -->

							<!-- the loop -->
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<?php get_template_part( 'loop-templates/content', get_post_format() ); ?>
							<?php endwhile; ?>
							<!-- end of the loop -->

							<!-- pagination here -->

							<?php wp_reset_postdata(); ?>

							<?php else : ?>
							<?php get_template_part( 'loop-templates/content', 'none' ); ?>
							<?php endif; ?>

					      	<!-- Pagination -->
					      	<?php //understrap_pagination(); ?>
						<li class='cms-repeater-placeholder' style='display:none !important'></li>
					</ul>
	
	
	<?php
    /* $category_link = sprintf( 
        '<a href="%1$s" alt="%2$s">%3$s</a>',
        esc_url( get_category_link( $category->term_id ) ),
        esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
        esc_html( $category->name )
    );
     
    echo '<p>' . sprintf( esc_html__( 'Category: %s', 'textdomain' ), $category_link ) . '</p> ';
    echo '<p>' . sprintf( esc_html__( 'Description: %s', 'textdomain' ), $category->description ) . '</p>';
    echo '<p>' . sprintf( esc_html__( 'Post Count: %s', 'textdomain' ), $category->count ) . '</p>'; */
}
?> 

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