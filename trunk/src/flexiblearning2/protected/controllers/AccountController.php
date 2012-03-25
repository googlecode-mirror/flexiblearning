<?php

class AccountController extends Controller {
    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the register page
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
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('deny',
                'actions' => array('register'),
                'users' => array('@'),
            ),
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'register', 'captcha', 'suggest'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'buy'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'roles' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $model = $this->loadModel($id);
        $this->renderProfileDetail($model);
    }
    
    public function actionSuggest() {
        //{ query:'vi',suggestions:['Viet Nam','Virgin Islands, British','Virgin Islands, U.s.'],data:['vn','vg','vi'] }
        
        $query = $_GET['query'];
        if (!empty ($query)) {
            $criteria = new CDbCriteria();
            $criteria->compare('username', $query, true);
            $criteria->compare('fullname', $query, true, 'OR');
            $accounts = Account::model()->findAll($criteria);

            $suggestions = array();
            $data = array();
            foreach($accounts as $account) {
                array_push($suggestions, "{$account->username} - {$account->fullname}");
                array_push($data, $account->getPrimaryKey());
            }
            $returnData = array('query' => $query, 'suggestions' => $suggestions, 'data' => $data);
            echo json_encode($returnData);
        }
    }

    private function renderProfileDetail($model) {
//        $roles = Yii::app()->authManager->getRoles($model->getPrimaryKey());
        $role = $model->role;
        if (!empty($role)) {
            if ($role == 'admin' || $role == 'teacher') {
                $criteria = new CDbCriteria();
                $criteria->order = 'created_date DESC';
                $criteria->condition = 'owner_by = :owner_by';
                $criteria->params = array(':owner_by' => $model->getPrimaryKey());
                $count = Entry::model()->count($criteria);
                $pages = new CPagination($count);

                // results per page
                $pages->pageSize = Yii::app()->params['entriesPerPage'];
                $pages->applyLimit($criteria);
                $entries = Entry::model()->findAll($criteria);
                
                $dataRender = array(
                    'model' => $model,
                    'entries' => $entries,
                    'pages' => $pages,
                );
                if ($this->getRoute() == 'account/update') {
                    $dataRender['mode'] = 'edit';
                }                
                $this->render('view_teacher', $dataRender);
            } elseif ($role == 'student') {
                $dataRender = array(
                    'model' => $model,                    
                );
                if ($this->getRoute() == 'account/update') {
                    $dataRender['mode'] = 'edit';
                }
                $this->render('view_student', $dataRender);
            } else {
                $dataRender = array(
                    'model' => $model,                    
                );
                if ($this->getRoute() == 'account/update') {
                    $dataRender['mode'] = 'edit';
                }
                $this->render('view_user', $dataRender);
            }
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Account;
        $model->is_active = 1;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Account'])) {
            $model->attributes = $_POST['Account'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        if (isset($_POST['Account']) && !isset($_POST['updateRole'])) {
            $model->attributes = $_POST['Account']; 
            if ($model->validate()) {
                $fileName = $this->getAndSaveUploadedFile($model);
                if ($fileName) {
                    @unlink($model->avatar);
                    $model->avatar = $fileName;
                }
                if ($model->save(false)) {
                    Yii::app()->user->setFlash('message', Yii::t('flexiblearn', 'User information is updated successfully'));
                    $this->redirect(array('view', 'id' => $model->id));
                }
            }
        } else {
            if (isset($_POST['updateRole']) &&  $_POST['updateRole'] == 'Update') {
                $newRole = $_POST['role'];
                if ($newRole) {
                    if (Yii::app()->user->checkAccess('adminUser') && Yii::app()->user->getId() != $id) {
                        $authMgr = Yii::app()->authManager;
                        foreach(Yii::app()->params['roles'] as $role) {
                            if ($authMgr->isAssigned($role, $id)) {
                                $authMgr->revoke($role, $id);
                            }
                        }
                        if ($newRole != 'user') {
                            $authMgr->assign($newRole, $id);
                        }
                        Yii::app()->user->setFlash('message', Yii::t('flexiblearn', 'User\'s role has been updated successfully'));
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                }
            }
        }
        
        $this->renderProfileDetail($model);
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Account');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $this->layout = 'site-admin';
        $model = new Account('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Account']))
            $model->attributes = $_GET['Account'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionRegister() {
        $model = new RegisterForm();
        $arrModels = array('model' => $model);
        if (isset($_POST['RegisterForm'])) {
            $model->attributes = $_POST['RegisterForm'];
            if ($model->validate()) {
                $account = new Account();
                $account->attributes = $_POST['RegisterForm'];

                if ($account->save()) {
                    Yii::app()->user->setFlash('register', 
                        Yii::t('flexiblearn', 'Thank you for your registration. Please log in to the system with the new one account.'));
                    $this->refresh();
                }
                $arrModels['account'] = $account;
            } else {
                $model->password = '';
                $model->password_repeat = '';
            }
        }
        $this->render('register', $arrModels);
    }
    
    public function actionBuy() {
        $result = array();
        
        $lessonId = (int)$_POST['lessonId'];
        if ($lessonId) {
            $lesson = Lesson::model()->findByPk($lessonId);
            $accountId = Yii::app()->user->getId();
            $account = Account::model()->findByPk($accountId);
            if ($lesson && $account) {
                if ($lesson->price > $account->asset) {
                    $result['status'] = 0;
                    $result['reason'] = Yii::t('flexiblearn', 'You do not have enough money to buy this lesson. Please add some money to it !');
                } else {
                    $account->asset = $account->asset - $lesson->price;
                    $idBoughtLessons = array();
                    foreach($account->boughtLessons as $lesson) {
                        array_push($idBoughtLessons, $lesson->getPrimaryKey());
                    }
                    array_push($idBoughtLessons, $lessonId);
                    $account->boughtLessons = $idBoughtLessons;
                    if ($account->save()) {
                        Yii::app()->user->setFlash('buy-message', Yii::app()->t('zii', 'You bought this lesson successfully !'));
                        
                        $this->redirect($this->createUrl(
                                'lesson/view', 
                                array('id' => $model->getPrimaryKey(), 'success' => 1)));
                    } else {
                        Yii::app()->user->setFlash('buy-message', Yii::app()->t('zii', 'You bought this lesson unsuccessfully !'));
                        $this->redirect($this->createUrl(
                                'lesson/view', 
                                array('id' => $model->getPrimaryKey(), 'success' => 0, 'account' => $account)));
                    }                    
                    
                }
            }
        } else {
            $result['status'] = 0;
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Account::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }
    
    private function getAndSaveUploadedFile($model) {
        $file = CUploadedFile::getInstance($model, 'fileAvatar');
        $fileName = null;
        if ($file) {
            $fileName = Yii::app()->params['avatarResource'] . '/' . $file->getName();
            if (file_exists($fileName)) {
                $fileName = Yii::app()->params['avatarResource'] . '/' . time() . '_' . $file->getName();
            }
            $file->saveAs($fileName, true);
        }
        return $fileName;
    }
}
