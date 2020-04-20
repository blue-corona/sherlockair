<div class="related-posts top-margin ui-repeater" id="">
	<div class="header text-align center-800" id="BlogPostPageV1RelatedPostsHeader">
		<h4 class="title-style-1 title-color-1">Related Posts</h4>
	</div>	
	<ul class="flex-grid-block-800-auto-size-wrap-break-1024 top-margin-small">
	<?php
	$the_query = codeless_get_related_posts( get_the_ID(), 3 );
		global $cl_from_element;
		$cl_from_element['is_related'] = true;            
		// Display posts
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) : $the_query->the_post();
		
		?>
		 <li class="flex-" data-item="i" data-key="2020456">
			<a class="flex-column full border-radius scaling-item bg-box relative" href="<?php the_permalink() ?>">
				<div class="img pad-height-50 fit full" role="presentation">
					<?php if (has_post_thumbnail() ): 
	                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'single-post-thumbnail' );?>
	                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="<?php the_title()?>" style="background-image: url('<?php echo $image[0]; ?>');">	
	                <?php endif; ?>
				</div>
				<div class="side-padding-large vertical-padding-tiny full">
					<strong class="title-style-3 title-color-1"><?php the_title(); ?></strong>
					<?php $cpost=get_post(get_the_ID());?>
					<span class="note-style">
						<time content="<?php echo date("M d, Y", strtotime($cpost->post_date));?>"> 
                        <?php echo date("M d", strtotime($cpost->post_date));?></time>
                    </span>
					<p><?php echo get_the_excerpt();?> ...</p>
					<span class="btn v2">View Article</span>
				</div>
			</a>
		</li>
	<?php
	endwhile;
	}
	wp_reset_query();
	
	?>
	</ul>
</div>