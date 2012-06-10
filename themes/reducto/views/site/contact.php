<? Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/' . Yii::app()->theme->name .'/contactform.js')->registerScript('captchaOptions', "var RecaptchaOptions = { theme : 'clean' };", CClientScript::POS_HEAD); ?>

        <div class="shady bott-27"></div>

        <div class="wrap">
            <div class="posts">
                <div class="inner clearfix">
                    <div class="inner-t">
                        <div class="heading bott-15">
                            <h3>Contact Ethreal</h3>
                        </div>

                        <p>We're here to help with any questions or comments about the products or services we provide. If you just want to say hi, that's okay too!</p>
                    </div>
                </div>

                <div class="shady bott-27"></div>
            </div>
	</div>
	<div class="wrap720" style="width: 60%;">
	<div class="posts">
                <div class="inner clearfix">
                    <div class="inner-t">
                    	<p>Feel free to contact us at <? echo CHtml::link('&#115;&#117;&#112;&#112;&#111;&#114;&#116;&#064;&#101;&#116;&#104;&#114;&#101;&#097;&#108;&#046;&#110;&#101;&#116;', array('#'), array('style'=>'color: #2a9ac9'));?></p>
                    	<? if ($error != ''): ?>
                    		<div class="alertBox-alert"><? echo $error; ?></div>
                    	<? endif; ?>
                    	<? if ($message != ''): ?>                    		
                    		<div class="alertBox-success"><? echo $message; ?></div>
                    	<? endif; ?>
			<form id="contact" method="post" action="<? echo Yii::app()->baseUrl . '/contact' ?>">
		            <div>
		                <label>Name*</label> <input id="name" type="text" name="contact[name]" placeholder="Your Name" value="<? echo isset($_POST['contact']['name']) ? $_POST['contact']['name'] : ''; ?>"/>
		            </div>

		            <div>
		                <label>E-mail*</label> <input id="email" type="text" name="contact[email]" placeholder="Your Email" value="<? echo isset($_POST['contact']['email']) ? $_POST['contact']['email'] : ''; ?>"/>
		            </div>
		            <div>
		                <textarea id="message" name="contact[message]" placeholder="Questions or Comments go here"><? echo isset($_POST['contact']['message']) ? $_POST['contact']['message'] : ''; ?></textarea>
		            </div>
				<br />
		            <div style="float:right; margin-right: 10px;">
		            	<? echo $captcha->recaptcha_get_html(Yii::app()->params['reCaptchaPublicKey'], array()); ?>
		            </div>
		            <div class="send-wrap">
		                <div class="button float-l">
		                    <input name="send" type="submit" value="Send">
		                </div>
							<div class="float-r">* required</div>
		            </div>
		        </form>
                    </div>
                </div>

                <div class="shady bott-27"></div>
            </div>
	</div>
	
	<div class="wrap720" style="width: 38%; margin-right: 0px;">
	<div class="posts">
                <div class="inner clearfix">
                    <div class="inner-t">
                    	<div class="heading bott-15">
                            <h3>Getting It Right</h3>
                        </div>
                        <p>What makes a good support request?</p>
                        <ul class="arrows">
                        	<li>Be succinct. If we require more information we will contact you.</li>
                        	<li>Let us know what product you are using. If you have a license key, please provide it.</li>
                        </ul>
                        <hr />
		    </div>
                </div>

                <div class="shady bott-27"></div>
            </div>
	</div>
	
	</div>
