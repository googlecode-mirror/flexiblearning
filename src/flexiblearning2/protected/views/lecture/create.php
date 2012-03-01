<?php
$category = $model->category;
$language = $category->language;

$this->breadcrumbs=array(
    Yii::t('zii', $language->name) => $language->getHref(),    
    $category->name => $category->getHref(),
    Yii::t('zii', 'Create lecture'),
);

$this->menu=array(
    array('label'=> Yii::t('zii', 'Manage Lecture'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('zii', 'Create Lecture')?></h1>

<div class="block">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>