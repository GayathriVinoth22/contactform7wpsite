
<div class="um-members row">
	<div class="um-gutter-sizer"></div>
	<?php $i = 0; foreach( um_members('users_per_page') as $member) { $i++; um_fetch_user( $member ); ?>
			
	<div class="um-member col-md-6 col-lg-6 col-xs-12 um-role-<?php echo um_user('role'); ?> <?php echo um_user('account_status'); ?> <?php if ($cover_photos) { echo 'with-cover'; } ?>">
        <div class="um-member__wrapper">

            <span class="um-member-status <?php echo um_user('account_status'); ?>"><?php echo um_user('account_status_name'); ?></span>

            <?php
                 if ($profile_photo) {
                $default_size = str_replace( 'px', '', um_get_option('profile_photosize') );
                $corner = um_get_option('profile_photocorner');
                ?>
                <div class="um-member-photo radius-<?php echo $corner; ?>">
                    <a href="<?php echo um_user_profile_url(); ?>" title="<?php echo esc_attr(um_user('display_name')); ?>"><?php echo get_avatar( um_user('ID'), $default_size ); ?></a>
                    <?php $currentID = um_user('ID');
                    $args =  array(
                        'author'        => $currentID,
                        'post_type'       =>    'vehicle',
                        'posts_per_page'  =>    '',
                        'orderby'         =>    '',
                        'order'           =>    'DESC'
                    );
                    $current_user_posts = get_posts( $args );
                    if(isset($current_user_posts) && $current_user_posts != ''):
                        $count = 0;
                        $countm = 0;
                        $sum = 0;
                        foreach ($current_user_posts as $current){
                            $average_rating = get_post_meta( $current->ID, 'tz-average-rating', true );
                            $month = date('m');
                            $year = date ('Y');
                            $postmonth = get_the_date('m',$current->ID );
                            $postyear = get_the_date('Y',$current->ID );

                            if(isset($postmonth) && isset($postyear)):
                                if($year == $postyear){
                                    if($postmonth == $month){
                                        $countm = $countm + 1;
                                    }
                                }
                            endif;

                            if($average_rating != ''){
                                $count = $count + 1;
                                $sum += $average_rating;
                            }
                        }
                    endif;
                    if($sum != '' && $count != ''):
                        $countstar = ($sum / 10) / $count;
                        $roundstar = 0;
                        switch($countstar)
                        {
                            case ($countstar <= 0.24):
                                $roundstar = "0";
                                break;

                            case ($countstar <= 0.74):
                                $roundstar = "0.5";
                                break;

                            case ($countstar <= 1.24):
                                $roundstar = "1";
                                break;

                            case ($countstar <= 1.74):
                                $roundstar = "1.5";
                                break;

                            case ($countstar <= 2.24):
                                $roundstar = "2";
                                break;

                            case ($countstar <= 2.74):
                                $roundstar = "2.5";
                                break;

                            case ($countstar <= 3.24):
                                $roundstar = "3";
                                break;

                            case ($countstar <= 3.74):
                                $roundstar = "3.5";
                                break;

                            case ($countstar <= 4.24):
                                $roundstar = "4";
                                break;

                            case ($countstar <= 4.74):
                                $roundstar = "4.5";
                                break;

                            case ($countstar <= 5):
                                $roundstar = "5";
                                break;
                        }
                    endif;
                    ?>
                    <?php if(isset($roundstar) && $roundstar != ''): ?>
                    <div class="tz_auto_show_rating count-star">
                        <?php if($roundstar == '0.5'): ?>
                        <span class="0starhalf"><i class="fa fa-star-half-o"></i></span>
                        <?php endif; ?>

                        <?php if($roundstar >= '1' ): ?>
                        <span class="1star"><i class="fa fa-star"></i></span>
                         <?php endif; ?>

                        <?php if($roundstar == '1.5'): ?>
                        <span class="1starhalf"><i class="fa fa-star-half-o"></i></span>
                        <?php endif; ?>

                        <?php if($roundstar >= '2' ): ?>
                        <span class="2star"><i class="fa fa-star"></i></span>
                        <?php endif; ?>

                        <?php if($roundstar == '2.5'): ?>
                        <span class="2starhalf"><i class="fa fa-star-half-o"></i></span>
                        <?php endif; ?>

                        <?php if($roundstar >= '3' ): ?>
                        <span class="3star"><i class="fa fa-star"></i></span>
                        <?php endif; ?>

                        <?php if($roundstar == '3.5'): ?>
                        <span class="3starhalf"><i class="fa fa-star-half-o"></i></span>
                        <?php endif; ?>

                        <?php if($roundstar >= '4' ): ?>
                        <span class="4star"><i class="fa fa-star"></i></span>
                        <?php endif; ?>

                        <?php if($roundstar == '4.5'): ?>
                        <span class="4starhalf"><i class="fa fa-star-half-o"></i></span>
                        <?php endif; ?>

                        <?php if($roundstar == '5' ): ?>
                        <span class="5star"><i class="fa fa-star"></i></span>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <p>( <?php echo esc_attr($count); ?> <?php echo esc_html__('Reviews','autoshowroom'); ?>  )</p>
                </div>

            <?php } ?>

            <?php
            $address = get_user_meta(um_user('ID'), 'tz_auto_address', true);
            $phone = get_user_meta(um_user('ID'), 'tz_auto_phone', true);
            $google_mapvalue = get_user_meta(um_user('ID'), 'tz_google_map', true);
            ?>

            <div class="um-member-card <?php if (!$profile_photo) { echo 'no-photo'; } ?>">

                <?php if ( $show_name ) { ?>
                    <div class="um-member-name"><a href="<?php echo um_user_profile_url(); ?>" title="<?php echo esc_attr(um_user('display_name')); ?>"><?php echo um_user('display_name', 'html'); ?></a></div>
                <?php } ?>

                <div class="um-member-newcar um-style">
                    <span><i class="fa fa-car"></i> <?php echo esc_attr($countm) ?> <?php echo esc_html__('New Car','autoshowroom') ?> </span>
                </div>
                <?php if(isset($address) && $address != '' ): ?>
                <div class="um-member-address um-style">
                    <span><i class="fa fa-map-marker"></i> <?php echo esc_html($address) ?> </span>
                </div>
                <?php endif; ?>

                <?php if(isset($phone) && $phone != ''): ?>
                <div class="um-member-phone um-style">
                    <span><i class="fa fa-phone"></i> <?php echo esc_html($phone) ?> </span>
                </div>
                <?php endif; ?>

                <?php if(isset($maps) && $maps != ''): ?>
                <div class="um-member-maps um-style">
                    <!-- Trigger the modal with a button -->
                    <span data-toggle="modal" data-target="#myModal"><i class="fa fa-map" aria-hidden="true"></i> See Map  </span>

                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div id="map"></div>
                                    <script>
                                            function initMap() {
                                                var myLatlng = new google.maps.LatLng(<?php echo esc_attr($google_mapvalue); ?>);
                                                var mapOptions = {
                                                    zoom: 16,
                                                    center: myLatlng
                                                }
                                                var map = new google.maps.Map(document.getElementById("map"), mapOptions);

                                                var marker = new google.maps.Marker({
                                                    position: myLatlng,
                                                    title:"Hello World!"
                                                });

                                                // To add the marker to the map, call setMap();
                                                marker.setMap(map);
                                            }
                                    </script>
                                    <script async defer
                                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTay4Xx4Y3Z7hfDVayualyZ9_hUqYctBs&callback=initMap">
                                    </script>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <?php endif; ?>

                <?php do_action('um_members_just_after_name', um_user('ID'), $args); ?>

                <?php do_action('um_members_after_user_name', um_user('ID'), $args); ?>

                <?php
                if ( $show_tagline && is_array( $tagline_fields ) ) {

                    um_fetch_user( $member );

                    foreach( $tagline_fields as $key ) {
                        if ( $key && um_filtered_value( $key ) ) {
                            $value = um_filtered_value( $key );


                            ?>

                            <div class="um-member-tagline um-member-tagline-<?php echo $key;?>"><?php echo $value; ?></div>

                            <?php
                        } // end if
                    } // end foreach
                } // end if $show_tagline
                ?>

                <?php if ( $show_userinfo ) { ?>

                    <div class="um-member-meta-main">

                        <?php if ( $userinfo_animate ) { ?>
                            <div class="um-member-more"><a href="#"><i class="um-faicon-angle-down"></i></a></div>
                        <?php } ?>

                        <div class="um-member-meta <?php if ( !$userinfo_animate ) { echo 'no-animate'; } ?>">

                            <?php foreach( $reveal_fields as $key ) {
                                if ( $key && um_filtered_value( $key ) ) {
                                    $value = um_filtered_value( $key );

                                    ?>

                                    <div class="um-member-metaline um-member-metaline-<?php echo $key; ?>"><span><strong><?php echo $ultimatemember->fields->get_label( $key ); ?>:</strong> <?php echo $value; ?></span></div>

                                    <?php
                                }
                            }
                            ?>

                            <?php if ( $show_social ) { ?>
                                <div class="um-member-connect">

                                    <?php $ultimatemember->fields->show_social_urls(); ?>

                                </div>
                            <?php } ?>

                        </div>

                        <div class="um-member-less"><a href="#"><i class="um-faicon-angle-up"></i></a></div>

                    </div>

                <?php } ?>

            </div>

        </div>

	</div>
				
	<?php 
	um_reset_user_clean();
	} // end foreach

	um_reset_user();
	?>

	<div class="um-clear clearfix"></div>

</div>
