<?php
	
	$mother_id = get_top_parent_page_id();
	$post_type =get_post_type( $post );

	if($mother_id != 37):	
?>
<footer class="footer-page">
	<div class="row">
		<div class="grid-8">
			
			<?php wp_nav_menu(array(
		         'container' => false,                           // remove nav container
		         'container_class' => '',                 // class of container (should you choose to use it)
		         'menu' => __( 'Footer Sitemap', 'bonestheme' ),  // nav name
		         'menu_class' => 'sitemap group-3',               // adding custom nav class
		         'theme_location' => 'footer-links',                 // where it's located in the theme
		         'before' => '',                                 // before the menu
				 'after' => '',                                  // after the menu
				 'link_before' => '',                            // before each link
	             'link_after' => '',                             // after each link
				 'depth' => 2,                                   // limit the depth of the nav
				 'fallback_cb' => '',                             // fallback function (if there is one)
				 'walker' => new Footer_sitemap_nav
			)); 
			
			?>	
		</div>
		<div class="grid-4">
			<div class="box newsletter-submit widget">
				<h1 class="widget-title">Nog geen Vierstroom nieuwsbrief?</h1>
				<div class="text">
					<p>
						We houden u op deze wijze graag op de hoogte van de zorg- en dienstverlening van Vierstroom.
					</p>
				</div>
				
					<a href="/leden/nieuwsbrief/" type="submit" class="btn lighter send ">&#xf0e0; Aanmelden</a>
				
				
			</div>
			<nav class="social-follow-nav widget">
				<h1 class="widget-title">Volg ons op:</h1>
				<ul>
					<li><a href="http://www.facebook.com/vierstroom" target="_blank" class="btn-round icon icon-only icon-facebook">Facebook</a></li>
					<li><a href="https://twitter.com/vierstroom" target="_blank"  class="btn-round  icon icon-only icon-twitter">Twitter</a></li>
					<li><a href="http://www.youtube.com/user/Vierstroom" target="_blank"  class="btn-round  icon icon-only icon-youtube">Youtube</a></li>
					<li><a href="https://nl.linkedin.com/company/vierstroom" target="_blank"  class="btn-round icon icon-only icon-linkedin">LinkedIn</a></li>
				</ul>
			</nav>
			
			
		</div>
	</div>
</footer>
<?php endif; ?>
<footer class="footer-page-end">
	<div class="row">
		<div class="right">
			<span class=""><?php echo date('Y'); ?>  </span>
			<em class=""><?php bloginfo('name'); ?>, <?php bloginfo('description');?></em>
		</div>
		<ul class="footer-menu left">
			<li><a href="http://www.vierstroom.nl/disclaimer/">Disclaimer</a>
			<li><a href="http://www.vierstroom.nl/cookiebeleid/">Cookiebeleid</a>
			<li><a href="http://www.vierstroom.nl/lid-van-actiz/">Lid van actiz</a>
		</ul>

	</div>
</footer>
	
	
<?php wp_footer(); ?>