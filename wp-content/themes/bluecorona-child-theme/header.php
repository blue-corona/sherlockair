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
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()?>/js/bc-sherlock-script.js"></script>
    <!-- for sub page sidebar -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri()?>/css/jzzyopmtdiu.1912021253503.css"/>
    <!-- for sub page sidebar -->
    <!-- for contact page -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri()?>/css/ifixi19iga3.1912021253503.css" data-require='["cms","cms-behave"]'/>
    <!-- for contact page -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri()?>/css/qf7rt3tjga1.1912021253503.css" data-require='["cms","cms-behave"]'/>

    <!-- for blog page -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri()?>/css/o80zbrt86oo.1912021253503.css" data-require='["cms","cms-behave"]'/>
    <!-- for blog page -->

    <!-- for single blog page -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri()?>/css/includes/8sx6nwnyz0v.1912021253503.css" data-require='["cms","cms-behave"]'/>
    <!-- for single blog page -->

    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()?>/js/xfe68wggbgd.2003121251140.js"></script>

    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()?>/js/xfe68wggbgd.2002251052536.js" defer data-require='["j/poly","j/modernizr","j/jquery.3.x","j/jquery.ui","j/ui.touch","j/ui.wheel","j/ui.draw","j/ui.mobile","j/timezone","static","j/jquery.cookie","extensions","uri","behaviors","c/scrollbar","c/loading","m/date","form","adapter","v/jwplayer","video","a/bootstrap","svg"]'></script>
</head>
<body <?php custom_body_class(); ?>>
    <header id="HeaderZone">
        <div class="header v4 dark-bg bg-box-like transparent-bg" id="HeaderV4" universal_="true">
          <a name="SiteTop"></a>
            <div class="top-bar bg-box side-padding-small flex-middle-between" id="HeaderV4TopBarContent">
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
                    <img class="dark-logo" loading="lazy" alt="Sherlock Plumbing, Heating and Air" title="Sherlock Plumbing, Heating and Air" src="<?php echo get_stylesheet_directory_uri();?>/images/logos/Logo.png">
                    <img class="light-logo" loading="lazy" alt="Sherlock Plumbing, Heating and Air" title="Sherlock Plumbing, Heating and Air" src="<?php echo get_stylesheet_directory_uri();?>/images/logos/Logo2.png">
                </a>
            <button class="menu-btn desktop hide-800 btn-colors" title="Main Menu" aria-label="Main Menu" data-role="btn">
            <span></span>
            <span></span>
            <span></span>
            </button>
            <?php get_template_part( 'page-templates/common/bc-nav-menu' ); ?>
            </div>
          <button class="menu-btn mobile btn-colors" title="Main Menu" aria-label="Main Menu" data-role="btn">
          <span></span>
          <span></span>
          <span></span>
          </button>
       </div>
   <script id="Process_HeaderV4" type="text/javascript" style="display:none;">window.Process&&Process.Page(['Process_HeaderV4','HeaderV4_1','HeaderV4_2','HeaderV4_3','HeaderV4_4','HeaderV4_5','HeaderV4_6']);</script>
</header>