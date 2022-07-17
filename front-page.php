<?php

get_header();

if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>

        <article class="page-layout">
            <nav class="child-navigation-menu children-links clearfix">
                <ul>
					<?php $args = [
						'child_of' => get_the_top_ancestor_id(),
						'title_li' => '',
					];
					wp_list_pages( $args ); ?>
                </ul>
            </nav>
			<?php the_content() ?>
        </article>
	
	<?php endwhile;

else :
	echo '<p>There are no pages!</p>';
endif; ?>
<!-- home-columns -->
<div class="home-columns clearfix">
    <div class="home-left">
        <h3>Recent JavaScript Articles</h3>
               
            <?php // Custom Loop using WP_Query to fetch JavaScript Posts
                $javascriptPosts = new WP_Query([ 'category_name' => 'javascript' ]);
               
                if( $javascriptPosts -> have_posts()):
                        
                    while( $javascriptPosts-> have_posts() ): $javascriptPosts-> the_post();
                            
                            get_template_part( 'theposts', get_post_format());
                    
                    endwhile;                
                else:    
                //     //no post message or some other feedback here
                endif;
                wp_reset_postdata();                   

            ?>
    </div>
    <div class="home-right">
            <h3>Recent PHP Articles</h3>
			<?php // Custom Loop using WP_Query to fetch PHP Posts
			$phpPosts = new WP_Query( [ 'category_name' => 'php' ] );
			if ( $phpPosts->have_posts() ):
				
				while ( $phpPosts->have_posts() ): $phpPosts->the_post();
					get_template_part( 'theposts', get_post_format() );
				endwhile;
			
			else:
				// no posts message or some other fallback here
			endif;
			wp_reset_postdata();
			?>
    </div>
</div>
<?php
get_footer();

?>
