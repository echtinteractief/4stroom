<!doctype html>
<!--[if lt IE 7 ]><html class="ie ieLT ie6" lang="nl"> <![endif]-->
<!--[if IE 7 ]><html class="ie ieLT ie7" lang="nl"> <![endif]-->
<!--[if IE 8 ]><html class="ie ieLT ie8" lang="nl"> <![endif]-->
<!--[if IE 9 ]><html class="ie ieLT ie9" lang="nl"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="nl">
	<head>
	<?php
		get_header();	
	?>
	
	<?php
		//body page class
		$page_slug="";
		if(is_page()) { $page_slug = 'page-'.$post->post_name; } 
	?>
	</head>
	<body <?php body_class($page_slug); ?>>
	
	<header class="topHeader">
		<div class="row">
			<h1 class="logo"><a class="box-link" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
			<nav class="topNav">
				<h1 class="hide">Top navigatie links</h1>
				<?php wp_nav_menu(array(
				         'container' => false,                           // remove nav container
				         'container_class' => 'menu cf',                 // class of container (should you choose to use it)
				         'menu' => __( 'Top Navigation Left', 'bonestheme' ),  // nav name
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
			<div class="search-box">
				<input type="search" placeholder="zoeken" class="search" />
				<input type="submit" class="btn btn--search" value="&#xf002;" />
			</div>
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
		</div>
	</header>
	
	
	<?php 
		//Headers
		if (is_front_page()) {
			get_template_part('parts/_part-slider-home');
		} else {
			get_template_part('parts/_part-header-img');
		}	
		
	?>
	
	<?php
		
		
		//check posttypes
		switch (get_post_type()) {
			
			case 'page' :
				if (is_front_page()) {
					get_template_part('page/_page-home');
				} else {
				
					get_template_part('page/_page-detail');
				}
				
			break;
			
			case 'post' :
				if(is_single()) {
					get_template_part('_part-post-detail');
				} else {
					get_template_part('_part-archive');	
				}
				
			break;
			
			
		}
	?>
	
	<?php get_footer(); ?>
	</body>
</html>
