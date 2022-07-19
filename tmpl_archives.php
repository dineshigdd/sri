<?php
/* Template Name: Archive Page Custom */

get_header();

if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>

        <article class="page-layout">
			<nav class="child-navigation-menu"> 
				<ul>
				<?php 
					$args = [
						'child_of' => get_the_top_ancestor_id(),
						'title_li' => '',
					];

					wp_list_pages( $args ); //displays a list of pages from your site in list format
				?>
				</ul>
			</nav>
            <h2><?php the_title() ?></h2>
			<?php get_template_part( 'content', 'tmpl_archives' ); ?>
        </article>
	
	<?php endwhile;

else :
	echo '<p>There are no pages!</p>';
endif;

get_footer();

?>