<?php
/**
 * Template Name: New Video Center
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
	.video-system.v1 li [class*="pad-height-"] .btn-style{
    position: absolute;
    bottom: 1em;
    right: 1em;
}
</style>
<main id="MainZone">
<!-- Banner starts -->
<?php get_template_part( 'page-templates/common/bc-banner-section' ); ?>
<!-- Banner ends -->

<section class="bread-crumbs v1 thin bg-box-none light-bg" id="BreadCrumbsV1Thin">
	
	<div class="main thin">

		<nav class="relative bg-box border-radius-item">
			<?php custom_breadcrumbs(); ?>
		</nav>
	</div>
</section>
<section class="video-system v1 category small-padding light-bg bg-box-like ui-repeater show" id="VideoSystemV1Category" data-onvisible="show">	
	<div class="main">
	<?php

$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $post->ID,
    'order'          => 'ASC',
	'orderby'        => 'menu_order'
 );


$parent = new WP_Query( $args );

if ( $parent->have_posts() ) : ?>

    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
	<?php
	$children = get_pages( array( 'child_of' => get_the_ID() ) );
		if( count( $children ) > 0 ) {
			?>
<ul>
			<li>
				<div class="divider flex-middle top-margin-small bottom-margin-small">
					<a href="<?php the_permalink(); ?>" title="Sherlock Heating &amp; Air Conditioning">
						<strong class="title-style-3">
							Sherlock Heating &amp; Air Conditioning
						</strong>
					</a>
					<!-- <strong class="title-style-3 title-color-3">
						<?php the_title(); ?>
					</strong> -->
					<span class="line auto"></span>
<a href="<?php the_permalink(); ?>" class="btn-colors btn-style fit" title="<?php the_title(); ?>"><?php echo "(".count( $children ).")  Videos"; ?>
					</a>
				</div>
				<?php

				$args = array(
					'post_type'      => 'page',
					'posts_per_page' => 3,
					'post_parent'    => get_the_ID(),
					'order'          => 'ASC',
					'orderby'        => 'menu_order'
				 );


				$parent = new WP_Query( $args );

				if ( $parent->have_posts() ) : ?>
					<ul class="video-list flex-wrap-grid-large-block-800">
					<?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
					
					<li class="third relative featured" data-item="i" data-key="109328">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<div class="img pad-height-50 bg-box unlike-bg" role="presentation">

					<?php if(get_field('video_thumbnail')){ 
						$vthumb = get_field('video_thumbnail');
						?>
						<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="<?php echo $vthumb['alt']; ?>" title="<?php the_title(); ?>" style="background-image:url('<?php echo $vthumb['url']; ?>')">
					<?php } else { ?>
					<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Meet The Owner" title="Meet The Owner" style="background-image:url('<?php echo get_stylesheet_directory_uri()?>/images/default-video.png')">
					<?php } ?>

					
					
					<span class="btn-style btn-colors flex-middle-center-inline">
						<svg viewBox="0 0 36 36" title="Play" data-use="<?php echo get_stylesheet_directory_uri();?>/cms/svg/site/5d1zpk6tjes.36.svg#play">
						<path d="M18 1.5A16.5 16.5-3803.788 1 1 1.5 18A16.52 16.52-3803.788 0 1 18 1.5Zm0-1.5a18 18 0 1 0 18 18A18 18-3803.788 0 0 18 0Zm-5.244 26.542a0.784 0.784 0 0 1-0.384-0.1a0.755 0.755 0 0 1-0.372-0.649V10.2a0.75 0.75 0 0 1 1.128-0.65l13.5 7.8a0.754 0.754 0 0 1 0 1.3l-13.5 7.793a0.752 0.752 0 0 1-0.384 0.104h0.012Zm0.744-15.04v12.99l11.244-6.496l-11.244-6.496h0Z"></path>
						</svg>
					</span>
					</div>
					<strong class="title-style-4 top-margin-tiny text-center"><?php the_title(); ?></strong>
					</a>
					</li>

						<?php /*<li class="third relative featured" data-item="i" data-key="109328">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<div class="img pad-height-50 bg-box unlike-bg border-radius-item" role="presentation">	
							<?php if(get_field('video_thumbnail')){ 
							$vthumb = get_field('video_thumbnail');
							?>
								<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="<?php echo $vthumb['alt']; ?>" title="<?php the_title(); ?>" style="background-image:url('<?php echo $vthumb['url']; ?>')">
							<?php } else { ?>
							<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Meet The Owner" title="Meet The Owner" style="background-image:url('https://www.sherlockair.com/cms/thumbnails/00/501x285/images/video-thumbnails/video.jpg')">
							<?php } ?>
							
							<!-- https://www.sherlockair.com/cms/thumbnails/00/501x285/images/video-thumbnails/video.jpg -->
							<span class="btn-style btn-colors flex-middle-center-inline">
								<svg viewBox="0 0 36 36" title="Play"><use data-href="https://www.sherlockair.com/cms/svg/site/5d1zpk6tjes.36.svg#play"></use></svg>
							</span>
									
								
							</div>
							<strong class="title-style-4 top-margin-tiny text-center"><?php the_title(); ?></strong>
						</a>
					</li> */?>
					<?php endwhile; ?>
					</ul>
				<?php endif; //wp_reset_postdata(); ?>
			</li>
				
		</ul>
			<?php
		} 
	?>


		
		
		
		

    <?php endwhile; ?>

<?php endif; wp_reset_postdata(); ?>
	</div>
</section>
</main>
<?php get_footer()?>
