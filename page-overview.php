<?php
/*
 Template Name: Automatisch overzicht
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
*/
?>

<!doctype html>
<!--[if lt IE 7 ]>
<html class="ie ieLT ie6" lang="nl"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ieLT ie7" lang="nl"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ieLT ie8" lang="nl"> <![endif]-->
<!--[if IE 9 ]>
<html class="ie ieLT ie9" lang="nl"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="nl">
<head>
	<?php
	get_header();

	//body page class
	$page_slug = "";
	if ( is_page() ) {
		$page_slug = 'page-' . $post->post_name;
	}
	?>
</head>
<body <?php body_class( $page_slug ); ?>>
<?php
get_template_part( 'parts/common/topnav' );
get_template_part( 'parts/common/_part-header-img' );
?>

<article>
	<?php get_template_part( 'parts/services/nav' ); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="row block-padding page-overview">
		<div class="grid-8 content ">
			
			<h1 class="page-heading"><?php the_title(); ?></h1>
			<div class="text">
				<?php
				// the content (pretty self explanatory huh)
					
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
			<h2 class="page-heading">Meer</h2>
			<ul class="group-2 box">
				<?php 
					$args = array( 'post_parent' => get_the_ID(), 'post_type'   => 'page', 'orderby' => 'menu_order','order'=>'ASC');
					$children = get_children( $args );
					
					foreach( $children as $child) :
					
	
						$title= get_field('teaser_titel', $child->ID)  ? get_field('teaser_titel', $child->ID) : get_the_title($child->ID);
						$content= get_field('teaser_beschrijving', $child->ID) ? get_field('teaser_beschrijving', $child->ID) : get_the_excerpt($child->ID);
						//$img= get_field('teaser_afbeelding', $child->ID)['url'] ? get_field('teaser_afbeelding')['id'] : false;
						//$img_array = wp_get_attachment_image_src($img, 'thumb-600'); //get image thumb
						$uri =  get_page_link($child->ID); 	
				?>
				<li class="post post-text-in-image shadow">
					<article>
						<figure class="crop">
							<img src="<?php  echo get_field('teaser_afbeelding', $child->ID)['url']; ?>"> 
						</figure>
						<div class="text-block">
							<h1><?php echo $title ?>
							</h1>
							<p class="fixed-height"><em><?php echo $content ?></em></p>
						</div>
						<a href="<?php echo $uri ?>" class="box-link">Lees meer</a>
					</article>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>	
		<aside class="grid-4 sidebar">
			<?php get_template_part( 'parts/services/subnav' ); ?>
		</aside>
	</div>
	<?php endwhile; endif; ?>
</article>


<?php get_footer(); ?>
</body>
</html>