<?php

class EntryController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/site-column2';

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
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'admin', 'delete'),
                'roles' => array('teacher', 'admin'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->layout = 'site';
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Entry();
        $model->owner_by = Yii::app()->user->getId();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Entry'])) {
            $model->attributes = $_POST['Entry'];
            if ($model->validate()) {
                $fileName = $this->getAndSaveUploadedFile($model);
                if ($fileName) {
                    $model->imagepath = $fileName;
                }
                if ($model->save(false)) {
                    $this->redirect(array('view', 'id' => $model->id));
                } 
            }
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

        if (Yii::app()->user->checkAccess('adminEntry') || 
                Yii::app()->user->checkAccess('adminOwnEntry', array('entry' => $model))) {
            if (isset($_POST['Entry'])) {
                $model->attributes = $_POST['Entry'];
                if ($model->validate()) {
                    $fileName = $this->getAndSaveUploadedFile($model);
                    if ($fileName) {
                        unlink($model->imagepath);
                        $model->imagepath = $fileName;
                    }
                    if ($model->save(false)) {
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                }

            }
        } else {
            throw new CHttpException(403,Yii::t('yii','You are not authorized to perform this action.'));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $model = $this->loadModel($id);
            
            if (Yii::app()->user->checkAccess('adminEntry') 
                || Yii::app()->user->checkAccess('adminOwnEntry', array('entry' => $model))) {
                $model->delete();
            } else {
                throw new CHttpException(403,Yii::t('yii','You are not authorized to perform this action.'));
            }

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $this->layout = 'site-admin';
        $this->activeMenuItemIndex = 9;
        
        $model = new Entry();
        $this->render('admin', array(
            'model' => $model,
        ));
    }
    
    /**
     * Manages all models.
     */
    public function actionManage() {
        $model = new Entry('search');
        $model->unsetAttributes();  // clear any default values
        
        if (isset($_GET['Entry'])) {
            $model->attributes = $_GET['Entry'];
        }
        $model->owner_by = Yii::app()->user->getId();

        $this->render('manage', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Entry::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    
    private function getAndSaveUploadedFile($model) {
        $file = CUploadedFile::getInstance($model, 'fileThumbnail');
        $fileName = null;
        if ($file) {
            $fileName = Yii::app()->params['entryThumbnails'] . '/' . $file->getName();
            if (file_exists($fileName)) {
                $fileName = Yii::app()->params['entryThumbnails'] . '/' . time() . '_' . $file->getName();
            }
            $file->saveAs($fileName, true);
        }
        return $fileName;
    }
}
