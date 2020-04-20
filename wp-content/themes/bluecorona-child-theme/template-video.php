<?php
/**
 * Template Name: Video
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
<style type="text/css">
.prev-btn a,
.next-btn a {
  background-color: #842F3F;
  color: #ffffff !important;
  padding: 0.5em 1.5em;
  /*font-weight: 500;*/
}

.prev-btn a:hover,
.next-btn a:hover {
  background-color: #005076;
}

.content-style ul li.next-btn::before {
  top: 1em;
}

.content-style ul li.prev-btn::before {
  top: 1em;
}
</style>
<main id="MainZone">
  <section class="bread-crumbs v1 thin bg-box-none light-bg" id="BreadCrumbsV1Thin">

    <div class="main thin">

      <nav class="relative bg-box border-radius-item">
        <?php custom_breadcrumbs(); ?>
      </nav>
    </div>
  </section>

  <section class="video-system v1 video light-bg text-center bg-box-like flow-reverse col-50-50 items-touching tiny-padding ui-tabs ui-repeater" id="VideoSystemVideoV1Video" data-onvisible="show">




    <picture class="img-bg bg-position" role="presentation" data-role="picture" data-item="i" data-key="129024">
      <source media="(max-width: 500px)" srcset="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="/assets/videos/video-system-video-v1-bg-mobile.jpg" />
      <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="" data-src="/assets/videos/video-system-video-v1-bg.jpg">
    </picture>
    <div class="main thin bottom-margin-small" itemprop="video" itemscope itemtype="http://schema.org/VideoObject" data-item="i" data-key="129024">
      <div class="flex-auto-responsive-margined flex-direction align-items item-widths item-spacing">
        <div class="flex-column-middle-center center-800 text-align bg-box side-padding-small vertical-padding-small under-item">
          <div class="overlap-padding full">
            <header class="no-pad bottom-margin-tiny full">
              <h1 itemprop="name"><?php the_title();?></h1>
            </header>
            <div class="top-margin-tiny">
              <ul class="flex-grid-small-center-wrap top-margin-tiny text-align center-800" id="VideoSystemVideoV1VideoSocialShare">
                <li class="fit"><a class="btn-colors social-link addthis_button_facebook" aria-label="AC Check" addthis:title="AC Check" addthis:url="http://www.sherlockair.com/video-center/sherlock-heating-air-conditioning/ac-check/" href="https://www.facebook.com/sherlockair/" target="_blank"><svg viewBox="0 0 36 36" data-use="<?php echo get_stylesheet_directory_uri()?>/cms/svg/admin/pxsy0eemvwl.36.svg#facebook">
                      <path d="M20.762 0C14.563 0 13.152 4.601 13.152 7.544L13.152 11.658L9.562 11.658L9.562 18.016L13.144 18.016C13.144 26.175 13.144 36 13.144 36L20.684 36C20.684 36 20.684 26.076 20.684 18.016L25.77 18.016L26.438 11.658L20.692 11.658L20.692 7.924C20.692 6.517 21.628 6.191 22.287 6.191L26.345 6.191L26.345 0.024L20.762 0Z"></path>
                    </svg></a></li>
                <li class="fit"><a class="btn-colors social-link addthis_button_twitter" aria-label="AC Check" addthis:title="AC Check" addthis:url="http://www.sherlockair.com/video-center/sherlock-heating-air-conditioning/ac-check/" href="https://twitter.com/sherlockhvac" target="_blank"><svg viewBox="0 0 36 36" data-use="<?php echo get_stylesheet_directory_uri()?>/cms/svg/admin/pxsy0eemvwl.36.svg#facebook">
                      <path d="M25.3 3.379C21.146 3.379 18.125 6.452 18.125 10.383C18.125 10.874 18.125 11.243 18.251 11.489L18.125 11.489C10.951 11.489 6.168 10.014 2.518 5.59C1.888 6.697 1.259 7.803 1.259 9.154C1.259 11.611 2.895 13.7 4.909 15.051L4.909 15.051C3.65 15.051 2.266 14.438 1.259 13.823L1.259 13.823C1.259 17.386 6.294 21.44 9.692 22.055C9.251 22.485 8.439 22.629 7.548 22.629C5.898 22.629 3.977 22.135 3.65 22.055L3.65 22.055C4.657 24.88 7.678 26.723 10.825 26.723C8.307 28.69 5.286 29.672 1.762 29.672C1.133 29.672 0.629 29.672 0 29.55L0 29.55C3.272 31.637 7.803 32.621 12.083 32.621C25.678 32.621 32.601 22.177 32.601 12.594C32.601 12.225 32.601 11.734 32.601 11.365C33.859 10.505 35.118 9.154 36 7.68L36 7.68C34.615 8.294 32.727 9.032 31.216 9.154C32.727 8.294 34.237 6.205 34.866 4.485L34.866 4.485C33.733 5.223 32.349 6.083 30.964 6.574L30.083 5.714C28.699 4.363 27.44 3.379 25.3 3.379Z" />
                    </svg></a></li>
                <li class="fit"><a class="btn-colors social-link addthis_button_bbb_share" href="https://www.bbb.org/us/ca/vista/profile/air-conditioning-repair/sherlock-plumbing-heating-air-1126-15026872" title="BBB.org" aria-label="BBB.org" target="_blank" rel="noopener">

                    <svg viewBox="0 0 36 36" data-use="<?php echo get_stylesheet_directory_uri()?>/cms/svg/admin/pxsy0eemvwl.36.svg#bbb">
                      <path d="M13.451 14.864L10.737 18.225a4.261 4.261 0 0 0 0.914 5.882l4.982 3.27c0.854 0.555 0.932 1.111 0.51 1.709l0.721 0.496l2.521-3.182A4.05 4.05-0.049 0 0 19.452 20.236L14.484 16.907a1.079 1.079 0 0 1-0.33-1.575L13.451 14.864ZM17.74 0L13.556 5.249a6.107 6.107 0 0 0 1.501 8.459l6.884 4.591a3.284 3.284 0 0 1 0.555 4.5l0.584 0.404l4.757-6.001a6.001 6.001 0 0 0-1.336-9L19.062 3.343a1.934 1.934 0 0 1-0.689-2.999L17.74 0ZM6.701 33.001H12.326L14.2 36h7.499l1.874-2.999H29.201l-1.874-1.501H8.575L6.701 33.001Z"></path>
                    </svg>
                  </a></li>
                <li class="fit"><a class="btn-colors social-link addthis_button_linkedin" aria-label="AC Check" addthis:title="AC Check" addthis:url="http://www.sherlockair.com/video-center/sherlock-heating-air-conditioning/ac-check/" href="https://www.linkedin.com/company/sherlock-heating-and-air-conditioning-inc-" target="_blank"><svg viewBox="0 0 36 36" data-use="<?php echo get_stylesheet_directory_uri()?>/cms/svg/admin/pxsy0eemvwl.36.svg#linkedin">
                      <path d="M4.286 1.688C1.695 1.688 0 3.347 0 5.536C0 7.684 1.647 9.378 4.187 9.378L4.238 9.378C6.875 9.378 8.517 7.677 8.517 5.529C8.467 3.342 6.875 1.688 4.286 1.688ZM27.096 11.936C23.076 11.936 20.557 14.106 20.091 15.627L20.091 12.149L12.208 12.149C12.311 13.996 12.208 34.312 12.208 34.312L20.091 34.312L20.091 22.319C20.091 21.653 20.06 20.986 20.262 20.508C20.805 19.176 21.969 17.792 24.063 17.792C26.799 17.792 28.044 19.842 28.044 22.843L28.044 34.312L36 34.312L36 21.989C36 15.125 32.082 11.936 27.096 11.936ZM0.908 12.15L0.908 34.312L7.924 34.312L7.924 12.15L0.908 12.15Z" />
                    </svg></a></li>
              </ul>
            </div>

          </div>
        </div>
        <?php
          $file = get_field('add_video');
          $vthumb = get_field('video_thumbnail');
          if ( $file ): 
        ?>
        <div class="flex-middle-center over-item relative">
          <video class="full box-shadow" type="video/mp4" src="<?php echo $file['url']; ?>" controls="" poster="<?php echo $vthumb['url']; ?>" preload="none"></video>
          <meta itemprop="thumbnail" content="<?php echo $vthumb['url']; ?>" />
          <meta itemprop="thumbnailUrl" content="<?php echo $vthumb['url']; ?>" />
          <meta itemprop="uploadDate" content="Mar 25, 2019" />
          <meta itemprop="description" content="<?php echo $vthumb['description']; ?>" />
        </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>
<?php get_footer()?>