<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x( __('Search for:','sofiascoutkar'), 'label' ) ?></span><!--TARNSLATE-->
        <input type="search" class="search-field"
            placeholder="<?php echo esc_attr_x( __('Search...','sofiascoutkar'), 'placeholder' ) ?>"  
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( __('Search for:','sofiascoutkar'), 'label' ) ?>" />
    </label>
    <input type="submit" class="search-submit"
        value="<?php echo esc_attr_x(  __('Search','sofiascoutkar'), 'submit button' ) ?>" />
</form><!--TARNSLATE-->