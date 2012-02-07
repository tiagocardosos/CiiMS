<?
	            	$content = Yii::app()->db->createCommand('SELECT * FROM content WHERE vid = (SELECT vid FROM content AS content2 WHERE content2.id = content.id) AND type_id = 2 ORDER BY created ASC LIMIT 0,3')->execute();
			
			print_r($content);
	            ?>
	            <? /*<div class="inner clearfix">

            <div class="inner-t">
                <div class="heading">
                   <h3>Why pick Us</h3>
                </div>

                <div class="icons">
                    <div class="col1-6">
                        <img class="icn" src="images/felis/icn1.png" alt="">

                        <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet</p><a href="#" class="button"><span>More<img src="images/felis/arr.gif" alt=""></span></a>
                    </div>

                    <div class="col1-6">
                        <img class="icn" src="images/felis/icn2.png" alt="">

                        <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod</p><a href="#" class="button"><span>More<img src="images/felis/arr.gif" alt=""></span></a>
                    </div>

                    <div class="col1-6">
                        <img class="icn" src="images/felis/icn3.png" alt="">

                        <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur</p><a href="#" class="button"><span>More<img src="images/felis/arr.gif" alt=""></span></a>
                    </div>

                    <div class="col1-6">
                        <img class="icn" src="images/felis/icn4.png" alt="">

                        <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet</p><a href="#" class="button"><span>More<img src="images/felis/arr.gif" alt=""></span></a>
                    </div>

                    <div class="col1-6">
                        <img class="icn" src="images/felis/icn5.png" alt="">

                        <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod</p><a href="#" class="button"><span>More<img src="images/felis/arr.gif" alt=""></span></a>
                    </div>

                    <div class="col1-6 omega">
                        <img class="icn" src="images/felis/icn6.png" alt="">

                        <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur</p><a href="#" class="button"><span>More<img src="images/felis/arr.gif" alt=""></span></a>
                    </div>
                </div>
            </div>
</div>

        <div class="shady bott-27"></div>

        <div class="inner clearfix">
            <div class="inner-t">
            	<div class="col1-3">
        	        <div class="heading">
    	                <h3>Our latest works</h3>
	                </div>
	                <p>Ut enim ad minima veniam, quis nostrum
<strong>exercitationem</strong> ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</p>
					<div class="content-slider-nav">
						<div class="jFlow-arrows">
							<span class="jFlowPrev"></span>
							<span class="jFlowNext"></span>
							<div id="myController">
								<span class="jFlowControl"></span>
								<span class="jFlowControl"></span>
								<span class="jFlowControl"></span>
							</div>
						</div>
					</div>
            	</div>
				<div class="jflow-content-slider">
					<div id="slides">
						<div class="slide-wrapper">
							<div class="col1-3">
								<div class="item-holder">
									<div class="proj-img">
                            			<a href="images/felis/content/img300x145-2.jpg" class="prettyPhoto zoom"></a>
                           				<a href="works-single.html"></a>
                            			<img class="l-w" src="images/felis/content/img300x145-2.jpg" alt="">
                            			<i></i>
                            		</div>
                            		<div class="descr">
                            			<a href="works-single.html"><h5>Nam libero tempore, cum soluta</h5></a>
                            			<p>At vero eos et accusamus et iusto odio[..]</p>
                            		</div>
								</div>
							</div>
							<div class="col1-3 omega">
								<div class="item-holder">
									<div class="proj-img">
                            			<a href="images/felis/content/img300x145.jpg" class="prettyPhoto zoom"></a>
                           				<a href="works-single.html"></a>
                            			<img class="l-w" src="images/felis/content/img300x145.jpg" alt="">
                            			<i></i>
                            		</div>
                            		<div class="descr">
                            			<a href="works-single.html"><h5>Nam libero tempore, cum soluta</h5></a>
                            			<p>At vero eos et accusamus et iusto odio[..]</p>
                            		</div>
								</div>
							</div>
						</div>
						<div class="slide-wrapper">
							<div class="col1-3">
								<div class="item-holder">
									<div class="proj-img">
                            			<a href="images/felis/content/img300x145-1.jpg" class="prettyPhoto zoom"></a>
                           				<a href="works-single.html"></a>
                            			<img class="l-w" src="images/felis/content/img300x145-1.jpg" alt="">
                            			<i></i>
                            		</div>
                            		<div class="descr">
                            			<a href="works-single.html"><h5>Nam libero tempore, cum soluta</h5></a>
                            			<p>At vero eos et accusamus et iusto odio[..]</p>
                            		</div>
								</div>
							</div>
							<div class="col1-3 omega">
								<div class="item-holder">
									<div class="proj-img">
                            			<a href="images/felis/content/img300x145-3.jpg" class="prettyPhoto zoom"></a>
                           				<a href="works-single.html"></a>
                            			<img class="l-w" src="images/felis/content/img300x145-3.jpg" alt="">
                            			<i></i>
                            		</div>
                            		<div class="descr">
                            			<a href="works-single.html"><h5>Nam libero tempore, cum soluta</h5></a>
                            			<p>At vero eos et accusamus et iusto odio[..]</p>
                            		</div>
								</div>
							</div>
						</div>
						<div class="slide-wrapper">
							<div class="col1-3">
								<div class="item-holder">
									<div class="proj-img">
                            			<a href="images/felis/content/img300x145.jpg" class="prettyPhoto zoom"></a>
                           				<a href="works-single.html"></a>
                            			<img class="l-w" src="images/felis/content/img300x145.jpg" alt="">
                            			<i></i>
                            		</div>
                            		<div class="descr">
                            			<a href="works-single.html"><h5>Nam libero tempore, cum soluta</h5></a>
                            			<p>At vero eos et accusamus et iusto odio[..]</p>
                            		</div>
								</div>
							</div>
							<div class="col1-3 omega">
								<div class="item-holder">
									<div class="proj-img">
                            			<a href="images/felis/content/img300x145-4.jpg" class="prettyPhoto zoom"></a>
                           				<a href="works-single.html"></a>
                            			<img class="l-w" src="images/felis/content/img300x145-4.jpg" alt="">
                            			<i></i>
                            		</div>
                            		<div class="descr">
                            			<a href="works-single.html"><h5>Nam libero tempore, cum soluta</h5></a>
                            			<p>At vero eos et accusamus et iusto odio[..]</p>
                            		</div>
								</div>
							</div>
						</div>
					</div>
				</div>				
			</div>
        </div>

        <div class="shady bott-27"></div>
*/ ?>

        <div class="inner-blank clearfix">
        	<div class="col1-3">
        	    <div class="heading">
    	        	<h3>Social</h3>
	            </div>
				<p><? echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/social-icons/twitter-icon.png'), '#', array('title'=>'twitter', 'style'=>'float:left;'));?>
					<span>See what people are saying and join the conversation.</span>
				</p>
				<div class="cBoth"></div>
				<br />
				<br />
				<p><? echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/social-icons/facebook-icon.png'), '#', array('title'=>'facebook', 'style'=>'float:left;'));?>
					<span>Engage in our community of fellow developers.</span>
				</p>
				<div class="cBoth"></div>
				<br />
				<br />
				<p><? echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/social-icons/google-icon.png'), '#', array('title'=>'google+', 'style'=>'float:left;'));?>
					<span>Check us out on Google+.</span>
				</p>
				<div class="cBoth"></div>
        	</div>
        	<div class="col2-3 omega">
        	    <div class="heading">
    	        	<h3>Latest Blog Posts</h3>
	            </div>
	            
	            <div class="post-mod">
   	        		<a href="blog-single.html" class="date-comments">
   	        			<div>
   	        			20 Dec,<br />
   	        			2011
   	        			</div>
   	        			<span>05</span>
   	        		</a>
   	        		<h6><a href="blog-single.html">Et harum quidem rerum facilis est et expedita distinctio</a></h6>
   	        		<p>Posted by <strong><a href="#">Fireform</a></strong> in <a href="#" class="clr-link">Commercials</a><img class="ml-10" src="images/felis/pencil.gif" alt=""></p>
   	        	</div>
	            <div class="post-mod">
   	        		<a href="blog-single.html" class="date-comments">
   	        			<div>27 Nov,<br />2011</div><span>79</span>
   	        		</a>
   	        		<h6><a href="blog-single.html">Temporibus autem quibusdam et aut officiis debitis</a></h6>
   	        		<p>Posted by <strong><a href="#">Fireform</a></strong> in <a href="#" class="clr-link">Landed</a><img class="ml-10" src="images/felis/pencil.gif" alt=""></p>
   	        	</div>
	            <div class="post-mod">
   	        		<a href="blog-single.html" class="date-comments">
   	        			<div>25 Nov,<br />2011</div><span>26</span>
   	        		</a>
   	        		<h6><a href="blog-single.html">Nam libero tempore, cum soluta nobis est eligendi optio cumque</a></h6>
   	        		<p>Posted by <strong><a href="#">Fireform</a></strong> in <a href="#" class="clr-link">Landed</a><img class="ml-10" src="images/felis/pencil.gif" alt=""></p>
   	        	</div>
        	</div>
        </div>
