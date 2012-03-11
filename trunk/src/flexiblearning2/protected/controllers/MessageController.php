<?php

class MessageController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
//    public $layout = '//layouts/site';

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
            array('allow',
                'users' => array('@'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $model = $this->loadModel($id);
        if ($model->id_user != Yii::app()->user->getId()) {
            echo Yii::t('zii', 'The message you required is not existed !');
        } else {
            $model->is_read = 1;
            $model->save();
            echo $model->message;
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        if (isset($_POST['Message'])) {
            $toUsers = explode(',', $_POST['toUsers']);
            $arrUserIds = array();
            foreach($toUsers as $toUser) {
                $username = trim(strtok(trim($toUser), '-'));
                $user = Account::model()->findByAttributes(array('username' => $username));
                if ($user && $user->getPrimaryKey() != $this->viewer->getPrimaryKey()) {
                    $arrUserIds = array_merge($arrUserIds, array($user->getPrimaryKey()));
                }
            }
            if (!empty ($arrUserIds)) {
                foreach($arrUserIds as $userId) {
                    $model = new Message;
                    $model->subject = $_POST['Message']['subject'];
                    $model->message = $_POST['Message']['message'];
                    $model->id_from = $this->viewer->getPrimaryKey();
                    $model->id_user = $userId;
                    $model->save();
                }
            }
            Yii::app()->user->setFlash('message', Yii::t('zii', 'Your message is sent successfully !!!'));
            $this->redirect(array('manage'));
        }

        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.autocomplete-min.js');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/stylesheet/autocomplete.css');
        
        $this->render('create', array(
            'model' => new Message(),
        ));
    }

    public function actionDelete() {
        $request = Yii::app()->request;
        $id = $request->getParam('id', null);
        if (!empty($id)) {
            if (!is_array($id)) {
                $ids = array($id);
            } else {
                $ids = $id;
            }
        }

        if (isset($ids)) {
            $dbConnection = Yii::app()->getComponent('db');
            $transaction = $dbConnection->beginTransaction();
            try {
                foreach ($ids as $messageId) {
                    $message = Message::model()->findByPk($messageId);
                    if ($message) {
                        if ($message->id_user != Yii::app()->user->getId()) {
                            throw new Exception('You do not have permissions to delete this message');
                        }
                    } else {
                        throw new Exception('This message does not exist!');
                    }
                    $message->delete();
                }                
                $transaction->commit();
                Yii::app()->user->setFlash('message', Yii::t('zii', 'The messages are deleted successfully.'));
            } catch (Exception $e) {
                $transaction->rollBack();
            }
        }
        
        $this->redirect(array('manage'));
    }

    public function actionManage() {
        $criteria = new CDbCriteria();
        $criteria->order = 'is_read ASC';
        $criteria->addCondition('id_user = ' . Yii::app()->user->getId());

        $count = Message::model()->count($criteria);
        $pages = new CPagination($count);

        // results per page
        $pages->pageSize = Yii::app()->params['messagesPerPage'];        
        $pages->applyLimit($criteria);
        $messages = Message::model()->findAll($criteria);

        $this->render('manage', array('messages' => $messages, 'pages' => $pages));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Message::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}
