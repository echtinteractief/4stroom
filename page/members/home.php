
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
		
		
		<?php 
			if( have_rows('flex-leden-content') ):

			     // loop through the rows of data
			    while ( have_rows('flex-leden-content') ) : the_row();
			
			        if( get_row_layout() == 'leden testimonial' ):
					
			        	$text= get_sub_field('testimonial');
			        	$naam = get_sub_field('naam');
			        	$img = get_sub_field('afbeelding');
			        	$img_array = wp_get_attachment_image_src($img, 'thumb-300');
			        ?>
			        	
		        	<section class="block-padding">
						<div class="row text-center post-quote">
							<h2 class="hide">Testamonial</h2>
							<article>
								<figure class="crop">
									<img src="<?php echo $img['url']; ?>" />
								</figure>
								<div class="text">
									<?php echo $text; ?>
									<div class="author"><?php echo $naam;?></div>
								</div>
								
							</article>
						</div>
					</section>
			        	
			        <?php
			
			        elseif( get_row_layout() == 'leden_adviseur' ): 
						$posts = get_sub_field('kies_adviseur');
						foreach( $posts as $post):
							setup_postdata($post);
							$title= get_field('teaser_titel', $post->ID)  ? get_field('teaser_titel', $post->ID) : get_the_title($post->ID);
							$content= get_field('teaser_beschrijving', $post->ID) ? get_field('teaser_beschrijving', $post->ID) : get_the_content();
							$img= get_field('teaser_afbeelding', $post->ID)['url'] ? get_field('teaser_afbeelding')['id'] : wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'thumb-300');
							$img_array = wp_get_attachment_image_src($img, 'thumb-300'); //get image thumb
							$uri =  get_page_link($post->ID); 
			        ?>
			        
			        <section class="block-padding">
						<div class="row post post-highlight-image bg-orange-color">
							<article>
								<figure class="crop">
									<img src="<?php echo $img_array[0];?>" />
								</figure>
								<div class="text">
									<h4 class="page-heading"><?php echo $title; ?></h4>
									<p><?php echo $content; ?></p>
								</div>
								<a href="<?php echo $uri ?>" class="box-link">Lees meer</a>
							</article>
						</div>
					</section>
			        	
					<?php
						endforeach;
			        endif;
			
			    endwhile;
			
			else :
			
			    // no layouts found
			
			endif;
			
		?>
		
		
		
		
		





	<footer class="leden-footer bg-blue-color">
		<div class="row text-center">
			<a href="#lidworden" class="btn darker">Ik wil graag lid worden</a>
		</div>
	</footer>
