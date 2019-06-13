<?php

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "hide_in_vc_editor",
	"admin_label" => true,
	"heading" => "Height",
	"param_name" => "height",
	"value" => "",
	"description" => ""
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "hide_in_vc_editor",
	"admin_label" => true,
	"heading" => "Row Type",
	"param_name" => "type",
	"description" => "[Deprecated Option] Use 'Row Stretch' instead (scroll above).",
	"value" => array(
		"Full Width" => "full_width",
		"Boxed" => "boxed"
	)
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "hide_in_vc_editor",
	"admin_label" => true,
	"heading" => "Columns Height",
	"param_name" => "columns_height",
	"description" => "[Deprecated Option] Use 'Equal Height' instead (scroll above).",
	"value" => array(
		"Normal" => "normal_height",
		"Fit Columns Height" => "adjust_cols_height"
	)
));

// [vc_row_inner]
vc_add_param("vc_row_inner", array(
	"type" => "dropdown",
	"class" => "hide_in_vc_editor",
	"admin_label" => true,
	"heading" => "Row Type",
	"param_name" => "type",
	"description" => "[Deprecated Option]",
	"value" => array(
		"Full Width" => "full_width",
		"Boxed" => "boxed"
	)
));