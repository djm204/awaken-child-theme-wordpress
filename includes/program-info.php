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
                <div id="clearfix-programs" class="clearfix"> </div>
            </div>
            <!--- programs-grids --->

        </div>
    </div>
    <!--- programs --->