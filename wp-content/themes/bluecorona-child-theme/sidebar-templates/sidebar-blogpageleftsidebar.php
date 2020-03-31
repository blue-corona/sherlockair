<?php
/**
 * Blog - subpage rightside setup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<div class="side-zone third" id="SideZone">
        <?php dynamic_sidebar( 'singleblogleftside' ); ?>

	<!-- <aside class="side-nav v1 bg-box like-bg border-radius-item ui-repeater" id="BlogSystemV1SideNavArchives">
	<nav>
		<header class="text-left">
			<h5>Archives</h5>
		</header>
			<?php /*<ul role="menu">
				<?php
					global $wpdb;
					$limit = 0;
					$year_prev = null;
					$dates = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month , YEAR( post_date ) AS year, COUNT( id ) as post_count FROM $wpdb->posts WHERE post_status = 'publish' and post_date <= now( ) and post_type = 'post' GROUP BY month , year ORDER BY post_date DESC");

					$dates = array_map(function($dates){


					}, $dates){

					}
					foreach($months as $month) :
    			?>
            </ul>
        <?php }*/?>
			<ul role="menu">
				<li class="level-1 always-open">
					<a href="/blog/2020/" target="" role="menuitem">2020
						<em>(6)</em>
					</a>
					<ul role="menu" class="inner-list">
						<li class="level-2" data-item="i">
							<a href="/blog/2020/march/" target="" role="menuitem">March
								<em>(1)</em>
							</a>
						</li>
					</ul>
				</li><li class="level-1 always-open">
					<a href="/blog/2019/" target="" role="menuitem">2019
						<em>(26)</em>
					</a>
					<ul role="menu" class="inner-list">
						<li class="level-2" data-item="i">
							<a href="/blog/2019/december/" target="" role="menuitem">December
								<em>(2)</em>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
	</aside> -->
</div>
