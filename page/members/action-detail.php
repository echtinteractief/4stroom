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

	
	<article>
		
		
		<?php get_template_part('parts/members/leden-header-img'); ?>
		
		<?php get_template_part('parts/members/leden-mainnav'); ?>
		
		<div class="box post-higlight block-padding">
			
			<div class="row ">
				<div class="grid-8">
					<h1 class="page-heading">Met 10% korting naar Parijs</h1>
					<div class="text">
						<p>
	Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus interdum pellentesque magna, at ornare diam hendrerit eu. Mauris hendrerit nisi vitae est lobortis, nec pretium neque malesuada. Nullam blandit neque sapien, sit amet finibus urna interdum eu. Donec ut pulvinar mi, id porttitor urna. Nam nec sapien neque. Nullam pellentesque ligula nunc, quis malesuada ipsum maximus at. Sed pulvinar libero ac lectus lobortis, et lacinia est posuere. Mauris nec sapien eros. 
						</p>					
						<p>
							Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus interdum pellentesque magna, at ornare diam hendrerit eu. Mauris hendrerit nisi vitae est lobortis, nec pretium neque malesuada. Nullam blandit neque sapien, sit amet finibus urna interdum eu. Donec ut pulvinar mi, id porttitor urna. Nam nec sapien neque. Nullam pellentesque ligula nunc, quis malesuada ipsum maximus at. Sed pulvinar libero ac lectus lobortis, et lacinia est posuere. Mauris nec sapien eros.
						</p>
					</div>
				</div>
				<div class="grid-4">
					<div class="banner action bg-brand-color">
						<ul>
							<li class="">3 nachten in Hotel L’umierre</li>
							<li class="">Inclusief ontbijt</li>
							<li class="">Volop voordeel op uw zorgverzekering en diensten aan huis</li>
						</ul>
						<p class="price">
							<del>van € 399,-</del> voor € 349,
						</p>
						<a href="#wordlid" class="btn inverse">Nu bestellen</a>
					</div>
				</div>
			</div>
			
		</div>
		<section class="bg-white-color block-padding">
			<div class="row">
				<h2 class="page-heading">Andere reizen met korting via Vierstroom</h2>
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
				<a href="#more" class="link-to-page icon icon-arrow-right right">Bekijk al onze leden voordelen</a>
			</div>
		</section>
		
	</article>

<?php get_template_part('parts/members/leden-footer'); ?>

</body>
</html>