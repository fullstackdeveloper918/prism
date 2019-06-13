<?php
if (!isset($style)) { $style = get_option('_sr_bloggridstyle'); }
if (!isset($columns)) { $columns = get_option('_sr_bloggridcolumns'); }

$excerpt= 16;
$format = get_post_format(); if( false === $format ) { $format = 'standard'; }

if (!isset($readmore)) { $readmore = get_option('_sr_bloggridreadmore'); }
if (!isset($date)) { $date = get_option('_sr_bloggriddate'); }
if (!isset($categoryshow)) { $categoryshow = get_option('_sr_bloggridcategory'); }
if (!isset($introshow)) { $introshow = get_option('_sr_bloggridintro'); }
if (!isset($unveil)) { $unveil = get_option('_sr_bloggridunveil'); }
if (!isset($lazy)) { $lazy = true; }
if (!isset($titlesize)) { $titlesize = get_option('_sr_bloggridtitlesize'); }

// DEFAULTS
if ($columns == "") { $columns = 2; }
if ($readmore == "") { $readmore = true; }
if ($date == "") { $date = true; }
if ($categoryshow == "") { $categoryshow = true; }
if ($introshow == "") { $introshow = true; }
if ($unveil == "") { $unveil = "do-anim-modern"; }
if ($titlesize == "") { $titlesize = 'h4'; }

// Conditions for default pages
if ((is_tag() || is_search() || is_archive() || is_tax()) && !is_category()) { $date = false; $categoryshow = false; $is_default = true; }

// UNVEIL / ANIMATION
$anim = '';
if (isset($unveil) && $unveil) { $anim = $unveil; }
?>  
                    
                    <div <?php post_class(); # post classes are added via theme-general-features ?>>
                        <div class="blog-item-inner item-inner <?php if ($anim == "do-anim") { echo esc_attr($anim); } ?>">
                            
							<?php if(has_post_thumbnail()) { ?>
                            <div class="blog-media item-media <?php if ($anim == "do-anim-modern") { echo esc_attr($anim); } ?>">
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
									
									if ($style == "equal") {
										$imgsrc = 'src="'.esc_url($image1280crop[0]).'"';
										$imgsrcset = array();
										$imgsrcset[] = esc_url($image1280crop[0]).' '.esc_attr($image1280crop[1]).'w';
										$imgsrcset[] = esc_url($image640crop[0]).' '.esc_attr($image640crop[1]).'w';
										$imgsizes = 'sizes="(max-width: '.esc_attr($image1280crop[1]).'px) 100vw, '.esc_attr($image1280crop[1]).'px"';
										$imgWidthHeight = 'width="'.esc_attr($image1280crop[1]).'" height="'.esc_attr($image1280crop[2]).'"';
									}
								} else if ($columns == '3') {
									$imgsrc = 'src="'.esc_url($image960[0]).'"';
									$imgsrcset[] = esc_url($image960[0]).' '.esc_attr($image960[1]).'w';
									$imgsrcset[] = esc_url($image640[0]).' '.esc_attr($image640[1]).'w';
									$imgsizes = 'sizes="(max-width: '.esc_attr($image960[1]).'px) 100vw, '.esc_attr($image960[1]).'px"';
									$imgWidthHeight = 'width="'.esc_attr($image960[1]).'" height="'.esc_attr($image960[2]).'"';
									
									if ($style == "equal") {
										$imgsrc = 'src="'.esc_url($image960crop[0]).'"';
										$imgsrcset = array();
										$imgsrcset[] = esc_url($image960crop[0]).' '.esc_attr($image960crop[1]).'w';
										$imgsrcset[] = esc_url($image640crop[0]).' '.esc_attr($image640crop[1]).'w';
										$imgsizes = 'sizes="(max-width: '.esc_attr($image960crop[1]).'px) 100vw, '.esc_attr($image960crop[1]).'px"';
										$imgWidthHeight = 'width="'.esc_attr($image960crop[1]).'" height="'.esc_attr($image960crop[2]).'"';
									}
								} else if ($columns == '4' || $columns == '5') {
									$imgsrc = 'src="'.esc_url($image640[0]).'"';
									$imgsrcset[] = esc_url($image640[0]).' '.esc_attr($image640[1]).'w';
									$imgsizes = 'sizes="(max-width: '.esc_attr($image640[1]).'px) 100vw, '.esc_attr($image640[1]).'px"';
									$imgWidthHeight = 'width="'.esc_attr($image640[1]).'" height="'.esc_attr($image640[2]).'"';
									
									if ($style == "equal") {
										$imgsrc = 'src="'.esc_url($image640crop[0]).'"';
										$imgsrcset = array();
										$imgsrcset[] = esc_url($image640crop[0]).' '.esc_attr($image640crop[1]).'w';
										$imgsizes = 'sizes="(max-width: '.esc_attr($image640crop[1]).'px) 100vw, '.esc_attr($image640crop[1]).'px"';
										$imgWidthHeight = 'width="'.esc_attr($image640crop[1]).'" height="'.esc_attr($image640crop[2]).'"';
									}
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
                               	<?php if ($date || $categoryshow) {?><div class="info-top"><?php } ?>
                                <?php if ($date) { ?><span class="post-date"><?php echo get_the_date(); ?></span><?php } ?>
                                <?php if ($categoryshow && kona_getCategory()) { echo '<div class="post-cat">'.kona_getCategory(3).'</div>'; } ?>
								<?php if ($date || $categoryshow) {?></div><?php } ?>
                                <h3 class="post-name <?php echo esc_attr($titlesize); ?>"><a href="<?php esc_url(the_permalink()); ?>">
                                	<?php the_title(); ?>
                                </a></h3>
                                
                                <?php if ($introshow) { ?>
                                <div class="post-content">
                                <?php
								if ($format == 'quote' || $format == 'link') { the_content(); } else if (!isset($is_default)) { echo wp_kses_post(kona_content('excerpt', $excerpt, $readmore)); } ?>
								</div>
                              	<?php } ?>
                            </div>
						
                        </div>
                    </div>