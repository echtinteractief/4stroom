
		
		<div class="box post-higlight block-padding">
			
			<div class="row ">
				<div class="grid-8">
					<h1 class="page-heading"><?php the_title(); ?></h1>
					<div class="text">
						<?php the_content(); ?>
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
		

