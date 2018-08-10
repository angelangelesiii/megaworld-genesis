<!-- SEARCH FORM -->
<form action="/" method="GET" class="search-form grid-x">
	<input type="search" name="s" class="cell auto search-textbox" value="<?php the_search_query(); ?>" placeholder="Search something..."/>
	<button type="submit" class="search-submit cell shrink"><i class="fas fa-search"></i></button>
</form>
