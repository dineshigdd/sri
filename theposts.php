<article class="post">
	<?php if ( has_post_thumbnail() ) { ?>
        <div class="small-thumbnail">
            <a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'small-thumbnail' ); ?></a>
        </div>
	<?php } ?>
    <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
      <!--  F to denote the month, the jS to indicate the day with a suffix, and Y for the year. -->
    <p class="post-meta"><?php the_time( 'F jS, Y' ); ?> | <a
                href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
        | <?php
		$categories = get_the_category();
		$comma      = ', ';
		$output     = '';
		
		if ( $categories ) {
			foreach ( $categories as $category ) {
				$output .= '<a href="' . get_category_link( $category->term_id ) . '">' . $category->cat_name . '</a>' . $comma;
			}
			echo trim( $output, $comma );
		} ?>
    </p>
    <p>
		<?php echo get_the_excerpt() ?>
        <a href="<?php the_permalink() ?>">Read more &raquo</a>
    </p>
</article>