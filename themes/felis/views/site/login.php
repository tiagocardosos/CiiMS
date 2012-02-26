<div class="shady bott-27"></div>
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
<div class="wrap720" style="width: 36%; margin-right: 0px;">
	<div class="posts">
                <div class="inner clearfix">
                    <div class="inner-t">
                    	<div class="heading bott-15">
                            <h3>Need a Account?</h3>
                        </div>
                        <p>An Ethreal account gives you access to many features not available to unregistered users. Registered users can:</p>
                        <ul class="arrows">
                        	<li>Make posts in the community forums.</li>
                        	<li>Comment on news articles.</li>
                        	<li>And much more!</li>
                        </ul>
                        <hr />
                        <p>What are you waiting for? <strong><? echo CHtml::link('Sign up', Yii::app()->createUrl('/register')); ?></strong> for an account today!</p>
		   </div>
               </div>

                <div class="shady bott-27"></div>
       </div>
</div>
