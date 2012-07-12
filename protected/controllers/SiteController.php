<?php

class SiteController extends CiiController
{
	/**
	 * beforeAction method, performs operations before an action is presented
	 * @param $action, the action being called
	 * @see http://www.yiiframework.com/doc/api/1.1/CController#beforeAction-detail
	 * @return CiiController::beforeAction
	 */
	public function beforeAction($action)
	{
		$this->breadcrumbs[] = ucwords(Yii::app()->controller->action->id);
		return parent::beforeAction($action);
	}
	
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
	
	public function actionSitemap()
	{		
		$this->layout = false;
		
		// Retrieve all contents and categories
		$content = Yii::app()->db->createCommand('SELECT slug, type_id, updated FROM content AS t WHERE vid=(SELECT MAX(vid) FROM content WHERE id=t.id) AND status = 1;')->queryAll();
		$categories = Yii::app()->db->createCommand('SELECT slug, updated FROM categories;')->queryAll();
		$this->renderPartial('sitemap', array('content'=>$content, 'categories'=>$categories));
	}
	
	public function actionSearch($id=1)
	{
		$this->setPageTitle(Yii::app()->name . ' | Search');
		$this->layout = '//layouts/default';
		$data = array();
		$pages = array();
		$itemCount = 0;
		$pageSize = $this->displayVar((Configuration::model()->findByAttributes(array('key'=>'searchPaginationSize'))->value), 10);
		
		if (isset($_GET['q']) && $_GET['q'] != '')
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
			$criteria->limit = $pageSize;			
			
			$itemCount = Content::model()->count($criteria);
			$pages=new CPagination($itemCount);
			$pages->pageSize=$pageSize;			
			
			$criteria->offset = $criteria->limit*($pages->getCurrentPage()-1);			
			$data = Content::model()->findAll($criteria);
    		$pages->applyLimit($criteria);
			
		}		
		
		$this->render('search', array('id'=>$id, 'data'=>$data, 'itemCount'=>$itemCount, 'pages'=>$pages));
	}
	
	public function actionLogin()
	{
		$this->setPageTitle(Yii::app()->name . ' | Login to your account');
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
				
				$resp = $captcha->recaptcha_check_answer(Yii::app()->params['reCaptchaPrivateKey'], $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

				if (!$resp->is_valid) {
					$error = 'The CAPTCHA that you entered was invalid. Please try again';
					$this->render('register', array('captcha'=>$captcha, 'model'=>$model, 'error'=>$error, 'user'=>$user));
					return;
				} 
				
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
		$this->render('register', array('captcha'=>$captcha, 'model'=>$model, 'error'=>$error, 'user'=>$user));
	}
}
