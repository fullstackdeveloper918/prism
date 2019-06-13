<?php
add_shortcode( 'AC_PRO', 'Accordion_ShortCode_Pro' );
function Accordion_ShortCode_Pro( $Id ) {
	ob_start();	
	if(!isset($Id['id'])) 
	 {
		$WPSM_AC_PRO_ID = "";
	 } 
	else 
	{
		$WPSM_AC_PRO_ID = $Id['id'];
	}
	require("content.php"); 
	wp_reset_query();
    return ob_get_clean();
}
?>