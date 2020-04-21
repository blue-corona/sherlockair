<?php
/**
 * Template Name: ContactPage Template
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();?>

<main id="MainZone">
<section class="contact-system v1 light-bg text-center col-50-50 items-touching bg-box-unlike" id="ContactSystemV2" data-onvisible="show">
	
		
	<div class="main thin text-align">
		<header class="no-pad bottom-margin-tiny center-800" id="ContactSystemV2Header">
		<h1>Contact Sherlock Plumbing, Heating and Air Today!</h1>
		<svg class="header-flair" role="presentation">
		<use href="<?php echo get_stylesheet_directory_uri();?>/includes/flair.svg#header"></use>
		</svg>
		</header>
		<div class="content-style relative bottom-margin" id="ContactSystemV2Content">Regular Hours: 
		<br>Monday 7:00 AM - 6:00 PM 
		<br>Tuesday - Friday 7:00 AM - 6:30 PM 
		<br>Saturday 8:00 AM - 3:00 PM 
		<br>Sunday Closed
		<br>After-Hours Services Available 
		<br>*Additional Fees Apply
		</div>
	</div>

	
	<div class="main top-margin-small">
		<div class="flex-auto-responsive-margined flex-direction align-items item-widths item-spacing"> 
<div class="bg-box side-padding-small vertical-padding-small under-item border-radius ui-repeater slock_icon1" id="ContactSystemV2Form">
            <div class="sherlock_formicon"><img src="<?php echo get_home_url();?>/wp-content/themes/bluecorona-child-theme/images/sherlock_formicon.png" / alt="icon"></div>					
<div class="flair-border" data-item="i" data-key="">
						<span class="flair-1"></span>
						<span class="flair-2"></span>
						<div class="overlap-padding">
              <?php gravity_form(6, false, false, false, '', true); ?>
						</div>
					</div>	
				</div>
			<div class="map-container over-item relative border-radius" style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/images/contact/static-map.png);">
				<div class="imap" data-zoom="14" data-map='{"draggable":false,"scrollwheel":false,"zoomControl":false}' data-autopin="true" data-icon="<?php echo get_stylesheet_directory_uri()?>/images/brand/map-pin.png" data-address="2880 Scott Street, Suite #104, Vista, CA 92081"></div>
				<span>
					<div class="location-pop bg-box unlike-bg pseudo-before flex-column-center active">
						<p>
							2880 Scott Street,
								<br>Suite #104
							<br> Vista, CA 92081
						</p>
						<ul class="relative">
							<span id="ContactSystemV2_1" data-process="if" style="display:none" field="{Cookie:PPCP1/7602955014}">
								<li class="flex-middle">
									<svg viewBox="0 0 36 36" class="fit" title="Phone Icon" role="presentation"><use data-href="<?php echo get_stylesheet_directory_uri()?>/cms/svg/site/5d1zpk6tjes.36.svg#phone"></use></svg>
									<span><span id="ContactSystemV2_2" data-process="replace" data-replace="{F:P3:Cookie:PPCP1/760-295-5014}"><?php echo bc_get_theme_mod('bc_theme_options', 'bc_phone',false, '760-295-5014');?></span></span>
								</li>
							</span>
							
							<li class="flex-middle">
								<svg viewBox="0 0 36 36" class="fit" title="Directions Arrow Icon" role="presentation"><use data-href="<?php echo get_stylesheet_directory_uri()?>/cms/svg/site/5d1zpk6tjes.36.svg#directions"></use></svg>
								<a rel="nofollow noopener" target="_blank" href="https://maps.google.com/maps?f=q&amp;hl=en&amp;z=15&amp;q=2880%20Scott%20Street,Vista,CA,92081">Map &amp; Directions [+]</a>
							</li>
						</ul>
					</div>
				</span>
			</div>
		</div>
	</div>
</section>
<script id="Process_ContactSystemV2" type="text/javascript" style="display:none;">window.Process&&Process.Page(['Process_ContactSystemV2','ContactSystemV2_1','ContactSystemV2_2']);</script>
</main>
<?php get_footer('variant');?>
