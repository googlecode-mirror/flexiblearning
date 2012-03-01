<?php

class QuestionController extends Controller {

    public function actionAnswer() {
        $answer = new Answer();
        if (isset($_POST['Answer'])) {
            $answer->attributes = $_POST['Answer'];
            $answer->id_account = Yii::app()->user->getId();
            if ($answer->save()) {
                $question = $answer->question;
                $lesson = $question->lesson;
                
                $criteria = new CDbCriteria();
                $criteria->addCondition(array('id_lesson' => $lesson->getPrimaryKey()));
                $criteria->order = 'id DESC';

                $count = Question::model()->count($criteria);
                $questionPages = new CPagination($count);

                // results per page
                $questionPages->pageSize= Yii::app()->params['nQuestionsInLessonPage'];
                $questionPages->applyLimit($criteria);
                $questions = Question::model()->findAll($criteria);
                
                $this->renderPartial('/_questions_answers', array(
                    'lesson' => $lesson,
                    'questions' => $questions,
                    'questionPages' => $questionPages
                ));
            } else {
                echo '-1';
            }
        }        
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}