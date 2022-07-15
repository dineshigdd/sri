<?php

get_header();

if ( have_posts() ) {
	?>
    <h2>Search results for query: "<?php the_search_query(); ?>"</h2>
	<?php
	while ( have_posts() ) {
		the_post();
		get_template_part( 'theposts' , get_post_format() );
	}
} else {
	echo '<p>No search results found!</p>';
}

get_footer();

?> 
