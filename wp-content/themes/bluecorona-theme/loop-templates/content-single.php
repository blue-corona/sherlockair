<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>



<?php if (has_post_thumbnail() ): 
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'large' );?>
	<img src="<?php echo $image[0]; ?>" alt="post img" class=" img-responsive img-fluid">
<?php endif; ?>
<span class="bc_font_alt_1 text-capitalize bc_text_36 bc_color_primary d-block">
<?php
global $post;
$categories = get_the_category( $post->ID );
if ( ! empty( $categories ) ) {
	$myArray = array();
    foreach ( $categories as $category ) 
    {
        if ( strtolower( $category->name ) != 'uncategorized' )
        {
            $myArray[] = $category->name;
        }
    }
}
echo implode( ', ', $myArray );
?>
</span>
<h1 class="bc_font_alt_2   bc_color_primary mt-2"><?php the_title()?></h1>
<p class="m-0"><strong><?php the_time( 'm/d/y' ); ?></strong></p>
<?php the_content(); ?>