<div class="shady bott-27"></div>
<div class="wrap720" style="width: 61%;">
	<div class="posts">
                <div class="inner clearfix">
                  	<div class="inner-t">
                  	<div class="heading bott-15">
                            <h3>Signup for an Account</h3>
                        </div>				
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'contact',
					'focus'=>array($model,'email'),
				    	'enableAjaxValidation'=>true,
					'errorMessageCssClass'=>'alertBox-alert',
				)); ?>

				<? if ($error != ''): ?>
		            		<div class="alertBox-alert"><? echo $error; ?></div>
		            	<? endif; ?>
                    	
			    	<?php echo $form->errorSummary($model,'','',array('class'=>'alertBox-alert')); ?>
				<?php echo $form->errorSummary($user,'','',array('class'=>'alertBox-alert')); ?>
				<?php echo $form->textField($model,'email', array('id'=>'email', 'placeholder'=>'Your Email Address', 'style'=>'width: 500px;')); ?><br />
				<?php echo $form->PasswordField($model,'password', array('id'=>'password', 'placeholder'=>'Password', 'style'=>'width: 500px;')); ?><br />
				<?php echo $form->PasswordField($model,'password2', array('id'=>'password2', 'placeholder'=>' Password (again)', 'style'=>'width: 500px;')); ?><br />				
				<?php echo $form->textField($model,'firstName', array('id'=>'firstName', 'placeholder'=>'Your First Name', 'style'=>'width: 500px;')); ?><br />
				<?php echo $form->textField($model,'lastName', array('id'=>'lastName', 'placeholder'=>'Your Last Name', 'style'=>'width: 500px;')); ?><br />
				<?php echo $form->textField($model,'displayName', array('id'=>'displayName', 'placeholder'=>'Display Name', 'style'=>'width: 500px;')); ?><br />
				 <div style="float:left; margin-right: 10px;">
		            	<? echo $captcha->recaptcha_get_html(Yii::app()->params['reCaptchaPublicKey'], array()); ?>
		            </div><br />
				<div class="button float-r" style="margin-top: 0px;">
					<? echo CHtml::submitButton('Signup'); ?>
				</div>

				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
</div>
<div class="wrap720" style="width: 36%; margin-right: 0px;">
	<div class="posts">
                <div class="inner clearfix">
                    <div class="inner-t">
                    	<div class="heading bott-15">
                            <h3>The Information We Collect</h3>
                        </div>
                        <p>Is used only to uniquely identify you in our system. Your information will never be:</p>
                        <ul class="arrows">
                        	<li>Sold to third party companies.</li>
                        	<li>Surrendered unless applicable by law.</li>
                        	<li>Used to generate custom advertisements.</li>
                        </ul>
                        <p>Your information will be:</p>
                        <ul class="arrows">
                        	<li>Encrypted and securly stored on our servers</li>
                        </ul>
                        <hr />
                        <p>Already have an account? <strong><? echo CHtml::link('Login', Yii::app()->createUrl('/login')); ?></strong> instead!</p>
		   </div>
               </div>

                <div class="shady bott-27"></div>
       </div>
</div>
<? Yii::app()->clientScript->registerScript('captchaOptions', "var RecaptchaOptions = { theme : 'clean' };", CClientScript::POS_HEAD); ?>

