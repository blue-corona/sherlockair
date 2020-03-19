<?php
/**
 * The template for displaying search results pages.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>
    <div class="container-fluid p-0 bc_home_section_bg" <?php if (has_post_thumbnail() ) { $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id() ), 'single-post-thumbnail' ); ?> style="background-image: url('<?php echo $image[0]; ?>');" <?php }else{ ?> style="background-image: url('<?php echo get_template_directory_uri();?>/img/blog_banner.png');" <?php }?>>
        <div class="hero-overlay-gradient">
            <div class="container py-4 py-md-5">
                <div class="row text-center text-lg-left text-md-left py-5">
                    <?php $title = get_post_meta( $post->ID, 'title_overlay', true );
                        if(isset($title) && !empty($title)){
                            echo $title;
                    }?>
                </div>
            </div>
        </div><!-- .hero-overlay-gradient-->
    </div>
<div class="wrapper" id="search-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
			<div class="col-lg-8 col-md-12 col-xs-12 mt-5 px-md-5 sub_page_sidebar">
				<main class="site-main" id="main">

					<?php if ( have_posts() ) : ?>

						<header class="page-header">

								<h1 class="page-title">
									<?php
									printf(
										/* translators: %s: query term */
										esc_html__( 'Search Results for: %s', 'understrap' ),
										'<span>' . get_search_query() . '</span>'
									);
									?>
								</h1>

						</header><!-- .page-header -->

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php
							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'loop-templates/content', 'search' );
							?>

						<?php endwhile; ?>

					<?php else : ?>

						<?php get_template_part( 'loop-templates/content', 'none' ); ?>

					<?php endif; ?>

				</main><!-- #main -->
			
			<!-- The pagination component -->
			<?php understrap_pagination(); ?>
			<!-- Close left side content -->
			</div>
			<!-- right sidebar starts -->
			<?php get_template_part( 'sidebar-templates/sidebar', 'subpagerightsidebar' ); ?>
            <!-- right sidebar ends -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #search-wrapper -->

<?php get_footer(); ?>
