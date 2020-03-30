<?php
/**
 * The footer for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<footer id="FooterZone">
   <section class="footer v3 dark-bg" id="FooterV3" universal_="true">
      <div class="main">
         <div class="footer-info flex-block-1024-margined-auto-responsive">
            <?php dynamic_sidebar( 'footer_contact' ); ?>
         </div>
      </div>
   </section>
   <script id="Process_FooterV3" type="text/javascript" style="display:none;">window.Process&&Process.Page(['Process_FooterV3','FooterV3_1','FooterV3_2','FooterV3_3','FooterV3_4','FooterV3_5']);</script>
   <?php get_template_part( 'page-templates/common/bc-copyright'); ?>
</footer>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()?>/js/a2d466f0-967f-0135-c594-06a9ed4ca31b.js" defer></script>
<script type="text/javascript">rrequire('m/site-header',function(){$('#HeaderV4TopNavigation').siteHeader();});</script>
<script type="text/javascript">rrequire('form',function(){$('#Form_ContactSystemV2').html5form();});</script>
<!-- <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()?>/js/ejn8p62h7wg.2001241829564.js" defer data-require='["sa"]'></script> -->
<?php wp_footer(); ?>

</body>
</html>