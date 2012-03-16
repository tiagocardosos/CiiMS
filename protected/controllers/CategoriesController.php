<?php

class CategoriesController extends CiiController
{
	/**
	 * Verifies that our request does not produce duplicate content (/about == /content/index/2), and prevents direct access to the controller
	 * protecting it from possible attacks.
	 * @param $id	- The content ID we want to verify before proceeding
	 **/
	private function beforeCiiAction($id)
	{
		// If we do not have an ID, consider it to be null, and throw a 404 error
		if ($id == NULL)
		{
			throw new CHttpException(404,'The specified category cannot be found.');
		}
		
		// Retrieve the HTTP Request
		$r= new CHttpRequest();
		
		// Retrieve what the actual URI
		$requestUri = str_replace($r->baseUrl, '', $r->requestUri);
		
		// Retrieve the route
		$route = '/' . $this->getRoute() . '/' . $id;
		
		// If the route and the uri are the same, then a direct access attempt was made, and we need to block access to the controller
		if ($requestUri == $route)
		{
			throw new CHttpException(404,'The specified category cannot be found.');
		}
	}
	
	/**
	 * Handles all incoming requests for the entire site that are not previous defined in CUrlManager
	 * Requests come in, are verified, and then pulled from the database dynamically
	 * @param $id	- The content ID that we want to pull from the database
	 * @return $this->render() - Render of page that we want to display
	 **/
	public function actionIndex($id=NULL, $page=1)
	{
		if ($page == 0)
			$page = 1;
		// Run a pre check of our data
		$this->beforeCiiAction($id);
		
		// Retrieve the data
		$category = Categories::model()->findByPk($id);

		// Parse Metadata
		$meta = Categories::model()->parseMeta($category->metadata);
		
		$layout = isset($meta['layout']) ? $meta['layout']['value'] : 'blog';		

		// Set the layout
		$this->setLayout($layout);
		
		$limit = 0;
		$offset = 5;
		
		// Determine the content to display
		if ($page != 1)
		{
			$limit = 5*($page-1)+($page-2);
			$offset = 6;			
		}
		
		$command = Yii::app()->db->createCommand('SELECT id FROM content WHERE vid = (SELECT MAX(vid) FROM content AS content2 WHERE content2.id = content.id) AND category_id = :id  AND type_id >= 2 ORDER BY type_id DESC, created DESC LIMIT ' . $limit . ',' . $offset);
		$command->bindParam(':id',$id,PDO::PARAM_STR);
		$response = $command->queryAll();
		
		$content = array();
		
		// Parse the ContentID's for usage
		foreach ($response as $k=>$v)
		{
			$content[] = Content::model()->with('category')->with('metadata')->findByPk($v['id']);
		}
		$command = Yii::app()->db->createCommand('SELECT count(id) AS count FROM content WHERE vid = (SELECT MAX(vid) FROM content AS content2 WHERE content2.id = content.id) AND category_id = :id  AND type_id >= 2');
		$command->bindParam(':id',$id,PDO::PARAM_STR);
		$count = $command->queryAll();
		$this->render('index', array('id'=>$id, 'page'=>$page, 'posts'=>$content, 'content'=>$category->attributes, 'meta'=>$meta, 'postCount'=>$count[0]['count']));
	}
	
	public function actionList()
	{
		$this->layout = 'main';
		$criteria = new CDbCriteria();
		$criteria->addCondition('id != 1');
		$categories = Categories::model()->findAll($criteria);
		$this->render('list', array('categories'=>$categories));
	}
}

?>
