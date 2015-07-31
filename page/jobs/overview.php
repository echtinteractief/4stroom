
	<div class="grid-8 content ">
		<h1 class="page-heading"><?php the_title(); ?></h1>
		<div class="text">
			
			<?php the_content(); ?>
			
			
				
		</div>
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

							// base arguments
							$args     = array(
									'post_type' => 'vacature',
									'posts_per_page' => 5,
									'paged' => $paged
							);

							// check if category is selected
							$currentCategory = $_GET['category'];
							if ( $currentCategory ) {
								$args['vacature_category'] = $currentCategory;
							}

							// check if there was a textsearch
							$currentSearch = $_GET['text'];
							if ( $currentSearch ) {
								$args['s'] = $currentSearch;
							}

							// check if sort option is selected
							$currenSort = $_GET['sort'];
							if ( $currenSort == "az") {
								$args['orderby'] = 'title';
								$args['order'] = 'ASC';
							}
							elseif( $currenSort == "za") {
								$args['orderby'] = 'title';
								$args['order'] = 'DESC';
							}
							elseif( $currenSort == "date") {
								$args['orderby'] = 'date';
								$args['order'] = 'DESC';
							}

							$wp_query = null;
							$wp_query = new WP_Query( $args );

							// get terms of taxonomy product_categories
							$terms = get_terms( "vacature_category" );
							$count = count( $terms );

							// build filter for product categories
							if ( $count > 0 ) { ?>

							<div class="sort-options left sort-category">
								<div class="style-select">
									<select id="boe2">
										<nav class="box category">
											<h1>Categorie</h1>
											<ul>
												<?php if (  $currentCategory )  { ?>
													<?php echo "test: " .$count; ?>
													<option value="<?php echo $term ?>" selected="<?php $currentCategory == $term->name ? true : false ?>" href="?category=<?php echo $term ?>" />

											<?php } ?>
												<?php foreach ( $terms as $term ) { ?>
													<option value="<?php echo $term->slug ?>" selected="<?php $currentCategory == $term->slug ? true : false ?>" href="?category=<?php echo $term->slug ?>"><?php echo $term->name ?></option>

												<?php	} ?>
											</ul>
									</select>
								</div>
							</div>

						<?php	} ?>


						<div class="sort-options right sort-date">
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
											<?php if(get_field('type_vacature')) : ?>
											<li class=""><?php the_field('type_vacature'); ?></li>
											<?php endif;?>
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
										<a href="<?php echo get_permalink( $post->ID ) ?>" class="post-link icon icon-arrow-right">Lees meer</a>
									</div>
									<a href="<?php echo get_permalink( $post->ID ) ?>" class="box-link">Lees meer</a>

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
	<aside class="grid-4 sidebar">
		<?php get_template_part('parts/services/subnav'); ?>
	</aside>