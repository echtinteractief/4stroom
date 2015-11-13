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
		<?php get_template_part('parts/common/topnav'); ?>
		
		<?php get_template_part('parts/common/_part-header-img'); ?>
		
		<article>
		
		
			<div class="row block-padding">
				<div class="grid-4 search-options">
					<?php  get_search_form();?>
				</div>
				<div class="grid-8 content ">
	
					
					
					
					<h1 class="page-heading"><span><?php _e( 'Search Results for:', 'bonestheme' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>
					<ul id="inner-content" class="list-view">
					<?php 
							//query_posts('cat=-12');
					
					if (have_posts()) : while (have_posts()) : the_post(); 
						
						$title=(types_render_field("teaser-title",array('raw' => 'true'))) ? types_render_field("teaser-title",array('raw' => 'true')) : get_the_title();
						$content=(types_render_field("teaser-txt",array('raw' => 'true'))) ? types_render_field("teaser-txt",array('raw' => 'true')) : get_the_excerpt();
						
						$content = strip_tags($content);//remove html tags
						
						if(strlen($content)>200) 
							$content = substr($content, 0, 200).'...';
						
						
						//$img=(types_render_field("teaser-img",array('raw' => 'true'))) ? types_render_field("teaser-img",array('raw' => 'true')) : wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'thumb-300');
						$uri =  get_page_link($post->ID);	
					?>
				<li  class="post post-archive post-search">
					<article>
						<?php /*
						<div class="meta date">
							 <span class="meta-month"><?php the_time('M'); ?></span>
					         <span class="meta-day"><?php the_time('d'); ?></span>
			
						</div>
						*/ ?>
						<div class="text-block">
									
									<h1 class="post-title"><?php echo $title; ?></h1>
									<p class="post-text fixed-height">
										<?php echo $content; ?>
									</p>
								</div>						<a class="box-link" href="<?php echo $uri;?>">lees meer </a>
					</article>
						
						
					</li>
					<?php endwhile; ?>
				</ul>

					<?php bones_page_navi(); ?>
							

						<?php else : ?>
								
									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Sorry, No Results.', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Try your search again.', 'bonestheme' ); ?></p>
										</section>
										
									</article>

							<?php endif; ?>
				
				
				
				</div>
			</div>
		
		</article>

	<?php get_footer(); ?>
	</body>
</html>
