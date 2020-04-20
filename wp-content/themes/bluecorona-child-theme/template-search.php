<?php
/**
 * Template Name: Search
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

<section class="site-search-system v1 light-bg text-center bg-box-unlike" id="SiteSearchSystemV1" data-onvisible="show">
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		?>
		<div class="main thin relative">
		<header class="no-pad bottom-margin-tiny center-800 text-align" id="SiteSearchSystemV1Header">
		<h1>
			<?php the_title(); ?>
		</h1>
		<?php
		printf(
			/* translators: %s: query term */
			esc_html__( 'Search Results for: %s', 'understrap' ),
			'<span>' . get_search_query() . '</span>'
		);
		?>
								
		<?php get_search_form(); ?>
		<?php /* Start the Loop */ ?>


					
		</div>
		<?php
	} // end while
} 
?>	
	
	
	

</section>
<?php get_footer()?>