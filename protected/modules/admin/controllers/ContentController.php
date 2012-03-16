<?php

class ContentController extends ACiiController
{

	public function beforeAction()
	{
		$this->menu = array(
			array('label'=>'Content', 'url'=>Yii::app()->createUrl('admin/content')),
			array('label'=>'Categories', 'url'=>Yii::app()->createUrl('admin/categories')),
			array('label'=>'Comments', 'url'=>Yii::app()->createUrl('admin/comments')),
			array('label'=>'Tags', 'url'=>Yii::app()->createUrl('admin/tags')),
			array('label'=>'', 'url'=>array('#'))
		);
		return parent::beforeAction();
		
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionSave($id=NULL)
	{
		if ($id == NULL)
		{
			$model = new Content;
			$version = 0;
		}
		else
		{
			$model=$this->loadModel($id);
			if ($model == NULL)
				throw new CHttpException(400,'asdfasdfrequest again.');
			$versions = sizeof(Content::model()->findAllByAttributes(array('id' => $id)));
		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Content']))
		{	
			$model2 = new Content;
			$model2->id = $_POST['Content']['id'];
			$model2->vid+=1;
			$model2->attributes=$_POST['Content'];
			$model2->vid+=1;
			if($model2->save())
				$this->redirect(array('save','id'=>$model2->id));
		}

		$this->render('save',array(
			'model'=>$model,
			'id'=>$id,
			'versions'=>$versions
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
