<?php
/**
 * Services Section
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<?php 
    $args  = array( 'post_type' => 'bc_services', 'posts_per_page' => -1,'orderby' => 'menu_order', 'order' => 'ASC', 'post_status'  => 'publish');
    $query = new WP_Query( $args );
    $i = 0;
    if ( $query->have_posts() ) :
    ?>
  <section class="services v4 light-bg text-center bg-box-like bg-image" id="ServicesV4" data-onvisible="show">
      <picture class="img-bg bg-position" role="presentation" data-role="picture">
          <source media="(max-width: 500px)" srcset="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/services/services-v4-bg-mobile.jpg"/>
          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/services/services-v4-bg.jpg">
      </picture>
      <div class="main">
          <header class="text-align center-800" id="ServicesV4Header">
              <h4>Quality Services&nbsp;</h4>
              <strong>There is no problem too big or small for our team to solve!</strong>
              <svg role="presentation" class="header-flair"><use href="<?php echo get_stylesheet_directory_uri();?>/includes/flair.svg#header"></use></svg>
          </header>
          <ul class="services-list flex-center-wrap-grid-large-auto-size-max-4-break-1280-block-500 close-gap-500 ui-repeater" id="ServicesV4Services">
          <?php 
          while($query->have_posts()) : $query->the_post();
          $show_on_homepage = get_post_meta( get_the_id(), 'show_on_homepage', true );
          $bc_button_title = get_post_meta( get_the_id(), 'bc_button_title', true );
            if ($show_on_homepage == 'true') {
            $i++;
          ?>
              <li class="flex-column fit bg-box no-shadow border-radius-item" data-item="i" data-key="14114">
                  <a class="flex- auto scaling-img-item relative full border-radius-item box-shadow" href="">
                          <picture class="img pad-height-" role="presentation">
                              <?php 
                                if (has_post_thumbnail() ) { 
                                  $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id() ), 'single-post-thumbnail' ); ?>
                                  <img data-src="<?php echo $image[0]; ?>">
                                <?php }else{ ?>
                                    <img data-src="<?php echo get_stylesheet_directory_uri();?>/cms/thumbnails/00/483x362/images/air.jpg">
                              <?php }?>
                          </picture>
                      <span class="btn-style btn-colors full"><?php if(!empty($bc_button_title)){echo $bc_button_title;}?></span>
                  </a>
              </li>
            <?php } endwhile; wp_reset_query();?>
          </ul>
          <div id="ServicesV4BtnCon"></div>
      </div>
  </section>
<?php endif; ?>
