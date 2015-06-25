<?php
/*
	Template Name: Services Homepage
*/
?>
<!doctype html>
<!--[if lt IE 7 ]><html class="ie ieLT ie6" lang="nl"> <![endif]-->
<!--[if IE 7 ]><html class="ie ieLT ie7" lang="nl"> <![endif]-->
<!--[if IE 8 ]><html class="ie ieLT ie8" lang="nl"> <![endif]-->
<!--[if IE 9 ]><html class="ie ieLT ie9" lang="nl"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="nl">
	<head>
	<?php
		get_header();	
	?>
	
	<?php
		//body page class
		$page_slug="";
		if(is_page()) { $page_slug = 'page-'.$post->post_name; } 
	?>
	</head>
	<body <?php body_class($page_slug); ?>>
		
		<?php get_template_part('parts/_part-topnav'); ?>
	
		<article>
	
		<?php get_template_part('parts/_part-header-img');?>
		
		<?php get_template_part('parts/_part-services-nav'); ?>
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
		<div class="row block-padding page-overview">
			
			<section class="grid-8 content ">
				<h1 class="page-heading"><?php the_title(); ?></h1>
				<div class="text">
					<?php the_content(); ?>
				</div>
								<?php
					$args = array( 'post_parent' => get_the_ID(), 'post_type'   => 'page', 'orderby' => 'menu_order','order'=>'ASC');
					$children = get_children( $args );
					foreach ( $children as $child ) { 

						//get sub diensten page
						if($child->post_title=='Diensten') {
							
							$args = array( 'post_parent' =>  $child->ID, 'post_type'   => 'page', 'orderby' => 'menu_order','order'=>'ASC');
							$children = get_children( $args );
							
							?>
							
							<h2 class="page-heading"><?php echo types_render_field("teaser-title",array("post_id" => $child->ID,'raw' => 'true')); ?></h2>
							<ul class="group-2 box">

							<?php
							foreach ( $children as $child ) { 
								
								
								$title=(types_render_field("teaser-title",array("post_id" => $child->ID,'raw' => 'true'))) ? types_render_field("teaser-title",array("post_id" => $child->ID,'raw' => 'true')) : $child->post_title;
								$content=(types_render_field("teaser-txt",array("post_id" => $child->ID,'raw' => 'true'))) ? types_render_field("teaser-txt",array("post_id" => $child->ID,'raw' => 'true')) : get_the_excerpt();
					
								$content = strip_tags($content);//remove html tags
								if(strlen($content)>200) {
									$content = substr($content, 0, 200).'...';
								}
								
								$getImg=(types_render_field("teaser-img",array("post_id" => $child->ID,'raw' => 'true'))) ? types_render_field("teaser-img",array('post_id'=>$child->ID,'size'=>'thumb-600')) : false;
								preg_match('@src="([^"]+)"@' , $getImg, $match);
								$img= array_pop($match);
							
								$uri =  get_page_link($child->ID);		
								?>
								<li class="post post-text-in-image shadow">
									<article>
										<figure class="crop">
											<img src="<?php echo $img; ?>" />
										</figure>
										<div class="text-block">
											<h1><?php echo $title;?></h1>
											<p class="fixed-height"><em><?php echo $content; ?></em></p>
										</div>
										<a href="<?php echo $uri;?>" class="box-link">Lees meer</a>
									</article>
								</li>
								
								<?php
								
							}
							
							
							break;
						}

							
					}
				?>
		
				</ul>
			
				</section>
				<aside class="grid-4 sidebar">
					{{> site-subnav }}
				</aside>
			</div>
		</article>	
		
		<?php endwhile; endif; ?>
		
		
		<?php get_footer(); ?>
	</body>
</html>