<?php get_header(); ?>
<?php get_template_part('template_inc/inc','menu'); ?>
<?php get_template_part('template_inc/inc','title-breadcrumb'); ?>
<div class="autoshowroom-agency">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php
                if ( have_posts() ) : while (have_posts()) : the_post() ;
                    $autoshowroom_agency_address                = get_post_meta(get_the_ID(),'autoshowroom_agency_address', true);
                    $autoshowroom_agency_phone                  = get_post_meta(get_the_ID(),'autoshowroom_agency_phone', true);
                    $autoshowroom_agency_email                  = get_post_meta(get_the_ID(),'autoshowroom_agency_email', true);
                    $autoshowroom_agency_rate                   = get_post_meta(get_the_ID(),'autoshowroom_agency_rate', true);

                    $autoshowroom_agency_rate_width = 0;
                    if($autoshowroom_agency_rate != ''){
                        $autoshowroom_agency_rate_width = ( $autoshowroom_agency_rate / 5 )* 100;
                    }

                    ?>
                    <div id='post-<?php the_ID(); ?>' class="autoshowroom-agency-item">
                        <div class="row">
                            <div class="col-md-4 item-start">
                                <div class="autoshowroom-agency-image">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="autoshowroom-agency-content">
                                    <h3 class="autoshowroom-agency-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                                    <div class="autoshowroom-agency-des">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <a href="<?php the_permalink();?>" class="autoshowroom-agency-more"><?php esc_html_e('View More', 'autoshowroom');?></a>

                                    <div class="autoshowroom-agency-rating" title="Rated 5 out of 5">
                                        <span  style="width:<?php echo esc_attr($autoshowroom_agency_rate_width);?>%">
                                            <strong class="rating"><?php echo esc_html($autoshowroom_agency_rate);?></strong>
                                            <?php esc_html_e('out of 5','autoshowroom');?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 item-end">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile; // end while ( have_posts )
                endif; // end if ( have_posts )
                ?>
                <div class="autoshowroom-blog-pagenavi">
                    <?php
                    if ( function_exists('wp_pagenavi') ):
                        wp_pagenavi();
                    else:
                        tz_autoshowroom_paging_nav('bottom-nav');
                    endif;
                    ?>
                </div>
            </div>
            <div class="col-md-3 tz-sidebar tz-sidebar-shop autoshowroom-sidebar">
                <?php
                if(is_active_sidebar("autoshowroom-sidebar-agency")):
                    dynamic_sidebar("autoshowroom-sidebar-agency");
                endif;
                ?>
            </div>
        </div>
    </div>
</div>
<?php get_template_part('template_inc/inc','contact'); ?>
<?php
get_footer();
?>

