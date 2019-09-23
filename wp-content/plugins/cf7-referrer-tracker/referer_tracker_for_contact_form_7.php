<?php
/**
 * @package referer_tracker_for_contact_form_7
 */
/*
    Plugin Name: Contact Form 7 Referrer tracker Plugin 
    Plugin URI:  http://bitss.tech/
    Author: Team Bitss Tech
    Author URI: 
    Description: Automatically include visitor's tracking information in Contact Form 7 Emails. 
    Version:  1.0
    License: GPLv2 or later
    Text Domain: bitss
*/

add_action('init', 'cf7rt_set_referer_cookie');
function cf7rt_set_referer_cookie(){

   if(preg_match('/MSIE/i',$_SERVER['HTTP_USER_AGENT']) ) {
       $_SERVER['HTTP_USER_AGENT']="Internet Explorer";
    }
   elseif(preg_match('/Chrome/i',$_SERVER['HTTP_USER_AGENT'])) {
       $_SERVER['HTTP_USER_AGENT']="Google Chrome";
   } elseif(preg_match('/Firefox/i',$_SERVER['HTTP_USER_AGENT'])) {
       $_SERVER['HTTP_USER_AGENT']="Mozilla Firefox";
   } 
   
    $cf7rt_selected_http_headers = get_option("cf7rt_selected_http_headers","[]");
    $i=0;
    //echo sizeof($cf7rt_selected_http_headers);
    
    while(sizeof($cf7rt_selected_http_headers) > $i){
        $cf7rt_selected_http_headers_value=strtoupper( $cf7rt_selected_http_headers[$i]);
        str_replace("-","_",$cf7rt_selected_http_headers_value);
        if(isset($_SERVER[$cf7rt_selected_http_headers_value])&&!isset($_COOKIE["external_".$cf7rt_selected_http_headers_value])) {
            setcookie("external_".$cf7rt_selected_http_headers_value, $_SERVER["external_".$cf7rt_selected_http_headers_value],0,"/");	
        }
        $i=$i+1;
    }
}

add_action('admin_init','script_css');
function script_css(){
    wp_register_style('style.css', plugins_url('_inc/style.css',__FILE__ ));
    wp_enqueue_style( 'style.css');
    wp_register_style('bootstrap_min.css', plugins_url('_inc/bootstrap_min.css',__FILE__ ));
    wp_enqueue_style( 'bootstrap_min.css');
}

add_action( 'admin_init', 'cf7rt_myscript' );
function cf7rt_myscript() {
    wp_enqueue_script( 'cf7-refer-js', plugins_url( '_inc/cf7refer.js', __FILE__ ));   
    wp_enqueue_script( 'cf7rt-bootstrap-js', plugins_url( '_inc/cf7rt_bootstrap.js', __FILE__ )); 
}

add_action('admin_menu', 'cf7rt_my_menu_pages');
function cf7rt_my_menu_pages() {
            add_submenu_page(
                'options-general.php',
                'Referer Tracker For Contact Form 7',
                'Referer Tracker For Contact Form 7',
                'manage_options',
                'cf7rt-optionSetting',
                'cf7rt_optionSetting'
            );
}

function cf7rt_optionSetting() {
    $bitss_track_http_headers = array("HTTP-Referer" , 
                                "Remote-Addr", 
                                "Http-X-Forwarded-For",
                                "Http-User-Agent");
    
    if(isset($_POST["submit"]))
    {
        $selectOption=$_POST['include_http_header_in_admin_email'];
        $selected_referers=$_POST["track_http_headers"];
        $isValid =false;

        //validate "Include HTTP header's in email" dropdown
        if($selectOption!="Automatic"&&$selectOption!="Manual"){
            $isValid =false;                          
        }else{
            $isValid =true;          
        }

        //validate selected http referers
        if($isValid==true){
            foreach ($selected_referers as $selected_referer) {
                if(!in_array($selected_referer,$bitss_track_http_headers)){
                    $isValid =false;   
                } else {
                    $isValid =true;      
                }
            }
        }

        //if isValid is still true, then validation was successful, proceed to save data in database.
        if($isValid==true){
            update_option("cf7rt_taskOption_value", $selectOption);
            update_option("cf7rt_selected_http_headers",$selected_referers);            
            cf7rt_data_save_notice();           
        }else{
            cf7rt_inValid_data_notice(); 
        }
       
    }

    $cf7rt_selected_http_headers = get_option("cf7rt_selected_http_headers","[]");
    $template_path = plugin_dir_path( __FILE__ )."_inc/template/plugin_option.php"; 
    include_once($template_path);     
}

function cf7rt_inValid_data_notice() {
    ?>
    <div class="error notice">
        <p>There has been an error. Bummer!</p>
    </div>
    <?php
}
function cf7rt_data_save_notice() {   
    ?>
    <div class="updated notice">
        <p>The plugin has been updated, excellent!</p>
    </div>
    <?php
}



add_action('wpcf7_before_send_mail', 'cf7rt_add_text_to_mail_body' ); 
function cf7rt_add_text_to_mail_body($contact_form){
          
    $mail = $contact_form->prop( 'mail' ); 
    $optionValue=get_option("cf7rt_taskOption_value");
    if($optionValue=="Automatic"){
        $mail['body'].= "\r\n";
        $cf7rt_selected_http_headers = get_option("cf7rt_selected_http_headers","[]");
        $i=0;
        while(sizeof($cf7rt_selected_http_headers) > $i){
            $cf7rt_selected_http_headers_val=$cf7rt_selected_http_headers[$i];
            $mail['body'].= $cf7rt_selected_http_headers_val."\t";
            $cf7rt_selected_http_headers_val= str_replace("-","_", $cf7rt_selected_http_headers_val);
            $mail['body'].=": ".$_SERVER[strtoupper($cf7rt_selected_http_headers_val)];
            $mail['body'].="\n";
            $i=$i+1;
        }
    }
  
    // set mail property with changed value(s)
    $contact_form->set_properties( array( 'mail' => $mail ) );
      
   }

?>

