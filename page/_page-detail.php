<article>
<?php get_template_part('parts/_part-services-nav'); ?>

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
		</div>
		
		<aside class="grid-4 sidebar">
				<?php get_template_part('parts/_part-services-subnav'); ?>
		</aside>
		

	



	</div>
<?php endwhile; endif; ?>
</article>