<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<!-- Footer -->
<footer id="FooterZone">
    <section class="footer v8 bg-box-like col-33-66 items-spaced text-center vertical-middle flow-reverse dark-bg bg-image svg-deco-top-curve-top-dark" id="FooterV8" universal_="true" itemscope="" itemtype="http://schema.org/HVACBusiness" data-onvisible="show">
        <picture class="img-bg bg-position" role="presentation" data-role="picture">
            <source media="(max-width: 500px)" srcset="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/footers/footer-v8-bg-mobile.jpg"/>
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" loading="lazy" alt="" title="" data-src="<?php echo get_stylesheet_directory_uri();?>/assets/footers/footer-v8-bg.jpg">
        </picture>
        <!-- contact our team section ends -->
        <?php get_template_part( 'page-templates/common/bc-contact-our-team'); ?>
        <!-- contact our team section ends -->
        <div class="bg-box unlike-bg vertical-padding-small">
            <div class="main">
                <?php dynamic_sidebar( 'footer' ); ?>
            </div>
        </div>
    </section>
<script id="Process_FooterV8" type="text/javascript" style="display:none;">window.Process&&Process.Page(['Process_FooterV8','FooterV8_1','FooterV8_2','FooterV8_3','FooterV8_4','FooterV8_5','FooterV8_6']);</script>
<?php get_template_part( 'page-templates/common/bc-copyright'); ?>

</footer>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()?>/js/a2d466f0-967f-0135-c594-06a9ed4ca31b.js" defer></script>


<script type="text/javascript">rrequire('m/site-header',function(){$('#HeaderV4TopNavigation').siteHeader();});</script>
<script type="text/javascript">rrequire('m/scrolling-list',function(){$('#CouponV2List').scrollingList();});</script>
<script type="text/javascript">rrequire('form',function(){$('#Form_ContactV6').html5form();});</script>
<script type="text/javascript">
rrequire('m/scrolling-list',function(){$('#ReviewsV2Feed').scrollingList();});
rrequire('m/scrolling-list',function(){$('#SideCouponV1List').scrollingList();});
</script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()?>/js/a_1bfgxd0uf.2001241829564.js" defer data-require='["sa"]'></script>

<div class="modal fade" id="disclaimer" tabindex="-1" role="dialog" aria-labelledby="disclaimerLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content rounded-0">
      <div class="modal-header">
        <button type="button" class="close bc_color_secondary_hover_bg" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fal fa-times fa-2x"></i></span>
        </button>
      </div>
      <div class="modal-body px-5 pb-5 col-md-10 offset-1">
        <h1 id="disclaimerLabel" class="bc_color_black">Disclaimer</h1>
            <p class="bc_color_black">The information on this website is for informational purposes only; it is deemed accurate but not guaranteed. It does not constitute professional advice. All information is subject to change at any time without notice. <a class="text-danger bc_text_bold" href="<?php echo get_site_url()?>/contact-us" target="_blank">Contact us</a> for complete details.</p>
      </div>
    </div>
  </div>
</div>

<script>
  window.onscroll = function() {
    stickyHeader();
  };

  let header = document.getElementById("HeaderZone");
  let sticky = header.offsetTop;

  function stickyHeader() {
    if (window.pageYOffset > 1) {
      console.log('scroll!')
      header.classList.add("sticky-header");
    } else {
      header.classList.remove("sticky-header");
    }
  }
</script>


<?php wp_footer(); ?>
</body>
</html>
