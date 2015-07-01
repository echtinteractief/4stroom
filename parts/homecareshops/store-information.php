<div class="panel info store">
	<div class="text grid-8">
		<?php echo get_field('extra_winkel_informatie'); ?>
	</div>
	<div class="map grid-4">
		<?php 
			if( !empty($location) ):
		?>
			<div class="acf-map">
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
			</div>
		<?php endif; ?>
	</div>
</div>