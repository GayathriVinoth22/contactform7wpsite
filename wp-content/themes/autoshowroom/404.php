<?php /* get_header(); < ! - - The template for displaying 404 pages (Not Found) - - > ?> */
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 7/14/13
 * Time: 8:50 PM
 * To change this template use File | Settings | File Templates.
 */
get_header();
get_template_part('template_inc/inc','menu');
get_template_part('template_inc/inc','title-breadcrumb');
$autoshowroom_title      = ot_get_option('autoshowroom_404_title');
$autoshowroom_content    = ot_get_option('autoshowroom_404_content');
$autoshowroom_button = ot_get_option('autoshowroom_404_button');

?>

    <section class="container-content-404">
        <div class="container">
            <div class="bug-content">
                <h1 class="title-404"><?php echo esc_html($autoshowroom_title); ?></h1>
                <div id="errorboxheader"><?php echo balanceTags($autoshowroom_content); ?></div>
                <div id="errorboxbody">
                    <ul class="back-to-homepage">
                        <li><a href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php echo esc_html($autoshowroom_button); ?>">
                                <?php echo esc_html($autoshowroom_button); ?></a>
                        </li>
                    </ul>
                    <div id="techinfo">
                        <p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
get_footer();
?>