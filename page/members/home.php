
<div class="box post-higlight block-padding">
			
			<div class="row ">
				<div class="grid-8">
					<h1 class="page-heading"><?php the_title(); ?></h1>
					<div class="text intro">
						<?php the_content(); ?>					
					</div>
				</div>
				<div class="grid-4">
					<div class="banner action bg-brand-color">
						<ul>
						<?php
						if( have_rows('nieuw_voordeel') ):
							while ( have_rows('nieuw_voordeel') ) : the_row();
								
								$type_field = get_sub_field('voordeel_tekst');
								
								echo '<li class="icon-svg arrow">'.$type_field.'</li>'; 
							
							endwhile;
						endif;?>
							
							
						</ul>
						<a href="<?php echo get_field('button_link'); ?>" class="btn inverse"><?php echo get_field('button_title'); ?></a>
					</div>
				</div>
			</div>	
		</div>
		
		<?php get_template_part('parts/members/members-teasergroup'); ?>
		
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




	<footer class="leden-footer bg-blue-color">
		<div class="row text-center">
			<a href="#lidworden" class="btn darker">Ik wil graag lid worden</a>
		</div>
	</footer>
