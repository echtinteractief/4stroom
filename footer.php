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
				<form>
					<input type="submit" class="btn lighter send " value="&#xf0e0; Aanmelden" />
				</form>
				
			</div>
			<nav class="social-follow-nav widget">
				<h1 class="widget-title">Volg ons op:</h1>
				<ul>
					<li><a href="http://www.facebook.com/vierstroom" target="_blank" class="btn-round icon icon-only icon-facebook">Facebook</a></li>
					<li><a href="http://www.twitter.com/" target="_blank"  class="btn-round  icon icon-only icon-twitter">Twitter</a></li>
					<li><a href="http://www.youtube.com/user/Vierstroom" target="_blank"  class="btn-round  icon icon-only icon-youtube">Youtube</a></li>
					<li><a href="http://www.linkedin.com/" target="_blank"  class="btn-round icon icon-only icon-linkedin">LinkedIn</a></li>
				</ul>
			</nav>
			
			
		</div>
	</div>
</footer>
<footer class="footer-page-end">
	<div class="row">
		<span class=""><?php echo date('Y'); ?>  </span>
		<em class=""><?php bloginfo('name'); ?>, <?php bloginfo('description');?></em>
	</div>
</footer>
	
	
<?php wp_footer(); ?>