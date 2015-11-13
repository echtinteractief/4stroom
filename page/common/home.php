<?php 	?>

<article class="bar leden-bar">
	<?php 
		//$leden = get_page_by_title("Extra’s voor leden");	
		$args = array(	
	    	'post_type' => 'page',
			'post__in' => array(37),
			'orderby' => 'post__in'
		);	
		
		$query_leden=  new WP_Query($args);
	
	
		while ($query_leden->have_posts()) : $query_leden->the_post();$do_not_duplicate = $post->ID;
			$title= get_field('teaser_titel', $post->ID)  ? get_field('teaser_titel', $post->ID) : get_the_title($post->ID);
			$content= get_field('teaser_beschrijving', $post->ID) ? get_field('teaser_beschrijving', $post->ID) : false;
			$uri =  get_page_link($post->ID);
	?>
	<div class="row">
		<h1 class="bar-title arrow-vierstroom right"><a href="<?php echo $uri; ?>"><?php echo $title; ?></a></h1>
		
		<div class="bar-text">
			<?php echo $content; ?>
			<a href="<?php echo $uri;?>" class="box-link">Lees meer</a>
		</div>
	</div>
	
	<?php 
		endwhile; 
		wp_reset_query();
	?>
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


				
				

			
