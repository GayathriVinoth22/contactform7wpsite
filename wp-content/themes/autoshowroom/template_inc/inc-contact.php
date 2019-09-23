<?php

if(is_category() || is_author() || is_single() || is_search() || is_tag() || is_home() || is_404() || is_archive()){
    $autoshowroom_contact_image         =   ot_get_option('autoshowroom_contact_imagebg');
    $autoshowroom_contact_message       =   ot_get_option('autoshowroom_contact_message');
    $autoshowroom_contact_button_text   =   ot_get_option('autoshowroom_contact_button_text');
    $autoshowroom_contact_button_link   =   ot_get_option('autoshowroom_contact_button_link');
}elseif(is_page()){
    $autoshowroom_contact_image         =  get_post_meta( get_the_ID(),'autoshowroom_contact_option_bgimage', true ) ;
    $autoshowroom_contact_message       =  get_post_meta( get_the_ID(),'autoshowroom_contact_option_message', true ) ;
    $autoshowroom_contact_button_text   =  get_post_meta( get_the_ID(),'autoshowroom_contact_option_button_text', true ) ;
    $autoshowroom_contact_button_link   =  get_post_meta( get_the_ID(),'autoshowroom_contact_option_button_link', true ) ;
}

$autoshowroom_contact_style = '';
if($autoshowroom_contact_image != ''){
    $autoshowroom_contact_style = 'style=background-image:url('.esc_attr($autoshowroom_contact_image).')';
}
?>
<div class="autoshowroom-contact" <?php echo esc_attr($autoshowroom_contact_style);?>>
    <div class="autoshowroom-contact-overlay">
        <div class="container">
            <div class="autoshowroom-contact-content">
                <span class="autoshowroom-contact-message">
                    <?php
                    echo do_shortcode($autoshowroom_contact_message);
                    ?>
                </span>
                <?php
                if($autoshowroom_contact_button_text != '' && $autoshowroom_contact_button_link != ''){
                    ?>
                    <a class="autoshowroom-contact-button" target="_blank" title="button" href="<?php echo esc_url($autoshowroom_contact_button_link);?>"><?php echo esc_html($autoshowroom_contact_button_text);?></a>
                    <?php
                }
                if($autoshowroom_contact_button_text != '' && $autoshowroom_contact_button_link == ''){
                    ?>
                    <a class="autoshowroom-contact-button" title="button" href="javascript: "><?php echo esc_html($autoshowroom_contact_button_text);?></a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div><!-- end class tzbreadcrumb -->