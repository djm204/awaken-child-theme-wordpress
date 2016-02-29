<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Awaken
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="row">
	<div id="widgetized-area" class="col-xs-6">
        <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('widgetized-area')) : else : ?>

        <div class="pre-widget">
            <p><strong>Widgetized Area</strong></p>
            <p>This panel is active and ready for you to add some widgets via the WP Admin</p>
        </div>

        <?php endif; ?>

        <!-- Carousel Widget Here -->
    </div>
	<div class="entry-content col-xs-6">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'awaken' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</div><!-- row -->
    
	<footer class="page-entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
