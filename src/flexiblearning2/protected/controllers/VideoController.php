<?php

class VideoController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
//	public $layout='//layouts/column2';

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
                'actions' => array('create', 'update', 'upload'),
                'roles' => array('admin', 'teacher'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'roles' => array('admin'),
            ),
            array('allow',
                'actions' => array('view'),
                'users' => array('@')
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
        $video = $this->loadModel($id);
        $lesson = $video->lesson;

        $criteria = new CDbCriteria();
        $criteria->addCondition(array('id_lesson' => $lesson->getPrimaryKey()));
        $criteria->order = 'id DESC';

        $count = Question::model()->count($criteria);
        $questionPages = new CPagination($count);

        // results per page
        $questionPages->pageSize = Yii::app()->params['nQuestionsInLessonPage'];
        $questionPages->applyLimit($criteria);
        $questions = Question::model()->findAll($criteria);

        $banners = Banner::model()->findAll('is_active = 1');

        $this->render('view', array(
            'model' => $this->loadModel($id),
            'lesson' => $lesson,
            'questions' => $questions,
            'questionPages' => $questionPages,
            'banners' => $banners
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($idLesson) {
        $this->layout = 'site';
        $model = new Video();
        $model->id_lesson = (int) $idLesson;

        $arrayModels = array();
        if (isset($_POST['Video'])) {
            $model->attributes = $_POST['Video'];
            $model->id_lesson = $idLesson;
            $model->path_video_thumbnail = Yii::app()->params['defaultLessonThumbnail'];
            
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
//            $model->file = $file = CUploadedFile::getInstance($model, 'file');

//            if ($model->validate(array('file'))) {
//                $fileName = Yii::app()->params['video'] . '/' . $file->getName();
//                if (file_exists($fileName)) {
//                    $fileName = Yii::app()->params['lessonThumbnails'] . '/' . time() . '_' . $file->getName();
//                }
//                if ($file->saveAs(strtolower($fileName))) {
////                    $videoHelper = new CVideo();
////                    $videoThumbnailName = $videoHelper->create_thumbnail($fileName, 
////                            Yii::app()->params['videoWidth'], 
////                            Yii::app()->params['videoHeight'], 
////                            Yii::app()->params['videoThumbnail']
////                    );
////                    $convertVideoFileName = $videoHelper->convertVideo($fileName);
////
////                    $model->path = $convertVideoFileName;
////                    $model->path_video_thumbnail = $videoThumbnailName;
//
//                    $model->path = $fileName;
//                    $model->path_video_thumbnail = Yii::app()->params['defaultLessonThumbnail'];
//
//                    if ($model->save()) {
//                        $this->redirect(array('view', 'id' => $model->getPrimaryKey()));
//                    }
//                }
//            }
        }
        $model->is_active = 1;
        $this->render('create', array('model' => $model));
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

        if (isset($_POST['Video'])) {
            $model->attributes = $_POST['Video'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
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
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Video');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Video('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Video']))
            $model->attributes = $_GET['Video'];

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
        $model = Video::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionUpload() {
        Yii::import("ext.EAjaxUpload.qqFileUploader");

        $folder = Yii::app()->params['video'] . '/'; // folder for uploaded files

        $uploader = new qqFileUploader(Yii::app()->params['arrayVideoExtensions'], Yii::app()->params['videoMaxSize']);
        $result = $uploader->handleUpload($folder);

        $fileSize = filesize($folder . $result['filename']); //GETTING FILE SIZE
        $fileName = $result['file'] = $folder . $result['filename'];

        $result = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
        echo $result; // it's array
    }

}
