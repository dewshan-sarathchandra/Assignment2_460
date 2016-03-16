<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package abc-sushi
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		
		 $query = new WP_Query( array('post_type' => 'movie-reviews', 'posts_per_page' => 5 ) );
			<?php if ( $query->have_posts() ) : ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php while ($query->have_posts()) : $query->the_post(); ?>

            <h1 class="entry-title"><?php the_title(); ?></h1> <!-- Queried Post Title -->
            <div class="entry-content">
                <?php the_excerpt(); ?> <!-- Queried Post Excerpts -->
            </div><!-- .entry-content -->

        <?php endwhile; //resetting the post loop ?>

        </div><!-- #post-<?php the_ID(); ?> -->
         <?php
        wp_reset_postdata(); //resetting the post query
        endif;
        ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
