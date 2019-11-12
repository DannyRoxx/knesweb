<div class="widget-content">
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<div class="search-input input-group">
<input aria-label="<?php esc_attr_e( 'Search this blog', 'nosh-stw' ); ?>" autocomplete="off" class="form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'nosh-stw' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
<div class="input-group-append">
<input class="btn-nosh" type="submit" value=" <?php echo esc_attr_x( 'Search', 'submit button', 'nosh-stw' ); ?>">
</div>
</div>
</form>
</div>