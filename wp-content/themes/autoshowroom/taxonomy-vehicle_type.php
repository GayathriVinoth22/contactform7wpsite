<?php get_header(); ?>
<?php get_template_part('template_inc/inc','menu'); ?>
<?php get_template_part('template_inc/inc','title-breadcrumb');

$autoshowroom_portfolio_description_limit = ot_get_option('autoshowroom_TZVehicle_limit');
$autoshowroom_portfolio_specifications_arr = ot_get_option('autoshowroom_TZVehicle_specs');
$autoshowroom_portfolio_sidebar = ot_get_option('autoshowroom_TZVehicle_sidebar');
$showcompare    = ot_get_option('autoshowroom_Detail_show_compare','yes');
$autoshowroom_vehicle_excerpt = ot_get_option('autoshowroom_TZVehicle_excerpt',1);
$autoshowroom_vehicle_total = $wp_query->found_posts;

if($autoshowroom_portfolio_sidebar=='none'){
    $autoshowroom_columns = 12;
} else{
    $autoshowroom_columns = 9;
}

$desktopcolumns = ot_get_option('autoshowroom_TZVehicle_desktop_col');
$tabletcolumns = ot_get_option('autoshowroom_TZVehicle_tablet_col');
$mobilecolumns = ot_get_option('autoshowroom_TZVehicle_mobile_col');
if(isset($_GET['orderby'])){
    $sort_value = $_GET['orderby'];
}else{
    $sort_value = '';
}

if(isset($_GET['order'])){
    $sort_price = $_GET['order'];
}
wp_enqueue_script('autoshowroom-masonry.pkgd');
wp_enqueue_script('autoshowroom-imagesloaded.pkgd');
wp_enqueue_script('autoshowroom-masonry');
wp_enqueue_script('autoshowroom-vehicle-masonry');

$autoshowroom_sort = ot_get_option('autoshowroom_TZVehicle_sort','show');
$autoshowroom_sold = ot_get_option('autoshowroom_TZVehicle_sold','show');
$autoshowroom_per_page = ot_get_option('autoshowroom_post_per_page',9);
$autoshowroom_orderby = ot_get_option('autoshowroom_orderby','date');
$autoshowroom_order = ot_get_option('autoshowroom_order','desc');
?>
    <section class="container-content default-page vehicle-page-masonry"
             data-desktop="<?php echo esc_attr($desktopcolumns);?>"
             data-tablet="<?php echo esc_attr($tabletcolumns);?>"
             data-mobile="<?php echo esc_attr($mobilecolumns);?>">
        <div class="container">
            <div class="row">
                <?php if($autoshowroom_portfolio_sidebar=='left'){ ?>
                    <div class="col-md-3 tz-sidebar tz-sidebar-shop autoshowroom-sidebar">
                        <?php
                        if(is_active_sidebar("autoshowroom-sidebar-inventory")):
                            dynamic_sidebar("autoshowroom-sidebar-inventory");
                        endif;
                        ?>
                    </div>
                <?php } ?>
                <div class="col-md-<?php echo esc_attr($autoshowroom_columns);?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="vehicle-results">
                                <?php if($autoshowroom_sort=='show'){?>
                                    <div class="el_sort">
                                        <select name="auto_sort" class="auto_sort" data-url="<?php echo get_home_url();?>/inventory/">
                                            <option <?php if($sort_value=='newness'){ echo "selected"; }?> value="newness"><?php echo esc_html__('Sort by newness','autoshowroom');?></option>
                                            <option <?php if($sort_value=='price' && $sort_price=='desc'){ echo "selected"; }?> value="price_desc"><?php echo esc_html__('Sort by Price: High to low','autoshowroom');?></option>
                                            <option <?php if($sort_value=='price'  && $sort_price=='asc'){ echo "selected"; }?> value="price_asc"><?php echo esc_html__('Sort by Price: Low to high','autoshowroom');?></option>
                                        </select>
                                    </div>
                                <?php } ?>
                                <span class="results-text"><?php esc_html_e('Your search returned ','autoshowroom'); echo esc_attr($autoshowroom_vehicle_total); esc_html_e(' results','autoshowroom'); ?></span>
                                <div class="vehicle-layouts">
                                    <?php esc_html_e('View as: ','autoshowroom');?>
                                    <a href="javascript: " class="vehicle-layout-grid-button"><i class="fa fa-th"></i>
                                        <span class="tooltip-content"><?php esc_html_e('View Grid','autoshowroom');?></span>
                                    </a>
                                    <a href="javascript: " class="vehicle-layout-list-button"><i class="fa fa-th-list"></i>
                                        <span class="tooltip-content"><?php esc_html_e('View List','autoshowroom');?></span>
                                    </a>
                                </div>
                                <div class="clr"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="vehicle-masonry">
                            <?php
                            if ( have_posts()): while(have_posts()):  the_post();


                                $sold = get_field('autoshowroom_vehicle_sold',get_the_ID());
                                $pricetext = get_field( 'pricetext',get_the_ID());
                                $pricelink = get_field( 'pricelink',get_the_ID());
                                ?>
                                <div class="vehicle-grid">
                                    <div class="TZ-Vehicle-Grid">
                                        <div class="item">
                                            <div class="Vehicle-Feature-Image">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail( 'large'); ?>
                                                </a>
                                            </div>
                                            <h4 class="Vehicle-Title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h4>
                                            <?php
                                            if($autoshowroom_vehicle_excerpt == 1){
                                                if($autoshowroom_portfolio_description_limit){
                                                    $desc = substr(strip_tags(get_the_excerpt()), 0, $autoshowroom_portfolio_description_limit);
                                                    ?>
                                                    <div class="vehicle-feature-des">
                                                        <p><?php echo esc_attr($desc);?></p>
                                                    </div>
                                                <?php } else{
                                                    echo get_the_excerpt();
                                                }
                                            }
                                            ?>
                                            <?php echo balanceTags(tz_autoshowroom_get_vehicle_specs(get_the_ID(),$autoshowroom_portfolio_specifications_arr));?>

                                            <?php
                                            if($sold=='sold'){ ?>
                                                <p class="pcd-pricing">
                                                    <span class="pcd-price"><?php echo esc_html__('SOLD','autoshowroom');?></span>
                                                </p>
                                                <?php
                                            }elseif($sold == 'upcoming'){ ?>
                                                <p class="pcd-pricing">
                                                    <span class="pcd-price"><?php echo esc_html__('Upcoming','autoshowroom');?></span>
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

                                            <div class="vehicle-btn">
                                                <?php if($showcompare=='yes'){ ?>
                                                    <span class="btn-function btn_detail_compare" data-text="<?php esc_html_e('In Compare List','autoshowroom');?>"
                                                          data-id="<?php echo esc_attr(get_the_ID());?>">
                                                <i class="fa fa-car"></i>
                                                        <?php esc_html_e('Add to Compare','autoshowroom');?>
                                            </span>
                                                <?php } ?>
                                                <a href="<?php the_permalink(); ?>">
                                                    <i class="fa fa-arrow-circle-right"></i>
                                                    <?php esc_html_e('View More','autoshowroom'); ?>
                                                </a>
                                            </div>
                                            <div class="clr"></div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                comments_template();
                            endwhile;
                            endif;
                            ?>
                        </div>
                    </div>
                    <?php
                    if ( function_exists('wp_pagenavi') ):
                        wp_pagenavi();
                    else:
                        tz_autoshowroom_paging_nav('bottom-nav');
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
                <?php if($autoshowroom_portfolio_sidebar=='right'){ ?>
                    <div class="col-md-3 tz-sidebar tz-sidebar-shop autoshowroom-sidebar">
                        <?php
                        if(is_active_sidebar("autoshowroom-sidebar-inventory")):
                            dynamic_sidebar("autoshowroom-sidebar-inventory");
                        endif;
                        ?>
                    </div>
                <?php } ?>
            </div>

        </div>

    </section>
<?php
get_template_part('template_inc/inc','footer');
get_footer();
?>