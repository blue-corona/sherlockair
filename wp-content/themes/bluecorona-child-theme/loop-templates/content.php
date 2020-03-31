<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<li class="half flex-">
	<a class="flex-column full border-radius scaling-item bg-box relative" href="<?php echo get_permalink();?>">
		<div class="img pad-height-50 fit full" role="presentation">
		<?php if (has_post_thumbnail() ): 
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'blogpost-thumbnail' );?>
			<img src="<?php echo $image[0]; ?>" alt="post img" class=" img-responsive postImg">
		<?php endif;?>
			<!-- <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="/cms/thumbnails/34/480x240//images/blog/Heating-to-Cooling_iStock-639882424-2.jpg"> -->
		</div>
		<div class="side-padding-large vertical-padding-tiny full">
			<strong class="title-style-3 title-color-1"><?php the_title()?></strong>
			<?php $cpost=get_post(get_the_ID());?>
			<span class="note-style"><time content="<?php echo date("M d, Y", strtotime($cpost->post_date));?>"><?php echo date("M d", strtotime($cpost->post_date));?></time></span>
			<p><?php echo get_the_excerpt();?>...</p>
			<span class="btn v2">View Article</span>
		</div>
	</a>
</li>
