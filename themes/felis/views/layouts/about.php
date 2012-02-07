<?php $this->beginContent('//layouts/main'); ?>
        <div class="shady bott-27"></div>

        <div class="inner clearfix">
            <div class="inner-t">
            	<div class="col1-3">
                	<div class="heading">
                   		<h3>Our Team</h3>
                	</div>
                	<p>
                		This is our current team.
                	</p>
                	</div>
				<div class="team">
					<div class="item-holder1">
						<div class="proj-img1">
							<img class="o-t" src="images/content/img140x105-1.jpg" alt="">
						</div>
					    	<div class="descr">
						    	<h5>Charles Portwood</h5>
				    	        	<p class="clr">CEO / Founder</p>
						    	<p>About Me</p>
			    	                </div>
							<div class="team-social">
								<? echo CHtml::link('<span>'.CHtml::image('images/felis/twitter-icn.png').'</span>', array('#'), array('class'=>'button-t-s')); ?>
								<? echo CHtml::link('<span>'.CHtml::image('images/felis/in-icn.png').'</span>', array('#'), array('class'=>'button-t-s')); ?>
							</div>
					</div>
				</div>
            </div>
        </div>

        <div class="shady bott-27"></div>

        <div class="inner-blank clearfix">
        	<div class="col1-3">
        	    <div class="heading">
    	        	<h3>About Ethreal</h3>
	            </div>
				<p class="bott-15">Ethreal is a compnay dedicated to providing high quality software in the Cloud. Founded in 2012 by entrepenuer Charles Portwood, Ethreal was build on the idea that applications should be powerful, useful, and accesable from anywhere.</p>
        	</div>
        	<div class="col2-3 omega">
        	    <div class="heading">
    	        	<h3>Our Commitment</h3>
	            </div>
	            <p>Our promise is simple; to provide innovative applications accessible through the cloud, to continue innovating existing and future products, and to provide high quality applications that you can be proud to work with. As we grow, we promise to remain loyal to our customers and clients, and to provide the highest quality customer service to the people who make us possible.</p>
	        </div>
        </div>
<?php $this->endContent(); ?>
            
