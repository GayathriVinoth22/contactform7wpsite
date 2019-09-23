<div class="col-md-3 autoshowroom-sidebar">
    <?php
    if ( is_active_sidebar( 'sidebar' ) ) :
        if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar') )  :
        endif;
    endif;
    ?>
</div>