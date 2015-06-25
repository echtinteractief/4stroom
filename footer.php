<footer class="footer-page">
		<div class="row">
			<div class="grid-8">
			<ul class="sitemap group-3">

				<?php
				$args = array(
						'posts_per_page' => 3,
						'order_by' => 'title',
						'order' => 'ASC',
						'tag' => 'thuissite',
						'post_type' => 'page'
				);
				$the_query = new WP_Query($args); ?>

				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

				<li class="sitemap-item">
					<a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a>

					<?php
					$my_wp_query = new WP_Query();
					$all_wp_pages = $my_wp_query->query(array('post_type' => 'page'));

					$args = array(
							'child_of' => $post->ID,
							'parent' => $post->ID,
							'sort_column' => 'menu_order',
							'sort_order' => 'asc'
					);
					$subpages = get_pages( $args );

					if(count($subpages) > 0){ ?>
						<ul class="sitemap-subgroup">
						<?php foreach($subpages as $subpage){ ?>
							<li class="sitemap-subitem"><a href="<?php echo $subpage->post_title; ?>"><?php echo $subpage->post_title; ?></a></li>
						<?php } ?>
						</ul>
					<?php }
					?>
				</li>


					<?php endwhile;
						wp_reset_postdata(); ?>

				<li class="sitemap-item">
					<a href="#">Leden</a>
					
					<ul class="sitemap-subgroup">
						<li class="sitemap-subitem"><a href="#">link to</a></li>
					</ul>
				</li>
				<li class="sitemap-item">
					<a href="#">Vierstroom</a>
					
					<ul class="sitemap-subgroup">
						<li class="sitemap-subitem"><a href="#">link to</a></li>
					</ul>
				</li>
			</ul>
			</div>
			<div class="grid-4">
				<div class="box newsletter-submit widget">
					<h1 class="widget-title">Nog geen Vierstroom nieuwsbrief?</h1>
					<div class="text">
						<p>
							We houden u op deze wijze graag op de hoogte van de zorg- en dienstverlening van Vierstroom.
						</p>
					</div>
					<form>
						<input type="submit" class="btn lighter send " value="&#xf0e0; Aanmelden" />
					</form>
					
				</div>
				<nav class="social-follow-nav widget">
					<h1 class="widget-title">Volg ons op:</h1>
					<ul>
						<li><a href="#facebook" class="btn-round icon icon-only icon-facebook">Facebook</a></li>
						<li><a href="#twitter" class="btn-round  icon icon-only icon-twitter">Twitter</a></li>
						<li><a href="#youtube" class="btn-round  icon icon-only icon-youtube">Youtube</a></li>
						<li><a href="#linkedin" class="btn-round icon icon-only icon-linkedin">LinkedIn</a></li>
					</ul>
				</nav>
				
				
			</div>
		</div>
	</footer>
	<footer class="footer-page-end">
		<div class="row">
			<span class=""><?php echo date('Y'); ?>  </span>
			<em class=""><?php bloginfo('name'); ?>, <?php bloginfo('description');?></em>
		</div>
	</footer>
	
	
<?php wp_footer(); ?>