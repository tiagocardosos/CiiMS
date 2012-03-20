<?php

class SiteController extends CiiController
{
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    $this->layout = '//layouts/main';
	    
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', array('error'=>$error));
	    }
	}

	public function actionLogin() {
		$this->layout = '//layouts/main';
		$model=new LoginForm;

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()) { 
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->user->returnUrl);
	}
	
	/**
	 * Registration page
	 *
	 **/
	public function actionRegister()
	{
		$this->layout = '//layouts/main';
		$model = new RegisterForm();
		$user = new Users();
		
		Yii::import('ext.recaptchalib');
		$captcha = new recaptchalib();
		$error = '';
		if (isset($_POST) && !empty($_POST))
		{
			$resp = $captcha->recaptcha_check_answer(Yii::app()->params['reCaptchaPrivateKey'], $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

			if (!$resp->is_valid) {
				$error = 'The CAPTCHA that you entered was invalid. Please try again';
			} 
			else {
				$model->attributes = $_POST['RegisterForm'];
				if ($model->validate())
				{
					$user->attributes = array(
						'email'=>$_POST['RegisterForm']['email'],
						'password'=>Users::model()->encryptHash($_POST['RegisterForm']['email'], $_POST['RegisterForm']['password'], Yii::app()->params['encryptionKey']),
						'firstName'=>$_POST['RegisterForm']['firstName'],
						'lastName'=>$_POST['RegisterForm']['lastName'],
						'displayName'=>$_POST['RegisterForm']['displayName'],
						'user_role'=>1,
						'status'=>1
					);
					
					try 
					{
						if($user->save())
						{
							$this->render('register-success');
						}
					}
					catch(CDbException $e) 
					{
						$model->addError(null, 'The email address has already been associated to an account. Do you want to login instead?');
					}
				}
			}
		}
		$this->render('register', array('captcha'=>$captcha, 'model'=>$model, 'error'=>$error, 'user'=>$user));
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
