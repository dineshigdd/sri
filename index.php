<?php
get_header();

    if( have_posts()):
        while ( have_posts()) : the_post(); ?>
            <article class="post">
                <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                <!--  F to denote the month, the jS to indicate the day with a suffix, and Y for the year. -->
                <p class="post-meta"><?php the_time('F jS, Y'); ?> | 
                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')); ?>">
                    <?php the_author();?></a>
                    |
                    <?php 
                        $categories = get_the_category();
                        $comma = ', ';
                        $output = '';

                        if( $categories ){
                            foreach( $categories as $category ){
                                $output .= '<a href="' . get_category_link( $category-> term_id ). '">'. $category-> cat_name. '</a>' . $comma;
                            }

                            echo trim( $output, $comma );
                        }
                    ?>
                </p>
                  <!--Add excerpt link with a custom text -->
                <p>                  
				<?php echo get_the_excerpt() ?> 
                <a href="<?php the_permalink() ?>">Read more &raquo</a>
                </p>
            </article>
        <?php endwhile;    
    else :?>
        <p>There are no posts !</p>
    <?php endif; 
get_footer();
?>