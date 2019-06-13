<?php
/**
 * Adds  widget.
 */
class Wpsm_Accordion_Pro_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'wpsm_ac_pro_widget', // Base ID
            'Accordion Pro Widget', // Name
            array( 'description' => __( 'Display Your Accordion in widget area.', wpshopmart_accordion_pro_text_domain ), ) // Args
        );
	}

    /**
     * Front-end display of widget.
     */
    public function widget( $args, $instance ) {
        $Title    	=   apply_filters( 'wpsm_ac_pro_widget_title', $instance['Title'] );
		echo $args['before_widget'];
		
		 $wpsm_ac_pro	=   apply_filters( 'wpsm_ac_pro_widget_shortcode', $instance['Shortcode'] ); 

		if(is_numeric($wpsm_ac_pro)) {
			if ( ! empty( $instance['Title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['Title'] ). $args['after_title'];
			}
			echo do_shortcode( '[AC_PRO id='.$wpsm_ac_pro.']' );
		} else {
			echo "<p>Sorry! No Accordion Shortcode Found.</p>";
		}
		echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {

        if ( isset( $instance[ 'Title' ] ) ) {
            $Title = $instance[ 'Title' ];
        } else {
            $Title = "Accordion Pro Shortcode";
        }

        if ( isset( $instance[ 'Shortcode' ] ) ) {
            $Shortcode = $instance[ 'Shortcode' ];
        } else {
            $Shortcode = "Select Any Accordion";
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'Title' ); ?>"><?php _e( 'Widget Title' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'Title' ); ?>" name="<?php echo $this->get_field_name( 'Title' ); ?>" type="text" value="<?php echo esc_attr( $Title ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'Shortcode' ); ?>"><?php _e( 'Select Accordion' ); ?> (Required)</label>
			<?php
			/**
			 * Get All Accordion Shortcode Custom Post Type
			 */
			$wpsm_ac_cpt = "wpsm_accordion_pro";
			global $All_Wpsm_Acsh;
			$All_Wpsm_Acsh = array('post_type' => $wpsm_ac_cpt, 'orderby' => 'ASC', 'post_status' => 'publish');
			$All_Wpsm_Acsh = new WP_Query( $All_Wpsm_Acsh );		
			?>
			<select id="<?php echo $this->get_field_id( 'Shortcode' ); ?>" name="<?php echo $this->get_field_name( 'Shortcode' ); ?>" style="width: 100%;">
				<option value="Select Any Accordion" <?php if($Shortcode == "Select Any Accordion") echo 'selected="selected"'; ?>>Select Any Accordion</option>
				<?php
				if( $All_Wpsm_Acsh->have_posts() ) {	 ?>	
				<?php while ( $All_Wpsm_Acsh->have_posts() ) : $All_Wpsm_Acsh->the_post();	
					$PostId = get_the_ID(); 
					$PostTitle = get_the_title($PostId);
				?>
				<option value="<?php echo $PostId; ?>" <?php if($Shortcode == $PostId) echo 'selected="selected"'; ?>><?php if($PostTitle) echo $PostTitle; else _e("No Title", wpshopmart_accordion_pro_text_domain); ?></option>
				<?php endwhile; ?>
				<?php
			}  else  { 
				echo "<option>Sorry! No Accordion Shortcode Found.</option>";
			}
			?>
			</select>
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['Title'] = ( ! empty( $new_instance['Title'] ) ) ? strip_tags( $new_instance['Title'] ) : '';
        $instance['Shortcode'] = ( ! empty( $new_instance['Shortcode'] ) ) ? strip_tags( $new_instance['Shortcode'] ) : 'Select Any Accordion';
        
        return $instance;
    }
} // end of  Widget Class

// Register Widget
function Wpsm_Accordion_Pro_Widget() {
    register_widget( 'Wpsm_Accordion_Pro_Widget' );
}
add_action( 'widgets_init', 'Wpsm_Accordion_Pro_Widget' );
?>