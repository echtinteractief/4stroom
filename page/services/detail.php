<?php/**
 * Template Name: Detail ZorgThuis/VeiligThuis/HulpThuis
 *
 * @package WordPress
 * @subpackage Vierstroom
 */

?>

<article>
	<?php get_template_part('parts/services/nav'); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="row block-padding page-overview">
			<div class="grid-8 content ">

				<h1 class="page-heading">Verpleging en verzorging</h1>
				<div class="text">
					<p class="intro">
						Een professionele verpleegkundige of verzorgende helpt u thuis. Bijvoorbeeld met douchen, aankleden, opstaan en naar bed gaan, verzorgen van uw wond, verwisselen van de katheter of andere verpleegkundige werkzaamheden.
					</p>
					<p> De thuiszorgmedewerkers van Vierstroom Zorg Thuis verplegen en verzorgen u in uw eigen huis. Zodat u thuis kunt herstellen. Onze (wijk)verpleegkundigen en verzorgenden werken in nauwe samenwerking met uw arts of andere verwijzers.</p>

					<strong>U kunt een beroep doen op thuiszorg als u bijvoorbeeld:</strong><br>
					<ul>
						<li>door ziekte of een handicap niet helemaal voor uzelf kunt zorgen</li>
						<li>een wond heeft die behandeld moet worden</li>
						<li>hulp nodig heeft bij het aan- en uitkleden en het wassen</li>
						<li>ongeneeslijke ziek bent en graag in uw eigen thuisomgeving verzorgd wilt worden</li>
					</ul>


					<p>Heeft u buiten uw indicatie om behoefte aan meer zorg? Of heeft u andere ondersteuningswensen? Dan is particuliere zorg mogelijk. Vraag om extra verzorging en verpleging.</p>
				</div>
				<section>
					<h2 class="page-heading">Welke professionele zorg heeft u nodig?</h2>

					<ul class="data-services">
						<li class="data-service">
							<article>
								<h1 class="service-title">Professionele verpleging</h1>
								<p class="info"><em>Hulp van een verpleegkundige bij u thuis</em></p>
								<ul class="list-check">
									<li class="icon icon-check">na ziekenhuis opname</li>
									<li class="icon icon-check">vanwege (ongeneeslijke) ziekte of handicap</li>
									<li class="icon icon-check">professionele verpleegkundige hulp</li>
								</ul>
								<div>
									<a href="#" class="btn lighter">Bij u in de buurt?</a>
									<a href="formulier.html" class="btn">Aanvragen</a>
								</div>
							</article>
						</li>
						<li class="data-service">
							<article>
								<h1 class="service-title">Hulp bij persoonlijke verzorging</h1>
								<p class="info"><em>Hulp van een verpleegkundige bij u thuis</em></p>
								<ul class="list-check">
									<li class="icon icon-check">na ziekenhuis opname</li>
									<li class="icon icon-check">vanwege (ongeneeslijke) ziekte of handicap</li>
									<li class="icon icon-check">professionele verpleegkundige hulp</li>
								</ul>
								<div>
									<a href="#" class="btn lighter">Bij u in de buurt?</a>
									<a href="formulier.html" class="btn">Aanvragen</a>
								</div>
							</article>
						</li>
						<li class="data-service">
							<article>
								<h1 class="service-title">Specialistische verpleging thuis</h1>
								<p class="info"><em>Hulp bij gebruik apparaten hulpmiddelen medicijnen</em></p>
								<ul class="list-check">
									<li class="icon icon-check">na ziekenhuis opname</li>
									<li class="icon icon-check">vanwege (ongeneeslijke) ziekte of handicap</li>
									<li class="icon icon-check">professionele verpleegkundige hulp</li>
								</ul>
								<div>
									<a href="#" class="btn lighter">Bij u in de buurt?</a>
									<a href="formulier.html" class="btn">Aanvragen</a>
								</div>
							</article>
						</li>
					</ul>
					<div class="panel note">
						<p>* <em>U betaalt een <a href="#">eigen bijdrage</a> als u thuis zorg krijgt. Bijvoorbeeld verpleging, verzorging of begeleiding. Als u een persoonsgebonden budget krijgt voor AWBZ zorg, dan betaalt u ook een eigen bijdrage van het bruto PGB budget.</em></p>
					</div>
				</section>
			</div>
			<aside class="grid-4 sidebar">
				<?php get_template_part('parts/services/subnav'); ?>
			</aside>
		</div>
	<?php endwhile; endif; ?>
</article>