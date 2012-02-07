<!DOCTYPE html>
<html lang="en">
<head>
	<title><? echo CHtml::encode($this->pageTitle); ?></title>
	<meta charset="utf-8">
	<? 
		$themeName 	= Yii::app()->theme->name; 
	   	$baseUrl 	= Yii::app()->request->baseUrl;
	   	$themeCSSUrl 	= "{$baseUrl}/css/{$themeName}/";
	   	$themeJSUrl 	= "{$baseUrl}/js/{$themeName}/";
	   	
	   	Yii::app()->clientScript->registerCssFile('http://fonts.googleapis.com/css?family=PT+Sans:400,700,700italic,400italic')
	   				->registerCssFile("{$themeCSSUrl}reset.css")
	   				->registerCssFile("{$themeCSSUrl}normalize.css")
	   				->registerCssFile("{$themeCSSUrl}styles1.css")
	   				->registerCssFile("{$themeCSSUrl}prettyPhoto.css")
	   				->registerCssFile("{$themeCSSUrl}tipSwift.css")
	   				->registerCssFile("{$themeCSSUrl}nivo-slider.css")
	   				->registerCssFile("{$themeCSSUrl}jFlicker.css");
	   	
	   	Yii::app()->clientScript->registerCoreScript('jquery')
	   				->registerCoreScript('jquery.ui')
	   				->registerScriptFile("{$themeJSUrl}jquery.easing.1.3.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.effects.core.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.prettyPhoto.js")
	   				->registerScriptFile("{$themeJSUrl}cufon-yui.js")
	   				->registerScriptFile("{$themeJSUrl}generated-fonts.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.preloader.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.nivo.slider.custom.js")
	   				->registerScriptFile("{$themeJSUrl}contactform.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.flow.1.2.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.tweet.js")
	   				->registerScriptFile("{$themeJSUrl}jflickr_0.3_min.js")
	   				->registerScriptFile("{$themeJSUrl}tipSwift.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.scrollTo-min.js")
	   				->registerScriptFile("{$themeJSUrl}column-height.js")
	   				->registerScriptFile("{$themeJSUrl}custom.js")
	   				->registerScriptFile("{$themeJSUrl}html5.js");	
	?>
</head>
<body>
    <div id="top-container">
    	<div class="shine-top"></div>
        <div class="top-wrap">
            <!-- header -->

            <header>
                <div class="top-info">
                    <div class="mini-menu">
                        <span class="mini float-l">
                        	<span>
                        		<? echo CHtml::link('Home', array('/')); ?>
                        		<? echo CHtml::image(Yii::app()->baseUrl.'/images/felis/v-sep.gif');?>
                        		<? echo CHtml::link('Sitemap', array('/sitemap')); ?>
                        	</span>
                        </span> 
                        <!-- <span class="phone">Toll free: +012 345 678 001</span> -->

                        <div class="search float-r">
                            <form id="search" method="get">
                                <div>
                                    <input class="field" type="text" placeholder="Search...">
                                </div>

                                <div class="search-btn">
                                    <input type="submit" value="">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="logo-menu">
                	<? echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/felis/content/logo.png'), array('/'), array('class'=>'logo')); ?>
			<? $this->widget('zii.widgets.CMenu',array(
				'id'=>'about-menu',
				'htmlOptions'=>array('class'=>'navmenu'),
				'items'=>array(
					array('label'=>'Home', 'url'=>array('/')),
					array('label'=>'About', 'url'=>array('/about')),
					array('label'=>'Projects', 'url'=>array('/projects')),
					array('label'=>'Contact', 'url'=>array('/contact')),
					array('label'=>'Community', 'url'=>array('/community'))
				))); 
			?>
                </div>
                <? if (isset($_GET['id']) && $_GET['id'] == 1 && Yii::app()->controller->id == 'content'): ?>
                <div class="main-slider">
                    <div id="slider" class="nivoSlider">
                    	<?
                    		foreach ($this->params['meta'] as $k=>$v)
                    		{
                    			if (substr($k,0,12) == 'slider_image')
                    			{
                    				echo CHtml::image(Yii::app()->baseUrl.'/'.$v['value'], '', array('title'=>'#htmlcaption'.substr($k,12)));
                    			}
                    		}
                    	?>
                    </div>

			<?
                    		foreach ($this->params['meta'] as $k=>$v)
                    		{
                    			if (substr($k,0,16) == 'slider_caption_h')
                    			{
                    				echo '<div id="htmlcaption'.substr($k,16).'" class="nivo-html-caption">';
                    				echo '<p>'.CHtml::link($v['value'], Yii::app()->createUrl('/'.strtolower($v['value'])), array('style'=>'color:white;')).'</p><span>'.$this->params['meta']['slider_caption_s' . substr($k,16)]['value'].'</span>';
                    				echo '</div>';
                    			}
                    		}
                    	?>
                </div>
                
		<? endif; ?>
            </header>
        </div>
        <div class="bottom-mask"></div>
    </div>
    
    <!-- content -->

    <section id="content">
    	<?php echo $content; ?>
    </section>
    
    <!-- footer -->

    <footer id="footer-wrap">
		<div class="inner-blank clearfix">
    		<div class="shine"></div>
    		<div class="top-mask"></div>
		 	<div class="col1-4">
		 		<h4>Ethreal <? echo CHtml::image(Yii::app()->baseUrl.'/images/felis/heading-bg-footer.gif'); ?></h4>
		 		<? $this->widget('zii.widgets.CMenu',array(
					'id'=>'about-menu',
					'items'=>array(
						array('label'=>'Home', 'url'=>array('/home')),
						array('label'=>'About', 'url'=>array('/about')),
						array('label'=>'Projects', 'url'=>array('/projects')),
						array('label'=>'Contact', 'url'=>array('/contact')),
						array('label'=>'Community', 'url'=>array('/community'))
					))); 
				?>
		 	</div>
		 	<div class="col1-4">
		 		<h4>Recent posts <? echo CHtml::image(Yii::app()->baseUrl.'/images/felis/heading-bg-footer.gif'); ?></h4>
				<ul class="recent-posts">
					<li><a href="#">Ut enim ad minima veniam</a></li>
					<li><a href="#">Quis nostrum</a></li>
					<li><a href="#">Exercitationem ullam corporis</a></li>
					<li><a href="#">Laboriosam, nisi ut aliquid ex</a></li>
					<li><a href="#">Consequatur quis autem vel</a></li>
					<li><a href="#">Reprehenderit qui in ea</a></li>
				</ul>
		 	</div>
		 	<div class="col1-4">
		 		<h4>Categories <? echo CHtml::image(Yii::app()->baseUrl.'/images/felis/heading-bg-footer.gif'); ?></h4>
				<ul class="arrows">
					<li><a href="#">Ut enim ad minima veniam</a></li>
					<li><a href="#">Quis nostrum</a></li>
					<li><a href="#">Exercitationem ullam corporis</a></li>
					<li><a href="#">Laboriosam, nisi ut aliquid ex</a></li>
					<li><a href="#">Consequatur quis autem vel</a></li>
				</ul>
		 	</div>
		 	<div class="col1-4 omega">
		 		<h4>Text widget <? echo CHtml::image(Yii::app()->baseUrl.'/images/felis/heading-bg-footer.gif'); ?></h4>
		 		<p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere.</p>
		 	</div>
		 </div>
		 	<div class="copyr-top"></div>
		 	<div class="copyr-spacer">
		 		<div class="inner-blank clearfix">
		 			<a href="#" class="totop" title="To top"></a>
		 			<span class="float-l">Copyright&copy; 2012 Ethreal Systems</span>
		 		<div class="float-r social">
					<span class="float-l">Check us out on these social networks</span>
					<ul class="float-r">
		 				<li><? echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/felis/twitter.png'), '#', array('title'=>'twitter'));?></li>
		 				<!-- <li><a href="#" title="Facebook"><img src="images/felis/facebook.png" alt=""></a></li> -->
		 				<!-- <li><a href="#" title="LinkedIn"><img src="images/felis/in.png" alt=""></a></li> -->
		 				<!-- <li><a href="#" title="Digg"><img src="images/felis/digg.png" alt=""></a></li> -->
		 				<!-- <li><a href="#" title="Flickr"><img src="images/felis/flickr.png" alt=""></a></li> -->
		 				<!-- <li><a href="#" title="Vimeo"><img src="images/felis/vimeo.png" alt=""></a></li> -->
		 				<!-- li><a href="#" title="YouTube"><img src="images/felis/youtube.png" alt=""></a></li> -->
		 			</ul>
		 		</div>
			</div>
		 </div>
    </footer>
    <script type="text/javascript">
//<![CDATA[
    Cufon.now(); 
    //]]>
    </script>
</body>
</html>
