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

	<?php get_template_part('parts/common/topnav'); ?>
	

	<?php
		//Headers
		if (is_front_page()) {
			get_template_part('parts/common/_part-slider-home');
		} else {
			get_template_part('parts/common/_part-header-img');
		}	
		
	?>
	
	<?php
		
		
		//check posttypes
		switch (get_post_type()) {
			
			case 'page' :
				if (is_front_page()) {
					get_template_part('page/common/home');
				}
				/*elseif(is_page('veiligthuis') || is_page('hulpthuis') || is_page('zorgthuis')){
					get_template_part('page/services/overview');
				}*/
				elseif(is_page('leden')){
					get_template_part('page/members/overview');
				}
				elseif(is_page('vacatures')){
					get_template_part('page/jobs/overview');
				}
				elseif(is_page('thuiszorgwinkels')){
					get_template_part('page/homecareshops/overview');
				}
				else {
					
					get_template_part('page/common/detail');
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
