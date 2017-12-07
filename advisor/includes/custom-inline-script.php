<?php
function advisor_custom_scripts(){

	global $advisor_options;

	?>
    <script>

	jQuery(document).ready(function($) {

		<?php
			// Advisor Custom JS form Theme Options
			echo $advisor_options['advisor-custom-scripts'];
		 ?>

	});
	jQuery(document).ready(function($) {

		<?php
			// Advisor Custom JS form Theme Options
			if( $advisor_options['advisor-enable-animations'] == true ) { ?>

				jQuery(".animate").addClass("animate-it");

		<?php	} ?>

	});
	</script>
    <?php

}

add_action( 'wp_footer', 'advisor_custom_scripts', 21);
function advisor_admin_ajax_url() {
?>
<script type="text/javascript">
var ajaxUrl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>
<?php
}
add_action('wp_head','advisor_admin_ajax_url');

function advisor_maps_script( $lat_lng_arr = array() , $map_id = '', $marker = '', $zoom = '' , $company = '', $address = '' , $phone = '', $fax = '', $map_view_type = '') {

		if( !empty( $lat_lng_arr[0] ) && !empty( $lat_lng_arr[1] )) { ?>

		<script>



			(function($) {
	"use strict";


			 google.maps.event.addDomListener(window, 'load', init);

							function init() {}


				var myLatlng = new google.maps.LatLng(<?php echo $lat_lng_arr[0] .','. $lat_lng_arr[1] ; ?>);



				var locationArray = [myLatlng];
				var locationNameArray = ['myLatlng'];

				// Note: this value is exact as the map projects a full 360 degrees of longitude
				var GALL_PETERS_RANGE_X = 800;

				// Note: this value is inexact as the map is cut off at ~ +/- 83 degrees.
				// However, the polar regions produce very little increase in Y range, so
				// we will use the tile size.
				var GALL_PETERS_RANGE_Y = 510;

				function degreesToRadians(deg) {
					return deg * (Math.PI / 180);
				}

				function radiansToDegrees(rad) {
					return rad / (Math.PI / 180);
				}

				/**
				 * @constructor
				 * @implements {google.maps.Projection}
				 */
				function GallPetersProjection() {

					// Using the base map tile, denote the lat/lon of the equatorial origin.
					this.worldOrigin_ = new google.maps.Point(GALL_PETERS_RANGE_X * 400 / 800,
						GALL_PETERS_RANGE_Y / 2);

					// This projection has equidistant meridians, so each longitude degree is a linear
					// mapping.
					this.worldCoordinatePerLonDegree_ = GALL_PETERS_RANGE_X / 360;

					// This constant merely reflects that latitudes vary from +90 to -90 degrees.
					this.worldCoordinateLatRange = GALL_PETERS_RANGE_Y / 2;
				};

				GallPetersProjection.prototype.fromLatLngToPoint = function(latLng) {

					var origin = this.worldOrigin_;
					var x = origin.x + this.worldCoordinatePerLonDegree_ * latLng.lng();

					// Note that latitude is measured from the world coordinate origin
					// at the top left of the map.
					var latRadians = degreesToRadians(latLng.lat());
					var y = origin.y - this.worldCoordinateLatRange * Math.sin(latRadians);

					return new google.maps.Point(x, y);
				};

				GallPetersProjection.prototype.fromPointToLatLng = function(point, noWrap) {

					var y = point.y;
					var x = point.x;

					if (y < 0) {
					y = 0;
					}
					if (y >= GALL_PETERS_RANGE_Y) {
					y = GALL_PETERS_RANGE_Y;
					}

					var origin = this.worldOrigin_;
					var lng = (x - origin.x) / this.worldCoordinatePerLonDegree_;
					var latRadians = Math.asin((origin.y - y) / this.worldCoordinateLatRange);
					var lat = radiansToDegrees(latRadians);
					return new google.maps.LatLng(lat, lng, noWrap);
				};

				function initialize() {

					var gallPetersMap;

					var gallPetersMapType = new google.maps.ImageMapType({
					getTileUrl: function(coord, zoom) {
						var numTiles = 1 << zoom;

						// Don't wrap tiles vertically.
						if (coord.y < 0 || coord.y >= numTiles) {
						return null;
						}

						// Wrap tiles horizontally.
						var x = ((coord.x % numTiles) + numTiles) % numTiles;

						// For simplicity, we use a tileset consisting of 1 tile at zoom level 0
						// and 4 tiles at zoom level 1. Note that we set the base URL to a
						// relative directory.
						var baseURL = 'images/';
						baseURL += 'gall-peters_' + zoom + '_' + x + '_' + coord.y + '.png';
						return baseURL;
					},
					tileSize: new google.maps.Size(800, 512),
					isPng: true,
					minZoom: 0,
					maxZoom: 1,
					name: 'Gall-Peters'
					});

					gallPetersMapType.projection = new GallPetersProjection();

					<?php $map_view_type = "'" . $map_view_type . "'"; ?>

					var mapOptions = {
									zoom: <?php echo $zoom; ?>,
									zoomControl: true,
									scrollwheel: false,
									disableDefaultUI: true,
									center: myLatlng,
									mapTypeId: <?php echo $map_view_type; ?>,
									};

									var mapElement = document.getElementById('<?php echo $map_id; ?>');
									var map = new google.maps.Map(mapElement, mapOptions);

					var marker = new google.maps.Marker({
							position: myLatlng,
							animation: google.maps.Animation.DROP,
							map: map,
							 icon: '<?php echo $marker; ?>',
					 });




					function toggleBounce() {

						if (marker.getAnimation() != null) {
						marker.setAnimation(null);
						} else {
						marker.setAnimation(google.maps.Animation.BOUNCE);
						}

						 if (marker1.getAnimation() != null) {
						marker.setAnimation(null);
						} else {
						marker1.setAnimation(google.maps.Animation.BOUNCE);
						}
					}

					<?php if (!empty ( $company ) ) { ?>

						var office = '<h5 id="firstHeading" class="firstHeading">'+'<?php echo $company; ?>'+'</h5>';

					<?php } ?>
					<?php if (!empty ( $address ) ) { ?>

						var address = '<div id="bodyContent">'+'<?php echo $address; ?>';

					<?php } ?>
					<?php if (!empty ( $phone ) ) { ?>

						var phone = '<p>Tel: '+'<?php echo $phone; ?>';

					<?php } ?>
					<?php if (!empty ( $fax ) ) { ?>

						var fax = '</br>Fax: '+'<?php echo $fax; ?>';

					<?php } ?>
						var contentString = '<div id="content-map">'+
						'<div id="siteNotice">'+
						'</div>'+
							<?php if ( !empty ( $company ) ) { ?> office + <?php } ?>
							<?php if ( !empty ( $address ) ) { ?> address + <?php } ?>
							<?php if ( !empty ( $phone ) ) { ?> phone + <?php } ?>
							<?php if ( !empty ( $fax ) ) { ?> fax + <?php } ?>
						' </p>'+
						'</div>'+
						'</div>';
						var infowindow = new google.maps.InfoWindow({
							content: contentString,
							maxWidth: 350
						});

						google.maps.event.addListener(marker, 'click', function() {
						infowindow.open(map,marker);
						});


				}



			google.maps.event.addDomListener(window, 'load', initialize);

		})(jQuery);

		</script>

		<?php }		 ?>


<?php

}



function advisor_progressbar_script( $progressbar_class = '') { ?>

		<script>

			(function($) {
					"use strict";

					<?php $progressbar_class = "'" . $progressbar_class . "'"; ?>


					var progressbar_class = <?php echo $progressbar_class; ?> ;

					
					/**************** Progress *******************/
					$('.' + progressbar_class).progressBar({
						 shadow : true,
						 percentage : true,
						 animation : true,
						 barcolor : "#f71735",
					});


				})(jQuery);

				</script>

				<?php

			} ?>
