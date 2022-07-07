<!-- Creating A Custom Page Template With page-slug-of-page.php
ex:page-about-us.php

There might be times when conditional logic is not the best choice for customizing your page. 
What if you want an entirely different layout for a specific page, but only for one specific page.
You don’t want these radical changes to apply to all pages on your site, just one. 
You can do that by creating a new file with the format of page-slug-of-page.php. 
So for example,let’s imagine we want a whole new layout just for the “About Us” page.
We can create a new file in our theme named page-about-us.php. 

-->
<?php

get_header();

if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>

        <article class="page-layout">
            <table border="0" width="100%">
                <tr>
                    <td width="30%"><h2><?php the_title() ?></h2></td>
                    <td><?php the_content() ?></td>
                </tr>
            </table>
        </article>
	
	<?php endwhile;

else :
	echo '<p>There are no pages!</p>';
endif;

get_footer();

?>