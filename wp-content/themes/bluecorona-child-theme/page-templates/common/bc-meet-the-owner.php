<?php
/**
 * Meet the  owner
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<!--  -->
<section class="video v1 dark-bg vertical-middle bg-image bg-box-unlike text-left flow-reverse col-60-40 items-overlapped ui-repeater" id="VideoV1" data-onvisible="show">
    <picture class="img-bg bg-position" role="presentation" data-role="picture">
      <source media="(max-width: 500px)" srcset="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/videos/video-v1-bg-mobile.jpg"/>
      <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/videos/video-v1-bg.jpg">
    </picture>
    <div class="main">
      <header class="text-align center-800" id="VideoV1Header">
         <h4>Carlsbad's Finest</h4>
         <strong>Get to know our team!</strong>
         <svg role="presentation" class="header-flair">
            <use href="<?php echo get_stylesheet_directory_uri();?>/includes/flair.svg#header"></use>
         </svg>
      </header>
      <div class="video-con flex-auto-responsive flex-direction align-items item-widths item-spacing" data-item="i" data-key="109328">
         <div class="info bg-box text-align under-item center-800 box-flair-offset side-padding vertical-padding border-radius">
            <div class="flair-border">
               <span class="flair-1"></span>
               <span class="flair-2"></span>
               <div class="overlap-padding content-style">
                  <strong class="title-style-3 title-color-3">Meet The Owner</strong>
                  <p>Meet Aaron Sherlock, president of Sherlock Plumbing, Heating & Air Conditioning. In this brief video, he shares a bit of the history of Sherlock and what makes our HVAC service company so different from all the rest. The secret to our success? Treating customers like you and their homes with utmost respect and genuine courtesy.</p>
               </div>
            </div>
         </div>
         <div class="video over-item relative box-shadow border-radius">
            <video type="video/mp4" src="<?php echo get_stylesheet_directory_uri();?>/media/01-Meet-The-Owner.mp4" controls="" preload="none" poster="<?php echo get_stylesheet_directory_uri();?>/cms/thumbnails/00/620x340/images/video-thumbnails/video.jpg"></video>
         </div>
      </div>
      <div id="VideoV1MoreBtn">
         <div class="text-center top-margin">
            <a class="btn v1" href="<?php echo get_home_url();?>/video-center/">More Videos </a>
         </div>
      </div>
    </div>
</section>
<!--  -->