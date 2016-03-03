 <!--- programs --->
    <div style= id="programs" class="programs">
        <div class="container-fluid">
            <div class="service-head text-center">
                <a href="#programs"><h2></h2></a>
                <span> </span>
            </div>

            <!--- programs-grids --->
            <div class="programs-grids text-center">
                <div class="col-sm-12 col-md-4">
                    <div class="program wow bounceIn" data-wow-delay="0.4s">
                        <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('program-info-1')) : else : ?>
                            <div class="col-xs-12 square-checkered-box"></div>
                    
                        <?php endif; ?>
                        <h3 class="program-button-red">Become A Member</h3>
                        <p>
                            Membership to our non-profit organization helps support and preserve the Spanish community and heritage in Winnipeg, continuing to bring us together whether it’s enjoying social gatherings, learning the Spanish language or being part of Sol de Espana Folklore dancers. We have numerous free member events thru-out the year. If you wish to register as a member fill out <a href="#">this form</a>.
                        </p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="program wow bounceIn" data-wow-delay="0.4s">
                        <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('program-info-2')) : else : ?>
                            <div class="col-xs-12 square-checkered-box"></div>
                    
                        <?php endif; ?>
                        
                        
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="program wow bounceIn" data-wow-delay="0.4s">
                        <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('program-info-3')) : else : ?>
                            <div class="col-xs-12 square-checkered-box"></div>
                    
                        <?php endif; ?>
                       
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <!--- programs-grids --->

        </div>
    </div>
    <!--- programs --->