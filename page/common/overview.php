
	<div class="grid-8 content ">
		<h1 class="page-heading"><?php the_title(); ?></h1>

		<div class="text">
			<p class="intro">
				<strong>

					<?php the_content(); ?>

				</strong>
			</p>
		</div>
		<div class="text">
			<p class="intro">
				<strong>

					<?php the_content(); ?>

				</strong>
			</p>
		</div>

		<section class="block list-block">
			<h2 class="hide page-heading">Vacature overzicht:</h2>


				<?php
				$args = array(
						'page_type' => 'post');

				$news = new WP_Query( $args );
				if( $news->have_posts() ) { ?>

				<?php
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$wp_query = new WP_Query( array( 'page_type' => 'post', 'posts_per_page' => 5, 'paged' => $paged ) );

				// check if category is selected
				$currentCategory = $_GET['category'];
					if ( ! empty( $currentCategory ) ) {
					$args     = array(
							'category_name' => $currentCategory,
							'page_type'          => 'post'
					);
					$wp_query = null;
					$wp_query = new WP_Query( $args );
				}?>


			<ul id="inner-content" class="list-view">
				<?php
				//query_posts( 'posts_per_page=5' );

				if (have_posts()) : while (have_posts()) : the_post();

					$title=(types_render_field("teaser-title",array('raw' => 'true'))) ? types_render_field("teaser-title",array('raw' => 'true')) : get_the_title();
					$content=(types_render_field("teaser-txt",array('raw' => 'true'))) ? types_render_field("teaser-txt",array('raw' => 'true')) : get_the_excerpt();

					$content = strip_tags($content);//remove html tags

					if(strlen($content)>200)
						$content = substr($content, 0, 200).'...';


// 								$img=(types_render_field("teaser-img",array('raw' => 'true'))) ? types_render_field("teaser-img",array('raw' => 'true')) : wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'thumb-300');
					$uri =  get_page_link($post->ID);
					?>
					<li  class="post post-archive">
						<article>

							<div class="meta date">
								<span class="meta-month"><?php the_time('M'); ?></span>
								<span class="meta-day"><?php the_time('d'); ?></span>
								<?php //<span class="meta-year"><?php the_time('Y'); ?></span>
							</div>

							<div class="archive-content">
								<?php /* if($img) : ?>
							<figure class="crop round left">
								<img src="<?php	echo $img;?>" />
							</figure>
							<?php endif; */?>

								<div class="text">
									<h1>
										<?php echo $title; ?>
									</h1>



									<p>
										<?php echo $content; ?>
									</p>
								</div>
							</div>
							<a class="box-link" href="<?php echo $uri;?>">lees meer over <?php echo $title;?></a>
						</article>


					</li>
				<?php endwhile; endif; ?>
			</ul>

			<?php }
			else {
				echo 'Geen nieuws op dit moment.';
			}
			?>

			<?php
			//if ( $wp_query->max_num_pages > 1 ) :
			//bones_page_navi();
			bones_page_navi( '', '', $wp_query );
			//endif;
			?>
		</section>
	</div>

	<aside class="grid-4 sidebar">
		<?php get_template_part('parts/common/subnav'); ?>
	</aside>
