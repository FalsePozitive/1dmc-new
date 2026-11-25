<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 1DMC
 */

get_header();
?>
<div class="cattitle">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				
				?>
			</div><!-- .page-header -->
	<!-- <main id="primary" class="site-main"> -->
    <div class="bgrid">
		<?php if ( have_posts() ) : ?>

			

			 <?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				//get_template_part( 'template-parts/content', get_post_type() ); ?>
				<div class="bgcard">
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title_attribute(); ?>">
                <?php endif; ?>
                <h5><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
                <p><?php echo wp_trim_words(get_the_excerpt(), 10); ?></p>
            </div>
			
		<?php	endwhile;?>
</div>
	<?php		the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?> 
	
	<!-- </main> -->
	<!-- #main -->

<?php

get_footer();
