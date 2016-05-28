<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Awaken
 */
?>
		</div><!-- container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container-fluid">
			<div class="row body">
				<div class="footer-widget-area">
					<div class="col-md-4 footer-widget">
						<div class="left-footer">
							<div class="widget-area" role="complementary">
								<?php if ( ! dynamic_sidebar( 'footer-left' ) ) : ?>

								<?php endif; // end sidebar widget area ?>
							</div><!-- .widget-area -->
						</div>
					</div>
					
					<div class="col-md-4 footer-widget">
						<div class="mid-footer">
							<div class="widget-area" role="complementary">
								<?php if ( ! dynamic_sidebar( 'footer-mid' ) ) : ?>

								<?php endif; // end sidebar widget area ?>
							</div><!-- .widget-area -->						</div>
					</div>

					<div class="col-md-4 footer-widget">
						<div class="right-footer">
							<div class="widget-area" role="complementary">
								<?php if ( ! dynamic_sidebar( 'footer-right' ) ) : ?>

								<?php endif; // end sidebar widget area ?>
							</div><!-- .widget-area -->				
						</div>
					</div>						
				</div><!-- .footer-widget-area -->
			</div><!-- .row -->
		</div><!-- .container -->	

		<div class="footer-site-info">	
			<div class="container">
				<div class="row">

				<?php 
					$footer_copyright_text = get_theme_mod( 'footer_copyright_text', '' );
					if( !empty( $footer_copyright_text ) ) {
						echo wp_kses_post( $footer_copyright_text ); 
					} else { ?>
						<div class="col-xs-12 col-md-6 col-sm-6">				
							<!--- copy-right ---->

                <p>&copy; The Spanish Club of Winnipeg 1978 -
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                </p>

                
            <!--- copy-right ---->
						</div>
						<div class="col-xs-12 col-md-6 col-sm-6 fr">
                            <a href="#" id="toTop"> <span id="upToTop" class="glyphicon glyphicon-chevron-up back-to-top"> </span></a>

                            Designed by <a href="http://dev.desiratech.com" target="_blank">Desiratech Development</a>
						</div>
                        
				<?php } ?>
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
<script>
        new WOW().init();
    
function initialize() {
	var contentString = '<div class="google-address-info"><h5>Spanish Club of Winnipeg</h5>677 Selkirk Ave.<br/> Winnipeg, MB R2W 2N4 <br/><br/>'+
	'<a href="https://goo.gl/maps/Bg91V9QM99m" target="_blank">Open in Google Maps</a></div>'
  var infowindow = new google.maps.InfoWindow({
    content: contentString
  });
  var myCenter = {lat: 49.917986, lng: -97.151933};  
  var marker = new google.maps.Marker({
      position:myCenter,
  });
  
  var mapProp = {
    center:new google.maps.LatLng(49.917986,-97.151933),
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("spanishclub"),mapProp);
  marker.setMap(map);
  infowindow.open(map,marker);
  
}

google.maps.event.addDomListener(window, 'load', initialize);


//scrollToTop
var myID = document.getElementById("upToTop");

var myScrollFunc = function() {
    var y = window.scrollY;
    if (y >= 400) {
        myID.className = "glyphicon glyphicon-chevron-up back-to-top show"
    } else {
        myID.className = "glyphicon glyphicon-chevron-up back-to-top hide"
    }
};

window.addEventListener("scroll", myScrollFunc);</script>
</body>
</html>