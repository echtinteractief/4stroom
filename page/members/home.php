
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
		
		<?php 
			//get_template_part('parts/members/members-teasergroup'); 
		?>
		
		
				
		<?php get_template_part('parts/members/members-flexcontent'); ?>
		

	<footer class="leden-footer bg-blue-color">
		<div class="row text-center">
			<a href="/leden/word-lid/" class="btn darker">Ik wil graag lid worden</a>
		</div>
	</footer>
