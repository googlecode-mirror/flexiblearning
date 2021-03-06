<?php

class PartnerController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/site-admin';

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
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'admin', 'delete', 'view'),
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
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Partner;

        if (isset($_POST['Partner'])) {
            $model->attributes = $_POST['Partner'];
            $model->fileLogo = $file = CUploadedFile::getInstance($model, 'fileLogo');
            
            if ($model->validate(array('fileIntro'))) {
                if ($file) {
                    $fileName = $this->getAndSaveUploadedFile($model);
                    $model->logo_path = $fileName;
                }
                if ($model->save()) {
                    $this->redirect(array('admin'));
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

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Partner'])) {
            $model->attributes = $_POST['Partner'];
            $model->fileLogo = CUploadedFile::getInstance($model, 'fileLogo');
            if ($model->fileLogo) {
                if ($model->validate(array('fileLogo'))) {
                    $fileName = $this->getAndSaveUploadedFile($model);
                    if ($fileName) {
                        if ($model->logo_path && file_exists($model->logo_path)) {
                            unlink($model->logo_path);
                        }
                        $model->logo_path = $fileName;
                    }
                }
            }
            if ($model->save()) {
                $this->redirect(array('admin'));
            }
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
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }
    
    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Partner('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Partner']))
            $model->attributes = $_GET['Partner'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Partner::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    
    private function getAndSaveUploadedFile($model) {
        $file = $model->fileLogo;
        $fileName = null;
        if ($file) {
            $fileName = Yii::app()->params['partner'] . '/' . $file->getName();
            if (file_exists($fileName)) {
                $fileName = Yii::app()->params['partner'] . '/' . time() . '_' . $file->getName();
            }
            $file->saveAs($fileName, true);
        }
        return $fileName;
    }
}
