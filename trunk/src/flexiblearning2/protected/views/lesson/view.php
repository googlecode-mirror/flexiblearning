<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/qa.js');

$lecture = $model->lecture;
$category = $lecture->category;
$language = $category->language;

$this->breadcrumbs = array(
    Yii::t('zii', $language->name) => $language->href,
    $category->name => $category->href,
    Yii::t('zii', 'Lecture : ') . $lecture->title => $lecture->href,
    Yii::t('zii', 'Lesson : ') . $model->title,
);
?>

<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td class="top" id="caption">
            <div class="title">
                <span class="title-text"><?php echo $model->title ?></span> 
            </div>

            <p class="center">
                <img src="<?php echo Yii::app()->request->baseUrl . '/' . $model->thumb; ?>" class="lesson-view" />
            </p>

            <?php $this->renderPartial('/_lesson_detail', array('model' => $model)); ?>
        </td>

        <td style="vertical-align:top; background-color:white;">            
            <?php $this->renderPartial('/_skype', array('lesson' => $model)); ?>
            <div id="lesson-qa-area">
                <?php 
                    $this->renderPartial('/_qa', array(
                        'lesson' => $model,
                        'questions' => $questions,
                        'questionPages' => $questionPages
                    )); 
                ?>
            </div>
            <?php $this->renderPartial('/_ad', array('banners' => $banners)); ?>
        </td>
    </tr>
</table>