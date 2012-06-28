<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title><? echo CHtml::encode($this->pageTitle); ?></title>
  </head>
  <? $this->widget('bootstrap.widgets.BootNavbar', array(
    'fixed'=>false,
    'brand'=>CHtml::encode(Yii::app()->name) . ' | Admin',
	'items'=>array(
		),
	));
	
      ?>
	<div class="container-fluid">
		  <div class="row-fluid">
		  		<div class="span2">
		  			<div class="well" style="padding: 8px 0;">
			  		<?php $this->widget('bootstrap.widgets.BootMenu', array(
					    'type'=>'list',
					    'items'=>array_merge($this->main_menu, $this->menu),
					)); ?>
					</div>
		    	</div>
		    	<div class="span10">
		    		<?php $this->widget('bootstrap.widgets.BootAlert'); ?>
		      		<? echo $content; ?>
		    	</div>
		  </div>
	</div>
</html>
