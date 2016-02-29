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
	<div class="entry-content col-xs-12 col-md-6">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'awaken' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
<?php if(is_front_page()) :?>
        <!--- services --->
    <div style= id="services" class="services">
        <div class="container">
            <div class="service-head text-center">
                <a href="#services"><h2>Core Services</h2></a>
                <span> </span>
            </div>

            <!--- services-grids --->
            <div class="services-grids text-center">
                <div class="col-md-4">
                    <div class="service-grid wow bounceIn" data-wow-delay="0.4s">
                        <span class="services-icon glyphicon glyphicon-cog"> </span>
                        <h3>Beautiful Designs</h3>
                        <p>
                            The look and feel of your website is crucial to the experience of your users. We will help design a site that is both elegant
                            and functional, leaving your clients breathless!
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-grid wow bounceIn" data-wow-delay="0.4s">
                        <span class="services-icon glyphicon glyphicon-wrench"> </span>
                        <h3>Web development</h3>
                        <p>
                            Need a web site or web application? Let's talk about it! We want to create something you can be proud of. Our expertise will
                            surely leave you satisfied.
                            <a href="#contact">Contact us</a> today for a basic consultation!
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-grid wow bounceIn" data-wow-delay="0.4s">
                        <span class="services-icon glyphicon glyphicon-question-sign"> </span>
                        <h3>Excellent Support</h3>
                        <p>
                            A healthy customer relationship is pivotal to the success of any business relationship. We strive to ensure the satisfaction
                            of all of our customers.
                        </p>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <!--- services-grids --->

        </div>
    </div>
    <!--- services --->
    <?php endif; ?>


    
	<footer class="page-entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
