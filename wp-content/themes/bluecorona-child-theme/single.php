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
	.content-style ul li::before{top: 1em;}
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
			    <img data-src="<?php echo $image[0]; ?>">
			    <?php }else{ ?>
			    <img data-src="<?php echo get_stylesheet_directory_uri();?>/assets/sub-banners/sub-banner-2.jpg">
			<?php }?>
			</picture>
			<header class="no-pad bottom-margin-tiny relative">
				<h1 itemprop="headline"><?php the_title();?></h1>
			</header>
			<?php $cpost=get_post(get_the_ID());?>
			<span class="blog-time-style relative flex-inline-middle-center">
				<time itemprop="datePublished" content="<?php echo date("M d, Y", strtotime($cpost->post_date));?>"><?php echo date("M d, Y", strtotime($cpost->post_date));?></time>
			</span>
			<address class="title-style-5 title-color-5 relative" rel="author" itemprop="author" itemscope="" itemtype="http://schema.org/Person">By
				<span itemprop="name"><?php echo get_author_name(get_the_ID()); ?></span>
			</address>
			<ul class="flex-grid-small-center-wrap top-margin-tiny relative text-align center-800" id="BlogPostPageV1SocialShare">
				<li class="fit">
					<a class="btn-colors social-link addthis_button_facebook at300b" href="#" title="Facebook" aria-label="Facebook" target="_blank"><svg viewBox="0 0 36 36"><use data-href="<?php echo get_stylesheet_directory_uri()?>/cms/svg/admin/c7mo_bz1802.36.svg#facebook"></use></svg></a>
				</li>
				<li class="fit">
					<a class="btn-colors social-link addthis_button_twitter at300b" href="#" title="Twitter" aria-label="Twitter" target="_blank"><svg viewBox="0 0 36 36"><use data-href="<?php echo get_stylesheet_directory_uri()?>/cms/svg/admin/c7mo_bz1802.36.svg#twitter"></use></svg></a>
				</li>
				<li class="fit">
					<a class="btn-colors social-link addthis_button_pinterest_share at300b" href="#" title="Pinterest" aria-label="Pinterest" target="_blank"><svg viewBox="0 0 36 36"><use data-href="<?php echo get_stylesheet_directory_uri()?>/cms/svg/admin/c7mo_bz1802.36.svg#pinterest"></use></svg></a>
				</li>
				<li class="fit">
					<a class="btn-colors social-link addthis_button_linkedin at300b" href="#" title="Linkedin" aria-label="Linkedin" target="_blank"><svg viewBox="0 0 36 36"><use data-href="<?php echo get_stylesheet_directory_uri()?>/cms/svg/admin/c7mo_bz1802.36.svg#linkedin"></use></svg></a>
				</li>
			</ul>
		</div>	
		
		<ul class="flex-spaced-between top-margin post-paging">
			<li class="next-btn">
				<?php previous_post_link('%link', 'Prev Post', true); ?>
			</li>
			<li class="prev-btn">
				<?php next_post_link('%link', 'Next Post', true ); ?>
			</li>
		</ul>


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
