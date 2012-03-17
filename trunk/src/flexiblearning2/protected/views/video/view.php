<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/qa.js');

$lecture = $lesson->lecture;
$category = $lecture->category;
$language = $category->language;

$this->breadcrumbs = array(
    Yii::t('zii', $language->name) => $language->href,
    $category->name => $category->href,
    Yii::t('zii', 'Lecture : ') . $lecture->title => $lecture->href,
    Yii::t('zii', 'Lesson : ') . $lesson->title => $lesson->href,
    Yii::t('zii', 'Video : ') . $model->name,
);
?>

<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td class="top" id="caption">
            <div class="title left">
                <span class="title-text"><?php echo $model->name ?></span> 
            </div>
            <div class="right">
                <?php if (Yii::app()->user->checkAccess('adminOwnLesson') || Yii::app()->user->checkAccess('adminLesson')) : ?>
                    <a class="edit-link icon-control-link" 
                       href="<?php echo $this->createUrl('video/update', array('id' => $model->getPrimaryKey())) ?>">
                           <?php echo Yii::t('zii', 'Update video') ?>
                    </a>
                <?php endif; ?>
            </div>
            <div class="clear"></div>
            <p class="center">
                <?php $this->renderPartial('/_video_player', array('file' => $model->path))?>
            </p>
            
            <?php if (!$model->is_active) : ?>
                <div class="errorMessage block-area">
                    <?php echo Yii::t('zii', 'This video is not active')?>
                </div>
            <?php endif; ?>
            
            <?php $this->renderPartial('/_lesson_detail', array('model' => $lesson));?>
        </td>

        <td style="vertical-align:top; background-color:white;">
            <?php $this->renderPartial('/_skype', array('lesson' => $lesson));?>
            <div id="lesson-qa-area">
                <?php 
                    $this->renderPartial('/_qa', array(
                        'lesson' => $lesson,
                        'questions' => $questions,
                        'questionPages' => $questionPages
                    ));
                ?>
            </div>
            <?php $this->renderPartial('/_ad', array('banners' => $banners));?>
        </td>
    </tr>
</table>