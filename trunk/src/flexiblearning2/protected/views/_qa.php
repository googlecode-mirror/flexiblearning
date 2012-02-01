<div class="top" style="width:281px; height:230px;">
    <div style="height:30px;">
        <ul id="tab2" class="tab2">
            <li class="active">
                <a href="#hoidap"><?php echo Yii::t('zii', 'QA') ?></a>
            </li>
            <li> 
                <a href="#cuatoi"><?php echo Yii::t('zii', 'My Questions') ?></a>
            </li>
        </ul>
    </div>
    <div id="tab2-box">
        <?php
        $questionModel = new Question();
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'question-form',
            'action' => $this->createUrl('lesson/postQuestion', array('idLesson' => $lesson->getPrimaryKey())),
            'enableAjaxValidation' => false));
        ?>
        <div id="tab2-content">
            <div id="hoidap">
                <?php
                echo $form->textArea($questionModel, 'content', array(
                    'class' => 'qa_question'
                ));
                ?>                
                <div class="btn-area">
                    <?php echo CHtml::submitButton(Yii::t('zii', 'Post question'), array('class' => 'bt-cauhoi')); ?>
                </div>
            </div>
            <div id="cuatoi">

            </div>
        </div>

        <div style="width:270px; height:30px; margin-top:10px;">
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>

<div id="box-qa">
    <table>
        <?php foreach ($lesson->questions as $question) : ?>
            <tr>
                <td class="question"><?php echo Yii::t('zii', 'Q') ?></td>
                <td>
                    <?php echo $question->content ?>
                    <br />
                    <?php echo Yii::t('zii', 'By') ?>
                    <span class="colo">
                        <a href="<?php echo $this->createUrl('account/view', array('id' => $question->id_account)) ?>"><?php echo $question->username ?></a>
                    </span>  
                    <div class="link-answer">
                        <a href="javascript::void()"><?php echo Yii::t('zii', 'Post my answer')?></a>
                    </div>
                    <form class="frm-answer" method="post" 
                          action="<?php echo $this->createUrl('question/answer', array('id' => $question->getPrimaryKey()))?>">
                        <input type="hidden" name="Answer[id_question]" value="<?php echo $question->getPrimaryKey()?>" />
                        <textarea name="Answer[content]" class="qa_answer"></textarea>
                        <div class="btn-area">
                            <input type="submit" value="<?php echo Yii::t('zii', 'Post')?>" class="btn" />
                        </div>
                    </form>
                </td>
            </tr>
            <?php foreach ($question->answers as $answer) : ?>
                <tr>
                    <td class="answer"><?php echo Yii::t('zii', 'A')?></td>
                    <td>
                        <?php echo $answer->content?>
                        <br />
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>        
    </table>
</div>
<script type="text/javascript" language="javascript">
    $('#tab2').tabify();    
    
    $('.link-answer a').click(function() {
        var formEle = $(this).parent('.link-answer').next();
        if ($(formEle).is(":visible")) {            
            $(formEle).toggle();
        } else {
            $(formEle).show();            
        }
    });
</script>