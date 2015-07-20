<article>
<?php get_template_part('parts/services/nav'); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="row block-padding page-overview">
		<div class="grid-8 content ">
			<h1 class="page-heading"><?php the_title(); ?></h1>
			<div class="text"><?php the_content(); ?></div>
		</div>
		<aside class="grid-4 sidebar">
			<?php get_template_part('parts/services/subnav'); ?>
		</aside>
	</div>
	
	<?php endwhile; endif; ?>
</article>