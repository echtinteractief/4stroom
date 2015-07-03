<article>
	<?php get_template_part('parts/services/nav'); ?>
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="row block-padding page-overview">
		
		<div class="grid-8 content">
			<h1 class="page-heading"><?php the_title(); ?></h1>
			<div class="text">
				<?php the_content(); ?>
			</div>
			
			<section class="block list-block">
				<h2 class="page-heading"><?php echo get_field('teaser_titel'); ?></h2>
				<ul class=" ">
					<?php 
					$args = array( 'post_parent' => get_the_ID(), 'post_type'   => 'page', 'orderby' => 'menu_order','order'=>'ASC');
					$children = get_children( $args );
					
					foreach( $children as $child) :
					
	
						$title= get_field('teaser_titel', $child->ID)  ? get_field('teaser_titel', $child->ID) : get_the_title($child->ID);
						$text= get_field('teaser_beschrijving', $child->ID) ? get_field('teaser_beschrijving', $child->ID) : false;
						$img= get_field('teaser_afbeelding', $child->ID) ? get_field('teaser_afbeelding', $child->ID)['id'] : false;
						$img_array = wp_get_attachment_image_src($img, 'thumb-600'); //get image thumb
						$uri =  get_page_link($child->ID); 
						
						$storeInfo = get_field('extra_winkel_informatie', $child->ID); 	
						$location = get_field('locatie', $child->ID);
					?>
					<li class="post post-list post-stores">
						<article>
						
							<h1 class="post-title"><a href="<?php echo $uri; ?>"><?php echo $title; ?></a></h1>
							
							<div class="map">
								
								<?php 
									if( !empty($location) ):
								?>
									<div class="google-map">
										<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
									</div>
								<?php endif; ?>
							</div>
							
							<div class="post-text">
								<p class="fixed-height">
									<?php
										$text = strip_tags($text);//remove html tags
						
										if(strlen($text)>100) 
											$text = substr($text, 0, 150).'...';	
										
										echo $text;
									?>
								</p>
								<?php echo $storeInfo; ?>
							</div>
							
						</article>
					</li>
					<?php endforeach; ?>
				</ul>
			</section>
		</div>
		
		<aside class="grid-4 sidebar">
				<?php get_template_part('parts/services/subnav'); ?>
		</aside>

	</div>
	<?php endwhile; endif; ?>
</article>

