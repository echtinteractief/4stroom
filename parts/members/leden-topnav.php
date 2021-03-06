<header class="topHeader bg-orange-color">
	<div class="row">
		<h1 class="logo"><a class="box-link" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
		<nav class="topNav">
			<h1 class="hide">Top navigatie links</h1>
			<?php wp_nav_menu(array(
			         'container' => false,                           // remove nav container
			         'container_class' => 'menu cf',                 // class of container (should you choose to use it)
			         'menu' => __( 'Top Navigatie Links', 'bonestheme' ),  // nav name
			         'menu_class' => '',               // adding custom nav class
			         'theme_location' => 'top-nav-left',                 // where it's located in the theme
			         'before' => '',                                 // before the menu
					 'after' => '',                                  // after the menu
					 'link_before' => '',                            // before each link
		             'link_after' => '',                             // after each link
					 'depth' => 0,                                   // limit the depth of the nav
					 'fallback_cb' => ''                             // fallback function (if there is one)
			)); ?>	
		</nav>
		
		<?php  get_search_form();?>
		
		<nav class="topNav right">
			<h1 class="hide">Top navigatie rechts</h1>
			<?php wp_nav_menu(array(
			         'container' => false,                           // remove nav container
			         'container_class' => 'menu cf',                 // class of container (should you choose to use it)
			         'menu' => __( 'Top Navigation Right', 'bonestheme' ),  // nav name
			         'menu_class' => '',               // adding custom nav class
			         'theme_location' => 'top-nav-right',                 // where it's located in the theme
			         'before' => '',                                 // before the menu
					 'after' => '',                                  // after the menu
					 'link_before' => '',                            // before each link
		             'link_after' => '',                             // after each link
					 'depth' => 0,                                   // limit the depth of the nav
					 'fallback_cb' => ''                             // fallback function (if there is one)
			)); ?>	
		</nav>
		
		<nav class="mobileNav">
			<h1 class="">Menu</h1>
					
			<?php wp_nav_menu(array(
			         'container' => false,                           // remove nav container
			         'container_class' => 'menu',                 // class of container (should you choose to use it)
			         'menu' => __( 'Mobile Navigation', 'bonestheme' ),  // nav name
			         'menu_class' => '',               // adding custom nav class
			         'theme_location' => 'mobile-nav',                 // where it's located in the theme
			         'before' => '',                                 // before the menu
					 'after' => '',                                  // after the menu
					 'link_before' => '',                            // before each link
		             'link_after' => '',                             // after each link
					 'depth' => 0,                                   // limit the depth of the nav
					 'fallback_cb' => ''                             // fallback function (if there is one)
			)); ?>	
		</nav>
	</div>
</header>