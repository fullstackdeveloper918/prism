<?php


/*-----------------------------------------------------------------------------------

	Option Page

-----------------------------------------------------------------------------------*/

$kona_themename = "Kona";

// Adding Option Panel
require_once( get_template_directory() . "/theme-admin/option-panel/google-fonts.php");
global $kona_googlefonts;

// Including Theme Importer function
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (function_exists( 'kona_custom_meta_boxes' )) { 
	require_once( WP_CONTENT_DIR . '/plugins/kona-core/importer/theme-importer.php');
}


/*-----------------------------------------------------------------------------------*/
/*	Sections & Options
/*-----------------------------------------------------------------------------------*/
$kona_sections = array (
	
	array( "name" => esc_html__("General", 'kona'),
		   "class" => "general",
		   "href" => "general"
		  ),
	
	array( "name" => esc_html__("Header & Menu", 'kona'),
		   "class" => "header",
		   "href" => "header"
		  ),
		  
	array( "name" => esc_html__("Footer", 'kona'),
		   "class" => "footer",
		   "href" => "footer"
		  ),
	
	array( "name" => esc_html__("Blog", 'kona'),
		   "class" => "blog",
		   "href" => "blog"
		  ),
	
	array( "name" => esc_html__("Portfolio", 'kona'),
		   "class" => "portfolio",
		   "href" => "portfolio"
		  ),
	
	array( "name" => esc_html__("Typography", 'kona'),
		   "class" => "typography",
		   "href" => "typography"
		  ),
		  
	array( "name" => esc_html__("Social Networks", 'kona'),
		   "class" => "social",
		   "href" => "social"
		  ),
		  
	array( "name" => esc_html__("Demo Import", 'kona'),
		   "class" => "import",
		   "href" => "import"
		  )
	
);

if (class_exists('Woocommerce')) {
	$shop_section = array(
	array( "name" => esc_html__("Shop", 'kona'),
		   "class" => "shop",
		   "href" => "shop"
		  )
	);
	array_splice($kona_sections, 5, 0, $shop_section);
}

$kona_options = array(
	
	array( "name" => esc_html__("General", 'kona'),
		   "id" => "general",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
		  
			array( "label" => esc_html__("Branding", 'kona'),
				   "id" => "_sr_general_branding",
				   "type" => "groupstart"
				  ),
				  
				array( "label" => esc_html__("Dark Logo", 'kona'),
					   "desc" => esc_html__("Upload your logo with dark appearence.", 'kona'),
					   "id" => "_sr_logo",
					   "type" => "image"
					  ),
					  
				array( "label" => esc_html__("Light Logo", 'kona'),
					   "desc" => esc_html__("Make sure to uplaod your light logo in the same size than the dark one.", 'kona'),
					   "id" => "_sr_logo_light",
					   "type" => "image"
					  ),
					  
				array( "label" => esc_html__("Logo Height", 'kona'),
					   "desc" => esc_html__("Auto: The logo will display in it original size.", 'kona'),
					   "id" => "_sr_logo_height",
					   "type" => "checkbox-hiding",
					   "option" => array( 
							array(	"name" => esc_html__("Auto", 'kona'), 
									"value"=> "auto"),
							array(	"name" => esc_html__("Custom", 'kona'), 
									"value"=> "custom")
							),
					   "default" => "auto"
					  ),
					  
					array( 	"label" => "",
							"id" => "_sr_logo_height",
							"hiding" => "custom",	
							"type" => "hidinggroupstart"
						),
				
						array( "label" => esc_html__("Desktop logo height", 'kona'),
							   "desc" => esc_html__("Enter a custom height for your logo in desktop mode", 'kona').'<br><strong>'.esc_html__("Unit is PX.", 'kona').'</strong>',
							   "id" => "_sr_customlogoheight",
							   "type" => "number",
							   "default" => "30"
							  ),
							  
						array( "label" => esc_html__("Responsive logo height", 'kona'),
							   "desc" => esc_html__("Choose a different height (smaller) for the responsive view of your site.", 'kona').'<br><strong>'.esc_html__("Unit is PX.", 'kona').'</strong>',
							   "id" => "_sr_customlogoheightresponsive",
							   "type" => "number",
							   "default" => "25"
							  ),
							  
					array( 	"label" => "",
							"id" => "_sr_logo_height",
							"hiding" => "custom",	
							"type" => "hidinggroupend"
						),
	
				array( "label" => esc_html__("Branding Color", 'kona'),
					   "desc" => esc_html__("Choose your branding color.  Leave empty to stick with black/white.", 'kona'),
					   "id" => "_sr_customcolor",
					   "type" => "color",
					   "default" => ""
					  ),
				
				array( "label" => esc_html__("Favicon", 'kona'),
					   "desc" => esc_html__("Add a 32px x 32px Png/Gif image that will represent your website's favicon.", 'kona'),
					   "id" => "_sr_favicon",
					   "type" => "image"
					  ),
				
				array( "label" => esc_html__("Custom Login Logo", 'kona'),
					   "desc" => esc_html__("Add a custom logo for the Wordpress login screen.", 'kona'),
					   "id" => "_sr_loginlogo",
					   "type" => "image"
					  ),
				
			array( "label" => "",
				   "id" => "_sr_general_branding",
				   "type" => "groupend"
				  ),
				  
	array ( "type" => "sectionend",
		   	"id" => "sectionend"),
		
	
	array( "name" => esc_html__("Header & Menu", 'kona'),
		   "id" => "header",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
		  
		  	array( "label" => esc_html__("Header Settings", 'kona'),
				   "id" => "_sr_headersettings",
				   "type" => "groupstart"
				  ),
	
				array(	'label' => esc_html__("Header Appearence", 'kona'),  
						'desc'  => "",  
						'id'    => '_sr_headerappearance', 
						'type'  => 'selectbox', 
						'option' => array( 
							array(	"name" => esc_html__("Logo center & Menu left", 'kona'), 
									"value" => "logo-center-menu-left",
									"image" => "logo-center-menu-left.png"),
							array(	"name" => esc_html__("Logo & Menu left", 'kona'), 
									"value" => "logo-menu-left",
									"image" => "logo-menu-left.png"),
							array(	"name" => esc_html__("Logo Left & Menu center", 'kona'), 
									"value" => "logo-left-menu-center",
									"image" => "logo-left-menu-center.png"),
							array(	"name" => esc_html__("Logo left & Menu right", 'kona'), 
									"value" => "logo-left-menu-right",
									"image" => "logo-left-menu-right.png")
							),
						'default' => 'logo-center-menu-left'
						),
	
				array( "label" => esc_html__("Header behaviour", 'kona'),
					   "desc" => "",
					   "id" => "_sr_headerbehaviour",
					   "type" => "selectbox",
					   "option" => array(		 
							array(	"name" => esc_html__("Normal", 'kona'), 
									"value" => "normal"),
							array(	"name" => esc_html__("Sticky", 'kona'), 
									"value" => "sticky")
							),
					   "default" => "normal"
					  ),
	
				array( "label" => esc_html__("Search", 'kona'),
					   "desc" => esc_html__("Enable the header search icon?", 'kona'),
					   "id" => "_sr_headersearch",
					   "type" => "checkbox-hiding",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "1"),		 
							array(	"name" => esc_html__("No", 'kona'), 
									"value" => "0")
							),
					   "default" => "0"
					  ),
	
					array( 	"label" => "",
							"id" => "_sr_headersearch",
							"hiding" => "1",	
							"type" => "hidinggroupstart"
						),
				  
						array( "label" => esc_html__("Columns", 'kona'),
							   "desc" => "",
							   "id" => "_sr_headersearchcol",
							   "type" => "selectbox",
							   "option" => array(		 
									array(	"name" => "3",
											"value" => "3"),
									array(	"name" => "4",
											"value" => "4"),
									array(	"name" => "5",
											"value" => "5")
									),
							   "default" => "5"
							  ),
	
					array( 	"label" => "",
							"id" => "_sr_headersearch",
							"hiding" => "1",	
							"type" => "hidinggroupend"
						),
	
				array( "label" => esc_html__("Mobile Breakpoint", 'kona'),
					   "desc" => esc_html__("At what size do you want the header/menu to switch to mobile layout", 'kona'),
					   "id" => "_sr_headerbreakpoint",
					   "type" => "selectbox",
					   "option" => array(		 
							array(	"name" => esc_html__("Default (1200px)", 'kona'), 
									"value" => "break-1200"),
							array(	"name" => esc_html__("1024px", 'kona'), 
									"value" => "break-1024")
							),
					   "default" => "break-1200"
					  ),
	
				array( "label" => esc_html__("Header Top Bar", 'kona'),
					   "desc" => esc_html__("Enable the header bar?", 'kona'),
					   "id" => "_sr_headerbar",
					   "type" => "checkbox-hiding",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "1"),		 
							array(	"name" => esc_html__("No", 'kona'), 
									"value" => "0")
							),
					   "default" => "0"
					  ),
	
					array( 	"label" => "",
							"id" => "_sr_headerbar",
							"hiding" => "1",	
							"type" => "hidinggroupstart"
						),
	
						array( "label" => esc_html__("Bar Background Color", 'kona'),
							   "desc" => "",
							   "id" => "_sr_headerbarbgcolor",
							   "type" => "color",
								"default" => "#000000"
							  ),
	
						array( "label" => esc_html__("Bar Text Color", 'kona'),
							   "desc" => "",
							   "id" => "_sr_headerbartextcolor",
							   "type" => "selectbox",
							   "option" => array(		 
									array(	"name" => esc_html__("Dark", 'kona'),
											"value" => "text-dark"),
									array(	"name" => esc_html__("Light", 'kona'),
											"value" => "text-light")
									),
							   "default" => "text-light"
							  ),
				  
						array( "label" => esc_html__("Left side", 'kona'),
							   "desc" => esc_html__("What to display in the left side?", 'kona'),
							   "id" => "_sr_headerbarleft",
							   "type" => "selectbox-hiding",
							   "option" => array(		 
									array(	"name" => esc_html__("Nothing", 'kona'),
											"value" => "0"),
									array(	"name" => esc_html__("Social Links", 'kona'),
											"value" => "social"),
								   	array(	"name" => esc_html__("WPML (language and/or currency switcher)", 'kona'),
											"value" => "wpml"),
									array(	"name" => esc_html__("Custom Text/Html", 'kona'),
											"value" => "custom")
									),
							   "default" => "0"
							  ),
	
							array( 	"label" => "",
									"id" => "_sr_headerbarleft",
									"hiding" => "custom",	
									"type" => "hidinggroupstart"
								),
	
								array( "label" => esc_html__("Custom Text", 'kona').' '.esc_html__("Left", 'kona'),
									   "desc" => "",
									   "id" => "_sr_headerbarleftcustom",
									   "type" => "textarea"
									  ),
	
							array( 	"label" => "",
									"id" => "_sr_headerbarleft",
									"hiding" => "custom",	
									"type" => "hidinggroupend"
								),
	
	
						array( "label" => esc_html__("Middle", 'kona'),
							   "desc" => esc_html__("What to display in the middle?", 'kona'),
							   "id" => "_sr_headerbarmiddle",
							   "type" => "selectbox-hiding",
							   "option" => array(		 
									array(	"name" => esc_html__("Nothing", 'kona'),
											"value" => "0"),
									array(	"name" => esc_html__("Social Links", 'kona'),
											"value" => "social"),
								   	array(	"name" => esc_html__("WPML (language and/or currency switcher)", 'kona'),
											"value" => "wpml"),
									array(	"name" => esc_html__("Custom Text/Html", 'kona'),
											"value" => "custom")
									),
							   "default" => "0"
							  ),
	
							array( 	"label" => "",
									"id" => "_sr_headerbarmiddle",
									"hiding" => "custom",	
									"type" => "hidinggroupstart"
								),
	
								array( "label" => esc_html__("Custom Text", 'kona').' '.esc_html__("Middle", 'kona'),
									   "desc" => "",
									   "id" => "_sr_headerbarmiddlecustom",
									   "type" => "textarea"
									  ),
	
							array( 	"label" => "",
									"id" => "_sr_headerbarmiddle",
									"hiding" => "custom",	
									"type" => "hidinggroupend"
								),
	
						array( "label" => esc_html__("Right side", 'kona'),
							   "desc" => esc_html__("What to display in the right side?", 'kona'),
							   "id" => "_sr_headerbarright",
							   "type" => "selectbox-hiding",
							   "option" => array(		 
									array(	"name" => esc_html__("Nothing", 'kona'),
											"value" => "0"),
									array(	"name" => esc_html__("Social Links", 'kona'),
											"value" => "social"),
								   	array(	"name" => esc_html__("WPML (language and/or currency switcher)", 'kona'),
											"value" => "wpml"),
									array(	"name" => esc_html__("Custom Text/Html", 'kona'),
											"value" => "custom")
									),
							   "default" => "0"
							  ),
	
							array( 	"label" => "",
									"id" => "_sr_headerbarright",
									"hiding" => "custom",	
									"type" => "hidinggroupstart"
								),
	
								array( "label" => esc_html__("Custom Text", 'kona').' '.esc_html__("Right", 'kona'),
									   "desc" => "",
									   "id" => "_sr_headerbarrightcustom",
									   "type" => "textarea"
									  ),
	
							array( 	"label" => "",
									"id" => "_sr_headerbarright",
									"hiding" => "custom",	
									"type" => "hidinggroupend"
								),
	
					array( 	"label" => "",
							"id" => "_sr_headerbar",
							"hiding" => "1",	
							"type" => "hidinggroupend"
						),
					
			array( "label" => "",
				   "id" => "_sr_headersettings",
				   "type" => "groupend"
				  ),
					  
			array( "label" => esc_html__("Menu Settings", 'kona'),
				   "id" => "_sr_menusettings",
				   "type" => "groupstart"
				  ),
					
				array( "label" => esc_html__("Mega Menu title", 'kona'),
					   "desc" => esc_html__("Do you want to display a title for your mega menu columns", 'kona'),
					   "id" => "_sr_megatitle",
					   "type" => "selectbox",
					   "option" => array(		 
							array(	"name" => esc_html__("With Title", 'kona'), 
									"value" => "with-title"),
							array(	"name" => esc_html__("No title", 'kona'), 
									"value" => "no-title")
							),
					   "default" => "with-title"
					  ),
										
			array( "label" => "",
				   "id" => "_sr_menusettings",
				   "type" => "groupend"
				  ),
			
	
			array( "label" => esc_html__("WPML", 'kona'),
				   "id" => "_sr_wpmlsettings",
				   "type" => "groupstart",
				   "condition" => "wpml"
				  ),
				
					array( "label" => esc_html__("Language Switcher", 'kona'),
						   "desc" => esc_html__("Show the Language Switcher on the header area? \"Sandbox\" will display the switcher only for admin users, your visitors won't see it (testing mode)", 'kona'),
						   "id" => "_sr_wpmlswitcher",
						   "type" => "checkbox",
						   "option" => array( 
								array(	"name" => esc_html__("Yes", 'kona'), 
										"value"=> "1"),
								array(	"name" => esc_html__("Sandbox", 'kona'), 
										"value" => "2"),		 
								array(	"name" => esc_html__("No", 'kona'), 
										"value" => "0")
								),
						   "default" => "1"
						  ),
	
					array( "label" => esc_html__("Currency Switcher", 'kona'),
						   "desc" => esc_html__("Show the Currency Switcher on the header area? \"Sandbox\" will display the switcher only for admin users, your visitors won't see it (testing mode)", 'kona'),
						   "id" => "_sr_currencyswitcher",
						   "type" => "checkbox",
				   			"condition" => "currencyswitcher",
						   "option" => array( 
								array(	"name" => esc_html__("Yes", 'kona'), 
										"value"=> "1"),
								array(	"name" => esc_html__("Sandbox", 'kona'), 
										"value" => "2"),		 
								array(	"name" => esc_html__("No", 'kona'), 
										"value" => "0")
								),
						   "default" => "1"
						  ),
				
			array( "label" => "",
				   "id" => "_sr_wpmlsettings",
				   "type" => "groupend"
				  ),
				  
	array ( "type" => "sectionend" ,
		   	"id" => "sectionend"),
			
			
			
			
	array( "name" => esc_html__("Footer", 'kona'),
		   "id" => "footer",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
		  
		  	array( "label" => esc_html__("Footer Settings", 'kona'),
				   "id" => "_sr_footersettings",
				   "type" => "groupstart"
				  ),
					  
				array( "label" => esc_html__("Show Footer", 'kona'),
					   "desc" => esc_html__("Do you want to display the footer?", 'kona').'',
					   "id" => "_sr_footershow",
					   "type" => "checkbox-hiding",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "yes"),		 
							array(	"name" => esc_html__("No", 'kona'), 
									"value" => "no")
							),
					   "default" => "yes"
					  ),
	
				array( 	"label" => "",
						"id" => "_sr_footershow",
						"hiding" => "yes",	
						"type" => "hidinggroupstart"
					),
						
					array( "label" => esc_html__("Footer Columns", 'kona'),
						   "desc" => esc_html__('The Footer works with widgets.  Go to the Appearance > Widgets and enter your wanted widgets for the footer area.', 'kona'),
						   "id" => "_sr_footerlayout",
						   "type" => "selectbox-custom",
						   'option' => array( 
									array(	'name' => "", 
											'value' => 'one-full',
											'image' => 'col-1.png'),	
									array(	'name' => "", 
											'value'=> 'one-half;one-half',
											'image' => 'col-2.png'),
									array(	'name' => "", 
											'value'=> 'one-third;one-third;one-third',
											'image' => 'col-3.png'),
									array(	'name' => "", 
											'value'=> 'one-fourth;one-fourth;one-fourth;one-fourth',
											'image' => 'col-4.png'),
									array(	"name" => "linebreak"),
									array(	'name' => "", 
											'value'=> 'one-third;two-third',
											'image' => 'col-6.png'),
									array(	'name' => "", 
											'value'=> 'two-third;one-third',
											'image' => 'col-7.png'),
									array(	'name' => "", 
											'value'=> 'one-fourth;three-fourth',
											'image' => 'col-8.png'),
									array(	'name' => "", 
											'value'=> 'three-fourth;one-fourth',
											'image' => 'col-9.png'),
									array(	"name" => "linebreak"),
									array(	'name' => "", 
											'value'=> 'one-fourth;one-fourth;two-fourth',
											'image' => 'col-10.png'),
									array(	'name' => "",  
											'value'=> 'two-fourth;one-fourth;one-fourth',
											'image' => 'col-11.png'),
									array(	'name' => "", 
											'value'=> 'one-fourth;two-fourth;one-fourth',
											'image' => 'col-12.png'),
									array(	'name' => "",  
											'value'=> 'one-fifth;one-fifth;one-fifth;two-fifth',
											'image' => 'col-19.png'),
									array(	'name' => "",  
											'value'=> 'two-fifth;one-fifth;one-fifth;one-fifth',
											'image' => 'col-20.png'),
									array(	'name' => "",  
											'value'=> 'one-fifth;two-fifth;one-fifth;one-fifth',
											'image' => 'col-21.png'),
									array(	'name' => "",  
											'value'=> 'one-fifth;one-fifth;two-fifth;one-fifth',
											'image' => 'col-21.png')	
									),
								'default' => 'one-third;one-third;one-third'
								),
	
				array( 	"label" => "",
						"id" => "_sr_footershow",
						"hiding" => "yes",	
						"type" => "hidinggroupend"
					),
	
				array( 	"label" => esc_html__("Show Back To Top", 'kona'),
					   "desc" => "",
						"id" => "_sr_backtotop",
						"type" => "checkbox-hiding",
					   	"option" => array( 
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "1"),		 
							array(	"name" => esc_html__("No", 'kona'), 
									"value" => "0")
							),
					   	"default" => "0"
						),
	
				array( "label" => esc_html__("Footer bottom", 'kona'),
					   "desc" => "",
					   "id" => "_sr_footerbottom",
					   "type" => "textarea"
					  ),
	
				array( "label" => esc_html__("Footer copyright", 'kona'),
					   "desc" => "",
					   "id" => "_sr_footercopyright",
					   "type" => "textarea"
					  ),
	
			array( "label" => "",
				   "id" => "_sr_footersettings",
				   "type" => "groupend"
				  ),
	
	array ( "type" => "sectionend" ,
		   	"id" => "sectionend"),		

	
	
	array( "name" => esc_html__("Blog", 'kona'),
		   "id" => "blog",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),	 
	
			array( "label" => esc_html__("Blog Grid", 'kona'),
				   "id" => "_sr_blogentriesgroup",
				   "type" => "groupstart"
				  ),
	
				array( "label" => "",
					   "desc" => esc_html__("These are the settings for the main blog page (archive).  The page you've choosed in the reading settings.", 'kona'),
					   "id" => "",
					   "type" => "info"
					  ),
	
				array( "label" => esc_html__("Grid Width", 'kona'),
					   "desc" => esc_html__("Select your grid width.", 'kona'),
					   "id" => "_sr_bloggridwidth",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => esc_html__("Normal (fullwidth)", 'kona'), 
									"value"=> "wrapper"),
							array(	"name" => esc_html__("Medium", 'kona'), 
									"value"=> "wrapper-medium"),
							array(	"name" => esc_html__("Small", 'kona'), 
									"value"=> "wrapper-small")
							),
					   "default" => "wrapper-medium"
					  ),
	
				array( "label" => esc_html__("Columns", 'kona'),
					   "desc" => esc_html__("Select a column size for the blog grid.", 'kona'),
					   "id" => "_sr_bloggridcolumns",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => "2", 
									"value"=> "2"),
							array(	"name" => "3", 
									"value"=> "3"),
							array(	"name" => "4", 
									"value"=> "4")
							),
					   "default" => "2"
					  ),
	
				array( "label" => esc_html__("Image Style", 'kona'),
					   "desc" => esc_html__("Equal will crop the images to the same dimensions", 'kona').'',
					   "id" => "_sr_bloggridstyle",
					   "type" => "selectbox-hiding",
					   "option" => array( 
							array(	"name" => esc_html__("Equal", 'kona'), 
									"value"=> "equal"),
							array(	"name" => esc_html__("Masonry", 'kona'), 
									"value"=> "masonry")
							),
					   "default" => "equal"
					  ),
	
				array( "label" => esc_html__("Spacing", 'kona'),
					   "desc" => "",
					   "id" => "_sr_bloggridspacing",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => esc_html__("Normal Spacing", 'kona'), 
									"value"=> "spaced"),
							array(	"name" => esc_html__("Big Spacing", 'kona'), 
									"value"=> "spaced-big"),
							array(	"name" => esc_html__("Huge Spacing", 'kona'), 
									"value"=> "spaced-huge")
							),
					   "default" => "spaced-big"
					  ),
				
	
				array( "label" => esc_html__("Title Size", 'kona'),
					   "desc" => "",
					   "id" => "_sr_bloggridtitlesize",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => "h1", 
									"value"=> "h1"),
							array(	"name" => "h2", 
									"value"=> "h2"),
							array(	"name" => "h3", 
									"value"=> "h3"),
							array(	"name" => "h4", 
									"value"=> "h4"),
							array(	"name" => "h5", 
									"value"=> "h5"),
							array(	"name" => "h6", 
									"value"=> "h6")
							),
					   "default" => "h5"
					  ),
	
				array( "label" => esc_html__("Slide In (Unveil) Effect", 'kona'),
					   "desc" => esc_html__("Enable the slide in effect.", 'kona'),
					   "id" => "_sr_bloggridunveil",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Normal", 'kona'), 
									"value"=> "do-anim"),
							array(	"name" => esc_html__("Modern", 'kona'), 
									"value"=> "do-anim-modern"),
							array(	"name" => esc_html__("No", 'kona'), 
									"value" => "no-anim")
							),
					   "default" => "do-anim"
					  ),

				array( "label" => esc_html__("Show Category", 'kona'),
					   "desc" => esc_html__("Show or Hide the category for your blog grid items.", 'kona'),
					   "id" => "_sr_bloggridcategory",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Show", 'kona'), 
									"value"=> "1"),
							array(	"name" => esc_html__("Hide", 'kona'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),

				array( "label" => esc_html__("Show Intro (excerpt)", 'kona'),
					   "desc" => esc_html__("Show or Hide the intro text for your blog grid items.", 'kona'),
					   "id" => "_sr_bloggridintro",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Show", 'kona'), 
									"value"=> "1"),
							array(	"name" => esc_html__("Hide", 'kona'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),

				array( "label" => esc_html__("Show Date", 'kona'),
					   "desc" => esc_html__("Show / Hide the date for your blog grid items.", 'kona'),
					   "id" => "_sr_bloggriddate",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Show", 'kona'), 
									"value"=> "1"),
							array(	"name" => esc_html__("Hide", 'kona'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),	

				array( "label" => esc_html__("Read More Button", 'kona'),
					   "desc" => esc_html__("Enable or disable the read more button on blog entries.", 'kona'),
					   "id" => "_sr_bloggridreadmore",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Show", 'kona'), 
									"value"=> "1"),
							array(	"name" => esc_html__("Hide", 'kona'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),
	
				array( "label" => esc_html__("Sidebar", 'kona'),
					   "desc" => esc_html__("Do you want enable the sidebar for the blog page?  If yes, add your widgets to the sidebar.", 'kona'),
					   "id" => "_sr_bloggridsidebar",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => esc_html__("No Sidebar", 'kona'), 
									"value"=> "false"),
							array(	"name" => esc_html__("Left Sidebar", 'kona'), 
									"value"=> "left"),
							array(	"name" => esc_html__("Right Sidebar", 'kona'), 
									"value"=> "right")
							),
					   "default" => "false"
					  ),
					  																
			array( "label" => "",
				   "id" => "_sr_blogentriesgroup",
				   "type" => "groupend"
				  ),
			
			array( "label" => esc_html__("Single Post View", 'kona'),
				   "id" => "_sr_blogpostsgroup",
				   "type" => "groupstart"
				  ),
				   
				array( "label" => esc_html__("Show Date", 'kona'),
					   "desc" => esc_html__("Do you want to show the date in the page title", 'kona'),
					   "id" => "_sr_blogpostdate",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "1"),
							array(	"name" => esc_html__("No", 'kona'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),
					  
				array( "label" => esc_html__("Show Category", 'kona'),
					   "desc" => esc_html__("Do you want to show the related categories in the page title", 'kona'),
					   "id" => "_sr_blogpostcat",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "1"),
							array(	"name" => esc_html__("No", 'kona'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),
	
				array( "label" => esc_html__("Display Author Name", 'kona'),
					   "desc" => "",
					   "id" => "_sr_blogpostauthor",
					   "type" => "checkbox-hiding",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "1"),
							array(	"name" => esc_html__("No", 'kona'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),
	
				array( "label" => esc_html__("Show Tags", 'kona'),
					   "desc" => esc_html__("Do you want to show the related tags at the bottom of the post", 'kona'),
					   "id" => "_sr_blogposttags",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "1"),
							array(	"name" => esc_html__("No", 'kona'), 
									"value"=> "0")
							),
					   "default" => "0"
					  ),
					  
				array( "label" => esc_html__("Single Pagination", 'kona'),
					   "desc" => esc_html__("Do you want to activate the pagination between posts", 'kona'),
					   "id" => "_sr_blogpostpagination",
					   "type" => "checkbox-hiding",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "1"),
							array(	"name" => esc_html__("No", 'kona'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),
						  					  
				array( "label" => esc_html__("Blog Posts Comments", 'kona'),
				   	   "desc" => esc_html__("Make sure 'Allow comments' are also checked in the post discussion option.", 'kona'),
					   "id" => "_sr_blogcomments",
					   "type" => "checkbox-hiding",
					   "option" => array( 
							array(	"name" => esc_html__("Enable", 'kona'), 
									"value"=> "1"),
							array(	"name" => esc_html__("Disable", 'kona'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),
	
				array( "label" => esc_html__("Share", 'kona'),
					   "desc" => esc_html__("Enable the share feature.", 'kona'),
					   "id" => "_sr_blogpostshare",
					   "type" => "checkbox-hiding",
					   "option" => array( 
							array(	"name" => esc_html__("Enable", 'kona'), 
									"value"=> "1"),
							array(	"name" => esc_html__("Disable", 'kona'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),
					  
					array( 	"label" => "Share Yes",
							"id" => "_sr_blogpostshare",
							"hiding" => "1",	
							"type" => "hidinggroupstart"
						),
						
						array( 	"label" => esc_html__("Facebook", 'kona'),
					   			"desc" => "",
					   			"id" => "_sr_blogpostshare_fb",
					   			"type" => "check"
					   			),
								
						array( 	"label" => esc_html__("Twitter", 'kona'),
					   			"desc" => "",
					   			"id" => "_sr_blogpostshare_tw",
					   			"type" => "check"
					   			),
								
						array( 	"label" => esc_html__("Google +", 'kona'),
					   			"desc" => "",
					   			"id" => "_sr_blogpostshare_gplus",
					   			"type" => "check"
					   			),
								
						array( 	"label" => esc_html__("Pinterest", 'kona'),
					   			"desc" => "",
					   			"id" => "_sr_blogpostshare_pt",
					   			"type" => "check"
					   			),	
						
					array( 	"id" => "_sr_blogpostshare",
							"type" => "hidinggroupend"
						),
	
					array( "label" => esc_html__("Sidebar for single post", 'kona'),
						   "desc" => esc_html__("Activate the sidebar for your single posts.", 'kona'),
						   "id" => "_sr_blogpostsidebar",
						   "type" => "selectbox",
						   "option" => array( 
								array(	"name" => esc_html__("No Sidebar", 'kona'), 
										"value"=> "false"),
								array(	"name" => esc_html__("Left Sidebar", 'kona'), 
										"value"=> "left"),
								array(	"name" => esc_html__("Right Sidebar", 'kona'), 
										"value"=> "right")
								),
						   "default" => "false"
						  ),
																
			array( "label" => "",
				   "id" => "_sr_blogpostsgroup",
				   "type" => "groupend"
				  ),
	
	array ( "type" => "sectionend",
		   	"id" => "sectionend"),
	
	
	array( "name" => esc_html__("Portfolio", 'kona'),
		   "id" => "portfolio",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
					  
			array( "label" => esc_html__("Portfolio Single Item", 'kona'),
				   "id" => "_sr_portfolio-single",
				   "type" => "groupstart"
				  ),
				  
				array( "label" => esc_html__("Custom URL name", 'kona'),
					   "desc" => esc_html__("This is the name/word which will appear in your url (if your permalink settings are set to post name)", 'kona').'<br><br><strong>ATTENTION</strong>:'.esc_html__("When changing you probably need to resave your permalinks in Settings > Permalinks.", 'kona'),
					   "id" => "_sr_portfoliourl",
					   "type" => "text",
					   "default" => "portfolio",
					  ),		  
					  
				array( "label" => esc_html__("Single Pagination", 'kona'),
					   "desc" => esc_html__("Enable the pagination between the portfolio posts.", 'kona'),
					   "id" => "_sr_portfoliopagination",
					   "type" => "checkbox-hiding",
					   "option" => array(
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "1"),
							array(	"name" => esc_html__("No", 'kona'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),
					  
				array( "label" => esc_html__("Share", 'kona'),
					   "desc" => esc_html__("Enable the share feature.", 'kona'),
					   "id" => "_sr_portfolioshare",
					   "type" => "checkbox-hiding",
					   "option" => array( 
							array(	"name" => esc_html__("Enable", 'kona'), 
									"value"=> "1"),
							array(	"name" => esc_html__("Disable", 'kona'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),
					  
					array( 	"label" => "Share Yes",
							"id" => "_sr_portfolioshare",
							"hiding" => "1",	
							"type" => "hidinggroupstart"
						),
						
						array( 	"label" => "",
					   			"desc" => esc_html__("By default the share buttons are placed in the header area. To place the sharing anywhere else in your content just use this shortcode: ", 'kona').' [kona-share]',
					   			"id" => "_sr_portfolioshare_info",
					   			"type" => "info"
					   			),
						
						array( 	"label" => esc_html__("Facebook", 'kona'),
					   			"desc" => "",
					   			"id" => "_sr_portfolioshare_fb",
					   			"type" => "check"
					   			),
								
						array( 	"label" => esc_html__("Twitter", 'kona'),
					   			"desc" => "",
					   			"id" => "_sr_portfolioshare_tw",
					   			"type" => "check"
					   			),
								
						array( 	"label" => esc_html__("Google +", 'kona'),
					   			"desc" => "",
					   			"id" => "_sr_portfolioshare_gplus",
					   			"type" => "check"
					   			),
								
						array( 	"label" => esc_html__("Pinterest", 'kona'),
					   			"desc" => "",
					   			"id" => "_sr_portfolioshare_pt",
					   			"type" => "check"
					   			),	
						
					array( 	"id" => "_sr_portfolioshare",
							"type" => "hidinggroupend"
						),
				
						
			array( "label" => esc_html__("Portfolio Comments", 'kona'),
				   	   "desc" => esc_html__("Disable/Enable Comments for Portfolio items", 'kona'),
					   "id" => "_sr_portfoliocomments",
					   "type" => "checkbox-hiding",
					   "option" => array( 
							array(	"name" => esc_html__("Enable", 'kona'), 
									"value"=> "1"),
							array(	"name" => esc_html__("Disable", 'kona'), 
									"value"=> "0")
							),
					   "default" => "0"
					  ),
					  	
			array( "label" => "",
				   "id" => "_sr_portfolio-single",
				   "type" => "groupend"
				  ),
				
	array ( "type" => "sectionend",
		   	"id" => "sectionend"),	
	
	array( "name" => esc_html__("Typography", 'kona'),
		   "id" => "typography",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
	
			array( "label" => esc_html__("Body", 'kona'),
				   "id" => "_sr_typography-body",
				   "type" => "groupstart"
				  ),
							
				array( "label" => esc_html__("Body Font", 'kona'),
				   	   "desc" => "",
					   "id" => "_sr_bodyfont",
					   "type" => "typo-body",
					   "option" => array( 
							array(	"id" => "_sr_bodyfont-font" ),
							array(	"id" => "_sr_bodyfont-weight" ),
							array(	"id" => "_sr_bodyfont-boldweight" ),
							array(	"id" => "_sr_bodyfont-size" ),
							array(	"id" => "_sr_bodyfont-height" ),
							array(	"id" => "_sr_bodyfont-spacing" ),
							array(	"id" => "_sr_bodyfont-1024" ),
							array(	"id" => "_sr_bodyfont-1024-height" ),
							array(	"id" => "_sr_bodyfont-768" ),
							array(	"id" => "_sr_bodyfont-768-height" ),
							array(	"id" => "_sr_bodyfont-480"),
							array(	"id" => "_sr_bodyfont-480-height")
							),
					   "default" => array('Montserrat','300','400','15px','23px','0','15px','23px','14px','22px','14px','22px')
					  ),
			
			array( "label" => "",
				   "id" => "_sr_typography-body",
				   "type" => "groupend"
				  ),
			
			array( "label" => esc_html__("General Headings", 'kona'),
				   "id" => "_sr_typography-headings",
				   "type" => "groupstart"
				  ),
				
				array( "label" => "H1 Font",
				   	   "desc" => "",
					   "id" => "_sr_h1font",
					   "type" => "typo-header",
					   "option" => array( 
							array(	"id" => "_sr_h1font-font" ),
							array(	"id" => "_sr_h1font-weight" ),
							array(	"id" => "_sr_h1font-boldweight" ),
							array(	"id" => "_sr_h1font-size" ),
							array(	"id" => "_sr_h1font-height" ),
							array(	"id" => "_sr_h1font-spacing" ),
							array(	"id" => "_sr_h1font-transform" ),
							array(	"id" => "_sr_h1font-1024" ),
							array(	"id" => "_sr_h1font-1024-height" ),
							array(	"id" => "_sr_h1font-768" ),
							array(	"id" => "_sr_h1font-768-height" ),
							array(	"id" => "_sr_h1font-480" ),
							array(	"id" => "_sr_h1font-480-height" )
							),
					   "default" => array('Montserrat','400','600','64px','72px','0','none','58px','68px','48px','56px','38px','46px')
					  ),
				
				array( "label" => "H2 Font",
				   	   "desc" => "",
					   "id" => "_sr_h2font",
					   "type" => "typo-header",
					   "option" => array( 
							array(	"id" => "_sr_h2font-font" ),
							array(	"id" => "_sr_h2font-weight" ),
							array(	"id" => "_sr_h2font-boldweight" ),
							array(	"id" => "_sr_h2font-size" ),
							array(	"id" => "_sr_h2font-height" ),
							array(	"id" => "_sr_h2font-spacing" ),
							array(	"id" => "_sr_h2font-transform" ),
							array(	"id" => "_sr_h2font-1024" ),
							array(	"id" => "_sr_h2font-1024-height" ),
							array(	"id" => "_sr_h2font-768" ),
							array(	"id" => "_sr_h2font-768-height" ),
							array(	"id" => "_sr_h2font-480" ),
							array(	"id" => "_sr_h2font-480-height" )
							),
					   "default" => array('Montserrat','400','600','40px','48px','0','none','36px','44px','34px','42px','29px','36px')
					  ),
				
				array( "label" => "H3 Font",
				   	   "desc" => "",
					   "id" => "_sr_h3font",
					   "type" => "typo-header",
					   "option" => array( 
							array(	"id" => "_sr_h3font-font" ),
							array(	"id" => "_sr_h3font-weight" ),
							array(	"id" => "_sr_h3font-boldweight" ),
							array(	"id" => "_sr_h3font-size" ),
							array(	"id" => "_sr_h3font-height" ),
							array(	"id" => "_sr_h3font-spacing" ),
							array(	"id" => "_sr_h3font-transform" ),
							array(	"id" => "_sr_h3font-1024" ),
							array(	"id" => "_sr_h3font-1024-height" ),
							array(	"id" => "_sr_h3font-768" ),
							array(	"id" => "_sr_h3font-768-height" ),
							array(	"id" => "_sr_h3font-480" ),
							array(	"id" => "_sr_h3font-480-height" )
							),
					   "default" => array('Montserrat','400','600','32px','40px','0','none','28px','35px','25px','32px','24px','31px')
					  ),
				
				array( "label" => "H4 Font",
				   	   "desc" => "",
					   "id" => "_sr_h4font",
					   "type" => "typo-header",
					   "option" => array( 
							array(	"id" => "_sr_h4font-font" ),
							array(	"id" => "_sr_h4font-weight" ),
							array(	"id" => "_sr_h4font-boldweight" ),
							array(	"id" => "_sr_h4font-size" ),
							array(	"id" => "_sr_h4font-height" ),
							array(	"id" => "_sr_h4font-spacing" ),
							array(	"id" => "_sr_h4font-transform" ),
							array(	"id" => "_sr_h4font-1024" ),
							array(	"id" => "_sr_h4font-1024-height" ),
							array(	"id" => "_sr_h4font-768" ),
							array(	"id" => "_sr_h4font-768-height" ),
							array(	"id" => "_sr_h4font-480" ),
							array(	"id" => "_sr_h4font-480-height" )
							),
					   "default" => array('Montserrat','400','600','22px','30px','0','none','20px','27px','19px','26px','19px','26px')
					  ),
				
				array( "label" => "H5 Font",
				   	   "desc" => "",
					   "id" => "_sr_h5font",
					   "type" => "typo-header",
					   "option" => array( 
							array(	"id" => "_sr_h5font-font" ),
							array(	"id" => "_sr_h5font-weight" ),
							array(	"id" => "_sr_h5font-boldweight" ),
							array(	"id" => "_sr_h5font-size" ),
							array(	"id" => "_sr_h5font-height" ),
							array(	"id" => "_sr_h5font-spacing" ),
							array(	"id" => "_sr_h5font-transform" ),
							array(	"id" => "_sr_h5font-1024" ),
							array(	"id" => "_sr_h5font-1024-height" ),
							array(	"id" => "_sr_h5font-768" ),
							array(	"id" => "_sr_h5font-768-height" ),
							array(	"id" => "_sr_h5font-480" ),
							array(	"id" => "_sr_h5font-480-height" )
							),
					   "default" => array('Montserrat','400','600','18px','25px','0','none','16px','23px','16px','23px','16px','23px')
					  ),
				
				array( "label" => "H6 Font",
				   	   "desc" => "",
					   "id" => "_sr_h6font",
					   "type" => "typo-header",
					   "option" => array( 
							array(	"id" => "_sr_h6font-font" ),
							array(	"id" => "_sr_h6font-weight" ),
							array(	"id" => "_sr_h6font-boldweight" ),
							array(	"id" => "_sr_h6font-size" ),
							array(	"id" => "_sr_h6font-height" ),
							array(	"id" => "_sr_h6font-spacing" ),
							array(	"id" => "_sr_h6font-transform" ),
							array(	"id" => "_sr_h6font-1024" ),
							array(	"id" => "_sr_h6font-1024-height" ),
							array(	"id" => "_sr_h6font-768" ),
							array(	"id" => "_sr_h6font-768-height" ),
							array(	"id" => "_sr_h6font-480" ),
							array(	"id" => "_sr_h6font-480-height" )
							),
					   "default" => array('Montserrat','400','600','16px','22px','0','none','15px','21px','14px','20px','14px','20px')
					  ),
				
			array( "label" => "",
				   "id" => "_sr_typography-headings",
				   "type" => "groupend"
				  ),
				  
				  
			array( "label" => esc_html__("Misc Headings", 'kona'),
				   "id" => "_sr_typography-sectiontitle",
				   "type" => "groupstart"
				  ),
							
				array( "label" => esc_html__("Subtitle", 'kona'),
				   	   "desc" => "",
					   "id" => "_sr_subtitle",
					   "type" => "typo-sub",
					   "option" => array( 
							array(	"id" => "_sr_subtitle-font" ),
							array(	"id" => "_sr_subtitle-weight" ),
							array(	"id" => "_sr_subtitle-boldweight" ),
							array(	"id" => "_sr_subtitle-spacing" ),
							array(	"id" => "_sr_subtitle-transform" ),
							),
					   "default" => array('Montserrat','400','500','0','none')
					  ),
					  			
			array( "label" => "",
				   "id" => "_sr_typography-sectiontitle",
				   "type" => "groupend"
				  ),
			
						
			array( "label" => esc_html__("Navigation", 'kona'),
				   "id" => "_sr_typography-navigation",
				   "type" => "groupstart"
				  ),
				
				array( "label" => esc_html__("Root Menu", 'kona'),
				   	   "desc" => "",
					   "id" => "_sr_navigationfont",
					   "type" => "typo-nav",
					   "option" => array( 
							array(	"id" => "_sr_navigationfont-font" ),
							array(	"id" => "_sr_navigationfont-weight" ),
							array(	"id" => "_sr_navigationfont-size" ),
							array(	"id" => "_sr_navigationfont-spacing" ),
							array(	"id" => "_sr_navigationfont-transform" )
							),
					   "default" => array('Montserrat','500','15px','0','none')
					  ),
					  
				array( "label" => esc_html__("Sub Menu", 'kona'),
				   	   "desc" => "",
					   "id" => "_sr_navigationsubfont",
					   "type" => "typo-nav",
					   "option" => array( 
							array(	"id" => "_sr_navigationsubfont-font" ),
							array(	"id" => "_sr_navigationsubfont-weight" ),
							array(	"id" => "_sr_navigationsubfont-size" ),
							array(	"id" => "_sr_navigationsubfont-spacing" ),
							array(	"id" => "_sr_navigationsubfont-transform" )
							),
					   "default" => array('Montserrat','400','14px','0','none')
					  ),
											
			array( "label" => "",
				   "id" => "_sr_typography-navigation",
				   "type" => "groupend"
				  ),
				  
			array( "label" => esc_html__("Portfolio", 'kona'),
				   "id" => "_sr_typography-portfolio",
				   "type" => "groupstart"
				  ),
							
				array( "label" => esc_html__("Portfolio Title", 'kona'),
				   	   "desc" => "",
					   "id" => "_sr_portfoliotitle",
					   "type" => "typo-simple",
					   "option" => array( 
							array(	"id" => "_sr_portfoliotitle-font" ),
							array(	"id" => "_sr_portfoliotitle-weight" ),
							array(	"id" => "_sr_portfoliotitle-spacing" ),
							array(	"id" => "_sr_portfoliotitle-transform" ),
							),
					   "default" => array('Montserrat','500','0','none')
					  ),
	
				array( "label" => esc_html__("Portfolio Category", 'kona'),
				   	   "desc" => "",
					   "id" => "_sr_portfoliocategory",
					   "type" => "typo-simple",
					   "option" => array( 
							array(	"id" => "_sr_portfoliocategory-font" ),
							array(	"id" => "_sr_portfoliocategory-weight" ),
							array(	"id" => "_sr_portfoliocategory-spacing" ),
							array(	"id" => "_sr_portfoliocategory-transform" ),
							),
					   "default" => array('Montserrat','500','0','none')
					  ),
			
					  			
			array( "label" => "",
				   "id" => "_sr_typography-portfolio",
				   "type" => "groupend"
				  ),
	
			array( "label" => esc_html__("Blog", 'kona'),
				   "id" => "_sr_typography-blog",
				   "type" => "groupstart"
				  ),
							
				array( "label" => esc_html__("Blog Post Title for archive page", 'kona'),
				   	   "desc" => "",
					   "id" => "_sr_blogtitle",
					   "type" => "typo-simple",
					   "option" => array( 
							array(	"id" => "_sr_blogtitle-font" ),
							array(	"id" => "_sr_blogtitle-weight" ),
							array(	"id" => "_sr_blogtitle-spacing" ),
							array(	"id" => "_sr_blogtitle-transform" ),
							),
					   "default" => array('Montserrat','500','0','none')
					  ),
	
				array( "label" => esc_html__("Blog Post Title for single view", 'kona'),
				   	   "desc" => "",
					   "id" => "_sr_blogtitlesingle",
					   "type" => "typo-simple",
					   "option" => array( 
							array(	"id" => "_sr_blogtitlesingle-font" ),
							array(	"id" => "_sr_blogtitlesingle-weight" ),
							array(	"id" => "_sr_blogtitlesingle-spacing" ),
							array(	"id" => "_sr_blogtitlesingle-transform" ),
							),
					   "default" => array('Montserrat','600','0','none')
					  ),
					  			
			array( "label" => "",
				   "id" => "_sr_typography-blog",
				   "type" => "groupend"
				  ),
	
			array( "label" => esc_html__("Shop", 'kona'),
				   "id" => "_sr_typography-shop",
				   "type" => "groupstart"
				  ),
							
				array( "label" => esc_html__("Product Title for archive page", 'kona'),
				   	   "desc" => "",
					   "id" => "_sr_productgridtitle",
					   "type" => "typo-simple",
					   "option" => array( 
							array(	"id" => "_sr_productgridtitle-font" ),
							array(	"id" => "_sr_productgridtitle-weight" ),
							array(	"id" => "_sr_productgridtitle-spacing" ),
							array(	"id" => "_sr_productgridtitle-transform" ),
							),
					   "default" => array('Montserrat','500','0','none')
					  ),
	
				array( "label" => esc_html__("Product Title for single view", 'kona'),
				   	   "desc" => "",
					   "id" => "_sr_productsingletitle",
					   "type" => "typo-simple",
					   "option" => array( 
							array(	"id" => "_sr_productsingletitle-font" ),
							array(	"id" => "_sr_productsingletitle-weight" ),
							array(	"id" => "_sr_productsingletitle-spacing" ),
							array(	"id" => "_sr_productsingletitle-transform" ),
							),
					   "default" => array('Montserrat','600','0','none')
					  ),
	
				array( "label" => esc_html__("Price", 'kona'),
				   	   "desc" => "",
					   "id" => "_sr_productprice",
					   "type" => "typo-simple",
					   "option" => array( 
							array(	"id" => "_sr_productprice-font" ),
							array(	"id" => "_sr_productprice-weight" ),
							array(	"id" => "_sr_productprice-spacing" ),
							array(	"id" => "_sr_productprice-transform" ),
							),
					   "default" => array('Montserrat','400','0','none')
					  ),
					  			
			array( "label" => "",
				   "id" => "_sr_typography-shop",
				   "type" => "groupend"
				  ),
			
			array( "label" => esc_html__("Buttons", 'kona'),
				   "id" => "_sr_typography-button",
				   "type" => "groupstart"
				  ),
				
				array( "label" => esc_html__("Button Font", 'kona'),
				   	   "desc" => "",
					   "id" => "_sr_buttonfont",
					   "type" => "typo-simple",
					   "option" => array( 
							array(	"id" => "_sr_buttonfont-font" ),
							array(	"id" => "_sr_buttonfont-weight" ),
							array(	"id" => "_sr_buttonfont-spacing" ),
							array(	"id" => "_sr_buttonfont-transform" )
							),
					   "default" => array('Montserrat','500','0','none')
					  ),
				
			array( "label" => "",
				   "id" => "_sr_typography-button",
				   "type" => "groupend"
				  ),
	
			array( "label" => __("Form", 'kona'),
				   "id" => "_sr_typography-form",
				   "type" => "groupstart"
				  ),
				
				array( "label" => __("Label", 'kona'),
				   	   "desc" => "",
					   "id" => "_sr_labelfont",
					   "type" => "typo-nav",
					   "option" => array( 
							array(	"id" => "_sr_labelfont-font" ),
							array(	"id" => "_sr_labelfont-weight" ),
							array(	"id" => "_sr_labelfont-size" ),
							array(	"id" => "_sr_labelfont-spacing" ),
							array(	"id" => "_sr_labelfont-transform" )
							),
					   "default" => array('Montserrat','500','14px','0','none')
					  ),
	
				array( "label" => __("Input", 'kona'),
				   	   "desc" => "",
					   "id" => "_sr_inputfont",
					   "type" => "typo-nav",
					   "option" => array( 
							array(	"id" => "_sr_inputfont-font" ),
							array(	"id" => "_sr_inputfont-weight" ),
							array(	"id" => "_sr_inputfont-size" ),
							array(	"id" => "_sr_inputfont-spacing" ),
							array(	"id" => "_sr_inputfont-transform" )
							),
					   "default" => array('Montserrat','500','16px','0','none')
					  ),
				
			array( "label" => __("Misc Elements", 'kona'),
				   "id" => "_sr_typography-form",
				   "type" => "groupend"
				  ),
				  
			array( "label" => esc_html__("Misc Typography", 'kona'),
				   "id" => "_sr_typography-sectiontitle",
				   "type" => "groupstart"
				  ),
							
				array( "label" => esc_html__("Widget Titles", 'kona'),
				   	   "desc" => "",
					   "id" => "_sr_widgettitlefont",
					   "type" => "typo-nav",
					   "option" => array( 
							array(	"id" => "_sr_widgettitlefont-font" ),
							array(	"id" => "_sr_widgettitlefont-weight" ),
							array(	"id" => "_sr_widgettitlefont-size" ),
							array(	"id" => "_sr_widgettitlefont-spacing" ),
							array(	"id" => "_sr_widgettitlefont-transform" )
							),
					   "default" => array('Montserrat','500','14px','0','none')
					  ),
					  			
			array( "label" => "",
				   "id" => "_sr_typography-sectiontitle",
				   "type" => "groupend"
				  ),
				  
			array( "label" => esc_html__("Font manager", 'kona'),
				   "id" => "_sr_typography-fontmanager",
				   "type" => "groupstart"
				  ),
				  				
				array( "label" => esc_html__("Add Font", 'kona'),
				   	   "desc" => "",
					   "id" => "_sr_fontmanager",
					   "type" => "fontmanager"
					   ),
					   
				array( "label" => esc_html__("Typekit ID/Token", 'kona'),
					   "desc" => esc_html__('If you plan to add typekit fonts, please enter the ID / Token code here.', 'kona'),
					   "id" => "_sr_typekit",
					   "type" => "text"
					  ),	  
				
			array( "label" => "",
				   "id" => "_sr_typography-fontmanager",
				   "type" => "groupend"
				  ),
	
	array ( "type" => "sectionend",
		   	"id" => "sectionend"),
				
	
	array( "name" => esc_html__("Social Networks", 'kona'),
		   "id" => "social",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
		  
			array( "label" => esc_html__("Social Networks", 'kona'),
				   "id" => "_sr_social_networks",
				   "type" => "groupstart"
				  ),
					  
				array( "label" => "",
					   "desc" => esc_html__('You can use this shortcode in any of your pages, widgets or footer textarea to display the link to your social profiles.  Choose between "normal" & "text style".', 'kona').'<code>[sr-social style="normal"]</code>',
					   "id" => "_sr_social_facebook",
					   "type" => "info"
					  ),
				  
				array( "label" => esc_html__("Facebook", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_facebook",
					   "type" => "text"
					  ),
				
				array( "label" => esc_html__("Twitter", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_twitter",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Google +", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_googleplus",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Vimeo", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_vimeo",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Instagram", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_instagram",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Dribbble", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_dribbble",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Youtube", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_youtube",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Deviantart", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_deviantart",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Behance", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_behance",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Flickr", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_flickr",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("LinkedIn", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_linkedin",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Rss", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_rss",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Pinterest", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_pinterest",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Xing", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_xing",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Dropbox", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_dropbox",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Stumbleupon", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_stumbleupon",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Delicious", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_delicious",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Soundcloud", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_soundcloud",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Spotify", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_spotify",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Codepen", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_codepen",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Github", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_github",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Lastfm", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_lastfm",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("jsfiddle", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_jsfiddle",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Mixcloud", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_mixcloud",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Skype", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_skype",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("WeChat", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_wechat",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("VK", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_vk",
					   "type" => "text"
					  ),
					  
				array( "label" => esc_html__("Your Email", 'kona'),
					   "desc" => "",
					   "id" => "_sr_social_mail",
					   "type" => "text"
					  ),
			
			array( "label" => "",
				   "id" => "_sr_social_networks",
				   "type" => "groupend"
				  ),
				  
	array ( "type" => "sectionend",
		   	"id" => "sectionend"),
				
			
	array( "name" => esc_html__("Custom Buttons", 'kona'),
		   "id" => "buttons",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
	
			array( "label" => esc_html__("Custom Button", 'kona').' 1',
				   "id" => "_sr_button-1",
				   "type" => "groupstart"
				  ),
	
				array( "label" => esc_html__("Background Color", 'kona'),
					   "desc" => "",
					   "id" => "_sr_button-1-bg",
					   "type" => "color",
						"default" => "#00e4a9"
					  ),

				array( "label" => esc_html__("Text Color", 'kona'),
					   "desc" => "",
					   "id" => "_sr_button-1-text",
					   "type" => "color",
						"default" => "#ffffff"
					  ),
				
				array( "label" => esc_html__("Hover Background Color", 'kona'),
					   "desc" => "",
					   "id" => "_sr_button-1-bghover",
					   "type" => "color",
						"default" => "#00be8d"
					  ),
	
				array( "label" => esc_html__("Hover text Color", 'kona'),
					   "desc" => "",
					   "id" => "_sr_button-1-texthover",
					   "type" => "color",
						"default" => "#ffffff"
					  ),
	
			array( "label" => "",
				   "id" => "_sr_button-1",
				   "type" => "groupend"
				  ),
	
			array( "label" => esc_html__("Custom Button", 'kona').' 2',
				   "id" => "_sr_button-2",
				   "type" => "groupstart"
				  ),
	
				array( "label" => esc_html__("Background Color", 'kona'),
					   "desc" => "",
					   "id" => "_sr_button-2-bg",
					   "type" => "color",
						"default" => "#01e0c8"
					  ),

				array( "label" => esc_html__("Text Color", 'kona'),
					   "desc" => "",
					   "id" => "_sr_button-2-text",
					   "type" => "color",
						"default" => "#ffffff"
					  ),
				
				array( "label" => esc_html__("Hover Background Color", 'kona'),
					   "desc" => "",
					   "id" => "_sr_button-2-bghover",
					   "type" => "color",
						"default" => "#01cab5"
					  ),
	
				array( "label" => esc_html__("Hover text Color", 'kona'),
					   "desc" => "",
					   "id" => "_sr_button-2-texthover",
					   "type" => "color",
						"default" => "#ffffff"
					  ),
	
			array( "label" => "",
				   "id" => "_sr_button-2",
				   "type" => "groupend"
				  ),
	
	array ( "type" => "sectionend",
		   	"id" => "sectionend"),
				
			
	array( "name" => esc_html__("Demo Import", 'kona'),
		   "id" => "import",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
		  
				array( "label" => esc_html__("Demo Choose", 'kona'),
					   "desc" => "",
					   "id" => "",
					   "type" => "import"
					  ),				 
			
	array ( "type" => "sectionend",
		   	"id" => "sectionend"),
			
			
	array( "name" => esc_html__("Shop Settings", 'kona'),
		   "id" => "shop",
		   "type" => "sectionstart",
		   "desc" => ""
		  ),
		  
			array( "label" => esc_html__("Item / Product Options (for grid)", 'kona'),
				   "id" => "_sr_shop-grid",
				   "type" => "groupstart"
				  ),
				  
				array( 	"label" => "",
						"desc" => esc_html__("These are the general item options (main shop page, archive pages, Related Products, Up-Sells, ...)", 'kona'),
						"id" => "_sr_shopiteminfo",
						"type" => "info"
						),		  
					  
				array( "label" => esc_html__("Title Font Size", 'kona'),
					   "desc" => "",
					   "id" => "_sr_shopitemtitlesize",
					   "type" => "selectbox",
					   "option" => array(		 
							array(	"name" => "h1",
									"value" => "h1"),
							array(	"name" => "h2",
									"value" => "h2"),
							array(	"name" => "h3",
									"value" => "h3"),
							array(	"name" => "h4",
									"value" => "h4"),
							array(	"name" => "h5",
									"value" => "h5"),
							array(	"name" => "h6",
									"value" => "h6")
							),
					   "default" => "h5"
					  ),
					  
				array( 	"label" => esc_html__("Show Item Price", 'kona'),
					   "desc" => esc_html__('Want to display the price?', 'kona'),
						"id" => "_sr_shopgridshowprice",
						"type" => "check"
						),
						
				array( 	"label" => esc_html__("Add to cart", 'kona'),
					   "desc" => esc_html__('Show the "Add to cart" button in the grid items.', 'kona'),
						"id" => "_sr_shopgridshowaddtocart",
						"type" => "check"
						),
	
				array( "label" => esc_html__("Enable variations", 'kona'),
					   "desc" => esc_html__("Do you want to show the variations on the shop page?  Make sure to have the variation swatches plugin ainstalled and active.", 'kona'),
					   "id" => "_sr_shopgridvariations",
					   "type" => "checkbox-hiding",
					   "option" => array( 
							array(	"name" => esc_html__("Enable", 'kona'), 
									"value"=> "1"),
							array(	"name" => esc_html__("Disable", 'kona'), 
									"value"=> "0")
							),
					   "default" => "0"
					  ),
	
					array( 	"label" => "",
							"id" => "_sr_shopgridvariations",
							"hiding" => "1",	
							"type" => "hidinggroupstart"
						),
	
						array( "label" => esc_html__("How many variations", 'kona'),
							   "desc" => esc_html__("Do you want to show all or just 1 or 2? It's recommended to show just 1.", 'kona'),
							   "id" => "_sr_shopgridvariationscount",
							   "type" => "selectbox-hiding",
							   "option" => array( 
									array(	"name" => esc_html__("1", 'kona'), 
											"value"=> "1"),
									array(	"name" => esc_html__("2", 'kona'), 
											"value"=> "2"),
									array(	"name" => esc_html__("All", 'kona'), 
											"value"=> "all")
									),
							   "default" => "1"
							  ),
						
							array( 	"label" => "",
									"id" => "_sr_shopgridvariationscount",
									"hiding" => "1 2",	
									"type" => "hidinggroupstart"
								),
	
								array( "label" => esc_html__("Attribute 1", 'kona'),
									   "desc" => "",
									   "id" => "_sr_shopgridvariationsatt1",
									   "type" => "prodattributes"
									  ),
	
							array( 	"label" => "",
									"id" => "_sr_shopgridvariationscount",
									"hiding" => "1",	
									"type" => "hidinggroupend"
								),
	
							array( 	"label" => "",
									"id" => "_sr_shopgridvariationscount",
									"hiding" => "2",	
									"type" => "hidinggroupstart"
								),
	
								array( "label" => esc_html__("Attribute 2", 'kona'),
									   "desc" => "",
									   "id" => "_sr_shopgridvariationsatt2",
									   "type" => "prodattributes"
									  ),
	
							array( 	"label" => "",
									"id" => "_sr_shopgridvariationscount",
									"hiding" => "2",	
									"type" => "hidinggroupend"
								),
	
					array( 	"label" => "",
							"id" => "_sr_shopgridvariations",
							"type" => "hidinggroupend"
						),
	
				array( "label" => esc_html__("Show Rating Stars", 'kona'),
					   "desc" => "",
					   "id" => "_sr_shopgridrating",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Show", 'kona'), 
									"value"=> "1"),
							array(	"name" => esc_html__("Hide", 'kona'), 
									"value"=> "0")
							),
					   "default" => "0"
					  ),
	
				array( "label" => esc_html__("Quick View", 'kona'),
					   "desc" => esc_html__("Do you want to enable the quick view option for the grid items?", 'kona'),
					   "id" => "_sr_shopgridquickview",
					   "type" => "checkbox-hiding",
					   "option" => array( 
							array(	"name" => esc_html__("Enable", 'kona'), 
									"value"=> "1"),
							array(	"name" => esc_html__("Disable", 'kona'), 
									"value"=> "0")
							),
					   "default" => "0"
					  ),
	
					array( 	"label" => "",
							"id" => "_sr_shopgridquickview",
							"hiding" => "1",	
							"type" => "hidinggroupstart"
						),
	
						array( "label" => esc_html__("Title Size (quick view)", 'kona'),
							   "desc" => "",
							   "id" => "_sr_shopgridquickviewtitle",
							   "type" => "selectbox",
							   "option" => array( 
									array(	"name" => esc_html__("H1", 'kona'), 
											"value"=> "h1"),
								   	array(	"name" => esc_html__("H2", 'kona'), 
											"value"=> "h2"),
								   	array(	"name" => esc_html__("H3", 'kona'), 
											"value"=> "h3"),
								   	array(	"name" => esc_html__("H4", 'kona'), 
											"value"=> "h4"),
								   	array(	"name" => esc_html__("H5", 'kona'), 
											"value"=> "h5"),
								   	array(	"name" => esc_html__("H6", 'kona'), 
											"value"=> "h6")
									),
							   "default" => "h3"
							  ),
	
						array( "label" => esc_html__("Show Meta (quick view)", 'kona'),
							   "desc" => esc_html__("Sku / Categories / Tags", 'kona'),
							   "id" => "_sr_shopgridquickviewmeta",
							   "type" => "checkbox",
							   "option" => array( 
									array(	"name" => esc_html__("Show", 'kona'), 
											"value"=> "1"),
									array(	"name" => esc_html__("Hide", 'kona'), 
											"value"=> "0")
									),
							   "default" => "0"
							  ),
	
						array( "label" => esc_html__("Share (quick view)", 'kona'),
							   "desc" => "",
							   "id" => "_sr_shopgridquickviewshare",
							   "type" => "checkbox",
							   "option" => array( 
									array(	"name" => esc_html__("Show", 'kona'), 
											"value"=> "1"),
									array(	"name" => esc_html__("Hide", 'kona'), 
											"value"=> "0")
									),
							   "default" => "0"
							  ),
	
					array( 	"label" => "",
							"id" => "_sr_shopgridquickview",
							"hiding" => "1",	
							"type" => "hidinggroupend"
						),
	
			array( "label" => esc_html__("Item / Product Options", 'kona'),
				   "id" => "_sr_shop-grid",
				   "type" => "groupend"
				  ),
				  
			array( "label" => esc_html__("Grid Options", 'kona'),
				   "id" => "_sr_shop-options",
				   "type" => "groupstart"
				  ),
				  				  
				array( "label" => esc_html__("Grid Width", 'kona'),
					   "desc" => "",
					   "id" => "_sr_shopgridwidth",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => esc_html__("Normal (fullwidth)", 'kona'), 
									"value"=> "wrapper"),
							array(	"name" => esc_html__("Medium", 'kona'), 
									"value"=> "wrapper-medium"),
							array(	"name" => esc_html__("Small", 'kona'), 
									"value"=> "wrapper-small")
							),
					   "default" => "wrapper"
					  ),
				
				array( "label" => esc_html__("Products per Page", 'kona'),
					   "desc" => esc_html__('How many items per page? Enter "-1" to show all.', 'kona'),
					   "id" => "_sr_shopgridcount",
					   "type" => "text",
					   "default" => "12"
					  ),		  
				  
				array( "label" => esc_html__("Columns", 'kona'),
					   "desc" => esc_html__("How many columns of items do you want to show per row?  Depending your column and grid width choice you might adapt the Product Image settings in Appearance > Customize > Woocommerce > Product Images", 'kona').'',
					   "id" => "_sr_shopgridcol",
					   "type" => "selectbox",
					   "option" => array(		 
							array(	"name" => "2",
									"value" => "2"),
							array(	"name" => "3",
									"value" => "3"),
							array(	"name" => "4",
									"value" => "4"),
							array(	"name" => "5",
									"value" => "5")
							),
					   "default" => "4"
					  ),
	
				array( "label" => esc_html__("Columns for Mobile", 'kona'),
					   "desc" => esc_html__("How many columns of items do you want to show on mobile devices?", 'kona').'',
					   "id" => "_sr_shopgridcolmobile",
					   "type" => "selectbox",
					   "option" => array(		 
							array(	"name" => "1",
									"value" => "1"),
							array(	"name" => "2",
									"value" => "2")
							),
					   "default" => "2"
					  ),
				
				array( "label" => esc_html__("Spacing", 'kona'),
					   "desc" => esc_html__("Do you want the tiles to be spaced?", 'kona'),
					   "id" => "_sr_shopgridspaced",
					   "type" => "selectbox",
					   "sendval" => true,
					   "option" => array( 
							array(	"name" => esc_html__("Normal Spacing", 'kona'), 
									"value"=> "spaced"),
							array(	"name" => esc_html__("Big Spacing", 'kona'), 
									"value"=> "spaced-big"),
							array(	"name" => esc_html__("Huge Spacing", 'kona'), 
									"value"=> "spaced-huge")
							),
					   "default" => "spaced-big"
					  ),
	
				array( "label" => esc_html__("Slide In (Unveil) Effect", 'kona'),
					   "desc" => esc_html__("Enable the slide in effect.", 'kona'),
					   "id" => "_sr_shopgridunveil",
					   "type" => "checkbox",
					   "option" => array( 
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "do-anim"),
							array(	"name" => esc_html__("No", 'kona'), 
									"value" => "no-anim")
							),
					   "default" => "do-anim"
					  ),
	
				array( 	"label" => esc_html__("Filter Option", 'kona'),
					   	"desc" => esc_html__("This will add a widget area on the top of the priduct grid to add your filter widgets", 'kona'),
						"id" => "_sr_shopgridshowfilter",
						"type" => "checkbox-hiding",
					    "option" => array( 
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "1"),
							array(	"name" => esc_html__("No", 'kona'), 
									"value"=> "0")
							),
					    "default" => "1"
					  ),

					array( 	"label" => "Filter Yes",
							"id" => "_sr_shopgridshowfilter",
							"hiding" => "1",	
							"type" => "hidinggroupstart"
						),
	
						array( "label" => esc_html__("Columns", 'kona'),
							   "desc" => '',
							   "id" => "_sr_shopgridfiltercolumns",
							   "type" => "selectbox",
							   "option" => array(		 
									array(	"name" => "3",
											"value" => "3"),
									array(	"name" => "4",
											"value" => "4"),
									array(	"name" => "5",
											"value" => "5")
									),
							   "default" => "3"
							  ),
	
					array( 	"label" => "Filter Yes",
							"id" => "_sr_shopgridshowfilter",
							"hiding" => "1",	
							"type" => "hidinggroupend"
						),
	
					array( 	"label" => esc_html__("Breadcrumb", 'kona'),
							"desc" => esc_html__("Do you want to show the breadcrumb on the gird (archive) pages?", 'kona'),
							"id" => "_sr_shopgridshowbreadcrumb",
							"type" => "check"
							),
					  					  					  						
					array( 	"label" => esc_html__("Result Count", 'kona'),
							"desc" => esc_html__("Do you want to show the results count on the top of the grid? ", 'kona'),
							"id" => "_sr_shopgridshowresults",
							"type" => "check"
							),

					array( 	"label" => esc_html__("Sorting Option", 'kona'),
							"desc" => esc_html__("Enable the sorting option", 'kona'),
							"id" => "_sr_shopgridshowsorting",
							"type" => "check"
							),
						
				array( "label" => esc_html__("Sidebar", 'kona'),
					   "desc" => esc_html__("Do you want enable the sidebar for the shop archive page? If yes, add your widgets to the sidebar.", 'kona'),
					   "id" => "_sr_shopgridsidebar",
					   "type" => "selectbox",
					   "option" => array( 
							array(	"name" => esc_html__("No Sidebar", 'kona'), 
									"value"=> "false"),
							array(	"name" => esc_html__("Left Sidebar", 'kona'), 
									"value"=> "left"),
							array(	"name" => esc_html__("Right Sidebar", 'kona'), 
									"value"=> "right")
							),
					   "default" => "false"
					  ),	
					  
				array( 	"label" => esc_html__("Pagination / Load More", 'kona'),
						"desc" => esc_html__('Choose your pagination option.', 'kona'),
						"id" => "_sr_shopgridpagination",
						"type" => "selectbox",
						"option" => array( 
							array(	"name" => esc_html__("Default Pagination", 'kona'), 
									"value" => "pagination"),
							array(	"name" => esc_html__("Load More", 'kona'), 
									"value" => "loadonclick"),
							array(	"name" => esc_html__("Infinity Load", 'kona'), 
									"value" => "infiniteload")
							),
						"default" => "pagination"
					  ),
					  
			array( "label" => "",
				   "id" => "_sr_shop-options",
				   "type" => "groupend"
				  ),
				  
			array( "label" => esc_html__("Single Product", 'kona'),
				   "id" => "_sr_shop-single",
				   "type" => "groupstart"
				  ),
				  
			array( "label" => esc_html__("Title Font Size", 'kona'),
					   "desc" => "",
					   "id" => "_sr_shopsingletitlesize",
					   "type" => "selectbox",
					   "option" => array(		 
							array(	"name" => "h1",
									"value" => "h1"),
							array(	"name" => "h2",
									"value" => "h2"),
							array(	"name" => "h3",
									"value" => "h3"),
							array(	"name" => "h4",
									"value" => "h4"),
							array(	"name" => "h5",
									"value" => "h5"),
							array(	"name" => "h6",
									"value" => "h6")
							),
					   "default" => "h1"
					  ),
	
			array( "label" => esc_html__("Price Font Size", 'kona'),
					   "desc" => "",
					   "id" => "_sr_shopsinglepricesize",
					   "type" => "typo-size",
					   "default" => "28px"
					  ),
	
			array( 	"label" => esc_html__("Breadcrumb", 'kona'),
					"desc" => esc_html__("Do you want to show the breadcrumb on the single product page?", 'kona'),
					"id" => "_sr_shopsinglebreadcrumb",
					"type" => "check"
					),
	
			array( 	"label" => esc_html__("Button appearance", 'kona'),
					"desc" => esc_html__("What should the 'add to cart' button to look like? If colored, it will take your main branding color (if set)", 'kona'),
					"id" => "_sr_shopsinglebutton",
					"type" => "selectbox-custom",
					'option' => array( 
							array(	'name' => "Simple", 
									'value' => 'simple',
									'image' => 'button-simple.png'),
							array(	'name' => "Full", 
									'value' => 'full',
									'image' => 'button-full.png'),
							array(	'name' => "Colored Simple", 
									'value' => 'customsimple',
									'image' => 'button-customsimple.png'),
							array(	'name' => "Colored Full", 
									'value' => 'customfull',
									'image' => 'button-customfull.png')
						),
				   "default" => "simple"
					),
				  	
			array( "label" => esc_html__("Fixed Add to Cart", 'kona'),
				   "desc" => esc_html__("Enable the fixed add to cart feature.", 'kona'),
				   "id" => "_sr_shopsinglefixedaddtocart",
				   "type" => "checkbox",
				   "option" => array( 
						array(	"name" => esc_html__("Enable", 'kona'), 
								"value"=> "1"),
						array(	"name" => esc_html__("Disable", 'kona'), 
								"value"=> "0")
						),
				   "default" => "0"
				  ),
	
			array( "label" => esc_html__("Share", 'kona'),
				   "desc" => esc_html__("Enable the share feature.", 'kona'),
				   "id" => "_sr_shopsingleshare",
				   "type" => "checkbox-hiding",
				   "option" => array( 
						array(	"name" => esc_html__("Enable", 'kona'), 
								"value"=> "1"),
						array(	"name" => esc_html__("Disable", 'kona'), 
								"value"=> "0")
						),
				   "default" => "1"
				  ),
				  
				array( 	"label" => "Share Yes",
						"id" => "_sr_shopsingleshare",
						"hiding" => "1",	
						"type" => "hidinggroupstart"
					),
					
					array( 	"label" => esc_html__("Facebook", 'kona'),
							"desc" => "",
							"id" => "_sr_shopsingleshare_fb",
							"type" => "check"
							),
							
					array( 	"label" => esc_html__("Twitter", 'kona'),
							"desc" => "",
							"id" => "_sr_shopsingleshare_tw",
							"type" => "check"
							),
							
					array( 	"label" => esc_html__("Google +", 'kona'),
							"desc" => "",
							"id" => "_sr_shopsingleshare_gplus",
							"type" => "check"
							),
							
					array( 	"label" => esc_html__("Pinterest", 'kona'),
							"desc" => "",
							"id" => "_sr_shopsingleshare_pt",
							"type" => "check"
							),	
					
				array( 	"id" => "_sr_shopsingleshare",
						"type" => "hidinggroupend"
					),
				  
			array( "label" => esc_html__("Reviews", 'kona'),
				   "desc" => esc_html__("Enable / Disable the review option", 'kona'),
				   "id" => "_sr_shopsinglereviews",
				   "type" => "checkbox-hiding",
				   "option" => array(
						array(	"name" => esc_html__("Enable", 'kona'), 
								"value"=> "1"),
						array(	"name" => esc_html__("Disable", 'kona'), 
								"value"=> "0")
						),
				   "default" => "1"
				  ),
	
				array( 	"label" => "Reviews",
						"id" => "_sr_shopsinglereviews",
						"hiding" => "1",	
						"type" => "hidinggroupstart"
					),
	
					array( "label" => esc_html__("Show Rating Stars below title", 'kona'),
						   "desc" => "",
						   "id" => "_sr_shopsinglerating",
						   "type" => "checkbox",
						   "option" => array( 
								array(	"name" => esc_html__("Show", 'kona'), 
										"value"=> "1"),
								array(	"name" => esc_html__("Hide", 'kona'), 
										"value"=> "0")
								),
						   "default" => "0"
						  ),
	
				array( 	"label" => "Reviews",
						"id" => "_sr_shopsinglereviews",
						"hiding" => "1",	
						"type" => "hidinggroupend"
					),
				  
			array( "label" => esc_html__("Related Products", 'kona'),
				   "desc" => esc_html__("Show the related products on the bottom of the page?", 'kona'),
				   "id" => "_sr_shopsinglerelated",
				   "type" => "checkbox-hiding",
				   "option" => array(
						array(	"name" => esc_html__("Yes", 'kona'), 
								"value"=> "1"),
						array(	"name" => esc_html__("No", 'kona'), 
								"value"=> "0")
						),
				   "default" => "1"
				  ),	
				  
				array( 	"id" => "_sr_shopsinglerelated",
						"hiding" => "1",	
						"type" => "hidinggroupstart"
					),
					
					array( "label" => esc_html__("Columns", 'kona').' ('.esc_html__("Related Products", 'kona').')',
						   "desc" => esc_html__("How many columns for the related posts? It's recommended to have the same amount as in the Grid options above.", 'kona').'',
						   "id" => "_sr_shopsinglerelatedcol",
						   "type" => "selectbox",
						   "option" => array(		 
								array(	"name" => "2",
										"value" => "2"),
								array(	"name" => "3",
										"value" => "3"),
								array(	"name" => "4",
										"value" => "4"),
								array(	"name" => "5",
										"value" => "5")
								),
						   "default" => "4"
						  ),
					
					array( "label" => esc_html__("Grid Width", 'kona'),
						   "desc" => esc_html__("Select your grid width.", 'kona'),
						   "id" => "_sr_shopsinglerelatedwidth",
						   "type" => "selectbox",
						   "option" => array( 
								array(	"name" => esc_html__("Normal (fullwidth)", 'kona'), 
										"value"=> "wrapper"),
								array(	"name" => esc_html__("Medium", 'kona'), 
										"value"=> "wrapper-medium"),
								array(	"name" => esc_html__("Small", 'kona'), 
										"value"=> "wrapper-small")
								),
						   "default" => "wrapper-medium"
						  ),
	
					array( "label" => esc_html__("Title position", 'kona'),
						   "desc" => esc_html__("Where to you want to display the title 'Related Products'", 'kona'),
						   "id" => "_sr_shopsinglerelatedposition",
						   "type" => "selectbox",
						   "option" => array( 
								array(	"name" => esc_html__("Above grid (classic)", 'kona'), 
										"value"=> "normal"),
								array(	"name" => esc_html__("Left Vertical", 'kona'), 
										"value"=> "left-vertical"),
								array(	"name" => esc_html__("Left Horizontal", 'kona'), 
										"value"=> "left-horizontal")
								),
						   "default" => "normal"
						  ),
					
				array( 	"id" => "_sr_shopsinglerelated",
						"type" => "hidinggroupend"
					),
				  
			array( "label" => esc_html__("You may also like... (Up-Sells)", 'kona'),
				   "desc" => esc_html__("Do you want to show the Up-Sells and Cross-Sells?", 'kona'),
				   "id" => "_sr_shopsingleupsells",
				   "type" => "checkbox",
				   "option" => array(
						array(	"name" => esc_html__("Yes", 'kona'), 
								"value"=> "1"),
						array(	"name" => esc_html__("No", 'kona'), 
								"value"=> "0")
						),
				   "default" => "0"
				  ),	 
				  
				  
			array( 	"label" => esc_html__("Show SKU meta", 'kona'),
				    "desc" => "",
					"id" => "_sr_shopsinglesku",
					"type" => "check"
					),
					
			array( 	"label" => esc_html__("Show Categories meta", 'kona'),
				    "desc" => "",
					"id" => "_sr_shopsinglecategories",
					"type" => "check"
					),
					
			array( 	"label" => esc_html__("Show Tags meta", 'kona'),
				    "desc" => "",
					"id" => "_sr_shopsingletags",
					"type" => "check"
					), 
				  				
			array( "label" => "",
				   "id" => "_sr_shop-single",
				   "type" => "groupend"
				  ),
	
			array( "label" => esc_html__("Product Appearance", 'kona'),
				   "id" => "_sr_shop-options",
				   "type" => "groupstart"
				  ),
	
				array( 	"label" => "",
						"desc" => esc_html__("Set up your default appearance options for the product pages. These options can be changed for your individual products.", 'kona'),
						"id" => "_sr_shopoptionsinfo",
						"type" => "info"
						),
	
				array( "label" => esc_html__("Product Layout", 'kona'),
					   "desc" => "",
					   "id" => "_sr_shopsingleoptionlayout",
					   "type" => "selectbox-custom",
					   'option' => array( 
								array(	"name" => esc_html__("Modern", 'kona'), 
										"value" => "modern",
										"image" => "single-shop-modern.png"),
								array(	"name" => esc_html__("Classic", 'kona'), 
										"value" => "classic",
										"image" => "single-shop-classic.png")
								),
						'default' => 'classic'
						),
	
				array( "label" => esc_html__("Background Color", 'kona'),
					   "desc" => esc_html__("Leave empty if you don't want any background color.", 'kona'),
					   "id" => "_sr_shopsingleoptionbg",
					   "type" => "color"
						),
	
				array( "label" => esc_html__("Start Animation", 'kona'),
					   "desc" => esc_html__("Do you want to activate a smooth animation on pageload?", 'kona'),
					   "id" => "_sr_shopsingleoptionanim",
					   "type"  => "checkbox" ,
						"option" => 	array(
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value" => "1"),
							array(	"name" => esc_html__("No", 'kona'), 
									"value" => "0")
							),
						"default" => "1"
						),
	
				array( "label" => esc_html__("Gallery type", 'kona'),
					   "desc" => "",
					   "id" => "_sr_shopsingleoptiongallery",
					   "type" => "selectbox",
					   'option' => array( 
								array(	"name" => esc_html__("Thumbnails", 'kona'), 
										"value" => "gallery-thumb"),
								array(	"name" => esc_html__("Arrows", 'kona'), 
										"value" => "gallery-arrows")
								),
						'default' => 'gallery-thumb'
						),
	
				array( "label" => esc_html__("Main Product Image to gallery", 'kona'),
					   "desc" => esc_html__("Do you want to add the main product image (featured image) to the gallery.  By default the main product image is not shown on the gallery.", 'kona'),
					   "id" => "_sr_shopsingleoptionproductimage",
					   "type"  => "checkbox" ,
						"option" => 	array(
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value" => "1"),
							array(	"name" => esc_html__("No", 'kona'), 
									"value" => "0")
							),
						"default" => "0"
						),
	
				array( "label" => esc_html__("Enable zoom", 'kona'),
					   "desc" => esc_html__("Do you want to activate the zoom feature for the images", 'kona').'.  '.esc_html__("The zoom feature will only work for classic layout!", 'kona'),
					   "id" => "_sr_shopsingleoptionzoom",
					   "type"  => "checkbox" ,
						"option" => 	array(
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value" => "1"),
							array(	"name" => esc_html__("No", 'kona'), 
									"value" => "0")
							),
						"default" => "0"
						),
	
			array( "label" => "",
				   "id" => "_sr_shop-options",
				   "type" => "groupend"
				  ),
				  
			array( "label" => esc_html__("Cart", 'kona'),
				   "id" => "_sr_shop-cart",
				   "type" => "groupstart"
				  ),
	
				array( "label" => esc_html__("Login / My Account", 'kona'),
					   "desc" => esc_html__("Show the 'Login / My Account' on the menu", 'kona'),
					   "id" => "_sr_shoplogin",
					   "type" => "checkbox-hiding",
					   "option" => array(
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "1"),
					   		array(	"name" => esc_html__("No", 'kona'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),
	
				array( 	"id" => "_sr_shoplogin",
						"hiding" => "1",	
						"type" => "hidinggroupstart"
					),
	
						array( "label" => esc_html__("Login / My Account Appearance", 'kona'),
							   "desc" => "",
							   "id" => "_sr_shoploginappearance",
							   "type" => "selectbox",
							   "option" => array(
									array(	"name" => esc_html__("Text", 'kona'), 
											"value"=> "text"),
									array(	"name" => esc_html__("Icon", 'kona'), 
											"value"=> "icon")
									),
							   "default" => "text"
							  ),
	
				array( 	"id" => "_sr_shoplogin",
						"hiding" => "1",	
						"type" => "hidinggroupend"
					),
				  				
				array( "label" => esc_html__("Minicart", 'kona'),
					   "desc" => esc_html__("Show the mini cart on the menu", 'kona'),
					   "id" => "_sr_shopminicart",
					   "type" => "checkbox-hiding",
					   "option" => array(
							array(	"name" => esc_html__("Yes", 'kona'), 
									"value"=> "1"),
					   		array(	"name" => esc_html__("No", 'kona'), 
									"value"=> "0")
							),
					   "default" => "1"
					  ),
					  
				array( 	"id" => "_sr_shopminicart",
						"hiding" => "1",	
						"type" => "hidinggroupstart"
					),
	
					array( 	"label" => esc_html__("Cart Icon", 'kona'),
							"desc" => "",
							"id" => "_sr_shopminicarticon",
						  	"type" => "selectbox-custom",
						   	'option' => array( 
									array(	'name' => "", 
											'value' => 'none',
											'image' => 'cart-1.png'),
									array(	'name' => "", 
											'value' => 'bag1',
											'image' => 'cart-2.png'),
									array(	'name' => "", 
											'value' => 'bag2',
											'image' => 'cart-3.png'),
									array(	'name' => "", 
											'value' => 'cart1',
											'image' => 'cart-4.png')
								),
						   "default" => "none"
							),
	
					array( 	"label" => esc_html__("Ajax Open Minicart", 'kona'),
							"desc" => esc_html__("This will automatically open the minicart after a product has been added", 'kona'),
							"id" => "_sr_shopminicartopen",
					   		"type" => "checkbox",
							"option" => array(
								array(	"name" => esc_html__("Yes", 'kona'), 
										"value"=> "1"),
								array(	"name" => esc_html__("No", 'kona'), 
										"value"=> "0")
								),
						   "default" => "1"
							),
	
					array( 	"label" => esc_html__("Link to main cart", 'kona'),
							"desc" => esc_html__('Do you want to add the link "View Cart"', 'kona'),
							"id" => "_sr_shopminicartlink",
					   		"type" => "checkbox",
							"option" => array(
								array(	"name" => esc_html__("Yes", 'kona'), 
										"value"=> "1"),
								array(	"name" => esc_html__("No", 'kona'), 
										"value"=> "0")
								),
						   "default" => "0"
							),
												
				array( 	"id" => "_sr_shopminicart",
						"type" => "hidinggroupend"
					),
				
			array( "label" => "",
				   "id" => "_sr_shop-cart",
				   "type" => "groupend"
				  ),
	
			array( "label" => esc_html__("Badges", 'kona'),
				   "id" => "_sr_shop-badges",
				   "type" => "groupstart"
				  ),
						
				array( 	"label" => esc_html__("Show Sale Badge", 'kona'),
					   "desc" => esc_html__('Enable the sale badge', 'kona'),
						"id" => "_sr_shopgridshowsale",
						"type" => "check"
						),
	
				array( 	"label" => esc_html__("Sale Badge Color", 'kona'),
					   "desc" => esc_html__('choose a custom color for the sale badge', 'kona'),
						"id" => "_sr_shopgridsalecolor",
						"type" => "color"
						),
	
				array( 	"label" => esc_html__("Sale Appearance", 'kona'),
					   	"desc" => "",
						"id" => "_sr_shopgridsaleappearance",
					   	"type" => "selectbox",
					  	"option" => array(		 
							array(	"name" => "Text (Sale)",
									"value" => "text"),
							array(	"name" => "Percentage (-20%)",
									"value" => "percentage")
							),
					   	"default" => "text"
						),
						
				array( 	"label" => esc_html__("Show New Badge", 'kona'),
					   "desc" => esc_html__('Enable the new badge', 'kona'),
						"id" => "_sr_shopgridshownew",
						"type" => "check"
						),
	
				array( 	"label" => esc_html__("New Badge Color", 'kona'),
					   "desc" => esc_html__('choose a custom color for the new badge', 'kona'),
						"id" => "_sr_shopgridnewcolor",
						"type" => "color"
						),
	
				array( 	"label" => esc_html__("New Badge Days", 'kona'),
					   	"desc" => esc_html__("The new badge should be displayed for products not older than xx days", 'kona'),
						"id" => "_sr_shopgridnewdays",
					   	"type" => "number",
					   	"default" => "30"
						),
	
				array( 	"label" => esc_html__('Show "Hot" Badge', 'kona'),
					   "desc" => esc_html__('Enable the "Hot" badge', 'kona'),
						"id" => "_sr_shopgridshowhot",
						"type" => "check"
						),
	
				array( 	"label" => esc_html__('"Hot" Badge Color', 'kona'),
					   "desc" => esc_html__('choose a custom color for the "Hot" badge', 'kona'),
						"id" => "_sr_shopgridhotcolor",
						"type" => "color"
						),
	
				array( 	"label" => esc_html__('"Hot" Products', 'kona'),
					   	"desc" => esc_html__('Select Poducts where the "Hot" badge should be displayed', 'kona')." ".esc_html__("Select multiple by holding/pressing 'cmd' for Mac or 'ctrl' for Windows", 'kona'),
						"id" => "_sr_shopgridhotprodcuts",
					   	"type" => "pagelistmultiple",
						"option" => "product"
						),
				
			array( "label" => "",
				   "id" => "_sr_shop-badges",
				   "type" => "groupend"
				  ),
		  
	array ( "type" => "sectionend",
		   	"id" => "sectionend")
		
);



/*-----------------------------------------------------------------------------------*/
/*	Add Page/Subpage & generate save/reset
/*-----------------------------------------------------------------------------------*/

function kona_theme_add_admin() {
 
global $kona_themename, $kona_options;
 
if ( isset($_GET['page']) && $_GET['page'] == basename(__FILE__) ) {
 
	if ( isset($_REQUEST['action'])  &&  $_REQUEST['action'] == 'save' ) {
		$optiontree = '';		
		foreach ($kona_options as $value) {
			if( isset( $_REQUEST[$value['id']] )) { 
				$val = $_REQUEST[$value['id']];
				if (is_array($_REQUEST[$value['id']])) { $val = implode(",",$_REQUEST[$value['id']]); }
				update_option( $value['id'], $val  );
				$o_val = str_replace(home_url(),'kona_SITE_URL',$val);;
				$optiontree .= $value['id'].';:;'.$o_val.'|:|'; 
			} 
			else { delete_option( $value['id'] ); }
			
			if( isset(  $value['option'] ) && $value['option'] && is_array($value['option']) ) {
				foreach ($value['option'] as $var) {
					if ( isset(  $var['id']) ) {
						if ( isset( $_REQUEST[ $var['id'] ] ) ) { 
							update_option( $var['id'], $_REQUEST[ $var['id'] ]  );
							$o_val = str_replace(home_url(),'kona_SITE_URL',$_REQUEST[$var['id']]);;
							$optiontree .= $var['id'].';:;'.$o_val.'|:|'; 
						} 
						else { delete_option( $var['id'] ); }
					}
				}
			}
		}
		$optiontree = substr($optiontree, 0, -3);
		update_option( '_sr_optiontree', $optiontree );
		wp_redirect( admin_url( 'themes.php?page=option-panel.php&saved=true' ) );
		die;
	} 
	else if( isset($_REQUEST['action'])  &&  $_REQUEST['action'] == 'reset' ) {
		foreach ($kona_options as $value) {
			delete_option( $value['id'] ); 
			
			foreach ($value['option'] as $var) {
				delete_option( $var['id'] ); 
			}
		}
		wp_redirect( admin_url( 'themes.php?page=option-panel.php&reset=true' ) );
		die;
	}
	else if( isset($_REQUEST['importdemo'])  &&  $_REQUEST['importdemo'] !== '' ) {
		$url = 'themes.php?page=option-panel.php&importdemo='.$_REQUEST['importdemo'].'&options='.$_REQUEST['options'];
		$file2 = ""; if (isset($_REQUEST['file2'])) { $file2 = $_REQUEST['file2']; $url .= '&file2='.$file2; }
		$file3 = ""; if (isset($_REQUEST['file3'])) { $file3 = $_REQUEST['file3']; $url .= '&file3='.$file3; }
		kona_theme_importoptions($_REQUEST['importdemo'],$_REQUEST['options'],$file2,$file3);
		
		// new since kona because of product attributes and term creation
		if( isset($_REQUEST['done'])  &&  $_REQUEST['done'] == 'last' ) {
		wp_redirect( admin_url( 'themes.php?page=option-panel.php&import=true' ) );
		} else if ( isset($_REQUEST['done'])  &&  $_REQUEST['done'] == '1' ) {
		wp_redirect( admin_url( $url.'&done=last' ) );
		} else {
		wp_redirect( admin_url( $url.'&done=1' ) );
		}
		die;
	}
}
 
add_theme_page($kona_themename, 'Theme Options', 'administrator', basename(__FILE__), 'kona_theme_interface');
}

add_action('admin_menu', 'kona_theme_add_admin');



/*-----------------------------------------------------------------------------------*/
/*	Building interface
/*-----------------------------------------------------------------------------------*/
function kona_theme_interface() {
 
global $kona_themename, $kona_options, $kona_sections, $kona_googlefonts;
$i=0;
 
echo '	<div class="sr_wrap">
		
		<textarea id="sr-option-tree" style="width: 100%; height: 100px; display:none;">'.get_option('_sr_optiontree').'</textarea>
		
		<form method="post">
		
		<div class="sr_header clear">
			<h1>'.$kona_themename.'</h1> <div class="icon32" id="icon-options-general"></div>
			<input name="save" type="submit" value="Save all changes" class="submit-option"/>
		</div>
		';
    
	if ( isset($_REQUEST['saved']) && $_REQUEST['saved'] != "") { echo '<div class="message_ok fade"><p><strong>'.$kona_themename.' '.esc_html__("settings saved", 'kona').'.</strong></p></div>'; }
	if ( isset($_REQUEST['reset']) && $_REQUEST['reset'] != "") { echo '<div class="message_ok fade"><p><strong>'.$kona_themename.' '.esc_html__("settings reset", 'kona').'.</strong></p></div>'; }
	
	if ( isset($_REQUEST['import']) && $_REQUEST['import'] !== "") {
		echo '<div class="message_ok fade message_import"><p><strong>'.esc_html__("The Demo has been imported", 'kona').'.</strong></p></div>';
	}
	
	
	echo '<div id="sr_body" class="sr-style clear">';
	

    
	//  Add the sections
	echo '<ul id="section-list">';
	foreach ($kona_sections as $section) {
	
		echo '<li class="'.$section['class'].'"><a href="'.$section['href'].'">'.esc_html__($section['name'],'kona').'</a></li>';
	
	} 
	echo '</ul>';
	
	
	echo '<div class="section-tab">';
	
	$kona_fontsize = array('9px','10px','11px','12px','13px','14px','15px','16px','17px','18px','19px','20px','21px','22px','23px','24px','25px','26px','27px','28px','29px','30px','31px','32px','33px','34px','35px','36px','37px','38px','39px','40px','41px','42px','43px','44px','45px','46px','47px','48px','49px','50px','51px','52px','53px','54px','55px','56px','57px','58px','59px','60px','61px','62px','63px','64px','65px','66px','67px','68px','69px','70px','71px','72px','73px','74px','75px','76px','77px','78px','79px','80px','81px','82px','83px','84px','85px','86px','87px','88px','89px','90px','91px','92px','93px','94px','95px','96px','97px','98px','99px','100px','101px','102px','103px','104px','105px','106px','107px','108px','109px','110px','111px','112px','113px','114px','115px','116px','117px','118px','119px','120px');
	
	$kona_fontspacing = array('-0.2','-0.15','-0.12','-0.1','-0.08','-0.04','-0.02','0','0.02','0.04','0.06','0.08','0.1','0.12','0.15','0.2','0.25','0.3','0.35','0.4',);
	
	$customfonts = stripslashes(get_option('_sr_fontmanager'));
	
	//  Add the options
	foreach ($kona_options as $option) {
		
		$value = stripslashes(get_option( $option['id'])  );
		if ($value == '' && (isset($option['default']) && $option['default'] !== '')) { $value = $option['default']; }
		
		switch ( $option['type'] ) {
		
		//sectionstart
		case "sectionstart":
			echo '	<div id="'.esc_attr($option['id']).'" class="section-content">';
			if ($option['desc'] && $option['desc'] !== '') { echo '<div class="section-desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'; }
			
			if (($option['id'] == 'portfolio' || $option['id'] == 'import') && !function_exists( 'kona_custom_meta_boxes' )) { 
				echo '<div class="sr-import-message">ATTENTION<br>Please install and activate the required Kona Core plugin.</div>';
				echo '<div class="hide-content">'; 
			} else {
				echo '<div>'; 
			}
		break;
		
		
		//sectionend
		case "sectionend":
			echo '</div>';
			echo '</div>';
		break;
		
		
		//groupstart
		case "groupstart":
			// condition firstly added for wpml check
			$groupClass = '';
			if (isset($option['condition']) && $option['condition'] == 'wpml' && !function_exists('icl_object_id')) { $groupClass = ' groupdisable'; }
			echo '<div id="'.esc_attr($option['id']).'" class="optiongroup '.esc_attr($groupClass).'">';
			echo '<div class="optiongroup-title"><h4>'.esc_html__($option['label'],'kona').'</h4></div>';
			echo '<div class="optiongroup-content">';
		break;
		
		
		//groupend
		case "groupend":
			echo '	</div>'; // END optiongroup-content
			echo '	</div>'; // END optiongroup
		break;
		
		
		// hidinggroupstart
		case "hidinggroupstart":
			$relatedArray = explode(' ',$option['hiding']);
			$hideClass = '';
			foreach ($relatedArray as $r) { $hideClass .= $option['id'].'_'.$r.' '; }
			echo '<div class="hidinggroup hide'.esc_attr($option['id']).' '.esc_attr($hideClass).'">';
		break;
		
		
		// hidinggroupend
		case "hidinggroupend":
			echo '	</div>'; // END hidinggroup
		break;
		
		
		//info
		case "info":
			echo '<div class="option option-info clear">';
				echo '	<i>'.esc_html__($option['desc'],'kona').'</i>';		
			echo '</div>';
		break;
		
		
		//text
		case "text":
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					echo '	<div class="option_value">
								<input type="text" name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'" value="'.htmlspecialchars($value, ENT_QUOTES).'" size="30" />
							</div>';	
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;		
			echo '</div>';
		break;
		
		
		//number
		case "number":
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					echo '	<div class="option_value">
								<input type="number" name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'" value="'.htmlspecialchars($value, ENT_QUOTES).'" size="30" />
							</div>';	
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;		
			echo '</div>';
		break;
		
		
		//color
		case "color":
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					echo '	<div class="option_value">
								<input type="text" name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'" value="'.$value.'" class="sr-color-field" />
							</div>';	
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>';
		break;
			
		
		//textarea
		case "textarea":
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					$rows = 14;		
					if (isset($option['rows'])) { $rows = $option['rows']; }
					echo '	<div class="option_value">
								<textarea name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'" cols="54" rows="'.$rows.'">'.$value.'</textarea>
							</div>';	
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>';
		break;
			
		//checkbox
		case 'check':  
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
					if ($value) { $checkClass = "checked"; } else { $checkClass = ""; }
					echo '	<div class="option_name">
								<input type="checkbox" value="1" name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'" '.esc_attr($checkClass).'/> 
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>';
		break;
		
		//checkbox
		case 'checkbox':  
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					
					// default options
					$options = array(array(	"name" => esc_html__("On", 'kona'), 
											"value" => "1"),
									 array(	"name" => esc_html__("Off", 'kona'), 
											"value"=> "0"));
					if (isset($option['option']) && $option['option']) { $options = $option['option']; }		
					$i = 0;
					$pseudo = '';
					$select = '';
					foreach ($options as $var) {
						if ($value == $var['value'] || ($value == '' && $i == 0)) { $selected = 'selected="selected"'; $active ='active'; } else { $selected = ''; $active ='';  } 
						$pseudo .= '<a href="#" data-value="'.$var['value'].'" class="'.esc_attr($active).'"> '.esc_html__($var['name'],'kona').'</a>';
						$select .= '<option value="'.esc_attr($var['value']).'" '.$selected.'> '.esc_html__($var['name'],'kona').'</option>';
					$i++;	
					}
							
					echo '	<div class="option_value">
								<div class="checkbox-pseudo clearfix">'.$pseudo.'</div>
								<select name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'" style="display: none;">'.$select.'</select>
							</div>';		
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>';
		break;
		
		//checkbox
		case 'checkbox-hiding':  
			echo '<div class="option clear hiding'.esc_attr($option['id']).' hiding">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					
					// default options
					$options = array(array(	"name" => esc_html__("On", 'kona'), 
											"value" => "1"),
									 array(	"name" => esc_html__("Off", 'kona'), 
											"value"=> "0"));
					if (isset($option['option']) && $option['option']) { $options = $option['option']; }		
					$i = 0;
					$pseudo = '';
					$select = '';
					foreach ($options as $var) {
						if ($value == $var['value'] || ($value == '' && $i == 0)) { $selected = 'selected="selected"'; $active ='active'; } else { $selected = ''; $active ='';  } 
						$pseudo .= '<a href="#" data-value="'.$var['value'].'" class="'.esc_attr($active).'"> '.esc_html__($var['name'],'kona').'</a>';
						$select .= '<option value="'.esc_attr($var['value']).'" '.$selected.'> '.esc_html__($var['name'],'kona').'</option>';
					$i++;	
					}
							
					echo '	<div class="option_value">
								<div class="checkbox-pseudo clearfix">'.$pseudo.'</div>
								<select name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'" style="display: none;">'.$select.'</select>
							</div>';		
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>';
		break;
		
		
		//radio
		case "radio":
			echo '<div class="option clear" id="sr_radio">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					echo '	<div class="option_value">';
					
					$i = 0;
					foreach ($option['option'] as $var) {
						if ($value == $var['value']) { $checked = 'checked="checked"'; } else { if ($value == '' && $i == 0) { $checked = 'checked="checked"'; } else { $checked = '';  } }
						echo '<div><input type="radio" name="'.esc_attr($option['id']).'" id="'.$var['value'].'" value="'.$var['value'].'" '.$checked.' /> '.esc_html__($var['name'],'kona').'</div>';
					$i++;	
					}
	
					echo '	</div>';	
						
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>';
		break;
		
		
		// selectbox  
		case 'selectbox':  
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					echo '	<div class="option_value">';
					
					echo '<select name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'">';
					$i = 0;
					foreach ($option['option'] as $var) {
						if ($value == $var['value']) { $selected = 'selected="selected"'; } else { if ($value == '' && $i == 0) { $selected = 'selected="selected"'; } else { $selected = '';  } }
						echo '<option value="'.esc_attr($var['value']).'" '.$selected.'> '.esc_html__($var['name'],'kona').'</option>';
					$i++;	
					}			  
					echo '</select>'; 
				echo '	</div>';	
				
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>';
		break;
		
		
		// selectbox-hiding  
		case 'selectbox-hiding':  
			echo '<div class="option clear hiding'.esc_attr($option['id']).' hiding">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					echo '	<div class="option_value">';
					
					echo '<select name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'">';
					$i = 0;
					foreach ($option['option'] as $var) {
						if ($value == $var['value']) { $selected = 'selected="selected"'; } else { if ($value == '' && $i == 0) { $selected = 'selected="selected"'; } else { $selected = '';  } }
						echo '<option value="'.esc_attr($var['value']).'" '.$selected.'> '.esc_html__($var['name'],'kona').'</option>';
					$i++;	
					}			  
					echo '</select>'; 
				echo '	</div>';		
			
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>';
		break;
				
		
		// selectbox-custom  
		case 'selectbox-custom':  
			echo '<div class="option option_full clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					echo '	<div class="option_value option_custom_select">';

					$selectOptions = "";
					$imageOptions = "";
					foreach ($option['option'] as $var) {
						if ($var['name'] !== "linebreak") {
							if ($value == $var['value']) { $selected = 'selected="selected"'; $class = "selected"; } else { if ($value == '' && $i == 0) { $selected = 'selected="selected"'; $class = "selected"; } else { $selected = ''; $class = "";  } }
							$selectOptions .= '<option value="'.esc_attr($var['value']).'" '.$selected.'> '.esc_html__($var['name'],'kona').'</option>';

							if (isset($var['image'])) {
								$imageOptions .= '<a href="'.$var['value'].'" class="select-custom '.$class.'"><img src="'.esc_url(get_template_directory_uri().'/theme-admin/assets/img/').$var['image'].'">
								<span>'.esc_html__($var['name'],'kona').'</span></a>';
							}
						} else {
							$imageOptions .= '<br>';
						}
					}

					echo '<select name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'" style="display:none;">'.$selectOptions.'</select>';
					echo ''.$imageOptions;		// ''. workaround for theme check

				echo '	</div>';		
			
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>';
		break;
		
				
		// typo-body  
		case 'typo-body': 
			echo '<div class="option option_full clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					echo '	<div class="option_value">';
					
					echo '<div class="value_half"><i>Family</i><br>';
					$valuefont = stripslashes(get_option( $option['id'].'-font')  );
					if ($valuefont == '' && (isset($option['default'][0]) && $option['default'][0] !== '')) { $valuefont = $option['default'][0]; }
					echo '<select name="'.esc_attr($option['id']).'-font" id="'.esc_attr($option['id']).'-font" class="font-change-weight">';
					
					$kona_customfonts = '';
					if ($customfonts) { 
						$json = json_decode($customfonts);
						echo '<optgroup label="Font Manager">';
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $selected = 'selected="selected"'; } else { $selected = '';  } 
							echo '<option value="'.$f->name.'" data-weights="'.$f->styles.'" '.$selected.'> '.$f->name.'</option>	';
						}
						echo '</optgroup>';
					}
					
					echo '<optgroup label="Google Fonts">';
					$i = 0;
					foreach ($kona_googlefonts as $font) {
						if ($valuefont == $font[0]) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$font[0].'" data-weights="'.$font[1].'" '.$selected.'> '.$font[0].'</option>';
					$i++;	
					}
					echo '</optgroup>';
					echo '</select></div>';
					
					echo '<div class="value_fourth value_weight"><i>Normal Weight</i><br>';
					$valueweight = stripslashes(get_option( $option['id'].'-weight')  );
					if ($valueweight == '' && (isset($option['default'][1]) && $option['default'][1] !== '')) { $valueweight = $option['default'][1]; }
					echo '<select name="'.esc_attr($option['id']).'-weight" id="'.esc_attr($option['id']).'-weight" class="weight">';
					$i = 0;
					foreach ($kona_googlefonts as $font) {
						if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
							foreach ($weights as $w) {
								if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
								echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
							}
						} 
					$i++;	
					}
					if ($customfonts) { 
						$json = json_decode($customfonts);
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $weights = explode( ';', $f->styles );
								foreach ($weights as $w) {
									if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
									echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
								}
							}
						}
					}
					echo '</select></div>';
					
					echo '<div class="value_fourth value_weight"><i>Bold Weight</i><br>';
					$valueweight = stripslashes(get_option( $option['id'].'-boldweight')  );
					if ($valueweight == '' && (isset($option['default'][2]) && $option['default'][2] !== '')) { $valueweight = $option['default'][2]; }
					echo '<select name="'.esc_attr($option['id']).'-boldweight" id="'.esc_attr($option['id']).'-boldweight" class="weight">';
					$i = 0;
					foreach ($kona_googlefonts as $font) {
						if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
							foreach ($weights as $w) {
								if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
								echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
							}
						} 
					$i++;	
					}
					if ($customfonts) { 
						$json = json_decode($customfonts);
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $weights = explode( ';', $f->styles );
								foreach ($weights as $w) {
									if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
									echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
								}
							}
						}
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Size</i><br>';
					$valuesize = stripslashes(get_option( $option['id'].'-size')  );
					if ($valuesize == '' && (isset($option['default'][3]) && $option['default'][3] !== '')) { $valuesize = $option['default'][3]; }
					echo '<select name="'.esc_attr($option['id']).'-size" id="'.esc_attr($option['id']).'-size">';
					$i = 0;
					foreach ($kona_fontsize as $height) {
						if ($valuesize == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Line Height</i><br>';
					$valueheight = stripslashes(get_option( $option['id'].'-height')  );
					if ($valueheight == '' && (isset($option['default'][4]) && $option['default'][4] !== '')) { $valueheight = $option['default'][4]; }
					echo '<select name="'.esc_attr($option['id']).'-height" id="'.esc_attr($option['id']).'-height">';
					$i = 0;
					foreach ($kona_fontsize as $height) {
						if ($valueheight == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Letter Spacing</i><br>';
					$valuespacing = stripslashes(get_option( $option['id'].'-spacing')  );
					if ($valuespacing == '' && (isset($option['default'][5]) && $option['default'][5] !== '')) { $valuespacing = $option['default'][5]; }
					echo '<select name="'.esc_attr($option['id']).'-spacing" id="'.esc_attr($option['id']).'-spacing">';
					$i = 0;
					foreach ($kona_fontspacing as $spacing) {
						if ($valuespacing == $spacing) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$spacing.'" '.$selected.' /> '.$spacing.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="clear"></div><div class="value-separator">Responsive Sizes</div>';
					
					echo '<div class="value_third"><i>Size for 1024 Screen</i><br>';
					$value1024 = stripslashes(get_option( $option['id'].'-1024')  );
					if ($value1024 == '' && (isset($option['default'][6]) && $option['default'][6] !== '')) { $value1024 = $option['default'][6]; }
					echo '<select name="'.esc_attr($option['id']).'-1024" id="'.esc_attr($option['id']).'-1024">';
					$i = 0;
					foreach ($kona_fontsize as $height) {
						if ($value1024 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
						$i++;
					}
					echo '</select>';
					
					echo '<br><i>Line Height</i><br>';
					$height1024 = stripslashes(get_option( $option['id'].'-1024-height')  );
					if ($height1024 == '' && (isset($option['default'][7]) && $option['default'][7] !== '')) { $height1024 = $option['default'][7]; }
					echo '<select name="'.esc_attr($option['id']).'-1024-height" id="'.esc_attr($option['id']).'-1024-height">';
					$i = 0;
					foreach ($kona_fontsize as $height) {
						if ($height1024 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
						$i++;
					}
					echo '</select></div>';
					
					echo '<div class="value_third"><i>Size for 768 Screen</i><br>';
					$value768 = stripslashes(get_option( $option['id'].'-768')  );
					if ($value768 == '' && (isset($option['default'][8]) && $option['default'][8] !== '')) { $value768 = $option['default'][8]; }
					echo '<select name="'.esc_attr($option['id']).'-768" id="'.esc_attr($option['id']).'-768">';
					$i = 0;
					foreach ($kona_fontsize as $height) {
						if ($value768 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
						$i++;
					}
					echo '</select>';
					
					echo '<br><i>Line Height</i><br>';
					$height768 = stripslashes(get_option( $option['id'].'-768-height')  );
					if ($height768 == '' && (isset($option['default'][9]) && $option['default'][9] !== '')) { $height768 = $option['default'][9]; }
					echo '<select name="'.esc_attr($option['id']).'-768-height" id="'.esc_attr($option['id']).'-768-height">';
					$i = 0;
					foreach ($kona_fontsize as $height) {
						if ($height768 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
						$i++;
					}
					echo '</select></div>';
					
					echo '<div class="value_third"><i>Size for 480 Screen</i><br>';
					$value480 = stripslashes(get_option( $option['id'].'-480')  );
					if ($value480 == '' && (isset($option['default'][10]) && $option['default'][10] !== '')) { $value480 = $option['default'][10]; }
					echo '<select name="'.esc_attr($option['id']).'-480" id="'.esc_attr($option['id']).'-480">';
					$i = 0;
					foreach ($kona_fontsize as $height) {
						if ($value480 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
						$i++;
					}
					echo '</select>';
					
					echo '<br><i>Line Height</i><br>';
					$height480 = stripslashes(get_option( $option['id'].'-480-height')  );
					if ($height480 == '' && (isset($option['default'][11]) && $option['default'][11] !== '')) { $height480 = $option['default'][11]; }
					echo '<select name="'.esc_attr($option['id']).'-480-height" id="'.esc_attr($option['id']).'-480-height">';
					$i = 0;
					foreach ($kona_fontsize as $height) {
						if ($height480 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
						$i++;
					}
					echo '</select></div>';
									
				echo '	</div>';	
				
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>';
		break;
		
		
		// typo-header  
		case 'typo-header': 
			echo '<div class="option option_full clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					echo '	<div class="option_value">';
					
					echo '<div class="value_half"><i>Family</i><br>';
					$valuefont = stripslashes(get_option( $option['id'].'-font')  );
					if ($valuefont == '' && (isset($option['default'][0]) && $option['default'][0] !== '')) { $valuefont = $option['default'][0]; }
					echo '<select name="'.esc_attr($option['id']).'-font" id="'.esc_attr($option['id']).'-font" class="font-change-weight">';
					
					$kona_customfonts = '';
					if ($customfonts) { 
						$json = json_decode($customfonts);
						echo '<optgroup label="Font Manager">';
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $selected = 'selected="selected"'; } else { $selected = '';  } 
							echo '<option value="'.$f->name.'" data-weights="'.$f->styles.'" '.$selected.'> '.$f->name.'</option>	';
						}
						echo '</optgroup>';
					}
					
					echo '<optgroup label="Google Fonts">';
					$i = 0;
					foreach ($kona_googlefonts as $font) {
						if ($valuefont == $font[0]) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$font[0].'" data-weights="'.$font[1].'" '.$selected.'> '.$font[0].'</option>';
					$i++;	
					}
					echo '</optgroup>';			  
					echo '</select></div>';
					
					echo '<div class="value_fourth value_weight"><i>Normal Weight</i><br>';
					$valueweight = stripslashes(get_option( $option['id'].'-weight')  );
					if ($valueweight == '' && (isset($option['default'][1]) && $option['default'][1] !== '')) { $valueweight = $option['default'][1]; }
					echo '<select name="'.esc_attr($option['id']).'-weight" id="'.esc_attr($option['id']).'-weight" class="weight">';
					$i = 0;
					foreach ($kona_googlefonts as $font) {
						if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
							foreach ($weights as $w) {
								if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
								echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
							}
						} 
					$i++;	
					}
					if ($customfonts) { 
						$json = json_decode($customfonts);
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $weights = explode( ';', $f->styles );
								foreach ($weights as $w) {
									if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
									echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
								}
							}
						}
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth value_weight"><i>Bold Weight</i><br>';
					$valueweight = stripslashes(get_option( $option['id'].'-boldweight')  );
					if ($valueweight == '' && (isset($option['default'][2]) && $option['default'][2] !== '')) { $valueweight = $option['default'][2]; }
					echo '<select name="'.esc_attr($option['id']).'-boldweight" id="'.esc_attr($option['id']).'-boldweight" class="weight">';
					$i = 0;
					foreach ($kona_googlefonts as $font) {
						if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
							foreach ($weights as $w) {
								if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
								echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
							}
						} 
					$i++;	
					}
					if ($customfonts) { 
						$json = json_decode($customfonts);
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $weights = explode( ';', $f->styles );
								foreach ($weights as $w) {
									if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
									echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
								}
							}
						}
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Size</i><br>';
					$valuesize = stripslashes(get_option( $option['id'].'-size')  );
					if ($valuesize == '' && (isset($option['default'][3]) && $option['default'][3] !== '')) { $valuesize = $option['default'][3]; }
					echo '<select name="'.esc_attr($option['id']).'-size" id="'.esc_attr($option['id']).'-size">';
					$i = 0;
					foreach ($kona_fontsize as $height) {
						if ($valuesize == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Line Height</i><br>';
					$valueheight = stripslashes(get_option( $option['id'].'-height')  );
					if ($valueheight == '' && (isset($option['default'][4]) && $option['default'][4] !== '')) { $valueheight = $option['default'][4]; }
					echo '<select name="'.esc_attr($option['id']).'-height" id="'.esc_attr($option['id']).'-height">';
					$i = 0;
					foreach ($kona_fontsize as $height) {
						if ($valueheight == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Letter Spacing</i><br>';
					$valuespacing = stripslashes(get_option( $option['id'].'-spacing')  );
					if ($valuespacing == '' && (isset($option['default'][5]) && $option['default'][5] !== '')) { $valuespacing = $option['default'][5]; }
					echo '<select name="'.esc_attr($option['id']).'-spacing" id="'.esc_attr($option['id']).'-spacing">';
					$i = 0;
					foreach ($kona_fontspacing as $spacing) {
						if ($valuespacing == $spacing) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$spacing.'" '.$selected.' /> '.$spacing.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Text Transform</i><br>';
					$valuetransform = stripslashes(get_option( $option['id'].'-transform')  );
					if ($valuetransform == '' && (isset($option['default'][6]) && $option['default'][6] !== '')) { $valuetransform = $option['default'][6]; }
					echo '<select name="'.esc_attr($option['id']).'-transform" id="'.esc_attr($option['id']).'-transform">';
						if ($valuetransform == 'none') { $selected1 = 'selected="selected"'; } else { $selected1 = '';  } 
						echo '<option value="none" '.$selected1.' />'.esc_html__("None", 'kona').'</option>';
						if ($valuetransform == 'uppercase') { $selected2 = 'selected="selected"'; } else { $selected2 = '';  } 
						echo '<option value="uppercase" '.$selected2.' />'.esc_html__("Uppercase", 'kona').'</option>';
					echo '</select></div>';
					
					
					
					echo '<div class="clear"></div><div class="value-separator">Responsive Sizes</div>';
										
					echo '<div class="value_third"><i>1024 Screen</i><br>';
					$value1024 = stripslashes(get_option( $option['id'].'-1024')  );
					if ($value1024 == '' && (isset($option['default'][7]) && $option['default'][7] !== '')) { $value1024 = $option['default'][7]; }
					echo '<select name="'.esc_attr($option['id']).'-1024" id="'.esc_attr($option['id']).'-1024">';
					$i = 0;
					foreach ($kona_fontsize as $height) {
						if ($value1024 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
						$i++;
					}
					echo '</select>';
					
					echo '<br><i>Line Height</i><br>';
					$height1024 = stripslashes(get_option( $option['id'].'-1024-height')  );
					if ($height1024 == '' && (isset($option['default'][8]) && $option['default'][8] !== '')) { $height1024 = $option['default'][8]; }
					echo '<select name="'.esc_attr($option['id']).'-1024-height" id="'.esc_attr($option['id']).'-1024-height">';
					$i = 0;
					foreach ($kona_fontsize as $height) {
						if ($height1024 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
						$i++;
					}
					echo '</select></div>';
					
					echo '<div class="value_third"><i>768 Screen</i><br>';
					$value768 = stripslashes(get_option( $option['id'].'-768')  );
					if ($value768 == '' && (isset($option['default'][9]) && $option['default'][9] !== '')) { $value768 = $option['default'][9]; }
					echo '<select name="'.esc_attr($option['id']).'-768" id="'.esc_attr($option['id']).'-768">';
					$i = 0;
					foreach ($kona_fontsize as $height) {
						if ($value768 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
						$i++;
					}
					echo '</select>';
					
					echo '<br><i>Line Height</i><br>';
					$height768 = stripslashes(get_option( $option['id'].'-768-height')  );
					if ($height768 == '' && (isset($option['default'][10]) && $option['default'][10] !== '')) { $height768 = $option['default'][10]; }
					echo '<select name="'.esc_attr($option['id']).'-768-height" id="'.esc_attr($option['id']).'-768-height">';
					$i = 0;
					foreach ($kona_fontsize as $height) {
						if ($height768 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
						$i++;
					}
					echo '</select></div>';
					
					echo '<div class="value_third"><i>480 Screen</i><br>';
					$value480 = stripslashes(get_option( $option['id'].'-480')  );
					if ($value480 == '' && (isset($option['default'][11]) && $option['default'][11] !== '')) { $value480 = $option['default'][11]; }
					echo '<select name="'.esc_attr($option['id']).'-480" id="'.esc_attr($option['id']).'-480">';
					$i = 0;
					foreach ($kona_fontsize as $height) {
						if ($value480 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
						$i++;
					}
					echo '</select>';
					
					echo '<br><i>Line Height</i><br>';
					$height480 = stripslashes(get_option( $option['id'].'-480-height')  );
					if ($height480 == '' && (isset($option['default'][12]) && $option['default'][12] !== '')) { $height480 = $option['default'][12]; }
					echo '<select name="'.esc_attr($option['id']).'-480-height" id="'.esc_attr($option['id']).'-480-height">';
					$i = 0;
					foreach ($kona_fontsize as $height) {
						if ($height480 == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
						$i++;
					}
					echo '</select></div>';
									
				echo '	</div>';		
				
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>';
		break;
		
		
		
		
		// typo-sub  
		case 'typo-sub': 
			echo '<div class="option option_full clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					echo '	<div class="option_value">';
					
					echo '<div class="value_half"><i>Family</i><br>';
					$valuefont = stripslashes(get_option( $option['id'].'-font')  );
					if ($valuefont == '' && (isset($option['default'][0]) && $option['default'][0] !== '')) { $valuefont = $option['default'][0]; }
					echo '<select name="'.esc_attr($option['id']).'-font" id="'.esc_attr($option['id']).'-font" class="font-change-weight">';
					
					$kona_customfonts = '';
					if ($customfonts) { 
						$json = json_decode($customfonts);
						echo '<optgroup label="Font Manager">';
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $selected = 'selected="selected"'; } else { $selected = '';  } 
							echo '<option value="'.$f->name.'" data-weights="'.$f->styles.'" '.$selected.'> '.$f->name.'</option>	';
						}
						echo '</optgroup>';
					}
					
					echo '<optgroup label="Google Fonts">';
					$i = 0;
					foreach ($kona_googlefonts as $font) {
						if ($valuefont == $font[0]) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$font[0].'" data-weights="'.$font[1].'" '.$selected.'> '.$font[0].'</option>';
					$i++;	
					}
					echo '</optgroup>';			  
					echo '</select></div>';
					
					echo '<div class="value_fourth value_weight"><i>Normal Weight</i><br>';
					$valueweight = stripslashes(get_option( $option['id'].'-weight')  );
					if ($valueweight == '' && (isset($option['default'][1]) && $option['default'][1] !== '')) { $valueweight = $option['default'][1]; }
					echo '<select name="'.esc_attr($option['id']).'-weight" id="'.esc_attr($option['id']).'-weight" class="weight">';
					$i = 0;
					foreach ($kona_googlefonts as $font) {
						if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
							foreach ($weights as $w) {
								if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
								echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
							}
						} 
					$i++;	
					}
					if ($customfonts) { 
						$json = json_decode($customfonts);
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $weights = explode( ';', $f->styles );
								foreach ($weights as $w) {
									if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
									echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
								}
							}
						}
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth value_weight"><i>Bold Weight</i><br>';
					$valueweight = stripslashes(get_option( $option['id'].'-boldweight')  );
					if ($valueweight == '' && (isset($option['default'][2]) && $option['default'][2] !== '')) { $valueweight = $option['default'][2]; }
					echo '<select name="'.esc_attr($option['id']).'-boldweight" id="'.esc_attr($option['id']).'-boldweight" class="weight">';
					$i = 0;
					foreach ($kona_googlefonts as $font) {
						if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
							foreach ($weights as $w) {
								if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
								echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
							}
						} 
					$i++;	
					}
					if ($customfonts) { 
						$json = json_decode($customfonts);
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $weights = explode( ';', $f->styles );
								foreach ($weights as $w) {
									if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
									echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
								}
							}
						}
					}			  
					echo '</select></div>';
									
					echo '<div class="value_fourth"><i>Letter Spacing</i><br>';
					$valuespacing = stripslashes(get_option( $option['id'].'-spacing')  );
					if ($valuespacing == '' && (isset($option['default'][3]) && $option['default'][3] !== '')) { $valuespacing = $option['default'][3]; }
					echo '<select name="'.esc_attr($option['id']).'-spacing" id="'.esc_attr($option['id']).'-spacing">';
					$i = 0;
					foreach ($kona_fontspacing as $spacing) {
						if ($valuespacing == $spacing) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$spacing.'" '.$selected.' /> '.$spacing.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Text Transform</i><br>';
					$valuetransform = stripslashes(get_option( $option['id'].'-transform')  );
					if ($valuetransform == '' && (isset($option['default'][4]) && $option['default'][4] !== '')) { $valuetransform = $option['default'][4]; }
					echo '<select name="'.esc_attr($option['id']).'-transform" id="'.esc_attr($option['id']).'-transform">';
						if ($valuetransform == 'none') { $selected1 = 'selected="selected"'; } else { $selected1 = '';  } 
						echo '<option value="none" '.$selected1.' />'.esc_html__("None", 'kona').'</option>';
						if ($valuetransform == 'uppercase') { $selected2 = 'selected="selected"'; } else { $selected2 = '';  } 
						echo '<option value="uppercase" '.$selected2.' />'.esc_html__("Uppercase", 'kona').'</option>';
					echo '</select></div>';
				echo '	</div>';	
				
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>';	
		break;
		
		
		
		// typo-simple  
		case 'typo-simple': 
			echo '<div class="option option_full clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					echo '	<div class="option_value">';
					
					echo '<div class="value_half"><i>Family</i><br>';
					$valuefont = stripslashes(get_option( $option['id'].'-font')  );
					if ($valuefont == '' && (isset($option['default'][0]) && $option['default'][0] !== '')) { $valuefont = $option['default'][0]; }
					echo '<select name="'.esc_attr($option['id']).'-font" id="'.esc_attr($option['id']).'-font" class="font-change-weight">';
					
					$kona_customfonts = '';
					if ($customfonts) { 
						$json = json_decode($customfonts);
						echo '<optgroup label="Font Manager">';
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $selected = 'selected="selected"'; } else { $selected = '';  } 
							echo '<option value="'.$f->name.'" data-weights="'.$f->styles.'" '.$selected.'> '.$f->name.'</option>	';
						}
						echo '</optgroup>';
					}
					
					echo '<optgroup label="Google Fonts">';
					$i = 0;
					foreach ($kona_googlefonts as $font) {
						if ($valuefont == $font[0]) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$font[0].'" data-weights="'.$font[1].'" '.$selected.'> '.$font[0].'</option>';
					$i++;	
					}
					echo '</optgroup>';			  
					echo '</select></div>';
					
					echo '<div class="value_fourth value_weight"><i>Weight</i><br>';
					$valueweight = stripslashes(get_option( $option['id'].'-weight')  );
					if ($valueweight == '' && (isset($option['default'][1]) && $option['default'][1] !== '')) { $valueweight = $option['default'][1]; }
					echo '<select name="'.esc_attr($option['id']).'-weight" id="'.esc_attr($option['id']).'-weight" class="weight">';
					$i = 0;
					foreach ($kona_googlefonts as $font) {
						if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
							foreach ($weights as $w) {
								if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
								echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
							}
						} 
					$i++;	
					}
					if ($customfonts) { 
						$json = json_decode($customfonts);
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $weights = explode( ';', $f->styles );
								foreach ($weights as $w) {
									if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
									echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
								}
							}
						}
					}			  
					echo '</select></div>';
									
					echo '<div class="value_fourth"><i>Letter Spacing</i><br>';
					$valuespacing = stripslashes(get_option( $option['id'].'-spacing')  );
					if ($valuespacing == '' && (isset($option['default'][2]) && $option['default'][2] !== '')) { $valuespacing = $option['default'][2]; }
					echo '<select name="'.esc_attr($option['id']).'-spacing" id="'.esc_attr($option['id']).'-spacing">';
					$i = 0;
					foreach ($kona_fontspacing as $spacing) {
						if ($valuespacing == $spacing) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$spacing.'" '.$selected.' /> '.$spacing.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Text Transform</i><br>';
					$valuetransform = stripslashes(get_option( $option['id'].'-transform')  );
					if ($valuetransform == '' && (isset($option['default'][3]) && $option['default'][3] !== '')) { $valuetransform = $option['default'][3]; }
					echo '<select name="'.esc_attr($option['id']).'-transform" id="'.esc_attr($option['id']).'-transform">';
						if ($valuetransform == 'none') { $selected1 = 'selected="selected"'; } else { $selected1 = '';  } 
						echo '<option value="none" '.$selected1.' />'.esc_html__("None", 'kona').'</option>';
						if ($valuetransform == 'uppercase') { $selected2 = 'selected="selected"'; } else { $selected2 = '';  } 
						echo '<option value="uppercase" '.$selected2.' />'.esc_html__("Uppercase", 'kona').'</option>';
					echo '</select></div>';
				echo '	</div>';	
				
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>';	
		break;
		
		
		
		// typo-nav  
		case 'typo-nav': 
			echo '<div class="option option_full clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					echo '	<div class="option_value">';
					
					echo '<div class="value_half"><i>Family</i><br>';
					$valuefont = stripslashes(get_option( $option['id'].'-font')  );
					if ($valuefont == '' && (isset($option['default'][0]) && $option['default'][0] !== '')) { $valuefont = $option['default'][0]; }
					echo '<select name="'.esc_attr($option['id']).'-font" id="'.esc_attr($option['id']).'-font" class="font-change-weight">';
					
					$kona_customfonts = '';
					if ($customfonts) { 
						$json = json_decode($customfonts);
						echo '<optgroup label="Font Manager">';
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $selected = 'selected="selected"'; } else { $selected = '';  } 
							echo '<option value="'.$f->name.'" data-weights="'.$f->styles.'" '.$selected.'> '.$f->name.'</option>	';
						}
						echo '</optgroup>';
					}
					
					echo '<optgroup label="Google Fonts">';
					$i = 0;
					foreach ($kona_googlefonts as $font) {
						if ($valuefont == $font[0]) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$font[0].'" data-weights="'.$font[1].'" '.$selected.'> '.$font[0].'</option>';
					$i++;	
					}
					echo '</optgroup>';			  
					echo '</select></div>';
					
					echo '<div class="value_fourth value_weight"><i>Weight</i><br>';
					$valueweight = stripslashes(get_option( $option['id'].'-weight')  );
					if ($valueweight == '' && (isset($option['default'][1]) && $option['default'][1] !== '')) { $valueweight = $option['default'][1]; }
					echo '<select name="'.esc_attr($option['id']).'-weight" id="'.esc_attr($option['id']).'-weight" class="weight">';
					$i = 0;
					foreach ($kona_googlefonts as $font) {
						if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
							foreach ($weights as $w) {
								if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
								echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
							}
						} 
					$i++;	
					}
					if ($customfonts) { 
						$json = json_decode($customfonts);
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $weights = explode( ';', $f->styles );
								foreach ($weights as $w) {
									if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
									echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
								}
							}
						}
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Size</i><br>';
					$valuesize = stripslashes(get_option( $option['id'].'-size')  );
					if ($valuesize == '' && (isset($option['default'][2]) && $option['default'][2] !== '')) { $valuesize = $option['default'][2]; }
					echo '<select name="'.esc_attr($option['id']).'-size" id="'.esc_attr($option['id']).'-size">';
					$i = 0;
					foreach ($kona_fontsize as $height) {
						if ($valuesize == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Letter Spacing</i><br>';
					$valuespacing = stripslashes(get_option( $option['id'].'-spacing')  );
					if ($valuespacing == '' && (isset($option['default'][3]) && $option['default'][3] !== '')) { $valuespacing = $option['default'][3]; }
					echo '<select name="'.esc_attr($option['id']).'-spacing" id="'.esc_attr($option['id']).'-spacing">';
					$i = 0;
					foreach ($kona_fontspacing as $spacing) {
						if ($valuespacing == $spacing) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$spacing.'" '.$selected.' /> '.$spacing.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Text Transform</i><br>';
					$valuetransform = stripslashes(get_option( $option['id'].'-transform')  );
					if ($valuetransform == '' && (isset($option['default'][4]) && $option['default'][4] !== '')) { $valuetransform = $option['default'][4]; }
					echo '<select name="'.esc_attr($option['id']).'-transform" id="'.esc_attr($option['id']).'-transform">';
						if ($valuetransform == 'none') { $selected1 = 'selected="selected"'; } else { $selected1 = '';  } 
						echo '<option value="none" '.$selected1.' />'.esc_html__("None", 'kona').'</option>';
						if ($valuetransform == 'uppercase') { $selected2 = 'selected="selected"'; } else { $selected2 = '';  } 
						echo '<option value="uppercase" '.$selected2.' />'.esc_html__("Uppercase", 'kona').'</option>';
					echo '</select></div>';
					
									
				echo '	</div>';	
				
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>';		
		break;
		
		
		
		// type-button 	  
		case 'typo-button': 
			echo '<div class="option option_full clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					echo '	<div class="option_value">';
					
					echo '<div class="value_half"><i>Family</i><br>';
					$valuefont = stripslashes(get_option( $option['id'].'-font')  );
					if ($valuefont == '' && (isset($option['default'][0]) && $option['default'][0] !== '')) { $valuefont = $option['default'][0]; }
					echo '<select name="'.esc_attr($option['id']).'-font" id="'.esc_attr($option['id']).'-font" class="font-change-weight">';
					
					$kona_customfonts = '';
					if ($customfonts) { 
						$json = json_decode($customfonts);
						echo '<optgroup label="Font Manager">';
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $selected = 'selected="selected"'; } else { $selected = '';  } 
							echo '<option value="'.$f->name.'" data-weights="'.$f->styles.'" '.$selected.'> '.$f->name.'</option>	';
						}
						echo '</optgroup>';
					}
					
					echo '<optgroup label="Google Fonts">';
					$i = 0;
					foreach ($kona_googlefonts as $font) {
						if ($valuefont == $font[0]) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$font[0].'" data-weights="'.$font[1].'" '.$selected.'> '.$font[0].'</option>';
					$i++;	
					}
					echo '</optgroup>';			  
					echo '</select></div>';
					
					echo '<div class="value_fourth value_weight"><i>Normal Weight</i><br>';
					$valueweight = stripslashes(get_option( $option['id'].'-weight')  );
					if ($valueweight == '' && (isset($option['default'][1]) && $option['default'][1] !== '')) { $valueweight = $option['default'][1]; }
					echo '<select name="'.esc_attr($option['id']).'-weight" id="'.esc_attr($option['id']).'-weight" class="weight">';
					$i = 0;
					foreach ($kona_googlefonts as $font) {
						if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
							foreach ($weights as $w) {
								if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
								echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
							}
						} 
					$i++;	
					}
					if ($customfonts) { 
						$json = json_decode($customfonts);
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $weights = explode( ';', $f->styles );
								foreach ($weights as $w) {
									if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
									echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
								}
							}
						}
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth value_weight"><i>Bold Weight</i><br>';
					$valueweight = stripslashes(get_option( $option['id'].'-boldweight')  );
					if ($valueweight == '' && (isset($option['default'][2]) && $option['default'][2] !== '')) { $valueweight = $option['default'][2]; }
					echo '<select name="'.esc_attr($option['id']).'-boldweight" id="'.esc_attr($option['id']).'-boldweight" class="weight">';
					$i = 0;
					foreach ($kona_googlefonts as $font) {
						if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
							foreach ($weights as $w) {
								if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
								echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
							}
						} 
					$i++;	
					}
					if ($customfonts) { 
						$json = json_decode($customfonts);
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $weights = explode( ';', $f->styles );
								foreach ($weights as $w) {
									if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
									echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
								}
							}
						}
					}			  
					echo '</select></div>';
													
					echo '<div class="value_fourth"><i>Letter Spacing</i><br>';
					$valuespacing = stripslashes(get_option( $option['id'].'-spacing')  );
					if ($valuespacing == '' && (isset($option['default'][3]) && $option['default'][3] !== '')) { $valuespacing = $option['default'][3]; }
					echo '<select name="'.esc_attr($option['id']).'-spacing" id="'.esc_attr($option['id']).'-spacing">';
					$i = 0;
					foreach ($kona_fontspacing as $spacing) {
						if ($valuespacing == $spacing) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$spacing.'" '.$selected.' /> '.$spacing.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Text Transform</i><br>';
					$valuetransform = stripslashes(get_option( $option['id'].'-transform')  );
					if ($valuetransform == '' && (isset($option['default'][4]) && $option['default'][4] !== '')) { $valuetransform = $option['default'][4]; }
					echo '<select name="'.esc_attr($option['id']).'-transform" id="'.esc_attr($option['id']).'-transform">';
						if ($valuetransform == 'none') { $selected1 = 'selected="selected"'; } else { $selected1 = '';  } 
						echo '<option value="none" '.$selected1.' />'.esc_html__("None", 'kona').'</option>';
						if ($valuetransform == 'uppercase') { $selected2 = 'selected="selected"'; } else { $selected2 = '';  } 
						echo '<option value="uppercase" '.$selected2.' />'.esc_html__("Uppercase", 'kona').'</option>';
					echo '</select></div>';
				echo '	</div>';	
					
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>';	
		break;
		
		
		
		// typo-misc  
		case 'typo-misc': 
			echo '<div class="option option_full clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					echo '	<div class="option_value">';
					
					echo '<div class="value_half"><i>Family</i><br>';
					$valuefont = stripslashes(get_option( $option['id'].'-font')  );
					if ($valuefont == '' && (isset($option['default'][0]) && $option['default'][0] !== '')) { $valuefont = $option['default'][0]; }
					echo '<select name="'.esc_attr($option['id']).'-font" id="'.esc_attr($option['id']).'-font" class="font-change-weight">';
					
					$kona_customfonts = '';
					if ($customfonts) { 
						$json = json_decode($customfonts);
						echo '<optgroup label="Font Manager">';
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $selected = 'selected="selected"'; } else { $selected = '';  } 
							echo '<option value="'.$f->name.'" data-weights="'.$f->styles.'" '.$selected.'> '.$f->name.'</option>	';
						}
						echo '</optgroup>';
					}
					
					echo '<optgroup label="Google Fonts">';
					$i = 0;
					foreach ($kona_googlefonts as $font) {
						if ($valuefont == $font[0]) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$font[0].'" data-weights="'.$font[1].'" '.$selected.'> '.$font[0].'</option>';
					$i++;	
					}
					echo '</optgroup>';			  
					echo '</select></div>';
					
					echo '<div class="value_fourth value_weight"><i>Weight</i><br>';
					$valueweight = stripslashes(get_option( $option['id'].'-weight')  );
					if ($valueweight == '' && (isset($option['default'][1]) && $option['default'][1] !== '')) { $valueweight = $option['default'][1]; }
					echo '<select name="'.esc_attr($option['id']).'-weight" id="'.esc_attr($option['id']).'-weight" class="weight">';
					$i = 0;
					foreach ($kona_googlefonts as $font) {
						if ($valuefont == $font[0]) { $weights = explode( ';', $font[1] ); 
							foreach ($weights as $w) {
								if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
								echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
							}
						} 
					$i++;	
					}
					if ($customfonts) { 
						$json = json_decode($customfonts);
						foreach($json->fonts as $f) {
							if ($valuefont == $f->name) { $weights = explode( ';', $f->styles );
								foreach ($weights as $w) {
									if ($valueweight == $w) { $selected = 'selected="selected"'; } else { $selected = '';  } 
									echo '<option value="'.$w.'" '.$selected.'> '.$w.'</option>';							
								}
							}
						}
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Size</i><br>';
					$valuesize = stripslashes(get_option( $option['id'].'-size')  );
					if ($valuesize == '' && (isset($option['default'][2]) && $option['default'][2] !== '')) { $valuesize = $option['default'][2]; }
					echo '<select name="'.esc_attr($option['id']).'-size" id="'.esc_attr($option['id']).'-size">';
					$i = 0;
					$headingSizes = array('h1','h2','h3','h4','h5','h6');
					foreach ($headingSizes as $height) {
						if ($valuesize == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Letter Spacing</i><br>';
					$valuespacing = stripslashes(get_option( $option['id'].'-spacing')  );
					if ($valuespacing == '' && (isset($option['default'][3]) && $option['default'][3] !== '')) { $valuespacing = $option['default'][3]; }
					echo '<select name="'.esc_attr($option['id']).'-spacing" id="'.esc_attr($option['id']).'-spacing">';
					$i = 0;
					foreach ($kona_fontspacing as $spacing) {
						if ($valuespacing == $spacing) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$spacing.'" '.$selected.' /> '.$spacing.'</option>';
					$i++;	
					}			  
					echo '</select></div>';
					
					echo '<div class="value_fourth"><i>Text Transform</i><br>';
					$valuetransform = stripslashes(get_option( $option['id'].'-transform')  );
					if ($valuetransform == '' && (isset($option['default'][4]) && $option['default'][4] !== '')) { $valuetransform = $option['default'][4]; }
					echo '<select name="'.esc_attr($option['id']).'-transform" id="'.esc_attr($option['id']).'-transform">';
						if ($valuetransform == 'none') { $selected1 = 'selected="selected"'; } else { $selected1 = '';  } 
						echo '<option value="none" '.$selected1.' />'.esc_html__("None", 'kona').'</option>';
						if ($valuetransform == 'uppercase') { $selected2 = 'selected="selected"'; } else { $selected2 = '';  } 
						echo '<option value="uppercase" '.$selected2.' />'.esc_html__("Uppercase", 'kona').'</option>';
					echo '</select></div>';
					
									
				echo '	</div>';	
				
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>';		
		break;
				
				
		// typo-size  
		case 'typo-size': 
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					echo '	<div class="option_value">';
										
					echo '<select name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'">';
					foreach ($kona_fontsize as $height) {
						if ($value == $height) { $selected = 'selected="selected"'; } else { $selected = '';  } 
						echo '<option value="'.$height.'" '.$selected.' /> '.$height.'</option>';
					}			  
					echo '	</select>';	
					echo '	</div>';	
				
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>';		
		break;
				
		
		//radiocustom
		case "radiocustom":
			echo '<div class="option clear" id="sr_radiocustom">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					echo '	<div class="option_value">';
					
					$i = 0;
					foreach ($option['option'] as $var) {
						if ($value == $var['value']) { $checked = 'checked="checked"'; $active = "active"; } else { if ($value == '' && $i == 0) { $checked = 'checked="checked"'; $active = "active"; } else { $checked = ''; $active = ""; } }
						echo '<input type="radio" name="'.esc_attr($option['id']).'" id="'.$var['value'].'" value="'.$var['value'].'" '.$checked.' />
						<a class="customradio '.$var['value'].' '.esc_attr($active).'" href="'.$var['value'].'"><span>'.esc_html__($var['name'],'kona').'</span></a>';
					$i++;	
					}
					echo '	</div>';	
				
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>';
		break;
		
		
		// image  
		case 'image':  
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					$removeClass = 'hide'; if ($value) { $removeClass = ''; }
					echo '	<div class="option_value">
								<input class="upload_image" type="hidden" name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'" value="'.$value.'" size="30" />
								<input class="sr_upload_image_button sr-button" type="button" value="Upload Image" />
								<input class="sr_remove_image_button sr-button button-remove '.esc_attr($removeClass).'" type="button" value="Remove Image" /><br />
								<span class="preview_image">';	
								if ($value) { echo '<img class="'.esc_attr($option['id']).'"  src="'.esc_url($value).'" alt="preview image" />'; }
					echo '		</span>
							</div>';
						
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>';		
		break;
		
		
		// imagegroup  
		case 'imagegroup':  
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					echo '	<div class="option_value">
								<input class="add_image_button sr-button" type="button" value="Add Slide" /><br />
								<textarea name="'.esc_attr($option['id']).'" class="groupvalue" style="display:none;">'.$value.'</textarea><br />
								<ul id="imagegroup_preview" class="preview">';
							if ($value) {
								$value = substr($value, 3);
								$value = explode('~~~', $value);
								foreach($value as $row) {
									$object = explode('|~|', $row);
									$id = $object[0];
									$caption = $object[1];
									$image = wp_get_attachment_image_src($id, 'full');
									echo '<li><a id="image-remove"  class="image-remove button" href="#" rel="'.$id.'">-</a><span class="image"><img src="'.esc_url($image[0]).'"></span><textarea id="caption">'.$caption.'</textarea><textarea id="hidden-value" style="display:none;">~~~'.$id.'|~|'.$caption.'</textarea><a id="image-moveup"  class="button" href="#" rel="'.$id.'">&uarr;</a><a id="image-movedown"  class="button" href="#" rel="'.$id.'">&darr;</a></li>';
								}  
							} 		
					echo '			</ul>
							</div>';	
						
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>';		
		break;
		
		
		// pagelist  
		case 'pagelist':  
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					echo '	<div class="option_value">
								<select name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'">';
								if ($option['default'] && $option['default'] !== "") {
									echo '<option value="0">'.$option['default'].'</option>';
								}
								  $pages = get_pages(); 
								  foreach ( $pages as $page ) {
									if ($page->ID == $value) { $active = 'selected="selected"'; }  else { $active = ''; } 
									echo '<option value="' . esc_attr($page->ID) . '" '.esc_attr($active).'>';
									echo esc_html($page->post_title);
									echo '</option>';
								  }
					echo '		</select>
							</div>';	
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>'; 
		break;
				
				
		// pagelistmultiple  
		case 'pagelistmultiple':  
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					echo '	<div class="option_value">
								<select name="'.esc_attr($option['id']).'[]" id="'.esc_attr($option['id']).'" size="5" multiple>';
								if ($option['option'] == 'portfolio') { $pages = get_posts(array('post_type' => 'portfolio', 'posts_per_page'=> -1)); } 
								if ($option['option'] == 'product') { $pages = get_posts(array('post_type' => 'product', 'posts_per_page'=> -1, 'orderby'=> "title", 'order'=> "ASC")); } 
								if ($option['option'] == 'post') { $pages = get_posts(array('post_type' => 'post', 'posts_per_page'=> -1)); } 
								if ($option['option'] == 'page') { $pages = get_posts(array('post_type' => 'page', 'posts_per_page'=> -1)); } 
								  $value = explode(",",$value);
								  foreach ( $pages as $page ) {
									$active = '';
									if (in_array($page->ID, $value)) { $active = 'selected="selected"'; }
									echo '<option value="' . esc_attr($page->ID) . '" '.esc_attr($active).'>';
									echo esc_html($page->post_title);
									echo '</option>';
								  }
					echo '		</select>
							</div>';	
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>'; 
		break;
				
		
		// portfolio  
		case 'portfolio':  
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					echo '	<div class="option_value">
								<select name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'">';
								if ($option['default'] && $option['default'] !== "") {
									echo '<option value="0">'.$option['default'].'</option>';
								}
								  $pages = get_posts(array('post_type' => 'portfolio', 'posts_per_page'=> -1));
								  foreach ( $pages as $page ) {
									if ($page->ID == $value) { $active = 'selected="selected"'; }  else { $active = ''; } 
									echo '<option value="' . esc_attr($page->ID) . '" '.esc_attr($active).'>';
									echo esc_html($page->post_title);
									echo '</option>';
								  }
					echo '		</select>
							</div>';	
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>'; 
		break;
				
		
		// postcategories
		case 'postcategories':
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
							
					echo '	<div class="option_value">
								<select name="'.esc_attr($option['id']).'[]" id="'.esc_attr($option['id']).'" size="5" multiple>';
								$cats = get_categories();
								$value = explode(",",$value);
								  foreach ( $cats as $c ) {
									$active = '';
									if (in_array($c->term_id, $value)) { $active = 'selected="selected"'; }
									echo '<option value="' . esc_attr($c->term_id) . '" '.esc_attr($active).'>';
									echo esc_html($c->name);
									echo '</option>';
								  }
					echo '		</select>
							</div>';	
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>'; 
		break;
				
				
		// prodattributes
		case 'prodattributes':
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					echo '	<div class="option_value">
								<select name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'">';
								  $prodAtt = wc_get_attribute_taxonomies();
								  foreach ( $prodAtt as $p ) {
									 echo $p->attribute_name;
									$active = '';
									if ($p->attribute_name == $value) { $active = 'selected="selected"'; }
									echo '<option value="' . esc_attr($p->attribute_name) . '" '.esc_attr($active).'>';
									echo esc_html($p->attribute_label);
									echo '</option>';
								  }
					echo '		</select>
							</div>';	
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>'; 
		break;
		
		
		// organize  
		case 'organize':  
			echo '<div class="option clear">';
				echo '<div class="option-inner">';
				
					echo '	<div class="option_name">
								<label for="'.esc_attr($option['id']).'">'.esc_html__($option['label'],'kona').'</label>
							</div>';
					echo '	<div class="option_value">';
						echo '<div class="organize-option">';
						
						if ($value) {
							echo '<ul id="sortable" class="organize-list">';
							$tempvalue = substr($value, 0, -3);
							$tempvalue = explode('|||', $tempvalue);
							foreach ($tempvalue as $var) {
								$varvalue = explode('|', $var);
								if ($varvalue[2] == 'active') { $active = 'active'; } else { $active = ''; }
								echo '	<li class="ui-state-default '.esc_attr($active).'">'.esc_html($varvalue[0]).'<a class="status" href="" title="'.esc_attr($varvalue[0]).'"></a><input type="checkbox" name="'.esc_attr($varvalue[1]).'"/></li>';
							}
							echo '</ul>';
							echo '<textarea name="'.esc_attr($option['id']).'" class="organize-value" style="display:none;">'.$value.'</textarea><br />';
						} else {
							echo '<ul id="sortable" class="organize-list">';
							$valueoutput = '';
							$i = 0;
							foreach ($option['option'] as $var) {
								echo '	<li class="ui-state-default">'.esc_html__($var['name'],'kona').'<a class="status" href="" title="'.esc_attr__($var['name'],'kona').'"></a><input type="checkbox" name="'.esc_attr($var['value']).'"/></li>';
								$valueoutput .= $var['name'].'|'.$var['value'].'|nonactive|||';
							$i++;	
							}
							echo '</ul>';
							echo '<textarea name="'.esc_attr($option['id']).'" class="organize-value" style="display:none;">'.$valueoutput.'</textarea><br />';
						}
						echo '</div>';
					echo ' 	</div>';	
					
				echo '</div>';
				echo '<div class="option_desc"><i>'.esc_html__($option['desc'],'kona').'</i></div>'	;			
			echo '</div>';
		break;
		
		
		// import
		case 'import':  
			echo '<div class="sr-import-option">';
									
			// CHECK IF DEMO HAS BEEN DONE ALREADY
			if (get_option('_sr_import_state') == 'true') {
				echo '<div class="sr-import-message">ATTENTION<br>You already imported a demo.  Import another one will create double content. If you want to install another one, I recommend to reset the wordpress installtion first using the plugin "Wordpress reset".  This delete/resets all your content,settings, etc.</div>'; }
						
			$demos = array(
				array( "name" => "Main Demo",
					   "xml" => "kona-demo-main",
					   "id" => "demo-main",
					   "shop" => "kona-demo-main-2:2",				/* 2nd file for execution time problem */
					   "blog" => "default:2",						/* default ist to import no other file --- 1 is YES on default import */
					   "portfolio" => "kona-demo-portfolio:1"		/* default ist to import no other file --- 1 is YES on default import */
					   )
				);
			
			echo '<div class="sr-import-demos">';
			foreach ($demos as $d) {
				
				$href = 'themes.php?page=option-panel.php&importdemo=kona-'.$d['id'].'&options='.$d['xml'];
				$c = '<span class="sr-button">import</span>';
				
				$addOptions = '';
				if (isset($d['shop'])) { $addOptions .= "shop:".$d['shop']."||"; }
				if (isset($d['blog'])) { $addOptions .= "blog:".$d['blog']."||"; }
				if (isset($d['portfolio'])) { $addOptions .= "portfolio:".$d['portfolio']."||"; }
				
				echo '<div class="sr-demo">';
				echo '<a href="#" data-url="'.esc_url($href).'" class="'.$d['id'].' sr-open-demo-options" data-options="'.substr($addOptions, 0, -2).'">';
				echo '<img src="'.esc_url(get_template_directory_uri() . '/theme-admin/option-panel/images/').$d['id'].'.jpg"><span class="demo-install">'.$c;
				echo '</a>';
				echo '<span class="demo-name">'.$d['name'].'</span></div>';
			}
			echo '</div>';
				
			echo '<div class="sr-php-req">';
				$phpreq = array(
					array("max_execution_time","300"),
					array("upload_max_filesize","64M"),
					array("memory_limit","96M")
				);
				
			
				echo '<h3 class="req-title">PHP configuration requirements
						<span>Make sure to fulfil at least these PHP configuration parameters before importing a demo. You can either increase these limits on your own, or contact your web host.</span>
				</h3>';
				echo '	<div class="req-row title">
							<div class="req-col">Directive</div>
							<div class="req-col">Suggested Value</div>
							<div class="req-col">Current Value</div>
						</div>';
				
				foreach ($phpreq as $p) {
					$reqClass = '';
					if (floatval($p[1]) <= floatval(ini_get($p[0]))) { $reqClass = 'confirm'; }
					echo '	<div class="req-row '.esc_attr($reqClass).'">
								<div class="req-col">'.$p[0].'</div>
								<div class="req-col">'.$p[1].'</div>
								<div class="req-col current">'.ini_get($p[0]).' </div>
							</div>';
				}
			echo '</div>';
						
			echo '
			<div class="sr-import-loader">
				<a href="" class="sr-close-demo-options"></a>
				<div class="sr-import-inner">
					<div class="import-title">Importing your demo<br><small>Choose additional options to import</small></div>
						<div class="import-options">
							<div class="option-shop">
								<div class="option_label">Shop</div>';
								if (class_exists('Woocommerce')) {
								echo '<div class="option_value" data-val="">
									<div class="checkbox-pseudo clearfix">
										<a href="#" data-value="yes" class=""> Yes</a><a href="#" data-value="no" class="active"> No</a>
									</div>
									<select name="demo_option_shop" id="demo_option_shop" style="display: none;"><option value="yes" > Yes</option><option value="no" selected="selected"> No</option></select>
								</div>';
								} else {
								echo '<div class="option_value message">Please install and activate the WooCommerce plugin first</div>';
								}
			echo 			'</div>
							<div class="option-blog" data-val="">
								<div class="option_label">Blog</div>
								<div class="option_value">
									<div class="checkbox-pseudo clearfix">
										<a href="#" data-value="yes" class=""> Yes</a><a href="#" data-value="no" class="active"> No</a>
									</div>
									<select name="demo_option_woo" id="demo_option_woo" style="display: none;"><option value="yes" > Yes</option><option value="no" selected="selected"> No</option></select>
								</div>
							</div>
							<div class="option-portfolio" data-val="">
								<div class="option_label">Portfolio</div>
								<div class="option_value">
									<div class="checkbox-pseudo clearfix">
										<a href="#" data-value="yes" class=""> Yes</a><a href="#" data-value="no" class="active"> No</a>
									</div>
									<select name="demo_option_woo" id="demo_option_woo" style="display: none;"><option value="yes" > Yes</option><option value="no" selected="selected"> No</option></select>
								</div>
							</div>
						</div>
						<a href="#" class="final-import sr-button">Import Now</a>
						<div class="import-icon"></div>
						<div class="import-info">The import process can take several minutes.<br><strong>Don\'t refresh the page until the import is done</strong></div>
				</div>
			</div>';
						
			echo '</div>';	
			
		break;
		
		
		
		//fontmanager
		case "fontmanager":
			$typearray = array('Typekit','Custom Font','Google Font');
		
			echo '<div class="option fontmanager clear">';
				echo '<div class="customfontcontainer">';
				
				echo '	<div class="font hidden edit clear">		
							<div class="one-third">
								<label>Family Name:</label>
								<input type="text" name="font" class="input-font" placeholder="Family Name"><br>
								<span class="desc"><em>Example: <strong>Open Sans</strong></em></span>
							</div> 
							<div class="one-third">
								<label>Weights & Styles:</label>
								<input type="text" name="styles" class="input-styles" placeholder="Weights & Styles (seperated by semicolon)"><br>
								<span class="desc"><em>Example: <strong>400;400italic;700;700italic</strong></em></span>
							</div>
							<div class="one-third last-col">
								<a href="#" class="save-font sr-button">Save</a>
								<a href="#" class="edit-font sr-button">Edit</a>
								<a href="#" class="delete-font sr-button">Delete</a>
							</div>
							<div style="clear:both"></div>
							<div class="radios">
								<label>Type:</label>';
								foreach ($typearray as $t) {
									echo '<span><input type="radio" name="type" value="'.$t.'"><span>'.$t.'</span></span>';	
								}
							echo'</div>
						</div>';
				
				$json = json_decode($value);		
				if($json) {
				$i = 1;	
				foreach($json->fonts as $f) {
				echo '	<div class="font clear" data-id="'.$i.'">		
							<div class="one-third">
								<label>Family Name:</label>
								<input type="text" name="font" class="input-font" placeholder="Family Name" value="'.$f->name.'" readonly><br>
								<span class="desc"><em>Example: <strong>Open Sans</strong></em></span>
							</div> 
							<div class="one-third">
								<label>Weights & Styles:</label>
								<input type="text" name="styles" class="input-styles" value="'.$f->styles.'" placeholder="Weights & Styles (seperated by semicolon)" readonly><br>
								<span class="desc"><em>Example: <strong>400;400italic;700;700italic</strong></em></span>
							</div>
							<div class="one-third last-col">
								<a href="#" class="save-font sr-button">Save</a>
								<a href="#" class="edit-font sr-button">Edit</a>
								<a href="#" class="delete-font sr-button">Delete</a>
							</div>
							<div style="clear:both"></div>
							<div class="radios">
								<label>Type:</label>';
								foreach ($typearray as $t) {
									$checked = ''; if ($f->type == $t) { $checked = 'checked="checked"'; }
									echo '<span><input type="radio" name="type-'.$i.'" value="'.$t.'" '.$checked.'><span>'.$t.'</span></span>';	
								}
							echo'</div>
						</div>';
					$i++;
				}
				}		
						
				echo '	</div>';	
							
			echo '<a href="#" class="add-font sr-button style-2">Add Font</a>';
			echo '<textarea name="'.esc_attr($option['id']).'" id="'.esc_attr($option['id']).'" rows="5" style="display:none;">'.$value.'</textarea>';
			echo '</div>';
		break;
		
		
		} // END switch ( $option['type'] ) {
	} // END foreach ($kona_options_new as $option) {
	
	
	echo '</div>'; // END section-content
	echo '</div>'; // END section



echo '	
		<div class="sr_footer clear">
		<input name="save" type="submit" value="Save all changes" class="submit-option"/> 
		<input type="hidden" name="action" value="save" />
		</div>
		</form>
		<form method="post">
		<!--<input name="reset" type="submit" value="Reset" class="reset-option" />
		<input type="hidden" name="action" value="reset" />-->
		</form>
		</div> ';
 

} // END function kona_theme_interface() {




/*-----------------------------------------------------------------------------------*/
/*	Register and Enqueue admin javascript
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'kona_admin_js' ) ) {
    function kona_admin_js($hook) {
		global $kona_version;
		
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-sortable');
		
		wp_enqueue_script('media-upload');
		wp_enqueue_style('thickbox');
		
		wp_enqueue_style( 'farbtastic' );
		wp_enqueue_script( 'farbtastic' );
		
		wp_register_script('kona-admin-script', get_template_directory_uri().'/theme-admin/assets/sr-admin.js', array( 'wp-color-picker' ), $kona_version, true);
		wp_enqueue_script('kona-admin-script');
		
		wp_register_style('kona-admin-style', get_template_directory_uri() . '/theme-admin/assets/sr-admin.css','',$kona_version);
		wp_enqueue_style('kona-admin-style');
			
		wp_enqueue_media();
    }
    
    add_action('admin_enqueue_scripts','kona_admin_js',10,1);
}


/*-----------------------------------------------------------------------------------*/
/* Output Custom CSS from theme options
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'kona_head_css' ) ) {
    function kona_head_css() {
        $output = '';
        $output = get_option('_sr_color');
    }

    add_action('wp_head', 'kona_head_css');
}
?>