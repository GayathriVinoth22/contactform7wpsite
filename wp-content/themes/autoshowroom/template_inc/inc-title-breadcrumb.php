<div class="autoshowroom-title-breadcrumb">
    <?php
    $autoshowroom_banner = ot_get_option('autoshowroom_banner','yes');
    $autoshowroom_breadcrumb = ot_get_option('autoshowroom_breadcrumb','yes');
    $autoshowroom_background_title = '';
	$vehicle_type = get_query_var( 'post_type' );
	$term_slug = get_query_var( 'term' );
	$taxonomyName = get_query_var( 'taxonomy' );
	$current_term = get_term_by( 'slug', $term_slug, $taxonomyName );
    $vehicle_single = is_single();

    if(is_category() || is_single()|| is_author() || is_search() || is_tag() || is_home() || is_404() || is_archive()){
        $autoshowroom_background_title    =   ot_get_option('autoshowroom_breadcrumb_imagebg');
    }elseif(is_page()){
        $autoshowroom_background_title    =  get_post_meta( get_the_ID(),'autoshowroom_page_title_image', true ) ;
    }

    $autoshowroom_style = '';
    if($autoshowroom_background_title != ''){
        $autoshowroom_style = 'style=background-image:url('.esc_attr($autoshowroom_background_title).')';
    }
    ?>
    <?php if($autoshowroom_banner=='yes'){ ?>
    <div class="autoshowroom-page-title" <?php echo esc_attr($autoshowroom_style);?>>
        <div class="autoshowroom-page-title-overlay">
            <div class="container">
                <div class="autoshowroom-page-title-content">
                    <h1>
                        <?php
						if($taxonomyName=='vehicle_type' || $taxonomyName=='make' || $taxonomyName=='model'){
							echo $current_term->name;
						}elseif( class_exists('WooCommerce') && is_woocommerce()){
                            if(is_product()){
                                the_title();
                            }else{
                                woocommerce_page_title();
                            }
                        }elseif($vehicle_type=='vehicle' && $vehicle_single==''){
                            echo esc_html__('Inventory','autoshowroom');
                        }else{
                            if(is_category()){
                                single_cat_title();
                            }elseif(is_author()){
                                the_author();
                            }elseif(is_search()){
                                echo get_search_query();
                            }elseif(is_tag()){
                                echo single_tag_title();
                            }elseif(is_home()){
                                single_post_title();
                            }elseif(is_404()){
                                echo  esc_html__('Error 404 - Page Not Found','autoshowroom');
                            }elseif(is_archive()){
                                if ( is_day() ) :
                                    printf(  esc_html__( 'Archives %s', 'autoshowroom'), '<span>' . get_the_date() . '</span>' );
                                elseif ( is_month() ) :
                                    printf(  esc_html__( 'Archives %s', 'autoshowroom'), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'autoshowroom') . '</span>' ));
                                elseif ( is_year() ) :
                                    printf(  esc_html__( 'Archives %s', 'autoshowroom'), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'autoshowroom') . '</span>' ));
                                else :
                                    esc_html_e( 'Archives', 'autoshowroom' );
                                endif;
                            }else{
                                the_title();
                            }
                        }
                        ?>
                    </h1>
                </div>
            </div><!-- end class container -->
        </div>
    </div>
    <?php } ?>
    <?php if($autoshowroom_breadcrumb=='yes'){ ?>
    <div class="autoshowroom-breadcrumb">
        <div class="container">
            <div class="autoshowroom-breadcrumb-navxt">
                <!--Breadcrumbs-->
                <?php if(function_exists('bcn_display'))
                {
                    bcn_display();
                }?>
                <!--End breadcrumbs-->
            </div>
        </div>
    </div>
    <?php } ?>
</div><!-- end class tzbreadcrumb -->