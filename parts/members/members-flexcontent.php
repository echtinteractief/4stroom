<?php 
			if( have_rows('flex-leden-content') ):

			     // loop through the rows of data
			    while ( have_rows('flex-leden-content') ) : the_row();
					
					switch (get_row_layout()) {
						case 'leden testimonial' :
						
						$text= get_sub_field('testimonial');
			        	$naam = get_sub_field('naam');
			        	$img = get_sub_field('afbeelding');
			        	$img_array = wp_get_attachment_image_src($img, 'thumb-300');
					?>
						<section class="block-padding row">
							<div class="text-center post-quote">
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
						//end leden testimonial
						break;
						case 'leden_adviseur' :
						
						$posts = get_sub_field('kies_adviseur');
						foreach( $posts as $post):
							setup_postdata($post);
							$title= get_field('teaser_titel', $post->ID)  ? get_field('teaser_titel', $post->ID) : get_the_title($post->ID);
							$content= get_field('teaser_beschrijving', $post->ID) ? get_field('teaser_beschrijving', $post->ID) : get_the_content();
							$img= get_field('teaser_afbeelding', $post->ID)['url'] ? get_field('teaser_afbeelding') : wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'thumb-300');
							//$img_array = wp_get_attachment_image_src($img, 'thumb-300'); //get image thumb
							$uri =  get_page_link($post->ID); 
					?>	
						
						   <section class="block-padding row">
								<div class="post post-highlight-image bg-orange-color">
									<article>
										<figure class="crop">
													<?php
														if($img ):	
														// thumbnail
															$size = 'thumb-square';
															$thumb = $img['sizes'][ $size ];
														?>
														
													<img src="<?php echo $thumb; ?>">
													
													<?php endif; ?>
													
												</figure>
										<div class="text">
											<h4 class="page-heading"><?php echo $title; ?></h4>
											<p><?php echo $content; ?></p>
										</div>
										<a href="<?php echo $uri ?>" class="box-link">Lees meer</a>
									</article>
								</div>
							</section>
					        	
						<?php endforeach; wp_reset_postdata();?>
					<?php
						//end leden_adviseur	
						break;
						case 'leden_aanbiedingen_blok' :
					?>
					
					<section class="bg-white-color block-padding">
							<div class="row">
								<h2 class="page-heading"><?php echo get_sub_field('members_teasergroup_title'); ?></h2>
								<ul class="group-8 ">
							
						
								<?php $posts = get_sub_field('aanbieding');
						
									if( $posts ): ?>
						
									<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
										<?php setup_postdata($post); ?>
										<?php
										$title= get_the_title($post->ID);
										$content= get_the_content();
										$img = get_field('afbeelding');
										//$img= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'thumb-300');
										//$img_array = wp_get_attachment_image_src($img, 'thumb-600'); //get image thumb
										$uri =  get_permalink();
										?>
						
										<li class="post post-image-sale">
											<article>
												<h1 class="post-sale-title"><?php echo $title	 ?></h1>
												<figure class="crop">
													<?php
														if($img ):	
														// thumbnail
															$size = 'thumb-square';
															$thumb = $img['sizes'][ $size ];
														?>
														
													<img src="<?php echo $thumb; ?>">
													
													<?php endif; ?>
													
												</figure>
												
												<?php if(get_field('korting') ): ?>
												<div class="text-block-sale round">
													<p><?php echo get_field('korting'); ?></p>
												</div>
												<?php endif; ?>
												<a href="<?php echo $uri ?>" class="box-link">Lees meer</a>
											</article>
										</li>
						
									<?php endforeach; ?>
						
									<?php wp_reset_postdata(); ?>
									<?php endif; ?>
						
								</ul>
						
								<a href="/leden/aanbod" class="link-to-page icon icon-arrow-right right">Meer aanbiedingen</a>
							</div>
						</section>
						
					<?php
						
						//end leden aanbeidieng blok	
						break;
					//end switch	
					}
					
			     
			
			    endwhile;
			
			else :
			
			    // no layouts found
			
			endif;
			
		?>
