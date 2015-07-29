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

	<div class="box block-padding">
		<div class="row ">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div class="grid-8">
				<h1 class="page-heading"><?php echo get_the_title(); ?></h1>
				<div class="text">
					<?php the_content(); ?>
				</div>
				
				<div class="comments">
					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
						comments_template();
						endif; 
					?>
				</div>
			</div>
			<aside class="grid-4 sidebar">
				<?php get_template_part('parts/common/subnav'); ?>
			</aside>

			<?php endwhile; endif; ?>

		</div>
	</div>
</article>



<footer class="footer-page-end">
	<div class="row">
		<span class=""><?php echo date('Y'); ?>  </span>
		<em class=""><?php bloginfo('name'); ?>, <?php bloginfo('description');?></em>
	</div>
</footer>
	
	
<?php wp_footer(); ?>
</body>
</html>