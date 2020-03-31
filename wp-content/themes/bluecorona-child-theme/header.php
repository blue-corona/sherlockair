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

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/190ffc3b0c.js" crossorigin="anonymous"></script>
  </head>

  <body <?php custom_body_class(); body_class();?>>
    <header id="HeaderZone">
      <div class="header v4 dark-bg bg-box-like transparent-bg" id="HeaderV4" universal_="true">
        <a name="SiteTop"></a>
        <div class="top-bar bg-box side-padding-small flex-middle-between" id="HeaderV4TopBarContent">
          <div class="d-block d-lg-none show-mar position-absolute w-100" style="top: 0; left:0">
            <?php get_template_part( 'page-templates/common/bc-nav-menu' ); ?>
          </div>          
          <div class="container-fluid">
            <div class="row text-center">
              <div class="announcmenet-bar-left col-xl-4 d-none d-xl-block my-auto">
                <strong class="title-style-5 title-color-5">Residential Plumbing &amp; HVAC Experts</strong>
              </div>
              <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <a class="btn v1" href="<?php echo get_home_url();?>/covid-19-safety-measures/">COVID-19 Safety Measures</a>
              </div>
              <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <span id="HeaderV4_1">
                  <a class="phone-link phone-number-style" href="tel:<?php echo bc_get_theme_mod('bc_theme_options', 'bc_phone',false, '760-206-4167');?>"><span id="HeaderV4_3"><?php echo bc_get_theme_mod('bc_theme_options', 'bc_phone',false, '760-206-4167');?></span></a>
                </span>
                <a class="search-link hide-500 btn-colors" href="<?php echo get_home_url();?>/search/" title="Search Our Site" aria-label="Search Our Site" style="display: inline-block; width: 2em;"><svg viewBox="0 0 24 24" title="Search Icon" data-use="<?php echo get_stylesheet_directory_uri()?>/cms/svg/site/5d1zpk6tjes.24.svg#search">
                  <path d="M23.234 21.861L17.522 15.92c1.468-1.746 2.274-3.942 2.274-6.23c0-5.343-4.347-9.69-9.69-9.69s-9.69 4.347-9.69 9.69s4.347 9.69 9.69 9.69c2.006 0 3.918-0.604 5.552-1.754l5.756 5.986c0.24 0.25 0.564 0.387 0.91 0.387c0.328 0 0.639-0.126 0.876-0.352C23.7 23.164 23.716 22.364 23.234 21.861zM10.104 2.529c3.95 0 7.163 3.213 7.163 7.163s-3.213 7.163-7.163 7.163s-7.163-3.213-7.163-7.163S6.156 2.529 10.104 2.529z"></path>
                </svg></a>
              </div>              
            </div>
          </div>
          <!-- <strong class="title-style-5 title-color-5 hide-1280">Residential Plumbing &amp; HVAC Experts</strong>
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
          
          <a class="search-link hide-500 btn-colors" href="<?php echo get_home_url();?>/search/" title="Search Our Site" aria-label="Search Our Site"><svg viewBox="0 0 24 24" title="Search Icon" data-use="<?php echo get_stylesheet_directory_uri()?>/cms/svg/site/5d1zpk6tjes.24.svg#search">
          <path d="M23.234 21.861L17.522 15.92c1.468-1.746 2.274-3.942 2.274-6.23c0-5.343-4.347-9.69-9.69-9.69s-9.69 4.347-9.69 9.69s4.347 9.69 9.69 9.69c2.006 0 3.918-0.604 5.552-1.754l5.756 5.986c0.24 0.25 0.564 0.387 0.91 0.387c0.328 0 0.639-0.126 0.876-0.352C23.7 23.164 23.716 22.364 23.234 21.861zM10.104 2.529c3.95 0 7.163 3.213 7.163 7.163s-3.213 7.163-7.163 7.163s-7.163-3.213-7.163-7.163S6.156 2.529 10.104 2.529z"></path>
          </svg></a>
          </div> -->
        </div>
        <div class="nav-bar flex-middle-between center-800" id="HeaderV4TopNavigation">
          <div class="d-block d-lg-none show-mar position-absolute w-100" style="top: 0; left:0">
            <?php get_template_part( 'page-templates/common/bc-nav-menu' ); ?>
          </div>
          <a class="top-logo fit side-padding-small vertical-padding-tiny max-logo" href="<?php echo get_home_url();?>">
            <img class="sticky-logo" loading="lazy" alt="Sherlock Plumbing, Heating and Air" title="Sherlock Plumbing, Heating and Air" src="<?php echo get_stylesheet_directory_uri();?>/images/logos/color-logo.png">
            <img class="default-logo" loading="lazy" alt="Sherlock Plumbing, Heating and Air" title="Sherlock Plumbing, Heating and Air" src="<?php echo get_stylesheet_directory_uri();?>/images/logos/Logo2.png">
          </a>
          <div class="d-none d-lg-inline-block hide-mar w-100">
            <?php get_template_part( 'page-templates/common/bc-nav-menu' ); ?>
          </div>
          <div class="d-inline-block show-mar d-lg-none">
              <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler bc_color_error_bg mr-md-4" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="fas text-white fa-bars"></span></button>
          </div>
        </div>
      </div>
      <script id="Process_HeaderV4" type="text/javascript" style="display:none;">
      window.Process && Process.Page(['Process_HeaderV4', 'HeaderV4_1', 'HeaderV4_2', 'HeaderV4_3', 'HeaderV4_4', 'HeaderV4_5', 'HeaderV4_6']);
      </script>
    </header>