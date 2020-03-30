<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html>

  <head>
  <link rel="icon" href="<?php echo bc_get_theme_mod('bc_theme_options', 'bc_favicon_upload',false, get_template_directory_uri().'/img/favicon.ico'); ?>">
    <?php wp_head(); ?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()?>/js/bc-sherlock-script.js"></script>
    <!-- for sub page sidebar -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri()?>/css/jzzyopmtdiu.1912021253503.css" />
    <!-- for sub page sidebar -->
    <!-- for contact page -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri()?>/css/ifixi19iga3.1912021253503.css" data-require='["cms","cms-behave"]' />
    <!-- for contact page -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri()?>/css/qf7rt3tjga1.1912021253503.css" data-require='["cms","cms-behave"]' />

    <!-- for blog page -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri()?>/css/o80zbrt86oo.1912021253503.css" data-require='["cms","cms-behave"]' />
    <!-- for blog page -->

    <!-- for single blog page -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri()?>/css/8sx6nwnyz0v.1912021253503.css" data-require='["cms","cms-behave"]' />
    <!-- for single blog page -->

    <!-- for search page -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri()?>/css/lko5txt18y7.1912021253503.css" data-require='["cms","cms-behave"]'/>
    <!-- for search page -->

    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()?>/js/xfe68wggbgd.2003121251140.js" async data-require='["j/poly","j/modernizr","j/ui.mobile","j/timezone","static","j/jquery.cookie","extensions","uri","behaviors","c/scrollbar","c/loading","m/date","form","adapter","v/jwplayer","video","a/bootstrap","svg"]'></script>
  </head>

  <body <?php custom_body_class(); ?>>
    <div class="d-block d-lg-none show-mar position-absolute w-100" style="top: 0; left:0;">
      <?php get_template_part( 'page-templates/common/bc-nav-menu' ); ?>
    </div>
    <header id="HeaderZone">
      <div class="header v4 dark-bg bg-box-like transparent-bg" id="HeaderV4" universal_="true">
        <a name="SiteTop"></a>
        <div class="top-bar bg-box side-padding-small flex-middle-between" id="HeaderV4TopBarContent">
          <div class="d-block d-lg-none show-mar position-absolute w-100 h-100" style="top: 0; left:0;">
            <?php get_template_part( 'page-templates/common/bc-nav-menu' ); ?>
          </div>
          <strong class="title-style-5 title-color-5 hide-1280">Residential Plumbing &amp; HVAC Experts</strong>
          <div class="flex-middle-end center-800 auto">
            <nav class="hide-1024 secondary-nav" aria-label="Quick Links" id="HeaderV41QuickLinks">
              <ul class="flex-middle">
              </ul>
            </nav>
            <div class="phones flex-middle">
              <span id="HeaderV4_1">
                <a class="phone-link phone-number-style" href="tel:<?php echo bc_get_theme_mod('bc_theme_options', 'bc_phone',false, '760-206-4167');?>"><span id="HeaderV4_3"><?php echo bc_get_theme_mod('bc_theme_options', 'bc_phone',false, '760-206-4167');?></span></a>
              </span>
            </div>
            <a class="search-link hide-500 btn-colors" href="<?php echo get_home_url();?>/search/" title="Search Our Site" aria-label="Search Our Site">
              <svg viewBox="0 0 24 24" title="Search Icon">
                <use data-href="<?php echo get_stylesheet_directory_uri()?>/cms/svg/site/5d1zpk6tjes.24.svg#search"></use>
              </svg>
            </a>
          </div>
        </div>
        <div class="nav-bar flex-middle-between center-800" id="HeaderV4TopNavigation">
          <a class="top-logo fit side-padding-small vertical-padding-tiny max-logo" href="<?php echo get_home_url();?>">
            <img class="sticky-logo" loading="lazy" alt="Sherlock Plumbing, Heating and Air" title="Sherlock Plumbing, Heating and Air" src="<?php echo get_stylesheet_directory_uri();?>/images/logos/color-logo.png">
            <img class="default-logo" loading="lazy" alt="Sherlock Plumbing, Heating and Air" title="Sherlock Plumbing, Heating and Air" src="<?php echo get_stylesheet_directory_uri();?>/images/logos/Logo2.png">
          </a>
          <div class="d-none d-lg-inline-block hide-mar w-100">
            <?php get_template_part( 'page-templates/common/bc-nav-menu' ); ?>
          </div>
          <div class="d-inline-block d-lg-none show-mar">
              <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler bc_color_error_bg" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="fas text-white fa-bars"></span></button>
          </div>
        </div>
        <?php if (is_page(6)) { ?>
          <div class="notification v2 dark-bg text-center" id="NotificationBannerV2">
            <div class="side-padding text-align content-style" id="NotificationBannerV2Notification">
              <p><a href="/covid-19-safety-measures/" target="_blank">AT SHERLOCK PLUMBING, HEATING AND AIR, THE HEALTH AND SAFETY OF OUR CUSTOMERS IS OUR TOP PRIORITY, NOT ONLY DURING THESE CONCERNING TIMES WITH THE SPREAD OF COVID-19, BUT ALWAYS. OUR TEAM IS PREPARED TO CONTINUE DOING BUSINESS AS USUAL WHILE FOLLOWING THE CDC GUIDELINES TO NAVIGATE THIS SITUATION AS A SAFELY AS POSSIBLE FOR CUSTOMERS AND EMPLOYEES. CLICK HERE TO LEARN MORE</a></p>
            </div>
          </div>
        <?php } ?>
      </div>
      <script id="Process_HeaderV4" type="text/javascript" style="display:none;">
      window.Process && Process.Page(['Process_HeaderV4', 'HeaderV4_1', 'HeaderV4_2', 'HeaderV4_3', 'HeaderV4_4', 'HeaderV4_5', 'HeaderV4_6']);
      </script>
    </header>