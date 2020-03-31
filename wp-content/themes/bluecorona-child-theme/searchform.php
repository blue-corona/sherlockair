<?php
/**
 * The template for displaying search forms
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<form method="get" class="hide-mar" id="bc_searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<input class="" id="s" name="s" type="text" placeholder="how can we help you?" value="<?php the_search_query(); ?>">
</form>
<form method="get" class="show-mar" id="bc_searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<div class="mx-auto d-table">
		<a href="#" id="searchsubmit" name="submit">
        	<i aria-hidden="true" class="fa fa-search <?php echo $args['icon_color_class']; ?>"></i> &nbsp; 
        </a>
		<!-- <input class="transparent-input" id="s" name="s" type="text"
			placeholder="how can we help you today?" data-toggle="collapse" data-target=".navbar-collapse.show" style="width:85%;" value="<?php the_search_query(); ?>" style=""> -->
		<input class="transparent-input" id="s" name="s" type="text"
			placeholder="how can we help you today?" style="width:85%; height:45px;" value="<?php the_search_query(); ?>" style="">
	</div>
</form>