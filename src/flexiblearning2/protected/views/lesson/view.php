<?php
$category = $model->category;
$language = $category->language;

$this->breadcrumbs = array(
    $language->name => $language->href,
    $category->name => $category->href,
    $model->title,
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

            <?php $this->renderPartial('/_lesson_detail', array('model' => $model));?>
        </td>

        <td style="vertical-align:top; background-color:white;">
            <?php $this->renderPartial('/_skype');?>
            <?php $this->renderPartial('/_qa');?>
            <?php $this->renderPartial('/_ad');?>
        </td>
    </tr>
</table>