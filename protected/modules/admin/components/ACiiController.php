<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class ACiiController extends CController
{

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl'
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow authenticated admins to perform any action
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->role==5'
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public $params = array();
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/dashboard';
	
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	/**
	 * Sets the layout for the view
	 * @param $layout - Layout
	 * @action - Sets the layout
	 **/
	protected function setLayout($layout)
	{
		$this->layout = $layout;
	}
	
	/**
	 * Overloaded Render allows us to generate dynamic content
	 **/
	public function render($view,$data=null,$return=false)
	{
	    if($this->beforeRender($view))
	    {
	    	if (isset($data['meta']))
	    	{
	    		$this->params['meta'] = $data['meta'];
	    	}
	    	
		$output=$this->renderPartial($view,$data,true);
		if(($layoutFile=$this->getLayoutFile($this->layout))!==false)
		    $output=$this->renderFile($layoutFile,array('content'=>$output, 'meta'=>isset($data['meta']) ? $this->params['meta'] : ''),true);

		$this->afterRender($view,$output);

		$output=$this->processOutput($output);

		if($return)
		    return $output;
		else
		    echo $output;
	    }
	}

	/**
	 * Outputs readable debug information at request
	 * @param $array - Data to be outputted
	 * @action - Outputs readable debug info
	 **/
	public function debug($array)
	{
		echo '<pre class="cii-debug">';
		print_r($array);
		echo '</pre>';
	}
}
