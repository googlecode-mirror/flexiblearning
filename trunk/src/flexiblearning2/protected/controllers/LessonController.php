<?php

class LessonController extends Controller {
    public $layout = '//layouts/site-column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', 
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', 
                'actions' => array('create', 'update'),
                'roles' => array('admin', 'teacher'),
            ),
            array('allow', 
                'actions' => array('admin', 'delete'),
                'roles' => array('admin', 'teacher'),             
            ),
            array('allow',
                'actions' => array('deleteAnswer', 'deleteQuestion'),
                'roles' => array('admin', 'teacher'),
            ),
            array('allow',
                'actions' => array('postQuestion', 'view'),
                'roles' => array('admin', 'teacher', 'student'),
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
        $lesson = $this->loadModel($id);
        
        if ($lesson->is_active == 0) {
            if($lesson->owner_by != Yii::app()->user->getId() && 
                !Yii::app()->user->checkAccess('adminLesson')) {
                throw new CHttpException(403,Yii::t('yii','You are not authorized to perform this action.'));
            }
        }
        
        $criteria = new CDbCriteria();
        $criteria->addCondition(array('id_lesson' => $lesson->getPrimaryKey()));
                
        $count = Question::model()->count($criteria);
        $questionPages = new CPagination($count);

        // results per page
        $questionPages->pageSize= Yii::app()->params['nQuestionsInLessonPage'];
        $questionPages->applyLimit($criteria);
        $questions = Question::model()->findAll($criteria);
        
        $banners = Banner::model()->findAll('is_active = 1');

        $this->render('view', array(
            'model' => $lesson,
            'questions' => $questions,
            'questionPages' => $questionPages,
            'banners' => $banners
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate(/*$idLecture*/) {
        $model = new Lesson();
        if (isset($_GET['idLecture'])) {
            $model->id_lecture = (int) $_GET['idLecture'];
        }

        if (isset($_POST['Lesson'])) {
            $model->attributes = $_POST['Lesson'];
            if (empty($model->owner_by)) {
                $model->owner_by = Yii::app()->user->getId();
            }
            $model->fileThumbnail = $file = CUploadedFile::getInstance($model, 'fileThumbnail');

            if ($model->validate(array('file'))) {
                $fileName = $this->getAndSaveUploadedFile($model);
                if ($fileName) {
                    $model->thumbnail = $fileName;
                }
                
                if ($model->save()) {
                    if (!Yii::app()->user->checkAccess('adminLesson')) {
                        $model->is_active = 0;
                        $adminUserIds = Yii::app()->db->createCommand()->select('userid')->from('authassignment')
                                        ->where('itemname=:itemname', array(':itemname' => 'admin'))->queryColumn();
                        foreach ($adminUserIds as $id) {
                            $message = new Message();
                            $message->id_from = Yii::app()->user->getId();
                            $message->id_user = $id;
                            $message->subject = 'A new lesson is created';
                            $message->message = "User " .
                                    CHtml::link($this->viewer->username, $this->createUrl('account/view', array('id' => $this->viewer->getPrimaryKey()))) .
                                    " have just created the lesson " .
                                    CHtml::link($model->title, $this->createUrl('lesson/view', array('id' => $model->getPrimaryKey())));
                            $message->save();
                        }
                    }
                    
                    $this->redirect(array('view', 'id' => $model->getPrimaryKey()));
                }
            }
        }
        $params = $this->getActionParams();
        if ($params && array_key_exists('idLecture', $params)) {
            $model->id_lecture = (int)$params['idLecture'];
        }
        if (Yii::app()->user->checkAccess('adminLesson')) {
            $model->is_active = 1;
        }
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

        if (isset($_POST['Lesson'])) {
            $model->attributes = $_POST['Lesson'];
            $model->fileThumbnail = CUploadedFile::getInstance($model, 'fileThumbnail');
            if ($model->fileThumbnail) {
                if ($model->validate(array('fileThumbnail'))) {
                    $fileName = $this->getAndSaveUploadedFile($model);
                    if ($fileName) {
                        if ($model->thumbnail && file_exists($model->thumbnail)) {
                            unlink($model->thumbnail);
                        }
                        $model->thumbnail = $fileName;
                    }
                }
            }
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->getPrimaryKey()));
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
        $this->layout = 'site-admin';
        $model = new Lesson('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Lesson'])) {
            $model->attributes = $_GET['Lesson'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionPostQuestion() {
        $idLession = (int) $_GET['idLesson'];
        if ($idLession) {
            $lesson = Lesson::model()->findByPk($idLession);
        }

        if (isset($lesson) && $lesson) {
            $viewer = Yii::app()->user;
            $id = $viewer->getId();
            if (isset($_POST['Question'])) {
                $question = new Question();
                $question->attributes = $_POST['Question'];
                $question->id_account = $viewer->getId();
                $question->id_lesson = $idLession;
                $question->username = $viewer->getName();

                if ($question->save()) {
                    $criteria = new CDbCriteria();
                    $criteria->addCondition(array('id_lesson' => $lesson->getPrimaryKey()));
                    $criteria->order = 'id DESC';

                    $count = Question::model()->count($criteria);
                    $questionPages = new CPagination($count);

                    // results per page
                    $questionPages->pageSize= Yii::app()->params['nQuestionsInLessonPage'];
                    $questionPages->applyLimit($criteria);
                    $questions = Question::model()->findAll($criteria);
                    $this->renderPartial('/_questions_answers', 
                        array(
                            'lesson' => $lesson,
                            'questions' => $questions,
                            'questionPages' => $questionPages,
                        )
                    );
                } else {
                    echo '-1';
                }
            }
        }
    }

    public function actionDeleteQuestion() {
        $idQuestion = (int) $_POST['question_id'];
        if ($idQuestion) {
            $question = Question::model()->findByPk($idQuestion);
        }

        if (isset($question) && $question) {
            if ($question->delete()) {
                $lesson = Lesson::model()->findByPk($question->id_lesson);
                $criteria = new CDbCriteria();
                $criteria->addCondition(array('id_lesson' => $lesson->getPrimaryKey()));
                $criteria->order = 'id DESC';

                $count = Question::model()->count($criteria);
                $questionPages = new CPagination($count);

                // results per page
                $questionPages->pageSize= Yii::app()->params['nQuestionsInLessonPage'];
                $questionPages->applyLimit($criteria);
                $questions = Question::model()->findAll($criteria);

                $this->renderPartial('/_questions_answers', 
                    array(
                        'lesson' => $lesson,
                        'questions' => $questions,
                        'questionPages' => $questionPages,
                    )
                );
            } else {
                echo '-1';
            }
        }
    }
    
    public function actionDeleteAnswer() {
        $idAnswer = (int) $_POST['answer_id'];
        if ($idAnswer) {
            $answer = Answer::model()->findByPk($idAnswer);
        }

        if (isset($answer) && $answer) {
            if ($answer->delete()) {
                $lesson = Lesson::model()->findByPk($answer->question->id_lesson);
                $criteria = new CDbCriteria();
                $criteria->addCondition(array('id_lesson' => $lesson->getPrimaryKey()));
                $criteria->order = 'id DESC';

                $count = Question::model()->count($criteria);
                $questionPages = new CPagination($count);

                // results per page
                $questionPages->pageSize= Yii::app()->params['nQuestionsInLessonPage'];
                $questionPages->applyLimit($criteria);
                $questions = Question::model()->findAll($criteria);

                $this->renderPartial('/_questions_answers', 
                    array(
                        'lesson' => $lesson,
                        'questions' => $questions,
                        'questionPages' => $questionPages,
                    )
                );
            } else {
                echo '-1';
            }
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Lesson::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'lesson-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    private function getAndSaveUploadedFile($model) {
        $file = $model->fileThumbnail;
        $fileName = null;
        if ($file) {
            $fileName = Yii::app()->params['lessonThumbnails'] . '/' . $file->getName();
            if (file_exists($fileName)) {
                $fileName = Yii::app()->params['lessonThumbnails'] . '/' . time() . '_' . $file->getName();
            }
            $file->saveAs($fileName, true);
        }
        return $fileName;
    }

}