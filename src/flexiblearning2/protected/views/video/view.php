<?php
$lesson = $model->lesson;
$category = $lesson->category;
$language = $category->language;

$this->breadcrumbs = array(
    $language->name => $language->href,
    $category->name => $category->href,
    $lesson->title => $lesson->href,
    $model->name,
);
?>

<table border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td class="top" id="caption">
            <div class="title">
                <span class="title-text"><?php echo $model->name ?></span> 
            </div>
            <p class="center">
                <?php $this->renderPartial('/_video_player', array('model' => $model))?>
            </p>

            <?php $this->renderPartial('/_lesson_detail', array('model' => $lesson));?>
        </td>

        <td style="vertical-align:top; background-color:white;">
            <?php $this->renderPartial('/_skype');?>
            <?php $this->renderPartial('/_qa');?>
            <?php $this->renderPartial('/_ad');?>
        </td>
    </tr>
</table>