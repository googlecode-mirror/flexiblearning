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
            'upload' => array(
                'class' => 'ext.xupload.actions.XUploadAction',
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
            array('deny',
                'actions' => array('forget'),
                'users' => array('@')
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        if (isset($_GET['idLanguage'])) {
            $idLanguage = $_GET['idLanguage'];
        }
        if (!isset($idLanguage)) {
            $defaultLanguage = Language::model()->findByAttributes(array('code' => Yii::app()->params['defaultLanguage']));
            $idLanguage = $defaultLanguage->getPrimaryKey();
        }
        $categories = Category::model()->findAllByAttributes(array('id_language' => $idLanguage, 'is_active' => 1));
        $arrLectures = array();
        foreach ($categories as $category) {
            $criteria = new CDbCriteria();
            $criteria->order = 'created_date DESC';
            $criteria->addCondition(array(
                sprintf('id_category = %d', $category->getPrimaryKey()),
                'is_active= 1')
            );
            $criteria->limit = Yii::app()->params['numberOfLecturePerCategoryInIndexPage'];

            $arrLectures[$category->getPrimaryKey()] = Lecture::model()->findAll($criteria);
        }

        $this->render('index', array('categories' => $categories, 'arrLectures' => $arrLectures));
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
     * Displays the login page
     */
    public function actionLogin() {
        $notValidReturnUrls = array(
            $this->createUrl('account/register'), 
            $this->createUrl('site/forget'),
            $this->createUrl('site/login'),
            $this->createUrl('site/logout'),
            $this->createUrl('site/contact'),
        );
        
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
                if (in_array($url, $notValidReturnUrls)) {
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
            $authMgr->createOperation('adminLecture', 'Manage lectures');

            $authMgr->createOperation('createLesson', 'Create lessons');
            $authMgr->createOperation('createLecture', 'Create lectures');

            $bizRule = 'return Yii::app()->user->id==$params["lesson"]->createdBy;';
            $authMgr->createOperation('adminOwnLesson', "Manager the own users' lessons");

            $bizRule = 'return Yii::app()->user->id==$params["lecture"]->owner_by;';
            $authMgr->createOperation('adminOwnLecture', "Manager the own users' lectures");

            $roleGuest = $authMgr->createRole('guest');
            $roleAuthenticated = $authMgr->createRole('authenticate');
            $roleStudent = $authMgr->createRole('student');
            $roleTeacher = $authMgr->createRole('teacher');
            $roleAdmin = $authMgr->createRole('admin');

            $roleTeacher->addChild('adminOwnLesson');
            $roleTeacher->addChild('adminOwnLecture');
            $roleTeacher->addChild('createLesson');
            $roleTeacher->addChild('createLecture');

            $roleAdmin->addChild('adminUser');
            $roleAdmin->addChild('adminLesson');
            $roleAdmin->addChild('createLesson');
            $roleAdmin->addChild('createLecture');
            $roleAdmin->addChild('adminCategory');
            $roleAdmin->addChild('adminLecture');

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

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;

        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];

            if ($model->validate()) {
                Yii::import('application.extensions.yii-mail.YiiMailMessage');
                $message = new YiiMailMessage();
                $message->setTo(Yii::app()->params['contactEmail']);
                // array('flexiblearning@gmail.com' => 'Osaona'));
                $message->setFrom(array($model->email => $model->name));
                $message->setSubject(Yii::app()->params['contactSubject']);
                $message->view = 'contact';
                $message->setBody(array('model' => $model), 'text/html');
                $numsent = Yii::app()->mail->send($message);
                $confirm = Yii::t('zii', "Emails sent. Thank you for contacting us. We will respond to you as soon as possible.");
                Yii::app()->user->setFlash('contact', $confirm);
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    private function _assignRandValue($num) {
// accepts 1 - 36
        switch ($num) {
            case "1":
                $rand_value = "a";
                break;
            case "2":
                $rand_value = "b";
                break;
            case "3":
                $rand_value = "c";
                break;
            case "4":
                $rand_value = "d";
                break;
            case "5":
                $rand_value = "e";
                break;
            case "6":
                $rand_value = "f";
                break;
            case "7":
                $rand_value = "g";
                break;
            case "8":
                $rand_value = "h";
                break;
            case "9":
                $rand_value = "i";
                break;
            case "10":
                $rand_value = "j";
                break;
            case "11":
                $rand_value = "k";
                break;
            case "12":
                $rand_value = "l";
                break;
            case "13":
                $rand_value = "m";
                break;
            case "14":
                $rand_value = "n";
                break;
            case "15":
                $rand_value = "o";
                break;
            case "16":
                $rand_value = "p";
                break;
            case "17":
                $rand_value = "q";
                break;
            case "18":
                $rand_value = "r";
                break;
            case "19":
                $rand_value = "s";
                break;
            case "20":
                $rand_value = "t";
                break;
            case "21":
                $rand_value = "u";
                break;
            case "22":
                $rand_value = "v";
                break;
            case "23":
                $rand_value = "w";
                break;
            case "24":
                $rand_value = "x";
                break;
            case "25":
                $rand_value = "y";
                break;
            case "26":
                $rand_value = "z";
                break;
            case "27":
                $rand_value = "0";
                break;
            case "28":
                $rand_value = "1";
                break;
            case "29":
                $rand_value = "2";
                break;
            case "30":
                $rand_value = "3";
                break;
            case "31":
                $rand_value = "4";
                break;
            case "32":
                $rand_value = "5";
                break;
            case "33":
                $rand_value = "6";
                break;
            case "34":
                $rand_value = "7";
                break;
            case "35":
                $rand_value = "8";
                break;
            case "36":
                $rand_value = "9";
                break;
        }
        return $rand_value;
    }

    private function _getRandId($length) {
        if ($length > 0) {
            $rand_id = "";
            for ($i = 1; $i <= $length; $i++) {
                mt_srand((double) microtime() * 1000000);
                $num = mt_rand(1, 36);
                $rand_id .= $this->_assignRandValue($num);
            }
        }
        return $rand_id;
    }

    public function actionForget() {
        $model = new ForgetForm;

        if (isset($_POST['ForgetForm'])) {
            $model->attributes = $_POST['ForgetForm'];

            if ($model->validate()) {
                $acc = Account::model()->findByAttributes(array('username' => $model->username));
                if (empty($acc)) {
                    $confirm = "The Username is not exist!";
                    Yii::app()->user->setFlash('forget', $confirm);
                    $this->refresh();
                    return;
                } else {
                    if ($acc->email != $model->email) {
                        $confirm = "Email is not right!";
                        Yii::app()->user->setFlash('forget', $confirm);
                        $this->refresh();
                        return;
                    }
                }
                $newPass = $this->_getRandId(Yii::app()->params['passwordLength']);

                $acc->password = $acc->hashPassword($newPass);
                if (!$acc->save()) {
                    Yii::app()->user->setFlash('forget', "Error!");
                }

                Yii::import('application.extensions.yii-mail.YiiMailMessage');
                $message = new YiiMailMessage();
                $message->setTo($model->email);

                $message->setFrom(array(Yii::app()->params['siteEmail'] => Yii::app()->params['siteName']));
                $subject = "Password Reset";
                $message->setSubject($subject);
                /*$body = "Username: " . $model->username . "
                   \r\nNew password: " . $new_pass;*/
                $message->view = 'forget';
                $message->setBody(array('model'=>$model, 'newPass' => $newPass), 'text/html');
//                $message->setBody($body);
                $numsent = Yii::app()->mail->send($message);
                $confirm = "Your new password has been sent to your email.";
                Yii::app()->user->setFlash('forget', $confirm);
                $this->refresh();
            }
        }
        $this->render('forget', array('model' => $model));
    }

}