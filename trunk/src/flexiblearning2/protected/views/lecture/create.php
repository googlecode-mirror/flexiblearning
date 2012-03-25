<?php
if ($model->id_category) {
    $category = $model->category;
    $language = $category->language;

    $this->breadcrumbs=array(
        Yii::t('flexiblearn', $language->name) => $language->getHref(),    
        $category->name => $category->getHref(),
        Yii::t('flexiblearn', 'Create lecture'),
    );
} else {
    $this->breadcrumbs=array(
        Yii::t('flexiblearn', 'Create lecture'),
    );
}

$this->menu=array(
    array('label'=> Yii::t('flexiblearn', 'Manage Lecture'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('flexiblearn', 'Create Lecture')?></h1>

<div class="block">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>