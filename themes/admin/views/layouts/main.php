<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
   
    <title><? echo CHtml::encode($this->pageTitle); ?></title>
    <? 
		$themeName 	= 'admin'; 
	   	$baseUrl 	= Yii::app()->request->baseUrl;
	   	$themeCSSUrl 	= "{$baseUrl}/css/{$themeName}/";
	   	$themeJSUrl 	= "{$baseUrl}/js/{$themeName}/";
	   	
	   	Yii::app()->clientScript->registerCssFile("{$themeCSSUrl}reset.css")
	   				->registerCssFile("{$themeCSSUrl}icons.css")
	   				->registerCssFile("{$themeCSSUrl}formalize.css")
	   				->registerCssFile("{$themeCSSUrl}sourcerer.css")
	   				->registerCssFile("{$themeCSSUrl}jqueryui.css")
	   				->registerCssFile("{$themeCSSUrl}tipsy.css")
	   				->registerCssFile("{$themeCSSUrl}calendar.css")
	   				->registerCssFile("{$themeCSSUrl}tags.css")
	   				->registerCssFile("{$themeCSSUrl}visualize.css")
	   				->registerCssFile("{$themeCSSUrl}fonts.css")	   				
	   				->registerCssFile("{$themeCSSUrl}selectboxes.css")
	   				->registerCssFile("{$themeCSSUrl}960.css")
	   				->registerCssFile("{$themeCSSUrl}main.css")
	   				->registerCssFile("{$themeCSSUrl}portrait.css")
	   				->registerCssFile("{$baseUrl}/js/jquery.wysiwyg/jquery.wysiwyg.css")
	   				->registerCssFile(Yii::app()->baseUrl . '/css/jquery.gritter.css');;
	   	
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
	   				->registerScriptFile("{$baseUrl}/js/jquery.wysiwyg/jquery.wysiwyg.js")
	   				->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.gritter.min.js');
	?>
  </head>
  <? echo $content; ?>
</html>
