<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Ethreal Services',
	// preloading 'log' component
		'preload'=>array('log'),
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.*',
	),

	'modules'=>array(
		'admin',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>FALSE,
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('*'),
		),
		
	),
	'theme'=>'felis',
	//'defaultController' => 'content',
	// application components
	'components'=>array(
		'session' => array(
           		'sessionName' => 'EthrealNet',
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'class'=>'SlugURLManager',
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'/search'=>'/content/search',
				'/contact'=>'/site/contact',
				//'/projects/<page:\d+>'=>'/categories/index/id/2',
			),
		),
		// uncomment the following to use a MySQL database
		'db'=>array(
			'class'=>'CDbConnection', 
			'connectionString' => 'mysql:host=localhost;dbname=wildfire',
			'emulatePrepare' => true,
			'username' => 'wildfire',
			'password' => '3xNQV7KDHKWScpWB',
			'charset' => 'utf8',
			'schemaCachingDuration'=>3600,
			'enableProfiling'=>true, 
			),
		'cache'=>array(
			'class'=>'system.caching.CMemCache',
			'servers'=>array(
				array(
					'host'=>'127.0.0.1', 
					'port'=>11211, 
					'weight'=>60
				),
		    	),
		),
		'apccache'=>array(
			'class'=>'CApcCache',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'trace,error,warning,notice',
				),
				// uncomment the following to show log messages on web pages
				
				array(
					'class'=>'CWebLogRoute',
				),
			
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
	        'encryptionKey'=>'c2438e6dbcacd8c387ea845556edd125ca7956ak38fhj5470ee3b5c387807e9aeb23b390014bf18499d22a3427adf6b47062b19e9d7d9d2dc6f8617c'
	),
);
