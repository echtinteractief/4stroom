<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="box post-higlight block-padding">
			<div class="row ">
				<div class="grid-8">
					<h1 class="page-heading"><?php the_title(); ?></h1>
					<div class="text">
						<?php the_content(); ?>
					</div>
				</div>
				<div class="grid-4">

					<?php if( have_rows('voordelen') ): ?>

					<div class="banner action bg-brand-color">
						<ul>
							<?php while( have_rows('voordelen') ): the_row(); ?>
								<li class=""><?echo the_sub_field('text') ?></li>
							<?php endwhile; ?>
						</ul>
						<?php if( get_field('nieuwe_prijs')): ?>
						<p class="price">
							<del>van € <?php the_field('oude_prijs') ?>,-</del> voor € <?php the_field('nieuwe_prijs') ?>,
						</p>
						<?php endif; ?>
						<a href="#wordlid" class="btn inverse">Nu aanmelden</a>
					</div>

					<?php endif; ?>

				</div>
			</div>
		</div>

<?php get_template_part('parts/members/members-flexcontent'); ?>

	<?php if( get_field('formulier')){
		the_field('formulier');
	} ?>


<?php endwhile;
 endif;
?>
<?php get_template_part('parts/members/leden-footer'); ?>