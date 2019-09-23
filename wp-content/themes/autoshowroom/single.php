<?php get_header();

//  Single options show hide
$autoshowroom_blog_sidebar        =   ot_get_option('autoshowroom_singlesidebar',1);
$autoshowroom_blog_title          =   ot_get_option('autoshowroom_blog_title',1);
$autoshowroom_blog_date           =   ot_get_option('autoshowroom_tzshowdate',1);
$autoshowroom_blog_comment        =   ot_get_option('autoshowroom_tzshowcomment',1);
$autoshowroom_blog_view           =   ot_get_option('autoshowroom_blog_view',1);
$autoshowroom_blog_category       =   ot_get_option('autoshowroom_tzshowcategory',1);
$autoshowroom_blog_media          =   ot_get_option('autoshowroom_tzmedia',1);
$autoshowroom_blog_excerpt        =   ot_get_option('autoshowroom_blog_excerpt',1);
$autoshowroom_blog_share          =   ot_get_option('autoshowroom_tzshowshare',1);
$autoshowroom_tzshowauthor          =   ot_get_option('autoshowroom_tzshowauthor',1);
$autoshowroom_tzshowrecent          =   ot_get_option('autoshowroom_tzshowrecent',1);
$autoshowroom_blog_class = 'autoshowroom-blog-body';
if($autoshowroom_blog_sidebar == '1' || $autoshowroom_blog_sidebar == '0'){
    $autoshowroom_blog_class .= ' col-md-9';
}else{
    $autoshowroom_blog_class .= ' col-md-12';
}

?>
<?php get_template_part('template_inc/inc','menu'); ?>
<?php get_template_part('template_inc/inc','title-breadcrumb'); ?>
<div class="autoshowroom-blog">
    <div class="container">
        <div class="row">
            <?php
            if($autoshowroom_blog_sidebar == '0'){
                get_sidebar();
            }
            ?>
            <div class="<?php echo esc_attr($autoshowroom_blog_class);?> autoshowroom-blog-body">
                <?php
                if ( have_posts() ) : while (have_posts()) : the_post() ;
                    tz_autoshowroom_setPostViews(get_the_ID());
                    $autoshowroom_comment_count  = wp_count_comments(get_the_ID());
                    $autoshowroom_class_icon = '';
                    if(has_post_format('gallery')){
                        $autoshowroom_class_icon = 'fa-picture-o';
                    }elseif(has_post_format('video')){
                        $autoshowroom_class_icon = 'fa-play';
                    }elseif(has_post_format('audio')){
                        $autoshowroom_class_icon = 'fa-soundcloud';
                    }elseif(has_post_format('link')){
                        $autoshowroom_class_icon = 'fa-link';
                    }elseif(has_post_format('quote')){
                        $autoshowroom_class_icon = 'fa-commenting-o';
                    }else{
                        $autoshowroom_class_icon = 'fa-camera-retro';
                    }
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="autoshowroom-blog-item-wrap">
                            <div class="autoshowroom-blog-item-icon">
                                <i class="fa <?php echo esc_attr($autoshowroom_class_icon);?>"></i>
                            </div>
                            <div class="autoshowroom-blog-item-content">
                                <?php if($autoshowroom_blog_title == 1):?>
                                    <?php if(has_post_format('quote')):
                                        $autoshowroom_quote_name = get_post_meta( $post->ID, '_format_quote_source_name', true );
                                        $autoshowroom_quote_url = get_post_meta( $post->ID, '_format_quote_source_url', true );
                                        ?>
                                        <h3 class="autoshowroom-blog-item-title"><a href="<?php echo esc_url($autoshowroom_quote_url);?>"><?php echo esc_html($autoshowroom_quote_name);?></a></h3>
                                    <?php else: ?>
                                        <h3 class="autoshowroom-blog-item-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                                    <?php endif; ?>
                                <?php endif;?>
                                <div class="autoshowroom-blog-item-Info">

                                    <?php if($autoshowroom_blog_date == 1):?>
                                        <span><i class="fa fa-calendar"></i><?php echo esc_attr(get_the_date());?></span>
                                        <small>/</small>
                                    <?php endif;?>

                                    <?php if($autoshowroom_blog_comment == 1):?>
                                        <span><i class="fa fa-comment-o"></i><?php echo esc_html($autoshowroom_comment_count ->total_comments).' Comments';?></span>
                                        <small>/</small>
                                    <?php endif;?>
                                    <?php if($autoshowroom_blog_view == 1):?>
                                        <span><i class="fa fa-heart-o"></i><?php echo balanceTags(tz_autoshowroom_getPostViews(get_the_ID()));?></span>
                                        <small>/</small>
                                    <?php endif; ?>
                                    <?php
                                    if(get_the_category() !=false && $autoshowroom_blog_category == 1){
                                        ?>
                                        <span class="tzcategory">
                                            <i class="fa fa-folder-o"></i>
                                            <?php
                                            the_category(', ');
                                            ?>
                                        </span>
                                    <?php } ?>
                                </div>
                                <?php if(!has_post_format('link') && !has_post_format('quote')): ?>
                                    <?php if(has_post_format('gallery')) : ?>
                                        <?php if($autoshowroom_blog_media == 1):?>
                                            <?php $autoshowroom_gallery = get_post_meta( $post->ID, '_format_gallery_images', true ); ?>

                                            <?php if($autoshowroom_gallery) : ?>
                                                <div class="autoshowroom-gallery-flexslider">
                                                    <ul class="slides">
                                                        <?php foreach($autoshowroom_gallery as $autoshowroom_image) : ?>

                                                            <?php $autoshowroom_image_src = wp_get_attachment_image_src( $autoshowroom_image, 'large' ); ?>
                                                            <?php $autoshowroom_caption = get_post_field('post_excerpt', $autoshowroom_image); ?>
                                                            <li><img src="<?php echo esc_url($autoshowroom_image_src[0]); ?>" <?php if($autoshowroom_caption) : ?>title="<?php echo esc_attr($autoshowroom_caption); ?>"<?php endif; ?> /></li>

                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif;?>
                                    <?php elseif(has_post_format('video')) : ?>
                                        <?php if($autoshowroom_blog_media == 1):?>
                                            <?php $autoshowroom_video = get_post_meta( $post->ID, '_format_video_embed', true ); ?>
                                            <?php
                                            if($autoshowroom_video != ''):
                                                ?>
                                                <div class="autoshowroom-blog-item-video">
                                                    <?php if(wp_oembed_get( $autoshowroom_video )) : ?>
                                                        <?php echo wp_oembed_get($autoshowroom_video); ?>
                                                    <?php else : ?>
                                                        <?php echo balanceTags($autoshowroom_video); ?>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif;?>
                                        <?php endif;?>
                                    <?php elseif(has_post_format('audio')) : ?>
                                        <?php if($autoshowroom_blog_media == 1):?>
                                            <?php $autoshowroom_audio = get_post_meta( $post->ID, '_format_audio_embed', true ); ?>
                                            <?php if($autoshowroom_audio != ''): ?>
                                                <div class="autoshowroom-blog-item-audio">
                                                    <?php if(wp_oembed_get( $autoshowroom_audio )) : ?>
                                                        <?php echo wp_oembed_get($autoshowroom_audio); ?>
                                                    <?php else : ?>
                                                        <?php echo balanceTags($autoshowroom_audio); ?>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php if($autoshowroom_blog_media == 1):?>
                                            <div class="autoshowroom-blog-item-img">
                                                <?php the_post_thumbnail(); ?>
                                            </div>
                                        <?php endif;?>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if($autoshowroom_blog_share==1){ ?>
                                <div class="autoshowroom-single-share">
                                    <div class="autoshowroom-single-share-box">
                                        <div class="autoshowroom-single-share-item">
                                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook"></i></a>
                                            <span><?php esc_html_e('Facebook It','autoshowroom');?></span>
                                        </div>

                                        <div class="autoshowroom-single-share-item">
                                            <a target="_blank" href="https://twitter.com/home?status=Check%20out%20this%20article:%20<?php print tz_autoshowroom_social_title( get_the_title() ); ?>%20-%20<?php echo urlencode(the_permalink()); ?>"><i class="fa fa-twitter"></i></a>
                                            <span><?php esc_html_e('Tweet It','autoshowroom');?></span>
                                        </div>

                                        <div class="autoshowroom-single-share-item">
                                            <?php $autoshowroom_pin_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID())); ?>
                                            <a data-pin-do="skipLink" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_attr($autoshowroom_pin_image); ?>&description=<?php the_title(); ?>"><i class="fa fa-pinterest"></i></a>
                                            <span><?php esc_html_e('Pinterest It','autoshowroom');?></span>
                                        </div>

                                        <div class="autoshowroom-single-share-item">
                                            <a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a>
                                            <span><?php esc_html_e('Google Plus It','autoshowroom');?></span>
                                        </div>

                                    </div>
                                </div>
                                <?php } ?>

                                <?php
                                if(!has_post_format('link') && !has_post_format('quote')):
                                    if($autoshowroom_blog_excerpt == 1):
                                        the_content();
                                        wp_link_pages();
                                    endif;
                                    ?>
                                <?php else: ?>
                                    <?php if(has_post_format('link')) : ?>
                                        <?php if($autoshowroom_blog_excerpt == 1):?>
                                            <div class="autoshowroom-blog-item-link">
                                                <?php $autoshowroom_link = get_post_meta( $post->ID, '_format_link_url', true ); ?>
                                                <a target="_blank" title="<?php the_title();?>" href="<?php echo esc_url($autoshowroom_link);?>">
                                                    <?php echo esc_html($autoshowroom_link);?>
                                                </a>
                                            </div>
                                        <?php endif;?>
                                    <?php elseif(has_post_format('quote')):?>
                                        <?php if($autoshowroom_blog_excerpt == 1):?>
                                            <div class="autoshowroom-blog-item-quote">
                                                <?php
                                                the_content();
                                                wp_link_pages();
                                                ?>
                                            </div>
                                        <?php endif;?>
                                    <?php endif;?>
                                <?php endif;?>
                                <?php
                                if(get_the_tags() != false){
                                    ?>
                                    <div class="autoshowroom-meta-tags">
                                        <i class="fa fa-tags"></i>
                                        <?php
                                        the_tags('',', ');
                                        ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </article>
                    <?php
                endwhile; // end while ( have_posts )
                endif; // end if ( have_posts )
                ?>
                <?php if($autoshowroom_tzshowauthor ==1){?>
                <div class="autoshowroom-single-author">
                    <div class="autoshowroom-single-author-wrap">
                        <div class="autoshowroom-single-author-icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="autoshowroom-single-author-info">
                            <div class="autoshowroom-single-author-left">
                                <div class="autoshowroom-single-author-img">
                                    <?php echo balanceTags(get_avatar( get_the_author_meta('ID'),159)); ?>
                                </div>
                            </div>
                            <div class="autoshowroom-single-author-right">
                                <h3><a href="<?php echo balanceTags(get_author_posts_url(get_the_author_meta('ID')));?>"><?php the_author();?></a></h3>
                                <p><?php the_author_meta('description'); ?></p>
                                <?php
                                $autoshowroom_twitter    =  get_the_author_meta('twitter');
                                $autoshowroom_facebook   =  get_the_author_meta('facebook');
                                $autoshowroom_gplus      =  get_the_author_meta('gplus');
                                $autoshowroom_dribbble   =  get_the_author_meta('dribbble');
                                $autoshowroom_linkedin   =  get_the_author_meta('linkedin');
                                ?>
                                <span class="autoshowroom-author-social">
                                    <?php
                                    if(isset($autoshowroom_facebook) && !empty($autoshowroom_facebook)){
                                        ?>
                                        <a href="<?php echo esc_url($autoshowroom_facebook);?>" target="_blank">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if(isset($autoshowroom_twitter) && !empty($autoshowroom_twitter)){
                                        ?>
                                        <a href="<?php echo esc_url($autoshowroom_twitter);?>" target="_blank">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if(isset($autoshowroom_linkedin) && !empty($autoshowroom_linkedin)){
                                        ?>
                                        <a href="<?php echo esc_url($autoshowroom_linkedin);?>" target="_blank">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if(isset($autoshowroom_dribbble) && !empty($autoshowroom_dribbble)){
                                        ?>
                                        <a href="<?php echo esc_url($autoshowroom_dribbble);?>" target="_blank">
                                            <i class="fa fa-dribbble"></i>
                                        </a>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if(isset($autoshowroom_gplus) && !empty($autoshowroom_gplus)){
                                        ?>
                                        <a href="<?php echo esc_url($autoshowroom_gplus);?>" target="_blank">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php if($autoshowroom_tzshowrecent ==1){ ?>
                <div class="autoshowroom-might-also-like">
                    <div class="autoshowroom-might-also-like-wrap">
                        <div class="autoshowroom-might-also-like-icon">
                            <i class="fa fa-th-list"></i>
                        </div>
                        <div class="autoshowroom-might-also-like-content">
                            <h3 class="autoshowroom-might-also-like-title"><?php esc_html_e('You Might Also Like','autoshowroom');?></h3>
                            <?php

                            $autoshowroom_categories = get_the_category();
                            if($autoshowroom_categories[0]):
                            $autoshowroom_cate = $autoshowroom_categories[0]->cat_ID;
                            $autoshowroom_args = array(
                                'cat'               =>  $autoshowroom_cate,
                                'post__not_in'      => array($post->ID),
                                'posts_per_page'    => 3,
                                'orderby'           => 'date',
                                'order'             => 'desc',
                            );
                            $autoshowroom_also_like_query = null;
                            $autoshowroom_also_like_query = new WP_Query($autoshowroom_args);
                            if($autoshowroom_also_like_query -> have_posts()):
                            ?>
                            <div class="autoshowroom-might-also-like-post">
                                <?php
                                while($autoshowroom_also_like_query -> have_posts()): $autoshowroom_also_like_query -> the_post();
                                    ?>
                                    <div class="autoshowroom-might-also-like-item">
                                        <div class="autoshowroom-might-also-like-image">
                                            <?php the_post_thumbnail();?>
                                        </div>
                                        <div class="autoshowroom-might-also-like-info">
                                            <h6><a href="<?php the_permalink();?>"><?php the_title();?></a></h6>
                                            <span class="autoshowroom-might-also-like-date">
                                                <?php echo esc_attr(get_the_date());?>
                                            </span>
                                        </div>
                                    </div>
                                    <?php
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                            <?php
                                endif;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php if($autoshowroom_blog_comment ==1){ ?>
                <div class="autoshowroom-comment">
                    <div class="autoshowroom-comment-wrap">
                        <div class="autoshowroom-comment-icon">
                            <i class="fa fa-commenting-o"></i>
                        </div>
                        <div class="autoshowroom-comment-content">
                            <?php comments_template( '', true ); ?>
                        </div>
                    </div>
                </div><!-- end comments -->
                <?php } ?>

                <div class="autoshowroom-blog-pagenavi">
                    <?php if ( have_posts() ): ?>
                        <div class="autoshowroom-blog-back">
                            <i class="fa fa-chevron-up"></i>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php
            if($autoshowroom_blog_sidebar == '1'){
                get_sidebar();
            }
            ?>
        </div>
    </div>
</div>
<?php get_template_part('template_inc/inc','contact'); ?>
<?php
get_footer();
?>

