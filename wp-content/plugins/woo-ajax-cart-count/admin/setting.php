<div class="imsSetting">
  <?php screen_icon(); ?>
  <h2>IMS Cart Count</h2>
  <p class="imsShortcode">Use this <strong>[WooAjaxCartCount]</strong> shortcode for Ajax Cart Count </p>
  <form method="post" action="options.php">
  <?php settings_fields( 'imsAjaxCartCount_optionsGroup' ); ?>
  <table class="cart_count">
  <tr valign="top">
    <th scope="row">
      <label for="imsAjaxCartCount_optionIcon">Icon</label>
    </th>
    <td>
      <input required="required" placeholder="fa-shopping-cart" type="text" id="imsAjaxCartCount_optionIcon" name="imsAjaxCartCount_optionIcon" value="<?php echo get_option('imsAjaxCartCount_optionIcon'); ?>" /><a href="http://fontawesome.io/icons/" target="_blank">Help</a>
    </td>
  </tr>
  <tr valign="top">
    <th scope="row">
      <label for="imsAjaxCartCount_optionColor">Color</label>
    </th>
    <td>
      <input required="required" placeholder="#000000" type="text" id="imsAjaxCartCount_optionColor" name="imsAjaxCartCount_optionColor" value="<?php echo get_option('imsAjaxCartCount_optionColor'); ?>" /><a href="http://htmlcolorcodes.com" target="_blank">Help</a>
    </td>
  </tr>
  <tr valign="top">
    <th scope="row">
      <label for="imsAjaxCartCount_optionFontSize">Font Size</label>
    </th>
    <td>
      <select id="imsAjaxCartCount_optionFontSize" name="imsAjaxCartCount_optionFontSize" >
      <?php 
        for($i=10;$i<=18;$i++){ 
          if(  get_option('imsAjaxCartCount_optionFontSize') == $i )
          {
            $selected = 'selected';
          }
          else
          {
            $selected = '';
          }
        ?>
        <option <?php echo $selected ?> value="<?php echo $i;?>"><?php echo $i;?>px</option>
        <?php } ?>
      </select>
    </td>
  </tr>
  <tr>
    <td></td>
    <td>  <?php  submit_button(); ?>    </td>
  </tr>
  </table>
  </form>
  </div>