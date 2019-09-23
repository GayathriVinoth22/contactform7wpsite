<?php
/**
 * The template for displaying search forms in Autoshowroom
 *
 * @package Templaza
 * @subpackage Autoshowroom
 * @since Autoshowroom 1.0
 */
?>
<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" class="field Tzsearchform inputbox search-query" name="s" placeholder="<?php esc_attr_e( 'Search...', 'autoshowroom');?>" />
	<input type="submit" class="submit searchsubmit" name="submit" value="<?php esc_attr_e( 'Search', 'autoshowroom'); ?>" />
	<i class="fa fa-search i-search"></i>
</form>
