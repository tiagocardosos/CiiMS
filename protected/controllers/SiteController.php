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
			{
				echo $error['message'];
			}
			else
			{
				$this->setPageTitle(Yii::app()->name . ' | Error ' . $error['code']);
				$this->render('error', array('error'=>$error));
			}
		}
	}
	
	public function actionSearch($id=1)
	{
		$this->setPageTitle(Yii::app()->name . ' | Search');
		$this->layout = '//layouts/main';
		$data = array();
		
		if ($_GET['q'] != '')
		{
			// Load the search data
			Yii::import('ext.sphinx.SphinxClient');
			$sphinx = new SphinxClient();
			$sphinx->setServer(Yii::app()->params['sphinxHost'], (int)Yii::app()->params['sphinxPort']);
			$sphinx->setMatchMode(SPH_MATCH_EXTENDED2);
			$sphinx->setMaxQueryTime(15);

			$result = $sphinx->query($_GET['q'], Yii::app()->params['sphinxSource']);
		
			$criteria=new CDbCriteria;
			$criteria->addInCondition('id', array_keys(isset($result['matches']) ? $result['matches'] : array()));
			$criteria->addCondition("vid=(SELECT MAX(vid) FROM content WHERE id=t.id)");

			$data = Content::model()->findAll($criteria);
		}		
		$this->render('search', array('data'=>$data));
	}
	
	public function actionLogin()
	{
		$this->setPageTitle(Yii::app()->name . ' | Contact Us');
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
		$this->setPageTitle(Yii::app()->name . ' | Sign Up');
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
		$this->setPageTitle(Yii::app()->name . ' | Contact Us');
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
