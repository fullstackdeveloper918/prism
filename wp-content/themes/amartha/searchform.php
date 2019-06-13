<?php 
/**
 * Searchform
 */
?>
<form action="<?php echo esc_url(home_url('/')) ?>" method="get">
    <input placeholder="<?php echo esc_attr__('Type Your Search...', 'amartha') ?>" type="search" name="s" id="search" />
</form>
