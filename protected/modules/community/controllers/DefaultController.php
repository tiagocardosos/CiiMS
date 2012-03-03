<?php

class DefaultController extends CiiController
{
	public function actionIndex()
	{
		$this->layout = '//layouts/main';
		$this->render('index');
	}
}
