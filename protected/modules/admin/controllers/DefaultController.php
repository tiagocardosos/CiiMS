<?php

class DefaultController extends ACiiController
{
	
	public function actionIndex()
	{
		// Retrieve Basic Status for Display
		$stats = Yii::app()->db->createCommand('SELECT (SELECT count(id) FROM content WHERE type_id = 2  AND status = 1 AND vid = (SELECT MAX(vid) FROM content AS content2 WHERE content2.id = content.id)) AS posts, (SELECT count(id) FROM content WHERE type_id = 2 AND status = 1 AND vid = (SELECT MAX(vid) FROM content AS content2 WHERE content2.id = content.id)) AS pages, (SELECT count(id) FROM categories) AS categories, (SELECT count(id) FROM tags) AS tags')->query();
		
		$comments = Yii::app()->db->createCommand('SELECT (SELECT count(id) FROM comments WHERE approved = 1) AS comments, (SELECT count(id) FROM comments WHERE approved = 0) AS needs_approval, (SELECT count(id) FROM comments WHERE approved = -1) AS flagged')->query();
		
		// Retrieve list of drafts
		$draftsCriteria = new CDbCriteria;
		$draftsCriteria->limit = 5;
		$draftsCriteria->addCondition('status = 0');
		$drafts = Content::model()->findAll($draftsCriteria);
		
		// Retrieve a few recent comments
		$commentsCriteria = new CDbCriteria;
		$commentsCriteria->limit = 5;
		$commentsCriteria->addCondition('approved = 1');
		$recentComments = Comments::model()->findAll($commentsCriteria);
		
		// Retrieve forum status
		$this->render('index', array('stats'=>$stats, 'comments'=>$comments, 'drafts'=>$drafts, 'recentComments'=>$recentComments));
	}
}
