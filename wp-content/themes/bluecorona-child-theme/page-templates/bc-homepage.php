<?php
/**
 * Template Name: HomePage Template
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
?>

<main id="MainZone">
  <section class="panel-group v1 relative no-padding light-bg bg-image bg-bottom-center" id="PanelGroupV5">

    <picture class="img-bg bg-position" role="presentation" data-role="picture">
      <source media="(max-width: 500px)" srcset="<?php echo get_stylesheet_directory_uri();?>/assets/panel-groups/panel-group-v5-bg-mobile.jpg" />
      <source media="(max-width: 1024px)" srcset="<?php echo get_stylesheet_directory_uri();?>/assets/panel-groups/panel-group-v5-bg-tablet.jpg" />
      <img src="<?php echo get_stylesheet_directory_uri();?>/assets/panel-groups/panel-group-v5-bg.jpg">
    </picture>
    <div class="box" id="PanelGroupV5Zone">

      <section class="mainstage v8 bg-box-none text-left col-50-50 no-padding bg-bottom-right vertical-middle dark-bg bg-image flow-reverse items-overlapped" id="MainstageV8" data-onvisible="show">
        <picture class="img-bg" role="presentation" data-role="picture">
          <source media="(max-width: 500px)" src="<?php echo get_stylesheet_directory_uri();?>/assets/mainstages/mainstage-v14-bg-mobile.jpg" />
          <source media="(max-width: 800px)" src="<?php echo get_stylesheet_directory_uri();?>/assets/mainstages/mainstage-v14-bg-tablet.jpg" />
          <img src="<?php echo get_stylesheet_directory_uri();?>/assets/mainstages/mainstage-v14-bg.jpg">
        </picture>
        <div class="flex-auto-responsive-margined flex-direction align-items item-spacing item-widths">
          <div class="over-item">
            <div class="info">
              <div class="bg-box side-padding-large vertical-padding-small text-align center-800 box-flair full">
                <div class="flair-border">
                  <span class="flair-1"></span>
                  <span class="flair-2"></span>
                  <em class="title-color-2 subtitle">
                    Turn Your Home Into a Year-Round
                  </em>
                  <span class="title-font">
                    <strong class="highlight-font title-color-1">
                      Oasis <br>of Comfort
                    </strong>
                  </span>
                  <em class="title-color-2 subtitle">
                    Sherlock Plumbing, Heating &amp; Air
                  </em>
                  <svg role="presentation" class="header-flair">
                    <use href="<?php echo get_stylesheet_directory_uri();?>/includes/flair.svg#header"></use>
                  </svg>
                  <p class="title-style-5 title-color-5 bottom-margin-small">
                    Proudly serving customers in Vista, Carlsbad, Oceanside, Encinitas, San Marcos, and surrounding cities in North San Diego County since 2002 with exceptional service.&nbsp; &nbsp; &nbsp;
                  </p>
                  <ul class="flex-between-spaced-grid-auto-size-max-3-wrap-break-1280-block-500 center-800">
                    <li class="top-margin-tiny fit" data-item="i">
                      <a class="full btn v1" href="<?php echo get_home_url();?>/contact-us/">Contact Us</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <picture class="under-item img pad-height-75 bg-position" role="presentation" data-role="picture">
            <source media="(max-width: 500px)" src="<?php echo get_stylesheet_directory_uri();?>/assets/mainstages/mainstage-v14-img-mobile.png" />
            <source media="(max-width: 800px)" src="<?php echo get_stylesheet_directory_uri();?>/assets/mainstages/mainstage-v14-img-tablet.png" />
            <img src="<?php echo get_stylesheet_directory_uri();?>/assets/mainstages/mainstage-v14-img.png">
          </picture>
        </div>
      </section>

      <section class="contact v6 light-bg bg-box-unlike col-50-50 items-spaced vertical-middle text-left bg-image flow-reverse" id="ContactV6" data-onvisible="show">


        <picture class="img-bg bg-position" role="presentation" data-role="picture">
          <source media="(max-width: 500px)" src="<?php echo get_stylesheet_directory_uri();?>/assets/contact/contact-v6-bg-mobile.jpg" />
          <img src="<?php echo get_stylesheet_directory_uri();?>/assets/contact/contact-v6-bg.jpg">
        </picture>
        <div class="main">
          <div class="flex-auto-responsive-margined-block-1024 align-items item-widths item-spacing flex-direction">
            <div class="text-align vertical-padding-small block-no-pad">
              <header class="no-pad bottom-margin-tiny" id="ContactV6ContentHeader">
                <h1><strong>North County's Premier HVAC & Plumbing Company</strong></h1>
                <h2>Proudly servicing Carlsbad, Vista, Encinitas, Oceanside, San Marcos &amp; the Surrounding Areas</h2>
              </header>
              <div class="content-style" id="ContactV6ContentMainContent">
                <p>Dear Neighbor,</p>
                <p>Thank you for visiting our website! At Sherlock Plumbing, Heating &amp;
                  Air, our vision is to lead, challenge and elevate the standard of the
                  service industry by exceeding our clients' expectations with an extraordinary
                  and seamless experience. During your initial in-home assessment, you will
                  meet directly with the technician or comfort consultant assigned to your
                  home so they can perform a thorough evaluation and provide solutions that
                  are specific to your needs. Unlike other HVAC service providers in Carlsbad
                  and North San Diego County, we set our pricing based on the job&mdash;not
                  by the hour. You&rsquo;ll know exactly what your HVAC repair or installation
                  costs before work begins. There are no surprises or hidden expenses. That
                  is our commitment to you.</p>
                <p>Located in Vista, we aim to provide ideal comfort to our clients while
                  fostering personal and professional growth within our team. Our staff
                  of background-checked and drug-tested technicians take pride in providing
                  professional, friendly, best-in-class service on every appointment. We
                  promise quality work at fair prices for all your home comfort needs. Your
                  satisfaction is guaranteed!</p>
                <p>I personally stand behind our work - my name is on every business card,
                  uniform, and truck. We invite you to give us a call and find out what
                  the Sherlock Experience is all about!</p>
                <p>Sincerely,</p>
                <p><img alt="Aaron Sherlock signature" src="<?php echo get_stylesheet_directory_uri();?>/images/signature.jpg"></p>
                <p><strong>Aaron Sherlock, President</strong></p>
                <p></p>
              </div>
              <div id="ContactV6BtnCon">

                <div class="top-margin-small">
                  <a class="btn v1" href="<?php echo get_home_url();?>/about-us/" aria-labelledby="ContactV6ContentHeader">About Us</a>
                </div>

              </div>
            </div>
            <div class="bg-box border-radius side-padding vertical-padding-small box-flair slock_icon">
              <div class="sherlock_formicon"><img src="<?php echo get_home_url();?>/wp-content/themes/bluecorona-child-theme/images/sherlock_formicon.png" / alt="icon"></div>
              <div class="flair-border">
                <span class="flair-1"></span>
                <span class="flair-2"></span>
                <header class="text-center" id="ContactV6Header">
                  <h4>Contact Us Today</h4>
                  <strong>Call us or complete the form below.</strong>
                  <svg role="presentation" class="header-flair">
                    <use href="<?php echo get_stylesheet_directory_uri();?>/includes/flair.svg#header"></use>
                  </svg>
                </header>
                <div id="ContactV6Form" class="ui-repeater">
                  <fieldset data-item="i" data-key="">
                    <?php echo do_shortcode('[gravityform id=1 ajax=true]');?>

                    <!-- <ul class="flex-spaced-between-wrap-block-500">
                                <li class="half">
                                    <div class="input-text">
                                        <input required="required" type="text" id="ContactV6Form_ITM0_FirstName" name="ContactV6Form$ITM0$FirstName" value>
                                        <label class="hide" for="ContactV6Form_ITM0_FirstName">First Name</label>
                                        <div class="validation" for="ContactV6Form_ITM0_FirstName" data-type="valueMissing">
                                            Please enter your first name.
                                        </div>
                                    </div>
                                </li>
                                <li class="half">
                                    <div class="input-text">
                                        <input required="required" type="text" id="ContactV6Form_ITM0_LastName" name="ContactV6Form$ITM0$LastName" value>
                                        <label class="hide" for="ContactV6Form_ITM0_LastName">Last Name</label>
                                        <div class="validation" for="ContactV6Form_ITM0_LastName" data-type="valueMissing">
                                            Please enter your last name.
                                        </div>
                                    </div>
                                </li>
                                <li class="half">
                                    <div class="input-text">
                                        <input id="ContactV6Form_ITM0_Phone" type="tel" pattern="[(]\d{3}[)][\s]\d{3}[\-]\d{4}" class="phone-mask" required="required" name="ContactV6Form$ITM0$Phone" value>
                                        <label class="hide" for="ContactV6Form_ITM0_Phone">Phone</label>
                                        <div class="validation" for="ContactV6Form_ITM0_Phone" data-type="valueMissing">
                                            Please enter your phone number.
                                        </div>
                                        <div class="validation" for="ContactV6Form_ITM0_Phone" data-type="typeMismatch">
                                            This isn't a valid phone number.
                                        </div>
                                    </div>
                                </li>
                                <li class="half">
                                    <div class="input-text">
                                        <input required="required" type="email" id="ContactV6Form_ITM0_EmailAddress" name="ContactV6Form$ITM0$EmailAddress" value>
                                        <label class="hide" for="ContactV6Form_ITM0_EmailAddress">Email</label>
                                        <div class="validation" for="ContactV6Form_ITM0_EmailAddress" data-type="valueMissing">
                                            Please enter your email address.
                                        </div>
                                        <div class="validation" for="ContactV6Form_ITM0_EmailAddress" data-type="typeMismatch">
                                            This isn't a valid email address.
                                        </div>
                                    </div>
                                </li>
                                <li class="select">
                                    <div class="input-text">
                                        <select id="ContactV6Form_ITM0_LeadTypeID" required="required" name="ContactV6Form$ITM0$LeadTypeID">
                                            <option value=""></option>
                                            <option value="1">Yes, I am a potential new customer</option>
                                            <option value="11">No, I'm a current existing customer</option>
                                            <option value="13">I'm neither.</option>
                                        </select>
                                        <label class="hide" for="ContactV6Form_ITM0_LeadTypeID">Are you a new customer?</label>
                                        <svg class="site-arrow">
                                            <use href="<?php echo get_stylesheet_directory_uri();?>/includes/flair.svg#arrow-down"></use>
                                        </svg>
                                        <div class="validation" for="ContactV6Form_ITM0_LeadTypeID" data-type="valueMissing">
                                            Please make a selection.
                                        </div>
                                    </div>
                                </li>
                                
                                    <li class="message">
                                        <div class="input-text">
                                            <textarea required="required" type="text" id="ContactV6Form_ITM0_Message" name="ContactV6Form$ITM0$Message"></textarea>
                                            <label class="hide" for="ContactV6Form_ITM0_Message">Message</label>
                                            <div class="validation" for="ContactV6Form_ITM0_Message" data-type="valueMissing">
                                                Please enter a message.
                                            </div>
                                        </div>
                                    </li>
                                
                            </ul> -->
                  </fieldset>
                  <!-- <input id="ContactV6Form_ITM0_FFD6" type="hidden" name="ContactV6Form$ITM0$FFD6" value data-item="i" data-key="">
                        <div class="top-margin-tiny text-center" data-item="i" data-key="">
                            <button class="btn v1" aria-labelledby="ContactV6Header" type="submit" id="ContactV6Form_ITM0_ctl09" name="ContactV6Form$ITM0$ctl09" data-commandname="Update">Send Information</button>
                        </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Service Area Starts -->
      <?php get_template_part( 'page-templates/common/bc-services-section'); ?>
      <!-- Service Area ends -->
    </div>
  </section>
  <section class="panel-group v1 relative no-padding dark-bg bg-image" id="PanelGroupV6">

    <picture class="img-bg bg-position" role="presentation" data-role="picture">
      <source media="(max-width: 500px)" src="<?php echo get_stylesheet_directory_uri();?>/assets/panel-groups/panel-group-v6-bg-mobile.jpg" />
      <source media="(max-width: 1024px)" src="<?php echo get_stylesheet_directory_uri();?>/assets/panel-groups/panel-group-v6-bg-tablet.jpg" />
      <img src="<?php echo get_stylesheet_directory_uri();?>/assets/panel-groups/panel-group-v6-bg.jpg">
    </picture>

    <div class="box" id="PanelGroupV6Zone">
      <!-- Expandable content section starts -->
      <?php get_template_part( 'page-templates/common/bc-expandable-content'); ?>
      <!-- Expandable content section ends -->
      <!-- Meet the owner section starts -->
      <?php get_template_part( 'page-templates/common/bc-meet-the-owner'); ?>
      <!-- Meet the owner section ends -->
      <!-- Testimonial Section starts -->
      <?php echo do_shortcode('[bc-testimonial-review]');?>
      <!-- Testimonial Section ends -->
    </div>
  </section>
  <!-- Promotion Section starts -->
  <?php echo do_shortcode('[bc-promotion]');?>
  <!-- Promotion Section ends -->
  <!-- Blog Section Starts Here -->
  <section class="blog v7 light-bg text-left bg-box-like col-60-40 items-spaced bg-image" id="BlogV7" data-onvisible="show">
    <picture class="img-bg" role="presentation" data-role="picture">
      <source media="(max-width: 500px)" src="<?php echo get_stylesheet_directory_uri();?>/assets/blogs/blog-v7-bg-mobile.jpg" />
      <img src="<?php echo get_stylesheet_directory_uri();?>/assets/blogs/blog-v7-bg.jpg">
    </picture>
    <div class="flex-auto-responsive-block-1024-margined flex-direction item-spacing item-widths align-items main">
      <div class="relative">
        <header class="text-align center-800" id="BlogV7Header">
          <h4>Read Our Blog</h4>
          <svg role="presentation" class="header-flair">
            <use href="<?php echo get_stylesheet_directory_uri();?>/includes/flair.svg#header"></use>
          </svg>
        </header>
        <?php 
            $args  = array( 'post_type' => 'post', 'posts_per_page' => 2, 'order'=> 'DESC','post_status'  => 'publish');
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
            ?>
        <ul class="blog-list flex-grid-wrap-auto-size-max-2-block-500 close-gap-500 ui-repeater" id="BlogV7List">
          <?php while($query->have_posts()) : $query->the_post();?>
          <li class="flex- auto">
            <a class="flex-column full border-radius-item scaling-img-item bg-box relative" href="<?php the_permalink(get_the_ID()); ?>">
              <div class="img pad-height-50 fit full" role="presentation">
                <?php if (has_post_thumbnail() ): 
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'single-post-thumbnail' );?>
                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="<?php the_title()?>" style="background-image: url('<?php echo $image[0] ?>');">
                <?php endif; ?>
              </div>
              <div class="flex-column-top side-padding-large vertical-padding-tiny full auto">
                <div class="auto full">
                  <strong class="title-style-4 title-color-4"><?php the_title()?></strong>
                  <?php $cpost=get_post(get_the_ID());?>
                  <span class="blog-time-style full"><time content="<?php echo date("M d, Y", strtotime($cpost->post_date));?>">
                      <?php echo date("M d", strtotime($cpost->post_date));?>
                    </time></span>
                  <p class="hide-800"><?php echo get_the_excerpt();?> ...</p>
                </div>
                <span class="fit btn v2">View Article</span>
              </div>
            </a>
          </li>
          <?php endwhile; wp_reset_query();?>
        </ul>
        <?php endif; ?>
        <div id="BlogV7BtnCon"></div>
      </div>
      <picture class="img pad-height-50 bg-position" role="presentation" data-role="picture">
        <source media="(max-width: 500px)" src="<?php echo get_stylesheet_directory_uri();?>/assets/blogs/blog-v7-img-mobile.png" />
        <img src="<?php echo get_stylesheet_directory_uri();?>/assets/blogs/blog-v7-img.png" data-size="1920">
      </picture>
    </div>
  </section>
</main>
<!-- Blog Section ends Here -->
<?php get_footer(); ?>