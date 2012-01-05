<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Flexiblearning',
    'defaultController'=>'intro',
    'language' => 'en',
    // preloading 'log' component
    'preload' => array('log', 'ELangHandler'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'ext.xupload.models.XUploadForm',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool		
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
//            'class' => 'RWebUser',
            'allowAutoLogin' => true,
        ),
        'authManager' => array(
//            'class' => 'RDbAuthManager',
            'class' => 'CDbAuthManager',
            'connectionID' => 'db',
        ),
        // uncomment the following to enable URLs in path-format

        'urlManager' => array(
            'class' => 'application.extensions.langhandler.ELangCUrlManager',
            'urlFormat' => 'path',
            'showScriptName'=>false,
            'rules' => array(
                '<lang:(en|vi|ko)>/<_c>/<_a>/' => '<_c>/<_a>',  
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        // uncomment the following to use a MySQL database		
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=db_flexiblearning',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'lighthouse',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
        'ELangHandler' => array(
            'class' => 'application.extensions.langhandler.ELangHandler',
            'languages' => array('en', 'ko', 'vi'),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
        'dateFormat' => 'dd/MM/yyyy',
        'dateFormatForTimestamp' => 'd/m/yy',
        'defaultRoleId' => 3,
        'lectureThumbnails' => 'resources/lectures',
        'lessonThumbnails' => 'resources/lessons',
        'video' => 'resources/videos',
        'state' => array(0 => 'Inactive', 1 => 'Active'),
        'defaultLanguage' => 'en',
        'widthThumbnailLesson' => '200px',
        'heightThumbnailLesson' => '135px',
        'numberOfVideoPerRowOnIndex' => 4,
        'defaultLessonThumbnail' => 'resources/default-lesson-thumbnail.jpg',
        'moneyUnit' => '$',
        'flashObjectFolder' => 'flash_object',
        'videoWidth' => 600,
        'videoHeight' => 400,
    ),
);