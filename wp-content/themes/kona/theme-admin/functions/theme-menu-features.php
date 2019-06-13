<?php
/**
 * Proof of concept for how to add new fields to nav_menu_item posts in the WordPress menu editor.
 * @author Weston Ruter (@westonruter), X-Team
 */

add_action( 'init', array( 'Kona_Nav_Menu_Item_Custom_Fields', 'setup' ) );

class Kona_Nav_Menu_Item_Custom_Fields {
	// does not have any impact
	static $options = array(
		'item_tpl' => '
			<p class="additional-menu-field-{name} description description-thin">
				<label for="edit-menu-item-{name}-{id}">
					{label}<br>
					<input
						type="{input_type}"
						id="edit-menu-item-{name}-{id}"
						class="widefat code edit-menu-item-{name}"
						name="menu-item-{name}[{id}]"
						value="{value}">
				</label>
			</p>
		',
	);

	static function setup() {
		// @todo we can do some merging of provided options from WP options for from config
		self::$options['fields'] = array(
			'image' => array(
				'name' => 'megaimage'
			),
			'mega' => array(
				'name' => 'megacol'
			)
		);

		add_filter( 'wp_edit_nav_menu_walker', function () {
			return 'Kona_Walker_Nav_Menu_Edit';
		});
		add_filter( 'kona_nav_menu_item_additional_fields', array( __CLASS__, '_add_fields' ), 10, 5 );
		add_action( 'save_post', array( __CLASS__, '_save_post' ) );
	}

	static function get_fields_schema() {
		$schema = array();
		foreach(self::$options['fields'] as $name => $field) {
			if (empty($field['name'])) {
				$field['name'] = $name;
			}
			$schema[] = $field;
		}
		return $schema;
	}

	static function get_menu_item_postmeta_key($name) {
		return '_menu_item_' . $name;
	}

	/**
	 * Inject the 
	 * @hook {action} save_post
	 */
	static function _add_fields($new_fields, $item_output, $item, $depth, $args) {
		$schema = self::get_fields_schema($item->ID);
		foreach($schema as $field) {
			$field['value'] = get_post_meta($item->ID, self::get_menu_item_postmeta_key($field['name']), true);
			$field['id'] = $item->ID;
			
			if ($depth == 0 && $field['name'] == 'megacol') {
			$new_fields .= '
				<p class="field-custom description description-wide">
					<label for="edit-menu-item-megacol-'.$field['id'].'">'.esc_html__( 'Mega Menu','kona' ).'</label><br>
					<select name="menu-item-megacol['.$field['id'].']" id="edit-menu-item-megacol-'.$field['id'].'" />';
					$colArray = array(
						array('#',esc_html__('No','kona')),
						array('megamenu2',esc_html__('2 Columns','kona')),
						array('megamenu3',esc_html__('3 Columns','kona')),
						array('megamenu4',esc_html__('4 Columns','kona'))
					);
					foreach($colArray as $c) { 
						$selected = '';
						if ($field['value'] == $c[0]) { $selected = 'selected'; }
						$new_fields .= '<option value="'.esc_attr($c[0]).'" '.esc_attr($selected).'>'.$c[1].'</option>';
					}
			$new_fields .= '
					</select>
				</p>';
			}
			
			if ($depth !== 0 && $field['name'] == 'megaimage') {
				$new_fields .= '
				<p class="field-custom description description-wide sr-style menuimage">
					<input class="upload_image" type="hidden" name="menu-item-megaimage['.$field['id'].']" id="edit-menu-item-megaimage-'.$field['id'].'" value="'.esc_url($field['value']).'" size="30" />
					<span class="preview_image">';
					if ($field['value']) { $new_fields .= '<img src="'.esc_url( $field['value'] ).'" alt="preview image" />'; }
			$new_fields .= '
					</span>
					<input class="sr_upload_image_button sr-button small" type="button" value="Upload Image" />
					<input class="sr_remove_image_button sr-button button-remove small" type="button" value="Remove Image" />
					<div class="clear"></div>
				</p>';
			}
			
		}
		return $new_fields;
	}

	/**
	 * Save the newly submitted fields
	 * @hook {action} save_post
	 */
	static function _save_post($post_id) {
		if (get_post_type($post_id) !== 'nav_menu_item') {
			return;
		}
		$fields_schema = self::get_fields_schema($post_id);
		foreach($fields_schema as $field_schema) {
			$form_field_name = 'menu-item-' . $field_schema['name'];
			if (isset($_POST[$form_field_name][$post_id])) {
				$key = self::get_menu_item_postmeta_key($field_schema['name']);
				$value = stripslashes($_POST[$form_field_name][$post_id]);
				update_post_meta($post_id, $key, $value);
			}
		}
	}

}

require_once ABSPATH . 'wp-admin/includes/nav-menu.php';
class Kona_Walker_Nav_Menu_Edit extends Walker_Nav_Menu_Edit {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$item_output = '';
		parent::start_el($item_output, $item, $depth, $args);
		$new_fields = apply_filters( 'kona_nav_menu_item_additional_fields', '', $item_output, $item, $depth, $args );
		// Inject $new_fields before: <fieldset class="field-move hide-if-no-js description description-wide">
		if ($new_fields) {
			$item_output = preg_replace('/(?=<fieldset[^>]+class="[^"]*field-move)/', $new_fields, $item_output);
		}
		$output .= $item_output;
	}
}





/*-----------------------------------------------------------------------------------*/

/*	Frontend output

/*-----------------------------------------------------------------------------------*/
class kona_output_walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		
		// get the assigned image  -> SPAB RICE 
		$megaimage = get_post_meta($item->ID, "_menu_item_megaimage", true);
		$imageOutput = "";
		if ($megaimage && $depth != 0) {
			$classes[] = 'image-item';
			$imgID = kona_get_attachment_id_from_src($megaimage);
			$imgData = wp_get_attachment_image_src ($imgID,'kona-thumb-small');
			if ($imgData) {
			$imageOutput = '<span class="item-thumb thumb-hover scale"><img src="'.esc_url($imgData[0]).'" alt="'.$item->title.'" width="'.esc_attr($imgData[1]).'" height="'.esc_attr($imgData[2]).'" /></span>';
			} else {
			$imageOutput = '<span class="item-thumb thumb-hover scale"><img src="'.esc_url($megaimage).'" alt="'.$item->title.'"/></span>';
			}
		}
		// get the assigned image  -> SPAB RICE 
		
		// get the mega menu class  -> SPAB RICE 
		$megacol = get_post_meta($item->ID, "_menu_item_megacol", true);
		if ($megacol && $megacol !== '#' && $depth == 0) {
			$classes[] = $megacol;
		}
		// get the mega menu class  -> SPAB RICE 

		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names .'>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
			$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$title = apply_filters( 'the_title', $item->title, $item->ID );
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
		
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>'.$imageOutput;
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
