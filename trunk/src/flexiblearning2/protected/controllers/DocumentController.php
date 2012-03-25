<?php

class DocumentController extends Controller {
    public $layout = '//layouts/site-admin';
    public $activeMenuItemIndex = 8;

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'admin', 'delete'),
                'roles' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . '/stylesheet/form.css');
        
        $model = new Document();

        if (isset($_GET['id_lesson'])) {
            $model->id_lesson = (int)$_GET['id_lesson'];
        }
        $this->layout = false;
        if (isset($_POST['Document'])) {
            $model->attributes = $_POST['Document'];
            $model->file = $file = CUploadedFile::getInstance($model, 'file');
            if ($model->validate()) {                
                $fileName = $this->getAndSaveUploadedFile($model);
                if ($fileName) {
                    $model->document_path = $fileName;
                }
                if ($model->save()) {
                    Yii::app()->clientScript->registerScript('', 'parent.location.reload()');
                }
            }
        }
        echo $this->render('create', array('model' => $model), true);
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

        if (isset($_POST['Document'])) {
            $model->attributes = $_POST['Document'];
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
    public function actionDelete() {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $id = (int)$_POST['id'];
            if ($id) {
                $model = $this->loadModel($id);
                $model->delete();
                // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if (isset($_GET['format']) && $_GET['format'] == 'json') {
                    $data = array('result' => 1, 'message' => Yii::t('flexiblearn', 'The document is deleted successfully'));
                    echo CJSON::encode($data);
                    return;
                } elseif (!isset($_GET['ajax'])) {
                    $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
                } 
            }            
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Document');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Document('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Document']))
            $model->attributes = $_GET['Document'];

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
        $model = Document::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    private function getAndSaveUploadedFile($model) {
        $file = $model->file;
        $fileName = null;
        if ($file) {
            $fileName = Yii::app()->params['documentResource'] . '/' . $file->getName();
            if (file_exists($fileName)) {
                $fileName = Yii::app()->params['documentResource'] . '/' . time() . '_' . $file->getName();
            }
            $file->saveAs($fileName, true);
        }
        return $fileName;
    }
}

?>