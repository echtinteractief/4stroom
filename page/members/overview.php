<?php 	// get terms of taxonomy product_categories
$terms = get_terms( "ledenaanbieding_category",array('get' => 'all'));
?>
	
	<article>
	
		<div class="box post-higlight block-padding">
			
			<div class="row ">
				<h1 class="page-heading"><?php the_title();?></h1>
				<ul class="group-4-big box">
					
					<?php foreach ( $terms as $term ) { ?>

					<li class="post post-category-list shadow" data-value="<?php echo $term->slug ?>">
						<article>
							<h1 class="post-title  ">
								<span class=" icon-svg icon-svg icon-svg-<?php echo $term->slug ?>">
									
									<?php
										//set icon svg in de dom
										$path_temp =get_template_directory();
										 echo file_get_contents($path_temp."/library/style/gfx/svg/".$term->slug.".svg"); 	
									?>
									
								</span>
								<?php echo $term->name ?>
							</h1>
							
							<?php /*
							<figure class="crop">
								<img src="http://berrywijnia.nl/projects/4stroom/images/zorgthuis.jpg" />
							</figure>
							*/
							?>
							
							<?php
							$args     = array(
							'ledenaanbieding_category' => $term->slug,
							'post_type'          => 'ledenaanbieding'
							);
							$wp_query = null;
							$wp_query = new WP_Query( $args );
							?>

							<ul class="category-items">
								<?php while ( $wp_query->have_posts() ) : $wp_query->the_post();?>
									<li class="item"><a href="<?php echo the_permalink() ?>"><?php the_title();?></a></li>
								<?php endwhile; ?>
							</ul>

							<?php wp_reset_query(); ?>
						</article>
					</li>

					<?php } ?>
				
				</ul>
			</div>
			
		</div>
		
	</article>

<?php get_template_part('parts/members/leden-footer'); ?>