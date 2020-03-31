<?php
/**
 * Search results partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<li class="flex- third auto half" data-item="i">
	<a class="flex-column-top bg-box full scaling-item border-radius-item" href="<?php get_the_permalink();?>">
		<div class="auto full side-padding-large vertical-padding-tiny flex-column-top">
			<div class="auto full">
				<strong class="title-style-2 title-color-2"><?php the_title();?></strong>
				<p class="no-bottom-margin"><?php the_excerpt(); ?></p>
			</div>
			<span class="btn v2 fit top-margin-tiny">Visit this page</span>
		</div>
	</a>
</li>
<style type="text/css">
a:hover {text-decoration: none;}
</style>
