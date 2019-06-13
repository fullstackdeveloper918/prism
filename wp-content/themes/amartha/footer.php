                </div>
				<script>
			
function update_dayproduct_price() {
  var price = 65 ; 	
  var x = document.getElementById("day-pro-quantity").value;
  var totalpric =  x*price ;
  if (totalpric === 0) {
	  totalpric = price
  }
  document.getElementById("day-pro-price").innerHTML = "$"+totalpric+"&nbsp; &nbsp;Add to Cart";
}

function update_nightproduct_price() {
  var price = 65 ; 	
  var x = document.getElementById("night-pro-quantity").value;
  var totalpric =  x*price ;
  if (totalpric === 0) {
	  totalpric = price
  }
  document.getElementById("night-pro-price").innerHTML = "$"+totalpric+"&nbsp; &nbsp;Add to Cart";
}
					
function update_duoproduct_price() {
  var price = 125 ; 	
  var x = document.getElementById("duo-pro-quantity").value;
  var totalpric =  x*price ;
  if (totalpric === 0) {
	  totalpric = price
  }
  document.getElementById("duo-pro-price").innerHTML = "$"+totalpric+"&nbsp; &nbsp;Add to Cart";
}

var str = $( "p:first" ).text();
$( "p:last" ).html( str );
</script>
				
                <?php 
                /**
                 * Type
                 */
                $amartha_footer_type = amartha_inherit_option('footer_type', 'footer_type', '1');
                $amartha_footer_template = '';
                if (get_field('footer_type', get_queried_object()) == '1') {
                    $amartha_footer_template = get_theme_mod('footer_template');
                } elseif (get_field('footer_type', get_queried_object()) == '3' && get_field('footer_template')) {
                    $amartha_footer_template = get_field('footer_template');
                } else {
                    $amartha_footer_template = get_theme_mod('footer_template');
                }
                ?>
                <?php if (apply_filters('amartha_display_footer', true) && ($amartha_footer_type != '2' && !$amartha_footer_template)) : ?>
                    <?php 
                    // Class
                    $amartha_footer_class = ['l-primary-footer', 'l-primary-footer--dark-skin'];
                    
                    // Container
                    if (amartha_inherit_option('footer_container', 'footer_container', '1') == '2') {
                        $amartha_footer_class[] = 'l-primary-footer--wide-container';
                    } 
                    ?>
                    <footer class="<?php echo esc_attr(implode(' ', $amartha_footer_class)) ?> h-fadeInFooterNeuron">
                        <?php get_template_part('templates/footer/widgets') ?>

                        <?php get_template_part('templates/footer/copyright') ?>
                    </footer>
                <?php endif;

                // Elementor
                if ($amartha_footer_type == '2' && $amartha_footer_template) :
                ?>
                     <footer>
                        <?php echo amartha_get_custom_template($amartha_footer_template) ?>
                    </footer>
                <?php endif; ?>

            <?php get_template_part('templates/extra/to-top') ?>
        </div>
		
		
		
		
		
	<script>	
		jQuery("div#heading_106_4 h4.wpsm_panel-title a").on("click", function(){	
			jQuery(".first_popUp").trigger( "click" );
		});
		jQuery("div#heading_106_5 h4.wpsm_panel-title a").on("click", function(){	
			jQuery(".second_popUp").trigger( "click" );
		});
		jQuery("div#heading_104_4 h4.wpsm_panel-title a").on("click", function(){	
			jQuery(".third_popUp").trigger( "click" );
		});
		jQuery("div#heading_104_5 h4.wpsm_panel-title a").on("click", function(){	
			jQuery(".fourth_popUp").trigger( "click" );
		});
	</script>	
		
	<!-- Trigger the modal with a button -->
	<button type="button" class="btn btn-info btn-lg first_popUp" data-toggle="modal" data-target="#myModal" style="display:none;">Open Modal</button>

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-body">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
			<p><img src="http://localhost/prismatic/wp-content/uploads/2019/06/Good-Night-Cann-3B.svg" ></p>
		  </div>
		</div>
	  </div>
	</div>
		
	<!-- Trigger the modal with a button -->
	<button type="button" class="btn btn-info btn-lg second_popUp" data-toggle="modal" data-target="#myModal1" style="display:none;">Open Modal</button>

	<!-- Modal -->
	<div id="myModal1" class="modal fade" role="dialog">
	  <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-body">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
			<p><img src="http://localhost/prismatic/wp-content/uploads/2019/06/Good-Night-Terp-4.svg" ></p>
		  </div>
		</div>
	  </div>
	</div>	
		
	
	<!-- Trigger the modal with a button -->
	<button type="button" class="btn btn-info btn-lg third_popUp" data-toggle="modal" data-target="#myModal2" style="display:none;">Open Modal</button>

	<!-- Modal -->
	<div id="myModal2" class="modal fade" role="dialog">
	  <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-body">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
			<p><img src="http://localhost/prismatic/wp-content/uploads/2019/06/Good-Day-Cann-3B.svg" ></p>
		  </div>
		</div>
	  </div>
	</div>	
	
	<!-- Trigger the modal with a button -->
	<button type="button" class="btn btn-info btn-lg fourth_popUp" data-toggle="modal" data-target="#myModal3" style="display:none;">Open Modal</button>

	<!-- Modal -->
	<div id="myModal3" class="modal fade" role="dialog">
	  <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-body">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
			<p><img src="http://localhost/prismatic/wp-content/uploads/2019/06/Good-Day-Terp-3B.svg" ></p>
		  </div>
		</div>
	  </div>
	</div>
		
		
        <?php wp_footer() ?>
    </body>
</html>