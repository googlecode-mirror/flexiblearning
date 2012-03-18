<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Flexiblearning',
    'defaultController' => 'intro',
    'language' => 'en',
    // preloading 'log' component
    'preload' => array('log', 'ELangHandler'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'ext.xupload.models.XUploadForm',
        'application.extensions.CAdvancedArBehavior',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool		
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'lighthouse',
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
            'showScriptName' => true,
            'rules' => array(
                '<lang:(en|vi|ko|fr)>/<_c>/<_a>/' => '<_c>/<_a>',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        // uncomment the following to use a MySQL database		
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=db_flexib',
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
                    'levels' => 'error, warning, info',
                ),
            ),
        ),
        'ELangHandler' => array(
            'class' => 'application.extensions.langhandler.ELangHandler',
            'languages' => array('en', 'ko', 'fr'),
        ),
        'mail' => array(
            'class' => 'application.extensions.yii-mail.YiiMail',
            'transportType' => 'smtp', /// case sensitive!
            'transportOptions' => array(
                'host' => 'smtp.gmail.com',
                'username' => 'flexiblearning@gmail.com',
                // or email@googleappsdomain.com
                'password' => 'flexiblearning',
                'port' => '587',
//                'encryption' => 'ssl',
            ),
            'viewPath' => 'application.views.mail',
            'logging' => true,
            'dryRun' => false
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        'siteEmail' => 'flexiblearning@gmail.com',
        'siteName' => 'Fleiblearning Site',
        // this is used in contact page
        'dateFormat' => 'dd/MM/yyyy',
        'dateFormatForTimestamp' => 'd/m/yy',
        'defaultRoleId' => 3,
        'resourceDefault' => 'resources',
        'languageAvatars' => 'resources/languages',
        'lectureThumbnails' => 'resources/lectures',
        'lectureVideoIntro' => 'resources/lectures',
        'lessonThumbnails' => 'resources/lessons',
        'entryThumbnails' => 'resources/entries',
        'documentResource' => 'resources/documents',
        'video' => 'resources/videos',
        'partner' => 'resources/partners',
        'banner' => 'resources/banners',
        'state' => array(0 => 'Inactive', 1 => 'Active'),
        'defaultLanguage' => 'en',
        'widthThumbnailLesson' => '98px',
        'heightThumbnailLesson' => '135px',
        'widthThumbnailImage' => '98px',
        'heightThumbnailImage' => '135px',
        'numberOfVideoPerRowOnIndex' => 4,
        'numberOfLecturePerCategoryInIndexPage' => 4,
        'defaultLectureThumbnail' => 'resources/default-lecture-thumbnail.jpg',
        'defaultLessonThumbnail' => 'resources/default-lesson-thumbnail.jpg',
        'defaultUserAvatar' => 'resources/default-user-avatar.jpg',
        'defaultEntryThumbnail' => 'resources/default-entry-thumbnail.jpg',
        'videoThumbnail' => 'resources/video-thumbnails',
        'moneyUnit' => '$',
        'flashObjectFolder' => 'flash_object',
        'videoWidth' => 600,
        'videoHeight' => 400,
        'roles' => array(
            'teacher' => Yii::t('zii', 'Teacher'), 
            'admin' => Yii::t('zii', 'Admin'), 
            'student' => Yii::t('zii', 'Student'), 
            'user' => Yii::t('zii', 'User')
        ),
        'blogTeaserLength' => 300,
        'entriesPerPage' => 5,
        'lecturesPerPage' => 20,
        'convert_command' => 'ffmpeg\\ffmpeg.exe -i %s %s',
        'create_thumbnail_command' => 'ffmpeg\\ffmpeg.exe  -itsoffset -4  -i %s -vcodec mjpeg -vframes 1 -an -f rawvideo -s %dx%d %s',
        'videoExtensions' => 'flv, wmv, avi, mpg, mpeg, mp4',
        'arrayVideoExtensions' => array('flv', 'wmv', 'avi', 'mpg', 'mpeg', 'mp4'),
        'imageExtionsions' => 'jpg, jpeg, gif, png, bmp',
        'imageMaxSize' => 1 * (1024 * 1024), // 1 MB
        'videoMaxSize' => 60 * (1024 * 1024), // 60 MB
        'nQuestionsInLessonPage' => 5,
        'widthThumbnailVideo' => '200px',
        'heightThumbnailVideo' => '135px',
        'messagesPerPage' => 20,
        'messageTeaserLength' => 50,
        'nUserPerPage' => 20,
        'nLecturePerPage' => 20,
        'nLessonPerPage' => 20,
        'nDocumentPerPage' => 20,
        'documentExtensions' => 'xls, xlsx, doc, docx, ppt, pptx, pdf, txt, html, htm, xhtml',
        'documentMaxSize' => 10 * (1024 * 1024), // 10 MB
        // contact information
        'contactEmail' => 'flexiblearning@gmail.com',
        'contactSubject' => 'There is a contact on your site',
        'passwordLength' => 6,
        'adminName' => 'Flexiblearning Admin',
    ),
);