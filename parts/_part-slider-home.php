
<section class="slider">
	<h1 class="hide">Over ons</h1>
	<div class="carousel" data-prevnext="false">
		<ul class="wrapper">
			<?php
				$loop_slider = new WP_Query(
					array( 
						'post_type' => 'home-slider',
						'orderby'=>'menu_order',
						'order'=>'ASC'
					)  
				 
				);	
			?>
			
			<?php while ($loop_slider->have_posts() ) : $loop_slider->the_post();	?>
			
			<?php
				$id=$post->post_title;
				$title=get_the_title();
				$subtitle=(types_render_field("slider-subtitle",array('raw' => 'true'))) ? types_render_field("slider-subtitle",array('raw' => 'true')) : false;
				$content=(types_render_field("slider-text",array('raw' => 'true'))) ? types_render_field("slider-text",array('raw' => 'true')) : false;
				
				//frontpage has bigger image
				
				$getImg=types_render_field("slider-img-2",array('size'=>'header-slider'));
				
				preg_match('@src="([^"]+)"@' , $getImg, $match);
				
				$img= array_pop($match);
						
				$uri=(types_render_field("slider-link",array('raw' => 'true'))) ? types_render_field("slider-link",array('raw' => 'true')) : '';	
				
			?>
			<li class="item orange">
				<article>
					<figure class="crop" data-img="<?php echo $img ?>">
					
					</figure>
					<div class="row">
						<div class="box ">
							<div class="box-content">
								<h1><?php echo $title;?><strong><br /><?php echo $subtitle ?></strong></h1>						
								<p class="small-text">
									<?php echo $content; ?>
								</p>
							</div>
						</div>
					</div>
					<?php if($uri) : ?>
					<a href="<?php echo $uri; ?>" class="box-link">Verder lezen</a>
					<?php endif; ?>
				</article>
			</li>
			
			<?php 
				endwhile; 
				wp_reset_query();
			?>
			
		</ul>
	</div>
	<div class="row relative">
		<div class="widget-find">
			<form>
				<label for="first-item">Ik wil graag</label>
				<div class="style-select">
					<select id="first-item">
						<option class="placeholder" disabled selected>Maak een keuze</option>
						<option>Informatie</option>
						<option>Bestellen</option>
					</select>
				</div>
				
				<label for="second-item">over</label>
				<div class="style-select">
					<select id="second-item">
						<option class="placeholder" disabled selected>Maak een keuze</option>
						<option>Thuiszorg</option>
						<option>Hulpmiddelen</option>
					</select>
				</div>
				<ul>
					<li>
						<label for="third-item">En dan specifiek over</label>
						<div class="style-select">
							<select id="third-item">
								<option class="placeholder" disabled selected>Maak een keuze</option>
								<option>Thuiszorg</option>
								<option>Hulpmiddelen</option>
							</select>
						</div>
					</li>
					<li>
						<label for="fourth-item">Kunt u mij</label>
						<div class="style-select">
							<select id="fourth-item">
								<option class="placeholder" disabled selected>Maak een keuze</option>
								<option>Thuiszorg</option>
								<option>Hulpmiddelen</option>
							</select>
						</div>
					</li>
					<li>
						<label for="fifth-item">U kunt mij bereiken op</label>
						<input type="text" id="fifth-item" value="" placeholder=""  />
					</li>
				</ul>


				<input type="submit" value="Verstuur" class="btn inverse wide" />
			</form>
			<p class="text-center">Of bel direct met Vierstroom <strong>088 - 0900 400</strong></p>
		</div>
	</div>
</section>