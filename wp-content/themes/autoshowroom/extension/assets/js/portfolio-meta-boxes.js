/*global jQuery: false, themeprefix: false */

jQuery(function(){
  "use strict";

  var $type_value = jQuery('#autoshowroom_portfolio_type').val();
  switch ($type_value) {
      case 'floating':
          jQuery('#setting_autoshowroom_portfolio_floating').slideDown();
          jQuery('#setting_autoshowroom_portfolio_slideshows_style').slideUp();
          jQuery('#setting_autoshowroom_portfolio_slideshows').slideUp();
          jQuery('#setting_autoshowroom_portfolio_video_mp4').slideUp();
          jQuery('#setting_autoshowroom_portfolio_video_ogv').slideUp();
          jQuery('#setting_autoshowroom_portfolio_video_webm').slideUp();
          jQuery('#setting_autoshowroom_portfolio_gallery').slideUp();
          jQuery('#setting_autoshowroom_portfolio_soundCloud_id').slideUp();
          jQuery('#setting_autoshowroom_portfolio_Quote_content').slideUp();
          jQuery('#setting_autoshowroom_portfolio_Quote_ds').slideUp();
          jQuery('#setting_autoshowroom_portfolio_image').slideUp();
          break;
      case 'video':
          jQuery('#setting_autoshowroom_portfolio_floating').slideUp();
          jQuery('#setting_autoshowroom_portfolio_slideshows_style').slideUp();
          jQuery('#setting_autoshowroom_portfolio_slideshows').slideUp();
          jQuery('#setting_autoshowroom_portfolio_video_mp4').slideDown();
          jQuery('#setting_autoshowroom_portfolio_video_ogv').slideDown();
          jQuery('#setting_autoshowroom_portfolio_video_webm').slideDown();
          jQuery('#setting_autoshowroom_portfolio_gallery').slideUp();
          jQuery('#setting_autoshowroom_portfolio_soundCloud_id').slideUp();
          jQuery('#setting_autoshowroom_portfolio_Quote_content').slideUp();
          jQuery('#setting_autoshowroom_portfolio_Quote_ds').slideUp();
          jQuery('#setting_autoshowroom_portfolio_image').slideUp();
          break;
      case 'slideshows':
          jQuery('#setting_autoshowroom_portfolio_floating').slideUp();
          jQuery('#setting_autoshowroom_portfolio_slideshows_style').slideDown();
          jQuery('#setting_autoshowroom_portfolio_slideshows').slideDown();
          jQuery('#setting_autoshowroom_portfolio_video_mp4').slideUp();
          jQuery('#setting_autoshowroom_portfolio_video_ogv').slideUp();
          jQuery('#setting_autoshowroom_portfolio_video_webm').slideUp();
          jQuery('#setting_autoshowroom_portfolio_gallery').slideUp();
          jQuery('#setting_autoshowroom_portfolio_soundCloud_id').slideUp();
          jQuery('#setting_autoshowroom_portfolio_Quote_content').slideUp();
          jQuery('#setting_autoshowroom_portfolio_Quote_ds').slideUp();
          jQuery('#setting_autoshowroom_portfolio_image').slideUp();
          break;
      case 'image':
          jQuery('#setting_autoshowroom_portfolio_floating').slideUp();
          jQuery('#setting_autoshowroom_portfolio_slideshows_style').slideDown();
          jQuery('#setting_autoshowroom_portfolio_slideshows').slideUp();
          jQuery('#setting_autoshowroom_portfolio_video_mp4').slideUp();
          jQuery('#setting_autoshowroom_portfolio_video_ogv').slideUp();
          jQuery('#setting_autoshowroom_portfolio_video_webm').slideUp();
          jQuery('#setting_autoshowroom_portfolio_gallery').slideUp();
          jQuery('#setting_autoshowroom_portfolio_soundCloud_id').slideUp();
          jQuery('#setting_autoshowroom_portfolio_Quote_content').slideUp();
          jQuery('#setting_autoshowroom_portfolio_Quote_ds').slideUp();
          jQuery('#setting_autoshowroom_portfolio_image').slideDown();
          break;
      case 'gallery':
          jQuery('#setting_autoshowroom_portfolio_floating').slideUp();
          jQuery('#setting_autoshowroom_portfolio_slideshows_style').slideUp();
          jQuery('#setting_autoshowroom_portfolio_slideshows').slideUp();
          jQuery('#setting_autoshowroom_portfolio_video_mp4').slideUp();
          jQuery('#setting_autoshowroom_portfolio_video_ogv').slideUp();
          jQuery('#setting_autoshowroom_portfolio_video_webm').slideUp();
          jQuery('#setting_autoshowroom_portfolio_gallery').slideDown();
          jQuery('#setting_autoshowroom_portfolio_soundCloud_id').slideUp();
          jQuery('#setting_autoshowroom_portfolio_Quote_content').slideUp();
          jQuery('#setting_autoshowroom_portfolio_Quote_ds').slideUp();
          jQuery('#setting_autoshowroom_portfolio_image').slideUp();
          break;
      case 'audio':
          jQuery('#setting_autoshowroom_portfolio_floating').slideUp();
          jQuery('#setting_autoshowroom_portfolio_slideshows_style').slideUp();
          jQuery('#setting_autoshowroom_portfolio_slideshows').slideUp();
          jQuery('#setting_autoshowroom_portfolio_video_mp4').slideUp();
          jQuery('#setting_autoshowroom_portfolio_video_ogv').slideUp();
          jQuery('#setting_autoshowroom_portfolio_video_webm').slideUp();
          jQuery('#setting_autoshowroom_portfolio_gallery').slideUp();
          jQuery('#setting_autoshowroom_portfolio_soundCloud_id').slideDown();
          jQuery('#setting_autoshowroom_portfolio_Quote_content').slideUp();
          jQuery('#setting_autoshowroom_portfolio_Quote_ds').slideUp();
          jQuery('#setting_autoshowroom_portfolio_image').slideUp();
          break;
      case 'quote':
          jQuery('#setting_autoshowroom_portfolio_floating').slideUp();
          jQuery('#setting_autoshowroom_portfolio_slideshows_style').slideUp();
          jQuery('#setting_autoshowroom_portfolio_slideshows').slideUp();
          jQuery('#setting_autoshowroom_portfolio_video_mp4').slideUp();
          jQuery('#setting_autoshowroom_portfolio_video_ogv').slideUp();
          jQuery('#setting_autoshowroom_portfolio_video_webm').slideUp();
          jQuery('#setting_autoshowroom_portfolio_gallery').slideUp();
          jQuery('#setting_autoshowroom_portfolio_soundCloud_id').slideUp();
          jQuery('#setting_autoshowroom_portfolio_Quote_content').slideDown();
          jQuery('#setting_autoshowroom_portfolio_Quote_ds').slideDown();
          jQuery('#setting_autoshowroom_portfolio_image').slideUp();
          break;
      default :
          jQuery('#setting_autoshowroom_portfolio_floating').slideUp();
          jQuery('#setting_autoshowroom_portfolio_slideshows_style').slideUp();
          jQuery('#setting_autoshowroom_portfolio_slideshows').slideUp();
          jQuery('#setting_autoshowroom_portfolio_video_mp4').slideUp();
          jQuery('#setting_autoshowroom_portfolio_video_ogv').slideUp();
          jQuery('#setting_autoshowroom_portfolio_video_webm').slideUp();
          jQuery('#setting_autoshowroom_portfolio_gallery').slideUp();
          jQuery('#setting_autoshowroom_portfolio_soundCloud_id').slideUp();
          jQuery('#setting_autoshowroom_portfolio_Quote_content').slideUp();
          jQuery('#setting_autoshowroom_portfolio_Quote_ds').slideUp();
          jQuery('#setting_autoshowroom_portfolio_image').slideUp();
          break;
  }

    jQuery('#autoshowroom_portfolio_type').change(function(){
        switch (jQuery(this).val()) {
            case 'floating':
                jQuery('#setting_autoshowroom_portfolio_floating').slideDown();
                jQuery('#setting_autoshowroom_portfolio_slideshows_style').slideUp();
                jQuery('#setting_autoshowroom_portfolio_slideshows').slideUp();
                jQuery('#setting_autoshowroom_portfolio_video_mp4').slideUp();
                jQuery('#setting_autoshowroom_portfolio_video_ogv').slideUp();
                jQuery('#setting_autoshowroom_portfolio_video_webm').slideUp();
                jQuery('#setting_autoshowroom_portfolio_gallery').slideUp();
                jQuery('#setting_autoshowroom_portfolio_soundCloud_id').slideUp();
                jQuery('#setting_autoshowroom_portfolio_Quote_content').slideUp();
                jQuery('#setting_autoshowroom_portfolio_Quote_ds').slideUp();
                jQuery('#setting_autoshowroom_portfolio_image').slideUp();
                break;
            case 'video':
                jQuery('#setting_autoshowroom_portfolio_floating').slideUp();
                jQuery('#setting_autoshowroom_portfolio_slideshows_style').slideUp();
                jQuery('#setting_autoshowroom_portfolio_slideshows').slideUp();
                jQuery('#setting_autoshowroom_portfolio_video_mp4').slideDown();
                jQuery('#setting_autoshowroom_portfolio_video_ogv').slideDown();
                jQuery('#setting_autoshowroom_portfolio_video_webm').slideDown();
                jQuery('#setting_autoshowroom_portfolio_gallery').slideUp();
                jQuery('#setting_autoshowroom_portfolio_soundCloud_id').slideUp();
                jQuery('#setting_autoshowroom_portfolio_Quote_content').slideUp();
                jQuery('#setting_autoshowroom_portfolio_Quote_ds').slideUp();
                jQuery('#setting_autoshowroom_portfolio_image').slideUp();
                break;
            case 'slideshows':
                jQuery('#setting_autoshowroom_portfolio_floating').slideUp();
                jQuery('#setting_autoshowroom_portfolio_slideshows_style').slideDown();
                jQuery('#setting_autoshowroom_portfolio_slideshows').slideDown();
                jQuery('#setting_autoshowroom_portfolio_video_mp4').slideUp();
                jQuery('#setting_autoshowroom_portfolio_video_ogv').slideUp();
                jQuery('#setting_autoshowroom_portfolio_video_webm').slideUp();
                jQuery('#setting_autoshowroom_portfolio_gallery').slideUp();
                jQuery('#setting_autoshowroom_portfolio_soundCloud_id').slideUp();
                jQuery('#setting_autoshowroom_portfolio_Quote_content').slideUp();
                jQuery('#setting_autoshowroom_portfolio_Quote_ds').slideUp();
                jQuery('#setting_autoshowroom_portfolio_image').slideUp();
                break;
            case 'image':
                jQuery('#setting_autoshowroom_portfolio_floating').slideUp();
                jQuery('#setting_autoshowroom_portfolio_slideshows_style').slideDown();
                jQuery('#setting_autoshowroom_portfolio_slideshows').slideUp();
                jQuery('#setting_autoshowroom_portfolio_video_mp4').slideUp();
                jQuery('#setting_autoshowroom_portfolio_video_ogv').slideUp();
                jQuery('#setting_autoshowroom_portfolio_video_webm').slideUp();
                jQuery('#setting_autoshowroom_portfolio_gallery').slideUp();
                jQuery('#setting_autoshowroom_portfolio_soundCloud_id').slideUp();
                jQuery('#setting_autoshowroom_portfolio_Quote_content').slideUp();
                jQuery('#setting_autoshowroom_portfolio_Quote_ds').slideUp();
                jQuery('#setting_autoshowroom_portfolio_image').slideDown();
                break;
            case 'gallery':
                jQuery('#setting_autoshowroom_portfolio_floating').slideUp();
                jQuery('#setting_autoshowroom_portfolio_slideshows_style').slideUp();
                jQuery('#setting_autoshowroom_portfolio_slideshows').slideUp();
                jQuery('#setting_autoshowroom_portfolio_video_mp4').slideUp();
                jQuery('#setting_autoshowroom_portfolio_video_ogv').slideUp();
                jQuery('#setting_autoshowroom_portfolio_video_webm').slideUp();
                jQuery('#setting_autoshowroom_portfolio_gallery').slideDown();
                jQuery('#setting_autoshowroom_portfolio_soundCloud_id').slideUp();
                jQuery('#setting_autoshowroom_portfolio_Quote_content').slideUp();
                jQuery('#setting_autoshowroom_portfolio_Quote_ds').slideUp();
                jQuery('#setting_autoshowroom_portfolio_image').slideUp();
                break;
            case 'audio':
                jQuery('#setting_autoshowroom_portfolio_floating').slideUp();
                jQuery('#setting_autoshowroom_portfolio_slideshows_style').slideUp();
                jQuery('#setting_autoshowroom_portfolio_slideshows').slideUp();
                jQuery('#setting_autoshowroom_portfolio_video_mp4').slideUp();
                jQuery('#setting_autoshowroom_portfolio_video_ogv').slideUp();
                jQuery('#setting_autoshowroom_portfolio_video_webm').slideUp();
                jQuery('#setting_autoshowroom_portfolio_gallery').slideUp();
                jQuery('#setting_autoshowroom_portfolio_soundCloud_id').slideDown();
                jQuery('#setting_autoshowroom_portfolio_Quote_content').slideUp();
                jQuery('#setting_autoshowroom_portfolio_Quote_ds').slideUp();
                jQuery('#setting_autoshowroom_portfolio_image').slideUp();
                break;
            case 'quote':
                jQuery('#setting_autoshowroom_portfolio_floating').slideUp();
                jQuery('#setting_autoshowroom_portfolio_slideshows_style').slideUp();
                jQuery('#setting_autoshowroom_portfolio_slideshows').slideUp();
                jQuery('#setting_autoshowroom_portfolio_video_mp4').slideUp();
                jQuery('#setting_autoshowroom_portfolio_video_ogv').slideUp();
                jQuery('#setting_autoshowroom_portfolio_video_webm').slideUp();
                jQuery('#setting_autoshowroom_portfolio_gallery').slideUp();
                jQuery('#setting_autoshowroom_portfolio_soundCloud_id').slideUp();
                jQuery('#setting_autoshowroom_portfolio_Quote_content').slideDown();
                jQuery('#setting_autoshowroom_portfolio_Quote_ds').slideDown();
                jQuery('#setting_autoshowroom_portfolio_image').slideUp();
                break;
            default :
                jQuery('#setting_autoshowroom_portfolio_floating').slideUp();
                jQuery('#setting_autoshowroom_portfolio_slideshows_style').slideUp();
                jQuery('#setting_autoshowroom_portfolio_slideshows').slideUp();
                jQuery('#setting_autoshowroom_portfolio_video_mp4').slideUp();
                jQuery('#setting_autoshowroom_portfolio_video_ogv').slideUp();
                jQuery('#setting_autoshowroom_portfolio_video_webm').slideUp();
                jQuery('#setting_autoshowroom_portfolio_gallery').slideUp();
                jQuery('#setting_autoshowroom_portfolio_soundCloud_id').slideUp();
                jQuery('#setting_autoshowroom_portfolio_Quote_content').slideUp();
                jQuery('#setting_autoshowroom_portfolio_Quote_ds').slideUp();
                jQuery('#setting_autoshowroom_portfolio_image').slideUp();
                break;
        }
    });


  var $checkpage = jQuery('#page_template').val();
    switch ($checkpage){
        case 'template-portfolio.php':
            jQuery('#page_meta_box').css('display','block');
            jQuery('#autoshowrom_page_option_meta_box').css('display','none');
            jQuery('#autoshowrom_contact_option_meta_box').css('display','none');
            break;
        case 'template-home.php':
            jQuery('#page_meta_box').css('display','none');
            jQuery('#autoshowrom_page_option_meta_box').css('display','none');
            jQuery('#autoshowrom_contact_option_meta_box').css('display','none');
            break;
        default :
            jQuery('#page_meta_box').css('display','none');
            jQuery('#autoshowrom_page_option_meta_box').css('display','block');
            jQuery('#autoshowrom_contact_option_meta_box').css('display','block');
            break;
    }

  jQuery('#page_template').change(function(){
     var $value = jQuery(this).val();
      switch ($value){
          case 'template-portfolio.php':
              jQuery('#page_meta_box').css('display','block');
              jQuery('#autoshowrom_page_option_meta_box').css('display','none');
              jQuery('#autoshowrom_contact_option_meta_box').css('display','none');
              break;
          case 'template-home.php':
              jQuery('#page_meta_box').css('display','none');
              jQuery('#autoshowrom_page_option_meta_box').css('display','none');
              jQuery('#autoshowrom_contact_option_meta_box').css('display','none');
              break;
          default :
              jQuery('#page_meta_box').css('display','none');
              jQuery('#autoshowrom_page_option_meta_box').css('display','block');
              jQuery('#autoshowrom_contact_option_meta_box').css('display','block');
              break;
      }
  });
});
