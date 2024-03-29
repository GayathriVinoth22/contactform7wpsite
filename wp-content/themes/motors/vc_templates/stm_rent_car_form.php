<?php
$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$args = array(
    'post_type' => 'stm_office',
    'posts_per_page' => -1,
    'post_status' => 'publish'
);

$style_type = 'style_1';
if(!empty($style) and $style == 'style_2') {
    $style_type = 'style_2';
}

$workHr = '';
if(!empty($office_working_hours)) {
    $tm = explode('-', $office_working_hours);
    $workHr = array();
    for($i=$tm[0];$i<=end($tm);$i++) {
        $workHr[] = $i . ':00';
    }
}

$fields = stm_get_rental_order_fields_values(true);
$locations = stm_rental_locations(true);
$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' '));

$form_url = stm_woo_shop_page_url();
$reserv_url = stm_woo_shop_page_url();
$items = stm_get_cart_items();
if(!empty($items['car_class'])) {
    $form_url = stm_woo_shop_checkout_url();
}

$dFormat = get_option('date_format');
$tFormat = 'H:i';
$dFormat = (preg_match_all("/[d].[m].[yY]/", $dFormat)) ? 'm/d/Y' : $dFormat;

$dateTimeFormat = $dFormat . " " . $tFormat;
$my_locale = explode('_', get_locale());
?>

<div class="stm_rent_car_form_wrapper <?php echo esc_attr($style_type . ' ' . $align . ' ' . $css_class); ?>">
    <div class="stm_rent_car_form">
        <form action="<?php echo esc_url($form_url); ?>" method="get">
            <h4><?php esc_html_e('Pick Up', 'motors'); ?></h4>
            <div class="stm_rent_form_fields">
                <h4 class="stm_form_title"><?php esc_html_e('Place to pick up the Car*', 'motors'); ?></h4>
                <div class="stm_pickup_location">
                    <i class="stm-service-icon-pin"></i>
                    <select name="pickup_location" data-class="stm_rent_location">
                        <option value=""><?php esc_html_e('Choose office', 'motors'); ?></option>
                        <?php if(!empty($locations)): ?>
                            <?php foreach($locations as $location): ?>
                                <option value="<?php echo sanitize_text_field($location[5]) ?>" <?php echo (esc_attr($location[5]) == $fields['pickup_location_id']) ? 'selected="selected"' : ''; ?>><?php echo sanitize_text_field($location[4]) ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <label>
                    <input type="checkbox" name="return_same" <?php echo (esc_attr($fields['return_same']) == 'on') ? 'checked' : ''; ?>/>
                    <?php esc_html_e('Return to the same location', 'motors'); ?>
                </label>
                <div class="stm_date_time_input">
                    <h4 class="stm_form_title"><?php esc_html_e('Pick-up Date/Time*', 'motors'); ?></h4>
                    <div class="stm_date_input">
                        <input type="text" value="<?php echo sanitize_text_field($fields['pickup_date']) ?>" class="stm-date-timepicker-start" name="pickup_date" placeholder="<?php esc_attr_e('Pickup Date', 'motors') ?>" required readonly/>
                        <i class="stm-icon-date"></i>
                    </div>
                </div>
            </div>

            <h4><?php esc_html_e('Return', 'motors'); ?></h4>
            <div class="stm_rent_form_fields stm_rent_form_fields-drop">
                <div class="stm_same_return <?php echo (esc_attr($fields['return_same']) == 'on') ? '' : 'active'; ?>">
                    <h4 class="stm_form_title"><?php esc_html_e('Place to drop the Car*', 'motors'); ?></h4>
                    <div class="stm_pickup_location stm_drop_location">
                        <i class="stm-service-icon-pin"></i>
                        <select name="drop_location" data-class="stm_rent_location">
                            <option value=""><?php esc_html_e('Choose office', 'motors'); ?></option>
                            <?php if (!empty($locations)): ?>
                                <?php foreach ($locations as $location): ?>
                                    <option
                                        <?php echo (esc_attr($location[5]) == $fields['return_location_id']) ? 'selected="selected"' : ''; ?>
                                        value="<?php echo sanitize_text_field($location[5]) ?>"><?php echo sanitize_text_field($location[4]) ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                    </div>
                </div>
                <div class="stm_date_time_input">
                    <h4 class="stm_form_title"><?php esc_html_e('Drop Date/Time*', 'motors'); ?></h4>
                    <div class="stm_date_input">
                        <input type="text" class="stm-date-timepicker-end" name="return_date"
                               value="<?php echo sanitize_text_field($fields['return_date']) ?>"
                               placeholder="<?php esc_attr_e('Return Date', 'motors') ?>" required readonly/>
                        <i class="stm-icon-date"></i>
                    </div>
                </div>
            </div>
            <?php
            $oldDays = stm_get_rental_order_fields_values();
            if(!empty($oldDays['order_days'])):
            ?>
                <input type="hidden" name="order_old_days" value="<?php echo esc_attr($oldDays['order_days']); ?>" />
            <?php endif; ?>
			<?php if(isset($_GET["lang"])): ?>
	            <input type="hidden" name="lang" value="<?php echo esc_attr($_GET["lang"]); ?>" />
	        <?php endif; ?>
            <?php if ($style_type == 'style_1'): ?>
                <div class="form-btn-wrap">
                <button type="submit"><?php esc_html_e('Find a vehicle', 'motors'); ?><i
                        class="fa fa-arrow-right"></i></button>
                <?php if(!empty($fields['pickup_date']) && !empty($fields['return_date'])):?>
                    <button type="submit" class="clear-data" data-type="clear-data"><?php esc_html_e('Clear Data', 'motors'); ?></button>
                <?php endif; ?>
                </div>
            <?php else: ?>
                <button type="submit"><?php esc_html_e('Continue reservation', 'motors'); ?></button>
            <?php endif; ?>


        </form>
    </div>
</div>

<script>
    (function($) {
        "use strict";

        $(document).ready(function(){
            $('input[name="return_same"]').on('change', function(){
               if($(this).prop('checked')) {
                   $('.stm_same_return').slideUp();
               } else {
                   $('.stm_same_return').slideDown();
               }
            });

            $('.stm_pickup_location select').on('select2:open', function() {
                $('body').addClass('stm_background_overlay');
                $('.select2-container').css('width', $('.select2-dropdown').outerWidth());
            });

            $('.stm_pickup_location select').on('select2:close', function(){
                $('body').removeClass('stm_background_overlay');
            });

            $('.stm_date_time_input input').on('change', function(){
               if($(this).val() == '') {
                   $(this).removeClass('active');
               } else {
                   $(this).addClass('active');
               }
            });


            var locations = <?php echo json_encode( $locations ); ?>;
            var contents = [];
            var content = '';
            var i = 0;


            for (i = 0; i < locations.length; i++) {
                content = '<ul class="stm_locations_description <?php echo esc_attr($align . '_position') ?>">';
                content += '<li>' + locations[i][0] + '</li>';
                content += '</ul>';

                contents.push(content);
            }

            $(document).on('mouseover', '.stm_rent_location .select2-results__options li', function(){
                var currentLi = ($(this).index()) - 1;
                $('.stm_rent_location .stm_locations_description').remove();
                $('.stm_rent_location').append(contents[currentLi]);
            });


            /*Timepicker*/
            var stmToday = new Date();
            var stmTomorrow = new Date(+new Date() + 86400000);
            var stmStartDate = false;
            var stmEndDate = false;
            var startDate = false;
            var endDate = false;
            var dateTimeFormat = '<?php echo stm_do_lmth($dateTimeFormat); ?>';
            var dateTimeFormatHide = 'YYYY/MM/DD HH:mm';

            $('.stm-date-timepicker-start').datetimepicker({
                formatTime: 'H:i',
                formatDate: '<?php echo stm_do_lmth($dFormat); ?>',
                format: dateTimeFormat,
                dayOfWeekStart: <?php echo get_option('start_of_week');?>,
                defaultDate: stmToday,
                defaultSelect: false,
                closeOnDateSelect: false,
                timeHeightInTimePicker: 40,
                validateOnBlur: false,
                <?php if(!empty($workHr)): ?>
                allowTimes: <?php echo json_encode($workHr);?>,
                <?php endif; ?>
                fixed: false,
                lang: '<?php echo stm_do_lmth($my_locale[0]); ?>',
                onShow: function( ct ) {
                    $('body').addClass('stm_background_overlay stm-lock');

                    var stmEndDate = $('.stm-date-timepicker-end').val() ? moment(endDate).format(dateTimeFormatHide) : false;

                    if(stmEndDate) {
                        stmEndDate = stmEndDate.split(' ');
                        stmEndDate = new Date(stmEndDate[0]);
                    }

                    this.setOptions({
                        minDate: new Date(),
                        maxDate: stmEndDate
                    });

                    $(".xdsoft_time_variant").css('margin-top', '-600px');
                },
                onSelectDate: function() {
                    $('.stm-date-timepicker-start').datetimepicker('close');

                    $('.xdsoft_time').removeClass('xdsoft_current');
                },
                onClose: function( ct,$i ) {
                    startDate = ct;

                    if(ct < new Date()) {
                        $('.stm-date-timepicker-start').datetimepicker('reset');
                    }

                    $('.stm-date-timepicker-start').attr('data-dt-hide', moment(ct).format('M/D/YYYY HH:mm'));

                    if(startDate && endDate) {
                        checkDate(moment(startDate).format(dateTimeFormatHide), moment(endDate).format(dateTimeFormatHide));
                    }

                    $('body').removeClass('stm_background_overlay stm-lock');

                },
                onGenerate: function () {
                    if($('.stm-date-timepicker-start').val() == '') {
                        $('.xdsoft_time').removeClass('xdsoft_current');
                    }
                }
            });

            $('.stm-date-timepicker-end').datetimepicker({
                formatTime: 'H:i',
                formatDate: '<?php echo stm_do_lmth($dFormat); ?>',
                format:dateTimeFormat,
                dayOfWeekStart: <?php echo get_option('start_of_week');?>,
                defaultDate: stmTomorrow,
                defaultSelect: false,
                closeOnDateSelect: false,
                timeHeightInTimePicker: 40,
                validateOnBlur: false,
                <?php if(!empty($workHr)): ?>
                allowTimes: <?php echo json_encode($workHr);?>,
                <?php endif; ?>
                fixed: false,
                lang: '<?php echo stm_do_lmth($my_locale[0]); ?>',
                onShow:function( ct ){
                    $('body').addClass('stm_background_overlay stm-lock');

                    var stmStartDate = $('.stm-date-timepicker-start').val() ? moment(startDate).format(dateTimeFormatHide) : false;

                    if(stmStartDate) {
                        stmStartDate = stmStartDate.split(' ');
                        stmStartDate = new Date(stmStartDate[0]);
                    } else {
                        stmStartDate = new Date();
                    }

                    stmStartDate.setDate(stmStartDate.getDate() + 1);

                    //if($('.stm-date-timepicker-end').val()) stmStartDate = new Date($('.stm-date-timepicker-end').val().split(' ')[0]);
                    this.setOptions({
                        minDate: stmStartDate
                    })
                },
                onSelectDate: function() {
                    if($('.stm-date-timepicker-start').val() != '' && $('.stm-date-timepicker-end').val() != '') {
                        checkDate(moment(startDate).format(dateTimeFormatHide), moment(endDate).format(dateTimeFormatHide));
					}

                    $('.xdsoft_time').removeClass('xdsoft_current');
                    $('.stm-date-timepicker-end').datetimepicker('close');
                },
                onClose: function( ct, $i ) {
                    endDate = ct;

                    if(ct < new Date()) {
                        $('.stm-date-timepicker-end').datetimepicker('reset');
                    }

                    $('.stm-date-timepicker-end').attr('data-dt-hide', moment(ct).format('M/D/YYYY HH:mm'));
                    $('body').removeClass('stm_background_overlay stm-lock');
                },
                onGenerate: function () {
                    if($('.stm-date-timepicker-end').val() == '') {
                        $('.xdsoft_time').removeClass('xdsoft_current');
                    }
                }
            });

            $('.clear-data').on('click', function (e) {
                e.preventDefault();

                $('.stm_rent_car_form form').attr('action', '<?php echo stm_do_lmth($reserv_url); ?>');

                jQuery.ajax({
                    url: ajaxurl,
                    type: "GET",
                    dataType: 'json',
                    context: this,
                    data: 'action=stm_ajax_clear_data&security=' + clearData,
                    success: function (data) {}
                });

                $.each($('.stm_rent_car_form form').serializeArray(), function (i, field) {
                    if(field.name == 'pickup_location' || field.name == 'drop_location') {
                        $("select[name='pickup_location']").val('').trigger('change');
                        $("select[name='drop_location']").val('').trigger('change');
                    } else {
                        $('input[name="' + field.name + '"]').val('');
                    }

                    $.cookie('stm_' + field.name + '_' + stm_site_blog_id, '', { expires: -1, path: '/' });
                    $.cookie('stm_car_watched', '', { expires: -1, path: '/' });
                });

                $(this).hide();

                return false;
            });

            /*Set cookie with order data*/
            $('.stm_rent_car_form form').on('submit', function (e) {
                $('.stm_pickup_location').removeClass('stm_error');

                /*Save in cookies all fields*/
                if($.cookie('stm_pickup_date_' + stm_site_blog_id) != null) {
                    $.cookie('stm_pickup_date_old_' + stm_site_blog_id, $.cookie('stm_pickup_date_' + stm_site_blog_id), {expires: 7, path: '/'});
                    $.cookie('stm_return_date_old_' + stm_site_blog_id, $.cookie('stm_return_date_' + stm_site_blog_id), {expires: 7, path: '/'});
                }

                $.each($(this).serializeArray(), function (i, field) {
                    $.cookie('stm_' + field.name + '_' + stm_site_blog_id, encodeURIComponent(field.value), {expires: 7, path: '/'});

                    if(field.name == 'pickup_date' || field.name == 'return_date') {
                        $.cookie('stm_calc_' + field.name + '_' + stm_site_blog_id, $('input[name="' + field.name + '"]').attr('data-dt-hide'), {expires: 7, path: '/'});
                    }
                });


                if(!$('input[name="return_same"]').prop('checked')) {
                    $.cookie('stm_return_same_' + stm_site_blog_id, "off", {expires: 7, path: '/'});
                }

                var stm_pickup_location = $('.stm_pickup_location select').val();
                var return_same = $('input[name="return_same"]').prop('checked');
                var stm_drop_location = $('.stm_drop_location select').val();

                var error = false;
                if (stm_pickup_location == '') {
                    $('.stm_pickup_location:not(".stm_drop_location")').addClass('stm_error');
                    error = true;
                }

                if (return_same == '' && stm_drop_location == '') {
                    $('.stm_drop_location').addClass('stm_error');
                    error = true;
                }

                if (error) {
                    e.preventDefault();
                }
            });

            $('.stm-template-car_rental .stm_rent_order_info .image.image-placeholder a').on('click', function(e){
                var $stmThis = $('.stm_rent_car_form form');
                $stmThis.submit();
                e.preventDefault();
            });

			$('body').on('click touchstart', '.stm-rental-overlay', function(e) {
			    $('.stm-date-timepicker-start').blur();
			    $('.stm-date-timepicker-end').blur();
                $('.xdsoft_datetimepicker').hide();
                $('body').removeClass('stm_background_overlay');
			});

        });

    })(jQuery);

    function checkDate ($start, $end) {

        var locationId = jQuery('select[name="pickup_location"]').select2("val");
		var stm_timeout_rental;
        if(locationId != '') {
            jQuery.ajax({
                url: ajaxurl,
                type: "GET",
                dataType: 'json',
                context: this,
                data: 'startDate=' + $start + '&endDate=' + $end + '&action=stm_ajax_check_is_available_car_date&security=' + availableCarDate,
                success: function (data) {
                    jQuery("#select-vehicle-popup").attr("href", $("#select-vehicle-popup").attr('href').split("?")[0] + "?pickup_location=" + locationId);
                    if (data != '') {
                        clearTimeout(stm_timeout_rental);
                        jQuery('.choose-another-class').addClass('single-add-to-compare-visible');
                        jQuery(".choose-another-class").addClass('car-reserved');
                        jQuery(".choose-another-class").find(".stm-title.h5").html(data);
                        stm_timeout_rental = setTimeout(function () {
                            jQuery('.choose-another-class').removeClass('single-add-to-compare-visible').removeClass('car-reserved');
                        }, 10000);
                    }
                }
            });
        }
    }
</script>