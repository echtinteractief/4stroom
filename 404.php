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
		
		<?php get_template_part('parts/common/_part-header-img'); ?>
		
		<article>
		
		
			<div class="row block-padding">
				<h1 class="page-heading">Oeps de pagina bestaat niet (meer)</h1>
				
				
				<div class="text">

					<p><?php _e( 'The article you were looking for was not found, but maybe try looking again!', 'bonestheme' ); ?></p>

				</div>

				<?php get_search_form(); ?>


			</div>
		</article>

	<?php get_footer(); ?>
	</body>
</html>
