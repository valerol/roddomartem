<form id="search" class="search-form" action="search.php" method="GET" accept-charset="utf-8">
	<input type="text" value="<?php echo get_search_query() ?>" name="s"/>
	<a onclick="document.getElementById('search').submit()">
		<div class="search_icon"></div>
	</a>
</form>