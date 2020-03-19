<?php
/**
 * Search results partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<main id="MainZone">
<!-- Banner starts -->
<?php //get_template_part( 'page-templates/common/bc-banner-section' ); ?>
<!-- Banner ends -->


<section class="two-column-layout light-bg col-66-33 vertical-padding items-spaced flow-reverse" id="TwoColumnLayout">
    <div class="main thin text-align">
        <header class="no-pad bottom-margin-tiny center-800" id="ContactSystemV2Header">
            <h1><?php the_title();?></h1>
            <svg class="header-flair" role="presentation">
            <use href="<?php echo get_stylesheet_directory_uri();?>/includes/flair.svg#header"></use>
            </svg>
        </header>

		<?php
		the_title(
			sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>'
		);
		?>

		<?php if ( 'post' == get_post_type() ) : ?>

			<div class="entry-meta">

				<?php understrap_posted_on(); ?>

			</div><!-- .entry-meta -->

		<?php endif; ?>

	

	<div class="entry-summary">

		<?php the_excerpt(); ?>

	</div><!-- .entry-summary -->

