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
				<ul class="page-meta">
					<?php if(get_field('type_vacature')) : ?>
					<li><?php echo get_field('type_vacature'); ?></li>
					<?php endif; ?>
					<?php if(get_field('plaats')) : ?>
					<li class="icon icon-location"><?php echo get_field('plaats'); ?></li>
					<?php endif; ?>
					<li class="">
						<?php
							$terms = get_the_terms( $post->ID , 'vacature_category' );
							
							foreach ( $terms as $term ) {
								echo '<span class="icon icon-tag">'.$term->name.'</span> ';
							}
						?>
					</li>
					<li class="icon icon-date"><?php echo get_the_date(); ?></li>
				</ul>
				
				
				<div class="text">
					<?php the_content(); ?>
				</div>
			
				<?php
				$location = get_field('locatie');
				if( !empty($location) ):
				?>

				<div class="acf-map">
					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">

					</div>
				</div>
				<?php endif; ?>
			</div>
			<aside class="grid-4 sidebar">
				<?php get_template_part('parts/services/subnav'); ?>
			</aside>

			<?php endwhile; endif; ?>

		</div>
	</div>
</article>



<?php wp_footer(); ?>
<?php get_footer(); ?>

<style type="text/css">

	.acf-map {
		width: 100%;
		height: 400px;
		border: #ccc solid 1px;
		margin: 20px 0;
	}

</style>


<script type="text/javascript">
	(function($) {

		/*
		 *  render_map
		 *
		 *  This function will render a Google Map onto the selected jQuery element
		 *
		 *  @type	function
		 *  @date	8/11/2013
		 *  @since	4.3.0
		 *
		 *  @param	$el (jQuery element)
		 *  @return	n/a
		 */

		function render_map( $el ) {

			// var
			var $markers = $el.find('.marker');

			// vars
			var args = {
				zoom		: 16,
				center		: new google.maps.LatLng(0, 0),
				mapTypeId	: google.maps.MapTypeId.ROADMAP
			};

			// create map
			var map = new google.maps.Map( $el[0], args);

			// add a markers reference
			map.markers = [];

			// add markers
			$markers.each(function(){

				add_marker( $(this), map );

			});

			// center map
			center_map( map );

		}

		/*
		 *  add_marker
		 *
		 *  This function will add a marker to the selected Google Map
		 *
		 *  @type	function
		 *  @date	8/11/2013
		 *  @since	4.3.0
		 *
		 *  @param	$marker (jQuery element)
		 *  @param	map (Google Map object)
		 *  @return	n/a
		 */

		function add_marker( $marker, map ) {

			// var
			var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

			// create marker
			var marker = new google.maps.Marker({
				position	: latlng,
				map			: map
			});

			// add to array
			map.markers.push( marker );

			// if marker contains HTML, add it to an infoWindow
			if( $marker.html() )
			{
				// create info window
				var infowindow = new google.maps.InfoWindow({
					content		: $marker.html()
				});

				// show info window when marker is clicked
				google.maps.event.addListener(marker, 'click', function() {

					infowindow.open( map, marker );

				});
			}

		}

		/*
		 *  center_map
		 *
		 *  This function will center the map, showing all markers attached to this map
		 *
		 *  @type	function
		 *  @date	8/11/2013
		 *  @since	4.3.0
		 *
		 *  @param	map (Google Map object)
		 *  @return	n/a
		 */

		function center_map( map ) {

			// vars
			var bounds = new google.maps.LatLngBounds();

			// loop through all markers and create bounds
			$.each( map.markers, function( i, marker ){

				var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

				bounds.extend( latlng );

			});

			// only 1 marker?
			if( map.markers.length == 1 )
			{
				// set center of map
				map.setCenter( bounds.getCenter() );
				map.setZoom( 16 );
			}
			else
			{
				// fit to bounds
				map.fitBounds( bounds );
			}

		}

		/*
		 *  document ready
		 *
		 *  This function will render each map when the document is ready (page has loaded)
		 *
		 *  @type	function
		 *  @date	8/11/2013
		 *  @since	5.0.0
		 *
		 *  @param	n/a
		 *  @return	n/a
		 */

		$(document).ready(function(){

			$('.acf-map').each(function(){

				render_map( $(this) );

			});

		});

	})(jQuery);
</script>
</body>
</html>