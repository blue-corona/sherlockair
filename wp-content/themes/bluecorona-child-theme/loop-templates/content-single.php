<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="container-fluid">
	<div class="container">
		<div class="">
			<h1><?php the_title()?></h1>			
		</div>
		<!-- Hide category -->
		<!-- <div class="row ml-1">
	        <span class="text-capitalize">
			<?php 
			global $post;
			$categories = get_the_category();
			if ( ! empty( $categories ) ) {
				foreach ($categories as $category) :?>
					<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="bc_color_light_grey"><?php echo $category->name; ?></a>
			<?php 
				endforeach;
			}
			?>
	        </span>
	    </div> -->
		<!-- Hide Author Name -->
	   	<!-- <div class="row ml-1">
	        <span class="bc_color_light_grey">Written by <?php echo get_author_name();?></span>
	    </div> -->
		<article class="row single-post mt-3 no-gutters">
	        <div class="col-12">
	        	<?php if (has_post_thumbnail() ) { $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id() ), 'single-post-thumbnail' ); ?>
	            <div class="image-wrapper float-left pr-3 mb-4">
			    <img class="img-fluid" src="<?php echo $image[0]?>"> 
			    </div>
			    <?php } ?> 
	            <div class="single-post-content-wrapper p-0">
	                <?php the_content();?>
	            </div>
	        </div>
	    </article>
	</div>
</div>
