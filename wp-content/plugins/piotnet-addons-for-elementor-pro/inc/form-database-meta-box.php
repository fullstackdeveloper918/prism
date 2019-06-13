<?php 
	function form_database_meta_box() {
		add_meta_box( 'form-database-meta-box', 'Form Database', 'form_database_meta_box_output', 'pafe-form-database' );
	}
	add_action( 'add_meta_boxes', 'form_database_meta_box' );

	function form_database_meta_box_output() {
		$all_meta = get_post_meta(get_the_ID());
		echo '<table class="pafe-form-database">';
		foreach ($all_meta as $key => $meta) {
			if ($key != 'form_id_elementor' && $key != 'post_id' && $key != '_edit_lock') {
				echo '<tr>';
					echo '<td>';
						echo $key;
					echo '</td>';
					echo '<td>';
						if ($key == 'payment_amount') {
							echo $meta[0] / 100;
						} else {
							echo $meta[0];
						}
						
					echo '</td>';
				echo '</tr>';
			}
		}
		echo '</table>';
	}
?>