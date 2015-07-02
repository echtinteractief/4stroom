<!-- Members teasergroup -> member offers -->
<?php if( have_rows('members_offers') ): ?>
<section class="bg-white-color block-padding">
	<div class="row">
		<h2 class="page-heading"><?php the_field('members_teasergroup_title') ?></h2>
		<ul class="group-8 ">
	<?php while( have_rows('members_offers') ): the_row(); ?>

		<?php $posts = get_sub_field('aanbieding');

			if( $posts ): ?>

			<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
				<?php setup_postdata($post); ?>
				<?php
				$title= get_the_title($post->ID);
				$content= get_the_content();
				$img = get_field('afbeelding');
				//$img= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'thumb-300');
				//$img_array = wp_get_attachment_image_src($img, 'thumb-600'); //get image thumb
				$uri =  get_permalink();
				?>

				<li class="post post-image-sale">
					<article>
						<h1 class="post-sale-title"><?php echo $title	 ?></h1>
						<figure class="crop">
							<?php
								if( !empty($img) ):	
								// thumbnail
									$size = 'thumb-square';
									$thumb = $img['sizes'][ $size ];
								?>
								
							<img src="<?php echo $thumb; ?>">
							
							<?php endif; ?>
							
						</figure>
						<div class="text-block-sale round">
							<p><?php the_field('korting') ?>% korting</p>
						</div>
						<a href="<?php echo $uri ?>" class="box-link">Lees meer</a>
					</article>
				</li>

			<?php endforeach; ?>

			<?php wp_reset_postdata(); ?>
			<?php endif; ?>
<?php endwhile; ?>
		</ul>

		<a href="/leden/aanbod" class="link-to-page icon icon-arrow-right right">Meer aanbiedingen</a>
	</div>
</section>

<?php endif; ?>