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
        $idLanguage = $_GET['idLanguage'];
        if (!isset($idLanguage)) {
            $defaultLanguage = Language::model()->findByAttributes(array('code' => Yii::app()->params['defaultLanguageCategory']));
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
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
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
            $authMgr->createOperation('adminLecture', 'Manage lectures');
            $authMgr->createOperation('createLecture', 'Create lectures');

            $bizRule = 'return Yii::app()->user->id==$params["lecture"]->authID;';
            $authMgr->createOperation('adminOwnLecture', "Manager the own users' lectures");

            $roleGuest = $authMgr->createRole('guest');
            $roleAuthenticated = $authMgr->createRole('authenticate');
            $roleStudent = $authMgr->createRole('student');
            $roleTeacher = $authMgr->createRole('teacher');
            $roleAdmin = $authMgr->createRole('admin');

            $roleTeacher->addChild('adminOwnLecture');
            $roleTeacher->addChild('createLecture');
            
            $roleAdmin->addChild('adminUser');
            $roleAdmin->addChild('adminLecture');
            $roleAdmin->addChild('createLecture');

            $authMgr->assign('admin', 1);
            $authMgr->assign('teacher', 2);
        }
    }

    public function actionAdmin() {
        $this->layout = 'main';
        $this->render('admin');
    }

}