<?php

class ContentController extends ACiiController
{

	public function beforeAction($action)
	{
		$this->menu = array(
			array('label'=>'Content Options'),
			array('label'=>'New Post', 'url'=>Yii::app()->createUrl('admin/content/save'))
		);
		return parent::beforeAction($action);
		
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionSave($id=NULL)
	{
		$version = 0;
		if ($id == NULL)
		{
			$model = new Content;
			$version = 0;
		}
		else
		{
			$model=$this->loadModel($id);
			if ($model == NULL)
				throw new CHttpException(400,'We were unable to retrieve a post with that id. Please do not repeat this request again.');
			$version = sizeof(Content::model()->findAllByAttributes(array('id' => $id)));
		}

		if(isset($_POST['Content']))
		{
			$model2 = new Content;
			$model2->attributes=$_POST['Content'];
			$model2->id = $id;
			$model2->vid = $model->vid+1;
			if($model2->save()) 
			{
				Yii::app()->user->setFlash('success', 'Content has been updated');
				$this->redirect(array('save','id'=>$model2->id));
			}
			else
			{
				$this->Debug($model2->getErrors());
				Yii::app()->user->setFlash('error', 'There was an error saving your content. Please try again');
			}
		}

		$this->render('save',array(
			'model'=>$model,
			'id'=>$id,
			'version'=>$version
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		// we only allow deletion via POST request
		// and we delete /everything/
		$command = Yii::app()->db->createCommand("DELETE FROM content WHERE id = :id");
		$command->bindParam(":id", $id, PDO::PARAM_STR);
		$command->execute();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	
	
	public function actionMetaSave($id=NULL, $key=NULL)
	{
		if ($key == NULL)
			$model = new ContentMetadata();
		else
			$model = ContentMetadata::model()->findByAttributes(array('content_id'=>$id, 'key'=>$key));
	
		if (isset($_POST['ContentMetadata']))
		{
			$model->attributes = $_POST['ContentMetadata'];
			try
			{
				if ($model->save())
				{
					$this->redirect(array('metasave','id'=>$model->content_id, 'key'=>$model->key));
				}
			}
			catch(CDbException $e)
			{
				$model->addError('key', $e->getMessage());
			}
		}
		
		$this->render('metasave', array(
			'model'=>$model,
			'id'=>$id, 
			'key'=>$key
			));
	}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionMetaDelete($id, $key)
	{
		// we only allow deletion via POST request
		// and we delete /everything/
		ContentMetadata::model()->findByAttributes(array('content_id'=>$id, 'key'=>$key))->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Content('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Content']))
			$model->attributes=$_GET['Content'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Lists all models.
	 */
	public function actionMeta($id=NULL)
	{
		$_GET['ContentMetadata']['content_id'] = $id;
		$model=new ContentMetadata('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ContentMetadata']))
			$model->attributes=$_GET['ContentMetadata'];

		$this->render('meta',array(
			'model'=>$model,
			'id'=>$id,
		));
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Content::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='Content-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
