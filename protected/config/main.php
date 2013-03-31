<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Nex1Tv',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'qwerty',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
        'admin',	
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'  => false,
			'rules'=>array(
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'session' => array(
			"class" => "CHttpSession",
			"autoStart" => true
		),
		'authManager'=>array(
            'class'=>'CPhpAuthManager',
            'defaultRoles'=>array('authenticated', 'admin'),
        ),
		
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=> require(dirname(__FILE__).DIRECTORY_SEPARATOR."db.php"),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CWebLogRoute',
					'levels'=>'error, warning, trace, info',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		'cache'=>array(
            'class'=>'system.caching.CFileCache',
        ),
		'setting'=>array(
	        'class'             => 'application.extensions.CmsSettings',
	        'cacheComponentId'  => 'cache',
	        'cacheId'           => 'global_website_settings',
	        'cacheTime'         => 84000,
	        'tableName'     	=> 'setting',
	        'dbComponentId'     => 'db',
	        'createTable'       => true,
	        'dbEngine'      	=> 'InnoDB',
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'app' => require(dirname(__FILE__).DIRECTORY_SEPARATOR."app.php")
	),
);