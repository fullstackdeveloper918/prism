<div class="site-header">
    <?php
    if (auros_is_header_builder()) {
        auros_the_header_builder();
    } else {
        $container = get_theme_mod('osf_header_width', false) ? 'container-fluid' : 'container';
        ?>
        <div id="opal-header-content" class="header-content">
            <div class="custom-header <?php echo esc_attr($container) ?>">
                <div class="header-main-content w-100 d-flex align-items-center<?php echo get_theme_mod('osf_header_layout_is_sticky', false) ? ' opal-element-sticky' : ''; ?>">
                    <?php get_template_part('template-parts/header/site', 'branding'); ?>
                    <?php if (has_nav_menu('top')) : ?>
                        <div class="navigation-top">
                            <?php get_template_part('template-parts/header/navigation'); ?>
                        </div><!-- .navigation-top -->
                    <?php endif; ?>
                    <div class="header-group">
                        <div class="header-search">
                            <a class="opal-icon-search3 search-button" aria-hidden="true" data-search-toggle="toggle"
                               data-target="#header-search-form"></a>
                            <div id="#header-search-form">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                        <?php get_template_part('template-parts/header/account'); ?>
                        <?php if (auros_is_Woocommerce_activated()) : ?>
                            <div class="site-header-cart menu">
                                <?php if (!class_exists('AurosCore')):
                                    echo auros_cart_link();
                                else:
                                    echo osf_cart_link();
                                endif;
                                ?>
                                <ul class="shopping_cart">
                                    <li>
                                        <?php the_widget('WC_Widget_Cart', 'title='); ?>
                                    </li>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
