<?php

/*-----------------------------------------------------------------------------------

	General Frontend theme features

-----------------------------------------------------------------------------------*/



/*-----------------------------------------------------------------------------------*/
/*	Ajax Loader (Isotope)
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'sr_load_more_callback' ) ) {
	function sr_load_more_callback() {
		global $wpdb;
		
		// add the ajax option so the function can see if it's loaded per ajax or not
		$options =  $_POST['o']."ajax=1|";
		
		$options =  str_replace('|', '" ', $options);
		$options =  str_replace('=', '="', $options);
		$options =  str_replace('+', ' ', $options);
		
				
		// Check which shortcode to do
		if (strpos($_POST['o'], 'showprice') !== false) {
			$shortcode = "sr-shopitems";
		} else if (strpos($_POST['o'], 'readmore') !== false) {
			$shortcode = "sr-blogposts";
		} else {
			$shortcode = "sr-portfolioitems";
		}
		echo do_shortcode('['.$shortcode.' '.$options.']'); 
		
		die(); // this is required to return a proper result
	}
}
add_action('wp_ajax_nopriv_sr_load_more', 'sr_load_more_callback'); 
add_action('wp_ajax_sr_load_more', 'sr_load_more_callback');





/*-----------------------------------------------------------------------------------*/
/*	ADD Classes to BODY (new tf standards)
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'kona_addBodyClasses' ) ) {
	function kona_addBodyClasses( $classes ) {
	
		$theId = kona_getId();	
		$classes[] = esc_attr('kona-theme');
		if (get_option('_sr_appearance')) { $classes[] = esc_attr(get_option('_sr_appearance').'-style'); }
		if (get_option('_sr_loadericon')) { $classes[] = esc_attr('loader-'.get_option('_sr_loadericon').''); }
		$classes[] = esc_attr('thepage-'.$theId);

		return $classes;
	}
}
add_filter( 'body_class', 'kona_addBodyClasses');



/*-----------------------------------------------------------------------------------*/
/*	ADD Classes to posts (new tf standards)
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'kona_addPostClasses' ) ) {
	function kona_addPostClasses( $classes ) {
		
		$theId = get_the_Id();
		
		if (get_post_type($theId) == "post") {
			if (!is_single($theId)) { 
				$classes[] = "blog-item"; 
				$classes[] = "isotope-item"; 
				if (get_post_format($theId)) { $classes[] = "type-".get_post_format($theId); }
			}
		} else if (get_post_type($theId) == "product") {
			if (!is_single($theId)) { 
				$classes[] = "shop-item"; 
				$classes[] = "isotope-item"; 
			} else {
				$classes[] = "single-product"; 
			}
		} else {
			if (!is_single($theId)) { 
				$classes[] = "isotope-item"; 
			}
		}
		
		return $classes;
	}
}
add_filter( 'post_class', 'kona_addPostClasses');



/*-----------------------------------------------------------------------------------*/
/*	Blog Metas
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'kona_getBlogMeta' ) ) {
	function kona_getBlogMeta($author) {
		
		// CATEGORY
		$metacat = '';
		if (kona_getCategory() && (get_option('_sr_blogpostcat') || !get_option('_sr_optiontree'))) { 
			$metacat .= kona_getCategory()." "; 
		}
		
		// AUTHOR NAME
		$metaauthor = '';
		if (get_option('_sr_blogpostauthor') || !get_option('_sr_optiontree')) { 
			$metaauthor .= '<div class="meta-author"><span>'.esc_html__('by', 'kona').'</span> ';
			$metaauthor .= '<a href="'.esc_url(get_author_posts_url(get_the_author_meta('ID',$author))).'">'.esc_html(get_the_author_meta('display_name',$author)).'</a>';
			$metaauthor .= '</div>';
		}
		
		// DATE
		$metadate = '';
		if (get_option('_sr_blogpostdate') || !get_option('_sr_optiontree')) { 
			$metadate .= '<span class="post-date">'.get_the_date().'</span> ';
		}
		
		if ($metadate || $metaauthor) {
			return '<div class="post-meta">'.$metadate.$metacat.$metaauthor.'</div>';
		}
				
	}						
}


if( !function_exists( 'kona_getBlogTags' ) ) {
	function kona_getBlogTags() {
		global $wp_query;		
		$separator = ", ";
		
		// TAGS
		$metatags = '';
		$tags = get_the_tags();
		$tagoutput = '';
		if ($tags) {
			$metatags .= '<div class="meta-tags">';
			foreach (get_the_tags() as $tag)
			{
				$tagoutput .= '<a class="tag-link" href="'.esc_url(get_tag_link($tag->term_id)).'" >'.esc_html($tag->name).'</a>'.$separator;
			}
			$metatags .= trim($tagoutput, $separator);
			$metatags .= '</div>';
		}
				
		return $metatags;
		
	}						
}



if( !function_exists( 'kona_getCategory' ) ) {
	function kona_getCategory($limit=null) {
		
		// CATEGORY
		$metacategory = '';
		$metacategory .= '<span class="post-cat">in ';
		$metacategorysimple = '';
		$categories = get_the_category();
		$separator = ', ';
		$catoutput = '';
		if($categories){
			$i = 1;
			foreach($categories as $category) {
				$catoutput .= 	'<a class="cat-link" href="'.esc_url(get_category_link($category->term_id )).'" title="' . esc_attr( sprintf( esc_html__( "View all posts in %s", 'kona' ), $category->name ) ) . '">'.esc_html($category->cat_name).'</a>'.$separator;
				if ($limit && $limit == $i) { break; }
				$i++;
			}
			$metacategory .= trim($catoutput, $separator);
		} 
	   	$metacategory .= '</span>';
		
		return $metacategory;
		
		
	}
}



/*-----------------------------------------------------------------------------------*/
/*	Pagination for pages
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'kona_pagination' ) ) {
	function kona_pagination($type,$prevtext = 'Previous', $nexttext = 'Next', $query = null )
	{
		global $wp_query;
		$return = '';
		if (!$query) { $query = $wp_query; }
		
		// No pagination on single sites
		if(!is_single())	
		{	
					
			if ( get_option( 'page_on_front' ) == get_the_ID() ) { $current = get_query_var('page') == 0 ? 1 : get_query_var('page'); } 
			else { $current = get_query_var('paged') == 0 ? 1 : get_query_var('paged'); }
			$total = $query->max_num_pages;																
			
			// If there are more than 1 page
			if($total > 1)	
			{				
				$return .= '<ul class="pagination">';
				
				// Future-Button
				if ($current == 1) { $prevdisable = 'inactive'; } else { $prevdisable = '';  }
				$return .= '<li class="prev '.esc_attr($prevdisable).'"><a href="'.esc_url(get_pagenum_link($current-1)).'"><span class="text">'.esc_html($prevtext).'</span>
				<span class="icon">
					<span class="arrow">
						<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 13.2 9">
						<path d="M13.1,4.4c0-0.2-0.1-0.4-0.2-0.5c0,0,0,0,0,0L9.1,0.2c-0.3-0.3-0.7-0.3-1,0c-0.3,0.3-0.3,0.7,0,1l2.6,2.6H0.7
							c-0.4,0-0.7,0.3-0.7,0.7c0,0.4,0.3,0.7,0.7,0.7h10L8.2,7.8c-0.3,0.3-0.3,0.7,0,1c0.3,0.3,0.7,0.3,1,0L12.9,5c0,0,0,0,0,0
							C13,4.9,13,4.8,13.1,4.8c0,0,0,0,0,0C13.1,4.6,13.1,4.5,13.1,4.4z"/>
						</svg>
					</span>
				</span>
				</a></li>';	
				
				if ($type == 'post' || $type == 'shop') {
					for($i=1;$i<=$total;$i++) {
						if (($i < $current && $i > $current-3) || ($i > $current && $i < $current+3) || $current == $i /*|| $i == 1 || $i == $total*/) {
						if ($current == $i) { $return .= '<li class="page"><span class="current">'.$i.'</span></li>'; }
						else { $return .= '<li class="page"><a href="'.esc_url(get_pagenum_link($i)).'">'.$i.'</a></li>'; }
						}
					}	
				}
				
				// Past-Button
				if ($current == $total) { $nextdisable = 'inactive'; } else { $nextdisable = '';  }
				$return .= '<li class="next '.esc_attr($nextdisable).'"><a href="'.esc_url(get_pagenum_link($current+1)).'"><span class="text">'.esc_html($nexttext).'</span>
				<span class="icon">
					<span class="arrow">
						<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 13.2 9">
						<path d="M13.1,4.4c0-0.2-0.1-0.4-0.2-0.5c0,0,0,0,0,0L9.1,0.2c-0.3-0.3-0.7-0.3-1,0c-0.3,0.3-0.3,0.7,0,1l2.6,2.6H0.7
							c-0.4,0-0.7,0.3-0.7,0.7c0,0.4,0.3,0.7,0.7,0.7h10L8.2,7.8c-0.3,0.3-0.3,0.7,0,1c0.3,0.3,0.7,0.3,1,0L12.9,5c0,0,0,0,0,0
							C13,4.9,13,4.8,13.1,4.8c0,0,0,0,0,0C13.1,4.6,13.1,4.5,13.1,4.4z"/>
						</svg>
					</span>
				</span>
				</a></li>';
				
				$return .= '</ul> <!-- END #entries-pagination -->';
			} 
		}
		
		return $return;
	}
}




/*-----------------------------------------------------------------------------------*/
/*	Pagination on single item view
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'kona_singlepagination' ) ) {
	function kona_singlepagination($type,$id,$class,$prevtext = 'Previous', $nexttext = 'Next', $backbutton = false, $style = false ) {
		
		$prev_item = get_adjacent_post(false,'',false) ; 
		$next_item = get_adjacent_post(false,'',true) ;
		
			$idAdd = '';
			if ($id && $id !== '') { $idAdd = ' id="'.esc_attr($id).'"'; }
			echo '<div'.$idAdd.' class="'.esc_attr($class).' '.esc_attr($type).'">';
			echo '<ul class="pagination clearfix">';
				
			if ($prev_item && $prev_item->ID) { 
				$prev_post = get_post($prev_item->ID);
				$prevdisable = ''; 
				$prevlink = get_permalink( $prev_item->ID ); 
				$prevtitle = $prev_post->post_title; 
				$prevslug = $prev_item->post_name; 
				$previd = $prev_item->ID;
			} else { 
				$prevdisable = 'inactive'; 
				$prevlink = '#'; 
				$prevtitle = ''; 
				$prevslug = ''; 
				$previd = ''; 
				$prevdata = '';
			}
		
				// prev item
				echo '<li class="prev '.esc_attr($prevdisable).'"><a href="'.esc_url($prevlink).'">'; 
					echo '<span class="text">'.esc_html($prevtext).'</span>';
					echo '<span class="post-title">'.$prevtitle.'</span>';
				echo '</a></li>'; 
		
			
			if ($type == 'portfolio' && get_option('_sr_portfoliopage') && $style !== '1') {
				echo '<li class="back"><a href="'.esc_url(get_permalink(apply_filters( 'wpml_object_id', get_option('_sr_portfoliopage'), 'post', true ))).'"><span class="filter-icon"><span></span></span></a></li>';	
			}	
			
			if ($next_item && $next_item->ID) { 
				$next_post = get_post($next_item->ID);
				$nextdisable = ''; 
				$nextlink = get_permalink( $next_item->ID ); 
				$nexttitle = $next_post->post_title; 
				$nextslug = $next_item->post_name; 
				$nextid = $next_item->ID; 
			} else { 
				$nextdisable = 'inactive'; 
				$nextlink = '#'; 
				$nexttitle = ''; 
				$nextslug = ''; 
				$nextid =''; 
				$nextdata = '';
			}
				
				// next item
				echo '<li class="next '.esc_attr($nextdisable).'"><a href="'.esc_url($nextlink).'">'; 
					echo '<span class="text">'.esc_html($nexttext).'</span>';
					echo '<span class="post-title">'.$nexttitle.'</span>';
				echo '</a></li>';
				
			echo '</ul></div>';
		
	}						
}




/*-----------------------------------------------------------------------------------*/
/*	Share
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'kona_Share' ) ) {
	function kona_Share($type,$title,$align=null,$style="normal") {
		global $wp_query;	
		
		$postid = $wp_query->post->ID;
		$og_img = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'medium' );;
		$og_img = $og_img[0];
		
		if ($type == 'post') {
			$fb = get_option('_sr_blogpostshare_fb');
			$tw = get_option('_sr_blogpostshare_tw');
			$gplus = get_option('_sr_blogpostshare_gplus');
			$pt = get_option('_sr_blogpostshare_pt');
		} else if ($type == 'portfolio') {
			$fb = get_option('_sr_portfolioshare_fb');
			$tw = get_option('_sr_portfolioshare_tw');
			$gplus = get_option('_sr_portfolioshare_gplus');
			$pt = get_option('_sr_portfolioshare_pt');
		} else if ($type == 'product') {
			$fb = get_option('_sr_shopsingleshare_fb');
			$tw = get_option('_sr_shopsingleshare_tw');
			$gplus = get_option('_sr_shopsingleshare_gplus');
			$pt = get_option('_sr_shopsingleshare_pt');
		}
		
		
		$output = '';
		
		if ($title && ($fb || $tw || $gplus || $pt)) {
			$title = html_entity_decode($title);
			$output .= '<h6 class="widget-title title-alt align-'.esc_attr($align).'">'.$title.'</h6>';
		}
		
		if ($style == "text") {
			$fbName = 'Facebook';
			$twName = 'Twitter';
			$gName = 'Google +';
			$ptName = 'Pinterest';
		} else {
			$fbName = '';
			$twName = '';
			$gName = '';
			$ptName = '';
		}
		
		
		
		$output .= '<ul class="socialmedia-widget align-'.esc_attr($align).' '.esc_attr($style).'-style">';
			
		if ($fb) {
			$output .= '<li class="facebook"><a href="" onclick="window.open(\'https://www.facebook.com/sharer/sharer.php?u='.esc_url(get_the_permalink()).'\',\'\',\'width=900, height=500, toolbar=no, status=no\'); return(false);">'.$fbName.'</a></li>';
		}
		
		if ($tw) {
			$output .= '<li class="twitter"><a href="" onclick="window.open(\'https://twitter.com/intent/tweet?text=Tweet%20this&amp;url='.esc_url(get_the_permalink()).'\',\'\',\'width=650, height=350, toolbar=no, status=no\'); return(false);">'.$twName.'</a></li>';
		}
		
		if ($gplus) {
			$output .= '<li class="googleplus"><a href="" onclick="window.open(\'https://plusone.google.com/_/+1/confirm?hl=en-US&amp;url='.esc_url(get_the_permalink()).'&amp;image='.esc_url($og_img).'\',\'\',\'width=900, height=500, toolbar=no, status=no\'); return(false);">'.$gName.'</a></li>';
		}
		
		if ($pt) {
			$output .= '<li class="pinterest"><a href="" onclick="window.open(\'http:s//pinterest.com/pin/create/bookmarklet/?media='.esc_url($og_img).'&amp;url='.esc_url(get_the_permalink()).'\',\'\',\'width=650, height=350, toolbar=no, status=no\'); return(false);">'.$ptName.'</a></li>';
		}
		$output .= '</ul>';
        
		return '<div id="single-share">'.$output.'</div>';
		
		
	}						
}





/*-----------------------------------------------------------------------------------*/
/*	FILTER
/*-----------------------------------------------------------------------------------*/
if( !function_exists('kona_filter')) {
	function kona_filter($id,$class,$rel,$terms) {
		if (count($terms) > 1) {
			$return = '<ul id="'.esc_attr($id).'" class="category-list '.esc_attr($class).'" data-related-grid="'.esc_attr($rel).'">';
			foreach ($terms as $t) {
			$t = intval($t);
			$term = get_term_by('term_id', $t, 'portfolio_category');
			$termlink = get_term_link($t, 'portfolio_category');
			$return .= '<li><a data-filter=".cat-'.esc_attr($t).'" data-slug="'.esc_attr($term->slug).'" href="'.esc_url($termlink).'" title="'.esc_attr($term->name).'">'.esc_html($term->name).'</a></li>';
			} 
			$return .= '<li class="active" ><a data-filter="*">'.esc_html__('All', 'kona').'</a></li>';
			$return .= '</ul>';
			return $return;
		}
	}						
}



/*-----------------------------------------------------------------------------------*/
/*	HEADER AREA FILTER BY SHORTCODE (Portfolio)
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'kona_getHeaderFilter' ) ) {
	function kona_getHeaderFilter($postId){
		$content = ""; if ($postId) { $content_post = get_post($postId); $content = $content_post->post_content; }
		
		$check = kona_getstringbetween($content, "[sr-portfolio", '"]');
		if($check) {
			
			$i = 1;
			foreach ($check as $s) {
				if (strpos($s, 'filterposition="header"') !== false && strpos($s, 'filterenable="1"') !== false) {
					// GET TERMS AND OUTPUT FILTER
					$filtershow = kona_getstringbetween($s, 'filtershow="', '"');
					$filtercategory = kona_getstringbetween($s, 'filtercategory="', '"');
					if ($filtershow[0] == 'all') { $terms = wp_list_pluck( get_terms('portfolio_category'), 'term_id' ); }
					else if ($filtercategory[0]) { $terms = explode(',',$filtercategory[0]); } else { $terms = false; }					
					return kona_filter('grid-filter'.$i,'grid-filter','portfolio-grid'.$i,$terms);
					break;
				}
				$i++;
			}
		} else {
			return false;
		}
		
	}
}



/*-----------------------------------------------------------------------------------*/
/*	HEADER AREA FILTER BY SHORTCODE (Portfolio)
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'kona_getHeaderCategories' ) ) {
	function kona_getHeaderCategories($postId){
		
		$showcats = get_option('_sr_blogcategoryfilter');
		$all = get_option('_sr_blogcategoryall');
		$cats = get_option('_sr_blogcategoryselect');
		$pages = get_option('_sr_blogcategorypages');
		
		if ($showcats) {
			$catlist = "";
			if ($all) { 
				$cats = get_categories(); 
				foreach ($cats as $c) {
				$catlist .= '<li><a href="'.esc_url( get_category_link( $c->term_id ) ).'" title="'.esc_attr($c->name).'">'.esc_html($c->name).'</a></li>';
				} 
			} else if ($cats) {
				$cats = explode(",",$cats); 
				foreach ($cats as $c) {
				$catlist .= '<li><a href="'.esc_url( get_category_link( $c ) ).'" title="'.esc_attr(get_the_category_by_ID($c)).'">'.esc_html(get_the_category_by_ID($c)).'</a></li>';
				} 
			}
			
			if (in_array($postId, explode(",",$pages))) { 
			$return = '<ul class="category-list">';
			$return .= $catlist;
			$return .= '</ul>';
			return $return;
			} else {
			return false;
			}
		} else { 
			return false;
		}
		
	}
}



/*-----------------------------------------------------------------------------------*/
/*	GENERAL FUNCTION for get string between start and end
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'kona_getstringbetween' ) ) {
	function kona_getstringbetween($str, $startDelimiter, $endDelimiter) {
	  $contents = array();
	  $startDelimiterLength = strlen($startDelimiter);
	  $endDelimiterLength = strlen($endDelimiter);
	  $startFrom = $contentStart = $contentEnd = 0;
	  while (false !== ($contentStart = strpos($str, $startDelimiter, $startFrom))) {
		$contentStart += $startDelimiterLength;
		$contentEnd = strpos($str, $endDelimiter, $contentStart);
		if (false === $contentEnd) {
		  break;
		}
		$contents[] = substr($str, $contentStart, $contentEnd - $contentStart);
		$startFrom = $contentEnd + $endDelimiterLength;
	  }

	  return $contents;
	}
}


/*-----------------------------------------------------------------------------------*/
/*	GET THE RALATED ID
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'kona_getId' ) ) {
	function kona_getId() {
		if (is_home() && is_front_page()) { $theId = get_option('_sr_blogpage'); } 
		else if (is_home()) { $theId = get_option( 'page_for_posts' );  } 
		else if (class_exists('Woocommerce') && is_shop()) { $theId = get_option('woocommerce_shop_page_id'); } 
		else if (!is_404() && !is_tag() && !is_category() && !is_search() && !is_archive() && !is_tax()) { $theId = get_the_ID();  } 
		else { $theId = get_option( 'page_for_posts' ); }
		return $theId;
	}						
}




/*-----------------------------------------------------------------------------------*/
/*	Custom WPML Switcher
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'kona_wpml_switcher' ) ) {
	function kona_wpml_switcher() {
	  if (get_option('_sr_wpmlswitcher') == '1' || (current_user_can('administrator') && get_option('_sr_wpmlswitcher') == '2')) {
	  $languages = icl_get_languages('skip_missing=0');
	  if(1 < count($languages)){
		?>
        <div class="menu-language">
        	<?php 
		  	foreach($languages as $l){
			  if($l['active']) { echo '<a href="#" class="show-language">'.esc_html($l['language_code']).'</a>'; }
			}
			?>
			<ul class="lang-select">
				<?php 
		  		foreach($languages as $l){
				  if(!$l['active']) {echo '<li><a href="'.esc_url($l['url']).'">'.esc_html($l['language_code']).'</a></li>';}
				}
				?>
			</ul>
        </div>
        <?php
	  }
	  } // if option switcher
		
	  if (get_option('_sr_currencyswitcher') == '1' || (current_user_can('administrator') && get_option('_sr_currencyswitcher') == '2')) {
      	do_action('wcml_currency_switcher', array('format' => '%code% %symbol%'));
	  }
		
	}
}




/*-----------------------------------------------------------------------------------*/
/*	Header bar
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'kona_headerbar' ) ) {
	function kona_headerbar($pos=null) {
	  
		if (get_option('_sr_headerbar')) { 
			
		$headerbarClass = "header-bar";
		if (get_option('_sr_headerbartextcolor')) { $headerbarClass .= " ".get_option('_sr_headerbartextcolor'); }
		if ($pos == 'mobile') { $headerbarClass = "mobile-header-bar"; }

		$headerbarCols = 0;
		if (get_option('_sr_headerbarleft')) { $headerbarCols++; }
		if (get_option('_sr_headerbarmiddle')) { $headerbarCols++; }
		if (get_option('_sr_headerbarright')) { $headerbarCols++; }
		$headerbarClass .= " col-".$headerbarCols;
			
		if (get_option('_sr_headerbarleft') == 'wpml' || 
			get_option('_sr_headerbarmiddle') == 'wpml' || 
			get_option('_sr_headerbarright') == 'wpml') { $headerbarClass .= " has-wpml"; }

		?>
		<div class="<?php echo esc_attr($headerbarClass); ?>">
			<div class="wrapper clearfix">
				<div class="header-bar-left clearfix <?php echo esc_attr(get_option('_sr_headerbarleft')); ?>">
					<?php
					if (get_option('_sr_headerbarleft') == 'social') { echo do_shortcode("[sr-social]"); }
					else if (get_option('_sr_headerbarleft') == 'wpml' && function_exists('icl_object_id')) { kona_wpml_switcher(); }
					else if (get_option('_sr_headerbarleft') == 'custom') { echo wp_kses_post(do_shortcode(stripslashes(get_option('_sr_headerbarleftcustom')))); }
					?>
				</div>

				<div class="header-bar-middle align-center clearfix <?php echo esc_attr(get_option('_sr_headerbarmiddle')); ?>">
					<?php
					if (get_option('_sr_headerbarmiddle') == 'social') { echo do_shortcode("[sr-social]"); }
					else if (get_option('_sr_headerbarmiddle') == 'wpml' && function_exists('icl_object_id')) { kona_wpml_switcher(); }
					else if (get_option('_sr_headerbarmiddle') == 'custom') { echo wp_kses_post(do_shortcode(stripslashes(get_option('_sr_headerbarmiddlecustom')))); }
					?>
				</div>

				<div class="header-bar-right align-right clearfix <?php echo esc_attr(get_option('_sr_headerbarright')); ?>">
					<?php
					if (get_option('_sr_headerbarright') == 'social') { echo do_shortcode("[sr-social]"); }
					else if (get_option('_sr_headerbarright') == 'wpml' && function_exists('icl_object_id')) { kona_wpml_switcher(); }
					else if (get_option('_sr_headerbarright') == 'custom') { echo wp_kses_post(do_shortcode(stripslashes(get_option('_sr_headerbarrightcustom')))); }
					?>
				</div>
			</div>
		</div>
		<?php }
		
	}
}


?>