<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div>
        <label class="screen-reader-text" for="s"><?php esc_html_e( 'Search for:', 'kona' ); ?></label>
        <input type="text" value="" name="s" id="s" placeholder="<?php esc_attr_e( 'Enter your search ...', 'kona' ); ?>" />
        <input type="submit" id="searchsubmit" value="Search" />
    </div>
</form>