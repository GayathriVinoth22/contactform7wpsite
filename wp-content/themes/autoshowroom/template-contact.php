<?php
    /*
     * Template Name: Template Contact
     */
?>
<?php get_header(); ?>
<?php get_template_part('template_inc/inc','menu'); ?>
<?php get_template_part('template_inc/inc','title-breadcrumb');
$autoshowroom_portfolio_sidebar = ot_get_option('autoshowroom_contact_sidebar',1);
if($autoshowroom_portfolio_sidebar==2){
    $autoshowroom_columns = 12;
} else{
    $autoshowroom_columns = 9;
}
?>
    <section class="container-content auto-page-content">
        <div class="container">
            <div class="row">
                <?php if($autoshowroom_portfolio_sidebar==0){?>
                    <div class="col-md-3 tz-sidebar tz-sidebar-shop autoshowroom-sidebar">
                        <?php
                        if(is_active_sidebar("autoshowroom-sidebar-contact")):
                            dynamic_sidebar("autoshowroom-sidebar-contact");
                        endif;
                        ?>
                    </div>
                <?php } ?>
                <div class="col-md-<?php echo esc_attr($autoshowroom_columns);?>">
                <?php
                while (have_posts()) : the_post() ;
                    ?>
                    <div <?php post_class() ?>>
                        <?php the_content();
                        wp_link_pages();
                        ?>
                    </div>
                    <?php
                    comments_template();
                endwhile;
                ?>
                </div>
            </div>
        <?php if($autoshowroom_portfolio_sidebar==1){?>
            <div class="col-md-3 tz-sidebar tz-sidebar-shop autoshowroom-sidebar">
                <?php
                if(is_active_sidebar("autoshowroom-sidebar-contact")):
                    dynamic_sidebar("autoshowroom-sidebar-contact");
                endif;
                ?>
            </div>
        <?php } ?>
        </div>

    </section>
<?php
get_template_part('template_inc/inc','contact');
get_template_part('template_inc/inc','footer');
get_footer();
?>