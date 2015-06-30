<article>
	<div class="grid-8 content ">
		<h1 class="page-heading"><?php the_title(); ?></h1>
		<div class="text">
			
			<?php the_content(); ?>
			
			<section class="block list-block">
				<h2 class="hide page-heading">Vacature overzicht:</h2>
					
				<div class="results-options">
					<div class="search-box left">
						<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<label class="hide screen-reader-text" for="s">Zoek op</label>
							<input type="search" placeholder="Zoek vacature, bv op plaats" class="search"  name="s" id="s" />
							<input type="submit" id="searchsubmit" class="btn btn--search" value="&#xf002;" />
						</form>
					</div>

					<?php
						$args = array(
								'post_type' => 'vacature');

							$vacatures = new WP_Query( $args );
						if( $vacatures->have_posts() ) { ?>

							<?php
							$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
							$wp_query = new WP_Query( array( 'post_type' => 'vacature', 'posts_per_page' => 1, 'paged' => $paged ) );

							// get terms of taxonomy product_categories
							$terms = get_terms( "vacature_category" );
							$count = count( $terms );

							// check if category is selected
							$currentCategory = $_GET['category'];
							if ( ! empty( $currentCategory ) ) {
								$args     = array(
										'vacature_category' => $currentCategory,
										'post_type'          => 'vacature'
								);
								$wp_query = null;
								$wp_query = new WP_Query( $args );
							}

							// build filter for product categories
							if ( $count > 0 ) { ?>

							<div class="sort-options left">
								<div class="style-select">
									<select id="boe2">
										<nav class="box category">
											<h1>Categorie</h1>
											<ul>
												<?php if ( !empty( $currentCategory ) ) { ?>
													<?php echo "test: " .$count; ?>
													<option value="<?php echo $term ?>" selected="<?php $currentCategory == $term->name ? true : false ?>" href=\"/vacatures?category=<?php echo $term ?>" />

											<?php } ?>
												<?php foreach ( $terms as $term ) { ?>
													<option value="<?php echo $term->slug ?>" selected="<?php $currentCategory == $term->slug ? true : false ?>" href=\"/vacatures?category=<?php echo $term->slug ?>"><?php echo $term->name ?></option>

												<?php	} ?>
											</ul>
									</select>
								</div>
							</div>

						<?php	} ?>


						<div class="sort-options right">
							<div class="style-select">
								<select id="boe">
									<option class="placeholder" disabled selected>Sorteer op</option>
									<option value="bla">Datum</option>
									<option value="Sipsum">A-Z</option>
									<option value="Vlorem">Z-A</option>
								</select>
							</div>
						</div>
					
					</div>
					<ul class="results">
						<?php while ( $wp_query->have_posts() ) : $wp_query->the_post();?>

							<li class="post post-list">
								<article>
									<div class="text-block">
										<h1 class="post-title"><?php the_title()?></h1>
										<ul class="post-meta">
											<li class="icon icon-location"><?php the_field('plaats'); ?></li>

											<li class="icon icon-date"><?php the_date() ?></li>

										</ul>
										<p class="post-text fixed-height">
											<em>
											<?php 
												$content = get_the_excerpt();
												$content = strip_tags($content);//remove html tags
								
												if(strlen($content)>200) 
													$content = substr($content, 0, 200).'...';
												
												echo $content;
											
											?></em>
										</p>
										<a href="<?php echo get_page_link( $post->ID ) ?>" class="post-link icon icon-arrow-right">Lees meer</a>
									</div>
									<a href="<?php echo get_page_link( $post->ID ) ?>" class="box-link">Lees meer</a>

								</article>
							</li>

						<?php 
							endwhile;
							
						?>
						
					</ul>

					<?php }
						else {
							echo 'Geen vacatures op dit moment.';
						}
						?>

					<?php
										//if ( $wp_query->max_num_pages > 1 ) :
					//bones_page_navi();
					bones_page_navi( '', '', $wp_query );
					//endif;
					wp_reset_query();
					?>
				</section>
				
			</div>
		</div>
		<aside class="grid-4 sidebar">
			<?php get_template_part('parts/services/subnav'); ?>
	</aside>
	</div>
	
</article>