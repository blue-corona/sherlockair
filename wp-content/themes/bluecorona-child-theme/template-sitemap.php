<?php
/**
 * Template Name: Sitemap
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="MainZone"><section class="site-map v1 bg-box-like light-bg" id="SiteMapV1" data-onvisible="show">
<div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
 
            <div class="html-sitemap">
                 
                <h2>Author(s):</h2>
                <ul class="sitemap-authors">
                    <?php wp_list_authors('exclude_admin=1&optioncount=1'); ?>
                </ul>
          
                <h2>Pages:</h2>
                <ul class="sitemap-pages">
                    <?php wp_list_pages(array('exclude' => '', 'title_li' => '')); // Exclude pages by ID ?>
                </ul>
 
                <h2>Posts:</h2>
                <ul>
                    <?php
                        $categories = get_categories('exclude='); // Exclude categories by ID
                        foreach ($categories as $cat) {
                        ?>
                            <li class="category">
                                <h3><span class="grey">Category: </span><?php echo $cat->cat_name; ?></h3>
                                <ul class="cat-posts">
                                <?php
                                    query_posts('posts_per_page=-1&cat='.$cat->cat_ID); //-1 shows all posts per category. 1 to show most recent post.
                                    while(have_posts()): 
                                        the_post();
                                        $category = get_the_category();
                                        if ($category[0]->cat_ID == $cat->cat_ID) { ?>
                                            <li>
                                                <?php the_time('M d, Y')?> &raquo; <a href="<?php the_permalink() ?>"  title="<?php the_title(); ?>"><?php the_title(); ?></a> (<?php comments_number('0', '1', '%'); ?>)
                                            </li>
                                        <?php 
                                        }
                                    endwhile;
                                ?>
                                </ul> 
                            </li>
                    <?php } ?>
                </ul>
                <?php  wp_reset_query(); ?>
 
                <h2>Archives:</h2>
                <ul class="sitemap-archives">
                    <?php wp_get_archives('type=monthly&show_post_count=true'); ?>
                </ul>
            </div>
 
        </main>
    </div>
</section></main>
<?php get_footer()?>