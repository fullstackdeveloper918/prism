<?php

/**
 * Neuron Functions
 * 
 * Bunch of functions which improve & help the theme
 * to work better and keep the code more organised.
 */

/**
 * Open and close container tags
 * 
 * Simply opens and closes the container tags,
 * theme uses it and finds helpful on files
 * that does not contain html tags.
 */
add_action('amartha_open_container', 'amartha_open_container');
add_action('amartha_close_container', 'amartha_close_container');
function amartha_open_container() {
?>
    <div class="container">
<?php
}

function amartha_close_container() {
?>
    </div>
<?php
}

/**
 * Default Pagination
 * 
 * Well organised pagination with numbers and arrows,
 * theme uses it on blogs and portfolios.
 */
function neuron_pagination($query = '') {
	global $paged;

	$amartha_range = 4;
	$amartha_pages = '';
	$amartha_showitems = ($amartha_range * 2) + 1;

	if (empty($paged)) {
		if (get_query_var('paged')) {
			$paged = get_query_var('paged');
		} elseif (get_query_var('page')) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}
	}

	if ($amartha_pages == '') {
		global $wp_query;
		if ($query) {
			$amartha_pages = $query->max_num_pages;
		} else {
			$amartha_pages = $wp_query->max_num_pages;
		}

		if (!$amartha_pages) {
			$amartha_pages = 1;
		}
	}

	if (1 != $amartha_pages) {
		echo "<div class='o-pagination'><div class='container'><div class='row align-items-center h-medium-top-padding h-medium-bottom-padding'>";

        $amartha_prev_class = 'o-pagination__arrow d-inline-flex col-2';
        $amartha_next_class = 'o-pagination__arrow d-inline-flex col-2';
		if ($paged <= 1) {
            $amartha_prev_class = 'o-pagination__arrow d-inline-flex col-2 o-pagination__arrow--disabled';
        } 
        echo "<div class='". $amartha_prev_class ."'><a class=\"amartha-link d-inline-flex\" href='". get_pagenum_link($paged - 1) ."'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke-width='1.5' class='feather feather-chevron-left'><polyline points='15 18 9 12 15 6'></polyline></svg></a></div>";

        echo "<ul class='col-8 h-align-center o-pagination__numbers'>";
		for ($i = 1; $i <= $amartha_pages; $i++) {
			if (1 != $amartha_pages && (!($i >= $paged + $amartha_range + 1 || $i <= $paged - $amartha_range - 1) || $amartha_pages <= $amartha_showitems)) {
				if ($paged == $i) {
					echo "<li class=\"active\"><a>". $i ."</a></li>";
				} else {
					echo "<li><a href='". get_pagenum_link($i) ."' class=\"inactive amartha-link\">". $i ."</a></li>";
				}
			}
		}

        $amartha_pages_float = intval($amartha_pages);
        echo "</ul>";


        if ($paged == $amartha_pages_float) {
            $amartha_next_class = 'o-pagination__arrow d-inline-flex col-2 o-pagination__arrow--disabled';
        }

        echo "<div class='". esc_attr($amartha_next_class) ."'><a class=\"amartha-link d-inline-flex ml-auto\" href='". esc_url(get_pagenum_link($paged + 1)) ."'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke-width='1.5' class='feather feather-chevron-right'><polyline points='9 18 15 12 9 6'></polyline></svg></a></div>";

		echo "</div></div></div>\n";
	}
}
/**
 * Comments
 * 
 * Rewrites the comments for easier use.
 */
function amartha_comments_open($amartha_comment, $amartha_comments_args, $amartha_comment_depth) {
	switch ($amartha_comment_depth) {
		case 1:
			$amartha_comment_class = "col-md-12";
			break;
		case 2:
			$amartha_comment_class = "col-md-11 offset-md-1";
			break;
		case 3:
			$amartha_comment_class = "col-md-10 offset-md-2";
			break;
		case 4:
		default:
			$amartha_comment_class = "col-md-9 offset-md-3";
			break;
	}

	if ($amartha_comment->comment_type == 'pingback') {
		$amartha_comment_class .= " o-comment--no-avatar";
	}
?>
<div class="o-comment <?php echo esc_attr($amartha_comment_class) ?>" id="comment-<?php echo esc_attr($amartha_comment->comment_ID); ?>">
	<?php if($amartha_comment->comment_type != 'pingback') : ?>
		<div class="o-comment__avatar">
			<?php echo get_avatar($amartha_comment, 70) ?>
		</div>
	<?php endif; ?>
	<div class="o-comment__details">
		<div class="o-comment__author-meta d-flex align-items-center">
			<h5 class="o-comment__author-meta-title">
                <?php echo esc_html($amartha_comment->comment_author) ?>
            </h5>

            <div class="ml-auto">
                <?php
                    /**
					 * Reply Link
					 */
                    comment_reply_link(
                        array_merge(
                            $amartha_comments_args,
                            array(
                                'reply_text' => esc_attr__('reply', 'amartha'),
                                'depth' => $amartha_comment_depth,
                                'max_depth' => $amartha_comments_args['max_depth'],
                            )
                        ),
                        $amartha_comment
                    );
                ?>
            </div>
		</div>
		<div class="o-comment__date">
			<?php comment_date(get_option('date_format')) . comment_date(get_option('time_format')) ?>
		</div>
		<div class="o-comment__content">
			<?php comment_text(); ?>
		</div>
	</div>
</div>
<?php
}

function amartha_comments_close() {}

function amartha_comment_form_before() {
	?>
		<div class="row">
            <div class="col-12">
	<?php
}
add_action('comment_form_before', 'amartha_comment_form_before');

function amartha_comment_form_after() {
    ?>
            </div>
		</div>
	<?php
}
add_action('comment_form_after', 'amartha_comment_form_after');

/**
 * Inherit Option ACF to Customizer
 * 
 * It accepts two different options, the field
 * from acf and the option from customizer, it
 * makes them ready to be used if the value
 * will be inherited or not.
 */
function amartha_inherit_option($inherit, $customizer, $default_customizer, $archive = true) {
		/**
	 * Get Queried Object
	 * 
	 * If the field is being called in taxonomy
	 * the term will be associated to the queried
	 * object as prefix.
	 * 
	 * https://www.advancedcustomfields.com/resources/adding-fields-taxonomy-term/
	 */
	if (class_exists('WooCommerce') && is_shop()) {
		$term = wc_get_page_id('shop');
	} else if (is_tax() && isset(get_queried_object()->term_id)) {
		$term = 'term_' . get_queried_object()->term_id;
	} else {
		$term = get_queried_object();
	}

	/**
	 * Archive
	 * 
	 * All archive pages and taxonomies should
	 * have get_queried_object as second parameter
	 * on the get_field otherwise the right value
	 * would not be returned.
	 */
    if ($archive == true) {
        $inherit = get_field($inherit, $term);
    } else {
        $inherit = get_field($inherit);
    }

    $customizer = get_theme_mod($customizer, $default_customizer);

    if (!$inherit) {
        $inherit = '1';
	}
	
	if (is_array($inherit)) {
		$inherit = $inherit[0];
	}

    if ($inherit == '1') {
        $inherit = $customizer;
    } else {
        $inherit = $inherit - 1;
    }
    
    return $inherit;
}

/**
 * Thumbnail Calculation
 * 
 * A simple calculation which returns as padding
 * bottom the height of image, we use it to eleminate
 * the glitches of masonry when loading.
 */
function amartha_thumbnail_calculation($thumbnail = 'full') {
	global $post;

	$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $thumbnail);

	if (isset($image_data[2]) && isset($image_data[1])) {
		return 'padding-bottom: '. number_format($image_data[2] / $image_data[1] * 100, 6) .'% !important;';
	}

}

// For simple images not thumbnails
function amartha_image_calculation($image_id, $image_size = 'full') {
	$image_data = wp_get_attachment_image_src($image_id, $image_size);

	if (isset($image_data[2]) && isset($image_data[1])) {
		return 'padding-bottom: '. number_format($image_data[2] / $image_data[1] * 100, 6) .'% !important;';
	}
}

/**
 * Social Media
 * 
 * Incase visibility is false the function will return
 * also the type will be between icon and text, sorter
 * helps to add the social media you want.
 */
function amartha_social_media($visibility, $sorter) {

	if ($visibility == '2') {
		return;
	}

	$amartha_social_media_output = [];

	$amartha_social_media = [
		'facebook' => [
			'url' => get_theme_mod('social_media_facebook'),
			'icon' => 'fab fa-facebook-f'
		],
		'500px' => [
			'url' => get_theme_mod('social_media_500px'),
			'icon' => 'fab fa-500px'
		],
		'twitter' => [
			'url' => get_theme_mod('social_media_twitter'),
			'icon' => 'fab fa-twitter'
		],
		'google_plus' => [
			'url' => get_theme_mod('social_media_google_plus'),
			'icon' => 'fab fa-google-plus'
		],
		'vimeo' => [
			'url' => get_theme_mod('social_media_vimeo'),
			'icon' => 'fab fa-vimeo'
		],
		'dribbble' => [
			'url' => get_theme_mod('social_media_dribbble'),
			'icon' => 'fab fa-dribbble'
		],
		'pinterest' => [
			'url' => get_theme_mod('social_media_pinterest'),
			'icon' => 'fab fa-pinterest'
		],
		'youtube' => [
			'url' => get_theme_mod('social_media_youtube'),
			'icon' => 'fab fa-youtube'
		],
		'behance' => [
			'url' => get_theme_mod('social_media_behance'),
			'icon' => 'fab fa-behance'
		],
		'tumblr' => [
			'url' => get_theme_mod('social_media_tumblr'),
			'icon' => 'fab fa-tumblr'
		],
		'linkedin' => [
			'url' => get_theme_mod('social_media_linkedin'),
			'icon' => 'fab fa-linkedin-in'
		],
		'flickr' => [
			'url' => get_theme_mod('social_media_flickr'),
			'icon' => 'fab fa-flickr'
		],
		'houzz' => [
			'url' => get_theme_mod('social_media_houzz'),
			'icon' => 'fab fa-houzz'
		],
		'spotify' => [
			'url' => get_theme_mod('social_media_spotify'),
			'icon' => 'fab fa-spotify'
		],
		'instagram' => [
			'url' => get_theme_mod('social_media_instagram'),
			'icon' => 'fab fa-instagram'
		],
		'github' => [
			'url' => get_theme_mod('social_media_github'),
			'icon' => 'fab fa-github'
		],
		'stackexchange' => [
			'url' => get_theme_mod('social_media_stackexchange'),
			'icon' => 'fab fa-stack-exchange'
		],
		'soundcloud' => [
			'url' => get_theme_mod('social_media_soundcloud'),
			'icon' => 'fab fa-soundcloud'
		],
		'vk' => [
			'url' => get_theme_mod('social_media_vk'),
			'icon' => 'fab fa-vk'
		]
	];

	if ($sorter) {
		echo '<ul>';
		foreach ($sorter as $social_media) {
			if ($amartha_social_media[$social_media]['url']) {
				echo sprintf(
					'<li><a target="%s" href="%s"><i class="%s"></i></a></li>',
					get_theme_mod('social_media_new_window') == '1' ? '_BLANK' : '_SELF',
					esc_url($amartha_social_media[$social_media]['url']),
					esc_attr($amartha_social_media[$social_media]['icon'])
				);
			}
		}
		echo '</ul>';
	}
}

/**
 * Breadcrumbs
 * 
 * Add support for parent and child pages, archives
 * custom post types and custom taxonomies
 */
function amartha_breadcrumbs($visibility, $sep, $inSubtitle = false) {
	if ($visibility == '2') {
		return;
	}

	// Output
	$output = [];
	
	// Settings
	if ($sep) {
		$separator = $sep;
	} else {
		$separator = '|';
	}
	
	$home_title = esc_html__('Home', 'amartha');

	if (class_exists('WooCommerce') && is_shop()) {
		$current_title = woocommerce_page_title(false);
	} elseif (is_author()) {
		$current_title = get_the_author();
	} elseif (is_archive()) {
		if (is_date()) {
			$current_title = get_the_date();
		} else {
			$current_title = single_term_title('', false);
		}
	} else {
		$current_title = get_the_title();
	}
	
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy = 'portfolio_category';
       
    // Get the query & post information
	global $post, $wp_query;
	
    // Do not display on the homepage
    if (!is_front_page()) {

        if (is_archive() && is_tax() && !is_category() && !is_tag()) {
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if ($post_type != 'post') {
				  
				if (get_post_type_object($post_type)) {
					$post_type_object = get_post_type_object($post_type);
					$output[] = '<li class="m-breadcrumb-nav__item">' . $post_type_object->labels->name . '</li>';
					$output[] = '<li class="m-breadcrumb-nav__item m-breadcrumb-nav__item--separator"> ' . $separator . ' </li>';
				}
            }
			$custom_tax_name = get_queried_object()->name;
			
            $output[] = '<li class="m-breadcrumb-nav__item m-breadcrumb-nav__item--active">' . $custom_tax_name . '</li>';
        } elseif (is_category() || is_tag()) {
			$output[] = '<li class="m-breadcrumb-nav__item m-breadcrumb-nav__item--active">' . single_cat_title('', false) . '</li>';
		} elseif (is_attachment()) {
			$output[] = '<li class="m-breadcrumb-nav__item m-breadcrumb-nav__item--active">' . get_the_title(get_the_ID()) . '</li>';
		} elseif (is_single()) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if ($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
              
                $output[] = '<li class="m-breadcrumb-nav__item">' . $post_type_object->labels->name . '</li>';
                $output[] = '<li class="m-breadcrumb-nav__item m-breadcrumb-nav__item--separator"> ' . $separator . ' </li>';
            }
              
            // Get post category info
            $category = get_the_category();
             
            if (!empty($category)) {
              
				// Get last category post is in
				$array_category = array_values($category);
                $last_category = end($array_category);
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','), ',');
                $cat_parents = explode(',', $get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach ($cat_parents as $parents) {
                    $cat_display .= '<li class="m-breadcrumb-nav__item">'. $parents .'</li>';
                    $cat_display .= '<li class="m-breadcrumb-nav__item m-breadcrumb-nav__item--separator"> ' . $separator . ' </li>';
                }
            }
			// If it's a custom post type within a custom taxonomy
			if (get_post_type() == 'product') {
    			$custom_taxonomy = 'product_cat';
			} elseif (get_post_type() == 'portfolio') {
    			$custom_taxonomy = 'portfolio_category';
			}

			$taxonomy_exists = taxonomy_exists($custom_taxonomy);

			if (empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
				$taxonomy_terms = !empty(get_the_terms($post->ID, $custom_taxonomy)) ? get_the_terms($post->ID, $custom_taxonomy) : '';
				if ($taxonomy_terms) {
					$cat_id         = $taxonomy_terms[0]->term_id;
					$cat_nicename   = $taxonomy_terms[0]->slug;
					$cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
					$cat_name       = $taxonomy_terms[0]->name;
				}
			}	
              
            // Check if the post is in a category
            if (!empty($last_category)) {
                $output[] = wp_kses_post($cat_display);
                $output[] = '<li class="m-breadcrumb-nav__item m-breadcrumb-nav__item--active">'. get_the_title() .'</li>';
            } elseif (!empty($cat_id)) {
                $output[] = '<li class="m-breadcrumb-nav__item"><a href="'. esc_url($cat_link) .'">' . esc_attr($cat_name) . '</a></li>';
                $output[] = '<li class="m-breadcrumb-nav__item m-breadcrumb-nav__item--separator"> ' . $separator . ' </li>';
                $output[] = '<li class="m-breadcrumb-nav__item m-breadcrumb-nav__item--active">' . get_the_title() . '</li>';
            } else {
                $output[] = '<li class="m-breadcrumb-nav__item m-breadcrumb-nav__item--active">' . get_the_title() . '</li>';
            }
        } elseif (is_page()) {
            if ($post->post_parent) {
                   
                // If child page, get parents 
                $anc = get_post_ancestors($post->ID);
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
				// Parent page loop
				if (!isset($parents)) {
					$parents = null;
				}

                foreach ($anc as $ancestor) {
                    $parents .= '<li class="m-breadcrumb-nav__item"><a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="m-breadcrumb-nav__item m-breadcrumb-nav__item--separator"> ' . $separator . ' </li>';
                }
                   
                // Display parent pages
                $output[] = wp_kses_post($parents);
                   
                $output[] = '<li class="m-breadcrumb-nav__item m-breadcrumb-nav__item--active">' . get_the_title() . '</li>';
            } else {
                $output[] = '<li class="m-breadcrumb-nav__item m-breadcrumb-nav__item--active">' . get_the_title() . '</li>';
            }
        } elseif (class_exists('WooCommerce') && is_shop()) {
			$output[] = '<li class="m-breadcrumb-nav__item">' . woocommerce_page_title(false) . '</li>';
		} elseif (is_year()) {
            $output[] = '<li class="m-breadcrumb-nav__item"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
        } elseif (is_month()) {
            // Year link
            $output[] = '<li class="m-breadcrumb-nav__item"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
            $output[] = '<li class="m-breadcrumb-nav__item m-breadcrumb-nav__item--separator"> ' . $separator . ' </li>';
               
            // Month display
            $output[] = '<li class="m-breadcrumb-nav__item">' . get_the_time('M') . '</li>';
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            $output[] = '<li class="m-breadcrumb-nav__item m-breadcrumb-nav__item--active">' . $userdata->display_name . '</li>';
        } elseif (get_query_var('paged')) {
            $output[] = '<li class="m-breadcrumb-nav__item">'. esc_attr__('Page', 'amartha') . get_query_var('paged') . '</li>';
        } elseif (is_search()) {
            $output[] = '<li class="m-breadcrumb-nav__item">Search results for: ' . get_search_query() . '</li>';
        } 

		if ($inSubtitle) {
			return sprintf(
				'<div>
					<ul id="breadcrumbs" class="m-breadcrumb-nav ml-auto">
						<li class="m-breadcrumb-nav__item"><a href="%s">%s</a></li>
						<li class="m-breadcrumb-nav__item m-breadcrumb-nav__item--separator">%s</li>
						%s
					</ul>
				</div>',
				get_home_url(),
				$home_title,
				$separator,
				is_array($output) ? wp_kses_post(implode(' ', $output)) : wp_kses_post($output)
			);
		} else {
			echo sprintf(
				'<div class="o-breadcrumb">
					<div class="d-flex align-items-center">
						<h4 class="o-breadcrumb__page">%s</h4>
						<ul id="breadcrumbs" class="m-breadcrumb-nav ml-auto">
							<li class="m-breadcrumb-nav__item"><a href="%s">%s</a></li>
							<li class="m-breadcrumb-nav__item m-breadcrumb-nav__item--separator">%s</li>
							%s
						</ul>
					</div>
				</div>',
				esc_attr($current_title),
				get_home_url(),
				$home_title,
				$separator,
				is_array($output) ? wp_kses_post(implode(' ', $output)) : wp_kses_post($output)
			);
		}
    }
}

/**
 * Modify wp_link_pages to show 
 */
add_filter('wp_link_pages_args', 'amartha_wp_link_pages_args_prevnext_add');
function amartha_wp_link_pages_args_prevnext_add($args) {
	global $page, $numpages, $more, $pagenow;
	
    if (!$args['next_or_number'] == 'next_and_number') {
        return $args; 
	} 

	$args['next_or_number'] = 'number'; 

	if (!$more) {
        return $args; 
	}
    return $args;
}

/**
 * Ajax Mini Cart
 * 
 * Mini cart will update in 
 * the same page, without 
 * reloading the current state.
 */
function amartha_woocommerce_header_add_to_cart_fragment($fragments) {
    ob_start();
    ?>
		<span class="number">
			<?php echo sprintf('%d', WC()->cart->cart_contents_count); ?>
		</span>
    <?php
    $fragments['.l-primary-header__bag .number'] = ob_get_clean();
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'amartha_woocommerce_header_add_to_cart_fragment');


/**
 * Shop Posts Per Page
 * 
 * The number comes from customizer
 * and via woocommerce filter it changes
 * the posts per page of shop page.
 */
if (get_theme_mod('shop_ppp') && class_exists('WooCommerce')) {
    add_filter('loop_shop_per_page', 'amartha_loop_shop_per_page', 20);
    function amartha_loop_shop_per_page($cols) {
        $cols = get_theme_mod('shop_ppp');
        return $cols;
    }
}

/**
 * Shorten the Excerpt
 */
add_filter('excerpt_length', 'amartha_excerpt_shorten', 999);
function amartha_excerpt_shorten($length) {
    return 18;
}

/**
 * Excerpt More
 * 
 * Remove brackets from dots
 */
add_filter('excerpt_more', 'amartha_excerpt_more');
function amartha_excerpt_more($more) {
    return '...';
}
