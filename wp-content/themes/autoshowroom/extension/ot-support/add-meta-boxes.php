<?php
/**
 * Initialize the meta boxes.
 */

add_action( 'admin_init', 'autoshowroom_custom_meta_boxes');

/*
 * Methor add meta boxes for custom post type
 */
function autoshowroom_get_sidebars(){
    $autoshowroom_sidebar = array();
     foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
         array_push($autoshowroom_sidebar, array(
             'value'=> $sidebar['id'],
             'label'=>$sidebar['name'],
         ));
     }
    return $autoshowroom_sidebar;
}
function autoshowroom_custom_meta_boxes(){

    /**
     * Create a custom meta boxes array that we pass to
     * the OptionTree Meta Box API Class.
     */

    $autoshowroom_portfolio_meta_box =   array(
        'id'          =>  'portfolio_meta_box',
        'title'       =>  esc_html__('Portfolio Option', 'autoshowroom'),
        'desc'        =>  '',
        'pages'       => array( 'portfolio'),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'label'     =>  esc_html__('Post Type', 'autoshowroom'),
                'id'        =>  'autoshowroom_portfolio_type',
                'type'      =>  'select',
                'desc'      =>  esc_html__('Option type Post', 'autoshowroom'),
                'std'       =>  'none',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   =>  array(
                    array(
                        'value' => 'none',
                        'label' => esc_html__('None', 'autoshowroom')
                    ),
                    array(
                        'value' => 'video',
                        'label' => esc_html__('Video', 'autoshowroom')
                    ),
                    array(
                        'value' => 'audio',
                        'label' => esc_html__('Audio', 'autoshowroom')
                    ),
                    array(
                        'value' => 'quote',
                        'label' => esc_html__('Quote', 'autoshowroom')
                    ),
                    array(
                        'value' => 'image',
                        'label' => esc_html__('Image', 'autoshowroom')
                    ),
                    array(
                        'value' => 'slideshows',
                        'label' => esc_html__('Slideshows', 'autoshowroom')
                    )
                ),

            ),

            array(
                'label'     => esc_html__('Slideshow', 'autoshowroom'),
                'id'        => 'autoshowroom_portfolio_slideshows',
                'type'      => 'list-item',
                'desc'      => '',
                'class'     => 'portfolio-slideshows',
                'settings'  => array(
                    array(
                        'id'        => 'autoshowroom_portfolio_slideshow_item',
                        'label'     => esc_html__('Image', 'autoshowroom'),
                        'type'      => 'upload',
                        'class'     => 'portfolio-slideshow-item',
                    )
                )
            ),
            array(
                'label'     => esc_html__('Image', 'autoshowroom'),
                'id'        => 'autoshowroom_portfolio_image',
                'type'      => 'upload',
                'desc'      => ''
            ),
            array(
                'label'     => esc_html__('SoundCloud ID', 'autoshowroom'),
                'id'        => 'autoshowroom_portfolio_soundCloud_id',
                'type'      => 'text',
                'desc'      => esc_html__('Only use for the SoundCloud', 'autoshowroom'),
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => 'SoundCloudImage'
            ),

            array(
                'label'     => esc_html__('Quote Content', 'autoshowroom'),
                'id'        => 'autoshowroom_portfolio_Quote_content',
                'type'      => 'textarea',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),
            array(
                'label'     => esc_html__('Quote Description', 'autoshowroom'),
                'id'        => 'autoshowroom_portfolio_Quote_ds',
                'type'      => 'text',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),

            array(
                'label'     => esc_html__('Video MP4', 'autoshowroom'),
                'id'        => 'autoshowroom_portfolio_video_mp4',
                'type'      => 'upload',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),
            array(
                'label'     => esc_html__('Video OGV', 'autoshowroom'),
                'id'        => 'autoshowroom_portfolio_video_ogv',
                'type'      => 'upload',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),
            array(
                'label'     => esc_html__('Video WEBM', 'autoshowroom'),
                'id'        => 'autoshowroom_portfolio_video_webm',
                'type'      => 'upload',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),
        )
    );

    $autoshowroom_pageportfolio_meta_box =   array(
        'id'          =>  'page_meta_box',
        'title'       =>  esc_html__('Portfolio Option', 'autoshowroom'),
        'desc'        =>  '',
        'pages'       => array( 'page'),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'id' =>  'autoshowroom_portfolio_column',
                'label'     => esc_html__('Config Portfolio Column', 'autoshowroom'),
                'desc'      => '------------------',
                'std'       => '',
                'type'      => 'textblock-titled',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),

            array(
                'id'        =>  'autoshowroom_desktop_column',
                'label'     => esc_html__('Desktop column', 'autoshowroom'),
                'desc'      =>  '',
                'sdt'       =>  '4',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
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
                    )
                )
            ),
            array(
                'id'        =>  'autoshowroom_tabletportrait_column',
                'label'     =>  esc_html__('tablet portrait column', 'autoshowroom'),
                'desc'      =>  '',
                'sdt'       =>  '2',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
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
                )
            ),
            array(
                'id'        =>  'autoshowroom_mobilelandscape_column',
                'label'     =>  esc_html__('mobile landscape column', 'autoshowroom'),
                'desc'      =>  '',
                'sdt'       =>  '2',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
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
                )
            ),
            array(
                'id'        =>  'autoshowroom_mobileportrait_column',
                'label'     =>  esc_html__('mobile portrait column', 'autoshowroom'),
                'desc'      =>  '',
                'sdt'       =>  '1',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
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
                )
            ),

            array(
                'id'        => 'autoshowroom_portfolio_catid',
                'label'     => esc_html__('Category', 'autoshowroom'),
                'desc'      => esc_html__('Choose category portfolio', 'autoshowroom'),
                'std'       => '',
                'type'      => 'taxonomy-checkbox',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => 'portfolio-category',
                'class'     => ''
            ),
            array(
                'id'        => 'autoshowroom_portfolio_limit',
                'label'     => esc_html__('Limit portfolio', 'autoshowroom'),
                'desc'      => '',
                'std'       => '10',
                'type'      => 'text',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        =>  'autoshowroom_porfolio_orderby',
                'label'     => esc_html__('Orderby', 'autoshowroom'),
                'desc'      =>  '',
                'sdt'       =>  'date',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'date',
                        'label' =>  esc_html__('Date', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'title',
                        'label' =>  esc_html__('Title', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'id',
                        'label' =>  esc_html__('ID', 'autoshowroom'),
                    ),
                )
            ),
            array(
                'id'        =>  'autoshowroom_porfolio_order',
                'label'     =>  esc_html__('Order', 'autoshowroom'),
                'desc'      =>  '',
                'sdt'       =>  'desc',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'desc',
                        'label' =>  esc_html__('Z ---> A', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'asc',
                        'label' =>  esc_html__('A ---> Z', 'autoshowroom'),
                    ),
                )
            ),
            array(
                'id'        =>  'autoshowroom_paging',
                'label'     =>  esc_html__('Paging', 'autoshowroom'),
                'desc'      =>  esc_html__('choose type paging', 'autoshowroom'),
                'sdt'       =>  'ajaxscroll',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'pagenavi',
                        'label' =>  esc_html__('Default ( 1, 2, 3 ... 8, 9 , 10)', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'ajaxbutton',
                        'label' =>  esc_html__('Ajaxbutton', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'ajaxscroll',
                        'label' =>  esc_html__('Ajax scroll', 'autoshowroom'),
                    ),
                )
            ),
            array(
                'id'        =>  'autoshowroom_porfolio_filter_status',
                'label'     =>  esc_html__('Filter Status', 'autoshowroom'),
                'desc'      =>  '',
                'sdt'       =>  'show',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'show',
                        'label' =>  esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'hide',
                        'label' =>  esc_html__('Hide', 'autoshowroom'),
                    ),
                )
            ),
            array(
                'id'        =>  'autoshowroom_porfolio_filter',
                'label'     =>  esc_html__('Filter Porfolio', 'autoshowroom'),
                'desc'      =>  '',
                'sdt'       =>  'portfolio-tags',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'portfolio-tags',
                        'label' =>  esc_html__('Portfolio tags', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'portfolio-category',
                        'label' =>  esc_html__('Portfolio category', 'autoshowroom'),
                    ),
                )
            ),
            array(
                'id'        =>  'autoshowroom_porfolio_loadding',
                'label'     => esc_html__('Image loadding', 'autoshowroom'),
                'desc'      =>  '',
                'sdt'       =>  '',
                'type'      =>  'upload',
                'class'     =>  '',
            ),
            array(
                'id'        =>  'autoshowroom_porfolio_sidebar',
                'label'     =>  esc_html__('Sidebar Option', 'autoshowroom'),
                'desc'      =>  '',
                'sdt'       =>  'no',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>   esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>   esc_html__('Hide', 'autoshowroom'),
                    ),
                )
            ),
        ) // end fields
    );

    $autoshowroom_page_option =   array(
        'id'          =>  'autoshowrom_page_option_meta_box',
        'title'       =>  esc_html__('Background Image Of Section title', 'autoshowroom'),
        'desc'        =>  '',
        'pages'       => array( 'page'),
        'context'     => 'side',
        'priority'    => 'low',
        'fields'      => array(
            array(
                'label'     => esc_html__('Background Image', 'autoshowroom'),
                'id'        => 'autoshowroom_page_title_image',
                'type'      => 'upload',
                'desc'      => ''
            ),

        ) // end fields
    );
    /*$autoshowroom_footer_type = array(
        'id'          =>  'autoshowroom_footer_type_meta_box',
        'title'       =>  esc_html__('Footer Options', 'autoshowroom'),
        'desc'        =>  '',
        'pages'       => array( 'page'),
        'context'     => 'side',
        'priority'    => 'low',
        'std'         => 'type1',
        'fields'      => array(
            array(
                'label'     => esc_html__('Footer Type', 'autoshowroom'),
                'id'        => 'autoshowroom_page_footer_type',
                'type'      => 'select',
                'choices'   =>  array(
                    array(
                        'value' =>  'type1',
                        'label' =>   esc_html__('Footer Type 1', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'type2',
                        'label' =>   esc_html__('Footer Type 2', 'autoshowroom'),
                    ),
                )
            ), // end fields
        )
    );*/


    $autoshowroom_sidebar_option=   array(
        'id'          =>  'autoshowrom_sidebar_option_meta_box',
        'title'       =>  esc_html__('Section Sidebar', 'autoshowroom'),
        'desc'        =>  '',
        'pages'       => array( 'page'),
        'context'     => 'side',
        'priority'    => 'low',
        'fields'      => array(
            array(
                'label'     => esc_html__('SideBar Position', 'autoshowroom'),
                'id'        => 'autoshowroom_sidebar_option_choose',
                'type'      => 'select',
                'choices'   =>  array(
                    array(
                        'value' =>  0,
                        'label' =>   esc_html__('None', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  1,
                        'label' =>   esc_html__('Left', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  2,
                        'label' =>   esc_html__('Right', 'autoshowroom'),
                    ),
                )
            ),
            array(
                'label'     => esc_html__('Select SideBar', 'autoshowroom'),
                'id'        => 'autoshowroom_sidebar_name',
                'type'      => 'select',
                'choices'   => autoshowroom_get_sidebars()

            ),
        ),
    );

    $autoshowroom_contact_option=   array(
        'id'          =>  'autoshowrom_contact_option_meta_box',
        'title'       =>  esc_html__('Section Contact Option', 'autoshowroom'),
        'desc'        =>  '',
        'pages'       => array( 'page'),
        'context'     => 'side',
        'priority'    => 'low',
        'fields'      => array(
            array(
                'label'     => esc_html__('Background Image', 'autoshowroom'),
                'id'        => 'autoshowroom_contact_option_bgimage',
                'type'      => 'upload',
                'desc'      => ''
            ),
            array(
                'label'     => esc_html__('Message Contact', 'autoshowroom'),
                'id'        => 'autoshowroom_contact_option_message',
                'type'      => 'textarea',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),
            array(
                'label'     => esc_html__('Button Text', 'autoshowroom'),
                'id'        => 'autoshowroom_contact_option_button_text',
                'type'      => 'text',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
            ),
            array(
                'label'     => esc_html__('Button Link', 'autoshowroom'),
                'id'        => 'autoshowroom_contact_option_button_link',
                'type'      => 'text',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
            ),
        ) // end fields
    );

    $autoshowroom_vehicle_fields =   array(
        'id'          =>  'autoshowrom_page_option_meta_box',
        'title'       =>  esc_html__('Vehicle Options', 'autoshowroom'),
        'desc'        =>  '',
        'pages'       => array( 'vehicle'),
        'context'     => 'side',
        'priority'    => 'low',
        'fields'      => array(
            array(
                'label'     => esc_html__('Vehicle Brochure', 'autoshowroom'),
                'id'        => 'autoshowroom_vehicle_brochure',
                'type'      => 'upload',
                'desc'      => ''
            ),
            array(
                'id'        =>  'autoshowroom_vehicle_sold',
                'label'     =>  esc_html__('Vehicle Sold', 'autoshowroom'),
                'desc'      =>  '',
                'sdt'       =>  'no',
                'type'      =>  'radio',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'upcoming',
                        'label' =>   esc_html__('Upcoming', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'sold',
                        'label' =>   esc_html__('Sold', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  'no',
                        'label' =>   esc_html__('None', 'autoshowroom'),
                    ),

                )
            ),

        ) // end fields
    );

    $autoshowroom_agency_meta_box =   array(
        'id'          =>  'autoshowroom_agency_meta_box',
        'title'       =>  esc_html__('Agency Option', 'autoshowroom'),
        'desc'        =>  '',
        'pages'       => array( 'agency'),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(

            array(
                'label'     => esc_html__('Map', 'autoshowroom'),
                'id'        => 'autoshowroom_agency_map',
                'type'      => 'textarea',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),
            array(
                'label'     => esc_html__('Address', 'autoshowroom'),
                'id'        => 'autoshowroom_agency_address',
                'type'      => 'text',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),
            array(
                'label'     => esc_html__('Phone', 'autoshowroom'),
                'id'        => 'autoshowroom_agency_phone',
                'type'      => 'text',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),
            array(
                'label'     => esc_html__('Email', 'autoshowroom'),
                'id'        => 'autoshowroom_agency_email',
                'type'      => 'text',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),
            array(
                'label'     => esc_html__('Department', 'autoshowroom'),
                'id'        => 'autoshowroom_agency_sales_department',
                'type'      => 'text',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),
            array(
                'label'     => esc_html__('Service', 'autoshowroom'),
                'id'        => 'autoshowroom_agency_service_department',
                'type'      => 'text',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),
            array(
                'label'     => esc_html__('Rate', 'autoshowroom'),
                'id'        => 'autoshowroom_agency_rate',
                'type'      => 'text',
                'desc'      => 'Rate from 0 to 5. Example : 4',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => ''
            ),

            array(
                'id'        =>  'autoshowroom_agency_sidebar',
                'label'     =>  esc_html__('Sidebar Option', 'autoshowroom'),
                'desc'      =>  '',
                'sdt'       =>  'no',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  1,
                        'label' =>   esc_html__('Show', 'autoshowroom'),
                    ),
                    array(
                        'value' =>  0,
                        'label' =>   esc_html__('Hide', 'autoshowroom'),
                    ),
                )
            ),
        )
    );

    /**
     * Register our meta boxes using the
     * ot_register_meta_box() function.
     */

    ot_register_meta_box( $autoshowroom_vehicle_fields );
    ot_register_meta_box( $autoshowroom_portfolio_meta_box );


    ot_register_meta_box( $autoshowroom_pageportfolio_meta_box );
    ot_register_meta_box( $autoshowroom_page_option );
    ot_register_meta_box( $autoshowroom_sidebar_option );
    ot_register_meta_box( $autoshowroom_contact_option );
    ot_register_meta_box( $autoshowroom_agency_meta_box );



}
?>