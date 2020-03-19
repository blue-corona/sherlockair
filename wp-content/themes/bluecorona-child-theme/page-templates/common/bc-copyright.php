<?php
/**
 * Copyright
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<?php
echo bc_get_theme_mod('bc_theme_options', 'footer','copyright_text', '<section class="scorpion-footer small-padding dark-bg" id="HSScorpionFooter">
    <div class="main">
        <div class="flex-middle-spaced-between">
         <small class="info" id="HSScorpionFooterDisclaimer">
            <div>License# 804838</div>
            <p>&copy; 2020 All Rights Reserved.</p>
         </small>
         <a href="'.get_site_url().'/home-services-marketing/" class="sd-logo fit" target="_blank"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Internet Marketing Experts" title="Internet Marketing Experts" data-src="'.get_stylesheet_directory_uri().'/images/client-footer-logos/home-services-logo.png"></a>
        </div>
    </div>
</section>');
?>	


