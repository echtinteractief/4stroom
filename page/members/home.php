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
				<div class="grid-8">
					<h1 class="page-heading">Extra&#x27;s voor leden</h1>
					<div class="text">
						<p class="intro">
							Vierstroom biedt niet alleen alle hulp en zorg om zelfstandig te kunnen blijven.
		U kunt ook lid van worden van <strong>Vierstroom LedenService!</strong> Want samen met 65.000 leden staan we sterk! Leden krijgen interessante kortingen op de diensten van Vierstroom en profiteren van aanvullende aanbiedingen.
		Voordeel op uw zorgverzekering bijvoorbeeld of gratis krukken lenen. 
						</p>					
					</div>
				</div>
				<div class="grid-4">
					<div class="banner action bg-brand-color">
						<ul>
							<li class="icon-svg arrow">Met uw hele gezin lid voor maar &euro;22,<sup>75</sup> per jaar</li>
							<li class="icon-svg arrow">Ledenkorting op diensten van Vierstroom</li>
							<li class="icon-svg arrow">Volop voordeel op uw zorgverzekering en diensten aan huis</li>
						</ul>
						<a href="#wordlid" class="btn inverse">Word lid</a>
					</div>
				</div>
			</div>
			
		</div>
		<section class="bg-white-color block-padding">
			<div class="row">
				<h2 class="page-heading">Ons aanbod voor leden</h2>
				<ul class="group-8 ">
					
					{{#each actions }}
					<li class="post post-image-sale">
						<article>
							<h1 class="post-sale-title">{{teaser-title}}</h1>
							<figure class="crop">
								<img src="{{teaser-img}}" />
							</figure>
							<div class="text-block-sale round">
								<p>{{teaser-price}}</p>
							</div>
							<a href="{{uri}}" class="box-link">Lees meer</a>
						</article>
					</li>
					{{/each}}
					
				</ul>
				<a href="leden-overzicht.html" class="link-to-page icon icon-arrow-right right">Meer aanbiedingen</a>
				
			</div>
		</section>
		<section class="block-padding">
			<div class="row text-center post-quote">
				<h2 class="hide">Testamonial</h2>
				<article>
					<figure class="crop">
						<img src="../images/action1.jpg" />
					</figure>
					<div class="text">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam et culpa ducimus odit sequi architecto assumenda. Accusamus, in, exercitationem, natus laborum animi assumenda ad id maiores ipsa repudiandae libero consequatur!</p>
						<div class="author">Naam Achternaam</div>
					</div>
					
				</article>
			</div>
		</section>
		
		<section class="block-padding">
			<div class="row post post-highlight-image bg-orange-color">
				<article>
					<figure class="crop">
						<img src="../images/adviseur.jpg" />
					</figure>
					<div class="text">
						<h4 class="page-heading">Leden adviseur</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, sapiente, deleniti laboriosam repellendus eius quasi facilis consequuntur optio assumenda sed iure error omnis aliquam!</p>
					</div>
					<a href="link" class="box-link">Lees meer</a>
				</article>
			</div>
		</section>

	</article>
	
	<footer class="leden-footer bg-blue-color">
		<div class="row text-center">
			<a href="#lidworden" class="btn darker">Ik wil graag lid worden</a>
		</div>
	</footer>

</body>
</html>