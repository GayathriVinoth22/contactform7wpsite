<?php


update_option( 'ot_hide_cleanup', 1 );
/*
 * Initialize the options before anything else.
 */

/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );

add_action('admin_init','autoshowroom_theme_options',1);

/*
 * Build the custom settings & update OptionTree.
*/

function tz_autoshowroom_get_fields(){
    global $car_dealer;

    if ( is_plugin_active( 'progression-car-dealer-master/progression-car-dealer.php' ) ) {
        $fields = $car_dealer->fields->get_registered_fields('specs');
        $auto_fields = array();

        if( $fields != null){
            foreach ($fields as $i => $field) {
                $auto_fields[$i]['value'] = $field['name'];
                $auto_fields[$i]['label'] = $field['label'];
                $auto_fields[$i]['src'] = '';
            }
        }else{
            $auto_fields[0]['value'] = 'none';
            $auto_fields[0]['label'] = 'no Specifications ';
            $auto_fields[0]['src'] = '';
        }

        return $auto_fields;
    }
}

function tz_autoshowroom_get_fields_icon(){
    global $car_dealer;
    if ( is_plugin_active( 'progression-car-dealer-master/progression-car-dealer.php' ) ) {
        $fields = $car_dealer->fields->get_registered_fields('specs');
        $auto_fields_icon = array();
        if( $fields != null){
            foreach ($fields as $i => $field) {
                $auto_fields_icon[$i]['id'] = 'spec_' . $field['name'];
                $auto_fields_icon[$i]['label'] = 'Icon ' . $field['label'];
                $auto_fields_icon[$i]['type'] = 'text';
                $auto_fields_icon[$i]['desc'] = esc_html__('Enter Font Awesome Class ex: fas fa-car', 'autoshowroom');
                $auto_fields_icon[$i]['section'] = 'TZVehicleIcon';
            }
        }else{
            $auto_fields_icon[0]['id'] = 'spec_none';
            $auto_fields_icon[0]['label'] = 'no Specifications ';

            $auto_fields_icon[0]['type'] = 'text';
            $auto_fields_icon[0]['desc'] = esc_html__('Enter Font Awesome Class ex: fas fa-car', 'autoshowroom');
            $auto_fields_icon[0]['section'] = 'TZVehicleIcon';
        }
        return $auto_fields_icon;
    }else{
        return $auto_fields_icon = array();
    }
}

function autoshowroom_theme_options()
{

    /**
     * Get a copy of the saved settings array.
     */
    $auto_speci = tz_autoshowroom_get_fields_icon();


    $autoshowroom_saved_settings = get_option('option_tree_settings', array());

    // Pattern
    $autoshowroom_patterns = array();
    if ($autoshowroom_dir = opendir(get_template_directory() . '/images/patterns/')) {
        while (false !== ($autoshowroom_file = readdir($autoshowroom_dir))) {
            if ($autoshowroom_file != '..' && $autoshowroom_file != '.') {
                $autoshowroom_patterns[] = array(
                    'value' => trim($autoshowroom_file),
                    'label' => 'Click on pattern to preview',
                    'src'   => get_template_directory_uri() . '/images/patterns/' . $autoshowroom_file, 40, 40, true
                );
            }
        }
        // Close directory handle
        closedir($autoshowroom_dir);
    }
    $autoshowroom_breadcrumb = get_template_directory_uri().'/images/breadcrumb.png';
    $autoshowroom_contact_img = get_template_directory_uri().'/images/contactbg.png';
    $autoshowroom_background_footer = get_template_directory_uri().'/images/background_footer.png';
    $autoshowroom_logo_footer = get_template_directory_uri().'/images/logo-footer.png';

    /**
     * Custom settings array that will eventually be
     * passes to the OptionTree Settings API Class.
     */

    $autoshowroom_custom_settings = array(
        'contextual_help' => array(
            'content' => array(
                array(
                    'id'      => 'general_help',
                    'title'   => 'General',
                    'content' => '<p>Help content goes here!</p>'
                ),
            ),
            'sidebar' => '<p>Sidebar content goes here!</p>'
        ),
        'sections'        => array(
            array(
                'id'    => 'logo',
                'title' => esc_html__('Logo & Favicon', 'autoshowroom'),
            ),
            array(
                'id'    => 'header',
                'title' => esc_html__('Header Options', 'autoshowroom'),
            ),

            array(
                'id'    =>  'TzSyle',
                'title' =>  esc_html__('Font Options', 'autoshowroom'),
            ),
            array(
                'id'    =>  'TZBody',
                'title' =>  esc_html__('Content Font', 'autoshowroom'),
            ),

            array(
                'id'    =>  'TzFontHeader',
                'title' =>  esc_html__('Title Font', 'autoshowroom'),
            ),
            array(
                'id'    =>  'TzFontCustom',
                'title' =>  esc_html__('Custom Font', 'autoshowroom'),
            ),
            array(
                'id'    =>  'TZColor',
                'title' =>  esc_html__('Color Options', 'autoshowroom'),
            ),
            array(
                'id'    =>  'TZColorMenu',
                'title' =>  esc_html__('Menu Color', 'autoshowroom'),
            ),
            array(
                'id'    =>  'TzCustomCss',
                'title' =>  esc_html__('Custom CSS', 'autoshowroom'),
            ),
            array(
                'id'    =>  'TZBreadcrumb',
                'title' =>  esc_html__('Breadcrumb', 'autoshowroom'),
            ),
            array(
                'id'    =>  'TZVehicle',
                'title' =>  esc_html__('Vehicle Option', 'autoshowroom'),
            ),
            array(
                'id'    =>  'TZVehicleCompare',
                'title' =>  esc_html__('Vehicle Compare', 'autoshowroom'),
            ),
            array(
                'id'    =>  'TZVehicleCalculator',
                'title' =>  esc_html__('Vehicle Calculator', 'autoshowroom'),
            ),
            array(
                'id'    =>  'TZVehicleDetail',
                'title' =>  esc_html__('Vehicle Detail', 'autoshowroom'),
            ),
            array(
                'id'    =>  'TZVehicleIcon',
                'title' =>  esc_html__('Specifications Icon', 'autoshowroom'),
            ),
            array(
                'id'    =>  'TZBlog',
                'title' =>  esc_html__('Blog Option', 'autoshowroom'),
            ),
            array(
                'id'    =>  'TZSingle',
                'title' =>  esc_html__('Single Option','autoshowroom'),
            ),
            array(
                'id'    =>  'tzShopOption',
                'title' =>   esc_html__('Shop Option','autoshowroom'),
            ),
            array(
                'id'    =>  'tzShopDetailOption',
                'title' =>   esc_html__('Shop Detail Option','autoshowroom'),
            ),
            array(
                'id'    => '404',
                'title' => esc_html__('404 Page', 'autoshowroom'),
            ),
            array(
                'id'    => 'contact',
                'title' => esc_html__('Contact Bottom', 'autoshowroom'),
            ),
            array(
                'id'    => 'contactpage',
                'title' => esc_html__('Contact Page', 'autoshowroom'),
            ),
            array(
                'id'    => 'getaquote',
                'title' => esc_html__('Get A Quote', 'autoshowroom'),
            ),
            array(
                'id'    => 'footeroption',
                'title' => esc_html__('Footer Options', 'autoshowroom'),
            ),
            array(
                'id'    => 'footer_column_option',
                'title' => esc_html__('Footer Column Options', 'autoshowroom'),
            ),
            array(
                'id'    => 'footer_social_option',
                'title' => esc_html__('Footer Social Options', 'autoshowroom'),
            ),
        ),

        'settings'        => array(

            array(
                'id'        => 'autoshowroom_logotype',
                'label'     => esc_html__('Logo Type', 'autoshowroom'),
                'desc'      => esc_html__('select type for logo text or image', 'autoshowroom'),
                'std'       => '1',
                'type'      => 'select',
                'section'   => 'logo',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => 1,
                        'label' => esc_html__('Logo image', 'autoshowroom'),
                    ),
                    array(
                        'value' => 0,
                        'label' => esc_html__('Logo text', 'autoshowroom'),
                    )
                ),
            ),
            array(
                'id'        => 'autoshowroom_logoText',
                'label'     => esc_html__('Logo Text', 'autoshowroom'),
                'desc'      => esc_html__('logo name for your website', 'autoshowroom'),
                'std'       => '',
                'type'      => 'text',
                'section'   => 'logo',
            ),

            array(
                'id'        =>  'autoshowroom_logoTextcolor',
                'label'     => esc_html__('Color logo', 'autoshowroom'),
                'desc'      => esc_html__('logo text color', 'autoshowroom'),
                'std'       => '',
                'type'      => 'colorpicker_opacity',
                'section'   => 'logo',
            ),

            array(
                'id'        => 'autoshowroom_logo',
                'label'     => esc_html__('Upload Logo', 'autoshowroom'),
                'desc'      => esc_html__('Logo using for home page and page shop', 'autoshowroom'),
                'std'       => '',
                'type'      => 'upload',
                'section'   => 'logo',
            ),

            array(
                'id'        => 'autoshowroom_favicon_onoff',
                'label'     => esc_html__('Enable Favicon', 'autoshowroom'),
                'desc'      => esc_html__('Show or hide Favicon', 'autoshowroom'),
                'std'       => 'no',
                'type'      => 'select',
                'section'   => 'logo',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => 'yes',
                        'label' => esc_html__('Yes', 'autoshowroom'),
                        'src'   => ''
                    ),
                    array(
                        'value' => 'no',
                        'label' => esc_html__('No', 'autoshowroom'),
                        'src'   => ''
                    )
                ),
            ),

            array(
                'id'        => 'autoshowroom_favicon',
                'label'     => esc_html__('Upload Favicon Icon', 'autoshowroom'),
                'desc'      => esc_html__('Please choose an image  to use for favicon.', 'autoshowroom'),
                'std'       => '',
                'type'      => 'upload',
                'section'   => 'logo',
            ),



            /* ==========================================
            *  Header Options
            ==========================================*/

            array(
                'id'        => 'autoshowroom_header_type',
                'label'     => esc_html__('Header Type', 'autoshowroom'),
                'desc'      => esc_html__('select type of Header', 'autoshowroom'),
                'std'       => 'header1',
                'type'      => 'select',
                'section'   => 'header',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => 'header1',
                        'label' => esc_html__('Header 1', 'autoshowroom'),
                    ),
                    array(
                        'value' => 'header2',
                        'label' => esc_html__('Header 2', 'autoshowroom'),
                    ),
                    array(
                        'value' => 'header3',
                        'label' => esc_html__('Header 3', 'autoshowroom'),
                    ),
                    array(
                        'value' => 'header4',
                        'label' => esc_html__('Header 4', 'autoshowroom'),
                    ),
                    array(
                        'value' => 'header5',
                        'label' => esc_html__('Header Motor', 'autoshowroom'),
                    ),
                    array(
                        'value' => 'header6',
                        'label' => esc_html__('Header 6', 'autoshowroom'),
                    ),
                    array(
                        'value' => 'header7',
                        'label' => esc_html__('Header 7', 'autoshowroom'),
                    ),
                ),
            ),
            array(
                'id'        => 'autoshowroom_header_menu_cart',
                'label'     => esc_html__('Show icon Cart in menu', 'autoshowroom'),
                'desc'      => esc_html__('Show icon Cart in menu', 'autoshowroom'),
                'std'       => 'show',
                'type'      => 'select',
                'section'   => 'header',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => 'show',
                        'label' => esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' => 'hide',
                        'label' => esc_html__('Hide', 'autoshowroom'),
                    )
                ),
            ),
            array(
                'id'        => 'autoshowroom_header_sidebar',
                'label'     => esc_html__('Header Top Sidebar', 'autoshowroom'),
                'desc'      => esc_html__('Show or hide Top sidebar', 'autoshowroom'),
                'std'       => 'show',
                'type'      => 'select',
                'section'   => 'header',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => 'show',
                        'label' => esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' => 'hide',
                        'label' => esc_html__('Hide', 'autoshowroom'),
                    )
                ),
            ),
            array(
                'id'        => 'autoshowroom_header2_logo_position',
                'label'     => esc_html__('Header 2 Logo Top', 'autoshowroom'),
                'desc'      => '',
                'std'       => '-20',
                'type'      => 'text',
                'section'   => 'header',
            ),
            array(
                'id'        => 'autoshowroom_banner',
                'label'     => esc_html__('Show Header Banner', 'autoshowroom'),
                'desc'      => esc_html__('Show or hide Banner Header', 'autoshowroom'),
                'std'       => 'yes',
                'type'      => 'select',
                'section'   => 'header',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => 'yes',
                        'label' => esc_html__('Show', 'autoshowroom'),
                        'src'   => ''
                    ),
                    array(
                        'value' => 'no',
                        'label' => esc_html__('Hide', 'autoshowroom'),
                        'src'   => ''
                    )
                ),
            ),
            array(
                'id'        => 'autoshowroom_menu_fixed',
                'label'     => esc_html__('Sticky Menu', 'autoshowroom'),
                'desc'      => esc_html__('Menu fixed when scroll down', 'autoshowroom'),
                'std'       => 'no',
                'type'      => 'select',
                'section'   => 'header',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => 'yes',
                        'label' => esc_html__('Yes', 'autoshowroom'),
                        'src'   => ''
                    ),
                    array(
                        'value' => 'no',
                        'label' => esc_html__('No', 'autoshowroom'),
                        'src'   => ''
                    )
                ),
            ),
            array(
                'id'        => 'autoshowroom_header6_addcar',
                'label'     => esc_html__('Header 6 Add Car', 'autoshowroom'),
                'desc'      => esc_html__('Show or hide Add Car in Header 6', 'autoshowroom'),
                'std'       => 'show',
                'type'      => 'select',
                'section'   => 'header',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => 'show',
                        'label' => esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' => 'hide',
                        'label' => esc_html__('Hide', 'autoshowroom'),
                    )
                ),
            ),
            array(
                'id'        => 'autoshowroom_header6_link_addcar',
                'label'     => esc_html__('Header 6 Link Add Car', 'autoshowroom'),
                'desc'      => '',
                'std'       => '#',
                'type'      => 'text',
                'section'   => 'header',
            ),
            array(
                'id'        => 'autoshowroom_header7_account',
                'label'     => esc_html__('Header 7 Account', 'autoshowroom'),
                'desc'      => esc_html__('Show or hide Account in Header 7', 'autoshowroom'),
                'std'       => 'show',
                'type'      => 'select',
                'section'   => 'header',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => 'show',
                        'label' => esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' => 'hide',
                        'label' => esc_html__('Hide', 'autoshowroom'),
                    )
                ),
            ),
            array(
                'id'        => 'autoshowroom_header7_phone',
                'label'     => esc_html__('Header 7 Phone', 'autoshowroom'),
                'desc'      => '',
                'std'       => '+1-888-335-3567',
                'type'      => 'text',
                'section'   => 'header',
            ),
            array(
                'id'        => 'autoshowroom_header7_email',
                'label'     => esc_html__('Header 7 Email', 'autoshowroom'),
                'desc'      => '',
                'std'       => 'info@templaza.com',
                'type'      => 'text',
                'section'   => 'header',
            ),
            array(
                'id'        => 'autoshowroom_header7_hour',
                'label'     => esc_html__('Header 7 Hour', 'autoshowroom'),
                'desc'      => '',
                'std'       => 'Mon - Fri: 08 am - 10 pm',
                'type'      => 'text',
                'section'   => 'header',
            ),


            /* ==========================================
            *  Contact Option
            ==========================================*/

            array(
                'id'        => 'autoshowroom_contact_imagebg',
                'label'     =>  esc_html__('Upload Image Background','autoshowroom'),
                'desc'      =>  esc_html__('Please choose an image  to use for Background.','autoshowroom'),
                'std'       => $autoshowroom_contact_img,
                'type'      => 'upload',
                'section'   => 'contact',
            ),

            array(
                'id'        => 'autoshowroom_contact_message',
                'label'     => esc_html__('Message','autoshowroom'),
                'desc'      => '',
                'std'       => 'NEED A HAND TO FIND YOUR CAR?',
                'type'      => 'textarea',
                'section'   => 'contact',
                'rows'      => '15',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),

            array(
                'id'        => 'autoshowroom_contact_button_text',
                'label'     => esc_html__('Button Text', 'autoshowroom'),
                'desc'      => '',
                'std'       => '',
                'type'      => 'text',
                'section'   => 'contact',
            ),
            array(
                'id'        => 'autoshowroom_contact_button_link',
                'label'     => esc_html__('Button Link', 'autoshowroom'),
                'desc'      => '',
                'std'       => '',
                'type'      => 'text',
                'section'   => 'contact',
            ),

            /* ==========================================
            *  Contact page option
            ==========================================*/
            array(
                'id'        => 'autoshowroom_contact_sidebar',
                'label'     => esc_html__('Sidebar Option', 'autoshowroom'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => 1,
                'section'   => 'contactpage',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Sidebar Right', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('Sidebar Left', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  2,
                        'label' =>  esc_html__('No Sidebar', 'autoshowroom'),
                    )
                ),

            ),
            /* ==========================================
            *  Get A Quote option
            ==========================================*/

            array(
                'id'        => 'autoshowroom_btn_quote',
                'label'     => esc_html__('Get A Quote', 'autoshowroom'),
                'desc'      => esc_html__('Show or hide Get A Quote', 'autoshowroom'),
                'std'       => 'yes',
                'type'      => 'select',
                'section'   => 'getaquote',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => 'yes',
                        'label' => esc_html__('Enable', 'autoshowroom'),
                        'src'   => ''
                    ),
                    array(
                        'value' => 'no',
                        'label' => esc_html__('Disable', 'autoshowroom'),
                        'src'   => ''
                    )
                ),
            ),
            array(
                'id'        => 'autoshowroom_btn_quote_title',
                'label'     => esc_html__('Get A Quote Title', 'autoshowroom'),
                'desc'      => '',
                'std'       => '',
                'type'      => 'text',
                'section'   => 'getaquote',
            ),
            array(
                'id'        => 'autoshowroom_btn_quote_link',
                'label'     => esc_html__('Get A Quote Link', 'autoshowroom'),
                'desc'      => '',
                'std'       => '',
                'type'      => 'text',
                'section'   => 'getaquote',
            ),
            array(
                'id'        => 'autoshowroom_send_admin',
                'label'     => esc_html__('Recipients Mail Admin', 'autoshowroom'),
                'desc'      => 'from@example.com',
                'std'       => '',
                'type'      => 'text',
                'section'   => 'getaquote',
            ),
            array(
                'id'        => 'autoshowroom_send_customer',
                'label'     => esc_html__('Recipients Mail Customer', 'autoshowroom'),
                'desc'      => 'from@example.com',
                'std'       => '',
                'type'      => 'select',
                'section'   => 'getaquote',
                'choices'   => array(
                    array(
                        'value' => 'yes',
                        'label' => esc_html__('Enable', 'autoshowroom'),
                        'src'   => ''
                    ),
                    array(
                        'value' => 'no',
                        'label' => esc_html__('Disable', 'autoshowroom'),
                        'src'   => ''
                    )
                ),
            ),
            array(
                'id'        => 'autoshowroom_send_title',
                'label'     => esc_html__('Title Mail', 'autoshowroom'),
                'desc'      => '',
                'std'       => '',
                'type'      => 'text',
                'section'   => 'getaquote',
            ),
            array(
                'id'        => 'autoshowroom_send_content',
                'label'     => esc_html__('Content Mail', 'autoshowroom'),
                'desc'      => 'Notification emails sent after customers submit a quote',
                'std'       => '',
                'type'      => 'textarea',
                'section'   => 'getaquote',
            ),
            array(
                'id'        => 'autoshowroom_send_from',
                'label'     => esc_html__('From Mail', 'autoshowroom'),
                'desc'      => 'from@example.com',
                'std'       => '',
                'type'      => 'text',
                'section'   => 'getaquote',
            ),
            array(
                'id'        => 'autoshowroom_send_cc',
                'label'     => esc_html__('Cc Mail', 'autoshowroom'),
                'desc'      => 'cc@example.com',
                'std'       => '',
                'type'      => 'text',
                'section'   => 'getaquote',
            ),
            array(
                'id'        => 'autoshowroom_send_bcc',
                'label'     => esc_html__('Bcc Mail', 'autoshowroom'),
                'desc'      => 'bcc@example.com',
                'std'       => '',
                'type'      => 'text',
                'section'   => 'getaquote',
            ),




            /* ==========================================
            *  footer option
            ==========================================*/
            array(
                'id'        => 'autoshowroom_footer_type',
                'label'     => esc_html__('Footer Type', 'autoshowroom'),
                'desc'      => esc_html__('Please choose type of footer', 'autoshowroom'),
                'std'       => 'type1',
                'type'      => 'select',
                'section'   => 'footeroption',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => 'type1',
                        'label' => esc_html__('Type 1', 'autoshowroom'),
                        'src'   => ''
                    ),
                    array(
                        'value' => 'type2',
                        'label' => esc_html__('Type 2', 'autoshowroom'),
                        'src'   => ''
                    )
                ),
            ),
            array(
                'id'        => 'autoshowroom_logo_footer',
                'label'     =>  esc_html__('Upload Logo Footer','autoshowroom'),
                'desc'      =>  esc_html__('Please choose an image  to use for logo footer.','autoshowroom'),
                'std'       => $autoshowroom_logo_footer,
                'type'      => 'upload',
                'section'   => 'footeroption',
            ),
            array(
                'id'        => 'autoshowroom_newsletter',
                'label'     => esc_html__('Newsletter', 'autoshowroom'),
                'desc'      => esc_html__('Show or hide newsletter', 'autoshowroom'),
                'std'       => 'show',
                'type'      => 'select',
                'section'   => 'footeroption',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => 'show',
                        'label' => esc_html__('Show', 'autoshowroom'),
                        'src'   => ''
                    ),
                    array(
                        'value' => 'hide',
                        'label' => esc_html__('Hidden', 'autoshowroom'),
                        'src'   => ''
                    )
                ),
            ),
            array(
                'id'        => 'autoshowroom_newsletter_title',
                'label'     => esc_html__('Newsletter Title', 'autoshowroom'),
                'desc'      => '',
                'std'       => '',
                'type'      => 'text',
                'section'   => 'footeroption',
            ),
            array(
                'id'        => 'autoshowroom_newsletter_des',
                'label'     => esc_html__('Newsletter Descriptions', 'autoshowroom'),
                'desc'      => '',
                'std'       => '',
                'type'      => 'text',
                'section'   => 'footeroption',
            ),
            array(
                'id'        => 'autoshowroom_background_image',
                'label'     =>  esc_html__('Upload Image Background','autoshowroom'),
                'desc'      =>  esc_html__('Please choose an image  to use for Background.','autoshowroom'),
                'std'       => $autoshowroom_background_footer,
                'type'      => 'upload',
                'section'   => 'footeroption',
            ),
            array(
                'id'        => 'autoshowroom_btn_backtotop',
                'label'     => esc_html__('Back to top button', 'autoshowroom'),
                'desc'      => esc_html__('Show or hide back to top button', 'autoshowroom'),
                'std'       => 'yes',
                'type'      => 'select',
                'section'   => 'footeroption',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => 'yes',
                        'label' => esc_html__('Enable', 'autoshowroom'),
                        'src'   => ''
                    ),
                    array(
                        'value' => 'no',
                        'label' => esc_html__('Disable', 'autoshowroom'),
                        'src'   => ''
                    )
                ),
            ),

            array(
                'label'     =>  esc_html__('Number of Footer Columns.', 'autoshowroom'),
                'id'        =>  'autoshowroom_footer_columns',
                'desc'      =>  esc_html__('Select the number of columns to display in the footer.', 'autoshowroom'),
                'section'   =>  'footer_column_option',
                'std'       =>  '4',
                'type'      =>  'select',
                'choices'   =>  array(
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3'
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2'
                    ),
                    array(
                        'value' =>  '1',
                        'label' =>  '1'
                    ),
                )
            ),
            array(
                'id'        =>  'autoshowroom_footer_image',
                'label'     =>  'Preview Footer columns',
                'desc'      =>  '',
                'sdt'       =>  '',
                'type'      =>  'radio-image',
                'section'   =>  'footer_column_option',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'footer1',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/footer1.jpg'
                    ),
                    array(
                        'value' =>  'footer2',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/footer2.jpg'
                    ),
                    array(
                        'value' =>  'footer3',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/footer3.jpg'
                    ),
                    array(
                        'value' =>  'footer4',
                        'label' =>  '',
                        'src'   =>  get_template_directory_uri().'/extension/assets/images/footer4.jpg'
                    ),
                )
            ),
            array(
                'id'      =>    'autoshowroom_footer_width1',
                'label'   =>    esc_html__('Footer width 1', 'autoshowroom'),
                'desc'    =>    esc_html__('config width for footer', 'autoshowroom'),
                'section' =>    'footer_column_option',
                'std'     =>    '3',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                    array(
                        'value' =>  '11',
                        'label' =>  '11',
                    ),
                    array(
                        'value' =>  '12',
                        'label' =>  '12',
                    ),
                )
            ),
            array(
                'id'      =>    'autoshowroom_footer_offset_width1',
                'label'   =>    esc_html__('Footer offset width 1', 'autoshowroom'),
                'desc'    =>    esc_html__('config offset width for footer', 'autoshowroom'),
                'section' =>    'footer_column_option',
                'std'     =>    '0',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '0',
                        'label' =>  '0',
                    ),
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                    array(
                        'value' =>  '11',
                        'label' =>  '11',
                    ),
                    array(
                        'value' =>  '12',
                        'label' =>  '12',
                    ),
                )
            ),
            array(
                'id'      =>    'autoshowroom_footer_width2',
                'label'   =>    esc_html__('Footer width 2', 'autoshowroom'),
                'desc'    =>    esc_html__('config width for footer', 'autoshowroom'),
                'section' =>    'footer_column_option',
                'std'     =>    '3',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                    array(
                        'value' =>  '11',
                        'label' =>  '11',
                    ),
                    array(
                        'value' =>  '12',
                        'label' =>  '12',
                    ),
                )
            ),
            array(
                'id'      =>    'autoshowroom_footer_offset_width2',
                'label'   =>    esc_html__('Footer offset width 2', 'autoshowroom'),
                'desc'    =>    esc_html__('config offset width for footer', 'autoshowroom'),
                'section' =>    'footer_column_option',
                'std'     =>    '0',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '0',
                        'label' =>  '0',
                    ),
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                    array(
                        'value' =>  '11',
                        'label' =>  '11',
                    ),
                    array(
                        'value' =>  '12',
                        'label' =>  '12',
                    ),
                )
            ),
            array(
                'id'      =>    'autoshowroom_footer_width3',
                'label'   =>    esc_html__('Footer width 3', 'autoshowroom'),
                'desc'    =>    esc_html__('config width for footer', 'autoshowroom'),
                'section' =>    'footer_column_option',
                'std'     =>    '3',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                    array(
                        'value' =>  '11',
                        'label' =>  '11',
                    ),
                    array(
                        'value' =>  '12',
                        'label' =>  '12',
                    ),
                )
            ),
            array(
                'id'      =>    'autoshowroom_footer_offset_width3',
                'label'   =>    esc_html__('Footer offset width 3', 'autoshowroom'),
                'desc'    =>    esc_html__('config offset width for footer', 'autoshowroom'),
                'section' =>    'footer_column_option',
                'std'     =>    '0',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '0',
                        'label' =>  '0',
                    ),
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                    array(
                        'value' =>  '11',
                        'label' =>  '11',
                    ),
                    array(
                        'value' =>  '12',
                        'label' =>  '12',
                    ),
                )
            ),
            array(
                'id'      =>    'autoshowroom_footer_width4',
                'label'   =>    esc_html__('Footer width 4', 'autoshowroom'),
                'desc'    =>    esc_html__('config width for footer', 'autoshowroom'),
                'section' =>    'footer_column_option',
                'std'     =>    '3',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                    array(
                        'value' =>  '11',
                        'label' =>  '11',
                    ),
                    array(
                        'value' =>  '12',
                        'label' =>  '12',
                    ),
                )
            ),
            array(
                'id'      =>    'autoshowroom_footer_offset_width4',
                'label'   =>    esc_html__('Footer offset width 4', 'autoshowroom'),
                'desc'    =>    esc_html__('config offset width for footer', 'autoshowroom'),
                'section' =>    'footer_column_option',
                'std'     =>    '0',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '0',
                        'label' =>  '0',
                    ),
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                    array(
                        'value' =>  '11',
                        'label' =>  '11',
                    ),
                    array(
                        'value' =>  '12',
                        'label' =>  '12',
                    ),
                )
            ),

            array(
                'id'      =>    'autoshowroom_footer_social_number',
                'label'   =>    esc_html__('Social Number', 'autoshowroom'),
                'desc'    =>    esc_html__('You can choose social from 1 to 10 icon.', 'autoshowroom'),
                'section' =>    'footer_social_option',
                'std'     =>    '5',
                'type'    =>    'select',
                'choices' =>    array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                    array(
                        'value' =>  '5',
                        'label' =>  '5',
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  '6',
                    ),
                    array(
                        'value' =>  '7',
                        'label' =>  '7',
                    ),
                    array(
                        'value' =>  '8',
                        'label' =>  '8',
                    ),
                    array(
                        'value' =>  '9',
                        'label' =>  '9',
                    ),
                    array(
                        'value' =>  '10',
                        'label' =>  '10',
                    ),
                )
            ),

            array(
                'id'    =>  'autoshowroom_social_icon_1',
                'label' =>   esc_html__('Social Icon 1', 'autoshowroom'),
                'desc'  =>   esc_html__('You click on link to go to website: http://fontawesome.io/icons ,and choose suitable class. After that you can fill in textbox.Ex: fab fa-facebook-f', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footer_social_option',
            ),

            array(
                'id'    =>  'autoshowroom_social_url_1',
                'label' =>   esc_html__('Social Url 1', 'autoshowroom'),
                'desc'  =>   esc_html__('', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footer_social_option',
            ),

            array(
                'id'    =>  'autoshowroom_social_icon_2',
                'label' =>   esc_html__('Social Icon 2', 'autoshowroom'),
                'desc'  =>   esc_html__('You click on link to go to website: http://fontawesome.io/icons ,and choose suitable class. After that you can fill in textbox.Ex: fab fa-facebook-f', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footer_social_option',
            ),

            array(
                'id'    =>  'autoshowroom_social_url_2',
                'label' =>   esc_html__('Social Url 2', 'autoshowroom'),
                'desc'  =>   esc_html__('', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footer_social_option',
            ),

            array(
                'id'    =>  'autoshowroom_social_icon_3',
                'label' =>   esc_html__('Social Icon 3', 'autoshowroom'),
                'desc'  =>   esc_html__('You click on link to go to website: http://fontawesome.io/icons ,and choose suitable class. After that you can fill in textbox.Ex: fab fa-facebook-f', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footer_social_option',
            ),

            array(
                'id'    =>  'autoshowroom_social_url_3',
                'label' =>   esc_html__('Social Url 3', 'autoshowroom'),
                'desc'  =>   esc_html__('', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footer_social_option',
            ),

            array(
                'id'    =>  'autoshowroom_social_icon_4',
                'label' =>   esc_html__('Social Icon 4', 'autoshowroom'),
                'desc'  =>   esc_html__('You click on link to go to website: http://fontawesome.io/icons ,and choose suitable class. After that you can fill in textbox.Ex: fab fa-facebook-f', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footer_social_option',
            ),

            array(
                'id'    =>  'autoshowroom_social_url_4',
                'label' =>   esc_html__('Social Url 4', 'autoshowroom'),
                'desc'  =>   esc_html__('', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footer_social_option',
            ),

            array(
                'id'    =>  'autoshowroom_social_icon_5',
                'label' =>   esc_html__('Social Icon 5', 'autoshowroom'),
                'desc'  =>   esc_html__('You click on link to go to website: http://fontawesome.io/icons ,and choose suitable class. After that you can fill in textbox.Ex: fab fa-facebook-f', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footer_social_option',
            ),

            array(
                'id'    =>  'autoshowroom_social_url_5',
                'label' =>   esc_html__('Social Url 5', 'autoshowroom'),
                'desc'  =>   esc_html__('', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footer_social_option',
            ),

            array(
                'id'    =>  'autoshowroom_social_icon_6',
                'label' =>   esc_html__('Social Icon 6', 'autoshowroom'),
                'desc'  =>   esc_html__('You click on link to go to website: http://fontawesome.io/icons ,and choose suitable class. After that you can fill in textbox.Ex: fab fa-facebook-f', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footer_social_option',
            ),

            array(
                'id'    =>  'autoshowroom_social_url_6',
                'label' =>   esc_html__('Social Url 6', 'autoshowroom'),
                'desc'  =>   esc_html__('', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footer_social_option',
            ),

            array(
                'id'    =>  'autoshowroom_social_icon_7',
                'label' =>   esc_html__('Social Icon 7', 'autoshowroom'),
                'desc'  =>   esc_html__('You click on link to go to website: http://fontawesome.io/icons ,and choose suitable class. After that you can fill in textbox.Ex: fab fa-facebook-f', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footer_social_option',
            ),

            array(
                'id'    =>  'autoshowroom_social_url_7',
                'label' =>   esc_html__('Social Url 7', 'autoshowroom'),
                'desc'  =>   esc_html__('', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footer_social_option',
            ),

            array(
                'id'    =>  'autoshowroom_social_icon_8',
                'label' =>   esc_html__('Social Icon 8', 'autoshowroom'),
                'desc'  =>   esc_html__('You click on link to go to website: http://fontawesome.io/icons ,and choose suitable class. After that you can fill in textbox.Ex: fab fa-facebook-f', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footer_social_option',
            ),

            array(
                'id'    =>  'autoshowroom_social_url_8',
                'label' =>   esc_html__('Social Url 8', 'autoshowroom'),
                'desc'  =>   esc_html__('', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footer_social_option',
            ),

            array(
                'id'    =>  'autoshowroom_social_icon_9',
                'label' =>   esc_html__('Social Icon 9', 'autoshowroom'),
                'desc'  =>   esc_html__('You click on link to go to website: http://fontawesome.io/icons ,and choose suitable class. After that you can fill in textbox.Ex:fab fa-facebook-f', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footer_social_option',
            ),

            array(
                'id'    =>  'autoshowroom_social_url_9',
                'label' =>   esc_html__('Social Url 9', 'autoshowroom'),
                'desc'  =>   esc_html__('', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footer_social_option',
            ),

            array(
                'id'    =>  'autoshowroom_social_icon_10',
                'label' =>   esc_html__('Social Icon 10', 'autoshowroom'),
                'desc'  =>   esc_html__('You click on link to go to website: http://fontawesome.io/icons ,and choose suitable class. After that you can fill in textbox.Ex: fab fa-facebook-f', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footer_social_option',
            ),

            array(
                'id'    =>  'autoshowroom_social_url_10',
                'label' =>   esc_html__('Social Url 10', 'autoshowroom'),
                'desc'  =>   esc_html__('', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'footer_social_option',
            ),


            // 404

            array(
                'id'        => 'autoshowroom_404_title',
                'label'     => esc_html__('404 Title', 'autoshowroom'),
                'desc'      => '',
                'std'       => esc_html__('404 ERROR!', 'autoshowroom'),
                'type'      => 'text',
                'section'   => '404',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        => 'autoshowroom_404_content',
                'label'     => esc_html__('404 Content', 'autoshowroom'),
                'desc'      => '',
                'std'       => 'Look like something went wrong! The page you were looking for is not here. Go Home or try a search.',
                'type'      => 'textarea-simple',
                'section'   => '404',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        => 'autoshowroom_404_button',
                'label'     => esc_html__('Text Button', 'autoshowroom'),
                'desc'      => '',
                'std'       => 'Go to the Home Page',
                'type'      => 'text',
                'section'   => '404',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),

            // style option
            array(
                'id' =>  'autoshowroom_TzSyle',
                'label'     => esc_html__('StyleConfig', 'autoshowroom'),
                'desc'      => '<p>'.esc_html__('Config for Title Font, Content Font', 'autoshowroom').'</p>',
                'std'       => '',
                'type'      => 'textblock-titled',
                'section'   => 'TzSyle',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),

            // font style body -----------------------------------------------------------------------
            array(
                'id'        =>  'autoshowroom_TZFontType',
                'label'     =>  esc_html__('Font Type', 'autoshowroom'),
                'desc'      =>  esc_html__('option font type', 'autoshowroom'),
                'std'       =>  '',
                'type'      =>  'select',
                'section'   =>  'TZBody',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  'btn-group',
                'choices'   =>  array(

                    array(
                        'value' =>  'Tzgoogle',
                        'label' =>  esc_html__('Goole Font', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'TzFontDefault',
                        'label' =>  esc_html__('Standard Font', 'autoshowroom'),
                    ),


                ),
            ),

            //  font
            array(
                'id'       =>   'autoshowroom_TzFontDefault',
                'label'    =>   esc_html__('Select Standard Font', 'autoshowroom'),
                'desc'     =>   esc_html__('Select a font to use font-family', 'autoshowroom'),
                'type'     =>   'select',
                'section'  =>   'TZBody',
                'class'    =>   'TzFontStylet',
                'choices'  =>   array(
                    array(
                        'value'  =>  'Arial',
                        'label'  =>  esc_html__('Arial', 'autoshowroom'),
                    ),
                    array(
                        'value'  =>  'Tahoma',
                        'label'  =>  esc_html__('Tahoma', 'autoshowroom'),
                    ),
                    array(
                        'value'  =>  'Verdana',
                        'label'  =>  esc_html__('Verdana', 'autoshowroom'),
                    ),
                    array(
                        'value'  =>  'Georgia',
                        'label'  =>  esc_html__('Georgia', 'autoshowroom'),
                    ),
                    array(
                        'value'  =>  'Impact',
                        'label'  =>  esc_html__('Impact', 'autoshowroom'),
                    ),
                    array(
                        'value'  =>  'Times',
                        'label'  =>  esc_html__('Times', 'autoshowroom'),
                    ),
                )
            ),

            // body font family
            array(
                'id'    =>  'autoshowroom_TzFontFaminy',
                'label' =>  esc_html__('Font Family', 'autoshowroom'),
                'desc'  =>  esc_html__('importeg google font-family Eg: Monsieur La Doulaise', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TZBody',
            ),

            // body font weight
            array(
                'id'    =>  'autoshowroom_TzFontFami',
                'label' =>  esc_html__('Font Weight', 'autoshowroom'),
                'desc'  =>  esc_html__('importeg google font-weight Eg: 300,400,400italic,600,700', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TZBody'
            ),

            array(
                'id'        =>  'autoshowroom_TzBodySelecter',
                'label'     =>  esc_html__('Content Selectors', 'autoshowroom'),
                'desc'      =>  esc_html__('you can specify a selector for font used in the document body eg: div#description', 'autoshowroom'),
                'std'       =>  '',
                'type'      =>  'textarea-simple',
                'section'   =>  'TZBody',
                'rows'      =>  '10',
            ),

            // end font style body


            // font style Header -----------------------------------------------------------------------
            array(
                'id'        =>  'autoshowroom_TZFontTypeHead',
                'label'     =>  esc_html__('Font Type', 'autoshowroom'),
                'desc'      =>  esc_html__('option font type', 'autoshowroom'),
                'std'       =>  '',
                'type'      =>  'select',
                'section'   =>  'TzFontHeader',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(

                    array(
                        'value' =>  'Tzgoogle',
                        'label' =>  esc_html__('Goole Font', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'TzFontDefault',
                        'label' =>  esc_html__('Standard Font', 'autoshowroom'),
                    ),


                ),
            ),

            // Squirrel font
            array(
                'id'       =>   'autoshowroom_TzFontHeadDefault',
                'label'    =>   esc_html__('Select Standard Font', 'autoshowroom'),
                'desc'     =>   esc_html__('Select a font to use font-family', 'autoshowroom'),
                'type'     =>   'select',
                'section'  =>   'TzFontHeader',
                'choices'  =>   array(
                    array(
                        'value'  =>  'Arial',
                        'label'  =>  esc_html__('Arial', 'autoshowroom'),
                    ),
                    array(
                        'value'  =>  'Tahoma',
                        'label'  =>  esc_html__('Tahoma', 'autoshowroom'),
                    ),
                    array(
                        'value'  =>  'Verdana',
                        'label'  =>  esc_html__('Verdana', 'autoshowroom'),
                    ),
                    array(
                        'value'  =>  'Georgia',
                        'label'  =>  esc_html__('Georgia', 'autoshowroom'),
                    ),
                    array(
                        'value'  =>  'Impact',
                        'label'  =>  esc_html__('Impact', 'autoshowroom'),
                    ),
                    array(
                        'value'  =>  'Times',
                        'label'  =>  esc_html__('Times', 'autoshowroom'),
                    )
                )
            ),


            // header font famyli
            array(
                'id'    =>  'autoshowroom_TzFontFaminyHead',
                'label' =>  esc_html__('Font Family', 'autoshowroom'),
                'desc'  =>  esc_html__('importeg google font-family Eg: Monsieur La Doulaise', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TzFontHeader',
            ),
            // header font weight
            array(
                'id'    =>  'autoshowroom_TzFontHeadGoodurl',
                'label' =>  esc_html__('Font Weight', 'autoshowroom'),
                'desc'  =>  esc_html__('importeg google font-weight Eg: 300,400,400italic,600,700', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TzFontHeader'
            ),
            array(
                'id'        =>  'autoshowroom_TzHeadSelecter',
                'label'     =>  esc_html__('Title Selecter', 'autoshowroom'),
                'desc'      =>  esc_html__('You can specify a selector for font used in the document Header Eg: div#description', 'autoshowroom'),
                'std'       =>  '',
                'type'      =>  'textarea-simple',
                'section'   =>  'TzFontHeader',
                'rows'      =>  '10',
            ),
            // end font header

            // font  Menu -----------------------------------------------------------------------

            array(
                'id'        =>  'autoshowroom_TZFontTypeMenu',
                'label'     =>  esc_html__('Font Type', 'autoshowroom'),
                'desc'      =>  esc_html__('Option font type', 'autoshowroom'),
                'std'       =>  '',
                'type'      =>  'select',
                'section'   =>  'TzFontMenu',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'Tzgoogle',
                        'label' =>  esc_html__('Goole Font', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'TzFontDefault',
                        'label' =>  esc_html__('Standard Font', 'autoshowroom'),
                    ),


                ),
            ),

            // Squirrel font
            array(
                'id'       =>   'autoshowroom_TzFontMenuDefault',
                'label'    =>   esc_html__('Select Standard Font', 'autoshowroom'),
                'desc'     =>   esc_html__('Select a font to use font-family', 'autoshowroom'),
                'type'     =>   'select',
                'section'  =>   'TzFontMenu',
                'choices'  =>   array(
                    array(
                        'value'  =>  'Arial',
                        'label'  =>  esc_html__('Arial', 'autoshowroom'),
                    ),
                    array(
                        'value'  =>  'Tahoma',
                        'label'  =>  esc_html__('Tahoma', 'autoshowroom'),
                    ),
                    array(
                        'value'  =>  'Verdana',
                        'label'  =>  esc_html__('Verdana', 'autoshowroom'),
                    ),
                    array(
                        'value'  =>  'Georgia',
                        'label'  =>  esc_html__('Georgia', 'autoshowroom'),
                    ),
                    array(
                        'value'  =>  'Impact',
                        'label'  =>  esc_html__('Impact', 'autoshowroom'),
                    ),
                    array(
                        'value'  =>  'Times',
                        'label'  =>  esc_html__('Times', 'autoshowroom'),
                    )
                )
            ),


            // Menu Font Family
            array(
                'id'    =>  'autoshowroom_TzFontFaminyMenu',
                'label' =>  esc_html__('Font Family', 'autoshowroom'),
                'desc'  =>  esc_html__('importeg google font-family Eg: Monsieur La Doulaise', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TzFontMenu',
            ),

            // Menu font weight
            array(
                'id'    =>  'autoshowroom_TzFontMenuGoodurl',
                'label' =>  esc_html__('Font Weight', 'autoshowroom'),
                'desc'  =>  esc_html__('importeg google font-weight Eg: 300,400,400italic,600,700', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TzFontMenu'
            ),

            array(
                'id'        =>  'autoshowroom_TzMenuSelecter',
                'label'     =>  esc_html__('Menu Selectors', 'autoshowroom'),
                'desc'      =>  esc_html__('you can specify a selector for font used in the document body eg: div#menu', 'autoshowroom'),
                'std'       =>  '',
                'type'      =>  'textarea-simple',
                'section'   =>  'TzFontMenu',
                'rows'      =>  '10',
            ),

            /*---end menu font--*/
            // font style custom -----------------------------------------------------------------------
            array(
                'id'        =>  'autoshowroom_TZFontTypeCustom',
                'label'     =>  esc_html__('Font Type', 'autoshowroom'),
                'desc'      =>  esc_html__('option font type', 'autoshowroom'),
                'std'       =>  '',
                'type'      =>  'select',
                'section'   =>  'TzFontCustom',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'Tzgoogle',
                        'label' =>  esc_html__('Goole Font', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'TzFontDefault',
                        'label' =>  esc_html__('Standard Font', 'autoshowroom'),
                    ),

                ),
            ),

            // Squirrel font
            array(
                'id'       =>   'autoshowroom_TzFontCustomDefault',
                'label'    =>   esc_html__('Select Standard Font', 'autoshowroom'),
                'desc'     =>   esc_html__('Select a font to use font-family', 'autoshowroom'),
                'type'     =>   'select',
                'section'  =>   'TzFontCustom',
                'choices'  =>   array(
                    array(
                        'value'  =>  'Arial',
                        'label'  =>  esc_html__('Arial', 'autoshowroom'),
                    ),
                    array(
                        'value'  =>  'Tahoma',
                        'label'  =>  esc_html__('Tahoma', 'autoshowroom'),
                    ),
                    array(
                        'value'  =>  'Verdana',
                        'label'  =>  esc_html__('Verdana', 'autoshowroom'),
                    ),
                    array(
                        'value'  =>  'Georgia',
                        'label'  =>  esc_html__('Georgia', 'autoshowroom'),
                    ),
                    array(
                        'value'  =>  'Impact',
                        'label'  =>  esc_html__('Impact', 'autoshowroom'),
                    ),
                    array(
                        'value'  =>  'Times',
                        'label'  =>  esc_html__('Times', 'autoshowroom'),
                    )
                )
            ),

            // body font
            array(
                'id'       =>  'autoshowroom_TzFontFaminyCustom',
                'label'    =>  esc_html__('Font Family', 'autoshowroom'),
                'desc'     =>  esc_html__('importeg google font-family Eg: Monsieur La Doulaise', 'autoshowroom'),
                'std'      =>  '',
                'type'     =>  'text',
                'section'  => 'TzFontCustom',
            ),


            // google url
            array(
                'id'    =>  'autoshowroom_TzFontCustomGoodurl',
                'label' =>  esc_html__('Font Weight', 'autoshowroom'),
                'desc'  =>  esc_html__('importeg google font-weight Eg: 300,400,400italic,600,700', 'autoshowroom'),
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TzFontCustom'
            ),
            array(
                'id'        =>  'autoshowroom_TzCustomSelecter',
                'label'     =>  esc_html__('Custom Selecter', 'autoshowroom'),
                'desc'      =>  esc_html__('you can specify a selector for font used in the document body eg: div#custom', 'autoshowroom'),
                'std'       =>  '',
                'type'      =>  'textarea-simple',
                'section'   =>  'TzFontCustom',
                'rows'      =>  '10',
            ),
            // end font custom

            /*-------custom css-------*/
            array(
                'id'        =>  'autoshowroom_TzCustomCss',
                'label'     =>  esc_html__('Code CSS', 'autoshowroom'),
                'desc'      =>  esc_html__('Paste your CSS code, do not include any tags or HTML in thie field. Any custom CSS entered here will override the theme CSS. In some cases, the !important tag may be needed.', 'autoshowroom'),
                'std'       =>  '',
                'type'      => 'textarea-simple',
                'section'   => 'TzCustomCss',
            ),
            // end custom css



            /*=================================
            * Color options
            ===================================*/
            array(
                'id'          => 'autoshowroom_general_color',
                'label'       => __( 'General Color', 'autoshowroom' ),
                'desc'        => __( 'The Colorpicker option type saves a hexadecimal color code for use in CSS. Use it to modify the color of something in your theme.', 'autoshowroom' ),
                'std'         => '#ff5400',
                'type'        => 'colorpicker',
                'section'     => 'TZColor',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'autoshowroom_menu_color',
                'label'       => __( 'Menu item color', 'autoshowroom' ),
                'desc'        => __( 'The Colorpicker option type saves a hexadecimal color code for use in CSS. Use it to modify the color of something in your theme.', 'autoshowroom' ),
                'std'         => '#222',
                'type'        => 'colorpicker',
                'section'     => 'TZColorMenu',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'autoshowroom_menu_hover',
                'label'       => __( 'Menu item Hover & Active', 'autoshowroom' ),
                'desc'        => __( 'The Colorpicker option type saves a hexadecimal color code for use in CSS. Use it to modify the color of something in your theme.', 'autoshowroom' ),
                'std'         => '#ff5400',
                'type'        => 'colorpicker',
                'section'     => 'TZColorMenu',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'autoshowroom_submenu_border',
                'label'       => __( 'Submenu border color', 'autoshowroom' ),
                'desc'        => __( 'The Colorpicker option type saves a hexadecimal color code for use in CSS. Use it to modify the color of something in your theme.', 'autoshowroom' ),
                'std'         => '#ff5400',
                'type'        => 'colorpicker',
                'section'     => 'TZColorMenu',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'autoshowroom_submenu_color',
                'label'       => __( 'Submenu color', 'autoshowroom' ),
                'desc'        => __( 'The Colorpicker option type saves a hexadecimal color code for use in CSS. Use it to modify the color of something in your theme.', 'autoshowroom' ),
                'std'         => '#222',
                'type'        => 'colorpicker',
                'section'     => 'TZColorMenu',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'autoshowroom_submenu_hover',
                'label'       => __( 'Submenu Hover', 'autoshowroom' ),
                'desc'        => __( 'The Colorpicker option type saves a hexadecimal color code for use in CSS. Use it to modify the color of something in your theme.', 'autoshowroom' ),
                'std'         => '#222',
                'type'        => 'colorpicker',
                'section'     => 'TZColorMenu',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),

            /*=================================
            * Breadcrumb options
            ===================================*/
            array(
                'id'        => 'autoshowroom_breadcrumb',
                'label'     => esc_html__('Show Breadcrumb', 'autoshowroom'),
                'desc'      => esc_html__('Show or hide Breadcrumb', 'autoshowroom'),
                'std'       => 'yes',
                'type'      => 'select',
                'section'   => 'TZBreadcrumb',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => 'yes',
                        'label' => esc_html__('Show', 'autoshowroom'),
                        'src'   => ''
                    ),
                    array(
                        'value' => 'no',
                        'label' => esc_html__('Hide', 'autoshowroom'),
                        'src'   => ''
                    )
                ),
            ),
            array(
                'id'        => 'autoshowroom_breadcrumb_imagebg',
                'label'     => esc_html__('Upload Image Background','autoshowroom'),
                'desc'      => esc_html__('Please choose an image  to use for Background.','autoshowroom'),
                'std'       => $autoshowroom_breadcrumb,
                'type'      => 'upload',
                'section'   => 'TZBreadcrumb',
            ),

            /*=================================
            * Option Blog and Tag and Serach and Author
            ===================================*/

            // Choose blog style
            array(
                'id'        => 'autoshowroom_blog_style',
                'label'     => esc_html__('Blog Style Option', 'autoshowroom'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => 'ListStyle',
                'section'   => 'TZBlog',
                'choices'   =>  array(
                    array(
                        'value' =>  'ListStyle',
                        'label' =>  esc_html__('List', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'GridStyle',
                        'label' =>  esc_html__('Grid', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'MasonryStyle',
                        'label' =>  esc_html__('Masonry', 'autoshowroom'),
                    ),
                ),

            ),

            array(
                'id'        => 'autoshowroom_blog_column',
                'label'     => esc_html__('Columns Option', 'autoshowroom'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => 2,
                'section'   => 'TZBlog',
                'choices'   =>  array(
                    array(
                        'value' =>  2,
                        'label' =>  esc_html__('2 Columns', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  3,
                        'label' =>  esc_html__('3 Columns', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  4,
                        'label' =>  esc_html__('4 Columns', 'autoshowroom'),
                    ),
                ),

            ),

            // Show or hide Date
            array(
                'id'        => 'autoshowroom_blog_sidebar',
                'label'     => esc_html__('Sidebar Option', 'autoshowroom'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => 1,
                'section'   => 'TZBlog',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Sidebar Right', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('Sidebar Left', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  2,
                        'label' =>  esc_html__('No Sidebar', 'autoshowroom'),
                    )
                ),

            ),

            // Show or hide title
            array(
                'id'        => 'autoshowroom_blog_title',
                'label'     => esc_html__('Title Option', 'autoshowroom'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => 1,
                'section'   => 'TZBlog',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('Hide', 'autoshowroom'),
                    ),
                ),

            ),

            // Show or hide Date
            array(
                'id'        => 'autoshowroom_blog_date',
                'label'     => esc_html__('Date Option', 'autoshowroom'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => 1,
                'section'   => 'TZBlog',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('Hide', 'autoshowroom'),
                    ),
                ),

            ),

            // Show or hide Category
            array(
                'id'        => 'autoshowroom_blog_comment',
                'label'     => esc_html__('Comment Option', 'autoshowroom'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => 1,
                'section'   => 'TZBlog',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('Hide', 'autoshowroom'),
                    ),
                ),

            ),

            // Show or hide tag
            array(
                'id'        => 'autoshowroom_blog_view',
                'label'     => esc_html__('View Option', 'autoshowroom'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => 1,
                'section'   => 'TZBlog',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('Hide', 'autoshowroom'),
                    ),
                ),

            ),

            // Show or hide Comments
            array(
                'id'        => 'autoshowroom_blog_category',
                'label'     => esc_html__('Category Option', 'autoshowroom'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => 1,
                'section'   => 'TZBlog',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('Hide', 'autoshowroom'),
                    ),
                ),

            ),

            // Show or hide image
            array(
                'id'        => 'autoshowroom_blog_media',
                'label'     => esc_html__('Media Option', 'autoshowroom'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => 1,
                'section'   => 'TZBlog',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('Hide', 'autoshowroom'),
                    ),
                ),

            ),

            // Show or hide excerpt
            array(
                'id'        => 'autoshowroom_blog_excerpt',
                'label'     => esc_html__('Content Option', 'autoshowroom'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => 1,
                'section'   => 'TZBlog',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('Hide', 'autoshowroom'),
                    ),
                ),

            ),

            // Show or hide share
            array(
                'id'        => 'autoshowroom_blog_share',
                'label'     => esc_html__('Share button', 'autoshowroom'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => 1,
                'section'   => 'TZBlog',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('Hide', 'autoshowroom'),
                    ),
                ),
            ),// Show or hide share
            array(
                'id'        => 'autoshowroom_blog_readmore',
                'label'     => esc_html__('Readmore button', 'autoshowroom'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => 1,
                'section'   => 'TZBlog',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('Hide', 'autoshowroom'),
                    ),
                ),
            ),


            /*=================================
            * Vehicle options
            ===================================*/
            array(
                'id'        => 'autoshowroom_TZVehicle_sidebar',
                'label'     => esc_html__('Vehicle Sidebar Option', 'autoshowroom'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => 1,
                'section'   => 'TZVehicle',
                'choices'   =>  array(
                    array(
                        'value' =>  'right',
                        'label' =>  esc_html__('Sidebar Right', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'left',
                        'label' =>  esc_html__('Sidebar Left', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'none',
                        'label' =>  esc_html__('No Sidebar', 'autoshowroom'),
                    )
                ),

            ),
            array(
                'id'        => 'autoshowroom_TZVehicle_layout',
                'label'     => esc_html__('Vehicle Layout', 'autoshowroom'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => 1,
                'section'   => 'TZVehicle',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Grid', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('List', 'autoshowroom'),
                    )
                ),

            ),
            array(
                'id'        => 'autoshowroom_TZVehicle_sort',
                'label'     => esc_html__('Vehicle Sort', 'autoshowroom'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => 1,
                'section'   => 'TZVehicle',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>  esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>  esc_html__('Hide', 'autoshowroom'),
                    )
                ),

            ),
            array(
                'id'        => 'autoshowroom_TZVehicle_sold',
                'label'     => esc_html__('Vehicle Sold', 'autoshowroom'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => 1,
                'section'   => 'TZVehicle',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>  esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>  esc_html__('Hide', 'autoshowroom'),
                    )
                ),

            ),

            array(
                'id'    =>  'autoshowroom_post_per_page',
                'label' =>  esc_html__('Vehicle per page', 'autoshowroom'),
                'desc'  =>  esc_html__('Vehicle per page', 'autoshowroom'),
                'std'   =>  9,
                'type'  =>  'text',
                'section'=> 'TZVehicle'
            ),

            array(
                'id'    =>  'autoshowroom_orderby',
                'label' =>  esc_html__('Order By', 'autoshowroom'),
                'desc'  =>  esc_html__('', 'autoshowroom'),
                'std'   =>  'date',
                'type'  =>  'select',
                'section'=> 'TZVehicle',
                'choices'   =>  array(
                    array(
                        'value' =>  'date',
                        'label' =>  esc_html__('Date', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'id',
                        'label' =>  esc_html__('ID', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'title',
                        'label' =>  esc_html__('Title', 'autoshowroom'),
                    )
                ),
            ),

            array(
                'id'    =>  'autoshowroom_order',
                'label' =>  esc_html__('Order', 'autoshowroom'),
                'desc'  =>  esc_html__('', 'autoshowroom'),
                'std'   =>  'desc',
                'type'  =>  'select',
                'section'=> 'TZVehicle',
                'choices'   =>  array(
                    array(
                        'value' =>  'desc',
                        'label' =>  esc_html__('Z----->A', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'asc',
                        'label' =>  esc_html__('A----->Z', 'autoshowroom'),
                    )
                ),
            ),
            array(
                'id'        => 'autoshowroom_TZVehicle_excerpt',
                'label'     => esc_html__('Vehicle Excerpt', 'autoshowroom'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => 1,
                'section'   => 'TZVehicle',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('Hide', 'autoshowroom'),
                    )
                ),

            ),
            array(
                'id'    =>  'autoshowroom_TZVehicle_limit',
                'label' =>  esc_html__('Limit Vehicle Description', 'autoshowroom'),
                'desc'  =>  esc_html__('Number of limit description', 'autoshowroom'),
                'std'   =>  80,
                'type'  =>  'text',
                'section'=> 'TZVehicle'
            ),
            array(
                'id'          => 'autoshowroom_TZVehicle_specs',
                'label'       => esc_html__( 'Choose Specifications to display', 'autoshowroom' ),
                'desc'        => esc_html__( 'Specifications has checked will display on inventory page(You should choose max is 3 item to nice view)', 'autoshowroom' ),
                'std'         => '',
                'type'        => 'checkbox',
                'section'     => 'TZVehicle',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and',
                'choices'     =>
                    tz_autoshowroom_get_fields()
            ),

            array(
                'id'    =>  'autoshowroom_TZVehicle_desktop_col',
                'label' =>  esc_html__('DeskTop Columns', 'autoshowroom'),
                'desc'  =>  esc_html__('Number columns per row of inventory page', 'autoshowroom'),
                'std'   =>  3,
                'type'  =>  'text',
                'section'=> 'TZVehicle'
            ),

            array(
                'id'    =>  'autoshowroom_TZVehicle_tablet_col',
                'label' =>  esc_html__('Tablet Columns', 'autoshowroom'),
                'desc'  =>  esc_html__('Number columns per row of inventory page on tablet', 'autoshowroom'),
                'std'   =>  2,
                'type'  =>  'text',
                'section'=> 'TZVehicle'
            ),

            array(
                'id'    =>  'autoshowroom_TZVehicle_mobile_col',
                'label' =>  esc_html__('Mobile Columns', 'autoshowroom'),
                'desc'  =>  esc_html__('Number columns per row of inventory page on mobile', 'autoshowroom'),
                'std'   =>  1,
                'type'  =>  'text',
                'section'=> 'TZVehicle'
            ),

            array(
                'id'    =>  'autoshowroom_TZVehicle_compare_text',
                'label' =>  esc_html__('Phone Text', 'autoshowroom'),
                'desc'  =>  '',
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TZVehicleCompare'
            ),

            array(
                'id'    =>  'autoshowroom_TZVehicle_compare_phone',
                'label' =>  esc_html__('Phone Number', 'autoshowroom'),
                'desc'  =>  '',
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TZVehicleCompare'
            ),

            array(
                'id'    =>  'autoshowroom_TZVehicle_compare_button_text',
                'label' =>  esc_html__('Text of Button', 'autoshowroom'),
                'desc'  =>  '',
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TZVehicleCompare'
            ),

            array(
                'id'    =>  'autoshowroom_TZVehicle_compare_button_link',
                'label' =>  esc_html__('Link of Button', 'autoshowroom'),
                'desc'  =>  '',
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TZVehicleCompare'
            ),

            array(
                'id'    =>  'autoshowroom_TZVehicle_compare_remove_txt',
                'label' =>  esc_html__('Text of button remove', 'autoshowroom'),
                'desc'  =>  '',
                'std'   =>  '',
                'type'  =>  'text',
                'section'=> 'TZVehicleCompare'
            ),

            array(
                'id'          => 'autoshowroom_TZVehicleCalculator_on',
                'label'       => __( 'Calculator', 'autoshowroom' ),
                'desc'        => sprintf( __( 'The On/Off option type displays a simple switch that can be used to turn things on or off. The saved return value is either %s or %s.', 'autoshowroom' ), '<code>on</code>', '<code>off</code>' ),
                'std'         => '',
                'type'        => 'on-off',
                'section'     => 'TZVehicleCalculator',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),

            array(
                'id'    =>  'autoshowroom_TZVehicleCalculator_Title',
                'label' =>  esc_html__('Calculator Title', 'autoshowroom'),
                'desc'  =>  '',
                'std'   =>  esc_html__('payment calculator'),
                'type'  =>  'text',
                'section'=> 'TZVehicleCalculator'
            ),

            array(
                'label'     => esc_html__('Down Payment','autoshowroom'),
                'id'        => 'autoshowroom_TZVehicleCalculator_down',
                'type'      => 'list-item',
                'desc'      =>  esc_html__('Create Options to Down payment ', 'autoshowroom'),
                'section'   => 'TZVehicleCalculator',
                'class'     => '',
                'settings'  => array(
                    array(
                        'id'        => 'autoshowroom_TZVehicleCalculator_down_payment',
                        'label'     => esc_html__('Down Payment','autoshowroom'),
                        'type'      => 'text',
                        'desc'      =>  esc_html__('Percent of Down Payment', 'autoshowroom'),
                        'std'       => 10,
                        'class'     => '',
                    ),
                    array(
                        'id'        => 'autoshowroom_TZVehicleCalculator_Annual',
                        'label'     => esc_html__('Annual Rate','autoshowroom'),
                        'desc'      =>  esc_html__('Percent of Annual Rate', 'autoshowroom'),
                        'type'      => 'text',
                        'std'       => 5,
                        'class'     => '',
                    )
                )
            ),

            array(
                'label'     => esc_html__('Loan Period','autoshowroom'),
                'id'        => 'autoshowroom_TZVehicleCalculator_down_months',
                'type'      => 'list-item',
                'desc'      =>  esc_html__('Loan Period', 'autoshowroom'),
                'section'   => 'TZVehicleCalculator',
                'class'     => '',
                'settings'  => array(
                    array(
                        'id'        => 'autoshowroom_TZVehicleCalculator_down_payment_month',
                        'label'     => esc_html__('Months','autoshowroom'),
                        'desc'      =>  esc_html__('Loan Period', 'autoshowroom'),
                        'type'      => 'text',
                        'std'       => 12,
                        'class'     => '',
                    ),
                )
            ),

            array(
                'id'    =>  'autoshowroom_TZVehicleCalculator_price_txt',
                'label' =>  esc_html__('Price Text', 'autoshowroom'),
                'desc'  =>  '',
                'std'   =>  esc_html__('Vehicle Price <span>($)</span>', 'autoshowroom'),
                'type'  =>  'text',
                'section'=> 'TZVehicleCalculator'
            ),

            array(
                'id'    =>  'autoshowroom_TZVehicleCalculator_d_txt',
                'label' =>  esc_html__('Down Payment Text', 'autoshowroom'),
                'desc'  =>  '',
                'std'   =>  esc_html__('Down Payment <span>(%)</span>', 'autoshowroom'),
                'type'  =>  'text',
                'section'=> 'TZVehicleCalculator'
            ),

            array(
                'id'    =>  'autoshowroom_TZVehicleCalculator_rate_txt',
                'label' =>  esc_html__('Annual Rate Text', 'autoshowroom'),
                'desc'  =>  '',
                'std'   =>  esc_html__('Annual Rate <span>(%)</span>', 'autoshowroom'),
                'type'  =>  'text',
                'section'=> 'TZVehicleCalculator'
            ),

            array(
                'id'    =>  'autoshowroom_TZVehicleCalculator_loan_txt',
                'label' =>  esc_html__('Loan Period Text', 'autoshowroom'),
                'desc'  =>  '',
                'std'   =>  esc_html__('Loan Period <span>(%)</span>', 'autoshowroom'),
                'type'  =>  'text',
                'section'=> 'TZVehicleCalculator'
            ),

            array(
                'id'    =>  'autoshowroom_TZVehicleCalculator_btn_txt',
                'label' =>  esc_html__('Button Text', 'autoshowroom'),
                'desc'  =>  '',
                'std'   =>  esc_html__('Calculator', 'autoshowroom'),
                'type'  =>  'text',
                'section'=> 'TZVehicleCalculator'
            ),

            array(
                'id'    =>  'autoshowroom_TZVehicleCalculator_monthy_txt',
                'label' =>  esc_html__('Result Monthy Text', 'autoshowroom'),
                'desc'  =>  '',
                'std'   =>  esc_html__('Monthy Payment', 'autoshowroom'),
                'type'  =>  'text',
                'section'=> 'TZVehicleCalculator'
            ),

            array(
                'id'    =>  'autoshowroom_TZVehicleCalculator_annual_txt',
                'label' =>  esc_html__('Total Interest Text', 'autoshowroom'),
                'desc'  =>  '',
                'std'   =>  esc_html__('Total Interest Payment', 'autoshowroom'),
                'type'  =>  'text',
                'section'=> 'TZVehicleCalculator'
            ),

            array(
                'id'    =>  'autoshowroom_TZVehicleCalculator_total_txt',
                'label' =>  esc_html__('Total Amount Text', 'autoshowroom'),
                'desc'  =>  '',
                'std'   =>  esc_html__('Total Amount to Pay', 'autoshowroom'),
                'type'  =>  'text',
                'section'=> 'TZVehicleCalculator'
            ),




            // Vehicle Detail

            array(
                'id'        =>  'autoshowroom_Detail_show_popup',
                'label'     => esc_html__('Enable Popup Slider', 'autoshowroom'),
                'desc'      =>  '',
                'sdt'       =>  'yes',
                'type'      =>  'select',
                'section'   => 'TZVehicleDetail',
                'choices'   =>  array(
                    array(
                        'value' =>  'yes',
                        'label' =>  esc_html__('Yes', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'no',
                        'label' =>  esc_html__('No', 'autoshowroom'),
                    )
                )
            ),
            array(
                'id'    =>  'autoshowroom_Detail_tax_txt',
                'label' =>  esc_html__('Taxes Text', 'autoshowroom'),
                'desc'  =>  '',
                'std'   =>  esc_html__('Included Taxes & Checkup', 'autoshowroom'),
                'type'  =>  'text',
                'section'=> 'TZVehicleDetail'
            ),
            array(
                'id'        =>  'autoshowroom_Detail_show_compare',
                'label'     => esc_html__('Show button Add to compare', 'autoshowroom'),
                'desc'      =>  '',
                'sdt'       =>  'yes',
                'type'      =>  'select',
                'section'   => 'TZVehicleDetail',
                'choices'   =>  array(
                    array(
                        'value' =>  'yes',
                        'label' =>  esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'no',
                        'label' =>  esc_html__('Hide', 'autoshowroom'),
                    )
                )
            ),
            array(
                'id'        =>  'autoshowroom_Detail_show_brochure',
                'label'     => esc_html__('Show button Brochure', 'autoshowroom'),
                'desc'      =>  '',
                'sdt'       =>  'yes',
                'type'      =>  'select',
                'section'   => 'TZVehicleDetail',
                'choices'   =>  array(
                    array(
                        'value' =>  'yes',
                        'label' =>  esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'no',
                        'label' =>  esc_html__('Hide', 'autoshowroom'),
                    )
                )
            ),
            array(
                'id'        =>  'autoshowroom_Detail_show_make',
                'label'     => esc_html__('Show Make', 'autoshowroom'),
                'desc'      =>  '',
                'sdt'       =>  'yes',
                'type'      =>  'select',
                'section'   => 'TZVehicleDetail',
                'choices'   =>  array(
                    array(
                        'value' =>  'yes',
                        'label' =>  esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'no',
                        'label' =>  esc_html__('Hide', 'autoshowroom'),
                    )
                )
            ),
            array(
                'id'        =>  'autoshowroom_Detail_show_msrp',
                'label'     => esc_html__('Show MSRP', 'autoshowroom'),
                'desc'      =>  '',
                'sdt'       =>  'yes',
                'type'      =>  'select',
                'section'   => 'TZVehicleDetail',
                'choices'   =>  array(
                    array(
                        'value' =>  'yes',
                        'label' =>  esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'no',
                        'label' =>  esc_html__('Hide', 'autoshowroom'),
                    )
                )
            ),
            array(
                'id'        =>  'autoshowroom_Detail_show_model',
                'label'     => esc_html__('Show Model', 'autoshowroom'),
                'desc'      =>  '',
                'sdt'       =>  'yes',
                'type'      =>  'select',
                'section'   => 'TZVehicleDetail',
                'choices'   =>  array(
                    array(
                        'value' =>  'yes',
                        'label' =>  esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'no',
                        'label' =>  esc_html__('Hide', 'autoshowroom'),
                    )
                )
            ),
            array(
                'id'        =>  'autoshowroom_Detail_show_related',
                'label'     => esc_html__('Show Related', 'autoshowroom'),
                'desc'      =>  '',
                'sdt'       =>  'yes',
                'type'      =>  'select',
                'section'   => 'TZVehicleDetail',
                'choices'   =>  array(
                    array(
                        'value' =>  'yes',
                        'label' =>  esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'no',
                        'label' =>  esc_html__('Hide', 'autoshowroom'),
                    )
                )
            ),
            array(
                'id'    =>  'autoshowroom_Detail_related_txt',
                'label' =>  esc_html__('Related Text', 'autoshowroom'),
                'desc'  =>  '',
                'std'   =>  esc_html__('Related Cars', 'autoshowroom'),
                'type'  =>  'text',
                'section'=> 'TZVehicleDetail'
            ),
            array(
                'id'        =>  'autoshowroom_Detail_related_number',
                'label'     => esc_html__('Number Cars Related', 'autoshowroom'),
                'desc'      =>  '',
                'sdt'       =>  '4',
                'type'      =>  'select',
                'section'   => 'TZVehicleDetail',
                'choices'   =>  array(
                    array(
                        'value' =>  '2',
                        'label' =>  esc_html__('2', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  esc_html__('3', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  esc_html__('4', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  '6',
                        'label' =>  esc_html__('6', 'autoshowroom'),
                    )
                )
            ),



            //===== Single page
            array(
                'id'        => 'TZSingle',
                'label'     => esc_html__('Option', 'autoshowroom'),
                'desc'      => '<p>'.esc_html__('Option for page single post.','autoshowroom').'</p>',
                'std'       => '',
                'type'      => 'textblock-titled',
                'section'   => 'TZSingle',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        =>  'autoshowroom_singlesidebar',
                'label'     => esc_html__('Show or hide sidebar', 'autoshowroom'),
                'desc'      =>  '',
                'sdt'       =>  0,
                'type'      =>  'select',
                'section'   => 'TZSingle',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Sidebar Right', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('Sidebar Left', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  2,
                        'label' =>  esc_html__('No Sidebar', 'autoshowroom'),
                    )
                )
            ),
            array(
                'id'        =>'autoshowroom_tzshowdate',
                'label'     =>esc_html__('Show Date?','autoshowroom'),
                'type'      =>'select',
                'std'=>'',
                'section'=>'TZSingle',
                'choices'=>array(
                    array(
                        'value'=>   1,
                        'label'=>   esc_html__('Show','autoshowroom'),
                    ),
                    array(
                        'value'=>   0,
                        'label'=>   esc_html__('Hide','autoshowroom'),
                    ),

                )

            ),
            array(
                'id'        =>'autoshowroom_tzmedia',
                'label'     =>esc_html__('Show Media','autoshowroom'),
                'type'      =>'select',
                'std'=>'',
                'section'=>'TZSingle',
                'choices'=>array(
                    array(
                        'value'=>   1,
                        'label'=>   esc_html__('Show','autoshowroom'),
                    ),
                    array(
                        'value'=>   0,
                        'label'=>   esc_html__('Hide','autoshowroom'),
                    ),

                )

            ),
            array(
                'id'        =>'autoshowroom_tzshowcategory',
                'label'     =>esc_html__('Show Category?','autoshowroom'),
                'type'      =>'select',
                'std'=>'',
                'section'=>'TZSingle',
                'choices'=>array(
                    array(
                        'value'=>   1,
                        'label'=>   esc_html__('Show','autoshowroom'),
                    ),
                    array(
                        'value'=>   0,
                        'label'=>   esc_html__('Hide','autoshowroom'),
                    ),

                )

            ),
            array(
                'id'        =>'autoshowroom_tzshowtag',
                'label'     =>esc_html__('Show Tag?','autoshowroom'),
                'type'      =>'select',
                'std'=>'',
                'section'=>'TZSingle',
                'choices'=>array(
                    array(
                        'value'=>   1,
                        'label'=>   esc_html__('Show','autoshowroom'),
                    ),
                    array(
                        'value'=>   0,
                        'label'=>   esc_html__('Hide','autoshowroom'),
                    ),

                )

            ),
            array(
                'id'        =>'autoshowroom_tzshowshare',
                'label'     =>esc_html__('Show Share?','autoshowroom'),
                'type'      =>'select',
                'std'=>'',
                'section'=>'TZSingle',
                'choices'=>array(
                    array(
                        'value'=>   1,
                        'label'=>   esc_html__('Show','autoshowroom'),
                    ),
                    array(
                        'value'=>   0,
                        'label'=>   esc_html__('Hide','autoshowroom'),
                    ),

                )

            ),
            array(
                'id'        =>'autoshowroom_tzshowauthor',
                'label'     =>esc_html__('Show Author?','autoshowroom'),
                'type'      =>'select',
                'std'=>'',
                'section'=>'TZSingle',
                'choices'=>array(
                    array(
                        'value'=>   1,
                        'label'=>   esc_html__('Show','autoshowroom'),
                    ),
                    array(
                        'value'=>   0,
                        'label'=>   esc_html__('Hide','autoshowroom'),
                    ),

                )

            ),
            array(
                'id'        =>'autoshowroom_tzshowrecent',
                'label'     =>esc_html__('Show other post','autoshowroom'),
                'type'      =>'select',
                'std'=>'',
                'section'=>'TZSingle',
                'choices'=>array(
                    array(
                        'value'=>   1,
                        'label'=>   esc_html__('Show','autoshowroom'),
                    ),
                    array(
                        'value'=>   0,
                        'label'=>   esc_html__('Hide','autoshowroom'),
                    ),

                )

            ),
            array(
                'id'        =>  'autoshowroom_tzshowcomment',
                'label'     =>  esc_html__('Show Comment?','autoshowroom'),
                'type'      =>  'select',
                'std'       =>  '',
                'section'   =>  'TZSingle',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>  esc_html__('Show','autoshowroom'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>  esc_html__('Hide','autoshowroom'),
                    ),

                )

            ),
            /* SHOP OPTION */

            array(
                'id'        => 'cShopOption',
                'label'     => 'Shop Option',
                'desc'      => '',
                'std'       => '',
                'type'      => 'textblock-titled',
                'section'   => 'tzShopOption',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        =>  'autoshowroom_TzShop_Sidebar',
                'label'     =>   esc_html__('Sidebar Option', 'autoshowroom'),
                'desc'      =>   esc_html__('You can choose show sidebar right or sidebar left.Default is no sidebar.', 'autoshowroom'),
                'std'       =>  'no',
                'type'      =>  'select',
                'section'   =>  'tzShopOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'no',
                        'label' =>   esc_html__('No Sidebar', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'right',
                        'label' =>   esc_html__('Sidebar Right', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'left',
                        'label' =>   esc_html__('Sidebar Left', 'autoshowroom'),
                    ),
                ),
            ),

            array(
                'id'       =>  'autoshowroom_TzShopGrid_Column',
                'label'    =>   esc_html__('Number Column Shop Grid.', 'autoshowroom'),
                'desc'     =>   esc_html__('You can set number column for shop page type grid.','autoshowroom'),
                'std'       =>  '4',
                'type'      =>  'select',
                'section'   =>  'tzShopOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '4',
                        'label' =>   esc_html__('4', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>   esc_html__('3', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>   esc_html__('2', 'autoshowroom'),
                    ),
                ),
            ),

            array(
                'id'        =>  'autoshowroom_TzShop_Title',
                'label'     =>   esc_html__('Title', 'autoshowroom'),
                'desc'      =>   esc_html__('You can choose title product show or hide.', 'autoshowroom'),
                'std'       =>  'fix',
                'type'      =>  'select',
                'section'   =>  'tzShopOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'autoshowroom'),
                    ),
                ),
            ),

            array(
                'id'        =>  'autoshowroom_TzShop_Rate',
                'label'     =>   esc_html__('Rating', 'autoshowroom'),
                'desc'      =>   esc_html__('You can choose rating product show or hide.', 'autoshowroom'),
                'std'       =>  'fix',
                'type'      =>  'select',
                'section'   =>  'tzShopOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'autoshowroom'),
                    ),
                ),
            ),

            array(
                'id'        =>  'autoshowroom_TzShop_Price',
                'label'     =>   esc_html__('Rating', 'autoshowroom'),
                'desc'      =>   esc_html__('You can choose rating product show or hide.', 'autoshowroom'),
                'std'       =>  'fix',
                'type'      =>  'select',
                'section'   =>  'tzShopOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'autoshowroom'),
                    ),
                ),
            ),


            array(
                'id'        =>  'autoshowroom_TzShopPagination',
                'label'     =>   esc_html__('Pagination Option', 'autoshowroom'),
                'desc'      =>   esc_html__('You can choose pagination product show or hide.', 'autoshowroom'),
                'std'       =>  'show',
                'type'      =>  'select',
                'section'   =>  'tzShopOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'autoshowroom'),
                    ),
                ),
            ),


            /* SHOP DETAIL OPTION */

            array(
                'id'        => 'cShopDetailOption',
                'label'     => 'Shop Detail Option',
                'desc'      => '',
                'std'       => '',
                'type'      => 'textblock-titled',
                'section'   => 'tzShopDetailOption',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),

            array(
                'id'        =>  'autoshowroom_TzShopDetail_Slider',
                'label'     =>   esc_html__('Slideshow', 'autoshowroom'),
                'desc'      =>   esc_html__('You can choose Slider for shop gallery', 'autoshowroom'),
                'std'       =>  'woo',
                'type'      =>  'select',
                'section'   =>  'tzShopDetailOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'woo',
                        'label' =>   esc_html__('WooCommerce Slider', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'flex',
                        'label' =>   esc_html__('Flex Slider', 'autoshowroom'),
                    ),
                ),
            ),
            array(
                'id'        =>  'autoshowroom_TzShopDetail_Title',
                'label'     =>   esc_html__('Title', 'autoshowroom'),
                'desc'      =>   esc_html__('You can choose title product show or hide.', 'autoshowroom'),
                'std'       =>  'fix',
                'type'      =>  'select',
                'section'   =>  'tzShopDetailOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'autoshowroom'),
                    ),
                ),
            ),

            array(
                'id'        =>  'autoshowroom_TzShopDetail_Rate',
                'label'     =>   esc_html__('Rating', 'autoshowroom'),
                'desc'      =>   esc_html__('You can choose rating product show or hide.', 'autoshowroom'),
                'std'       =>  'fix',
                'type'      =>  'select',
                'section'   =>  'tzShopDetailOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'autoshowroom'),
                    ),
                ),
            ),

            array(
                'id'        =>  'autoshowroom_TzShopDetail_Price',
                'label'     =>   esc_html__('Price', 'autoshowroom'),
                'desc'      =>   esc_html__('You can choose price product show or hide.', 'autoshowroom'),
                'std'       =>  'fix',
                'type'      =>  'select',
                'section'   =>  'tzShopDetailOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'autoshowroom'),
                    ),
                ),
            ),

            array(
                'id'        =>  'autoshowroom_TzShopDetail_Price',
                'label'     =>   esc_html__('Price', 'autoshowroom'),
                'desc'      =>   esc_html__('You can choose price product show or hide.', 'autoshowroom'),
                'std'       =>  'fix',
                'type'      =>  'select',
                'section'   =>  'tzShopDetailOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'autoshowroom'),
                    ),
                ),
            ),

            array(
                'id'        =>  'autoshowroom_TzShopDetail_Box',
                'label'     =>   esc_html__('Box Information', 'autoshowroom'),
                'desc'      =>   esc_html__('You can choose box information product show or hide.', 'autoshowroom'),
                'std'       =>  'fix',
                'type'      =>  'select',
                'section'   =>  'tzShopDetailOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'autoshowroom'),
                    ),
                ),
            ),

            array(
                'id'        =>  'autoshowroom_TzShopDetail_Related',
                'label'     =>   esc_html__('Related', 'autoshowroom'),
                'desc'      =>   esc_html__('You can choose related product show or hide.', 'autoshowroom'),
                'std'       =>  'fix',
                'type'      =>  'select',
                'section'   =>  'tzShopDetailOption',
                'rows'      =>  '',
                'post_type' =>  '',
                'taxonomy'  =>  '',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>   esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>   esc_html__('Hide', 'autoshowroom'),
                    ),
                ),
            ),
        ) // end setting
    );

    // Specifications Icon
    $autoshowroom_custom_settings['settings']= array_merge($autoshowroom_custom_settings['settings'], $auto_speci);

    /* allow settings to be filtered before saving */

    $autoshowroom_custom_settings = apply_filters('option_tree_settings_args', $autoshowroom_custom_settings);

    /* settings are not the same update the DB */
    if ($autoshowroom_saved_settings !== $autoshowroom_custom_settings) {
        update_option('option_tree_settings', $autoshowroom_custom_settings);
    }

}


?>
