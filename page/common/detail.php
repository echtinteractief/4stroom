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

			<!-- Teaser groups -->
			<?php if( have_rows('teasers') ): ?>
				<?php while( have_rows('teasers') ): the_row(); ?>

					<h2 class="page-heading"><?php the_sub_field('groep_titel'); ?></h2>
						<ul class="group-2 box">
<?php
							$posts = get_sub_field('paginas');

							if( $posts ): ?>
							<ul>
								<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
									<?php setup_postdata($post); ?>
									<?php
										$title= get_field('teaser_titel', $post->ID)  ? get_field('teaser_titel', $post->ID) : get_the_title($post->ID);
										$content= get_field('teaser_beschrijving', $post->ID) ? get_field('teaser_beschrijving', $post->ID) : get_the_excerpt($post->ID);
										$img= get_field('teaser_afbeelding', $post->ID)['url'] ? get_field('teaser_afbeelding', $post->ID)['url'] : wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'thumb-300');
										$uri =  get_page_link($post->ID); ?>

										<li class="post post-text-in-image shadow">
											<article>
												<figure class="crop">
													<img src="<?php echo $img ?>">
												</figure>
												<div class="text-block">
													<h1><?php echo $title ?>
													</h1>
													<p class="fixed-height"><em><?php echo $content ?></em></p>
												</div>
												<a href="<?php echo $uri ?>" class="box-link">Lees meer</a>
											</article>
										</li>

								<?php endforeach; ?>
							</ul>
							<?php wp_reset_postdata(); ?>
							<?php endif; ?>
						</ul>

					<?php endwhile; ?>
			<?php endif; ?>

			<!-- ThuisZorg/VeiligThuis/HulpThuis -> Extra diensten informatie -->
			<?php if( have_rows('diensten_detail_informatie') ): ?>

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
									<?php if(get_sub_field('bij_u_in_de_buurt')) { ?>
									<a href="<?php the_sub_field('bij_u_in_de_buurt') ?>" class="btn lighter">Bij u in de buurt?</a>
									<?php }
									if(get_sub_field('aanvragen')) { ?>
									<a href="<?php the_sub_field('aanvragen') ?>" class="btn">Aanvragen</a>
									<?php } ?>
								</div>
							</article>
						</li>

				<?php endwhile; ?>

					</ul>

			<?php endif; ?>

		</div>
		
		<aside class="grid-4 sidebar">
				<?php get_template_part('parts/services/subnav'); ?>
		</aside>
		

	



	</div>
<?php endwhile; endif; ?>
</article>