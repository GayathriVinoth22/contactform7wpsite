<?php
$autoshowroom_type_footer    =   ot_get_option('autoshowroom_footer_type','type1');
$autoshowroom_footer_col     =   ot_get_option('autoshowroom_footer_columns',4);
$autoshowroom_footer_widthl  =   ot_get_option('autoshowroom_footer_width1',3);
$autoshowroom_footer_width2  =   ot_get_option('autoshowroom_footer_width2',3);
$autoshowroom_footer_width3  =   ot_get_option('autoshowroom_footer_width3',3);
$autoshowroom_footer_width4  =   ot_get_option('autoshowroom_footer_width4',3);
$autoshowroom_footer_offset_width1  =   ot_get_option('autoshowroom_footer_offset_width1',0);
$autoshowroom_footer_offset_width2  =   ot_get_option('autoshowroom_footer_offset_width2',0);
$autoshowroom_footer_offset_width3  =   ot_get_option('autoshowroom_footer_offset_width3',0);
$autoshowroom_footer_offset_width4  =   ot_get_option('autoshowroom_footer_offset_width4',0);
$autoshowroom_footer_social_number  =  ot_get_option('autoshowroom_footer_social_number',5);
$autoshowroom_copyright      =   ot_get_option('autoshowroom_copyright');
$autoshowroom_btn_backtotop       =   ot_get_option('autoshowroom_btn_backtotop','yes');
$autoshowroom_btn_quote          =   ot_get_option('autoshowroom_btn_quote','yes');
$autoshowroom_btn_quote_title    =   ot_get_option('autoshowroom_btn_quote_title','Get A Quote');
$autoshowroom_btn_quote_link    =   ot_get_option('autoshowroom_btn_quote_link','http://wordpress.templaza.net/autoshowroom/get-a-quote/');
//$autoshowroom_footer_type       = get_post_meta(get_the_ID(),'autoshowroom_page_footer_type',true);
$autoshowroom_logo_footer       =  ot_get_option('autoshowroom_logo_footer');
$autoshowroom_newsletter = ot_get_option('autoshowroom_newsletter');
$autoshowroom_footer_bottom_class = '';
if($autoshowroom_type_footer == 'type1'){
    $autoshowroom_footer_bottom_class = 'col-md-6';
}else{
    $autoshowroom_footer_bottom_class = 'col-md-4';
}
?>

<footer class="autoshowroom-footer <?php echo esc_attr($autoshowroom_type_footer); ?>">
    <div class="autoshowroom-footer-top">
        <div class="container">
            <div class="row">
                <?php
                if(isset($autoshowroom_footer_col) && $autoshowroom_footer_col!=""):
                    for( $autoshowroom_i=0; $autoshowroom_i < $autoshowroom_footer_col; $autoshowroom_i++ ):
                        $autoshowroom_j = $autoshowroom_i +1;
                        if($autoshowroom_i==0){
                            if($autoshowroom_footer_offset_width1 != 0){
                                $autoshowroom_offset = $autoshowroom_footer_offset_width1;
                                $autoshowroom_col = $autoshowroom_footer_widthl - $autoshowroom_footer_offset_width1;
                            }else{
                                $autoshowroom_offset = 0;
                                $autoshowroom_col = $autoshowroom_footer_widthl;
                            }
                        }elseif($autoshowroom_i==1){
                            if($autoshowroom_footer_offset_width2 != 0){
                                $autoshowroom_offset = $autoshowroom_footer_offset_width2;
                                $autoshowroom_col = $autoshowroom_footer_width2 - $autoshowroom_footer_offset_width2;
                            }else{
                                $autoshowroom_offset = 0;
                                $autoshowroom_col = $autoshowroom_footer_width2;
                            }
                        }elseif($autoshowroom_i==2){
                            if($autoshowroom_footer_offset_width3 != 0){
                                $autoshowroom_offset = $autoshowroom_footer_offset_width3;
                                $autoshowroom_col = $autoshowroom_footer_width3 - $autoshowroom_footer_offset_width3;
                            }else{
                                $autoshowroom_offset = 0;
                                $autoshowroom_col = $autoshowroom_footer_width3;
                            }
                        }elseif($autoshowroom_i==3){
                            if($autoshowroom_footer_offset_width4 != 0){
                                $autoshowroom_offset = $autoshowroom_footer_offset_width4;
                                $autoshowroom_col = $autoshowroom_footer_width4 - $autoshowroom_footer_offset_width4;
                            }else{
                                $autoshowroom_offset = 0;
                                $autoshowroom_col = $autoshowroom_footer_width4;
                            }
                        }

                        ?>
                        <div class="col-md-<?php echo esc_attr($autoshowroom_col); ?><?php if($autoshowroom_offset != 0){ ?> col-md-offset-<?php echo esc_attr($autoshowroom_offset); ?><?php } ?> footerattr">
                            <?php
                            if(function_exists('dynamic_sidebar') && dynamic_sidebar('footer-'.$autoshowroom_j.'')):
                            endif;
                            ?>
                        </div><!--end class footermenu-->
                        <?php
                    endfor;
                endif;
                ?>
            </div>
        </div>
        <?php if($autoshowroom_newsletter == 'show' && $autoshowroom_type_footer == 'type2'){ ?>
        <?php get_template_part('template_inc/inc','newsletter')  ?>
        <?php } ?>
    </div>
    <div class="autoshowroom-footer-bottom">
        <div class="container">
            <div class="row">
                <?php if($autoshowroom_type_footer == 'type1'){ ?>
                <div class="autoshowroom-footer-bottom-center">
                    <div class="autoshowrooom-footer-bottom-center-box">
                        <?php
                        if(isset($autoshowroom_footer_social_number) && $autoshowroom_footer_social_number != ''){
                            for($autoshowroom_count = 1;$autoshowroom_count <= $autoshowroom_footer_social_number;$autoshowroom_count++){
                                ?>
                                <div class="autoshowroom-footer-social-item">
                                    <a href="<?php echo esc_url(ot_get_option('autoshowroom_social_url_'.$autoshowroom_count));?>" target="popup">
                                        <i class=" <?php echo esc_attr(ot_get_option('autoshowroom_social_icon_'.$autoshowroom_count))?>"></i>
                                    </a>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php } ?>
                <div class="<?php echo esc_attr($autoshowroom_footer_bottom_class); ?> autoshowroom-footer-bottom-left">
                    <?php
                    if ( is_active_sidebar( 'footer-bottom-left' )  ) :
                        dynamic_sidebar( 'footer-bottom-left' );
                    endif; ?>
                </div>
                <?php if($autoshowroom_type_footer == 'type2'){
                    ?>
                    <div class="autoshowroom-logo-footer col-md-4">
                        <img src="<?php echo esc_url($autoshowroom_logo_footer); ?>" alt="logo-footer">
                    </div>
                <?php
                } ?>
                <?php if($autoshowroom_type_footer == 'type1'){ ?>
                <div class="<?php echo esc_attr($autoshowroom_footer_bottom_class); ?> autoshowroom-footer-bottom-right">
                    <?php
                    if ( is_active_sidebar( 'footer-bottom-right' )  ) :
                        dynamic_sidebar( 'footer-bottom-right' );
                    endif; ?>
                </div>
                <?php }else{
                    ?>
                    <div class="autoshowroom-footer-social-right col-md-4">
                        <div class="autoshowrooom-footer-bottom-center-box">
                            <?php
                            if(isset($autoshowroom_footer_social_number) && $autoshowroom_footer_social_number != ''){
                                for($autoshowroom_count = 1;$autoshowroom_count <= $autoshowroom_footer_social_number;$autoshowroom_count++){
                                    ?>
                                    <div class="autoshowroom-footer-social-item">
                                        <a href="<?php echo esc_url(ot_get_option('autoshowroom_social_url_'.$autoshowroom_count));?>" target="popup">
                                            <i class=" <?php echo esc_attr(ot_get_option('autoshowroom_social_icon_'.$autoshowroom_count))?>"></i>
                                        </a>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                <?php
                } ?>
            </div>
        </div>
    </div>
</footer>
<?php
if($autoshowroom_btn_backtotop=='yes'){?>
    <div class="auto-backtotop">
        <i class="fa fa-caret-up"></i>
    </div>
    <?php
}
?>
<?php
if($autoshowroom_btn_quote == 'yes'){?>
    <div class="auto-get-a-quote">
        <a href="<?php echo esc_html($autoshowroom_btn_quote_link); ?>" target="popup" >
            <?php esc_html_e($autoshowroom_btn_quote_title,'autoshowroom');?>
        </a>
    </div>
    <?php
}
?><?php wp_footer(); ?>
</body>
</html>