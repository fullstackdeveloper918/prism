<div class="row">	
    <div class="large-10 large-centered columns">    
        <div id="content" class="site-content" role="main">
        
            <section class="error-404 not-found">
                <header class="page-header">
                    <div class="error-banner"></div>
                    <h1 class="page-title"><?php _e( 'Nothing Found', 'shopkeeper' ); ?></h1>
                </header>

                <div class="page-content">                        
                    <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
                        <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'shopkeeper' ), admin_url( 'post-new.php' ) ); ?></p>                    
                    <?php elseif ( is_search() ) : ?>                    
                        <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'shopkeeper' ); ?></p>
                        <?php get_search_form(); ?>                    
                    <?php else : ?>                    
                        <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'shopkeeper' ); ?></p>
                        <?php get_search_form(); ?>                    
                    <?php endif; ?>

                </div><!-- .page-content -->
            </section><!-- .error-404 -->
            
        </div><!-- #content -->
    </div><!-- .large-12 .columns -->                
</div><!-- .row -->