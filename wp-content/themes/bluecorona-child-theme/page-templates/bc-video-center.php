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
	.content-style ul li::before{top: 1em;}
</style>
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
					<strong class="title-style-3 title-color-3">
						<?php the_title(); ?>
					</strong>
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
							<div class="img pad-height-50 bg-box unlike-bg border-radius-item" role="presentation">	
							<?php if(get_field('video_thumbnail')){ 
							$vthumb = get_field('video_thumbnail');
							?>
								<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="<?php echo $vthumb['alt']; ?>" title="<?php the_title(); ?>" style="background-image:url('<?php echo $vthumb['url']; ?>')">
							<?php } else { ?>
							<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Meet The Owner" title="Meet The Owner" style="background-image:url('/wp-content/uploads/2020/03/03-Downstown_20171013011841-1-1.png')">
							<?php } ?>
							
							<span class="btn-style btn-colors flex-middle-center-inline">
								<svg viewBox="0 0 36 36" title="Play"><use data-href="/cms/svg/site/5d1zpk6tjes.36.svg#play"></use></svg>
							</span>
									
								
							</div>
							<strong class="title-style-4 top-margin-tiny text-center"><?php the_title(); ?></strong>
						</a>
					</li>
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
<?php get_footer()?>
