<?php

// This is the main Web application configuration. Any writable
// application properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Eksi Mail',
	 'defaultController'=>'site',
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	// application components
	'components'=>array(
		'db'=>array(
			'class'=>'CDbConnection',
			            'connectionString'=>'mysql:host=localhost;dbname=eksimail',
			            'username'=>'root',
			            'charset'=>'utf8',
			            'password'=>'',
			            'emulatePrepare'=>true,  // needed by some MySQL installations
		),
	'urlManager'=>array(
            'urlFormat'=>'path',
            'rules'=>array(
				
				'<controller:\w+>/<action:\w+>/<id:\d+>'	=> '<controller>/<action>',
				'<controller:\w+>/<action:\w+>'				=> '<controller>/<action>',
            ),
        ),		
	),
	'modules'=>array(
        /*'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'1234',
            // 'ipFilters'=>array(...a list of IPs...),
            // 'newFileMode'=>0666,
            // 'newDirMode'=>0777,
        ),*/
    ),

 
);