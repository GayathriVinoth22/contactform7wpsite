<div class="um <?php echo $this->get_class( $mode ); ?> um-<?php echo $form_id; ?> um-role-<?php echo um_user('role'); ?> ">

	<div class="um-form">
	
		<?php do_action('um_profile_before_header', $args ); ?>
		
		<?php if ( um_is_on_edit_profile() ) { ?><form method="post" action=""><?php } ?>
		
			<?php do_action('um_profile_header_cover_area', $args ); ?>
			
			<?php do_action('um_profile_header', $args ); ?>

            <?php $classes = apply_filters( 'um_profile_navbar_classes', '' ); ?>

            <div class="um-profile-navbar <?php echo $classes ?>">
                <?php
                /**
                 * UM hook
                 *
                 * @type action
                 * @title um_profile_navbar
                 * @description Profile navigation bar
                 * @input_vars
                 * [{"var":"$args","type":"array","desc":"Profile form shortcode arguments"}]
                 * @change_log
                 * ["Since: 2.0"]
                 * @usage add_action( 'um_profile_navbar', 'function_name', 10, 1 );
                 * @example
                 * <?php
                 * add_action( 'um_profile_navbar', 'my_profile_navbar', 10, 1 );
                 * function my_profile_navbar( $args ) {
                 *     // your code here
                 * }
                 * ?>
                 */
                do_action( 'um_profile_navbar', $args ); ?>
                <div class="um-clear"></div>
            </div>
			
			<?php
            $googleid = 'tz_google_map-'.$form_id;
            $google_mapvalue = get_user_meta(um_user('ID'), 'tz_google_map', true);
            if($google_mapvalue==''){
                $google_mapvalue ='Las Vegas, NV, United States';
            }

            do_action( 'um_profile_menu', $args );

            $nav = UM()->profile()->active_tab;
            $subnav = ( get_query_var('subnav') ) ? get_query_var('subnav') : 'default';

            print "<div class='um-profile-body $nav $nav-$subnav'>";

            // Custom hook to display tabbed content
            /**
             * UM hook
             *
             * @type action
             * @title um_profile_content_{$nav}
             * @description Custom hook to display tabbed content
             * @input_vars
             * [{"var":"$args","type":"array","desc":"Profile form shortcode arguments"}]
             * @change_log
             * ["Since: 2.0"]
             * @usage add_action( 'um_profile_content_{$nav}', 'function_name', 10, 1 );
             * @example
             * <?php
             * add_action( 'um_profile_content_{$nav}', 'my_profile_content', 10, 1 );
             * function my_profile_content( $args ) {
             *     // your code here
             * }
             * ?>
             */
            do_action("um_profile_content_{$nav}", $args);

            /**
             * UM hook
             *
             * @type action
             * @title um_profile_content_{$nav}_{$subnav}
             * @description Custom hook to display tabbed content
             * @input_vars
             * [{"var":"$args","type":"array","desc":"Profile form shortcode arguments"}]
             * @change_log
             * ["Since: 2.0"]
             * @usage add_action( 'um_profile_content_{$nav}_{$subnav}', 'function_name', 10, 1 );
             * @example
             * <?php
             * add_action( 'um_profile_content_{$nav}_{$subnav}', 'my_profile_content', 10, 1 );
             * function my_profile_content( $args ) {
             *     // your code here
             * }
             * ?>
             */

            print "<div id='map'></div>";

				do_action("um_profile_content_{$nav}_{$subnav}", $args);
				
			print "</div>";
				
			?>

		<?php if ( um_is_on_edit_profile() ) { ?></form><?php } ?>
	
	</div>
    <script>
        var map_id = "#<?php echo $googleid; ?>";
        var map_leng = jQuery(''+map_id+'').length;
        function initAutocomplete() {
            geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                'address': '<?php echo $google_mapvalue;?>'
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var myOptions = {
                        zoom: 13,
                        center: results[0].geometry.location,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    }
                    map = new google.maps.Map(document.getElementById("map"), myOptions);

                    // Create the search box and link it to the UI element.
                    var input = document.getElementById("<?php echo $googleid;?>");
                    var searchBox = new google.maps.places.SearchBox(input);
                    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
                    map.addListener("bounds_changed", function() {
                        searchBox.setBounds(map.getBounds());
                    });

                    var markers = [];
                    // more details for that place.
                    searchBox.addListener("places_changed", function() {
                        var places = searchBox.getPlaces();

                        if (places.length == 0) {
                            return;
                        }

                        // Clear out the old markers.
                        markers.forEach(function(marker) {
                            marker.setMap(null);
                        });
                        markers = [];

                        // For each place, get the icon, name and location.
                        var bounds = new google.maps.LatLngBounds();
                        places.forEach(function(place) {
                            if (!place.geometry) {
                                console.log("Returned place contains no geometry");
                                return;
                            }
                            var icon = {
                                url: place.icon,
                                size: new google.maps.Size(71, 71),
                                origin: new google.maps.Point(0, 0),
                                anchor: new google.maps.Point(17, 34),
                                scaledSize: new google.maps.Size(25, 25)
                            };

                            // Create a marker for each place.
                            markers.push(new google.maps.Marker({
                                map: map,
                                icon: icon,
                                title: place.name,
                                position: place.geometry.location
                            }));

                            if (place.geometry.viewport) {
                                // Only geocodes have viewport.
                                bounds.union(place.geometry.viewport);
                            } else {
                                bounds.extend(place.geometry.location);
                            }
                        });
                        map.fitBounds(bounds);
                    });
                }
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-kj2a0XyqfoNIzZZO8pp-BBTkJzcL09k&libraries=places&callback=initAutocomplete"
            async defer></script>
	
</div>