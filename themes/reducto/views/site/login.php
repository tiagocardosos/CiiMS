<div class="one-half">
	<h4>Login to Your Account</h4>
	<div class="horizontal-rule"></div>
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
<? /*<div class="shady bott-27"></div>
<div class="wrap720" style="width: 61%;">
	<div class="posts">
                <div class="inner clearfix">
                  	<div class="inner-t">
                  	<div class="heading bott-15">
                            <h3>Login to Ethreal</h3>
                        </div>
                    		<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'contact',
					'focus'=>array($model,'username'),
					'enableAjaxValidation'=>true,
					'errorMessageCssClass'=>'alertBox-alert',
				)); ?>
				<?php echo $form->errorSummary($model, '', '', array('class'=>'alertBox-alert')); ?>
						
				<? echo $form->TextField($model, 'username', array('id'=>'email', 'placeholder'=>'Email')); ?>
				<? echo $form->PasswordField($model, 'password', array('id'=>'password', 'placeholder'=>'Password')); ?>

				        <div class="button float-r" style="margin-top: 0px;">
				            <? echo CHtml::submitButton('Login'); ?>
				        </div>
				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
</div>
 */ ?>