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
							<h1 class="post-title icon-svg icon-svg-<?php echo $term->slug ?> "><?php echo $term->name ?></h1>
							<figure class="crop">
								<img src="" />
							</figure>

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