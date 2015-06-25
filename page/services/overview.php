<article>
	<?php get_template_part('parts/services/nav'); ?>

		<div class="row block-padding page-overview">
			<div class="grid-8 content ">

				<h1 class="page-heading"><?php the_title(); ?></h1>
				<div class="text">
					<?php

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
				<h2 class="page-heading">Onze ZorgThuis diensten</h2>
				<ul class="group-2 box">

					<?php
					/* We need to get the id of the diensten zorgthuis pagina and get the children of that page to display*/
					$servicesHomePage = get_page_by_title('Diensten ZorgThuis');
					$servicesHomeId = $servicesHomePage->ID;
					query_posts(array('showposts' => 8, 'post_parent' => $servicesHomeId, 'post_type' => 'page'));

					while (have_posts()) { the_post();

						$title=(types_render_field("teaser-title",array('raw' => 'true'))) ? types_render_field("teaser-title",array('raw' => 'true')) : get_the_title();
						$content=(types_render_field("teaser-txt",array('raw' => 'true'))) ? types_render_field("teaser-txt",array('raw' => 'true')) : get_the_excerpt();
						$img=(types_render_field("teaser-img",array('raw' => 'true'))) ? types_render_field("teaser-img",array('raw' => 'true')) : wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'thumb-300');
						$uri =  get_page_link($post->ID); ?>

						<li class="post post-text-in-image shadow">
							<article>
								<figure class="crop">
									<img src="<?php echo $img ?>">
								</figure>
								<div class="text-block">
									<h1><?php echo $title ?></h1>
									<p class="fixed-height"><em><?php echo $content ?></em></p>
								</div>
								<a href="<?php echo $uri ?>" class="box-link">Lees meer</a>
							</article>
						</li>

					<?php }
				 ?>

				</ul>
			</div>
			<aside class="grid-4 sidebar">
				<?php get_template_part('parts/services/subnav'); ?>
			</aside>
		</div>
</article>