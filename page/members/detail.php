<div class="box block-padding">
	<div class="row ">
		<div class="grid-8">
			<h1 class="page-heading"><?php echo get_the_title(); ?></h1>
			<div class="text">
				<?php the_content(); ?>
			</div>
		</div>
		
		<div class="grid-4">
			&nbsp;
		</div>
		
	</div>
		
</div>

	<?php get_template_part('parts/members/members-flexcontent'); ?>

<?php get_template_part('parts/members/leden-footer'); ?>
		

