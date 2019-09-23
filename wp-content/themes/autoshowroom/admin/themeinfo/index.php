<?php

global $wpdb;

/*
|--------------------------------------------------------------------------
| Add to Appearance Menu
|--------------------------------------------------------------------------
*/ 
add_action('admin_menu', 'autoshowroom_theme_info_page');

function autoshowroom_theme_info_page() {
    
	global $theme_path;
    add_theme_page('autoshowroom'.' Autoshowroom Info', 'Autoshowroom Info','install_themes', 'view_info' , 'autoshowroom_view_info');
}

/*
|--------------------------------------------------------------------------
| Output
|--------------------------------------------------------------------------
*/ 
function autoshowroom_view_info() { ?>

<div class="wrap">
	
    <div class="icon32" id="icon-options-general"><br></div>
    <h2><?php  esc_html_e( 'Autoshowroom Info' , 'autoshowroom' ); ?></h2>
	<h3 class="title"><?php  esc_html_e( 'Please paste down these information when starting a support inquiry in our supportforum' , 'autoshowroom' ); ?></h3>
	
    <table class="form-table">
    <tbody>
    
    <tr valign="top">
        <th scope="row">WordPress Version:</th>
        <td> <?php echo esc_attr(get_bloginfo('version')); ?> </td>
    </tr>
    
    <tr valign="top">
        <th scope="row">URL:</th>
        <td> <?php echo esc_url(site_url()); ?> </td>
    </tr>
    
    <tr valign="top">
        <th scope="row">Installed Theme:</th>
        <td> <?php echo esc_attr('autoshowroom'); ?> </td>
    </tr>

    <?php $autoshowroom_theme = wp_get_theme( ); ?>
    <tr valign="top">
        <th scope="row">Theme Version:</th>
        <td> <?php echo esc_html($autoshowroom_theme->version); ?></td>
    </tr>
   
   	<tr valign="top">
        <th scope="row">PHP Version:</th>
        <td> <?php echo esc_attr(phpversion()); ?> </td>
    </tr>
    
    <?php if( is_array(get_option( 'active_plugins' ))) : ?>
    <tr valign="top">
        <th scope="row">Installed Plugins:</th>
        <td>
        
        <ul>
        <?php foreach(get_option( 'active_plugins' ) as $plugin) {
                echo '<li>'.esc_attr($plugin).'</li>';
        } ?>
        </ul>
        
        </td>
    </tr>
    <?php endif; ?>
        
    </tbody></table>
        
</div>

<?php } ?>