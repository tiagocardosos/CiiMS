<?
/**
 * SlugURLManager
 * Extends CUrlManager, allowing database slugs to be provided in liue of boring urls
 **/
class SlugURLManager extends CUrlManager
{

	// Content URL Set
	public $contentUrlRulesId = 'WFF-content-url-rules';
	
	// Categories URL set
	public $categoriesUrlRulesId = 'WFF-categories-url-rules';
	
	/**
	 * Overrides processRules, allowing us to inject our own ruleset into the URL Manager
	 * Takes no parameters
	 **/
	protected function processRules()
	{
	
		$this->cacheRules('content', $this->contentUrlRulesId);
		$this->cacheRules('categories', $this->categoriesUrlRulesId);
		
		// Append our cache rules BEFORE we run the defaults
		$this->rules['<controller:\w+>/<action:\w+>/<id:\d+>'] = '<controller>/<action>';
		$this->rules['<controller:\w+>/<action:\w+>']='<controller>/<action>';
		parent::processRules();

	}
	
	/**
	 * Method for retrieving rules from the database and caching them
	 * @param $fromString - The string to be used in our FROM query
	 * @param $item - Address of the caching rule
	 * @does - Adds to the url rules and caches the result
	 **/
	private function cacheRules($fromString, &$item)
	{
		$urlRules = Yii::app()->cache->get($item);
		if($urlRules===false)
		{
		    $urlRules = Yii::app()->db->createCommand("SELECT id, slug FROM {$fromString}")->queryAll();
		    Yii::app()->cache->set($item, $urlRules);
		}
		
		foreach ($urlRules as $route)
		{
			$this->rules['/'.$route['slug'] . '/<page:\d+>'] = "/{$fromString}/index/id/{$route['id']}";
			$this->rules['/'.$route['slug']] = "/{$fromString}/index/id/{$route['id']}";
		}
	}

}
?>
