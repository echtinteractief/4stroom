<article class="bar leden-bar">
	<div class="row">
		<h1 class="bar-title arrow-vierstroom right"><a href="leden-home.html">Extra's voor leden</a></h1>
		
		<div class="bar-text">
			<p>Vierstroom biedt niet alleen alle hulp en zorg om zelfstandig te kunnen blijven. U kunt ook lid worden van Vierstroom LedenService! Want samen met 65.000 staan we sterk! Leden krijgen interessante kortingen op de diensten van Vierstroom enHuishoudelijke hulp voor iedereen Hulp binnen handbereik via persoonlijk alarmprofiteren van aanvullende aanbiedingen. Voordeel op uw zorgverzekering bijvoorbeeld of gratis krukken lenen.</p>
			<a href="leden-home.html" class="box-link">Lees meer</a>
		</div>
	</div>
</article>

<?php
	//get follow page
	$include1 = get_page_by_title('HulpThuis');
	$include2 = get_page_by_title('ZorgThuis');
	$include3 = get_page_by_title('VeiligThuis');	
	
	$args = array(	
    	'post_type' => 'page',
		'post__in' => array($include1->ID,$include2->ID,$include3->ID),
		'orderby' => 'post__in'
	);	
		
	$query_pages=  new WP_Query($args);

?>

<section class="bg-brand-color block-padding">
	<div class="row">
		<h1 class="hide">Diensten</h1>
		<ul class="group-3 box">
			<?php
				while ($query_pages->have_posts()) : $query_pages->the_post();$do_not_duplicate = $post->ID;
	
				$title=(types_render_field("teaser-title",array('raw' => 'true'))) ? types_render_field("teaser-title",array('raw' => 'true')) : get_the_title();
				$content=(types_render_field("teaser-txt",array('raw' => 'true'))) ? types_render_field("teaser-txt",array('raw' => 'true')) : get_the_excerpt();
				$getImg=types_render_field("teaser-img",array('size'=>'header-img'));
					preg_match('@src="([^"]+)"@' , $getImg, $match);
				$img= array_pop($match);	
				$uri =  get_page_link($post->ID);		
			?>
			<li class="post post-text-in-image bg-white-color ">
				<article>
					<div class="text-block">
						<h1><?php echo $title; ?></h1>
						<p><em><?php echo $content; ?></em></p>
					</div>
					
					<figure class="crop">
						<img src="<?php echo $img; ?>" />
					</figure>
					
					<a href="<?php echo $uri; ?>" class="box-link">Lees meer</a>
				</article>
			</li>
			<?php endwhile; ?>
		</ul>
	</div>
</section>

