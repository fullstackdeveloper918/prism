<?php
$excerpt= 22;

// DEFAULTS
$columns = 3; 
$unveil = "do-anim-modern"; 
$lazy = true;
$titlesize = 'h5'; 

?>  
                    
                    <div class="blog-item isotope-item search-item">
                        <div class="blog-item-inner item-inner">
                            
							<?php if(has_post_thumbnail()) { ?>
                            <div class="blog-media item-media">
                                <a href="<?php esc_url(the_permalink()); ?>" class="thumb-hover scale">
                                
                               	<?php 
								// THUMBNAIL
								$thumb = get_post_thumbnail_id(get_the_ID());

								$imgsrcset = array();
								$imageFull = wp_get_attachment_image_src ($thumb,'full');
								$image1680 = wp_get_attachment_image_src ($thumb,'kona-thumb-ultra');
								$image1280 = wp_get_attachment_image_src ($thumb,'kona-thumb-big');
								$image1280crop = wp_get_attachment_image_src ($thumb,'kona-thumb-big-crop');
								$image960 = wp_get_attachment_image_src ($thumb,'kona-thumb-default');
								$image960crop = wp_get_attachment_image_src ($thumb,'kona-thumb-default-crop');
								$image640 = wp_get_attachment_image_src ($thumb,'kona-thumb-medium');
								$image640crop = wp_get_attachment_image_src ($thumb,'kona-thumb-medium-crop');

								if ($columns == '2') {
									$imgsrc = 'src="'.esc_url($image1280[0]).'"';
									$imgsrcset[] = esc_url($image1280[0]).' '.esc_attr($image1280[1]).'w';
									$imgsrcset[] = esc_url($image640[0]).' '.esc_attr($image640[1]).'w';
									$imgsizes = 'sizes="(max-width: '.esc_attr($image1280[1]).'px) 100vw, '.esc_attr($image1280[1]).'px"';
									$imgWidthHeight = 'width="'.esc_attr($image1280[1]).'" height="'.esc_attr($image1280[2]).'"';
								} else if ($columns == '3') {
									$imgsrc = 'src="'.esc_url($image960[0]).'"';
									$imgsrcset[] = esc_url($image960[0]).' '.esc_attr($image960[1]).'w';
									$imgsrcset[] = esc_url($image640[0]).' '.esc_attr($image640[1]).'w';
									$imgsizes = 'sizes="(max-width: '.esc_attr($image960[1]).'px) 100vw, '.esc_attr($image960[1]).'px"';
									$imgWidthHeight = 'width="'.esc_attr($image960[1]).'" height="'.esc_attr($image960[2]).'"';
									
								} else if ($columns == '4' || $columns == '5') {
									$imgsrc = 'src="'.esc_url($image640[0]).'"';
									$imgsrcset[] = esc_url($image640[0]).' '.esc_attr($image640[1]).'w';
									$imgsizes = 'sizes="(max-width: '.esc_attr($image640[1]).'px) 100vw, '.esc_attr($image640[1]).'px"';
									$imgWidthHeight = 'width="'.esc_attr($image640[1]).'" height="'.esc_attr($image640[2]).'"';
									
								}

								// for gifs
								if (strpos($imageFull[0], '.gif') !== false) { 
									$imgsrc = 'src="'.esc_url($imageFull[0]).'"';
									$imgsrcset = false;
									$imgsizes = 'sizes="(max-width: '.esc_attr($imageFull[1]).'px) 100vw, '.esc_attr($imageFull[1]).'px"';
									$imgWidthHeight = 'width="'.esc_attr($imageFull[1]).'" height="'.esc_attr($imageFull[2]).'"';
								}
								$imgsrcsetReturn = '';
								if ($imgsrcset) $imgsrcsetReturn = 'srcset="'.implode(",", $imgsrcset).'"';
															
								if ($lazy) {
								echo '<img class="lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-'.$imgsrc.' data-'.$imgsrcsetReturn.' data-'.$imgsizes.' '.$imgWidthHeight.' alt="'.esc_attr(get_the_title(get_post_thumbnail_id(get_the_ID()))).'" />';	
								} else {
								echo '<img '.$imgsrc.' '.$imgsrcsetReturn.' '.$imgsizes.' '.$imgWidthHeight.' alt="'.esc_attr(get_the_title(get_post_thumbnail_id(get_the_ID()))).'" />';	
								}
								?>
                                </a>
                            </div>
                            <?php } ?>
                            <div class="blog-info">
                               	<?php echo '<div class="info-top"><div class="post-cat">'.ucfirst(get_post_type()).'</div></div>'; ?>
                                <h3 class="post-name <?php echo esc_attr($titlesize); ?>"><a href="<?php esc_url(the_permalink()); ?>">
                                	<?php the_title(); ?>
                                </a></h3>
                                
                                <div class="post-content">
                                <?php echo wp_kses_post(kona_content('excerpt', $excerpt, false)); ?>
								</div>
                            </div>
						
                        </div>
                    </div>