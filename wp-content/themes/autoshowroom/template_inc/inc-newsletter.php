<?php if(shortcode_exists('newsletter_form')) {
    $autoshowroom_newsletter_title = ot_get_option('autoshowroom_newsletter_title','WE ARE HERE FOR YOU');
    $autoshowroom_newsletter_des = ot_get_option('autoshowroom_newsletter_des','By entering your email address, you will be kept updated about Auto Showroom.');
?>

<div class="tz-newsletter">
    <div class="container">
        <div class="row">
            <div class="newsletter-title col-md-12">
                <h3 class="title">
                    <?php echo esc_html($autoshowroom_newsletter_title); ?>
                </h3>
                <p><?php echo esc_html($autoshowroom_newsletter_des); ?></p>

            </div>
            <div class="newsletter-content col-md-12">
                <?php
                echo do_shortcode(
                    '[newsletter_form button_label="Sign Up"]
                         [newsletter_field name="email" placeholder="Enter your email..."]
                         [/newsletter_form]');

                ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>