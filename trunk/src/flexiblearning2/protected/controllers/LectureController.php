<?php

class LectureController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/site-admin';
    public $activeMenuItemIndex = 3;

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
                'actions' => array('index', 'view', 'listByCategory'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'upload'),
                'roles' => array('admin', 'teacher'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'roles' => array('admin', 'teacher'),
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
        $this->layout = 'site';
        $lecture = $this->loadModel($id);

        if ($lecture->is_active == 0) {
            if($lecture->owner_by != Yii::app()->user->getId() && 
                !Yii::app()->user->checkAccess('adminLecture')) {
                throw new CHttpException(403,Yii::t('yii','You are not authorized to perform this action.'));
            }
        }
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Lecture();

        if (isset($_POST['Lecture'])) {
            $model->attributes = $_POST['Lecture'];
            if (empty($model->owner_by)) {
                $model->owner_by = Yii::app()->user->getId();
            }

            if ($model->save()) {
                if (!Yii::app()->user->checkAccess('adminLecture')) {
                    $model->is_active = 0;
                    $adminUserIds = Yii::app()->db->createCommand()->select('userid')->from('authassignment')
                                    ->where('itemname=:itemname', array(':itemname' => 'admin'))->queryColumn();
                    foreach ($adminUserIds as $id) {
                        $message = new Message();
                        $message->id_from = Yii::app()->user->getId();
                        $message->id_user = $id;
                        $message->subject = 'A new lecture is created';
                        $message->message = "User " .
                                CHtml::link($this->viewer->username, $this->createUrl('account/view', array('id' => $this->viewer->getPrimaryKey()))) .
                                " have just created the lecture " .
                                CHtml::link($model->title, $this->createUrl('lecture/view', array('id' => $model->getPrimaryKey())));
                        $message->save();
                    }
                }

                $this->redirect(array('view', 'id' => $model->id));
            }

//            $model->fileIntro = $file = CUploadedFile::getInstance($model, 'fileIntro');
//            if ($model->validate(array('fileIntro'))) {
//                if ($file) {
//                    $fileName = Yii::app()->params['video'] . '/' . $file->getName();
//                    if (file_exists($fileName)) {
//                        $fileName = Yii::app()->params['video'] . '/'
//                                . time() . '_' . $file->getName();
//                    }
//                    if ($file->saveAs(strtolower($fileName), true)) {
//                        /* $videoHelper = new CVideo();
//                          $videoThumbnailName = $videoHelper->create_thumbnail($fileName,
//                          Yii::app()->params['videoWidth'],
//                          Yii::app()->params['videoHeight'],
//                          Yii::app()->params['videoThumbnail']
//                          );
//                          $convertVideoFileName = $videoHelper->convertVideo($fileName);
//
//                          $model->path_video_intro = $convertVideoFileName;
//                          $model->path_video_thumbnail = $videoThumbnailName; */
//                        $model->path_video_intro = $fileName;
//                        $model->path_video_thumbnail = Yii::app()->params['defaultLectureThumbnail'];
//                    }
//                }
//                if ($model->save()) {
//                    $this->redirect(array('view', 'id' => $model->id));
//                }
//            }
        }

        $params = $this->getActionParams();

        if ($params && array_key_exists('idCategory', $params)) {
            $model->id_category = (int) $params['idCategory'];
        }

        if (Yii::app()->user->checkAccess('adminLecture')) {
            $model->is_active = 1;
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

        if (isset($_POST['Lecture'])) {
            $model->attributes = $_POST['Lecture'];
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
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
        $model = new Lecture('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Lecture'])) {
            $model->attributes = $_GET['Lecture'];
        }

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
        $model = Lecture::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionListByCategory() {
        $params = $_POST;
        foreach ($params as $param) {
            if (isset($params) && is_array($param) && array_key_exists('id_category', $param)) {
                $idCategory = (int) $param['id_category'];
            }
        }

        if (isset($idCategory)) {
            $data = Lecture::model()->findAllByAttributes(array('id_category' => $idCategory));
            $data = CHtml::listData($data, 'id', 'title');
            foreach ($data as $value => $name) {
                echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
            }
        }
    }

    public function actionUpload() {
        Yii::import("ext.EAjaxUpload.qqFileUploader");

        $folder = Yii::app()->params['lectureVideoIntro'] . '/'; // folder for uploaded files

        $uploader = new qqFileUploader(Yii::app()->params['arrayVideoExtensions'], Yii::app()->params['videoMaxSize']);
        $result = $uploader->handleUpload($folder);

        $fileSize = filesize($folder . $result['filename']); //GETTING FILE SIZE
        $fileName = $result['file'] = $folder . $result['filename'];

        $result = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
        echo $result; // it's array
    }

}
