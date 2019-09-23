<?php get_header(); ?>
<?php get_template_part('template_inc/inc','menu'); ?>
<?php get_template_part('template_inc/inc','title-breadcrumb');
$autoshowroom_page_class = '';
$pagesidebar         =  get_post_meta( get_the_ID(),'autoshowroom_sidebar_option_choose', true ) ;
$pagesidebar_name    =  get_post_meta( get_the_ID(),'autoshowroom_sidebar_name', true ) ;
if($pagesidebar == 1 || $pagesidebar == 2){
    $autoshowroom_page_class .= ' col-md-9';
}else{
    $autoshowroom_page_class .= ' col-md-12';
}
?>


<section class="container-content auto-page-content autoshowroom-blog-body">
    <div class="container">
        <div class="row">
            <?php if($pagesidebar ==1){
               ?>
                <div class="col-md-3 tz-sidebar tz-sidebar-shop autoshowroom-sidebar">
                    <?php
                    if(is_active_sidebar($pagesidebar_name)):
                        dynamic_sidebar($pagesidebar_name);
                    endif;
                    ?>
                </div>
            <?php

            } ?>

            <div class="<?php echo esc_attr($autoshowroom_page_class);?>">
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
            <?php if($pagesidebar ==2){
                ?>
                <div class="col-md-3 tz-sidebar tz-sidebar-shop autoshowroom-sidebar">
                    <?php
                    if(is_active_sidebar($pagesidebar_name)):
                        dynamic_sidebar($pagesidebar_name);
                    endif;
                    ?>
                </div>
                <?php
            } ?>
        </div>

    </div>
</section>
<?php
get_template_part('template_inc/inc','contact');
get_template_part('template_inc/inc','footer');
get_footer();
?>