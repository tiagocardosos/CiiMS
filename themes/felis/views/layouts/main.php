<!DOCTYPE html>
<html lang="en">
<head>
	<title><? echo CHtml::encode($this->pageTitle); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="keywords" content="<? echo isset($this->params['meta']['keywords']) ? $this->params['meta']['keywords'] : ''; ?>" />
	<meta name="description" content="<? echo strip_tags($this->params['data']['extract']); ?>" />
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
	   				->registerCssFile("{$themeCSSUrl}jFlicker.css")
			   		->registerCssFile(Yii::app()->baseUrl . '/css/jquery.gritter.css');
	   	
	   	Yii::app()->clientScript->registerCoreScript('jquery')
	   				->registerCoreScript('jquery.ui')
	   				->registerScriptFile("{$themeJSUrl}jquery.easing.1.3.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.effects.core.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.prettyPhoto.js")
	   				->registerScriptFile("{$themeJSUrl}cufon-yui.js")
	   				->registerScriptFile("{$themeJSUrl}generated-fonts.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.preloader.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.nivo.slider.custom.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.flow.1.2.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.tweet.js")
	   				->registerScriptFile("{$themeJSUrl}jflickr_0.3_min.js")
	   				->registerScriptFile("{$themeJSUrl}tipSwift.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.scrollTo-min.js")
	   				->registerScriptFile("{$themeJSUrl}column-height.js")
	   				->registerScriptFile("{$themeJSUrl}custom.js")
	   				->registerScriptFile("{$themeJSUrl}html5.js")
	   				->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.gritter.min.js');	
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
                        		<? echo CHtml::link('Home', Yii::app()->getBaseUrl(true)); ?>
                        		<? echo CHtml::image(Yii::app()->baseUrl.'/images/felis/v-sep.gif');?>
                        		<? echo !Yii::app()->user->isGuest && Yii::app()->user->role == 5 ? CHtml::link('Admin', Yii::app()->createUrl('/admin')) . CHtml::image(Yii::app()->baseUrl.'/images/felis/v-sep.gif'): ''; ?>
					<? echo Yii::app()->user->isGuest ? CHtml::link('Login', array('/login')) : CHtml::link(Yii::app()->user->displayName, '') . CHtml::link('(logout)', Yii::app()->createUrl('/logout'), array('style'=>'margin-left: 5px;')); ?>
                        	</span>
                        </span> 
                        <!-- <span class="phone">Toll free: +012 345 678 001</span> -->

                        <div class="search float-r">
                            <form id="search" method="GET" action="<? echo Yii::app()->createUrl('/search'); ?>">
                                <div>
                                    <input name="q" class="field" type="text" placeholder="Search...">
                                </div>

                                <div class="search-btn">
                                    <input type="submit" value="">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="logo-menu">
                	<? echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/felis/content/logo.png'), Yii::app()->getBaseUrl(true), array('class'=>'logo')); ?>
			<? $this->widget('zii.widgets.CMenu',array(
				'id'=>'about-menu',
				'htmlOptions'=>array('class'=>'navmenu'),
				'items'=>array(
					array('label'=>'Home', 'url'=>Yii::app()->getBaseUrl(true)),
					array('label'=>'About', 'url'=>Yii::app()->createUrl('/about')),
					array('label'=>'Projects', 'url'=>Yii::app()->createUrl('/projects')),
					array('label'=>'Contact', 'url'=>Yii::app()->createUrl('/contact')),
					array('label'=>'Community', 'url'=>Yii::app()->createUrl('/community'))
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
						array('label'=>'Home', 'url'=>Yii::app()->getBaseUrl(true)),
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
					<?
						$content = Yii::app()->cache->get('content-listing');
						if ($content == false)
						{
							$content = Yii::app()->db->createCommand('SELECT title, extract, content.slug AS content_slug, categories.slug AS category_slug, categories.name AS category_name, comment_count, content.created FROM content LEFT JOIN categories ON content.category_id = categories.id WHERE vid = (SELECT MAX(vid) FROM content AS content2 WHERE content2.id = content.id) AND type_id = 2 AND status = 1 ORDER BY content.created DESC LIMIT 5')->queryAll();
							Yii::app()->cache->set('content-listing', $content);							
						}
						
						foreach ($content as $k=>$v)
						{
							echo '<li>' . CHtml::link($v['title'], Yii::app()->createUrl('/'.$v['content_slug'])) . '</li>';
						}
					?>
				</ul>
		 	</div>
		 	<div class="col1-4">
		 		<h4>Categories <? echo CHtml::image(Yii::app()->baseUrl.'/images/felis/heading-bg-footer.gif'); ?></h4>
				<ul class="arrows">
					<?
						$categories = Yii::app()->cache->get('categories-listing');
						if ($categories == false)
						{
							$categories = Yii::app()->db->createCommand('SELECT id, name, slug FROM categories')->queryAll();
							Yii::app()->cache->set('categories-listing', $categories);							
						}
						
						foreach ($categories as $k=>$v)
						{
							if ($v['name'] != 'Uncategorized')
							{
								echo '<li>' . CHtml::link($v['name'], Yii::app()->createUrl('/'.$v['slug'])) . '</li>';
							}	
						}
					?>
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
		 				<li><? echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/felis/twitter.png'), 'https://www.twitter.com/ethrealnet', array('title'=>'twitter'));?></li>
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
