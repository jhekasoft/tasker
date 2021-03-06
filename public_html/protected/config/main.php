<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$config = array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
    
    'defaultController'=>'inbox/default/add',

	'modules'=>array(
		// uncomment the following to enable the Gii tool
        'data',
        'inbox',
        'info',
        'tag',
        'task',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'hello_world',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
//		'db'=>array(
//			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
//		),
		// uncomment the following to use a MySQL database
		
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
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
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

if(preg_match('/tasker\.ru/', $_SERVER['HTTP_HOST'])) {
    $config['components']['db']=array(
        'connectionString' => 'mysql:host=localhost;dbname=tasker',
        'emulatePrepare' => true,
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'tablePrefix' => 'bnd_',
    );
} elseif(preg_match('/bondvt04\.p\.ht/', $_SERVER['HTTP_HOST'])) {
    $config['components']['db']=array(
        'connectionString' => 'mysql:host=mysql.hostinger.ru;dbname=u987603361_tasker',
        'emulatePrepare' => true,
        'username' => 'u987603361_user',
        'password' => 'hello_world',
        'charset' => 'utf8',
        'tablePrefix' => 'bnd_',
    );
} else {
    $config['components']['db']=array(
        'connectionString' => 'mysql:host=localhost;dbname=tasker',
        'emulatePrepare' => true,
        'username' => 'user',
        'password' => 'usbw',
        'charset' => 'utf8',
        'tablePrefix' => 'bnd_',
    );
}

return $config;