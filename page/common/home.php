<?php 	?>

<article class="bar leden-bar">
	<div class="row">
		<h1 class="bar-title arrow-vierstroom right"><a href="leden">Extra's voor leden</a></h1>
		
		<div class="bar-text">
			<p>Vierstroom biedt niet alleen alle hulp en zorg om zelfstandig te kunnen blijven. U kunt ook lid worden van Vierstroom LedenService! Want samen met 65.000 staan we sterk! Leden krijgen interessante kortingen op de diensten van Vierstroom enHuishoudelijke hulp voor iedereen Hulp binnen handbereik via persoonlijk alarmprofiteren van aanvullende aanbiedingen. Voordeel op uw zorgverzekering bijvoorbeeld of gratis krukken lenen.</p>
			<a href="leden" class="box-link">Lees meer</a>
		</div>
	</div>
</article>
<?php
		$args = array(
			'posts_per_page' => 3,
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'tag' => 'thuissite',
			'post_type' => 'page'
		);
$the_query = new WP_Query($args);

if( $the_query->have_posts()){?>

	<section class="bg-brand-color block-padding">
		<div class="row">
			<h1 class="hide">Diensten</h1>
			<ul class="group-3 box">

	<?php while ( $the_query->have_posts() ) : $the_query->the_post();
		$title= get_field('teaser_titel', $post->ID)  ? get_field('teaser_titel', $post->ID) : get_the_title($post->ID);
		$content= get_field('teaser_beschrijving', $post->ID) ? get_field('teaser_beschrijving', $post->ID) : get_the_excerpt($post->ID);
		$img= get_field('teaser_afbeelding', $post->ID)['url'] ? get_field('teaser_afbeelding', $post->ID)['url'] : wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'thumb-300');
		$uri =  get_page_link($post->ID); ?>


				<li class="post post-text-in-image bg-white-color ">
					<article>
						<div class="text-block">
							<h1><?php echo $title ?></h1>
							<p><em><?php echo $content ?></em></p>
						</div>

						<figure class="crop">
							<img src="<?php	echo $img;?>">
						</figure>
						<a href="<?php echo $uri;?>" class="box-link">Lees meer</a>
					</article>
				</li>

	<?php endwhile;?>

			</ul>
		</div>
	</section>

<?php }
wp_reset_postdata();
?>


				
				

			
