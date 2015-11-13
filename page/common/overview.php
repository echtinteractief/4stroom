<div class="grid-8 content ">
	<h1 class="page-heading"><?php the_title(); ?></h1>

	<div class="text">
		<p class="intro">
			<strong>

				<?php the_content(); ?>

			</strong>
		</p>
	</div>
	<section class="block list-block">
		<h2 class="hide page-heading"><?php echo get_the_title(); ?> overzicht:</h2>


		<?php
		$args = array(
				'page_type' => 'post' );

		$news = new WP_Query( $args );
		if ( $news->have_posts() ) {
			?>

			<?php
			$paged    = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$wp_query = new WP_Query( array( 'page_type' => 'post', 'posts_per_page' => 5, 'paged' => $paged ) );

			// check if category is selected
			$currentCategory = $_GET['category'];
			if ( $currentCategory ) {
				$args     = array(
						'category_name'  => $currentCategory,
						'page_type'      => 'post',
						'paged'          => $paged,
						'posts_per_page' => 5
				);
				$wp_query = null;
				$wp_query = new WP_Query( $args );
			}?>

			<ul id="inner-content" class="list-view">
				<?php

				if ( have_posts() ) : while ( have_posts() ) : the_post();

					$title   = ( types_render_field( "teaser-title", array( 'raw' => 'true' ) ) ) ? types_render_field( "teaser-title", array( 'raw' => 'true' ) ) : get_the_title();
					$content = ( types_render_field( "teaser-txt", array( 'raw' => 'true' ) ) ) ? types_render_field( "teaser-txt", array( 'raw' => 'true' ) ) : get_the_excerpt();

					$content = strip_tags( $content ); //remove html tags

					if ( strlen( $content ) > 200 )
						$content = substr( $content, 0, 200 ) . '...';

					$uri = get_permalink( $post->ID );
					?>
					<li class="post post-archive type-news">
						<!-- Show the categories of the current post if there's not been a category filtered -->
						
						<article>

							<div class="meta date">
								<div class="column">
									<span class="meta-day"><?php the_time( 'd' ); ?></span>
									<span class="meta-month"><?php the_time( 'M' ); ?></span>

								</div>
							</div>

							<div class="text-block">

								<h1 class="post-title"><?php echo $title; ?></h1>
								<?php if ( ! isset( $currentCategory ) ) : ?>
								<ul class="meta-data">	
								<?php
									$postCategories = get_the_category( $post->ID );
									foreach ( $postCategories as $index => $cat ) {
										echo '<li class="meta-item category">'.$cat->name. '</li>';
/*
										if ( $index != 0 ) {
											echo ', ' . $cat->name;
										} else {
											echo $cat->name;
										}
*/
									}
								?>
								</ul>
								<?php endif;?>
								<p class="post-text fixed-height">
									<?php echo $content; ?>
								</p>
							</div>

							<a class="box-link" href="<?php echo $uri; ?>">lees meer over <?php echo $title; ?></a>
						</article>


					</li>
				<?php endwhile; endif; ?>
			</ul>

		<?php
		} else {
			echo 'Geen nieuws op dit moment.';
		}
		?>

		<?php
		bones_page_navi( '', '', $wp_query );
		?>
	</section>
</div>

<aside class="grid-4 sidebar">
	<?php get_template_part( 'parts/common/subnav' ); ?>
</aside>

