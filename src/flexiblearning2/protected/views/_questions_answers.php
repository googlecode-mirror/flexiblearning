<?php if ($lesson->questions) : ?>
    <table>
        <?php foreach ($questions as $question) : ?>
            <tr>
                <td class="question"><?php echo Yii::t('flexiblearn', 'Q') ?></td>
                <td style="width:100%">
                    <?php echo $question->content ?>
                    <br />
                    <?php echo Yii::t('flexiblearn', 'By') ?>
                    <span class="colo">
                        <a href="<?php echo $this->createUrl('account/view', array('id' => $question->id_account)) ?>">
                            <?php echo $question->username ?>
                        </a>
                    </span>  
                    <?php if (!Yii::app()->user->getIsGuest()) : ?>
                        <div class="link-answer">
                            <a class="post-my-answer" id="link-answer-question-<?php echo $question->getPrimaryKey()?>" 
                                href="javascript:void(0)" onclick="showAnswerFrame(this)">
                                <?php echo Yii::t('flexiblearn', 'Post My Answer') ?>
                            </a>
                            &nbsp;
                            <?php if ($question->id_account == Yii::app()->user->getId() && count($question->answers) == 0 || 
                                    Yii::app()->user->checkAccess('adminLesson') 
                                    || Yii::app()->user->checkAccess('adminOwnLesson', array('lesson' => $question->lesson))) : ?>
                                <a id="link-delete-question-<?php echo $question->getPrimaryKey()?>" 
                                   href="javascript:void(0)" 
                                   onclick="deleteQuestion('<?php echo $question->getPrimaryKey()?>', this)">
                                    <?php echo Yii::t('flexiblearn', 'Delete This Question') ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <form class="frm-answer" method="post" 
                          action="<?php echo $this->createUrl('question/answer', array('id' => $question->getPrimaryKey())) ?>">
                        <input type="hidden" name="Answer[id_question]" value="<?php echo $question->getPrimaryKey() ?>" />
                        <textarea name="Answer[content]" class="qa_answer"></textarea>
                        <div class="btn-area">
                            <input type="submit" value="<?php echo Yii::t('flexiblearn', 'Post') ?>" class="btn" />
                        </div>
                    </form>
                </td>
            </tr>
            <?php foreach ($question->answers as $answer) : ?>
                <tr>
                    <td class="answer"><?php echo Yii::t('flexiblearn', 'A') ?></td>
                    <td>
                        <?php echo $answer->content ?>
                        <br />
                        <?php echo Yii::t('flexiblearn', 'By') ?>
                        <span class="colo">
                            <a href="<?php echo $this->createUrl('account/view', array('id' => $answer->id_account)) ?>">
                                <?php echo $answer->account->username ?>
                            </a>
                            <?php if (!Yii::app()->user->getIsGuest()) : ?>
                                <?php if ($question->id_account == Yii::app()->user->getId() && count($question->answers) == 0 || 
                                    Yii::app()->user->checkAccess('adminLesson') || Yii::app()->user->checkAccess('adminOwnLesson', array('lesson' => $answer->question->lesson))) : ?>
                                    <a id="link-delete-answer-<?php echo $answer->getPrimaryKey()?>" 
                                       href="javascript:void(0)" onclick="deleteAnswer('<?php echo $answer->getPrimaryKey()?>', this)">
                                        <?php echo Yii::t('flexiblearn', 'Delete This Answer') ?>
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </span> 
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td style="border-bottom: 1px solid #000000;" colspan="2"></td>
            </tr>                    
        <?php endforeach; ?>        
    </table>
    <?php if (isset($questionPages)):  ?>
        <div class="block-area" style="margin-bottom: 10px;">
            <?php $this->widget('CLinkPager', array('pages' => $questionPages,'header' => ''));?>
        </div>
    <?php endif; ?>
<?php endif; ?>