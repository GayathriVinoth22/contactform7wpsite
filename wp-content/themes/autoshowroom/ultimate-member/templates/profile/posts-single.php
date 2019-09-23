<?php $i = 0;
$autoshowroom_post_per_page = ot_get_option('autoshowroom_post_per_page',9);
 while (UM()->shortcodes()->loop->have_posts()) { UM()->shortcodes()->loop->the_post(); $post_id = get_the_ID(); ?>

        <?php
        $i++;
        $autoshowroom_specifications_arr = array("registration","milage","transmission");
        $autoshowroom_speci_total = count($autoshowroom_specifications_arr);
    ?>
        <?php if($i == 1 || $i % 3 == 1): ?>
        <div class="row">
            <?php endif; ?>
            <!--New Item-->
            <div class="item col-md-4 col-lg-4 col-xs-12">
                <div class="item-wrapper">
                    <?php
                    $user = wp_get_current_user();
                    $user_login = $user->ID;
                    $dealer_id = um_user('ID');
                    if($user_login == $dealer_id){
                        ?>
                        <a class="dealer_edit_vehicle" title="<?php echo esc_html_e('Edit','tz-autoshowroom');?>" href="<?php echo get_site_url(); ;?>/edit-car?car_id=<?php echo get_the_ID();?>"><i class="fa fa-edit "></i> </a>
                        <?php
                        ?>
                        <span class="dealer_delete_vehicle" title="<?php echo esc_html_e('Delete','tz-autoshowroom');?>" data-id="<?php echo get_the_ID();?>"><i class="fa fa-times-circle "></i> </span>
                        <?php
                    }

                    ?>

                    <div class="Vehicle-Feature-Image">
                        <a href="<?php echo get_permalink(); ?>">
                            <?php the_post_thumbnail('large'); ?>
                        </a>
                        <?php
                        $pricesold = get_field('autoshowroom_vehicle_sold',get_the_ID());
                        $pricetext = get_field( 'pricetext',get_the_ID());
                        $pricelink = get_field( 'pricelink',get_the_ID());
                        if($pricesold=='sold'){ ?>
                            <p class="pcd-pricing">
                                <span class="pcd-price"><?php echo esc_html__('SOLD','tz-autoshowroom');?></span>
                            </p>
                            <?php
                        }elseif($pricesold == 'upcoming'){ ?>
                            <p class="pcd-pricing">
                                <span class="pcd-price"><?php echo esc_html__('Upcoming','tz-autoshowroom');?></span>
                            </p>
                            <?php
                        } elseif($pricetext !='') { ?>
                            <p class="pcd-pricing">
                                <?php
                                if($pricelink !=''){ ?>
                                <a class="priceurl" href="<?php echo esc_url($pricelink);?>">
                                    <?php }
                                    ?>

                                    <span class="pcd-price"><?php echo esc_attr($pricetext);?></span>
                                    <?php
                                    if($pricelink !=''){ ?>
                                </a>
                            <?php }
                            ?>
                            </p>
                            <?php
                        }else
                        {
                            echo balanceTags(tz_autoshowroom_filter_vehicle_price(get_the_ID(),'yes'));
                        }
                        ?>
                    </div>

                    <h4 class="Vehicle-Title">
                            <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>

                    <div class="vehicle-feature-des">
                        <p class="vehicle-feature-excerpt"><?php echo get_the_excerpt(); ?></p>
                    </div>

                    <div class="vehicle-specs-<?php echo esc_attr__($autoshowroom_speci_total);?>">
                        <?php echo tz_autoshowroom_get_vehicle_specs(get_the_ID(), $autoshowroom_specifications_arr);?>
                    </div>

                </div>

            </div>
            <!--end item-->

    <?php if($i % 3 == 0): ?>
        <div class="clearfix"></div>
        </div>
        <?php endif; ?>

	<?php } ?>

<?php if ( isset($ultimatemember->shortcodes->modified_args) && $ultimatemember->shortcodes->loop->have_posts() && $ultimatemember->shortcodes->loop->found_posts >= $autoshowroom_post_per_page ) { ?>

    <div class="um-load-items">
        <a href="#" class="um-ajax-paginate um-button" data-hook="um_load_posts" data-args="<?php echo $ultimatemember->shortcodes->modified_args; ?>"><?php _e('load more vehicles','ultimate-member'); ?></a>
    </div>

<?php } ?>