<?php
// the page.php file is not mandatory to create a basic theme. If this file is not present, your pages will simply use the index.php
get_header();

if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>

        <article class="page-layout">
            <h2><?php the_title() ?></h2>
			<?php the_content() ?>
        </article>
	
	<?php endwhile;

else :
	echo '<p>There are no pages!</p>';
endif;

get_footer();

?>