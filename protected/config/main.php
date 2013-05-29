<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Daniel Krochmalny',
	'theme'=>'bootstrap',
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
			'class' => 'system.gii.GiiModule',
			'generatorPaths' => array(
				'ext.giix-core', // giix generators
				'bootstrap.gii'
			),
			'password'=>'DyN4myt3',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),
	// application components
	'components'=>array(
		'clientScript'=>array(
			'packages'=>array(
				'jquery'=>array(
					'baseUrl'=>'//ajax.googleapis.com/ajax/libs/jquery/1/',
					'js'=>array('jquery.min.js'),
				),
			),
		),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
		'less'=>array(
			'class'=>'ext.less.components.Less',
			'mode'=>'client',
			'files'=>array(
				'less/styles.less'=>'css/styles.css',
			),
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(			
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		// 'db'=>array(
			// 'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		// ),
		// uncomment the following to use a MySQL database		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=stock',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'DyN4myt3',
			'charset' => 'utf8',
			'enableProfiling' => true,
            'enableParamLogging' => true,
		),		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				array(
					'class' => 'application.extensions.pqp.PQPLogRoute',
                    'categories' => 'application.*, exception.*',
				),
				array(
					'class'=>'ext.db_profiler.DbProfileLogRoute',
                    'countLimit' => 1, // How many times the same query should be executed to be considered inefficient
                    'slowQueryMin' => 0.01, // Minimum time for the query to be slow
                ),
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);