<?php
$lesson = $model->lesson;


$this->breadcrumbs=array(
   
    Yii::t('zii', 'Create Document'),
);

$this->menu=array(
    array('label'=> Yii::t('zii', 'Manage Document'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('zii', 'Create Document')?></h1>

<div class="block">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>