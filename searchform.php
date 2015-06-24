<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="hide screen-reader-text" for="s"><?php _e( 'Search for:', 'label' ); ?></label>
	<input type="search" placeholder="zoeken" class="search" value="<?php echo get_search_query(); ?>" name="s" id="s" />
	<input type="submit" id="searchsubmit" class="btn btn--search" value="&#xf002;" />
</form>
