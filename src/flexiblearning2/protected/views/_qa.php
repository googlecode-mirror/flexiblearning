<?php
    $myQuestions = array();
    if (!Yii::app()->user->getIsGuest()) {
        foreach($questions as $ques) {
            if ($ques->id_account == Yii::app()->user->getId()) {
                array_push($myQuestions, $ques);
            }
        }
    }
?>

<div class="top" style="width:281px;">
    <ul id="tab2" class="tab2">
        <li class="active">
            <a href="#hoidap"><?php echo Yii::t('zii', 'QA') ?></a>
        </li>
        <li> 
            <a href="#cuatoi"><?php echo Yii::t('zii', 'My Questions') ?></a>
        </li>
    </ul>
    <div id="tab2-box">
        <div id="tab2-content">
            <div id="hoidap">
                <?php
                    $questionModel = new Question();
                ?>
                <?php if (!Yii::app()->user->getIsGuest()) : ?>
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'question-form',
                        'action' => $this->createUrl('lesson/postQuestion', array('idLesson' => $lesson->getPrimaryKey())),
                        'enableAjaxValidation' => false));
                    ?>
                        <?php
                            echo $form->textArea($questionModel, 'content', array(
                                'class' => 'qa_question'
                            ));
                        ?>                
                        <div class="btn-area block">
                            <?php echo CHtml::submitButton(Yii::t('zii', 'Post question'), array('class' => 'bt-cauhoi')); ?>
                        </div>
                    <?php $this->endWidget(); ?>
                <?php endif; ?>
                <div class="box-questions-and-answers">
                    <?php
                    $this->renderPartial('/_questions_answers', array(
                        'lesson' => $lesson,
                        'questions' => $questions,
                        'questionPages' => $questionPages
                    ));
                    ?>
                </div>
            </div>
            <div id="cuatoi">
                <?php if (!Yii::app()->user->getIsGuest()) : ?>
                    <div class="box-questions-and-answers">
                        <?php
                        $this->renderPartial('/_questions_answers', array(
                            'lesson' => $lesson,
                            'questions' => $myQuestions,
                        ));
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" language="javascript">
    jQuery('#tab2').tabify();    
    
    function showAnswerFrame(element) {
        var formEle = jQuery(element).parent('.link-answer').next();
        if (jQuery(formEle).is(":visible")) {            
            jQuery(formEle).toggle();
        } else {
            jQuery(formEle).show();            
        }
    }
    
    function deleteQuestion(questionId, ele) {
        var url = '<?php echo $this->createUrl('lesson/deleteQuestion') ?>';
        jQuery.post(url, {'question_id' : questionId}, function(data){
            jQuery(ele).parentsUntil('.box-questions-and-answers').html(data);
            jQuery('form.frm-answer').bind('submit', submitAnswer);
        });
    }
    
    function deleteAnswer(answerId, ele) {
        var url = '<?php echo $this->createUrl('lesson/deleteAnswer') ?>';
        jQuery.post(url, {'answer_id' : answerId}, function(data){
            jQuery(ele).parentsUntil('.box-questions-and-answers').html(data);
            jQuery('form.frm-answer').bind('submit', submitAnswer);
        });
    }
</script>