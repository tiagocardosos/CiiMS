<?php

class SiteController extends CiiController
{

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{		
		Yii::import('ext.recaptchalib');
		$captcha = new recaptchalib();
		$error = '';
		$message = '';
		if (isset($_POST) && !empty($_POST))
		{
			$resp = $captcha->recaptcha_check_answer(Yii::app()->params['reCaptchaPrivateKey'], $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

			if (!$resp->is_valid) {
				$error = 'The CAPTCHA that you entered was invalid. Please try again';
			} 
			else {
				Yii::import('application.extensions.phpmailer.JPhpMailer');
				$mail = new JPhpMailer;
				$mail->IsSMTP();
				$mail->SMTPAuth = true;
				$mail->SMTPDebug  = 0;
				$mail->SetFrom($_POST['contact']['email'], $_POST['contact']['name']);
				$mail->Subject = 'Contact Form Submission From: ' . $_POST['contact']['name'];
				$mail->MsgHTML($_POST['contact']['message']);
				$mail->AddAddress('contact@ethreal.net', 'Contact Admin');
				$mail->Send();
				
				$message = 'Your message has successfully been sent. Please allow up to 24 hours for a response.';
			}
		}
		
		$this->layout = '//layouts/main';
		$this->render('contact', array('captcha'=>$captcha, 'error'=>$error, 'message'=>$message));
	}
}
