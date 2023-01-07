<form role="search" method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="searchform-items">
		<input type="search" class="searchinput" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" placeholder="Search" />
	</div><!-- searchform-items -->
</form><!-- searchform -->
