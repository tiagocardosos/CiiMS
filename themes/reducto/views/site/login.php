<div class="one-half">
	<h4>Login to Your Account</h4>
	<div class="horizontal-rule"></div>
	<? if(Yii::app()->user->hasFlash('reset')):?>
		    <br /><div class="blue-box"><? echo Yii::app()->user->getFlash('reset'); ?></div>
	<? endif; ?>
	<br />
	<?
		$form=$this->beginWidget('CActiveForm', array(
					'id'=>'contact',
					'focus'=>array($model,'username'),
					'enableAjaxValidation'=>true,
					'errorMessageCssClass'=>'alertBox-alert',
				));
			echo $form->errorSummary($model, '', '', array('class'=>'red-box')); ?>
		<br />		
	<?		echo $form->TextField($model, 'username', array('id'=>'email', 'placeholder'=>'Email', 'style'=>'margin-right: 15px;'));
			echo $form->PasswordField($model, 'password', array('id'=>'password', 'placeholder'=>'Password'));
			echo CHtml::submitButton('Login', array('class'=>'search-button'));
		$this->endWidget(); 
	?>
	<br />
	<br />
	<? echo CHtml::link('Forgot your password?', Yii::app()->createUrl('/forgot'), array('style'=>'float:right;')); ?>
	
	<br /><br /><div class="horizontal-rule"></div><br />
	<h4>Social Login</h4>
	<div class="horizontal-rule"></div>
	<p>Don't feel like making an account? That's OK. You can still sign in using one of these social networks!</p>
	<br />
	<center>
		<? echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/social-icons/LinkDeck/32/facebook.png'), Yii::app()->createUrl('/hybridauth/facebook'), array('escape'=>true)); ?>
		<? echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/social-icons/LinkDeck/32/googleplusalt.png'), Yii::app()->createUrl('/hybridauth/google'), array('escape'=>true)); ?>
		<? echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/social-icons/LinkDeck/32/twitter.png'), Yii::app()->createUrl('/hybridauth/twitter'), array('escape'=>true)); ?>
		<? echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/social-icons/LinkDeck/32/linkedin.png'), Yii::app()->createUrl('/hybridauth/linkedin'), array('escape'=>true)); ?>
		<? echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/social-icons/LinkDeck/32/github.png'), Yii::app()->createUrl('/hybridauth/github'), array('escape'=>true)); ?>
	</center>
</div>

<div class="one-half-last">
	<h4>Why do I need an account?</h4>
	<div class="horizontal-rule"></div>
	 <p>Registering on Erianna.com gives you access to many features not available to unregistered users. Registered users can:</p>
	 <br />
    	<ul class="green-tick">
	    	<li>Participate on community discussions.</li>
	    	<li>Comment on new articles.</li>
	    	<li>And much more!</li>
	    </ul>
    <hr />
    <p>What are you waiting for? <strong><? echo CHtml::link('Sign up', Yii::app()->createUrl('/register')); ?></strong> for an account today!</p>

</div>

<? Yii::app()->clientScript->registerCss('one-half', '.one-half{margin-top: 0px;}'); ?>