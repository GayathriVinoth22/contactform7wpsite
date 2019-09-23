<?php get_header(); ?>
<?php get_template_part('template_inc/inc','menu'); ?>
<?php get_template_part('template_inc/inc','title-breadcrumb'); ?>
<div class="autoshowroom-agency-single">
    <div class="container">
        <div class="row">

                <?php
                if ( have_posts() ) : while (have_posts()) : the_post() ;
                    $autoshowroom_agency_map                    = get_post_meta(get_the_ID(),'autoshowroom_agency_map', true);
                    $autoshowroom_agency_address                = get_post_meta(get_the_ID(),'autoshowroom_agency_address', true);
                    $autoshowroom_agency_phone                  = get_post_meta(get_the_ID(),'autoshowroom_agency_phone', true);
                    $autoshowroom_agency_email                  = get_post_meta(get_the_ID(),'autoshowroom_agency_email', true);
                    $autoshowroom_agency_sales_department       = get_post_meta(get_the_ID(),'autoshowroom_agency_sales_department', true);
                    $autoshowroom_agency_service_department     = get_post_meta(get_the_ID(),'autoshowroom_agency_service_department', true);
                    $autoshowroom_agency_rate                   = get_post_meta(get_the_ID(),'autoshowroom_agency_rate', true);
                    $autoshowroom_agency_sidebar                = get_post_meta(get_the_ID(),'autoshowroom_agency_sidebar', 1);

                    $autoshowroom_agency_rate_width = 0;
                    if($autoshowroom_agency_rate != ''){
                        $autoshowroom_agency_rate_width = ( $autoshowroom_agency_rate / 5 )* 100;
                    }
                    if($autoshowroom_agency_sidebar==0){
                        $col = 12;
                    }else{
                        $col = 9;
                    }
                    ?>
                    <div class="col-md-<?php echo esc_attr($col);?>">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="autoshowroom-agency-map">
                            <?php echo balanceTags($autoshowroom_agency_map);?>
                        </div>
                        <div class="autoshowroom-agency-content">
                            <div class="autoshowroom-agency-content-left">
                                <div class="autoshowroom-agency-image">
                                    <?php the_post_thumbnail();?>
                                </div>
                                <div class="autoshowroom-agency-info">
                                    <span class="autoshowroom-agency-address">
                                        <i class="fa fa-location-arrow"></i>
                                        <?php echo esc_html($autoshowroom_agency_address);?>
                                    </span>

                                    <span class="autoshowroom-agency-phone">
                                        <i class="fa fa-phone"></i>
                                        <?php echo esc_html($autoshowroom_agency_phone);?>
                                    </span>

                                    <span class="autoshowroom-agency-email">
                                        <i class="fa fa-envelope"></i>
                                        <?php echo esc_html($autoshowroom_agency_email);?>
                                    </span>
                                    <span class="autoshowroom-agency-sales-department">
                                        <i class="fa fa-calendar-check-o"></i>
                                        <?php echo balanceTags($autoshowroom_agency_sales_department);?>
                                    </span>
                                    <span class="autoshowroom-agency-service-department">
                                        <i class="fa fa-calendar-check-o"></i>
                                        <?php echo balanceTags($autoshowroom_agency_service_department);?>
                                    </span>
                                    <div class="autoshowroom-agency-rating" title="Rated 5 out of 5">
                                        <span  style="width:<?php echo esc_attr($autoshowroom_agency_rate_width);?>%">
                                            <strong class="rating"><?php echo esc_html($autoshowroom_agency_rate);?></strong>
                                            <?php esc_html_e('out of 5','autoshowroom');?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="autoshowroom-agency-content-right">
                                <h3 class="autoshowroom-agency-single-title"><?php the_title();?></h3>
                                <?php
                                the_content();
                                wp_link_pages();
                                ?>
                            </div>
                        </div>
                    </article>
                </div>
                    <?php if($autoshowroom_agency_sidebar==1){ ?>
                        <div class="col-md-3 tz-sidebar tz-sidebar-shop autoshowroom-sidebar">
                            <?php
                            if(is_active_sidebar("autoshowroom-sidebar-agency")):
                                dynamic_sidebar("autoshowroom-sidebar-agency");
                            endif;
                            ?>
                        </div>
                    <?php } ?>
                    <?php
                endwhile; // end while ( have_posts )
                endif; // end if ( have_posts )
                ?>



        </div>
    </div>
</div>
<?php get_template_part('template_inc/inc','contact'); ?>
<?php
get_footer();
?>

