jQuery(document).ready(function(){
    var header_type = jQuery('#autoshowroom_header_type').val();
    jQuery('#autoshowroom_header_type').parents('.has-desc').addClass(header_type);
    jQuery('#autoshowroom_header_type').on('change',function(){
        var header_c_type = jQuery(this).val();
        jQuery(this).parents('.has-desc').removeClass('header1');
        jQuery(this).parents('.has-desc').removeClass('header2');
        jQuery(this).parents('.has-desc').removeClass('header3');
        jQuery(this).parents('.has-desc').removeClass('header4');
        jQuery(this).parents('.has-desc').removeClass('header5');
        jQuery(this).parents('.has-desc').removeClass('header6');
        jQuery(this).parents('.has-desc').removeClass('header7');
        jQuery(this).parents('.has-desc').addClass(header_c_type);
    });

    // method body font
    jQuery('#option-tree-version').html('<span class="auto">AutoShowroom Theme Options</span>');
    var FontCheck2 = jQuery("#autoshowroom_TZFontType").attr('value');
    switch (FontCheck2){
        case 'TzFontSquirrel':
            jQuery('#setting_autoshowroom_TzFontSquirrel').css("display","block");
            break;
        case 'TzFontDefault':
            jQuery('#setting_autoshowroom_TzFontDefault').css("display","block");

            break;
        case 'Tzgoogle':

            jQuery('#setting_autoshowroom_TzFontFami').css("display","block");
            jQuery('#setting_autoshowroom_TzFontFaminy').css("display","block");
            break;
    }

    jQuery("#autoshowroom_TZFontType").change(function(){
        var FontCheck = jQuery("#autoshowroom_TZFontType").attr('value');
        switch (FontCheck){
            case 'TzFontDefault':
                jQuery('#setting_autoshowroom_TzFontDefault').slideDown();
                jQuery('#setting_autoshowroom_TzFontSquirrel').slideUp();
                jQuery('#setting_autoshowroom_TzFontFami').slideUp();
                jQuery('#setting_autoshowroom_TzFontFaminy').slideUp();
                break;
            case 'Tzgoogle':
                jQuery('#setting_autoshowroom_TzFontDefault').slideUp();
                jQuery('#setting_autoshowroom_TzFontSquirrel').slideUp();
                jQuery('#setting_autoshowroom_TzFontFami').slideDown();
                jQuery('#setting_autoshowroom_TzFontFaminy').slideDown();
                break;
        }
    });


    // method header font
    var FontCheckHead = jQuery("#autoshowroom_TZFontTypeHead").attr('value');
    switch (FontCheckHead){
        case 'TzFontDefault':
            jQuery('#setting_autoshowroom_TzFontHeadDefault').css("display","block");
            break;
        case 'Tzgoogle':
            jQuery('#setting_autoshowroom_TzFontHeadGoodurl').css("display","block");
            jQuery('#setting_autoshowroom_TzFontFaminyHead').css("display","block");
            break;
    }

    jQuery("#autoshowroom_TZFontTypeHead").change(function(){
        var FontCheckHead2 = jQuery("#autoshowroom_TZFontTypeHead").attr('value');
        switch (FontCheckHead2){
            case 'TzFontDefault':
                jQuery('#setting_autoshowroom_TzFontHeadDefault').slideDown();
                jQuery('#setting_autoshowroom_TzFontHeadSquirrel').slideUp();
                jQuery('#setting_autoshowroom_TzFontHeadGoodurl').slideUp();
                jQuery('#setting_autoshowroom_TzFontFaminyHead').slideUp();
                break;
            case 'Tzgoogle':
                jQuery('#setting_autoshowroom_TzFontHeadDefault').slideUp();
                jQuery('#setting_autoshowroom_TzFontHeadSquirrel').slideUp();
                jQuery('#setting_autoshowroom_TzFontHeadGoodurl').slideDown();
                jQuery('#setting_autoshowroom_TzFontFaminyHead').slideDown();
                break;
        }
    });

    // method Menu font
    var FontCheckMenu= jQuery("#autoshowroom_TZFontTypeMenu").attr('value');
    switch (FontCheckMenu){

        case 'TzFontDefault':
            jQuery('#setting_autoshowroom_TzFontMenuDefault').css("display","block");

            break;
        case 'Tzgoogle':

            jQuery('#setting_autoshowroom_TzFontMenuGoodurl').css("display","block");
            jQuery('#setting_autoshowroom_TzFontFaminyMenu').css("display","block");
            break;
    }

    jQuery("#autoshowroom_TZFontTypeMenu").change(function(){
        var FontCheckMenu2 = jQuery("#autoshowroom_TZFontTypeMenu").attr('value');
        switch (FontCheckMenu2){

            case 'TzFontDefault':
                jQuery('#setting_autoshowroom_TzFontMenuDefault').slideDown();
                jQuery('#setting_autoshowroom_TzFontMenuSquirrel').slideUp();
                jQuery('#setting_autoshowroom_TzFontMenuGoodurl').slideUp();
                jQuery('#setting_autoshowroom_TzFontFaminyMenu').slideUp();
                break;
            case 'Tzgoogle':
                jQuery('#setting_autoshowroom_TzFontMenuDefault').slideUp();
                jQuery('#setting_autoshowroom_TzFontMenuSquirrel').slideUp();
                jQuery('#setting_autoshowroom_TzFontMenuGoodurl').slideDown();
                jQuery('#setting_autoshowroom_TzFontFaminyMenu').slideDown();
                break;
        }
    });

    // blog style option
    var BlogStyleOption= jQuery("#autoshowroom_blog_style").attr('value');
    switch (BlogStyleOption){

        case 'ListStyle':
            jQuery('#setting_autoshowroom_blog_column').css("display","none");
            jQuery('#setting_autoshowroom_blog_view').css("display","block");
            jQuery('#setting_autoshowroom_blog_category').css("display","block");
            jQuery('#setting_autoshowroom_blog_share').css("display","block");
            jQuery('#setting_autoshowroom_blog_readmore').css("display","block");

            break;
        case 'GridStyle':
            jQuery('#setting_autoshowroom_blog_column').css("display","block");
            jQuery('#setting_autoshowroom_blog_view').css("display","block");
            jQuery('#setting_autoshowroom_blog_category').css("display","block");
            jQuery('#setting_autoshowroom_blog_share').css("display","block");
            jQuery('#setting_autoshowroom_blog_readmore').css("display","block");
            break;
        case 'MasonryStyle':
            jQuery('#setting_autoshowroom_blog_column').css("display","block");
            jQuery('#setting_autoshowroom_blog_view').css("display","block");
            jQuery('#setting_autoshowroom_blog_category').css("display","block");
            jQuery('#setting_autoshowroom_blog_share').css("display","block");
            jQuery('#setting_autoshowroom_blog_readmore').css("display","block");
            break;

    }

    jQuery("#autoshowroom_blog_style").change(function(){
        var BlogStyleOption2 = jQuery("#autoshowroom_blog_style").attr('value');
        switch (BlogStyleOption2){

            case 'GridStyle':
                jQuery('#setting_autoshowroom_blog_column').slideDown();
                jQuery('#setting_autoshowroom_blog_view').slideUp();
                jQuery('#setting_autoshowroom_blog_category').slideUp();
                jQuery('#setting_autoshowroom_blog_share').slideUp();
                jQuery('#setting_autoshowroom_blog_readmore').slideUp();
                break;
            case 'MasonryStyle':
                jQuery('#setting_autoshowroom_blog_column').slideDown();
                jQuery('#setting_autoshowroom_blog_view').slideUp();
                jQuery('#setting_autoshowroom_blog_category').slideUp();
                jQuery('#setting_autoshowroom_blog_share').slideUp();
                jQuery('#setting_autoshowroom_blog_readmore').slideUp();
                break;
            case 'ListStyle':
                jQuery('#setting_autoshowroom_blog_column').slideUp();
                jQuery('#setting_autoshowroom_blog_view').slideDown();
                jQuery('#setting_autoshowroom_blog_category').slideDown();
                jQuery('#setting_autoshowroom_blog_share').slideDown();
                jQuery('#setting_autoshowroom_blog_readmore').slideDown();
                break;
        }
    });

    // method custom font
    var FontCheckCustom= jQuery("#autoshowroom_TZFontTypeCustom").attr('value');
    switch (FontCheckCustom){

        case 'TzFontDefault':
            jQuery('#setting_autoshowroom_TzFontCustomDefault').css("display","block");

            break;
        case 'Tzgoogle':

            jQuery('#setting_autoshowroom_TzFontCustomGoodurl').css("display","block");
            jQuery('#setting_autoshowroom_TzFontFaminyCustom').css("display","block");
            break;
    }

    jQuery("#autoshowroom_TZFontTypeCustom").change(function(){
        var FontCheckCustom2 = jQuery("#autoshowroom_TZFontTypeCustom").attr('value');
        switch (FontCheckCustom2){

            case 'TzFontDefault':
                jQuery('#setting_autoshowroom_TzFontCustomDefault').slideDown();
                jQuery('#setting_autoshowroom_TzFontCustomSquirrel').slideUp();
                jQuery('#setting_autoshowroom_TzFontCustomGoodurl').slideUp();
                jQuery('#setting_autoshowroom_TzFontFaminyCustom').slideUp();
                break;
            case 'Tzgoogle':
                jQuery('#setting_autoshowroom_TzFontCustomDefault').slideUp();
                jQuery('#setting_autoshowroom_TzFontCustomSquirrel').slideUp();
                jQuery('#setting_autoshowroom_TzFontCustomGoodurl').slideDown();
                jQuery('#setting_autoshowroom_TzFontFaminyCustom').slideDown();
                break;
        }
    });




    // method logo type

    var LogoType= jQuery("#autoshowroom_logotype").attr('value');
    if(LogoType==1){
        jQuery('#setting_autoshowroom_logo').slideDown();
        jQuery('#setting_autoshowroom_logoText').slideUp();
        jQuery('#setting_autoshowroom_logoTextcolor').slideUp();
    }else{
        jQuery('#setting_autoshowroom_logo').slideUp();
        jQuery('#setting_autoshowroom_logoText').slideDown();
        jQuery('#setting_autoshowroom_logoTextcolor').slideDown();
    }

    jQuery("#autoshowroom_logotype").change(function(){
        var LogoTypeChange= jQuery("#autoshowroom_logotype").attr('value');
        if(LogoTypeChange==1){
            jQuery('#setting_autoshowroom_logo').slideDown();
            jQuery('#setting_autoshowroom_logoText').slideUp();
            jQuery('#setting_autoshowroom_logoTextcolor').slideUp();
        }else{
            jQuery('#setting_autoshowroom_logo').slideUp();
            jQuery('#setting_autoshowroom_logoText').slideDown();
            jQuery('#setting_autoshowroom_logoTextcolor').slideDown();
        }
    });


    // jquery style option
    jQuery("#tab_TzSyle").toggle(function(){
        jQuery('#tab_TzFontMenu').slideDown();
        jQuery('#tab_TzFontCustom').slideDown();
        jQuery('#tab_TZBody').slideDown();
        jQuery('#tab_TzFontHeader').slideDown();
    }, function(){
        jQuery('#tab_TzFontMenu').slideUp();
        jQuery('#tab_TzFontCustom').slideUp();
        jQuery('#tab_TZBody').slideUp();
        jQuery('#tab_TzFontHeader').slideUp();
    });
    // jquery style option
    jQuery("#tab_TZColor").toggle(function(){
        jQuery('#tab_TZColorMenu').slideDown();
    }, function(){
        jQuery('#tab_TZColorMenu').slideUp();
    });

    // jquery Vehicle option
    jQuery("#tab_TZVehicle").toggle(function(){
        jQuery('#tab_TZVehicleCompare').slideDown();
        jQuery('#tab_TZVehicleCalculator').slideDown();
        jQuery('#tab_TZVehicleDetail').slideDown();
        jQuery('#tab_TZVehicleIcon').slideDown();
    }, function(){
        jQuery('#tab_TZVehicleCompare').slideUp();
        jQuery('#tab_TZVehicleCalculator').slideUp();
        jQuery('#tab_TZVehicleDetail').slideUp();
        jQuery('#tab_TZVehicleIcon').slideUp();
    });

    // jquery footer option
    jQuery("#tab_footeroption").toggle(function(){
        jQuery('#tab_footer_column_option').slideDown();
        jQuery('#tab_footer_social_option').slideDown();
    }, function(){
        jQuery('#tab_footer_column_option').slideUp();
        jQuery('#tab_footer_social_option').slideUp();
    });

        // jquery style option
    jQuery("#tab_TZShop").toggle(function(){
        jQuery('#tab_TZShop1, #tab_TZShop2, #tab_TZShop3').slideDown();
    }, function(){
        jQuery('#tab_TZShop1, #tab_TZShop2, #tab_TZShop3').slideUp();
    });

    // jquery favicon option
    var valuefavicon = jQuery('#autoshowroom_favicon_onoff').attr('value');
    if(valuefavicon =='yes'){
        jQuery('#setting_autoshowroom_favicon').slideDown();
    }else{
        jQuery('#setting_autoshowroom_favicon').slideUp();
    }

    jQuery('#autoshowroom_favicon_onoff').change(function(){
        if(jQuery(this).attr('value')=='yes'){
            jQuery('#setting_autoshowroom_favicon').slideDown();
        }else{
            jQuery('#setting_autoshowroom_favicon').slideUp();
        }
    });

// footer
    //footer type

    var valuefootertype = jQuery('#autoshowroom_footer_type').attr('value');
    if(valuefootertype == 'type2'){
        jQuery('#setting_autoshowroom_logo_footer').slideDown();
        jQuery('#setting_autoshowroom_newsletter').slideDown();
        jQuery('#setting_autoshowroom_newsletter_title').slideDown();
        jQuery('#setting_autoshowroom_newsletter_des').slideDown();
    }else{
        jQuery('#setting_autoshowroom_logo_footer').slideUp();
        jQuery('#setting_autoshowroom_newsletter').slideUp();
        jQuery('#setting_autoshowroom_newsletter_title').slideUp();
        jQuery('#setting_autoshowroom_newsletter_des').slideUp();
    }
    jQuery('#autoshowroom_footer_type').change(function(){
        if(jQuery(this).attr('value')=='type2'){
            jQuery('#setting_autoshowroom_logo_footer').slideDown();
            jQuery('#setting_autoshowroom_newsletter').slideDown();
            jQuery('#setting_autoshowroom_newsletter_title').slideDown();
            jQuery('#setting_autoshowroom_newsletter_des').slideDown();
        }else{
            jQuery('#setting_autoshowroom_logo_footer').slideUp();
            jQuery('#setting_autoshowroom_newsletter').slideUp();
            jQuery('#setting_autoshowroom_newsletter_title').slideUp();
            jQuery('#setting_autoshowroom_newsletter_des').slideUp();
        }

    });

    //footer column
    jQuery('#autoshowroom_footer_columns').change(function(){

        var footerchange = jQuery(this).attr('value');

        switch (footerchange){
            case'1':
                jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(1)').slideUp();
                jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(2)').slideUp();
                jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(3)').slideUp();
                jQuery('#setting_autoshowroom_footer_width1').slideDown();
                jQuery('#setting_autoshowroom_footer_offset_width1').slideDown();
                jQuery('#setting_autoshowroom_footer_width2').slideUp();
                jQuery('#setting_autoshowroom_footer_offset_width2').slideUp();
                jQuery('#setting_autoshowroom_footer_width3').slideUp();
                jQuery('#setting_autoshowroom_footer_offset_width3').slideUp();
                jQuery('#setting_autoshowroom_footer_width4').slideUp();
                jQuery('#setting_autoshowroom_footer_offset_width4').slideUp();
                break;
            case'2':
                jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(1)').slideDown();
                jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(2)').slideUp();
                jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(3)').slideUp();

                jQuery('#setting_autoshowroom_footer_width1').slideDown();
                jQuery('#setting_autoshowroom_footer_offset_width1').slideDown();
                jQuery('#setting_autoshowroom_footer_width2').slideDown();
                jQuery('#setting_autoshowroom_footer_offset_width2').slideDown();
                jQuery('#setting_autoshowroom_footer_width3').slideUp();
                jQuery('#setting_autoshowroom_footer_offset_width3').slideUp();
                jQuery('#setting_autoshowroom_footer_width4').slideUp();
                jQuery('#setting_autoshowroom_footer_offset_width4').slideUp();
                break;
            case'3':
                jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(1)').slideDown();
                jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(2)').slideDown();
                jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(3)').slideUp();

                jQuery('#setting_autoshowroom_footer_width1').slideDown();
                jQuery('#setting_autoshowroom_footer_offset_width1').slideDown();
                jQuery('#setting_autoshowroom_footer_width2').slideDown();
                jQuery('#setting_autoshowroom_footer_offset_width2').slideDown();
                jQuery('#setting_autoshowroom_footer_width3').slideDown();
                jQuery('#setting_autoshowroom_footer_offset_width3').slideDown();
                jQuery('#setting_autoshowroom_footer_width4').slideUp();
                jQuery('#setting_autoshowroom_footer_offset_width4').slideUp();
                break;
            case'4':
                jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(1)').slideDown();
                jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(2)').slideDown();
                jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(3)').slideDown();

                jQuery('#setting_autoshowroom_footer_width1').slideDown();
                jQuery('#setting_autoshowroom_footer_offset_width1').slideDown();
                jQuery('#setting_autoshowroom_footer_width2').slideDown();
                jQuery('#setting_autoshowroom_footer_offset_width2').slideDown();
                jQuery('#setting_autoshowroom_footer_width3').slideDown();
                jQuery('#setting_autoshowroom_footer_offset_width3').slideDown();
                jQuery('#setting_autoshowroom_footer_width4').slideDown();
                jQuery('#setting_autoshowroom_footer_offset_width4').slideDown();
                break;
            default :
                jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(0)').slideDown();
                jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(1)').slideDown();
                jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(2)').slideDown();
                jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(3)').slideDown();
                jQuery('#setting_autoshowroom_footer_width1').slideDown();
                jQuery('#setting_autoshowroom_footer_offset_width1').slideDown();
                jQuery('#setting_autoshowroom_footer_width2').slideDown();
                jQuery('#setting_autoshowroom_footer_offset_width2').slideDown();
                jQuery('#setting_autoshowroom_footer_width3').slideDown();
                jQuery('#setting_autoshowroom_footer_offset_width3').slideDown();
                jQuery('#setting_autoshowroom_footer_width4').slideDown();
                jQuery('#setting_autoshowroom_footer_offset_width4').slideDown();
                break;
        }
    });
    var footervalue =  jQuery('#autoshowroom_footer_columns').attr('value');

    switch (footervalue){
        case'1':
            jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(1)').slideUp();
            jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(2)').slideUp();
            jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(3)').slideUp();
            jQuery('#setting_autoshowroom_footer_width1').slideDown();
            jQuery('#setting_autoshowroom_footer_offset_width1').slideDown();
            jQuery('#setting_autoshowroom_footer_width2').slideUp();
            jQuery('#setting_autoshowroom_footer_offset_width2').slideUp();
            jQuery('#setting_autoshowroom_footer_width3').slideUp();
            jQuery('#setting_autoshowroom_footer_offset_width3').slideUp();
            jQuery('#setting_autoshowroom_footer_width4').slideUp();
            jQuery('#setting_autoshowroom_footer_offset_width4').slideUp();
            break;
        case'2':
            jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(1)').slideDown();
            jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(2)').slideUp();
            jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(3)').slideUp();

            jQuery('#setting_autoshowroom_footer_width1').slideDown();
            jQuery('#setting_autoshowroom_footer_offset_width1').slideDown();
            jQuery('#setting_autoshowroom_footer_width2').slideDown();
            jQuery('#setting_autoshowroom_footer_offset_width2').slideDown();
            jQuery('#setting_autoshowroom_footer_width3').slideUp();
            jQuery('#setting_autoshowroom_footer_offset_width3').slideUp();
            jQuery('#setting_autoshowroom_footer_width4').slideUp();
            jQuery('#setting_autoshowroom_footer_offset_width4').slideUp();
            break;
        case'3':
            jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(1)').slideDown();
            jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(2)').slideDown();
            jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(3)').slideUp();

            jQuery('#setting_autoshowroom_footer_width1').slideDown();
            jQuery('#setting_autoshowroom_footer_offset_width1').slideDown();
            jQuery('#setting_autoshowroom_footer_width2').slideDown();
            jQuery('#setting_autoshowroom_footer_offset_width2').slideDown();
            jQuery('#setting_autoshowroom_footer_width3').slideDown();
            jQuery('#setting_autoshowroom_footer_offset_width3').slideDown();
            jQuery('#setting_autoshowroom_footer_width4').slideUp();
            jQuery('#setting_autoshowroom_footer_offset_width4').slideUp();
            break;
        case'4':
            jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(1)').slideDown();
            jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(2)').slideDown();
            jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(3)').slideDown();

            jQuery('#setting_autoshowroom_footer_width1').slideDown();
            jQuery('#setting_autoshowroom_footer_offset_width1').slideDown();
            jQuery('#setting_autoshowroom_footer_width2').slideDown();
            jQuery('#setting_autoshowroom_footer_offset_width2').slideDown();
            jQuery('#setting_autoshowroom_footer_width3').slideDown();
            jQuery('#setting_autoshowroom_footer_offset_width3').slideDown();
            jQuery('#setting_autoshowroom_footer_width4').slideDown();
            jQuery('#setting_autoshowroom_footer_offset_width4').slideDown();
            break;
        default :
            jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(0)').slideDown();
            jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(1)').slideDown();
            jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(2)').slideDown();
            jQuery('#setting_autoshowroom_footer_image .option-tree-ui-radio-images:eq(3)').slideDown();
            jQuery('#setting_autoshowroom_footer_width1').slideDown();
            jQuery('#setting_autoshowroom_footer_offset_width1').slideDown();
            jQuery('#setting_autoshowroom_footer_width2').slideDown();
            jQuery('#setting_autoshowroom_footer_offset_width2').slideDown();
            jQuery('#setting_autoshowroom_footer_width3').slideDown();
            jQuery('#setting_autoshowroom_footer_offset_width3').slideDown();
            jQuery('#setting_autoshowroom_footer_width4').slideDown();
            jQuery('#setting_autoshowroom_footer_offset_width4').slideDown();
            break;
    }


    // social

    jQuery('#autoshowroom_footer_social_number').change(function(){

        var socialchange = jQuery(this).attr('value');

        switch (socialchange){
            case'1':
                jQuery('#setting_autoshowroom_social_icon_1').slideDown();
                jQuery('#setting_autoshowroom_social_url_1').slideDown();
                jQuery('#setting_autoshowroom_social_icon_2').slideUp();
                jQuery('#setting_autoshowroom_social_url_2').slideUp();
                jQuery('#setting_autoshowroom_social_icon_3').slideUp();
                jQuery('#setting_autoshowroom_social_url_3').slideUp();
                jQuery('#setting_autoshowroom_social_icon_4').slideUp();
                jQuery('#setting_autoshowroom_social_url_4').slideUp();
                jQuery('#setting_autoshowroom_social_icon_5').slideUp();
                jQuery('#setting_autoshowroom_social_url_5').slideUp();
                jQuery('#setting_autoshowroom_social_icon_6').slideUp();
                jQuery('#setting_autoshowroom_social_url_6').slideUp();
                jQuery('#setting_autoshowroom_social_icon_7').slideUp();
                jQuery('#setting_autoshowroom_social_url_7').slideUp();
                jQuery('#setting_autoshowroom_social_icon_8').slideUp();
                jQuery('#setting_autoshowroom_social_url_8').slideUp();
                jQuery('#setting_autoshowroom_social_icon_9').slideUp();
                jQuery('#setting_autoshowroom_social_url_9').slideUp();
                jQuery('#setting_autoshowroom_social_icon_10').slideUp();
                jQuery('#setting_autoshowroom_social_url_10').slideUp();

                break;
            case'2':
                jQuery('#setting_autoshowroom_social_icon_1').slideDown();
                jQuery('#setting_autoshowroom_social_url_1').slideDown();
                jQuery('#setting_autoshowroom_social_icon_2').slideDown();
                jQuery('#setting_autoshowroom_social_url_2').slideDown();
                jQuery('#setting_autoshowroom_social_icon_3').slideUp();
                jQuery('#setting_autoshowroom_social_url_3').slideUp();
                jQuery('#setting_autoshowroom_social_icon_4').slideUp();
                jQuery('#setting_autoshowroom_social_url_4').slideUp();
                jQuery('#setting_autoshowroom_social_icon_5').slideUp();
                jQuery('#setting_autoshowroom_social_url_5').slideUp();
                jQuery('#setting_autoshowroom_social_icon_6').slideUp();
                jQuery('#setting_autoshowroom_social_url_6').slideUp();
                jQuery('#setting_autoshowroom_social_icon_7').slideUp();
                jQuery('#setting_autoshowroom_social_url_7').slideUp();
                jQuery('#setting_autoshowroom_social_icon_8').slideUp();
                jQuery('#setting_autoshowroom_social_url_8').slideUp();
                jQuery('#setting_autoshowroom_social_icon_9').slideUp();
                jQuery('#setting_autoshowroom_social_url_9').slideUp();
                jQuery('#setting_autoshowroom_social_icon_10').slideUp();
                jQuery('#setting_autoshowroom_social_url_10').slideUp();

                break;
            case'3':
                jQuery('#setting_autoshowroom_social_icon_1').slideDown();
                jQuery('#setting_autoshowroom_social_url_1').slideDown();
                jQuery('#setting_autoshowroom_social_icon_2').slideDown();
                jQuery('#setting_autoshowroom_social_url_2').slideDown();
                jQuery('#setting_autoshowroom_social_icon_3').slideDown();
                jQuery('#setting_autoshowroom_social_url_3').slideDown();
                jQuery('#setting_autoshowroom_social_icon_4').slideUp();
                jQuery('#setting_autoshowroom_social_url_4').slideUp();
                jQuery('#setting_autoshowroom_social_icon_5').slideUp();
                jQuery('#setting_autoshowroom_social_url_5').slideUp();
                jQuery('#setting_autoshowroom_social_icon_6').slideUp();
                jQuery('#setting_autoshowroom_social_url_6').slideUp();
                jQuery('#setting_autoshowroom_social_icon_7').slideUp();
                jQuery('#setting_autoshowroom_social_url_7').slideUp();
                jQuery('#setting_autoshowroom_social_icon_8').slideUp();
                jQuery('#setting_autoshowroom_social_url_8').slideUp();
                jQuery('#setting_autoshowroom_social_icon_9').slideUp();
                jQuery('#setting_autoshowroom_social_url_9').slideUp();
                jQuery('#setting_autoshowroom_social_icon_10').slideUp();
                jQuery('#setting_autoshowroom_social_url_10').slideUp();

                break;
            case'4':
                jQuery('#setting_autoshowroom_social_icon_1').slideDown();
                jQuery('#setting_autoshowroom_social_url_1').slideDown();
                jQuery('#setting_autoshowroom_social_icon_2').slideDown();
                jQuery('#setting_autoshowroom_social_url_2').slideDown();
                jQuery('#setting_autoshowroom_social_icon_3').slideDown();
                jQuery('#setting_autoshowroom_social_url_3').slideDown();
                jQuery('#setting_autoshowroom_social_icon_4').slideDown();
                jQuery('#setting_autoshowroom_social_url_4').slideDown();
                jQuery('#setting_autoshowroom_social_icon_5').slideUp();
                jQuery('#setting_autoshowroom_social_url_5').slideUp();
                jQuery('#setting_autoshowroom_social_icon_6').slideUp();
                jQuery('#setting_autoshowroom_social_url_6').slideUp();
                jQuery('#setting_autoshowroom_social_icon_7').slideUp();
                jQuery('#setting_autoshowroom_social_url_7').slideUp();
                jQuery('#setting_autoshowroom_social_icon_8').slideUp();
                jQuery('#setting_autoshowroom_social_url_8').slideUp();
                jQuery('#setting_autoshowroom_social_icon_9').slideUp();
                jQuery('#setting_autoshowroom_social_url_9').slideUp();
                jQuery('#setting_autoshowroom_social_icon_10').slideUp();
                jQuery('#setting_autoshowroom_social_url_10').slideUp();

                break;
            case'5':
                jQuery('#setting_autoshowroom_social_icon_1').slideDown();
                jQuery('#setting_autoshowroom_social_url_1').slideDown();
                jQuery('#setting_autoshowroom_social_icon_2').slideDown();
                jQuery('#setting_autoshowroom_social_url_2').slideDown();
                jQuery('#setting_autoshowroom_social_icon_3').slideDown();
                jQuery('#setting_autoshowroom_social_url_3').slideDown();
                jQuery('#setting_autoshowroom_social_icon_4').slideDown();
                jQuery('#setting_autoshowroom_social_url_4').slideDown();
                jQuery('#setting_autoshowroom_social_icon_5').slideDown();
                jQuery('#setting_autoshowroom_social_url_5').slideDown();
                jQuery('#setting_autoshowroom_social_icon_6').slideUp();
                jQuery('#setting_autoshowroom_social_url_6').slideUp();
                jQuery('#setting_autoshowroom_social_icon_7').slideUp();
                jQuery('#setting_autoshowroom_social_url_7').slideUp();
                jQuery('#setting_autoshowroom_social_icon_8').slideUp();
                jQuery('#setting_autoshowroom_social_url_8').slideUp();
                jQuery('#setting_autoshowroom_social_icon_9').slideUp();
                jQuery('#setting_autoshowroom_social_url_9').slideUp();
                jQuery('#setting_autoshowroom_social_icon_10').slideUp();
                jQuery('#setting_autoshowroom_social_url_10').slideUp();

                break;
            case'6':
                jQuery('#setting_autoshowroom_social_icon_1').slideDown();
                jQuery('#setting_autoshowroom_social_url_1').slideDown();
                jQuery('#setting_autoshowroom_social_icon_2').slideDown();
                jQuery('#setting_autoshowroom_social_url_2').slideDown();
                jQuery('#setting_autoshowroom_social_icon_3').slideDown();
                jQuery('#setting_autoshowroom_social_url_3').slideDown();
                jQuery('#setting_autoshowroom_social_icon_4').slideDown();
                jQuery('#setting_autoshowroom_social_url_4').slideDown();
                jQuery('#setting_autoshowroom_social_icon_5').slideDown();
                jQuery('#setting_autoshowroom_social_url_5').slideDown();
                jQuery('#setting_autoshowroom_social_icon_6').slideDown();
                jQuery('#setting_autoshowroom_social_url_6').slideDown();
                jQuery('#setting_autoshowroom_social_icon_7').slideUp();
                jQuery('#setting_autoshowroom_social_url_7').slideUp();
                jQuery('#setting_autoshowroom_social_icon_8').slideUp();
                jQuery('#setting_autoshowroom_social_url_8').slideUp();
                jQuery('#setting_autoshowroom_social_icon_9').slideUp();
                jQuery('#setting_autoshowroom_social_url_9').slideUp();
                jQuery('#setting_autoshowroom_social_icon_10').slideUp();
                jQuery('#setting_autoshowroom_social_url_10').slideUp();

                break;
            case'7':
                jQuery('#setting_autoshowroom_social_icon_1').slideDown();
                jQuery('#setting_autoshowroom_social_url_1').slideDown();
                jQuery('#setting_autoshowroom_social_icon_2').slideDown();
                jQuery('#setting_autoshowroom_social_url_2').slideDown();
                jQuery('#setting_autoshowroom_social_icon_3').slideDown();
                jQuery('#setting_autoshowroom_social_url_3').slideDown();
                jQuery('#setting_autoshowroom_social_icon_4').slideDown();
                jQuery('#setting_autoshowroom_social_url_4').slideDown();
                jQuery('#setting_autoshowroom_social_icon_5').slideDown();
                jQuery('#setting_autoshowroom_social_url_5').slideDown();
                jQuery('#setting_autoshowroom_social_icon_6').slideDown();
                jQuery('#setting_autoshowroom_social_url_6').slideDown();
                jQuery('#setting_autoshowroom_social_icon_7').slideDown();
                jQuery('#setting_autoshowroom_social_url_7').slideDown();
                jQuery('#setting_autoshowroom_social_icon_8').slideUp();
                jQuery('#setting_autoshowroom_social_url_8').slideUp();
                jQuery('#setting_autoshowroom_social_icon_9').slideUp();
                jQuery('#setting_autoshowroom_social_url_9').slideUp();
                jQuery('#setting_autoshowroom_social_icon_10').slideUp();
                jQuery('#setting_autoshowroom_social_url_10').slideUp();

                break;
            case'8':
                jQuery('#setting_autoshowroom_social_icon_1').slideDown();
                jQuery('#setting_autoshowroom_social_url_1').slideDown();
                jQuery('#setting_autoshowroom_social_icon_2').slideDown();
                jQuery('#setting_autoshowroom_social_url_2').slideDown();
                jQuery('#setting_autoshowroom_social_icon_3').slideDown();
                jQuery('#setting_autoshowroom_social_url_3').slideDown();
                jQuery('#setting_autoshowroom_social_icon_4').slideDown();
                jQuery('#setting_autoshowroom_social_url_4').slideDown();
                jQuery('#setting_autoshowroom_social_icon_5').slideDown();
                jQuery('#setting_autoshowroom_social_url_5').slideDown();
                jQuery('#setting_autoshowroom_social_icon_6').slideDown();
                jQuery('#setting_autoshowroom_social_url_6').slideDown();
                jQuery('#setting_autoshowroom_social_icon_7').slideDown();
                jQuery('#setting_autoshowroom_social_url_7').slideDown();
                jQuery('#setting_autoshowroom_social_icon_8').slideDown();
                jQuery('#setting_autoshowroom_social_url_8').slideDown();
                jQuery('#setting_autoshowroom_social_icon_9').slideUp();
                jQuery('#setting_autoshowroom_social_url_9').slideUp();
                jQuery('#setting_autoshowroom_social_icon_10').slideUp();
                jQuery('#setting_autoshowroom_social_url_10').slideUp();

                break;
            case'9':
                jQuery('#setting_autoshowroom_social_icon_1').slideDown();
                jQuery('#setting_autoshowroom_social_url_1').slideDown();
                jQuery('#setting_autoshowroom_social_icon_2').slideDown();
                jQuery('#setting_autoshowroom_social_url_2').slideDown();
                jQuery('#setting_autoshowroom_social_icon_3').slideDown();
                jQuery('#setting_autoshowroom_social_url_3').slideDown();
                jQuery('#setting_autoshowroom_social_icon_4').slideDown();
                jQuery('#setting_autoshowroom_social_url_4').slideDown();
                jQuery('#setting_autoshowroom_social_icon_5').slideDown();
                jQuery('#setting_autoshowroom_social_url_5').slideDown();
                jQuery('#setting_autoshowroom_social_icon_6').slideDown();
                jQuery('#setting_autoshowroom_social_url_6').slideDown();
                jQuery('#setting_autoshowroom_social_icon_7').slideDown();
                jQuery('#setting_autoshowroom_social_url_7').slideDown();
                jQuery('#setting_autoshowroom_social_icon_8').slideDown();
                jQuery('#setting_autoshowroom_social_url_8').slideDown();
                jQuery('#setting_autoshowroom_social_icon_9').slideDown();
                jQuery('#setting_autoshowroom_social_url_9').slideDown();
                jQuery('#setting_autoshowroom_social_icon_10').slideUp();
                jQuery('#setting_autoshowroom_social_url_10').slideUp();

                break;
            case'10':
                jQuery('#setting_autoshowroom_social_icon_1').slideDown();
                jQuery('#setting_autoshowroom_social_url_1').slideDown();
                jQuery('#setting_autoshowroom_social_icon_2').slideDown();
                jQuery('#setting_autoshowroom_social_url_2').slideDown();
                jQuery('#setting_autoshowroom_social_icon_3').slideDown();
                jQuery('#setting_autoshowroom_social_url_3').slideDown();
                jQuery('#setting_autoshowroom_social_icon_4').slideDown();
                jQuery('#setting_autoshowroom_social_url_4').slideDown();
                jQuery('#setting_autoshowroom_social_icon_5').slideDown();
                jQuery('#setting_autoshowroom_social_url_5').slideDown();
                jQuery('#setting_autoshowroom_social_icon_6').slideDown();
                jQuery('#setting_autoshowroom_social_url_6').slideDown();
                jQuery('#setting_autoshowroom_social_icon_7').slideDown();
                jQuery('#setting_autoshowroom_social_url_7').slideDown();
                jQuery('#setting_autoshowroom_social_icon_8').slideDown();
                jQuery('#setting_autoshowroom_social_url_8').slideDown();
                jQuery('#setting_autoshowroom_social_icon_9').slideDown();
                jQuery('#setting_autoshowroom_social_url_9').slideDown();
                jQuery('#setting_autoshowroom_social_icon_10').slideDown();
                jQuery('#setting_autoshowroom_social_url_10').slideDown();

                break;
            default :
                jQuery('#setting_autoshowroom_social_icon_1').slideDown();
                jQuery('#setting_autoshowroom_social_url_1').slideDown();
                jQuery('#setting_autoshowroom_social_icon_2').slideDown();
                jQuery('#setting_autoshowroom_social_url_2').slideDown();
                jQuery('#setting_autoshowroom_social_icon_3').slideDown();
                jQuery('#setting_autoshowroom_social_url_3').slideDown();
                jQuery('#setting_autoshowroom_social_icon_4').slideDown();
                jQuery('#setting_autoshowroom_social_url_4').slideDown();
                jQuery('#setting_autoshowroom_social_icon_5').slideDown();
                jQuery('#setting_autoshowroom_social_url_5').slideDown();
                jQuery('#setting_autoshowroom_social_icon_6').slideDown();
                jQuery('#setting_autoshowroom_social_url_6').slideDown();
                jQuery('#setting_autoshowroom_social_icon_7').slideDown();
                jQuery('#setting_autoshowroom_social_url_7').slideDown();
                jQuery('#setting_autoshowroom_social_icon_8').slideDown();
                jQuery('#setting_autoshowroom_social_url_8').slideDown();
                jQuery('#setting_autoshowroom_social_icon_9').slideDown();
                jQuery('#setting_autoshowroom_social_url_9').slideDown();
                jQuery('#setting_autoshowroom_social_icon_10').slideDown();
                jQuery('#setting_autoshowroom_social_url_10').slideDown();
                break;
        }
    });
    var socialvalue =  jQuery('#autoshowroom_footer_social_number').attr('value');

    switch (socialvalue){
        case'1':
            jQuery('#setting_autoshowroom_social_icon_1').slideDown();
            jQuery('#setting_autoshowroom_social_url_1').slideDown();
            jQuery('#setting_autoshowroom_social_icon_2').slideUp();
            jQuery('#setting_autoshowroom_social_url_2').slideUp();
            jQuery('#setting_autoshowroom_social_icon_3').slideUp();
            jQuery('#setting_autoshowroom_social_url_3').slideUp();
            jQuery('#setting_autoshowroom_social_icon_4').slideUp();
            jQuery('#setting_autoshowroom_social_url_4').slideUp();
            jQuery('#setting_autoshowroom_social_icon_5').slideUp();
            jQuery('#setting_autoshowroom_social_url_5').slideUp();
            jQuery('#setting_autoshowroom_social_icon_6').slideUp();
            jQuery('#setting_autoshowroom_social_url_6').slideUp();
            jQuery('#setting_autoshowroom_social_icon_7').slideUp();
            jQuery('#setting_autoshowroom_social_url_7').slideUp();
            jQuery('#setting_autoshowroom_social_icon_8').slideUp();
            jQuery('#setting_autoshowroom_social_url_8').slideUp();
            jQuery('#setting_autoshowroom_social_icon_9').slideUp();
            jQuery('#setting_autoshowroom_social_url_9').slideUp();
            jQuery('#setting_autoshowroom_social_icon_10').slideUp();
            jQuery('#setting_autoshowroom_social_url_10').slideUp();

            break;
        case'2':
            jQuery('#setting_autoshowroom_social_icon_1').slideDown();
            jQuery('#setting_autoshowroom_social_url_1').slideDown();
            jQuery('#setting_autoshowroom_social_icon_2').slideDown();
            jQuery('#setting_autoshowroom_social_url_2').slideDown();
            jQuery('#setting_autoshowroom_social_icon_3').slideUp();
            jQuery('#setting_autoshowroom_social_url_3').slideUp();
            jQuery('#setting_autoshowroom_social_icon_4').slideUp();
            jQuery('#setting_autoshowroom_social_url_4').slideUp();
            jQuery('#setting_autoshowroom_social_icon_5').slideUp();
            jQuery('#setting_autoshowroom_social_url_5').slideUp();
            jQuery('#setting_autoshowroom_social_icon_6').slideUp();
            jQuery('#setting_autoshowroom_social_url_6').slideUp();
            jQuery('#setting_autoshowroom_social_icon_7').slideUp();
            jQuery('#setting_autoshowroom_social_url_7').slideUp();
            jQuery('#setting_autoshowroom_social_icon_8').slideUp();
            jQuery('#setting_autoshowroom_social_url_8').slideUp();
            jQuery('#setting_autoshowroom_social_icon_9').slideUp();
            jQuery('#setting_autoshowroom_social_url_9').slideUp();
            jQuery('#setting_autoshowroom_social_icon_10').slideUp();
            jQuery('#setting_autoshowroom_social_url_10').slideUp();

            break;
        case'3':
            jQuery('#setting_autoshowroom_social_icon_1').slideDown();
            jQuery('#setting_autoshowroom_social_url_1').slideDown();
            jQuery('#setting_autoshowroom_social_icon_2').slideDown();
            jQuery('#setting_autoshowroom_social_url_2').slideDown();
            jQuery('#setting_autoshowroom_social_icon_3').slideDown();
            jQuery('#setting_autoshowroom_social_url_3').slideDown();
            jQuery('#setting_autoshowroom_social_icon_4').slideUp();
            jQuery('#setting_autoshowroom_social_url_4').slideUp();
            jQuery('#setting_autoshowroom_social_icon_5').slideUp();
            jQuery('#setting_autoshowroom_social_url_5').slideUp();
            jQuery('#setting_autoshowroom_social_icon_6').slideUp();
            jQuery('#setting_autoshowroom_social_url_6').slideUp();
            jQuery('#setting_autoshowroom_social_icon_7').slideUp();
            jQuery('#setting_autoshowroom_social_url_7').slideUp();
            jQuery('#setting_autoshowroom_social_icon_8').slideUp();
            jQuery('#setting_autoshowroom_social_url_8').slideUp();
            jQuery('#setting_autoshowroom_social_icon_9').slideUp();
            jQuery('#setting_autoshowroom_social_url_9').slideUp();
            jQuery('#setting_autoshowroom_social_icon_10').slideUp();
            jQuery('#setting_autoshowroom_social_url_10').slideUp();

            break;
        case'4':
            jQuery('#setting_autoshowroom_social_icon_1').slideDown();
            jQuery('#setting_autoshowroom_social_url_1').slideDown();
            jQuery('#setting_autoshowroom_social_icon_2').slideDown();
            jQuery('#setting_autoshowroom_social_url_2').slideDown();
            jQuery('#setting_autoshowroom_social_icon_3').slideDown();
            jQuery('#setting_autoshowroom_social_url_3').slideDown();
            jQuery('#setting_autoshowroom_social_icon_4').slideDown();
            jQuery('#setting_autoshowroom_social_url_4').slideDown();
            jQuery('#setting_autoshowroom_social_icon_5').slideUp();
            jQuery('#setting_autoshowroom_social_url_5').slideUp();
            jQuery('#setting_autoshowroom_social_icon_6').slideUp();
            jQuery('#setting_autoshowroom_social_url_6').slideUp();
            jQuery('#setting_autoshowroom_social_icon_7').slideUp();
            jQuery('#setting_autoshowroom_social_url_7').slideUp();
            jQuery('#setting_autoshowroom_social_icon_8').slideUp();
            jQuery('#setting_autoshowroom_social_url_8').slideUp();
            jQuery('#setting_autoshowroom_social_icon_9').slideUp();
            jQuery('#setting_autoshowroom_social_url_9').slideUp();
            jQuery('#setting_autoshowroom_social_icon_10').slideUp();
            jQuery('#setting_autoshowroom_social_url_10').slideUp();

            break;
        case'5':
            jQuery('#setting_autoshowroom_social_icon_1').slideDown();
            jQuery('#setting_autoshowroom_social_url_1').slideDown();
            jQuery('#setting_autoshowroom_social_icon_2').slideDown();
            jQuery('#setting_autoshowroom_social_url_2').slideDown();
            jQuery('#setting_autoshowroom_social_icon_3').slideDown();
            jQuery('#setting_autoshowroom_social_url_3').slideDown();
            jQuery('#setting_autoshowroom_social_icon_4').slideDown();
            jQuery('#setting_autoshowroom_social_url_4').slideDown();
            jQuery('#setting_autoshowroom_social_icon_5').slideDown();
            jQuery('#setting_autoshowroom_social_url_5').slideDown();
            jQuery('#setting_autoshowroom_social_icon_6').slideUp();
            jQuery('#setting_autoshowroom_social_url_6').slideUp();
            jQuery('#setting_autoshowroom_social_icon_7').slideUp();
            jQuery('#setting_autoshowroom_social_url_7').slideUp();
            jQuery('#setting_autoshowroom_social_icon_8').slideUp();
            jQuery('#setting_autoshowroom_social_url_8').slideUp();
            jQuery('#setting_autoshowroom_social_icon_9').slideUp();
            jQuery('#setting_autoshowroom_social_url_9').slideUp();
            jQuery('#setting_autoshowroom_social_icon_10').slideUp();
            jQuery('#setting_autoshowroom_social_url_10').slideUp();

            break;
        case'6':
            jQuery('#setting_autoshowroom_social_icon_1').slideDown();
            jQuery('#setting_autoshowroom_social_url_1').slideDown();
            jQuery('#setting_autoshowroom_social_icon_2').slideDown();
            jQuery('#setting_autoshowroom_social_url_2').slideDown();
            jQuery('#setting_autoshowroom_social_icon_3').slideDown();
            jQuery('#setting_autoshowroom_social_url_3').slideDown();
            jQuery('#setting_autoshowroom_social_icon_4').slideDown();
            jQuery('#setting_autoshowroom_social_url_4').slideDown();
            jQuery('#setting_autoshowroom_social_icon_5').slideDown();
            jQuery('#setting_autoshowroom_social_url_5').slideDown();
            jQuery('#setting_autoshowroom_social_icon_6').slideDown();
            jQuery('#setting_autoshowroom_social_url_6').slideDown();
            jQuery('#setting_autoshowroom_social_icon_7').slideUp();
            jQuery('#setting_autoshowroom_social_url_7').slideUp();
            jQuery('#setting_autoshowroom_social_icon_8').slideUp();
            jQuery('#setting_autoshowroom_social_url_8').slideUp();
            jQuery('#setting_autoshowroom_social_icon_9').slideUp();
            jQuery('#setting_autoshowroom_social_url_9').slideUp();
            jQuery('#setting_autoshowroom_social_icon_10').slideUp();
            jQuery('#setting_autoshowroom_social_url_10').slideUp();

            break;
        case'7':
            jQuery('#setting_autoshowroom_social_icon_1').slideDown();
            jQuery('#setting_autoshowroom_social_url_1').slideDown();
            jQuery('#setting_autoshowroom_social_icon_2').slideDown();
            jQuery('#setting_autoshowroom_social_url_2').slideDown();
            jQuery('#setting_autoshowroom_social_icon_3').slideDown();
            jQuery('#setting_autoshowroom_social_url_3').slideDown();
            jQuery('#setting_autoshowroom_social_icon_4').slideDown();
            jQuery('#setting_autoshowroom_social_url_4').slideDown();
            jQuery('#setting_autoshowroom_social_icon_5').slideDown();
            jQuery('#setting_autoshowroom_social_url_5').slideDown();
            jQuery('#setting_autoshowroom_social_icon_6').slideDown();
            jQuery('#setting_autoshowroom_social_url_6').slideDown();
            jQuery('#setting_autoshowroom_social_icon_7').slideDown();
            jQuery('#setting_autoshowroom_social_url_7').slideDown();
            jQuery('#setting_autoshowroom_social_icon_8').slideUp();
            jQuery('#setting_autoshowroom_social_url_8').slideUp();
            jQuery('#setting_autoshowroom_social_icon_9').slideUp();
            jQuery('#setting_autoshowroom_social_url_9').slideUp();
            jQuery('#setting_autoshowroom_social_icon_10').slideUp();
            jQuery('#setting_autoshowroom_social_url_10').slideUp();

            break;
        case'8':
            jQuery('#setting_autoshowroom_social_icon_1').slideDown();
            jQuery('#setting_autoshowroom_social_url_1').slideDown();
            jQuery('#setting_autoshowroom_social_icon_2').slideDown();
            jQuery('#setting_autoshowroom_social_url_2').slideDown();
            jQuery('#setting_autoshowroom_social_icon_3').slideDown();
            jQuery('#setting_autoshowroom_social_url_3').slideDown();
            jQuery('#setting_autoshowroom_social_icon_4').slideDown();
            jQuery('#setting_autoshowroom_social_url_4').slideDown();
            jQuery('#setting_autoshowroom_social_icon_5').slideDown();
            jQuery('#setting_autoshowroom_social_url_5').slideDown();
            jQuery('#setting_autoshowroom_social_icon_6').slideDown();
            jQuery('#setting_autoshowroom_social_url_6').slideDown();
            jQuery('#setting_autoshowroom_social_icon_7').slideDown();
            jQuery('#setting_autoshowroom_social_url_7').slideDown();
            jQuery('#setting_autoshowroom_social_icon_8').slideDown();
            jQuery('#setting_autoshowroom_social_url_8').slideDown();
            jQuery('#setting_autoshowroom_social_icon_9').slideUp();
            jQuery('#setting_autoshowroom_social_url_9').slideUp();
            jQuery('#setting_autoshowroom_social_icon_10').slideUp();
            jQuery('#setting_autoshowroom_social_url_10').slideUp();

            break;
        case'9':
            jQuery('#setting_autoshowroom_social_icon_1').slideDown();
            jQuery('#setting_autoshowroom_social_url_1').slideDown();
            jQuery('#setting_autoshowroom_social_icon_2').slideDown();
            jQuery('#setting_autoshowroom_social_url_2').slideDown();
            jQuery('#setting_autoshowroom_social_icon_3').slideDown();
            jQuery('#setting_autoshowroom_social_url_3').slideDown();
            jQuery('#setting_autoshowroom_social_icon_4').slideDown();
            jQuery('#setting_autoshowroom_social_url_4').slideDown();
            jQuery('#setting_autoshowroom_social_icon_5').slideDown();
            jQuery('#setting_autoshowroom_social_url_5').slideDown();
            jQuery('#setting_autoshowroom_social_icon_6').slideDown();
            jQuery('#setting_autoshowroom_social_url_6').slideDown();
            jQuery('#setting_autoshowroom_social_icon_7').slideDown();
            jQuery('#setting_autoshowroom_social_url_7').slideDown();
            jQuery('#setting_autoshowroom_social_icon_8').slideDown();
            jQuery('#setting_autoshowroom_social_url_8').slideDown();
            jQuery('#setting_autoshowroom_social_icon_9').slideDown();
            jQuery('#setting_autoshowroom_social_url_9').slideDown();
            jQuery('#setting_autoshowroom_social_icon_10').slideUp();
            jQuery('#setting_autoshowroom_social_url_10').slideUp();

            break;
        case'10':
            jQuery('#setting_autoshowroom_social_icon_1').slideDown();
            jQuery('#setting_autoshowroom_social_url_1').slideDown();
            jQuery('#setting_autoshowroom_social_icon_2').slideDown();
            jQuery('#setting_autoshowroom_social_url_2').slideDown();
            jQuery('#setting_autoshowroom_social_icon_3').slideDown();
            jQuery('#setting_autoshowroom_social_url_3').slideDown();
            jQuery('#setting_autoshowroom_social_icon_4').slideDown();
            jQuery('#setting_autoshowroom_social_url_4').slideDown();
            jQuery('#setting_autoshowroom_social_icon_5').slideDown();
            jQuery('#setting_autoshowroom_social_url_5').slideDown();
            jQuery('#setting_autoshowroom_social_icon_6').slideDown();
            jQuery('#setting_autoshowroom_social_url_6').slideDown();
            jQuery('#setting_autoshowroom_social_icon_7').slideDown();
            jQuery('#setting_autoshowroom_social_url_7').slideDown();
            jQuery('#setting_autoshowroom_social_icon_8').slideDown();
            jQuery('#setting_autoshowroom_social_url_8').slideDown();
            jQuery('#setting_autoshowroom_social_icon_9').slideDown();
            jQuery('#setting_autoshowroom_social_url_9').slideDown();
            jQuery('#setting_autoshowroom_social_icon_10').slideDown();
            jQuery('#setting_autoshowroom_social_url_10').slideDown();

            break;
        default :
            jQuery('#setting_autoshowroom_social_icon_1').slideDown();
            jQuery('#setting_autoshowroom_social_url_1').slideDown();
            jQuery('#setting_autoshowroom_social_icon_2').slideDown();
            jQuery('#setting_autoshowroom_social_url_2').slideDown();
            jQuery('#setting_autoshowroom_social_icon_3').slideDown();
            jQuery('#setting_autoshowroom_social_url_3').slideDown();
            jQuery('#setting_autoshowroom_social_icon_4').slideDown();
            jQuery('#setting_autoshowroom_social_url_4').slideDown();
            jQuery('#setting_autoshowroom_social_icon_5').slideDown();
            jQuery('#setting_autoshowroom_social_url_5').slideDown();
            jQuery('#setting_autoshowroom_social_icon_6').slideDown();
            jQuery('#setting_autoshowroom_social_url_6').slideDown();
            jQuery('#setting_autoshowroom_social_icon_7').slideDown();
            jQuery('#setting_autoshowroom_social_url_7').slideDown();
            jQuery('#setting_autoshowroom_social_icon_8').slideDown();
            jQuery('#setting_autoshowroom_social_url_8').slideDown();
            jQuery('#setting_autoshowroom_social_icon_9').slideDown();
            jQuery('#setting_autoshowroom_social_url_9').slideDown();
            jQuery('#setting_autoshowroom_social_icon_10').slideDown();
            jQuery('#setting_autoshowroom_social_url_10').slideDown();
            break;
    }

});



// Background Type Event

jQuery('#autoshowroom_background_type').on('change', function () {
    "use strict";

    var value = jQuery(this).val();
    if (String(value) === 'none') {
        jQuery('#setting_autoshowroom_background_pattern, ' +
            '#setting_autoshowroom_background_single_image').slideUp();
        jQuery('#setting_autoshowroom_TZBackgroundColor').slideDown();
    }else if (String(value) === 'pattern') {
        jQuery('#setting_autoshowroom_background_pattern').slideDown();
        jQuery('#setting_autoshowroom_background_single_image').slideUp();
        jQuery('#setting_autoshowroom_TZBackgroundColor').slideUp();
    }else {
        jQuery('#setting_autoshowroom_background_pattern').slideUp();
        jQuery('#setting_autoshowroom_background_single_image').slideDown();
        jQuery('#setting_autoshowroom_TZBackgroundColor').slideUp();
    }
});

var background_type = jQuery('#autoshowroom_background_type').val();
if (String(background_type) === 'none') {
    jQuery('#setting_autoshowroom_background_pattern, ' +
        '#setting_autoshowroom_background_single_image').slideUp();
    jQuery('#setting_autoshowroom_TZBackgroundColor').slideDown();
}else if (String(background_type) === 'pattern') {
    jQuery('#setting_autoshowroom_background_pattern').slideDown();
    jQuery('#setting_autoshowroom_background_single_image').slideUp();
} else {
    jQuery('#setting_autoshowroom_background_pattern').slideUp();
    jQuery('#setting_autoshowroom_background_single_image').slideDown();

}

// Background Pattern Preview
jQuery('#setting_autoshowroom_background_pattern .background_pattern').on('click', function () {
    "use strict";
    if (jQuery('#wpcontent').length > 0) {
        jQuery('#wpcontent').css('background', 'url("' + jQuery(this).attr('src') + '") repeat');
    }
});