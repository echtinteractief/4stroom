<div class="panel info store">
	<div class="text grid-8">
		<?php echo get_field('extra_winkel_informatie'); ?>
	</div>
	<div class="map grid-4">
		<?php 
			$location = get_field('locatie', $child->ID);
			if( !empty($location) ):
		?>
			<div class="google-map">
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
			</div>
		<?php endif; ?>
	</div>
</div>

