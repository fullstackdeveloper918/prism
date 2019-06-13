<?php 

/* Template Name: ShopPage Template */ 

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

	
do_action( 'woocommerce_before_main_content' );

//require('wp-blog-header.php');
?>

<header class="woocommerce-products-header">
	
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>

<ul class="products">
    <?php
        $args = array( 'post_type' => 'product', 'posts_per_page' => 3, 'orderby' => 'id','order' => 'asc' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                <li class="product">    
                    <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                        <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
                        <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>
                        <h3><?php the_title(); ?></h3>
                        <span class="price"><?php echo $product->get_price_html(); ?></span>
                    </a>
					
						<?php
						$proid =  get_the_id();	
						if($proid == '6461'){
						
						 echo do_shortcode('[AC_PRO id=106]'); 
						 
						 
					   }elseif($proid == '6471'){
						  
						  
						 echo do_shortcode('[AC_PRO id=104]');
						  
					   
					   }
  					 ?>
                <?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
                </li>

    <?php endwhile; ?>
    <?php wp_reset_query(); ?>
</ul><!--/.products-->



<?php
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );

	