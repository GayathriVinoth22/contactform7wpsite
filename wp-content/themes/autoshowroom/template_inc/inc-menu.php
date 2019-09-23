<?php
    $autoshowroom_logotype   =   ot_get_option('autoshowroom_logotype','text');
    $autoshowroom_text       =   ot_get_option('autoshowroom_logoText','autoshowroom');
    $autoshowroom_text_color =   ot_get_option('autoshowroom_logoTextcolor','');
    $autoshowroom_img_url    =   ot_get_option('autoshowroom_logo','');

    $autoshowroom_header     =   ot_get_option('autoshowroom_header_type','header1');
    $autoshowroom_top_sidebar=   ot_get_option('autoshowroom_header_sidebar');
    $autoshowroom_h2_logo =   ot_get_option('autoshowroom_header2_logo_position');
    $autoshowroom_menu_fixed =   ot_get_option('autoshowroom_menu_fixed');
    $autoshowroom_header6_addcar =   ot_get_option('autoshowroom_header6_addcar');
    $autoshowroom_header6_link_addcar =   ot_get_option('autoshowroom_header6_link_addcar');
    $autoshowroom_header_menu_cart =   ot_get_option('autoshowroom_header_menu_cart','show');
?>

<?php
$header_class = 'tz-header-1';
switch ($autoshowroom_header):
case 'header1':
$header_class = 'tz-header-1';
break;
case 'header2':
$header_class = 'tz-header-2';
break;
case 'header3':
$header_class = 'tz-header-3'; // if fix header3-fix
break;
case 'header4':
$header_class = 'tz-header-4';
break;
case 'header5':
$header_class = 'tz-header-5';
break;
case 'header6':
$header_class = 'tz-header-6'; // if fix header3-fix
break;
case 'header7':
$header_class = 'tz-header-7'; // if fix header3-fix
break;
endswitch;
$sticky = '';
if($autoshowroom_menu_fixed == 'yes'){
    $sticky = 'tzmenu_fixed';
}

if( $header_class == 'tz-header-1' ) {
?>
<!-- Begin Header 1 -->
<header class="tz-header">

    <?php
    if($autoshowroom_top_sidebar == 'show'):
        if ( is_active_sidebar( 'headertop-left' ) || is_active_sidebar( 'headertop-right' )  ) : ?>
            <div class="tz-top-header ">
                <div class="container">
                    <div class="row">
                        <?php
                        if ( is_active_sidebar( 'headertop-left' )  ) : ?>
                            <div class="col-md-6 tz-top-header-left">
                                <?php dynamic_sidebar( 'headertop-left' ); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ( is_active_sidebar( 'headertop-right' ) ) : ?>
                            <div class="col-md-6 tz-top-header-right">
                                <?php dynamic_sidebar( 'headertop-right' ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="tz-menu-header <?php echo $sticky;?>">
        <div class="container tz-megamenu-wrap">
            <div class="row">
                <div class="col-md-3">
                    <?php
                    if ( is_front_page() ) {
                        echo ('<h1>');
                    }
                        if($autoshowroom_logotype == 0){
                        ?>
                            <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                        <?php
                            echo ('<span class="tz-logo-text">'.esc_html($autoshowroom_text).'</span>');
                            ?></a>
                            <?php
                        }else{
                            if ( isset($autoshowroom_img_url) && !empty( $autoshowroom_img_url ) ) :
                                $logo_ext= wp_check_filetype($autoshowroom_img_url);
                                $logo_file = $logo_ext['ext'];
                                if($logo_file =='svg'){
                                    ?>
                                    <div class="svg_logo" data-href="<?php echo esc_url(get_home_url('/')); ?>">
                                    <object id="svgObject"  type="image/svg+xml" data="<?php echo esc_url($autoshowroom_img_url);?>" class="svg_logo">
                                        <?php echo esc_html_e('Your browser does not support SVG','tz_autoshowroom');?>
                                    </object>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                                    <?php
                                    echo'<img src="'.esc_url($autoshowroom_img_url).'" alt="'.get_bloginfo('title').'" />';
                                    ?></a>
                                    <?php
                                }

                            else :
                            ?>
                            <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                            <?php
                                echo'<img src="'.get_template_directory_uri().'/images/logo.png" alt="'.get_bloginfo('title').'" width="189" height="17" />';
                            ?></a>
                                <?php
                            endif;
                        }
                    if ( is_front_page() ) {
                        echo ('</h1>');
                    }
                    ?>
                </div>
                <div class="col-md-9 tz-megamenu">
                    <nav class="nav-collapse">
                        <?php

                        if ( has_nav_menu('primary') ) :
                            wp_nav_menu( array(
                                'theme_location' => 'primary',
                                'menu_class'     => 'nav navbar-nav tz-nav',
                                'container'      => false
                            ) ) ;
                        endif;

                        ?>
                    </nav>
                    <?php
                    if ($autoshowroom_header_menu_cart=='show' && class_exists( 'WooCommerce')):
                        ?>
                        <div class="tz-header-cart pull-right">
                            <span aria-hidden="true" class="icon_cart_alt"><i class="fas fa-cart-arrow-down"></i></span>
                            <?php
                            if ( class_exists( 'autoshowroom_WC_Widget_Cart' ) ) { the_widget( 'autoshowroom_WC_Widget_Cart' ); }
                            ?>
                        </div>
                        <?php
                    endif;
                    ?>
                </div>
            </div>
        </div><!--end class container-->
    </div>
</header>
<!-- End Header 1 -->
<?php
}
elseif ( $header_class == 'tz-header-2' ) {
    ?>
    <!-- Begin Header 2 -->
    <header class="tz-header tz-header-2 tz-header-2-default">

        <?php
        if($autoshowroom_top_sidebar == 'show'):
            if ( is_active_sidebar( 'headertop-left' ) || is_active_sidebar( 'headertop-right' )  ) : ?>
                <div class="tz-top-header ">
                    <div class="container">
                        <div class="row">
                            <?php
                            if ( is_active_sidebar( 'headertop-left' )  ) : ?>
                                <div class="col-md-6 tz-top-header-left">
                                    <?php dynamic_sidebar( 'headertop-left' ); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ( is_active_sidebar( 'headertop-right' ) ) : ?>
                                <div class="col-md-6 tz-top-header-right">
                                    <?php dynamic_sidebar( 'headertop-right' ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <div class="tz-menu-header <?php echo $sticky;?>">
            <div class="container">
                <div class="header-2-logo" style="top:<?php echo esc_attr($autoshowroom_h2_logo);?>px ">
                    <?php
                    if ( is_front_page() ) {
                        echo ('<h1>');
                    }
                    if($autoshowroom_logotype == 0){
                        ?>
                        <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                            <?php
                            echo ('<span class="tz-logo-text">'.esc_html($autoshowroom_text).'</span>');
                            ?></a>
                        <?php
                    }else{
                        if ( isset($autoshowroom_img_url) && !empty( $autoshowroom_img_url ) ) :
                            $logo_ext= wp_check_filetype($autoshowroom_img_url);
                            $logo_file = $logo_ext['ext'];
                            if($logo_file =='svg'){
                                ?>
                                <div class="svg_logo" data-href="<?php echo esc_url(get_home_url('/')); ?>">
                                    <object id="svgObject"  type="image/svg+xml" data="<?php echo esc_url($autoshowroom_img_url);?>" class="svg_logo">
                                        <?php echo esc_html_e('Your browser does not support SVG','tz_autoshowroom');?>
                                    </object>
                                </div>
                                <?php
                            }else{
                                ?>
                                <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                                    <?php
                                    echo'<img src="'.esc_url($autoshowroom_img_url).'" alt="'.get_bloginfo('title').'" />';
                                    ?></a>
                                <?php
                            }

                        else :
                            ?>
                            <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                                <?php
                                echo'<img src="'.get_template_directory_uri().'/images/logo.png" alt="'.get_bloginfo('title').'" width="189" height="17" />';
                                ?></a>
                            <?php
                        endif;
                    }
                    if ( is_front_page() ) {
                        echo ('</h1>');
                    }
                    ?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <nav class="nav-collapse">
                            <?php

                            if ( has_nav_menu('primary') ) :
                                wp_nav_menu( array(
                                    'theme_location' => 'primary',
                                    'menu_class'     => 'nav navbar-nav tz-nav',
                                    'container'      => false
                                ) ) ;
                            endif;

                            ?>
                        </nav>
                        <?php
                        if ($autoshowroom_header_menu_cart=='show' && class_exists( 'WooCommerce')):
                            ?>
                            <div class="tz-header-cart pull-right">
                                <span aria-hidden="true" class="icon_cart_alt"><i class="fas fa-cart-arrow-down"></i></span>
                                <?php
                                if ( class_exists( 'autoshowroom_WC_Widget_Cart' ) ) { the_widget( 'autoshowroom_WC_Widget_Cart' ); }
                                ?>
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div><!--end class container-->
        </div>
    </header>
    <!-- End Header 2 -->
    <?php
}
elseif ( $header_class == 'tz-header-3' ) {
    ?>
    <!-- Begin Header 1 -->
    <header class="tz-header tz-header-3">

        <?php
        if($autoshowroom_top_sidebar == 'show'):
            if ( is_active_sidebar( 'headertop-left' ) || is_active_sidebar( 'headertop-right' )  ) : ?>
                <div class="tz-top-header ">
                    <div class="container">
                        <div class="row">
                            <?php
                            if ( is_active_sidebar( 'headertop-left' )  ) : ?>
                                <div class="col-md-6 tz-top-header-left">
                                    <?php dynamic_sidebar( 'headertop-left' ); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ( is_active_sidebar( 'headertop-right' ) ) : ?>
                                <div class="col-md-6 tz-top-header-right">
                                    <?php dynamic_sidebar( 'headertop-right' ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <div class="tz-menu-header <?php echo $sticky;?>">
            <div class="container tz-megamenu-wrap">

                <div class="row">
                    <div class="col-md-3">
                        <?php
                        if ( is_front_page() ) {
                            echo ('<h1>');
                        }
                        if($autoshowroom_logotype == 0){
                            ?>
                            <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                                <?php
                                echo ('<span class="tz-logo-text">'.esc_html($autoshowroom_text).'</span>');
                                ?></a>
                            <?php
                        }else{
                            if ( isset($autoshowroom_img_url) && !empty( $autoshowroom_img_url ) ) :
                                $logo_ext= wp_check_filetype($autoshowroom_img_url);
                                $logo_file = $logo_ext['ext'];
                                if($logo_file =='svg'){
                                    ?>
                                    <div class="svg_logo" data-href="<?php echo esc_url(get_home_url('/')); ?>">
                                        <object id="svgObject"  type="image/svg+xml" data="<?php echo esc_url($autoshowroom_img_url);?>" class="svg_logo">
                                            <?php echo esc_html_e('Your browser does not support SVG','tz_autoshowroom');?>
                                        </object>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                                        <?php
                                        echo'<img src="'.esc_url($autoshowroom_img_url).'" alt="'.get_bloginfo('title').'" />';
                                        ?></a>
                                    <?php
                                }

                            else :
                                ?>
                                <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                                    <?php
                                    echo'<img src="'.get_template_directory_uri().'/images/logo.png" alt="'.get_bloginfo('title').'" width="189" height="17" />';
                                    ?></a>
                                <?php
                            endif;
                        }
                        if ( is_front_page() ) {
                            echo ('</h1>');
                        }
                        ?>
                    </div>
                    <div class="col-md-9 tz-megamenu">
                        <nav class="nav-collapse">
                            <?php

                            if ( has_nav_menu('primary') ) :
                                wp_nav_menu( array(
                                    'theme_location' => 'primary',
                                    'menu_class'     => 'nav navbar-nav tz-nav',
                                    'container'      => false
                                ) ) ;
                            endif;

                            ?>
                        </nav>
                        <?php
                        if ($autoshowroom_header_menu_cart=='show' && class_exists( 'WooCommerce')):
                            ?>
                            <div class="tz-header-cart pull-right">
                                <span aria-hidden="true" class="icon_cart_alt"><i class="fas fa-cart-arrow-down"></i></span>
                                <?php
                                if ( class_exists( 'autoshowroom_WC_Widget_Cart' ) ) { the_widget( 'autoshowroom_WC_Widget_Cart' ); }
                                ?>
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div><!--end class container-->
        </div>
    </header>
    <!-- End Header 1 -->

    <?php
}
elseif ( $header_class == 'tz-header-4' ) {
    ?>
    <!-- Begin Header 4 -->
    <header class="tz-header tz-header-3 tz-header-4">

        <?php
        if($autoshowroom_top_sidebar == 'show'):
            if ( is_active_sidebar( 'headertop-left' ) || is_active_sidebar( 'headertop-right' )  ) : ?>
                <div class="tz-top-header">
                    <div class="container">
                        <div class="row">
                            <?php
                            if ( is_active_sidebar( 'headertop-left' )  ) : ?>
                                <div class="col-md-6 tz-top-header-left">
                                    <?php dynamic_sidebar( 'headertop-left' ); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ( is_active_sidebar( 'headertop-right' ) ) : ?>
                                <div class="col-md-6 tz-top-header-right">
                                    <?php dynamic_sidebar( 'headertop-right' ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <div class="tz-menu-header <?php echo $sticky;?>">
            <div class="container tz-megamenu-wrap">

                <div class="row">
                    <div class="col-md-3">
                        <?php
                        if ( is_front_page() ) {
                            echo ('<h1>');
                        }
                        if($autoshowroom_logotype == 0){
                            ?>
                            <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                                <?php
                                echo ('<span class="tz-logo-text">'.esc_html($autoshowroom_text).'</span>');
                                ?></a>
                            <?php
                        }else{
                            if ( isset($autoshowroom_img_url) && !empty( $autoshowroom_img_url ) ) :
                                $logo_ext= wp_check_filetype($autoshowroom_img_url);
                                $logo_file = $logo_ext['ext'];
                                if($logo_file =='svg'){
                                    ?>
                                    <div class="svg_logo" data-href="<?php echo esc_url(get_home_url('/')); ?>">
                                        <object id="svgObject"  type="image/svg+xml" data="<?php echo esc_url($autoshowroom_img_url);?>" class="svg_logo">
                                            <?php echo esc_html_e('Your browser does not support SVG','tz_autoshowroom');?>
                                        </object>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                                        <?php
                                        echo'<img src="'.esc_url($autoshowroom_img_url).'" alt="'.get_bloginfo('title').'" />';
                                        ?></a>
                                    <?php
                                }

                            else :
                                ?>
                                <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                                    <?php
                                    echo'<img src="'.get_template_directory_uri().'/images/logo.png" alt="'.get_bloginfo('title').'" width="189" height="17" />';
                                    ?></a>
                                <?php
                            endif;
                        }
                        if ( is_front_page() ) {
                            echo ('</h1>');
                        }
                        ?>
                    </div>
                    <div class="col-md-9 tz-megamenu">
                        <nav class="nav-collapse">
                            <?php

                            if ( has_nav_menu('primary') ) :
                                wp_nav_menu( array(
                                    'theme_location' => 'primary',
                                    'menu_class'     => 'nav navbar-nav tz-nav',
                                    'container'      => false
                                ) ) ;
                            endif;

                            ?>
                        </nav>
                        <?php
                        if ($autoshowroom_header_menu_cart=='show' && class_exists( 'WooCommerce')):
                            ?>
                            <div class="tz-header-cart pull-right">
                                <span aria-hidden="true" class="icon_cart_alt"><i class="fas fa-cart-arrow-down"></i></span>
                                <?php
                                if ( class_exists( 'autoshowroom_WC_Widget_Cart' ) ) { the_widget( 'autoshowroom_WC_Widget_Cart' ); }
                                ?>
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div><!--end class container-->
        </div>
    </header>
    <!-- End Header 4 -->

    <?php
}
elseif ( $header_class == 'tz-header-5' ) {
    ?>
    <!-- Begin Header 5 -->
    <header class="tz-header tz-header-3 tz-header-5">
        <div class="tz-menu-header <?php echo $sticky; ?>">
            <div class="container">
                <div class="tz-megamenu-wrap">
                    <div class="row">
                        <div class="header-5-logo col-md-2">
                            <?php
                            if (is_front_page()) {
                                echo('<h1>');
                            }
                            if($autoshowroom_logotype == 0){
                                ?>
                                <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                                    <?php
                                    echo ('<span class="tz-logo-text">'.esc_html($autoshowroom_text).'</span>');
                                    ?></a>
                                <?php
                            }else{
                                if ( isset($autoshowroom_img_url) && !empty( $autoshowroom_img_url ) ) :
                                    $logo_ext= wp_check_filetype($autoshowroom_img_url);
                                    $logo_file = $logo_ext['ext'];
                                    if($logo_file =='svg'){
                                        ?>
                                        <div class="svg_logo" data-href="<?php echo esc_url(get_home_url('/')); ?>">
                                            <object id="svgObject"  type="image/svg+xml" data="<?php echo esc_url($autoshowroom_img_url);?>" class="svg_logo">
                                                <?php echo esc_html_e('Your browser does not support SVG','tz_autoshowroom');?>
                                            </object>
                                        </div>
                                        <?php
                                    }else{
                                        ?>
                                        <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                                            <?php
                                            echo'<img src="'.esc_url($autoshowroom_img_url).'" alt="'.get_bloginfo('title').'" />';
                                            ?></a>
                                        <?php
                                    }

                                else :
                                    ?>
                                    <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                                        <?php
                                        echo'<img src="'.get_template_directory_uri().'/images/logo.png" alt="'.get_bloginfo('title').'" width="189" height="17" />';
                                        ?></a>
                                    <?php
                                endif;
                            }
                            if (is_front_page()) {
                                echo('</h1>');
                            }
                            ?>
                        </div>
                        <div class="col-md-10 tz-megamenu">
                            <?php
                            if ($autoshowroom_top_sidebar == 'show'):
                                if (is_active_sidebar('headertop-left') || is_active_sidebar('headertop-right')) : ?>
                                    <div class="tz-top-header">
                                        <?php if (is_active_sidebar('headertop-right')) : ?>
                                            <div class="tz-top-header-right">
                                                <?php dynamic_sidebar('headertop-right'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <nav class="nav-collapse">
                                <?php
                                if ( has_nav_menu('primary') ) :
                                    wp_nav_menu( array(
                                        'theme_location' => 'primary',
                                        'menu_class'     => 'nav navbar-nav tz-nav',
                                        'container'      => false
                                    ) ) ;
                                endif;
                                ?>
                            </nav>
                            <?php
                            if ($autoshowroom_header_menu_cart=='show' && class_exists( 'WooCommerce')):
                                ?>
                                <div class="tz-header-cart pull-right">
                                    <span aria-hidden="true" class="icon_cart_alt"><i class="fas fa-cart-arrow-down"></i></span>
                                    <?php
                                    if ( class_exists( 'autoshowroom_WC_Widget_Cart' ) ) { the_widget( 'autoshowroom_WC_Widget_Cart' ); }
                                    ?>
                                </div>
                                <?php
                            endif;
                            ?>
                        </div>
                    </div>
                </div><!--end class container-->
            </div>
        </div>
    </header>
    <!-- End Header 5 -->
    <?php
}
elseif( $header_class == 'tz-header-6' ) {
    ?>
    <!-- Begin Header 6 -->
    <header class="tz-header tz-header-6">

        <?php
        if($autoshowroom_top_sidebar == 'show'):
            if ( is_active_sidebar( 'headertop-left' ) || is_active_sidebar( 'headertop-right' )  ) : ?>
                <div class="tz-top-header">
                    <div class="container">
                        <div class="row">
                            <?php
                            if ( is_active_sidebar( 'headertop-left' )  ) : ?>
                                <div class="col-md-6 tz-top-header-left">
                                    <?php dynamic_sidebar( 'headertop-left' ); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ( is_active_sidebar( 'headertop-right' ) ) : ?>
                                <div class="col-md-6 tz-top-header-right">
                                    <?php dynamic_sidebar( 'headertop-right' ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <div class="tz-menu-header <?php echo $sticky;?>">
            <div class="container tz-megamenu-wrap">
                <div class="row">
                    <div class="col-md-3">
                        <?php
                        if ( is_front_page() ) {
                            echo ('<h1>');
                        }
                        if($autoshowroom_logotype == 0){
                            ?>
                            <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                                <?php
                                echo ('<span class="tz-logo-text">'.esc_html($autoshowroom_text).'</span>');
                                ?></a>
                            <?php
                        }else{
                            if ( isset($autoshowroom_img_url) && !empty( $autoshowroom_img_url ) ) :
                                $logo_ext= wp_check_filetype($autoshowroom_img_url);
                                $logo_file = $logo_ext['ext'];
                                if($logo_file =='svg'){
                                    ?>
                                    <div class="svg_logo" data-href="<?php echo esc_url(get_home_url('/')); ?>">
                                        <object id="svgObject"  type="image/svg+xml" data="<?php echo esc_url($autoshowroom_img_url);?>" class="svg_logo">
                                            <?php echo esc_html_e('Your browser does not support SVG','tz_autoshowroom');?>
                                        </object>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                                        <?php
                                        echo'<img src="'.esc_url($autoshowroom_img_url).'" alt="'.get_bloginfo('title').'" />';
                                        ?></a>
                                    <?php
                                }

                            else :
                                ?>
                                <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                                    <?php
                                    echo'<img src="'.get_template_directory_uri().'/images/logo.png" alt="'.get_bloginfo('title').'" width="189" height="17" />';
                                    ?></a>
                                <?php
                            endif;
                        }
                        if ( is_front_page() ) {
                            echo ('</h1>');
                        }
                        ?>
                    </div>
                    <div class="col-md-7 tz-megamenu">
                        <nav class="nav-collapse">
                            <?php
                            if ( has_nav_menu('primary') ) :
                                wp_nav_menu( array(
                                    'theme_location' => 'primary',
                                    'menu_class'     => 'nav navbar-nav tz-nav',
                                    'container'      => false
                                ) ) ;
                            endif;
                            ?>
                        </nav>
                        <?php
                        if ($autoshowroom_header_menu_cart=='show' && class_exists( 'WooCommerce')):
                            ?>
                            <div class="tz-header-cart pull-right">
                                <span aria-hidden="true" class="icon_cart_alt"><i class="fas fa-cart-arrow-down"></i></span>
                                <?php
                                if ( class_exists( 'autoshowroom_WC_Widget_Cart' ) ) { the_widget( 'autoshowroom_WC_Widget_Cart' ); }
                                ?>
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
                    <?php if($autoshowroom_header6_addcar == 'show'){ ?>
                    <div class="col-md-2">
                        <a href="<?php echo esc_attr($autoshowroom_header6_link_addcar); ?>" class="tz-add-car">
                            <i class="fa fa-plus-circle"></i>
                            <?php esc_html_e('Add your Item','tz-autoshowroom'); ?>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div><!--end class container-->
        </div>
    </header>
    <!-- End Header 6 -->
    <?php
}elseif( $header_class == 'tz-header-7' ) {
    $autoshowroom_header7_account = ot_get_option('autoshowroom_header7_account','show');
    $autoshowroom_header7_phone = ot_get_option('autoshowroom_header7_phone','+1-888-335-3567');
    $autoshowroom_header7_email = ot_get_option('autoshowroom_header7_email','info@templaza.com');
    $autoshowroom_header7_hour = ot_get_option('autoshowroom_header7_hour','Mon - Fri: 08 am - 10 pm');
    ?>
    <!-- Begin Header 7 -->
    <header class="tz-header tz-header-7">
        <div class="tz-top-header <?php echo esc_attr($header_style_class); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-3 col-xs-12">
                        <?php
                        if ( is_front_page() ) {
                            echo ('<h1>');
                        }
                        if($autoshowroom_logotype == 0){
                            ?>
                            <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                                <?php
                                echo ('<span class="tz-logo-text">'.esc_html($autoshowroom_text).'</span>');
                                ?></a>
                            <?php
                        }else{
                            if ( isset($autoshowroom_img_url) && !empty( $autoshowroom_img_url ) ) :
                                $logo_ext= wp_check_filetype($autoshowroom_img_url);
                                $logo_file = $logo_ext['ext'];
                                if($logo_file =='svg'){
                                    ?>
                                    <div class="svg_logo" data-href="<?php echo esc_url(get_home_url('/')); ?>">
                                        <object id="svgObject"  type="image/svg+xml" data="<?php echo esc_url($autoshowroom_img_url);?>" class="svg_logo">
                                            <?php echo esc_html_e('Your browser does not support SVG','tz_autoshowroom');?>
                                        </object>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                                        <?php
                                        echo'<img src="'.esc_url($autoshowroom_img_url).'" alt="'.get_bloginfo('title').'" />';
                                        ?></a>
                                    <?php
                                }

                            else :
                                ?>
                                <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                                    <?php
                                    echo'<img src="'.get_template_directory_uri().'/images/logo.png" alt="'.get_bloginfo('title').'" width="189" height="17" />';
                                    ?></a>
                                <?php
                            endif;
                        }
                        if ( is_front_page() ) {
                            echo ('</h1>');
                        }
                        ?>
                    </div>
                    <div class="col-md-7 col-sm-9 col-xs-12 tz-info">
                        <div class="item phone">
                            <i class="fa fa-phone"></i>
                            <small><?php echo esc_html__('CALL US:'); ?></small>
                            <span><?php echo esc_html($autoshowroom_header7_phone); ?></span>
                        </div>
                        <div class="item email">
                            <i class="fa fa-envelope"></i>
                            <small><?php echo esc_html__('MAIL US:'); ?></small>
                            <span><?php echo esc_html($autoshowroom_header7_email); ?></span>
                        </div>
                        <div class="item hour">
                            <i class="fa fa-clock-o"></i>
                            <small><?php echo esc_html__('OPENING HOURS:'); ?></small>
                            <span><?php echo esc_html($autoshowroom_header7_hour); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tz-menu-header <?php echo $sticky;?>">
            <div class="container tz-megamenu-wrap">
                <div class="row">
                    <div class="col-md-9 col-sm-9 col-xs-12 tz-megamenu">
                        <nav class="nav-collapse">
                            <?php
                            if ( has_nav_menu('primary') ) :
                                wp_nav_menu( array(
                                    'theme_location' => 'primary',
                                    'menu_class'     => 'nav navbar-nav tz-nav',
                                    'container'      => false
                                ) ) ;
                            endif;
                            ?>
                        </nav>
                        <?php
                        if ($autoshowroom_header_menu_cart=='show' && class_exists( 'WooCommerce')):
                            ?>
                            <div class="tz-header-cart pull-right">
                                <span aria-hidden="true" class="icon_cart_alt"><i class="fas fa-cart-arrow-down"></i></span>
                                <?php
                                if ( class_exists( 'autoshowroom_WC_Widget_Cart' ) ) { the_widget( 'autoshowroom_WC_Widget_Cart' ); }
                                ?>
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
                    <?php if ($autoshowroom_header7_account == 'show'){ ?>
                        <div class="col-md-3 col-sm-3 col-xs-12 tz-account">
                            <?php global $current_user; wp_get_current_user(); ?>
                            <a href="<?php echo get_edit_user_link($current_user->ID);?>" class="tz-add-car">
                                <i class="fa fa-user-circle"></i>
                                <?php if ( is_user_logged_in() ) {
                                    echo $current_user->user_login;
                                } else {
                                    esc_html_e('My Account','tz-autoshowroom'); } ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div><!--end class container-->
        </div>
    </header>
    <!-- End Header 7 -->
    <?php
}