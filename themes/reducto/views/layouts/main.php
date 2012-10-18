<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=8" />
	    <title><? echo CHtml::encode($this->pageTitle); ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="keywords" content="<? echo isset($this->params['meta']['keywords']) && !is_array(isset($this->params['meta']['keywords'])) ? $this->params['meta']['keywords'] : ''; ?>" />
		<meta name="description" content="<? echo strip_tags($this->params['data']['extract']); ?>" />
		<? 
			$themeName 	= Yii::app()->theme->name; 
		   	$baseUrl 	= Yii::app()->request->baseUrl;
		   	$themeCSSUrl 	= "{$baseUrl}/css/{$themeName}/";
		   	$themeJSUrl 	= "{$baseUrl}/js/{$themeName}/";
		   	
		   	Yii::app()->clientScript//->registerCssFile('http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold')
					   				->registerCssFile("{$themeCSSUrl}build.css")
							   		->registerCssFile(Yii::app()->baseUrl . '/css/jquery.gritter.css');
		   	
		   	Yii::app()->clientScript->registerCoreScript('jquery', CClientScript::POS_END)
					   				->registerScriptFile("{$themeJSUrl}scripts.js", CClientScript::POS_END)					
					   				->registerScriptFile("{$themeJSUrl}cufon-yui.js", CClientScript::POS_END)
									->registerScriptFile("{$themeJSUrl}cufon.fonts.js", CClientScript::POS_END)
									->registerScriptFile("{$themeJSUrl}Amperzand.font.js", CClientScript::POS_END)
									->registerScriptFile("{$themeJSUrl}Avenir.font.js", CClientScript::POS_END)
									->registerScriptFile("{$themeJSUrl}Coolvetica.font.js", CClientScript::POS_END)
									->registerScriptFile("{$themeJSUrl}jquery.droppy.js", CClientScript::POS_END)
									->registerScriptFile("{$themeJSUrl}jquery.imagefade.js", CClientScript::POS_END)
									->registerScriptFile("{$themeJSUrl}jquery.prettyPhoto.js", CClientScript::POS_END)
									->registerScriptFile("{$themeJSUrl}jquery.slider.js", CClientScript::POS_END)
									->registerScriptFile("{$themeJSUrl}swfobject.js", CClientScript::POS_END)
									->registerScriptFile('js/jquery.gritter.min.js', CClientScript::POS_END)
					   				->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.gritter.min.js', CClientScript::POS_END);	
		?>
	</head>
	<body>
	    <div id="page-wrapper">
	    	<div id="logo">
	            <div class="default-logo">
	            	<? echo CHtml::link('', Yii::app()->getBaseUrl(true), array('class'=>'default-logo')); ?>
	            </div>
	        </div>
			
	        <div id="nav-wrapper">
	            <? $this->widget('zii.widgets.CMenu',array(
					'id'=>'nav',
					'items'=>array(
						array('label'=>'Home', 'url'=>Yii::app()->getBaseUrl(true)),
						array('label'=>'Portfolio', 'url'=>Yii::app()->createUrl('/portfolio')),
						array('label'=>'Blog', 'url'=>Yii::app()->createUrl('/blog')),
						array('label'=>'Projects', 'url'=>Yii::app()->createUrl('/projects'))
					))); 
				?>
	        </div>         
	        <div class="horizontal-rule"></div>
	        <div>
	        	<div class="top-info" style="float:left;">
	        		<?
	        		$this->widget('zii.widgets.CBreadcrumbs', array(
					    'links'=>$this->breadcrumbs,
					));
	        		?>
	        	</div>
	        	<div class="top-info" style="float: right;">
	        		<ul class="widget-list" style="margin: 4px;">
	        			<li style="margin-top: 0px;">
	        				<? echo $this->displayVar($this->params['data']['title'], ucwords($this->getAction()->getId())); ?> |
		        			<? if (Yii::app()->user->isGuest) : ?>
		        				<? echo CHtml::link('Login', Yii::app()->createUrl('/login')); ?> |
		        				<? echo CHtml::link('Register', Yii::app()->createUrl('/register')); ?>
		        			<? else: ?>
		        				<? echo Yii::app()->user->displayName; ?>
		        				<? if (Yii::app()->user->role == 5): ?>
		        					| <? echo CHtml::link('Admin', Yii::app()->createUrl('/admin')); ?>
		        				<? endif; ?> |
		        				<? echo CHtml::link('Logout', Yii::app()->createUrl('/logout')); ?>
		        			<? endif; ?>
	        			</li>
	        		</ul>
	        	</div>
	        </div>
	        <br />
	        <br />
	        <div class="full-width">
	        	<? echo $content; ?>
	        </div>
	     	<div class="horizontal-rule"></div>
	        
	        <div class="one-third">
	        	<h6>Categories</h6>        	
	                <div class="horizontal-rule"></div>
					<ul class="widget-list">						
						<li><? echo CHtml::link('All Blogs', Yii::app()->createUrl('/blogs')); ?></li>
						<?
							$categories = Yii::app()->cache->get('categories-listing');
							if ($categories == false)
							{
								$categories = Yii::app()->db->createCommand('SELECT categories.id AS id, categories.name AS name, categories.slug AS slug, COUNT(DISTINCT(content.id)) AS content_count FROM categories LEFT JOIN content ON categories.id = content.category_id WHERE content.type_id = 2 AND content.status = 1 GROUP BY categories.id')->queryAll();
								Yii::app()->cache->set('categories-listing', $categories);							
							}
							
							foreach ($categories as $k=>$v)
							{
								if ($v['name'] != 'Uncategorized')
								{
									echo '<li>';
									echo CHtml::link($v['name'], Yii::app()->createUrl('/'.$v['slug']));
									echo '<span class="widget-hint" style="display: block; ">' . $v['content_count'] .' Posts</span>';
									echo '</li>';
								}	
							}
						?>
					</ul>        	
	        </div>
	        <div class="one-third">
	        	<h6>Recent posts</h6>        	
	                <div class="horizontal-rule"></div>
					<ul class="widget-list posts">
						<?
						
							$content = Yii::app()->cache->get('content-listing');
							if ($content == false)
							{
								$content = Yii::app()->db->createCommand('SELECT title, extract, content.slug AS content_slug, categories.slug AS category_slug, categories.name AS category_name, comment_count, content.created FROM content LEFT JOIN categories ON content.category_id = categories.id WHERE vid = (SELECT MAX(vid) FROM content AS content2 WHERE content2.id = content.id) AND type_id = 2 AND status = 1 ORDER BY content.created DESC LIMIT 5')->queryAll();
								Yii::app()->cache->set('content-listing', $content);							
							}
							
							foreach ($content as $k=>$v)
							{
								echo '<li>';
								echo CHtml::link($v['title'], Yii::app()->createUrl('/'.$v['content_slug']));
								echo '<span class="widget-hint" style="display: block; ">' . $v['comment_count'] .' Comments</span>';
								echo '</li>';
							}
						?>
					</ul>        	
	        </div>
	        <div class="one-third-last" style="margin: 30px 0;">
	        	<h6>Search</h6>
	                <div class="horizontal-rule"></div>
	                <form id="search" method="GET" action="<? echo Yii::app()->createUrl('/search'); ?>">
		                <ul class="widget-list search">
		                    <li>
		                    	<? echo CHtml::textField('q', $this->displayVar($_GET['q']), array('placeholder'=>'What are you looking for?', )); ?>
		                    </li>
		                    <li class="search-last">
		                    	<? echo CHtml::submitButton('Search', array('class'=>'search-button')); ?>
		                    </li>
		                </ul>
	                </form>
	        	
	        </div>
	        
	        <div class="horizontal-rule"></div>
	        
	        <!-- Footer Start -->
	        <div id="footer-wrapper">
	            <? $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Home', 'itemOptions'=>array('class'=>'footer-link'), 'url'=>Yii::app()->getBaseUrl(true)),
						array('label'=>'Portfolio', 'itemOptions'=>array('class'=>'footer-link'), 'url'=>Yii::app()->createUrl('/portfolio')),
						array('label'=>'Blog', 'itemOptions'=>array('class'=>'footer-link'), 'url'=>Yii::app()->createUrl('/blog')),
						array('label'=>'Projects', 'itemOptions'=>array('class'=>'footer-link'), 'url'=>Yii::app()->createUrl('/projects'))
					))); 
				?>
	            <div id="footer-logo"></div>
	            <div id="footer-copyright">Copyright 2012. All Rights Reserved</div>
	        </div>        
	    </div>
	    
	<? if (!YII_DEBUG): ?>
		<!-- Analytics Plugin -->
		<? $this->widget('ext.analytics.EPiwikAnalyticsWidget', array('id'=>2, 'baseUrl'=>'https://www.erianna.com:2080')); ?>
		<? $this->widget('ext.analytics.EGoogleAnalyticsWidget', array('account'=>'UA-21577234-3', 'addThis'=>true, 'addThisSocial'=>'true')); ?>
	<? endif; ?>
	
	</body>
	
	<script type="text/javascript"> Cufon.now(); </script> 
</html>
