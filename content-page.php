<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Awaken
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div id="top-right-content-widget" class="col-xs-12 col-md-6">
        <?php if(is_front_page()) :?>
        <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('top-left-frontpage')) : else : ?>
            <div class="col-xs-12 square-checkered-box"></div>
     
        <?php endif; ?>
        <?php endif;?>

        <!-- Carousel Widget Here -->
    </div>
	<div class="entry-content col-xs-12 <?php if(is_front_page()):?>col-md-6<?php endif ?>">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'awaken' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
<?php if(is_front_page()) :?>
       <?php include 'includes/program-info.php';?>
<?php endif; ?>


    
	<footer class="page-entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
