<?php
get_header();

    if( have_posts()){
        while ( have_posts()){
            the_post();
            /* What this line of code will now do is, instead of always looking for a file named theposts.php 
            to handle rendering posts in the loop, WordPress will now try to figure out the post format and 
            dynamically choose which file to use to render the post. */
            get_template_part( 'theposts' ,  get_post_format()  );
        }
    }
    else{
        echo '<p>There are no posts !</p>';
    }
    
get_footer();
?>