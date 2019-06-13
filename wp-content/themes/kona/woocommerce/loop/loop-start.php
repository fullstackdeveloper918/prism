<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.5.5
 */
 
$columns = 4;
$columnsMobile = 2;
$spaced = "spaced-big";
if (get_option('_sr_shopgridcol')) { $columns = intval(get_option('_sr_shopgridcol')); }
if (get_option('_sr_shopgridcolmobile')) { $columnsMobile = intval(get_option('_sr_shopgridcolmobile')); }
if (get_option('_sr_shopgridspaced')) { $spaced = get_option('_sr_shopgridspaced'); }
if (isset($_GET['columns'])) { $columns = $_GET['columns']; }

$gridClass = 'isotope-grid fitrows mobile-col-'.$columnsMobile.' style-column-'.$columns.' isotope-'.$spaced;
?>
<div id="main-shop-grid" class="<?php echo esc_attr($gridClass); ?> shop-container">
