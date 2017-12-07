<div class="search-btn">
	<a href="javascript:void(0);" class="search-trigger"><i class="icon-icons185"></i></a>
</div>
<div class="search-container">
    <i class="fa fa-times header-search-close"></i>
    <div class="search-overlay"></div>
    <div class="search">
        <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <label><?php esc_html_e( 'Search:', 'advisor' ); ?></label>
            <input type="text" value="<?php echo get_search_query(); ?>" name="s" placeholder="">
            <button><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>
