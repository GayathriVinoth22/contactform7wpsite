<?php

/*
 * Demo Import
 * by Templaza
  */

defined( 'ABSPATH' ) or die( 'You cannot access this script directly' );
include_once( get_template_directory() . '/admin/tz-layout-loader.php' );


/*
|--------------------------------------------------------------------------
| Demo Importer Menu Item
|--------------------------------------------------------------------------
*/
add_action('admin_menu', 'autoshowroom_importer_demo_menu');

if ( !function_exists( 'autoshowroom_importer_demo_menu' ) ) {
	
	function autoshowroom_importer_demo_menu() {
	
        add_theme_page('Autoshowroom Demo Import', 'Autoshowroom Demo Import','install_themes', 'tz_import' , 'autoshowroom_import');

	}
	
}



/*
|--------------------------------------------------------------------------
| Demo Importer Styles
|--------------------------------------------------------------------------
*/
if ( !function_exists( 'autoshowroom_import_admin_add_scripts' ) ) {

	function autoshowroom_import_admin_add_scripts() {
			
		wp_enqueue_style('tz-import', get_template_directory_uri() . '/admin/assets/css/tz-import.css');
        wp_enqueue_script( 'tz-import', get_template_directory_uri() . '/admin/assets/js/admin.js' );

    }
	
}

if ( isset($_GET['page']) && $_GET['page'] == 'tz_import' ) {
	add_action( 'admin_enqueue_scripts', 'autoshowroom_import_admin_add_scripts' );
}


/*
|--------------------------------------------------------------------------
| Check if wp-content is writeable for demo images
|--------------------------------------------------------------------------
*/
if ( !function_exists( 'autoshowroom_is_writable' ) ) {
	
	function autoshowroom_is_writable( $path ) {
        global $wp_filesystem;
        if (empty($wp_filesystem)) {
            require_once (ABSPATH . '/wp-admin/includes/file.php');
            WP_Filesystem();
        }
	
		if ( $path{strlen($path)-1}=='/' ) {
			return autoshowroom_is_writable($path.uniqid(mt_rand()).'.tmp');
		}
		if (!($f = $wp_filesystem->put_contents($path, 0644)))

			return false;
		unlink($path);
		return true;
		
	}
	
}


/*
|--------------------------------------------------------------------------
| Demo Importer Interface
|--------------------------------------------------------------------------
*/

if ( !function_exists( 'autoshowroom_import' ) ) {
	
	function autoshowroom_import(){
        global $wp_filesystem;
        if (empty($wp_filesystem)) {
            require_once (ABSPATH . '/wp-admin/includes/file.php');
            WP_Filesystem();
        }
        ?>
		
		<div id="tz-import" class="wrap">
		
			<div class="icon32" id="icon-options-general"><br></div>
            <h2><?php  esc_html_e( 'Autoshowroom Demo Import' , 'autoshowroom' ); ?></h2>
            
			<?php
			/*
			|--------------------------------------------------------------------------
			| Notifications
			|--------------------------------------------------------------------------
			*/
			if( file_exists( ABSPATH . 'wp-content/uploads/' ) ) {
				
				/* wp-content upload folder not writeable  */ 
				if( !autoshowroom_is_writable( ABSPATH . 'wp-content/uploads/' ) ) :
				
					echo '<div class="error"><p>';
						
						echo '<strong>' .esc_html__('Your upload folder is not writeable! The importer won\'t be able to import the placeholder images. Please check the folder permissions for', 'autoshowroom').'</strong><br />';
						echo ABSPATH . 'wp-content/uploads/';
						
					echo '</p></div>';
					
				endif;
				
			
			} else {
			
				/* wp-content folder not writeable  */ 
				if( !autoshowroom_is_writable( ABSPATH . 'wp-content/' ) ) :
					
					echo '<div class="error"><p>';
					
						echo '<strong>' .esc_html__('Your wp-content folder is not writeable! The importer won\'t be able to import the placeholder images. Please check the folder permissions for', 'autoshowroom').'</strong><br />';
						echo ABSPATH . 'wp-content/';
					
					echo '</p></div>';
					
				endif;
			
			}
			
			/* importer has been used before */
			if( get_option('tz_import_loaded') == 'active' ) :
				
				echo '<div class="error"><p>'.esc_html__('You have already imported the demo content before. Running this operation twice will result in double content!', 'autoshowroom').'</p></div>';
			
			endif;
			
			/* import was successful */
			if( isset($_GET['import']) && $_GET['import'] == 'success' ) : ?>
                <script type="text/javascript">
                    jQuery(document).ready(function(){
                    jQuery('#tz-import-form').hide();
                    })
                </script>
            <?php
				echo '<div class="updated"><h3>'.esc_html__('Import was successful, have fun!', 'autoshowroom').'</h3></div>';
			
			endif; 
			
			?>
            
            <form id="tz-import-form" method="POST" action="" class="form-horizontal">

                <div class="tz_theme_options">

                    <table class="form-table">
                        <tbody>

                        <tr valign="top">

                            <th scope="row">
                                <?php  esc_html_e( 'Import Theme Options?' , 'autoshowroom' ); ?>
                            </th>

                            <td>
                                <input type="checkbox" value="yes" id="tz_theme_options" checked name="tz_theme_options">
                            </td>

                        </tr>

                        <tr valign="top">

                            <th scope="row">
                                <?php  esc_html_e( 'Import Widgets?' , 'autoshowroom' ); ?>
                            </th>

                            <td>
                                <input type="checkbox" value="yes" id="tz_theme_widget" checked name="tz_theme_widget">
                            </td>

                        </tr>

                        <tr valign="top">

                            <th scope="row">
                                <?php  esc_html_e('Important Notes:' , 'autoshowroom'); ?>
                            </th>

                            <td>
                                <ol>
                                    <li><?php  esc_html_e('We recommend to run this importer on a clean WordPress installation.' , 'autoshowroom'); ?></li>
                                    <li><?php  esc_html_e('To reset your installation we can recommend this plugin here:' , 'autoshowroom'); ?> <a href="http://wordpress.org/plugins/wordpress-database-reset/">Wordpress Database Reset</a></li>
                                    <li><?php  esc_html_e('The Demo Importer will not import the images we have used in our live demos, due to copyright / license reasons' , 'autoshowroom'); ?></li>
                                    <li><?php  esc_html_e('Do not run the importer multiple times one after another, it will result in double content.' , 'autoshowroom'); ?></li>
                                </ol>
                            </td>

                        </tr>

                        </tbody>
                    </table>

                </div>

            <div class="xml">
                <input type="radio" id="fashion_yellow" name="tz_demo_file" value="auto_demo" checked class="tz-choose-demo-radio">
                <label class="tz-demo-img" for="fashion_yellow">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" />
                </label>
                <h3 class="xml-name">Autoshowroom WordPress Theme</h3>
                <div class="xml-actions">
                	<a target="_blank" href="http://wordpress.templaza.net/autoshowroom" class="button button-primary"><?php  esc_html_e('Preview' , 'autoshowroom'); ?></a>
                </div>
            </div>
            <div class="tz_action">
                <input type="hidden" name="tz_import_demo_content" value="true" />
                <?php if( isset($_GET['import']) && $_GET['import'] == 'success' ) { ?>
                    <input type="submit" style="opacity:0.5" value="<?php  esc_html_e( 'Import Demo' , 'autoshowroom' ); ?>" class="button button-install" id="submit" name="submit">
                <?php } else{ ?>
                    <input type="submit" value="<?php  esc_html_e( 'Import Demo' , 'autoshowroom' ); ?>" class="button button-install" id="submit" name="submit">
                <?php }?>
            </div>
            <div class="clear"></div>
            </form>
            <script type="text/javascript">

                var plugin_notice = jQuery('#setting-error-tgmpa').hasClass('is-dismissible');
                if(plugin_notice ==true){
                    alert('Please install and active all plugins recommended in Autoshowroom Theme before click "Import Demo"');
                    location.href = "themes.php?page=tgmpa-install-plugins&plugin_status=install";

                }
            </script>

		</div>
	<?php }
	
}

/*
|--------------------------------------------------------------------------
| Demo Importer
|--------------------------------------------------------------------------
*/
add_action( 'admin_init', 'autoshowroom_demo_import' );

if ( !function_exists( 'autoshowroom_demo_import' ) ) {

	function autoshowroom_demo_import() {
		
		global $wpdb;
		
		/* add option flag to wordpress */
		add_option('tz_import_loaded');


		
		/* security array for valid filenames */
		$tz_recognized_file_names = apply_filters( 'tz_recognized_file_names', array(
		  'auto_demo'
		));
			
		if ( current_user_can( 'manage_options' ) && isset( $_POST['tz_import_demo_content'] ) && !empty( $_POST['tz_demo_file'] ) ) {

			if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);
			
			if ( ! class_exists( 'WP_Import' ) ) {
				$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
				if ( file_exists( $class_wp_importer ) ) {
					include_once $class_wp_importer;
				}
			}

			if ( ! class_exists('Autoshowroom_WP_Import') ) {
				$class_wp_import = get_template_directory() . '/admin/includes/plugins/importer/wordpress-importer.php';
				if ( file_exists( $class_wp_import ) ) {
                    include_once $class_wp_import;
				}
			}	
			
			if ( class_exists( 'WP_Importer' ) && class_exists( 'Autoshowroom_WP_Import' ) ) {
				
				/*
				|--------------------------------------------------------------------------
				| Import choosen XML
				|--------------------------------------------------------------------------
				*/
				
				$importer = new Autoshowroom_WP_Import();

				
				$demo_file = sanitize_file_name($_POST['tz_demo_file']);

				$theme_xml = get_template_directory() . '/admin/assets/xml/' . $demo_file . '.xml';

//                var_dump($theme_xml); die();
				if ( file_exists( $class_wp_importer ) && in_array( $demo_file , $tz_recognized_file_names) ) {
										
					$importer->fetch_attachments = true;
					ob_start();
					$importer->autoshowroom_import($theme_xml);
					ob_end_clean();					
					
				} else {
					
					wp_redirect( admin_url( 'themes.php?page=tz_import&import=failed' ) );
					
				}
                /*
                |--------------------------------------------------------------------------
                | Import Slider Revolution
                |--------------------------------------------------------------------------
                */
                if ( class_exists( 'RevSlider' ) ) {

                    $slider_array = array(
                        get_template_directory()."/admin/assets/optionsdata/revslider/home1.zip",
                        get_template_directory()."/admin/assets/optionsdata/revslider/slider-home2.zip",
                        get_template_directory()."/admin/assets/optionsdata/revslider/slider-home-version-4.zip",
                        get_template_directory()."/admin/assets/optionsdata/revslider/slider-motorbike.zip",
                        get_template_directory()."/admin/assets/optionsdata/revslider/slider-home-v6.zip",
                        get_template_directory()."/admin/assets/optionsdata/revslider/slider-home-version-7.zip",
                    );

                    $slider = new RevSlider();
                    foreach($slider_array as $filepath){
                        $slider->importSliderFromPost(true,true,$filepath);
                    }

                }

				
				/*
				|--------------------------------------------------------------------------
				| Set Primary Navigation
				|--------------------------------------------------------------------------
				*/
												
				$locations = get_theme_mod( 'nav_menu_locations' );

				$menus = wp_get_nav_menus();




				
				if( is_array($menus) ) {
					foreach($menus as $menu) { // assign menus to theme locations

                        $main = ( $demo_file == 'auto_demo') ? 'Main Menu' : 'Main';

                        if( $menu->name == $main ) {
							$locations['primary'] = $menu->term_id;
						}
                        if($menu->name =='Menu Home 2'){
                            $locations['primary-home-2'] = $menu->term_id;
                        }
                        if($menu->name =='Menu Home 3'){
                            $locations['primary-home-3'] = $menu->term_id;
                        }
                        if($menu->name =='Menu Motorbike'){
                            $locations['primary-home-motor'] = $menu->term_id;
                        }
                        if($menu->name =='Menu Home 6'){
                            $locations['primary-home-6'] = $menu->term_id;
                        }
                        if($menu->name =='Menu Home 7'){
                            $locations['primary-home-7'] = $menu->term_id;
                        }

					}
				}
//                var_dump($locations['primary']); die();
				
				set_theme_mod( 'nav_menu_locations', $locations );
				
				/*
				|--------------------------------------------------------------------------
				| Set Reading Options
				|--------------------------------------------------------------------------
				*/
				
				$homepage 	= get_page_by_title( 'Home version 1' );
                
				if( isset($homepage->ID)) {
					update_option('show_on_front', 'page');
					update_option('page_on_front',  $homepage->ID); // Front Page
				}
				
				/*
				|--------------------------------------------------------------------------
				| Update Theme Options
				|--------------------------------------------------------------------------
				*/
				if( isset( $_POST['tz_theme_options'] ) && $_POST['tz_theme_options'] == 'yes' ) :
                    $ot_layout_file = get_template_directory().'/admin/assets/optionsdata/default.txt';
					/* run layout loader */
					autoshowroom_load_layout_into_ot($ot_layout_file);
					
				endif;

				/*
				|--------------------------------------------------------------------------
				| Update Theme Widget
				|--------------------------------------------------------------------------
				*/
				if( isset( $_POST['tz_theme_widget'] ) && $_POST['tz_theme_widget'] == 'yes' ) :

                    $widget_file = get_template_directory().'/admin/assets/widget/widgets.wie';
                    autoshowroom_wie_process_import_file( $widget_file );

				endif;

				/*
                |--------------------------------------------------------------------------
                | Import Mega Menu
                |--------------------------------------------------------------------------
                */
				$mega_menu = get_template_directory().'/admin/assets/megamenu/menu.txt';
				autoshowroom_mega_menu_import_theme($mega_menu);

				$mega_widget = get_template_directory().'/admin/assets/megamenu/widget_menu.txt';
				autoshowroom_mega_menu_import_widget($mega_widget);

				$mega_sett = get_template_directory().'/admin/assets/megamenu/menu_setting.txt';
				autoshowroom_tzmega_menu_import_theme($mega_sett);

				/*
				|--------------------------------------------------------------------------
				| Set Default Logo for Navigation
				|--------------------------------------------------------------------------
				*/
				
//				/* fetch all used taxonomies first */
//				$taxonomies = get_terms( 'portfolio-category' , array( 'hide_empty' => true ) );
//				$portfolio_taxonomies = array();
//
//				/* built array */
//				foreach($taxonomies as $taxonomy ) {
//
//					$portfolio_taxonomies[$taxonomy->term_id] = 'on';
//
//				}

								
				/*
				|--------------------------------------------------------------------------
				| Update Import Flag
				|--------------------------------------------------------------------------
				*/
				update_option('tz_import_loaded', 'active');

				/*
				|--------------------------------------------------------------------------
				| Redirect User
				|--------------------------------------------------------------------------
				*/
				wp_redirect( admin_url( 'themes.php?page=tz_import&import=success' ) );
								
				
			}
		
		}
		
	}

} ?>