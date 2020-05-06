<?php
/**
 * Meet the  owner
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $post;
?>
<!--  -->
<section class="v1 dark-bg homepage-readmore">
  <div class="main">
    <div class="homepage-exp-content" style="display: none;">
      <!-- The Content Starts -->
      <?php 
      if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
          the_content();
        endwhile;
      endif;
      ?>
      <!-- The Content ends -->
    </div>
    <div class="text-center">
      <button class="homepage-exp-btn v1 homepage-readmore-btn">Read More</button>
    </div>
  </div>
</section>
<!--  -->