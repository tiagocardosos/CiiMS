<div class="full-width">
	<h4>Activate your Account</h4>
	<div class="horizontal-rule"></div>
	<br />
	<? if(Yii::app()->user->hasFlash('activation-error')):?>
	    <div class="red-block"><? echo Yii::app()->user->getFlash('activation-error'); ?></div>
	<? endif; ?>
	
	<? if(Yii::app()->user->hasFlash('activation-success')):?>
	    <div class="green-block"><? echo Yii::app()->user->getFlash('activation-success'); ?></div>
	<? endif; ?>
</div>
