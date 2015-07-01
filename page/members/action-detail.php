<div class="box post-higlight block-padding">
			<div class="row ">
				<div class="grid-8">
					<h1 class="page-heading"><?php the_title(); ?></h1>
					<div class="text">
						<?php echo get_the_content(); ?>
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
						<p class="price">
							<del>van € <?php the_field('oude_prijs') ?>,-</del> voor € <?php the_field('nieuwe_prijs') ?>,
						</p>
						<a href="#wordlid" class="btn inverse">Nu bestellen</a>
					</div>

					<?php endif; ?>

				</div>
			</div>
		</div>

<?php get_template_part('parts/members/members-teasergroup'); ?>
		

