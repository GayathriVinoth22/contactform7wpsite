<?php
    /*
     * Template Name: Template Dealer Edit vehicle
     */
?>
<?php get_header(); ?>
<?php get_template_part('template_inc/inc','menu'); ?>
<?php get_template_part('template_inc/inc','title-breadcrumb');
?>
    <section class="container-content auto-page-content">
        <div class="container">
            <div class="row">
                <!-- New Post Form -->

                <div id="postbox">

                    <?php echo do_shortcode('[Insert_post_from_frontEnd post_type="vehicle"  status="publish" task="edit"]'); ?>

                </div>

                <!--// New Post Form -->

            </div>
        </div>
    </section>
<?php
get_template_part('template_inc/inc','footer');
get_footer();
?>