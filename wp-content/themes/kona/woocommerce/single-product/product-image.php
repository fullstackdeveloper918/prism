<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version     3.5.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;
$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
$image_title       = get_post_field( 'post_excerpt', $post_thumbnail_id );
$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . $placeholder,
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
) );


// Custom gallery
$mainImage = true;
$mainFirstShow = false;				// to check if the mainImage should be shown at first or not depending the variation position	
$mainGallery = true;
$variationGallery = '';
$galleryType = get_option('_sr_shopsingleoptiongallery');
if (get_post_meta( get_the_ID() , '_sr_productgallerytype', true)) { $galleryType = get_post_meta( get_the_ID() , '_sr_productgallerytype', true); }
$prodImage = 0;
if (get_option('_sr_shopsingleoptionproductimage')) { $prodImage = get_option('_sr_shopsingleoptionproductimage'); }

// Zoom
$layout = get_post_meta(get_the_ID(), '_sr_productlayout', true);
	if (!$layout) { $layout = "classic"; }
	if( $product->is_type( 'grouped' )) { $layout = "classic"; }
$galleryZoom = get_option('_sr_shopsingleoptionzoom');
$zoom = false;
if ($layout == 'classic' && $galleryZoom) { $zoom = true; }

/// SPAB RICE DEMO ///
if (get_the_ID() == 23 || get_the_ID() == 28 || get_the_ID() == 1155) { $zoom = true; }

if( $product->is_type( 'variable' ) ){
	
	
   	// Product has variations
	$mainImage = false;
	$variations = $product->get_available_variations();
	$defaultGallery = $product->get_gallery_image_ids();
	$srGallery = get_post_meta( get_the_ID() , '_sr_prodgallery', true);
	
	$vI = 0;
	foreach($variations as $v) {
	
		$name = ''; foreach ($v['attributes'] as $n) { if ($n) { $name .= $n.' '; } } $name = substr($name, 0, -1);
		$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));		// to delete all blank spaces like a slug
		
		if ($v['sr_variation_gallery'] && $v['sr_variation_gallery'] !== ' ') {
			// write gallery
			
			$thumb = wp_get_attachment_image_src( $v['image_id'], 'thumbnail' ); // thumb is for fixed product add
			echo '<div class="flickity-carousel product-gallery variation-gallery '.esc_attr($galleryType).'" data-variation="'.$name.'" data-gallery="'.$slug.'"  data-thumb="'.esc_url($thumb[0]).'">';
			$jsonGal = str_replace("&quot;", '"', $v['sr_variation_gallery']);
			$jsonGal = json_decode($jsonGal);
			
			if ($prodImage && $v['image_id']) {
				$mainImage = wp_get_attachment_image_src( $v['image_id'], 'kona-thumb-big' );
				echo '
					<div class="carousel-item">
						<div class="product-image">';
							if ($zoom) { echo '<span class="zoomF">'; }
							echo '<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-flickity-lazyload="'.esc_url($mainImage[0]).'" width="'.esc_attr($mainImage[1]).'" height="'.esc_attr($mainImage[2]).'" alt="'.esc_attr(get_the_title($v['image_id'])).'" />';
							if ($zoom) { echo '</span>'; }
				echo '
						</div>
					</div>
				';
			}
			
			foreach($jsonGal->sortable as $j) {
				echo '<div class="carousel-item">';
				$image = wp_get_attachment_image_src( $j->id, 'kona-thumb-big' );
				
				$addClass = "";
				if (isset($j->size) && $j->size) { $addClass = $j->size; }
				
				echo '
				<div class="product-image '.esc_attr($addClass).'">';
					if ($zoom) { echo '<span class="zoomF">'; }
					echo '<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-flickity-lazyload="'.esc_url($image[0]).'" width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" alt="'.esc_attr(get_the_title($j->id)).'" />';
					if ($zoom) { echo '</span>'; }
				echo '</div>';	
				echo '</div>';
			}
			echo '</div>';
			
			// thumbs
			if ($galleryType == "gallery-thumb" && (count($jsonGal->sortable) > 1 || (count($jsonGal->sortable) && $prodImage && $v['image_id']) )) {
				echo '<div class="product-nav variation-thumbs" data-variation="'.$name.'" data-gallery="'.$slug.'"><div class="productnav-inner">';
				
				if ($prodImage && $v['image_id']) {
						echo '<div class="nav-thumb is-nav-selected">'.wp_get_attachment_image( $v['image_id'], 'thumbnail' ).'</div>'; }
				
				$i = 1;
				foreach ($jsonGal->sortable as $j) {
					$addClass = "";
					if ($i == 1) { $addClass = "is-nav-selected"; }
					echo '<div class="nav-thumb '.esc_attr($addClass).'">'.wp_get_attachment_image( $j->id, 'thumbnail' ).'</div>';
					$i++;
				}
				echo '</div></div>';
			}
			
		} else if ((!$v['sr_variation_gallery'] || $v['sr_variation_gallery'] == ' ') && ($srGallery || $defaultGallery) && ($v['image_id'] && $v['image_id'] !== get_post_thumbnail_id( $post->ID ))) {
			
			// write main gallery if there is no variation gallery but main gallery
			
			if ($srGallery) {
				
				$thumb = wp_get_attachment_image_src( $v['image_id'], 'thumbnail' ); // thumb is for fixed product add
				echo '<div class="flickity-carousel product-gallery variation-gallery '.esc_attr($galleryType).'" data-variation="'.$name.'" data-gallery="'.$slug.'"  data-thumb="'.esc_url($thumb[0]).'">';
				$jsonGallery = json_decode($srGallery,true);

				if ($prodImage && $v['image_id']) {
					$image = wp_get_attachment_image_src( $v['image_id'], 'kona-thumb-big' );
					echo '
						<div class="carousel-item">
							<div class="product-image">';
								if ($zoom) { echo '<span class="zoomF">'; }
								echo '<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-flickity-lazyload="'.esc_url($image[0]).'" width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" alt="'.esc_attr(get_the_title($v['image_id'])).'" />';
								if ($zoom) { echo '</span>'; }
					echo '
							</div>
						</div>
					';
				}

				foreach ( $jsonGallery["sortable"] as $a ) {
					$addClass = "";
					if (isset($a['size']) && $a['size']) { $addClass = $a['size']; }

					$image = wp_get_attachment_image_src( $a['id'], 'kona-thumb-big' );
					echo '
						<div class="carousel-item">
							<div class="product-image '.esc_attr($addClass).'">';
								if ($zoom) { echo '<span class="zoomF">'; }
								echo '<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-flickity-lazyload="'.esc_url($image[0]).'" width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" alt="'.esc_attr(get_the_title($a['id'])).'" />';
								if ($zoom) { echo '</span>'; }
					echo '						
							</div>
						</div>
					';
				}
				echo '</div>';
				
				// thumbs
				if ($galleryType == "gallery-thumb" && (count($jsonGallery["sortable"]) > 1 || (count($jsonGallery["sortable"]) && $prodImage && $v['image_id']) )) {
					echo '<div class="product-nav variation-thumbs" data-variation="'.$name.'" data-gallery="'.$slug.'"><div class="productnav-inner">';

					if ($prodImage && $v['image_id']) {
						echo '<div class="nav-thumb is-nav-selected">'.wp_get_attachment_image( $v['image_id'], 'thumbnail' ).'</div>'; }

					$i = 1;
					foreach ( $jsonGallery["sortable"] as $a ) {
						$addClass = "";
						if ($i == 1 && !$prodImage) { $addClass = "is-nav-selected"; }
						echo '<div class="nav-thumb '.esc_attr($addClass).'">'.wp_get_attachment_image( $a['id'], 'thumbnail' ).'</div>';
						$i++;
					}
					echo '</div></div>';
				}

			} else if ($defaultGallery) {
				
				$thumb = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'thumbnail' );
				echo '<div class="flickity-carousel product-gallery variation-gallery '.esc_attr($galleryType).'" data-variation="'.$name.'" data-gallery="'.$slug.'"  data-thumb="'.esc_url($thumb[0]).'">';

				if ($prodImage && $v['image_id']) {
					$image = wp_get_attachment_image_src( $v['image_id'], 'kona-thumb-big' );
					echo '
						<div class="carousel-item">
							<div class="product-image">';
								if ($zoom) { echo '<span class="zoomF">'; }
								echo '<img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-flickity-lazyload="'.esc_url($image[0]).'" width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" alt="'.esc_attr(get_the_title($v['image_id'])).'" />';
								if ($zoom) { echo '</span>'; }
					echo '
							</div>
						</div>
					';
				}

				foreach ( $defaultGallery as $a ) {
					echo '
						<div class="carousel-item">
							<div class="product-image">';
								if ($zoom) { echo '<span class="zoomF">'; }
								echo wp_get_attachment_image( $a, 'kona-thumb-big' );
								if ($zoom) { echo '</span>'; }
					echo '
							</div>
						</div>
					';
				}
				echo '</div>';
				
				// thumbs
				if ($galleryType == "gallery-thumb" && (count($defaultGallery) > 1 || (count($defaultGallery) && $prodImage && $v['image_id']) )) {
					echo '<div class="product-nav variation-thumbs" data-variation="'.$name.'" data-gallery="'.$slug.'"><div class="productnav-inner">';

					if ($prodImage && $v['image_id']) {
						echo '<div class="nav-thumb is-nav-selected">'.wp_get_attachment_image( $v['image_id'], 'thumbnail' ).'</div>'; }

					$i = 1;
					foreach ( $defaultGallery as $a ) {
						$addClass = "";
						if ($i == 1 && !$prodImage) { $addClass = "is-nav-selected"; }
						echo '<div class="nav-thumb '.esc_attr($addClass).'">'.wp_get_attachment_image( $a, 'thumbnail' ).'</div>';
						$i++;
					}
					echo '</div></div>';
				}
				
			}
			
			
		} else if ($v['image_id'] && $v['image_id'] !== get_post_thumbnail_id( $post->ID )) {
			// write static image
			
			$thumb = wp_get_attachment_image_src( $v['image_id'], 'thumbnail' ); // thumb is for fixed product add			
			echo '<div class="product-gallery variation-gallery" data-variation="'.$name.'" data-gallery="'.$slug.'" data-thumb="'.esc_url($thumb[0]).'">';
			$image = wp_get_attachment_image_src( $v['image_id'], 'kona-thumb-big' );
			echo '
			<div class="product-image">';
				if ($zoom) { echo '<span class="zoomF">'; }
				echo '<img src="'.esc_url($image[0]).'" width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" alt="'.esc_attr(get_the_title($v['image_id'])).'"  />';
				if ($zoom) { echo '</span>'; }
			echo '</div>';	
			echo '</div>';
			
			$mainGallery = false;
		} else {
			$mainImage = true;
			if ($vI == 0) { $mainFirstShow = true; }
		}
		$vI++;
		
	} // END foreach
} // END if variable

if ($mainImage) {
	
	$defaultGallery = $product->get_gallery_image_ids();
	$srGallery = get_post_meta( get_the_ID() , '_sr_prodgallery', true);
	
	$firstClass = "";
	if ($mainFirstShow) { $firstClass = "first-shown"; }
	
	if ($srGallery && $mainGallery) {
		// write main gallery
		
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); // thumb is for fixed product add			
		$srGallery = json_decode($srGallery,true);
		
		$galleryClass = $galleryType;
		if (count($srGallery["sortable"]) < 2 && !$prodImage) { $galleryClass = "gallery-empty"; }

		echo '<div class="flickity-carousel product-gallery variation-gallery main '.esc_attr($firstClass).' '.esc_attr($galleryClass).'" data-variation="main" data-gallery="main" data-thumb="'.esc_url($thumb[0]).'">';
		
		if ($prodImage) {
			echo '
				<div class="carousel-item">
					<div class="product-image">';
						if ($zoom) { echo '<span class="zoomF">'; }
						echo get_the_post_thumbnail( $post->ID, 'kona-thumb-big' );
						if ($zoom) { echo '</span>'; }
			echo '
					</div>
				</div>
			';
		}
		
		foreach ( $srGallery["sortable"] as $a ) {
			$addClass = "";
			if (isset($a['size']) && $a['size']) { $addClass = $a['size']; }
			
			$image = wp_get_attachment_image_src( $a['id'], 'kona-thumb-big' );
			echo '
				<div class="carousel-item">
					<div class="product-image '.esc_attr($addClass).'">';
						if ($zoom) { echo '<span class="zoomF">'; }
						
						echo '<img ';
						if ($galleryClass == 'gallery-empty') { //for zoom if there is only 1 gallery image
							echo 'src="'.esc_url($image[0]).'"';
						} else {
							echo 'src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-flickity-lazyload="'.esc_url($image[0]).'"';						}
						echo ' width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" alt="'.esc_attr(get_the_title($a['id'])).'" />';
						if ($zoom) { echo '</span>'; }
			echo '
					</div>
				</div>
			';
		}
		echo '</div>';
		
		// thumbs
		if ($galleryType == "gallery-thumb" && (count($srGallery["sortable"]) > 1 || (count($srGallery["sortable"]) && $prodImage) )) {
			echo '<div class="product-nav variation-thumbs main" data-variation="main" data-gallery="main"><div class="productnav-inner">';
			
			if ($prodImage) { echo '<div class="nav-thumb is-nav-selected">'.get_the_post_thumbnail( $post->ID, 'thumbnail' ).'</div>'; }
			
			$i = 1;
			foreach ( $srGallery["sortable"] as $a ) {
				$addClass = "";
				if ($i == 1 && !$prodImage) { $addClass = "is-nav-selected"; }
				echo '<div class="nav-thumb '.esc_attr($addClass).'">'.wp_get_attachment_image( $a['id'], 'thumbnail' ).'</div>';
				$i++;
			}
			echo '</div></div>';
		}

	} else if ($defaultGallery && $mainGallery) {
		// write main gallery
		
		$thumb = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'thumbnail' );
		echo '<div class="flickity-carousel product-gallery variation-gallery main '.esc_attr($firstClass).' '.esc_attr($galleryType).'"  data-variation="main" data-gallery="main" data-thumb="'.esc_url($thumb[0]).'">';
		
		if ($prodImage) {
			echo '
				<div class="carousel-item">
					<div class="product-image">';
						if ($zoom) { echo '<span class="zoomF">'; }
						echo get_the_post_thumbnail( $post->ID, 'kona-thumb-big' );
						if ($zoom) { echo '</span>'; }
			echo '
					</div>
				</div>
			';
		}
		
		foreach ( $defaultGallery as $a ) {
			echo '
				<div class="carousel-item">
					<div class="product-image">';
						if ($zoom) { echo '<span class="zoomF">'; }
						echo wp_get_attachment_image( $a, 'kona-thumb-big' );
						if ($zoom) { echo '</span>'; }
			echo '
					</div>
				</div>
			';
		}
		echo '</div>';
		
		
		if ($galleryType == "gallery-thumb" && (count($defaultGallery) > 1 || (count($defaultGallery) && $prodImage) )) {
			echo '<div class="product-nav variation-thumbs main" data-variation="main"  data-gallery="main"><div class="productnav-inner">';
			
			if ($prodImage) { echo '<div class="nav-thumb is-nav-selected">'.get_the_post_thumbnail( $post->ID, 'thumbnail' ).'</div>'; }
			
			$i = 1;
			foreach ( $defaultGallery as $a ) {
				$addClass = "";
				if ($i == 1 && !$prodImage) { $addClass = "is-nav-selected"; }
				echo '<div class="nav-thumb '.esc_attr($addClass).'">'.wp_get_attachment_image( $a, 'thumbnail' ).'</div>';
				$i++;
			}
			echo '</div></div>';
		}
	} else if (has_post_thumbnail()) {
		$thumb = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'thumbnail' );
		echo '
			<div class="product-gallery variation-gallery main '.esc_attr($firstClass).'" data-thumb="'.esc_url($thumb[0]).'">
				<div class="product-image">';
					if ($zoom) { echo '<span class="zoomF">'; }
					echo get_the_post_thumbnail( $post->ID, 'kona-thumb-big' );
					if ($zoom) { echo '</span>'; }
		echo '
				</div>
			</div>';
	}
	
} // END if $mainImage


?>