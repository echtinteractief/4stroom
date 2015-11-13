<section class="slider header-img">
	<h1 class="hide">Over ons</h1>
	<div class="carousel" data-prevnext="false">
		<ul class="wrapper">
						
			<?php
				
				$title=(types_render_field("header-title",array('raw' => 'true'))) ? types_render_field("header-title",array('raw' => 'true')) : false;
				$subtitle=(types_render_field("header-subtitle",array('raw' => 'true'))) ? types_render_field("header-subtitle",array('raw' => 'true')) : false;
				$content=(types_render_field("header-text",array('raw' => 'true'))) ? types_render_field("header-text",array('raw' => 'false')) : false;
				$getImg=types_render_field("header-img",array('size'=>'header-img'));
				
				preg_match('@src="([^"]+)"@' , $getImg, $match);
				
				$img= array_pop($match);	
					
								
			?>
			<li class="item">
				<article>
					<figure class="crop" data-img="<?php echo $img ?>">
					
					</figure>
					<div class="row">
						<div class="box ">
							<div class="box-content">
								<h1><?php echo $title;?><strong><br /><?php echo $subtitle ?></strong></h1>						
								<div class="small-text">
									<?php echo $content; ?>
								</div>
							</div>
						</div>
					</div>
				</article>
			</li>
		</ul>
	</div>
</section>