<?php
class SiteController extends Controller {

    public $layout = '//layouts/site';

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
            'upload'=>array(
                'class'=>'ext.xupload.actions.XUploadAction',
                'subfolderVar' => false,
                'path' => realpath(Yii::app()->getBasePath() . "/" . Yii::app()->params['lessonThumbnails']),
            ),
        );
    }

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'setupRole'),
                'roles' => array('admin'),
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        if (isset ($_GET['idLanguage'])) {
            $idLanguage = $_GET['idLanguage'];
        } 
        if (!isset($idLanguage)) {
            $defaultLanguage = Language::model()->findByAttributes(array('code' => Yii::app()->params['defaultLanguage']));
            $idLanguage = $defaultLanguage->getPrimaryKey();
        }
        $categories = Category::model()->findAllByAttributes(array('id_language' => $idLanguage));
        
        $this->render('index', array('categories' => $categories));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
                $this->render('error', $error);
            }
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $headers = "From: {$model->email}\r\nReply-To: {$model->email}";
                mail(Yii::app()->params['adminEmail'], $model->subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                if (isset($_GET['return-url'])) {
                    $url = $_GET['return-url'];
                } else {
                    $url = Yii::app()->user->returnUrl;
                }
                $this->redirect($url);
            }
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionSetupRole() {
        $authMgr = Yii::app()->authManager;
        if ($authMgr != null) {
            $authMgr->clearAll();

            $authMgr->createOperation('adminUser', 'Manage users');
            $authMgr->createOperation('adminLesson', 'Manage lessons');
            $authMgr->createOperation('adminCategory', 'Manage categories');
            $authMgr->createOperation('createLesson', 'Create lessons');

            $bizRule = 'return Yii::app()->user->id==$params["lesson"]->authID;';
            $authMgr->createOperation('adminOwnLesson', "Manager the own users' lessons");

            $roleGuest = $authMgr->createRole('guest');
            $roleAuthenticated = $authMgr->createRole('authenticate');
            $roleStudent = $authMgr->createRole('student');
            $roleTeacher = $authMgr->createRole('teacher');
            $roleAdmin = $authMgr->createRole('admin');

            $roleTeacher->addChild('adminOwnLesson');
            $roleTeacher->addChild('createLesson');
            
            $roleAdmin->addChild('adminUser');
            $roleAdmin->addChild('adminLesson');
            $roleAdmin->addChild('createLesson');
            $roleAdmin->addChild('adminCategory');

            $authMgr->assign('admin', 1);
            $authMgr->assign('teacher', 2);
        }
    }

    public function actionAdmin() {
        $this->layout = 'site-admin';
        $this->render('admin');
    }

    public function actionSwitchLanguage($code) {
        $lang = Language::model()->findByAttributes(array('code' => $code));
        if ($lang) {
            Yii::app()->setLanguage($code);        
            $this->redirect($this->createUrl(
                    'site/index', array('idLanguage' => $lang->getPrimaryKey())
            ));   
        }
    }
}