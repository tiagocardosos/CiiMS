   <? 
		$themeName 	= 'admin'; 
	   	$baseUrl 	= Yii::app()->request->baseUrl;
	   	$themeCSSUrl 	= "{$baseUrl}/css/{$themeName}/";
	   	$themeJSUrl 	= "{$baseUrl}/js/{$themeName}/";
	   	
	   	Yii::app()->clientScript->registerCssFile("{$themeCSSUrl}reset.css")
	   				->registerCssFile("{$themeCSSUrl}icons.css")
	   				->registerCssFile("{$themeCSSUrl}960.css")
	   				->registerCssFile("{$themeCSSUrl}main.css")
	   				->registerCssFile("{$themeCSSUrl}portrait.css");
	   	
	   	Yii::app()->clientScript->registerCoreScript('jquery')
	   				->registerCoreScript('jquery.ui')	   				
	   				->registerScriptFile("{$themeJSUrl}jquery.cookies.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.pjax.js")
	   				->registerScriptFile("{$themeJSUrl}formalize.min.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.metadata.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.validate.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.checkboxes.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.chosen.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.fileinput.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.datatables.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.sourcerer.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.tipsy.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.calendar.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.inputtags.min.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.wymeditor.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.livequery.js")
	   				->registerScriptFile("{$themeJSUrl}jquery.flot.min.js")
	   				->registerScriptFile("{$themeJSUrl}application.js")
	   				->registerScriptFile("{$baseUrl}/js/jquery.wysiwyg/jquery.wysiwyg.js");
	?>

<div id="login" style="margin-bottom: -8px; border-bottom: 9px solid white;">
	<br />
	<br />
	<div id="login_container" style="margin-bottom: 50px; margin-top: 0px; width: 75%;">
		<div id="login_form" style="top: 0px; width: 100%;">
			<p style="width: 100%; text-align:center">This is what your post will look like once it is published.
			
			<? echo CHtml::Button('Go Back', array('class'=>'button blue', 'escape'=>false, 'style'=>'float:right;margin-top: 1px;', 'id'=>'button', 'onClick'=>'window.history.back()')); ?>
			</p>
			
  		</div>
	</div>
	<br />
</div>
