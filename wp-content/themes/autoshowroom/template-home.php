<?php
    /*
     * Template Name: Template Home
     */
?>
<?php  get_header(); ?>
<?php
if(have_posts()):
    while(have_posts()):the_post();
        the_content();
        wp_link_pages();
    endwhile;
endif;
?>
<?php
get_template_part('template_inc/inc','footer');
get_footer();
?>