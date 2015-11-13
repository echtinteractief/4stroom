<article>
<?php get_template_part('parts/services/nav'); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="row block-padding page-overview">
		<div class="grid-8 content ">
			
			<h1 class="page-heading"><?php the_title(); ?></h1>
			<div class="text">
				<?php
				// the content (pretty self explanatory huh)
					
				if ( has_shortcode( $post->post_content, 'gallery' ) ) { 
					$post_content = $post->post_content;
					preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
					$array_id = explode(",", $ids[1]);
					$string=implode(",",$array_id);
					
					if ($array_id) {
						echo do_shortcode('[gallery link="file" ids="'.$string.'"]');
					}
				
				}

				
					the_content();
				?>
			</div>
			
			
			<?php
				//if winkel informatie  
				if(get_field('extra_winkel_informatie')) :
					get_template_part('parts/homecareshops/store-information'); 	
				endif; 
			?>
			
			<?php
				//flexible teaser blokken
				if( have_rows('pagina_flexible_teasers') ):
					get_template_part('parts/common/flexible-teasers');			
				endif; 
			?>
			
			<!-- Teaser groups -->
			<?php if( have_rows('teasers') ): ?>
				<?php while( have_rows('teasers') ): the_row(); ?>

					<h2 class="page-heading"><?php the_sub_field('groep_titel'); ?></h2>
						<ul class="group-2 box">
<?php
							$posts = get_sub_field('paginas');

							if( $posts ): ?>
							
								<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
									<?php setup_postdata($post); ?>
									<?php
										$title= get_field('teaser_titel', $post->ID)  ? get_field('teaser_titel', $post->ID) : get_the_title($post->ID);
										$content= get_field('teaser_beschrijving', $post->ID) ? get_field('teaser_beschrijving', $post->ID) : get_the_content();
										$img= get_field('teaser_afbeelding', $post->ID)['url'] ? get_field('teaser_afbeelding')['id'] : wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'thumb-300');
										$img_array = wp_get_attachment_image_src($img, 'thumb-600'); //get image thumb
										$uri =  get_page_link($post->ID); 
										
									?>
										<li class="post post-text-in-image shadow">
											<article>
												<figure class="crop">
													<img src="<?php  echo $img_array[0]; ?>"> 
													
												</figure>
												<div class="text-block">
													<h1><?php echo $title ?>
													</h1>
													<p class="fixed-height">
														<em>
															<?php 
																
																$content = strip_tags($content);//remove html tags
												
																if(strlen($content)>200) 
																	$content = substr($content, 0, 150).'...';
																
																echo $content;
															?>
															</em>
														</p>
												</div>
												<a href="<?php echo $uri ?>" class="box-link">Lees meer</a>
											</article>
										</li>

								<?php endforeach; ?>
							
							<?php wp_reset_postdata(); ?>
							<?php endif; ?>
						</ul>

					<?php endwhile; ?>
			<?php endif; ?>

			<!-- ThuisZorg/VeiligThuis/HulpThuis -> Extra diensten informatie -->
			<?php if( have_rows('diensten_detail_informatie') ): ?>

			<section>

				<?php if(get_field('titel_detail_informatie')) { ?>

					<h2 class="page-heading"><?php the_field('titel_detail_informatie') ?></h2>

				<?php } ?>

				<ul class="data-services">

				<?php while( have_rows('diensten_detail_informatie') ): the_row(); ?>

						<li class="data-service">
							<article>
								<h1 class="service-title"><?php the_sub_field('titel') ?></h1>
								<p class="info"><em><?php the_sub_field('subtitel') ?></em></p>

								<?php $posts = get_sub_field('details');
								if( $posts ): ?>

									<ul class="list-check">

									<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
										<?php setup_postdata($post); ?>
										<li class="icon icon-check"><?php echo $post['tekst'] ?></li>

									<?php endforeach; ?>
								</ul>
								<?php wp_reset_postdata(); ?>
								<?php endif; ?>

								<div>
									<?php if(get_sub_field('aanvragen')) { ?>
									<a href="<?php the_sub_field('aanvragen') ?>" class="btn">Aanvragen</a>
									<?php } ?>
								</div>
							</article>
						</li>

				<?php endwhile; ?>

					</ul>

					<?php if(get_field('bijschrift_detail_informatie')) { ?>

					<div class="panel note">
						<p><?php the_field('bijschrift_detail_informatie') ?></p>
					</div>

					<?php } ?>

				</section>
			<?php endif; ?>

		</div>
		
		<aside class="grid-4 sidebar">
				<?php get_template_part('parts/services/subnav'); ?>
		</aside>

	</div>
<?php endwhile; endif; ?>
</article>