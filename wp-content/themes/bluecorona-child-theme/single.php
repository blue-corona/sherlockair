<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
<style type="text/css">
	.prev-btn a, .next-btn a{
		background-color: #842F3F;
    	color: #ffffff !important;
    	padding: 0.5em 1.5em;
    	/*font-weight: 500;*/
	}
	.prev-btn a:hover, .next-btn a:hover{
		background-color: #005076;
	}
	.content-style ul li.next-btn::before{top: 1em;}
	.content-style ul li.prev-btn::before{top: 1em;}
</style>
<main id="MainZone">
<section class="bread-crumbs v1 thin bg-box-none light-bg" id="BreadCrumbsV1Thin">
	
	<div class="main thin">

		<nav class="relative bg-box border-radius-item">
			<?php custom_breadcrumbs(); ?>
		</nav>
	</div>
</section>

<section class="blog-post-page v1 light-bg bg-box-like flow-reverse col-50-50 items-touching tiny-padding ui-repeater show" id="BlogPostPageV1" data-onvisible="show" data-loading="false">
	
	<div class="main thin bottom-margin-small" data-item="i" data-key="1027854">
		<div class="text-align text-center center-800 relative vertical-padding side-padding-small bg-box unlike-bg pseudo-before">
			<picture class="img-bg" role="presentation">
			<?php if (has_post_thumbnail() ) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id() ), 'single-post-thumbnail' ); ?>
			    <img src="<?php echo $image[0]; ?>">
			    <?php }else{ ?>
			    <img src="<?php echo get_stylesheet_directory_uri();?>/assets/sub-banners/sub-banner-2.jpg">
			<?php }?>
			</picture>
			<header class="no-pad bottom-margin-tiny relative">
				<h1 itemprop="headline"><?php the_title();?></h1>
			</header>
			<?php $cpost=get_post(get_the_ID());?>
			<span class="blog-time-style relative flex-inline-middle-center">
				<time itemprop="datePublished" content="<?php echo date("M d, Y", strtotime($cpost->post_date));?>"><?php echo date("M d, Y", strtotime($cpost->post_date));?></time>
			</span>
			<address class="title-style-5 title-color-5 relative" rel="author" itemprop="author" itemscope="" itemtype="http://schema.org/Person">By Sherlock</address>
		</div>	



		<div class="bg-box vertical-padding-small side-padding top-margin post">
			<article class="content-style" itemprop="articleBody">
				<!-- The Content Starts -->
                <?php 
                if ( have_posts() ) : 
                    while ( have_posts() ) : the_post();
                        the_content();
                    endwhile;
                endif;
                ?>
                <!-- The Content ends --> 
			</article>
			<div class="post-categories top-margin-small ui-repeater" id="BlogPostPageV1_ITM1027854_BlogPostPageV1CategoryList">
				<strong class="title-style-3 title-color-3">Categories</strong>
				<div class="content-style top-margin-tiny">
					<ul>
						<?php
						$post_categories = wp_get_post_categories( get_the_ID() );
						foreach($post_categories as $c){
						    $cat = get_category( $c );
						?>
							<li data-item="i" data-key="1958640">
								<a href="<?php bloginfo('url'); ?>/category/<?php echo $cat->slug ?>"><?php echo $cat->name ?></a>
							</li>
						<?php }?>
					</ul>
				</div>
			</div>
		</div>

	<!-- Releted Post include here -->
	<?php get_template_part( 'page-templates/common/bc-related-post'); ?>
</div>				
</section>
</main>
<?php get_footer()?>
