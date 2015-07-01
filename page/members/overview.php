<!doctype html>
<!--[if lt IE 7 ]>
<html class="ie ieLT ie6" lang="nl"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ieLT ie7" lang="nl"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ieLT ie8" lang="nl"> <![endif]-->
<!--[if IE 9 ]>
<html class="ie ieLT ie9" lang="nl"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="nl">
<head>
	<?php
	get_header();

	//body page class
	$page_slug = "";
	if ( is_page() ) {
		$page_slug = 'page-' . $post->post_name;
	}
	?>
</head>

<body  class="ledenPage <?php echo $page_slug; ?>" >


	<?php get_template_part('parts/members/leden-topnav'); ?>
	
	<?php get_template_part('parts/members/leden-actionstamp'); ?>

	
	<article>
		
		<?php get_template_part('parts/members/leden-header-img'); ?>
		
		<?php get_template_part('parts/members/leden-mainnav'); ?>
	
		<div class="box post-higlight block-padding">
			
			<div class="row ">
				<h1 class="page-heading">Volledig aanbod leden</h1>
				<ul class="group-4-big box">
					
					{{#each actions-category}}
					<li class="post post-category-list shadow">
						<article>
							<h1 class="post-title icon-svg icon-svg-{{class}} ">{{title}}</h1>
							<figure class="crop">
								<img src="{{teaser-img}}" />
							</figure>
							
							
							<ul class="category-items">
								{{#each this.items}}
									<li class="item"><a href="#">{{title}}</a></li>
								{{/each}}
							</ul>
						</article>
					</li>
					{{/each}}
				
				</ul>
			</div>
			
		</div>
		
	</article>

	<?php get_template_part('parts/members/leden-footer'); ?>
	

</body>
</html>