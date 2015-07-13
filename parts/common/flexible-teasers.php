<?php

	 while ( have_rows('pagina_flexible_teasers') ) : the_row();	
	 
	 	switch (get_row_layout()) {
			
			//note teaser block
			case 'note_block' :
				$title = get_sub_field('titel');
				$text= get_sub_field('tekst');
		    ?>
		        <div class="panel info">
					<p><strong><?php echo $title; ?></strong></p>
					<?php echo $text; ?>
				</div>
		    <?php	
			break; 	
		 	
		 	
		 	// teaser big image
		 	case 'teaser_big_img' :
		 		
		 		$title= get_sub_field('titel');
			    $img = get_sub_field('kies_afbeelding');
  				$img_array = wp_get_attachment_image_src($img, 'thumb-600');
			    $link = get_sub_field('afbeelding_linken');
			    $uri = $link ? get_sub_field('link_to') : false;

		 		
		 	?>
			 	<section class="block-padding post post-image-big">
					<h2 class="page-heading"><?php echo $title; ?></h2>
					
					<figure class="crop ">
						<img src="<?php echo $img['url']; ?>" />
					</figure>
					<?php if($link) : ?>
						<a href="<?php echo $uri; ?>" class="box-link">Meer informatie</a>
					<?php endif; ?>
			 	</section>
		 	
		 	<?php
		 	break;
		 	
		 	// teaser orange/pink/white
		 	case 'teaser_bg' :
		 		
		 		$title= get_sub_field('teaser_title');
		 		$subTitle = get_sub_field('teaser_subtitle');
		 		$text = get_sub_field('teaser_text');
		 		$color = get_sub_field('teaser_bgcolor');
			    $img = get_sub_field('teaser_img');
			    $link = get_sub_field('teaser_link_true');
			    $uri = $link ? get_sub_field('teaser_link') : false;
		 	
		 	?>
		 	
		 	<article class="row post post-highlight-image bg-<?php echo $color;?>-color">				
				<figure class="crop">
					<img src="<?php 
						$size = 'thumb-square-500';
						$thumb = $img['sizes'][ $size ];
						echo $thumb; 
						
					?>"/>
				</figure>
				<div class="text">
					<h4 class="page-heading"><?php echo $title; ?><br />
					<?php if($subTitle) : ?>
						<sub class="meta"><?php echo $subTitle; ?></sub></h4>
					<?php endif; ?>				
					<p><?php echo $text; ?> </p>
				</div>
				
				<?php if($uri) : ?>
					<a href="<?php echo $uri; ?>" class="box-link">Meer informatie</a>
				<?php endif; ?>
			</article>
		 	
		 	<?php
		 	break;
		 	
		 	
		 	//teaser testimonial
		 	case 'testimonial' :
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
								<img src="<?php 
									$size = 'thumb-square';
									$thumb = $img['sizes'][ $size ];	
									
									echo $thumb; 
								?>" />
							</figure>
							<div class="text">
								<?php echo $text; ?>
								<div class="author"><?php echo $naam;?></div>
							</div>
							
						</article>
					</div>
				</section>
			<?php	

		 	
		 	break;
		 	
		}
	 
	 endwhile;
?>