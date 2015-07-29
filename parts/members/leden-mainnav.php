<aside class="bar contact-bar">
	<div class="row">
		<h1 class="bar-title arrow-vierstroom right"><span>Direct contact? Bel </span><a href="tel:09009300">0900-9300</a></h1>
		<nav class="nav main-nav left member-nav">
			<h1 class="hide">Leden navigatie"</h1>
			<?php wp_nav_menu(array(
						'container' => false,                           // remove nav container
						'container_class' => 'menu cf',                 // class of container (should you choose to use it)
						'menu' => __( 'Leden navigatie', 'bonestheme' ),  // nav name
						'menu_class' => '',               // adding custom nav class
						'theme_location' => 'leden-nav',                 // where it's located in the theme
						'before' => '',                                 // before the menu
						'after' => '',                                  // after the menu
						'link_before' => '',                            // before each link
						'link_after' => '',                             // after each link
						'depth' => 0,                                   // limit the depth of the nav
						'fallback_cb' => ''                             // fallback function (if there is one)
				)); ?>
				
		</nav>
	</div>
</aside>