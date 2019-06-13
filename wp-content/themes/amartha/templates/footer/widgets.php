<?php
/**
 * Footer Widgets
 */
$amartha_footer_widgets_class = ['l-primary-footer__widgets'];
$amartha_active_sidebars = is_active_sidebar('sidebar-footer-1') || is_active_sidebar('sidebar-footer-2') || is_active_sidebar('sidebar-footer-3') || is_active_sidebar('sidebar-footer-4') || is_active_sidebar('sidebar-footer-5') || is_active_sidebar('sidebar-footer-6');

if ((amartha_inherit_option('footer_widgets', 'footer_widgets', '1') == '2' || $amartha_active_sidebars == false) && !is_search()) {
    return;
}

/**
 * Columns
 */
$amartha_widgets_columns = amartha_inherit_option('footer_widgets_columns', 'footer_widgets_columns', '4');

switch ($amartha_widgets_columns) {
    case '1':
        $amartha_item_class = 'col-sm-12';
        break;
    case '2':
        $amartha_item_class = 'col-sm-6';
        break;
    case '3':
        $amartha_item_class = 'col-sm-6 col-md-4';
        break;
    default:
        $amartha_item_class = 'col-sm-6 col-md-3';
        break;
    case '5':
        $amartha_item_class = 'col-sm-6 col-md-4 a-col-5';
        break;
    case '6':
        $amartha_item_class = 'col-sm-6 col-md-4 col-lg-2';
        break;
}
/**
 * Mobile Visibility
 */
if (amartha_inherit_option('footer_mobile_visibility', 'footer_mobile_visibility', '1') == '2') {
    $amartha_footer_widgets_class[] = 'd-none d-sm-none d-md-block';
}
?>
<div class="<?php echo esc_attr(implode(' ', $amartha_footer_widgets_class)) ?>">
   <div class="container">
        <div class="l-primary-footer__widgets__space">
            <div class="row">
                <?php for ($i = 1; $i <= $amartha_widgets_columns; $i++) { ?>
                    <div class="<?php echo esc_attr($amartha_item_class) ?>">
                        <?php is_active_sidebar('sidebar-footer-' . $i) ? dynamic_sidebar('sidebar-footer-' . $i) : ''; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
   </div>
</div>